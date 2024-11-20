<?php
/* function fetch_questions_data() {
    $host = defined('API_HOST') ? API_HOST : '';
    $endpoint = $host . '/api/v1/questions';

    $response = wp_remote_get($endpoint);
    if (is_wp_error($response)) {
        return new WP_Error('request_failed', 'Failed to fetch questions', ['status' => 500]);
    }
    $data = wp_remote_retrieve_body($response);
    return rest_ensure_response(json_decode($data));
}
 */