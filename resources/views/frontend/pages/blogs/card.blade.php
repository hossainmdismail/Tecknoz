<a href="{{ route('blogs.show', $post->slug) }}" data-w-id="8a0f0c72-2ace-1b01-1571-97d1d98af2db" class="blog-card w-inline-block">
    @if ($post->thumbnail_url)
        <div class="blog-image-wrap">
            <img src="{{ $post->thumbnail_url }}" loading="lazy" alt="" class="blog-image">
        </div>
    @endif
    <div class="blog-text-block">
        @if ($post->category)
            <div class="blog-date">
                <div class="date">{{ $post->category->name }}</div>
            </div>
        @endif
        <div class="blog-title">{{ $post->title }}</div>
    </div>
</a>
