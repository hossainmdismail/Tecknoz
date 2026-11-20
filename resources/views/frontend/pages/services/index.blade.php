@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d8')
@section('seo_key', 'services')
@section('title', 'Tecknoz Services – Software Development, Semiconductor Engineering & Business Solutions')
@section('description', 'Discover Tecknoz’s full range of services, from app and web development, UI/UX, SaaS, eCommerce, and AI automation to advanced semiconductor engineering including FPGA/IP, ASIC/SoC design, verification, IC layout, PCB design, embedded software, RTL development, and QA. We also provide global talent acquisition and end-to-end business strategy support to help companies grow with confidence.')


@section('content')
  <section class="hero-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="hero-section-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Turning Ideas into <br>‍<em class="hero-highligt">Excellent Products</em></h1>
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
    <div data-poster-url="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" data-video-urls="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }},{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-autoplay="true" data-loop="false" data-wf-ignore="true" class="hero-background w-background-video w-background-video-atom"><video id="e81a8be9-c539-6e96-a78c-9fcef6f19f55-video" autoplay="" poster="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }}" data-wf-ignore="true">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-wf-ignore="true">
      </video></div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="service-wrapper">
        <a href="{{ route('services.show', 'design-development') }}" class="service-card w-inline-block">
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
                <div class="service-item-text">Branding</div>
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
        <a href="{{ route('services.show', 'semiconductor') }}" class="service-card w-inline-block">
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
                <div class="service-item-text"> IC Layout</div>
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
        <a href="{{ route('services.show', 'ai-automation') }}" class="service-card w-inline-block">
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
        <a href="{{ route('services.show', 'digital-marketing') }}" class="service-card w-inline-block">
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
                <div class="service-item-text"> TikTok Management And Marketing</div>
              </div>
            </div>
            <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
          </div>
        </a>
        <a href="{{ route('services.show', 'recruitment') }}" class="service-card w-inline-block">
          <div class="service-card-head">
            <div class="service-image-wrap"><img src="{{ asset('frontend/images/recruiment.jpg') }}" loading="lazy" alt="" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/recruiment-p-500.jpg') }} 500w, {{ asset('frontend/images/recruiment-p-800.jpg') }} 800w, {{ asset('frontend/images/recruiment-p-1080.jpg') }} 1080w, {{ asset('frontend/images/recruiment.jpg') }} 1253w" class="service-cover-image"></div>
          </div>
          <div class="service-body">
            <div class="service-text-wrap">
              <h2 class="service-card-title">‍Recruitment</h2>
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
                <div class="service-item-text">IT Recruitment</div>
              </div>
            </div>
            <div class="service-logo-wrap"><img src="{{ asset('frontend/images/webflow-logo_1webflow%20logo.avif') }}" loading="lazy" alt="" class="service-logo"></div>
          </div>
        </a>
        <a href="{{ route('services.show', 'business') }}" class="service-card w-inline-block">
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
        <a href="{{ route('services.show', 'stuff-augmentation') }}" class="service-card w-inline-block">
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
  </section>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
