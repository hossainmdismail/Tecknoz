@php
    $contactLinks = $globalSettings?->contactLinks() ?? collect();
    $shortcutIds = [
        'whatsapp' => 'b11f37b2-0f20-f13c-22ee-4df48cdf5845',
        'wechat' => 'b11f37b2-0f20-f13c-22ee-4df48cdf584b',
        'phone' => 'b11f37b2-0f20-f13c-22ee-4df48cdf5851',
        'messenger' => 'b11f37b2-0f20-f13c-22ee-4df48cdf5857',
    ];
    $linkedContacts = $contactLinks->whereNotNull('href')->groupBy('type');
    $contactShortcuts = collect(array_keys($shortcutIds))
        ->map(fn (string $type) => $linkedContacts->get($type)?->first())
        ->filter();
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
              @foreach ($globalSettings?->contact_locations ?? [] as $location)
                <div class="company-deck">
                  <div class="footer-contact-icon">
                    @include('frontend.layout.contact-icon', ['type' => 'location'])
                  </div>
                  @if (filled($location['map_url'] ?? null))
                    <a href="{{ $location['map_url'] }}" target="_blank" rel="noopener noreferrer" class="footer-link-two">{{ $location['label'] }}</a>
                  @else
                    <span class="footer-link-two">{{ $location['label'] }}</span>
                  @endif
                </div>
              @endforeach

              @if ($email = $contactLinks->firstWhere('type', 'email'))
                <div class="company-deck">
                  <div class="footer-contact-icon">
                    @include('frontend.layout.contact-icon', ['type' => 'email'])
                  </div>
                  <a href="{{ $email['href'] }}" class="footer-link-two">{{ $email['value'] }}</a>
                </div>
              @endif
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
  </footer>

  @if ($contactShortcuts->isNotEmpty())
    <div class="contact-pop">
      <div class="contact-wrap">
        @foreach ($contactShortcuts as $contact)
          <div data-w-id="{{ $shortcutIds[$contact['type']] }}" class="contact-pop-item">
            <a href="{{ $contact['href'] }}" @if (str_starts_with($contact['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif aria-label="{{ $contact['label'] }}" class="contact-pop-item-logo w-inline-block">
              <div class="contact-icon">
                @include('frontend.layout.contact-icon', ['type' => $contact['type']])
              </div>
            </a>
            <a href="{{ $contact['href'] }}" @if (str_starts_with($contact['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif class="contact-pop-item-text w-inline-block">
              <span class="contact-pop-text">{{ $contact['label'] }} · {{ $contact['value'] }}</span>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  @endif

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
