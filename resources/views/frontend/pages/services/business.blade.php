@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603e3')
@section('seo_key', 'service.business')
@section('title', 'Business Growth & Enablement Services | Tecknoz')
@section('description', 'Integrated business planning, legal setup, and sales-marketing execution to accelerate growth and build a scalable, revenue-driven foundation.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .business-page {
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
#service-detail .business-grid {
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
  #service-detail .business-grid {
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
              <h1 class="section-title-2 blog-page-title">Business Growth &amp; Enablement</h1>
            </div>
            <p class="section-subtitle-2">Integrated business planning, legal setup, and sales–marketing execution designed to accelerate growth, streamline operations, and build a scalable, revenue-driven foundation.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="business-page">
                <div class="business-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="service-title">Business Planning</div>
                    <div class="service-description">We create investor-ready plans with financial modeling, market analysis, and go-to-market strategy. Transform vision into a clear, executable roadmap.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-rocket"></i>
                    </div>
                    <div class="service-title">Business Development</div>
                    <div class="service-description">We identify partnerships, distribution channels, and expansion opportunities. Accelerate revenue with structured outreach and negotiation support.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-gavel"></i>
                    </div>
                    <div class="service-title">Legal Formation</div>
                    <div class="service-description">We handle entity setup, contracts, IP filings, and compliance—fast and accurately. Let you focus on growth, not paperwork.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="service-title">Client Hunting</div>
                    <div class="service-description">We run targeted outbound campaigns, LinkedIn outreach, and event networking to fill your pipeline. Generate qualified leads ready for closure.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-funnel-dollar"></i>
                    </div>
                    <div class="service-title">Sales and Marketing Service</div>
                    <div class="service-description">We align sales and marketing funnels for predictable revenue. From lead scoring to CRM integration, we drive efficiency and results.</div>
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
