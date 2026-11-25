<?php
/**
 * The template for displaying the Front Page
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri         = get_template_directory_uri();
$contact_page      = get_page_by_path( 'contact' );
$contact_url       = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );
$services_page     = get_page_by_path( 'services' );
$services_url      = $services_page ? esc_url( get_permalink( $services_page->ID ) ) : esc_url( home_url( '/services/' ) );
$portfolio_page    = get_page_by_path( 'portfolio' );
$portfolio_url     = $portfolio_page ? esc_url( get_permalink( $portfolio_page->ID ) ) : esc_url( home_url( '/portfolio/' ) );
$blog_page         = get_page_by_path( 'blog' );
$blog_url          = $blog_page ? esc_url( get_permalink( $blog_page->ID ) ) : esc_url( home_url( '/blog/' ) );
$about_page        = get_page_by_path( 'about' );
$about_url         = $about_page ? esc_url( get_permalink( $about_page->ID ) ) : esc_url( home_url( '/about/' ) );

// Check if page is edited with or previewed in Elementor
if ( rajtechbd_is_elementor_active() ) :
    while ( have_posts() ) :
        the_post();
        ?>
        <main id="primary" class="site-main w-full">
            <?php the_content(); ?>
        </main>
        <?php
    endwhile;
else :
?>

  <!-- Optional Gutenberg Content if user entered any in block editor -->
  <?php
  if ( have_posts() ) {
      while ( have_posts() ) {
          the_post();
          $content = get_the_content();
          if ( ! empty( trim( $content ) ) && '<!-- Front page template is handled automatically by front-page.php -->' !== trim( $content ) && '<!-- Front page template with Elementor & Gutenberg integration -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= SECTION 1: ASYMMETRIC HERO & BENTO METRICS GRID ================= -->
  <section class="relative bg-[#F8FAFC] py-20 lg:py-28 border-b border-[#F1F5F9] bg-grid-pattern overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column (55% / 7 cols) -->
        <div class="lg:col-span-7 flex flex-col items-start reveal">
          <!-- Availability Tag -->
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-6 shadow-xs">
            <span class="w-2 h-2 rounded-full bg-[#10B981] pulse-dot"></span>
            ESTABLISHED 2018 • SOFTWARE ENGINEERING • MODERN WEB • AI SYSTEMS • DHAKA, BD
          </div>
          
          <h1 class="text-4xl sm:text-5xl lg:text-[54px] font-extrabold text-[#0F172A] leading-[1.12] tracking-[-0.03em] mb-6">
            Experienced Software Engineering, Modern Web &amp; AI Systems in Bangladesh.
          </h1>
          
          <p class="text-lg text-[#475569] leading-relaxed mb-8 max-w-2xl font-normal">
            <strong>RajTech BD Limited</strong> combines battle-tested, old-fashioned software discipline with cutting-edge AI systems and modern web development. We architect custom ERP platforms, multi-agent AI pipelines, high-speed WordPress &amp; Shopify systems, and robust mobile apps that eliminate operational technical debt.
          </p>
          
          <div class="flex flex-wrap items-center gap-4">
            <a href="<?php echo $portfolio_url; ?>" class="px-7 py-3.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-[15px] hover:bg-[#d97706] hover-lift transition-all shadow-sm">
              Explore Top 3 Latest Portfolios
            </a>
            <a href="<?php echo $services_url; ?>" class="px-6 py-3.5 text-[#0F172A] font-bold text-[15px] hover:text-[#0284C7] flex items-center gap-2 transition-colors">
              Explore AI &amp; ERP Capabilities <span class="text-lg transition-transform hover:translate-x-1">→</span>
            </a>
          </div>

          <!-- Trust Badges -->
          <div class="mt-10 pt-6 border-t border-[#E2E8F0] flex flex-wrap items-center gap-6 text-xs text-[#64748B] font-medium">
            <span class="flex items-center gap-1.5"><strong class="text-emerald-600">✓</strong> 100% Client Source Code Ownership</span>
            <span class="flex items-center gap-1.5"><strong class="text-emerald-600">✓</strong> Sub-200ms TTFB Speed Tuning</span>
            <span class="flex items-center gap-1.5"><strong class="text-emerald-600">✓</strong> Contractual 24/7 SLA Guarantees</span>
          </div>
        </div>

        <!-- Right Column (45% / 5 cols) - Bento Grid with Animation -->
        <div class="lg:col-span-5 grid grid-cols-2 gap-4 reveal delay-200">
          <!-- Card 1: Enterprise Software Lab & Code -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-52 bg-slate-900 relative">
            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80" 
                 alt="RajTech BD Enterprise Software Engineering Lab" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent flex items-end p-3.5">
              <span class="text-white text-xs font-semibold flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Software &amp; AI Engineering Lab
              </span>
            </div>
          </div>

          <!-- Card 2: Stat Card 99.9% -->
          <div class="bg-white rounded-lg p-6 border border-[#E2E8F0] shadow-sm flex flex-col justify-center hover-lift">
            <div class="text-4xl font-extrabold text-[#0F172A] tracking-tight mb-1 count-up" data-target="99.9" data-suffix="%">99.9%</div>
            <div class="text-xs font-semibold text-[#0284C7] uppercase font-mono-tag mb-1">Atomic Concurrency</div>
            <div class="text-xs font-medium text-[#475569] leading-snug">ERP System Uptime &amp; Multi-Warehouse Sync</div>
          </div>

          <!-- Card 3: Stat Card 40+ -->
          <div class="bg-white rounded-lg p-6 border border-[#E2E8F0] shadow-sm flex flex-col justify-center hover-lift">
            <div class="text-4xl font-extrabold text-[#0F172A] tracking-tight mb-1 count-up" data-target="40" data-suffix="+">40+</div>
            <div class="text-xs font-semibold text-[#F59E0B] uppercase font-mono-tag mb-1">Enterprise Deployments</div>
            <div class="text-xs font-medium text-[#475569] leading-snug">ERP, AI Pipelines &amp; Headless Commerce</div>
          </div>

          <!-- Card 4: Office Environment Image -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-52 bg-slate-100 relative">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-hub.jpeg" 
                 alt="RajTech BD Modern Innovation Hub in Dhaka" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-3">
              <span class="text-white text-xs font-semibold">Kuril Technology Hub</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= SECTION 2: TRUST & TECHNOLOGY ARSENAL ================= -->
  <section class="bg-white py-12 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <p class="text-center text-xs font-mono-tag font-bold tracking-widest text-[#94A3B8] uppercase mb-8">
        8+ YEARS OF BATTLE-TESTED STACKS • RELATIONAL ENGINES • AI FRAMEWORKS
      </p>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 items-center text-center">
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">PostgreSQL &amp; Redis</div>
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">Python &amp; PyTorch AI</div>
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">Node.js &amp; FastAPI</div>
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">WordPress VIP &amp; Blocks</div>
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">Shopify Plus &amp; Liquid</div>
        <div class="p-3.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-bold text-[#334155] font-mono-tag">Flutter &amp; Docker K8s</div>
      </div>
    </div>
  </section>

  <!-- ================= SECTION 3: FLAGSHIP ENTERPRISE & AI PLATFORMS ================= -->
  <section id="solutions" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 gap-4 reveal">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">FLAGSHIP ARCHITECTURES</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight">
            Core Enterprise Platforms &amp; AI Systems We Architect
          </h2>
        </div>
        <a href="<?php echo $services_url; ?>" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group">
          View All Technical Modules <span class="group-hover:translate-x-1 transition-transform">→</span>
        </a>
      </div>

      <!-- 3-Row Checkerboard Grid -->
      <div class="flex flex-col gap-6">

        <!-- ROW 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch reveal">
          <!-- Col 1: Text Card 01 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center hover-lift">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">01 / MODULAR ARCHITECTURE</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Custom ERP Systems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Unified enterprise resource planning tailored to automate workflows, HR, supply chain, procurement, and multi-branch operations with real-time analytics.
            </p>
          </div>
          <!-- Col 2: Meeting Room Image -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm relative">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-meeting.png" 
                 alt="RajTech BD Executive Strategy & Architecture Meeting" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-4">
              <span class="text-white text-xs font-semibold">Executive Architecture &amp; Strategy Room</span>
            </div>
          </div>
          <!-- Col 3: Text Card 02 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center hover-lift">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">02 / LOGISTICS AUTOMATION</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Inventory Management Systems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Real-time multi-warehouse stock tracking, barcode/SKU automation, low-stock forecasting, and atomic order syncing across physical stores and web portals.
            </p>
          </div>
        </div>

        <!-- ROW 2 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch reveal delay-100">
          <!-- Col 1: AI Systems Visual -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm relative bg-slate-900">
            <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1200&q=80" 
                 alt="Autonomous AI Systems & Neural Pipelines" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-4">
              <span class="text-white text-xs font-semibold">Autonomous AI Systems &amp; Neural Pipelines</span>
            </div>
          </div>
          <!-- Col 2: Text Card 03 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center hover-lift">
            <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-wider mb-3">03 / MODERN AI INTEGRATION</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">AI System Development &amp; Agents</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Autonomous conversational agents, WhatsApp lead qualification bots, document intelligence OCR, and predictive demand forecasting models built on private VPCs.
            </p>
          </div>
          <!-- Col 3: FinTech Visual -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm relative">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                 alt="FinTech Analytics & Realtime Reporting" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent flex items-end p-4">
              <span class="text-white text-xs font-semibold">FinTech &amp; Real-Time Analytics Engine</span>
            </div>
          </div>
        </div>

        <!-- ROW 3 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch reveal delay-200">
          <!-- Col 1: Text Card 04 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center hover-lift">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">04 / EDTECH SCALE</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Learning Management Systems (LMS)</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Interactive course delivery, live student assessments, automated certificate generation, and cohort management engineered for 50,000+ simultaneous students.
            </p>
          </div>
          <!-- Col 2: LMS Visual -->
          <div class="group rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm relative">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" 
                 alt="Collaborative EdTech Learning Platform" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent flex items-end p-4">
              <span class="text-white text-xs font-semibold">EdTech &amp; Continuous Learning Systems</span>
            </div>
          </div>
          <!-- Col 3: Text Card 05 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center hover-lift">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">05 / MOBILE &amp; CLOUD</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Custom Web &amp; Mobile Ecosystems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              High-throughput web applications and native iOS/Android mobile apps engineered for speed, biometric security, and uninterrupted offline synchronization.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= OUR CORE IT SERVICES (SWISS EDITORIAL ASYMMETRIC SHOWCASE) ================= -->
  <section id="our-services" class="relative bg-[#FFFFFF] py-24 lg:py-28 border-b border-[#E2E8F0]">
    <!-- Subtle Architectural Background Layer (Low-Contrast #F3F5F7) -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
      <!-- Subtle Technical Grid -->
      <div class="absolute inset-0 opacity-60" style="background-size: 64px 64px; background-image: linear-gradient(to right, #F3F5F7 1px, transparent 1px), linear-gradient(to bottom, #F3F5F7 1px, transparent 1px);"></div>
      <!-- Oversized Partially Cropped Outlined Circle (Top Right) -->
      <div class="hidden lg:block absolute -top-36 -right-36 w-[520px] h-[520px] rounded-full border border-[#ECEFF2]"></div>
      <!-- Secondary Architectural Ring (Bottom Left) -->
      <div class="hidden lg:block absolute -bottom-24 left-12 w-[320px] h-[320px] rounded-full border border-[#F3F5F7]"></div>
    </div>

    <div class="relative z-10 max-w-[1280px] mx-auto px-6">

      <!-- Asymmetric Editorial Header -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end pb-12 mb-14 border-b border-[#E2E8F0] reveal">
        <div class="lg:col-span-7">
          <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] tracking-[2px] uppercase mb-4">
            <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span>
            <span>OUR SERVICES // GLOBAL IT &amp; AI</span>
          </div>
          <h2 class="text-4xl sm:text-5xl font-extrabold tracking-[-0.03em] text-[#0F172A] leading-[1.08]">
            Core Engineering &amp; Digital Transformation
          </h2>
        </div>
        <div class="lg:col-span-5 lg:pb-1">
          <p class="text-[#475569] text-base sm:text-lg leading-relaxed">
            We partner with organizations across the USA, UK, Canada, Europe, and Australia to architect custom software, AI automation, cybersecurity, cloud infrastructure, and data intelligence.
          </p>
        </div>
      </div>

      <!-- Asymmetric Editorial Split: Left Visual Identity + Right Integrated Service Experience -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

        <!-- Left Zone: Sticky Visual Identity with Geometric Accent -->
        <div class="lg:col-span-5 lg:sticky lg:top-28">
          <figure class="relative m-0">
            <!-- Oversized Outlined Geometric Circle Behind Image -->
            <div class="hidden sm:block absolute -top-6 -left-6 w-48 h-48 rounded-full border border-[#E2E8F0] pointer-events-none" aria-hidden="true"></div>
            <div class="hidden sm:flex items-center gap-2 absolute -top-3 right-3 z-20 px-2.5 py-1 bg-[#FFFFFF] border border-[#E2E8F0] text-[10px] font-mono-tag text-[#0284C7] tracking-widest uppercase">
              <span>SYS.01—05</span>
            </div>

            <div class="relative z-10 overflow-hidden rounded-md bg-[#F3F5F7] aspect-[4/4] sm:aspect-[5/4] lg:aspect-[4/4]">
              <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80"
                   alt="Minimalist software engineering and cloud architecture workspace"
                   loading="lazy"
                   decoding="async"
                   class="w-full h-full object-cover"
                   onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80';">
            </div>

            <figcaption class="mt-4 pt-3 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] font-mono-tag text-[#64748B] tracking-wider uppercase">
              <span>FIG. 01 &mdash; ENGINEERING WORKSPACE</span>
              <span class="text-[#0284C7] font-semibold">Dhaka HQ: Kuril, Vatara, Dhaka-1229</span>
            </figcaption>
          </figure>
        </div>

        <!-- Right Zone: Card-Free Editorial Interactive Service Experience -->
        <div class="lg:col-span-7 flex flex-col justify-between">
          <div id="rajtech-services-carousel"
               class="flex flex-col"
               role="region"
               aria-roledescription="carousel"
               aria-label="Core IT Services Showcase">

            <!-- Integrated Minimalist Navigation Bar -->
            <div class="flex items-center justify-between gap-4 pb-4 border-b border-[#E2E8F0]">
              <nav class="flex items-center gap-4 sm:gap-7" role="tablist" aria-label="Select a service">
                <button type="button" role="tab" aria-selected="true" data-service-tab="0" class="service-tab-btn text-xs sm:text-sm font-mono-tag font-bold text-[#0284C7] transition-colors cursor-pointer">01</button>
                <button type="button" role="tab" aria-selected="false" data-service-tab="1" class="service-tab-btn text-xs sm:text-sm font-mono-tag font-bold text-[#94A3B8] hover:text-[#0F172A] transition-colors cursor-pointer">02</button>
                <button type="button" role="tab" aria-selected="false" data-service-tab="2" class="service-tab-btn text-xs sm:text-sm font-mono-tag font-bold text-[#94A3B8] hover:text-[#0F172A] transition-colors cursor-pointer">03</button>
                <button type="button" role="tab" aria-selected="false" data-service-tab="3" class="service-tab-btn text-xs sm:text-sm font-mono-tag font-bold text-[#94A3B8] hover:text-[#0F172A] transition-colors cursor-pointer">04</button>
                <button type="button" role="tab" aria-selected="false" data-service-tab="4" class="service-tab-btn text-xs sm:text-sm font-mono-tag font-bold text-[#94A3B8] hover:text-[#0F172A] transition-colors cursor-pointer">05</button>
              </nav>

              <div class="flex items-center gap-4 text-xs font-mono-tag">
                <button type="button" id="service-prev-btn" aria-label="Previous service" class="text-[#64748B] hover:text-[#0284C7] transition-colors cursor-pointer uppercase tracking-wider font-semibold">&larr; Prev</button>
                <span class="text-[#CBD5E1]" aria-hidden="true">/</span>
                <button type="button" id="service-next-btn" aria-label="Next service" class="text-[#64748B] hover:text-[#0284C7] transition-colors cursor-pointer uppercase tracking-wider font-semibold">Next &rarr;</button>
              </div>
            </div>

            <!-- Slim Animated Progress Indicator -->
            <div class="w-full h-[2px] bg-[#F3F5F7] overflow-hidden mb-10">
              <div id="service-progress-bar" class="h-full bg-[#0284C7] w-0"></div>
            </div>

            <!-- Overlapping Slides Grid (Horizontal + Subtle Fade, Independent Number & Heading Animation) -->
            <div class="grid items-start min-h-[340px]" aria-live="polite">

              <!-- Slide 01: AI Development & Business Automation -->
              <article class="service-slide col-start-1 row-start-1 transition-opacity duration-500 ease-out opacity-100 relative z-10" data-slide-index="0" aria-hidden="false">
                <div class="flex items-baseline justify-between gap-4 mb-5">
                  <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>AI &amp; Business Automation</span>
                  </div>
                  <span class="service-num text-6xl sm:text-7xl font-extrabold font-mono-tag text-[#F3F5F7] select-none leading-none transition-all duration-500 ease-out translate-x-0 opacity-100">01</span>
                </div>
                <h3 class="service-heading text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-[-0.025em] mb-5 leading-[1.15] transition-all duration-500 delay-75 ease-out translate-x-0 opacity-100">
                  AI Development &amp; Business Automation
                </h3>
                <p class="text-[#475569] text-base sm:text-[17px] leading-relaxed mb-7 max-w-2xl">
                  Transform your business operations with intelligent AI solutions and workflow automation. As a specialized AI development company, we build custom AI solutions, AI agent development pipelines, conversational AI chatbot development, and generative AI integration that reduce manual tasks, improve productivity, and accelerate growth.
                </p>
                <p class="text-xs font-mono-tag text-[#64748B] tracking-wide mb-8 leading-relaxed">
                  AI Automation Services <span class="text-[#CBD5E1] mx-1.5">/</span> AI Agent Development <span class="text-[#CBD5E1] mx-1.5">/</span> Generative AI Integration <span class="text-[#CBD5E1] mx-1.5">/</span> Workflow Automation
                </p>
                <a href="<?php echo $services_url; ?>#ai-systems" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-[#0F172A] hover:text-[#0284C7] border-b-2 border-[#0284C7] pb-1 transition-colors group">
                  <span>Explore Service</span>
                  <span class="text-[#0284C7] group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
              </article>

              <!-- Slide 02: Custom Software & SaaS Development -->
              <article class="service-slide col-start-1 row-start-1 transition-opacity duration-500 ease-out opacity-0 pointer-events-none" data-slide-index="1" aria-hidden="true">
                <div class="flex items-baseline justify-between gap-4 mb-5">
                  <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                    <span>Software &amp; SaaS Engineering</span>
                  </div>
                  <span class="service-num text-6xl sm:text-7xl font-extrabold font-mono-tag text-[#F3F5F7] select-none leading-none transition-all duration-500 ease-out translate-x-6 opacity-0">02</span>
                </div>
                <h3 class="service-heading text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-[-0.025em] mb-5 leading-[1.15] transition-all duration-500 delay-75 ease-out translate-x-6 opacity-0">
                  Custom Software &amp; SaaS Development
                </h3>
                <p class="text-[#475569] text-base sm:text-[17px] leading-relaxed mb-7 max-w-2xl">
                  Build powerful, scalable software solutions tailored to your business requirements. From enterprise software development and SaaS development services to web application development, custom CRM development, ERP software development, and e-commerce development, we turn complex requirements into reliable digital products.
                </p>
                <p class="text-xs font-mono-tag text-[#64748B] tracking-wide mb-8 leading-relaxed">
                  SaaS Development Services <span class="text-[#CBD5E1] mx-1.5">/</span> Enterprise Software <span class="text-[#CBD5E1] mx-1.5">/</span> Custom CRM &amp; ERP <span class="text-[#CBD5E1] mx-1.5">/</span> E-Commerce Development
                </p>
                <a href="<?php echo $services_url; ?>#solutions" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-[#0F172A] hover:text-[#0284C7] border-b-2 border-[#0284C7] pb-1 transition-colors group">
                  <span>Explore Service</span>
                  <span class="text-[#0284C7] group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
              </article>

              <!-- Slide 03: Cybersecurity & Application Security -->
              <article class="service-slide col-start-1 row-start-1 transition-opacity duration-500 ease-out opacity-0 pointer-events-none" data-slide-index="2" aria-hidden="true">
                <div class="flex items-baseline justify-between gap-4 mb-5">
                  <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span>Cybersecurity &amp; Risk</span>
                  </div>
                  <span class="service-num text-6xl sm:text-7xl font-extrabold font-mono-tag text-[#F3F5F7] select-none leading-none transition-all duration-500 ease-out translate-x-6 opacity-0">03</span>
                </div>
                <h3 class="service-heading text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-[-0.025em] mb-5 leading-[1.15] transition-all duration-500 delay-75 ease-out translate-x-6 opacity-0">
                  Cybersecurity &amp; Application Security
                </h3>
                <p class="text-[#475569] text-base sm:text-[17px] leading-relaxed mb-7 max-w-2xl">
                  Protect your digital infrastructure, applications, and sensitive business information with comprehensive cybersecurity services. Through website security audits, vulnerability assessment, penetration testing, cloud security solutions, and secure software development, we strengthen your digital environments.
                </p>
                <p class="text-xs font-mono-tag text-[#64748B] tracking-wide mb-8 leading-relaxed">
                  Application Security <span class="text-[#CBD5E1] mx-1.5">/</span> Penetration Testing <span class="text-[#CBD5E1] mx-1.5">/</span> Vulnerability Assessment <span class="text-[#CBD5E1] mx-1.5">/</span> Cloud Security
                </p>
                <a href="<?php echo $contact_url; ?>" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-[#0F172A] hover:text-[#0284C7] border-b-2 border-[#0284C7] pb-1 transition-colors group">
                  <span>Explore Service</span>
                  <span class="text-[#0284C7] group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
              </article>

              <!-- Slide 04: Cloud Computing & DevOps Engineering -->
              <article class="service-slide col-start-1 row-start-1 transition-opacity duration-500 ease-out opacity-0 pointer-events-none" data-slide-index="3" aria-hidden="true">
                <div class="flex items-baseline justify-between gap-4 mb-5">
                  <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                    <span>Cloud &amp; DevOps</span>
                  </div>
                  <span class="service-num text-6xl sm:text-7xl font-extrabold font-mono-tag text-[#F3F5F7] select-none leading-none transition-all duration-500 ease-out translate-x-6 opacity-0">04</span>
                </div>
                <h3 class="service-heading text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-[-0.025em] mb-5 leading-[1.15] transition-all duration-500 delay-75 ease-out translate-x-6 opacity-0">
                  Cloud Computing &amp; DevOps Engineering
                </h3>
                <p class="text-[#475569] text-base sm:text-[17px] leading-relaxed mb-7 max-w-2xl">
                  Build, deploy, and manage reliable cloud infrastructure designed for performance and scalability. Our DevOps consulting services encompass AWS cloud solutions, cloud migration services, Docker and Kubernetes services, CI/CD pipeline automation, and server optimization services.
                </p>
                <p class="text-xs font-mono-tag text-[#64748B] tracking-wide mb-8 leading-relaxed">
                  AWS Cloud Solutions <span class="text-[#CBD5E1] mx-1.5">/</span> Docker &amp; Kubernetes <span class="text-[#CBD5E1] mx-1.5">/</span> CI/CD Pipeline Automation <span class="text-[#CBD5E1] mx-1.5">/</span> Cloud Migration
                </p>
                <a href="<?php echo $services_url; ?>#optimization" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-[#0F172A] hover:text-[#0284C7] border-b-2 border-[#0284C7] pb-1 transition-colors group">
                  <span>Explore Service</span>
                  <span class="text-[#0284C7] group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
              </article>

              <!-- Slide 05: Data Engineering & Business Intelligence -->
              <article class="service-slide col-start-1 row-start-1 transition-opacity duration-500 ease-out opacity-0 pointer-events-none" data-slide-index="4" aria-hidden="true">
                <div class="flex items-baseline justify-between gap-4 mb-5">
                  <div class="inline-flex items-center gap-2.5 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px]">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Data &amp; Intelligence</span>
                  </div>
                  <span class="service-num text-6xl sm:text-7xl font-extrabold font-mono-tag text-[#F3F5F7] select-none leading-none transition-all duration-500 ease-out translate-x-6 opacity-0">05</span>
                </div>
                <h3 class="service-heading text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-[-0.025em] mb-5 leading-[1.15] transition-all duration-500 delay-75 ease-out translate-x-6 opacity-0">
                  Data Engineering &amp; Business Intelligence
                </h3>
                <p class="text-[#475569] text-base sm:text-[17px] leading-relaxed mb-7 max-w-2xl">
                  Turn complex business data into meaningful insights and smarter decisions. Our data engineering services deliver data pipeline development, real-time data processing, database optimization, business intelligence dashboards, and predictive analytics solutions for data-driven organizations.
                </p>
                <p class="text-xs font-mono-tag text-[#64748B] tracking-wide mb-8 leading-relaxed">
                  Data Pipeline Development <span class="text-[#CBD5E1] mx-1.5">/</span> BI Dashboards <span class="text-[#CBD5E1] mx-1.5">/</span> Real-Time Processing <span class="text-[#CBD5E1] mx-1.5">/</span> Predictive Analytics
                </p>
                <a href="<?php echo $services_url; ?>#finance" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-[#0F172A] hover:text-[#0284C7] border-b-2 border-[#0284C7] pb-1 transition-colors group">
                  <span>Explore Service</span>
                  <span class="text-[#0284C7] group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
              </article>

            </div>

          </div>

          <!-- Integrated Horizontal Closing Call-To-Action -->
          <div class="mt-12 pt-8 border-t border-[#E2E8F0] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
              <h3 class="text-xl font-bold text-[#0F172A] tracking-tight mb-1">
                Have a Business Challenge? Let&apos;s Build the Right Solution.
              </h3>
              <p class="text-sm text-[#475569]">
                Discuss your software, AI, cloud, or security roadmap with our senior engineering team.
              </p>
            </div>
            <a href="<?php echo $contact_url; ?>" class="shrink-0 inline-flex items-center justify-center px-6 py-3.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-sm hover:bg-[#0369a1] hover-lift transition-all">
              Discuss Your Project &rarr;
            </a>
          </div>
        </div>

      </div>
    </div>

    <script>
      (function () {
        var carousel = document.getElementById('rajtech-services-carousel');
        if (!carousel) return;

        var slides = carousel.querySelectorAll('.service-slide');
        var tabs = carousel.querySelectorAll('.service-tab-btn');
        var prevBtn = document.getElementById('service-prev-btn');
        var nextBtn = document.getElementById('service-next-btn');
        var progressBar = document.getElementById('service-progress-bar');

        var current = 0;
        var total = slides.length;
        var intervalMs = 5500;
        var autoTimer = null;
        var isPaused = false;
        var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function resetProgress() {
          if (!progressBar) return;
          progressBar.style.transition = 'none';
          progressBar.style.width = '0%';
          if (prefersReducedMotion || isPaused) return;
          void progressBar.offsetWidth;
          progressBar.style.transition = 'width ' + intervalMs + 'ms linear';
          progressBar.style.width = '100%';
        }

        function goToSlide(index, userTriggered) {
          current = (index + total) % total;

          slides.forEach(function (slide, idx) {
            var numEl = slide.querySelector('.service-num');
            var headingEl = slide.querySelector('.service-heading');
            if (idx === current) {
              slide.classList.remove('opacity-0', 'pointer-events-none');
              slide.classList.add('opacity-100', 'relative', 'z-10');
              slide.setAttribute('aria-hidden', 'false');
              if (numEl) {
                numEl.classList.remove('translate-x-6', 'opacity-0');
                numEl.classList.add('translate-x-0', 'opacity-100');
              }
              if (headingEl) {
                headingEl.classList.remove('translate-x-6', 'opacity-0');
                headingEl.classList.add('translate-x-0', 'opacity-100');
              }
            } else {
              slide.classList.remove('opacity-100', 'relative', 'z-10');
              slide.classList.add('opacity-0', 'pointer-events-none');
              slide.setAttribute('aria-hidden', 'true');
              if (numEl) {
                numEl.classList.remove('translate-x-0', 'opacity-100');
                numEl.classList.add('translate-x-6', 'opacity-0');
              }
              if (headingEl) {
                headingEl.classList.remove('translate-x-0', 'opacity-100');
                headingEl.classList.add('translate-x-6', 'opacity-0');
              }
            }
          });

          tabs.forEach(function (tab, idx) {
            if (idx === current) {
              tab.classList.remove('text-[#94A3B8]', 'hover:text-[#0F172A]');
              tab.classList.add('text-[#0284C7]');
              tab.setAttribute('aria-selected', 'true');
            } else {
              tab.classList.remove('text-[#0284C7]');
              tab.classList.add('text-[#94A3B8]', 'hover:text-[#0F172A]');
              tab.setAttribute('aria-selected', 'false');
            }
          });

          if (userTriggered) {
            restartAutoplay();
          } else {
            resetProgress();
          }
        }

        function startAutoplay() {
          if (prefersReducedMotion || isPaused) return;
          clearInterval(autoTimer);
          resetProgress();
          autoTimer = setInterval(function () {
            goToSlide(current + 1, false);
          }, intervalMs);
        }

        function stopAutoplay() {
          clearInterval(autoTimer);
          if (progressBar) {
            progressBar.style.transition = 'none';
          }
        }

        function restartAutoplay() {
          stopAutoplay();
          if (!isPaused) {
            startAutoplay();
          } else {
            resetProgress();
          }
        }

        tabs.forEach(function (tab) {
          tab.addEventListener('click', function () {
            var idx = parseInt(tab.getAttribute('data-service-tab'), 10);
            goToSlide(idx, true);
          });
        });

        if (prevBtn) {
          prevBtn.addEventListener('click', function () {
            goToSlide(current - 1, true);
          });
        }

        if (nextBtn) {
          nextBtn.addEventListener('click', function () {
            goToSlide(current + 1, true);
          });
        }

        carousel.addEventListener('mouseenter', function () {
          isPaused = true;
          stopAutoplay();
        });

        carousel.addEventListener('mouseleave', function () {
          isPaused = false;
          startAutoplay();
        });

        carousel.addEventListener('keydown', function (e) {
          if (e.key === 'ArrowRight') {
            goToSlide(current + 1, true);
          } else if (e.key === 'ArrowLeft') {
            goToSlide(current - 1, true);
          }
        });

        startAutoplay();
      })();
    </script>
  </section>

  <!-- ================= SECTION 4: ARCHITECTURE COMPARISON TABLE ================= -->
  <section class="py-20 bg-[#F8FAFC] border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-14 reveal">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">EXPERIENCED ENGINEERING ADVANTAGE</span>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">
          Generic SaaS Platforms vs. RajTech BD Ltd. Bespoke Architecture
        </h2>
        <p class="text-sm text-[#64748B] mt-2">Old-fashioned craftsmanship meets zero vendor lock-in and atomic concurrency.</p>
      </div>

      <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden reveal">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="border-b border-[#E2E8F0] bg-[#F1F5F9]/50">
                <th class="p-5 text-sm font-bold text-[#0F172A] font-mono-tag uppercase">Architectural Benchmark</th>
                <th class="p-5 text-sm font-bold text-[#DC2626] font-mono-tag uppercase">Off-The-Shelf Generic ERP</th>
                <th class="p-5 text-sm font-bold text-[#0284C7] font-mono-tag uppercase bg-[#F0F9FF]">RajTech BD Ltd. Custom Architecture</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#E2E8F0] text-sm">
              <tr>
                <td class="p-5 font-semibold text-[#0F172A]">Per-User Recurring License</td>
                <td class="p-5 text-[#64748B]">$75 - $250 / user / month indefinitely</td>
                <td class="p-5 text-[#0369A1] font-bold bg-[#F0F9FF]">$0 recurring seat fees • Unlimited team seats</td>
              </tr>
              <tr>
                <td class="p-5 font-semibold text-[#0F172A]">Source Code Ownership</td>
                <td class="p-5 text-[#64748B]">Vendor-locked proprietary cloud</td>
                <td class="p-5 text-[#0369A1] font-bold bg-[#F0F9FF]">100% Owned by Client • Deploy anywhere</td>
              </tr>
              <tr>
                <td class="p-5 font-semibold text-[#0F172A]">AI &amp; Automation Integration</td>
                <td class="p-5 text-[#64748B]">Generic third-party add-ons with hallucinations</td>
                <td class="p-5 text-[#0369A1] font-bold bg-[#F0F9FF]">Private VPC models with deterministic guardrails</td>
              </tr>
              <tr>
                <td class="p-5 font-semibold text-[#0F172A]">Stock Sync &amp; Race Conditions</td>
                <td class="p-5 text-[#64748B]">Batch jobs with 5-15 min delays</td>
                <td class="p-5 text-[#0369A1] font-bold bg-[#F0F9FF]">Atomic row locking • Millisecond sync</td>
              </tr>
              <tr>
                <td class="p-5 font-semibold text-[#0F172A]">Senior Engineering Access</td>
                <td class="p-5 text-[#64748B]">Automated bots &amp; tiered ticket queues</td>
                <td class="p-5 text-[#0369A1] font-bold bg-[#F0F9FF]">Direct Slack channel with senior architects in Dhaka</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= SECTION 5: TOP 3 LATEST PORTFOLIO PROJECTS (DYNAMIC) ================= -->
  <section id="portfolio-showcase" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 gap-4 reveal">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-widest uppercase block mb-2">PROVEN REAL-WORLD DELIVERIES</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight">
            Top 3 Latest Enterprise Portfolio Projects
          </h2>
        </div>
        <a href="<?php echo $portfolio_url; ?>" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group font-mono-tag">
          Explore All Portfolio Case Studies <span class="group-hover:translate-x-1 transition-transform">→</span>
        </a>
      </div>

      <!-- Dynamic Portfolio Query -->
      <?php
      $top_portfolio_query = new WP_Query( array(
          'post_type'      => 'portfolio',
          'posts_per_page' => 3,
          'post_status'    => 'publish',
      ) );

      if ( $top_portfolio_query->have_posts() ) :
          ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $p_count = 0;
            while ( $top_portfolio_query->have_posts() ) :
                $top_portfolio_query->the_post();
                $p_count++;
                $client     = get_post_meta( get_the_ID(), '_portfolio_client', true );
                $year       = get_post_meta( get_the_ID(), '_portfolio_year', true );
                $metric_val = get_post_meta( get_the_ID(), '_portfolio_metric_val', true );
                $metric_lbl = get_post_meta( get_the_ID(), '_portfolio_metric_lbl', true );
                $tech_stack = get_post_meta( get_the_ID(), '_portfolio_stack', true );
                ?>
                <article class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between reveal delay-<?php echo esc_attr( $p_count * 100 ); ?>">
                  <div>
                    <?php if ( has_post_thumbnail() ) : ?>
                      <a href="<?php the_permalink(); ?>" class="block h-52 overflow-hidden bg-slate-900 relative group">
                        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-4">
                          <span class="text-white text-xs font-mono-tag font-bold">
                            <?php echo esc_html( $client ? $client : 'Enterprise Client' ); ?>
                          </span>
                        </div>
                      </a>
                    <?php else : ?>
                      <div class="h-52 bg-[#0B1528] flex items-center justify-center text-white/40 font-mono-tag text-xs relative p-4 text-center">
                        <span class="text-xs text-[#38BDF8] font-bold font-mono-tag"><?php echo esc_html( $client ? $client : 'RajTech BD Ltd.' ); ?></span>
                      </div>
                    <?php endif; ?>

                    <div class="p-6">
                      <div class="flex items-center justify-between text-xs font-mono-tag mb-2">
                        <span class="text-[#0284C7] font-bold uppercase"><?php echo esc_html( $year ? $year : '2025' ); ?></span>
                        <?php if ( $metric_val ) : ?>
                          <span class="px-2 py-0.5 rounded bg-[#FEF3C7] text-[#D97706] font-bold"><?php echo esc_html( $metric_val ); ?></span>
                        <?php endif; ?>
                      </div>

                      <h3 class="text-xl font-bold text-[#0F172A] mb-3 leading-snug hover:text-[#0284C7] transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>

                      <p class="text-sm text-[#475569] leading-relaxed mb-4">
                        <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                      </p>
                    </div>
                  </div>

                  <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                    <span class="text-[11px] font-mono-tag text-[#64748B] truncate max-w-[170px]">
                      <?php echo esc_html( $tech_stack ? $tech_stack : 'PostgreSQL • AI • Cloud' ); ?>
                    </span>
                    <a href="<?php the_permalink(); ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1">
                      View Architecture →
                    </a>
                  </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
          </div>
          <?php
      else :
          // Fallback if user hasn't published custom portfolio items yet
          ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <article class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between">
              <div>
                <div class="h-52 bg-slate-900 overflow-hidden relative">
                  <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80" alt="ERP & Inventory" class="w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4 text-white text-xs font-mono-tag">Apex Retail Group</div>
                </div>
                <div class="p-6">
                  <div class="flex items-center justify-between text-xs font-mono-tag mb-2">
                    <span class="text-[#0284C7] font-bold">2025</span>
                    <span class="px-2 py-0.5 rounded bg-[#FEF3C7] text-[#D97706] font-bold">99.9% Uptime</span>
                  </div>
                  <h3 class="text-xl font-bold text-[#0F172A] mb-3 leading-snug">Multi-Warehouse ERP &amp; Automated Inventory Engine</h3>
                  <p class="text-sm text-[#475569] leading-relaxed mb-4">Stock sync across 15+ branches with zero duplicate oversells.</p>
                </div>
              </div>
              <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                <span class="text-[11px] font-mono-tag text-[#64748B]">PostgreSQL • Node.js • Redis</span>
                <a href="<?php echo $services_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Explore Architecture →</a>
              </div>
            </article>

            <article class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between">
              <div>
                <div class="h-52 bg-slate-900 overflow-hidden relative">
                  <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=800&q=80" alt="AI Agent Pipeline" class="w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4 text-white text-xs font-mono-tag">FinScale Global</div>
                </div>
                <div class="p-6">
                  <div class="flex items-center justify-between text-xs font-mono-tag mb-2">
                    <span class="text-[#0284C7] font-bold">2026</span>
                    <span class="px-2 py-0.5 rounded bg-[#DCFCE7] text-[#15803D] font-bold">3.8x Speed</span>
                  </div>
                  <h3 class="text-xl font-bold text-[#0F172A] mb-3 leading-snug">Autonomous AI Agent System for Sales &amp; Qualification</h3>
                  <p class="text-sm text-[#475569] leading-relaxed mb-4">Multi-agent LLM pipeline with WhatsApp integration and zero hallucinations.</p>
                </div>
              </div>
              <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                <span class="text-[11px] font-mono-tag text-[#64748B]">Python FastAPI • LangChain • VPC</span>
                <a href="<?php echo $services_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Explore Architecture →</a>
              </div>
            </article>

            <article class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between">
              <div>
                <div class="h-52 bg-slate-900 overflow-hidden relative">
                  <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Academy LMS" class="w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4 text-white text-xs font-mono-tag">FutureTech Institute</div>
                </div>
                <div class="p-6">
                  <div class="flex items-center justify-between text-xs font-mono-tag mb-2">
                    <span class="text-[#0284C7] font-bold">2025</span>
                    <span class="px-2 py-0.5 rounded bg-[#E0F2FE] text-[#0284C7] font-bold">50k+ Students</span>
                  </div>
                  <h3 class="text-xl font-bold text-[#0F172A] mb-3 leading-snug">High-Scale Academy LMS &amp; Certification Portal</h3>
                  <p class="text-sm text-[#475569] leading-relaxed mb-4">Handling 50,000+ active learners with live exams and DRM video streaming.</p>
                </div>
              </div>
              <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                <span class="text-[11px] font-mono-tag text-[#64748B]">Next.js • Node.js • Cloudflare</span>
                <a href="<?php echo $services_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Explore Architecture →</a>
              </div>
            </article>

          </div>
          <?php
      endif;
      ?>

    </div>
  </section>

  <!-- ================= SECTION 6: THE MINDS BEHIND THE ARCHITECTURE (TEAM & CULTURE) ================= -->
  <section id="team" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 gap-4 reveal">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">EXPERIENCED LEADERSHIP IN DHAKA</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight">
            The Minds Behind the Architecture
          </h2>
        </div>
        <p class="text-[#475569] text-sm sm:text-base max-w-md">
          Senior software architects, AI pipeline engineers, and performance specialists collaborating under one roof in Kuril, Vatara, Dhaka.
        </p>
      </div>

      <!-- Hero Team Showcase Banner with Real Core Team Photo -->
      <div class="rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-md mt-6 mb-12 bg-slate-900 relative h-[480px] sm:h-[560px] lg:h-[620px] reveal">
        <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Gemini_Generated_Image_qvam3mqvam3mqvam12-1.jpeg" 
             alt="RajTech BD Limited Core Leadership & Principal Engineering Team" 
             class="w-full h-full object-cover"
             style="object-position: center 10%;"
             onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/rajtechbd-team.jpeg' ); ?>';">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/40 to-transparent flex flex-col justify-end p-6 sm:p-10">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#F59E0B] text-[#0F172A] text-xs font-mono-tag font-bold tracking-wider uppercase mb-3 w-fit">
            CORE LEADERSHIP &amp; SENIOR ARCHITECTS • DHAKA, BANGLADESH
          </div>
          <h3 class="text-2xl sm:text-4xl font-extrabold text-white mb-2">
            The Core Team Behind the Architecture.
          </h3>
          <p class="text-[#94A3B8] text-base sm:text-lg max-w-3xl leading-relaxed">
            Our core team of veteran software architects and AI researchers guides all mission-critical system designs. Supporting our principal leads, RajTech BD Limited operates structured <strong>20+ member Engineer Level 1 (Associate Engineers)</strong> and <strong>Engineering Intern</strong> groups for continuous test-driven sprint execution and 24/7 SLA assurance.
          </p>
        </div>
      </div>

      <!-- Engineering Hierarchy: Core Team + Engineer Level 1 + Intern Group -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="p-5 rounded-xl border border-[#BAE6FD] bg-[#F0F9FF]">
          <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider">TIER 01 / SENIOR LEADERSHIP</span>
            <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span>
          </div>
          <h4 class="text-base font-bold text-[#0F172A] mb-1">Core Architecture Team</h4>
          <p class="text-xs text-[#475569] leading-relaxed">
            Principal systems architects with 8+ years experience. Direct Slack access for enterprise clients, system blueprints, and atomic concurrency locking.
          </p>
        </div>

        <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
          <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-mono-tag font-bold text-[#F59E0B] uppercase tracking-wider">TIER 02 / SPRINT DEVELOPERS</span>
            <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
          </div>
          <h4 class="text-base font-bold text-[#0F172A] mb-1">Engineer Level 1 Group</h4>
          <p class="text-xs text-[#475569] leading-relaxed">
            Associate full-stack, mobile, and backend engineers delivering bi-weekly sprint deliverables, clean REST/GraphQL APIs, and pixel-perfect UIs.
          </p>
        </div>

        <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
          <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-mono-tag font-bold text-[#10B981] uppercase tracking-wider">TIER 03 / QA &amp; RESEARCH</span>
            <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
          </div>
          <h4 class="text-base font-bold text-[#0F172A] mb-1">Engineering Intern Group</h4>
          <p class="text-xs text-[#475569] leading-relaxed">
            Competitive university graduates undergoing senior mentorship. Handling automated regression testing, load testing, and emerging AI model benchmarks.
          </p>
        </div>
      </div>

      <!-- 3-Column Team Leadership & Culture Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Team Card 1 -->
        <div class="bg-[#F8FAFC] rounded-xl overflow-hidden border border-[#E2E8F0] hover-lift reveal">
          <div class="h-60 overflow-hidden relative">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Modern-Office-Selfie-with-Coding-Workspace1.png" 
                 alt="System Architecture & Strategy - Modern Office Coding Workspace" 
                 class="w-full h-full object-cover"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/rajtechbd-meeting.png' ); ?>';">
            <div class="absolute top-3 left-3 bg-[#0B1528]/80 backdrop-blur-md px-3 py-1 rounded text-white text-xs font-mono-tag">
              Architecture &amp; Strategy
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-lg font-bold text-[#0F172A] mb-1">Executive Systems Architecture</h4>
            <p class="text-xs font-semibold text-[#0284C7] uppercase font-mono-tag mb-3">Enterprise ERP &amp; Core Infrastructure</p>
            <p class="text-sm text-[#475569] leading-relaxed">
              Headed by veteran systems architects with deep expertise in relational database scaling, atomic concurrency, and multi-tenant cloud platforms.
            </p>
          </div>
        </div>

        <!-- Team Card 2 -->
        <div class="bg-[#F8FAFC] rounded-xl overflow-hidden border border-[#E2E8F0] hover-lift reveal delay-100">
          <div class="h-60 overflow-hidden relative">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-09-at-5.15.31-AM.jpeg" 
                 alt="Full-Stack & AI Engineering Team" 
                 class="w-full h-full object-cover"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80';">
            <div class="absolute top-3 left-3 bg-[#0B1528]/80 backdrop-blur-md px-3 py-1 rounded text-white text-xs font-mono-tag">
              Full-Stack &amp; AI
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-lg font-bold text-[#0F172A] mb-1">Full-Stack &amp; AI Engineers</h4>
            <p class="text-xs font-semibold text-[#0284C7] uppercase font-mono-tag mb-3">Python, Node, Flutter &amp; Neural Models</p>
            <p class="text-sm text-[#475569] leading-relaxed">
              Dedicated front-end craftspeople, mobile engineers, and machine learning specialists ensuring sub-second visual responsiveness and clean code.
            </p>
          </div>
        </div>

        <!-- Team Card 3 -->
        <div class="bg-[#F8FAFC] rounded-xl overflow-hidden border border-[#E2E8F0] hover-lift reveal delay-200">
          <div class="h-60 overflow-hidden relative">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/office-scaled.jpeg" 
                 alt="Sales Development & SEO Strategists" 
                 loading="lazy"
                 decoding="async"
                 class="w-full h-full object-cover"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80';">
            <div class="absolute top-3 left-3 bg-[#0B1528]/80 backdrop-blur-md px-3 py-1 rounded text-white text-xs font-mono-tag">
              Growth &amp; SEO
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-lg font-bold text-[#0F172A] mb-1">Sales Dev &amp; SEO Strategists</h4>
            <p class="text-xs font-semibold text-[#0284C7] uppercase font-mono-tag mb-3">CRO, CRM &amp; SERP Optimization</p>
            <p class="text-sm text-[#475569] leading-relaxed">
              Performance marketers and data analysts dedicated to optimizing customer acquisition pipelines, Google search rankings, and inbound sales pipelines.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= SECTION 7: TOP 3 LATEST TECHNICAL BLOG POSTS (DYNAMIC) ================= -->
  <section id="engineering-insights" class="bg-[#F8FAFC] py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 gap-4 reveal">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">TECHNICAL KNOWLEDGE BASE</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight">
            Latest Engineering Publications &amp; Insights
          </h2>
        </div>
        <a href="<?php echo $blog_url; ?>" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group font-mono-tag">
          Read All Publications <span class="group-hover:translate-x-1 transition-transform">→</span>
        </a>
      </div>

      <!-- Dynamic Blog Query -->
      <?php
      $top_blog_query = new WP_Query( array(
          'post_type'           => 'post',
          'posts_per_page'      => 3,
          'post_status'         => 'publish',
          'ignore_sticky_posts' => true,
      ) );

      if ( $top_blog_query->have_posts() ) :
          ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $b_count = 0;
            while ( $top_blog_query->have_posts() ) :
                $top_blog_query->the_post();
                $b_count++;
                $cats = get_the_category();
                $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Engineering';
                ?>
                <article class="bg-white rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between reveal delay-<?php echo esc_attr( $b_count * 100 ); ?> shadow-xs">
                  <div>
                    <?php if ( has_post_thumbnail() ) : ?>
                      <a href="<?php the_permalink(); ?>" class="block h-48 overflow-hidden bg-slate-900 group">
                        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
                      </a>
                    <?php else : ?>
                      <div class="h-48 bg-[#0B1528] flex items-center justify-center text-white/30 font-mono-tag text-xs p-6 text-center">
                        RajTech BD Ltd. Engineering Publication
                      </div>
                    <?php endif; ?>

                    <div class="p-6">
                      <div class="flex items-center justify-between text-xs font-mono-tag text-[#64748B] mb-2.5">
                        <span class="text-[#0284C7] font-bold uppercase"><?php echo esc_html( $cat_name ); ?></span>
                        <span><?php echo esc_html( rajtechbd_get_reading_time() ); ?></span>
                      </div>

                      <h3 class="text-lg font-bold text-[#0F172A] mb-3 leading-snug hover:text-[#0284C7] transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>

                      <p class="text-sm text-[#475569] leading-relaxed mb-4">
                        <?php echo wp_trim_words( get_the_excerpt(), 18 ); ?>
                      </p>
                    </div>
                  </div>

                  <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                    <span class="text-xs text-[#64748B] font-mono-tag">
                      By <?php the_author(); ?>
                    </span>
                    <a href="<?php the_permalink(); ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1">
                      Read Details →
                    </a>
                  </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
          </div>
          <?php
      else :
          // Fallback if 0 posts exist
          ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <article class="bg-white rounded-2xl overflow-hidden border border-[#E2E8F0] p-6 hover-lift">
              <span class="text-xs font-mono-tag text-[#0284C7] font-bold uppercase block mb-2">ERP Architecture</span>
              <h3 class="text-lg font-bold text-[#0F172A] mb-2">Architecting Custom ERPs for Bangladeshi Multi-Branch Scale</h3>
              <p class="text-sm text-[#475569] leading-relaxed mb-4">Why off-the-shelf software fails growing retail chains and how atomic row locking solves it.</p>
              <a href="<?php echo $blog_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Read Article →</a>
            </article>
            <article class="bg-white rounded-2xl overflow-hidden border border-[#E2E8F0] p-6 hover-lift">
              <span class="text-xs font-mono-tag text-[#0284C7] font-bold uppercase block mb-2">AI Systems</span>
              <h3 class="text-lg font-bold text-[#0F172A] mb-2">Building Production AI Systems in 2026: Beyond the Hype</h3>
              <p class="text-sm text-[#475569] leading-relaxed mb-4">How we architect deterministic multi-agent LLM pipelines for WhatsApp and enterprise CRMs.</p>
              <a href="<?php echo $blog_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Read Article →</a>
            </article>
            <article class="bg-white rounded-2xl overflow-hidden border border-[#E2E8F0] p-6 hover-lift">
              <span class="text-xs font-mono-tag text-[#0284C7] font-bold uppercase block mb-2">Web Speed</span>
              <h3 class="text-lg font-bold text-[#0F172A] mb-2">Achieving Sub-200ms TTFB and 98+ PageSpeed on WordPress</h3>
              <p class="text-sm text-[#475569] leading-relaxed mb-4">Eliminating bulky page builder overhead and implementing Redis persistent caching.</p>
              <a href="<?php echo $blog_url; ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline">Read Article →</a>
            </article>
          </div>
          <?php
      endif;
      ?>

    </div>
  </section>

  <!-- ================= SECTION 8: ENGINEERING & DELIVERY BLUEPRINT ================= -->
  <section id="process" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column (35% / 4 cols) -->
        <div class="lg:col-span-5 flex flex-col reveal">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-3">OUR METHODOLOGY</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight mb-4">
            Our Engineering &amp; Delivery Blueprint
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            A transparent, milestone-driven workflow built for mission-critical software. Every sprint is paired with automated CI/CD pipelines, direct Slack channels with principal architects, and rigorous quality assurance.
          </p>
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-64 relative group">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-meeting.png" 
                 alt="RajTech BD Agile Review" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-4">
              <span class="text-white text-xs font-semibold">Live Sprint Architecture Review</span>
            </div>
          </div>
        </div>

        <!-- Right Column (65% / 7 cols) 4 Numbered Steps -->
        <div class="lg:col-span-7 flex flex-col justify-center divide-y divide-[#E2E8F0]">
          
          <div class="pb-6 pt-2 reveal">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 01 / AUDIT &amp; ROADMAP</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">01 / System Audit &amp; Architecture Blueprint</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Deep-dive into your existing business workflows, legacy databases, data models, and ERP/commerce integration points to architect an unyielding foundation.
            </p>
          </div>

          <div class="py-6 reveal delay-100">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 02 / DESIGN &amp; PROTOTYPE</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">02 / Minimalist UI/UX &amp; Prototype Design</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              High-clarity dashboards and user interfaces designed for zero cognitive friction, rapid operator data entry, and seamless mobile ergonomics.
            </p>
          </div>

          <div class="py-6 reveal delay-200">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 03 / SPRINT ENGINEERING</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">03 / Agile Sprint Engineering &amp; QA</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Iterative development of backend modules, APIs, mobile apps, and storefronts with automated unit testing, load testing, and security hardening.
            </p>
          </div>

          <div class="pt-6 reveal delay-300">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 04 / LAUNCH &amp; SLA</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">04 / Deployment, Training &amp; Scale</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Zero-downtime cloud deployment, hands-on staff onboarding for ERP/LMS tools, and ongoing SLA maintenance to ensure smooth business growth.
            </p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ================= SECTION 9: BOTTOM CONVERSION CALLOUT ================= -->
  <section class="bg-white py-20 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="bg-[#0B1528] rounded-2xl p-10 sm:p-14 text-white relative overflow-hidden bg-grid-pattern-dark reveal">
        <div class="relative z-10 max-w-2xl">
          <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-widest uppercase block mb-3">SCHEDULE TECHNICAL DISCOVERY</span>
          <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-4 text-white">
            Ready to Architect an Unyielding System?
          </h2>
          <p class="text-[#94A3B8] text-base sm:text-lg mb-8 leading-relaxed">
            Consult with our systems architects in Dhaka. We'll examine your data workflows, speed bottlenecks, and outline a tailored roadmap.
          </p>
          <div class="flex flex-wrap items-center gap-4">
            <a href="<?php echo $contact_url; ?>" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all">
              Book Technical Consultation
            </a>
            <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="px-6 py-4 rounded-[6px] border border-slate-700 hover:border-slate-500 text-white font-bold text-base transition-colors flex items-center gap-2">
              <span>Direct WhatsApp: +8801758522846</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
endif;
get_footer();
