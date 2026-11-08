<?php
/**
 * Template Name: Case Studies - RajTech BD
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
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-case-studies.php -->' !== trim( $content ) && '<!-- Case Studies Page with Elementor support -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= CASE STUDIES HERO ================= -->
  <section class="bg-[#0B1528] py-20 text-white border-b border-[#1E3352] bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold tracking-wider uppercase mb-4">
        PROVEN ENTERPRISE DELIVERIES
      </div>
      <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4 text-white">
        Engineered for Real-World Impact
      </h1>
      <p class="text-lg text-[#94A3B8] max-w-2xl mx-auto">
        Explore how our custom ERP systems, headless commerce architectures, and performance engineering create measurable business results.
      </p>
    </div>
  </section>

  <!-- ================= CASE STUDIES GRID ================= -->
  <section class="py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6 space-y-16">

      <!-- Case 1: Multi-Warehouse ERP -->
      <div class="border border-[#E2E8F0] rounded-2xl overflow-hidden bg-[#F8FAFC] p-8 lg:p-12 hover-lift reveal">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
          <div class="lg:col-span-6">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-2">
              LOGISTICS &amp; SUPPLY CHAIN
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#0F172A] mb-4">
              Multi-Warehouse ERP &amp; Automated Inventory Engine
            </h2>
            <p class="text-[#475569] text-base leading-relaxed mb-6">
              A major retail conglomerate with 15+ branches was struggling with stock discrepancies, manual phone-based order coordination, and frequent overselling. RajTech BD architected a centralized ERP with real-time barcode inventory syncing.
            </p>
            <div class="grid grid-cols-3 gap-4 border-y border-[#E2E8F0] py-4 mb-6">
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="99.9" data-suffix="%">99.9%</div>
                <div class="text-xs text-[#64748B]">Inventory Accuracy</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="15" data-suffix="+">15+</div>
                <div class="text-xs text-[#64748B]">Synced Branches</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="0" data-suffix=" Duplicate">0</div>
                <div class="text-xs text-[#64748B]">Stockout Oversells</div>
              </div>
            </div>
            <div class="text-xs font-mono-tag text-[#0284C7]">
              PostgreSQL • Node.js • Redis Streams • Docker
            </div>
          </div>
          <div class="lg:col-span-6">
            <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm h-80 bg-slate-900">
              <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80" 
                   alt="Multi-Warehouse ERP Deployment" 
                   class="w-full h-full object-cover">
            </div>
          </div>
        </div>
      </div>

      <!-- Case 2: Corporate Finance -->
      <div class="border border-[#E2E8F0] rounded-2xl overflow-hidden bg-[#F8FAFC] p-8 lg:p-12 hover-lift reveal delay-100">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
          <div class="lg:col-span-6 order-2 lg:order-1">
            <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm h-80 bg-slate-900">
              <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                   alt="FinTech &amp; Corporate Finance Automation" 
                   class="w-full h-full object-cover">
            </div>
          </div>
          <div class="lg:col-span-6 order-1 lg:order-2">
            <span class="text-xs font-mono-tag font-bold text-[#F59E0B] uppercase tracking-wider block mb-2">
              FINTECH &amp; AUDIT AUTOMATION
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#0F172A] mb-4">
              Automated Corporate Finance &amp; Multi-Currency Billing Suite
            </h2>
            <p class="text-[#475569] text-base leading-relaxed mb-6">
              Replaced cumbersome multi-step spreadsheet reconciliation with automated voucher generation, bank feed reconciliations, VAT calculations, and instant monthly balance sheets.
            </p>
            <div class="grid grid-cols-3 gap-4 border-y border-[#E2E8F0] py-4 mb-6">
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="80" data-suffix="%">80%</div>
                <div class="text-xs text-[#64748B]">Audit Time Reduced</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="100" data-suffix="%">100%</div>
                <div class="text-xs text-[#64748B]">VAT Compliance</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A]">Sub-Sec</div>
                <div class="text-xs text-[#64748B]">Reporting Speed</div>
              </div>
            </div>
            <div class="text-xs font-mono-tag text-[#D97706]">
              Python FastAPI • PostgreSQL • Automated Ledger • SSLCommerz
            </div>
          </div>
        </div>
      </div>

      <!-- Case 3: LMS Platform -->
      <div class="border border-[#E2E8F0] rounded-2xl overflow-hidden bg-[#F8FAFC] p-8 lg:p-12 hover-lift reveal">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
          <div class="lg:col-span-6">
            <span class="text-xs font-mono-tag font-bold text-[#10B981] uppercase tracking-wider block mb-2">
              EDTECH &amp; HIGH CONCURRENCY
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#0F172A] mb-4">
              High-Scale Academy LMS &amp; Interactive Certification Portal
            </h2>
            <p class="text-[#475569] text-base leading-relaxed mb-6">
              Architected a high-concurrency learning management system capable of handling 50,000+ active students with DRM video streaming, timed quiz evaluations, and cryptographically verified PDF certificates.
            </p>
            <div class="grid grid-cols-3 gap-4 border-y border-[#E2E8F0] py-4 mb-6">
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="50000" data-suffix="+">50k+</div>
                <div class="text-xs text-[#64748B]">Active Learners</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A]">99.98%</div>
                <div class="text-xs text-[#64748B]">Exam Uptime</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A]">Instant</div>
                <div class="text-xs text-[#64748B]">Certificate Issuance</div>
              </div>
            </div>
            <div class="text-xs font-mono-tag text-[#10B981]">
              Next.js • Node.js • Cloudflare Stream • Redis Cluster
            </div>
          </div>
          <div class="lg:col-span-6">
            <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm h-80 bg-slate-900">
              <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" 
                   alt="EdTech Academy Platform" 
                   class="w-full h-full object-cover">
            </div>
          </div>
        </div>
      </div>

      <!-- Case 4: Headless Shopify & Mobile App -->
      <div class="border border-[#E2E8F0] rounded-2xl overflow-hidden bg-[#F8FAFC] p-8 lg:p-12 hover-lift reveal delay-100">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
          <div class="lg:col-span-6 order-2 lg:order-1">
            <div class="rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm h-80 bg-slate-900">
              <img src="https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=1200&q=80" 
                   alt="Headless Store and Mobile App" 
                   class="w-full h-full object-cover">
            </div>
          </div>
          <div class="lg:col-span-6 order-1 lg:order-2">
            <span class="text-xs font-mono-tag font-bold text-[#A78BFA] uppercase tracking-wider block mb-2">
              OMNICHANNEL COMMERCE
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#0F172A] mb-4">
              Headless Storefront &amp; Cross-Platform Mobile Shopping App
            </h2>
            <p class="text-[#475569] text-base leading-relaxed mb-6">
              Migrated a sluggish eCommerce store to a decoupled Hydrogen/Shopify architecture paired with a native Flutter mobile app, resulting in lightning-fast checkout velocity.
            </p>
            <div class="grid grid-cols-3 gap-4 border-y border-[#E2E8F0] py-4 mb-6">
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A] count-up" data-target="34" data-suffix="%">+34%</div>
                <div class="text-xs text-[#64748B]">Conversion Surge</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A]">0.8s</div>
                <div class="text-xs text-[#64748B]">Avg Page Load</div>
              </div>
              <div>
                <div class="text-2xl font-extrabold text-[#0F172A]">60 FPS</div>
                <div class="text-xs text-[#64748B]">Fluid Mobile UI</div>
              </div>
            </div>
            <div class="text-xs font-mono-tag text-[#7E22CE]">
              Shopify Plus • Hydrogen • Flutter • SQLite Offline Sync
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= CASE STUDIES CTA ================= -->
  <section class="py-20 bg-[#F8FAFC]">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-[#0F172A] mb-4">Ready to Achieve Similar Results?</h2>
      <p class="text-[#475569] text-base max-w-xl mx-auto mb-8">Discuss your technical targets and architectural challenges directly with our team.</p>
      <a href="<?php echo $contact_url; ?>" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all inline-block">
        Request Consultation
      </a>
    </div>
  </section>

<?php
endif;
get_footer();
