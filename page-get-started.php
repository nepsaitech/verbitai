<?php
/*
Template Name: Get Started for Free
Template Post Type: page
*/

get_header();

get_template_part( 'src/blocks/layouts/pages/transcript/site-head' ); ?>

<section class="get-started">
    <div class="py-20 px-8">
        <div class="max-w-screen-xl mx-auto">
            <h1 class="text-center font-extrabold mb-[70px] mx-auto text-[40px] leading-[44px]">Get Started for Free</h1>
            <div class="flex gap-10 items-center justify-center mb-[3rem] max-lg:gap-5 max-md:flex-col max-md:gap-16 max-md:mb-[4rem]">
                <div class="flex flex-col justify-between grow-0 shrink-0 max-w-[394px] w-full min-h-[410px] p-5 text-sm text-[#041D34] text-center bg-white [box-shadow:0px_34.58px_18.86px_0px_#0000000F] rounded-[40px] max-md:w-full max-md:min-h-0">
                    <div class="max-md:flex max-md:flex-row max-md:items-center max-md:gap-4">
                        <div class="bg-[#008A7E] w-[60px] flex justify-center items-center h-[60px] mx-auto mb-5 rounded-full max-md:mb-0 max-md:mx-0">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/lamp.png" alt="icon">
                        </div>
                        <h2 class="text-[22px] mb-2 font-bold">Free</h2>
                    </div>
                    <div class="mx-auto text-[#041D34] text-sm my-5 max-w-[161px] max-md:mb-12">
                        <p>Get your first <strong>30 minutes</strong> transcribed on us</p>
                    </div>
                    <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="bg-[#008A7E] !text-white text-center text-lg py-3 px-7 rounded-[100px] font-bold w-full max-md:py-4">Get started</a>
                </div>
                <div class="flex flex-col justify-between grow-0 shrink-0 max-w-[394px] w-full min-h-[468px] p-5 text-sm text-[#041D34] text-center bg-white [box-shadow:0px_7px_8px_0px_#0000000F] rounded-[40px] max-md:w-full max-md:min-h-0">
                     <div class="max-md:flex max-md:flex-row max-md:items-center max-md:gap-4">    
                        <div class="bg-primary w-[60px] flex justify-center items-center h-[60px] mx-auto mb-5 rounded-full max-md:mb-0 max-md:mx-0">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/briefcase.png" alt="icon">
                        </div>
                        <h2 class="text-[22px] mb-2 font-bold">Business</h2>
                    </div>
                    <div class="mx-auto text-[#041D34] text-sm my-5 max-md:mb-12">
                        <ul class="flex flex-col gap-3 p-0 text-left business-plan">
                            <li class="relative pl-6">Unified platform for transcription, captioning & translation</li>
                            <li class="relative pl-6">Unlimited live sessions</li>
                            <li class="relative pl-6">20hrs of pre-recorded files</li>
                            <li class="relative pl-6">Unlimited users for unlimited collaboration users</li>
                            <li class="relative pl-6">Advanced editing capabilities</li>
                            <li class="relative pl-6">20+ integrations</li>
                        </ul>
                    </div>
                    <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="bg-transparent !text-primary border-2 border-solid border-primary text-center text-lg py-3 px-7 rounded-[100px] font-bold w-full max-md:py-4">Start 7-day free trial</a> 
                </div>
            </div>
            <div class="flex justify-end items-center mb-[3rem] gap-4 max-md:flex-col max-md:gap-12">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/iso.png" alt="iso">
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
/* if ( have_rows( 'plan_blocks' ) ) {
    while ( have_rows( 'plan_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/plan/';

        // Global section
        if ('trusted' === get_row_layout() || 'testimonial' === get_row_layout() || 'faq' === get_row_layout() || 'simplify-cta' === get_row_layout()) {
            $dir = 'src/blocks/layouts/';
        }

        if ('banner' === get_row_layout() || 'smart-video' === get_row_layout() || 'what-you-get' === get_row_layout() || 'static-featured-section' === get_row_layout()) {
            $dir = 'src/blocks/layouts/pages/plan/';
        }
        
        include $dir . get_row_layout() . '.php';
    }
} */

get_footer();