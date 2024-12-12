<?php

/**
 * Allow SVG file uploads.
 */
function custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';  // Example: Allow SVG
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');


/**
 * Email notification for transcription sample ready.
 */
add_action('wp_ajax_send_sample_ready_email', 'send_sample_ready_email');
add_action('wp_ajax_nopriv_send_sample_ready_email', 'send_sample_ready_email');

function send_sample_ready_email() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error(['message' => 'Invalid request method.']);
        wp_die();
    }

    // Read input   
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if email is set and valid
    if (!isset($data['email']) || !is_email($data['email'])) {
        error_log('Invalid email address provided.');
        wp_send_json_error(['message' => 'Invalid email address provided.']);
        wp_die();
    }

    $user_email = sanitize_email($data['email']);
    $subject = 'Your Transcription Sample is Ready';
    $message = '<html><body>';
    $message .= '<h2>Your Transcription is Ready!</h2>';
    $message .= '<p>Your requested transcription sample is ready for download. Click the button below to log in and view your file.</p>';
    $message .= '<p><a href="' . wp_login_url() . '" style="padding: 10px 20px; color: #fff; background-color: #0073AA; text-decoration: none; border-radius: 4px;">Login to View</a></p>';
    $message .= '</body></html>';
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: Verbit <noreply@yoursite.com>'
    ];

    // Log email sending attempt
    error_log('Sending email to: ' . $user_email);

    // Send the email
    if (wp_mail($user_email, $subject, $message, $headers)) {
        error_log('Email sent successfully to: ' . $user_email);
        wp_send_json_success(['message' => 'Email sent successfully.']);
    } else {
        error_log('Failed to send email to: ' . $user_email);
        wp_send_json_error(['message' => 'Failed to send email.']);
    }

    wp_die();
}


/**
 * Load transcript content via AJAX.
 */
function load_transcript_content() {
    ob_start();

    if ( have_rows('transcript_blocks', 314) ) {
        while ( have_rows('transcript_blocks', 314) ) {
            the_row();
            $dir = get_template_directory() . '/src/blocks/layouts/pages/transcript/';
            if (in_array(get_row_layout(), ['purchase', 'export', 'translate', 'edit', 'tags'])) {
                $dir = get_template_directory() . '/src/blocks/components/modals/transcript/';
            }

            include $dir . get_row_layout() . '.php';
        }
    } else {
        error_log('No transcript blocks found.');
    }

    $output = ob_get_clean();
    if (empty($output)) {
        error_log('Output is empty in load_transcript_content.');
    }
    echo $output;
    wp_die();
}

add_action('wp_ajax_load_transcript_content', 'load_transcript_content');
add_action('wp_ajax_nopriv_load_transcript_content', 'load_transcript_content');


add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/profile-menu', array(
        'methods'  => 'GET',
        'callback' => 'get_profile_menu',
        'permission_callback' => '__return_true', // Allow public access; secure as needed
    ));
});

function get_profile_menu() {
    $menu = wp_nav_menu(array(
        'theme_location' => 'profile-menu',
        'echo'           => false, // Return the menu instead of echoing it
    ));
    
    if (!$menu) {
        return new WP_Error('no_menu', 'Profile menu not found', array('status' => 404));
    }
    
    return rest_ensure_response(array(
        'menu' => $menu,
    ));
}

// Add header to the checkout page
 add_action('render_block', function ($block_content, $block) {
    if ($block['blockName'] === 'woocommerce/checkout') {
        ob_start();
        get_template_part('src/blocks/layouts/site-head');
        get_template_part('src/blocks/components/stepper');
        $custom_header = ob_get_clean();
        $block_content = $custom_header . $block_content;
    }
    return $block_content;
}, 10, 2);

// Add custom hours dropdown to the checkout page
/* add_action('wp_ajax_add_product_to_cart', 'add_product_to_cart_callback');
add_action('wp_ajax_nopriv_add_product_to_cart', 'add_product_to_cart_callback');
function add_product_to_cart_callback() {
    if (!isset($_POST['product_id']) || !is_numeric($_POST['product_id'])) {
        wp_send_json_error(['message' => 'Invalid product ID.']);
    }
    $product_id = intval($_POST['product_id']);
    $product = wc_get_product($product_id);
    if (!$product) {
        wp_send_json_error(['message' => 'Product not found.']);
    }
    WC()->cart->empty_cart();
    if (isset($_POST['hours']) && is_numeric($_POST['hours'])) {
        $hours = intval($_POST['hours']);
        $added = WC()->cart->add_to_cart($product_id, 1, 0, [], ['custom_hours' => $hours]);
        if ($added) {
            wp_send_json_success(['message' => 'Product added with custom hours!']);
        } else {
            wp_send_json_error(['message' => 'Failed to add product to cart.']);
        }
    } else {
        $added = WC()->cart->add_to_cart($product_id);
        if ($added) {
            wp_send_json_success(['message' => 'Product added successfully!']);
        } else {
            wp_send_json_error(['message' => 'Failed to add product to cart.']);
        }
    }
} */

//  Update cart item price based on hours
add_action('woocommerce_before_calculate_totals', 'update_cart_item_price_based_on_hours', 10, 1);
function update_cart_item_price_based_on_hours($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }
    $target_product_id = 1338;
    foreach ($cart->get_cart() as $cart_item) {
        if ($cart_item['product_id'] == $target_product_id && isset($cart_item['custom_hours'])) {
            $hours = intval($cart_item['custom_hours']);
            $original_price = floatval($cart_item['data']->get_regular_price());
            $new_price = $original_price * $hours;
            $cart_item['data']->set_price($new_price);
        }
    }
}

// Redirect to custom page after checkout
function custom_redirect_after_checkout($order_id) {
    $redirect_url = 'http://verbit.local/verify/';
    if (strpos($_SERVER['HTTP_HOST'], 'verbit.local') !== false) {
        $redirect_url = 'http://verbit.local/verify/';
    } else {
        $redirect_url = 'https://staging-e3be-verbitai.wpcomstaging.com/verify/';
    }
    wp_redirect($redirect_url);
    exit;
}
add_action('woocommerce_thankyou', 'custom_redirect_after_checkout');

// Display email address in the order details
function show_user_email_address() {
    ob_start();
    ?>

    <div>
        <h2>Email Address</h2>
        <p><?php echo wp_get_current_user()->user_email; ?></p>
    </div>
    
    <?php
    return ob_get_clean();

}
add_shortcode('woocommerce_account_content', 'show_user_email_address');