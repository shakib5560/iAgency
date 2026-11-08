import os

html_content = """<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RajTech BD | Engineering Scalable ERP, Web & Commerce Systems</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    .font-mono-tag {
      font-family: 'JetBrains Mono', monospace;
    }
    .hover-lift {
      transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hover-lift:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>
<body class="bg-white text-[#0F172A] antialiased selection:bg-[#F59E0B] selection:text-[#0F172A]">

  <!-- ================= 1. MINIMALIST STICKY HEADER ================= -->
  <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6 h-20 flex items-center justify-between">
      <!-- Logo -->
      <a href="#" class="text-2xl font-extrabold tracking-tight text-[#0F172A] flex items-center">
        RajTechBD<span class="text-[#F59E0B]">.</span>
      </a>

      <!-- Navigation -->
      <nav class="hidden md:flex items-center gap-8 text-[15px] font-semibold text-[#475569]">
        <a href="#solutions" class="hover:text-[#0F172A] transition-colors">Solutions</a>
        <a href="#enterprise-erp" class="hover:text-[#0F172A] transition-colors">Enterprise ERP</a>
        <a href="#services" class="hover:text-[#0F172A] transition-colors">Services</a>
        <a href="#case-studies" class="hover:text-[#0F172A] transition-colors">Case Studies</a>
        <a href="#process" class="hover:text-[#0F172A] transition-colors">Process</a>
        <a href="#about" class="hover:text-[#0F172A] transition-colors">About</a>
      </nav>

      <!-- CTA -->
      <div class="flex items-center gap-4">
        <a href="#contact" class="inline-flex items-center justify-center px-5 py-2.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm tracking-wide hover:bg-[#d97706] hover-lift transition-all">
          Schedule a Consultation
        </a>
      </div>
    </div>
  </header>

  <!-- ================= 2. SECTION 1: HERO & BENTO METRICS GRID ================= -->
  <section class="bg-[#F8FAFC] py-20 lg:py-28 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column (55% / 7 cols) -->
        <div class="lg:col-span-7 flex flex-col items-start">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E0F2FE] border border-[#BAE6FD] text-[#0284C7] text-xs font-mono-tag font-bold tracking-widest uppercase mb-6">
            ENTERPRISE SOFTWARE & DIGITAL ENGINEERING
          </div>
          <h1 class="text-4xl sm:text-5xl lg:text-[52px] font-extrabold text-[#0F172A] leading-[1.12] tracking-[-0.03em] mb-6">
            Engineering Scalable ERP, Web & Commerce Systems Built for Growth.
          </h1>
          <p class="text-lg text-[#475569] leading-relaxed mb-8 max-w-2xl font-normal">
            RajTech BD partners with ambitious enterprises and fast-growing brands to architect custom ERP platforms, automated inventory & finance systems, and high-converting web, mobile, Shopify, and WordPress experiences. Delivering reliable software and web application excellence since 2018.
          </p>
          <div class="flex flex-wrap items-center gap-4">
            <a href="#solutions" class="px-7 py-3.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-[15px] hover:bg-[#d97706] hover-lift transition-all">
              Explore Our Solutions
            </a>
            <a href="#case-studies" class="px-6 py-3.5 text-[#0F172A] font-bold text-[15px] hover:text-[#0284C7] flex items-center gap-2 transition-colors">
              View Architecture & Case Studies <span class="text-lg">→</span>
            </a>
          </div>
        </div>

        <!-- Right Column (45% / 5 cols) Bento Grid -->
        <div class="lg:col-span-5 grid grid-cols-2 gap-4">
          <!-- Card 1: Team Image -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-48 bg-slate-100">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-08-at-10.09.58-PM1.jpeg" 
                 alt="RajTech BD Engineering Team" 
                 class="w-full h-full object-cover"
                 onerror="this.src='photo/WhatsApp Image 2026-11-08 at 10.09.58 PM(1).jpeg'">
          </div>

          <!-- Card 2: Stat Card 99.9% -->
          <div class="bg-white rounded-lg p-6 border border-[#E2E8F0] shadow-sm flex flex-col justify-center">
            <div class="text-4xl font-extrabold text-[#0F172A] tracking-tight mb-1">99.9%</div>
            <div class="text-xs font-medium text-[#475569] leading-snug">System Uptime & Atomic Inventory Accuracy</div>
          </div>

          <!-- Card 3: Stat Card 40+ -->
          <div class="bg-white rounded-lg p-6 border border-[#E2E8F0] shadow-sm flex flex-col justify-center">
            <div class="text-4xl font-extrabold text-[#0F172A] tracking-tight mb-1">40+</div>
            <div class="text-xs font-medium text-[#475569] leading-snug">Enterprise ERP, FinTech & E-Commerce Modules Delivered</div>
          </div>

          <!-- Card 4: Office Environment Image -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-48 bg-slate-100">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Gemini_Generated_Image_wdg8qcwdg8qcwdg81-scaled.jpeg" 
                 alt="RajTech BD Modern Office" 
                 class="w-full h-full object-cover"
                 onerror="this.src='photo/Gemini_Generated_Image_wdg8qcwdg8qcwdg8(1).jpeg'">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 3. SECTION 2: TRUSTED ECOSYSTEM BAR ================= -->
  <section class="bg-white py-12 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
      <p class="text-xs font-mono-tag font-bold tracking-[2px] text-[#94A3B8] uppercase mb-8">
        POWERING OPERATIONS ACROSS MODERN TECH STACKS & PLATFORMS
      </p>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          Custom ERP
        </div>
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          Shopify Plus
        </div>
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          WordPress VIP
        </div>
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          Cloud Native
        </div>
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          FinTech APIs
        </div>
        <div class="py-3.5 px-4 rounded-[6px] bg-[#F8FAFC] border border-[#E2E8F0] text-sm font-bold text-[#0F172A]">
          Mobile iOS & Android
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. SECTION 3: ALTERNATING CHECKERBOARD EDITORIAL GRID ================= -->
  <section id="solutions" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 gap-4">
        <div>
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase block mb-2">FLAGSHIP ARCHITECTURE</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight">
            Core Enterprise Platforms We Architect
          </h2>
        </div>
        <a href="#services" class="text-sm font-bold text-[#0284C7] hover:underline inline-flex items-center gap-1">
          See All Capabilities <span>→</span>
        </a>
      </div>

      <!-- 3-Row Checkerboard Grid -->
      <div class="flex flex-col gap-6">

        <!-- ROW 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
          <!-- Col 1: Text Card 01 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">01 / MODULAR ARCHITECTURE</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Custom ERP Systems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Unified enterprise resource planning tailored to automate workflows, HR, supply chain, and multi-branch operations with centralized reporting.
            </p>
          </div>
          <!-- Col 2: Boss Room Image -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Modern-Office-Meeting-with-Red-Shirted-Note-Taker11.png" 
                 alt="Executive Strategy & Architecture Meeting" 
                 class="w-full h-full object-cover"
                 onerror="this.src='photo/Modern Office Meeting with Red-Shirted Note-Taker(1)(1).png'">
          </div>
          <!-- Col 3: Text Card 02 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">02 / LOGISTICS AUTOMATION</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Inventory Management Systems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Real-time multi-warehouse stock tracking, barcode/SKU automation, low-stock forecasting, and atomic order syncing across physical & digital stores.
            </p>
          </div>
        </div>

        <!-- ROW 2 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
          <!-- Col 1: Warehouse Visual -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80" 
                 alt="Automated Warehouse Distribution" 
                 class="w-full h-full object-cover">
          </div>
          <!-- Col 2: Text Card 03 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">03 / FINANCIAL ENGINE</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Finance & Accounting Management</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Automated ledger reconciliation, invoicing, multi-currency payment gateways, tax compliance, and real-time P&L reporting.
            </p>
          </div>
          <!-- Col 3: FinTech Visual -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                 alt="FinTech Analytics & Realtime Reporting" 
                 class="w-full h-full object-cover">
          </div>
        </div>

        <!-- ROW 3 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
          <!-- Col 1: Text Card 04 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">04 / EDTECH INFRASTRUCTURE</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Learning Management Systems (LMS)</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              Interactive course delivery, student progress tracking, live assessments, and automated certification portals engineered for high-concurrency cohorts.
            </p>
          </div>
          <!-- Col 2: LMS Visual -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] h-64 md:h-auto shadow-sm">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" 
                 alt="Collaborative EdTech Learning Platform" 
                 class="w-full h-full object-cover">
          </div>
          <!-- Col 3: Text Card 05 -->
          <div class="bg-[#F8FAFC] rounded-lg p-8 border border-[#E2E8F0] flex flex-col justify-center">
            <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-wider mb-3">05 / HIGH-THROUGHPUT WEB</span>
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Custom Web & Mobile Ecosystems</h3>
            <p class="text-[15px] text-[#475569] leading-relaxed">
              High-throughput web applications and cross-platform mobile apps engineered for speed, security, and seamless user experiences.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 5. SECTION 4: 3x3 DARK ENTERPRISE GRID ================= -->
  <section id="services" class="bg-[#0B1528] py-24 text-white">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-[2px] uppercase block mb-3">END-TO-END CAPABILITIES</span>
        <h2 class="text-3xl sm:text-[38px] font-bold tracking-tight text-white mb-4">
          Comprehensive Software & E-Commerce Engineering
        </h2>
        <p class="text-[#94A3B8] text-base sm:text-lg">
          From heavy-duty backend ERP infrastructure to pixel-perfect storefront conversion.
        </p>
      </div>

      <!-- 3x3 Card Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Service 1 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Enterprise ERP Development</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Custom modular ERP software connecting procurement, operations, HR, and executive reporting into one atomic database.
          </p>
        </div>

        <!-- Service 2 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Inventory & Warehouse Systems</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Real-time stock control, supplier portals, batch tracking, and automated purchase orders for physical and digital supply chains.
          </p>
        </div>

        <!-- Service 3 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Financial Management Software</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Automated billing, expense auditing, payroll workflows, and secure financial dashboards complying with international standards.
          </p>
        </div>

        <!-- Service 4 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Learning Management Systems (LMS)</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Scalable ed-tech platforms for corporate training, academies, cohort courses, certificate generators, and interactive quizzes.
          </p>
        </div>

        <!-- Service 5 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Full-Stack Web Development</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Bespoke web portals, SaaS platforms, and progressive web apps built with modern API-first architectures and sub-second performance.
          </p>
        </div>

        <!-- Service 6 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Mobile App Development</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Native and cross-platform iOS & Android applications built for high user retention, biometric security, and offline resilience.
          </p>
        </div>

        <!-- Service 7 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">Shopify & Shopify Plus Development</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            Custom themes, headless commerce, private Shopify apps, and checkout optimization delivering frictionless consumer conversions.
          </p>
        </div>

        <!-- Service 8 -->
        <div class="bg-[#132238] rounded-lg p-7 border border-[#1E3352] hover:border-[#38bdf8] transition-colors">
          <h3 class="text-xl font-bold text-white mb-3">WordPress & WooCommerce Engineering</h3>
          <p class="text-[#94A3B8] text-[15px] leading-relaxed">
            High-speed custom themes, Elementor architectures, enterprise plugins, performance tuning, and bulletproof security hardening.
          </p>
        </div>

        <!-- Service 9: Highlighted CTA Card -->
        <div class="bg-[#1A2E4C] rounded-lg p-7 border border-[#F59E0B] shadow-lg flex flex-col justify-between">
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Need a Custom Architecture?</h3>
            <p class="text-[#94A3B8] text-[15px] leading-relaxed mb-6">
              Let's scope your system requirements and technical roadmap with our principal engineers.
            </p>
          </div>
          <a href="#contact" class="inline-flex items-center justify-center px-5 py-2.5 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-sm hover:bg-[#d97706] hover-lift transition-all">
            Book Discovery Call
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 6. SECTION 5: WHY RAJTECH BD (STICKY SPLIT) ================= -->
  <section id="about" class="bg-white py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column (40% / 5 cols) -->
        <div class="lg:col-span-5 flex flex-col">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-3">WHY CHOOSE RAJTECH BD</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight mb-5">
            Built on Typography-Clean Code & Battle-Tested Architecture.
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6 font-normal">
            RajTech BD is a specialized web design, web development, and software application company based in Mirpur-14, Dhaka. Serving local and global enterprises since 2018, we combine engineering rigor with reliable outsourcing and continuous SLA maintenance to set your business apart.
          </p>
          <div class="mb-8">
            <a href="#contact" class="inline-flex items-center justify-center px-7 py-3 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-[15px] hover:bg-[#d97706] hover-lift transition-all">
              Start Your Project
            </a>
          </div>
          <!-- Studio Photo -->
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-64">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Gemini_Generated_Image_wdg8qcwdg8qcwdg81-scaled.jpeg" 
                 alt="RajTech BD Modern Workspace" 
                 class="w-full h-full object-cover"
                 onerror="this.src='photo/Gemini_Generated_Image_wdg8qcwdg8qcwdg8(1).jpeg'">
          </div>
        </div>

        <!-- Right Column (60% / 7 cols) 2x2 Metric & Value Grid -->
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8 pt-4">
          
          <div class="border-t border-[#E2E8F0] pt-6">
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Modular & Scalable</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Every ERP, LMS, and web platform is built with clean microservices or modular architecture so you never hit a growth ceiling.
            </p>
          </div>

          <div class="border-t border-[#E2E8F0] pt-6">
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Zero-Bottleneck Performance</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Optimized database queries, caching layers, and atomic inventory operations engineered for high-traffic reliability and fast response.
            </p>
          </div>

          <div class="border-t border-[#E2E8F0] pt-6">
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Conversion-Driven Commerce</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Shopify and WordPress builds engineered for sub-2-second load times, mobile responsiveness, and frictionless checkout flows.
            </p>
          </div>

          <div class="border-t border-[#E2E8F0] pt-6">
            <h3 class="text-xl font-bold text-[#0F172A] mb-3">Dedicated Post-Launch SLA</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Continuous monitoring, security patching, malware protection, and iterative feature rollouts handled by dedicated senior engineers.
            </p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ================= 7. SECTION 6: SELECTED CASE STUDIES SHOWCASE ================= -->
  <section id="case-studies" class="bg-[#0B1528] py-24 text-white">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Section Header -->
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-xs font-mono-tag font-bold text-[#F59E0B] tracking-[2px] uppercase block mb-3">PROVEN RESULTS</span>
        <h2 class="text-3xl sm:text-[38px] font-bold text-white tracking-tight">
          Engineered for Real-World Impact
        </h2>
      </div>

      <!-- 2x2 Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Case 01 -->
        <div class="bg-[#132238] rounded-lg p-6 border border-[#1E3352] flex flex-col justify-between hover-lift">
          <div class="rounded-md overflow-hidden h-48 mb-5 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80" 
                 alt="ERP Logistics Engine" 
                 class="w-full h-full object-cover">
          </div>
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Multi-Warehouse ERP & Inventory Engine</h3>
            <p class="text-[#94A3B8] text-[15px] leading-relaxed mb-4">
              Automated stock synchronization across 15+ retail locations with real-time financial ledger integration and zero duplicate transactions.
            </p>
          </div>
          <a href="#contact" class="text-sm font-bold text-[#F59E0B] hover:underline inline-flex items-center gap-1">
            Read Case Study <span>→</span>
          </a>
        </div>

        <!-- Case 02 -->
        <div class="bg-[#132238] rounded-lg p-6 border border-[#1E3352] flex flex-col justify-between hover-lift">
          <div class="rounded-md overflow-hidden h-48 mb-5 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" 
                 alt="Automated Billing Suite" 
                 class="w-full h-full object-cover">
          </div>
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Automated Corporate Finance & Billing Suite</h3>
            <p class="text-[#94A3B8] text-[15px] leading-relaxed mb-4">
              Streamlined voucher approvals, VAT/tax calculations, and automated monthly financial statements for multinational enterprises.
            </p>
          </div>
          <a href="#contact" class="text-sm font-bold text-[#F59E0B] hover:underline inline-flex items-center gap-1">
            Read Case Study <span>→</span>
          </a>
        </div>

        <!-- Case 03 -->
        <div class="bg-[#132238] rounded-lg p-6 border border-[#1E3352] flex flex-col justify-between hover-lift">
          <div class="rounded-md overflow-hidden h-48 mb-5 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" 
                 alt="Academy LMS Portal" 
                 class="w-full h-full object-cover">
          </div>
          <div>
            <h3 class="text-xl font-bold text-white mb-2">High-Scale Academy LMS & Certification Portal</h3>
            <p class="text-[#94A3B8] text-[15px] leading-relaxed mb-4">
              Interactive video streaming, quiz engines, and automated cohort management serving 50,000+ active professional learners.
            </p>
          </div>
          <a href="#contact" class="text-sm font-bold text-[#F59E0B] hover:underline inline-flex items-center gap-1">
            Read Case Study <span>→</span>
          </a>
        </div>

        <!-- Case 04 -->
        <div class="bg-[#132238] rounded-lg p-6 border border-[#1E3352] flex flex-col justify-between hover-lift">
          <div class="rounded-md overflow-hidden h-48 mb-5 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=1200&q=80" 
                 alt="Headless Commerce Experience" 
                 class="w-full h-full object-cover">
          </div>
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Headless Shopify & Custom Mobile Commerce</h3>
            <p class="text-[#94A3B8] text-[15px] leading-relaxed mb-4">
              Unified web and mobile shopping experience with instant inventory locking and custom checkout extensions yielding 34% higher conversions.
            </p>
          </div>
          <a href="#contact" class="text-sm font-bold text-[#F59E0B] hover:underline inline-flex items-center gap-1">
            Read Case Study <span>→</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 8. SECTION 7: HOW WE DELIVER (NUMBERED PROCESS) ================= -->
  <section id="process" class="bg-[#F8FAFC] py-24 border-b border-[#F1F5F9]">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left Column (35% / 4 cols) -->
        <div class="lg:col-span-5 flex flex-col">
          <span class="text-xs font-mono-tag font-bold text-[#0284C7] tracking-widest uppercase mb-3">OUR METHODOLOGY</span>
          <h2 class="text-3xl sm:text-[38px] font-bold text-[#0F172A] tracking-[-0.02em] leading-tight mb-4">
            Our Engineering & Delivery Blueprint
          </h2>
          <p class="text-[#475569] text-base leading-relaxed mb-6">
            A transparent, milestone-driven workflow built for mission-critical software. Every sprint is paired with automated CI/CD pipelines, direct Slack channels with principal architects, and rigorous quality assurance.
          </p>
          <div class="rounded-lg overflow-hidden border border-[#E2E8F0] shadow-sm h-60">
            <img src="https://rajtechbd.com/wp-content/uploads/2026/11/Modern-Office-Meeting-with-Red-Shirted-Note-Taker11.png" 
                 alt="RajTech BD Agile Review" 
                 class="w-full h-full object-cover"
                 onerror="this.src='photo/Modern Office Meeting with Red-Shirted Note-Taker(1)(1).png'">
          </div>
        </div>

        <!-- Right Column (65% / 7 cols) 4 Numbered Steps -->
        <div class="lg:col-span-7 flex flex-col justify-center divide-y divide-[#E2E8F0]">
          
          <div class="pb-6 pt-2">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 01</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">01 / System Audit & Architecture Blueprint</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Deep-dive into your existing business workflows, legacy databases, data models, and ERP/commerce integration points to architect an unyielding foundation.
            </p>
          </div>

          <div class="py-6">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 02</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">02 / Minimalist UI/UX & Prototype Design</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              High-clarity dashboards and user interfaces designed for zero cognitive friction, rapid operator data entry, and seamless mobile ergonomics.
            </p>
          </div>

          <div class="py-6">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 03</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">03 / Agile Sprint Engineering & QA</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Iterative development of backend modules, APIs, mobile apps, and storefronts with automated unit testing, load testing, and security hardening.
            </p>
          </div>

          <div class="pt-6">
            <div class="text-xs font-mono-tag font-bold text-[#0284C7] uppercase mb-1">PHASE 04</div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">04 / Deployment, Training & Scale</h3>
            <p class="text-[#475569] text-[15px] leading-relaxed">
              Zero-downtime cloud deployment, hands-on staff onboarding for ERP/LMS tools, and ongoing SLA maintenance to ensure smooth growth.
            </p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ================= 9. SECTION 8: BOTTOM CONVERSION BANNER & MINIMALIST FOOTER ================= -->
  <footer id="contact" class="bg-[#0B1528] pt-24 pb-12 text-white border-t border-[#1E3352]">
    <div class="max-w-[1280px] mx-auto px-6">
      
      <!-- Contained Callout Box -->
      <div class="bg-[#132238] rounded-xl p-10 sm:p-16 border border-[#1E3352] text-center max-w-4xl mx-auto mb-20 shadow-xl">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
          Ready to Modernize Your Operations or Storefront?
        </h2>
        <p class="text-[#94A3B8] text-base sm:text-lg max-w-2xl mx-auto mb-8">
          Whether you need a custom ERP, an automated inventory & finance system, or a flagship Shopify/WordPress platform, RajTech BD delivers with precision.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="mailto:rajtechbdt@gmail.com" class="px-8 py-4 rounded-[6px] bg-[#F59E0B] text-[#0F172A] font-bold text-base hover:bg-[#d97706] hover-lift transition-all">
            Schedule a Free Technical Consultation
          </a>
          <a href="https://wa.me/8801758522846" target="_blank" class="px-6 py-4 rounded-[6px] border border-[#1E3352] bg-[#0B1528] text-white font-bold text-base hover:border-[#F59E0B] hover-lift transition-all">
            Chat on WhatsApp
          </a>
        </div>
      </div>

      <!-- 4-Column Minimalist Footer -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-16 border-b border-[#1E3352]">
        
        <!-- Col 1: Brand & Contact (4 cols) -->
        <div class="lg:col-span-4 flex flex-col">
          <a href="#" class="text-2xl font-extrabold text-white tracking-tight mb-4 flex items-center">
            RajTechBD<span class="text-[#F59E0B]">.</span>
          </a>
          <p class="text-sm text-[#94A3B8] leading-relaxed mb-6 font-normal">
            Specialized web application, ERP, and software engineering partner based in Mirpur-14, Dhaka-1216, Bangladesh. Delivering mission-critical digital systems since 2018.
          </p>
          <div class="text-sm text-[#94A3B8] space-y-1">
            <p><strong class="text-white">Email:</strong> rajtechbdt@gmail.com</p>
            <p><strong class="text-white">Phone / WhatsApp:</strong> +8801758522846</p>
            <p><strong class="text-white">Location:</strong> Mirpur-14, Dhaka-1216, Bangladesh</p>
          </div>
        </div>

        <!-- Col 2: Enterprise Systems (2 cols) -->
        <div class="lg:col-span-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Enterprise Systems</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8]">
            <li><a href="#solutions" class="hover:text-white transition-colors">Custom ERP Systems</a></li>
            <li><a href="#solutions" class="hover:text-white transition-colors">Inventory Management</a></li>
            <li><a href="#solutions" class="hover:text-white transition-colors">Finance & Accounting</a></li>
            <li><a href="#solutions" class="hover:text-white transition-colors">Learning Management (LMS)</a></li>
            <li><a href="#solutions" class="hover:text-white transition-colors">Multi-Warehouse Sync</a></li>
          </ul>
        </div>

        <!-- Col 3: Digital & Commerce (3 cols) -->
        <div class="lg:col-span-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Digital & Commerce</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8]">
            <li><a href="#services" class="hover:text-white transition-colors">Custom Web Applications</a></li>
            <li><a href="#services" class="hover:text-white transition-colors">Mobile Apps (iOS & Android)</a></li>
            <li><a href="#services" class="hover:text-white transition-colors">Shopify & Shopify Plus</a></li>
            <li><a href="#services" class="hover:text-white transition-colors">WordPress & WooCommerce</a></li>
            <li><a href="#services" class="hover:text-white transition-colors">API Architecture & Integrations</a></li>
          </ul>
        </div>

        <!-- Col 4: Company (2 cols) -->
        <div class="lg:col-span-2">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-mono-tag">Company</h4>
          <ul class="space-y-3 text-sm text-[#94A3B8]">
            <li><a href="#about" class="hover:text-white transition-colors">About RajTech BD</a></li>
            <li><a href="#case-studies" class="hover:text-white transition-colors">Case Studies</a></li>
            <li><a href="#process" class="hover:text-white transition-colors">Engineering Blueprint</a></li>
            <li><a href="#services" class="hover:text-white transition-colors">Client Support & SLAs</a></li>
            <li><a href="#contact" class="hover:text-white transition-colors">Contact Us</a></li>
          </ul>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-[#64748B] gap-4">
        <p>© 2026 RajTech BD. All Rights Reserved. Engineered with precision in Dhaka, Bangladesh.</p>
        <p class="font-mono-tag">Architected with 100% Native Elementor Specifications</p>
      </div>

    </div>
  </footer>

</body>
</html>
"""

with open("/home/dev_shakib/Projects/rajTechBD/index.html", "w", encoding="utf-8") as f:
    f.write(html_content)

print("index.html created successfully.")
