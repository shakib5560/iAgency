<?php
/**
 * Template Name: Privacy Policy - RajTech BD Ltd.
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
        LEGAL &amp; DATA GOVERNANCE
      </div>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-2">
        Privacy &amp; Data Protection Policy
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
          <strong>Corporate Commitment:</strong> RajTech BD Limited is a privately incorporated software engineering, enterprise ERP, modern web, and AI systems development company registered under the Companies Act of Bangladesh (Act XVIII of 1994). We maintain bank-grade confidentiality, strict non-disclosure obligations, and zero unauthorized data harvesting.
        </p>
      </div>

      <h2>1. Corporate Scope &amp; Applicable Laws</h2>
      <p>
        This Privacy Policy governs the manner in which <strong>RajTech BD Limited</strong> collects, uses, maintains, and safeguards information collected from users, clients, partners, and enterprise customers across our websites, custom ERP architectures, AI systems, mobile applications, and hosting infrastructures in accordance with the <strong>Information and Communication Technology (ICT) Act of Bangladesh</strong> and international data privacy regulations (GDPR).
      </p>

      <h2>2. Enterprise Client Data &amp; Source Code Confidentiality</h2>
      <p>
        During the engineering, audit, development, or migration of custom ERP, logistics, accounting, or database systems:
      </p>
      <ul>
        <li><strong>100% Client Ownership:</strong> All business records, customer transactions, inventory logs, accounting books, and custom software codebases remain the exclusive property of the client.</li>
        <li><strong>No Third-Party Reselling:</strong> RajTech BD Limited never monetizes, rents, or discloses proprietary client data or operational trade secrets to any third party.</li>
        <li><strong>Standard NDAs:</strong> We routinely execute mutual Non-Disclosure Agreements (NDAs) prior to architectural scoping and code review sprints.</li>
      </ul>

      <h2>3. Artificial Intelligence &amp; Machine Learning Data Guardrails</h2>
      <p>
        When RajTech BD Limited architects custom AI pipelines, automated sales development bots, or neural models:
      </p>
      <ul>
        <li>Client operational data, internal documents, and private communications are <strong>never</strong> ingested into public foundation models (e.g. OpenAI public training pools) without explicit written agreement.</li>
        <li>All private embeddings and vector databases (pgvector, Redis) are isolated within dedicated virtual private clouds (VPC).</li>
      </ul>

      <h2>4. Information Security &amp; Database Safeguards</h2>
      <p>
        We adopt strict data collection, storage, and processing practices paired with multi-layer SSL/TLS encryption, automated nightly encrypted off-site backups, row-level database authorization, and role-based access control (RBAC) to protect against unauthorized access, alteration, or disclosure.
      </p>

      <h2>5. Corporate Headquarters &amp; Grievance Contact</h2>
      <p>
        For inquiries regarding data governance, contract compliance, or privacy requests, please contact our legal counsel and data protection officer:
      </p>
      <div class="bg-[#F8FAFC] p-6 rounded-lg border border-[#E2E8F0] not-italic">
        <p class="m-0"><strong>RajTech BD Limited</strong></p>
        <p class="m-0">Attention: Legal &amp; Data Protection Officer</p>
        <p class="m-0">Headquarters: House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.</p>
        <p class="m-0">Primary Email: <a href="mailto:info@rajtechbd.com">info@rajtechbd.com</a></p>
        <p class="m-0">Secondary Email: <a href="mailto:rajtechbdt@gmail.com">rajtechbdt@gmail.com</a></p>
        <p class="m-0">Direct Telephone / WhatsApp: <a href="https://wa.me/8801758522846">+8801758522846</a></p>
      </div>

    </div>
  </article>

<?php
endif;
get_footer();
