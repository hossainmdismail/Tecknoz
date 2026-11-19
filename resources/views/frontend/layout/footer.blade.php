@php
    $contactEmail = $globalSettings?->contact_email ?: 'contact@tecknoz.com';
    $contactPhone = $globalSettings?->contact_phone ?: '+880 1540-306102';
    $contactPhoneHref = preg_replace('/[^+0-9]/', '', $contactPhone);
    $whatsappLabel = $globalSettings?->whatsapp_number ?: '+8801540306102';
    $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappLabel);
@endphp

  <footer class="footer" id="contact">
    <div class="container">
      <div class="footer-wrapper-two">
        <div class="footer-two-head">
          <p class="footer-two-description">{{ $globalSettings?->footer_text ?: ($globalSettings?->company_short_description ?: 'Your partner for innovation, uniting digital services, semiconductor engineering, AI automation, and global talent to fuel business success.') }}</p>
          <div class="footer-social-block-two">
            <a href="{{ $globalSettings?->linkedin_url ?: 'https://www.linkedin.com/company/tecknoz' }}" target="_blank" rel="noopener noreferrer" class="footer-social-link w-inline-block">
              <div class="social-logo w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewbox="0 0 28 29" fill="none">
                  <path d="M23.625 2.77051H4.375C3.91087 2.77051 3.46575 2.95488 3.13756 3.28307C2.80937 3.61126 2.625 4.05638 2.625 4.52051V23.7705C2.625 24.2346 2.80937 24.6798 3.13756 25.0079C3.46575 25.3361 3.91087 25.5205 4.375 25.5205H23.625C24.0891 25.5205 24.5342 25.3361 24.8624 25.0079C25.1906 24.6798 25.375 24.2346 25.375 23.7705V4.52051C25.375 4.05638 25.1906 3.61126 24.8624 3.28307C24.5342 2.95488 24.0891 2.77051 23.625 2.77051ZM23.625 23.7705H4.375V4.52051H23.625V23.7705ZM10.5 12.3955V19.3955C10.5 19.6276 10.4078 19.8501 10.2437 20.0142C10.0796 20.1783 9.85706 20.2705 9.625 20.2705C9.39294 20.2705 9.17038 20.1783 9.00628 20.0142C8.84219 19.8501 8.75 19.6276 8.75 19.3955V12.3955C8.75 12.1634 8.84219 11.9409 9.00628 11.7768C9.17038 11.6127 9.39294 11.5205 9.625 11.5205C9.85706 11.5205 10.0796 11.6127 10.2437 11.7768C10.4078 11.9409 10.5 12.1634 10.5 12.3955ZM20.125 15.458V19.3955C20.125 19.6276 20.0328 19.8501 19.8687 20.0142C19.7046 20.1783 19.4821 20.2705 19.25 20.2705C19.0179 20.2705 18.7954 20.1783 18.6313 20.0142C18.4672 19.8501 18.375 19.6276 18.375 19.3955V15.458C18.375 14.8778 18.1445 14.3214 17.7343 13.9112C17.3241 13.501 16.7677 13.2705 16.1875 13.2705C15.6073 13.2705 15.0509 13.501 14.6407 13.9112C14.2305 14.3214 14 14.8778 14 15.458V19.3955C14 19.6276 13.9078 19.8501 13.7437 20.0142C13.5796 20.1783 13.3571 20.2705 13.125 20.2705C12.8929 20.2705 12.6704 20.1783 12.5063 20.0142C12.3422 19.8501 12.25 19.6276 12.25 19.3955V12.3955C12.2511 12.1812 12.3308 11.9747 12.474 11.8153C12.6172 11.6558 12.814 11.5545 13.027 11.5304C13.24 11.5064 13.4543 11.5614 13.6295 11.685C13.8046 11.8086 13.9283 11.9921 13.977 12.2008C14.569 11.7993 15.2591 11.5666 15.9733 11.5276C16.6875 11.4887 17.3988 11.6451 18.0309 11.9799C18.6629 12.3148 19.1918 12.8155 19.5607 13.4283C19.9297 14.041 20.1248 14.7427 20.125 15.458ZM10.9375 9.33301C10.9375 9.5926 10.8605 9.84635 10.7163 10.0622C10.5721 10.278 10.3671 10.4463 10.1273 10.5456C9.88744 10.6449 9.62354 10.6709 9.36894 10.6203C9.11434 10.5696 8.88048 10.4446 8.69692 10.2611C8.51337 10.0775 8.38836 9.84366 8.33772 9.58906C8.28708 9.33446 8.31307 9.07056 8.41241 8.83074C8.51175 8.59091 8.67998 8.38592 8.89581 8.2417C9.11165 8.09748 9.36541 8.02051 9.625 8.02051C9.9731 8.02051 10.3069 8.15879 10.5531 8.40493C10.7992 8.65107 10.9375 8.98491 10.9375 9.33301Z" fill="#0A0A0A"></path>
                </svg></div>
            </a>
            <a href="{{ $globalSettings?->instagram_url ?: 'https://www.instagram.com/tecknoz.corporation' }}" target="_blank" rel="noopener noreferrer" class="footer-social-link w-inline-block">
              <div class="social-logo w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewbox="0 0 28 29" fill="none">
                  <g id="InstagramLogo">
                    <path id="Vector" d="M14 8.89551C12.9616 8.89551 11.9466 9.20342 11.0833 9.78029C10.2199 10.3572 9.54699 11.1771 9.14963 12.1364C8.75227 13.0957 8.64831 14.1513 8.85088 15.1697C9.05345 16.1881 9.55346 17.1236 10.2877 17.8578C11.0219 18.592 11.9574 19.0921 12.9758 19.2946C13.9942 19.4972 15.0498 19.3932 16.0091 18.9959C16.9684 18.5985 17.7883 17.9256 18.3652 17.0623C18.9421 16.1989 19.25 15.1839 19.25 14.1455C19.2486 12.7536 18.695 11.419 17.7107 10.4348C16.7265 9.45054 15.3919 8.89696 14 8.89551ZM14 17.6455C13.3078 17.6455 12.6311 17.4402 12.0555 17.0557C11.4799 16.6711 11.0313 16.1244 10.7664 15.4849C10.5015 14.8454 10.4322 14.1416 10.5673 13.4627C10.7023 12.7838 11.0356 12.1601 11.5251 11.6706C12.0146 11.1812 12.6383 10.8478 13.3172 10.7128C13.9961 10.5777 14.6999 10.647 15.3394 10.9119C15.9789 11.1768 16.5256 11.6254 16.9101 12.201C17.2947 12.7766 17.5 13.4533 17.5 14.1455C17.5 15.0738 17.1313 15.964 16.4749 16.6204C15.8185 17.2768 14.9283 17.6455 14 17.6455ZM19.25 2.77051H8.75C7.12608 2.77224 5.56917 3.41811 4.42089 4.5664C3.27261 5.71468 2.62674 7.27159 2.625 8.89551V19.3955C2.62674 21.0194 3.27261 22.5763 4.42089 23.7246C5.56917 24.8729 7.12608 25.5188 8.75 25.5205H19.25C20.8739 25.5188 22.4308 24.8729 23.5791 23.7246C24.7274 22.5763 25.3733 21.0194 25.375 19.3955V8.89551C25.3733 7.27159 24.7274 5.71468 23.5791 4.5664C22.4308 3.41811 20.8739 2.77224 19.25 2.77051ZM23.625 19.3955C23.625 20.5558 23.1641 21.6686 22.3436 22.4891C21.5231 23.3096 20.4103 23.7705 19.25 23.7705H8.75C7.58968 23.7705 6.47688 23.3096 5.65641 22.4891C4.83594 21.6686 4.375 20.5558 4.375 19.3955V8.89551C4.375 7.73519 4.83594 6.62239 5.65641 5.80192C6.47688 4.98144 7.58968 4.52051 8.75 4.52051H19.25C20.4103 4.52051 21.5231 4.98144 22.3436 5.80192C23.1641 6.62239 23.625 7.73519 23.625 8.89551V19.3955ZM21 8.45801C21 8.7176 20.923 8.97135 20.7788 9.18719C20.6346 9.40303 20.4296 9.57126 20.1898 9.6706C19.9499 9.76994 19.686 9.79593 19.4314 9.74529C19.1768 9.69465 18.943 9.56964 18.7594 9.38609C18.5759 9.20253 18.4509 8.96866 18.4002 8.71406C18.3496 8.45946 18.3756 8.19556 18.4749 7.95574C18.5742 7.71591 18.7425 7.51092 18.9583 7.3667C19.1742 7.22248 19.4279 7.14551 19.6875 7.14551C20.0356 7.14551 20.3694 7.28379 20.6156 7.52993C20.8617 7.77607 21 8.10991 21 8.45801Z" fill="#0A0A0A"></path>
                  </g>
                </svg></div>
            </a>
            <a href="{{ $globalSettings?->facebook_url ?: 'https://www.facebook.com/tecknoz' }}" target="_blank" rel="noopener noreferrer" class="footer-social-link w-inline-block">
              <div class="social-logo w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="28px" height="100%" viewbox="0 -0.5 25 25" fill="none">
                  <g id="SVGRepo_bgCarrier" stroke-width="0">
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                  <g id="SVGRepo_iconCarrier">
                    <path d="M11.75 19C11.75 19.4142 12.0858 19.75 12.5 19.75C12.9142 19.75 13.25 19.4142 13.25 19H11.75ZM13.25 11C13.25 10.5858 12.9142 10.25 12.5 10.25C12.0858 10.25 11.75 10.5858 11.75 11H13.25ZM15.5 5.75C15.9142 5.75 16.25 5.41421 16.25 5C16.25 4.58579 15.9142 4.25 15.5 4.25V5.75ZM12.5 8H11.75H12.5ZM11.75 11C11.75 11.4142 12.0858 11.75 12.5 11.75C12.9142 11.75 13.25 11.4142 13.25 11H11.75ZM12.5 10.25C12.0858 10.25 11.75 10.5858 11.75 11C11.75 11.4142 12.0858 11.75 12.5 11.75V10.25ZM14.5 11.75C14.9142 11.75 15.25 11.4142 15.25 11C15.25 10.5858 14.9142 10.25 14.5 10.25V11.75ZM12.5 11.75C12.9142 11.75 13.25 11.4142 13.25 11C13.25 10.5858 12.9142 10.25 12.5 10.25V11.75ZM10.5 10.25C10.0858 10.25 9.75 10.5858 9.75 11C9.75 11.4142 10.0858 11.75 10.5 11.75V10.25ZM13.25 19V11H11.75V19H13.25ZM15.5 4.25C13.4289 4.25 11.75 5.92893 11.75 8H13.25C13.25 6.75736 14.2574 5.75 15.5 5.75V4.25ZM11.75 8V11H13.25V8H11.75ZM12.5 11.75H14.5V10.25H12.5V11.75ZM12.5 10.25H10.5V11.75H12.5V10.25Z" fill="#000000"></path>
                  </g>
                </g></g></svg></div>
            </a>
            <a href="https://www.tiktok.com/@tecknoz.corporation" target="_blank" rel="noopener noreferrer" class="footer-social-link w-inline-block">
              <div class="social-logo w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="26px" height="100%" viewbox="0 0 192 192" fill="none">
                  <path stroke="#000000" stroke-linecap="round" stroke-width="12" d="M108 132a38.004 38.004 0 0 1-23.458 35.107 37.995 37.995 0 0 1-41.412-8.237 37.996 37.996 0 0 1-8.237-41.412A38.001 38.001 0 0 1 70 94"></path>
                  <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M108 132V22c0 18 24 50 52 50"></path>
                </svg></div>
            </a>
          </div>
        </div>
        <div class="footer-form w-form">
          <div class="footer-form-container">
            <div class="footer-form-block">
              <input class="footer-form-field w-input" aria-label="Get product updates" placeholder="Enter your email" type="email" disabled>
              <input type="button" class="footer-form-submit w-button" value="Subscribe" disabled>
            </div>
          </div>
        </div>
        <div class="footer-two-content">
          <div class="footer-block-two">
            <div class="footer-link-wraper">
              <div class="footer-title">Important Links</div>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'about', 'homeSection' => 'about']) class="footer-link-two">About Us</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services', 'homeSection' => 'services']) class="footer-link-two">Our Services</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'projects', 'homeSection' => 'projects']) class="footer-link-two">Our Projects</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'blogs', 'homeSection' => 'blogs']) class="footer-link-two">Blogs</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) class="footer-link-two">Contact Us</a>
              <div id="google_translate_element" class="google-translate-block">
                <div class="w-embed w-script">
                  <style>
.goog-te-banner-frame.skiptranslate,
.goog-logo-link,
.goog-te-gadget span,
.VIpgJd-ZVi9od-ORHb-OEVmcd {
  display: none !important;
}
select.goog-te-combo {
    padding: 6px;
    border: 1px solid #00000012;
}
</style>
                  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    {pageLanguage: 'en'},
    'google_translate_element'
  );
}
</script>
                  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-block-two">
            <div class="footer-link-wraper">
              <div class="footer-title">Our Services</div>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'digital-marketing'], 'homeSection' => 'service-digital-marketing']) class="footer-link-two">Digital Marketing</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'design-development'], 'homeSection' => 'service-design-development']) class="footer-link-two">Design &amp; Development</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'recruitment'], 'homeSection' => 'service-recruitment']) class="footer-link-two">Recruitment</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'semiconductor'], 'homeSection' => 'service-semiconductor']) class="footer-link-two">Semiconductor</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'business'], 'homeSection' => 'service-business']) class="footer-link-two">Business</a>
              <a data-wf--footer-links--variant="base" @include('frontend.layout.link-attributes', ['name' => 'services.show', 'parameters' => ['slug' => 'ai-automation'], 'homeSection' => 'service-ai-automation']) class="footer-link-two">AI Automation</a>
            </div>
          </div>
          <div class="footer-block-two">
            <div class="footer-link-wraper">
              <div class="footer-title">Specialized industry</div>
              <a data-wf--footer-links--variant="base" class="footer-link-two">Semiconductor Industry</a>
              <a data-wf--footer-links--variant="base" class="footer-link-two">E-Commerce Industry</a>
              <a data-wf--footer-links--variant="base" class="footer-link-two">Real Estate</a>
              <a data-wf--footer-links--variant="base" class="footer-link-two">Edtech Industry</a>
              <a data-wf--footer-links--variant="base" class="footer-link-two">Travel &amp; Hospitality</a>
              <a href="https://gamma.app/docs/Tecknoz-zjcvvsxvusckrda" target="_blank" rel="noopener noreferrer" class="company-deck w-inline-block">
                <div class="footer-link-two">Company Profile</div>
                <div class="deck-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7379 11C21.7419 11 21.746 11 21.75 11L21.75 11.0001V13.0001H21.7082C16.9126 13.0198 13.75 16.4251 13.75 19.5H11.75C11.75 16.9999 13.1341 14.6065 15.3659 13.0001H2.25V11.0001H15.3661C13.1342 9.39368 11.75 7.00012 11.75 4.5H13.75C13.75 7.58118 16.9257 10.9943 21.7379 11Z" fill="currentColor"></path>
                  </svg></div>
              </a>
            </div>
          </div>
          <div class="footer-block-two">
            <div class="footer-link-wraper">
              <div class="footer-title">Contact</div>
              @if ($globalSettings?->address)
                <div class="company-deck">
                  @if ($globalSettings->map_url)
                    <a href="{{ $globalSettings->map_url }}" target="_blank" rel="noopener noreferrer" class="footer-link-two">{{ $globalSettings->address }}</a>
                  @else
                    <span class="footer-link-two">{{ $globalSettings->address }}</span>
                  @endif
                </div>
              @else
              <div class="company-deck">
                <div class="location-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                    <path d="M8 4C7.50555 4 7.0222 4.14662 6.61107 4.42133C6.19995 4.69603 5.87952 5.08648 5.6903 5.54329C5.50108 6.00011 5.45157 6.50277 5.54804 6.98773C5.6445 7.47268 5.8826 7.91814 6.23223 8.26777C6.58186 8.6174 7.02732 8.8555 7.51227 8.95196C7.99723 9.04843 8.49989 8.99892 8.95671 8.8097C9.41352 8.62048 9.80397 8.30005 10.0787 7.88893C10.3534 7.4778 10.5 6.99445 10.5 6.5C10.5 5.83696 10.2366 5.20107 9.76777 4.73223C9.29893 4.26339 8.66304 4 8 4ZM8 8C7.70333 8 7.41332 7.91203 7.16664 7.7472C6.91997 7.58238 6.72771 7.34811 6.61418 7.07403C6.50065 6.79994 6.47094 6.49834 6.52882 6.20736C6.5867 5.91639 6.72956 5.64912 6.93934 5.43934C7.14912 5.22956 7.41639 5.0867 7.70736 5.02882C7.99834 4.97094 8.29994 5.00065 8.57403 5.11418C8.84811 5.22771 9.08238 5.41997 9.2472 5.66664C9.41203 5.91332 9.5 6.20333 9.5 6.5C9.5 6.89782 9.34196 7.27936 9.06066 7.56066C8.77936 7.84196 8.39782 8 8 8ZM8 1C6.54182 1.00165 5.14383 1.58165 4.11274 2.61274C3.08165 3.64383 2.50165 5.04182 2.5 6.5C2.5 8.4625 3.40688 10.5425 5.125 12.5156C5.89701 13.4072 6.76591 14.2101 7.71562 14.9094C7.7997 14.9683 7.89985 14.9999 8.0025 14.9999C8.10515 14.9999 8.20531 14.9683 8.28938 14.9094C9.23734 14.2098 10.1046 13.4069 10.875 12.5156C12.5906 10.5425 13.5 8.4625 13.5 6.5C13.4983 5.04182 12.9184 3.64383 11.8873 2.61274C10.8562 1.58165 9.45818 1.00165 8 1ZM8 13.875C6.96688 13.0625 3.5 10.0781 3.5 6.5C3.5 5.30653 3.97411 4.16193 4.81802 3.31802C5.66193 2.47411 6.80653 2 8 2C9.19347 2 10.3381 2.47411 11.182 3.31802C12.0259 4.16193 12.5 5.30653 12.5 6.5C12.5 10.0769 9.03312 13.0625 8 13.875Z" fill="#525252"></path>
                  </svg></div>
                <a data-wf--footer-links--variant="base" class="footer-link-two">Dhaka, Bangladesh</a>
              </div>
              <div class="company-deck">
                <div class="location-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                    <path d="M8 4C7.50555 4 7.0222 4.14662 6.61107 4.42133C6.19995 4.69603 5.87952 5.08648 5.6903 5.54329C5.50108 6.00011 5.45157 6.50277 5.54804 6.98773C5.6445 7.47268 5.8826 7.91814 6.23223 8.26777C6.58186 8.6174 7.02732 8.8555 7.51227 8.95196C7.99723 9.04843 8.49989 8.99892 8.95671 8.8097C9.41352 8.62048 9.80397 8.30005 10.0787 7.88893C10.3534 7.4778 10.5 6.99445 10.5 6.5C10.5 5.83696 10.2366 5.20107 9.76777 4.73223C9.29893 4.26339 8.66304 4 8 4ZM8 8C7.70333 8 7.41332 7.91203 7.16664 7.7472C6.91997 7.58238 6.72771 7.34811 6.61418 7.07403C6.50065 6.79994 6.47094 6.49834 6.52882 6.20736C6.5867 5.91639 6.72956 5.64912 6.93934 5.43934C7.14912 5.22956 7.41639 5.0867 7.70736 5.02882C7.99834 4.97094 8.29994 5.00065 8.57403 5.11418C8.84811 5.22771 9.08238 5.41997 9.2472 5.66664C9.41203 5.91332 9.5 6.20333 9.5 6.5C9.5 6.89782 9.34196 7.27936 9.06066 7.56066C8.77936 7.84196 8.39782 8 8 8ZM8 1C6.54182 1.00165 5.14383 1.58165 4.11274 2.61274C3.08165 3.64383 2.50165 5.04182 2.5 6.5C2.5 8.4625 3.40688 10.5425 5.125 12.5156C5.89701 13.4072 6.76591 14.2101 7.71562 14.9094C7.7997 14.9683 7.89985 14.9999 8.0025 14.9999C8.10515 14.9999 8.20531 14.9683 8.28938 14.9094C9.23734 14.2098 10.1046 13.4069 10.875 12.5156C12.5906 10.5425 13.5 8.4625 13.5 6.5C13.4983 5.04182 12.9184 3.64383 11.8873 2.61274C10.8562 1.58165 9.45818 1.00165 8 1ZM8 13.875C6.96688 13.0625 3.5 10.0781 3.5 6.5C3.5 5.30653 3.97411 4.16193 4.81802 3.31802C5.66193 2.47411 6.80653 2 8 2C9.19347 2 10.3381 2.47411 11.182 3.31802C12.0259 4.16193 12.5 5.30653 12.5 6.5C12.5 10.0769 9.03312 13.0625 8 13.875Z" fill="#525252"></path>
                  </svg></div>
                <a data-wf--footer-links--variant="base" class="footer-link-two">London, GB</a>
              </div>
              <div class="company-deck">
                <div class="location-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                    <path d="M8 4C7.50555 4 7.0222 4.14662 6.61107 4.42133C6.19995 4.69603 5.87952 5.08648 5.6903 5.54329C5.50108 6.00011 5.45157 6.50277 5.54804 6.98773C5.6445 7.47268 5.8826 7.91814 6.23223 8.26777C6.58186 8.6174 7.02732 8.8555 7.51227 8.95196C7.99723 9.04843 8.49989 8.99892 8.95671 8.8097C9.41352 8.62048 9.80397 8.30005 10.0787 7.88893C10.3534 7.4778 10.5 6.99445 10.5 6.5C10.5 5.83696 10.2366 5.20107 9.76777 4.73223C9.29893 4.26339 8.66304 4 8 4ZM8 8C7.70333 8 7.41332 7.91203 7.16664 7.7472C6.91997 7.58238 6.72771 7.34811 6.61418 7.07403C6.50065 6.79994 6.47094 6.49834 6.52882 6.20736C6.5867 5.91639 6.72956 5.64912 6.93934 5.43934C7.14912 5.22956 7.41639 5.0867 7.70736 5.02882C7.99834 4.97094 8.29994 5.00065 8.57403 5.11418C8.84811 5.22771 9.08238 5.41997 9.2472 5.66664C9.41203 5.91332 9.5 6.20333 9.5 6.5C9.5 6.89782 9.34196 7.27936 9.06066 7.56066C8.77936 7.84196 8.39782 8 8 8ZM8 1C6.54182 1.00165 5.14383 1.58165 4.11274 2.61274C3.08165 3.64383 2.50165 5.04182 2.5 6.5C2.5 8.4625 3.40688 10.5425 5.125 12.5156C5.89701 13.4072 6.76591 14.2101 7.71562 14.9094C7.7997 14.9683 7.89985 14.9999 8.0025 14.9999C8.10515 14.9999 8.20531 14.9683 8.28938 14.9094C9.23734 14.2098 10.1046 13.4069 10.875 12.5156C12.5906 10.5425 13.5 8.4625 13.5 6.5C13.4983 5.04182 12.9184 3.64383 11.8873 2.61274C10.8562 1.58165 9.45818 1.00165 8 1ZM8 13.875C6.96688 13.0625 3.5 10.0781 3.5 6.5C3.5 5.30653 3.97411 4.16193 4.81802 3.31802C5.66193 2.47411 6.80653 2 8 2C9.19347 2 10.3381 2.47411 11.182 3.31802C12.0259 4.16193 12.5 5.30653 12.5 6.5C12.5 10.0769 9.03312 13.0625 8 13.875Z" fill="#525252"></path>
                  </svg></div>
                <a data-wf--footer-links--variant="base" class="footer-link-two">Shenzhen, China</a>
              </div>
              <div class="company-deck">
                <div class="location-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                    <path d="M8 4C7.50555 4 7.0222 4.14662 6.61107 4.42133C6.19995 4.69603 5.87952 5.08648 5.6903 5.54329C5.50108 6.00011 5.45157 6.50277 5.54804 6.98773C5.6445 7.47268 5.8826 7.91814 6.23223 8.26777C6.58186 8.6174 7.02732 8.8555 7.51227 8.95196C7.99723 9.04843 8.49989 8.99892 8.95671 8.8097C9.41352 8.62048 9.80397 8.30005 10.0787 7.88893C10.3534 7.4778 10.5 6.99445 10.5 6.5C10.5 5.83696 10.2366 5.20107 9.76777 4.73223C9.29893 4.26339 8.66304 4 8 4ZM8 8C7.70333 8 7.41332 7.91203 7.16664 7.7472C6.91997 7.58238 6.72771 7.34811 6.61418 7.07403C6.50065 6.79994 6.47094 6.49834 6.52882 6.20736C6.5867 5.91639 6.72956 5.64912 6.93934 5.43934C7.14912 5.22956 7.41639 5.0867 7.70736 5.02882C7.99834 4.97094 8.29994 5.00065 8.57403 5.11418C8.84811 5.22771 9.08238 5.41997 9.2472 5.66664C9.41203 5.91332 9.5 6.20333 9.5 6.5C9.5 6.89782 9.34196 7.27936 9.06066 7.56066C8.77936 7.84196 8.39782 8 8 8ZM8 1C6.54182 1.00165 5.14383 1.58165 4.11274 2.61274C3.08165 3.64383 2.50165 5.04182 2.5 6.5C2.5 8.4625 3.40688 10.5425 5.125 12.5156C5.89701 13.4072 6.76591 14.2101 7.71562 14.9094C7.7997 14.9683 7.89985 14.9999 8.0025 14.9999C8.10515 14.9999 8.20531 14.9683 8.28938 14.9094C9.23734 14.2098 10.1046 13.4069 10.875 12.5156C12.5906 10.5425 13.5 8.4625 13.5 6.5C13.4983 5.04182 12.9184 3.64383 11.8873 2.61274C10.8562 1.58165 9.45818 1.00165 8 1ZM8 13.875C6.96688 13.0625 3.5 10.0781 3.5 6.5C3.5 5.30653 3.97411 4.16193 4.81802 3.31802C5.66193 2.47411 6.80653 2 8 2C9.19347 2 10.3381 2.47411 11.182 3.31802C12.0259 4.16193 12.5 5.30653 12.5 6.5C12.5 10.0769 9.03312 13.0625 8 13.875Z" fill="#525252"></path>
                  </svg></div>
                <a data-wf--footer-links--variant="base" class="footer-link-two">Calgary, Canada</a>
              </div>
              @endif
              <div class="company-deck">
                <div class="location-icon w-embed"><svg fill="#525252" width="16" height="16" viewbox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path d="M128.00049,28A100.02594,100.02594,0,0,0,41.11475,177.53908l-9.0044,31.51661a11.99971,11.99971,0,0,0,14.835,14.834l31.5166-9.00391A100.00677,100.00677,0,1,0,128.00049,28Zm0,192a91.87082,91.87082,0,0,1-46.95264-12.86719,3.99494,3.99494,0,0,0-3.14355-.4082l-33.15723,9.47363a3.99979,3.99979,0,0,1-4.94434-4.94531l9.47266-33.15625a4.00111,4.00111,0,0,0-.4082-3.14355A92.01077,92.01077,0,1,1,128.00049,220Zm50.51123-73.457-20.45947-11.69141a12.01054,12.01054,0,0,0-12.12745.12891l-13.80664,8.28418a44.04183,44.04183,0,0,1-19.38232-19.38281l8.28369-13.80664a12.0108,12.0108,0,0,0,.12891-12.127l-11.69092-20.46A10.91584,10.91584,0,0,0,100,72a32.00811,32.00811,0,0,0-32,31.88086A84.001,84.001,0,0,0,151.999,188h.12012A32.00842,32.00842,0,0,0,184,156,10.913,10.913,0,0,0,178.51172,146.543ZM152.10791,180h-.1084A75.99972,75.99972,0,0,1,76,103.8926,23.997,23.997,0,0,1,100,80a2.89975,2.89975,0,0,1,2.51172,1.457L114.20264,101.918a4.00418,4.00418,0,0,1-.043,4.042l-9.38916,15.64844a3.9987,3.9987,0,0,0-.21826,3.69824,52.04112,52.04112,0,0,0,26.1416,26.1416,3.99707,3.99707,0,0,0,3.69873-.21875L150.04,141.84084a4.006,4.006,0,0,1,4.043-.04394l20.46045,11.69238A2.89712,2.89712,0,0,1,176,156,23.99725,23.99725,0,0,1,152.10791,180Z"></path>
                    </g>
                  </svg></div>
                <a data-wf--footer-links--variant="base" href="tel:{{ $contactPhoneHref }}" class="footer-link-two">{{ $contactPhone }}</a>
              </div>
              <div class="company-deck">
                <div class="location-icon w-embed"><svg fill="#525252" width="16" height="16" viewbox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path d="M128.00049,28A100.02594,100.02594,0,0,0,41.11475,177.53908l-9.0044,31.51661a11.99971,11.99971,0,0,0,14.835,14.834l31.5166-9.00391A100.00677,100.00677,0,1,0,128.00049,28Zm0,192a91.87082,91.87082,0,0,1-46.95264-12.86719,3.99494,3.99494,0,0,0-3.14355-.4082l-33.15723,9.47363a3.99979,3.99979,0,0,1-4.94434-4.94531l9.47266-33.15625a4.00111,4.00111,0,0,0-.4082-3.14355A92.01077,92.01077,0,1,1,128.00049,220Zm50.51123-73.457-20.45947-11.69141a12.01054,12.01054,0,0,0-12.12745.12891l-13.80664,8.28418a44.04183,44.04183,0,0,1-19.38232-19.38281l8.28369-13.80664a12.0108,12.0108,0,0,0,.12891-12.127l-11.69092-20.46A10.91584,10.91584,0,0,0,100,72a32.00811,32.00811,0,0,0-32,31.88086A84.001,84.001,0,0,0,151.999,188h.12012A32.00842,32.00842,0,0,0,184,156,10.913,10.913,0,0,0,178.51172,146.543ZM152.10791,180h-.1084A75.99972,75.99972,0,0,1,76,103.8926,23.997,23.997,0,0,1,100,80a2.89975,2.89975,0,0,1,2.51172,1.457L114.20264,101.918a4.00418,4.00418,0,0,1-.043,4.042l-9.38916,15.64844a3.9987,3.9987,0,0,0-.21826,3.69824,52.04112,52.04112,0,0,0,26.1416,26.1416,3.99707,3.99707,0,0,0,3.69873-.21875L150.04,141.84084a4.006,4.006,0,0,1,4.043-.04394l20.46045,11.69238A2.89712,2.89712,0,0,1,176,156,23.99725,23.99725,0,0,1,152.10791,180Z"></path>
                    </g>
                  </svg></div>
                <a data-wf--footer-links--variant="base" href="mailto:{{ $contactEmail }}" class="footer-link-two">{{ $contactEmail }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-divider-two"></div>
      <div class="footer-bottom">
        <a @include('frontend.layout.link-attributes', ['name' => 'privacy-policy']) class="footer-copyright">Privacy &amp; Policy</a>
        <div class="footer-copyright main">{{ $globalSettings?->copyright_text ?: '© ' . now()->year . ', ' . ($globalSettings?->site_name ?: config('app.name')) . ', All rights reserved.' }}</div>
        <a @include('frontend.layout.link-attributes', ['name' => 'terms-of-service']) class="footer-copyright">Terms of Service</a>
      </div>
    </div>
    <div class="contact-pop">
      <div class="contact-wrap">
        <div data-w-id="b11f37b2-0f20-f13c-22ee-4df48cdf5845" class="contact-pop-item">
          <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" class="contact-pop-item-logo w-inline-block">
            <div class="contact-icon w-embed"><svg width="100%" height="100%" viewbox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>whatsapp [#128]</title>
                <desc>Created with Sketch.</desc>
                <defs>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="currentColor">
                    <g id="icons" transform="translate(56.000000, 160.000000)">
                      <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"></path>
                    </g>
                  </g>
                </g>
              </svg></div>
          </a>
          <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" class="contact-pop-item-text w-inline-block">
            <h5 class="contact-pop-text">{{ $whatsappLabel }}</h5>
          </a>
        </div>
        <div data-w-id="b11f37b2-0f20-f13c-22ee-4df48cdf584b" class="contact-pop-item">
          <a href="https://tecknoz.com/wp-content/uploads/2024/05/WhatsApp-Image-2024-05-02-at-02.07.21_e86e7911.jpg" target="_blank" rel="noopener noreferrer" class="contact-pop-item-logo w-inline-block">
            <div class="contact-icon w-embed"><svg viewbox="0 0 300 300" xmlns="http://www.w3.org/2000/svg" fill="transparent">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path fill="transparent" d="M300 255c0 24.854-20.147 45-45 45H45c-24.854 0-45-20.146-45-45V45C0 20.147 20.147 0 45 0h210c24.853 0 45 20.147 45 45v210z"></path>
                  <g fill="#FFF">
                    <path d="M200.803 111.88c-24.213 1.265-45.268 8.605-62.362 25.188-17.271 16.754-25.155 37.284-23 62.734-9.464-1.172-18.084-2.462-26.753-3.192-2.994-.252-6.547.106-9.083 1.537-8.418 4.75-16.488 10.113-26.053 16.092 1.755-7.938 2.891-14.889 4.902-21.575 1.479-4.914.794-7.649-3.733-10.849-29.066-20.521-41.318-51.232-32.149-82.85 8.483-29.25 29.315-46.989 57.621-56.236 38.635-12.62 82.054.253 105.547 30.927 8.485 11.08 13.688 23.516 15.063 38.224zm-111.437-9.852c.223-5.783-4.788-10.993-10.74-11.167-6.094-.179-11.106 4.478-11.284 10.483-.18 6.086 4.475 10.963 10.613 11.119 6.085.154 11.186-4.509 11.411-10.435zm58.141-11.171c-5.974.11-11.022 5.198-10.916 11.004.109 6.018 5.061 10.726 11.204 10.652 6.159-.074 10.83-4.832 10.772-10.977-.051-6.032-4.981-10.79-11.06-10.679z"></path>
                    <path d="M255.201 262.83c-7.667-3.414-14.7-8.536-22.188-9.318-7.459-.779-15.3 3.524-23.104 4.322-23.771 2.432-45.067-4.193-62.627-20.432-33.397-30.89-28.625-78.254 10.014-103.568 34.341-22.498 84.704-14.998 108.916 16.219 21.129 27.24 18.646 63.4-7.148 86.284-7.464 6.623-10.15 12.073-5.361 20.804.884 1.612.985 3.653 1.498 5.689zm-87.274-84.499c4.881.005 8.9-3.815 9.085-8.636.195-5.104-3.91-9.385-9.021-9.406-5.06-.023-9.299 4.318-9.123 9.346.166 4.804 4.213 8.69 9.059 8.696zm56.261-18.022c-4.736-.033-8.76 3.844-8.953 8.629-.205 5.117 3.772 9.319 8.836 9.332 4.898.016 8.768-3.688 8.946-8.562.19-5.129-3.789-9.364-8.829-9.399z"></path>
                  </g>
                </g>
              </svg></div>
          </a>
          <a href="https://tecknoz.com/wp-content/uploads/2024/05/WhatsApp-Image-2024-05-02-at-02.07.21_e86e7911.jpg" target="_blank" rel="noopener noreferrer" class="contact-pop-item-text w-inline-block">
            <h5 class="contact-pop-text">WeChat - TanmoySpondon</h5>
          </a>
        </div>
        <div data-w-id="b11f37b2-0f20-f13c-22ee-4df48cdf5851" class="contact-pop-item">
          <a href="tel:{{ $contactPhoneHref }}" class="contact-pop-item-logo w-inline-block">
            <div class="contact-icon w-embed">
              <svg width="100%" height="100%" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.81536 14.7266C13.0621 18.9492 17.0468 19.117 18.6763 18.9651C19.1917 18.9171 19.6399 18.6546 20.0011 18.2954L21.4217 16.883C22.3806 15.9295 22.1102 14.2949 20.8833 13.628L18.9728 12.5894C18.1672 12.1515 17.1858 12.2801 16.5562 12.9062Z" fill="currentColor"></path>
              </svg>
            </div>
          </a>
          <a href="tel:{{ $contactPhoneHref }}" class="contact-pop-item-text w-inline-block">
            <h5 class="contact-pop-text">{{ $contactPhone }}</h5>
          </a>
        </div>
        <div data-w-id="b11f37b2-0f20-f13c-22ee-4df48cdf5857" class="contact-pop-item">
          <a href="{{ $globalSettings?->facebook_url ?: 'https://www.facebook.com/tecknoz' }}" target="_blank" rel="noopener noreferrer" class="contact-pop-item-logo w-inline-block">
            <div class="contact-icon w-embed"><svg viewbox="0 0 24 24" id="meteor-icon-kit__regular-messanger" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 11.6407C0 4.9526 5.23944 0.000488281 12 0.000488281C18.7606 0.000488281 24 4.9526 24 11.6407C24 18.3289 18.7606 23.281 12 23.281C10.7855 23.281 9.61932 23.1216 8.52555 22.8198C8.31308 22.7619 8.08853 22.7788 7.88571 22.8681L5.50503 23.9184C4.88209 24.1912 4.17948 23.7494 4.15775 23.0685L4.09256 20.9341C4.0829 20.6709 3.96459 20.427 3.76901 20.2508C1.43421 18.1623 0 15.1393 0 11.6407ZM8.32032 9.45321L4.79517 15.0452C4.45473 15.5812 5.1163 16.1872 5.62093 15.8033L9.40684 12.9301C9.66278 12.7369 10.0153 12.7345 10.2736 12.9277L13.0769 15.0307C13.9171 15.6609 15.1195 15.4387 15.6797 14.5502L19.2048 8.95823C19.5453 8.42222 18.8837 7.81618 18.3791 8.20009L14.5932 11.0733C14.3372 11.2665 13.9847 11.2689 13.7264 11.0757L10.9231 8.97272C10.0829 8.34254 8.88048 8.56467 8.32032 9.45321Z" fill="#ffffff"></path>
                </g>
              </svg></div>
          </a>
          <a href="{{ $globalSettings?->facebook_url ?: 'https://www.facebook.com/tecknoz' }}" target="_blank" rel="noopener noreferrer" class="contact-pop-item-text w-inline-block">
            <h5 class="contact-pop-text">{{ $globalSettings?->site_name ?: config('app.name') }}</h5>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <div class="schedule-modal">
    <div class="calendly-wrapper">
      <div class="w-embed w-iframe"><iframe src="https://calendar.app.google/f7qKpVB4fxBFghAG9" title="Schedule a call with Tecknoz" width="100%" height="700" loading="lazy" frameborder="0"></iframe></div>
    </div>
    <div data-w-id="92ce2e75-996c-128b-0462-f13a84ac74b3" class="close-icon w-embed"><svg viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" fill="#ffffff"></path>
        </g>
      </svg></div>
  </div>
