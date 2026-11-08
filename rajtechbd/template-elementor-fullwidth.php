<?php
/**
 * Template Name: Elementor Full Width - RajTech BD
 * Template Post Type: page, post
 *
 * @package RajTech_BD
 */

get_header();
?>

<main id="primary" class="site-main w-full overflow-hidden">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();
