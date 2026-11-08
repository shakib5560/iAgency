<?php
/**
 * The template for displaying all single portfolio case studies (Portfolio Details)
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri     = get_template_directory_uri();
$contact_page  = get_page_by_path( 'contact' );
$contact_url   = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );
$portfolio_url = get_post_type_archive_link( 'portfolio' );
if ( ! $portfolio_url ) {
    $portfolio_page = get_page_by_path( 'portfolio' );
    $portfolio_url  = $portfolio_page ? esc_url( get_permalink( $portfolio_page->ID ) ) : esc_url( home_url( '/portfolio/' ) );
}
?>

  <?php while ( have_posts() ) : the_post();
      $client     = get_post_meta( get_the_ID(), '_portfolio_client', true );
      $year       = get_post_meta( get_the_ID(), '_portfolio_year', true );
      $metric_val = get_post_meta( get_the_ID(), '_portfolio_metric_val', true );
      $metric_lbl = get_post_meta( get_the_ID(), '_portfolio_metric_lbl', true );
      $tech_stack = get_post_meta( get_the_ID(), '_portfolio_stack', true );
  ?>

    <!-- Portfolio Details Header -->
    <section class="bg-[#0B1528] py-16 lg:py-24 text-white border-b border-[#1E3352] bg-grid-pattern-dark relative">
      <div class="max-w-[1280px] mx-auto px-6 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-mono-tag text-[#94A3B8] mb-6" aria-label="Breadcrumb">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
          <span>/</span>
          <a href="<?php echo esc_url( $portfolio_url ); ?>" class="hover:text-white transition-colors">Portfolio &amp; Case Studies</a>
          <span>/</span>
          <span class="text-[#38BDF8] truncate max-w-[280px]"><?php the_title(); ?></span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
          <div class="lg:col-span-8">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold uppercase tracking-wider mb-4">
              <?php
              $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
              if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                  echo esc_html( $terms[0]->name );
              } else {
                  echo 'Enterprise Software &amp; AI Architecture';
              }
              ?>
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-[1.15] mb-4">
              <?php the_title(); ?>
            </h1>
            <?php if ( has_excerpt() ) : ?>
              <p class="text-lg text-[#94A3B8] leading-relaxed max-w-2xl mb-0">
                <?php echo get_the_excerpt(); ?>
              </p>
            <?php endif; ?>
          </div>

          <!-- Key Project Facts / Meta Box -->
          <div class="lg:col-span-4 bg-[#132238] border border-[#1E3352] rounded-xl p-6">
            <div class="grid grid-cols-2 gap-4 text-xs font-mono-tag">
              <div>
                <span class="text-[#64748B] uppercase block">Client Entity</span>
                <span class="text-white font-bold text-sm"><?php echo esc_html( $client ? $client : 'Enterprise Client' ); ?></span>
              </div>
              <div>
                <span class="text-[#64748B] uppercase block">Delivery Year</span>
                <span class="text-white font-bold text-sm"><?php echo esc_html( $year ? $year : '2025 - 2026' ); ?></span>
              </div>
              <div class="col-span-2 pt-2 border-t border-[#1E3352]">
                <span class="text-[#64748B] uppercase block mb-1">Architecture Impact</span>
                <span class="text-2xl font-extrabold text-[#F59E0B] block"><?php echo esc_html( $metric_val ? $metric_val : '99.9%' ); ?></span>
                <span class="text-[11px] text-[#94A3B8]"><?php echo esc_html( $metric_lbl ? $metric_lbl : 'System Accuracy & Performance Benchmark' ); ?></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Project Body & Architecture Showcase -->
    <article id="portfolio-<?php the_ID(); ?>" class="py-16 lg:py-24 bg-white">
      <div class="max-w-[1280px] mx-auto px-6">
        
        <!-- Large Showcase Visual -->
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-16 rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-lg max-h-[600px] bg-slate-900">
            <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
          </div>
        <?php else : ?>
          <div class="mb-16 rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-md h-80 bg-slate-900 flex items-center justify-center text-white/40 font-mono-tag">
            RajTech BD Ltd. Enterprise Architecture
          </div>
        <?php endif; ?>

        <!-- Two Column Architecture Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
          
          <!-- Main Narrative (8 cols) -->
          <div class="lg:col-span-8 entry-content text-[17px] leading-[1.8] text-[#334155]">
            <?php the_content(); ?>
          </div>

          <!-- Technical Specs Sidebar (4 cols) -->
          <div class="lg:col-span-4 space-y-6">
            
            <!-- Tech Stack Card -->
            <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-6">
              <h3 class="text-sm font-bold text-[#0F172A] uppercase font-mono-tag tracking-wider mb-3">
                Production Technology Stack
              </h3>
              <p class="text-xs text-[#64748B] mb-4">
                Native technologies, frameworks, and database engines implemented in this deployment:
              </p>
              <div class="flex flex-wrap gap-2">
                <?php
                $stack_items = $tech_stack ? explode( ',', $tech_stack ) : array( 'PostgreSQL', 'Node.js', 'Python', 'Redis', 'Docker', 'AI Pipelines' );
                foreach ( $stack_items as $item ) :
                ?>
                  <span class="px-3 py-1.5 rounded-[4px] bg-white border border-[#CBD5E1] text-[#0F172A] font-mono-tag text-xs font-semibold">
                    <?php echo esc_html( trim( $item ) ); ?>
                  </span>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Engineering Compliance & SLA Card -->
            <div class="bg-[#0B1528] text-white border border-[#1E3352] rounded-xl p-6">
              <span class="text-xs font-mono-tag text-[#38BDF8] uppercase font-bold tracking-wider block mb-2">
                ENGINEERING STANDARDS
              </span>
              <h4 class="text-lg font-bold text-white mb-3">SLA &amp; Code Quality Guarantee</h4>
              <ul class="space-y-2.5 text-xs text-[#94A3B8] font-mono-tag list-none p-0">
                <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> 100% Client Source Code Ownership</li>
                <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Zero Vendor Lock-in or Seat Fees</li>
                <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Automated Unit &amp; Concurrency Tests</li>
                <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Contractual 24/7 SLA Coverage</li>
              </ul>
            </div>

            <!-- Request Similar Scope Callout -->
            <div class="bg-[#FEF3C7] border border-[#FDE68A] rounded-xl p-6 text-center">
              <h4 class="text-base font-bold text-[#92400E] mb-2">Need a Similar Architecture?</h4>
              <p class="text-xs text-[#B45309] leading-relaxed mb-4">
                Our principal software architects in Kuril, Vatara, Dhaka will analyze your workflow and propose a tailored engineering scope.
              </p>
              <a href="<?php echo $contact_url; ?>" class="w-full inline-block py-3 px-4 rounded-[6px] bg-[#D97706] text-white font-bold text-xs uppercase tracking-wider hover:bg-[#B45309] transition-colors">
                Book Technical Scoping Call
              </a>
            </div>

          </div>

        </div>

        <!-- Project Pagination -->
        <div class="mt-16 pt-8 border-t border-[#E2E8F0] flex flex-wrap justify-between items-center gap-4">
          <div class="text-sm font-semibold text-[#0284C7]">
            <?php previous_post_link( '%link', '← %title' ); ?>
          </div>
          <div>
            <a href="<?php echo esc_url( $portfolio_url ); ?>" class="px-5 py-2.5 rounded border border-[#E2E8F0] bg-[#F8FAFC] text-xs font-mono-tag font-bold text-[#0F172A] hover:border-[#0284C7] transition-colors">
              View All Portfolio Case Studies
            </a>
          </div>
          <div class="text-sm font-semibold text-[#0284C7]">
            <?php next_post_link( '%link', '%title →' ); ?>
          </div>
        </div>

      </div>
    </article>

  <?php endwhile; ?>

<?php
get_footer();
