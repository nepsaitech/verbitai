<?php
/*
Template Name: Test Page
Template Post Type: page
*/

get_header(); ?>

<div class="h-screen flex justify-center items-center">
    <h2 class="text-3xl font-bold"><?php echo esc_html(get_the_title()); ?></h2>
</div>