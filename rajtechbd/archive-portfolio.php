<?php
/**
 * The template for displaying the Portfolio Archive
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );
?>

  <!-- Portfolio Archive Header -->
  <section class="bg-[#0B1528] py-20 text-white border-b border-[#1E3352] bg-grid-pattern-dark text-center">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold tracking-wider uppercase mb-4">
        PRODUCTION CASE STUDIES • REAL-WORLD RESULTS
      </div>
      <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4 text-white">
        Enterprise Portfolio &amp; Engineering Case Studies
      </h1>
      <p class="text-lg text-[#94A3B8] max-w-2xl mx-auto">
        Explore enterprise platforms, custom ERP architectures, AI systems, and high-concurrency web ecosystems engineered by RajTech BD Ltd.
      </p>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section id="portfolio-grid" class="py-20 bg-white min-h-[60vh] scroll-mt-24">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php
          while ( have_posts() ) : the_post();
              $client     = get_post_meta( get_the_ID(), '_portfolio_client', true );
              $metric_val = get_post_meta( get_the_ID(), '_portfolio_metric_val', true );
              $metric_lbl = get_post_meta( get_the_ID(), '_portfolio_metric_lbl', true );
              $tech_stack = get_post_meta( get_the_ID(), '_portfolio_stack', true );
              ?>
              <article class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between">
                <div>
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="block h-52 overflow-hidden bg-slate-900">
                      <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500' ) ); ?>
                    </a>
                  <?php else : ?>
                    <div class="h-52 bg-[#0B1528] flex items-center justify-center text-white/30 font-mono-tag text-xs">
                      RajTech BD Ltd. Enterprise Systems
                    </div>
                  <?php endif; ?>

                  <div class="p-6">
                    <div class="flex items-center justify-between text-xs font-mono-tag text-[#0284C7] font-semibold mb-2">
                      <span><?php echo esc_html( $client ? $client : 'Enterprise Deployment' ); ?></span>
                      <?php if ( $metric_val ) : ?>
                        <span class="text-[#F59E0B] font-bold"><?php echo esc_html( $metric_val ); ?></span>
                      <?php endif; ?>
                    </div>
                    <h2 class="text-xl font-bold text-[#0F172A] mb-3 leading-snug hover:text-[#0284C7] transition-colors">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="text-sm text-[#475569] leading-relaxed mb-4">
                      <?php echo wp_trim_words( get_the_excerpt(), 22 ); ?>
                    </p>
                  </div>
                </div>

                <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                  <span class="text-[11px] font-mono-tag text-[#64748B] truncate max-w-[180px]">
                    <?php echo esc_html( $tech_stack ? $tech_stack : 'PostgreSQL • AI • Cloud' ); ?>
                  </span>
                  <a href="<?php the_permalink(); ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1">
                    Explore Details →
                  </a>
                </div>
              </article>
              <?php
          endwhile;
          ?>
        </div>

        <div class="pagination">
          <?php
          the_posts_pagination( array(
              'mid_size'  => 2,
              'prev_text' => __( '← Prev', 'rajtechbd' ),
              'next_text' => __( 'Next →', 'rajtechbd' ),
          ) );
          ?>
        </div>

      <?php else : ?>
        <div class="text-center py-16">
          <h2 class="text-2xl font-bold text-[#0F172A] mb-2">No Portfolio Projects Found</h2>
          <p class="text-[#64748B]">Run the 1-click starter generator under Appearance > RajTech BD Setup to generate starter projects.</p>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <!-- ================= PORTFOLIO CTA ================= -->
  <section class="py-16 bg-[#F8FAFC] border-t border-[#E2E8F0] text-center">
    <div class="max-w-[960px] mx-auto px-6">
      <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0F172A] mb-3">Have a High-Scale System to Build?</h3>
      <p class="text-sm sm:text-base text-[#475569] max-w-lg mx-auto mb-6">Our senior software architects in Kuril, Vatara, Dhaka will analyze your requirements and propose a dedicated sprint roadmap.</p>
      <a href="<?php echo $contact_url; ?>" class="px-7 py-3.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm hover:bg-[#d97706] hover-lift transition-all inline-block shadow-xs">
        Book Technical Scoping Session
      </a>
    </div>
  </section>

<?php
get_footer();
