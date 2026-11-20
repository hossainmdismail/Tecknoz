@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d5')
@section('seo_key', 'blog.detail.' . $post->getKey())
@section('title', $post->title)
@section('description', $post->summary ?? '')
@section('og_image', $post->image_url ?? $post->thumbnail_url ?? '')

@section('content')
    <section class="section content">
        <div class="w-layout-blockcontainer container w-container">
            <div class="content-title-wrapper">
                <div class="blog-title-heading">
                    <time class="date primary" datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('F j, Y') }}</time>
                    <h1 class="section-title blog-page-title">{{ $post->title }}</h1>
                </div>
                @if ($post->summary)
                    <p class="section-subtitle">{{ $post->summary }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="section top-0">
        <div class="w-layout-blockcontainer container w-container">
            <div class="blog-content-wrapper">
                <div class="blog-info-cointent">
                    @if ($post->category || $post->read_time)
                        <div class="blog-info-card">
                            @if ($post->category)
                                <div @class(['info-box', 'border-none' => ! $post->read_time])>
                                    <div class="blog-info-name">Category</div>
                                    <a class="blog-info-answer" href="{{ route('blogs.category', $post->category->slug) }}">{{ $post->category->name }}</a>
                                </div>
                            @endif
                            @if ($post->read_time)
                                <div class="info-box border-none">
                                    <div class="blog-info-name">Reading Time</div>
                                    <div class="read-time-wrapper">
                                        <div class="blog-info-answer">{{ $post->read_time }}</div>
                                        <div class="blog-info-answer">{{ Str::plural('minute', $post->read_time) }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div id="w-node-_9686791b-3994-4c1e-dde5-b1a0e508a07b-a6c603d5" class="blog-content">
                    @if ($image = $post->image_url ?? $post->thumbnail_url)
                        <img src="{{ $image }}" alt="" class="blog-main-image">
                    @endif
                    @if ($post->body)
                        <div class="blog-post-body">
                            <div class="w-richtext">{!! Str::sanitizeHtml($post->body) !!}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if ($relatedPosts->isNotEmpty())
        <section class="section top-0">
            <div class="w-layout-blockcontainer container w-container">
                <div class="article-wrapper">
                    <div class="article-header">
                        <div class="article-header-left">
                            <h2 class="section-title">Related Articles</h2>
                            <p class="section-subtitle"><strong>Discover more stories, insights, and ideas from across our blog</strong></p>
                        </div>
                        <a href="{{ route('blogs') }}" class="blog-badge">All Articles</a>
                    </div>
                    <div class="article-content">
                        @foreach ($relatedPosts as $relatedPost)
                            @include('frontend.pages.blogs.card', ['post' => $relatedPost])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
