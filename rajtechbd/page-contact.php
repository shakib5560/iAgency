<?php
/**
 * Template Name: Contact Us - RajTech BD
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri = get_template_directory_uri();

// Handle basic form submission
$message_sent = false;
$error_message = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['rajtechbd_contact_submit'] ) ) {
    if ( ! isset( $_POST['rajtechbd_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_contact_nonce'] ) ), 'rajtechbd_contact_action' ) ) {
        $error_message = 'Security check failed. Please refresh and try again.';
    } else {
        $name    = isset( $_POST['client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['client_name'] ) ) : '';
        $email   = isset( $_POST['client_email'] ) ? sanitize_email( wp_unslash( $_POST['client_email'] ) ) : '';
        $phone   = isset( $_POST['client_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['client_phone'] ) ) : '';
        $service = isset( $_POST['service_interest'] ) ? sanitize_text_field( wp_unslash( $_POST['service_interest'] ) ) : '';
        $details = isset( $_POST['project_details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['project_details'] ) ) : '';

        if ( ! empty( $name ) && ! empty( $email ) && ! empty( $details ) ) {
            $to      = 'info@rajtechbd.com';
            $subject = 'New Technical Discovery Inquiry from ' . $name . ' (' . $service . ')';
            $body    = "Name: $name\nEmail: $email\nPhone/WhatsApp: $phone\nService: $service\n\nProject Scope:\n$details";
            $headers = array( 
                'Content-Type: text/plain; charset=UTF-8', 
                "Reply-To: $name <$email>",
                'Cc: rajtechbdt@gmail.com'
            );

            // Attempt wp_mail
            wp_mail( $to, $subject, $body, $headers );
            $message_sent = true;
        } else {
            $error_message = 'Please fill out all required fields (Name, Email, and Project Scope).';
        }
    }
}

// Check if page is edited with or previewed in Elementor
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

  <!-- Optional Gutenberg Content if user entered any in block editor -->
  <?php
  if ( have_posts() ) {
      while ( have_posts() ) {
          the_post();
          $content = get_the_content();
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-contact.php -->' !== trim( $content ) && '<!-- Contact Page with Elementor support -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-8 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= CONTACT HERO ================= -->
  <section class="bg-[#0B1528] py-20 text-white border-b border-[#1E3352] bg-grid-pattern-dark">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold tracking-wider uppercase mb-4">
        DIRECT ACCESS TO PRINCIPAL ARCHITECTS
      </div>
      <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4 text-white">
        Schedule a Technical Consultation
      </h1>
      <p class="text-lg text-[#94A3B8] max-w-2xl mx-auto">
        Have a custom ERP project, website speed bottleneck, or sales automation roadmap? Let's discuss your requirements directly.
      </p>
    </div>
  </section>

  <!-- ================= CONTACT SECTION ================= -->
  <section class="py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column: Direct Agency Information -->
        <div class="lg:col-span-5 reveal">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
            LOCATION &amp; SLA SUPPORT
          </span>
          <h2 class="text-3xl font-bold text-[#0F172A] tracking-tight mb-6">
            Kuril Corporate Headquarters
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-8">
            You're invited to meet our software architects in person at our Dhaka headquarters, or collaborate with us via high-speed video call and dedicated Slack channels.
          </p>

          <!-- Contact Details Cards -->
          <div class="space-y-4 mb-8">
            <div class="p-5 rounded-lg border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PRIMARY INBOX</div>
              <a href="mailto:info@rajtechbd.com" class="text-lg font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors block">
                info@rajtechbd.com
              </a>
              <div class="mt-2 pt-2 border-t border-[#E2E8F0] flex items-center justify-between text-xs text-[#64748B]">
                <span>Secondary Mail:</span>
                <a href="mailto:rajtechbdt@gmail.com" class="font-mono-tag font-medium text-[#0284C7] hover:underline">rajtechbdt@gmail.com</a>
              </div>
            </div>

            <div class="p-5 rounded-lg border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#F59E0B] uppercase mb-1">CALL &amp; WHATSAPP</div>
              <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="text-lg font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors">
                +8801758522846
              </a>
              <p class="text-xs text-[#64748B] mt-1">Instant WhatsApp chat &amp; enterprise telephone line</p>
            </div>

            <div class="p-5 rounded-lg border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#10B981] uppercase mb-1">HEADQUARTERS ADDRESS</div>
              <div class="text-base font-bold text-[#0F172A]">
                House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.
              </div>
              <p class="text-xs text-[#64748B] mt-1">Short: Kuril, Vatara, Dhaka-1229 • In-person sprint architecture reviews</p>
            </div>
          </div>

          <!-- Fast SLA Commitment -->
          <div class="p-5 rounded-lg border border-[#BAE6FD] bg-[#F0F9FF]">
            <div class="flex items-center gap-2 text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">
              <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span> GUARANTEED RESPONSE TIME
            </div>
            <p class="text-xs text-[#0369A1] leading-relaxed">
              We respond to all technical scoping inquiries within 4 business hours. Critical enterprise SLA production alerts are handled under 15 minutes.
            </p>
          </div>
        </div>

        <!-- Right Column: Interactive Consultation Booking Form -->
        <div class="lg:col-span-7 bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-8 sm:p-10 shadow-sm reveal delay-100">
          
          <h3 class="text-2xl font-bold text-[#0F172A] mb-2">Request Technical Discovery</h3>
          <p class="text-sm text-[#475569] mb-8">Fill out the form below and an engineering lead will review your project scope.</p>

          <?php if ( $message_sent ) : ?>
            <div class="p-4 mb-6 rounded-md bg-[#DCFCE7] border border-[#86EFAC] text-[#15803D]">
              <h4 class="font-bold text-base mb-1">Thank you! Your discovery request has been received.</h4>
              <p class="text-sm">Our senior engineering leads will review your requirements and reach out within 4 business hours.</p>
            </div>
          <?php elseif ( ! empty( $error_message ) ) : ?>
            <div class="p-4 mb-6 rounded-md bg-red-50 border border-red-200 text-red-700 text-sm">
              <?php echo esc_html( $error_message ); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="" class="space-y-5">
            <?php wp_nonce_field( 'rajtechbd_contact_action', 'rajtechbd_contact_nonce' ); ?>
            <input type="hidden" name="rajtechbd_contact_submit" value="1">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="client_name" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Full Name *
                </label>
                <input type="text" id="client_name" name="client_name" required placeholder="e.g. Md. Shakib" class="form-input">
              </div>

              <div>
                <label for="client_email" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Business Email *
                </label>
                <input type="email" id="client_email" name="client_email" required placeholder="name@company.com" class="form-input">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="client_phone" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Phone / WhatsApp
                </label>
                <input type="text" id="client_phone" name="client_phone" placeholder="+8801..." class="form-input">
              </div>

              <div>
                <label for="service_interest" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Primary Capability Needed
                </label>
                <select id="service_interest" name="service_interest" class="form-select">
                  <option value="Custom ERP &amp; Inventory">Custom ERP &amp; Inventory Platform</option>
                  <option value="WordPress &amp; PageSpeed">WordPress / WooCommerce Speed &amp; Block Theme</option>
                  <option value="Shopify Plus">Shopify Plus &amp; Headless Commerce</option>
                  <option value="Mobile App Development">Mobile App (Flutter / React Native)</option>
                  <option value="Sales Development &amp; SEO">Sales Funnels &amp; Technical SEO</option>
                  <option value="Other Architecture">Other Custom Engineering</option>
                </select>
              </div>
            </div>

            <div>
              <label for="project_details" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Project Scope &amp; Requirements *
              </label>
              <textarea id="project_details" name="project_details" rows="5" required placeholder="Briefly describe your business challenge, existing system, current traffic or timeline..." class="form-textarea"></textarea>
            </div>

            <button type="submit" class="w-full py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all">
              Submit Technical Scoping Request
            </button>
            <p class="text-xs text-[#64748B] text-center mt-2">
              🔒 Confidentiality guaranteed. We are happy to execute standard NDAs prior to in-depth technical discussions.
            </p>
          </form>

        </div>

      </div>

    </div>
  </section>

<?php
endif;
get_footer();
