<?php
/**
 * Career Application & Job Openings Management System
 *
 * Automatically manages:
 * 1. Job Openings / Vacancies (Add, edit, pause job posts directly from /wp-admin/)
 * 2. Candidate Job Applications (Auto-saved to MySQL database with Google Drive resume verification)
 * 3. Dynamic frontend synchronization with /career/ page positions and dropdowns.
 *
 * @package RajTech_BD
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Register Custom Post Type: Job Applications (Private Admin Only)
 */
function rajtechbd_register_career_cpt() {
    $labels = array(
        'name'                  => _x( 'Job Applications', 'Post type general name', 'rajtechbd' ),
        'singular_name'         => _x( 'Job Application', 'Post type singular name', 'rajtechbd' ),
        'menu_name'             => _x( 'Job Applications', 'Admin Menu text', 'rajtechbd' ),
        'name_admin_bar'        => _x( 'Job Application', 'Add New on Toolbar', 'rajtechbd' ),
        'all_items'             => __( 'Candidate Applications', 'rajtechbd' ),
        'add_new'               => __( 'Add Application', 'rajtechbd' ),
        'add_new_item'          => __( 'Add New Application', 'rajtechbd' ),
        'edit_item'             => __( 'View / Edit Application', 'rajtechbd' ),
        'view_item'             => __( 'View Application', 'rajtechbd' ),
        'search_items'          => __( 'Search Applications', 'rajtechbd' ),
        'not_found'             => __( 'No career applications found.', 'rajtechbd' ),
        'not_found_in_trash'    => __( 'No career applications found in Trash.', 'rajtechbd' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // Keep private so applicants' private data is not publicly crawlable
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-id-alt',
        'supports'           => array( 'title' ),
        'show_in_rest'       => false,
    );

    register_post_type( 'job_application', $args );

    // Register Job Opening Post Type (Nested under Job Applications menu)
    $opening_labels = array(
        'name'                  => _x( 'Job Openings', 'Post type general name', 'rajtechbd' ),
        'singular_name'         => _x( 'Job Opening', 'Post type singular name', 'rajtechbd' ),
        'menu_name'             => _x( 'Job Openings', 'Admin Menu text', 'rajtechbd' ),
        'name_admin_bar'        => _x( 'Job Opening', 'Add New on Toolbar', 'rajtechbd' ),
        'all_items'             => __( 'All Job Openings', 'rajtechbd' ),
        'add_new'               => __( 'Add New Job Post', 'rajtechbd' ),
        'add_new_item'          => __( 'Add New Job Opening', 'rajtechbd' ),
        'edit_item'             => __( 'Edit Job Opening', 'rajtechbd' ),
        'view_item'             => __( 'View Job Opening', 'rajtechbd' ),
        'search_items'          => __( 'Search Job Openings', 'rajtechbd' ),
        'not_found'             => __( 'No job openings found.', 'rajtechbd' ),
        'not_found_in_trash'    => __( 'No job openings found in Trash.', 'rajtechbd' ),
    );

    $opening_args = array(
        'labels'             => $opening_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=job_application', // Attached directly under Job Applications menu!
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor', 'page-attributes' ),
        'show_in_rest'       => false,
    );

    register_post_type( 'job_opening', $opening_args );
}
add_action( 'init', 'rajtechbd_register_career_cpt' );

/**
 * 2. Customize Admin Submenu Labels under "Job Applications"
 */
function rajtechbd_customize_career_admin_menu() {
    global $submenu;
    if ( isset( $submenu['edit.php?post_type=job_application'] ) ) {
        // Change first item to "Candidate Applications"
        $submenu['edit.php?post_type=job_application'][5][0] = __( 'Candidate Applications', 'rajtechbd' );
    }
}
add_action( 'admin_menu', 'rajtechbd_customize_career_admin_menu', 99 );

/**
 * 3. Seed Default Job Openings (runs ONCE only via option flag)
 *
 * Bug Fix: The previous version used 'post_status' => 'any' in get_posts()
 * which silently excludes trashed posts in WordPress (trash has
 * exclude_from_search=true). So every time the admin trashed all job posts,
 * this seeder would detect "no posts" and recreate the original defaults —
 * making edits invisible and preventing deletion. Fixed by using a persistent
 * option flag so seeding happens exactly once and never overwrites admin changes.
 */
function rajtechbd_seed_default_job_openings() {
    // If seeding has already run once, never run again regardless of post count.
    // This lets admins freely delete, trash, or edit job posts without interference.
    if ( get_option( 'rajtechbd_jobs_seeded_v2' ) ) {
        return;
    }

    // Also check for existing posts using EXPLICIT statuses (including trash).
    // 'any' in get_posts() excludes trash by WordPress design — this was the bug.
    $existing = get_posts( array(
        'post_type'      => 'job_opening',
        'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future', 'trash' ),
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ) );

    if ( ! empty( $existing ) ) {
        // Posts already exist (even in trash) — mark seeded and bail.
        update_option( 'rajtechbd_jobs_seeded_v2', true );
        return;
    }

    $defaults = array(
        array(
            'title'      => 'Full-Stack Software Engineer (PHP / Laravel / Modern WordPress)',
            'type'       => 'Full-Time',
            'experience' => '2+ Years',
            'location'   => 'Kuril, Dhaka (Hybrid)',
            'tech'       => 'PHP 8+, Laravel, MySQL, REST APIs, Tailwind CSS',
            'badge'      => 'sky',
            'order'      => 1,
        ),
        array(
            'title'      => 'Frontend Engineer (React / Tailwind CSS / UI Engineering)',
            'type'       => 'Full-Time',
            'experience' => '1-3 Years',
            'location'   => 'Kuril, Dhaka (Hybrid)',
            'tech'       => 'Modern JavaScript ES6+, Tailwind CSS, Web Components, Responsive UX',
            'badge'      => 'emerald',
            'order'      => 2,
        ),
        array(
            'title'      => 'UI/UX Product Designer & Design Systems Lead',
            'type'       => 'Full-Time / Contract',
            'experience' => '2+ Years',
            'location'   => 'Remote / Dhaka',
            'tech'       => 'Tools: Figma, Design Tokens, Prototyping, Enterprise ERP UX',
            'badge'      => 'purple',
            'order'      => 3,
        ),
        array(
            'title'      => 'General & Open Talent Application',
            'type'       => 'Open Role',
            'experience' => 'All Levels',
            'location'   => 'Kuril, Dhaka / Remote',
            'tech'       => 'Project Management, DevOps, Mobile Dev (Flutter), SEO/Growth, or Technical Sales',
            'badge'      => 'amber',
            'order'      => 4,
        ),
    );

    foreach ( $defaults as $item ) {
        $post_id = wp_insert_post( array(
            'post_title'  => $item['title'],
            'post_status' => 'publish',
            'post_type'   => 'job_opening',
            'menu_order'  => $item['order'],
        ) );

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_job_type', $item['type'] );
            update_post_meta( $post_id, '_job_experience', $item['experience'] );
            update_post_meta( $post_id, '_job_location', $item['location'] );
            update_post_meta( $post_id, '_job_tech', $item['tech'] );
            update_post_meta( $post_id, '_badge_color', $item['badge'] );
        }
    }

    // Permanently mark as seeded so this never fires again.
    update_option( 'rajtechbd_jobs_seeded_v2', true );
}
add_action( 'init', 'rajtechbd_seed_default_job_openings', 20 );

/**
 * 3b. One-time migration: mark existing live sites as already seeded.
 *
 * On a site that was running the old seeder (which used 'any'), posts already
 * exist in the database (possibly including 16 trashed ones). We set the new
 * option flag immediately so the seeder above never touches the database again.
 * This runs once and then the option_exists check stops it forever.
 */
function rajtechbd_migrate_seed_flag() {
    if ( get_option( 'rajtechbd_jobs_seeded_v2' ) ) {
        return; // Already migrated.
    }
    // Any existing post (even trashed) means seeding has already happened.
    $any_post = get_posts( array(
        'post_type'      => 'job_opening',
        'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future', 'trash' ),
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ) );

    if ( ! empty( $any_post ) ) {
        update_option( 'rajtechbd_jobs_seeded_v2', true );
    }
}
add_action( 'init', 'rajtechbd_migrate_seed_flag', 15 ); // Runs at priority 15, before seeder at 20.

/**
 * 3c. Auto-purge page cache whenever a job_opening is created, updated, trashed, or deleted.
 *
 * LiteSpeed Cache (and other full-page caches) store the complete HTML output.
 * Without a cache purge, visitors see stale job listings even after the admin
 * deletes posts. This function fires on all relevant WordPress post lifecycle
 * hooks and clears the cache via every common caching plugin's public API.
 */
function rajtechbd_purge_cache_on_job_change( $post_id ) {
    // Resolve post type — works for both save_post and trashed_post / deleted_post hooks.
    $post_type = get_post_type( $post_id );
    if ( 'job_opening' !== $post_type ) {
        return;
    }

    // 1. LiteSpeed Cache — primary plugin visible in admin sidebar.
    //    Both the action hook (all LSCWP versions) and direct class method (older API).
    do_action( 'litespeed_purge_all' );
    if ( class_exists( 'LiteSpeed_Cache_API' ) ) {
        LiteSpeed_Cache_API::purge_all();
    }
    if ( class_exists( 'LiteSpeed\Cache\API' ) ) {
        LiteSpeed\Cache\API::purge_all();
    }

    // 2. WP Super Cache
    if ( function_exists( 'wp_cache_clear_cache' ) ) {
        wp_cache_clear_cache();
    }

    // 3. W3 Total Cache
    if ( function_exists( 'w3tc_pgcache_flush' ) ) {
        w3tc_pgcache_flush();
    }

    // 4. WP Rocket
    if ( function_exists( 'rocket_clean_domain' ) ) {
        rocket_clean_domain();
    }

    // 5. Autoptimize
    if ( class_exists( 'autoptimizeCache' ) ) {
        autoptimizeCache::clearall();
    }

    // 6. WordPress object cache — clears in-memory query results for this request.
    wp_cache_delete( 'rajtechbd_job_openings', 'rajtechbd' );

    // 7. Clear the job openings transient so the next uncached request re-queries.
    delete_transient( 'rajtechbd_job_openings_data' );
}

// Fire on save/update (covers publish, draft, status changes).
add_action( 'save_post_job_opening', 'rajtechbd_purge_cache_on_job_change', 20 );
// Fire when moved to trash.
add_action( 'trashed_post', 'rajtechbd_purge_cache_on_job_change', 20 );
// Fire on permanent deletion.
add_action( 'deleted_post', 'rajtechbd_purge_cache_on_job_change', 20 );
// Fire on un-trash (restoring from trash).
add_action( 'untrashed_post', 'rajtechbd_purge_cache_on_job_change', 20 );

/**
 * 4. Helper Function: Get Active Job Openings
 *
 * Uses a short-lived transient (60 seconds) so repeated requests within the
 * same uncached page hit are fast, but the data is always fresh after any
 * cache purge triggered by rajtechbd_purge_cache_on_job_change().
 */
function rajtechbd_get_job_openings() {
    // Attempt to serve from transient (bypassed after any job_opening change).
    $cached = get_transient( 'rajtechbd_job_openings_data' );
    if ( false !== $cached ) {
        return $cached;
    }

    $posts = get_posts( array(
        'post_type'      => 'job_opening',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ) );

    $openings = array();

    if ( ! empty( $posts ) ) {
        foreach ( $posts as $p ) {
            $openings[] = array(
                'id'          => $p->ID,
                'title'       => get_the_title( $p ),
                'type'        => get_post_meta( $p->ID, '_job_type', true ) ? get_post_meta( $p->ID, '_job_type', true ) : 'Full-Time',
                'experience'  => get_post_meta( $p->ID, '_job_experience', true ) ? get_post_meta( $p->ID, '_job_experience', true ) : 'All Levels',
                'location'    => get_post_meta( $p->ID, '_job_location', true ) ? get_post_meta( $p->ID, '_job_location', true ) : 'Kuril, Dhaka',
                'tech'        => get_post_meta( $p->ID, '_job_tech', true ) ? get_post_meta( $p->ID, '_job_tech', true ) : '',
                'badge_color' => get_post_meta( $p->ID, '_badge_color', true ) ? get_post_meta( $p->ID, '_badge_color', true ) : 'sky',
            );
        }
    }

    // Cache result for 60 seconds — deleted automatically via delete_transient()
    // in rajtechbd_purge_cache_on_job_change() whenever a job post changes.
    set_transient( 'rajtechbd_job_openings_data', $openings, 60 );

    return $openings;
}

/**
 * 4b. One-time manual cache-buster: clears the LiteSpeed Cache immediately
 *     on the next admin request so the fix takes effect without needing the
 *     admin to navigate to LiteSpeed Cache → Purge All manually.
 */
function rajtechbd_onetime_cache_bust() {
    if ( get_option( 'rajtechbd_cache_busted_v1' ) ) {
        return;
    }
    // Trigger purge across all known caching plugins.
    do_action( 'litespeed_purge_all' );
    if ( class_exists( 'LiteSpeed_Cache_API' ) ) {
        LiteSpeed_Cache_API::purge_all();
    }
    if ( class_exists( 'LiteSpeed\Cache\API' ) ) {
        LiteSpeed\Cache\API::purge_all();
    }
    if ( function_exists( 'wp_cache_clear_cache' ) ) {
        wp_cache_clear_cache();
    }
    if ( function_exists( 'rocket_clean_domain' ) ) {
        rocket_clean_domain();
    }
    delete_transient( 'rajtechbd_job_openings_data' );
    update_option( 'rajtechbd_cache_busted_v1', true );
}
add_action( 'admin_init', 'rajtechbd_onetime_cache_bust' );

/**
 * 5. Meta Box: Job Opening Specifications
 */
function rajtechbd_add_job_opening_meta_box() {
    add_meta_box(
        'rajtechbd_job_opening_details',
        __( 'Job Opening Specifications & Frontend Display', 'rajtechbd' ),
        'rajtechbd_render_job_opening_meta_box',
        'job_opening',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'rajtechbd_add_job_opening_meta_box' );

function rajtechbd_render_job_opening_meta_box( $post ) {
    $job_type    = get_post_meta( $post->ID, '_job_type', true );
    $experience  = get_post_meta( $post->ID, '_job_experience', true );
    $location    = get_post_meta( $post->ID, '_job_location', true );
    $tech        = get_post_meta( $post->ID, '_job_tech', true );
    $badge_color = get_post_meta( $post->ID, '_badge_color', true );

    wp_nonce_field( 'rajtechbd_save_job_opening_action', 'rajtechbd_job_opening_nonce' );
    ?>
    <div style="padding:15px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif;">
      
      <p style="color:#64748b; font-size:13px; margin-top:0; margin-bottom:18px;">
        Configure the role attributes that appear on the <strong>Current Open Positions</strong> cards and the <strong>Application Form</strong> dropdown on the Careers page.
      </p>

      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:18px;">
        
        <div>
          <label for="job_type" style="display:block; font-weight:700; color:#334155; margin-bottom:6px;">Employment Type / Badge Tag:</label>
          <input type="text" name="job_type" id="job_type" value="<?php echo esc_attr( $job_type ? $job_type : 'Full-Time' ); ?>" placeholder="e.g. Full-Time, Contract, Part-Time, Open Role" style="width:100%; padding:8px 10px; border-radius:4px; border:1px solid #cbd5e1;">
        </div>

        <div>
          <label for="badge_color" style="display:block; font-weight:700; color:#334155; margin-bottom:6px;">Badge Color Accent:</label>
          <select name="badge_color" id="badge_color" style="width:100%; padding:8px 10px; border-radius:4px; border:1px solid #cbd5e1; font-weight:600;">
            <option value="sky" <?php selected( $badge_color, 'sky' ); ?>>Sky Blue (Engineering / Tech)</option>
            <option value="emerald" <?php selected( $badge_color, 'emerald' ); ?>>Emerald Green (Frontend / Mobile)</option>
            <option value="purple" <?php selected( $badge_color, 'purple' ); ?>>Purple (UI/UX / Design)</option>
            <option value="amber" <?php selected( $badge_color, 'amber' ); ?>>Amber Gold (General / Growth)</option>
          </select>
        </div>

        <div>
          <label for="job_experience" style="display:block; font-weight:700; color:#334155; margin-bottom:6px;">Required Experience:</label>
          <input type="text" name="job_experience" id="job_experience" value="<?php echo esc_attr( $experience ? $experience : '2+ Years' ); ?>" placeholder="e.g. 2+ Years, 1-3 Years, All Levels" style="width:100%; padding:8px 10px; border-radius:4px; border:1px solid #cbd5e1;">
        </div>

        <div>
          <label for="job_location" style="display:block; font-weight:700; color:#334155; margin-bottom:6px;">Workplace &amp; Location:</label>
          <input type="text" name="job_location" id="job_location" value="<?php echo esc_attr( $location ? $location : 'Kuril, Dhaka (Hybrid)' ); ?>" placeholder="e.g. Kuril, Dhaka (Hybrid), Remote" style="width:100%; padding:8px 10px; border-radius:4px; border:1px solid #cbd5e1;">
        </div>

      </div>

      <div style="margin-top:18px;">
        <label for="job_tech" style="display:block; font-weight:700; color:#334155; margin-bottom:6px;">Tech Stack &amp; Key Skills Summary:</label>
        <input type="text" name="job_tech" id="job_tech" value="<?php echo esc_attr( $tech ); ?>" placeholder="e.g. PHP 8+, Laravel, MySQL, REST APIs, Tailwind CSS" style="width:100%; padding:8px 10px; border-radius:4px; border:1px solid #cbd5e1;">
        <p style="font-size:12px; color:#64748b; margin-top:4px;">Appears on the subtitle line of the vacancy card on the /career/ page.</p>
      </div>

    </div>
    <?php
}

function rajtechbd_save_job_opening_meta_box( $post_id ) {
    if ( ! isset( $_POST['rajtechbd_job_opening_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_job_opening_nonce'] ) ), 'rajtechbd_save_job_opening_action' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['job_type'] ) ) {
        update_post_meta( $post_id, '_job_type', sanitize_text_field( wp_unslash( $_POST['job_type'] ) ) );
    }
    if ( isset( $_POST['badge_color'] ) ) {
        update_post_meta( $post_id, '_badge_color', sanitize_text_field( wp_unslash( $_POST['badge_color'] ) ) );
    }
    if ( isset( $_POST['job_experience'] ) ) {
        update_post_meta( $post_id, '_job_experience', sanitize_text_field( wp_unslash( $_POST['job_experience'] ) ) );
    }
    if ( isset( $_POST['job_location'] ) ) {
        update_post_meta( $post_id, '_job_location', sanitize_text_field( wp_unslash( $_POST['job_location'] ) ) );
    }
    if ( isset( $_POST['job_tech'] ) ) {
        update_post_meta( $post_id, '_job_tech', sanitize_text_field( wp_unslash( $_POST['job_tech'] ) ) );
    }
}
add_action( 'save_post_job_opening', 'rajtechbd_save_job_opening_meta_box' );

/**
 * 6. Custom Columns for Job Openings List in Admin
 */
function rajtechbd_job_opening_columns( $columns ) {
    return array(
        'cb'              => '<input type="checkbox" />',
        'title'           => __( 'Position Title', 'rajtechbd' ),
        'job_type'        => __( 'Type / Badge', 'rajtechbd' ),
        'job_experience'  => __( 'Experience', 'rajtechbd' ),
        'job_location'    => __( 'Location', 'rajtechbd' ),
        'job_tech'        => __( 'Tech Stack', 'rajtechbd' ),
        'date'            => __( 'Published', 'rajtechbd' ),
    );
}
add_filter( 'manage_job_opening_posts_columns', 'rajtechbd_job_opening_columns' );

function rajtechbd_job_opening_custom_column( $column, $post_id ) {
    switch ( $column ) {
        case 'job_type':
            $type  = get_post_meta( $post_id, '_job_type', true );
            $color = get_post_meta( $post_id, '_badge_color', true );
            $bg = '#e0f2fe'; $fg = '#0369a1';
            if ( 'emerald' === $color ) { $bg = '#dcfce7'; $fg = '#15803d'; }
            elseif ( 'purple' === $color ) { $bg = '#ede9fe'; $fg = '#6d28d9'; }
            elseif ( 'amber' === $color ) { $bg = '#fef3c7'; $fg = '#b45309'; }
            echo '<span style="background:' . $bg . '; color:' . $fg . '; padding:3px 8px; border-radius:4px; font-weight:bold; font-size:11px;">' . esc_html( $type ? $type : 'Full-Time' ) . '</span>';
            break;

        case 'job_experience':
            $exp = get_post_meta( $post_id, '_job_experience', true );
            echo esc_html( $exp ? $exp : 'All Levels' );
            break;

        case 'job_location':
            $loc = get_post_meta( $post_id, '_job_location', true );
            echo esc_html( $loc ? $loc : 'Kuril, Dhaka' );
            break;

        case 'job_tech':
            $tech = get_post_meta( $post_id, '_job_tech', true );
            echo '<span style="font-size:12px; color:#475569;">' . esc_html( $tech ? $tech : '&mdash;' ) . '</span>';
            break;
    }
}
add_action( 'manage_job_opening_posts_custom_column', 'rajtechbd_job_opening_custom_column', 10, 2 );

/**
 * 7. Candidate Application Saving & Notifications
 */
function rajtechbd_save_career_application( $data ) {
    $full_name    = isset( $data['full_name'] ) ? sanitize_text_field( $data['full_name'] ) : '';
    $email        = isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '';
    $phone        = isset( $data['phone'] ) ? sanitize_text_field( $data['phone'] ) : '';
    $experience   = isset( $data['experience'] ) ? sanitize_text_field( $data['experience'] ) : '';
    $position     = isset( $data['position'] ) ? sanitize_text_field( $data['position'] ) : 'General Application';
    $resume_link  = isset( $data['resume_link'] ) ? esc_url_raw( $data['resume_link'] ) : '';
    $cover_letter = isset( $data['cover_letter'] ) ? sanitize_textarea_field( $data['cover_letter'] ) : '';

    if ( empty( $full_name ) || empty( $email ) || empty( $phone ) || empty( $resume_link ) ) {
        return new WP_Error( 'missing_fields', 'Required fields are missing.' );
    }

    // Insert into wp_posts
    $post_title = $full_name . ' - ' . $position . ' (' . current_time( 'd M Y' ) . ')';
    $post_id    = wp_insert_post( array(
        'post_title'   => $post_title,
        'post_status'  => 'publish',
        'post_type'    => 'job_application',
        'post_content' => $cover_letter,
    ) );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    // Save individual meta attributes into wp_postmeta
    update_post_meta( $post_id, '_applicant_name', $full_name );
    update_post_meta( $post_id, '_applicant_email', $email );
    update_post_meta( $post_id, '_applicant_phone', $phone );
    update_post_meta( $post_id, '_applicant_experience', $experience );
    update_post_meta( $post_id, '_applicant_position', $position );
    update_post_meta( $post_id, '_applicant_resume_link', $resume_link );
    update_post_meta( $post_id, '_applicant_cover_letter', $cover_letter );
    update_post_meta( $post_id, '_application_status', 'New' );
    update_post_meta( $post_id, '_applicant_ip', isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
    update_post_meta( $post_id, '_submission_time', current_time( 'mysql' ) );

    // Send email dispatch to info@rajthechbd.com
    $to      = 'info@rajthechbd.com';
    $subject = 'New Career Application: ' . $full_name . ' - ' . $position . ' (' . $experience . ')';
    $body    = "New Career Application Saved to Database (ID #$post_id):\n\n"
             . "------------------------------------------------------------\n"
             . "Applicant Name: $full_name\n"
             . "Email Address: $email\n"
             . "Contact Number: $phone\n"
             . "Position Applied For: $position\n"
             . "Years of Experience: $experience\n"
             . "Google Drive Resume Link: $resume_link\n"
             . "------------------------------------------------------------\n\n"
             . "Cover Letter / Statement:\n"
             . "$cover_letter\n\n"
             . "------------------------------------------------------------\n"
             . "Direct Admin Review Link:\n"
             . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . "\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: $full_name <$email>",
        'Cc: info@rajtechbd.com'
    );

    wp_mail( $to, $subject, $body, $headers );

    return $post_id;
}

/**
 * 8. Custom Admin Columns in WordPress Dashboard for Job Applications
 */
function rajtechbd_job_application_columns( $columns ) {
    return array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __( 'Candidate & Role', 'rajtechbd' ),
        'applicant_contact'    => __( 'Contact Information', 'rajtechbd' ),
        'applicant_experience' => __( 'Experience', 'rajtechbd' ),
        'applicant_resume'     => __( 'Resume (Google Drive)', 'rajtechbd' ),
        'application_status'   => __( 'Status', 'rajtechbd' ),
        'date'                 => __( 'Submitted Date', 'rajtechbd' ),
    );
}
add_filter( 'manage_job_application_posts_columns', 'rajtechbd_job_application_columns' );

function rajtechbd_job_application_custom_column( $column, $post_id ) {
    switch ( $column ) {
        case 'applicant_contact':
            $email = get_post_meta( $post_id, '_applicant_email', true );
            $phone = get_post_meta( $post_id, '_applicant_phone', true );
            if ( $email ) {
                echo '<div style="font-weight:600;"><a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a></div>';
            }
            if ( $phone ) {
                $clean_phone = preg_replace( '/[^0-9]/', '', $phone );
                echo '<div style="color:#64748b; font-size:12px; margin-top:2px;">';
                echo esc_html( $phone );
                echo ' &bull; <a href="https://wa.me/' . esc_attr( $clean_phone ) . '" target="_blank" rel="noopener" style="color:#10b981; font-weight:600;">WhatsApp</a>';
                echo '</div>';
            }
            break;

        case 'applicant_experience':
            $exp = get_post_meta( $post_id, '_applicant_experience', true );
            echo $exp ? esc_html( $exp ) : '&mdash;';
            break;

        case 'applicant_resume':
            $link = get_post_meta( $post_id, '_applicant_resume_link', true );
            if ( $link ) {
                echo '<a href="' . esc_url( $link ) . '" target="_blank" rel="noopener" class="button button-small" style="display:inline-flex; align-items:center; gap:4px; font-weight:600; color:#0284c7; border-color:#0284c7;">';
                echo '<span class="dashicons dashicons-external" style="font-size:14px; width:14px; height:14px;"></span> Open CV in Drive';
                echo '</a>';
            } else {
                echo '<span style="color:#94a3b8;">No Link</span>';
            }
            break;

        case 'application_status':
            $status = get_post_meta( $post_id, '_application_status', true );
            if ( ! $status ) $status = 'New';
            $bg = '#e0f2fe'; $color = '#0369a1';
            if ( $status === 'Shortlisted' ) { $bg = '#dcfce7'; $color = '#15803d'; }
            elseif ( $status === 'Interviewed' ) { $bg = '#fef3c7'; $color = '#b45309'; }
            elseif ( $status === 'Rejected' ) { $bg = '#fee2e2'; $color = '#b91c1c'; }

            echo '<span style="background:' . $bg . '; color:' . $color . '; padding:3px 8px; border-radius:4px; font-weight:bold; font-size:11px; text-transform:uppercase;">' . esc_html( $status ) . '</span>';
            break;
    }
}
add_action( 'manage_job_application_posts_custom_column', 'rajtechbd_job_application_custom_column', 10, 2 );

/**
 * 9. Custom Meta Box: Clean Application Review Dashboard in Admin
 */
function rajtechbd_add_career_meta_boxes() {
    add_meta_box(
        'rajtechbd_application_details',
        __( 'Candidate Profile & Resume Verification', 'rajtechbd' ),
        'rajtechbd_render_career_meta_box',
        'job_application',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'rajtechbd_add_career_meta_boxes' );

function rajtechbd_render_career_meta_box( $post ) {
    $name         = get_post_meta( $post->ID, '_applicant_name', true );
    $email        = get_post_meta( $post->ID, '_applicant_email', true );
    $phone        = get_post_meta( $post->ID, '_applicant_phone', true );
    $experience   = get_post_meta( $post->ID, '_applicant_experience', true );
    $position     = get_post_meta( $post->ID, '_applicant_position', true );
    $resume_link  = get_post_meta( $post->ID, '_applicant_resume_link', true );
    $cover_letter = get_post_meta( $post->ID, '_applicant_cover_letter', true );
    $status       = get_post_meta( $post->ID, '_application_status', true );
    $ip           = get_post_meta( $post->ID, '_applicant_ip', true );
    $time         = get_post_meta( $post->ID, '_submission_time', true );

    wp_nonce_field( 'rajtechbd_save_application_status', 'rajtechbd_application_status_nonce' );
    ?>
    <div style="padding:15px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif;">
      
      <!-- Quick Status Switcher -->
      <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:15px; margin-bottom:20px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
        <div>
          <label for="application_status" style="font-weight:700; color:#334155; margin-right:10px;">Candidate Hiring Status:</label>
          <select name="application_status" id="application_status" style="font-weight:600; padding:4px 8px;">
            <option value="New" <?php selected( $status, 'New' ); ?>>New (Pending Review)</option>
            <option value="Shortlisted" <?php selected( $status, 'Shortlisted' ); ?>>Shortlisted (Schedule Discovery)</option>
            <option value="Interviewed" <?php selected( $status, 'Interviewed' ); ?>>Interviewed (Technical Evaluation)</option>
            <option value="Offered" <?php selected( $status, 'Offered' ); ?>>Offer Extended</option>
            <option value="Hired" <?php selected( $status, 'Hired' ); ?>>Hired & Onboarded</option>
            <option value="Rejected" <?php selected( $status, 'Rejected' ); ?>>Archived / Not Selected</option>
          </select>
        </div>
        <div style="font-size:12px; color:#64748b;">
          Submitted: <strong><?php echo esc_html( $time ? $time : get_the_date( 'Y-m-d H:i:s', $post->ID ) ); ?></strong> (IP: <?php echo esc_html( $ip ? $ip : 'N/A' ); ?>)
        </div>
      </div>

      <!-- Two Column Details Grid -->
      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:15px; margin-bottom:20px;">
        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Full Name</div>
          <div style="font-size:16px; font-weight:700; color:#0f172a;"><?php echo esc_html( $name ); ?></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Position Applied</div>
          <div style="font-size:15px; font-weight:600; color:#0284c7;"><?php echo esc_html( $position ); ?></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Contact Email</div>
          <div style="font-size:14px;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="font-weight:600; color:#0284c7;"><?php echo esc_html( $email ); ?></a></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Phone / WhatsApp</div>
          <div style="font-size:14px; font-weight:600;">
            <?php echo esc_html( $phone ); ?>
            <?php if ( $phone ) : ?>
              &bull; <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $phone ) ); ?>" target="_blank" rel="noopener" style="color:#10b981;">Open WhatsApp</a>
            <?php endif; ?>
          </div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Years of Experience</div>
          <div style="font-size:14px; font-weight:600; color:#334155;"><?php echo esc_html( $experience ); ?></div>
        </div>

        <div style="background:#f0f9ff; border:1px solid #bae6fd; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#0369a1; font-weight:700; margin-bottom:4px;">Google Drive Resume</div>
          <div>
            <?php if ( $resume_link ) : ?>
              <a href="<?php echo esc_url( $resume_link ); ?>" target="_blank" rel="noopener" class="button button-primary" style="background:#0284c7; border-color:#0284c7; font-weight:bold;">
                <span class="dashicons dashicons-external" style="line-height:28px;"></span> Open Resume in Google Drive
              </a>
              <div style="font-size:11px; color:#64748b; margin-top:4px; word-break:break-all;"><?php echo esc_html( $resume_link ); ?></div>
            <?php else : ?>
              <span style="color:#ef4444; font-weight:bold;">No Resume Link Provided</span>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Cover Letter / Statement Box -->
      <div style="margin-top:15px;">
        <h4 style="font-size:13px; font-weight:700; text-transform:uppercase; color:#334155; margin-bottom:8px;">Cover Letter &amp; Statement of Purpose</h4>
        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:8px; padding:16px; font-size:14px; line-height:1.7; color:#334155; white-space:pre-wrap;">
          <?php echo esc_html( $cover_letter ? $cover_letter : 'No cover letter submitted.' ); ?>
        </div>
      </div>

    </div>
    <?php
}

function rajtechbd_save_career_meta_box( $post_id ) {
    if ( ! isset( $_POST['rajtechbd_application_status_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_application_status_nonce'] ) ), 'rajtechbd_save_application_status' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['application_status'] ) ) {
        update_post_meta( $post_id, '_application_status', sanitize_text_field( wp_unslash( $_POST['application_status'] ) ) );
    }
}
add_action( 'save_post_job_application', 'rajtechbd_save_career_meta_box' );

/**
 * 10. REST API Endpoints:
 * - POST /wp-json/rajtechbd/v1/career-apply (Submit application)
 * - GET  /wp-json/rajtechbd/v1/job-openings (Fetch active openings)
 */
function rajtechbd_register_career_rest_route() {
    register_rest_route( 'rajtechbd/v1', '/career-apply', array(
        'methods'             => 'POST',
        'callback'            => 'rajtechbd_rest_career_apply_handler',
        'permission_callback' => '__return_true', // Public form submission
    ) );

    register_rest_route( 'rajtechbd/v1', '/job-openings', array(
        'methods'             => 'GET',
        'callback'            => 'rajtechbd_rest_job_openings_handler',
        'permission_callback' => '__return_true', // Public read
    ) );
}
add_action( 'rest_api_init', 'rajtechbd_register_career_rest_route' );

function rajtechbd_rest_job_openings_handler() {
    $openings = rajtechbd_get_job_openings();
    return new WP_REST_Response( array(
        'success'  => true,
        'openings' => $openings,
    ), 200 );
}

function rajtechbd_rest_career_apply_handler( $request ) {
    $params = $request->get_params();

    $full_name    = isset( $params['full_name'] ) ? sanitize_text_field( $params['full_name'] ) : '';
    $email        = isset( $params['email'] ) ? sanitize_email( $params['email'] ) : '';
    $phone        = isset( $params['phone'] ) ? sanitize_text_field( $params['phone'] ) : '';
    $experience   = isset( $params['experience'] ) ? sanitize_text_field( $params['experience'] ) : '';
    $position     = isset( $params['position'] ) ? sanitize_text_field( $params['position'] ) : 'General Application';
    $resume_link  = isset( $params['resume_link'] ) ? esc_url_raw( $params['resume_link'] ) : '';
    $cover_letter = isset( $params['cover_letter'] ) ? sanitize_textarea_field( $params['cover_letter'] ) : '';

    if ( empty( $full_name ) || empty( $email ) || empty( $phone ) || empty( $resume_link ) || empty( $cover_letter ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Please fill out all required fields.',
        ), 400 );
    }

    if ( ! filter_var( $resume_link, FILTER_VALIDATE_URL ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Please provide a valid URL for your Google Drive resume.',
        ), 400 );
    }

    $post_id = rajtechbd_save_career_application( array(
        'full_name'    => $full_name,
        'email'        => $email,
        'phone'        => $phone,
        'experience'   => $experience,
        'position'     => $position,
        'resume_link'  => $resume_link,
        'cover_letter' => $cover_letter,
    ) );

    if ( is_wp_error( $post_id ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Error saving application to database.',
        ), 500 );
    }

    return new WP_REST_Response( array(
        'success' => true,
        'message' => 'Application submitted and saved to database successfully.',
        'id'      => $post_id,
    ), 200 );
}
