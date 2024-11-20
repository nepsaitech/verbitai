<?php
/**
 * Custom ACF fields.
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Global Sections',
        'menu_title' => 'Global Sections',
        'menu_slug'  => 'theme-global-setting',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}