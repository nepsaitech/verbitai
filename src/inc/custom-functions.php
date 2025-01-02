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


// Get currency symbol
if (!function_exists('currency_symbol')) {
    function currency_symbol($currency) {
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $currency_symbol = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
        return $currency_symbol;
    }
}

// Add hubspot form shortcode
function hubspot_form_shortcode() {
    ob_start();
    ?>
    <div class="hubspot-form">
        <div class="max-w-[1920px] mx-auto">
            <div class="py-40 px-5">
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                <script>
                hbspt.forms.create({
                    portalId: "4023006",
                    formId: "b6e9b2fe-5518-4339-999d-0ce877f07e51"
                });
                </script>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hubspot_form', 'hubspot_form_shortcode');
