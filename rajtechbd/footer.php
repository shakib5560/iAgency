<?php
/**
 * Footer template for RajTech BD Limited theme
 *
 * @package RajTech_BD
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme_uri        = get_template_directory_uri();
$home_url         = esc_url( home_url( '/' ) );
$about_url        = esc_url( home_url( '/about/' ) );
$services_url     = esc_url( home_url( '/services/' ) );
$portfolio_url    = esc_url( home_url( '/portfolio/' ) );
$blog_url         = esc_url( home_url( '/blog/' ) );
$faq_url          = esc_url( home_url( '/faq/' ) );
$contact_url      = esc_url( home_url( '/contact/' ) );
$privacy_url      = esc_url( home_url( '/privacy-policy/' ) );
$terms_url        = esc_url( home_url( '/terms-and-conditions/' ) );
$payment_url      = esc_url( home_url( '/payment-system/' ) );
?>

  <!-- ================= ENTERPRISE FOOTER ================= -->
  <footer id="contact-footer" class="bg-[#0B1528] pt-24 pb-12 text-white border-t border-[#1E3352]">
    <div class="max-w-[1280px] mx-auto px-6">

      <!-- 4-Column Minimalist Footer -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-16 border-b border-[#1E3352]">
        
        <!-- Col 1: Brand & Limited Company Identification (4 cols) -->
        <div class="lg:col-span-4 flex flex-col items-start">
          <!-- User Requested White Logo with fallback -->
          <a href="<?php echo $home_url; ?>" class="inline-block mb-4" aria-label="RajTech BD Limited Homepage">
            <img src="https://rajtechbd.com/wp-content/uploads/2024/07/white-logo.png" 
                 alt="RajTech BD Limited" 
                 class="h-10 sm:h-11 w-auto max-w-[280px] object-contain"
                 onerror="this.onerror=null;this.src='<?php echo esc_url( $theme_uri . '/assets/images/rajtechbd-logo-white.svg' ); ?>';">
          </a>
          
          <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-[#132238] border border-[#1E3352] text-[#38BDF8] text-[11px] font-mono-tag font-bold uppercase tracking-wider mb-4">
            <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span>
            RAJTECH BD LIMITED • INCORPORATED IN BD
          </div>

          <p class="text-sm text-[#94A3B8] leading-relaxed mb-6 font-normal">
            A premier software engineering, enterprise ERP, modern web, and AI system development limited company based in Kuril, Vatara, Dhaka-1229, Bangladesh. Delivering battle-tested digital systems and zero technical debt since 2018.
          </p>
          
          <div class="text-sm text-[#94A3B8] space-y-2">
            <p><strong class="text-white">Primary Email:</strong> <a href="mailto:info@rajtechbd.com" class="hover:text-white transition-colors">info@rajtechbd.com</a></p>
            <p><strong class="text-white">Secondary Email:</strong> <a href="mailto:rajtechbdt@gmail.com" class="hover:text-white transition-colors">rajtechbdt@gmail.com</a></p>
            <p><strong class="text-white">Phone / WhatsApp:</strong> <a href="https://wa.me/8801758522846" class="hover:text-white transition-colors" target="_blank" rel="noopener">+8801758522846</a></p>
            <p><strong class="text-white">Headquarters:</strong> House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.</p>
          </div>
        </div>

        <!-- Col 2: Enterprise Systems & AI (3 cols) -->
        <div class="lg:col-span-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Core Systems &amp; AI</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8] list-none p-0 m-0">
            <li><a href="<?php echo $services_url; ?>#solutions" class="hover:text-white transition-colors">Custom Modular ERP Systems</a></li>
            <li><a href="<?php echo $services_url; ?>#inventory" class="hover:text-white transition-colors">Multi-Warehouse Inventory</a></li>
            <li><a href="<?php echo $services_url; ?>#ai-systems" class="hover:text-white transition-colors">Autonomous AI Agent Pipelines</a></li>
            <li><a href="<?php echo $services_url; ?>#finance" class="hover:text-white transition-colors">Corporate Finance &amp; Billing</a></li>
            <li><a href="<?php echo $services_url; ?>#lms" class="hover:text-white transition-colors">High-Scale LMS &amp; EdTech</a></li>
          </ul>
        </div>

        <!-- Col 3: Modern Web & Growth (3 cols) -->
        <div class="lg:col-span-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Modern Web &amp; Growth</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8] list-none p-0 m-0">
            <li><a href="<?php echo $services_url; ?>#optimization" class="hover:text-white transition-colors">WordPress &amp; WooCommerce Speed</a></li>
            <li><a href="<?php echo $services_url; ?>#optimization" class="hover:text-white transition-colors">Shopify Plus &amp; Headless Stores</a></li>
            <li><a href="<?php echo $services_url; ?>#optimization" class="hover:text-white transition-colors">Cross-Platform Flutter &amp; Mobile Apps</a></li>
            <li><a href="<?php echo $services_url; ?>#services" class="hover:text-white transition-colors">Sales Development &amp; CRM Funnels</a></li>
            <li><a href="<?php echo $services_url; ?>#services" class="hover:text-white transition-colors">Technical SEO &amp; Core Web Vitals</a></li>
          </ul>
        </div>

        <!-- Col 4: Corporate & Legal Governance (2 cols) -->
        <div class="lg:col-span-2">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Company &amp; Legal</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8] list-none p-0 m-0">
            <li><a href="<?php echo $about_url; ?>" class="hover:text-white transition-colors">About &amp; Leadership</a></li>
            <li><a href="<?php echo $portfolio_url; ?>" class="hover:text-white transition-colors">Portfolio &amp; Case Studies</a></li>
            <li><a href="<?php echo $blog_url; ?>" class="hover:text-white transition-colors">Engineering Blog</a></li>
            <li><a href="<?php echo $faq_url; ?>" class="hover:text-white transition-colors">FAQ &amp; Knowledge Base</a></li>
            <li><a href="<?php echo $payment_url; ?>" class="hover:text-white transition-colors">Payment Methods &amp; System</a></li>
            <li><a href="<?php echo $contact_url; ?>" class="hover:text-white transition-colors">Contact Office</a></li>
            <li><a href="<?php echo $privacy_url; ?>" class="hover:text-white transition-colors">Privacy Policy</a></li>
            <li><a href="<?php echo $terms_url; ?>" class="hover:text-white transition-colors">Terms &amp; Conditions</a></li>
            <li><a href="<?php echo $contact_url; ?>" class="hover:text-white transition-colors">24/7 SLA Guarantees</a></li>
          </ul>
        </div>

      </div>

      <!-- Bottom Bar with Bangladesh Limited Company Copyright -->
      <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-[#64748B] gap-4">
        <div>
          <p class="m-0 text-[#94A3B8] font-medium">
            © 2018 - <?php echo date( 'Y' ); ?> <strong class="text-white">RajTech BD Limited</strong> (Registered in Bangladesh under the Companies Act, 1994). All Rights Reserved.
          </p>
          <p class="m-0 text-[#64748B] text-[11px] mt-1">
            A Premier Software Engineering, Enterprise ERP, Modern Web &amp; AI Systems Development Limited Company. Kuril, Vatara, Dhaka-1229.
          </p>
        </div>
        <div class="flex items-center gap-4 font-mono-tag text-[11px] text-[#94A3B8]">
          <a href="<?php echo $privacy_url; ?>" class="hover:text-white transition-colors">Privacy</a>
          <span>•</span>
          <a href="<?php echo $terms_url; ?>" class="hover:text-white transition-colors">Terms</a>
          <span>•</span>
          <span class="text-emerald-400">Old-Fashioned Discipline • Modern AI Systems</span>
        </div>
      </div>

    </div>
  </footer>

  <!-- ================= FLOATING WHATSAPP BUTTON (VISIBLE ACROSS ALL PAGES) ================= -->
  <aside class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 flex items-center print:hidden" aria-label="WhatsApp Quick Support">
    <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD%20team,%20I%20would%20like%20to%20discuss%20a%20software%20project" 
       target="_blank" 
       rel="noopener" 
       aria-label="Chat with RajTech BD Limited Engineers on WhatsApp"
       class="relative flex items-center gap-2.5 sm:gap-3 bg-[#25D366] hover:bg-[#20bd5a] text-white px-3.5 py-3 sm:px-4 sm:py-3.5 rounded-full shadow-[0_10px_25px_rgba(37,211,102,0.4)] hover:shadow-[0_14px_32px_rgba(37,211,102,0.55)] transition-all duration-300 hover:scale-105 active:scale-95 group">
      
      <!-- Pulsing Online Live Radar Dot -->
      <span class="relative flex h-3 w-3 flex-shrink-0">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-80"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
      </span>

      <!-- WhatsApp Official Icon -->
      <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current text-white flex-shrink-0" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
      </svg>

      <!-- Text Label -->
      <span class="font-bold text-xs sm:text-sm tracking-wide flex flex-col leading-tight pr-1">
        <span class="text-[9px] uppercase font-mono-tag tracking-wider opacity-90 hidden sm:block">Instant SLA Chat</span>
        <span>WhatsApp</span>
      </span>
    </a>
  </aside>

  <?php wp_footer(); ?>
</body>
</html>
