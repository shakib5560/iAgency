<?php
/**
 * Template Name: Terms & Conditions - RajTech BD Ltd.
 *
 * @package RajTech_BD
 */

get_header();

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

  <!-- Header Banner -->
  <section class="bg-[#F8FAFC] py-16 border-b border-[#F1F5F9] bg-grid-pattern">
    <div class="max-w-[960px] mx-auto px-6">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-wider uppercase mb-3 shadow-xs">
        LEGAL &amp; COMMERCIAL CONTRACT TERMS
      </div>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-2">
        Terms &amp; Conditions of Service
      </h1>
      <p class="text-xs font-mono-tag text-[#64748B]">
        Effective Date: January 1, 2026 • RajTech BD Limited (Incorporated in Dhaka, Bangladesh)
      </p>
    </div>
  </section>

  <!-- Legal Body -->
  <article class="py-16 bg-white">
    <div class="max-w-[960px] mx-auto px-6 entry-content text-[16px] leading-[1.8] text-[#334155]">
      
      <div class="bg-[#F8FAFC] border-l-4 border-[#0284C7] p-5 rounded-r-lg mb-8">
        <p class="text-sm m-0 text-[#1E293B]">
          <strong>Corporate Overview:</strong> These Terms and Conditions govern the provision of software engineering, custom ERP platforms, web development, mobile applications, and AI system engineering provided by <strong>RajTech BD Limited</strong> (Registration in Bangladesh under the Companies Act, 1994).
        </p>
      </div>

      <h2>1. Engagement &amp; Agile Milestone Delivery</h2>
      <p>
        Every custom development engagement is governed by an approved <strong>System Architecture Specification &amp; Statement of Work (SOW)</strong>. Work is conducted in transparent two-week agile sprints with bi-weekly review demos and milestone sign-offs.
      </p>

      <h2>2. Intellectual Property &amp; Source Code Ownership</h2>
      <p>
        Unlike restrictive SaaS vendors that trap clients in recurring per-seat subscriptions:
      </p>
      <ul>
        <li>Upon receipt of final milestone payment, <strong>100% perpetual ownership of the custom source code, database architectures, and design assets</strong> transfers irrevocably to the client.</li>
        <li>Clients retain full freedom to host on premise, deploy across private cloud providers (AWS, DigitalOcean, Google Cloud), or maintain internally without per-seat licensing penalties.</li>
      </ul>

      <h2>3. Code Quality, Bug-Fix Warranty &amp; SLAs</h2>
      <p>
        RajTech BD Limited prides itself on senior craftsmanship and old-fashioned engineering discipline:
      </p>
      <ul>
        <li><strong>Standard Post-Launch Warranty:</strong> All production deliveries include a contractual 60 to 90-day defect remediation warranty at zero additional cost.</li>
        <li><strong>Contractual 24/7 SLA Coverage:</strong> Enterprise deployments with active SLA retainers enjoy guaranteed sub-15 minute critical incident response, automated nightly off-site backups, and ongoing security patching.</li>
      </ul>

      <h2>4. Payment Terms &amp; Invoicing</h2>
      <p>
        Invoices are denominated in Bangladesh Taka (BDT) or United States Dollars (USD) as agreed in writing. Payments may be remitted via corporate bank transfer, RTGS/BEFTN, or approved corporate gateways with valid VAT chalans issued in accordance with National Board of Revenue (NBR) compliance.
      </p>

      <h2>5. Governing Law &amp; Jurisdiction</h2>
      <p>
        These terms and any dispute arising out of technical contracts shall be governed by and construed in accordance with the <strong>laws of the People's Republic of Bangladesh</strong>. Both parties submit to the exclusive jurisdiction of the competent courts of Dhaka, Bangladesh.
      </p>

      <h2>6. Corporate Contacts</h2>
      <div class="bg-[#F8FAFC] p-6 rounded-lg border border-[#E2E8F0] not-italic">
        <p class="m-0"><strong>RajTech BD Limited</strong></p>
        <p class="m-0">Corporate Headquarters: House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.</p>
        <p class="m-0">Primary Email: <a href="mailto:info@rajtechbd.com">info@rajtechbd.com</a></p>
        <p class="m-0">Secondary Email: <a href="mailto:rajtechbdt@gmail.com">rajtechbdt@gmail.com</a></p>
        <p class="m-0">Telephone / WhatsApp: <a href="https://wa.me/8801758522846">+8801758522846</a></p>
      </div>

    </div>
  </article>

<?php
endif;
get_footer();
