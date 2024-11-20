<?php
/*
Template Name: Funnel Upload
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'funnel_upload_blocks' ) ) {
    while ( have_rows( 'funnel_upload_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/funnel/';
        
        include $dir . get_row_layout() . '.php';
    }
}

get_template_part( 'src/blocks/layouts/pages/upload/footer' );