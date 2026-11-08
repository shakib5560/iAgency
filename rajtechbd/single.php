<?php
/**
 * The template for displaying all single blog posts (Blog Details)
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );
$blog_url     = get_permalink( get_option( 'page_for_posts' ) );
if ( ! $blog_url ) {
    $blog_url = home_url( '/blog/' );
}
?>

  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Article Header Banner -->
    <section class="bg-[#0B1528] py-16 lg:py-20 text-white border-b border-[#1E3352] bg-grid-pattern-dark relative">
      <div class="max-w-[960px] mx-auto px-6 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-mono-tag text-[#94A3B8] mb-6" aria-label="Breadcrumb">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
          <span>/</span>
          <a href="<?php echo esc_url( $blog_url ); ?>" class="hover:text-white transition-colors">Engineering Insights</a>
          <span>/</span>
          <span class="text-[#38BDF8] truncate max-w-[300px]"><?php the_title(); ?></span>
        </nav>

        <div class="flex flex-wrap items-center gap-3 mb-4">
          <span class="px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold uppercase">
            <?php
            $cats = get_the_category();
            echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Technical Architecture';
            ?>
          </span>
          <span class="text-xs font-mono-tag text-[#94A3B8]">
            ⏱ <?php echo esc_html( rajtechbd_get_reading_time() ); ?>
          </span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-[1.18] mb-6">
          <?php the_title(); ?>
        </h1>

        <!-- Author & Date Meta -->
        <div class="flex items-center gap-4 pt-4 border-t border-[#1E3352]/70 text-xs font-mono-tag text-[#94A3B8]">
          <div class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-full bg-[#0284C7] text-white flex items-center justify-center font-bold">R</span>
            <span class="text-white font-semibold"><?php the_author(); ?></span>
          </div>
          <span>•</span>
          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></time>
          <span>•</span>
          <span>RajTech BD Ltd. Engineering Labs</span>
        </div>

      </div>
    </section>

    <!-- Main Article Body -->
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'py-16 lg:py-20 bg-white' ); ?>>
      <div class="max-w-[960px] mx-auto px-6">

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-12 rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-md max-h-[520px]">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>

        <!-- Key Takeaways Callout Box -->
        <?php if ( has_excerpt() ) : ?>
          <div class="bg-[#F8FAFC] border-l-4 border-[#0284C7] p-6 rounded-r-xl mb-10 shadow-xs">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-1">
              EXECUTIVE BRIEF &amp; ARCHITECTURAL SUMMARY
            </span>
            <p class="text-base text-[#334155] leading-relaxed m-0 font-medium">
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>
        <?php endif; ?>

        <!-- Formatted Gutenberg Block Content -->
        <div class="entry-content text-[17px] leading-[1.8] text-[#334155]">
          <?php
          the_content();

          wp_link_pages( array(
              'before' => '<div class="page-links mt-8 pt-4 border-t border-[#E2E8F0]"><span class="font-bold mr-2">' . esc_html__( 'Pages:', 'rajtechbd' ) . '</span>',
              'after'  => '</div>',
          ) );
          ?>
        </div>

        <!-- Post Tags & Share -->
        <div class="mt-12 pt-6 border-t border-[#E2E8F0] flex flex-wrap justify-between items-center gap-4">
          <div class="text-xs font-mono-tag text-[#64748B]">
            <?php the_tags( '<span class="font-bold text-[#0F172A] uppercase mr-2">Architectural Tags:</span> ', ', ' ); ?>
          </div>
          <div class="text-xs font-mono-tag text-[#0284C7] font-bold">
            Published by RajTech BD Ltd. • Dhaka-1229
          </div>
        </div>

        <!-- Author Box -->
        <div class="mt-10 p-6 sm:p-8 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] flex flex-col sm:flex-row items-center sm:items-start gap-6">
          <div class="w-16 h-16 rounded-xl bg-[#0B1528] text-white flex items-center justify-center font-mono-tag font-bold text-2xl flex-shrink-0 shadow-sm">
            R
          </div>
          <div>
            <div class="flex items-center gap-2 mb-1">
              <h3 class="text-lg font-bold text-[#0F172A]"><?php the_author(); ?></h3>
              <span class="text-[11px] font-mono-tag px-2 py-0.5 rounded bg-[#BAE6FD] text-[#0284C7] font-bold">Principal Systems Team</span>
            </div>
            <p class="text-sm text-[#475569] leading-relaxed mb-3">
              Senior engineering, modern web, and AI systems architect at <strong>RajTech BD Ltd.</strong> Operating in Kuril, Vatara, Dhaka-1229, specializing in high-concurrency ERP backends, headless commerce, and autonomous machine learning workflows.
            </p>
            <a href="<?php echo $contact_url; ?>" class="text-xs font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 font-mono-tag">
              Connect With Engineering Leads →
            </a>
          </div>
        </div>

        <!-- Previous / Next Navigation -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-4 border-t border-[#E2E8F0] pt-8">
          <div class="p-4 rounded-lg border border-[#F1F5F9] hover:border-[#CBD5E1] transition-colors">
            <span class="text-xs font-mono-tag text-[#64748B] block mb-1">← Previous Article</span>
            <div class="font-bold text-sm text-[#0F172A]"><?php previous_post_link( '%link', '%title' ); ?></div>
          </div>
          <div class="p-4 rounded-lg border border-[#F1F5F9] hover:border-[#CBD5E1] transition-colors text-right">
            <span class="text-xs font-mono-tag text-[#64748B] block mb-1">Next Article →</span>
            <div class="font-bold text-sm text-[#0F172A]"><?php next_post_link( '%link', '%title' ); ?></div>
          </div>
        </div>

        <!-- Related Technical Publications -->
        <?php
        $orig_post = $post;
        $categories = get_the_category( $post->ID );
        if ( $categories ) {
            $category_ids = array();
            foreach ( $categories as $individual_category ) {
                $category_ids[] = $individual_category->term_id;
            }
            $related_args = array(
                'category__in'   => $category_ids,
                'post__not_in'   => array( $post->ID ),
                'posts_per_page' => 2,
            );
            $related_query = new WP_Query( $related_args );
            if ( $related_query->have_posts() ) :
                ?>
                <div class="mt-16 pt-12 border-t border-[#E2E8F0]">
                  <h3 class="text-2xl font-bold text-[#0F172A] mb-8">Related Technical Publications</h3>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <?php
                    while ( $related_query->have_posts() ) :
                        $related_query->the_post();
                        ?>
                        <article class="bg-[#F8FAFC] p-6 rounded-xl border border-[#E2E8F0] hover-lift flex flex-col justify-between">
                          <div>
                            <span class="text-xs font-mono-tag text-[#0284C7] font-semibold block mb-2"><?php echo get_the_date(); ?></span>
                            <h4 class="text-base font-bold text-[#0F172A] mb-2 leading-snug">
                              <a href="<?php the_permalink(); ?>" class="hover:text-[#0284C7] transition-colors"><?php the_title(); ?></a>
                            </h4>
                            <p class="text-xs text-[#475569] leading-relaxed mb-4"><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                          </div>
                          <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1 font-mono-tag">
                            Read Article →
                          </a>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                  </div>
                </div>
                <?php
            endif;
        }
        $post = $orig_post;
        ?>

        <!-- Comments Area -->
        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

      </div>
    </article>

    <!-- Consultation CTA -->
    <section class="py-16 bg-[#F8FAFC] border-t border-[#E2E8F0]">
      <div class="max-w-[960px] mx-auto px-6 text-center">
        <h3 class="text-2xl font-extrabold text-[#0F172A] mb-3">Need to Architect a Similar System?</h3>
        <p class="text-sm text-[#475569] max-w-lg mx-auto mb-6">Consult with our senior software and AI engineers in Kuril, Vatara, Dhaka.</p>
        <a href="<?php echo $contact_url; ?>" class="px-7 py-3.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm hover:bg-[#d97706] hover-lift transition-all inline-block">
          Schedule Technical Consultation
        </a>
      </div>
    </section>

  <?php endwhile; ?>

<?php
get_footer();
