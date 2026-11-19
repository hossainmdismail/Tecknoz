@if ($marketing['gtm_enabled'])
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id={{ $marketing['gtm_container_id'] }}"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
@endif

@if ($marketing['meta_pixel_enabled'])
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $marketing['meta_pixel_id'] }}&ev=PageView&noscript=1"
            alt="">
    </noscript>
@endif

@if (! empty($marketing['custom_body_start_scripts']))
    {!! $marketing['custom_body_start_scripts'] !!}
@endif
