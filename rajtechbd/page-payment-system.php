<?php
/**
 * Template Name: Payment System - RajTech BD Limited
 *
 * @package RajTech_BD
 */

get_header();

$theme_uri    = get_template_directory_uri();
$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page ? esc_url( get_permalink( $contact_page->ID ) ) : esc_url( home_url( '/contact/' ) );

// Handle Payment Verification Form Submission
$payment_verified_msg = false;
$payment_error_msg    = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['rajtechbd_payment_verify_submit'] ) ) {
    if ( ! isset( $_POST['rajtechbd_payment_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_payment_nonce'] ) ), 'rajtechbd_payment_action' ) ) {
        $payment_error_msg = 'Security verification failed. Please refresh the page and try again.';
    } else {
        $payer_name       = isset( $_POST['payer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['payer_name'] ) ) : '';
        $payer_email      = isset( $_POST['payer_email'] ) ? sanitize_email( wp_unslash( $_POST['payer_email'] ) ) : '';
        $payer_phone      = isset( $_POST['payer_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['payer_phone'] ) ) : '';
        $invoice_no       = isset( $_POST['invoice_no'] ) ? sanitize_text_field( wp_unslash( $_POST['invoice_no'] ) ) : '';
        $payment_method   = isset( $_POST['payment_method'] ) ? sanitize_text_field( wp_unslash( $_POST['payment_method'] ) ) : '';
        $amount_paid      = isset( $_POST['amount_paid'] ) ? sanitize_text_field( wp_unslash( $_POST['amount_paid'] ) ) : '';
        $currency         = isset( $_POST['currency'] ) ? sanitize_text_field( wp_unslash( $_POST['currency'] ) ) : 'BDT';
        $transaction_id   = isset( $_POST['transaction_id'] ) ? sanitize_text_field( wp_unslash( $_POST['transaction_id'] ) ) : '';
        $additional_notes = isset( $_POST['additional_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['additional_notes'] ) ) : '';

        if ( ! empty( $payer_name ) && ! empty( $payer_email ) && ! empty( $transaction_id ) && ! empty( $amount_paid ) ) {
            $to      = 'info@rajtechbd.com';
            $subject = 'Payment Verification Submission: ' . $payer_name . ' (' . $amount_paid . ' ' . $currency . ' via ' . $payment_method . ')';
            $body    = "New Payment Verification Submission:\n\n"
                     . "Client Name: $payer_name\n"
                     . "Email: $payer_email\n"
                     . "Phone / WhatsApp: $payer_phone\n"
                     . "Invoice Reference: " . ( $invoice_no ? $invoice_no : 'Not Specified' ) . "\n"
                     . "Payment Channel: $payment_method\n"
                     . "Amount Paid: $amount_paid $currency\n"
                     . "Transaction ID / Cheque / Slip Ref: $transaction_id\n\n"
                     . "Additional Notes:\n$additional_notes\n\n"
                     . "Submitted On: " . current_time( 'mysql' ) . "\n"
                     . "Client IP: " . ( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'Unknown' );
            $headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                "Reply-To: $payer_name <$payer_email>",
                'Cc: rajtechbdt@gmail.com'
            );

            // Attempt wp_mail
            wp_mail( $to, $subject, $body, $headers );
            $payment_verified_msg = true;
        } else {
            $payment_error_msg = 'Please complete all required fields (Name, Email, Amount, and Transaction ID / Cheque No.).';
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

  <!-- ================= PAYMENT SYSTEM JSON-LD SCHEMAS (SEO) ================= -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebPage",
        "@id": "https://rajtechbd.com/payment-system/#webpage",
        "url": "https://rajtechbd.com/payment-system/",
        "name": "Payment System & Accepted Methods - RajTech BD Limited",
        "description": "Official corporate payment channels for RajTech BD Limited. We securely accept Visa cards, Bank Transfer (EFTN, NPSB, RTGS, SWIFT), bKash, Rocket, Nagad, and Bank Cheque.",
        "breadcrumb": {
          "@id": "https://rajtechbd.com/payment-system/#breadcrumb"
        },
        "inLanguage": "en-US"
      },
      {
        "@type": "BreadcrumbList",
        "@id": "https://rajtechbd.com/payment-system/#breadcrumb",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://rajtechbd.com/"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Payment System",
            "item": "https://rajtechbd.com/payment-system/"
          }
        ]
      },
      {
        "@type": "FinancialService",
        "@id": "https://rajtechbd.com/#financialService",
        "name": "RajTech BD Limited Billing & Payment Desk",
        "parentOrganization": {
          "@type": "Organization",
          "name": "RajTech BD Limited",
          "url": "https://rajtechbd.com/",
          "logo": "https://rajtechbd.com/wp-content/uploads/2024/09/black-logo-1.png",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "House Kha-92/1, Kuril, Vatara",
            "addressLocality": "Dhaka",
            "postalCode": "1229",
            "addressCountry": "BD"
          },
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+8801758522846",
            "contactType": "billing support",
            "email": "info@rajtechbd.com"
          }
        },
        "paymentAccepted": [
          "Visa Credit Card",
          "Visa Debit Card",
          "Bank Wire Transfer (EFTN, NPSB, RTGS, SWIFT)",
          "bKash (Merchant & Personal)",
          "DBBL Rocket",
          "Nagad",
          "Account Payee Bank Cheque",
          "Bank Pay Order"
        ],
        "currenciesAccepted": "BDT, USD, EUR, GBP",
        "priceRange": "$$"
      },
      {
        "@type": "FAQPage",
        "@id": "https://rajtechbd.com/payment-system/#faq",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "What payment methods are officially accepted by RajTech BD Limited?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "RajTech BD Limited accepts six primary payment channels: 1) Visa (Credit & Debit cards worldwide), 2) Corporate Bank Transfer (EFTN, NPSB, RTGS, and international SWIFT wire), 3) bKash (Merchant QR and Personal), 4) Dutch-Bangla Bank Rocket, 5) Nagad, and 6) Account Payee Bank Cheque or Corporate Pay Order."
            }
          },
          {
            "@type": "Question",
            "name": "How quickly is my payment verified and reconciled?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Payments made via Visa, bKash, Rocket, Nagad, and NPSB instant bank transfers are verified within 15 to 30 minutes during standard business hours. Once verified, our accounts desk dispatches an official signed and stamped electronic Money Receipt and updates your project milestone status immediately."
            }
          },
          {
            "@type": "Question",
            "name": "Can international clients pay in USD, EUR, or GBP via Visa or Wire Transfer?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. International clients can pay using any global Visa card through our 256-bit 3D Secure gateway, or via direct cross-border SWIFT wire transfer to our corporate foreign currency settlement accounts. Invoices can be denominated in USD, EUR, GBP, or BDT."
            }
          },
          {
            "@type": "Question",
            "name": "How does our company handle corporate Tax Deducted at Source (TDS) and VAT (VDS)?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "RajTech BD Limited is a registered corporate entity under the Companies Act 1994 with active TIN and BIN registrations. Corporate clients authorized as withholding entities may deduct statutory TDS and VDS under NBR regulations upon providing the official Treasury Challan (Mushak-6.3 challan copy)."
            }
          },
          {
            "@type": "Question",
            "name": "What reference should I use when paying via bKash, Rocket, or Nagad?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Always input your official RajTech BD Invoice Number (e.g. RTBD-1048) or your primary domain/project name into the 'Reference' field of the MFS transaction. This allows our automated reconciliation system to credit your invoice without delay."
            }
          },
          {
            "@type": "Question",
            "name": "How do we submit an Account Payee Bank Cheque or Pay Order?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Cheques and pay orders should be issued in favor of 'RajTech BD Limited' and crossed 'Account Payee Only'. They can be delivered by hand to our corporate headquarters at House Kha-92/1, Kuril, Vatara, Dhaka-1229, sent via registered courier, or deposited directly into our bank account."
            }
          }
        ]
      }
    ]
  }
  </script>

  <!-- Optional Gutenberg Content if user entered any in block editor -->
  <?php
  if ( have_posts() ) {
      while ( have_posts() ) {
          the_post();
          $content = get_the_content();
          if ( ! empty( trim( $content ) ) && '<!-- Handled by page-payment-system.php -->' !== trim( $content ) ) {
              echo '<div class="max-w-[1280px] mx-auto px-6 py-6 entry-content">';
              the_content();
              echo '</div>';
          }
      }
  }
  ?>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="relative bg-[#0B1528] pt-20 pb-24 text-white border-b border-[#1E3352] bg-grid-pattern-dark overflow-hidden">
    <!-- Ambient glowing backdrop effect -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[720px] h-[360px] bg-gradient-to-tr from-[#0284C7]/20 via-[#F59E0B]/10 to-transparent blur-3xl pointer-events-none"></div>

    <div class="relative max-w-[1280px] mx-auto px-6 text-center">
      
      <!-- Breadcrumb Navigation -->
      <nav class="flex items-center justify-center gap-2 text-xs font-mono-tag text-[#94A3B8] mb-6" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
        <span>/</span>
        <span class="text-[#38BDF8]">Payment System</span>
      </nav>

      <!-- Badge -->
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#132238] border border-[#1E3352] text-[#F59E0B] text-xs font-mono-tag font-bold tracking-wider uppercase mb-6 shadow-sm">
        <span class="w-2 h-2 rounded-full bg-[#10B981] pulse-dot"></span>
        OFFICIAL CORPORATE BILLING &amp; PAYMENT GATEWAYS
      </div>

      <!-- Main Headline -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white max-w-4xl mx-auto leading-tight">
        Seamless, Secure &amp; Compliant <br class="hidden sm:inline">
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-[#38BDF8]">Payment System</span>
      </h1>

      <!-- Subtitle -->
      <p class="text-base sm:text-lg text-[#94A3B8] max-w-3xl mx-auto leading-relaxed mb-10">
        RajTech BD Limited offers transparent, verified, and multi-channel payment options for Bangladeshi enterprises and global technology partners. Settle project milestones, retainers, and enterprise software licenses with bank-grade 256-bit SSL encryption.
      </p>

      <!-- Quick Method Badges Preview -->
      <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 max-w-3xl mx-auto">
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#38BDF8]">💳 Visa</span> Cards (Global &amp; Local)
        </div>
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#F59E0B]">🏛️ Bank Transfer</span> (EFTN / NPSB / SWIFT)
        </div>
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#E2136E]">📱 bKash</span> (Merchant &amp; Personal)
        </div>
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#8C3494]">🚀 Rocket</span> (DBBL USSD *322#)
        </div>
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#ED1C24]">⚡ Nagad</span> (Postal DFS *167#)
        </div>
        <div class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#132238]/80 border border-[#1E3352] text-xs text-slate-200">
          <span class="font-bold text-[#10B981]">📋 Bank Cheque</span> &amp; Pay Order
        </div>
      </div>

    </div>
  </section>

  <!-- ================= 2. TRUST & SLA HIGHLIGHTS BAR ================= -->
  <section class="bg-[#132238] border-b border-[#1E3352] py-6 text-slate-300">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-[#1E3352]/70">
        
        <div class="pt-4 md:pt-0 flex flex-col items-center">
          <div class="text-xl sm:text-2xl font-extrabold text-white font-mono-tag">256-Bit SSL</div>
          <p class="text-xs text-[#94A3B8] mt-1">Bank-Grade End-to-End Encryption</p>
        </div>

        <div class="pt-4 md:pt-0 flex flex-col items-center">
          <div class="text-xl sm:text-2xl font-extrabold text-[#10B981] font-mono-tag">&lt; 15 Mins</div>
          <p class="text-xs text-[#94A3B8] mt-1">Rapid Payment Reconciliation &amp; Receipt</p>
        </div>

        <div class="pt-4 md:pt-0 flex flex-col items-center">
          <div class="text-xl sm:text-2xl font-extrabold text-[#F59E0B] font-mono-tag">0% Hidden Fee</div>
          <p class="text-xs text-[#94A3B8] mt-1">Direct Bank Wire &amp; Corporate Invoicing</p>
        </div>

        <div class="pt-4 md:pt-0 flex flex-col items-center">
          <div class="text-xl sm:text-2xl font-extrabold text-[#38BDF8] font-mono-tag">NBR Compliant</div>
          <p class="text-xs text-[#94A3B8] mt-1">Mushak-6.3 VAT &amp; TDS Tax Receipts</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 3. INTERACTIVE CATEGORY TABS ================= -->
  <section class="py-8 bg-[#F8FAFC] border-b border-[#E2E8F0] sticky top-20 z-40 shadow-xs backdrop-blur-md bg-[#F8FAFC]/95">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="flex items-center justify-between gap-4 overflow-x-auto pb-2 sm:pb-0 scrollbar-none">
        <span class="text-xs font-mono-tag font-bold text-[#64748B] uppercase tracking-wider hidden lg:inline-block shrink-0">
          SELECT CHANNELS:
        </span>
        <div class="flex items-center gap-2 sm:gap-3 shrink-0" id="payment-filter-group">
          <button type="button" data-filter="all" class="filter-tab-btn active px-4 py-2 rounded-full text-xs font-bold transition-all bg-[#0F172A] text-white shadow-xs">
            All Channels (6)
          </button>
          <button type="button" data-filter="cards" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Visa &amp; Cards
          </button>
          <button type="button" data-filter="bank" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Bank Wire &amp; EFTN
          </button>
          <button type="button" data-filter="mfs" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            MFS (bKash / Rocket / Nagad)
          </button>
          <button type="button" data-filter="cheque" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Bank Cheque &amp; Pay Order
          </button>
        </div>
        <a href="#verify-payment" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-md bg-[#0284C7] text-white text-xs font-bold hover:bg-[#0369A1] transition-all shrink-0">
          <span>Notify Accounts Desk</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= 4. ALL 6 PAYMENT METHODS (MAIN GRID) ================= -->
  <section class="py-16 sm:py-20 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          OFFICIAL SETTLEMENT DETAILS
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
          Choose Your Preferred Payment Channel
        </h2>
        <p class="text-sm sm:text-base text-[#64748B] mt-3">
          Click any copy button to immediately copy account numbers or routing details to your clipboard.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="payment-methods-grid">

        <!-- ================= METHOD 1: VISA ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="cards">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Visa Custom Vector Badge -->
              <div class="w-14 h-14 rounded-xl bg-[#0A2540] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 32" class="w-10 h-7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.5 21.5L21.8 10.5H24.3L22 21.5H19.5ZM16.2 10.5L13.8 18.2L13.5 16.8C13.0 15.1 11.6 13.3 9.9 12.3L12.3 21.5H15L19.1 10.5H16.2ZM32.6 21.5H35L33.5 10.5H31.3C30.8 10.5 30.3 10.8 30.1 11.3L25.8 21.5H28.6L29.2 19.9H32.4L32.6 21.5ZM29.9 17.8L31.3 14.1L32.1 17.8H29.9ZM28.5 13.5C28.5 12.1 27.2 11.5 25.8 11.5C24.3 11.5 23.4 12.2 23.4 13.1C23.4 14.1 24.3 14.6 25.4 15.1C26.5 15.6 27.0 16.0 27.0 16.8C27.0 17.8 25.8 18.5 24.5 18.5C23.1 18.5 22.3 17.8 22.3 17.8L21.9 19.8C21.9 19.8 23.1 20.3 24.4 20.3C26.9 20.3 28.5 19.0 28.5 16.9C28.5 15.7 27.6 14.9 26.3 14.3C25.3 13.8 24.7 13.5 24.7 12.9C24.7 12.3 25.3 11.8 26.2 11.8C27.1 11.8 27.9 12.2 27.9 12.2L28.5 13.5Z" fill="#FFFFFF"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#F0F9FF] text-[#0284C7] border border-[#BAE6FD] mb-1">
                  CARDS &amp; GLOBAL
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Visa (Credit &amp; Debit Cards)</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Real-time Instant
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Accepting all local Bangladeshi and international Visa Credit, Debit, and Prepaid cards. Payments are secured via 3D Secure 2.0 (Verified by Visa / OTP) with automated invoice reconciliation.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3 text-xs sm:text-sm">
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Supported Card Tiers</span>
              <span class="font-bold text-[#0F172A] text-right">Visa Classic, Gold, Platinum, Signature, Infinite</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Supported Currencies</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">BDT (৳), USD ($), EUR (€), GBP (£)</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Security Protocol</span>
              <span class="font-bold text-[#10B981] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path></svg>
                3D Secure 2.0 + 256-Bit SSL
              </span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Payment Link Request</span>
              <span class="text-[#0284C7] font-bold">Generated with Unique Invoice ID</span>
            </div>
          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via Visa:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open your formal milestone invoice received from RajTech BD.</li>
              <li>Click the secure <strong>"Pay with Visa / Card"</strong> button inside the invoice email.</li>
              <li>Enter your 16-digit card number, expiry date, and CVV on the encrypted checkout screen.</li>
              <li>Authenticate using the OTP sent by your issuing bank.</li>
            </ol>
          </div>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-xs hover:bg-[#0369A1] transition-all">
              <span>Request Visa Payment Link</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD%20Finance,%20I%20would%20like%20to%20pay%20my%20invoice%20via%20Visa%20card." target="_blank" rel="noopener" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-xs font-bold text-[#0F172A] hover:bg-slate-100 transition-all">
              <span>WhatsApp Invoice Link</span>
            </a>
          </div>
        </article>

        <!-- ================= METHOD 2: BANK TRANSFER ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="bank">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Bank Vector Badge -->
              <div class="w-14 h-14 rounded-xl bg-[#0B1528] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 10L10 18V20H38V18L24 10ZM14 22V32H18V22H14ZM22 22V32H26V22H22ZM30 22V32H34V22H30ZM9 34V36H39V34H9ZM8 38V40H40V38H8Z" fill="#38BDF8"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#EFF6FF] text-[#1D4ED8] border border-[#BFDBFE] mb-1">
                  EFTN / NPSB / RTGS / SWIFT
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Corporate Bank Transfer</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#0284C7] bg-[#F0F9FF] px-2.5 py-1 rounded-md border border-[#BAE6FD]">
              Zero Surcharge
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            The standard channel for corporate contracts, monthly retainers, and high-value software architecture sprints. Supports direct real-time NPSB, BEFTN, high-value RTGS, and cross-border SWIFT wire transfers.
          </p>

          <!-- Bank Account Cards with Copy Button -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Account Name:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag" id="bank-holder">RAJTECH BD LIMITED</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="bank-holder" title="Copy Account Name">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Bank Name:</span>
              <span class="font-bold text-[#0F172A]">Dutch-Bangla Bank Limited (DBBL)</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Corporate Account No:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-sm bg-white px-2 py-0.5 rounded border border-[#CBD5E1]" id="bank-acc-dbbl">117.110.0038942</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="bank-acc-dbbl" title="Copy Account Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Branch &amp; Routing No:</span>
              <div class="flex items-center gap-2">
                <span class="font-medium text-[#0F172A]">Kuril / Pragati Sarani Branch • </span>
                <span class="font-mono-tag font-bold text-[#0F172A]" id="bank-routing">090272891</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="bank-routing" title="Copy Routing Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
              <span class="text-[#64748B] font-medium">SWIFT / BIC (Cross-Border):</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A] bg-white px-2 py-0.5 rounded border border-[#CBD5E1]" id="bank-swift">DBBLBDDH</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="bank-swift" title="Copy SWIFT Code">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

          </div>

          <!-- Settlement Timelines -->
          <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B] mb-6">
            <span class="px-2 py-1 bg-slate-100 rounded font-mono-tag">NPSB: Real-time</span>
            <span class="px-2 py-1 bg-slate-100 rounded font-mono-tag">RTGS: &lt; 30 Mins (&gt; ৳1,00,000)</span>
            <span class="px-2 py-1 bg-slate-100 rounded font-mono-tag">BEFTN: Same/Next Business Day</span>
            <span class="px-2 py-1 bg-slate-100 rounded font-mono-tag">SWIFT: 1-3 Banking Days</span>
          </div>

          <!-- Bottom Action -->
          <div class="flex items-center justify-between pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#0284C7] hover:underline">
              Submit Bank Wire Transfer Slip
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#94A3B8]">Secondary Bank (City Bank) available on request</span>
          </div>
        </article>

        <!-- ================= METHOD 3: BKASH ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- bKash Vector Logo -->
              <div class="w-14 h-14 rounded-xl bg-[#E2136E] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 6L38 18L30 34L16 40L20 25L10 19L24 6Z" fill="#FFFFFF"/>
                  <path d="M24 6L30 34L20 25Z" fill="#FCE7F3"/>
                  <path d="M38 18L30 34L40 28Z" fill="#FFFFFF"/>
                  <path d="M16 40L20 25L12 30Z" fill="#FCE7F3"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#FDF2F8] text-[#BE185D] border border-[#FBCFE8] mb-1">
                  MOBILE FINANCIAL SERVICE (MFS)
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">bKash Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#BE185D] bg-[#FDF2F8] px-2.5 py-1 rounded-md border border-[#FBCFE8]">
              USSD *247# &amp; App
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Instant mobile settlement with zero fees on merchant payments. Supports direct bKash App QR scanning, Make Payment gateway, and offline USSD dialling.
          </p>

          <!-- Account Specs -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">bKash Merchant Account:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#BE185D] bg-pink-50 px-2.5 py-0.5 rounded border border-pink-200" id="bkash-merchant">01758522846</span>
                <button type="button" class="copy-btn text-[#BE185D] hover:text-[#9D174D] p-1 rounded hover:bg-white" data-copy-target="bkash-merchant" title="Copy bKash Merchant Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Counter Number:</span>
              <span class="font-mono-tag font-bold text-[#0F172A] bg-white px-2 py-0.5 rounded border border-[#CBD5E1]">1</span>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Payment Reference:</span>
              <span class="font-mono-tag font-bold text-[#0284C7]">Your Invoice ID (e.g. RTBD-1048)</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
              <span class="text-[#64748B] font-medium">bKash Personal / Direct:</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A]" id="bkash-personal">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="bkash-personal" title="Copy bKash Personal Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">bKash Payment Steps (App or Dial *247#):</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open <strong>bKash App</strong> and tap <strong>"Payment"</strong> (or dial <code class="font-mono-tag bg-slate-100 px-1 rounded">*247#</code> &gt; 3. Payment).</li>
              <li>Enter Merchant Number: <strong class="font-mono-tag text-[#BE185D]">01758522846</strong>.</li>
              <li>Input the Invoice Amount in BDT.</li>
              <li>Enter Reference as your <strong>Invoice ID</strong> and Counter as <strong class="font-mono-tag">1</strong>.</li>
              <li>Enter your PIN to confirm. Note the <strong>TrxID</strong> for receipt generation.</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex items-center justify-between pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#BE185D] hover:underline">
              Submit bKash TrxID
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#10B981] font-bold">✓ 0% Fee on Merchant Pay</span>
          </div>
        </article>

        <!-- ================= METHOD 4: ROCKET ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Rocket Vector Logo -->
              <div class="w-14 h-14 rounded-xl bg-[#8C3494] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 10C24 10 28 15 28 22C31 22 34 24 34 26L30 28L31 36L27 33L24 37L21 33L17 36L18 28L14 26C14 24 17 22 20 22C20 15 24 10 24 10Z" fill="#FFFFFF"/>
                  <circle cx="24" cy="20" r="2.5" fill="#8C3494"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#FAF5FF] text-[#7E22CE] border border-[#E9D5FF] mb-1">
                  DUTCH-BANGLA BANK (DBBL)
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Rocket Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#7E22CE] bg-[#FAF5FF] px-2.5 py-1 rounded-md border border-[#E9D5FF]">
              USSD *322# &amp; App
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Integrated Dutch-Bangla Bank Mobile Banking (DBBL Rocket) system. Directly connected to our main corporate DBBL accounts for automated clearance.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Rocket Account No (12-Digit):</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#7E22CE] bg-purple-50 px-2.5 py-0.5 rounded border border-purple-200" id="rocket-number">01758522846-8</span>
                <button type="button" class="copy-btn text-[#7E22CE] hover:text-[#6B21A8] p-1 rounded hover:bg-white" data-copy-target="rocket-number" title="Copy Rocket Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Biller / Merchant ID:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">01758522846</span>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Account Title:</span>
              <span class="font-bold text-[#0F172A]">RajTech BD Limited / DBBL Corp</span>
            </div>

            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Reference Field:</span>
              <span class="font-mono-tag font-bold text-[#0284C7]">Your Invoice ID (No Spaces)</span>
            </div>

          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via Rocket:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Dial <code class="font-mono-tag bg-slate-100 px-1 rounded">*322#</code> from your phone or open the <strong>Rocket App</strong>.</li>
              <li>Select <strong>Payment</strong> or <strong>Merchant Pay</strong>.</li>
              <li>Enter Rocket Number <strong class="font-mono-tag text-[#7E22CE]">017585228468</strong> (with check digit).</li>
              <li>Input Invoice Number as reference and the invoice amount.</li>
              <li>Enter your Rocket PIN to complete the transaction.</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex items-center justify-between pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#7E22CE] hover:underline">
              Submit Rocket Transaction ID
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#94A3B8]">Direct DBBL Core Banking Link</span>
          </div>
        </article>

        <!-- ================= METHOD 5: NAGAD ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Nagad Vector Logo -->
              <div class="w-14 h-14 rounded-xl bg-[#ED1C24] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 10C24 10 16 19 16 26C16 30.4 19.6 34 24 34C28.4 34 32 30.4 32 26C32 19 24 10 24 10Z" fill="#FFFFFF"/>
                  <path d="M24 16C24 16 19 22 19 26C19 28.8 21.2 31 24 31C26.8 31 29 28.8 29 26C29 22 24 16 24 16Z" fill="#F7941D"/>
                  <circle cx="24" cy="25" r="2.5" fill="#FFFFFF"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#FEF2F2] text-[#DC2626] border border-[#FECACA] mb-1">
                  POSTAL DIGITAL FINANCIAL SERVICE
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Nagad Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#DC2626] bg-[#FEF2F2] px-2.5 py-1 rounded-md border border-[#FECACA]">
              USSD *167# &amp; App
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Fast, secure payments via Bangladesh Post Office Digital Financial Service (Nagad). Supports App payment, QR scan, and zero-data USSD dialing from any mobile network.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Nagad Merchant Account:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#DC2626] bg-red-50 px-2.5 py-0.5 rounded border border-red-200" id="nagad-merchant">01758522846</span>
                <button type="button" class="copy-btn text-[#DC2626] hover:text-[#B91C1C] p-1 rounded hover:bg-white" data-copy-target="nagad-merchant" title="Copy Nagad Merchant Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Counter Number:</span>
              <span class="font-mono-tag font-bold text-[#0F172A] bg-white px-2 py-0.5 rounded border border-[#CBD5E1]">1</span>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Reference Field:</span>
              <span class="font-mono-tag font-bold text-[#0284C7]">Invoice ID</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
              <span class="text-[#64748B] font-medium">Nagad Personal / Direct:</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A]" id="nagad-personal">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="nagad-personal" title="Copy Nagad Personal Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">Nagad Payment Procedure:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open <strong>Nagad App</strong> and select <strong>"Merchant Pay"</strong> (or dial <code class="font-mono-tag bg-slate-100 px-1 rounded">*167#</code> &gt; 4. Payment).</li>
              <li>Input Merchant Number: <strong class="font-mono-tag text-[#DC2626]">01758522846</strong>.</li>
              <li>Enter exact Amount matching your invoice.</li>
              <li>Enter your <strong>Invoice ID</strong> as Reference and Counter <strong class="font-mono-tag">1</strong>.</li>
              <li>Type PIN and tap &amp; hold to dispatch. Retain the Nagad Transaction ID.</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex items-center justify-between pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#DC2626] hover:underline">
              Submit Nagad TrxID
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#10B981] font-bold">✓ Lowest MFS Cash-out Overhead</span>
          </div>
        </article>

        <!-- ================= METHOD 6: BANK CHEQUE ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="cheque">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Cheque Vector Badge -->
              <div class="w-14 h-14 rounded-xl bg-[#0F172A] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="10" y="14" width="28" height="20" rx="3" stroke="#10B981" stroke-width="2.5"/>
                  <line x1="15" y1="20" x2="27" y2="20" stroke="#10B981" stroke-width="2" stroke-linecap="round"/>
                  <line x1="15" y1="25" x2="33" y2="25" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
                  <line x1="26" y1="29" x2="33" y2="29" stroke="#F59E0B" stroke-width="1.5" stroke-linecap="round"/>
                  <circle cx="15" cy="29" r="1.5" fill="#10B981"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#ECFDF5] text-[#047857] border border-[#A7F3D0] mb-1">
                  CORPORATE GOVERNANCE
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Bank Cheque &amp; Pay Order</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#047857] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              Account Payee Only
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Preferred by large corporate accounts departments, universities, state institutions, and multi-tenant enterprise ERP procurement teams requiring formal physical audit trails.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Cheque / Pay Order Beneficiary:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag" id="cheque-payee">RAJTECH BD LIMITED</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white" data-copy-target="cheque-payee" title="Copy Payee Name">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Crossing Specification:</span>
              <span class="font-mono-tag font-bold text-[#B91C1C] bg-red-50 px-2 py-0.5 rounded border border-red-200">
                A/C PAYEE ONLY (Strictly Non-Negotiable)
              </span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-start justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Physical Delivery Address:</span>
              <span class="font-medium text-[#0F172A] text-right max-w-xs">
                House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.
              </span>
            </div>

            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Clearing House:</span>
              <span class="font-mono-tag text-[#475569]">Bangladesh Automated Clearing House (BACH)</span>
            </div>

          </div>

          <!-- Submission Methods -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">Cheque Submission Channels:</h4>
            <ul class="list-disc list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li><strong>Direct Hand Delivery:</strong> Hand over to our Accounts &amp; Finance desk at our Kuril headquarters against an immediate written acknowledgment.</li>
              <li><strong>Courier Dispatch:</strong> Send via registered courier (Sundarban, SA Paribahan, DHL) with tracking number emailed to <a href="mailto:info@rajtechbd.com" class="text-[#0284C7] underline">info@rajtechbd.com</a>.</li>
              <li><strong>Direct Deposit:</strong> Deposit the cheque at any DBBL branch across Bangladesh directly into our corporate account and upload the counterfoil slip.</li>
            </ul>
          </div>

          <!-- Bottom Action -->
          <div class="flex items-center justify-between pt-4 border-t border-[#F1F5F9]">
            <a href="#verify-payment" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#047857] hover:underline">
              Upload Cheque Deposit Slip
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#94A3B8]">High-Value Clearing: Same Day</span>
          </div>
        </article>

      </div>

    </div>
  </section>

  <!-- ================= 5. 3-STEP SIMPLE PAYMENT WORKFLOW ================= -->
  <section class="py-20 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          TRANSPARENT BILLING PROTOCOL
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
          How Billing &amp; Settlement Works
        </h2>
        <p class="text-sm sm:text-base text-[#64748B] mt-3">
          Every financial milestone at RajTech BD Limited follows a deterministic 3-step verification loop.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
        
        <!-- Step 1 -->
        <div class="bg-white p-8 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-12 h-12 rounded-xl bg-[#0B1528] text-white flex items-center justify-center font-mono-tag font-bold text-lg mb-6 shadow-sm">
            01
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Receive Official Invoice</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Prior to any transfer, our finance team issues an itemized digital invoice stating the milestone deliverables, contract reference, and unique Invoice Number (e.g. <code class="font-mono-tag bg-slate-100 px-1 py-0.5 rounded text-xs">RTBD-2026-XXXX</code>).
          </p>
          <div class="mt-4 pt-4 border-t border-[#F1F5F9] text-xs font-mono-tag text-[#0284C7]">
            ✓ Itemized Milestone Breakdown
          </div>
        </div>

        <!-- Step 2 -->
        <div class="bg-white p-8 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-12 h-12 rounded-xl bg-[#0284C7] text-white flex items-center justify-center font-mono-tag font-bold text-lg mb-6 shadow-sm">
            02
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Execute Payment</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Execute the payment using your preferred channel: Visa card, Bank Wire, bKash, Rocket, Nagad, or Bank Cheque. Always include your <strong>Invoice ID</strong> in the reference note.
          </p>
          <div class="mt-4 pt-4 border-t border-[#F1F5F9] text-xs font-mono-tag text-[#10B981]">
            ✓ 6 Instant &amp; Corporate Channels
          </div>
        </div>

        <!-- Step 3 -->
        <div class="bg-white p-8 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-12 h-12 rounded-xl bg-[#10B981] text-white flex items-center justify-center font-mono-tag font-bold text-lg mb-6 shadow-sm">
            03
          </div>
          <h3 class="text-xl font-bold text-[#0F172A] mb-3">Instant Money Receipt</h3>
          <p class="text-sm text-[#475569] leading-relaxed">
            Notify our accounts desk below or via WhatsApp. Our finance team reconciles the transaction within 15–30 minutes, releases an official stamped e-receipt, and begins or transitions your engineering sprint.
          </p>
          <div class="mt-4 pt-4 border-t border-[#F1F5F9] text-xs font-mono-tag text-[#F59E0B]">
            ✓ Stamped Money Receipt &amp; Mushak-6.3
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ================= 6. PAYMENT NOTIFICATION & VERIFICATION FORM ================= -->
  <section id="verify-payment" class="py-20 sm:py-24 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column: Verification Guidelines & Direct Contacts -->
        <div class="lg:col-span-5">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
            RAPID RECONCILIATION
          </span>
          <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight mb-4">
            Notify the Accounts Desk
          </h2>
          <p class="text-base text-[#475569] leading-relaxed mb-8">
            Completed a payment via Visa, bank transfer, bKash, Rocket, Nagad, or cheque? Submit your transaction reference here for expedited verification and rapid money receipt dispatch.
          </p>

          <!-- Accounts Desk Contact Box -->
          <div class="space-y-4 mb-8">
            
            <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">DEDICATED BILLING DESK</div>
              <a href="mailto:info@rajtechbd.com" class="text-lg font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors block font-mono-tag">
                info@rajtechbd.com
              </a>
              <div class="text-xs text-[#64748B] mt-1">Secondary: rajtechbdt@gmail.com</div>
            </div>

            <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#10B981] uppercase mb-1">INSTANT WHATSAPP NOTIFICATION</div>
              <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD%20Finance,%20I%20have%20completed%20a%20payment%20and%20would%20like%20to%20verify%20it." target="_blank" rel="noopener" class="text-lg font-bold text-[#0F172A] hover:text-[#10B981] transition-colors block font-mono-tag">
                +8801758522846
              </a>
              <p class="text-xs text-[#64748B] mt-1">Send screenshots of deposit slips or bKash TrxID for sub-10 minute confirmation.</p>
            </div>

            <div class="p-5 rounded-xl border border-[#BAE6FD] bg-[#F0F9FF]">
              <div class="flex items-center gap-2 text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">
                <svg class="w-4 h-4 text-[#0284C7]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                LEGAL &amp; TAX COMPLIANCE GUARANTEE
              </div>
              <p class="text-xs text-[#0369A1] leading-relaxed">
                RajTech BD Limited complies strictly with the National Board of Revenue (NBR) and Bangladesh Bank regulations. Corporate VAT invoices with Mushak-6.3 are issued for every commercial engagement.
              </p>
            </div>

          </div>
        </div>

        <!-- Right Column: Verification Form -->
        <div class="lg:col-span-7 bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-8 sm:p-10 shadow-sm">
          
          <h3 class="text-2xl font-bold text-[#0F172A] mb-2">Payment Verification Form</h3>
          <p class="text-sm text-[#475569] mb-8">Enter your transfer details below to alert our finance team immediately.</p>

          <?php if ( $payment_verified_msg ) : ?>
            <div class="p-5 mb-8 rounded-xl bg-[#DCFCE7] border border-[#86EFAC] text-[#15803D]">
              <div class="flex items-center gap-2 font-bold text-base mb-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Payment Submission Received Successfully!
              </div>
              <p class="text-sm leading-relaxed">
                Thank you! Our accounting officers will reconcile your transaction against bank and gateway records. You will receive an official signed electronic Money Receipt within 15 to 30 minutes.
              </p>
            </div>
          <?php elseif ( ! empty( $payment_error_msg ) ) : ?>
            <div class="p-4 mb-8 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
              <?php echo esc_html( $payment_error_msg ); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="#verify-payment" class="space-y-5">
            <?php wp_nonce_field( 'rajtechbd_payment_action', 'rajtechbd_payment_nonce' ); ?>
            <input type="hidden" name="rajtechbd_payment_verify_submit" value="1">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="payer_name" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Client / Company Name *
                </label>
                <input type="text" id="payer_name" name="payer_name" required placeholder="e.g. TechnoSoft Ltd / Shakib" class="form-input">
              </div>

              <div>
                <label for="payer_email" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Billing Email *
                </label>
                <input type="email" id="payer_email" name="payer_email" required placeholder="accounts@company.com" class="form-input">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="payer_phone" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Phone / WhatsApp
                </label>
                <input type="text" id="payer_phone" name="payer_phone" placeholder="+8801..." class="form-input">
              </div>

              <div>
                <label for="invoice_no" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Invoice Number / Project Ref
                </label>
                <input type="text" id="invoice_no" name="invoice_no" placeholder="e.g. RTBD-2026-1048" class="form-input">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
              <div class="sm:col-span-1">
                <label for="payment_method" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Channel Used *
                </label>
                <select id="payment_method" name="payment_method" required class="form-select">
                  <option value="Visa Card">Visa (Card)</option>
                  <option value="Bank Transfer (EFTN/NPSB/RTGS)">Bank Transfer</option>
                  <option value="bKash">bKash</option>
                  <option value="Rocket">Rocket (DBBL)</option>
                  <option value="Nagad">Nagad</option>
                  <option value="Bank Cheque / Pay Order">Bank Cheque / Pay Order</option>
                  <option value="International Wire (SWIFT)">SWIFT Wire</option>
                </select>
              </div>

              <div class="sm:col-span-1">
                <label for="amount_paid" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Amount Paid *
                </label>
                <input type="number" step="any" id="amount_paid" name="amount_paid" required placeholder="e.g. 50000" class="form-input">
              </div>

              <div class="sm:col-span-1">
                <label for="currency" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Currency
                </label>
                <select id="currency" name="currency" class="form-select">
                  <option value="BDT" selected>BDT (৳)</option>
                  <option value="USD">USD ($)</option>
                  <option value="EUR">EUR (€)</option>
                  <option value="GBP">GBP (£)</option>
                </select>
              </div>
            </div>

            <div>
              <label for="transaction_id" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Transaction ID (TrxID) / Cheque No. / Slip Ref *
              </label>
              <input type="text" id="transaction_id" name="transaction_id" required placeholder="e.g. BL99XX28 or Cheque #004928" class="form-input font-mono-tag">
            </div>

            <div>
              <label for="additional_notes" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Additional Notes / Bank Branch / Remarks
              </label>
              <textarea id="additional_notes" name="additional_notes" rows="3" placeholder="Any specific instructions, TDS/VDS deductions, or branch notes..." class="form-textarea"></textarea>
            </div>

            <button type="submit" class="w-full py-4 rounded-[6px] bg-[#0284C7] text-white font-bold text-base hover:bg-[#0369A1] hover-lift transition-all shadow-xs">
              Confirm &amp; Request Official Money Receipt
            </button>

            <div class="flex items-center justify-center gap-2 text-xs text-[#64748B] pt-2">
              <svg class="w-4 h-4 text-[#10B981]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
              <span>Transactions are cross-checked directly with banking databases. Data is strictly confidential under NDA.</span>
            </div>

          </form>

        </div>

      </div>

    </div>
  </section>

  <!-- ================= 7. CORPORATE TAX, VAT & LEGAL GOVERNANCE ================= -->
  <section class="py-16 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="p-8 sm:p-10 rounded-2xl bg-white border border-[#E2E8F0] shadow-xs">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          
          <div class="lg:col-span-8">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#EFF6FF] border border-[#BFDBFE] text-[#1D4ED8] text-xs font-mono-tag font-bold uppercase tracking-wider mb-3">
              NATIONAL BOARD OF REVENUE &amp; RJSC COMPLIANCE
            </div>
            <h3 class="text-2xl font-bold text-[#0F172A] mb-3">
              Corporate Withholding Tax (TDS) &amp; VAT (VDS) Guidelines
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed mb-4">
              As an incorporated entity under the Companies Act 1994, <strong>RajTech BD Limited</strong> issues registered commercial tax invoices. Corporate clients deducting source tax (TDS) or source VAT (VDS) are requested to observe the following statutory protocols:
            </p>
            <ul class="text-xs text-[#475569] space-y-2 list-disc list-inside">
              <li>Corporate invoices are inclusive/exclusive of VAT as negotiated per Statement of Work (SOW).</li>
              <li>When withholding TDS or VDS, please provide a copy of the official <strong>Treasury Challan (Mushak-6.3)</strong> within 14 calendar days of payment clearance.</li>
              <li>International clients pay net of local source deductions; cross-border wire documentation is provided on demand.</li>
            </ul>
          </div>

          <div class="lg:col-span-4 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 text-center">
            <div class="w-12 h-12 rounded-full bg-[#10B981]/10 text-[#10B981] flex items-center justify-center mx-auto mb-3">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="text-xs font-mono-tag font-bold text-[#0F172A] uppercase">100% CODE OWNERSHIP</div>
            <p class="text-xs text-[#64748B] mt-1.5 leading-relaxed">
              Upon final milestone payment clearance, 100% perpetual ownership of custom source code, databases, and assets transfers irrevocably to the client.
            </p>
            <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>" class="inline-block mt-3 text-xs font-bold text-[#0284C7] hover:underline">
              Read Terms of Service &rarr;
            </a>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- ================= 8. FREQUENTLY ASKED QUESTIONS (ACCORDION) ================= -->
  <section class="py-20 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[960px] mx-auto px-6">
      
      <div class="text-center mb-14">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          CLARITY &amp; PEACE OF MIND
        </span>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">
          Payment System FAQ
        </h2>
        <p class="text-sm text-[#64748B] mt-2">
          Frequently asked questions regarding payment gateways, invoice references, and foreign transactions.
        </p>
      </div>

      <div class="space-y-4" id="payment-faq-accordion">
        
        <!-- Q1 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>How fast is my payment verified and receipt issued?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Payments executed via Visa card, bKash, Rocket, Nagad, and NPSB bank transfers are verified within 15 to 30 minutes during standard business hours (Saturday–Thursday, 9:00 AM–8:00 PM BST). You will receive an official PDF money receipt signed and stamped by RajTech BD Limited accounts.
          </div>
        </details>

        <!-- Q2 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>Are there any transaction charges on bKash or Nagad merchant payments?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            No. When you select the <strong>"Make Payment / Merchant Pay"</strong> option on bKash or Nagad, the transaction fee is 0% to the client. You only pay the exact amount indicated on your invoice.
          </div>
        </details>

        <!-- Q3 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>Can international clients pay in USD or EUR via Visa or SWIFT wire transfer?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Yes. We regularly serve clients in North America, Europe, Australia, and the Middle East. You can pay via any international Visa credit/debit card online, or initiate a direct foreign wire transfer via SWIFT to our DBBL corporate clearing account in USD, EUR, or GBP.
          </div>
        </details>

        <!-- Q4 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>What should I write in the "Reference" box for mobile banking?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Always write your official <strong>Invoice Number</strong> (e.g. <code class="font-mono-tag bg-slate-100 px-1 py-0.5 rounded text-xs">RTBD-1048</code>) or your company name without spaces or special symbols. This enables our automated ledger software to tie the payment directly to your account.
          </div>
        </details>

        <!-- Q5 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>How do we deliver an Account Payee Bank Cheque or Pay Order?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Bank Cheques and Pay Orders must be drawn in favor of <strong>"RajTech BD Limited"</strong> and crossed <strong>"Account Payee Only"</strong>. You can deliver it directly to our headquarters in Kuril, Vatara, Dhaka-1229, dispatch via registered courier with tracking, or deposit into our DBBL account at any branch in Bangladesh.
          </div>
        </details>

        <!-- Q6 -->
        <details class="group bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-5 transition-all open:bg-white open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>What happens if I enter an incorrect reference or make a partial transfer?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Don't worry. Simply send your Transaction ID (TrxID) or bank deposit slip screenshot directly to our WhatsApp hotline at <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="text-[#0284C7] font-bold font-mono-tag">+8801758522846</a> or email <a href="mailto:info@rajtechbd.com" class="text-[#0284C7] font-bold font-mono-tag">info@rajtechbd.com</a>. An accounts executive will manually verify the funds with the bank and match it to your invoice within minutes.
          </div>
        </details>

      </div>

    </div>
  </section>

  <!-- ================= 9. BOTTOM CONVERSION CTA BANNER ================= -->
  <section class="bg-[#0B1528] py-16 text-white border-t border-[#1E3352]">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <h2 class="text-2xl sm:text-3xl font-extrabold mb-4 text-white">
        Need a Custom Invoice or International Wire Instructions?
      </h2>
      <p class="text-sm sm:text-base text-[#94A3B8] max-w-2xl mx-auto mb-8">
        Our finance leads can generate formal pro-forma invoices, milestone payment agreements, or dedicated SWIFT clearing instructions tailored to your corporate procurement requirements.
      </p>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo $contact_url; ?>" class="px-6 py-3 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm hover:bg-[#d97706] hover-lift transition-all shadow-xs">
          Contact Billing &amp; Finance Desk
        </a>
        <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD%20Finance,%20I%20need%20assistance%20with%20an%20invoice%20payment." target="_blank" rel="noopener" class="px-6 py-3 rounded-[6px] bg-[#132238] border border-[#1E3352] text-white font-bold text-sm hover:bg-[#1E3352] transition-all flex items-center gap-2">
          <svg class="w-4 h-4 text-[#10B981]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
          </svg>
          <span>Chat with Accounts on WhatsApp</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= TOAST NOTIFICATION POPUP ================= -->
  <div id="payment-toast" class="fixed bottom-6 right-6 z-50 transform translate-y-16 opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-3 px-4 py-3 rounded-xl bg-[#0F172A] text-white shadow-2xl border border-slate-700 text-xs font-mono-tag">
    <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
    <span id="payment-toast-msg">Copied to clipboard!</span>
  </div>

  <!-- ================= INLINE OPTIMIZED JAVASCRIPT ================= -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Copy-to-Clipboard functionality with Toast Alert
    const copyButtons = document.querySelectorAll('.copy-btn');
    const toast = document.getElementById('payment-toast');
    const toastMsg = document.getElementById('payment-toast-msg');
    let toastTimeout;

    copyButtons.forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('data-copy-target');
        const targetEl = document.getElementById(targetId);
        if (!targetEl) return;

        const textToCopy = targetEl.innerText.trim();
        navigator.clipboard.writeText(textToCopy).then(() => {
          // Visual feedback on button
          const originalHTML = this.innerHTML;
          this.innerHTML = '<svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
          setTimeout(() => {
            this.innerHTML = originalHTML;
          }, 2000);

          // Show Toast
          if (toast && toastMsg) {
            toastMsg.textContent = 'Copied: ' + textToCopy;
            toast.classList.remove('translate-y-16', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');

            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
              toast.classList.add('translate-y-16', 'opacity-0', 'pointer-events-none');
              toast.classList.remove('translate-y-0', 'opacity-100');
            }, 3000);
          }
        }).catch(err => {
          console.error('Failed to copy: ', err);
        });
      });
    });

    // 2. Interactive Category Filter Tabs
    const filterButtons = document.querySelectorAll('.filter-tab-btn');
    const cards = document.querySelectorAll('.payment-card');

    filterButtons.forEach(btn => {
      btn.addEventListener('click', function() {
        // Active tab styling
        filterButtons.forEach(b => {
          b.classList.remove('active', 'bg-[#0F172A]', 'text-white');
          b.classList.add('bg-white', 'text-[#475569]', 'border', 'border-[#E2E8F0]');
        });
        this.classList.add('active', 'bg-[#0F172A]', 'text-white');
        this.classList.remove('bg-white', 'text-[#475569]', 'border', 'border-[#E2E8F0]');

        const filter = this.getAttribute('data-filter');

        cards.forEach(card => {
          const category = card.getAttribute('data-category');
          if (filter === 'all' || category === filter) {
            card.style.display = 'block';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  });
  </script>

<?php
endif;
get_footer();
