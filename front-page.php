<?php

get_header();

get_template_part( 'src/blocks/layouts/site-head' );

if ( have_rows( 'blocks' ) ) {
    while ( have_rows( 'blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/home/';

        // Global section
        if ('trusted' === get_row_layout() || 'testimonial' === get_row_layout() || 'faq' === get_row_layout() || 'simplify-cta' === get_row_layout()) {
            $dir = 'src/blocks/layouts/';
        }

        include $dir . get_row_layout() . '.php';
    }
}

get_footer();