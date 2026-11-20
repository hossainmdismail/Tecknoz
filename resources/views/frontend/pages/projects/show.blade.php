@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d7')
@section('seo_key', 'project.detail.' . $project->getKey())
@section('title', $project->name)
@section('description', $project->summary ?? '')
@section('og_image', $project->image_url ?? '')

@section('content')
    <section class="section content">
        <div class="w-layout-blockcontainer container w-container">
            <div class="content-title-wrapper">
                <div class="blog-title-heading">
                    <time class="date primary" datetime="{{ $project->published_at->toDateString() }}">{{ $project->published_at->format('d M Y') }}</time>
                    <h1 class="section-title blog-page-title">{{ $project->name }}</h1>
                </div>
                @if ($project->summary)
                    <p class="section-subtitle">{{ $project->summary }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="section top-0">
        <div class="w-layout-blockcontainer container w-container">
            <div class="project-wrapper">
                @if ($project->image_url || $project->client || $project->client_logo_url || $project->deadline || $project->industry)
                    <div @class(['project-thumbnail', 'project-thumbnail--without-image' => ! $project->image_url])
                         @if ($project->color) style="--project-color: {{ $project->color }}" @endif>
                        @if ($project->image_url)
                            <img src="{{ $project->image_url }}" alt="" class="project-image">
                        @endif

                        @if ($project->client || $project->client_logo_url || $project->deadline || $project->industry)
                            <div class="project-badge">
                                @if ($project->client || $project->client_logo_url)
                                    <div class="badge-text-wrap">
                                        <div class="badge-title">Client</div>
                                        @if ($project->client_logo_url)
                                            <img src="{{ $project->client_logo_url }}" alt="{{ $project->client ? '' : 'Client logo' }}" class="project-client-logo">
                                        @endif
                                        @if ($project->client)
                                            <div class="badge-subtitle">{{ $project->client }}</div>
                                        @endif
                                    </div>
                                @endif
                                @if ($project->deadline)
                                    <div class="badge-text-wrap">
                                        <div class="badge-title">Deadline</div>
                                        <time class="badge-subtitle" datetime="{{ $project->deadline->toDateString() }}">{{ $project->deadline->format('d M Y') }}</time>
                                    </div>
                                @endif
                                @if ($project->industry)
                                    <div class="badge-text-wrap">
                                        <div class="badge-title">Industry</div>
                                        <div class="badge-subtitle">{{ $project->industry }}</div>
                                    </div>
                                @endif
                            </div>
                            @if ($project->image_url)
                                <div class="project-shade"></div>
                            @endif
                        @endif
                    </div>
                @endif

                @if ($project->details)
                    <div class="content">
                        <div class="rich-text w-richtext">{!! \Illuminate\Support\Str::sanitizeHtml($project->details) !!}</div>
                    </div>
                @endif

                @if ($project->services_rendered)
                    <div class="content">
                        <h2 class="section-title">Services Rendered</h2>
                        <div class="w-richtext">{!! \Illuminate\Support\Str::sanitizeHtml($project->services_rendered) !!}</div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
