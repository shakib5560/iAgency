<?php
/**
 * Technical Discovery Inquiries Database & CRM Management System
 *
 * Automatically saves client technical discovery and scoping requests into the WordPress database
 * and provides an administrative pipeline review dashboard with 1-click WhatsApp & email actions.
 *
 * @package RajTech_BD
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Register Custom Post Type: Technical Discovery Inquiries (Private Admin Only)
 */
function rajtechbd_register_discovery_cpt() {
    $labels = array(
        'name'                  => _x( 'Discovery Inquiries', 'Post type general name', 'rajtechbd' ),
        'singular_name'         => _x( 'Discovery Inquiry', 'Post type singular name', 'rajtechbd' ),
        'menu_name'             => _x( 'Discovery Inquiries', 'Admin Menu text', 'rajtechbd' ),
        'name_admin_bar'        => _x( 'Discovery Inquiry', 'Add New on Toolbar', 'rajtechbd' ),
        'all_items'             => __( 'All Discovery Requests', 'rajtechbd' ),
        'add_new'               => __( 'Add Inquiry', 'rajtechbd' ),
        'add_new_item'          => __( 'Add New Inquiry', 'rajtechbd' ),
        'edit_item'             => __( 'View / Manage Inquiry', 'rajtechbd' ),
        'view_item'             => __( 'View Inquiry', 'rajtechbd' ),
        'search_items'          => __( 'Search Inquiries', 'rajtechbd' ),
        'not_found'             => __( 'No discovery inquiries found.', 'rajtechbd' ),
        'not_found_in_trash'    => __( 'No discovery inquiries found in Trash.', 'rajtechbd' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // Keep private for NDA & corporate confidentiality
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array( 'title' ),
        'show_in_rest'       => false,
    );

    register_post_type( 'discovery_inquiry', $args );
}
add_action( 'init', 'rajtechbd_register_discovery_cpt' );

/**
 * 2. Helper function to save discovery inquiry to the database and send email notification
 */
function rajtechbd_save_discovery_inquiry( $data ) {
    $name     = isset( $data['client_name'] ) ? sanitize_text_field( $data['client_name'] ) : '';
    $email    = isset( $data['client_email'] ) ? sanitize_email( $data['client_email'] ) : '';
    $phone    = isset( $data['client_phone'] ) ? sanitize_text_field( $data['client_phone'] ) : '';
    $service  = isset( $data['service_interest'] ) ? sanitize_text_field( $data['service_interest'] ) : 'General Engineering';
    $details  = isset( $data['project_details'] ) ? sanitize_textarea_field( $data['project_details'] ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $details ) ) {
        return new WP_Error( 'missing_fields', 'Required fields (Name, Email, and Project Scope) are missing.' );
    }

    // Insert into wp_posts
    $post_title = $name . ' — ' . $service . ' (' . current_time( 'd M Y' ) . ')';
    $post_id    = wp_insert_post( array(
        'post_title'   => $post_title,
        'post_status'  => 'publish',
        'post_type'    => 'discovery_inquiry',
        'post_content' => $details,
    ) );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    // Save metadata in wp_postmeta
    update_post_meta( $post_id, '_client_name', $name );
    update_post_meta( $post_id, '_client_email', $email );
    update_post_meta( $post_id, '_client_phone', $phone );
    update_post_meta( $post_id, '_service_interest', $service );
    update_post_meta( $post_id, '_project_details', $details );
    update_post_meta( $post_id, '_inquiry_status', 'New' );
    update_post_meta( $post_id, '_client_ip', isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
    update_post_meta( $post_id, '_submission_time', current_time( 'mysql' ) );

    // Send instant email notification to engineering leads
    $to      = 'info@rajtechbd.com';
    $subject = 'New Technical Discovery Inquiry: ' . $name . ' (' . $service . ') [ID #' . $post_id . ']';
    $body    = "New Technical Discovery Scoping Request (Saved in Database ID #$post_id):\n\n"
             . "------------------------------------------------------------\n"
             . "Client Name: $name\n"
             . "Business Email: $email\n"
             . "Phone / WhatsApp: $phone\n"
             . "Primary Capability Needed: $service\n"
             . "------------------------------------------------------------\n\n"
             . "Project Scope & Technical Requirements:\n"
             . "$details\n\n"
             . "------------------------------------------------------------\n"
             . "Direct Admin Management Link:\n"
             . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . "\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: $name <$email>",
    );

    wp_mail( $to, $subject, $body, $headers );

    return $post_id;
}

/**
 * 3. Custom Admin Columns in WordPress Dashboard for Discovery Inquiries
 */
function rajtechbd_discovery_inquiry_columns( $columns ) {
    $new_columns = array(
        'cb'                 => '<input type="checkbox" />',
        'title'              => __( 'Client & Inquiry', 'rajtechbd' ),
        'client_contact'     => __( 'Contact Information', 'rajtechbd' ),
        'service_interest'   => __( 'Capability Needed', 'rajtechbd' ),
        'inquiry_status'     => __( 'Pipeline Status', 'rajtechbd' ),
        'date'               => __( 'Received Date', 'rajtechbd' ),
    );
    return $new_columns;
}
add_filter( 'manage_discovery_inquiry_posts_columns', 'rajtechbd_discovery_inquiry_columns' );

function rajtechbd_discovery_inquiry_custom_column( $column, $post_id ) {
    switch ( $column ) {
        case 'client_contact':
            $email = get_post_meta( $post_id, '_client_email', true );
            $phone = get_post_meta( $post_id, '_client_phone', true );
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

        case 'service_interest':
            $service = get_post_meta( $post_id, '_service_interest', true );
            echo '<span style="background:#f1f5f9; color:#0f172a; padding:3px 8px; border-radius:4px; font-weight:600; font-size:12px;">' . esc_html( $service ? $service : 'Custom Engineering' ) . '</span>';
            break;

        case 'inquiry_status':
            $status = get_post_meta( $post_id, '_inquiry_status', true );
            if ( ! $status ) $status = 'New';
            $bg = '#e0f2fe'; $color = '#0369a1';
            if ( $status === 'Discovery Call Scheduled' ) { $bg = '#fef3c7'; $color = '#b45309'; }
            elseif ( $status === 'Proposal Sent' ) { $bg = '#ede9fe'; $color = '#6d28d9'; }
            elseif ( $status === 'Won / Active Project' ) { $bg = '#dcfce7'; $color = '#15803d'; }
            elseif ( $status === 'Closed' ) { $bg = '#f1f5f9'; $color = '#64748b'; }

            echo '<span style="background:' . $bg . '; color:' . $color . '; padding:3px 8px; border-radius:4px; font-weight:bold; font-size:11px; text-transform:uppercase;">' . esc_html( $status ) . '</span>';
            break;
    }
}
add_action( 'manage_discovery_inquiry_posts_custom_column', 'rajtechbd_discovery_inquiry_custom_column', 10, 2 );

/**
 * 4. Custom Meta Box: Clean Lead Review Panel in Admin
 */
function rajtechbd_add_discovery_meta_boxes() {
    add_meta_box(
        'rajtechbd_discovery_details',
        __( 'Technical Discovery Scope & Requirements', 'rajtechbd' ),
        'rajtechbd_render_discovery_meta_box',
        'discovery_inquiry',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'rajtechbd_add_discovery_meta_boxes' );

function rajtechbd_render_discovery_meta_box( $post ) {
    $name    = get_post_meta( $post->ID, '_client_name', true );
    $email   = get_post_meta( $post->ID, '_client_email', true );
    $phone   = get_post_meta( $post->ID, '_client_phone', true );
    $service = get_post_meta( $post->ID, '_service_interest', true );
    $details = get_post_meta( $post->ID, '_project_details', true );
    $status  = get_post_meta( $post->ID, '_inquiry_status', true );
    $ip      = get_post_meta( $post->ID, '_client_ip', true );
    $time    = get_post_meta( $post->ID, '_submission_time', true );

    wp_nonce_field( 'rajtechbd_save_discovery_status', 'rajtechbd_discovery_status_nonce' );
    ?>
    <div style="padding:15px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif;">
      
      <!-- Pipeline Status Switcher -->
      <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:15px; margin-bottom:20px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
        <div>
          <label for="inquiry_status" style="font-weight:700; color:#334155; margin-right:10px;">Scoping / Pipeline Status:</label>
          <select name="inquiry_status" id="inquiry_status" style="font-weight:600; padding:4px 8px;">
            <option value="New" <?php selected( $status, 'New' ); ?>>New (Pending Review)</option>
            <option value="In Discussion" <?php selected( $status, 'In Discussion' ); ?>>In Discussion</option>
            <option value="Discovery Call Scheduled" <?php selected( $status, 'Discovery Call Scheduled' ); ?>>Discovery Call Scheduled</option>
            <option value="Proposal Sent" <?php selected( $status, 'Proposal Sent' ); ?>>Proposal / Architecture Sent</option>
            <option value="Won / Active Project" <?php selected( $status, 'Won / Active Project' ); ?>>Won / Active Project (In Sprint)</option>
            <option value="Closed" <?php selected( $status, 'Closed' ); ?>>Closed / Archived</option>
          </select>
        </div>
        <div style="font-size:12px; color:#64748b;">
          Received: <strong><?php echo esc_html( $time ? $time : get_the_date( 'Y-m-d H:i:s', $post->ID ) ); ?></strong> (IP: <?php echo esc_html( $ip ? $ip : 'N/A' ); ?>)
        </div>
      </div>

      <!-- Two Column Details Grid -->
      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:15px; margin-bottom:20px;">
        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Client Name</div>
          <div style="font-size:16px; font-weight:700; color:#0f172a;"><?php echo esc_html( $name ); ?></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Capability Needed</div>
          <div style="font-size:15px; font-weight:600; color:#f59e0b;"><?php echo esc_html( $service ); ?></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Business Email</div>
          <div style="font-size:14px;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="font-weight:600; color:#0284c7;"><?php echo esc_html( $email ); ?></a></div>
        </div>

        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:6px; padding:12px;">
          <div style="font-size:11px; text-transform:uppercase; color:#64748b; font-weight:700; margin-bottom:4px;">Phone / WhatsApp</div>
          <div style="font-size:14px; font-weight:600;">
            <?php echo esc_html( $phone ? $phone : 'Not Specified' ); ?>
            <?php if ( $phone ) : ?>
              &bull; <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $phone ) ); ?>" target="_blank" rel="noopener" style="color:#10b981;">Chat on WhatsApp</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Project Scope Box -->
      <div style="margin-top:15px;">
        <h4 style="font-size:13px; font-weight:700; text-transform:uppercase; color:#334155; margin-bottom:8px;">Project Scope &amp; Architecture Requirements</h4>
        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:8px; padding:16px; font-size:14px; line-height:1.7; color:#334155; white-space:pre-wrap;">
          <?php echo esc_html( $details ); ?>
        </div>
      </div>

    </div>
    <?php
}

function rajtechbd_save_discovery_meta_box( $post_id ) {
    if ( ! isset( $_POST['rajtechbd_discovery_status_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rajtechbd_discovery_status_nonce'] ) ), 'rajtechbd_save_discovery_status' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['inquiry_status'] ) ) {
        update_post_meta( $post_id, '_inquiry_status', sanitize_text_field( wp_unslash( $_POST['inquiry_status'] ) ) );
    }
}
add_action( 'save_post_discovery_inquiry', 'rajtechbd_save_discovery_meta_box' );

/**
 * 5. Universal REST API Endpoint for Headless / Static Submissions: /wp-json/rajtechbd/v1/discovery-inquiry
 */
function rajtechbd_register_discovery_rest_route() {
    register_rest_route( 'rajtechbd/v1', '/discovery-inquiry', array(
        'methods'             => 'POST',
        'callback'            => 'rajtechbd_rest_discovery_handler',
        'permission_callback' => '__return_true', // Public form submission
    ) );
}
add_action( 'rest_api_init', 'rajtechbd_register_discovery_rest_route' );

function rajtechbd_rest_discovery_handler( $request ) {
    $params = $request->get_params();

    $name    = isset( $params['client_name'] ) ? sanitize_text_field( $params['client_name'] ) : '';
    $email   = isset( $params['client_email'] ) ? sanitize_email( $params['client_email'] ) : '';
    $phone   = isset( $params['client_phone'] ) ? sanitize_text_field( $params['client_phone'] ) : '';
    $service = isset( $params['service_interest'] ) ? sanitize_text_field( $params['service_interest'] ) : 'General Engineering';
    $details = isset( $params['project_details'] ) ? sanitize_textarea_field( $params['project_details'] ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $details ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Please fill out all required fields (Name, Email, and Project Scope).',
        ), 400 );
    }

    $post_id = rajtechbd_save_discovery_inquiry( array(
        'client_name'      => $name,
        'client_email'     => $email,
        'client_phone'     => $phone,
        'service_interest' => $service,
        'project_details'  => $details,
    ) );

    if ( is_wp_error( $post_id ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Error saving discovery request to database.',
        ), 500 );
    }

    return new WP_REST_Response( array(
        'success' => true,
        'message' => 'Technical discovery request submitted and saved to database successfully.',
        'id'      => $post_id,
    ), 200 );
}
