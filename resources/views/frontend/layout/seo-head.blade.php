<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<meta name="robots" content="{{ $seo['robots'] }}">
<link rel="canonical" href="{{ $seo['canonical_url'] }}">
<meta property="og:title" content="{{ $seo['og_title'] }}">
<meta property="og:description" content="{{ $seo['og_description'] }}">
@if ($seo['og_image'])
    <meta property="og:image" content="{{ $seo['og_image'] }}">
@endif
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $seo['canonical_url'] }}">
<meta property="og:site_name" content="{{ $seo['site_name'] }}">
<meta name="twitter:title" content="{{ $seo['twitter_title'] }}">
<meta name="twitter:description" content="{{ $seo['twitter_description'] }}">
@if ($seo['twitter_image'])
    <meta name="twitter:image" content="{{ $seo['twitter_image'] }}">
@endif
<meta name="twitter:card" content="{{ $seo['twitter_image'] ? 'summary_large_image' : 'summary' }}">
@if (! empty($marketing['google_search_console_verification']))
    <meta name="google-site-verification" content="{{ $marketing['google_search_console_verification'] }}">
@endif
@if (! empty($marketing['bing_webmaster_verification']))
    <meta name="msvalidate.01" content="{{ $marketing['bing_webmaster_verification'] }}">
@endif
@if (! empty($marketing['meta_domain_verification']))
    <meta name="facebook-domain-verification" content="{{ $marketing['meta_domain_verification'] }}">
@endif
<link rel="icon" href="{{ $seo['favicon_url'] ?: asset('frontend/images/favicon.png') }}">

<script type="application/ld+json">{!! \Illuminate\Support\Js::encode($seo['schema_json']) !!}</script>
