# RajTech BD Limited - Enterprise WordPress Theme (Elementor & Gutenberg Optimized)

<div align="center">
  <img src="screenshot.png" alt="iAgency - RajTech BD Limited WordPress Theme Thumbnail" width="100%" style="border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);" />
</div>

**RajTech BD Limited** is a premier corporate WordPress theme tailored for an experienced software engineering, custom ERP platforms, modern web development, and AI system development limited company in Dhaka, Bangladesh (Est. 2018).

---

## 🚀 Key Upgrades in Version 1.2.0

### 1. Dynamic Top 3 Latest Portfolio on the Home Page
- **Dynamic CPT Query**: Automatically pulls the top 3 latest published items from the Custom Post Type `portfolio`.
- **Client & Impact Meta**: Displays Client Entity, Year, Key Metric (e.g. `99.9% Uptime`, `3.8x Speed`, `50k+ Learners`), and Technology Stack tags.
- **Dedicated Portfolio Details Page ([`single-portfolio.php`](file:///home/dev_shakib/Projects/rajTechBD/rajtechbd/single-portfolio.php))**:
  - Full case study narrative with problem/solution architecture.
  - Interactive metrics banner and production tech stack pills.
  - SLA & code ownership guarantees.
  - Scoping callout box & previous/next project navigation.
- **Dedicated Portfolio Archive ([`archive-portfolio.php`](file:///home/dev_shakib/Projects/rajTechBD/rajtechbd/archive-portfolio.php))**: Filterable archive at `/portfolio/`.

### 2. Dynamic Top 3 Latest Blog Posts on the Home Page
- **Dynamic Post Query**: Automatically queries the 3 latest technical blog publications.
- **Article Meta**: Displays Category badges, publication dates, and dynamic reading time (`rajtechbd_get_reading_time()`).
- **Dedicated Blog Details Page ([`single.php`](file:///home/dev_shakib/Projects/rajTechBD/rajtechbd/single.php))**:
  - Breadcrumb navigation (`Home > Engineering Insights > Article Title`).
  - Executive Brief / Key Takeaways callout box.
  - Formatted `.entry-content` supporting full Gutenberg blocks and Elementor.
  - Author profile box (Principal Systems Team at RajTech BD Ltd., Kuril, Vatara, Dhaka-1229).
  - Related Technical Publications grid.
  - Threaded comment section and scoping CTA.

### 3. Footer Logo Replacement
- Replaced the footer logo with:
  `https://rajtechbd.com/wp-content/uploads/2024/07/white-logo.png`
  (includes graceful fallback to the local white vector logo).

### 4. Privacy Policy & Terms and Conditions Pages
- **[`page-privacy-policy.php`](file:///home/dev_shakib/Projects/rajTechBD/rajtechbd/page-privacy-policy.php)**: Bank-grade data protection, strict Non-Disclosure Agreement (NDA) compliance, and AI data privacy safeguards (client data is never used to train public third-party AI models).
- **[`page-terms.php`](file:///home/dev_shakib/Projects/rajTechBD/rajtechbd/page-terms.php)**: 100% client source code ownership upon final milestone payment, 60-90 day bug-fix warranties, 24/7 SLA terms, and governing law under the People's Republic of Bangladesh.

### 5. Registered Limited Company Status & Perfect Copyright
- **Corporate Entity**: **RajTech BD Limited** (Incorporated in Bangladesh under the Companies Act, 1994).
- **Copyright Statement**:
  `© 2018 - 2026 RajTech BD Limited (Registered in Bangladesh under the Companies Act, 1994). All Rights Reserved.`
  `A Premier Software Engineering, Enterprise ERP, Modern Web & AI Systems Development Limited Company. Kuril, Vatara, Dhaka-1229.`

### 6. Old-Fashioned Experienced Discipline + Cutting-Edge Modern AI
- Blends **8+ years of battle-tested software engineering** (ACID relational concurrency, zero technical debt, direct Slack communication with principal architects) with **modern web engineering** and **AI system development** (autonomous agents, deterministic LLM pipelines, Next.js, sub-200ms TTFB).

### 7. Dedicated Payment System Page Template (`page-payment-system.php`)
- **Target URL**: `https://rajtechbd.com/payment-system/`
- **Supported Payment Channels**:
  1. **Visa**: Domestic & international credit/debit cards with 3D Secure 2.0 & multi-currency billing (BDT, USD, EUR, GBP).
  2. **Corporate Bank Transfer**: Dutch-Bangla Bank Ltd (DBBL) corporate wire with NPSB (real-time), EFTN/BEFTN, RTGS (>৳1,00,000), and SWIFT wire (`DBBLBDDH`).
  3. **bKash**: Merchant Payment (`01758522846`, Counter 1), QR payment, Personal, and USSD `*247#`.
  4. **Rocket (DBBL)**: Biller/Merchant ID (`01758522846`), 12-digit account format, and USSD `*322#`.
  5. **Nagad**: Postal Digital Financial Service Merchant (`01758522846`), Personal, and USSD `*167#`.
  6. **Bank Cheque & Pay Order**: "Account Payee Only" corporate cheques drawn in favor of **RajTech BD Limited**, with physical handover at Kuril HQ, courier, or branch deposit.
- **Features**: 1-click copy-to-clipboard for all account and routing numbers with toast alerts, category filtering tabs, 3-step billing protocol, real-time payment notification & verification form with `wp_mail` integration, TDS/VDS compliance guidelines, interactive FAQ accordion, and rich JSON-LD SEO schema (`WebPage`, `BreadcrumbList`, `FinancialService`, `FAQPage`).

---

## ⚡ Elementor & Gutenberg Compatibility

Every single page in this theme can be edited directly with **Elementor** or **Gutenberg**:
1. Go to **Pages > All Pages** in WordPress Admin.
2. Hover over any page and click **Edit with Elementor**.
3. The visual builder opens without errors.

---

## 🛠️ Complete Theme File Map

```
rajtechbd/
├── style.css                           # Theme header & Gutenberg styling
├── functions.php                       # Theme setup, CPT registration, 1-click installer
├── header.php                          # Top micro-bar, sticky navbar with attached logo & dropdowns
├── footer.php                          # 4-Column footer with new white logo & legal links
├── front-page.php                      # Homepage with Dynamic Portfolio & Dynamic Blog feeds
├── single.php                          # Dedicated Blog Details page
├── single-portfolio.php                # Dedicated Portfolio Details page
├── archive-portfolio.php               # Dedicated Portfolio Archive page
├── index.php                           # Blog archive page
├── archive.php                         # Archive fallback template
├── page-about.php                      # "About Us" template with Elementor support
├── page-services.php                   # "Services & ERP" template with AI systems & Elementor support
├── page-case-studies.php               # "Case Studies" template
├── page-faq.php                        # "FAQ" template with accordion & JSON-LD
├── page-payment-system.php             # "Payment System" template (Visa, Bank Wire, bKash, Rocket, Nagad, Cheque)
├── page-contact.php                    # "Contact Us" template with inquiry form
├── page-privacy-policy.php             # "Privacy Policy" template for RajTech BD Ltd.
├── page-terms.php                      # "Terms & Conditions" template for RajTech BD Ltd.
├── page.php                            # Default page template with Gutenberg support
├── template-elementor-fullwidth.php    # Elementor Full Width canvas template
├── template-elementor-canvas.php       # Elementor Canvas blank template
├── comments.php                        # Comments template
├── 404.php                             # Branded 404 error page
├── screenshot.png                      # WordPress admin theme preview image
├── assets/
│   ├── css/
│   │   └── theme.css                   # Custom styles, animations, and dropdown CSS
│   ├── js/
│   │   └── theme.js                    # Reveal animations, stat counters, accordion, drawer
│   └── images/
│       ├── black-logo-1.png            # Main brand logo (300x72)
│       ├── rajtechbd-logo.svg          # Primary vector brand logo fallback
│       ├── rajtechbd-logo-white.svg    # White vector brand logo
│       ├── rajtechbd-hub.jpeg          # Kuril Technology Hub
│       ├── rajtechbd-meeting.png       # Strategy & Architecture Meeting
│       └── rajtechbd-team.jpeg         # Engineering Team & Leadership
└── README.md
```

---

## 📞 Corporate Contact Information
- **Company**: RajTech BD Limited (Incorporated in Dhaka, Bangladesh)
- **Primary Email**: info@rajtechbd.com
- **Secondary Email**: rajtechbdt@gmail.com
- **Phone / WhatsApp**: +8801758522846
- **Headquarters**: House Kha-92/1, Kuril, Vatara, Dhaka-1229, Bangladesh (Short: Kuril, Vatara, Dhaka-1229)
- **Team Structure**: Core Systems Leadership, Engineer Level 1 Group, and Engineering Intern Group

