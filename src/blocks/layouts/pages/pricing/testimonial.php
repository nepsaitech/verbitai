<div class="testimonial">
    <div class="">
        <?php
        $args = array(
            'post_type'      => 'testimonial',
            'posts_per_page' => -1,
            'post_status'    => 'publish'
        );

        $testimonial_posts = new WP_Query($args);

        if ($testimonial_posts->have_posts()) : ?>

            <div class="testimonial-slider min-h-[570px] max-w-[1438px] mx-auto max-md:pb-0 max-md:min-h-[423px]">

                <?php while ($testimonial_posts->have_posts()) :
                    $testimonial_posts->the_post(); ?>

                    <div class="relative max-w-[353px] mx-[24.5px] max-md:max-w-[265px] max-lg:mx-0">
                        <div class="flex flex-col rounded-[40px] justify-center content max-xl:mx-2.5 max-md:pt-6 max-md:pb-[14px] max-md:rounded-[30px]">
                            <div class="text-xl leading-[27px] font-normal mb-[5rem] max-md:text-[15px] max-md:leading-[22px] max-md:mb-[35px]">
                                <?php the_content(); ?>
                            </div>
                            <div class="flex items-center space-x-3 slider-author">
                                <figure class="relative rounded-full overflow-hidden w-[53px] h-[52px] max-md:w-[39px] max-md:h-[39px]">
                                    <?php the_post_thumbnail(); ?>
                                </figure>
                                <div class="space-y-1 max-md:space-y-0">
                                    <h3 class="font-bold leading-[21px] max-md:text-xs"><?php the_title(); ?></h3>
                                    <span class="text-sm leading-[19px] max-md:text-[10px] max-md:leading-[13px]"><?php the_field('testimonial_university'); ?></span>
                                </div>
                            </div>
                            <div class="absolute right-[30px] top-[30px] w-[104px] h-[69px] max-md:w-[78px] max-md:h-[51px] max-md:right-[23px] max-md:top-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full object-cover" viewBox="0 0 104 69" fill="none">
                                <g style="mix-blend-mode:soft-light">
                                    <mask id="path-1-inside-1_1108_7117" fill="white">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M72.2066 0H64.8477C59.3248 0 54.8477 4.47715 54.8477 10V31.8205C54.8477 36.6141 58.7336 40.5 63.5271 40.5C68.3207 40.5 72.2066 44.3859 72.2066 49.1795V59.5C72.2066 65.0229 76.7956 69.6571 82.0425 67.9333C94.6162 63.8026 103.695 51.9674 103.695 38.0117V10C103.695 4.47715 99.2178 0 93.695 0H90.7766H72.2066Z"/>
                                    </mask>
                                    <path d="M64.8477 1H72.2066V-1H64.8477V1ZM55.8477 31.8205V10H53.8477V31.8205H55.8477ZM73.2066 59.5V49.1795H71.2066V59.5H73.2066ZM102.695 38.0117C102.695 51.5226 93.9058 62.9834 81.7304 66.9833L82.3546 68.8834C95.3265 64.6218 104.695 52.4121 104.695 38.0117H102.695ZM102.695 10V38.0117H104.695V10H102.695ZM90.7766 1H93.695V-1H90.7766V1ZM72.2066 1H90.7766V-1H72.2066V1ZM104.695 10C104.695 3.92487 99.7701 -1 93.695 -1V1C98.6655 1 102.695 5.02944 102.695 10H104.695ZM71.2066 59.5C71.2066 62.5303 72.4635 65.3434 74.4856 67.1753C76.5264 69.0241 79.3543 69.8691 82.3546 68.8834L81.7304 66.9833C79.4838 67.7214 77.3937 67.1111 75.8284 65.693C74.2443 64.258 73.2066 61.9925 73.2066 59.5H71.2066ZM63.5271 41.5C67.7684 41.5 71.2066 44.9382 71.2066 49.1795H73.2066C73.2066 43.8336 68.873 39.5 63.5271 39.5V41.5ZM53.8477 31.8205C53.8477 37.1664 58.1813 41.5 63.5271 41.5V39.5C59.2859 39.5 55.8477 36.0618 55.8477 31.8205H53.8477ZM64.8477 -1C58.7725 -1 53.8477 3.92487 53.8477 10H55.8477C55.8477 5.02944 59.8771 1 64.8477 1V-1Z" fill="white" mask="url(#path-1-inside-1_1108_7117)"/>
                                    <mask id="path-3-inside-2_1108_7117" fill="white">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3589 0H10C4.47715 0 0 4.47715 0 10V31.8205C0 36.6141 3.88593 40.5 8.67947 40.5C13.473 40.5 17.3589 44.3859 17.3589 49.1795V59.5C17.3589 65.0229 21.9479 69.6571 27.1949 67.9333C39.7685 63.8026 48.8473 51.9673 48.8473 38.0117V10C48.8473 4.47715 44.3701 0 38.8473 0H35.929H17.3589Z"/>
                                    </mask>
                                    <path d="M27.1949 67.9333L27.507 68.8834L27.1949 67.9333ZM10 1H17.3589V-1H10V1ZM1 31.8205V10H-1V31.8205H1ZM18.3589 59.5V49.1795H16.3589V59.5H18.3589ZM47.8473 38.0117C47.8473 51.5226 39.0581 62.9834 26.8828 66.9833L27.507 68.8834C40.4788 64.6218 49.8473 52.4121 49.8473 38.0117H47.8473ZM47.8473 10V38.0117H49.8473V10H47.8473ZM35.929 1H38.8473V-1H35.929V1ZM17.3589 1H35.929V-1H17.3589V1ZM49.8473 10C49.8473 3.92487 44.9224 -1 38.8473 -1V1C43.8178 1 47.8473 5.02944 47.8473 10H49.8473ZM16.3589 59.5C16.3589 62.5303 17.6158 65.3434 19.6379 67.1753C21.6787 69.0241 24.5067 69.8691 27.507 68.8834L26.8828 66.9833C24.6361 67.7214 22.5461 67.1111 20.9807 65.693C19.3966 64.258 18.3589 61.9925 18.3589 59.5H16.3589ZM8.67947 41.5C12.9207 41.5 16.3589 44.9382 16.3589 49.1795H18.3589C18.3589 43.8336 14.0253 39.5 8.67947 39.5V41.5ZM-1 31.8205C-1 37.1664 3.33365 41.5 8.67947 41.5V39.5C4.43822 39.5 1 36.0618 1 31.8205H-1ZM10 -1C3.92487 -1 -1 3.92487 -1 10H1C1 5.02944 5.02944 1 10 1V-1Z" fill="white" mask="url(#path-3-inside-2_1108_7117)"/>
                                </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>