@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603e1')
@section('seo_key', 'service.recruitment')
@section('title', 'AI-Driven Recruitment Services | IT, Executive & Offshore')
@section('description', 'AI-driven recruitment for IT, executive, freelance & offshore hiring. Deep market expertise delivers high-impact talent faster. Start your search today.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .recruitment-page {
  color: #333;
  line-height: 1.6;
  padding: 40px 20px;
  max-width: 1200px;
  margin: 0 auto;
}
#service-detail .page-title {
  font-size: 2.8rem;
  font-weight: 300;
  letter-spacing: -0.5px;
  margin-bottom: 20px;
  color: #222;
  text-align: center;
}
#service-detail .page-description {
  font-size: 1.2rem;
  color: #666;
  max-width: 800px;
  margin: 0 auto 50px auto;
  text-align: center;
  padding-bottom: 40px;
  border-bottom: 1px solid #f0f0f0;
}
#service-detail .recruitment-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
  gap: 30px;
}
#service-detail .service-card {
  border: 1px solid #eaeaea;
  border-radius: 12px;
  padding: 32px;
  transition: all 0.3s ease;
  background: white;
}
#service-detail .service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  border-color: #ddd;
}
#service-detail .service-icon {
  font-size: 1.8rem;
  margin-bottom: 20px;
  color: #555;
  display: inline-block;
  padding: 12px;
  border-radius: 10px;
  background: #f9f9f9;
}
#service-detail .service-title {
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 15px;
  color: #222;
}
#service-detail .service-description {
  color: #555;
  font-size: 1rem;
  line-height: 1.7;
}
@media (max-width: 768px) {
  #service-detail .recruitment-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  #service-detail .page-title {
    font-size: 2.2rem;
  }
  #service-detail .page-description {
    font-size: 1.1rem;
  }
  #service-detail .service-card {
    padding: 25px;
  }
}
</style>
@endpush

@section('content')
    <div id="service-detail" class="main-wrapper">
      <section class="section-2 content">
        <div class="w-layout-blockcontainer container w-container">
          <div class="content-title-wrapper">
            <div class="blog-title-heading">
              <h1 class="section-title-2 blog-page-title">Talent Acquisition <br>Solutions</h1>
            </div>
            <p class="section-subtitle-2">Comprehensive, agile recruitment services covering IT, executive, freelance, offshore, and local hiring—powered by AI-driven sourcing and deep market expertise to deliver high-impact talent faster and smarter.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="recruitment-page">
                <div class="recruitment-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-search"></i>
                    </div>
                    <div class="service-title">Talent Sourcing</div>
                    <div class="service-description">We use AI-powered tools and deep market insight to identify passive and active top talent. Reduce time-to-hire with pre-vetted, high-fit candidates.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="service-title">Staffing</div>
                    <div class="service-description">We provide flexible staffing for projects, seasonal needs, or permanent roles. Scale your workforce without long-term commitments or HR overhead.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="service-title">Executive Search</div>
                    <div class="service-description">We discreetly recruit C-suite and senior leaders aligned with your vision and culture. Secure transformative talent through targeted, confidential searches.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="service-title">Headhunting</div>
                    <div class="service-description">We proactively approach high performers not actively job-seeking. Access hidden talent pools to fill mission-critical roles fast.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-globe-americas"></i>
                    </div>
                    <div class="service-title">Offshoring Talent Solutions</div>
                    <div class="service-description">We build and manage cost-effective remote teams with full compliance and cultural alignment. Leverage global talent without infrastructure complexity.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="service-title">IT Recruitment</div>
                    <div class="service-description">We source specialized tech talent—developers, cloud engineers, cybersecurity experts—with technical vetting. Meet complex skill demands with precision.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="service-title">Freelance Recruitment</div>
                    <div class="service-description">We connect you with pre-screened freelancers for design, development, marketing, and more. Get expert support on-demand, project by project.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="service-title">Local Recruitment</div>
                    <div class="service-description">We hire top local talent with deep knowledge of regional markets and regulations. Strengthen your community presence and operational efficiency.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="service-title">Recruitment Consulting</div>
                    <div class="service-description">We optimize your hiring process with strategy, training, and technology. Reduce costs, improve quality, and build a future-ready talent pipeline.</div>
                  </div>
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
