<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(?BlogCategory $category = null): View
    {
        $posts = BlogPost::query()->published()->with('category');

        if ($category) {
            $posts->whereBelongsTo($category, 'category');
        }

        return view('frontend.pages.blogs.index', [
            'category' => $category,
            'categories' => BlogCategory::query()->orderBy('name')->get(),
            'posts' => $posts->latest('published_at')->latest('id')->simplePaginate(12),
        ]);
    }

    public function show(string $slug): View
    {
        $post = BlogPost::query()->published()->with('category')->where('slug', $slug)->firstOrFail();
        $related = BlogPost::query()->published()->with('category')->whereKeyNot($post->getKey());

        if ($post->blog_category_id) {
            $related->orderByRaw('CASE WHEN blog_category_id = ? THEN 0 ELSE 1 END', [$post->blog_category_id]);
        }

        return view('frontend.pages.blogs.show', [
            'post' => $post,
            'relatedPosts' => $related->latest('published_at')->latest('id')->limit(3)->get(),
        ]);
    }
}
