<?php
/*
Template Name: Plan
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'plan_blocks' ) ) {
    while ( have_rows( 'plan_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/plan/';
        
        include $dir . get_row_layout() . '.php';
    }
}

get_template_part( 'src/blocks/layouts/pages/plan/footer' );