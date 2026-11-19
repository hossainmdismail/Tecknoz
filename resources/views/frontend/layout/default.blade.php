@php
    $seoResolver = app(\App\Support\FrontendSeo::class);
    $globalSettings = $seoResolver->globalSettings();
    // Blade escapes inline section values before the SEO partial escapes the final tag.
    $sectionText = fn (string $section): string => html_entity_decode(
        trim($__env->yieldContent($section, '')),
        ENT_QUOTES | ENT_HTML5,
        'UTF-8',
    );
    $seo = $seoResolver->resolve($sectionText('seo_key'), [
        'title' => $sectionText('title'),
        'description' => $sectionText('description'),
        'og_title' => $sectionText('og_title'),
        'og_description' => $sectionText('og_description'),
        'og_image' => $sectionText('og_image'),
        'twitter_title' => $sectionText('twitter_title'),
        'twitter_description' => $sectionText('twitter_description'),
        'twitter_image' => $sectionText('twitter_image'),
    ]);
    $marketing = app(\App\Support\FrontendMarketing::class)->resolve();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-wf-site="6afec6de276a1505a6c603ff" data-wf-page="@yield('webflow_page')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('frontend.layout.seo-head')
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/webclip.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/webflow.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tecknoz-8e4511513575e5d9779c42536ee15f7.webflow.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap">
    <script>
        document.documentElement.classList.add('w-mod-js');

        if ('ontouchstart' in window || (window.DocumentTouch && document instanceof window.DocumentTouch)) {
            document.documentElement.classList.add('w-mod-touch');
        }
    </script>
    @stack('styles')
    @include('frontend.layout.marketing-head')
    @yield('structured_data')
</head>
<body>
    @include('frontend.layout.marketing-body-start')
    @include('frontend.layout.header')

    <main>
        @yield('content')
        @yield('after_content')
    </main>

    @include('frontend.layout.footer')

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6afec6de276a1505a6c603ff" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/webflow.js') }}"></script>
    {!! $marketing['custom_body_end_scripts'] !!}
    @stack('scripts')
</body>
</html>
