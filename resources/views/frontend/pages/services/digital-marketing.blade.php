@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603df')
@section('seo_key', 'service.digital-marketing')
@section('title', 'Digital Marketing Services | Data-Driven Campaigns')
@section('description', 'Strategic, data-driven digital marketing campaigns designed to amplify your reach, engage your audience, and maximize ROI across every major online channel.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .digital-marketing-page {
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
#service-detail .digital-marketing-grid {
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
  #service-detail .digital-marketing-grid {
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
              <h1 class="section-title-2 blog-page-title">Digital Marketing That Drives Real Growth</h1>
            </div>
            <p class="section-subtitle-2">Strategic, data-driven digital marketing campaigns designed to amplify your reach, engage your audience, and maximize ROI across every major online channel.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="digital-marketing-page">
                <div class="digital-marketing-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="service-title">Email Marketing</div>
                    <div class="service-description">We design and execute personalized email sequences that nurture leads and drive conversions. From automation flows to A/B testing, every campaign is optimized for deliverability and performance.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="service-title">Content Marketing</div>
                    <div class="service-description">We create high-value content—blogs, videos, infographics—that builds trust and authority. Our strategies align with your brand voice to attract, educate, and convert your ideal audience.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-search"></i>
                    </div>
                    <div class="service-title">Search Engine Optimization (SEO)</div>
                    <div class="service-description">We improve your organic visibility through in-depth keyword research, technical optimization, and authoritative link building. Long-term strategies ensure sustained traffic and ranking growth.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fab fa-facebook"></i>
                    </div>
                    <div class="service-title">Facebook Management And Marketing</div>
                    <div class="service-description">We manage your presence with targeted ads, organic content, and community engagement. Our data-driven approach maximizes reach and ROI on the world's largest social network.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fab fa-instagram"></i>
                    </div>
                    <div class="service-title">Instagram Management And Marketing</div>
                    <div class="service-description">We build visually compelling profiles using reels, stories, and influencer partnerships. Turn followers into customers with creative, trend-aligned content.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fab fa-tiktok"></i>
                    </div>
                    <div class="service-title">TikTok Management And Marketing</div>
                    <div class="service-description">We craft viral-ready videos and run precision-targeted ads to capture attention fast. Ideal for brands targeting younger demographics with bold, authentic messaging.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fab fa-linkedin"></i>
                    </div>
                    <div class="service-title">LinkedIn Management And Marketing</div>
                    <div class="service-description">We position your brand as a thought leader with professional content and B2B lead generation. Drive high-value connections, partnerships, and sales opportunities.</div>
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
