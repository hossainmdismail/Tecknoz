<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\NewsletterSubscriptionController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('frontend.pages.home', [
    'brands' => Brand::query()->active()->orderBy('id')->get(),
    'faqs' => Faq::query()->where('is_active', true)->orderBy('sort_order')->orderBy('id')->get(),
    'featuredProjects' => Project::query()
        ->published()
        ->where('is_featured', true)
        ->latest('published_at')
        ->latest('id')
        ->limit(8)
        ->get(),
    'featuredPosts' => BlogPost::query()
        ->published()
        ->where('is_featured', true)
        ->with('category')
        ->latest('published_at')
        ->latest('id')
        ->limit(3)
        ->get(),
]))->name('home');

Route::view('/about', 'frontend.pages.about')->name('about');

Route::get('/clients', fn () => view('frontend.pages.clients', [
    'brands' => Brand::query()->active()->orderBy('id')->get(),
]))->name('clients');

Route::view('/service', 'frontend.pages.services.index')->name('services');
Route::get('/service/{slug}', fn (string $slug) => view('frontend.pages.services.'.$slug))
    ->whereIn('slug', config('tecknoz.service_slugs'))
    ->name('services.show');

Route::get('/events', fn () => view('frontend.pages.events', [
    'events' => Event::query()->active()->orderBy('sort_order')->orderBy('id')->get(),
]))->name('events');

Route::get('/industry/{slug}', fn (string $slug) => view('frontend.pages.industry', [
    'industry' => config('industries.'.$slug),
    'slug' => $slug,
]))->whereIn('slug', array_keys(config('industries')))->name('industries.show');

Route::view('/privacy-policy', 'frontend.pages.privacy-policy')->name('privacy-policy');
Route::view('/terms-of-service', 'frontend.pages.terms-of-service')->name('terms-of-service');

Route::get('/sitemap.xml', [SitemapController::class, 'show'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/category/{category:slug}', [BlogController::class, 'index'])->name('blogs.category');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
Route::post('/newsletter/subscribe', NewsletterSubscriptionController::class)
    ->middleware('throttle:5,1,newsletter:')
    ->name('newsletter.store');
