@extends('frontend.layout.default')

@section('webflow_page', '6afec6de276a1505a6c603e2')
@section('seo_key', 'service.semiconductor')
@section('title', 'Semiconductor Engineering | FPGA, ASIC & SoC Design')
@section('description', 'End-to-end chip & hardware development: FPGA, ASIC/SoC design, verification, embedded software & testing. Production-ready semiconductor solutions.')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
#service-detail .semiconductor-page {
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
#service-detail .semiconductor-grid {
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
  #service-detail .semiconductor-grid {
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
              <h1 class="section-title-2 blog-page-title">Semiconductor Engineering Solutions</h1>
            </div>
            <p class="section-subtitle-2">End-to-end chip and hardware development—from FPGA and ASIC/SoC design to verification, embedded software, and testing—delivering production-ready, high-performance semiconductor solutions with precision, reliability, and speed.</p>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="rich-text w-richtext">
            <div class="w-embed">
              <div class="semiconductor-page">
                <div class="semiconductor-grid">
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-microchip"></i>
                    </div>
                    <div class="service-title">FPGA/IP Design</div>
                    <div class="service-description">We develop reusable IP cores and FPGA prototypes for rapid deployment. Accelerate innovation with flexible, high-performance hardware solutions.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-brain"></i>
                    </div>
                    <div class="service-title">ASIC/SoC Design</div>
                    <div class="service-description">We manage full-chip design from architecture to tape-out with power, performance, and area optimization. Deliver production-ready silicon on schedule.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-check-double"></i>
                    </div>
                    <div class="service-title">Design Verification</div>
                    <div class="service-description">We use UVM, formal verification, and emulation to ensure functional correctness. Eliminate bugs before fabrication and reduce costly re-spins.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="service-title">IC Layout</div>
                    <div class="service-description">We create DRC/LVS-clean physical designs with analog and digital expertise. Optimize for yield, power, and signal integrity.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="service-title">PCB Design</div>
                    <div class="service-description">We design high-speed, multi-layer boards with thermal and EMI considerations. From schematic to Gerber files—ready for manufacturing.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="service-title">Embedded Software Development</div>
                    <div class="service-description">We write low-level firmware, drivers, and RTOS applications for seamless hardware integration. Ensure real-time performance and reliability.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-cogs"></i>
                    </div>
                    <div class="service-title">Mechanical Design</div>
                    <div class="service-description">We design enclosures, cooling systems, and ruggedized packaging for harsh environments. Balance form, function, and manufacturability.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="service-title">RTL Design</div>
                    <div class="service-description">We code synthesizable Verilog/VHDL with timing closure and low-power techniques. Build complex digital systems from specification to synthesis.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="service-title">Validation</div>
                    <div class="service-description">We perform pre-silicon simulation and post-silicon bring-up to guarantee first-pass success. Bridge design and production with confidence.</div>
                  </div>
                  <div class="service-card">
                    <div class="service-icon">
                      <i class="fas fa-vial"></i>
                    </div>
                    <div class="service-title">Testing and Quality Assurance</div>
                    <div class="service-description">We develop ATE test programs, reliability testing, and failure analysis protocols. Meet JEDEC, ISO, and automotive standards with zero defects.</div>
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
