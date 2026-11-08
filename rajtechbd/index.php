<?php
/**
 * The main template file (Blog Archive)
 *
 * @package RajTech_BD
 */

get_header();
?>

  <!-- Blog / Archive Header -->
  <section class="bg-[#F8FAFC] py-16 border-b border-[#F1F5F9] bg-grid-pattern">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-3 shadow-xs">
        TECHNICAL PUBLICATIONS &amp; INSIGHTS
      </div>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
        <?php
        if ( is_home() && ! is_front_page() ) {
            single_post_title();
        } elseif ( is_archive() ) {
            the_archive_title();
        } else {
            esc_html_e( 'Engineering Insights & Architecture Publications', 'rajtechbd' );
        }
        ?>
      </h1>
      <?php if ( is_archive() ) : ?>
        <div class="text-sm text-[#64748B] mt-2 max-w-xl mx-auto"><?php the_archive_description(); ?></div>
      <?php else : ?>
        <p class="text-sm text-[#64748B] mt-2 max-w-xl mx-auto">
          Deep-dives into enterprise ERP backends, high-concurrency database engineering, modern web speed, and production AI systems in Bangladesh.
        </p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Post Grid -->
  <section id="blog-grid" class="py-20 bg-white min-h-[60vh] scroll-mt-24">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php
          while ( have_posts() ) : the_post();
              $cats = get_the_category();
              $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Engineering';
              ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-[#F8FAFC] rounded-2xl overflow-hidden border border-[#E2E8F0] hover-lift flex flex-col justify-between' ); ?>>
                <div>
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="block h-52 overflow-hidden bg-slate-900">
                      <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500' ) ); ?>
                    </a>
                  <?php else : ?>
                    <div class="h-52 bg-[#0B1528] flex items-center justify-center text-white/30 font-mono-tag text-xs p-6 text-center">
                      RajTech BD Ltd. Engineering Publication
                    </div>
                  <?php endif; ?>

                  <div class="p-6">
                    <div class="flex items-center justify-between text-xs font-mono-tag text-[#64748B] mb-2.5">
                      <span class="text-[#0284C7] font-bold uppercase"><?php echo esc_html( $cat_name ); ?></span>
                      <span><?php echo esc_html( rajtechbd_get_reading_time() ); ?></span>
                    </div>

                    <h2 class="text-xl font-bold text-[#0F172A] mb-3 hover:text-[#0284C7] transition-colors leading-snug">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <p class="text-sm text-[#475569] leading-relaxed mb-4">
                      <?php echo wp_trim_words( get_the_excerpt(), 22 ); ?>
                    </p>
                  </div>
                </div>

                <div class="px-6 pb-6 pt-0 border-t border-[#F1F5F9] mt-2 flex items-center justify-between">
                  <span class="text-xs text-[#64748B] font-mono-tag">
                    By <?php the_author(); ?>
                  </span>
                  <a href="<?php the_permalink(); ?>" class="text-xs font-mono-tag font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1">
                    Read Article →
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
          <h2 class="text-2xl font-bold text-[#0F172A] mb-2">No Articles Found</h2>
          <p class="text-[#64748B]">Run the 1-click starter generator under Appearance > RajTech BD Setup to create starter articles.</p>
        </div>
      <?php endif; ?>

    </div>
  </section>

<?php
get_footer();
