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
if ( function_exists( 'rajtechbd_is_elementor_active' ) && rajtechbd_is_elementor_active() ) :
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
        "description": "Official corporate payment channels for RajTech BD Limited. We securely accept bKash, Nagad, SSLCommerz, Rocket, Bank Transfer, Visa/Mastercard/Amex Cards, and Bank Cheque.",
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
        "name": "RajTech BD Limited Corporate Billing",
        "url": "https://rajtechbd.com/payment-system/",
        "logo": "https://rajtechbd.com/wp-content/uploads/2024/09/black-logo-1.png",
        "telephone": "+8801758522846",
        "email": "info@rajtechbd.com",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "House Kha-92/1, Kuril, Vatara",
          "addressLocality": "Dhaka",
          "postalCode": "1229",
          "addressCountry": "BD"
        },
        "paymentAccepted": [
          "bKash",
          "Nagad",
          "SSLCommerz",
          "Rocket",
          "Corporate Bank Transfer (EFTN, NPSB, RTGS, SWIFT)",
          "Credit Card (Visa, Mastercard, American Express)",
          "Debit Card",
          "Account Payee Bank Cheque"
        ],
        "currenciesAccepted": "BDT, USD, EUR, GBP"
      },
      {
        "@type": "FAQPage",
        "@id": "https://rajtechbd.com/payment-system/#faq",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Which payment methods are accepted by RajTech BD Limited?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "RajTech BD Limited accepts 7 verified corporate channels: bKash (Merchant & Personal), Nagad (Merchant & Personal), SSLCommerz Instant Online Checkout Gateway, Rocket (DBBL MFS), Corporate Bank Transfer (EFTN, NPSB, RTGS, SWIFT to Dutch-Bangla Bank Ltd), International & Local Cards (Visa, Mastercard, Amex), and Account Payee Bank Cheques / Pay Orders."
            }
          },
          {
            "@type": "Question",
            "name": "Are payments protected by SSL encryption and NBR tax compliance?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. All digital and gateway payments are encrypted via 256-bit TLS/SSL certificates and 3D Secure 2.0 authentication. Every transaction generates an official NBR-compliant Mushak-6.3 Tax Invoice and signed money receipt."
            }
          },
          {
            "@type": "Question",
            "name": "How quickly are payments reconciled?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Instant gateway and MFS payments (bKash, Nagad, SSLCommerz, Rocket) are typically reconciled within 5 to 15 minutes. Bank transfers via NPSB are real-time, while BEFTN and Cheque clearing follow standard Bangladesh Bank clearing windows."
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

  <!-- ================= 1. HERO SECTION (MODERN ARCHITECTURAL DESIGN) ================= -->
  <section class="relative bg-[#0B1528] pt-20 pb-24 text-white border-b border-[#1E3352] bg-grid-pattern-dark overflow-hidden">
    <!-- Ambient geometric architectural glowing glow -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-tr from-[#0284C7]/20 via-[#F59E0B]/10 to-transparent blur-3xl pointer-events-none"></div>

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
        OFFICIAL CORPORATE BILLING &amp; PAYMENT INFRASTRUCTURE
      </div>

      <!-- Main Headline -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white max-w-4xl mx-auto leading-tight">
        Corporate Multi-Channel <br class="hidden sm:inline">
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-[#38BDF8]">Payment Architecture</span>
      </h1>

      <!-- Subtitle -->
      <p class="text-base sm:text-lg text-[#94A3B8] max-w-3xl mx-auto leading-relaxed mb-10">
        RajTech BD Limited provides enterprise clients and global technology partners with bank-grade financial settlement channels. Receive automated invoices, execute transfers with 0% hidden fees, and obtain instant NBR Mushak-6.3 tax receipts.
      </p>

      <!-- 7 Payment Channel Quick Badges -->
      <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 max-w-4xl mx-auto">
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#E2136E] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#E2136E]"></span>
          <span class="font-bold text-[#E2136E]">bKash</span>
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#ED1C24] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#ED1C24]"></span>
          <span class="font-bold text-[#ED1C24]">Nagad</span>
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#38BDF8] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#38BDF8]"></span>
          <span class="font-bold text-[#38BDF8]">SSLCommerz</span> Gateway
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#8C3494] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#8C3494]"></span>
          <span class="font-bold text-[#8C3494]">Rocket</span>
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#F59E0B] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
          <span class="font-bold text-[#F59E0B]">Bank Transfer</span> (DBBL / Wire)
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#38BDF8] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#38BDF8]"></span>
          <span class="font-bold text-[#38BDF8]">Card</span> (Visa / MC / Amex)
        </a>
        <a href="#payment-methods-grid" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#132238]/90 border border-[#1E3352] text-xs text-slate-200 hover:border-[#10B981] transition-all">
          <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
          <span class="font-bold text-[#10B981]">Bank Cheque</span> &amp; Pay Order
        </a>
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
  <section class="py-6 bg-[#F8FAFC] border-b border-[#E2E8F0] sticky top-20 z-40 shadow-xs backdrop-blur-md bg-[#F8FAFC]/95">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="flex items-center justify-between gap-4 overflow-x-auto pb-2 sm:pb-0 scrollbar-none">
        <span class="text-xs font-mono-tag font-bold text-[#64748B] uppercase tracking-wider hidden lg:inline-block shrink-0">
          FILTER CHANNELS:
        </span>
        <div class="flex items-center gap-2 sm:gap-3 shrink-0" id="payment-filter-group">
          <button type="button" data-filter="all" class="filter-tab-btn active px-4 py-2 rounded-full text-xs font-bold transition-all bg-[#0F172A] text-white shadow-xs">
            All Channels (7)
          </button>
          <button type="button" data-filter="mfs" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Mobile Wallets (bKash / Nagad / Rocket)
          </button>
          <button type="button" data-filter="ssl-cards" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Instant Gateways &amp; Cards (SSLCommerz / Visa)
          </button>
          <button type="button" data-filter="bank-cheque" class="filter-tab-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:border-[#0284C7] hover:text-[#0284C7]">
            Corporate Banking &amp; Cheque
          </button>
        </div>
        <a href="#verify-payment" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-md bg-[#0284C7] text-white text-xs font-bold hover:bg-[#0369A1] transition-all shrink-0">
          <span>Notify Accounts Desk</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= 4. ALL 7 PAYMENT METHODS (MAIN ARCHITECTURAL GRID) ================= -->
  <section class="py-16 sm:py-20 bg-white border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          OFFICIAL CORPORATE RAILS
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
          Accepted Payment Methods
        </h2>
        <p class="text-sm sm:text-base text-[#64748B] mt-3">
          Click the one-click copy button next to any account, number, or routing code to copy it instantly.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="payment-methods-grid">

        <!-- ================= METHOD 1: bKash (MFS) ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- bKash Icon -->
              <div class="w-14 h-14 rounded-xl bg-[#D12053]/10 border border-[#D12053]/20 flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-10 h-10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 4L34 20H14L24 4Z" fill="#D12053"/>
                  <path d="M14 20L4 36H24L14 20Z" fill="#E2136E"/>
                  <path d="M34 20L24 36H44L34 20Z" fill="#BE185D"/>
                  <path d="M24 24L18 36H30L24 24Z" fill="#FFFFFF"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-pink-50 text-[#D12053] border border-pink-200 mb-1">
                  MFS • REAL-TIME
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">bKash Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Instant
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Instant mobile settlement via bKash. You can execute direct <strong>Merchant Payment</strong> or <strong>Send Money</strong> directly from the bKash App or USSD *247#.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <!-- Merchant Number -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">bKash Merchant Number (Payment):</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#BE185D] bg-pink-50 px-2.5 py-0.5 rounded border border-pink-200" id="bkash-merchant">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bkash-merchant" title="Copy Merchant Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <!-- Personal Number -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">bKash Personal (Send Money):</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A]" id="bkash-personal">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bkash-personal" title="Copy Personal Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Reference Code:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">Your Invoice No (e.g. RTBD-1048)</span>
            </div>

            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Counter Number:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">1</span>
            </div>

          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via bKash App or *247#:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open <strong>bKash App</strong> and tap <strong>"Make Payment"</strong> (or dial <code class="font-mono-tag bg-slate-100 px-1 rounded">*247#</code> &gt; 3. Payment).</li>
              <li>Enter Merchant Number: <strong class="font-mono-tag text-[#BE185D]">01758522846</strong>.</li>
              <li>Enter Amount as specified in your milestone invoice.</li>
              <li>Enter your <strong>Invoice ID</strong> as Reference and Counter <strong class="font-mono-tag">1</strong>.</li>
              <li>Enter PIN, tap &amp; hold to confirm, and keep the Transaction ID (TrxID).</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-[#F1F5F9] gap-3">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-md bg-[#D12053] text-white text-xs font-bold hover:bg-[#be185d] transition-all">
              <span>Submit bKash TrxID</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#10B981] font-bold">✓ Automated Ledger Reconciliation</span>
          </div>
        </article>

        <!-- ================= METHOD 2: NAGAD (MFS) ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Nagad Icon -->
              <div class="w-14 h-14 rounded-xl bg-[#ED1C24]/10 border border-[#ED1C24]/20 flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-10 h-10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 6C14.06 6 6 14.06 6 24C6 33.94 14.06 42 24 42C33.94 42 42 33.94 42 24C42 14.06 33.94 6 24 6Z" fill="#ED1C24"/>
                  <path d="M20 16L32 24L20 32V16Z" fill="#FFFFFF"/>
                  <circle cx="24" cy="24" r="5" fill="#F7941D"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-red-50 text-[#ED1C24] border border-red-200 mb-1">
                  POSTAL DFS • LOW FEE
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Nagad Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Instant
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Bangladesh Post Office Digital Financial Service. Enjoy ultra-low transaction overheads, instant SMS confirmations, and 24/7 payment routing.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <!-- Nagad Merchant -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Nagad Merchant Number (Payment):</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#DC2626] bg-red-50 px-2.5 py-0.5 rounded border border-red-200" id="nagad-merchant">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="nagad-merchant" title="Copy Merchant Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <!-- Nagad Personal -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Nagad Personal (Send Money):</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A]" id="nagad-personal">01758522846</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="nagad-personal" title="Copy Personal Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Reference Code:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">Your Invoice No</span>
            </div>

            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Counter Number:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">1</span>
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
          <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-[#F1F5F9] gap-3">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-md bg-[#ED1C24] text-white text-xs font-bold hover:bg-[#dc2626] transition-all">
              <span>Submit Nagad TrxID</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#10B981] font-bold">✓ Lowest MFS Cash-out Overhead</span>
          </div>
        </article>

        <!-- ================= METHOD 3: SSL / SSLCOMMERZ GATEWAY ================= -->
        <article class="payment-card rounded-2xl border border-[#0284C7]/30 bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="ssl-cards">
          <!-- Featured Ribbon -->
          <div class="absolute top-0 right-0 bg-[#0284C7] text-white text-[10px] font-mono-tag font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wider">
            All-In-One Gateway
          </div>

          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- SSLCommerz Shield Icon -->
              <div class="w-14 h-14 rounded-xl bg-[#0284C7]/10 border border-[#0284C7]/20 flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-10 h-10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 4L8 10V22C8 32 15 41 24 44C33 41 40 32 40 22V10L24 4Z" fill="#0284C7" fill-opacity="0.15" stroke="#0284C7" stroke-width="2.5"/>
                  <path d="M16 24L22 30L32 18" stroke="#0284C7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-sky-50 text-[#0284C7] border border-sky-200 mb-1">
                  PCI-DSS LEVEL 1 • 30+ CHANNELS
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">SSLCommerz Gateway</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Automated
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Bangladesh's largest licensed payment gateway. Pay your invoice in seconds using any Visa, Mastercard, Amex, bKash, Nagad, Rocket, or 30+ internet banking portals in a single encrypted window.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Integrated Methods:</span>
              <span class="font-bold text-[#0F172A] text-right">30+ Bank Cards, All MFS &amp; NetBanking</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Reconciliation:</span>
              <span class="font-mono-tag font-bold text-[#10B981]">Instant Automated Webhook</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Security Standard:</span>
              <span class="font-mono-tag font-bold text-[#0284C7]">PCI-DSS Tier 1 Certified</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Instant E-Receipt:</span>
              <span class="text-[#0F172A] font-bold">Automated PDF Receipt &amp; Invoice Clear</span>
            </div>
          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via SSLCommerz:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Click <strong>"Request SSLCommerz Payment Link"</strong> below or open the invoice email.</li>
              <li>Select your preferred option inside the gateway (Card, bKash, Nagad, Rocket, or Bank).</li>
              <li>Complete 2-Factor Authentication (OTP / PIN).</li>
              <li>Your invoice is automatically cleared with an instant downloadable money receipt.</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t border-[#F1F5F9]">
            <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD,%20please%20send%20me%20an%20instant%20SSLCommerz%20payment%20link%20for%20my%20invoice." target="_blank" rel="noopener" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-xs hover:bg-[#0369a1] transition-all">
              <span>Request SSL Invoice Link</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-xs font-bold text-[#0F172A] hover:bg-slate-100 transition-all">
              <span>Verify Paid Gateway Trx</span>
            </a>
          </div>
        </article>

        <!-- ================= METHOD 4: ROCKET (DBBL MFS) ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="mfs">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Rocket Icon -->
              <div class="w-14 h-14 rounded-xl bg-[#8C3494]/10 border border-[#8C3494]/20 flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 48" class="w-10 h-10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 4L28 16L38 18L30 26L32 38L24 32L16 38L18 26L10 18L20 16L24 4Z" fill="#8C3494"/>
                  <circle cx="24" cy="24" r="6" fill="#FFFFFF"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-purple-50 text-[#8C3494] border border-purple-200 mb-1">
                  DBBL MFS • USSD *322#
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Rocket Payment</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> Real-time
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Dutch-Bangla Bank Limited (DBBL) Rocket mobile banking channel. Direct corporate settlement via 12-digit account number (including check digit).
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <!-- Rocket Number -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Rocket Account Number (12 digits):</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-base text-[#7E22CE] bg-purple-50 px-2.5 py-0.5 rounded border border-purple-200" id="rocket-number">01758522846-8</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="rocket-number" title="Copy Rocket Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Operating Bank:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">Dutch-Bangla Bank PLC</span>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Reference Code:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">Your Invoice No</span>
            </div>

            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">USSD Shortcode:</span>
              <span class="font-mono-tag text-[#7E22CE] font-bold">*322#</span>
            </div>

          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via Rocket:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open <strong>Rocket App</strong> or dial <code class="font-mono-tag bg-slate-100 px-1 rounded">*322#</code>.</li>
              <li>Select <strong>"Merchant Pay"</strong> or <strong>"Send Money"</strong>.</li>
              <li>Input 12-Digit Rocket Number: <strong class="font-mono-tag text-[#7E22CE]">01758522846-8</strong>.</li>
              <li>Enter exact Amount matching your invoice.</li>
              <li>Enter your <strong>Invoice ID</strong> as Reference and confirm with your 4-digit PIN.</li>
            </ol>
          </div>

          <!-- Bottom Action -->
          <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-[#F1F5F9] gap-3">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-md bg-[#8C3494] text-white text-xs font-bold hover:bg-[#7e22ce] transition-all">
              <span>Submit Rocket TrxID</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#10B981] font-bold">✓ Direct DBBL Network Routing</span>
          </div>
        </article>

        <!-- ================= METHOD 5: CORPORATE BANK TRANSFER ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="bank-cheque">
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
            The standard channel for corporate contracts, retainers, and high-value sprints. Supports real-time NPSB, BEFTN clearing, RTGS, and cross-border SWIFT wire transfers.
          </p>

          <!-- Bank Account Cards with Copy Button -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Beneficiary Account Name:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag" id="bank-holder">RAJTECH BD LIMITED</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bank-holder" title="Copy Account Name">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Bank Name:</span>
              <span class="font-bold text-[#0F172A]">Dutch-Bangla Bank Limited (DBBL)</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Account Number:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag text-sm bg-white px-2 py-0.5 rounded border border-[#CBD5E1]" id="bank-acc-dbbl">117.110.0038942</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bank-acc-dbbl" title="Copy Account Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Branch:</span>
              <span class="font-medium text-[#0F172A]">Kawran Bazar Branch, Dhaka, Bangladesh</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#E2E8F0] pb-2.5 gap-1">
              <span class="text-[#64748B] font-medium">Routing Number (EFTN / NPSB):</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A]" id="bank-routing">090272891</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bank-routing" title="Copy Routing Number">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
              <span class="text-[#64748B] font-medium">SWIFT Code (International Wire):</span>
              <div class="flex items-center gap-2">
                <span class="font-mono-tag font-bold text-[#0F172A] bg-white px-2 py-0.5 rounded border border-[#CBD5E1]" id="bank-swift">DBBLBDDH</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="bank-swift" title="Copy SWIFT Code">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

          </div>

          <!-- Bottom Action -->
          <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-[#F1F5F9] gap-3">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-md bg-[#0284C7] text-white text-xs font-bold hover:bg-[#0369a1] transition-all">
              <span>Submit Wire Transfer Slip</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#64748B]">NPSB: Real-time • BEFTN: Same Day</span>
          </div>
        </article>

        <!-- ================= METHOD 6: CARDS (VISA, MASTERCARD, AMEX) ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden" data-category="ssl-cards">
          <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
              <!-- Card Custom Vector Badge -->
              <div class="w-14 h-14 rounded-xl bg-[#0A2540] flex items-center justify-center p-2 shadow-xs shrink-0">
                <svg viewBox="0 0 48 32" class="w-10 h-7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="48" height="32" rx="4" fill="#0A2540"/>
                  <circle cx="18" cy="16" r="8" fill="#EB001B" fill-opacity="0.8"/>
                  <circle cx="30" cy="16" r="8" fill="#F79E1B" fill-opacity="0.8"/>
                  <path d="M24 10.3C22.1 11.8 21 13.7 21 16C21 18.3 22.1 20.2 24 21.7C25.9 20.2 27 18.3 27 16C27 13.7 25.9 11.8 24 10.3Z" fill="#FF5F00"/>
                </svg>
              </div>
              <div>
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-mono-tag font-bold uppercase tracking-wider bg-[#F0F9FF] text-[#0284C7] border border-[#BAE6FD] mb-1">
                  VISA • MASTERCARD • AMEX
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Debit &amp; Credit Cards</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#10B981] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span> 3D Secure 2.0
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Accepting all local Bangladeshi and global Visa, Mastercard, and American Express cards. Payments are secured via 3D Secure 2.0 OTP authorization with automated reconciliation.
          </p>

          <!-- Specifications Table -->
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 space-y-3.5 text-xs sm:text-sm">
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Supported Card Networks:</span>
              <span class="font-bold text-[#0F172A] text-right">Visa, Mastercard, Amex, UnionPay</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Supported Currencies:</span>
              <span class="font-mono-tag font-bold text-[#0F172A]">BDT (৳), USD ($), EUR (€), GBP (£)</span>
            </div>
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2.5">
              <span class="text-[#64748B] font-medium">Security Protocol:</span>
              <span class="font-bold text-[#10B981] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path></svg>
                3D Secure 2.0 OTP + 256-Bit SSL
              </span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-[#64748B] font-medium">Invoice Generation:</span>
              <span class="text-[#0284C7] font-bold">Unique Encrypted Checkout Link</span>
            </div>
          </div>

          <!-- Step Instructions -->
          <div class="mb-6">
            <h4 class="text-xs font-mono-tag font-bold text-[#334155] uppercase tracking-wider mb-2">How to Pay via Card:</h4>
            <ol class="list-decimal list-inside text-xs text-[#475569] space-y-1.5 leading-relaxed">
              <li>Open your formal milestone invoice received from RajTech BD.</li>
              <li>Click the secure <strong>"Pay with Card"</strong> button inside your invoice email.</li>
              <li>Enter your 16-digit card number, expiry date, and CVV on the encrypted portal.</li>
              <li>Authenticate using the OTP sent to your phone by your issuing bank.</li>
            </ol>
          </div>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t border-[#F1F5F9]">
            <a href="https://wa.me/8801758522846?text=Hello%20RajTech%20BD%20Finance,%20please%20generate%20a%20Card%20payment%20link%20for%20my%20invoice." target="_blank" rel="noopener" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-xs hover:bg-[#0369a1] transition-all">
              <span>Request Card Link</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-xs font-bold text-[#0F172A] hover:bg-slate-100 transition-all">
              <span>Verify Card Transaction</span>
            </a>
          </div>
        </article>

        <!-- ================= METHOD 7: BANK CHEQUE & PAY ORDER ================= -->
        <article class="payment-card rounded-2xl border border-[#E2E8F0] bg-white p-6 sm:p-8 hover-lift shadow-xs transition-all relative overflow-hidden lg:col-span-2" data-category="bank-cheque">
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
                  CORPORATE GOVERNANCE • AUDIT TRAIL
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-[#0F172A]">Bank Cheque &amp; Pay Order</h3>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 text-[11px] font-mono-tag font-bold text-[#047857] bg-[#ECFDF5] px-2.5 py-1 rounded-md border border-[#A7F3D0]">
              Account Payee Only
            </span>
          </div>

          <p class="text-sm text-[#475569] leading-relaxed mb-6">
            Preferred by large corporate finance teams, government institutions, and enterprise ERP procurement desks requiring strict physical accounting vouchers and audit-proof trails.
          </p>

          <!-- Specifications Table -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 mb-6 text-xs sm:text-sm">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b md:border-b-0 md:border-r border-[#E2E8F0] pb-2.5 md:pb-0 md:pr-4 gap-1">
              <span class="text-[#64748B] font-medium">Beneficiary / Payee:</span>
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#0F172A] font-mono-tag" id="cheque-payee">RAJTECH BD LIMITED</span>
                <button type="button" class="copy-btn text-[#0284C7] hover:text-[#0369A1] p-1 rounded hover:bg-white transition-colors" data-copy-target="cheque-payee" title="Copy Payee Name">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
              </div>
            </div>

            <div class="flex items-center justify-between md:pl-2">
              <span class="text-[#64748B] font-medium">Crossing Specification:</span>
              <span class="font-mono-tag font-bold text-[#B91C1C] bg-red-50 px-2 py-0.5 rounded border border-red-200">
                A/C PAYEE ONLY
              </span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-start justify-between border-t border-[#E2E8F0] pt-2.5 md:pr-4 gap-1">
              <span class="text-[#64748B] font-medium">Delivery Address:</span>
              <span class="font-medium text-[#0F172A] text-right">
                House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.
              </span>
            </div>

            <div class="flex items-center justify-between border-t border-[#E2E8F0] pt-2.5 md:pl-2">
              <span class="text-[#64748B] font-medium">Clearing Mechanism:</span>
              <span class="font-mono-tag text-[#475569]">Bangladesh Automated Clearing House (BACH)</span>
            </div>

          </div>

          <!-- Bottom Action -->
          <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-[#F1F5F9] gap-3">
            <a href="#verify-payment" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-md bg-[#047857] text-white text-xs font-bold hover:bg-[#065f46] transition-all">
              <span>Submit Cheque Deposit Slip</span>
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <span class="text-[11px] text-[#94A3B8]">High-Value BACH Clearing: Same Day</span>
          </div>
        </article>

      </div>

    </div>
  </section>

  <!-- ================= 5. INTERACTIVE FEE & CURRENCY CALCULATOR (UNIQUE ARCHITECTURE TOOL) ================= -->
  <section class="py-16 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 sm:p-10 shadow-xs">
        <div class="max-w-3xl mx-auto text-center mb-8">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-2">
            FINANCIAL TRANSPARENCY
          </span>
          <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0F172A] tracking-tight">
            Interactive Fee &amp; VAT Settlement Estimator
          </h3>
          <p class="text-sm text-[#64748B] mt-2">
            Calculate exact net receivable amounts, gateway processing charges, and 5% NBR Mushak-6.3 VAT for your invoice.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center max-w-4xl mx-auto">
          
          <!-- Controls Column -->
          <div class="md:col-span-6 space-y-4">
            <div>
              <label for="calc-channel" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-1.5">
                Select Payment Channel:
              </label>
              <select id="calc-channel" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm font-medium text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
                <option value="bank">Corporate Bank Transfer (0.00% Surcharge)</option>
                <option value="cheque">Bank Cheque / Pay Order (0.00% Surcharge)</option>
                <option value="ssl">SSLCommerz Gateway (2.00% Gateway Fee)</option>
                <option value="bkash">bKash Payment (1.50% MFS Fee)</option>
                <option value="nagad">Nagad Payment (1.45% MFS Fee)</option>
                <option value="rocket">Rocket Payment (1.50% MFS Fee)</option>
                <option value="card">Credit / Debit Card Direct (2.50% Interchange)</option>
              </select>
            </div>

            <div>
              <label for="calc-amount" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-1.5">
                Invoice Amount (BDT):
              </label>
              <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm font-bold text-[#64748B]">৳</span>
                <input type="number" id="calc-amount" value="50000" min="500" step="100" class="w-full pl-8 pr-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm font-mono-tag font-bold text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
              <input type="checkbox" id="calc-include-vat" checked class="w-4 h-4 rounded text-[#0284C7] focus:ring-0">
              <label for="calc-include-vat" class="text-xs text-[#475569] font-medium cursor-pointer">
                Include 5% Government VAT (Mushak-6.3 Standard)
              </label>
            </div>
          </div>

          <!-- Dynamic Output Card -->
          <div class="md:col-span-6 bg-[#0B1528] rounded-xl p-6 text-white border border-[#1E3352]">
            <div class="text-xs font-mono-tag text-[#38BDF8] uppercase tracking-wider mb-4 pb-2 border-b border-[#1E3352]">
              ESTIMATED SETTLEMENT BREAKDOWN
            </div>

            <div class="space-y-3 text-xs sm:text-sm">
              <div class="flex justify-between text-slate-300">
                <span>Base Invoice Amount:</span>
                <span class="font-mono-tag font-bold text-white" id="calc-out-base">৳50,000.00</span>
              </div>
              <div class="flex justify-between text-slate-300">
                <span>Payment Gateway / Channel Fee:</span>
                <span class="font-mono-tag text-[#10B981]" id="calc-out-fee">৳0.00 (0%)</span>
              </div>
              <div class="flex justify-between text-slate-300">
                <span>Mushak-6.3 VAT (5%):</span>
                <span class="font-mono-tag text-[#F59E0B]" id="calc-out-vat">৳2,500.00</span>
              </div>
              <div class="pt-3 border-t border-[#1E3352] flex justify-between items-center text-sm sm:text-base">
                <span class="font-bold text-white">Total Payable Amount:</span>
                <span class="font-mono-tag font-extrabold text-xl text-[#38BDF8]" id="calc-out-total">৳52,500.00</span>
              </div>
            </div>

            <div class="mt-4 pt-3 border-t border-[#1E3352]/70 text-[11px] text-[#94A3B8]">
              * Official stamped digital tax voucher is automatically dispatched upon receipt clearance.
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- ================= 6. 4-STEP SIMPLE ARCHITECTURAL WORKFLOW ================= -->
  <section class="py-20 bg-white border-b border-[#E2E8F0]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-2 block">
          TRANSPARENT BILLING PROTOCOL
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">
          How Corporate Billing &amp; Settlement Works
        </h2>
        <p class="text-sm sm:text-base text-[#64748B] mt-3">
          Every financial transaction at RajTech BD Limited follows a deterministic 4-step governance cycle.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
        
        <!-- Step 1 -->
        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-10 h-10 rounded-xl bg-[#0B1528] text-white flex items-center justify-center font-mono-tag font-bold text-base mb-4 shadow-sm">
            01
          </div>
          <h3 class="text-lg font-bold text-[#0F172A] mb-2">Receive Invoice</h3>
          <p class="text-xs sm:text-sm text-[#475569] leading-relaxed">
            Our finance desk issues an itemized digital invoice with deliverables, contract reference, and unique Invoice Number (<code class="font-mono-tag bg-slate-200 px-1 py-0.5 rounded text-[11px]">RTBD-2026-XXXX</code>).
          </p>
        </div>

        <!-- Step 2 -->
        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-10 h-10 rounded-xl bg-[#0284C7] text-white flex items-center justify-center font-mono-tag font-bold text-base mb-4 shadow-sm">
            02
          </div>
          <h3 class="text-lg font-bold text-[#0F172A] mb-2">Select Channel</h3>
          <p class="text-xs sm:text-sm text-[#475569] leading-relaxed">
            Choose your preferred rail: bKash, Nagad, SSLCommerz, Rocket, Bank Wire (DBBL), Card, or Cheque.
          </p>
        </div>

        <!-- Step 3 -->
        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-10 h-10 rounded-xl bg-[#F59E0B] text-[#0F172A] flex items-center justify-center font-mono-tag font-bold text-base mb-4 shadow-sm">
            03
          </div>
          <h3 class="text-lg font-bold text-[#0F172A] mb-2">Reconcile TrxID</h3>
          <p class="text-xs sm:text-sm text-[#475569] leading-relaxed">
            Submit your Transaction ID or wire counterfoil below or via WhatsApp. Funds are matched against your invoice within 15 minutes.
          </p>
        </div>

        <!-- Step 4 -->
        <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-[#E2E8F0] shadow-xs relative hover-lift">
          <div class="w-10 h-10 rounded-xl bg-[#10B981] text-white flex items-center justify-center font-mono-tag font-bold text-base mb-4 shadow-sm">
            04
          </div>
          <h3 class="text-lg font-bold text-[#0F172A] mb-2">Digital Receipt</h3>
          <p class="text-xs sm:text-sm text-[#475569] leading-relaxed">
            Receive an official digitally signed money receipt and Mushak-6.3 VAT certificate for corporate tax records.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- ================= 7. PAYMENT NOTIFICATION & VERIFICATION FORM ================= -->
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
            Completed a payment via bKash, Nagad, SSLCommerz, Rocket, Bank Wire, Card, or Cheque? Submit your transaction reference here for expedited verification and rapid money receipt dispatch.
          </p>

          <!-- Accounts Desk Contact Box -->
          <div class="space-y-4 mb-8">
            
            <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">DEDICATED BILLING DESK</div>
              <a href="mailto:info@rajtechbd.com" class="text-lg font-bold text-[#0F172A] hover:text-[#0284C7] transition-colors block font-mono-tag">
                info@rajtechbd.com
              </a>
            </div>

            <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#10B981] uppercase mb-1">DIRECT WHATSAPP CONFIRMATION</div>
              <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="text-lg font-bold text-[#0F172A] hover:text-[#10B981] transition-colors block font-mono-tag">
                +8801758522846
              </a>
              <div class="text-xs text-[#64748B] mt-1">Send payment screenshot for sub-15 minute clearance</div>
            </div>

            <div class="p-5 rounded-xl border border-[#E2E8F0] bg-[#F8FAFC]">
              <div class="text-xs font-mono-tag font-bold text-[#F59E0B] uppercase mb-1">CORPORATE BILLING ADDRESS</div>
              <div class="text-sm font-medium text-[#0F172A]">
                RajTech BD Limited, House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh.
              </div>
            </div>

          </div>
        </div>

        <!-- Right Column: Verification Form -->
        <div class="lg:col-span-7 bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-6 sm:p-10 shadow-xs relative">
          
          <div class="mb-8">
            <h3 class="text-2xl font-bold text-[#0F172A] mb-2">Payment Verification Form</h3>
            <p class="text-xs sm:text-sm text-[#64748B]">
              Fill out this form and our automated ledger will link the payment directly to your customer account.
            </p>
          </div>

          <?php if ( $payment_verified_msg ) : ?>
            <div class="p-5 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-sm mb-6 flex items-start gap-3">
              <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
              <div>
                <strong class="font-bold">Payment Details Received Successfully!</strong>
                <p class="mt-1 text-xs text-emerald-800 leading-relaxed">
                  Our accounts team has been notified. You will receive an official stamped Money Receipt and updated ledger voucher via email shortly.
                </p>
              </div>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $payment_error_msg ) ) : ?>
            <div class="p-4 rounded-xl bg-red-50 border border-red-300 text-red-800 text-sm mb-6">
              <?php echo esc_html( $payment_error_msg ); ?>
            </div>
          <?php endif; ?>

          <form action="<?php echo esc_url( home_url( '/payment-system/#verify-payment' ) ); ?>" method="POST" class="space-y-5">
            <?php wp_nonce_field( 'rajtechbd_payment_action', 'rajtechbd_payment_nonce' ); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="payer_name" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Client / Company Name *
                </label>
                <input type="text" id="payer_name" name="payer_name" required placeholder="e.g. TechnoSoft Ltd / Shakib" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>

              <div>
                <label for="payer_email" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Corporate Email *
                </label>
                <input type="email" id="payer_email" name="payer_email" required placeholder="accounts@company.com" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="payer_phone" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Phone / WhatsApp
                </label>
                <input type="text" id="payer_phone" name="payer_phone" placeholder="+8801..." class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>

              <div>
                <label for="invoice_no" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Invoice Number
                </label>
                <input type="text" id="invoice_no" name="invoice_no" placeholder="e.g. RTBD-2026-1048" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
              <div class="sm:col-span-1">
                <label for="payment_method" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Channel Used *
                </label>
                <select id="payment_method" name="payment_method" required class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
                  <option value="bKash">bKash (Payment / Send Money)</option>
                  <option value="Nagad">Nagad (Payment / Send Money)</option>
                  <option value="SSLCommerz">SSLCommerz (Instant Gateway)</option>
                  <option value="Rocket">Rocket (DBBL MFS)</option>
                  <option value="Bank Transfer">Corporate Bank Transfer (DBBL)</option>
                  <option value="Card">Credit / Debit Card (Visa/MC/Amex)</option>
                  <option value="Bank Cheque">Bank Cheque / Pay Order</option>
                  <option value="SWIFT Wire">International SWIFT Wire</option>
                </select>
              </div>

              <div class="sm:col-span-1">
                <label for="amount_paid" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Amount Paid *
                </label>
                <input type="number" step="any" id="amount_paid" name="amount_paid" required placeholder="e.g. 50000" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
              </div>

              <div class="sm:col-span-1">
                <label for="currency" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                  Currency *
                </label>
                <select id="currency" name="currency" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
                  <option value="BDT" selected>BDT (৳)</option>
                  <option value="USD">USD ($)</option>
                  <option value="EUR">EUR (€)</option>
                  <option value="GBP">GBP (£)</option>
                </select>
              </div>
            </div>

            <div>
              <label for="transaction_id" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Transaction ID (TrxID) / Cheque No / Slip Ref *
              </label>
              <input type="text" id="transaction_id" name="transaction_id" required placeholder="e.g. BL9408221 / Cheque #004921 / NPSB Ref" class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm font-mono-tag font-bold text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]">
            </div>

            <div>
              <label for="additional_notes" class="block text-xs font-bold font-mono-tag text-[#334155] uppercase mb-2">
                Additional Notes or Milestone Reference (Optional)
              </label>
              <textarea id="additional_notes" name="additional_notes" rows="3" placeholder="e.g. 50% Milestone settlement for Cloud ERP deployment." class="w-full px-3.5 py-2.5 rounded-lg border border-[#CBD5E1] text-sm text-[#0F172A] bg-white focus:outline-none focus:border-[#0284C7]"></textarea>
            </div>

            <button type="submit" name="rajtechbd_payment_verify_submit" value="1" class="w-full py-3.5 rounded-[6px] bg-[#0284C7] text-white font-bold text-sm hover:bg-[#0369a1] hover-lift transition-all shadow-xs flex items-center justify-center gap-2">
              <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>Submit for Verification</span>
            </button>
          </form>

        </div>

      </div>

    </div>
  </section>

  <!-- ================= 8. FREQUENTLY ASKED QUESTIONS (PAYMENT SYSTEM) ================= -->
  <section class="py-20 bg-[#F8FAFC] border-b border-[#E2E8F0]">
    <div class="max-w-[860px] mx-auto px-6">
      
      <div class="text-center mb-12">
        <span class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase tracking-wider block mb-2">
          HELP &amp; INVOICING COMPLIANCE
        </span>
        <h2 class="text-3xl font-extrabold text-[#0F172A] tracking-tight">
          Payment System Frequently Asked Questions
        </h2>
      </div>

      <div class="space-y-4">
        
        <!-- Q1 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]" open>
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>Can international clients pay in USD, EUR, or GBP?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Yes. International technology partners can settle invoices via <strong>International SWIFT Wire</strong> directly into our corporate account at Dutch-Bangla Bank Limited, or via <strong>Visa, Mastercard, and American Express</strong> through our encrypted multi-currency checkout links.
          </div>
        </details>

        <!-- Q2 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>Do you provide NBR Mushak-6.3 VAT Receipts?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Absolutely. RajTech BD Limited is a registered corporate entity under RJSC and NBR. Every client invoice qualifies for official <strong>Mushak-6.3 VAT</strong> documentation and withholding tax (TDS/VDS) certificates in compliance with Bangladesh Tax Laws.
          </div>
        </details>

        <!-- Q3 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>What should I write in the "Reference" box for mobile banking?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Always write your official <strong>Invoice Number</strong> (e.g. <code class="font-mono-tag bg-slate-100 px-1 py-0.5 rounded text-xs">RTBD-1048</code>) or your company name. This allows our accounting software to instantly match and clear the ledger.
          </div>
        </details>

        <!-- Q4 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>How do we deliver an Account Payee Bank Cheque or Pay Order?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Bank Cheques and Pay Orders must be drawn in favor of <strong>"RajTech BD Limited"</strong> and crossed <strong>"Account Payee Only"</strong>. You can deliver it directly to our headquarters in Kuril, Vatara, Dhaka-1229, dispatch via registered courier with tracking, or deposit into our DBBL account at any branch across Bangladesh.
          </div>
        </details>

        <!-- Q5 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>How does the SSLCommerz Instant Online Checkout work?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            SSLCommerz is our unified online gateway. When you receive a payment link, you can pay using any local or international credit/debit card, bKash, Nagad, Rocket, Upay, or internet banking portals (City Touch, EBL, Islami Bank, DBBL NexusPay, etc.). Clearance is instant with zero manual verification needed.
          </div>
        </details>

        <!-- Q6 -->
        <details class="group bg-white border border-[#E2E8F0] rounded-xl p-5 transition-all open:shadow-xs open:border-[#BAE6FD]">
          <summary class="flex items-center justify-between cursor-pointer list-none text-base font-bold text-[#0F172A] group-hover:text-[#0284C7] select-none">
            <span>What happens if I enter an incorrect reference or make a partial transfer?</span>
            <span class="text-[#64748B] transition-transform group-open:rotate-180">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </span>
          </summary>
          <div class="mt-4 pt-3 border-t border-[#E2E8F0] text-sm text-[#475569] leading-relaxed">
            Simply send your Transaction ID (TrxID) or bank deposit slip screenshot directly to our WhatsApp hotline at <a href="https://wa.me/8801758522846" target="_blank" rel="noopener" class="text-[#0284C7] font-bold font-mono-tag">+8801758522846</a> or email <a href="mailto:info@rajtechbd.com" class="text-[#0284C7] font-bold font-mono-tag">info@rajtechbd.com</a>. An accounts executive will manually verify the funds with the bank and match it to your invoice within minutes.
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

    // 2. Interactive Category Filter Tabs (Handles All 7 Rails)
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
          if (filter === 'all' || (category && category.indexOf(filter) !== -1)) {
            card.style.display = 'block';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // 3. Interactive Fee & VAT Settlement Estimator
    const calcChannel = document.getElementById('calc-channel');
    const calcAmount = document.getElementById('calc-amount');
    const calcVatCheck = document.getElementById('calc-include-vat');
    const outBase = document.getElementById('calc-out-base');
    const outFee = document.getElementById('calc-out-fee');
    const outVat = document.getElementById('calc-out-vat');
    const outTotal = document.getElementById('calc-out-total');

    const rates = {
      bank: { feePct: 0.00, label: '৳0.00 (0% Free)' },
      cheque: { feePct: 0.00, label: '৳0.00 (0% Free)' },
      ssl: { feePct: 0.02, label: '2.00%' },
      bkash: { feePct: 0.015, label: '1.50%' },
      nagad: { feePct: 0.0145, label: '1.45%' },
      rocket: { feePct: 0.015, label: '1.50%' },
      card: { feePct: 0.025, label: '2.50%' }
    };

    function recalculate() {
      if (!calcAmount || !calcChannel) return;
      const amt = parseFloat(calcAmount.value) || 0;
      const channel = calcChannel.value || 'bank';
      const config = rates[channel] || { feePct: 0, label: '0%' };

      const fee = amt * config.feePct;
      const vat = (calcVatCheck && calcVatCheck.checked) ? (amt * 0.05) : 0;
      const total = amt + fee + vat;

      const fmt = num => '৳' + Number(num).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

      if (outBase) outBase.textContent = fmt(amt);
      if (outFee) outFee.textContent = config.feePct === 0 ? '৳0.00 (0% Free)' : fmt(fee) + ' (' + config.label + ')';
      if (outVat) outVat.textContent = fmt(vat) + (vat > 0 ? ' (5%)' : ' (0%)');
      if (outTotal) outTotal.textContent = fmt(total);
    }

    if (calcChannel && calcAmount) {
      calcChannel.addEventListener('change', recalculate);
      calcAmount.addEventListener('input', recalculate);
      if (calcVatCheck) calcVatCheck.addEventListener('change', recalculate);
      recalculate();
    }
  });
  </script>

<?php
endif;
get_footer();
