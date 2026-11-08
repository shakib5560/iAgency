<?php
/**
 * Template Name: FAQ - RajTech BD
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
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-faq.php -->' !== trim( $content ) && '<!-- FAQ Page with Elementor support -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= FAQ JSON-LD SCHEMA ================= -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "How does RajTech BD architect custom ERP systems compared to off-the-shelf tools?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Unlike rigid third-party ERPs with high recurring licensing fees and unnecessary bloat, RajTech BD engineers 100% bespoke modular ERP platforms tailored specifically to your internal workflows, inventory synchronization rules, and accounting frameworks. You retain full source code ownership, zero license limits per seat, and sub-second transaction performance."
        }
      },
      {
        "@type": "Question",
        "name": "How do you achieve 95+ Google PageSpeed and sub-200ms TTFB on WordPress?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We eliminate heavy third-party page builder overhead by building native Gutenberg block-compatible architectures in clean PHP. We implement server-level Redis object caching, database index optimization, Brotli compression, lazy loading, and critical CSS inlining to guarantee lightning-fast Core Web Vitals scores."
        }
      },
      {
        "@type": "Question",
        "name": "How does sprint communication work during development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We operate with complete agile transparency. Enterprise clients receive a direct shared Slack or Teams channel connected directly to the principal architects, full-stack engineers, and QA leads working on their build, alongside weekly demo sprint releases."
        }
      },
      {
        "@type": "Question",
        "name": "What 24/7 SLA guarantees and post-launch maintenance do you offer?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We back every enterprise deployment with contractual SLA options including 24/7 server monitoring, guaranteed sub-15 minute critical response times, proactive database backup verifications, and regular security hardening patches."
        }
      }
    ]
  }
  </script>

  <!-- ================= FAQ HERO ================= -->
  <section class="bg-[#F8FAFC] py-20 border-b border-[#F1F5F9] bg-grid-pattern">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-4 shadow-xs">
        TRANSPARENCY &amp; KNOWLEDGE BASE
      </div>
      <h1 class="text-4xl sm:text-5xl font-extrabold text-[#0F172A] tracking-tight mb-4">
        Frequently Asked Questions
      </h1>
      <p class="text-lg text-[#475569] max-w-2xl mx-auto">
        Detailed answers regarding our software engineering practices, WordPress performance optimization, CRM development, and ongoing SLA maintenance.
      </p>
    </div>
  </section>

  <!-- ================= ACCORDION SECTIONS ================= -->
  <section class="py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[960px] mx-auto px-6">
      
      <!-- Category 1: Enterprise ERP & Software -->
      <div class="mb-14">
        <div class="flex items-center gap-3 mb-6">
          <span class="w-8 h-8 rounded bg-[#0284C7]/15 text-[#0284C7] flex items-center justify-center font-mono-tag font-bold text-sm">01</span>
          <h2 class="text-2xl font-bold text-[#0F172A]">Enterprise ERP &amp; Software Engineering</h2>
        </div>

        <div class="faq-container space-y-4">
          
          <div class="faq-item active">
            <div class="faq-header">
              <span>How does RajTech BD architect custom ERP systems compared to off-the-shelf tools?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Unlike rigid off-the-shelf ERP systems (like SAP or standard Odoo) that charge exorbitant per-user recurring licenses and force your business to conform to rigid generic workflows, RajTech BD engineers 100% bespoke modular ERP architectures. You own the code completely, operate with unlimited team seats, and gain high-throughput database synchronization tailored precisely to your supply chain, procurement, and warehouse rules.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>How do you handle database concurrency and multi-warehouse inventory syncing?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>We implement atomic database transactions with row-level locking (PostgreSQL/Redis), preventing race conditions where two simultaneous orders deplete the same physical stock. Stock levels across 15+ physical outlets and digital web portals synchronize in milliseconds via distributed message queues (Kafka or RabbitMQ).</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>Can RajTech BD integrate with our existing accounting/POS or legacy databases?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Yes. Our senior architects specialize in data migration blueprints and building secure REST or GraphQL middleware adapters to bridge legacy SQL databases, third-party payment gateways (bKash, Nagad, Stripe, SSLCommerz), and existing POS barcode hardware seamlessly.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>What is the typical development timeline for a custom software project?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Focused MVPs and single-purpose management modules typically launch within 4 to 8 weeks. Comprehensive enterprise ERP suites with multi-warehouse logistics, role-based permissions, and financial engines are delivered iteratively in 2-week agile sprints over 3 to 6 months.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Category 2: WordPress, Shopify & Performance -->
      <div class="mb-14">
        <div class="flex items-center gap-3 mb-6">
          <span class="w-8 h-8 rounded bg-[#F59E0B]/15 text-[#D97706] flex items-center justify-center font-mono-tag font-bold text-sm">02</span>
          <h2 class="text-2xl font-bold text-[#0F172A]">WordPress &amp; Shopify Performance Optimization</h2>
        </div>

        <div class="faq-container space-y-4">
          
          <div class="faq-item">
            <div class="faq-header">
              <span>Why build a native WordPress theme rather than using heavy visual builders?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Visual builders often inject dozens of nested div wrappers, redundant JavaScript frameworks, and massive CSS bundles that drag down mobile PageSpeed scores and crash during high-traffic sales events. Our custom native themes use clean PHP and native Gutenberg block support, giving your non-technical editors full visual block control while keeping the underlying HTML featherweight and blisteringly fast.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>How do you achieve 95+ Google PageSpeed and sub-200ms TTFB?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>We eliminate unnecessary database queries, configure Redis persistent object caching, optimize webfonts and AVIF/WebP responsive imagery, minify CSS, and leverage edge CDN caching (Cloudflare Enterprise). The result is instant page rendering and flawless Core Web Vitals scores that rank highly on Google.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>Can we still edit text, images, and add new pages easily with Elementor or Gutenberg?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Absolutely. Every page is built with full Elementor visual drag-and-drop compatibility and native WordPress Gutenberg block patterns. You can open any page in Elementor to customize layout, typography, and styling visually without touching any code.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Category 3: Sales Development & SLA -->
      <div class="mb-14">
        <div class="flex items-center gap-3 mb-6">
          <span class="w-8 h-8 rounded bg-[#10B981]/15 text-[#10B981] flex items-center justify-center font-mono-tag font-bold text-sm">03</span>
          <h2 class="text-2xl font-bold text-[#0F172A]">Sales Funnels, SLAs &amp; Support Guarantees</h2>
        </div>

        <div class="faq-container space-y-4">
          
          <div class="faq-item">
            <div class="faq-header">
              <span>What is included in your sales development and CRM automation services?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>We engineer end-to-end inbound customer acquisition pipelines: high-converting landing pages, lead qualification scoring, instant WhatsApp/SMS notification triggers for sales reps, automated email drip sequences, and multi-channel attribution reporting connected into HubSpot or your custom CRM.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>What 24/7 SLA maintenance coverage do you provide after deployment?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>We provide contractual Service Level Agreements (SLAs) with 24/7 server uptime monitoring, sub-15 minute response times for high-priority incidents, automated nightly off-site backups, and ongoing security vulnerability patching.</p>
            </div>
          </div>

          <div class="faq-item">
            <div class="faq-header">
              <span>Where are your offices located, and can we meet your engineering team in Dhaka?</span>
              <div class="faq-icon">▼</div>
            </div>
            <div class="faq-body">
              <p>Our main engineering headquarters and laboratory is located at House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh. We warmly welcome clients to visit our office for in-person sprint reviews, technical architecture whiteboard sessions, or to meet our principal software engineers.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Still have questions callout -->
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-8 text-center mt-12">
        <h3 class="text-xl font-bold text-[#0F172A] mb-2">Have a question not listed here?</h3>
        <p class="text-[#475569] text-sm mb-6 max-w-md mx-auto">
          Our senior software architects are available to discuss your technical scope, system requirements, or custom integrations.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <a href="<?php echo $contact_url; ?>" class="px-6 py-3 rounded-[6px] bg-[#0284C7] text-white font-bold text-sm hover:bg-[#0369a1] hover-lift transition-all">
            Contact Engineering Team
          </a>
          <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="px-6 py-3 rounded-[6px] bg-white border border-[#CBD5E1] text-[#0F172A] font-bold text-sm hover:border-[#0284C7] transition-colors">
            WhatsApp: +8801758522846
          </a>
        </div>
      </div>

    </div>
  </section>

<?php
endif;
get_footer();
