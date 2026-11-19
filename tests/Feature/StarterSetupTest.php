<?php

namespace Tests\Feature;

use App\Filament\Pages\GlobalSettings;
use App\Filament\Pages\MarketingSettings;
use App\Filament\Resources\SeoPages\Pages\CreateSeoPages;
use App\Filament\Resources\SeoPages\Pages\EditSeoPages;
use App\Filament\Widgets\DashboardQuickLinks;
use App\Models\GlobalSetting;
use App\Models\SeoPages;
use App\Models\User;
use Filament\Auth\Pages\Login;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class StarterSetupTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_creation_login_and_dashboard(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/login')->assertOk();

        $this->actingAs(User::factory()->create())->get('/admin')->assertForbidden();
        auth()->logout();

        $this->artisan('make:admin', [
            '--name' => 'Test Admin',
            '--email' => 'test-admin@example.com',
            '--password' => 'test-password',
        ])->assertSuccessful();

        Filament::setCurrentPanel(Filament::getPanel('admin'));
        Livewire::test(Login::class)
            ->fillForm(['email' => 'test-admin@example.com', 'password' => 'test-password'])
            ->call('authenticate')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin');

        $this->get('/admin')
            ->assertOk()
            ->assertSee('Visit Website')
            ->assertSee('Test Admin')
            ->assertSee('Content Overview')
            ->assertSee('Quick Actions');

        foreach (['profile', 'global-settings', 'marketing-settings', 'seo-pages', 'seo-pages/create'] as $path) {
            $this->get("/admin/{$path}")->assertOk();
        }
    }

    public function test_settings_save_and_render_in_the_public_layout(): void
    {
        $this->signInAdmin();
        Storage::fake('public');

        Livewire::test(GlobalSettings::class)
            ->fillForm([
                'site_name' => 'Example Website',
                'site_tagline' => 'Global tagline',
                'default_meta_title' => 'Global title',
                'default_robots_meta' => 'noindex,nofollow',
                'canonical_base_url' => 'https://example.com',
                'default_og_image_path' => UploadedFile::fake()->createWithContent('share.png', base64_decode(
                    'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jB9sAAAAASUVORK5CYII='
                )),
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $global = GlobalSetting::query()->findOrFail(GlobalSetting::SETTINGS_ID);
        Storage::disk('public')->assertExists($global->default_og_image_path);

        Livewire::test(MarketingSettings::class)
            ->fillForm([
                'ga4_enabled' => true,
                'ga4_measurement_id' => 'G-EXAMPLE123',
                'google_search_console_verification' => 'example-token',
                'custom_head_scripts' => '<script id="head-script"></script>',
                'custom_body_start_scripts' => '<script id="body-start-script"></script>',
                'custom_body_end_scripts' => '<script id="body-end-script"></script>',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->seed();

        $this->get('/')
            ->assertOk()
            ->assertSee('<title>Global title</title>', false)
            ->assertSee('Global tagline')
            ->assertSee('content="noindex,nofollow"', false)
            ->assertSee('rel="canonical" href="https://example.com"', false)
            ->assertSee($global->default_og_image_url)
            ->assertSee('G-EXAMPLE123')
            ->assertSee('example-token')
            ->assertSeeInOrder(['id="head-script"', 'id="body-start-script"', 'Global tagline', 'id="body-end-script"'], false);
    }

    public function test_seo_entry_is_editable_and_inactive_entries_fall_back_to_global_settings(): void
    {
        $this->signInAdmin();
        GlobalSetting::currentOrCreate()->update(['default_meta_title' => 'Global title']);

        Livewire::test(CreateSeoPages::class)
            ->fillForm([
                'page_name' => 'Home',
                'page_key' => 'home',
                'meta_title' => 'Page title',
                'robots_index' => false,
                'schema_json' => '"scalar"',
            ])
            ->call('create')
            ->assertHasFormErrors(['schema_json'])
            ->fillForm(['schema_json' => '{"@context":"https://schema.org","@type":"WebPage"}'])
            ->call('create')
            ->assertHasNoFormErrors();

        $page = SeoPages::query()->where('page_key', 'home')->firstOrFail();
        $this->get("/admin/seo-pages/{$page->id}")->assertOk();

        $this->get('/')
            ->assertSee('<title>Page title</title>', false)
            ->assertSee('content="noindex,follow"', false)
            ->assertSee('application/ld+json')
            ->assertSee('WebPage');

        Livewire::test(EditSeoPages::class, ['record' => $page->getRouteKey()])
            ->fillForm(['is_active' => false])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->get('/')->assertSee('<title>Global title</title>', false)->assertDontSee('WebPage');
    }

    public function test_session_widget_revokes_only_other_sessions_for_the_signed_in_admin(): void
    {
        $admin = $this->signInAdmin();
        config(['session.driver' => 'database']);

        $otherUser = User::factory()->create();
        $anotherSessionId = str()->random(40);
        DB::table('sessions')->insert([
            'id' => $anotherSessionId,
            'user_id' => $otherUser->id,
            'payload' => '',
            'last_activity' => now()->timestamp,
        ]);

        $sessionId = str()->random(40);
        DB::table('sessions')->insert([
            'id' => $sessionId,
            'user_id' => $admin->id,
            'payload' => '',
            'last_activity' => now()->timestamp,
            'ip_address' => '192.0.2.1',
        ]);

        Livewire::test(DashboardQuickLinks::class)
            ->assertSee('192.0.2.1')
            ->call('revokeSession', $sessionId)
            ->assertDontSee('192.0.2.1')
            ->call('revokeOtherSessions');

        $this->assertDatabaseMissing('sessions', ['id' => $sessionId]);
        $this->assertDatabaseHas('sessions', ['id' => $anotherSessionId]);
    }

    private function signInAdmin(): User
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        Filament::setCurrentPanel(Filament::getPanel('admin'));

        return $admin;
    }
}
