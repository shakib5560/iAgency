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

  <!-- ================= SERVICES HERO + QUICK FINDER ================= -->
  <section class="bg-[#0B1528] py-20 lg:py-24 text-white border-b border-[#1E3352] bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

        <!-- Left Column: Value Proposition -->
        <div class="lg:col-span-7">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#38BDF8] text-xs font-mono-tag font-bold tracking-wider uppercase mb-5">
            <span class="w-2 h-2 rounded-full bg-[#38BDF8] pulse-dot"></span>
            <span>END-TO-END CAPABILITIES &bull; ZERO BLOAT</span>
          </div>
          <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.12] mb-6 text-white">
            Engineering Services Built for Scale, Speed &amp; Clarity.
          </h1>
          <p class="text-lg text-[#94A3B8] leading-relaxed mb-8 max-w-2xl">
            From custom SaaS and modular ERP platforms to AI workflow automation, cloud infrastructure, and cybersecurity &mdash; delivered by senior engineers in Dhaka for teams worldwide.
          </p>

          <div class="flex flex-wrap items-center gap-4">
            <a href="<?php echo $contact_url; ?>" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm hover:bg-[#d97706] transition-all hover-lift">
              <span>Book Free Discovery Call</span>
              <span aria-hidden="true">&rarr;</span>
            </a>
            <a href="#services" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-[6px] bg-[#132238] border border-[#1E3352] text-white font-semibold text-sm hover:border-[#38BDF8] hover:text-[#38BDF8] transition-all">
              <span>Browse All Services</span>
              <span aria-hidden="true">&darr;</span>
            </a>
          </div>

          <!-- Compact Trust Strip -->
          <div class="mt-10 pt-8 border-t border-[#1E3352] grid grid-cols-3 gap-6 max-w-lg">
            <div>
              <div class="text-xl sm:text-2xl font-extrabold text-white">5 Practices</div>
              <div class="text-xs text-[#94A3B8] font-mono-tag mt-0.5">Full-Stack Coverage</div>
            </div>
            <div>
              <div class="text-xl sm:text-2xl font-extrabold text-white">2-Week</div>
              <div class="text-xs text-[#94A3B8] font-mono-tag mt-0.5">Sprint Demos</div>
            </div>
            <div>
              <div class="text-xl sm:text-2xl font-extrabold text-white">100% IP</div>
              <div class="text-xs text-[#94A3B8] font-mono-tag mt-0.5">Client Ownership</div>
            </div>
          </div>
        </div>

        <!-- Right Column: Friendly Quick Service Finder -->
        <div class="lg:col-span-5">
          <div class="bg-[#132238] border border-[#1E3352] rounded-xl p-6 sm:p-7 shadow-xl">
            <div class="flex items-center justify-between gap-3 mb-4">
              <span class="text-xs font-mono-tag font-bold uppercase tracking-wider text-[#38BDF8]">Quick Service Finder</span>
              <span class="text-[11px] font-mono-tag text-[#94A3B8]">Jump to capability</span>
            </div>
            <p class="text-sm text-[#CBD5E1] mb-5">
              What are you looking to build or improve right now? Pick a goal to jump straight to the matching service:
            </p>

            <div class="space-y-2.5">
              <a href="#ai-systems" data-jump-filter="ai" class="service-jump-link flex items-center justify-between gap-3 p-3.5 rounded-lg bg-[#0B1528]/80 border border-[#1E3352] hover:border-[#38BDF8] transition-all group">
                <div class="flex items-center gap-3">
                  <span class="w-8 h-8 rounded-md bg-[#0284C7]/20 text-[#38BDF8] flex items-center justify-center text-xs font-mono-tag font-bold">01</span>
                  <div>
                    <div class="text-sm font-bold text-white group-hover:text-[#38BDF8] transition-colors">Automate workflows with AI</div>
                    <div class="text-xs text-[#94A3B8]">AI agents, chatbots &amp; LLM pipelines</div>
                  </div>
                </div>
                <span class="text-[#94A3B8] group-hover:text-[#38BDF8] group-hover:translate-x-1 transition-all" aria-hidden="true">&rarr;</span>
              </a>

              <a href="#software-saas" data-jump-filter="software" class="service-jump-link flex items-center justify-between gap-3 p-3.5 rounded-lg bg-[#0B1528]/80 border border-[#1E3352] hover:border-[#38BDF8] transition-all group">
                <div class="flex items-center gap-3">
                  <span class="w-8 h-8 rounded-md bg-[#0284C7]/20 text-[#38BDF8] flex items-center justify-center text-xs font-mono-tag font-bold">02</span>
                  <div>
                    <div class="text-sm font-bold text-white group-hover:text-[#38BDF8] transition-colors">Build custom software or SaaS</div>
                    <div class="text-xs text-[#94A3B8]">Web apps, CRM/ERP &amp; e-commerce</div>
                  </div>
                </div>
                <span class="text-[#94A3B8] group-hover:text-[#38BDF8] group-hover:translate-x-1 transition-all" aria-hidden="true">&rarr;</span>
              </a>

              <a href="#cybersecurity" data-jump-filter="security" class="service-jump-link flex items-center justify-between gap-3 p-3.5 rounded-lg bg-[#0B1528]/80 border border-[#1E3352] hover:border-[#38BDF8] transition-all group">
                <div class="flex items-center gap-3">
                  <span class="w-8 h-8 rounded-md bg-[#0284C7]/20 text-[#38BDF8] flex items-center justify-center text-xs font-mono-tag font-bold">03</span>
                  <div>
                    <div class="text-sm font-bold text-white group-hover:text-[#38BDF8] transition-colors">Audit &amp; secure applications</div>
                    <div class="text-xs text-[#94A3B8]">Pen-testing, vulnerability &amp; cloud security</div>
                  </div>
                </div>
                <span class="text-[#94A3B8] group-hover:text-[#38BDF8] group-hover:translate-x-1 transition-all" aria-hidden="true">&rarr;</span>
              </a>

              <a href="#optimization" data-jump-filter="cloud" class="service-jump-link flex items-center justify-between gap-3 p-3.5 rounded-lg bg-[#0B1528]/80 border border-[#1E3352] hover:border-[#38BDF8] transition-all group">
                <div class="flex items-center gap-3">
                  <span class="w-8 h-8 rounded-md bg-[#0284C7]/20 text-[#38BDF8] flex items-center justify-center text-xs font-mono-tag font-bold">04</span>
                  <div>
                    <div class="text-sm font-bold text-white group-hover:text-[#38BDF8] transition-colors">Scale cloud, DevOps &amp; speed</div>
                    <div class="text-xs text-[#94A3B8]">AWS, Docker/K8s, CI/CD &amp; Core Web Vitals</div>
                  </div>
                </div>
                <span class="text-[#94A3B8] group-hover:text-[#38BDF8] group-hover:translate-x-1 transition-all" aria-hidden="true">&rarr;</span>
              </a>

              <a href="#data-bi" data-jump-filter="data" class="service-jump-link flex items-center justify-between gap-3 p-3.5 rounded-lg bg-[#0B1528]/80 border border-[#1E3352] hover:border-[#38BDF8] transition-all group">
                <div class="flex items-center gap-3">
                  <span class="w-8 h-8 rounded-md bg-[#0284C7]/20 text-[#38BDF8] flex items-center justify-center text-xs font-mono-tag font-bold">05</span>
                  <div>
                    <div class="text-sm font-bold text-white group-hover:text-[#38BDF8] transition-colors">Unlock data &amp; BI dashboards</div>
                    <div class="text-xs text-[#94A3B8]">ETL pipelines, analytics &amp; forecasting</div>
                  </div>
                </div>
                <span class="text-[#94A3B8] group-hover:text-[#38BDF8] group-hover:translate-x-1 transition-all" aria-hidden="true">&rarr;</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= INTERACTIVE SERVICE CATALOG ================= -->
  <section id="services" class="py-20 lg:py-24 bg-white border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">

      <!-- Section Header + Filter Pills -->
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 pb-10 mb-12 border-b border-[#E2E8F0] reveal">
        <div class="max-w-2xl">
          <div class="inline-flex items-center gap-2 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px] mb-3">
            <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span>
            <span>CORE SERVICE CATALOG</span>
          </div>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight leading-tight">
            Specialized Engineering Practices
          </h2>
          <p class="text-[#475569] text-base mt-3 leading-relaxed">
            Every engagement includes clear deliverables, transparent sprint milestones, and clean, maintainable code. Filter by practice or explore all five below.
          </p>
        </div>

        <!-- Interactive Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2" role="tablist" aria-label="Filter services by category">
          <button type="button" data-filter="all" aria-selected="true" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#0F172A] text-white transition-all cursor-pointer">
            All (5)
          </button>
          <button type="button" data-filter="ai" aria-selected="false" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0] transition-all cursor-pointer">
            AI &amp; Automation
          </button>
          <button type="button" data-filter="software" aria-selected="false" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0] transition-all cursor-pointer">
            Software &amp; SaaS
          </button>
          <button type="button" data-filter="security" aria-selected="false" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0] transition-all cursor-pointer">
            Cybersecurity
          </button>
          <button type="button" data-filter="cloud" aria-selected="false" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0] transition-all cursor-pointer">
            Cloud &amp; DevOps
          </button>
          <button type="button" data-filter="data" aria-selected="false" class="service-filter-btn px-4 py-2 rounded-full text-xs font-mono-tag font-bold bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0] transition-all cursor-pointer">
            Data &amp; BI
          </button>
        </div>
      </div>

      <!-- Service Cards Grid -->
      <div id="service-catalog-grid" class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Card 01: AI Development & Business Automation -->
        <article id="ai-systems" data-category="ai" class="service-catalog-card bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-7 sm:p-8 flex flex-col justify-between hover-lift reveal">
          <div>
            <div class="flex items-center justify-between gap-4 mb-5">
              <div class="inline-flex items-center gap-2.5">
                <span class="w-10 h-10 rounded-lg bg-[#E0F2FE] text-[#0284C7] flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                </span>
                <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider">01 &bull; AI &amp; Automation</span>
              </div>
              <span class="px-2.5 py-1 rounded-md bg-white border border-[#E2E8F0] text-[11px] font-mono-tag font-semibold text-[#475569]">
                3&ndash;6 Wks Pilot
              </span>
            </div>

            <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
              AI Development &amp; Business Automation
            </h3>
            <p class="text-[#475569] text-sm sm:text-base leading-relaxed mb-6">
              Eliminate repetitive manual work with custom AI agents, RAG knowledge assistants, and automated workflow pipelines integrated directly into your CRM, ERP, or support desk.
            </p>

            <div class="mb-6">
              <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase tracking-wider mb-3">Key Deliverables</div>
              <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm text-[#334155] list-none p-0 m-0">
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Autonomous AI Agent Pipelines</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> RAG Knowledge Chatbots</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Document &amp; Invoice Extraction</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Webhook &amp; API Orchestration</li>
              </ul>
            </div>

            <!-- Friendly Expandable Scope & Outcomes Drawer -->
            <div class="border-t border-[#E2E8F0] pt-4 mb-6">
              <button type="button" class="scope-toggle-btn w-full flex items-center justify-between text-xs font-mono-tag font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors cursor-pointer" aria-expanded="false">
                <span>VIEW SAMPLE USE CASES &amp; OUTCOMES</span>
                <span class="scope-chevron text-base transition-transform duration-200">+</span>
              </button>
              <div class="scope-drawer hidden mt-3 pt-3 border-t border-dashed border-[#CBD5E1] text-xs text-[#475569] space-y-2 leading-relaxed">
                <p><strong class="text-[#0F172A]">Best For:</strong> Operations teams handling high ticket volume, lead qualification, or manual data entry.</p>
                <p><strong class="text-[#0F172A]">Typical Outcome:</strong> 40&ndash;65% reduction in manual triage time with human-in-the-loop approval guardrails.</p>
                <p><strong class="text-[#0F172A]">Stack:</strong> Python, LangGraph, OpenAI/Gemini APIs, PostgreSQL pgvector, n8n.</p>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between gap-4 pt-4 border-t border-[#E2E8F0]">
            <span class="text-xs font-mono-tag text-[#64748B]">Dedicated or Fixed Scope</span>
            <a href="<?php echo $contact_url; ?>?service=ai-automation" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#0284C7] hover:text-[#0369a1] group">
              <span>Scope AI Project</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </article>

        <!-- Card 02: Custom Software & SaaS Development -->
        <article id="software-saas" data-category="software" class="service-catalog-card bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-7 sm:p-8 flex flex-col justify-between hover-lift reveal delay-100">
          <div>
            <div class="flex items-center justify-between gap-4 mb-5">
              <div class="inline-flex items-center gap-2.5">
                <span class="w-10 h-10 rounded-lg bg-[#E0F2FE] text-[#0284C7] flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                  </svg>
                </span>
                <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider">02 &bull; Software &amp; SaaS</span>
              </div>
              <span class="px-2.5 py-1 rounded-md bg-white border border-[#E2E8F0] text-[11px] font-mono-tag font-semibold text-[#475569]">
                6&ndash;12 Wks MVP
              </span>
            </div>

            <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
              Custom Software &amp; SaaS Development
            </h3>
            <p class="text-[#475569] text-sm sm:text-base leading-relaxed mb-6">
              Architect and ship multi-tenant SaaS products, custom internal portals, CRM/ERP systems, and high-converting e-commerce platforms tailored to your exact business logic.
            </p>

            <div class="mb-6">
              <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase tracking-wider mb-3">Key Deliverables</div>
              <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm text-[#334155] list-none p-0 m-0">
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Multi-Tenant SaaS Architecture</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Custom Web &amp; Mobile Apps</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Payment &amp; Subscription Billing</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> REST / GraphQL API Ecosystems</li>
              </ul>
            </div>

            <div class="border-t border-[#E2E8F0] pt-4 mb-6">
              <button type="button" class="scope-toggle-btn w-full flex items-center justify-between text-xs font-mono-tag font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors cursor-pointer" aria-expanded="false">
                <span>VIEW SAMPLE USE CASES &amp; OUTCOMES</span>
                <span class="scope-chevron text-base transition-transform duration-200">+</span>
              </button>
              <div class="scope-drawer hidden mt-3 pt-3 border-t border-dashed border-[#CBD5E1] text-xs text-[#475569] space-y-2 leading-relaxed">
                <p><strong class="text-[#0F172A]">Best For:</strong> Founders launching B2B SaaS MVPs or enterprises replacing brittle legacy spreadsheets.</p>
                <p><strong class="text-[#0F172A]">Typical Outcome:</strong> Production-ready v1 with automated tests, role-based access, and zero vendor lock-in.</p>
                <p><strong class="text-[#0F172A]">Stack:</strong> React, Next.js, Node.js, Python/Django, Flutter, PostgreSQL, WordPress/Shopify.</p>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between gap-4 pt-4 border-t border-[#E2E8F0]">
            <span class="text-xs font-mono-tag text-[#64748B]">Full-Cycle Engineering</span>
            <a href="<?php echo $contact_url; ?>?service=custom-software" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#0284C7] hover:text-[#0369a1] group">
              <span>Scope Software Build</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </article>

        <!-- Card 03: Cybersecurity & Application Security -->
        <article id="cybersecurity" data-category="security" class="service-catalog-card bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-7 sm:p-8 flex flex-col justify-between hover-lift reveal">
          <div>
            <div class="flex items-center justify-between gap-4 mb-5">
              <div class="inline-flex items-center gap-2.5">
                <span class="w-10 h-10 rounded-lg bg-[#FEF3C7] text-[#D97706] flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                  </svg>
                </span>
                <span class="text-xs font-mono-tag font-bold text-[#D97706] uppercase tracking-wider">03 &bull; Cybersecurity</span>
              </div>
              <span class="px-2.5 py-1 rounded-md bg-white border border-[#E2E8F0] text-[11px] font-mono-tag font-semibold text-[#475569]">
                1&ndash;2 Wks Audit
              </span>
            </div>

            <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
              Cybersecurity &amp; Application Security
            </h3>
            <p class="text-[#475569] text-sm sm:text-base leading-relaxed mb-6">
              Identify and remediate vulnerabilities before attackers do. We run thorough penetration tests, OWASP code reviews, and cloud posture hardening for web apps and APIs.
            </p>

            <div class="mb-6">
              <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase tracking-wider mb-3">Key Deliverables</div>
              <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm text-[#334155] list-none p-0 m-0">
                <li class="flex items-start gap-2"><span class="text-[#D97706] font-bold">&check;</span> Web &amp; API Penetration Testing</li>
                <li class="flex items-start gap-2"><span class="text-[#D97706] font-bold">&check;</span> OWASP Top-10 Code Audits</li>
                <li class="flex items-start gap-2"><span class="text-[#D97706] font-bold">&check;</span> Cloud IAM &amp; Network Hardening</li>
                <li class="flex items-start gap-2"><span class="text-[#D97706] font-bold">&check;</span> Prioritized Remediation Report</li>
              </ul>
            </div>

            <div class="border-t border-[#E2E8F0] pt-4 mb-6">
              <button type="button" class="scope-toggle-btn w-full flex items-center justify-between text-xs font-mono-tag font-bold text-[#0F172A] hover:text-[#D97706] transition-colors cursor-pointer" aria-expanded="false">
                <span>VIEW SAMPLE USE CASES &amp; OUTCOMES</span>
                <span class="scope-chevron text-base transition-transform duration-200">+</span>
              </button>
              <div class="scope-drawer hidden mt-3 pt-3 border-t border-dashed border-[#CBD5E1] text-xs text-[#475569] space-y-2 leading-relaxed">
                <p><strong class="text-[#0F172A]">Best For:</strong> FinTech, SaaS, and e-commerce platforms preparing for enterprise security reviews or compliance.</p>
                <p><strong class="text-[#0F172A]">Typical Outcome:</strong> Actionable risk matrix with reproducible PoCs and hands-on patch verification.</p>
                <p><strong class="text-[#0F172A]">Standards:</strong> OWASP ASVS, NIST guidelines, Zero-Trust IAM &amp; SSL/WAF hardening.</p>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between gap-4 pt-4 border-t border-[#E2E8F0]">
            <span class="text-xs font-mono-tag text-[#64748B]">Audit + Patch Support</span>
            <a href="<?php echo $contact_url; ?>?service=cybersecurity" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#D97706] hover:text-[#B45309] group">
              <span>Request Security Audit</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </article>

        <!-- Card 04: Cloud Computing, DevOps & Speed Optimization -->
        <article id="optimization" data-category="cloud" class="service-catalog-card bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-7 sm:p-8 flex flex-col justify-between hover-lift reveal delay-100">
          <div>
            <div class="flex items-center justify-between gap-4 mb-5">
              <div class="inline-flex items-center gap-2.5">
                <span class="w-10 h-10 rounded-lg bg-[#DCFCE7] text-[#15803D] flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                  </svg>
                </span>
                <span class="text-xs font-mono-tag font-bold text-[#15803D] uppercase tracking-wider">04 &bull; Cloud &amp; DevOps</span>
              </div>
              <span class="px-2.5 py-1 rounded-md bg-white border border-[#E2E8F0] text-[11px] font-mono-tag font-semibold text-[#475569]">
                99.9% Uptime SLA
              </span>
            </div>

            <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
              Cloud, DevOps &amp; Performance Engineering
            </h3>
            <p class="text-[#475569] text-sm sm:text-base leading-relaxed mb-6">
              Eliminate downtime and sluggish page loads. We design resilient AWS/cloud infrastructure, zero-downtime CI/CD pipelines, and Core Web Vitals speed optimization for WordPress, Shopify, and custom apps.
            </p>

            <div class="mb-6">
              <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase tracking-wider mb-3">Key Deliverables</div>
              <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm text-[#334155] list-none p-0 m-0">
                <li class="flex items-start gap-2"><span class="text-[#15803D] font-bold">&check;</span> AWS / Cloud Migration &amp; IaC</li>
                <li class="flex items-start gap-2"><span class="text-[#15803D] font-bold">&check;</span> Docker &amp; Kubernetes Orchestration</li>
                <li class="flex items-start gap-2"><span class="text-[#15803D] font-bold">&check;</span> Automated CI/CD Pipelines</li>
                <li class="flex items-start gap-2"><span class="text-[#15803D] font-bold">&check;</span> WordPress / Shopify Speed Tuning</li>
              </ul>
            </div>

            <div class="border-t border-[#E2E8F0] pt-4 mb-6">
              <button type="button" class="scope-toggle-btn w-full flex items-center justify-between text-xs font-mono-tag font-bold text-[#0F172A] hover:text-[#15803D] transition-colors cursor-pointer" aria-expanded="false">
                <span>VIEW SAMPLE USE CASES &amp; OUTCOMES</span>
                <span class="scope-chevron text-base transition-transform duration-200">+</span>
              </button>
              <div class="scope-drawer hidden mt-3 pt-3 border-t border-dashed border-[#CBD5E1] text-xs text-[#475569] space-y-2 leading-relaxed">
                <p><strong class="text-[#0F172A]">Best For:</strong> Growing teams facing slow deployments, high cloud bills, or poor mobile Core Web Vitals.</p>
                <p><strong class="text-[#0F172A]">Typical Outcome:</strong> Sub-second TTFB, 90+ Lighthouse scores, and 25&ndash;40% cloud cost optimization.</p>
                <p><strong class="text-[#0F172A]">Stack:</strong> AWS, Terraform, Docker, Kubernetes, GitHub Actions, Cloudflare, Redis.</p>
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between gap-4 pt-4 border-t border-[#E2E8F0]">
            <span class="text-xs font-mono-tag text-[#64748B]">Infrastructure &amp; Speed</span>
            <a href="<?php echo $contact_url; ?>?service=cloud-devops" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#15803D] hover:text-[#166534] group">
              <span>Optimize Infrastructure</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </article>

        <!-- Card 05: Data Engineering & Business Intelligence (Full-width horizontal card when all shown) -->
        <article id="data-bi" data-category="data" class="service-catalog-card lg:col-span-2 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-7 sm:p-8 hover-lift reveal">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7">
              <div class="flex items-center gap-3 mb-4">
                <span class="w-10 h-10 rounded-lg bg-[#E0F2FE] text-[#0284C7] flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                  </svg>
                </span>
                <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider">05 &bull; Data &amp; Business Intelligence</span>
                <span class="px-2.5 py-1 rounded-md bg-white border border-[#E2E8F0] text-[11px] font-mono-tag font-semibold text-[#475569]">
                  Real-Time BI
                </span>
              </div>

              <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                Data Engineering &amp; Executive BI Dashboards
              </h3>
              <p class="text-[#475569] text-sm sm:text-base leading-relaxed mb-5">
                Unify fragmented databases, ERPs, and ad platforms into clean, reliable data warehouses with real-time executive dashboards and predictive forecasting.
              </p>

              <div class="border-t border-[#E2E8F0] pt-4">
                <button type="button" class="scope-toggle-btn w-full flex items-center justify-between text-xs font-mono-tag font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors cursor-pointer" aria-expanded="false">
                  <span>VIEW SAMPLE USE CASES &amp; OUTCOMES</span>
                  <span class="scope-chevron text-base transition-transform duration-200">+</span>
                </button>
                <div class="scope-drawer hidden mt-3 pt-3 border-t border-dashed border-[#CBD5E1] text-xs text-[#475569] space-y-2 leading-relaxed">
                  <p><strong class="text-[#0F172A]">Best For:</strong> Leadership teams spending days manually stitching Excel reports from multiple branches or tools.</p>
                  <p><strong class="text-[#0F172A]">Typical Outcome:</strong> Automated daily/real-time KPI visibility across revenue, inventory, and customer cohorts.</p>
                </div>
              </div>
            </div>

            <div class="lg:col-span-5 bg-white border border-[#E2E8F0] rounded-lg p-6">
              <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase tracking-wider mb-3">Key Deliverables</div>
              <ul class="space-y-2.5 text-sm text-[#334155] list-none p-0 m-0 mb-6">
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Automated ETL / ELT Data Pipelines</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> PostgreSQL &amp; Warehouse Optimization</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Interactive Executive BI Dashboards</li>
                <li class="flex items-start gap-2"><span class="text-[#0284C7] font-bold">&check;</span> Demand &amp; Revenue Forecasting</li>
              </ul>
              <a href="<?php echo $contact_url; ?>?service=data-bi" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-[6px] bg-[#0F172A] text-white font-bold text-sm hover:bg-[#0284C7] transition-colors">
                <span>Discuss Data Architecture</span>
                <span aria-hidden="true">&rarr;</span>
              </a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ================= ENTERPRISE DOMAIN SOLUTIONS (2x2 MODULAR GRID) ================= -->
  <section id="enterprise-solutions" class="py-20 lg:py-24 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="max-w-2xl mb-12 reveal">
        <div class="inline-flex items-center gap-2 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px] mb-3">
          <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span>
          <span>TURNKEY ENTERPRISE SYSTEMS</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-3">
          Industry-Proven Platform Architectures
        </h2>
        <p class="text-[#475569] text-base leading-relaxed">
          Pre-architected blueprints we customize to your exact workflows &mdash; cutting delivery timelines in half without sacrificing ownership.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Solution 1: Custom Modular ERP -->
        <div id="solutions" class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden flex flex-col hover-lift reveal">
          <div class="relative h-56 bg-slate-900 overflow-hidden">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-meeting.png"
                 alt="ERP Architecture and Strategy Session"
                 loading="lazy"
                 class="w-full h-full object-cover">
            <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-[#0B1528]/90 text-[#38BDF8] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              ENTERPRISE ARCHITECTURE
            </div>
          </div>
          <div class="p-7 flex-1 flex flex-col justify-between">
            <div>
              <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                Custom Modular ERP Systems
              </h3>
              <p class="text-[#475569] text-sm leading-relaxed mb-5">
                Replace fragmented spreadsheets with a unified, modular ERP tailored for procurement, HR records, multi-branch operations, and customer lifecycles.
              </p>
              <ul class="space-y-2 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Multi-Branch Supply Chain &amp; Procurement</li>
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Granular Role-Based Access Control (RBAC)</li>
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> PostgreSQL with Row-Level Locking</li>
              </ul>
            </div>
            <a href="<?php echo $contact_url; ?>?service=custom-erp" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group">
              <span>Request Custom ERP Scope</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>

        <!-- Solution 2: Multi-Warehouse Inventory -->
        <div id="inventory" class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden flex flex-col hover-lift reveal delay-100">
          <div class="relative h-56 bg-slate-900 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                 alt="Automated Inventory Logistics and Distribution"
                 loading="lazy"
                 class="w-full h-full object-cover">
            <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-[#0B1528]/90 text-[#F59E0B] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              LOGISTICS AUTOMATION
            </div>
          </div>
          <div class="p-7 flex-1 flex flex-col justify-between">
            <div>
              <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                Multi-Warehouse Inventory &amp; Barcode Tracking
              </h3>
              <p class="text-[#475569] text-sm leading-relaxed mb-5">
                Real-time stock synchronization across retail outlets, fulfillment depots, and e-commerce storefronts with atomic concurrency that prevents overselling.
              </p>
              <ul class="space-y-2 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
                <li class="flex items-center gap-2"><span class="text-[#D97706]">&check;</span> Automated Barcode &amp; QR SKU Generation</li>
                <li class="flex items-center gap-2"><span class="text-[#D97706]">&check;</span> Low-Stock Forecasting &amp; Auto-Reordering</li>
                <li class="flex items-center gap-2"><span class="text-[#D97706]">&check;</span> Handheld Scanner &amp; Mobile App Sync</li>
              </ul>
            </div>
            <a href="<?php echo $contact_url; ?>?service=inventory" class="text-sm font-bold text-[#D97706] hover:underline inline-flex items-center gap-1 group">
              <span>Consult on Warehouse Automation</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>

        <!-- Solution 3: Corporate Finance -->
        <div id="finance" class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden flex flex-col hover-lift reveal">
          <div class="relative h-56 bg-slate-900 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80"
                 alt="FinTech Analytics and Realtime Reporting"
                 loading="lazy"
                 class="w-full h-full object-cover">
            <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-[#0B1528]/90 text-[#38BDF8] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              FINTECH &amp; BILLING
            </div>
          </div>
          <div class="p-7 flex-1 flex flex-col justify-between">
            <div>
              <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                Corporate Finance &amp; Automated Billing Suite
              </h3>
              <p class="text-[#475569] text-sm leading-relaxed mb-5">
                Streamline voucher approvals, multi-currency invoicing, VAT compliance, and automated payroll with real-time executive balance sheet reporting.
              </p>
              <ul class="space-y-2 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Automated Ledger &amp; Bank Reconciliation</li>
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Multi-Currency Invoicing &amp; VAT Rules</li>
                <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Instant Executive Cashflow Forecasting</li>
              </ul>
            </div>
            <a href="<?php echo $contact_url; ?>?service=finance" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 group">
              <span>Request Financial Suite Demo</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>

        <!-- Solution 4: High-Scale LMS -->
        <div id="lms" class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden flex flex-col hover-lift reveal delay-100">
          <div class="relative h-56 bg-slate-900 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80"
                 alt="EdTech Collaborative LMS Platform"
                 loading="lazy"
                 class="w-full h-full object-cover">
            <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-[#0B1528]/90 text-[#4ADE80] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              EDTECH CONCURRENCY
            </div>
          </div>
          <div class="p-7 flex-1 flex flex-col justify-between">
            <div>
              <h3 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                Learning Management Systems (LMS)
              </h3>
              <p class="text-[#475569] text-sm leading-relaxed mb-5">
                Interactive course delivery, live student assessments, automated certificate generation, and cohort portals engineered for 50,000+ simultaneous learners.
              </p>
              <ul class="space-y-2 text-sm font-semibold text-[#334155] list-none p-0 mb-6">
                <li class="flex items-center gap-2"><span class="text-[#15803D]">&check;</span> High-Concurrency DRM Video Streaming</li>
                <li class="flex items-center gap-2"><span class="text-[#15803D]">&check;</span> Automated Real-Time Quiz Grading Engine</li>
                <li class="flex items-center gap-2"><span class="text-[#15803D]">&check;</span> Cryptographically Verified PDF Certificates</li>
              </ul>
            </div>
            <a href="<?php echo $contact_url; ?>?service=lms" class="text-sm font-bold text-[#15803D] hover:underline inline-flex items-center gap-1 group">
              <span>Consult on LMS Architecture</span>
              <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= ENGAGEMENT MODELS (HOW WE WORK) ================= -->
  <section id="engagement-models" class="py-20 bg-white border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-2xl mx-auto mb-12 reveal">
        <div class="inline-flex items-center gap-2 text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px] mb-3">
          <span>FLEXIBLE COLLABORATION</span>
        </div>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">Choose How You Want to Work With Us</h2>
        <p class="text-sm sm:text-base text-[#475569] mt-2">Whether you need a complete product build or a dedicated engineering squad, we adapt to your workflow.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
        <div class="p-7 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] hover-lift reveal">
          <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-2">Model 01</div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-2">Fixed-Scope Product Build</h3>
          <p class="text-sm text-[#475569] leading-relaxed mb-5">
            Ideal when your requirements are well-defined and you want predictable budget and launch milestones.
          </p>
          <ul class="space-y-2 text-xs font-semibold text-[#334155] list-none p-0">
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Detailed Architecture &amp; Milestone Plan</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Bi-Weekly Live Staging Demos</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> 30-Day Post-Launch Warranty</li>
          </ul>
        </div>

        <div class="p-7 rounded-xl border-2 border-[#0284C7] bg-white shadow-sm hover-lift reveal delay-100">
          <div class="flex items-center justify-between gap-2 mb-2">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase">Model 02</span>
            <span class="px-2.5 py-0.5 rounded-full bg-[#E0F2FE] text-[#0284C7] text-[10px] font-mono-tag font-bold uppercase">Most Popular</span>
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-2">Dedicated Engineering Pod</h3>
          <p class="text-sm text-[#475569] leading-relaxed mb-5">
            Your own cross-functional squad (Full-Stack, AI/DevOps, QA) integrated directly into your Slack, Jira, and GitHub.
          </p>
          <ul class="space-y-2 text-xs font-semibold text-[#334155] list-none p-0">
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Direct Daily Engineer Access</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Flexible Monthly Scaling</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Continuous Feature &amp; Ops Delivery</li>
          </ul>
        </div>

        <div class="p-7 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] hover-lift reveal delay-200">
          <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-2">Model 03</div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-2">Technical Audit &amp; Advisory</h3>
          <p class="text-sm text-[#475569] leading-relaxed mb-5">
            Fast, high-impact 1&ndash;2 week engagements to diagnose performance bottlenecks, security gaps, or cloud costs.
          </p>
          <ul class="space-y-2 text-xs font-semibold text-[#334155] list-none p-0">
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Codebase &amp; Database Deep Dive</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Security &amp; Core Web Vitals Report</li>
            <li class="flex items-center gap-2"><span class="text-[#0284C7]">&check;</span> Actionable Refactoring Roadmap</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TECH STACK MATRIX ================= -->
  <section class="py-16 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-2xl mx-auto mb-10">
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
          <div class="text-xs text-[#64748B] mt-1 font-mono-tag">Microservices &amp; AI</div>
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

  <!-- ================= FRIENDLY SERVICES FAQ ================= -->
  <section id="services-faq" class="py-20 bg-white border-b border-[#E2E8F0]">
    <div class="max-w-3xl mx-auto px-6">
      <div class="text-center mb-12 reveal">
        <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-[2px] mb-2">COMMON QUESTIONS</div>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">Before We Kick Off</h2>
      </div>

      <div class="space-y-4">
        <div class="service-faq-item rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] overflow-hidden">
          <button type="button" class="service-faq-btn w-full px-6 py-5 text-left flex items-center justify-between gap-4 font-bold text-[#0F172A] text-base cursor-pointer" aria-expanded="true">
            <span>How quickly can we start after our discovery call?</span>
            <span class="service-faq-icon text-[#0284C7] font-mono-tag text-lg shrink-0">&minus;</span>
          </button>
          <div class="service-faq-panel px-6 pb-5 text-sm text-[#475569] leading-relaxed">
            For audits and fixed-scope projects, we typically deliver a technical proposal within 48 hours and kick off engineering within 5&ndash;7 business days. Dedicated pods can be assembled in 1&ndash;2 weeks.
          </div>
        </div>

        <div class="service-faq-item rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] overflow-hidden">
          <button type="button" class="service-faq-btn w-full px-6 py-5 text-left flex items-center justify-between gap-4 font-bold text-[#0F172A] text-base cursor-pointer" aria-expanded="false">
            <span>Do we own 100% of the source code and intellectual property?</span>
            <span class="service-faq-icon text-[#0284C7] font-mono-tag text-lg shrink-0">+</span>
          </button>
          <div class="service-faq-panel hidden px-6 pb-5 text-sm text-[#475569] leading-relaxed">
            Yes, always. All repositories, cloud configurations, design assets, and documentation are created under your organization&apos;s ownership with zero proprietary lock-in.
          </div>
        </div>

        <div class="service-faq-item rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] overflow-hidden">
          <button type="button" class="service-faq-btn w-full px-6 py-5 text-left flex items-center justify-between gap-4 font-bold text-[#0F172A] text-base cursor-pointer" aria-expanded="false">
            <span>How do you handle time zones and sprint communication?</span>
            <span class="service-faq-icon text-[#0284C7] font-mono-tag text-lg shrink-0">+</span>
          </button>
          <div class="service-faq-panel hidden px-6 pb-5 text-sm text-[#475569] leading-relaxed">
            We overlap with UK, EU, Middle East, and North American hours for standups and demos, and keep async updates crystal clear in Slack, Linear/Jira, and Loom walkthroughs.
          </div>
        </div>

        <div class="service-faq-item rounded-xl border border-[#E2E8F0] bg-[#F8FAFC] overflow-hidden">
          <button type="button" class="service-faq-btn w-full px-6 py-5 text-left flex items-center justify-between gap-4 font-bold text-[#0F172A] text-base cursor-pointer" aria-expanded="false">
            <span>Can you modernize or rescue an existing codebase?</span>
            <span class="service-faq-icon text-[#0284C7] font-mono-tag text-lg shrink-0">+</span>
          </button>
          <div class="service-faq-panel hidden px-6 pb-5 text-sm text-[#475569] leading-relaxed">
            Yes. We frequently start with a 1-week Technical Audit to stabilize performance, fix security gaps, and refactor bottlenecks before adding new features.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SERVICES CTA ================= -->
  <section class="py-20 bg-[#0B1528] text-white bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#38BDF8] text-xs font-mono-tag font-bold uppercase mb-4">
        READY TO BUILD?
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Have an Enterprise Scope to Discuss?</h2>
      <p class="text-[#94A3B8] text-base max-w-xl mx-auto mb-8">
        Share your goals with our engineering leads and receive a clear architectural roadmap and estimate.
      </p>
      <a href="<?php echo $contact_url; ?>" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all inline-block">
        Schedule Technical Discovery &rarr;
      </a>
    </div>
  </section>

  <!-- ================= SERVICES PAGE INTERACTIVE SCRIPTS ================= -->
  <script>
    (function () {
      // 1. Category Filter Pills
      var filterBtns = document.querySelectorAll('.service-filter-btn');
      var cards = document.querySelectorAll('.service-catalog-card');
      var jumpLinks = document.querySelectorAll('.service-jump-link');

      function applyFilter(filter) {
        filterBtns.forEach(function (btn) {
          var isMatch = btn.getAttribute('data-filter') === filter;
          btn.setAttribute('aria-selected', isMatch ? 'true' : 'false');
          if (isMatch) {
            btn.classList.remove('bg-[#F1F5F9]', 'text-[#475569]', 'hover:bg-[#E2E8F0]');
            btn.classList.add('bg-[#0F172A]', 'text-white');
          } else {
            btn.classList.remove('bg-[#0F172A]', 'text-white');
            btn.classList.add('bg-[#F1F5F9]', 'text-[#475569]', 'hover:bg-[#E2E8F0]');
          }
        });

        cards.forEach(function (card) {
          var cat = card.getAttribute('data-category');
          if (filter === 'all' || cat === filter) {
            card.classList.remove('hidden');
            if (filter !== 'all' && card.classList.contains('lg:col-span-2')) {
              card.setAttribute('data-was-wide', 'true');
            }
          } else {
            card.classList.add('hidden');
          }
        });
      }

      filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          applyFilter(btn.getAttribute('data-filter'));
        });
      });

      // Ensure Quick Finder links reset filter to 'all' so target anchor is always visible
      jumpLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          applyFilter('all');
        });
      });

      // 2. Friendly Expandable Scope & Outcomes Drawers inside Service Cards
      var scopeBtns = document.querySelectorAll('.scope-toggle-btn');
      scopeBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var drawer = btn.nextElementSibling;
          var chevron = btn.querySelector('.scope-chevron');
          var isOpen = btn.getAttribute('aria-expanded') === 'true';

          btn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
          if (drawer) {
            drawer.classList.toggle('hidden', isOpen);
          }
          if (chevron) {
            chevron.textContent = isOpen ? '+' : '−';
          }
        });
      });

      // 3. Friendly Services FAQ Accordion
      var faqBtns = document.querySelectorAll('.service-faq-btn');
      faqBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var panel = btn.nextElementSibling;
          var icon = btn.querySelector('.service-faq-icon');
          var isOpen = btn.getAttribute('aria-expanded') === 'true';

          btn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
          if (panel) {
            panel.classList.toggle('hidden', isOpen);
          }
          if (icon) {
            icon.textContent = isOpen ? '+' : '−';
          }
        });
      });
    })();
  </script>

<?php
endif;
get_footer();
