<?php
/**
 * Template Name: About Us - RajTech BD
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
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-about.php -->' !== trim( $content ) && '<!-- About Us Page with Elementor support -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= 1. ABOUT HERO ================= -->
  <section class="bg-[#F8FAFC] py-16 sm:py-24 border-b border-[#F1F5F9] bg-grid-pattern">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-5 shadow-xs">
          <span class="w-2 h-2 rounded-full bg-[#10B981] pulse-dot"></span>
          ESTABLISHED 2018 • KURIL, VATARA, DHAKA-1229
        </div>
        <h1 class="text-3xl sm:text-5xl lg:text-[52px] font-extrabold text-[#0F172A] tracking-tight leading-[1.14] mb-6">
          Architecting High-Scale Digital Systems for Ambitious Enterprises.
        </h1>
        <p class="text-base sm:text-lg text-[#475569] leading-relaxed mb-8">
          <strong>RajTech BD Limited</strong> is an elite software engineering, enterprise ERP, and AI systems development limited company headquartered in Kuril, Vatara, Dhaka. We specialize in building reliable, custom enterprise platforms that replace cumbersome legacy workflows and eliminate technical debt.
        </p>

        <!-- Quick Metrics Pill Strip -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t border-[#E2E8F0]">
          <div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#0F172A]">8+ Years</div>
            <div class="text-xs text-[#64748B] font-mono-tag uppercase mt-0.5">Est. 2018 in Dhaka</div>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#0284C7]">40+</div>
            <div class="text-xs text-[#64748B] font-mono-tag uppercase mt-0.5">Enterprise Deployments</div>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#F59E0B]">20+</div>
            <div class="text-xs text-[#64748B] font-mono-tag uppercase mt-0.5">Engineers &amp; Interns</div>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#10B981]">99.98%</div>
            <div class="text-xs text-[#64748B] font-mono-tag uppercase mt-0.5">Operational SLA</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. FOUNDER & CEO SHOWCASE ================= -->
  <section class="py-20 sm:py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
        
        <!-- Left: Founder Photo Card -->
        <div class="lg:col-span-5 reveal">
          <div class="rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-xl relative bg-slate-900 group">
            <img src="https://rajtechbd.com/wp-content/uploads/2024/08/faisal.jpg" 
                 alt="Md. Faisal Amir Mostafa - Founder & CEO, RajTech BD Limited" 
                 class="w-full h-[460px] sm:h-[520px] object-cover group-hover:scale-103 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/rajtechbd-team.jpeg' ); ?>';">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/30 to-transparent flex flex-col justify-end p-6 sm:p-8">
              <span class="text-xs font-mono-tag text-[#F59E0B] uppercase font-bold tracking-widest mb-1.5">FOUNDER &amp; CHIEF EXECUTIVE OFFICER</span>
              <h3 class="text-2xl sm:text-3xl font-bold text-white mb-1">Md. Faisal Amir Mostafa</h3>
              <p class="text-xs sm:text-sm text-slate-300 font-mono-tag">Executive Software Architect &amp; Managing Director</p>
            </div>
          </div>
        </div>

        <!-- Right: Executive Vision & Narrative -->
        <div class="lg:col-span-7 flex flex-col items-start reveal delay-100">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-3">EXECUTIVE LEADERSHIP</span>
          <h2 class="text-2xl sm:text-[36px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight mb-5">
            Software Should Never Be a Source of Technical Debt.
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-5">
            Under the executive direction of <strong>Md. Faisal Amir Mostafa</strong>, RajTech BD Limited was founded in 2018 with a singular engineering philosophy: modern organizations deserve software tailored precisely to their operational mechanics, rather than generic software that enforces rigid limitations.
          </p>
          <blockquote class="border-l-4 border-[#F59E0B] pl-5 py-3 my-3 bg-[#F8FAFC] rounded-r text-[#1E293B] italic text-base leading-relaxed">
            "Real digital transformation isn't about slapping generic themes together. It demands atomic accuracy in the database, sub-second latency on every device, and transparent human collaboration between architects and clients from sprint zero."
            <footer class="text-xs font-mono-tag font-bold not-italic text-[#0284C7] mt-2">— Md. Faisal Amir Mostafa, Founder &amp; CEO</footer>
          </blockquote>
          <p class="text-[#475569] text-base leading-relaxed mt-4 mb-6">
            With over a decade of systems architecture mastery, Faisal has led our engineering laboratory in Dhaka to architect mission-critical ERP engines, multi-warehouse automated logistics suites, and high-concurrency headless digital platforms for enterprises across Bangladesh and overseas.
          </p>
          
          <!-- Key Leadership Competencies -->
          <div class="flex flex-wrap gap-2 pt-2">
            <span class="px-3 py-1.5 rounded bg-[#F1F5F9] text-[#0F172A] text-xs font-mono-tag font-semibold">Enterprise Architecture</span>
            <span class="px-3 py-1.5 rounded bg-[#F1F5F9] text-[#0F172A] text-xs font-mono-tag font-semibold">Database Concurrency</span>
            <span class="px-3 py-1.5 rounded bg-[#F1F5F9] text-[#0F172A] text-xs font-mono-tag font-semibold">AI Integration Strategy</span>
            <span class="px-3 py-1.5 rounded bg-[#F1F5F9] text-[#0F172A] text-xs font-mono-tag font-semibold">Agile Engineering Governance</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 3. INDIVIDUAL KEY EMPLOYEE SHOWCASE ================= -->
  <section class="py-20 sm:py-24 bg-[#F8FAFC] border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Heading -->
      <div class="max-w-2xl mb-16 reveal">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">KEY TALENT &amp; LEADERSHIP</span>
        <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight mb-4">
          The Specialists Leading Every Sprint
        </h2>
        <p class="text-sm sm:text-base text-[#475569]">
          Each key employee leads a critical division of our engineering practice—from senior backend infrastructure and AI models to agile project delivery and frontend craft.
        </p>
      </div>

      <!-- Team Members Grid (Responsive across mobile, tablet, and desktop) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- 1. Senior Software Engineer: Md. Araful Karim -->
        <article class="bg-white rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm hover-lift flex flex-col reveal">
          <div class="h-72 sm:h-80 w-full overflow-hidden bg-slate-900 relative group">
            <img src="https://rajtechbd.com/wp-content/uploads/2024/09/IMG_20240920_090946-Copy-1.jpg" 
                 alt="Md. Araful Karim - Senior Software Engineer at RajTech BD Limited" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/avatar-default.svg' ); ?>';">
            <div class="absolute top-3 right-3 bg-[#0B1528]/85 backdrop-blur-sm text-white px-3 py-1 rounded text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              Core Lead
            </div>
          </div>
          <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
            <div>
              <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">ENGINEERING LEADERSHIP</span>
              <h3 class="text-xl font-bold text-[#0F172A] mb-1">Md. Araful Karim</h3>
              <p class="text-sm font-semibold text-[#F59E0B] font-mono-tag mb-4">Senior Software Engineer</p>
              <p class="text-sm text-[#475569] leading-relaxed mb-5">
                Principal systems engineer specializing in high-throughput enterprise backends, distributed PostgreSQL database architectures, row-level locking, and microservices orchestration with Docker and Kubernetes.
              </p>
            </div>
            <div class="pt-4 border-t border-[#F1F5F9] flex flex-wrap gap-1.5">
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">PostgreSQL</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">FastAPI / Node</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Docker &amp; K8s</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">System Design</span>
            </div>
          </div>
        </article>

        <!-- 2. Software Engineer L2: Shamiul Shakib -->
        <article class="bg-white rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm hover-lift flex flex-col reveal delay-100">
          <div class="h-72 sm:h-80 w-full overflow-hidden bg-slate-900 relative group">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Professional-Indian-Headshot1.png" 
                 alt="Shamiul Shakib - Software Engineer L2 at RajTech BD Limited" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/avatar-default.svg' ); ?>';">
            <div class="absolute top-3 right-3 bg-[#0B1528]/85 backdrop-blur-sm text-[#38BDF8] px-3 py-1 rounded text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              Level 2
            </div>
          </div>
          <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
            <div>
              <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">FULL-STACK SYSTEMS</span>
              <h3 class="text-xl font-bold text-[#0F172A] mb-1">Shamiul Shakib</h3>
              <p class="text-sm font-semibold text-[#0284C7] font-mono-tag mb-4">Software Engineer L2</p>
              <p class="text-sm text-[#475569] leading-relaxed mb-5">
                Full-stack software engineer delivering robust web architectures, scalable RESTful &amp; GraphQL APIs, real-time WebSocket communication, and responsive modern applications with Next.js, React, and Python backends.
              </p>
            </div>
            <div class="pt-4 border-t border-[#F1F5F9] flex flex-wrap gap-1.5">
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Next.js &amp; React</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Python Backends</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">GraphQL / REST</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Full-Stack CI/CD</span>
            </div>
          </div>
        </article>

        <!-- 3. HR & Project Manager: Md. Showkot Hossain -->
        <article class="bg-white rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm hover-lift flex flex-col reveal delay-200">
          <div class="h-72 sm:h-80 w-full overflow-hidden bg-slate-900 relative group">
            <img src="https://rajtechbd.com/wp-content/uploads/2024/08/araf.jpg" 
                 alt="Md. Showkot Hossain - HR & Project Manager at RajTech BD Limited" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/avatar-default.svg' ); ?>';">
            <div class="absolute top-3 right-3 bg-[#0B1528]/85 backdrop-blur-sm text-[#10B981] px-3 py-1 rounded text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              Management
            </div>
          </div>
          <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
            <div>
              <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">OPERATIONS &amp; PEOPLE</span>
              <h3 class="text-xl font-bold text-[#0F172A] mb-1">Md. Showkot Hossain</h3>
              <p class="text-sm font-semibold text-[#10B981] font-mono-tag mb-4">HR &amp; Project Manager</p>
              <p class="text-sm text-[#475569] leading-relaxed mb-5">
                Agile scrum leader and human operations facilitator. Manages bi-weekly client sprint reviews, team velocity metrics, developer resource allocation, and continuous enterprise SLA adherence across all projects.
              </p>
            </div>
            <div class="pt-4 border-t border-[#F1F5F9] flex flex-wrap gap-1.5">
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Agile / Scrum</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">SLA Management</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Sprint Planning</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">People Ops</span>
            </div>
          </div>
        </article>

        <!-- 4. UI Specialist & Frontend Developer: Somnath Sikder -->
        <article class="bg-white rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm hover-lift flex flex-col reveal">
          <div class="h-72 sm:h-80 w-full overflow-hidden bg-slate-900 relative group">
            <img src="https://rajtechbd.com/wp-content/uploads/2025/01/Somnath-sikder.jpg" 
                 alt="Somnath Sikder - UI Specialist & Frontend Developer at RajTech BD Limited" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/avatar-somnath.svg' ); ?>';">
            <div class="absolute top-3 right-3 bg-[#0B1528]/85 backdrop-blur-sm text-[#A78BFA] px-3 py-1 rounded text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              UI / UX
            </div>
          </div>
          <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
            <div>
              <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">DESIGN &amp; INTERFACES</span>
              <h3 class="text-xl font-bold text-[#0F172A] mb-1">Somnath Sikder</h3>
              <p class="text-sm font-semibold text-[#8B5CF6] font-mono-tag mb-4">UI Specialist &amp; Frontend Developer</p>
              <p class="text-sm text-[#475569] leading-relaxed mb-5">
                Front-end craftsperson and design system architect. Translates complex enterprise workflows into intuitive, responsive UI components with clean Tailwind CSS, React, and strict Core Web Vitals optimization.
              </p>
            </div>
            <div class="pt-4 border-t border-[#F1F5F9] flex flex-wrap gap-1.5">
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Tailwind CSS</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">UI / UX Design</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Core Web Vitals</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Responsive Web</span>
            </div>
          </div>
        </article>

        <!-- 5. Data Science & AI Engineer: Inaya Binta Maysaa -->
        <article class="bg-white rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm hover-lift flex flex-col reveal delay-100">
          <div class="h-72 sm:h-80 w-full overflow-hidden bg-slate-900 relative group">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/image.jpg" 
                 alt="Inaya Binta Maysaa - Data Science & AI Engineer at RajTech BD Limited" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 style="object-position: top center;"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/avatar-default.svg' ); ?>';">
            <div class="absolute top-3 right-3 bg-[#0B1528]/85 backdrop-blur-sm text-[#F59E0B] px-3 py-1 rounded text-[11px] font-mono-tag font-bold uppercase tracking-wider">
              AI &amp; Data
            </div>
          </div>
          <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
            <div>
              <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">ARTIFICIAL INTELLIGENCE</span>
              <h3 class="text-xl font-bold text-[#0F172A] mb-1">Inaya Binta Maysaa</h3>
              <p class="text-sm font-semibold text-[#F59E0B] font-mono-tag mb-4">Data Science &amp; AI Engineer</p>
              <p class="text-sm text-[#475569] leading-relaxed mb-5">
                Machine learning researcher and data specialist architecting autonomous agent workflows, retrieval-augmented generation (RAG) knowledge pipelines, computer vision systems, and predictive demand analytics.
              </p>
            </div>
            <div class="pt-4 border-t border-[#F1F5F9] flex flex-wrap gap-1.5">
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">PyTorch &amp; Python</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">LLM &amp; RAG Systems</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Data Pipelines</span>
              <span class="px-2.5 py-1 rounded bg-[#F8FAFC] border border-[#E2E8F0] text-[11px] font-mono-tag text-[#334155]">Predictive Models</span>
            </div>
          </div>
        </article>

        <!-- 6. Company Summary Card / Culture Spotlight -->
        <article class="bg-[#0B1528] text-white rounded-xl overflow-hidden border border-[#1E3352] shadow-sm hover-lift flex flex-col justify-between p-7 reveal delay-200">
          <div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#38BDF8] text-xs font-mono-tag font-bold uppercase mb-4">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span>
              ENGINEERING INTEGRITY
            </div>
            <h3 class="text-2xl font-bold text-white mb-3">Old-Fashioned Discipline Meets Modern AI</h3>
            <p class="text-sm text-[#94A3B8] leading-relaxed mb-6">
              Our key engineers combine strict architectural rigor with cutting-edge tools. Every commit undergoes automated linting, security scanning, and senior code review before touching client production environments.
            </p>
          </div>
          <div class="pt-4 border-t border-[#1E3352] flex items-center justify-between text-xs text-[#64748B] font-mono-tag">
            <span>DIRECT SLACK ACCESS</span>
            <span class="text-emerald-400 font-bold">100% TRANSPARENT</span>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ================= 4. THE 20+ ENGINEER LEVEL ONE & INTERN TEAM SQUAD ================= -->
  <section class="py-20 sm:py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Banner with Real Team Visual -->
      <div class="rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-lg mb-12 bg-slate-900 relative h-[420px] sm:h-[500px] reveal">
        <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Gemini_Generated_Image_qvam3mqvam3mqvam12-1.jpeg" 
             alt="RajTech BD Limited Core Engineering Team, Engineer Level One, and Interns" 
             class="w-full h-full object-cover"
             style="object-position: center 10%;"
             onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/rajtechbd-team.jpeg' ); ?>';">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/40 to-transparent flex flex-col justify-end p-6 sm:p-10">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#F59E0B] text-[#0F172A] text-xs font-mono-tag font-bold tracking-wider uppercase mb-3 w-fit">
            POWERHOUSE SPRINT SQUAD • 20+ TALENTED ENGINEERS &amp; INTERNS
          </div>
          <h3 class="text-2xl sm:text-4xl font-extrabold text-white mb-2">
            The Engine Behind Fast, Zero-Defect Delivery.
          </h3>
          <p class="text-slate-300 text-sm sm:text-base max-w-3xl leading-relaxed">
            In addition to our core leadership, RajTech BD Limited proudly operates a structured <strong>20+ member workforce</strong> comprising our <strong>Engineer Level 1 (Associate Engineers)</strong> and <strong>Engineering Intern Group</strong>. Together, they guarantee rapid feature turnaround, rigorous automated regression testing, and 24/7 SLA responsiveness.
          </p>
        </div>
      </div>

      <!-- Two-Column Breakdown of Tier 2 & Tier 3 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 reveal">
        
        <!-- Tier 2: Engineer Level 1 Group -->
        <div class="p-8 rounded-xl border border-[#BAE6FD] bg-[#F0F9FF]">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider">TIER 02 / SPRINT ENGINEERS</span>
            <span class="px-2.5 py-0.5 rounded-full bg-[#0284C7] text-white text-[11px] font-mono-tag font-bold">10+ Full-Stack Devs</span>
          </div>
          <h4 class="text-xl font-bold text-[#0F172A] mb-2">Engineer Level 1 Team (Associate Full-Stack Engineers)</h4>
          <p class="text-sm text-[#475569] leading-relaxed mb-4">
            Our Associate Engineers handle day-to-day sprint tickets, write tested REST and GraphQL endpoints, craft responsive UI views, and maintain automated CI/CD build scripts. They work under direct daily mentorship of our senior architects.
          </p>
          <ul class="space-y-2 text-xs text-[#334155] font-medium list-none p-0 m-0">
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> Bi-weekly agile sprint commitments &amp; code reviews</li>
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> Modular feature engineering across React, Node, and Python</li>
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> Responsive mobile app modules with Flutter</li>
          </ul>
        </div>

        <!-- Tier 3: Engineering Intern Group -->
        <div class="p-8 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-mono-tag font-bold text-[#10B981] uppercase tracking-wider">TIER 03 / QA &amp; APPRENTICESHIP</span>
            <span class="px-2.5 py-0.5 rounded-full bg-[#10B981] text-white text-[11px] font-mono-tag font-bold">10+ Interns &amp; QA</span>
          </div>
          <h4 class="text-xl font-bold text-[#0F172A] mb-2">Engineering Intern Group (Talent Pipeline)</h4>
          <p class="text-sm text-[#475569] leading-relaxed mb-4">
            Hand-selected top graduates and apprentices from prestigious Bangladeshi engineering universities (BUET, DU, IUT, etc.). They focus on automated end-to-end regression testing, unit testing suites, dataset curation for AI models, and performance benchmarks.
          </p>
          <ul class="space-y-2 text-xs text-[#334155] font-medium list-none p-0 m-0">
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> Automated Playwright &amp; Cypress regression tests</li>
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> AI model prompt evaluation &amp; dataset curation</li>
            <li class="flex items-center gap-2"><strong class="text-emerald-600">✓</strong> Continuous mentorship &amp; professional code standards</li>
          </ul>
        </div>

      </div>

    </div>
  </section>

  <!-- ================= 5. CORE ENGINEERING VALUES ================= -->
  <section class="py-20 sm:py-24 bg-[#0B1528] text-white bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-16 reveal">
        <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-[2px] uppercase block mb-3">DISCIPLINE &amp; EXCELLENCE</span>
        <h2 class="text-3xl sm:text-[38px] font-bold tracking-tight">The Principles That Guide Us</h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-[#132238] p-7 rounded-lg border border-[#1E3352] dark-card-hover reveal">
          <div class="text-[#38BDF8] text-2xl font-mono-tag font-bold mb-3">01</div>
          <h3 class="text-lg font-bold text-white mb-2">Zero-Bloat Architecture</h3>
          <p class="text-sm text-[#94A3B8] leading-relaxed">
            Every line of code serves a measurable purpose. We eliminate third-party plugin bloat, excessive JS payloads, and optimize server response times to under 200ms.
          </p>
        </div>

        <div class="bg-[#132238] p-7 rounded-lg border border-[#1E3352] dark-card-hover reveal delay-100">
          <div class="text-[#F59E0B] text-2xl font-mono-tag font-bold mb-3">02</div>
          <h3 class="text-lg font-bold text-white mb-2">Atomic Concurrency</h3>
          <p class="text-sm text-[#94A3B8] leading-relaxed">
            Our ERP and inventory engines prevent race conditions, stock discrepancies, and duplicate transactions through robust database locking and isolation.
          </p>
        </div>

        <div class="bg-[#132238] p-7 rounded-lg border border-[#1E3352] dark-card-hover reveal delay-200">
          <div class="text-[#10B981] text-2xl font-mono-tag font-bold mb-3">03</div>
          <h3 class="text-lg font-bold text-white mb-2">Direct Slack Access</h3>
          <p class="text-sm text-[#94A3B8] leading-relaxed">
            No convoluted account manager games. You collaborate directly in real-time Slack channels with the senior architects writing your codebase.
          </p>
        </div>

        <div class="bg-[#132238] p-7 rounded-lg border border-[#1E3352] dark-card-hover reveal delay-300">
          <div class="text-[#A78BFA] text-2xl font-mono-tag font-bold mb-3">04</div>
          <h3 class="text-lg font-bold text-white mb-2">Revenue-First SEO</h3>
          <p class="text-sm text-[#94A3B8] leading-relaxed">
            We don't optimize for vanity impressions. We engineer technical SEO architectures and sales qualification funnels that generate high-value client acquisitions.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 6. HEADQUARTERS & INFRASTRUCTURE ================= -->
  <section class="py-20 sm:py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="reveal">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-3">CORPORATE HEADQUARTERS</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-tight mb-5">
            Kuril Technology Hub
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-4">
            Located in Kuril, Vatara, Dhaka-1229, our engineering facility is equipped with redundant high-speed fiber internet, generator backup power, private cloud servers, and collaborative war rooms designed for continuous sprint delivery.
          </p>
          <p class="text-sm text-[#64748B] mb-6">
            <strong class="text-[#0F172A]">Registered Corporate Address:</strong> House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.
          </p>

          <div class="grid grid-cols-2 gap-4 pt-4 border-t border-[#F1F5F9]">
            <div>
              <div class="text-2xl font-bold text-[#0F172A]">Dhaka, BD</div>
              <div class="text-xs text-[#64748B] font-mono-tag uppercase">Kuril, Vatara, Dhaka-1229</div>
            </div>
            <div>
              <div class="text-2xl font-bold text-[#0F172A]">24/7 / 365</div>
              <div class="text-xs text-[#64748B] font-mono-tag uppercase">Dedicated SLA Coverage</div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 reveal delay-100">
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-52">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-hub.jpeg" 
                 alt="RajTech BD Modern Innovation Hub in Dhaka" 
                 class="w-full h-full object-cover">
          </div>
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-52">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-meeting.png" 
                 alt="Executive Strategy & Architecture Meeting" 
                 class="w-full h-full object-cover">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 7. ABOUT CTA ================= -->
  <section class="py-20 bg-[#F8FAFC]">
    <div class="max-w-[1280px] mx-auto px-6 text-center reveal">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] mb-4">Want to Build Something Exceptional With Us?</h2>
      <p class="text-[#475569] text-base max-w-xl mx-auto mb-8">Schedule an executive discovery session with our senior architects in Kuril, Vatara, Dhaka.</p>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo $contact_url; ?>" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all inline-block">
          Book Technical Consultation
        </a>
        <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="px-6 py-4 rounded-[6px] bg-white border border-[#CBD5E1] text-[#0F172A] font-bold text-base hover:border-[#10B981] hover:text-[#15803D] transition-colors inline-flex items-center gap-2">
          Chat on WhatsApp
        </a>
      </div>
    </div>
  </section>

<?php
endif;
get_footer();
