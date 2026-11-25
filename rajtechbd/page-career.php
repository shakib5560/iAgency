<?php
/**
 * Template Name: Career - RajTech BD Limited
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );

// Handle Career Application Form Submission
$application_sent = false;
$application_error = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['rajtechbd_career_submit'] ) ) {
    if ( ! isset( $_POST['rajtechbd_career_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_career_nonce'] ) ), 'rajtechbd_career_action' ) ) {
        $application_error = 'Security verification failed. Please refresh the page and try again.';
    } else {
        $full_name    = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
        $email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
        $phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
        $experience   = isset( $_POST['experience'] ) ? sanitize_text_field( wp_unslash( $_POST['experience'] ) ) : '';
        $position     = isset( $_POST['position'] ) ? sanitize_text_field( wp_unslash( $_POST['position'] ) ) : 'General Application';
        $resume_link  = isset( $_POST['resume_link'] ) ? esc_url_raw( wp_unslash( $_POST['resume_link'] ) ) : '';
        $cover_letter = isset( $_POST['cover_letter'] ) ? sanitize_textarea_field( wp_unslash( $_POST['cover_letter'] ) ) : '';

        if ( empty( $full_name ) || empty( $email ) || empty( $phone ) || empty( $experience ) || empty( $resume_link ) || empty( $cover_letter ) ) {
            $application_error = 'Please fill out all required fields including your contact information, experience, Google Drive resume link, and cover letter.';
        } elseif ( ! filter_var( $resume_link, FILTER_VALIDATE_URL ) ) {
            $application_error = 'Please provide a valid URL for your Google Drive resume link.';
        } else {
            $saved_id = rajtechbd_save_career_application( array(
                'full_name'    => $full_name,
                'email'        => $email,
                'phone'        => $phone,
                'experience'   => $experience,
                'position'     => $position,
                'resume_link'  => $resume_link,
                'cover_letter' => $cover_letter,
            ) );

            if ( is_wp_error( $saved_id ) ) {
                $application_error = 'There was an error saving your application. Please try again.';
            } else {
                $application_sent = true;
            }
        }
    }
}

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

  <!-- Optional Gutenberg Content if entered in block editor -->
  <?php
  if ( have_posts() ) {
      while ( have_posts() ) {
          the_post();
          $content = get_the_content();
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-career.php -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= HERO SECTION ================= -->
  <section class="relative bg-white pt-20 pb-24 border-b border-[#E2E8F0] overflow-hidden career-hero-section">

    <!-- Layered white texture: subtle dot matrix + soft radial vignette -->
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
      <!-- Dot-matrix texture -->
      <div class="absolute inset-0 career-dot-texture"></div>
      <!-- Soft top-center radial tint (very faint sky-blue warmth) -->
      <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-gradient-to-b from-[#EFF6FF]/70 to-transparent"></div>
      <!-- Decorative thin rule lines (architectural feel) -->
      <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#CBD5E1]/60 to-transparent"></div>
      <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#CBD5E1]/60 to-transparent"></div>
      <!-- Corner accent: top-right -->
      <div class="hidden lg:block absolute top-16 right-16 w-32 h-32 rounded-full border border-[#E2E8F0]"></div>
      <div class="hidden lg:block absolute top-24 right-24 w-16 h-16 rounded-full border border-[#EFF6FF]"></div>
      <!-- Corner accent: bottom-left -->
      <div class="hidden lg:block absolute bottom-12 left-12 w-24 h-24 rounded-full border border-[#F1F5F9]"></div>
    </div>

    <div class="relative max-w-[1280px] mx-auto px-6 text-center">

      <!-- Breadcrumb Navigation -->
      <nav class="flex items-center justify-center gap-2 text-xs font-mono-tag text-[#94A3B8] mb-7" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0284C7] transition-colors">Home</a>
        <span class="text-[#CBD5E1]">/</span>
        <span class="text-[#0284C7] font-semibold">Careers</span>
      </nav>

      <!-- Hiring Status Badge -->
      <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white border border-[#E2E8F0] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-6 shadow-sm">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#10B981] opacity-60"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-[#10B981]"></span>
        </span>
        WE ARE HIRING &bull; RAJTECH BD TALENT PORTAL
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-5xl lg:text-[3.75rem] font-extrabold tracking-tight text-[#0F172A] max-w-4xl mx-auto leading-[1.1] mb-6">
        Build High-Impact Digital Systems<br class="hidden sm:block">
        With <span class="text-[#0284C7]">RajTech BD</span> <span class="text-[#0F172A]">Limited</span>
      </h1>

      <!-- Subheadline -->
      <p class="text-base sm:text-lg text-[#64748B] max-w-2xl mx-auto leading-relaxed mb-10 font-normal">
        We are an elite software engineering and enterprise digital agency in Dhaka, Bangladesh. Join a culture built on craftsman-level discipline, zero technical debt, and modern AI acceleration.
      </p>

      <!-- CTA Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-3">
        <a href="#currentopenpositions" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-[#0284C7] hover:bg-[#0369a1] text-white font-bold text-sm tracking-wide shadow-sm shadow-sky-200 transition-all hover:-translate-y-0.5">
          <span>Explore Open Positions</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </a>
        <a href="#interview-process" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-white hover:bg-[#F8FAFC] text-[#334155] hover:text-[#0284C7] font-semibold text-sm border border-[#E2E8F0] hover:border-[#0284C7] transition-all">
          <span>Interview Process</span>
        </a>
        <a href="#why-join-us" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-white hover:bg-[#F8FAFC] text-[#334155] hover:text-[#0284C7] font-semibold text-sm border border-[#E2E8F0] hover:border-[#0284C7] transition-all">
          <span>Why Work With Us</span>
        </a>
      </div>

      <!-- Thin divider rule -->
      <div class="mt-14 mb-12 w-16 h-px bg-[#CBD5E1] mx-auto"></div>

      <!-- Quick Trust Indicators — clean white cards with left accent -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
        <div class="p-5 rounded-xl bg-white border border-[#E2E8F0] shadow-sm career-stat-card">
          <div class="text-2xl font-extrabold font-mono-tag text-[#0F172A] leading-none">8+ Years</div>
          <div class="text-xs text-[#64748B] mt-2 leading-relaxed">Established 2018 in Dhaka</div>
        </div>
        <div class="p-5 rounded-xl bg-white border border-[#E2E8F0] shadow-sm career-stat-card">
          <div class="text-2xl font-extrabold font-mono-tag text-[#0284C7] leading-none">&lt; 200ms</div>
          <div class="text-xs text-[#64748B] mt-2 leading-relaxed">High-Performance Standard</div>
        </div>
        <div class="p-5 rounded-xl bg-white border border-[#E2E8F0] shadow-sm career-stat-card">
          <div class="text-2xl font-extrabold font-mono-tag text-[#059669] leading-none">Bi-Annual</div>
          <div class="text-xs text-[#64748B] mt-2 leading-relaxed">Performance Appraisals</div>
        </div>
        <div class="p-5 rounded-xl bg-white border border-[#E2E8F0] shadow-sm career-stat-card">
          <div class="text-2xl font-extrabold font-mono-tag text-[#D97706] leading-none">Hybrid</div>
          <div class="text-xs text-[#64748B] mt-2 leading-relaxed">Flexible Office &amp; Remote</div>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= WHY JOIN US SECTION ================= -->
  <section id="why-join-us" class="py-20 bg-white border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          CULTURE &amp; ENGINEERING STANDARDS
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-4">
          Why Builders Choose RajTech BD
        </h2>
        <p class="text-base text-[#64748B]">
          We believe high-agency engineers flourish in environments free from corporate red tape, outdated paradigms, and bloated tech stacks.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#BAE6FD] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-xl bg-sky-100 text-[#0284C7] flex items-center justify-center font-bold text-xl mb-6">
            ⚡
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Pure Craftsmanship &amp; Modern Stack</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Work with Laravel, modern PHP 8+, decoupled WordPress architectures, Next.js, Tailwind CSS, Flutter, and deterministic AI agents. Zero legacy bloat.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#BAE6FD] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-xl bg-emerald-100 text-[#10B981] flex items-center justify-center font-bold text-xl mb-6">
            📈
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Transparent Growth &amp; Rewards</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Market-leading compensation, bi-annual merit salary reviews, festival bonuses, festival leaves, performance incentives, and direct mentorship from principal architects.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="p-8 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#BAE6FD] hover:shadow-lg transition-all duration-300">
          <div class="w-12 h-12 rounded-xl bg-amber-100 text-[#F59E0B] flex items-center justify-center font-bold text-xl mb-6">
            🤝
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Autonomy &amp; Ownership</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Take full ownership of your systems from scoping to production deployment. We value deliverables, code quality, and speed over hours logged at a desk.
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= INTERVIEW & HIRING PROCESS SECTION ================= -->
  <section id="interview-process" class="py-20 bg-[#F8FAFC] border-b border-[#E2E8F0] scroll-mt-24">
    <div class="max-w-[1280px] mx-auto px-6">

      <div class="text-center max-w-3xl mx-auto mb-14">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          HIRING &amp; INTERVIEW PROCESS
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-4">
          Our 3-Stage Interview Process
        </h2>
        <p class="text-base text-[#64748B]">
          We keep our evaluation transparent, practical, and respectful of your time — from your first Microsoft Teams conversation to meeting our founding leadership at our Dhaka headquarters.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Stage 01: Online Interview (Microsoft Teams) -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-8 hover:border-[#0284C7] hover:shadow-lg transition-all flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-[#0284C7] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
                Stage 01 &bull; Online
              </span>
              <span class="text-3xl font-extrabold font-mono-tag text-[#E2E8F0]">01</span>
            </div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">
              Online Interview with Microsoft Teams
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed mb-6">
              An interactive video interview conducted on <strong>Microsoft Teams</strong>. We discuss your engineering background, past projects, communication clarity, and role alignment from the comfort of your home.
            </p>
          </div>
          <div class="pt-4 border-t border-[#F1F5F9] flex items-center justify-between text-xs font-mono-tag text-[#0284C7] font-semibold">
            <span>Platform: Microsoft Teams</span>
            <span>Remote Video</span>
          </div>
        </div>

        <!-- Stage 02: Onsite Interview (Technical Core Session & Mini Task) -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-8 hover:border-[#10B981] hover:shadow-lg transition-all flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-[#10B981] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
                Stage 02 &bull; Onsite
              </span>
              <span class="text-3xl font-extrabold font-mono-tag text-[#E2E8F0]">02</span>
            </div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">
              Onsite Technical Core Session &amp; Mini Task
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed mb-6">
              Visit our Dhaka office for an in-person <strong>technical core session</strong> with our senior engineers, paired with a focused, real-world <strong>mini task</strong> to evaluate problem-solving and code craftsmanship.
            </p>
          </div>
          <div class="pt-4 border-t border-[#F1F5F9] flex items-center justify-between text-xs font-mono-tag text-[#10B981] font-semibold">
            <span>Core Session + Mini Task</span>
            <span>In-Person</span>
          </div>
        </div>

        <!-- Stage 03: CEO Interview with Founding Member -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-8 hover:border-[#F59E0B] hover:shadow-lg transition-all flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="px-3 py-1 rounded-full bg-amber-50 border border-amber-200 text-[#D97706] text-[11px] font-mono-tag font-bold uppercase tracking-wider">
                Stage 03 &bull; Executive
              </span>
              <span class="text-3xl font-extrabold font-mono-tag text-[#E2E8F0]">03</span>
            </div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">
              CEO Interview with Founding Member
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed mb-6">
              The final conversation directly with our <strong>CEO &amp; company founding member</strong>. We align on long-term engineering vision, ownership culture, career trajectory, and final offer details.
            </p>
          </div>
          <div class="pt-4 border-t border-[#F1F5F9] flex items-center justify-between text-xs font-mono-tag text-[#D97706] font-semibold">
            <span>With Founding Member</span>
            <span>Final Round</span>
          </div>
        </div>
      </div>

      <!-- Company Location & Direct Target Link Bar -->
      <div class="mt-10 bg-[#0B1528] text-white rounded-2xl p-7 sm:p-8 border border-[#1E3352] flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div class="flex items-start gap-4">
          <div class="w-11 h-11 rounded-xl bg-[#132238] border border-[#1E3352] flex items-center justify-center text-[#38BDF8] shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
          </div>
          <div>
            <div class="text-[11px] font-mono-tag font-bold text-[#38BDF8] uppercase tracking-wider mb-1">
              COMPANY LOCATION &bull; ONSITE INTERVIEW VENUE
            </div>
            <h4 class="text-lg font-bold text-white">
              RajTech BD Limited &mdash; House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh
            </h4>
            <p class="text-xs text-[#94A3B8] mt-1">
              All onsite technical core sessions and executive interviews are hosted at our Kuril, Dhaka corporate headquarters.
            </p>
          </div>
        </div>
        <div class="shrink-0">
          <a href="#currentopenpositions" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-[#0284C7] hover:bg-[#0369a1] text-white font-bold text-sm transition-all">
            <span>View Open Positions</span>
            <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= OPEN POSITIONS ACCORDION ================= -->
  <section id="currentopenpositions" class="py-20 bg-white border-b border-[#E2E8F0] scroll-mt-24">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
            FEATURED VACANCIES
          </span>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">
            Current Open Positions
          </h2>
        </div>
        <p class="text-sm text-[#64748B] max-w-md">
          Don't see your exact role listed? Choose "General Application" in the form below. We always hire exceptional talent.
        </p>
      </div>

      <?php
      $job_openings = function_exists( 'rajtechbd_get_job_openings' ) ? rajtechbd_get_job_openings() : array();
      $badge_styles = array(
          'sky'     => 'bg-sky-50 text-[#0284C7] border-sky-200',
          'emerald' => 'bg-emerald-50 text-[#10B981] border-emerald-200',
          'purple'  => 'bg-purple-50 text-purple-700 border-purple-200',
          'amber'   => 'bg-amber-50 text-amber-700 border-amber-200',
      );
      ?>
      <div class="space-y-4">
        <?php if ( ! empty( $job_openings ) ) : ?>
          <?php foreach ( $job_openings as $job ) :
            $color_key   = isset( $job['badge_color'] ) ? $job['badge_color'] : 'sky';
            $badge_class = isset( $badge_styles[ $color_key ] ) ? $badge_styles[ $color_key ] : $badge_styles['sky'];
          ?>
            <div class="bg-white border border-[#E2E8F0] rounded-xl p-6 hover:border-[#0284C7] transition-all flex flex-col md:flex-row md:items-center justify-between gap-6 shadow-xs">
              <div>
                <div class="flex flex-wrap items-center gap-3 mb-2">
                  <h3 class="text-lg font-bold text-[#0F172A]"><?php echo esc_html( $job['title'] ); ?></h3>
                  <span class="px-2.5 py-0.5 rounded text-[11px] font-mono-tag font-bold border <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $job['type'] ); ?></span>
                </div>
                <p class="text-xs text-[#64748B]">
                  Experience: <?php echo esc_html( $job['experience'] ); ?> &bull; Location: <?php echo esc_html( $job['location'] ); ?><?php if ( ! empty( $job['tech'] ) ) : ?> &bull; Tech: <?php echo esc_html( $job['tech'] ); ?><?php endif; ?>
                </p>
              </div>
              <button type="button" onclick="selectPosition('<?php echo esc_attr( wp_slash( $job['title'] ) ); ?>')" class="shrink-0 px-4 py-2 bg-white hover:bg-[#0284C7] text-[#0284C7] hover:text-white border border-[#0284C7] rounded-lg text-xs font-bold font-mono-tag uppercase transition-all cursor-pointer">
                Apply For Role &darr;
              </button>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="bg-white border border-[#E2E8F0] rounded-xl p-8 text-center text-sm text-[#64748B]">
            No specific vacancies are currently listed, but we are always looking for exceptional builders. Please submit a <strong>General Application</strong> below!
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <!-- ================= APPLICATION FORM SECTION ================= -->
  <section id="application-form" class="py-24 bg-white">
    <div class="max-w-[1000px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          APPLICATION PORTAL
        </span>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-3">
          Submit Your Job Application
        </h2>
        <p class="text-sm text-[#64748B]">
          Complete the form below. Please submit your resume as a publicly viewable <strong class="text-[#0F172A]">Google Drive link</strong>.
        </p>
      </div>

      <!-- Success Notification Banner -->
      <?php if ( $application_sent ) : ?>
        <div class="p-6 mb-8 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 shadow-sm flex items-start gap-4">
          <svg class="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <div>
            <h4 class="font-bold text-base text-emerald-900 mb-1">Application Submitted Successfully!</h4>
            <p class="text-sm text-emerald-800 leading-relaxed">
              Thank you for applying to RajTech BD Limited. Our talent review committee will review your experience, cover letter, and Google Drive resume link. Shortlisted candidates will be contacted via email or WhatsApp for a technical discovery interview.
            </p>
          </div>
        </div>
      <?php elseif ( ! empty( $application_error ) ) : ?>
        <div class="p-5 mb-8 rounded-xl bg-red-50 border border-red-300 text-red-800 text-sm flex items-start gap-3">
          <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <strong class="font-bold">Please check your inputs:</strong>
            <p class="mt-0.5"><?php echo esc_html( $application_error ); ?></p>
          </div>
        </div>
      <?php endif; ?>

      <!-- Main Application Form Card -->
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-8 sm:p-12 shadow-sm">
        <form method="post" action="<?php echo esc_url( home_url( '/career/#application-form' ) ); ?>" class="space-y-6">
          <?php wp_nonce_field( 'rajtechbd_career_action', 'rajtechbd_career_nonce' ); ?>
          <input type="hidden" name="rajtechbd_career_submit" value="1">

          <!-- Row 1: Full Name & Email -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label for="full_name" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Full Name <span class="text-rose-500">*</span>
              </label>
              <input type="text" id="full_name" name="full_name" required placeholder="e.g. Tanvir Ahmed" 
                     value="<?php echo isset( $_POST['full_name'] ) ? esc_attr( wp_unslash( $_POST['full_name'] ) ) : ''; ?>" 
                     class="form-input">
            </div>

            <div>
              <label for="email" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Email Address <span class="text-rose-500">*</span>
              </label>
              <input type="email" id="email" name="email" required placeholder="e.g. tanvir@example.com" 
                     value="<?php echo isset( $_POST['email'] ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" 
                     class="form-input">
            </div>
          </div>

          <!-- Row 2: Contact Number & Years of Experience -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label for="phone" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Contact Number (WhatsApp Preferred) <span class="text-rose-500">*</span>
              </label>
              <input type="tel" id="phone" name="phone" required placeholder="e.g. +880 1712-345678" 
                     value="<?php echo isset( $_POST['phone'] ) ? esc_attr( wp_unslash( $_POST['phone'] ) ) : ''; ?>" 
                     class="form-input">
            </div>

            <div>
              <label for="experience" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                How Many Years of Experience? <span class="text-rose-500">*</span>
              </label>
              <select id="experience" name="experience" required class="form-select">
                <option value="" disabled <?php echo ! isset( $_POST['experience'] ) ? 'selected' : ''; ?>>Select your experience level...</option>
                <option value="Fresh Graduate / Less than 1 Year" <?php echo ( isset( $_POST['experience'] ) && $_POST['experience'] === 'Fresh Graduate / Less than 1 Year' ) ? 'selected' : ''; ?>>Fresh Graduate / Less than 1 Year</option>
                <option value="1 - 2 Years" <?php echo ( isset( $_POST['experience'] ) && $_POST['experience'] === '1 - 2 Years' ) ? 'selected' : ''; ?>>1 - 2 Years</option>
                <option value="3 - 5 Years" <?php echo ( isset( $_POST['experience'] ) && $_POST['experience'] === '3 - 5 Years' ) ? 'selected' : ''; ?>>3 - 5 Years</option>
                <option value="5 - 8 Years" <?php echo ( isset( $_POST['experience'] ) && $_POST['experience'] === '5 - 8 Years' ) ? 'selected' : ''; ?>>5 - 8 Years</option>
                <option value="8+ Years (Lead / Architect)" <?php echo ( isset( $_POST['experience'] ) && $_POST['experience'] === '8+ Years (Lead / Architect)' ) ? 'selected' : ''; ?>>8+ Years (Lead / Architect)</option>
              </select>
            </div>
          </div>

          <!-- Position of Interest -->
          <div>
            <label for="position" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
              Position of Interest <span class="text-rose-500">*</span>
            </label>
            <select id="position" name="position" required class="form-select">
              <?php
              $selected_pos = isset( $_POST['position'] ) ? wp_unslash( $_POST['position'] ) : '';
              $has_general  = false;
              if ( ! empty( $job_openings ) ) :
                  foreach ( $job_openings as $job ) :
                      if ( stripos( $job['title'], 'General' ) !== false ) {
                          $has_general = true;
                      }
              ?>
                <option value="<?php echo esc_attr( $job['title'] ); ?>" <?php selected( $selected_pos, $job['title'] ); ?>>
                  <?php echo esc_html( $job['title'] ); ?> (<?php echo esc_html( $job['type'] ); ?>)
                </option>
              <?php
                  endforeach;
              endif;
              if ( ! $has_general ) :
              ?>
                <option value="General Application" <?php echo ( empty( $selected_pos ) || $selected_pos === 'General Application' ) ? 'selected' : ''; ?>>General / Open Application (Other Roles)</option>
              <?php endif; ?>
            </select>
          </div>

          <!-- Resume Option: Google Drive Link (Required & Prominently Instructed) -->
          <div class="pt-2">
            <div class="flex items-center justify-between mb-2">
              <label for="resume_link" class="block text-xs font-bold font-mono-tag text-[#0F172A] uppercase">
                Resume / CV (Google Drive Link) <span class="text-rose-500">*</span>
              </label>
              <span class="text-[11px] font-mono-tag text-[#0284C7] font-semibold">Google Drive Link Only</span>
            </div>
            
            <input type="url" id="resume_link" name="resume_link" required 
                   placeholder="https://drive.google.com/file/d/your-resume-id/view?usp=sharing" 
                   value="<?php echo isset( $_POST['resume_link'] ) ? esc_url( wp_unslash( $_POST['resume_link'] ) ) : ''; ?>" 
                   class="form-input font-mono-tag text-xs sm:text-sm">

            <!-- Instruction Box for Google Drive Sharing -->
            <div class="mt-3 p-4 rounded-xl bg-sky-50/80 border border-[#BAE6FD] text-xs text-[#0369A1] space-y-2">
              <div class="flex items-center gap-2 font-bold font-mono-tag text-[#0284C7]">
                <svg class="w-4 h-4 shrink-0 text-[#0284C7]" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                </svg>
                <span>HOW TO SUBMIT YOUR GOOGLE DRIVE RESUME LINK:</span>
              </div>
              <ol class="list-decimal list-inside space-y-1 pl-1 text-[#334155] leading-relaxed">
                <li>Upload your updated CV or Resume (PDF format recommended) to your <strong>Google Drive</strong>.</li>
                <li>Right-click the file, select <strong>Share &gt; Share</strong>, and change General Access to <strong>"Anyone with the link can view"</strong>.</li>
                <li>Click <strong>Copy link</strong> and paste the link into the input field above.</li>
              </ol>
              <p class="text-[11px] text-[#0284C7] font-medium pt-1">
                * Note: Please make sure the link is set to public view access so our hiring team can review your profile without permission barriers.
              </p>
            </div>
          </div>

          <!-- Cover Letter -->
          <div>
            <label for="cover_letter" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
              Cover Letter &amp; Statement of Purpose <span class="text-rose-500">*</span>
            </label>
            <textarea id="cover_letter" name="cover_letter" rows="5" required 
                      placeholder="Tell us about yourself, your technical projects, why you want to build systems with RajTech BD Limited, and what sets you apart..." 
                      class="form-textarea"><?php echo isset( $_POST['cover_letter'] ) ? esc_textarea( wp_unslash( $_POST['cover_letter'] ) ) : ''; ?></textarea>
          </div>

          <!-- Submit Button -->
          <div class="pt-2">
            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-[#0284C7] hover:bg-[#0369a1] text-white font-bold text-sm tracking-wide shadow-md shadow-sky-900/20 transition-all hover:-translate-y-0.5 cursor-pointer">
              <span>Submit Job Application</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
          </div>
        </form>

        <!-- ================= BOTTOM CONTACT & EMAIL DISCLAIMER ================= -->
        <div class="mt-12 pt-8 border-t border-[#E2E8F0]">
          
          <!-- Questions Email Box -->
          <div class="p-6 rounded-xl bg-white border border-[#E2E8F0] shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4 mb-5">
            <div class="flex items-start gap-3.5">
              <div class="w-10 h-10 rounded-lg bg-sky-50 text-[#0284C7] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div>
                <h4 class="text-sm font-bold text-[#0F172A]">Have Questions About Careers or Roles?</h4>
                <p class="text-xs text-[#64748B] mt-0.5">
                  If you have any queries about the hiring timeline, team culture, or job specs, reach out to our talent coordinators:
                </p>
                <div class="mt-1.5 flex items-center gap-2">
                  <a href="mailto:info@rajthechbd.com" class="text-sm font-bold font-mono-tag text-[#0284C7] hover:text-[#0369a1] hover:underline">
                    info@rajthechbd.com
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Crucial Disclaimer: DO NOT SEND RESUME VIA EMAIL -->
          <div class="p-5 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 text-xs sm:text-sm leading-relaxed flex items-start gap-3.5">
            <div class="w-6 h-6 text-amber-600 shrink-0 mt-0.5">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <strong class="font-bold uppercase tracking-wider text-amber-950 font-mono-tag block mb-1">
                Important Hiring Notice: Do Not Send Your Resume Via Email
              </strong>
              <p class="text-amber-900">
                Please do <strong>NOT</strong> send your resume or CV directly to our email address. All applications and resumes must be submitted strictly through the official form above using a valid <strong>Google Drive link</strong>. Resumes sent by email will not be reviewed or tracked by our recruitment committee.
              </p>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>

  <script>
    function selectPosition(posName) {
      const select = document.getElementById('position');
      if (select) {
        select.value = posName;
        // If not found in options, fallback to General Application
        if (!select.value) {
          select.value = 'General Application';
        }
      }
      const formSection = document.getElementById('application-form');
      if (formSection) {
        formSection.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>

<?php
endif;

get_footer();
