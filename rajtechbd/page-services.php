<?php
/**
 * Template Name: Services - RajTech BD
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );

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
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-services.php -->' !== trim( $content ) && '<!-- Services & ERP Page with Elementor support -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= SERVICES HERO ================= -->
  <section class="bg-[#0B1528] py-20 text-white border-b border-[#1E3352] bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#38BDF8] text-xs font-mono-tag font-bold tracking-wider uppercase mb-4">
          END-TO-END CAPABILITIES • ZERO BLOAT
        </div>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.15] mb-6 text-white">
          Software Engineering, Sales Development &amp; Performance Architecture.
        </h1>
        <p class="text-lg text-[#94A3B8] leading-relaxed">
          From heavy-duty relational backend ERP systems to high-speed web platforms, mobile apps, and automated inbound sales funnels — engineered by practitioners in Dhaka.
        </p>
      </div>
    </div>
  </section>

  <!-- ================= DETAILED SERVICE BREAKDOWN ================= -->
  <section class="py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6 space-y-20">

      <!-- Pillar 1: Custom ERP Software -->
      <div id="solutions" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal">
        <div class="lg:col-span-6">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E0F2FE] text-[#0284C7] text-xs font-mono-tag font-bold mb-3 uppercase">
            ENTERPRISE ARCHITECTURE
          </div>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-4">
            Custom Modular ERP Systems
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            Eliminate fragmented spreadsheets and clunky software. We build unified, modular ERP platforms tailored to automate procurement, employee records, multi-branch supply chains, and customer relationship lifecycles.
          </p>
          <ul class="space-y-2.5 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Unified Multi-Branch Supply Chain &amp; Procurement</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Granular Role-Based Access Control (RBAC)</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Real-Time Executive KPI &amp; Balance Sheet Dashboards</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> PostgreSQL Database with Row-Level Locking</li>
          </ul>
          <a href="<?php echo $contact_url; ?>" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group">
            Request Custom ERP Scope <span class="group-hover:translate-x-1 transition-transform">→</span>
          </a>
        </div>
        <div class="lg:col-span-6">
          <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-md bg-slate-900 h-80">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-meeting.png" 
                 alt="ERP Architecture and Strategy Session" 
                 class="w-full h-full object-cover">
          </div>
        </div>
      </div>

      <!-- Pillar 2: Multi-Warehouse Inventory -->
      <div id="inventory" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal delay-100">
        <div class="lg:col-span-6 order-2 lg:order-1">
          <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-md bg-slate-900 h-80">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80" 
                 alt="Automated Inventory Logistics and Distribution" 
                 class="w-full h-full object-cover">
          </div>
        </div>
        <div class="lg:col-span-6 order-1 lg:order-2">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#FEF3C7] text-[#D97706] text-xs font-mono-tag font-bold mb-3 uppercase">
            LOGISTICS AUTOMATION
          </div>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-4">
            Multi-Warehouse Inventory &amp; Barcode Tracking
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            Real-time stock synchronization across physical retail stores, central fulfillment depots, and eCommerce websites with atomic concurrency that eliminates duplicate stockouts.
          </p>
          <ul class="space-y-2.5 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
            <li class="flex items-center gap-2"><span class="text-[#D97706]">✓</span> Automated Barcode &amp; QR SKU Generation</li>
            <li class="flex items-center gap-2"><span class="text-[#D97706]">✓</span> Predictive Low-Stock Forecasting &amp; Auto-Reordering</li>
            <li class="flex items-center gap-2"><span class="text-[#D97706]">✓</span> Seamless Handheld Scanner &amp; Mobile App Integration</li>
            <li class="flex items-center gap-2"><span class="text-[#D97706]">✓</span> Millisecond Inter-Branch Stock Transfer Vouchers</li>
          </ul>
          <a href="<?php echo $contact_url; ?>" class="text-sm font-bold text-[#D97706] hover:underline inline-flex items-center gap-1 group">
            Consult on Warehouse Automation <span class="group-hover:translate-x-1 transition-transform">→</span>
          </a>
        </div>
      </div>

      <!-- Pillar 3: Corporate Finance -->
      <div id="finance" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal">
        <div class="lg:col-span-6">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E0F2FE] text-[#0284C7] text-xs font-mono-tag font-bold mb-3 uppercase">
            FINTECH &amp; BILLING
          </div>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-4">
            Corporate Finance &amp; Automated Billing Suite
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            Streamline voucher approvals, multi-currency invoicing, VAT compliance, and automated payroll generation with real-time executive balance sheet reporting.
          </p>
          <ul class="space-y-2.5 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Automated Ledger &amp; Bank Feed Reconciliation</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Multi-Currency Invoicing &amp; VAT Calculation</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Automated Payroll &amp; Employee Reimbursement</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">✓</span> Instant Executive Cashflow Forecasting</li>
          </ul>
          <a href="<?php echo $contact_url; ?>" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group">
            Request Financial Suite Demo <span class="group-hover:translate-x-1 transition-transform">→</span>
          </a>
        </div>
        <div class="lg:col-span-6">
          <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-md bg-slate-900 h-80">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                 alt="FinTech Analytics & Realtime Reporting" 
                 class="w-full h-full object-cover">
          </div>
        </div>
      </div>

      <!-- Pillar 4: High-Scale LMS -->
      <div id="lms" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal delay-100">
        <div class="lg:col-span-6 order-2 lg:order-1">
          <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-md bg-slate-900 h-80">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" 
                 alt="EdTech Collaborative LMS Platform" 
                 class="w-full h-full object-cover">
          </div>
        </div>
        <div class="lg:col-span-6 order-1 lg:order-2">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#DCFCE7] text-[#15803D] text-xs font-mono-tag font-bold mb-3 uppercase">
            EDTECH CONCURRENCY
          </div>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-4">
            Learning Management Systems (LMS)
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            Interactive course delivery, live student assessments, automated certificate generation, and cohort management engineered for 50,000+ simultaneous students.
          </p>
          <ul class="space-y-2.5 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
            <li class="flex items-center gap-2"><span class="text-[#15803D]">✓</span> High-Concurrency DRM Video Streaming</li>
            <li class="flex items-center gap-2"><span class="text-[#15803D]">✓</span> Automated Real-Time Quiz Grading Engine</li>
            <li class="flex items-center gap-2"><span class="text-[#15803D]">✓</span> Cryptographically Verified PDF Certificates</li>
            <li class="flex items-center gap-2"><span class="text-[#15803D]">✓</span> Corporate Academy &amp; Multi-Instructor Portals</li>
          </ul>
          <a href="<?php echo $contact_url; ?>" class="text-sm font-bold text-[#15803D] hover:underline inline-flex items-center gap-1 group">
            Consult on LMS Architecture <span class="group-hover:translate-x-1 transition-transform">→</span>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= TECH STACK MATRIX ================= -->
  <section class="py-20 bg-[#F8FAFC] border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <h2 class="text-2xl font-bold text-[#0F172A]">Core Technologies in Our Arsenal</h2>
        <p class="text-sm text-[#64748B] mt-2">Tested, benchmarked, and production-proven across millions of transactions.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg border border-[#E2E8F0] text-center">
          <div class="font-bold text-lg text-[#0F172A]">PostgreSQL &amp; Redis</div>
          <div class="text-xs text-[#64748B] mt-1 font-mono-tag">Atomic Databases</div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-[#E2E8F0] text-center">
          <div class="font-bold text-lg text-[#0F172A]">Node.js &amp; Python</div>
          <div class="text-xs text-[#64748B] mt-1 font-mono-tag">Microservices &amp; APIs</div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-[#E2E8F0] text-center">
          <div class="font-bold text-lg text-[#0F172A]">WordPress &amp; Shopify</div>
          <div class="text-xs text-[#64748B] mt-1 font-mono-tag">Elementor &amp; Liquid</div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-[#E2E8F0] text-center">
          <div class="font-bold text-lg text-[#0F172A]">Flutter &amp; React</div>
          <div class="text-xs text-[#64748B] mt-1 font-mono-tag">Cross-Platform UI</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SERVICES CTA ================= -->
  <section class="py-20 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-[#0F172A] mb-4">Have an Enterprise Scope to Discuss?</h2>
      <p class="text-[#475569] text-base max-w-xl mx-auto mb-8">Let our engineering leads review your technical roadmap and prepare an architectural estimate.</p>
      <a href="<?php echo $contact_url; ?>" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all inline-block">
        Schedule Technical Discovery
      </a>
    </div>
  </section>

<?php
endif;
get_footer();
