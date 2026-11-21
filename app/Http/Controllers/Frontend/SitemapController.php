<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\SeoPages;
use App\Support\FrontendSeo;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function show(FrontendSeo $seo): Response
    {
        $paths = $this->pathsBySeoKey();
        $overrides = SeoPages::query()->where('is_active', true)
            ->get(['page_key', 'canonical_url', 'robots_index', 'robots_follow'])->keyBy('page_key');

        $urls = [];
        foreach ($paths as $key => $path) {
            $override = $overrides->get($key);
            if (Str::contains(strtolower($seo->robotsFor($override)), ['noindex', 'none'])) {
                continue;
            }

            $url = $seo->canonicalUrlForPath($path);
            $canonical = $override?->canonical_url ?: $url;
            if (rtrim($canonical, '/') === $url) {
                $urls[] = $canonical;
            }
        }

        return response()->view('frontend.sitemap', ['urls' => $urls], headers: [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    public function robots(FrontendSeo $seo): Response
    {
        return response("User-agent: *\nDisallow:\nSitemap: ".$seo->canonicalUrlForPath('sitemap.xml')."\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    private function pathsBySeoKey(): array
    {
        $paths = [];
        foreach (['home', 'about', 'clients', 'services', 'events', 'contact', 'projects', 'blogs', 'privacy-policy', 'terms-of-service'] as $key) {
            $paths[$key] = route($key, absolute: false);
        }

        foreach (config('tecknoz.service_slugs') as $slug) {
            $paths['service.'.$slug] = route('services.show', $slug, absolute: false);
        }

        foreach (array_keys(config('industries')) as $slug) {
            $paths['industry.'.$slug] = route('industries.show', $slug, absolute: false);
        }

        foreach (Project::query()->published()->orderBy('id')->get(['id', 'slug']) as $project) {
            $paths['project.detail.'.$project->id] = route('projects.show', $project->slug, absolute: false);
        }

        foreach (BlogPost::query()->published()->orderBy('id')->get(['id', 'slug']) as $post) {
            $paths['blog.detail.'.$post->id] = route('blogs.show', $post->slug, absolute: false);
        }

        foreach (BlogCategory::query()->orderBy('id')->get(['id', 'slug']) as $category) {
            $paths['blog.category.'.$category->id] = route('blogs.category', $category->slug, absolute: false);
        }

        return $paths;
    }
}
