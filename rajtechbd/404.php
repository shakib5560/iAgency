<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package RajTech_BD
 */

get_header();
?>

  <section class="py-28 bg-[#F8FAFC] min-h-[70vh] flex items-center justify-center bg-grid-pattern">
    <div class="max-w-[700px] mx-auto px-6 text-center">
      <div class="text-7xl sm:text-8xl font-extrabold text-[#0284C7] font-mono-tag mb-4">404</div>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-4">
        Page or Route Not Found
      </h1>
      <p class="text-[#475569] text-base leading-relaxed mb-8">
        The system path you requested does not exist or has been relocated in our latest deployment.
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-6 py-3.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-sm hover:bg-[#0369a1] hover-lift transition-all">
          Return to Homepage
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-6 py-3.5 rounded-[6px] bg-white border border-[#CBD5E1] text-[#0F172A] font-bold text-sm hover:border-[#0284C7] transition-colors">
          Contact Engineering Support
        </a>
      </div>
    </div>
  </section>

<?php
get_footer();
