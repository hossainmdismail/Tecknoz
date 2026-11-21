<?php

namespace Tests\Feature;

use App\Enums\ContactSubmissionStatus;
use App\Filament\Pages\GlobalSettings;
use App\Filament\Pages\MarketingSettings;
use App\Filament\Resources\BlogCategories\Pages\ManageBlogCategories;
use App\Filament\Resources\BlogPosts\Pages\CreateBlogPost;
use App\Filament\Resources\BlogPosts\Pages\EditBlogPost;
use App\Filament\Resources\Brands\Pages\ManageBrands;
use App\Filament\Resources\ContactLocations\Pages\ManageContactLocations;
use App\Filament\Resources\ContactSubmissions\Pages\ManageContactSubmissions;
use App\Filament\Resources\Events\Pages\ManageEvents;
use App\Filament\Resources\Faqs\Pages\ManageFaqs;
use App\Filament\Resources\NewsletterSubscriptions\Pages\ManageNewsletterSubscriptions;
use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\SeoPages\Pages\CreateSeoPages;
use App\Filament\Resources\SeoPages\Pages\EditSeoPages;
use App\Filament\Widgets\DashboardQuickLinks;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\ContactLocation;
use App\Models\ContactSubmission;
use App\Models\Event;
use App\Models\Faq;
use App\Models\GlobalSetting;
use App\Models\NewsletterSubscription;
use App\Models\Project;
use App\Models\SeoPages;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
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

        NewsletterSubscription::query()->create(['email' => 'recent@example.com']);
        NewsletterSubscription::query()->create(['email' => 'older@example.com'])
            ->forceFill(['created_at' => now()->subDays(31)])->save();

        $dashboard = $this->get('/admin')
            ->assertOk()
            ->assertSee('Visit Website')
            ->assertSee('Test Admin')
            ->assertSee('Content Overview')
            ->assertSee('Quick Actions')
            ->assertSee('0 new · 0 in progress')
            ->assertSee('1 in the last 30 days')
            ->assertSee('New Project')
            ->assertSee('New Blog Post')
            ->assertSee('New SEO Entry');

        $this->get('/admin/profile')->assertOk();

        foreach ([
            'projects', 'projects/create', 'blog-posts', 'blog-posts/create', 'blog-categories',
            'brands', 'faqs', 'events', 'global-settings', 'marketing-settings', 'seo-pages', 'seo-pages/create',
            'contact-locations', 'contact-submissions', 'newsletter-subscriptions',
        ] as $path) {
            $dashboard->assertSee('href="'.url("/admin/{$path}").'"', false);
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

    public function test_multiple_contacts_save_and_render_with_primary_shortcuts(): void
    {
        $this->signInAdmin();

        Livewire::test(GlobalSettings::class)
            ->fillForm([
                'contact_channels' => [
                    ['type' => 'phone', 'label' => 'Main line', 'value' => '+880 1234-567890'],
                    ['type' => 'phone', 'label' => 'London line', 'value' => '+44 20 7946 0958'],
                    ['type' => 'whatsapp', 'value' => '+880 1234-567891'],
                    ['type' => 'whatsapp', 'value' => '+44 20 7946 0959'],
                    ['type' => 'email', 'label' => 'Email label', 'value' => 'info@example.com'],
                    ['type' => 'wechat', 'value' => 'unlinked-wechat'],
                    ['type' => 'wechat', 'value' => 'linked-wechat', 'url' => 'https://example.com/qr.png'],
                    ['type' => 'messenger', 'value' => 'Support', 'url' => 'https://m.me/example-support'],
                ],
                'business_hours' => 'Monday to Friday',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $settings = GlobalSetting::query()->findOrFail(GlobalSetting::SETTINGS_ID);
        $this->assertCount(8, $settings->contact_channels);

        $response = $this->get('/')
            ->assertOk()
            ->assertSee('tel:+8801234567890')
            ->assertSee('https://wa.me/8801234567891')
            ->assertSee('mailto:info@example.com')
            ->assertSee('https://example.com/qr.png')
            ->assertSee('"telephone":"+880 1234-567890"', false);

        $html = $response->getContent();
        $footer = str($html)->after('<footer class="footer"')->before('</footer>')->value();
        $this->assertStringContainsString('mailto:info@example.com', $footer);
        $this->assertStringNotContainsString('Email label', $footer);
        $this->assertStringNotContainsString('tel:', $footer);
        $this->assertStringNotContainsString('wa.me/', $footer);
        $this->assertStringNotContainsString('Monday to Friday', $footer);
        $this->assertStringNotContainsString('https://example.com/qr.png', $footer);
        $this->assertStringNotContainsString('https://m.me/example-support', $footer);

        $floatingBar = str($html)->after('class="contact-pop"')->before('class="schedule-modal"')->value();
        $this->assertStringContainsString('tel:+8801234567890', $floatingBar);
        $this->assertStringContainsString('https://example.com/qr.png', $floatingBar);
        $this->assertStringContainsString('https://m.me/example-support', $floatingBar);
        $this->assertStringNotContainsString('tel:+442079460958', $floatingBar);
        $this->assertStringNotContainsString('unlinked-wechat', $floatingBar);

        $this->get('/contact')->assertSee('Monday to Friday');

        Livewire::test(GlobalSettings::class)
            ->fillForm(['contact_channels' => [], 'business_hours' => null])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->seed();
        $this->assertSame([], $settings->refresh()->contact_channels);

        $this->app->forgetScopedInstances();
        $this->get('/')->assertOk()->assertDontSee('class="contact-pop"', false);
    }

    public function test_contact_location_crud_updates_public_offices_and_footer(): void
    {
        $this->get('/admin/contact-locations')->assertRedirect('/admin/login');
        $this->signInAdmin();
        $this->get('/admin/contact-locations')->assertOk()->assertSee('Global Headquarters')->assertSee('Asia Innovation Hub');
        $this->get('/admin/global-settings')->assertSee('Manage locations');

        Livewire::test(ManageContactLocations::class)
            ->callAction('create', [
                'label' => 'Sydney, Australia',
                'office_name' => 'Sydney Office',
                'address' => '10 Example Street, Sydney',
                'map_url' => 'https://example.com/sydney-map',
                'sort_order' => 0,
                'is_active' => true,
            ])
            ->assertHasNoActionErrors();
        $office = ContactLocation::query()->where('label', 'Sydney, Australia')->sole();
        $response = $this->get('/contact')
            ->assertOk()
            ->assertSee('10 Example Street, Sydney')
            ->assertSee('https://example.com/sydney-map')
            ->assertSee('https://www.google.com/maps/search/?api=1&amp;query=', false)
            ->assertSee('Sydney, Australia');
        $cards = str($response->getContent())->after('class="info-cards"')->before('</section>')->value();
        $this->assertStringContainsString('Sydney Office', $cards);
        $this->assertStringNotContainsString('Shenzhen, China', $cards);

        Livewire::test(ManageContactLocations::class)
            ->callAction(TestAction::make('edit')->table($office), [
                'office_name' => 'Updated Sydney Office',
                'sort_order' => 10,
            ])
            ->assertHasNoActionErrors();
        $this->get('/contact')->assertSeeInOrder(['Global Headquarters', 'Updated Sydney Office']);

        $office->refresh()->update(['is_active' => false]);
        $this->get('/contact')->assertDontSee('Updated Sydney Office')->assertDontSee('Sydney, Australia');

        Livewire::test(ManageContactLocations::class)
            ->callAction(TestAction::make('delete')->table($office))
            ->assertHasNoActionErrors();
        $this->seed();
        $this->assertModelMissing($office);
    }

    public function test_brand_crud_controls_which_images_appear_on_the_homepage(): void
    {
        $this->signInAdmin();
        Storage::fake('public');
        $image = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jB9sAAAAASUVORK5CYII=');

        $this->get('/admin/brands')->assertOk();

        $page = Livewire::test(ManageBrands::class)
            ->callAction('create', ['image' => UploadedFile::fake()->createWithContent('logo.png', $image), 'is_active' => true])
            ->assertHasNoActionErrors();

        $brand = Brand::query()->sole();
        $originalPath = $brand->image;
        Storage::disk('public')->assertExists($originalPath);
        $this->get('/')->assertSee($brand->image_url);

        $page->mountAction(TestAction::make('view')->table($brand))
            ->assertSee('Enabled')
            ->call('unmountAction')
            ->call('updateTableColumnState', 'is_active', (string) $brand->getKey(), false);
        $this->assertFalse($brand->refresh()->is_active);
        $this->get('/')->assertDontSee($brand->image_url);

        Livewire::test(ManageBrands::class)
            ->mountAction(TestAction::make('edit')->table($brand))
            ->assertActionMounted(TestAction::make('edit')->table($brand))
            ->fillForm(['image' => []])
            ->fillForm([
                'image' => UploadedFile::fake()->createWithContent('new-logo.png', $image),
                'is_active' => true,
            ])
            ->callMountedAction()
            ->assertHasNoActionErrors();

        $brand->refresh();
        $this->assertNotSame($originalPath, $brand->image);
        Storage::disk('public')->assertMissing($originalPath);
        Storage::disk('public')->assertExists($brand->image);
        $this->get('/')->assertSee($brand->image_url);

        Livewire::test(ManageBrands::class)
            ->callAction(TestAction::make('delete')->table($brand))
            ->assertHasNoActionErrors();
        $this->assertModelMissing($brand);
        Storage::disk('public')->assertMissing($brand->image);
        $this->get('/')->assertDontSee($brand->image_url);
    }

    public function test_project_cms_publishes_the_theme_detail_listing_and_featured_card(): void
    {
        $this->signInAdmin();
        Storage::fake('public');
        $image = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jB9sAAAAASUVORK5CYII=');

        $this->get('/admin/projects')->assertOk();
        $this->get('/admin/projects/create')->assertOk();
        $this->get('/projects')->assertOk()->assertSee('No projects to show yet.');

        Livewire::test(CreateProject::class)
            ->set('data.name', 'Atlas & Co')
            ->assertSet('data.slug', 'atlas-co')
            ->fillForm([
                'summary' => 'An accessible dashboard.',
                'image' => UploadedFile::fake()->createWithContent('cover.png', $image),
                'client' => 'Atlas Group',
                'client_logo' => UploadedFile::fake()->createWithContent('client.png', $image),
                'industry' => 'Technology',
                'deadline' => '2026-12-15',
                'color' => '#113355',
                'details' => '<p>Project <strong>details</strong>.</p><script>untrusted-content</script>',
                'services_rendered' => '<p>Design and build</p>',
                'is_featured' => true,
                'is_published' => false,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $project = Project::query()->sole();
        Storage::disk('public')->assertExists($project->image);
        Storage::disk('public')->assertExists($project->client_logo);
        $this->get('/projects')->assertDontSee('Atlas & Co');
        $this->get('/')->assertDontSee('Atlas & Co');
        $this->get('/project/atlas-co')->assertNotFound();

        Livewire::test(EditProject::class, ['record' => $project->getKey()])
            ->fillForm(['is_published' => true])
            ->call('save')
            ->assertHasNoFormErrors();

        $publishedAt = $project->refresh()->published_at;
        $this->assertNotNull($publishedAt);
        $this->get('/admin/projects/'.$project->getKey())->assertOk();
        $this->get('/')->assertSee('Atlas & Co')->assertSee('/project/atlas-co');
        $this->get('/projects')->assertSee('Atlas & Co')->assertSee($project->image_url);
        $this->get('/project/atlas-co')
            ->assertOk()
            ->assertSee('<title>Atlas &amp; Co</title>', false)
            ->assertSee($project->client_logo_url)
            ->assertSee('15 Dec 2026')
            ->assertSee('Technology')
            ->assertSee('Project <strong>details</strong>.', false)
            ->assertSee('Design and build')
            ->assertDontSee('untrusted-content');

        SeoPages::query()->create([
            'page_name' => 'Atlas SEO',
            'page_key' => 'project.detail.'.$project->getKey(),
            'meta_title' => 'Atlas SEO title',
        ]);
        $this->get('/project/atlas-co')->assertSee('<title>Atlas SEO title</title>', false);

        Livewire::test(EditProject::class, ['record' => $project->getKey()])
            ->assertSet('data.is_published', true)
            ->set('data.name', 'Atlas Rebrand')
            ->assertSet('data.slug', 'atlas-co')
            ->fillForm(['is_featured' => false])
            ->call('save')
            ->assertHasNoFormErrors();
        $this->assertTrue($publishedAt->equalTo($project->refresh()->published_at));
        $this->get('/')->assertDontSee('Atlas Rebrand');
        $this->get('/projects')->assertSee('Atlas Rebrand');

        Livewire::test(EditProject::class, ['record' => $project->getKey()])
            ->fillForm(['is_published' => false])
            ->call('save')
            ->assertHasNoFormErrors();
        $this->get('/project/atlas-co')->assertNotFound();

        Livewire::test(EditProject::class, ['record' => $project->getKey()])
            ->callAction('delete')
            ->assertHasNoActionErrors();
        $this->assertModelMissing($project);
        Storage::disk('public')->assertMissing($project->image);
        Storage::disk('public')->assertMissing($project->client_logo);
    }

    public function test_blog_cms_controls_posts_categories_and_public_views(): void
    {
        $this->signInAdmin();
        Storage::fake('public');
        $image = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jB9sAAAAASUVORK5CYII=');

        $this->get('/admin/blog-posts')->assertOk();
        $this->get('/admin/blog-categories')->assertOk();

        Livewire::test(ManageBlogCategories::class)
            ->callAction('create', ['name' => 'Editorial Design', 'slug' => 'editorial-design', 'description' => 'Design notes.'])
            ->assertHasNoActionErrors();
        $category = BlogCategory::query()->sole();

        Livewire::test(CreateBlogPost::class)
            ->set('data.title', 'Design & Delivery')
            ->assertSet('data.slug', 'design-delivery')
            ->fillForm([
                'blog_category_id' => $category->getKey(),
                'summary' => 'A short introduction.',
                'body' => '<p>Article <strong>body</strong>.</p><script>unsafe-article</script>',
                'image' => UploadedFile::fake()->createWithContent('cover.png', $image),
                'thumbnail' => UploadedFile::fake()->createWithContent('thumb.png', $image),
                'read_time' => 4,
                'is_featured' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $post = BlogPost::query()->sole();
        $this->get('/blogs')->assertOk()->assertSee('Blog Highlights')->assertSee('No articles to show yet.');
        $this->get('/post/design-delivery')->assertNotFound();
        $this->get('/')->assertDontSee('Design & Delivery');

        Livewire::test(EditBlogPost::class, ['record' => $post->getKey()])
            ->fillForm(['is_published' => true])
            ->call('save')
            ->assertHasNoFormErrors();
        $post->refresh();

        BlogPost::query()->create([
            'title' => 'A related article',
            'slug' => 'related-article',
            'blog_category_id' => $category->getKey(),
            'is_published' => true,
        ]);
        BlogPost::query()->create([
            'title' => 'Article outside this category',
            'slug' => 'outside-category',
            'is_published' => true,
        ]);

        $this->get('/admin/blog-posts/'.$post->getKey())->assertOk();
        $this->get('/')->assertSee('Design & Delivery')->assertSee($post->thumbnail_url);
        $this->get('/blogs')->assertSee('Design & Delivery')->assertSee('Article outside this category');
        $this->get('/category/editorial-design')->assertOk()->assertSee('A related article')->assertDontSee('Article outside this category');
        $this->get('/post/design-delivery')
            ->assertOk()
            ->assertSee('<title>Design &amp; Delivery</title>', false)
            ->assertSee($post->image_url)
            ->assertSee('Reading Time')
            ->assertSee('Article <strong>body</strong>.', false)
            ->assertSee('A related article')
            ->assertDontSee('unsafe-article');

        Livewire::test(ManageBlogCategories::class)
            ->callAction(TestAction::make('delete')->table($category))
            ->assertHasNoActionErrors();
        $this->assertNull($post->refresh()->blog_category_id);

        Livewire::test(EditBlogPost::class, ['record' => $post->getKey()])
            ->fillForm(['is_published' => false])
            ->call('save')
            ->assertHasNoFormErrors();
        $this->get('/post/design-delivery')->assertNotFound();

        Livewire::test(EditBlogPost::class, ['record' => $post->getKey()])
            ->callAction('delete')
            ->assertHasNoActionErrors();
        $this->assertModelMissing($post);
        Storage::disk('public')->assertMissing($post->image);
        Storage::disk('public')->assertMissing($post->thumbnail);
    }

    public function test_faq_crud_controls_homepage_order_and_visibility(): void
    {
        $this->signInAdmin();
        $this->get('/admin/faqs')->assertOk();

        $firstThemeFaq = Faq::query()->orderBy('sort_order')->firstOrFail();
        $this->assertSame(5, Faq::query()->count());

        $page = Livewire::test(ManageFaqs::class)
            ->callAction('create', [
                'question' => 'An editor question?',
                'answer' => 'An editor answer with <strong>literal text</strong>.',
                'sort_order' => 0,
                'is_active' => true,
            ])
            ->assertHasNoActionErrors();
        $faq = Faq::query()->where('question', 'An editor question?')->firstOrFail();

        $this->get('/')
            ->assertSeeInOrder([$faq->question, $firstThemeFaq->question])
            ->assertSee('&lt;strong&gt;literal text&lt;/strong&gt;', false);

        $page->mountAction(TestAction::make('view')->table($faq))
            ->assertSee($faq->answer)
            ->unmountAction()
            ->call('updateTableColumnState', 'is_active', (string) $faq->getKey(), false);
        $this->assertFalse($faq->refresh()->is_active);
        $this->get('/')->assertDontSee($faq->question);

        Livewire::test(ManageFaqs::class)
            ->callAction(TestAction::make('edit')->table($faq), [
                'question' => 'The updated question?',
                'sort_order' => 6,
                'is_active' => true,
            ])
            ->assertHasNoActionErrors();
        $faq->refresh();
        $this->get('/')->assertSeeInOrder([$firstThemeFaq->question, $faq->question]);

        $otherFaqIds = Faq::query()->whereKeyNot($faq->getKey())->orderBy('sort_order')->pluck('id')->all();
        Livewire::test(ManageFaqs::class)
            ->call('toggleTableReordering')
            ->call('reorderTable', [$faq->getKey(), ...$otherFaqIds]);
        $this->get('/')->assertSeeInOrder([$faq->question, $firstThemeFaq->question]);

        Livewire::test(ManageFaqs::class)
            ->callAction(TestAction::make('delete')->table($faq))
            ->assertHasNoActionErrors();
        $this->assertModelMissing($faq);
        $this->get('/')->assertDontSee($faq->question);
    }

    public function test_about_page_uses_the_theme_and_page_seo_settings(): void
    {
        GlobalSetting::currentOrCreate()->update(['site_tagline' => 'An editable site tagline']);
        SeoPages::query()->create([
            'page_name' => 'About',
            'page_key' => 'about',
            'meta_title' => 'About SEO title',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('href="'.route('about').'"', false);

        $this->get('/about')
            ->assertOk()
            ->assertSee('<title>About SEO title</title>', false)
            ->assertSee('data-wf-page="6afec6de276a1505a6c603d1"', false)
            ->assertSee('Unleash the Power of')
            ->assertSee('An editable site tagline')
            ->assertSee('3251737-hd_1280_720_50fps-transcode.mp4')
            ->assertSee('aria-current="page"', false);
    }

    public function test_clients_page_uses_enabled_brands_and_its_own_seo_key(): void
    {
        $visible = Brand::query()->create(['image' => 'brands/visible-client.png', 'is_active' => true]);
        $hidden = Brand::query()->create(['image' => 'brands/hidden-client.png', 'is_active' => false]);
        SeoPages::query()->create([
            'page_name' => 'Clients',
            'page_key' => 'clients',
            'meta_title' => 'Our clients SEO title',
        ]);

        $this->get('/')->assertSee('href="'.route('clients').'"', false);
        $this->get('/clients')
            ->assertOk()
            ->assertSee('<title>Our clients SEO title</title>', false)
            ->assertSee('Our Happy Clients')
            ->assertSee('Industries We')
            ->assertSee('Email Marketing Client')
            ->assertSee($visible->image_url)
            ->assertDontSee($hidden->image_url)
            ->assertSee('aria-current="page"', false);
    }

    public function test_service_and_event_theme_pages_are_available_from_the_navigation(): void
    {
        $services = [
            'design-development' => 'Design & Development',
            'semiconductor' => 'Semiconductor Engineering Solutions',
            'ai-automation' => 'Intelligent Systems',
            'digital-marketing' => 'Digital Marketing That Drives Real Growth',
            'recruitment' => 'Talent Acquisition',
            'business' => 'Business Growth & Enablement',
            'stuff-augmentation' => 'Staff Augmentation Services',
        ];
        SeoPages::query()->create([
            'page_name' => 'Design and Development',
            'page_key' => 'service.design-development',
            'meta_title' => 'Design service SEO title',
        ]);

        $this->get('/')
            ->assertSee('href="'.route('services').'"', false)
            ->assertSee('href="'.route('events').'"', false)
            ->assertSee('href="'.route('blogs').'"', false);

        $listing = $this->get('/service')->assertOk()->assertSee('Excellent Products');
        foreach ($services as $slug => $heading) {
            $url = route('services.show', $slug);
            $listing->assertSee('href="'.$url.'"', false);
            $this->get($url)->assertOk()->assertSee($heading);
        }
        $this->get('/service/design-development')->assertSee('<title>Design service SEO title</title>', false);
        $this->get('/service/unknown')->assertNotFound();
        $this->get('/events')
            ->assertOk()
            ->assertSee('Event Highlights')
            ->assertSee('Tecknoz founded')
            ->assertSee('Expansion into AI and semiconductor engineering')
            ->assertDontSee('How to get more leads from google ads');
    }

    public function test_event_publication_and_launch_pages(): void
    {
        $this->signInAdmin();
        Livewire::test(ManageEvents::class)
            ->callAction('create', [
                'title' => 'Test Technology Workshop',
                'date_label' => 'December 2026',
                'summary' => 'An event entered by the admin.',
                'sort_order' => 0,
                'is_active' => false,
            ])
            ->assertHasNoActionErrors();

        $this->get('/events')->assertDontSee('Test Technology Workshop');
        $event = Event::query()->where('title', 'Test Technology Workshop')->sole();
        $event->update(['is_active' => true]);
        $this->get('/events')->assertSeeInOrder(['Test Technology Workshop', 'Tecknoz founded']);

        $home = $this->get('/');
        foreach (config('industries') as $slug => $industry) {
            $url = route('industries.show', $slug);
            $home->assertSee('href="'.$url.'"', false);
            $this->get($url)->assertOk()->assertSee($industry['name'])->assertSee('Related Services');
        }
        $this->get('/industry/unknown')->assertNotFound();
        $this->get('/privacy-policy')->assertOk()->assertSee('<title>Privacy Policy | Tecknoz</title>', false);
        $this->get('/terms-of-service')->assertOk()->assertSee('Project enquiries')->assertDontSee('Privacy requests');
    }

    public function test_sitemap_respects_publication_robots_and_canonical_settings(): void
    {
        GlobalSetting::currentOrCreate()->update(['canonical_base_url' => 'https://tecknoz.xyz']);
        SeoPages::query()->create([
            'page_name' => 'About',
            'page_key' => 'about',
            'robots_index' => false,
        ]);
        SeoPages::query()->create([
            'page_name' => 'Clients',
            'page_key' => 'clients',
            'canonical_url' => 'https://tecknoz.xyz/about',
        ]);
        foreach (range(1, 9) as $number) {
            Project::query()->create([
                'name' => 'Featured item '.$number,
                'slug' => 'featured-'.$number,
                'is_published' => true,
                'is_featured' => true,
            ]);
        }
        Project::query()->create(['name' => 'Draft', 'slug' => 'draft', 'is_featured' => true]);

        $home = $this->get('/')->assertSee('Featured item 9')->assertSee('Featured item 2')->assertDontSee('Featured item 1');
        $home->assertDontSee(config('tecknoz.gtm_container_id'));
        \App\Models\MarketingSettings::currentOrCreate()->update(['gtm_enabled' => true]);
        $this->get('/')->assertSee(config('tecknoz.gtm_container_id'));

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<loc>https://tecknoz.xyz/project/featured-1</loc>', false)
            ->assertSee('<loc>https://tecknoz.xyz/industry/real-estate</loc>', false)
            ->assertDontSee('<loc>https://tecknoz.xyz/about</loc>', false)
            ->assertDontSee('<loc>https://tecknoz.xyz/clients</loc>', false)
            ->assertDontSee('/project/draft');
        $this->get('/robots.txt')->assertOk()->assertSee('Sitemap: https://tecknoz.xyz/sitemap.xml');
    }

    public function test_contact_page_validates_and_saves_submissions(): void
    {
        $this->seed();
        $this->get('/contact')
            ->assertOk()
            ->assertSee('Just Want to Chat?')
            ->assertSee('Global Headquarters')
            ->assertSee('name="_token"', false);
        $this->get('/admin/contact-submissions')->assertRedirect('/admin/login');

        $this->post('/contact', ['email' => 'invalid', 'budget' => 'unknown'])
            ->assertRedirect(route('contact').'#contact-form')
            ->assertSessionHasErrors(['name', 'email', 'phone', 'budget', 'subject', 'message']);
        $this->assertDatabaseEmpty('contact_submissions');

        $this->post('/contact', [
            'name' => 'Public Visitor',
            'email' => 'contact@example.com',
            'phone' => '+880 1540-306102',
            'budget' => '2k-5k',
            'subject' => 'A new project',
            'message' => 'We would like to discuss a project.',
            'status' => 'resolved',
            'internal_notes' => 'Ignored from the public form.',
        ])->assertStatus(303)->assertRedirect(route('contact').'#contact-form');

        $submission = ContactSubmission::query()->sole();
        $this->assertSame(ContactSubmissionStatus::New, $submission->status);
        $this->assertNull($submission->internal_notes);
        $this->assertSame('We would like to discuss a project.', $submission->message);
        $this->get('/contact')->assertSee('Your submission has been received.')->assertDontSee($submission->message);
    }

    public function test_contact_admin_filters_sorts_and_downloads_submissions(): void
    {
        $this->signInAdmin();
        $fields = [
            'email' => 'visitor@example.com',
            'phone' => '+880 1540-306102',
            'budget' => '2k-5k',
            'message' => "Line one\nLine two",
        ];
        $first = ContactSubmission::query()->create($fields + ['name' => 'Zeta', 'subject' => '=1+1']);
        $second = ContactSubmission::query()->create($fields + ['name' => 'Alpha', 'subject' => 'Second inquiry']);
        $outside = ContactSubmission::query()->create(array_replace($fields, [
            'name' => 'Exclude',
            'budget' => 'under-2k',
            'subject' => 'Outside budget',
            'status' => ContactSubmissionStatus::Resolved,
        ]));
        $outside->forceFill(['created_at' => now()->subYear()])->save();

        $this->get('/admin/contact-submissions')->assertOk();

        $page = Livewire::test(ManageContactSubmissions::class)
            ->sortTable('name', 'asc')
            ->filterTable('status', ContactSubmissionStatus::New)
            ->filterTable('budget', '2k-5k')
            ->filterTable('submitted_at', ['from' => today()->toDateString(), 'until' => today()->toDateString()])
            ->assertCanSeeTableRecords([$second, $first], inOrder: true)
            ->assertCanNotSeeTableRecords([$outside])
            ->callAction(TestAction::make('downloadCsv')->table())
            ->assertFileDownloaded('contact-submissions.csv');

        $csv = base64_decode($page->effects['download']['content']);
        $this->assertStringNotContainsString('Outside budget', $csv);
        $this->assertStringContainsString("'=1+1", $csv);
        $this->assertStringContainsString("'+880 1540-306102", $csv);
        $this->assertLessThan(strpos($csv, 'Zeta'), strpos($csv, 'Alpha'));

        $selected = Livewire::test(ManageContactSubmissions::class)
            ->selectTableRecords([$first])
            ->callAction(TestAction::make('downloadSelectedCsv')->table()->bulk())
            ->assertFileDownloaded('selected-contact-submissions.csv');
        $selectedCsv = base64_decode($selected->effects['download']['content']);
        $this->assertStringContainsString('Zeta', $selectedCsv);
        $this->assertStringNotContainsString('Alpha', $selectedCsv);

        Livewire::test(ManageContactSubmissions::class)
            ->callAction(TestAction::make('edit')->table($first), [
                'status' => ContactSubmissionStatus::InProgress->value,
                'internal_notes' => 'Follow up tomorrow.',
            ])
            ->assertHasNoActionErrors();
        $this->assertSame(ContactSubmissionStatus::InProgress, $first->refresh()->status);
        $this->assertSame('Follow up tomorrow.', $first->internal_notes);
    }

    public function test_footer_validates_and_saves_each_newsletter_email_once(): void
    {
        $pageUrl = route('contact');
        $formUrl = $pageUrl.'#newsletter-form';
        $page = $this->get($pageUrl)
            ->assertOk()
            ->assertSee('action="'.route('newsletter.store').'"', false)
            ->assertSee('name="newsletter_email"', false);
        $sessionCookie = config('session.cookie');
        $this->disableCookieEncryption()->withCookie($sessionCookie, $page->getCookie($sessionCookie, decrypt: false)->getValue());

        $this->from($pageUrl)->post(route('newsletter.store'), ['newsletter_email' => ['invalid']])
            ->assertRedirect($formUrl)
            ->assertSessionHasErrorsIn('newsletter', ['newsletter_email']);
        $this->get($pageUrl)->assertOk()->assertSee('id="newsletter-error"', false);
        $this->assertDatabaseEmpty('newsletter_subscriptions');

        $this->from($pageUrl)->post(route('newsletter.store'), [
            'newsletter_email' => 'Reader@Example.com',
            'status' => 'resolved',
        ])->assertStatus(303)->assertRedirect($formUrl);
        $this->get($pageUrl)->assertOk()->assertSee('Thanks for subscribing.');

        $subscription = NewsletterSubscription::query()->sole();
        $this->assertSame('reader@example.com', $subscription->email);
        $this->assertSame(ContactSubmissionStatus::New, $subscription->status);
        $subscription->update(['status' => ContactSubmissionStatus::Resolved, 'internal_notes' => 'Reviewed.']);

        $this->from('https://example.org')->post(route('newsletter.store'), ['newsletter_email' => 'reader@example.com'])
            ->assertStatus(303)
            ->assertRedirect(route('home').'#newsletter-form');
        $this->assertDatabaseCount('newsletter_subscriptions', 1);
        $this->assertSame(ContactSubmissionStatus::Resolved, $subscription->refresh()->status);
        $this->assertSame('Reviewed.', $subscription->internal_notes);
        $this->assertDatabaseEmpty('contact_submissions');
    }

    public function test_newsletter_admin_groups_and_exports_submissions(): void
    {
        $this->get('/admin/newsletter-subscriptions')->assertRedirect('/admin/login');
        $this->signInAdmin();
        $this->get('/admin/newsletter-subscriptions')
            ->assertOk()
            ->assertSee('Data Collection')
            ->assertSee('Contact Submissions')
            ->assertSee('Newsletter Subscriptions');

        $first = NewsletterSubscription::query()->create(['email' => 'zeta@example.com']);
        $second = NewsletterSubscription::query()->create(['email' => 'alpha@example.com']);
        $outside = NewsletterSubscription::query()->create(['email' => 'outside@example.com']);
        $outside->forceFill(['created_at' => now()->subYear()])->save();

        $page = Livewire::test(ManageNewsletterSubscriptions::class)
            ->searchTable('example.com')
            ->sortTable('email', 'asc')
            ->filterTable('status', ContactSubmissionStatus::New)
            ->filterTable('subscribed_at', ['from' => today()->toDateString(), 'until' => today()->toDateString()])
            ->assertCanSeeTableRecords([$second, $first], inOrder: true)
            ->assertCanNotSeeTableRecords([$outside])
            ->callAction(TestAction::make('downloadCsv')->table())
            ->assertFileDownloaded('newsletter-subscriptions.csv');
        $csv = base64_decode($page->effects['download']['content']);
        $this->assertStringContainsString($first->email, $csv);
        $this->assertStringContainsString($second->email, $csv);
        $this->assertStringNotContainsString($outside->email, $csv);
        $this->assertLessThan(strpos($csv, $first->email), strpos($csv, $second->email));

        $selected = Livewire::test(ManageNewsletterSubscriptions::class)
            ->selectTableRecords([$first])
            ->callAction(TestAction::make('downloadSelectedCsv')->table()->bulk())
            ->assertFileDownloaded('selected-newsletter-subscriptions.csv');
        $selectedCsv = base64_decode($selected->effects['download']['content']);
        $this->assertStringContainsString($first->email, $selectedCsv);
        $this->assertStringNotContainsString($second->email, $selectedCsv);
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
