<?php
/*
Template Name: Upload State
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/pages/upload/site-head' );

if ( have_rows( 'upload_blocks' ) ) {
    while ( have_rows( 'upload_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/upload/';

        // Global section
        if ('trusted' === get_row_layout() || 'iso' === get_row_layout()) {
            $dir = 'src/blocks/layouts/';
        }
        
        include $dir . get_row_layout() . '.php';
    }
}

get_template_part( 'src/blocks/layouts/pages/upload/footer' );