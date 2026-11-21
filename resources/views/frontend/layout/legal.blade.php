@extends('frontend.layout.default')

@section('content')
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <nav aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a> / @yield('legal_heading')</nav>
      <h1 class="section-title-2">@yield('legal_heading')</h1>
      <div class="rich-text w-richtext">
        @yield('legal_body')
      </div>
    </div>
  </section>
@endsection
