<a href="{{ route('projects.show', $project->slug) }}"
   @class(['portfolio-card w-inline-block', 'w-variant-fa4058bb-b894-ea53-b8ee-b23e62355733' => $compact ?? false])
   data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab">
    <div @class(['portfolio-image-wrap portfolio-image project-card-media', 'w-variant-fa4058bb-b894-ea53-b8ee-b23e62355733' => $compact ?? false])
         @if ($project->color) style="--project-color: {{ $project->color }}" @endif>
        @if ($project->image_url)
            <img src="{{ $project->image_url }}" loading="lazy" alt="">
        @endif
    </div>
    <div @class(['portfolio-text-wrap', 'w-variant-fa4058bb-b894-ea53-b8ee-b23e62355733' => $compact ?? false])>
        <h3 class="portfolio-title">{{ $project->name }}</h3>
        <div class="portfolio-icons w-embed" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none">
                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
</a>
