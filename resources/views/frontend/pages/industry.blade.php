@extends('frontend.layout.default')

@section('seo_key', 'industry.'.$slug)
@section('title', $industry['name'].' Services | Tecknoz')
@section('description', $industry['description'])

@section('content')
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="blog-heading">
        <h1 class="section-title-2">{{ $industry['name'] }}</h1>
        <p class="section-subtitle">{{ $industry['description'] }}</p>
      </div>
      <div class="info-cards">
        @foreach ($industry['focus'] as $focus)
          <div class="info-card"><h2 class="info-card-title">{{ $focus }}</h2></div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="section top-0">
    <div class="w-layout-blockcontainer container w-container">
      <h2 class="section-title-2">Related Services</h2>
      <ul>
        @foreach ($industry['services'] as $serviceSlug => $service)
          <li><a class="info-card-link" href="{{ route('services.show', $serviceSlug) }}">{{ $service }}</a></li>
        @endforeach
      </ul>
    </div>
  </section>
@endsection

@section('after_content')
  @include('frontend.layout.cta')
@endsection
