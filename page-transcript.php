<?php
/*
Template Name: Transcript
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'transcript_blocks' ) ) {
    while ( have_rows( 'transcript_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/transcript/';

        // Modals
        if ('purchase' === get_row_layout() || 'export' === get_row_layout() || 'translate' === get_row_layout() || 'edit' === get_row_layout() || 'tags' === get_row_layout() ) {
            $dir = 'src/blocks/components/modals/transcript/';
        }
        
        include $dir . get_row_layout() . '.php';
    }
}

get_footer();