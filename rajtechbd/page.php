<?php
/**
 * The template for displaying all pages
 *
 * @package RajTech_BD
 */

get_header();
?>

  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Page Header Banner -->
    <section class="bg-[#F8FAFC] py-14 border-b border-[#F1F5F9] bg-grid-pattern">
      <div class="max-w-[1280px] mx-auto px-6">
        <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-2">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:underline">Home</a> &gt; <?php the_title(); ?>
        </div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
          <?php the_title(); ?>
        </h1>
      </div>
    </section>

    <!-- Page Content Container with Gutenberg Block Support -->
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'py-16 bg-white min-h-[60vh]' ); ?>>
      <div class="max-w-[1280px] mx-auto px-6">
        
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-10 rounded-xl overflow-hidden max-h-[500px]">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content max-w-[960px] mx-auto">
          <?php
          the_content();

          wp_link_pages( array(
              'before' => '<div class="page-links mt-8 pt-4 border-t border-[#E2E8F0]"><span class="font-bold mr-2">' . esc_html__( 'Pages:', 'rajtechbd' ) . '</span>',
              'after'  => '</div>',
          ) );
          ?>
        </div>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

      </div>
    </article>

  <?php endwhile; ?>

<?php
get_footer();
