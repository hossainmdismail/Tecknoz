@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603e4')
@section('seo_key', 'service.ai-automation')
@section('title', 'AI Automation & Intelligent Systems | Tecknoz')
@section('description', 'AI-powered automation solutions that streamline workflows, enhance decision-making, and scale operations with custom AI agents and chatbots.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .ai-automation-page {
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
#service-detail .ai-automation-grid {
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
  #service-detail .ai-automation-grid {
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
              <h1 class="section-title-2 blog-page-title">AI Automation &amp; <br>Intelligent Systems</h1>
            </div>
            <p class="section-subtitle-2">AI-powered automation solutions that streamline workflows, enhance decision-making, and scale business operations—from industry-specific systems and smart chatbots to custom AI agents and marketing automation—driving efficiency, accuracy, and measurable growth.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="ai-automation-page">
                <div class="ai-automation-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-industry"></i>
                    </div>
                    <div class="service-title">Industry Automation</div>
                    <div class="service-description">We deliver industry-specific automation solutions designed to optimize workflows, reduce operational bottlenecks, and increase productivity. From healthcare and finance to eCommerce and SaaS, our AI systems adapt to your domain's unique challenges and compliance needs.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-robot"></i>
                    </div>
                    <div class="service-title">AI Chatbot</div>
                    <div class="service-description">Our AI chatbots provide seamless, human-like interactions across websites, apps, and messaging platforms. Built for customer support, lead generation, and internal assistance, they operate 24/7 to improve engagement, reduce response time, and enhance user experience.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="service-title">Workflow Development</div>
                    <div class="service-description">We create intelligent workflows that automate repetitive tasks and connect systems across your organization. By combining AI with process automation, we help you improve efficiency, eliminate errors, and enable teams to focus on high-impact work.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="service-title">Custom AI-Agent Development</div>
                    <div class="service-description">We build custom AI agents tailored to your business processes. These agents can analyze data, make decisions, interact with tools, and execute tasks autonomously—acting as intelligent digital employees that evolve with your business.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="service-title">Marketing Automation</div>
                    <div class="service-description">Our AI-driven marketing automation solutions help you attract, nurture, and convert leads more effectively. From personalized campaigns to predictive analytics, we optimize every stage of the customer journey to maximize ROI.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="service-title">Social Media Automation</div>
                    <div class="service-description">We automate content scheduling, audience engagement, analytics, and performance tracking across social platforms. Our AI tools help you maintain consistency, boost reach, and make data-backed decisions for stronger brand presence.</div>
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
