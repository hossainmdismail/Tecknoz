@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603e0')
@section('seo_key', 'service.design-development')
@section('title', 'Design & Development Services | Tecknoz')
@section('description', 'Creative design and scalable development solutions that blend aesthetics, usability, and performance—turning ideas into powerful digital experiences.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .design-development-page {
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
#service-detail .design-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
  gap: 30px;
  margin-bottom: 60px;
}
#service-detail .design-section-title {
  font-size: 1.8rem;
  font-weight: 400;
  margin: 40px 0 20px 0;
  color: #333;
  text-align: center;
  padding-top: 40px;
  border-top: 1px solid #f0f0f0;
}
#service-detail .design-description {
  font-size: 1.2rem;
  color: #666;
  max-width: 700px;
  margin: 0 auto 40px auto;
  text-align: center;
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
#service-detail .development-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
  gap: 30px;
}
@media (max-width: 768px) {
  #service-detail .design-grid, #service-detail .development-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  #service-detail .page-title {
    font-size: 2.2rem;
  }
  #service-detail .design-description {
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
              <h1 class="section-title-2 blog-page-title">Design &amp; Development <br>Built for Impact</h1>
            </div>
            <p class="section-subtitle-2">Creative design and scalable development solutions that blend aesthetics, usability, and performance—turning ideas into powerful digital experiences.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="design-development-page">
                <div class="design-section-title">Design</div>
                <div class="design-description">Creative branding, UI/UX, and graphic design that captivates audiences and strengthens identity.</div>
                <div class="design-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="service-title">Graphic Design</div>
                    <div class="service-description">From banners to brochures, we deliver pixel-perfect visuals that communicate your message clearly. Every design is crafted with strategy, aesthetics, and brand consistency in mind.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-trademark"></i>
                    </div>
                    <div class="service-title">Branding</div>
                    <div class="service-description">We develop complete brand identities—logos, typography, color systems, and guidelines. Ensure instant recognition and emotional connection across all touchpoints.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-mouse-pointer"></i>
                    </div>
                    <div class="service-title">UI/UX Design</div>
                    <div class="service-description">We create intuitive, user-centered interfaces backed by research and prototyping. Enhance satisfaction, reduce bounce rates, and improve conversion through seamless experiences.</div>
                  </div>
                </div>
                <div class="design-section-title">Development</div>
                <div class="design-description">Custom web, app, SaaS, eCommerce, and AI-driven solutions built for performance and scalability.</div>
                <div class="development-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="service-title">Web Design & Development</div>
                    <div class="service-description">We build responsive, fast-loading websites with custom functionality or CMS integration. From startups to enterprises, your site becomes a powerful business asset.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="service-title">App Design & Development</div>
                    <div class="service-description">We develop native and cross-platform mobile apps with smooth UX and robust backend systems. Bring your idea to life with secure, scalable, and user-friendly applications.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-cloud"></i>
                    </div>
                    <div class="service-title">SaaS Development</div>
                    <div class="service-description">We engineer cloud-based platforms with subscription models, multi-tenancy, and real-time features. Launch your software product with confidence and scalability.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="service-title">eCommerce Development</div>
                    <div class="service-description">We create high-converting online stores with payment, inventory, and shipping integrations. Optimize for SEO, speed, and mobile to dominate digital retail.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-robot"></i>
                    </div>
                    <div class="service-title">Agentic AI & Automation</div>
                    <div class="service-description">We implement smart workflows, chatbots, and AI agents that reduce manual tasks and boost efficiency. Automate customer support, data processing, and decision-making.</div>
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
