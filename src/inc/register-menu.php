<?php
/**
 * Register custom menus.
 */
function register_custom_menus() {
    register_nav_menus(array(
        'profile-menu'        => __('Profile Menu'),
        'vertical-menu'       => __('Vertical Menu'),
        'industries-menu'     => __('Industries menu'),
        'solutions-menu'      => __('Solutions menu'),
        'resources-menu'      => __('Resources menu'),
        'checkout-menu'      => __('Checkout menu'),
        'more-on-verbit-menu' => __('More on Verbit menu'),
        'mobile-footer-menu'  => __('Mobile footer menu'),
    ));
}
add_action('init', 'register_custom_menus');