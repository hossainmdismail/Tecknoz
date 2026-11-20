<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Models\BlogPost;
use App\Models\Brand;
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
        ->limit(6)
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
    ->whereIn('slug', [
        'design-development',
        'semiconductor',
        'ai-automation',
        'digital-marketing',
        'recruitment',
        'business',
        'stuff-augmentation',
    ])
    ->name('services.show');

Route::view('/events', 'frontend.pages.events')->name('events');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/category/{category:slug}', [BlogController::class, 'index'])->name('blogs.category');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
