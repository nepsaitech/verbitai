<section class="trusted">
    <div class="max-w-screen-xl mx-auto">
        <div class="px-5 text-base text-[#444444] text-center max-md:px-3 max-[880px]:p-[29px] max-[880px]:pt-[45px] ">
            <h2 class="text-sm leading-[19px] font-extrabold mb-[16px] max-[880px]:mb-[14px]"><?php the_sub_field('heading'); ?></h2>
            <ul class="flex flex-wrap items-center gap-[58px] max-[880px]:justify-center max-[880px]:mb-[28px] max-[880px]:gap-x-[44px] max-[880px]:gap-y-[11px]">
                <?php
                if( have_rows('logo') ):
                    while( have_rows('logo') ) : the_row();
                    
                        $image = get_sub_field('image'); ?>
                        
                        <?php if( $image ): 
                            $url = $image['url'];
                            $alt = $image['alt'];
                        ?>
                            <li>
                                <div class="relative flex justify-center max-w-[111px] max-[880px]:max-w-[84px]">
                                    <img src="<?php echo esc_attr($url); ?>" class="w-full object-cover" alt="<?php echo esc_attr($alt); ?>">
                                </div>
                            </li>

                        <?php
                        endif;
                    endwhile;
                endif;
                ?>
            </ul>
            <div class="flex items-end justify-end max-[880px]:justify-center">
                <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/iso-gray-logo.png" alt="iso">
            </div>
        </div>
    </div>
</section>