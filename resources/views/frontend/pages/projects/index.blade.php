@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d2')
@section('seo_key', 'projects')
@section('title', 'Projects | Tecknoz')
@section('description', 'Explore the projects Tecknoz develops to deliver meaningful results.')

@section('content')
  <section class="hero-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="hero-section-wrapper">
        <div class="hero-text">
          <h1 class="hero-title mini">Impactful <em class="hero-highligt mini">Developments</em><br> Meaningful <em class="hero-highligt mini">Results</em></h1>
          <p class="heading">All project here is developed to deliver impact not just impressions.</p>
        </div>
        <div class="hero-buttons">
          <a @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) data-wf--button--variant="primary" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-variant-f2415d8a-764c-9e55-6410-d370509a60dc w-inline-block">
            <div class="button-text-wrap">
              <div class="button-text-inner-wrap">
                <div class="button-text w-variant-f2415d8a-764c-9e55-6410-d370509a60dc">Start a Project</div>
              </div>
              <div class="button-text-inner-wrap">
                <div class="button-text w-variant-f2415d8a-764c-9e55-6410-d370509a60dc">Start a Project</div>
              </div>
            </div>
            <div class="button-icon-wrap w-variant-f2415d8a-764c-9e55-6410-d370509a60dc">
              <div class="button-icon-inner-wrap">
                <div class="button-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></div>
                <div class="button-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></div>
              </div>
            </div>
          </a>
          <a href="https://calendar.app.google/f7qKpVB4fxBFghAG9" data-w-id="84f78f4c-8ba7-077d-f98c-f77592ca6940" target="_blank" rel="noopener noreferrer" class="button text calendly w-inline-block">
            <div class="button-text-wrap text-2">
              <div class="button-text-inner-wrap text-5">
                <div class="button-text text-6">Schedule a Call</div>
              </div>
              <div class="button-text-inner-wrap text-5">
                <div class="button-text text-6">Schedule a Call</div>
              </div>
            </div>
            <div class="button-icon-wrap text-7">
              <div class="button-icon-inner-wrap text-8">
                <div class="button-icon text-10 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></div>
                <div class="button-icon text-10 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="hero-bottom-shadow"></div>
    <div data-poster-url="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" data-video-urls="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }},{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-autoplay="true" data-loop="false" data-wf-ignore="true" class="hero-background w-background-video w-background-video-atom"><video id="cac9e0ff-765b-a918-15dc-30646c636633-video" autoplay="" poster="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }}" data-wf-ignore="true">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-wf-ignore="true">
      </video></div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
        @if ($projects->isNotEmpty())
            <div class="portfolio-wrapper">
                <div class="project-content">
                    @foreach ($projects as $project)
                        @include('frontend.pages.projects.card', ['project' => $project, 'compact' => true])
                    @endforeach
                </div>

                @if ($projects->hasPages())
                    <nav class="project-pagination" aria-label="Project pages">
                        @if ($projects->previousPageUrl())
                            <a href="{{ $projects->previousPageUrl() }}" rel="prev">Previous projects</a>
                        @endif
                        @if ($projects->nextPageUrl())
                            <a href="{{ $projects->nextPageUrl() }}" rel="next">More projects</a>
                        @endif
                    </nav>
                @endif
            </div>
        @else
            <p class="section-subtitle">No projects to show yet.</p>
        @endif
    </div>
  </section>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
