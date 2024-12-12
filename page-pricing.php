<?php
/*
Template Name: Free Plan Pricing
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'pricing_blocks' ) ) {
    while ( have_rows( 'pricing_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/pricing/';

        include $dir . get_row_layout() . '.php';
    }
}

get_footer();