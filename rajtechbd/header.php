<?php
/**
 * Header template for RajTech BD Limited theme
 *
 * @package RajTech_BD
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-[#0F172A] antialiased selection:bg-[#F59E0B] selection:text-[#0F172A]' ); ?>>
<?php wp_body_open(); ?>

  <!-- ================= 0. ENTERPRISE TOP MICRO-HEADER BAR ================= -->
  <div class="hidden lg:block bg-[#0B1528] text-white text-[12px] font-medium border-b border-[#1E3352]/70 py-2.5">
    <div class="max-w-[1280px] mx-auto px-6 flex items-center justify-between">
      
      <!-- Left: Location & Realtime SLA indicator -->
      <div class="flex items-center gap-5">
        <span class="inline-flex items-center gap-1.5 text-slate-300">
          <span class="w-2 h-2 rounded-full bg-[#10B981] pulse-dot"></span>
          <span class="font-mono-tag font-bold text-white uppercase text-[11px] tracking-wider">Dhaka HQ:</span>
          Kuril, Vatara, Dhaka-1229
        </span>
        <span class="text-slate-600">|</span>
        <span class="text-slate-300">
          <span class="text-[#38BDF8] font-bold font-mono-tag">SLA Response:</span> &lt; 15 min for critical incidents
        </span>
      </div>

      <!-- Right: Direct Telephone, WhatsApp, and Primary Email -->
      <div class="flex items-center gap-6">
        <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="text-slate-300 hover:text-[#38BDF8] flex items-center gap-1.5 transition-colors">
          <span class="text-[#10B981]">●</span> WhatsApp: +8801758522846
        </a>
        <span class="text-slate-600">|</span>
        <a href="mailto:info@rajtechbd.com" class="text-slate-300 hover:text-white transition-colors" title="Primary Email">
          info@rajtechbd.com
        </a>
        <span class="text-slate-600">|</span>
        <span class="text-emerald-400 font-mono-tag text-[11px] font-bold">
          Systems: 99.98% Operational
        </span>
      </div>

    </div>
  </div>

  <!-- ================= 1. PROFESSIONAL STICKY MAIN NAVBAR ================= -->
  <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#F1F5F9] transition-all duration-300 shadow-xs">
    <div class="max-w-[1280px] mx-auto px-6 h-20 flex items-center justify-between">
      
      <!-- Attached Brand Logo -->
      <div class="flex items-center">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo">
            <?php the_custom_logo(); ?>
          </div>
        <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center group py-2" aria-label="RajTech BD Limited Homepage">
            <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-logo.svg" 
                 alt="RajTech BD Limited - Software & ERP Systems" 
                 class="h-10 sm:h-11 w-auto transition-transform group-hover:scale-102">
          </a>
        <?php endif; ?>
      </div>

      <!-- Desktop Primary Navigation with Dropdowns -->
      <nav class="hidden lg:flex items-center">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-menu',
            'fallback_cb'    => 'rajtechbd_default_primary_menu',
        ) );
        ?>
      </nav>

      <!-- Right Action CTAs & Mobile Toggle -->
      <div class="flex items-center gap-3.5">
        <!-- Direct WhatsApp Quick Chat Pill (Desktop) -->
        <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="hidden xl:inline-flex items-center gap-2 px-3.5 py-2 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-xs font-bold text-[#0F172A] hover:border-[#10B981] hover:text-[#15803D] transition-all">
          <svg class="w-4 h-4 text-[#10B981]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
          </svg>
          <span>Chat on WhatsApp</span>
        </a>

        <!-- Schedule Consultation CTA (Hidden on mobile navbar as requested, visible on tab & desktop) -->
        <a href="<?php echo $contact_url; ?>" class="hidden md:inline-flex items-center justify-center px-5 py-2.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm tracking-wide hover:bg-[#d97706] hover-lift transition-all shadow-xs">
          Schedule Consultation
        </a>

        <!-- Mobile Menu Hamburger Button -->
        <button id="mobile-menu-toggle" type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-[#0F172A] hover:bg-[#F1F5F9] focus:outline-none" aria-label="Toggle navigation menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

    </div>
  </header>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu-overlay" class="hidden fixed inset-0 bg-slate-950/60 z-50 backdrop-blur-xs transition-opacity duration-300"></div>

  <!-- Mobile Slide-out Drawer -->
  <aside id="mobile-menu-drawer" class="hidden fixed top-0 right-0 w-84 max-w-[85vw] h-full bg-white z-50 shadow-2xl p-6 flex flex-col justify-between overflow-y-auto">
    <div>
      <div class="flex items-center justify-between pb-6 border-b border-[#F1F5F9] mb-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center" aria-label="RajTech BD Limited Homepage">
          <img src="<?php echo $theme_uri; ?>/assets/images/rajtechbd-logo.svg" 
               alt="RajTech BD Limited" 
               class="h-9 w-auto">
        </a>
        <button id="mobile-menu-close" type="button" class="p-2 text-slate-500 hover:text-slate-800" aria-label="Close navigation menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Mobile Navigation Links -->
      <nav class="mb-8">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'mobile-nav-menu',
            'fallback_cb'    => 'rajtechbd_default_mobile_menu',
        ) );
        ?>
      </nav>
    </div>

    <!-- Mobile Drawer Footer CTA & Contact -->
    <div class="pt-6 border-t border-[#F1F5F9] space-y-3">
      <a href="<?php echo $contact_url; ?>" class="w-full inline-flex items-center justify-center px-5 py-3 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm tracking-wide hover:bg-[#d97706] transition-all">
        Schedule Consultation
      </a>
      <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-[6px] bg-[#F0FDF4] border border-[#86EFAC] text-[#15803D] font-bold text-xs tracking-wide">
        WhatsApp: +8801758522846
      </a>
      <div class="text-xs text-[#64748B] text-center pt-2 space-y-1">
        <div>Kuril, Vatara, Dhaka-1229</div>
        <div>Primary: <a href="mailto:info@rajtechbd.com" class="text-[#0284C7] font-semibold">info@rajtechbd.com</a></div>
        <div>Secondary: <a href="mailto:rajtechbdt@gmail.com" class="text-slate-500">rajtechbdt@gmail.com</a></div>
      </div>
    </div>
  </aside>
