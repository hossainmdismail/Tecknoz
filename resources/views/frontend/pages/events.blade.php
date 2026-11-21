@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603dd')
@section('seo_key', 'events')
@section('title', 'Tecknoz Events | Client Meetings, Team Gatherings & Company Milestones')
@section('description', 'Explore Tecknoz events, client meetings, team workshops, and company milestones. A closer look at how we collaborate, grow, and build lasting partnerships.')


@section('content')
  <section class="hero-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="hero-section-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Event Highlights <em class="hero-highligt">&amp; <br>Additional Insights</em></h1>
          <p class="heading">Get valuable insights from our events</p>
        </div>
        <div class="hero-buttons">
          <a @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) data-wf--button--variant="lg" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268 w-inline-block">
            <div class="button-text-wrap">
              <div class="button-text-inner-wrap w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268">
                <div class="button-text">Start a Project</div>
              </div>
              <div class="button-text-inner-wrap w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268">
                <div class="button-text">Start a Project</div>
              </div>
            </div>
            <div class="button-icon-wrap w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268">
              <div class="button-icon-inner-wrap">
                <div class="button-icon w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></div>
                <div class="button-icon w-variant-1ba1ea8d-7a56-aa3a-c771-743f9cae1268 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
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
    <div data-poster-url="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" data-video-urls="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }},{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-autoplay="true" data-loop="false" data-wf-ignore="true" class="hero-background w-background-video w-background-video-atom"><video id="9b8f5166-08f1-73ad-a47a-b0b6595c46dc-video" autoplay="" poster="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }}" data-wf-ignore="true">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-wf-ignore="true">
      </video></div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="info-cards">
        @forelse ($events as $event)
          <article class="info-card">
            <div class="info-text-wrap">
              @if ($event->date_label)
                <p class="info-card-description">{{ $event->date_label }}</p>
              @endif
              <h2 class="info-card-title">{{ $event->title }}</h2>
              <p class="info-card-description">{{ $event->summary }}</p>
            </div>
            @if (Str::startsWith((string) $event->url, ['https://', 'http://']))
              <a class="info-card-link" href="{{ $event->url }}">Event details</a>
            @endif
          </article>
        @empty
          <p class="section-subtitle">No events to show yet.</p>
        @endforelse
      </div>
    </div>
  </section>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
