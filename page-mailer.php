<?php
/*
Template Name: Mailer
Template Post Type: page
*/

get_header();

/* get_template_part( 'src/blocks/layouts/pages/mailer/site-head' ); */

get_template_part( 'src/blocks/layouts/pages/mailer/banner' ); 

/* 

if ( have_rows( 'mailer_blocks' ) ) {
    while ( have_rows( 'mailer_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/mailer/banner.php';
        
        include $dir . get_row_layout() . '.php';
    }
} */

/* get_template_part( 'src/blocks/layouts/pages/mailer/footer' ); */