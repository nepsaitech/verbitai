<?php

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'vertical_blocks' ) ) {
    while ( have_rows( 'vertical_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/home/';

        // Global section
        if ('trusted' === get_row_layout() || 'testimonial' === get_row_layout()) {
            $dir = 'src/blocks/layouts/';
        }

        if ('banner' === get_row_layout() || 'smart-video' === get_row_layout() || 'what-you-get' === get_row_layout() || 'static-featured-section' === get_row_layout() || 'faq' === get_row_layout() ||  'simplify-cta' === get_row_layout() ) {
            $dir = 'src/blocks/layouts/pages/vertical/';
        }
        
        include $dir . get_row_layout() . '.php';
    }
}

get_footer();