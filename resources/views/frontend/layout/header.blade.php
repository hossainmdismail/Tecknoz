  <header class="header">
    <div data-w-id="9c2a54c1-afcd-4ad7-45af-e0a913625a17" data-animation="default" data-collapse="medium" data-duration="500" data-easing="ease-in" data-easing2="ease-in-out" role="banner" class="navbar w-nav">
      <div class="header-container">
        <div data-w-id="9c2a54c1-afcd-4ad7-45af-e0a913625a19" class="navbar-wrapper">
          <a href="{{ route('home') }}" @if (request()->routeIs('home')) aria-current="page" @endif class="navbar-brand w-nav-brand{{ request()->routeIs('home') ? ' w--current' : '' }}"><img src="{{ $globalSettings?->logo_url ?: asset('frontend/images/tecknoz-logo-blue.svg') }}" loading="lazy" alt="{{ $globalSettings?->site_name ?: config('app.name') }}" class="brand-icon"></a>
          <nav role="navigation" class="navbar-menu w-nav-menu">
            <div class="navbar-menu-left">
              <a href="{{ route('home') }}" @if (request()->routeIs('home')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('home') ? ' w--current' : '' }}">
                <div class="nav-link-text">Home</div>
              </a>
              <a href="{{ route('about') }}" @if (request()->routeIs('about')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('about') ? ' w--current' : '' }}">
                <div class="nav-link-text">About</div>
              </a>
              <a href="{{ route('clients') }}" @if (request()->routeIs('clients')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('clients') ? ' w--current' : '' }}">
                <div class="nav-link-text">Our Clients</div>
              </a>
              <a href="{{ route('services') }}" @if (request()->routeIs('services')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('services', 'services.*') ? ' w--current' : '' }}">
                <div class="nav-link-text">Services</div>
              </a>
              <a href="{{ route('blogs') }}" @if (request()->routeIs('blogs')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('blogs', 'blogs.*') ? ' w--current' : '' }}">
                <div class="nav-link-text">Blogs</div>
              </a>
              <a href="{{ route('events') }}" @if (request()->routeIs('events')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('events') ? ' w--current' : '' }}">
                <div class="nav-link-text">Events</div>
              </a>
              <a href="{{ route('contact') }}" @if (request()->routeIs('contact')) aria-current="page" @endif class="nav-link w-inline-block{{ request()->routeIs('contact') ? ' w--current' : '' }}">
                <div class="nav-link-text">Contact</div>
              </a>
            </div>
          </nav>
          <div class="nav-mobile-menu">
            <div class="menu-button w-nav-button">
              <div class="menu-icon-component">
                <div class="plus-liner"></div>
                <div class="plus-liner horizontal"></div>
              </div>
            </div>
            <div class="nav-button-wrap">
              <a @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) data-wf--button--variant="base" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-inline-block">
                <div class="button-text-wrap">
                  <div class="button-text-inner-wrap">
                    <div class="button-text">Talk to Our Experts</div>
                  </div>
                  <div class="button-text-inner-wrap">
                    <div class="button-text">Talk to Our Experts</div>
                  </div>
                </div>
                <div class="button-icon-wrap">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
