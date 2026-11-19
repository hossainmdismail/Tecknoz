# Tecknoz Laravel Starter

A reusable Laravel 13.4 and Filament 5.4.5 starter extracted from the shared admin setup in SiliconBari. It requires PHP 8.4+, Composer, and the PDO SQLite extension for the default database.

## Local setup

```sh
composer setup
php artisan make:admin
php artisan serve
```

Open `http://127.0.0.1:8000/admin` and sign in with the account you created. The setup command installs locked PHP dependencies, publishes Filament assets, creates the local environment and SQLite database, runs the migrations and settings seeder, and links public upload storage. Admin access requires the `is_admin` flag set by `make:admin`.

SQLite is the default for local development. To use MySQL, create an empty database, set `DB_CONNECTION=mysql` and the MySQL connection values in `.env`, then run `php artisan migrate --seed`. Set `APP_URL` to the site's URL so uploaded asset links and fallback canonical URLs use the right host.

## What's included

- **Global Settings** manages branding, contact details, social links, footer copy, default metadata, social previews, the canonical base URL, and fallback robots directives.
- **SEO Pages** manages per-page metadata, Open Graph, canonical overrides, robots directives, and JSON-LD through a unique page key.
- **Marketing Settings** manages Google Tag Manager, GA4, Meta Pixel, TikTok Pixel, webmaster verification, and trusted admin-managed snippets for the head, body start, and body end.
- **Dashboard** includes Visit Website, Account Overview, Content Overview, and Quick Actions with active session controls. Session controls use the database session driver.
- **Database** includes users, password resets, sessions, cache, queues, global settings, marketing settings, and SEO pages. Seed data initializes the two settings records.

## Frontend theme

The Tecknoz Webflow homepage is wired at `/`. Find the homepage in `resources/views/frontend/pages/home.blade.php`, the default layout, header, footer and CTA under `resources/views/frontend/layout/`, and the exported assets under `public/frontend/`.

## Add another theme page

Extend `frontend.layout.default` from each theme view, and set a unique SEO key that matches an active record in **SEO Pages**. The starter homepage uses `home`.

```blade
@extends('frontend.layout.default')

@section('seo_key', 'about')
{{-- Set webflow_page to the page ID from the corresponding export. --}}

@section('content')
    <h1>About</h1>
@endsection
```

The layout loads SEO and marketing settings, renders the head tags and scripts, and provides `styles` and `scripts` stacks for theme assets. Set page-level Blade defaults with `title`, `description`, `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, and `twitter_image` sections as needed. Active SEO records take precedence for the page fields they supply, followed by the corresponding global defaults. The home view shows how to read global branding from `FrontendSeo::globalSettings()`.

The homepage uses the exported CSS and scripts directly. The footer newsletter is display-only until a subscription flow is added. Keep the public route named `home` for the dashboard's Visit Website link. The optional Vite scaffold is available when a theme needs bundled assets. Run `npm install` and `npm run dev` after adding the `@vite` directive to the theme layout.

## Verification

```sh
composer test
```
