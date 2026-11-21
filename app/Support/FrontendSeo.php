<?php

namespace App\Support;

use App\Models\GlobalSetting;
use App\Models\SeoPages;
use Illuminate\Support\Str;

class FrontendSeo
{
    public function resolve(?string $pageKey, array $fallback = []): array
    {
        $global = $this->globalSettings();
        $page = $this->seoPage($pageKey);

        $title = $page?->meta_title
            ?: $global?->default_meta_title
            ?: ($fallback['title'] ?? null)
            ?: $global?->site_name
            ?: config('app.name', 'My Website');

        $description = $page?->meta_description
            ?: $global?->default_meta_description
            ?: ($fallback['description'] ?? null)
            ?: $global?->company_short_description
            ?: config('app.name', 'My Website');

        $ogTitle = $page?->og_title
            ?: $global?->default_og_title
            ?: ($fallback['og_title'] ?? null)
            ?: $title;

        $ogDescription = $page?->og_description
            ?: $global?->default_og_description
            ?: ($fallback['og_description'] ?? null)
            ?: $description;

        $ogImage = $this->toAbsoluteUrl(
            $page?->og_image_url
            ?: $global?->default_og_image_url
            ?: ($fallback['og_image'] ?? null)
        );

        $twitterTitle = ($fallback['twitter_title'] ?? null) ?: $ogTitle;
        $twitterDescription = ($fallback['twitter_description'] ?? null) ?: $ogDescription;
        $twitterImage = $this->toAbsoluteUrl(($fallback['twitter_image'] ?? null) ?: $ogImage);

        $canonical = $page?->canonical_url ?: $this->canonicalUrlForPath(request()->path());
        $robots = $this->robotsFor($page);

        $schema = $this->generateSchema($global, $page);

        return [
            'title' => $title,
            'description' => $description,
            'og_title' => $ogTitle,
            'og_description' => $ogDescription,
            'og_image' => $ogImage,
            'twitter_title' => $twitterTitle,
            'twitter_description' => $twitterDescription,
            'twitter_image' => $twitterImage,
            'canonical_url' => $canonical,
            'robots' => $robots,
            'schema_json' => $schema,
            'favicon_url' => $this->toAbsoluteUrl($global?->favicon_url),
            'site_name' => $global?->site_name ?: config('app.name', 'My Website'),
        ];
    }

    protected function generateSchema(?GlobalSetting $global, ?SeoPages $page): array
    {
        $channels = collect($global?->contact_channels);
        $phone = $channels->firstWhere('type', 'phone')['value'] ?? null;
        $email = $channels->firstWhere('type', 'email')['value'] ?? null;

        $schemas = [];

        $schemas[] = array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $global?->site_name ?: config('app.name'),
            'url' => $this->canonicalBaseUrl(),
            'logo' => $this->toAbsoluteUrl($global?->logo_url),
            'description' => $global?->company_short_description,
            'contactPoint' => ($phone || $email) ? array_filter([
                '@type' => 'ContactPoint',
                'telephone' => $phone,
                'email' => $email,
                'contactType' => 'customer service',
            ]) : null,
            'sameAs' => array_values(array_filter([
                $global?->facebook_url,
                $global?->twitter_url,
                $global?->linkedin_url,
                $global?->youtube_url,
                $global?->instagram_url,
            ])),
        ]);

        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $global?->site_name ?: config('app.name'),
            'url' => $this->canonicalBaseUrl(),
        ];

        if ($page?->schema_json) {
            $schemas[] = $page->schema_json;
        }

        return $schemas;
    }

    public function globalSettings(): ?GlobalSetting
    {
        return once(fn (): ?GlobalSetting => GlobalSetting::query()->find(GlobalSetting::SETTINGS_ID));
    }

    protected function seoPage(?string $pageKey): ?SeoPages
    {
        if (blank($pageKey)) {
            return null;
        }

        return SeoPages::query()
            ->where('page_key', $pageKey)
            ->where('is_active', true)
            ->first();
    }

    public function canonicalBaseUrl(): string
    {
        return rtrim($this->globalSettings()?->canonical_base_url ?: (config('app.url') ?: url('/')), '/');
    }

    public function canonicalUrlForPath(string $path): string
    {
        $path = trim($path, '/');

        return $this->canonicalBaseUrl().($path === '' ? '' : '/'.$path);
    }

    public function robotsFor(?SeoPages $page): string
    {
        return $page
            ? implode(',', [
                $page->robots_index ? 'index' : 'noindex',
                $page->robots_follow ? 'follow' : 'nofollow',
            ])
            : ($this->globalSettings()?->default_robots_meta ?: 'index,follow');
    }

    protected function toAbsoluteUrl(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', '//'])) {
            return $value;
        }

        return url($value);
    }
}
