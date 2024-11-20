<?php
$args = array(
    'post_type'      => 'audience',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);

$audience_posts = new WP_Query($args);
?>

<section class="who-uses">
    <div class="max-w-[1060px] mx-auto max-md:px-0 max-xl:px-[17px]">
        <div class="rounded-[40px] bg-primary flex justify-between py-[24px] pl-[67px] pr-[97px] min-h-[726px] max-sm:bg-transparent max-sm:relative max-sm:py-0 max-sm:z-20 max-sm:gap-y-[18px] max-md:px-0 max-md:py-[37px] max-md:min-h-0 max-[990px]:flex-col max-[990px]:justify-center max-[990px]:items-center max-[990px]:px-[12px] max-[990px]:pb-[50px] max-[990px]:gap-y-[30px]">
            <div class="text-white pt-[142px] flex-[1_0_auto] max-w-[411px] w-full z-20 max-sm:pb-[37px] max-sm:px-8 max-[990px]:text-center max-[990px]:pt-0 max-[990px]:order-2 max-[990px]:max-w-full">
                <h2 class="font-extrabold text-[52px] leading-[54px] mb-[9px] max-w-[264px] max-md:text-[32px] max-md:leading-[44px] max-md:mb-[3px] max-[990px]:max-w-full"><?php the_sub_field('heading'); ?></h2>
                <div class="leading-[25px] mb-[22px] max-w-[315px] max-[990px]:max-w-full">
                    <p><?php the_sub_field('description'); ?></p>
                </div>

                <ul class="flex flex-wrap gap-[10px] text-sm leading-[19px] max-[990px]:gap-[10px] max-[990px]:justify-center">
                    <li class="max-md:order-5">
                        <a href="javascript:;" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Producers & Creators</a>
                    </li>
                    <li class="max-md:order-2">
                        <a href="<?php echo home_url() . '/vertical/education/?personas=academic-researchers'; ?>" target="_blank" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Academic Research</a>
                    </li>
                    <li class="max-md:order-1">
                        <a href="<?php echo home_url() . '/vertical/corporate/?personas=marketing-managers'; ?>" target="_blank" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Market Research</a>
                    </li>
                    <li class="max-md:order-3">
                        <a href="<?php echo home_url() . '/vertical/corporate/?personas=event-producers'; ?>" target="_blank" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Event Producer</a>
                    </li>
                    <li class="max-md:order-4">
                        <a href="javascript:;" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Lawyers</a>
                    </li>
                    <li class="max-md:order-6">
                        <a href="<?php echo home_url() . '/vertical/corporate/'; ?>" target="_blank" class="!text-white border border-solid border-[#FFFFFFB2] rounded-[50px] px-[17.6px] py-[9.2px] max-sm:py-[9px] max-sm:px-[17.2px] max-md:border-white">Corporate</a>
                    </li>
                </ul>

            </div>
            <div class="text-white flex-[1_0_auto] max-w-[455px] w-full z-20 max-sm:-mt-[42px] max-sm:max-w-full max-sm:overflow-hidden max-[990px]:order-1 ">
                <?php
                if ($audience_posts->have_posts()) : ?>

                    <div class="flex flex-wrap justify-between max-md:hidden">

                        <?php while ($audience_posts->have_posts()) :
                            $audience_posts->the_post(); ?>

                            <div data-video="audience" class="relative flex flex-[1_0_auto] flex-wrap items-end max-w-[217px] w-full h-[283px] rounded-[20px] overflow-hidden  max-md:min-h-0 max-md:block max-md:overflow-visible audience-video">
                                <figure>
                                    <div class="relative z-10 top-[.5rem] min-h-[283px]"><?php the_post_thumbnail(); ?></div>
                                </figure>
                                <video class="relative z-10 h-[237px] w-full object-cover rounded-[20px]" controls>
                                    <source src="<?php echo get_template_directory_uri()."/src/assets/video/video.mp4"?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                        <?php
                        endwhile;
                        wp_reset_postdata(); ?>

                    </div>

                <?php endif; ?>

                <?php
                if ($audience_posts->have_posts()) : ?>

                    <div class="flex-wrap justify-between hidden max-md:flex max-sm:relative max-sm:left-[43px]" data-slider="audience">

                        <?php while ($audience_posts->have_posts()) :
                            $audience_posts->the_post(); ?>

                            <div data-video="audience" class="relative !flex flex-[1_0_auto] flex-wrap items-end max-w-[217px] w-full h-[283px] rounded-[20px] mx-2.5 overflow-hidden max-md:min-h-0 max-md:block max-md:overflow-visible audience-video">
                                <figure>
                                    <div class="relative z-10 top-[.5rem] min-h-[283px]"><?php the_post_thumbnail(); ?></div>
                                </figure>
                                <video class="relative z-10 h-[237px] w-full object-cover rounded-[20px]" controls>
                                    <source src="<?php echo get_template_directory_uri()."/src/assets/video/video.mp4"?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                        <?php
                        endwhile;
                        wp_reset_postdata(); ?>

                    </div>

                <?php endif; ?>

            </div>
            <div class="hidden absolute rounded-[40px] inset-x-0 mx-auto bg-primary max-w-[96%] w-full h-full max-sm:z-10 max-[500px]:max-w-[91%] max-sm:block"></div>
        </div> 
    </div>
</section>