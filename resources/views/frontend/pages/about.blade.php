@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603d1')
@section('seo_key', 'about')
@section('title', 'Tecknoz – Full-Stack Digital, Semiconductor & Business Solutions Partner')
@section('description', 'Tecknoz is a multifaceted solutions provider offering app and web development, UI/UX, SaaS, eCommerce, agentic AI automation, digital marketing, and global talent acquisition. We also deliver end-to-end semiconductor engineering services including FPGA/IP, ASIC/SoC design, verification, IC layout, PCB design, embedded software, RTL development, and QA. From product engineering to business strategy, Tecknoz helps companies build, scale, and innovate with precision.')
@section('og_image', asset('frontend/images/Tecknoz-team_1Tecknoz-team.avif'))

@section('content')
  @php($globalSettings = app(\App\Support\FrontendSeo::class)->globalSettings())
  <section class="hero-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="hero-section-wrapper">
        <div class="hero-text">
          <h1 class="hero-title"><strong>Unleash the Power of</strong><br>‍<strong><em class="hero-highligt">Innovation &amp; Growth</em></strong></h1>
          <p class="heading">End-to-end digital &amp; engineering solutions hub</p>
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
    <div data-poster-url="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" data-video-urls="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }},{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-autoplay="true" data-loop="false" data-wf-ignore="true" class="hero-background w-background-video w-background-video-atom"><video id="aaa3f1a9-4d10-1b0b-ee8c-041082e9ea29-video" autoplay="" poster="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_poster.0000000.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_mp4.mp4') }}" data-wf-ignore="true">
        <source src="{{ asset('frontend/videos/Forerunner%E2%84%A2%EF%B8%8F---Webflow-Ecommerce-website-template_webm.webm') }}" data-wf-ignore="true">
      </video></div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="about-details-wrapper">
        <div class="about-details-left">
          <h3 class="about-details-text">Tecknoz is a one-stop solutions partner delivering advanced semiconductor engineering, UI/UX &amp; SaaS development, AI automation &amp; global talent acquisition.<br>We power business growth end-to-end with strategic consulting, legal setup, sales alignment, and market expansion, backed by deep expertise and data-driven execution.</h3><img src="{{ asset('frontend/images/Tecknoz-team_1Tecknoz-team.avif') }}" loading="lazy" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="{{ asset('frontend/images/Tecknoz-team_1-p-500.avif') }} 500w, {{ asset('frontend/images/Tecknoz-team_1-p-800.avif') }} 800w, {{ asset('frontend/images/Tecknoz-team_1Tecknoz-team.avif') }} 1280w" alt="" class="image">
        </div>
        <div id="w-node-_38c54a0c-1a74-e68f-c3b3-5f40d845acab-a6c603d1" class="about-details-right">
          <div class="about-details-right-text-wrap">
            <div class="text-block">About Tecknoz</div>
            <h3 class="about-details-right-text">We are a multifaceted solutions provider offering a comprehensive suite of services to meet the diverse needs of our clients.<br>‍<br><strong>Company Founded – 2021</strong><strong> </strong>Tecknoz was established with a mission to deliver cutting-edge solutions.<br>‍<br>‍<strong>Partnered with Prominent Overseas Clients – 2022</strong> We earned the trust of industry leaders across continents, marking our global presence.<br>‍<br>‍<strong>Expanded Service Offerings – 2023</strong> Our portfolio grew to meet evolving client needs, from tech to talent and beyond.<br>‍<br>‍<strong>Working with Government Bodies – 2024</strong> Tecknoz began collaborating with key public sector organizations to enhance infrastructure and development.<br>‍<br>‍<strong>Entered AI and Semiconductor Industries – 2025</strong> We stepped into the future, tackling groundbreaking sectors with confidence.</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="about-stats-wraper">
        <div class="about-stats-text-wrapper">
          <p class="section-subtitle">{{ $globalSettings?->site_tagline ?: 'The light is here to shine.' }}</p>
          <h2 class="section-title">We Deliver <span class="italic"><em>Value</em></span> <br>Not Just Products</h2>
        </div>
        <div class="about-stats-content">
          <div class="stats-card">
            <div class="stats-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 70 70" fill="none">
                <g id="infinity">
                  <path d="M53.0184 23.3333C67.8817 23.3333 67.8817 46.6666 53.0184 46.6666C38.1579 46.6666 32.2138 23.3333 15.8629 23.3333C2.49002 23.3333 2.49002 46.6666 15.8629 46.6666C32.2138 46.6666 38.1579 23.3333 53.0213 23.3333H53.0184Z" stroke="#4555FD" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
              </svg></div>
            <div class="stats-text-wrapper">
              <h5 class="stats-title">Creative Problem Solving</h5>
              <p class="stats-subtitle">We unlock infinite possibilities by turning challenges into opportunities, crafting innovative solutions that lead to lasting success.</p>
            </div>
          </div>
          <div class="stats-liner"></div>
          <div class="stats-card">
            <div class="stats-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 70 70" fill="none">
                <g id="percent-01">
                  <path d="M55.4166 14.5833L14.5833 55.4166M21.8749 18.9583C21.8749 20.5691 20.5691 21.8749 18.9583 21.8749C17.3474 21.8749 16.0416 20.5691 16.0416 18.9583C16.0416 17.3474 17.3474 16.0416 18.9583 16.0416C20.5691 16.0416 21.8749 17.3474 21.8749 18.9583ZM53.9582 51.0416C53.9582 52.6524 52.6524 53.9582 51.0416 53.9582C49.4308 53.9582 48.1249 52.6524 48.1249 51.0416C48.1249 49.4308 49.4308 48.1249 51.0416 48.1249C52.6524 48.1249 53.9582 49.4308 53.9582 51.0416Z" stroke="#4555FD" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
              </svg></div>
            <div class="stats-text-wrapper">
              <h5 class="stats-title">Strategic Startup Solutions</h5>
              <p class="stats-subtitle">By leveraging data and strategies, we drive exponential growth, guiding your startup through unique and impactful paths.</p>
            </div>
          </div>
          <div class="stats-liner right"></div>
          <div class="stats-card">
            <div class="stats-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 70 70" fill="none">
                <g id="bar-chart-01">
                  <path d="M52.5 58.3334V29.1667M35 58.3334V11.6667M17.5 58.3334V40.8334" stroke="#4555FD" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
              </svg></div>
            <div class="stats-text-wrapper">
              <h5 class="stats-title">Bringing Your Vision to Life</h5>
              <p class="stats-subtitle">We ensure your brand stands out with measurable success, transforming your ideas into powerful, visual experiences.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="video-wrapper">
        <div data-poster-url="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-poster-00001.jpg') }}" data-video-urls="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-transcode.mp4') }},{{ asset('frontend/videos/3251737-hd_1280_720_50fps-transcode.webm') }}" data-autoplay="true" data-loop="true" data-wf-ignore="true" class="video w-background-video w-background-video-atom"><video id="dab5fc86-fb91-2b82-6082-a000f7f37064-video" autoplay="" loop="" poster="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-poster-00001.jpg') }}" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
            <source src="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-transcode.mp4') }}" data-wf-ignore="true">
            <source src="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-transcode.webm') }}" data-wf-ignore="true">
          </video><noscript>
            <style>
  [data-wf-bgvideo-fallback-img] {
    display: none;
  }
  @media (prefers-reduced-motion: reduce) {
    [data-wf-bgvideo-fallback-img] {
      position: absolute;
      z-index: -100;
      display: inline-block;
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }</style><img data-wf-bgvideo-fallback-img="true" src="{{ asset('frontend/videos/3251737-hd_1280_720_50fps-poster-00001.jpg') }}" alt="">
          </noscript>
          <div aria-live="polite"><button type="button" data-w-bg-video-control="true" aria-label="Play or pause the company video" aria-controls="dab5fc86-fb91-2b82-6082-a000f7f37064-video" class="w-backgroundvideo-backgroundvideoplaypausebutton w-background-video--control"><span>@svg('heroicon-s-pause', '', ['width' => 24, 'height' => 24, 'aria-hidden' => 'true'])</span><span hidden="">@svg('heroicon-s-play', '', ['width' => 24, 'height' => 24, 'aria-hidden' => 'true'])</span></button></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="team-wrapper">
        <div class="team-header">
          <h2 class="section-title">About <span class="italic"><em>Tecknoz</em></span></h2>
          <p class="section-subtitle">A global one-stop hub delivering digital, engineering, AI, talent, and business strategy solutions that drive innovation and sustainable growth.</p>
        </div>
        <div class="team-content">
          <div id="w-node-_92a83fe4-d910-cee8-2a9a-9cdc9b1628af-a6c603d1" class="team-card base">
            <div class="team-text-wrap">
              <h5 class="team-title doc">Driving Innovation, Technology, and Business Growth</h5>
              <p class="team-subtitle doc"><strong>Tecknoz is a global solutions provider delivering integrated digital, engineering, AI, and talent services that empower businesses to innovate and grow. We offer a complete suite of capabilities, including app and web development, digital marketing, graphic design, and full-spectrum talent acquisition—making us a one-stop partner for modern enterprises.<br><br>Beyond digital services, our advanced Semiconductor Engineering expertise spans FPGA/IP development, ASIC/SoC design, verification, IC layout, PCB design, embedded software, RTL design, validation, and QA—enabling hardware innovators to build with precision and confidence.<br><br>We excel in crafting intuitive UI/UX, scalable SaaS products, high-performing eCommerce systems, and intelligent AI automation workflows. Our recruitment division sources top-tier talent across IT, leadership, technical specialties, and global offshoring with unmatched accuracy and speed.<br><br>Through strategic business consulting—covering planning, legal setup, client acquisition, sales optimization, and market expansion—we help organizations accelerate growth with data-driven clarity and flawless execution.<br><br>Guided by our mission to transform ideas into impact and our vision to lead globally in digital, technological, and human capital solutions by 2030, Tecknoz bridges technology, talent, and strategy to drive sustainable success for businesses worldwide.</strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
