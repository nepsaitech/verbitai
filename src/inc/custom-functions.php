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

// Register custom REST API endpoint for questions
add_action('rest_api_init', function () {
    register_rest_route('questions/v1', '/user-answers', [
        'methods' => 'GET',
        'callback' => 'get_user_answers',
        'permission_callback' => '__return_true',
    ]);
});


/* function get_profile_menu() {
    $menu_items = wp_get_nav_menu_items('profile-menu');
    return rest_ensure_response($menu_items);
}
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/profile-menu', array(
        'methods' => 'GET',
        'callback' => 'get_profile_menu',
    ));
});
 */

/* add_action('rest_api_init', function () {
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
} */


// Register a custom REST API endpoint
/* add_action('rest_api_init', function () {
    register_rest_route('questions/v1', '/submit-answer', [
        'methods' => 'POST',
        'callback' => 'handle_question_submission',
        'permission_callback' => '__return_true', // For public access; use authentication if needed
    ]);
}); */

/* function handle_question_submission($request) {
    $params = $request->get_json_params();

    // Validate the incoming data
    $customer_token = sanitize_text_field($params['customer_token']);
    $answers = $params['answers'];

    if (!$customer_token || !is_array($answers)) {
        return new WP_Error('invalid_data', 'Invalid data format.', ['status' => 400]);
    }

    // Optionally, check if the customer_token is valid
    $user_id = get_user_by('meta_value', $customer_token)->ID ?? null;
    if (!$user_id) {
        return new WP_Error('invalid_token', 'Invalid customer token.', ['status' => 400]);
    }

    // Store answers in user meta (or another method)
    foreach ($answers as $question_id => $answer_data) {
        // Save each answer under user meta (or in a custom table)
        update_user_meta($user_id, 'quiz_answer_' . $question_id, $answer_data['answer_id']);
    }

    return rest_ensure_response([
        'message' => 'Answer submitted successfully.',
        'data' => $answers
    ]);
} */



// Callback function for returning dummy data
/* function get_user_answers() {
    // Dummy JSON data
    $dummy_data = [
        'status' => 'success',
        'message' => 'Here is some dummy data',
        'data' => [
            'user_id' => 123,
            'questions' => [
                [
                    'question_id' => 1,
                    'question_text' => 'What is your favorite color?',
                    'answers' => ['Red', 'Green', 'Blue', 'Yellow']
                ],
                [
                    'question_id' => 2,
                    'question_text' => 'What is your favorite animal?',
                    'answers' => ['Cat', 'Dog', 'Bird', 'Fish']
                ]
            ],
            'selected_answers' => [
                'question_1' => 'Blue',
                'question_2' => 'Dog'
            ]
        ]
    ];

    // Return the dummy data as a response
    return new WP_REST_Response($dummy_data, 200);
}
 */
