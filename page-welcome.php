<?php
/*
Template Name: Welcome
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/pages/checkout/site-head' );

get_template_part( 'src/blocks/layouts/pages/welcome/banner' );
get_template_part( 'src/blocks/layouts/pages/welcome/account-ready' );

get_template_part( 'src/blocks/layouts/pages/plan/footer' );