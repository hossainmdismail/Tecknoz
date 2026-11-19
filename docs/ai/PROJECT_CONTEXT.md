# Tecknoz AI handoff

## Project purpose and current scope

Tecknoz is a reusable Laravel starter extracted from the shared admin setup in SiliconBari. The installed Composer lock uses Laravel 13.4.0, Filament 5.4.5, and Livewire 4.2.4. PHP 8.4 or later is required. The public site uses the supplied Tecknoz Webflow export. Only its homepage is wired at `/`, named `home`. Add the other pages and their content models as requested. SiliconBari supplied the shared admin structure.

The Filament panel ID and path are both `admin`. It provides login, profile editing, and the Visit Website, Account Overview, Content Overview, and Quick Actions widgets. Visit Website links to the named `home` route. Content Overview counts SEO entries and active entries. Quick Actions links to SEO and settings and manages the signed-in admin's other sessions when the database session driver is enabled. The panel takes its site name, logo, and favicon from Global Settings when supplied. Access is controlled by `User::canAccessPanel()` using `users.is_admin`.

## Local setup

```sh
composer setup
php artisan make:admin
php artisan serve
```

`composer setup` uses the locked dependencies, publishes Filament assets, creates the local environment and SQLite file when needed, runs migrations and the settings seeder, and links public storage. `make:admin` prompts for the admin credentials. Open `http://127.0.0.1:8000/admin`. Set `APP_URL` to the deployed site's public URL. It feeds the public upload URL, fallback canonical host, and default structured data. For MySQL, configure an empty database in `.env` and run `php artisan migrate --seed`.

## Source map

| Area | Entry point |
| --- | --- |
| Routes and base page | [routes/web.php](../../routes/web.php), [home.blade.php](../../resources/views/frontend/pages/home.blade.php) |
| Public layout | [default layout](../../resources/views/frontend/layout/default.blade.php), [shared frontend partials](../../resources/views/frontend/layout) |
| SEO resolution and markup | [FrontendSeo](../../app/Support/FrontendSeo.php), [SEO head partial](../../resources/views/frontend/layout/seo-head.blade.php) |
| Marketing resolution and markup | [FrontendMarketing](../../app/Support/FrontendMarketing.php), [marketing head partial](../../resources/views/frontend/layout/marketing-head.blade.php), [marketing body-start partial](../../resources/views/frontend/layout/marketing-body-start.blade.php) |
| Admin panel and widgets | [AdminPanelProvider](../../app/Providers/Filament/AdminPanelProvider.php), [widget classes](../../app/Filament/Widgets), [widget views](../../resources/views/filament/widgets) |
| Settings and SEO admin | [Global Settings](../../app/Filament/Pages/GlobalSettings.php), [Marketing Settings](../../app/Filament/Pages/MarketingSettings.php), [SEO Pages resource](../../app/Filament/Resources/SeoPages/SeoPagesResource.php) |
| Database and verification | [migrations](../../database/migrations), [DatabaseSeeder](../../database/seeders/DatabaseSeeder.php), [integration tests](../../tests/Feature/StarterSetupTest.php) |

## Database and admin ownership

| Table or group | Purpose |
| --- | --- |
| `users`, `password_reset_tokens`, `sessions` | Laravel authentication and session state. A separate migration adds `is_admin` to `users`. |
| `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs` | Laravel cache and queue infrastructure. |
| `global_settings` | [GlobalSetting](../../app/Models/GlobalSetting.php) singleton at ID `1`. Edit in `/admin/global-settings`. |
| `marketing_settings` | [MarketingSettings](../../app/Models/MarketingSettings.php) singleton at ID `1`. Edit in `/admin/marketing-settings`. |
| `seo_pages` | [SeoPages](../../app/Models/SeoPages.php) records with unique `page_key`. Manage in `/admin/seo-pages`. |

The database seeder initializes the singleton settings records and preserves saved edits on subsequent runs. A new install starts with an empty SEO Pages table and an empty users table. Tracking integrations default to off. Global branding and default Open Graph image files are stored under `settings/` on the `public` disk. Per-page Open Graph uploads use `seo-pages/` on that disk. Filament stores relative upload paths. Use the model accessors `logo_url`, `favicon_url`, `default_og_image_url`, and `og_image_url` when rendering files. Public delivery uses the `public/storage` link created by `php artisan storage:link`.

## Tecknoz theme files and adding pages

- The shared Blade files are `default.blade.php`, `header.blade.php`, `footer.blade.php`, and `cta.blade.php` in `resources/views/frontend/layout/`. Page views live in `resources/views/frontend/pages/`. Include the reusable CTA on pages that use it.
- Keep the exported CSS, fonts, images, video and Webflow JavaScript under `public/frontend/`. Each new Webflow page should set `webflow_page` from its export's `data-wf-page` to preserve page-specific interactions. Pass exported local asset paths through Laravel's `asset()`. For `srcset`, generate a URL for each candidate and keep each width descriptor.
- The navigation partial uses named routes when available and links to matching homepage sections for the current preview. Add future routes with names the shared links request or update the links in the same change. The existing names are `about`, `clients`, `services`, `services.show` with `slug`, `projects`, `blogs`, `events`, `contact`, `privacy-policy`, and `terms-of-service`.
- The homepage content is the static theme export. The newsletter controls are display-only. The shared theme reads settings that already exist in the starter and falls back to the export's copy and assets.

1. Inventory the theme's real public routes and templates. For each route, record its Laravel route name, Blade view, SEO key strategy, metadata source, and robots policy. Add content tables and Filament resources as the theme requires them.
2. Extend `frontend.layout.default` for the shared HTML shell, header, footer, SEO, and marketing hooks. Keep the homepage route named `home`.
3. Keep the existing SEO resolver call, one SEO head partial, and the marketing hooks in the head, immediately after the opening body tag, and near the end of the body. Remove duplicate metadata, verification tags, and tracking snippets from imported theme markup. Put page assets into the `styles` and `scripts` stacks. The Vite scaffold is optional. Use `@vite` and the npm build workflow when the theme needs bundling.
4. Give each indexable public view a stable SEO key and useful content-based metadata. Use the same key in its Filament row whenever the page needs editor-controlled overrides. A route name and a page key are separate values. Pass the key explicitly through Blade. For a new deployment, enter SEO rows through Filament or seed agreed initial values by unique `page_key` while preserving editor changes.
5. Read global branding and site settings in the shared theme partials. Verify one saved global edit appears across multiple pages and one SEO Pages edit affects the intended key.

### Static page example

```php
// routes/web.php, once the theme has an About page
Route::view('/about', 'frontend.pages.about')->name('about');
```

```blade
@extends('frontend.layout.default')

@section('seo_key', 'about')
@section('title', 'About')
@section('description', 'Read about our company and what we do.')

@section('content')
    <h1>About</h1>
@endsection
```

In Filament, create an active SEO Pages row with Page Name `About`, Page Key `about`, and Page Type `static` to supply editor-managed metadata. The Blade values serve as fallbacks under the current resolver order. Page Name is an admin label. Page Type supports `static`, `dynamic`, `landing`, and `custom` for grouping. Lookup uses `page_key` and `is_active`.

### Dynamic detail page example

When the future theme has a collection with detail pages, pass the persistent record identifier or a deliberately stable slug in the key. A collection index and a detail page should have different keys. For example, a news index could use `news`, while a news detail uses `news.detail.{id}`. The key fits the existing `page_key` limit of 191 characters.

```blade
{{-- Example only. The future theme controller supplies $article. --}}
@extends('frontend.layout.default')

@section('seo_key', 'news.detail.' . $article->getKey())
@section('title', $article->title)
@section('description', $article->excerpt)

@section('content')
    <h1>{{ $article->title }}</h1>
@endsection
```

Create an active `dynamic` SEO Pages entry for a record if it needs dedicated metadata. The current resolver checks global defaults before Blade values, so a configured global meta title or description can take precedence over the article's Blade fallback. Populate the per-record SEO fields when each detail page must carry distinct metadata and global defaults are set. Any future change to the priority of model-derived metadata belongs in the shared resolver with tests for the selected priority.

## How every page receives SEO

The child view supplies `seo_key` and optional Blade defaults. The base layout calls `app(FrontendSeo::class)->resolve($pageKey, $fallbacks)`. The resolver reads the Global Settings singleton and looks up an active SEO Pages entry for the exact key. The SEO head partial renders the resulting tags server-side on the initial response.

| Output | Current precedence |
| --- | --- |
| Page title | Active page `meta_title` → global `default_meta_title` → Blade `title` → global `site_name` → `APP_NAME` |
| Description | Active page `meta_description` → global `default_meta_description` → Blade `description` → global `company_short_description` → `APP_NAME` |
| Open Graph title and description | Active page `og_title` and `og_description` → matching global defaults → matching Blade sections → resolved page title and description |
| Open Graph image | Active page image URL → global image URL → Blade `og_image` |
| Twitter card | Blade `twitter_title`, `twitter_description`, and `twitter_image` override matching resolved Open Graph values. The card uses `summary_large_image` when an image exists and `summary` otherwise. |
| Canonical URL | Active page `canonical_url` → `canonical_base_url` or `APP_URL` plus the request path. The generated canonical excludes query strings and adds no path for the homepage. |
| Robots | Active page `robots_index` and `robots_follow` → global `default_robots_meta` → `index,follow`. An active page uses its two switches even when its metadata fields are empty. |
| Structured data | Generated Organization and WebSite objects, with the active page's optional JSON-LD object appended. The layout also supports a `structured_data` Blade section for page markup when needed. |
| Site name and favicon | Global settings provide the site name and favicon URL. The layout falls back to `APP_NAME` and the theme favicon. |

Blank or inactive keys use the remaining fallback chain. For thank-you, preview, or other public utility pages that need `noindex`, assign a dedicated SEO key and set that record's robots switches explicitly. Review the rendered HTML for the effective directive. The starter has a static `public/robots.txt`. Sitemap and hreflang handling can be planned with the theme's real URL inventory and locale requirements.

## How every page receives global settings

SEO and admin branding already consume global settings. Public body elements such as the header, footer, and contact blocks receive the values when the theme reads the settings model and maps its fields into the markup. `FrontendSeo::globalSettings()` returns a nullable model and reuses the result within the request.

In the parent layout, resolve the settings before rendering the shared header and footer. If a child view needs settings in its `content` section, resolve them in that section or pass them from its controller. Blade evaluates the child sections before the parent layout, so a variable first assigned by the parent is unavailable when the child section is captured.

```blade
@php($globalSettings = app(\App\Support\FrontendSeo::class)->globalSettings())

@include('frontend.layout.header', ['globalSettings' => $globalSettings])
<main>
    @yield('content')
</main>
@include('frontend.layout.footer', ['globalSettings' => $globalSettings])
```

In either partial, use nullable access and render optional fields conditionally.

```blade
<a href="{{ route('home') }}">
    @if ($globalSettings?->logo_url)
        <img src="{{ $globalSettings->logo_url }}" alt="{{ $globalSettings->site_name }}">
    @else
        {{ $globalSettings?->site_name ?: config('app.name') }}
    @endif
</a>

@if ($globalSettings?->contact_email)
    <a href="mailto:{{ $globalSettings->contact_email }}">{{ $globalSettings->contact_email }}</a>
@endif
```

| Setting group | Available fields |
| --- | --- |
| Branding | `site_name`, `site_tagline`, `company_short_description`, and the `logo_url` and `favicon_url` accessors |
| Contact and location | `contact_email`, `contact_phone`, `whatsapp_number`, `address`, `map_url`, `map_embed_code` |
| Social profiles | `facebook_url`, `linkedin_url`, `twitter_url`, `youtube_url`, `instagram_url` |
| Footer | `footer_text`, `copyright_text` |
| Global SEO | `default_meta_title`, `default_meta_description`, `default_og_title`, `default_og_description`, `default_og_image_url` accessor, `canonical_base_url`, `default_robots_meta` |

Render ordinary settings through escaped Blade output. If the theme needs an embedded map, prefer a supported embed component with a validated URL. Review any intentional raw HTML rendering, including the source and allowed markup.

## How every page receives marketing settings

`FrontendMarketing::resolve()` loads the singleton and passes the settings to the layout. GTM, GA4, Meta Pixel, and TikTok Pixel each require the corresponding enable toggle and a nonblank ID. The head partial applies Google, Bing, and Meta verification token values and renders enabled scripts and the custom head snippet. The body-start partial applies GTM and Meta noscript fallbacks and the custom body-start snippet. The layout outputs the custom body-end snippet before the scripts stack. Custom scripts are HTML from trusted administrators. Public theme views inherit this behavior through the shared layout.

## Verification after a theme change

- Run `composer test` and `php artisan route:list`. The existing suite covers admin creation and login, dashboard rendering, settings writes, media uploads, SEO create and edit, fallback after deactivation, and session revocation.
- Inspect server-rendered HTML for a static page, a detail page when present, and a page with no active SEO row. Check the title, description, canonical URL, robots, Open Graph, Twitter card, favicon, and JSON-LD. Confirm there is a single set of head tags and that each page resolves the intended SEO key.
- Save a global logo or footer update in Filament, then check multiple public routes. Verify the public upload URL resolves and the new value appears in the shared theme UI.
- Verify that a tracking toggle and ID control markup in the intended document position. Check that the imported theme loads each enabled integration once.
- Confirm `/`, `/admin`, the named `home` route, and the final theme's intended public routes still work.
