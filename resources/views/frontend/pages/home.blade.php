@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d0')
@section('seo_key', 'home')
@section('title', 'Tecknoz – Digital Engineering, Semiconductor Solutions & Global Talent Partner')
@section('description', 'Tecknoz is a full-stack technology and semiconductor solutions company delivering app and web development, UI/UX, SaaS, eCommerce, AI automation, and strategic digital services. Our semiconductor division provides FPGA/IP, ASIC/SoC design, verification, IC layout, PCB design, embedded software, RTL development, and quality assurance. With global talent acquisition and end-to-end business strategy support, Tecknoz helps companies build, scale, and innovate with confidence.')
@section('og_image', asset('frontend/images/webclip.png'))

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .service-card[aria-disabled="true"] { cursor: default; }
    </style>
@endpush

@section('content')
    @php($globalSettings = app(\App\Support\FrontendSeo::class)->globalSettings())
  <section class="hero-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="hero-section-wrapper">
        <div class="hero-text">
          <div data-w-id="9b723715-95b2-d4e9-4b61-5b5b965f3aee" style="opacity:0" class="hero-review-block"></div>
          <h1 data-w-id="f87e7338-1811-3ab6-0667-acdcc93d5e21" style="opacity:0" class="hero-title">We Provide <em class="hero-highligt">Solutions</em><br>That Drive <em class="hero-highligt">Results</em></h1>
          <p data-w-id="a3046453-c4c5-f750-ee7a-d5facb877858" style="opacity:0" class="heading">{{ $globalSettings?->site_tagline ?: 'The light is here to shine.' }}</p>
        </div>
        <div data-w-id="46cd5a78-4afd-6ae3-6201-b4a092ad71a2" style="opacity:0" class="hero-buttons">
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
          <div class="header-larg-arrow w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="86" height="85" viewbox="0 0 86 85" fill="none">
              <path d="M85.0607 13.0607C85.6464 12.4749 85.6464 11.5251 85.0607 10.9393L75.5147 1.3934C74.9289 0.807611 73.9792 0.807611 73.3934 1.3934C72.8076 1.97918 72.8076 2.92893 73.3934 3.51472L81.8787 12L73.3934 20.4853C72.8076 21.0711 72.8076 22.0208 73.3934 22.6066C73.9792 23.1924 74.9289 23.1924 75.5147 22.6066L85.0607 13.0607ZM1.99999 85L3.49999 85C3.49999 73.045 5.42911 55.1834 16.3665 40.3348C27.24 25.5729 47.2371 13.5 84 13.5L84 12L84 10.5C46.5197 10.5 25.5167 22.854 13.951 38.5556C2.44925 54.1704 0.49999 72.8089 0.499989 85L1.99999 85Z" fill="url(#paint0_linear_4004_1858)"></path>
              <defs>
                <lineargradient id="paint0_linear_4004_1858" x1="43" y1="85" x2="84" y2="12" gradientunits="userSpaceOnUse">
                  <stop stop-color="white" stop-opacity="0"></stop>
                  <stop offset="1" stop-color="white"></stop>
                </lineargradient>
              </defs>
            </svg></div>
        </div>
      </div>
      <div class="hero-absolute-items"><img src="{{ asset('frontend/images/Header_line.svg') }}" loading="lazy" style="opacity:0" data-w-id="a13b706c-ee77-65ff-5b17-29dee2ce9420" alt="" class="hero-absolute-items-one"><img src="{{ asset('frontend/images/bell-dynamic-gradient.svg') }}" loading="lazy" style="opacity:0" data-w-id="edbcc5c2-55de-2d81-cb34-df05cc9fa87b" alt="" class="hero-absolute-items-ball"></div>
    </div>
    <div class="hero-bottom-shadow"></div>
    <div data-poster-url="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" data-video-urls="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }},{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-autoplay="true" data-loop="false" data-wf-ignore="true" class="hero-background w-background-video w-background-video-atom"><video id="0f6bff49-981d-b773-94e0-f21458dce215-video" autoplay="" poster="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }}" data-wf-ignore="true">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-wf-ignore="true">
      </video></div>
  </section>
  <section id="clients" class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div data-w-id="829f538c-d5a5-c967-3acf-7794ea557e00" style="opacity:0" class="brand-wrapper">
        <div class="brand-title"><strong>Empowering businesses with integrated technology, engineering, AI, and talent solutions to <br>transform ideas into measurable growth.</strong></div>
        <div class="brand-logo-wrapper">
          <div class="brand-logo-slide"><img loading="lazy" src="{{ asset('frontend/images/LLU_1LLU.avif') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/informedSO.svg') }}" alt="" class="partner-logo"><img sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 768px" srcset="{{ asset('frontend/images/ghorerbazar-p-500.webp') }} 500w, {{ asset('frontend/images/ghorerbazar.webp') }} 768w" alt="" src="{{ asset('frontend/images/ghorerbazar.webp') }}" loading="lazy" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/liquidTrees_1liquidTrees.avif') }}" alt="" class="partner-logo"><img sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/wrench-logo-2-p-500.jpg') }} 500w, {{ asset('frontend/images/wrench-logo-2-p-800.jpg') }} 800w, {{ asset('frontend/images/wrench-logo-2-p-1080.jpg') }} 1080w, {{ asset('frontend/images/wrench-logo-2-p-1600.jpg') }} 1600w, {{ asset('frontend/images/wrench-logo-2-p-2000.jpg') }} 2000w, {{ asset('frontend/images/wrench-logo-2.jpg') }} 2400w" alt="" src="{{ asset('frontend/images/wrench-logo-2.jpg') }}" loading="lazy" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/meditriangle.png') }}" alt="" class="partner-logo"><img sizes="100vw" srcset="{{ asset('frontend/images/nirvar-p-500.png') }} 500w, {{ asset('frontend/images/nirvar-p-800.png') }} 800w, {{ asset('frontend/images/nirvar-p-1080.png') }} 1080w, {{ asset('frontend/images/nirvar-p-1600.png') }} 1600w, {{ asset('frontend/images/nirvar-p-2000.png') }} 2000w, {{ asset('frontend/images/nirvar-p-2600.png') }} 2600w, {{ asset('frontend/images/nirvar-p-3200.png') }} 3200w, {{ asset('frontend/images/nirvar.png') }} 6408w" alt="" src="{{ asset('frontend/images/nirvar.png') }}" loading="lazy" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/Meta-DEsign-solutions-logo-mds.svg') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/TestGorilla.svg') }}" alt="" class="partner-logo md"><img sizes="100vw" srcset="{{ asset('frontend/images/ecomdigital_1-p-500.png') }} 500w, {{ asset('frontend/images/ecomdigital_1ecomdigital.avif') }} 1563w" alt="" src="{{ asset('frontend/images/ecomdigital_1ecomdigital.avif') }}" loading="lazy" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/Levilane_1Levilane.avif') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/devop1.svg') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/mobil-bangladesh.svg') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/Longwin---logo.png') }}" alt="" class="partner-logo"><img sizes="100vw" srcset="{{ asset('frontend/images/WechatIMG31432-p-500.jpg') }} 500w, {{ asset('frontend/images/WechatIMG31432-p-800.jpg') }} 800w, {{ asset('frontend/images/WechatIMG31432.jpg') }} 933w" alt="" src="{{ asset('frontend/images/WechatIMG31432.jpg') }}" loading="lazy" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/NBR-logo.png') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/paraform.png') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/Caspia_Logo-black.svg') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/download-1.jpg') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/Best-Electronics-PNG.png') }}" alt="" class="partner-logo"><img loading="lazy" src="{{ asset('frontend/images/download-copy.png') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/DEER-Chair---Nasir-Group-Logo.webp') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/dhaka-mass-transit-company-limited-dmtcl-logo-DA9F1D1088-seeklogo.com.png') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/cropped-New-logo-300x100-1.webp') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/devop1.svg') }}" alt="" class="partner-logo md"><img loading="lazy" src="{{ asset('frontend/images/LLU_1LLU.avif') }}" alt="" class="partner-logo md"></div>
          <div class="w-embed">
            <style>
@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(calc(-80% - 1rem));
  }
}
/* Pause animation on hover */
.brand-logo-wrapper:hover > .brand-logo-slide {
  animation-play-state: paused;
}
/* Scroll animation */
.brand-logo-slide {
  display: flex; /* ensures logos are in a row */
  animation: scroll 45s linear infinite;
}
/* Adjust scroll speed for smaller screens */
@media (max-width: 1200px) {
  .brand-logo-slide {
    animation-duration: 35s;
  }
}
@media (max-width: 768px) {
  .brand-logo-slide {
    animation-duration: 25s;
  }
}
@media (max-width: 480px) {
  .brand-logo-slide {
    animation-duration: 15s;
  }
}
</style>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about" class="section top-0">
    <div class="w-layout-blockcontainer container w-container">
      <div class="choose-wrapper">
        <div id="w-node-eddf9665-d896-effe-bcce-24d8265d7a4f-a6c603d0" data-w-id="eddf9665-d896-effe-bcce-24d8265d7a4f" style="opacity:0" class="choose-card-left">
          <div class="choose-left-stats"><img src="{{ asset('frontend/images/choose-image_1choose-image.avif') }}" loading="lazy" alt="" class="choose-left-image-main"><img src="{{ asset('frontend/images/growth.svg') }}" loading="lazy" alt="" class="choose-left-image-arrow"></div>
          <div class="choose-left-text">
            <h2 class="choose-left-title"><em class="italic">Your Growth Is Our Mission </em></h2>
            <p class="choose-left-subtitle">Our work reflects the dedication and care we bring to every client partnership, ensuring excellence in every project.</p>
            <div class="choose-left-buttons">
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
              <a href="https://calendar.app.google/f7qKpVB4fxBFghAG9" data-wf--button--variant="text-black" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5 w-inline-block">
                <div class="button-text-wrap">
                  <div class="button-text-inner-wrap">
                    <div class="button-text w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5">Schedule a Call</div>
                  </div>
                  <div class="button-text-inner-wrap">
                    <div class="button-text w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5">Schedule a Call</div>
                  </div>
                </div>
                <div class="button-icon-wrap w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5">
                  <div class="button-icon-inner-wrap">
                    <div class="button-icon w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></div>
                    <div class="button-icon w-variant-784bed5a-7847-d80a-ac03-ef53ee1b4fe5 w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div data-w-id="fa986506-c9e6-f063-cb40-b41c83ef8684" style="opacity:0" class="choose-card-right">
          <div class="choose-right-logo-wrap">
            <p class="we-are-text"><strong class="bold-text">Who we are</strong></p><img src="{{ asset('frontend/images/Tecknoz-team_1Tecknoz-team.avif') }}" loading="lazy" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/Tecknoz-team_1-p-500.avif') }} 500w, {{ asset('frontend/images/Tecknoz-team_1-p-800.avif') }} 800w, {{ asset('frontend/images/Tecknoz-team_1Tecknoz-team.avif') }} 1280w" alt="" class="image">
          </div>
          <div class="choose-right-text">
            <div class="choose-right-text-bottom">
              <h2 class="choose-right-title">Tecknoz is a global partner delivering digital, engineering, AI, and talent solutions to drive business growth. We turn ideas into impact through technology, strategy, and top-tier talent.</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="services" class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="service-head">
        <div class="servce-text">
          <h2 class="section-title">Impact Driven <em class="italic">Services<br>Powered by</em> AI</h2>
        </div>
      </div>
      <div class="service-wrapper">
        <div class="service-content">
          <a id="service-design-development" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'design-development']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/design.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/design-p-500.jpg') }} 500w, {{ asset('frontend/images/design-p-800.jpg') }} 800w, {{ asset('frontend/images/design-p-1080.jpg') }} 1080w, {{ asset('frontend/images/design.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Design &amp; Development</h2>
                <p class="service-card-description">Creative branding, UI/UX, and graphic design that captivates audiences and strengthens identity. Custom web, app, SaaS, eCommerce, and AI-driven solutions built for performance and scalability.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">Branding </div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">UI/UX Design</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Web Design &amp; Development</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">App Design &amp; Development</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">SaaS Development</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">eCommerce Development</div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-semiconductor" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'semiconductor']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/semiconductor.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/semiconductor-p-500.jpg') }} 500w, {{ asset('frontend/images/semiconductor-p-800.jpg') }} 800w, {{ asset('frontend/images/semiconductor-p-1080.jpg') }} 1080w, {{ asset('frontend/images/semiconductor.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Semiconductor</h2>
                <p class="service-card-description">Full-cycle chip design and verification: FPGA, ASIC/SoC, RTL, layout, embedded systems, and testing.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">FPGA/IP Design</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">ASIC/SoC Design</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Design Verification</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">IC Layout</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">PCB Design</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Embedded Software Development</div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-ai-automation" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'ai-automation']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/hands-holding-neon-sign_1hands-holding-neon-sign.avif') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/hands-holding-neon-sign_1-p-500.avif') }} 500w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-800.avif') }} 800w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-1080.avif') }} 1080w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-1600.avif') }} 1600w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-2000.avif') }} 2000w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-2600.avif') }} 2600w, {{ asset('frontend/images/hands-holding-neon-sign_1-p-3200.avif') }} 3200w, {{ asset('frontend/images/hands-holding-neon-sign_1hands-holding-neon-sign.avif') }} 4000w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">AI Automation</h2>
                <p class="service-card-description">Designing intuitive AI-driven products is our expertise. We create AI solutions that align with user needs, enhancing decision-making and delivering valuable insights for a smarter experience.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">Industry Automation</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Custom AI-Agent Development</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">AI Chatbot</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text"> Marketing Automation</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Workflow Development</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text"> Social Media Automation</div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-digital-marketing" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'digital-marketing']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/digital-3.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/digital-3-p-500.jpg') }} 500w, {{ asset('frontend/images/digital-3-p-800.jpg') }} 800w, {{ asset('frontend/images/digital-3-p-1080.jpg') }} 1080w, {{ asset('frontend/images/digital-3.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Digital Marketing</h2>
                <p class="service-card-description">Strategic campaigns across email, search, and social platforms to amplify reach, engagement, and ROI.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">Email Marketing</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Content Marketing</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Search Engine Optimization (SEO)</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Facebook Management And Marketing</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Instagram Management And Marketing</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">TikTok Management And Marketing</div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-recruitment" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'recruitment']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/recruiment.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/recruiment-p-500.jpg') }} 500w, {{ asset('frontend/images/recruiment-p-800.jpg') }} 800w, {{ asset('frontend/images/recruiment-p-1080.jpg') }} 1080w, {{ asset('frontend/images/recruiment.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Recruitment</h2>
                <p class="service-card-description">End-to-end talent acquisition—IT, executive, freelance, offshoring, and local—with precision and speed.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">Talent Sourcing</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Staffing</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Executive Search</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Headhunting</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Offshoring Talent Solutions</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">IT Recruitment </div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-business" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'business']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/business.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/business-p-500.jpg') }} 500w, {{ asset('frontend/images/business-p-800.jpg') }} 800w, {{ asset('frontend/images/business-p-1080.jpg') }} 1080w, {{ asset('frontend/images/business.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Business</h2>
                <p class="service-card-description">Business planning, legal formation, client acquisition, and sales-marketing alignment for sustainable growth.</p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text">Business Planning</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Business Development</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Legal Formation</div>
                </div>
                <div class="service-item">
                  <div class="service-item-text">Client Hunting</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Sales and Marketing Service</div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text">Maintenance &amp; Support</div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
          <a id="service-stuff-augmentation" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'stuff-augmentation']]) class="service-card w-inline-block">
            <div class="service-card-head">
              <div class="service-image-wrap"><img src="{{ asset('frontend/images/business.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/business-p-500.jpg') }} 500w, {{ asset('frontend/images/business-p-800.jpg') }} 800w, {{ asset('frontend/images/business-p-1080.jpg') }} 1080w, {{ asset('frontend/images/business.jpg') }} 1253w" class="service-cover-image"></div>
            </div>
            <div class="service-body">
              <div class="service-text-wrap">
                <h2 class="service-card-title">Staff Augmentation</h2>
                <p class="service-card-description"><strong>Tecknoz has placed 500+ professionals across 20+ countries, with an average onboarding time of just 7 days. Our clients range from early-stage startups to established enterprises across SaaS, eCommerce, Manufacturing, Finance, and more.</strong></p>
              </div>
              <div class="service-item-wrap">
                <div class="service-item">
                  <div class="service-item-text"><strong>RTL Design &amp; Microarchitecture</strong></div>
                </div>
                <div class="service-item">
                  <div class="service-item-text"><strong>IP Development &amp; Integration</strong></div>
                </div>
                <div class="service-item">
                  <div class="service-item-text"><strong>IP-Level Design Verification</strong></div>
                </div>
                <div class="service-item">
                  <div class="service-item-text"><strong>SoC Design &amp; Verification</strong></div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text"><strong>RISC-V Core Design &amp; Verification</strong></div>
                </div>
                <div class="service-item last">
                  <div class="service-item-text"><strong>Protocol &amp; Subsystem Verification</strong></div>
                </div>
              </div>
              <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="how-work-wrapper">
        <div class="how-work-left-block"><img src="{{ asset('frontend/images/flash-dynamic-gradient.svg') }}" loading="lazy" style="-webkit-transform:translate3d(0px, 0px, null) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0px, 0px, null) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0px, 0px, null) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0px, 0px, null) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="ef85b0df-408e-3237-2760-7f80141e2158" alt="" class="how-work-image">
          <div class="how-work-rating-card"><img src="{{ asset('frontend/images/Frame-149.svg') }}" loading="lazy" alt="" class="how-work-rating-card-icon">
            <div class="how-work-rating-card-text">4.9 <span class="italic"><em>Rated agency</em></span></div>
          </div>
        </div>
        <div class="how-work-right-block">
          <h2 data-w-id="a5aed80a-1242-587a-4884-c9aa5cf55e93" style="opacity:0" class="section-title">Digital Growth in <br>‍<em class="italic">Three Strategic </em>Steps</h2>
          <div data-w-id="d2388810-14d9-5c62-57a3-df89e8aea2df" style="opacity:0" class="hw-accordion-wrap">
            <div class="hw-accordion-item active">
              <div class="hw-question"><img src="{{ asset('frontend/images/Frame-149-1.svg') }}" loading="lazy" alt="" class="hw-icon">
                <h3 class="hw-question-text">Deep Dive &amp; Discovery</h3>
              </div>
              <div class="hw-answer active">
                <p class="hw-answer-text">We sit down with you to really understand what you&#x27;re building and why it matters to your business. This means talking through your goals, your users, and any challenges you&#x27;re facing right now.</p>
              </div>
            </div>
            <div data-w-id="15dac1cc-cafa-c73c-5191-afb206894ce7" class="hw-accordion-item">
              <div class="hw-question"><img src="{{ asset('frontend/images/Frame-149-2.svg') }}" loading="lazy" alt="" class="hw-icon">
                <h3 class="hw-question-text">Smart Build &amp; Design</h3>
              </div>
              <div style="height:0px" class="hw-answer">
                <p class="hw-answer-text">Our team creates software that fits exactly what you need—no cookie-cutter solutions, just something built for you. We focus on clean code, solid architecture, and features that actually move the needle for your startup.</p>
              </div>
            </div>
            <div data-w-id="e0b4d3a2-9098-cbf9-f69d-c0789a3e4cb4" class="hw-accordion-item">
              <div class="hw-question"><img src="{{ asset('frontend/images/Frame-149-3.svg') }}" loading="lazy" alt="" class="hw-icon">
                <h3 class="hw-question-text">Launch Together &amp; Support</h3>
              </div>
              <div style="height:0px" class="hw-answer">
                <p class="hw-answer-text">We stay in touch throughout the process, make changes based on your feedback, and deliver something you&#x27;ll actually love using. Plus, we stick around to help with updates, fixes, or new features as you grow.</p>
              </div>
            </div>
          </div>
          <a @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) data-wf--button--variant="primary" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-variant-f2415d8a-764c-9e55-6410-d370509a60dc w-inline-block">
            <div class="button-text-wrap">
              <div class="button-text-inner-wrap">
                <div class="button-text w-variant-f2415d8a-764c-9e55-6410-d370509a60dc">Let’s Build Together</div>
              </div>
              <div class="button-text-inner-wrap">
                <div class="button-text w-variant-f2415d8a-764c-9e55-6410-d370509a60dc">Let’s Build Together</div>
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
        </div>
      </div>
    </div>
  </section>
  <section id="projects" class="vertical-section">
    <div class="portfolio-header">
      <h2 class="section-title">Proven Success <br>in <span class="italic"><em>Every Industry</em></span></h2>
      <p class="section-subtitle">Our works highlight the dedication we bring to every client partnership.</p>
    </div>
    <div class="horizontal-screen">
      <div class="portfolio-wrapper">
        <div class="portfolio-content">
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/69175c986b9956d0e09f60ec_1.png') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/69175c986b9956d0e09f60ec_1.png') }} 500w, {{ asset('frontend/images/69175c986b9956d0e09f60ec_1.png') }} 800w, {{ asset('frontend/images/69175c986b9956d0e09f60ec_1.png') }} 1056w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
          <a data-wf--portfolio-card--variant="base" data-w-id="9ce5067a-6106-9703-ee58-74249f3cffab" aria-disabled="true" class="portfolio-card w-inline-block">
            <div class="portfolio-image-wrap portfolio-image"><img src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 727px, 940px" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" class="portfolio-image"></div>
            <div class="portfolio-text-wrap">
              <h3 class="portfolio-title">Capture leads using gated whitepapers and reports.</h3>
              <div class="portfolio-icons w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                  <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="testimonial-wrapper">
        <div data-w-id="abfbd802-6dc7-11e8-688c-e9754a83bf1f" style="opacity:0" class="testimonial-header">
          <h2 class="section-title"><strong>Trusted by Innovators <br>Across</strong> <span class="italic"><strong><em>Industries</em></strong></span><br></h2>
          <p class="section-subtitle">From startups to global enterprises, Tecknoz powers success through <strong>Digital Marketing</strong>, <strong>Design</strong>, <strong>Development</strong>, <br>‍<strong>Recruitment</strong>, <strong>Semiconductor</strong>, and <strong>Business Solutions</strong>. Here’s what our partners say:</p>
        </div>
        <div data-w-id="1168f536-7c16-ac5d-6a35-e4b898e85ca1" style="opacity:0" class="testimonial-content">
          <div data-delay="2000" data-animation="slide" class="slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
            <div class="mask w-slider-mask">
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/devop1.svg') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;Scaling dev capacity without overhead was the goal. Tecknoz built and managed a 50-person offshore team in India—60% cost savings, full compliance, and weekly KPI reports. Seamless extension of our HQ.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/Caspia_Logo-black.svg') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">First-pass silicon on a 5nm SoC saved us millions in re-spins. Tecknoz’s verification coverage hit 99.8%, and post-silicon correlation was flawless. They’re now our go-to ASIC partner.</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/liquidTrees_1liquidTrees.avif') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;From idea to seed funding in four months. Tecknoz wrote the business plan, built financial models, handled legal formation, and prepped pitch decks. Investors loved the clarity and traction.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/Peraform.png') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;Three C-level hires in 45 days seemed impossible. Tecknoz ran discreet searches, vetted culture fit, and negotiated offers—every placement is still thriving. Executive search redefined.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/LeadMan-png-new.png') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, 500px" srcset="{{ asset('frontend/images/LeadMan-png-new-p-500.png') }} 500w, {{ asset('frontend/images/LeadMan-png-new-p-800.png') }} 800w, {{ asset('frontend/images/LeadMan-png-new.png') }} 822w" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;Rebranding from scratch felt overwhelming. Tecknoz delivered a full logo suite, brand book, tone of voice, and packaging design in three weeks. The launch exceeded all expectations.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/nirvar.png') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, 500px" srcset="{{ asset('frontend/images/nirvar-p-500.png') }} 500w, {{ asset('frontend/images/nirvar-p-800.png') }} 800w, {{ asset('frontend/images/nirvar-p-1080.png') }} 1080w, {{ asset('frontend/images/nirvar-p-1600.png') }} 1600w, {{ asset('frontend/images/nirvar-p-2000.png') }} 2000w, {{ asset('frontend/images/nirvar-p-2600.png') }} 2600w, {{ asset('frontend/images/nirvar-p-3200.png') }} 3200w, {{ asset('frontend/images/nirvar.png') }} 6408w" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">“Tecknoz delivered an intuitive and reliable app for Nirvar that enables real-time blood glucose and blood pressure monitoring with seamless prescription uploads. The solution improves patient care, data accessibility, and overall healthcare efficiency.”</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/certapro_logo.svg') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;Six months in, we’re ranking #1 for all core keywords. Their technical SEO audit fixed years of issues, and monthly link-building keeps us ahead. Reporting is transparent and actionable.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/cropped-New-logo-300x100-1.webp') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;Manual processes were killing efficiency. Tecknoz deployed AI agents that automated data entry, reporting, and customer follow-ups—80% time savings. The system learns and improves daily.&quot;</div>
                  </div>
                </div>
              </div>
              <div class="slide w-slide">
                <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                  <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/download-copy.png') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                  <div class="testimonial-text">
                    <div class="testimonial-comment">&quot;LinkedIn was just a profile for us. Tecknoz built a content calendar, ran sponsored InMail, and optimized lead forms—18 enterprise demos booked in one quarter. True B2B expertise.&quot;</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="left-arrow w-slider-arrow-left">
              <div class="icon w-icon-slider-left"></div>
            </div>
            <div class="right-arrow w-slider-arrow-right">
              <div class="icon-2 w-icon-slider-right"></div>
            </div>
          </div>
        </div>
        <div class="swiper swiper1">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/Peraform.png') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">We were struggling with inconsistent content. Tecknoz’s strategy turned our blog into a lead-generation machine—10K organic visitors in four months. Every piece is on-brand, SEO-optimized, and conversion-focused.</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/certapro_logo.svg') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">Six months in, we’re ranking #1 for all core keywords. Their technical SEO audit fixed years of issues, and monthly link-building keeps us ahead. Reporting is transparent and actionable.</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/Ghorer-Bazar-logo_1Ghorer%20Bazar%20logo.avif') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">Facebook ads were burning budget with no results. Tecknoz revamped targeting, creatives, and landing pages—5x ROAS in the first 60 days. They manage everything end-to-end.<br></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/download.png') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">Our Instagram was stagnant at 200 followers. Tecknoz took over content, reels, and influencer outreach—now at 25K engaged followers. The growth feels organic and sustainable.</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/cropped-New-logo-300x100-1.webp') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">We needed TikTok to reach Gen Z fast. Tecknoz created a trend-jacking campaign that hit 1.2M views in 48 hours and drove 8K app downloads. They live and breathe the platform.</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div data-wf--testimonial-card--variant="v1" class="testimonial-card w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0">
                <div class="testimonial-image-wrap w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"><img src="{{ asset('frontend/images/dot.svg') }}" loading="lazy" alt="" class="image-2"><img src="{{ asset('frontend/images/mobil-bangladesh.svg') }}" loading="lazy" alt="" class="testimonial-logo w-variant-b922f866-9f8c-fa34-ac19-f3736d1109e0"></div>
                <div class="testimonial-text">
                  <div class="testimonial-comment">Rebranding from scratch felt overwhelming. Tecknoz delivered a full logo suite, brand book, tone of voice, and packaging design in three weeks. The launch exceeded all expectations.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="stories_slider block_flex">
          <a aria-label="previous" href="#" class="swiper-prev-btn1 w-inline-block">
            <div class="w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewbox="0 0 60 60" fill="none">
                <path d="M30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM40.075 31.325L32.575 38.825C32.2 39.2 31.725 39.375 31.25 39.375C30.775 39.375 30.3 39.2 29.925 38.825C29.2 38.1 29.2 36.9 29.925 36.175L34.225 31.875H21.25C20.225 31.875 19.375 31.025 19.375 30C19.375 28.975 20.225 28.125 21.25 28.125H34.225L29.925 23.825C29.2 23.1 29.2 21.9 29.925 21.175C30.65 20.45 31.85 20.45 32.575 21.175L40.075 28.675C40.8 29.4 40.8 30.6 40.075 31.325Z" fill="#F2F2F2"></path>
              </svg>
              <style>
    .swiper-prev-btn1 path {
        transition: fill 500ms ease; /* Плавний перехід кольору тривалістю 500 мс */
    }
    .swiper-prev-btn1:hover path {
        fill: #89CD25; /* Колір, який ви бажаєте встановити при наведенні */
    }
</style>
            </div>
          </a>
          <a aria-label="next" href="#" class="swiper-next-btn1 w-inline-block">
            <div class="w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewbox="0 0 60 60" fill="none">
                <path d="M30 5C16.2 5 5 16.2 5 30C5 43.8 16.2 55 30 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 30 5ZM40.075 31.325L32.575 38.825C32.2 39.2 31.725 39.375 31.25 39.375C30.775 39.375 30.3 39.2 29.925 38.825C29.2 38.1 29.2 36.9 29.925 36.175L34.225 31.875H21.25C20.225 31.875 19.375 31.025 19.375 30C19.375 28.975 20.225 28.125 21.25 28.125H34.225L29.925 23.825C29.2 23.1 29.2 21.9 29.925 21.175C30.65 20.45 31.85 20.45 32.575 21.175L40.075 28.675C40.8 29.4 40.8 30.6 40.075 31.325Z" fill="#F2F2F2"></path>
              </svg>
              <style>
    .swiper-next-btn1 path {
        transition: fill 500ms ease; /* Плавний перехід кольору тривалістю 500 мс */
    }
    .swiper-next-btn1:hover path {
        fill: #89CD25; /* Колір, який ви бажаєте встановити при наведенні */
    }
</style>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="faq-wrapper">
        <div class="faq-header">
          <h2 data-w-id="d498c131-e125-5ed8-dfa3-24e7d14e3e71" style="opacity:0" class="section-title">Your Questions<br><span class="italic"><em>Answered!</em></span></h2>
        </div>
        <div class="faq-content">
          <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c02" class="faq-accordion-block">
            <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c03" class="faq-quastion-wrap">
              <h3 class="faq-question">How can I start a project with Tecknoz?</h3><img loading="lazy" src="{{ asset('frontend/images/faq-chevron.svg') }}" alt="icon" class="faq-arrow">
            </div>
            <div class="faq-answer-wrap">
              <div class="faq-answer">Starting a project with us is simple. Just reach out through our contact form or email, and share a brief about your needs. We’ll schedule a call to understand your goals, discuss the scope, and recommend the right approach tailored to your product or brand.</div>
            </div>
          </div>
          <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c02" class="faq-accordion-block">
            <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c03" class="faq-quastion-wrap">
              <h3 class="faq-question">What makes Tecknoz different from other agencies?</h3><img loading="lazy" src="{{ asset('frontend/images/faq-chevron.svg') }}" alt="icon" class="faq-arrow">
            </div>
            <div class="faq-answer-wrap">
              <div class="faq-answer">At Tecknoz, our team blends creativity, client-driven strategies, and industry expertise to deliver exceptional Software development solutions. We specialize in User Experience Design, App Design &amp; Development, and Web Design &amp; Development, SaaS Development, Ecommerce Development, AI Automation, Agentic AI, always maintaining a high standard of quality. Through a collaborative approach, we ensure our work align with your objectives, fostering growth and success for your brand. Our distinct process sets us apart from the competition.</div>
            </div>
          </div>
          <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c02" class="faq-accordion-block">
            <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c03" class="faq-quastion-wrap">
              <h3 class="faq-question">Is Tecknoz a start-up-friendly agency?</h3><img loading="lazy" src="{{ asset('frontend/images/faq-chevron.svg') }}" alt="icon" class="faq-arrow">
            </div>
            <div class="faq-answer-wrap">
              <div class="faq-answer">Tecknoz is an agency that caters to start-ups, offering affordable and flexible design solutions tailored to your budget and requirements. We understand the unique challenges start-ups face and are dedicated to helping you build a strong brand and a user-friendly digital presence from the ground up.</div>
            </div>
          </div>
          <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c02" class="faq-accordion-block">
            <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c03" class="faq-quastion-wrap">
              <h3 class="faq-question">What development tools and technologies do we use to stay ahead in Software Development?</h3><img loading="lazy" src="{{ asset('frontend/images/faq-chevron.svg') }}" alt="icon" class="faq-arrow">
            </div>
            <div class="faq-answer-wrap">
              <div class="faq-answer">We leverage advanced technologies such as Figma, Webflow, Shopify, React/Next, PHP/Node.js, AWS, Docker, and AI tools like TensorFlow, alongside agile methodologies, to deliver scalable, efficient, and innovative software solutions.</div>
            </div>
          </div>
          <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c02" class="faq-accordion-block">
            <div data-w-id="47732c4b-4c3a-4bd7-f065-d3999e000c03" class="faq-quastion-wrap">
              <h3 class="faq-question">How do we handle project scope changes or unexpected challenges during the development process?</h3><img loading="lazy" src="{{ asset('frontend/images/faq-chevron.svg') }}" alt="icon" class="faq-arrow">
            </div>
            <div class="faq-answer-wrap">
              <div class="faq-answer">Using Agile methodologies, we adapt quickly to scope changes and unforeseen challenges, ensuring transparent communication, flexibility, and continued focus on quality throughout the project.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="blogs" class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="article-wrapper">
        <div class="article-header">
          <div class="article-header-left">
            <h2 class="section-title">Blog Highlights</h2>
            <p class="section-subtitle"><strong>Discover more stories, insights, and ideas from across our blog</strong></p>
          </div>
          <div class="article-header-right">
            <a @include('frontend.layout.link-attributes', ['name' => 'blogs', 'homeSection' => 'blogs']) data-wf--button--variant="trans" data-w-id="82844116-3ce8-1e95-ada5-7e0cb8fcf0dd" class="button w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb w-inline-block">
              <div class="button-text-wrap">
                <div class="button-text-inner-wrap">
                  <div class="button-text w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb">All Articles</div>
                </div>
                <div class="button-text-inner-wrap">
                  <div class="button-text w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb">All Articles</div>
                </div>
              </div>
              <div class="button-icon-wrap w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb">
                <div class="button-icon-inner-wrap">
                  <div class="button-icon w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                      <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></div>
                  <div class="button-icon w-variant-ec3d36ce-0868-3552-d8c6-bc8e7d7480bb w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                      <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="article-content">
          <a data-w-id="8a0f0c72-2ace-1b01-1571-97d1d98af2db" aria-disabled="true" class="blog-card w-inline-block">
            <div class="blog-image-wrap"><img src="{{ asset('frontend/images/image-1.webp') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/image-1-p-500.webp') }} 500w, {{ asset('frontend/images/image-1-p-800.webp') }} 800w, {{ asset('frontend/images/image-1-p-1080.webp') }} 1080w, {{ asset('frontend/images/image-1.webp') }} 1596w" class="blog-image"></div>
            <div class="blog-text-block">
              <div class="blog-date">
                <div class="date">Design</div>
              </div>
              <div class="blog-title">How to get more leads from google ads</div>
            </div>
          </a>
          <a data-w-id="8a0f0c72-2ace-1b01-1571-97d1d98af2db" aria-disabled="true" class="blog-card w-inline-block">
            <div class="blog-image-wrap"><img src="{{ asset('frontend/images/image-1.webp') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/image-1-p-500.webp') }} 500w, {{ asset('frontend/images/image-1-p-800.webp') }} 800w, {{ asset('frontend/images/image-1-p-1080.webp') }} 1080w, {{ asset('frontend/images/image-1.webp') }} 1596w" class="blog-image"></div>
            <div class="blog-text-block">
              <div class="blog-date">
                <div class="date">Design</div>
              </div>
              <div class="blog-title">How to get more leads from google ads</div>
            </div>
          </a>
          <a data-w-id="8a0f0c72-2ace-1b01-1571-97d1d98af2db" aria-disabled="true" class="blog-card w-inline-block">
            <div class="blog-image-wrap"><img src="{{ asset('frontend/images/image-1.webp') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/image-1-p-500.webp') }} 500w, {{ asset('frontend/images/image-1-p-800.webp') }} 800w, {{ asset('frontend/images/image-1-p-1080.webp') }} 1080w, {{ asset('frontend/images/image-1.webp') }} 1596w" class="blog-image"></div>
            <div class="blog-text-block">
              <div class="blog-date">
                <div class="date">Design</div>
              </div>
              <div class="blog-title">How to get more leads from google ads</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
  <div class="white-wrapper">
    <section>
      <div class="horizontal-scroll">
        <div class="wrapper">
          <div class="sticky"><img sizes="100vw" srcset="{{ asset('frontend/images/Travellers-Rear-View-1-p-500.jpg') }} 500w, {{ asset('frontend/images/Travellers-Rear-View-1-p-800.jpg') }} 800w, {{ asset('frontend/images/Travellers-Rear-View-1-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Travellers-Rear-View-1-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Travellers-Rear-View-1-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Travellers-Rear-View-1-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Travellers-Rear-View-1-p-3200.jpg') }} 3200w, {{ asset('frontend/images/Travellers-Rear-View-1.jpg') }} 6000w" alt="A hiker wearing a black backpack and cap stands on a rock facing a calm lake surrounded by green mountains under a cloudy sky." src="{{ asset('frontend/images/Travellers-Rear-View-1.jpg') }}" loading="lazy"></div>
          <div class="sticky"><img sizes="100vw" srcset="{{ asset('frontend/images/Waterfall-Bridge-min-p-500.jpg') }} 500w, {{ asset('frontend/images/Waterfall-Bridge-min-p-800.jpg') }} 800w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Waterfall-Bridge-min-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Waterfall-Bridge-min-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Waterfall-Bridge-min.jpg') }} 3992w" alt="Aerial view of a train crossing a bridge over turbulent water with swirling white currents." src="{{ asset('frontend/images/Waterfall-Bridge-min.jpg') }}" loading="lazy"></div>
          <div id="anchor" class="sticky"><img sizes="100vw" srcset="{{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1-p-500.avif') }} 500w, {{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1-p-800.avif') }} 800w, {{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1-p-1080.avif') }} 1080w, {{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1-p-1600.avif') }} 1600w, {{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1Aerial%20Paraglider%20Mountain%20Range%20%281%29.avif') }} 3000w" alt="Paraglider flying above a rugged mountain peak with misty clouds in the background." src="{{ asset('frontend/images/Aerial-Paraglider-Mountain-Range-1_1Aerial%20Paraglider%20Mountain%20Range%20%281%29.avif') }}" loading="lazy"></div>
          <div class="sticky"><img sizes="100vw" srcset="{{ asset('frontend/images/Travellers-Sea-Sky-1-p-500.jpg') }} 500w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-800.jpg') }} 800w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-1080.jpg') }} 1080w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-1600.jpg') }} 1600w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-2000.jpg') }} 2000w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-2600.jpg') }} 2600w, {{ asset('frontend/images/Travellers-Sea-Sky-1-p-3200.jpg') }} 3200w, {{ asset('frontend/images/Travellers-Sea-Sky-1.jpg') }} 4480w" alt="Person walking on a wooden plank bridge over rocky terrain by the sea with a mountain in the background during sunset." src="{{ asset('frontend/images/Travellers-Sea-Sky-1.jpg') }}" loading="lazy"></div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="{{ asset('frontend/js/home.js') }}" defer></script>
@endpush
