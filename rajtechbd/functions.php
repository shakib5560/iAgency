<?php
/**
 * RajTech BD Theme Functions and Definitions
 *
 * @package RajTech_BD
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define( 'RAJTECHBD_VERSION', '1.2.0' );
define( 'RAJTECHBD_DIR', get_template_directory() );
define( 'RAJTECHBD_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function rajtechbd_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'rajtechbd', RAJTECHBD_DIR . '/languages' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 320,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Gutenberg Block Support
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/theme.css' );

    // Elementor Theme Support
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-pro' );

    // Custom color palette for Gutenberg
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_html__( 'RajTech Navy Dark', 'rajtechbd' ),
            'slug'  => 'raj-navy',
            'color' => '#0B1528',
        ),
        array(
            'name'  => esc_html__( 'RajTech Navy Card', 'rajtechbd' ),
            'slug'  => 'raj-navy-card',
            'color' => '#132238',
        ),
        array(
            'name'  => esc_html__( 'RajTech Slate Dark', 'rajtechbd' ),
            'slug'  => 'raj-slate-dark',
            'color' => '#0F172A',
        ),
        array(
            'name'  => esc_html__( 'RajTech Amber Accent', 'rajtechbd' ),
            'slug'  => 'raj-amber',
            'color' => '#F59E0B',
        ),
        array(
            'name'  => esc_html__( 'RajTech Sky Accent', 'rajtechbd' ),
            'slug'  => 'raj-sky',
            'color' => '#0284C7',
        ),
        array(
            'name'  => esc_html__( 'RajTech Light Bg', 'rajtechbd' ),
            'slug'  => 'raj-light-bg',
            'color' => '#F8FAFC',
        ),
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary'  => esc_html__( 'Primary Navigation Menu', 'rajtechbd' ),
        'footer'   => esc_html__( 'Footer Navigation Menu', 'rajtechbd' ),
        'services' => esc_html__( 'Footer Services Menu', 'rajtechbd' ),
    ) );
}
add_action( 'after_setup_theme', 'rajtechbd_setup' );

/**
 * Register Custom Post Type: Portfolio / Case Studies
 */
function rajtechbd_register_portfolio_cpt() {
    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post type general name', 'rajtechbd' ),
        'singular_name'         => _x( 'Portfolio Project', 'Post type singular name', 'rajtechbd' ),
        'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'rajtechbd' ),
        'name_admin_bar'        => _x( 'Portfolio Project', 'Add New on Toolbar', 'rajtechbd' ),
        'add_new'               => __( 'Add New Project', 'rajtechbd' ),
        'add_new_item'          => __( 'Add New Portfolio Project', 'rajtechbd' ),
        'new_item'              => __( 'New Portfolio Project', 'rajtechbd' ),
        'edit_item'             => __( 'Edit Portfolio Project', 'rajtechbd' ),
        'view_item'             => __( 'View Portfolio Project', 'rajtechbd' ),
        'all_items'             => __( 'All Portfolio Projects', 'rajtechbd' ),
        'search_items'          => __( 'Search Portfolio', 'rajtechbd' ),
        'not_found'             => __( 'No portfolio projects found.', 'rajtechbd' ),
        'not_found_in_trash'    => __( 'No portfolio projects found in Trash.', 'rajtechbd' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true, // Enables Gutenberg Editor
    );

    register_post_type( 'portfolio', $args );

    // Register Taxonomy for Portfolio Categories
    $tax_labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'rajtechbd' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'rajtechbd' ),
        'search_items'      => __( 'Search Categories', 'rajtechbd' ),
        'all_items'         => __( 'All Categories', 'rajtechbd' ),
        'parent_item'       => __( 'Parent Category', 'rajtechbd' ),
        'parent_item_colon' => __( 'Parent Category:', 'rajtechbd' ),
        'edit_item'         => __( 'Edit Category', 'rajtechbd' ),
        'update_item'       => __( 'Update Category', 'rajtechbd' ),
        'add_new_item'      => __( 'Add New Category', 'rajtechbd' ),
        'new_item_name'     => __( 'New Category Name', 'rajtechbd' ),
        'menu_name'         => __( 'Categories', 'rajtechbd' ),
    );

    register_taxonomy( 'portfolio_category', array( 'portfolio' ), array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'rajtechbd_register_portfolio_cpt' );

/**
 * Optimize Portfolio Archive Query
 * Shows 9 projects per page (3x3 grid) so all items in the section are visible cleanly.
 */
function rajtechbd_portfolio_archive_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( is_post_type_archive( 'portfolio' ) || is_tax( 'portfolio_category' ) ) ) {
        $query->set( 'posts_per_page', 9 );
    }
}
add_action( 'pre_get_posts', 'rajtechbd_portfolio_archive_query' );

/**
 * Register Elementor Theme Builder Locations
 */
function rajtechbd_register_elementor_locations( $elementor_theme_manager ) {
    if ( method_exists( $elementor_theme_manager, 'register_all_core_location' ) ) {
        $elementor_theme_manager->register_all_core_location();
    }
}
add_action( 'elementor/theme/register_locations', 'rajtechbd_register_elementor_locations' );

/**
 * Helper: Check if current page is built with or previewed in Elementor
 */
function rajtechbd_is_elementor_active( $post_id = null ) {
    if ( ! class_exists( '\\Elementor\\Plugin' ) ) {
        return false;
    }

    // Check if in Elementor editor or preview mode
    if ( isset( \Elementor\Plugin::$instance->preview ) && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
        return true;
    }
    if ( isset( \Elementor\Plugin::$instance->editor ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        return true;
    }

    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    if ( ! $post_id ) {
        return false;
    }

    $document = \Elementor\Plugin::$instance->documents->get( $post_id );
    return ( $document && $document->is_built_with_elementor() );
}

/**
 * Enqueue scripts and styles.
 */
function rajtechbd_scripts() {
    // Google Fonts: Plus Jakarta Sans & JetBrains Mono
    wp_enqueue_style(
        'rajtechbd-fonts',
        'https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Tailwind CSS Utility Engine (CDN for fast, dynamic classes)
    wp_enqueue_script(
        'rajtechbd-tailwind',
        'https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js',
        array(),
        '3.4.1',
        false
    );

    // Theme CSS
    wp_enqueue_style(
        'rajtechbd-theme-css',
        RAJTECHBD_URI . '/assets/css/theme.css',
        array(),
        RAJTECHBD_VERSION
    );

    // Main style.css
    wp_enqueue_style(
        'rajtechbd-main-style',
        get_stylesheet_uri(),
        array( 'rajtechbd-theme-css' ),
        RAJTECHBD_VERSION
    );

    // Theme JS
    wp_enqueue_script(
        'rajtechbd-theme-js',
        RAJTECHBD_URI . '/assets/js/theme.js',
        array(),
        RAJTECHBD_VERSION,
        true
    );

    // Pass AJAX and nonces to theme.js if needed
    wp_localize_script( 'rajtechbd-theme-js', 'rajtechbdData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'siteUrl' => home_url( '/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'rajtechbd_scripts' );

/**
 * Register Widget Areas
 */
function rajtechbd_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'rajtechbd' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'rajtechbd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-8 bg-white p-6 rounded-lg border border-[#E2E8F0]">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title text-lg font-bold text-[#0F172A] mb-4 pb-2 border-b border-[#F1F5F9]">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'rajtechbd_widgets_init' );

/**
 * Fallback menu with organized professional dropdowns
 */
function rajtechbd_default_primary_menu() {
    $home_url         = esc_url( home_url( '/' ) );
    $about_url        = esc_url( home_url( '/about/' ) );
    $services_url     = esc_url( home_url( '/services/' ) );
    $portfolio_url    = esc_url( home_url( '/portfolio/' ) );
    $blog_url         = esc_url( home_url( '/blog/' ) );
    $faq_url          = esc_url( home_url( '/faq/' ) );
    $contact_url      = esc_url( home_url( '/contact/' ) );

    echo '<ul class="nav-menu">';
    echo '<li><a href="' . $home_url . '">Home</a></li>';
    
    // Dropdown 1: Capabilities & Systems
    echo '<li class="has-children">';
    echo '<a href="' . $services_url . '" class="flex items-center gap-1">Capabilities &amp; ERP <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . $services_url . '">All Capabilities</a></li>';
    echo '<li><a href="' . $services_url . '#solutions">Custom ERP Platforms</a></li>';
    echo '<li><a href="' . $services_url . '#inventory">Multi-Warehouse Inventory</a></li>';
    echo '<li><a href="' . $services_url . '#ai-systems">AI Systems &amp; Automations</a></li>';
    echo '<li><a href="' . $services_url . '#finance">Corporate Finance Suite</a></li>';
    echo '<li><a href="' . $services_url . '#lms">High-Scale LMS Systems</a></li>';
    echo '</ul>';
    echo '</li>';

    // Dropdown 2: Growth & Speed
    echo '<li class="has-children">';
    echo '<a href="' . $services_url . '#optimization" class="flex items-center gap-1">Growth &amp; Speed <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . $services_url . '#optimization">WordPress &amp; WooCommerce Speed</a></li>';
    echo '<li><a href="' . $services_url . '#optimization">Shopify Plus Stores</a></li>';
    echo '<li><a href="' . $services_url . '#services">Sales Development &amp; CRMs</a></li>';
    echo '<li><a href="' . $services_url . '#services">Technical SEO &amp; Core Web Vitals</a></li>';
    echo '</ul>';
    echo '</li>';

    // Dropdown 3: Company & Trust
    echo '<li class="has-children">';
    echo '<a href="' . $about_url . '" class="flex items-center gap-1">Company <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . $about_url . '">About Us &amp; Leadership</a></li>';
    echo '<li><a href="' . $home_url . '#team">Principal Architects</a></li>';
    echo '<li><a href="' . $portfolio_url . '">Portfolio &amp; Case Studies</a></li>';
    echo '<li><a href="' . $home_url . '#process">Engineering Blueprint</a></li>';
    echo '</ul>';
    echo '</li>';

    echo '<li><a href="' . $portfolio_url . '">Portfolio</a></li>';
    echo '<li><a href="' . $blog_url . '">Blog</a></li>';
    echo '<li><a href="' . $faq_url . '">FAQ</a></li>';
    echo '<li><a href="' . $contact_url . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * Mobile Fallback Menu with Dropdown support
 */
function rajtechbd_default_mobile_menu() {
    $home_url         = esc_url( home_url( '/' ) );
    $about_url        = esc_url( home_url( '/about/' ) );
    $services_url     = esc_url( home_url( '/services/' ) );
    $portfolio_url    = esc_url( home_url( '/portfolio/' ) );
    $blog_url         = esc_url( home_url( '/blog/' ) );
    $faq_url          = esc_url( home_url( '/faq/' ) );
    $contact_url      = esc_url( home_url( '/contact/' ) );

    echo '<ul class="mobile-nav-menu">';
    echo '<li><a href="' . $home_url . '">Home</a></li>';
    echo '<li><a href="' . $services_url . '">Capabilities &amp; ERP Systems</a></li>';
    echo '<li><a href="' . $about_url . '">About Us &amp; Leadership</a></li>';
    echo '<li><a href="' . $portfolio_url . '">Portfolio &amp; Case Studies</a></li>';
    echo '<li><a href="' . $blog_url . '">Engineering Blog</a></li>';
    echo '<li><a href="' . $faq_url . '">FAQ</a></li>';
    echo '<li><a href="' . $contact_url . '">Contact Us</a></li>';
    echo '</ul>';
}

/**
 * Helper: Calculate reading time for posts
 */
function rajtechbd_get_reading_time( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    return max( 1, $reading_time ) . ' min read';
}

/**
 * Admin Setup Page: 1-Click Starter Pages & Menu Creator
 */
function rajtechbd_add_admin_menu() {
    add_theme_page(
        esc_html__( 'RajTech BD Setup', 'rajtechbd' ),
        esc_html__( 'RajTech BD Setup', 'rajtechbd' ),
        'manage_options',
        'rajtechbd-setup',
        'rajtechbd_admin_setup_page'
    );
}
add_action( 'admin_menu', 'rajtechbd_add_admin_menu' );

/**
 * Admin Setup Page Screen
 */
function rajtechbd_admin_setup_page() {
    if ( isset( $_POST['rajtechbd_generate_starter_content'] ) && check_admin_referer( 'rajtechbd_starter_nonce' ) ) {
        rajtechbd_create_starter_pages();
        echo '<div class="notice notice-success is-dismissible"><p><strong>Success!</strong> All RajTech BD Ltd. starter pages (Home, About, Services, Portfolio, Blog, FAQ, Contact, Privacy Policy, Terms &amp; Conditions), sample projects, sample articles, and Primary Navigation have been successfully created. Every page is 100% ready to edit with Elementor or Gutenberg!</p></div>';
    }
    ?>
    <div class="wrap" style="max-width: 900px; margin-top: 2rem;">
        <h1 style="font-size: 28px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">
            RajTech BD Ltd. Theme Setup &amp; Optimization
        </h1>
        <p style="font-size: 15px; color: #475569; margin-bottom: 24px;">
            Welcome to the RajTech BD Ltd. enterprise WordPress theme. Every single page in this theme is fully compatible with <strong>Elementor</strong> and the <strong>Gutenberg Block Editor</strong>. Use the 1-click wizard below to generate all pages, sample portfolio items, sample blog posts, and menus.
        </p>

        <div style="background: #ffffff; border: 1px solid #E2E8F0; border-radius: 8px; padding: 28px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
            <h2 style="font-size: 18px; font-weight: 700; color: #0F172A; margin-top: 0;">1-Click Automatic Starter Setup</h2>
            <p style="color: #64748B; font-size: 14px; line-height: 1.6;">
                Clicking the button below will automatically:
            </p>
            <ul style="color: #334155; font-size: 14px; line-height: 1.8; list-style-type: disc; padding-left: 20px;">
                <li>Create <strong>Home Page</strong> (Front Page) - Dynamic Portfolio &amp; Blog feed included</li>
                <li>Create <strong>About Us</strong> page with leadership and office details</li>
                <li>Create <strong>Services &amp; ERP</strong> page with all enterprise capability modules &amp; AI systems</li>
                <li>Create <strong>Portfolio &amp; Case Studies</strong> page with dynamic grid &amp; detail pages</li>
                <li>Create <strong>Blog</strong> page and configure post details page</li>
                <li>Create <strong>FAQ</strong> page with interactive accordions and Schema markup</li>
                <li>Create <strong>Contact Us</strong> page with inquiry booking form</li>
                <li>Create <strong>Privacy Policy</strong> and <strong>Terms &amp; Conditions</strong> pages (incorporating RajTech BD Ltd. under Bangladesh law)</li>
                <li>Generate 3 starter enterprise portfolio projects &amp; 3 sample engineering articles</li>
                <li>Build the <strong>Primary Navigation Menu</strong> with professional dropdowns</li>
            </ul>

            <form method="post" action="" style="margin-top: 24px;">
                <?php wp_nonce_field( 'rajtechbd_starter_nonce' ); ?>
                <input type="hidden" name="rajtechbd_generate_starter_content" value="1">
                <button type="submit" class="button button-primary button-hero" style="background: #0284C7; border-color: #0284C7; font-weight: 700; border-radius: 6px;">
                    Generate All Starter Pages, Portfolio &amp; Menu
                </button>
            </form>
        </div>

        <div style="margin-top: 24px; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 20px;">
            <h3 style="font-size: 15px; font-weight: 700; color: #0F172A; margin-top: 0;">How to Edit Pages with Elementor</h3>
            <p style="font-size: 13px; color: #475569; line-height: 1.6; margin-bottom: 0;">
                1. Make sure the <strong>Elementor</strong> plugin is installed and activated.<br>
                2. Go to <strong>Pages > All Pages</strong>.<br>
                3. Hover over any page (Home, About Us, Services, Portfolio, FAQ, Contact) and click <strong>Edit with Elementor</strong>.<br>
                4. The page opens immediately in Elementor's visual drag-and-drop editor without any errors!
            </p>
        </div>
    </div>
    <?php
}

/**
 * Creates the starter pages, sample content, and navigation menu
 */
function rajtechbd_create_starter_pages() {
    $pages = array(
        'Home' => array(
            'template' => 'front-page.php',
            'content'  => '<!-- Front page template with Elementor & Gutenberg integration -->',
            'slug'     => 'home',
        ),
        'About Us' => array(
            'template' => 'page-about.php',
            'content'  => '<!-- About Us Page with Elementor support -->',
            'slug'     => 'about',
        ),
        'Services & ERP' => array(
            'template' => 'page-services.php',
            'content'  => '<!-- Services & ERP Page with Elementor support -->',
            'slug'     => 'services',
        ),
        'Portfolio' => array(
            'template' => 'page-case-studies.php',
            'content'  => '<!-- Portfolio Page with Elementor support -->',
            'slug'     => 'portfolio',
        ),
        'Blog' => array(
            'template' => '',
            'content'  => '<!-- Blog Archive -->',
            'slug'     => 'blog',
        ),
        'FAQ' => array(
            'template' => 'page-faq.php',
            'content'  => '<!-- FAQ Page with Elementor support -->',
            'slug'     => 'faq',
        ),
        'Contact' => array(
            'template' => 'page-contact.php',
            'content'  => '<!-- Contact Page with Elementor support -->',
            'slug'     => 'contact',
        ),
        'Privacy Policy' => array(
            'template' => 'page-privacy-policy.php',
            'content'  => '<!-- Privacy Policy Page -->',
            'slug'     => 'privacy-policy',
        ),
        'Terms and Conditions' => array(
            'template' => 'page-terms.php',
            'content'  => '<!-- Terms and Conditions Page -->',
            'slug'     => 'terms-and-conditions',
        ),
    );

    $page_ids = array();

    foreach ( $pages as $title => $data ) {
        $existing = get_page_by_path( $data['slug'] );
        if ( ! $existing ) {
            $page_id = wp_insert_post( array(
                'post_title'     => $title,
                'post_name'      => $data['slug'],
                'post_content'   => $data['content'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                if ( ! empty( $data['template'] ) && 'front-page.php' !== $data['template'] ) {
                    update_post_meta( $page_id, '_wp_page_template', $data['template'] );
                }
                $page_ids[ $title ] = $page_id;
            }
        } else {
            $page_ids[ $title ] = $existing->ID;
            if ( ! empty( $data['template'] ) && 'front-page.php' !== $data['template'] ) {
                update_post_meta( $existing->ID, '_wp_page_template', $data['template'] );
            }
        }
    }

    // Set static front page and posts page
    if ( ! empty( $page_ids['Home'] ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids['Home'] );
    }
    if ( ! empty( $page_ids['Blog'] ) ) {
        update_option( 'page_for_posts', $page_ids['Blog'] );
    }

    // Create Sample Portfolio Projects if none exist
    $existing_portfolio = get_posts( array( 'post_type' => 'portfolio', 'posts_per_page' => 1 ) );
    if ( empty( $existing_portfolio ) ) {
        $sample_portfolios = array(
            array(
                'title'   => 'Multi-Warehouse ERP & Automated Inventory Engine',
                'excerpt' => 'Automated real-time stock synchronization across 15+ retail locations with zero stockout oversells and instant financial ledger sync.',
                'content' => '<p>A major retail enterprise in Bangladesh operating 15+ outlets faced critical stock discrepancies, slow manual reconciliations, and race conditions during high-volume sales. RajTech BD Ltd. architected an atomic ERP with row-level database locking and real-time barcode syncing.</p><h3>Key Architectural Deliverables</h3><ul><li>PostgreSQL database with strict row locking preventing duplicate orders.</li><li>Sub-second inter-branch stock transfer vouchers and automated re-ordering.</li><li>Offline-first barcode scanning integration for warehouse personnel.</li></ul>',
                'meta'    => array(
                    '_portfolio_client'     => 'Apex Retail Group',
                    '_portfolio_year'       => '2025',
                    '_portfolio_metric_val' => '99.9%',
                    '_portfolio_metric_lbl' => 'Inventory Accuracy',
                    '_portfolio_stack'      => 'PostgreSQL, Node.js, Redis Streams, Docker',
                ),
            ),
            array(
                'title'   => 'Autonomous AI Agent System for Sales & Lead Qualification',
                'excerpt' => 'Custom multi-agent LLM pipeline connected to WhatsApp and CRM, automatically qualifying enterprise leads and scheduling demos 24/7.',
                'content' => '<p>Engineered an intelligent AI sales development system utilizing specialized autonomous agents. The system reads incoming lead criteria, scores intent in real-time, executes WhatsApp conversations in Bengali and English, and books qualified meetings directly into executive calendars.</p><h3>Technical Highlights</h3><ul><li>Self-hosted embedding retrieval and fine-tuned LLM agents.</li><li>Direct WhatsApp Business API and HubSpot bi-directional synchronization.</li><li>Zero hallucinatory guardrails with strict SLA compliance.</li></ul>',
                'meta'    => array(
                    '_portfolio_client'     => 'FinScale Global',
                    '_portfolio_year'       => '2026',
                    '_portfolio_metric_val' => '3.8x',
                    '_portfolio_metric_lbl' => 'Lead Velocity Surge',
                    '_portfolio_stack'      => 'Python FastAPI, LangChain, PostgreSQL, WhatsApp API',
                ),
            ),
            array(
                'title'   => 'High-Concurrency Academy LMS Serving 50,000+ Students',
                'excerpt' => 'Fault-tolerant EdTech learning platform with DRM-protected video streaming, timed examination grading, and cryptographic certificate issuance.',
                'content' => '<p>Architected for Bangladesh’s leading professional academy, this platform routinely handles 50,000+ simultaneous students during peak exam hours with 99.98% uptime and instantaneous automated grading.</p><h3>Scalability Architecture</h3><ul><li>Distributed Redis caching layer and edge video streaming via Cloudflare.</li><li>Automated real-time quiz evaluation engine processing 10,000 questions/sec.</li><li>Tamper-proof digital certificate generation with verifiable QR hashes.</li></ul>',
                'meta'    => array(
                    '_portfolio_client'     => 'FutureTech Institute',
                    '_portfolio_year'       => '2025',
                    '_portfolio_metric_val' => '50k+',
                    '_portfolio_metric_lbl' => 'Active Learners',
                    '_portfolio_stack'      => 'Next.js, Node.js, Cloudflare Stream, Redis Cluster',
                ),
            ),
        );

        foreach ( $sample_portfolios as $p ) {
            $p_id = wp_insert_post( array(
                'post_title'   => $p['title'],
                'post_excerpt' => $p['excerpt'],
                'post_content' => $p['content'],
                'post_status'  => 'publish',
                'post_type'    => 'portfolio',
            ) );
            if ( $p_id && ! is_wp_error( $p_id ) ) {
                foreach ( $p['meta'] as $k => $v ) {
                    update_post_meta( $p_id, $k, $v );
                }
            }
        }
    }

    // Create Sample Blog Posts if none exist
    $existing_posts = get_posts( array( 'post_type' => 'post', 'posts_per_page' => 1 ) );
    if ( empty( $existing_posts ) ) {
        $sample_posts = array(
            array(
                'title'   => 'Architecting Custom ERPs: Why Off-The-Shelf SaaS Fails Growing Bangladeshi Enterprises',
                'excerpt' => 'A technical deep-dive into database concurrency, recurring licensing traps, and why bespoke relational architectures yield 10x ROI for multi-branch companies.',
                'content' => '<p>When businesses expand from a single location to 10 or 20 branches across Dhaka and Chittagong, standard cloud SaaS products start showing cracks. Between per-seat licensing penalties and rigid workflow constraints, enterprises lose millions in operational friction.</p><h2>The Core Concurrency Trap</h2><p>Most commercial SaaS tools run batch synchronization every 10 to 15 minutes. When two physical stores sell the final inventory unit simultaneously, race conditions occur. At RajTech BD Ltd., we eliminate this through atomic row-level database locking on PostgreSQL.</p><blockquote>"Engineering software for high concurrency is not an afterthought; it is the fundamental foundation of corporate profitability."</blockquote>',
            ),
            array(
                'title'   => 'Building Production AI Systems in 2026: From LLM Hype to Revenue-Generating Agents',
                'excerpt' => 'How we architect autonomous AI pipelines that automate sales qualification, document intelligence, and enterprise customer operations without hallucinations.',
                'content' => '<p>Artificial intelligence in modern software development has evolved from simple chat widgets into autonomous, deterministic agentic pipelines. For enterprise clients in Bangladesh, the real value lies in domain-specific retrieval and automated operational workflows.</p><h2>Deterministic Guardrails for AI</h2><p>An enterprise system cannot afford probabilistic hallucinations when calculating invoices or quoting contracts. We pair large language models with deterministic API middleware and schema validation.</p>',
            ),
            array(
                'title'   => 'Modern Web Performance: How to Achieve Sub-200ms TTFB and 98+ PageSpeed on WordPress',
                'excerpt' => 'Eliminating bloated page builder overhead, implementing Redis persistent object caching, and optimizing Core Web Vitals for maximum SEO dominance.',
                'content' => '<p>Every second of web delay costs measurable conversion revenue. By discarding bulky third-party visual page builders in favor of native block architectures and compiled Tailwind CSS, page weights shrink from 8MB to under 400KB.</p><h2>The Role of Persistent Object Caching</h2><p>Database queries are the primary bottleneck in standard WordPress instances. Implementing Redis object caching reduces MySQL database hits by over 85%, ensuring instant page delivery even during massive traffic spikes.</p>',
            ),
        );

        foreach ( $sample_posts as $post_data ) {
            wp_insert_post( array(
                'post_title'   => $post_data['title'],
                'post_excerpt' => $post_data['excerpt'],
                'post_content' => $post_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ) );
        }
    }

    // Create & assign Primary Menu
    $menu_name = 'RajTech BD Main Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );

        if ( ! is_wp_error( $menu_id ) ) {
            $menu_items = array( 'Home', 'Services & ERP', 'Portfolio', 'About Us', 'Blog', 'FAQ', 'Contact' );
            foreach ( $menu_items as $title ) {
                if ( isset( $page_ids[ $title ] ) ) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $title,
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $page_ids[ $title ],
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    ) );
                }
            }

            // Assign menu to primary location
            $locations = get_theme_mod( 'nav_menu_locations' );
            if ( ! is_array( $locations ) ) {
                $locations = array();
            }
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
