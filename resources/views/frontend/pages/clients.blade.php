@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603dc')
@section('seo_key', 'clients')
@section('title', 'Tecknoz Clients – Trusted by Global Brands & Growing Companies')
@section('description', 'Discover the companies and innovators who trust Tecknoz for software development, semiconductor engineering, AI automation, design, recruitment, and business strategy. We work with startups, enterprises, and global brands to deliver reliable, scalable, and high-impact solutions.')

@section('content')
    <div class="main-wrapper">
      <section class="section-2 content">
        <div class="w-layout-blockcontainer container w-container">
          <div class="content-title-wrapper">
            <div class="blog-title-heading">
              <h1 class="section-title-2 blog-page-title"><strong>Our Happy Clients</strong></h1>
            </div>
            <p class="section-subtitle-2"><strong class="bold-text-2">Trusted by Innovators Across Industries</strong></p>
            <p class="section-subtitle-2">From startups to global enterprises, Tecknoz powers success through <strong>Digital Marketing</strong>, <strong>Design</strong>, <strong>Development</strong>, <strong>Recruitment</strong>, <strong>Semiconductor</strong>, and <strong>Business Solutions</strong>. Here’s what our partners say:</p>
          </div>
        </div>
      </section>
      <section class="section-3">
        <div class="w-layout-blockcontainer container-2 w-container">
          <div class="industries-wrapper">
            <div class="industries-text">
              <h2 class="hero-title is-center">Industries We <span class="italic white">Support</span></h2>
            </div>
            <div class="industries-cards">
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Agriculture </div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Construction</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Demolition</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Energy</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Forestry</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Government</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Waste Solutions</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Quarry</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Special Applications</div>
                </div>
              </div>
              <div class="industries-card">
                <div class="industries-card-wrap">
                  <div class="industries-card-title">Mining</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          @if ($brands->isNotEmpty())
            <ul class="clients-logo-grid" aria-label="Client logos">
              @foreach ($brands as $brand)
                <li><img src="{{ $brand->image_url }}" alt="" loading="lazy"></li>
              @endforeach
            </ul>
          @endif
          <div class="rich-text is-padding w-richtext">
            <div class="w-embed">
              <div class="testimonials-page clients-testimonials">
                <div class="testimonials-grid">
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Tecknoz built a full email marketing funnel from scratch. Automation, segmentation, and A/B testing lifted our open rates by 35% and added six figures in recurring revenue. Their team handled design, copy, and tech seamlessly.</div>
                    <div class="testimonial-author">Email Marketing Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">We were struggling with inconsistent content. Tecknoz's strategy turned our blog into a lead-generation machine—10K organic visitors in four months. Every piece is on-brand, SEO-optimized, and conversion-focused.</div>
                    <div class="testimonial-author">Content Marketing Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Six months in, we're ranking #1 for all core keywords. Their technical SEO audit fixed years of issues, and monthly link-building keeps us ahead. Reporting is transparent and actionable.</div>
                    <div class="testimonial-author">SEO Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Facebook ads were burning budget with no results. Tecknoz revamped targeting, creatives, and landing pages—5x ROAS in the first 60 days. They manage everything end-to-end.</div>
                    <div class="testimonial-author">Facebook Marketing Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Our Instagram was stagnant at 200 followers. Tecknoz took over content, reels, and influencer outreach—now at 25K engaged followers. The growth feels organic and sustainable.</div>
                    <div class="testimonial-author">Instagram Management Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">We needed TikTok to reach Gen Z fast. Tecknoz created a trend-jacking campaign that hit 1.2M views in 48 hours and drove 8K app downloads. They live and breathe the platform.</div>
                    <div class="testimonial-author">TikTok Marketing Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">LinkedIn was just a profile for us. Tecknoz built a content calendar, ran sponsored InMail, and optimized lead forms—18 enterprise demos booked in one quarter. True B2B expertise.</div>
                    <div class="testimonial-author">LinkedIn Marketing Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Rebranding from scratch felt overwhelming. Tecknoz delivered a full logo suite, brand book, tone of voice, and packaging design in three weeks. The launch exceeded all expectations.</div>
                    <div class="testimonial-author">Branding Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Our app had high churn due to poor UX. Tecknoz redesigned the entire flow based on user research—cart abandonment dropped 50%, and NPS jumped 28 points. Clean, intuitive, and data-backed.</div>
                    <div class="testimonial-author">UI/UX Design Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">We needed a custom eCommerce platform integrated with ERP and payment gateways. Tecknoz built it on Shopify Plus, went live in three weeks, and handled zero-downtime migration. Sales doubled on day one.</div>
                    <div class="testimonial-author">eCommerce Development Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Manual processes were killing efficiency. Tecknoz deployed AI agents that automated data entry, reporting, and customer follow-ups—80% time savings. The system learns and improves daily.</div>
                    <div class="testimonial-author">Agentic AI & Automation Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Three C-level hires in 45 days seemed impossible. Tecknoz ran discreet searches, vetted culture fit, and negotiated offers—every placement is still thriving. Executive search redefined.</div>
                    <div class="testimonial-author">Executive Search Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">Scaling dev capacity without overhead was the goal. Tecknoz built and managed a 50-person offshore team in India—60% cost savings, full compliance, and weekly KPI reports. Seamless extension of our HQ.</div>
                    <div class="testimonial-author">Offshoring Talent Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">First-pass silicon on a 5nm SoC saved us millions in re-spins. Tecknoz's verification coverage hit 99.8%, and post-silicon correlation was flawless. They're now our go-to ASIC partner.</div>
                    <div class="testimonial-author">ASIC/SoC Design Client</div>
                  </div>
                  <div class="testimonial-card">
                    <div class="quote-mark">"</div>
                    <div class="testimonial-quote">From idea to seed funding in four months. Tecknoz wrote the business plan, built financial models, handled legal formation, and prepped pitch decks. Investors loved the clarity and traction.</div>
                    <div class="testimonial-author">Business Planning & Legal Formation Client</div>
                  </div>
                </div>
                <div class="stats-cta">
                  <div class="stats-text">Join 200+ satisfied clients worldwide.</div>
                  <a @include('frontend.layout.link-attributes', ['name' => 'contact', 'homeSection' => 'contact']) class="cta-button">Partner with Us →</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@section('after_content')
    @include('frontend.layout.cta')
@endsection
