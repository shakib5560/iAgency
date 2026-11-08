import json
import uuid

def gen_id():
    return uuid.uuid4().hex[:7]

def make_container(elements=None, settings=None, is_inner=False):
    return {
        "id": gen_id(),
        "elType": "container",
        "isInner": is_inner,
        "settings": settings or {},
        "elements": elements or []
    }

def make_heading(title, tag="h2", color="#0F172A", font_size=38, font_weight="700", line_height=1.2, letter_spacing=None, font_family="Plus Jakarta Sans", align="left", margin=None):
    settings = {
        "title": title,
        "header_size": tag,
        "align": align,
        "title_color": color,
        "typography_typography": "custom",
        "typography_font_family": font_family,
        "typography_font_weight": str(font_weight),
        "typography_font_size": {
            "unit": "px",
            "size": font_size,
            "sizes": {
                "tablet": int(font_size * 0.85) if font_size > 24 else font_size,
                "mobile": int(font_size * 0.72) if font_size > 24 else font_size
            }
        },
        "typography_line_height": {
            "unit": "em",
            "size": line_height
        }
    }
    if letter_spacing is not None:
        settings["typography_letter_spacing"] = {
            "unit": "px",
            "size": letter_spacing
        }
    if margin:
        settings["margin"] = margin
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "heading",
        "settings": settings,
        "elements": []
    }

def make_eyebrow(text, color="#0284C7", align="left"):
    return make_heading(
        title=text,
        tag="h6",
        color=color,
        font_size=12,
        font_weight="700",
        line_height=1.4,
        letter_spacing=2,
        font_family="JetBrains Mono",
        align=align,
        margin={"unit": "px", "top": "0", "right": "0", "bottom": "12", "left": "0", "isLinked": False}
    )

def make_text_editor(content, color="#475569", font_size=16, line_height=1.65, font_weight="400", align="left", margin=None):
    settings = {
        "editor": f"<p>{content}</p>",
        "align": align,
        "text_color": color,
        "typography_typography": "custom",
        "typography_font_family": "Plus Jakarta Sans",
        "typography_font_weight": str(font_weight),
        "typography_font_size": {
            "unit": "px",
            "size": font_size
        },
        "typography_line_height": {
            "unit": "em",
            "size": line_height
        }
    }
    if margin:
        settings["margin"] = margin
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "text-editor",
        "settings": settings,
        "elements": []
    }

def make_button(text, url="#contact", bg_color="#F59E0B", text_color="#0F172A", border_radius=6, padding=None, align="left", font_size=15):
    p = padding or {"unit": "px", "top": "14", "right": "28", "bottom": "14", "left": "28", "isLinked": False}
    settings = {
        "text": text,
        "link": {"url": url, "is_external": "", "nofollow": ""},
        "align": align,
        "button_text_color": text_color,
        "background_color": bg_color,
        "border_radius": {"unit": "px", "top": border_radius, "right": border_radius, "bottom": border_radius, "left": border_radius, "isLinked": True},
        "typography_typography": "custom",
        "typography_font_family": "Plus Jakarta Sans",
        "typography_font_weight": "700",
        "typography_font_size": {"unit": "px", "size": font_size},
        "text_padding": p
    }
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "button",
        "settings": settings,
        "elements": []
    }

def make_ghost_button(text, url="#case-studies", text_color="#0F172A", font_size=15):
    settings = {
        "text": text,
        "link": {"url": url, "is_external": "", "nofollow": ""},
        "align": "left",
        "button_text_color": text_color,
        "background_color": "transparent",
        "typography_typography": "custom",
        "typography_font_family": "Plus Jakarta Sans",
        "typography_font_weight": "700",
        "typography_font_size": {"unit": "px", "size": font_size},
        "text_padding": {"unit": "px", "top": "14", "right": "20", "bottom": "14", "left": "20", "isLinked": False}
    }
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "button",
        "settings": settings,
        "elements": []
    }

def make_image(url, alt="", border_radius=8, height=None, object_position=None):
    settings = {
        "image": {"url": url, "id": ""},
        "image_size": "full",
        "border_radius": {"unit": "px", "top": border_radius, "right": border_radius, "bottom": border_radius, "left": border_radius, "isLinked": True}
    }
    if height:
        settings["height"] = {"unit": "px", "size": height}
        settings["object-fit"] = "cover"
    if object_position:
        settings["object_position"] = object_position
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "image",
        "settings": settings,
        "elements": []
    }

def make_counter(ending_number, suffix="", prefix="", title="", color="#0F172A"):
    settings = {
        "starting_number": 0,
        "ending_number": ending_number,
        "prefix": prefix,
        "suffix": suffix,
        "title": title,
        "duration": 2000,
        "number_color": color,
        "typography_number_typography": "custom",
        "typography_number_font_family": "Plus Jakarta Sans",
        "typography_number_font_weight": "800",
        "typography_number_font_size": {"unit": "px", "size": 36},
        "title_color": "#475569",
        "typography_title_typography": "custom",
        "typography_title_font_family": "Plus Jakarta Sans",
        "typography_title_font_size": {"unit": "px", "size": 13},
        "typography_title_font_weight": "500"
    }
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "counter",
        "settings": settings,
        "elements": []
    }

def make_divider(color="#E2E8F0", weight=1, margin=None):
    settings = {
        "color": color,
        "weight": {"unit": "px", "size": weight}
    }
    if margin:
        settings["margin"] = margin
    return {
        "id": gen_id(),
        "elType": "widget",
        "widgetType": "divider",
        "settings": settings,
        "elements": []
    }

# URLs
TEAM_IMG = "https://rajtechbd.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-08-at-10.09.58-PM1.jpeg"
BOSS_IMG = "https://rajtechbd.com/wp-content/uploads/2026/11/Modern-Office-Meeting-with-Red-Shirted-Note-Taker11.png"
OFFICE_IMG = "https://rajtechbd.com/wp-content/uploads/2026/11/Gemini_Generated_Image_wdg8qcwdg8qcwdg81-scaled.jpeg"
WAREHOUSE_IMG = "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
FINTECH_IMG = "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80"
LMS_IMG = "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80"
COMMERCE_IMG = "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=1200&q=80"
DEV_TEAM_IMG = "https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80"
GROWTH_IMG = "https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80"

def build_header():
    outer_settings = {
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#FFFFFF",
        "border_border": "solid",
        "border_width": {"unit": "px", "top": "0", "right": "0", "bottom": "1", "left": "0", "isLinked": False},
        "border_color": "#F1F5F9",
        "padding": {"unit": "px", "top": "16", "right": "24", "bottom": "16", "left": "24", "isLinked": False},
        "position": "sticky",
        "sticky": "top",
        "sticky_on": ["desktop", "tablet", "mobile"],
        "z_index": 999
    }
    
    logo_widget = make_heading(
        title='RajTechBD<span style="color: #F59E0B;">.</span>',
        tag="h3",
        color="#0F172A",
        font_size=24,
        font_weight="800",
        font_family="Plus Jakarta Sans",
        letter_spacing=-0.5
    )
    logo_col = make_container(
        elements=[logo_widget],
        settings={"width": {"unit": "%", "size": 25}, "flex_direction": "row", "align_items": "center"},
        is_inner=True
    )
    
    nav_html = """<div style="display: flex; gap: 24px; align-items: center; justify-content: center; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; font-weight: 600;">
        <a href="#services" style="color: #475569; text-decoration: none;">Engineering & Services</a>
        <a href="#solutions" style="color: #475569; text-decoration: none;">Core Systems</a>
        <a href="#optimization" style="color: #475569; text-decoration: none;">WordPress & Shopify</a>
        <a href="#team" style="color: #475569; text-decoration: none;">Team & Culture</a>
        <a href="#case-studies" style="color: #475569; text-decoration: none;">Case Studies</a>
        <a href="#process" style="color: #475569; text-decoration: none;">Process</a>
    </div>"""
    nav_widget = make_text_editor(content=nav_html, color="#475569", font_size=15, align="center")
    nav_col = make_container(
        elements=[nav_widget],
        settings={"width": {"unit": "%", "size": 55}, "flex_direction": "row", "justify_content": "center", "align_items": "center"},
        is_inner=True
    )
    
    btn_widget = make_button(
        text="Schedule Consultation",
        url="#contact",
        bg_color="#F59E0B",
        text_color="#0F172A",
        border_radius=6,
        padding={"unit": "px", "top": "12", "right": "22", "bottom": "12", "left": "22", "isLinked": False},
        align="right",
        font_size=14
    )
    btn_col = make_container(
        elements=[btn_widget],
        settings={"width": {"unit": "%", "size": 20}, "flex_direction": "row", "justify_content": "flex-end", "align_items": "center"},
        is_inner=True
    )
    
    inner_box = make_container(
        elements=[logo_col, nav_col, btn_col],
        settings={
            "content_width": "boxed",
            "boxed_width": {"unit": "px", "size": 1280},
            "flex_direction": "row",
            "justify_content": "space-between",
            "align_items": "center"
        },
        is_inner=True
    )
    
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_1_hero():
    outer_settings = {
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#F8FAFC",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False},
        "padding_mobile": {"unit": "px", "top": "64", "right": "20", "bottom": "64", "left": "20", "isLinked": False}
    }
    
    eyebrow = make_eyebrow("SOFTWARE ENGINEERING • SALES DEVELOPMENT • TECHNICAL SEO", color="#0284C7")
    h1 = make_heading(
        title="Engineering High-Scale ERP, Web Apps & Growth Systems.",
        tag="h1",
        color="#0F172A",
        font_size=52,
        font_weight="800",
        line_height=1.12,
        letter_spacing=-1.2,
        margin={"unit": "px", "top": "0", "right": "0", "bottom": "20", "left": "0", "isLinked": False}
    )
    subtitle = make_text_editor(
        content="RajTech BD is a specialized digital engineering partner. We architect custom ERP platforms, enterprise WordPress & Shopify architectures, high-performance mobile apps, and automated sales development pipelines that drive measurable revenue. Senior engineering discipline since 2018.",
        color="#475569",
        font_size=17,
        line_height=1.65,
        margin={"unit": "px", "top": "0", "right": "0", "bottom": "32", "left": "0", "isLinked": False}
    )
    btn_primary = make_button("Explore Our Capabilities", url="#services", bg_color="#F59E0B", text_color="#0F172A")
    btn_secondary = make_ghost_button("View Architecture & Case Studies →", url="#case-studies")
    btn_row = make_container(
        elements=[btn_primary, btn_secondary],
        settings={"flex_direction": "row", "gap": {"unit": "px", "size": 16}, "align_items": "center"},
        is_inner=True
    )
    
    left_col = make_container(
        elements=[eyebrow, h1, subtitle, btn_row],
        settings={"width": {"unit": "%", "size": 54}, "flex_direction": "column"},
        is_inner=True
    )
    
    # Bento Grid
    bento_img_1 = make_image("https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80", alt="RajTech BD Enterprise Software Lab", border_radius=8, height=180)
    card_img_1 = make_container(elements=[bento_img_1], settings={"width": {"unit": "%", "size": 50}, "overflow": "hidden"}, is_inner=True)
    
    stat_counter_1 = make_counter(99, suffix=".9%", title="ERP Uptime & Atomic Inventory Accuracy", color="#0F172A")
    card_stat_1 = make_container(
        elements=[stat_counter_1],
        settings={
            "width": {"unit": "%", "size": 50},
            "background_background": "classic",
            "background_color": "#FFFFFF",
            "border_border": "solid",
            "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
            "border_color": "#E2E8F0",
            "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
            "padding": {"unit": "px", "top": "24", "right": "24", "bottom": "24", "left": "24", "isLinked": True},
            "justify_content": "center"
        },
        is_inner=True
    )
    bento_row_1 = make_container(elements=[card_img_1, card_stat_1], settings={"flex_direction": "row", "gap": {"unit": "px", "size": 16}}, is_inner=True)
    
    stat_counter_2 = make_counter(40, suffix="+", title="Enterprise ERP, FinTech & E-Commerce Deployments", color="#0F172A")
    card_stat_2 = make_container(
        elements=[stat_counter_2],
        settings={
            "width": {"unit": "%", "size": 50},
            "background_background": "classic",
            "background_color": "#FFFFFF",
            "border_border": "solid",
            "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
            "border_color": "#E2E8F0",
            "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
            "padding": {"unit": "px", "top": "24", "right": "24", "bottom": "24", "left": "24", "isLinked": True},
            "justify_content": "center"
        },
        is_inner=True
    )
    bento_img_2 = make_image(OFFICE_IMG, alt="RajTech BD Headquarters Office", border_radius=8, height=180)
    card_img_2 = make_container(elements=[bento_img_2], settings={"width": {"unit": "%", "size": 50}, "overflow": "hidden"}, is_inner=True)
    bento_row_2 = make_container(elements=[card_stat_2, card_img_2], settings={"flex_direction": "row", "gap": {"unit": "px", "size": 16}}, is_inner=True)
    
    right_col = make_container(
        elements=[bento_row_1, bento_row_2],
        settings={"width": {"unit": "%", "size": 44}, "flex_direction": "column", "gap": {"unit": "px", "size": 16}},
        is_inner=True
    )
    
    inner_box = make_container(
        elements=[left_col, right_col],
        settings={
            "content_width": "boxed",
            "boxed_width": {"unit": "px", "size": 1280},
            "flex_direction": "row",
            "justify_content": "space-between",
            "align_items": "center",
            "gap": {"unit": "px", "size": 48}
        },
        is_inner=True
    )
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_2_tech_bar():
    outer_settings = {
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#FFFFFF",
        "border_border": "solid",
        "border_width": {"unit": "px", "top": "1", "right": "0", "bottom": "1", "left": "0", "isLinked": False},
        "border_color": "#F1F5F9",
        "padding": {"unit": "px", "top": "50", "right": "24", "bottom": "50", "left": "24", "isLinked": False}
    }
    eyebrow = make_eyebrow("MISSION-CRITICAL ARCHITECTURES POWERING MODERN ENTERPRISES", color="#94A3B8", align="center")
    badges = ["Custom ERP Systems", "Shopify & Plus", "WordPress VIP", "Mobile iOS & Android", "Sales Dev & CRM", "Technical SEO"]
    badge_elements = []
    for b in badges:
        title = make_heading(title=b, tag="h5", color="#0F172A", font_size=15, font_weight="700", align="center")
        box = make_container(
            elements=[title],
            settings={
                "background_background": "classic",
                "background_color": "#F8FAFC",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#E2E8F0",
                "border_radius": {"unit": "px", "top": "6", "right": "6", "bottom": "6", "left": "6", "isLinked": True},
                "padding": {"unit": "px", "top": "14", "right": "24", "bottom": "14", "left": "24", "isLinked": False}
            },
            is_inner=True
        )
        badge_elements.append(box)
    
    badges_row = make_container(
        elements=badge_elements,
        settings={"flex_direction": "row", "flex_wrap": "wrap", "justify_content": "center", "gap": {"unit": "px", "size": 16}, "margin": {"unit": "px", "top": "16", "right": "0", "bottom": "0", "left": "0", "isLinked": False}},
        is_inner=True
    )
    inner_box = make_container(elements=[eyebrow, badges_row], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column", "align_items": "center"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_3_checkerboard():
    outer_settings = {
        "_element_id": "solutions",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#FFFFFF",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    h2 = make_heading("Core Enterprise Platforms We Architect", tag="h2", color="#0F172A", font_size=38, font_weight="700")
    link = make_button("Request System Scope →", url="#contact", bg_color="transparent", text_color="#0284C7", align="right", font_size=15)
    header_row = make_container(
        elements=[h2, link],
        settings={"flex_direction": "row", "justify_content": "space-between", "align_items": "flex-end", "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "48", "left": "0", "isLinked": False}},
        is_inner=True
    )
    
    def make_text_card(num, title, body):
        e = make_eyebrow(num, color="#0284C7")
        h = make_heading(title, tag="h3", color="#0F172A", font_size=20, font_weight="700", line_height=1.35, margin={"unit": "px", "top": "0", "right": "0", "bottom": "12", "left": "0", "isLinked": False})
        t = make_text_editor(body, color="#475569", font_size=15, line_height=1.65)
        return make_container(
            elements=[e, h, t],
            settings={
                "width": {"unit": "%", "size": 32},
                "background_background": "classic",
                "background_color": "#F8FAFC",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#E2E8F0",
                "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
                "padding": {"unit": "px", "top": "32", "right": "28", "bottom": "32", "left": "28", "isLinked": False},
                "justify_content": "center"
            },
            is_inner=True
        )
    
    def make_visual_card(img_url, alt):
        img = make_image(img_url, alt=alt, border_radius=8, height=260)
        return make_container(elements=[img], settings={"width": {"unit": "%", "size": 32}, "overflow": "hidden"}, is_inner=True)
    
    c1 = make_text_card("01", "Custom ERP Systems", "Unified enterprise resource planning tailored to automate workflows, HR, supply chain, and multi-branch operations.")
    c2 = make_visual_card(BOSS_IMG, "RajTech BD Executive Office & System Design")
    c3 = make_text_card("02", "Inventory Management Systems", "Real-time multi-warehouse stock tracking, barcode/SKU automation, low-stock forecasting, and atomic order syncing.")
    row1 = make_container(elements=[c1, c2, c3], settings={"flex_direction": "row", "gap": {"unit": "px", "size": 24}, "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "24", "left": "0", "isLinked": False}}, is_inner=True)
    
    c4 = make_visual_card(WAREHOUSE_IMG, "Automated Logistics & Warehouse Infrastructure")
    c5 = make_text_card("03", "Finance & Accounting Management", "Automated ledger reconciliation, invoicing, multi-currency payment gateways, tax compliance, and real-time P&L reporting.")
    c6 = make_visual_card(FINTECH_IMG, "Real-time FinTech & Financial Accounting Engine")
    row2 = make_container(elements=[c4, c5, c6], settings={"flex_direction": "row", "gap": {"unit": "px", "size": 24}, "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "24", "left": "0", "isLinked": False}}, is_inner=True)
    
    c7 = make_text_card("04", "Learning Management Systems (LMS)", "Interactive course delivery, student progress tracking, live assessments, and automated certification portals.")
    c8 = make_visual_card(LMS_IMG, "High-Scale EdTech & Collaborative Learning Ecosystem")
    c9 = make_text_card("05", "Custom Web & Mobile Ecosystems", "High-throughput web applications and cross-platform mobile apps engineered for speed, security, and seamless UX.")
    row3 = make_container(elements=[c7, c8, c9], settings={"flex_direction": "row", "gap": {"unit": "px", "size": 24}}, is_inner=True)
    
    inner_box = make_container(elements=[header_row, row1, row2, row3], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_4_services_grid():
    outer_settings = {
        "_element_id": "services",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#0B1528",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    eyebrow = make_eyebrow("END-TO-END CAPABILITIES", color="#F59E0B", align="center")
    h2 = make_heading("Software Engineering, Sales Development & Optimization", tag="h2", color="#FFFFFF", font_size=38, font_weight="700", align="center")
    sub = make_text_editor("From heavy-duty backend ERP infrastructure to high-converting sales funnels, search dominance, and native apps.", color="#94A3B8", font_size=17, align="center")
    header_box = make_container(elements=[eyebrow, h2, sub], settings={"flex_direction": "column", "align_items": "center", "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "48", "left": "0", "isLinked": False}}, is_inner=True)
    
    services = [
        ("Software Engineering & ERP", "Custom modular ERP software connecting procurement, inventory, HR, and multi-branch operations into one atomic database."),
        ("Sales Development & CRM", "High-converting lead qualification engines, CRM pipelines, automated follow-up sequences, and sales funnels."),
        ("Technical SEO & Core Web Vitals", "Rigorous on-page schema structuring, semantic markup, crawl budget tuning, and sub-second load times."),
        ("WordPress & WooCommerce Speed", "Custom native Elementor architectures, zero-bloat PHP theme coding, Redis caching, and sub-200ms TTFB tuning."),
        ("Shopify & Shopify Plus", "Bespoke Liquid & Hydrogen headless storefronts, custom checkout extensibility, private apps, and atomic inventory syncing."),
        ("Mobile App Engineering", "Native iOS (Swift) & Android (Kotlin) or cross-platform Flutter/React Native applications engineered for high retention and offline state."),
        ("Full-Stack Web & SaaS Portals", "High-concurrency React & Next.js SaaS platforms, client portals, custom payment gateways, and role-based permissions."),
        ("Custom LMS & EdTech Platforms", "Scalable corporate academies, interactive video quiz portals, automated digital certification, and cohort tracking.")
    ]
    card_elements = []
    for title, desc in services:
        h = make_heading(title, tag="h3", color="#FFFFFF", font_size=20, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "12", "left": "0", "isLinked": False})
        t = make_text_editor(desc, color="#94A3B8", font_size=15, line_height=1.65)
        card = make_container(
            elements=[h, t],
            settings={
                "width": {"unit": "%", "size": 31.5},
                "background_background": "classic",
                "background_color": "#132238",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#1E3352",
                "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
                "padding": {"unit": "px", "top": "28", "right": "24", "bottom": "28", "left": "24", "isLinked": False}
            },
            is_inner=True
        )
        card_elements.append(card)
        
    cta_h = make_heading("Need a Custom Architecture?", tag="h3", color="#FFFFFF", font_size=20, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "10", "left": "0", "isLinked": False})
    cta_t = make_text_editor("Let's scope your system requirements and technical roadmap with our principal engineers.", color="#94A3B8", font_size=15, margin={"unit": "px", "top": "0", "right": "0", "bottom": "18", "left": "0", "isLinked": False})
    cta_b = make_button("Book Discovery Call", url="#contact", bg_color="#F59E0B", text_color="#0F172A", padding={"unit": "px", "top": "10", "right": "20", "bottom": "10", "left": "20", "isLinked": False}, font_size=14)
    cta_card = make_container(
        elements=[cta_h, cta_t, cta_b],
        settings={
            "width": {"unit": "%", "size": 31.5},
            "background_background": "classic",
            "background_color": "#1A2E4C",
            "border_border": "solid",
            "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
            "border_color": "#F59E0B",
            "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
            "padding": {"unit": "px", "top": "28", "right": "24", "bottom": "28", "left": "24", "isLinked": False}
        },
        is_inner=True
    )
    card_elements.append(cta_card)
    grid = make_container(elements=card_elements, settings={"flex_direction": "row", "flex_wrap": "wrap", "gap": {"unit": "px", "size": 24}}, is_inner=True)
    inner_box = make_container(elements=[header_box, grid], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_5_optimization():
    outer_settings = {
        "_element_id": "optimization",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#F8FAFC",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    eyebrow = make_eyebrow("SPEED & CONVERSION BENCHMARKS", color="#0284C7", align="center")
    h2 = make_heading("WordPress, Shopify & Mobile App Optimization", tag="h2", color="#0F172A", font_size=38, font_weight="700", align="center")
    sub = make_text_editor("We don't just build sites; we re-engineer them for sub-2-second transactions, zero code bloat, and maximum sales conversion velocity.", color="#475569", font_size=17, align="center")
    header_box = make_container(elements=[eyebrow, h2, sub], settings={"flex_direction": "column", "align_items": "center", "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "48", "left": "0", "isLinked": False}}, is_inner=True)
    
    pillars = [
        ("Enterprise WordPress", "100% native Elementor Flexbox architectures with custom lightweight hooks, Redis object caching, and database indexing.", "⚡ 90+ PageSpeed & Sub-200ms TTFB"),
        ("Shopify Conversion Engine", "High-converting digital storefronts engineered for fast-growing D2C and B2B brands. Bespoke Liquid themes and checkout optimization.", "🛍️ 1-Click Checkout & ERP Connectors"),
        ("Mobile Apps Built to Scale", "Consumer and enterprise mobile apps built for seamless cross-platform deployment on Flutter and React Native.", "📱 60 FPS Fluid UI & Offline-First Sync")
    ]
    card_elements = []
    for title, desc, tag in pillars:
        e = make_eyebrow(tag, color="#0284C7")
        h = make_heading(title, tag="h3", color="#0F172A", font_size=22, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "12", "left": "0", "isLinked": False})
        t = make_text_editor(desc, color="#475569", font_size=15, line_height=1.65)
        card = make_container(
            elements=[e, h, t],
            settings={
                "width": {"unit": "%", "size": 31.5},
                "background_background": "classic",
                "background_color": "#FFFFFF",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#E2E8F0",
                "border_radius": {"unit": "px", "top": "10", "right": "10", "bottom": "10", "left": "10", "isLinked": True},
                "padding": {"unit": "px", "top": "32", "right": "24", "bottom": "32", "left": "24", "isLinked": False}
            },
            is_inner=True
        )
        card_elements.append(card)
        
    grid = make_container(elements=card_elements, settings={"flex_direction": "row", "gap": {"unit": "px", "size": 24}}, is_inner=True)
    inner_box = make_container(elements=[header_box, grid], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_6_team_showcase():
    outer_settings = {
        "_element_id": "team",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#FFFFFF",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    eyebrow = make_eyebrow("HUMAN INTELLIGENCE & SENIOR DISCIPLINE", color="#0284C7")
    h2 = make_heading("The Minds Behind the Architecture", tag="h2", color="#0F172A", font_size=38, font_weight="700")
    header_box = make_container(elements=[eyebrow, h2], settings={"flex_direction": "column", "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "32", "left": "0", "isLinked": False}}, is_inner=True)
    
    # Big Team Image Banner with top margin and object position for head visibility
    big_team_img = make_image(TEAM_IMG, alt="RajTech BD Full Engineering Team", border_radius=12, height=540, object_position="center top")
    team_banner = make_container(elements=[big_team_img], settings={"margin": {"unit": "px", "top": "24", "right": "0", "bottom": "40", "left": "0", "isLinked": False}}, is_inner=True)
    
    # 3 Leadership Cards
    team_leaders = [
        ("Executive Systems Architecture", "Enterprise ERP & Core Infrastructure", BOSS_IMG),
        ("Full-Stack & App Engineers", "React, Node, Flutter & WordPress", DEV_TEAM_IMG),
        ("Sales Dev & SEO Strategists", "CRO, CRM & SERP Optimization", GROWTH_IMG)
    ]
    leader_cards = []
    for title, role, img_url in team_leaders:
        img = make_image(img_url, alt=title, border_radius=8, height=200)
        h = make_heading(title, tag="h4", color="#0F172A", font_size=18, font_weight="700", margin={"unit": "px", "top": "16", "right": "0", "bottom": "4", "left": "0", "isLinked": False})
        r = make_eyebrow(role, color="#0284C7")
        card = make_container(
            elements=[img, h, r],
            settings={
                "width": {"unit": "%", "size": 31.5},
                "background_background": "classic",
                "background_color": "#F8FAFC",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#E2E8F0",
                "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
                "padding": {"unit": "px", "top": "16", "right": "16", "bottom": "20", "left": "16", "isLinked": False}
            },
            is_inner=True
        )
        leader_cards.append(card)
        
    leaders_row = make_container(elements=leader_cards, settings={"flex_direction": "row", "gap": {"unit": "px", "size": 24}}, is_inner=True)
    inner_box = make_container(elements=[header_box, team_banner, leaders_row], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_7_case_studies():
    outer_settings = {
        "_element_id": "case-studies",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#0B1528",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    h2 = make_heading("Engineered for Real-World Impact", tag="h2", color="#FFFFFF", font_size=38, font_weight="700", align="center", margin={"unit": "px", "top": "0", "right": "0", "bottom": "48", "left": "0", "isLinked": False})
    cases = [
        ("Multi-Warehouse ERP & Inventory Engine", "Automated stock synchronization across 15+ retail locations with real-time financial ledger integration.", WAREHOUSE_IMG),
        ("Automated Corporate Finance & Billing Suite", "Streamlined voucher approvals, VAT/tax calculations, and automated monthly financial statements.", FINTECH_IMG),
        ("High-Scale Academy LMS & Certification Portal", "Interactive video streaming, quiz engines, and automated cohort management for 50,000+ learners.", LMS_IMG),
        ("Headless Shopify & Custom Mobile Commerce", "Unified web and mobile shopping experience with instant inventory locking and custom checkout extensions.", COMMERCE_IMG)
    ]
    case_cards = []
    for title, desc, img_url in cases:
        img = make_image(img_url, alt=title, border_radius=6, height=180)
        h = make_heading(title, tag="h3", color="#FFFFFF", font_size=20, font_weight="700", margin={"unit": "px", "top": "16", "right": "0", "bottom": "8", "left": "0", "isLinked": False})
        t = make_text_editor(desc, color="#94A3B8", font_size=15, line_height=1.65, margin={"unit": "px", "top": "0", "right": "0", "bottom": "14", "left": "0", "isLinked": False})
        link = make_button("Read Case Study →", url="#contact", bg_color="transparent", text_color="#F59E0B", padding={"unit": "px", "top": "0", "right": "0", "bottom": "0", "left": "0", "isLinked": False}, font_size=14)
        card = make_container(
            elements=[img, h, t, link],
            settings={
                "width": {"unit": "%", "size": 48},
                "background_background": "classic",
                "background_color": "#132238",
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
                "border_color": "#1E3352",
                "border_radius": {"unit": "px", "top": "8", "right": "8", "bottom": "8", "left": "8", "isLinked": True},
                "padding": {"unit": "px", "top": "24", "right": "24", "bottom": "24", "left": "24", "isLinked": True}
            },
            is_inner=True
        )
        case_cards.append(card)
        
    grid = make_container(elements=case_cards, settings={"flex_direction": "row", "flex_wrap": "wrap", "gap": {"unit": "px", "size": 24}}, is_inner=True)
    inner_box = make_container(elements=[h2, grid], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_8_process():
    outer_settings = {
        "_element_id": "process",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#F8FAFC",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "100", "left": "24", "isLinked": False}
    }
    eyebrow = make_eyebrow("OUR METHODOLOGY", color="#0284C7")
    h2 = make_heading("Our Engineering & Delivery Blueprint", tag="h2", color="#0F172A", font_size=38, font_weight="700")
    sub = make_text_editor("A transparent, milestone-driven workflow built for mission-critical software. Every sprint is paired with automated CI/CD pipelines, direct Slack channels with principal architects, and rigorous quality assurance.", color="#475569", font_size=16, margin={"unit": "px", "top": "16", "right": "0", "bottom": "24", "left": "0", "isLinked": False})
    img = make_image(BOSS_IMG, alt="RajTech BD Agile Review", border_radius=8, height=220)
    left_col = make_container(elements=[eyebrow, h2, sub, img], settings={"width": {"unit": "%", "size": 36}, "flex_direction": "column"}, is_inner=True)
    
    steps = [
        ("01 / System Audit & Architecture Blueprint", "Deep-dive into your business workflows, data models, and ERP/commerce integration points."),
        ("02 / Minimalist UI/UX & Prototype Design", "High-clarity dashboards and user interfaces designed for zero cognitive friction."),
        ("03 / Agile Sprint Engineering & QA", "Iterative development of backend modules, APIs, mobile apps, and storefronts with automated testing."),
        ("04 / Deployment, Training & Scale", "Zero-downtime cloud deployment, staff onboarding for ERP/LMS tools, and ongoing SLA support.")
    ]
    step_elements = []
    for title, desc in steps:
        h = make_heading(title, tag="h3", color="#0F172A", font_size=20, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "8", "left": "0", "isLinked": False})
        t = make_text_editor(desc, color="#475569", font_size=15, line_height=1.65)
        step_box = make_container(
            elements=[h, t],
            settings={
                "border_border": "solid",
                "border_width": {"unit": "px", "top": "0", "right": "0", "bottom": "1", "left": "0", "isLinked": False},
                "border_color": "#E2E8F0",
                "padding": {"unit": "px", "top": "0", "right": "0", "bottom": "20", "left": "0", "isLinked": False},
                "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "20", "left": "0", "isLinked": False}
            },
            is_inner=True
        )
        step_elements.append(step_box)
        
    right_col = make_container(elements=step_elements, settings={"width": {"unit": "%", "size": 58}, "flex_direction": "column", "justify_content": "center"}, is_inner=True)
    inner_box = make_container(elements=[left_col, right_col], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "row", "justify_content": "space-between", "gap": {"unit": "px", "size": 48}}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def build_section_9_cta_footer():
    outer_settings = {
        "_element_id": "contact",
        "content_width": "full",
        "background_background": "classic",
        "background_color": "#0B1528",
        "padding": {"unit": "px", "top": "100", "right": "24", "bottom": "40", "left": "24", "isLinked": False}
    }
    callout_h = make_heading("Ready to Modernize Your Operations, Storefront or Sales Pipeline?", tag="h2", color="#FFFFFF", font_size=38, font_weight="700", align="center")
    callout_sub = make_text_editor("Whether you need a custom ERP, WordPress speed optimization, a Shopify Plus overhaul, or a mobile app, RajTech BD delivers with engineering precision.", color="#94A3B8", font_size=17, align="center")
    callout_btn = make_button("Schedule a Free Technical Consultation", url="#contact", bg_color="#F59E0B", text_color="#0F172A", align="center", font_size=16, padding={"unit": "px", "top": "16", "right": "32", "bottom": "16", "left": "32", "isLinked": False})
    
    callout_box = make_container(
        elements=[callout_h, callout_sub, callout_btn],
        settings={
            "background_background": "classic",
            "background_color": "#132238",
            "border_border": "solid",
            "border_width": {"unit": "px", "top": "1", "right": "1", "bottom": "1", "left": "1", "isLinked": True},
            "border_color": "#1E3352",
            "border_radius": {"unit": "px", "top": "12", "right": "12", "bottom": "12", "left": "12", "isLinked": True},
            "padding": {"unit": "px", "top": "64", "right": "40", "bottom": "64", "left": "40", "isLinked": False},
            "flex_direction": "column",
            "align_items": "center",
            "gap": {"unit": "px", "size": 20},
            "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "64", "left": "0", "isLinked": False}
        },
        is_inner=True
    )
    
    f_logo = make_heading('RajTechBD<span style="color: #F59E0B;">.</span>', tag="h3", color="#FFFFFF", font_size=24, font_weight="800")
    f_about = make_text_editor("Specialized software engineering, sales development, and SEO agency based in Mirpur-14, Dhaka-1216, Bangladesh. Delivering mission-critical digital systems since 2018.<br><br><strong>Email:</strong> rajtechbdt@gmail.com<br><strong>Phone / WhatsApp:</strong> +8801758522846", color="#94A3B8", font_size=14, line_height=1.7)
    col1 = make_container(elements=[f_logo, f_about], settings={"width": {"unit": "%", "size": 34}, "flex_direction": "column"}, is_inner=True)
    
    f_h2 = make_heading("Core Systems", tag="h4", color="#FFFFFF", font_size=16, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "16", "left": "0", "isLinked": False})
    f_links2 = make_text_editor("<div style='line-height: 2.2;'><a href='#solutions' style='color: #94A3B8; text-decoration: none;'>Custom ERP Systems</a><br><a href='#solutions' style='color: #94A3B8; text-decoration: none;'>Inventory Management</a><br><a href='#solutions' style='color: #94A3B8; text-decoration: none;'>Finance & Accounting</a><br><a href='#solutions' style='color: #94A3B8; text-decoration: none;'>Learning Management (LMS)</a></div>", color="#94A3B8", font_size=14)
    col2 = make_container(elements=[f_h2, f_links2], settings={"width": {"unit": "%", "size": 20}, "flex_direction": "column"}, is_inner=True)
    
    f_h3 = make_heading("Services & Growth", tag="h4", color="#FFFFFF", font_size=16, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "16", "left": "0", "isLinked": False})
    f_links3 = make_text_editor("<div style='line-height: 2.2;'><a href='#optimization' style='color: #94A3B8; text-decoration: none;'>WordPress & WooCommerce</a><br><a href='#optimization' style='color: #94A3B8; text-decoration: none;'>Shopify Plus Stores</a><br><a href='#optimization' style='color: #94A3B8; text-decoration: none;'>Mobile App Engineering</a><br><a href='#services' style='color: #94A3B8; text-decoration: none;'>Technical SEO & Sales Dev</a></div>", color="#94A3B8", font_size=14)
    col3 = make_container(elements=[f_h3, f_links3], settings={"width": {"unit": "%", "size": 20}, "flex_direction": "column"}, is_inner=True)
    
    f_h4 = make_heading("Agency", tag="h4", color="#FFFFFF", font_size=16, font_weight="700", margin={"unit": "px", "top": "0", "right": "0", "bottom": "16", "left": "0", "isLinked": False})
    f_links4 = make_text_editor("<div style='line-height: 2.2;'><a href='#team' style='color: #94A3B8; text-decoration: none;'>Team & Leadership</a><br><a href='#case-studies' style='color: #94A3B8; text-decoration: none;'>Case Studies</a><br><a href='#process' style='color: #94A3B8; text-decoration: none;'>Engineering Blueprint</a><br><a href='#contact' style='color: #94A3B8; text-decoration: none;'>Contact & Support</a></div>", color="#94A3B8", font_size=14)
    col4 = make_container(elements=[f_h4, f_links4], settings={"width": {"unit": "%", "size": 20}, "flex_direction": "column"}, is_inner=True)
    
    footer_cols = make_container(elements=[col1, col2, col3, col4], settings={"flex_direction": "row", "justify_content": "space-between", "gap": {"unit": "px", "size": 32}, "margin": {"unit": "px", "top": "0", "right": "0", "bottom": "48", "left": "0", "isLinked": False}}, is_inner=True)
    divider = make_divider(color="#1E3352", weight=1, margin={"unit": "px", "top": "0", "right": "0", "bottom": "24", "left": "0", "isLinked": False})
    bottom_bar = make_text_editor("© 2026 RajTech BD. All Rights Reserved. Engineered with precision in Dhaka, Bangladesh.", color="#64748B", font_size=13, align="center")
    
    inner_box = make_container(elements=[callout_box, footer_cols, divider, bottom_bar], settings={"content_width": "boxed", "boxed_width": {"unit": "px", "size": 1280}, "flex_direction": "column"}, is_inner=True)
    return make_container(elements=[inner_box], settings=outer_settings, is_inner=False)

def main():
    sections = [
        build_header(),
        build_section_1_hero(),
        build_section_2_tech_bar(),
        build_section_3_checkerboard(),
        build_section_4_services_grid(),
        build_section_5_optimization(),
        build_section_6_team_showcase(),
        build_section_7_case_studies(),
        build_section_8_process(),
        build_section_9_cta_footer()
    ]
    template = {
        "version": "0.4",
        "title": "RajTech BD - Enterprise Homepage",
        "type": "page",
        "content": sections
    }
    out_path = "/home/dev_shakib/Projects/rajTechBD/rajtechbd-homepage-elementor-template.json"
    with open(out_path, "w", encoding="utf-8") as f:
        json.dump(template, f, indent=2)
    print(f"Successfully generated updated Elementor Template with {len(sections)} sections at: {out_path}")

if __name__ == "__main__":
    main()
