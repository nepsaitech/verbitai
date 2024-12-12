<section class="banner">
    <div class="bg-primary pt-[177px] p-8 min-h-[764px] max-md:min-h-0 max-[550px]:bg-transparent max-[550px]:p-0">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between gap-4 max-[550px]:gap-0 max-[1000px]:flex-col">
                <div class="w-full max-w-[552px] max-[550px]:pt-[143px] max-[550px]:max-w-full max-[550px]:bg-primary max-[550px]:px-[26px] max-[1000px]:text-center max-[1000px]:mx-auto max-[1000px]:pb-[55px]">
                    <div class="pt-[51px] text-base text-white max-[1000px]:pt-0">
                        <h2 class="text-sm leading-[22px] uppercase tracking-[0.3em] mb-4"><?php the_title(); ?></h2>

                        <?php 
                        if ( have_rows( 'vertical_banner_left_side' ) ) :
                            while ( have_rows( 'vertical_banner_left_side' ) ) : the_row();

                            $slogan = get_sub_field( 'slogan' );
                            $description = get_sub_field( 'description' );
                            $free_text = get_sub_field( 'free_text' );
                            ?>

                                <h1 class="text-[53px] font-[900] leading-[58px] mb-6 mx-auto max-sm:text-[38px] max-sm:leading-[41px]">
                                <?php echo esc_html( $slogan ); ?></h1>
                                <div class="font-primary text-lg leading-[27px] mb-[38px] -tracking-[0.01em] mx-auto max-sm:mb-[27px] max-sm:text-base max-sm:leading-[23px]">
                                    <p><?php echo esc_html( $description ); ?></p>
                                </div>
                                <div class="flex gap-[15px] text-center items-center mt-[38px] max-sm:mt-[27px] max-[1000px]:flex-col">

                                    <?php
                                        $start_free_btn = get_field('start_free_btn', 'option');

                                        if ( $start_free_btn ) :

                                            $start_free_btn_url = $start_free_btn[ 'url' ];
                                            $start_free_btn_title = $start_free_btn[ 'title' ];
                                            $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                                            ?>
                                    <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="w-full bg-secondary !text-[#031C34] tracking-[0.07em] text-lg uppercase py-5 px-10 rounded-[100px] font-bold max-w-[246px] [box-shadow:0px_24px_34px_0px_rgba(0,_0,_0,_0.10)] js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                                    <?php endif; ?>

                                    <p class="text-[13px] text-white"><?php echo esc_html( $free_text ); ?></p>
                                </div>

                            <?php 
                            endwhile; 
                        endif; ?>

                    </div>
                </div>
                <div class="w-full max-w-[557px] max-[1000px]:mx-auto">
                    <div class="relative rounded-[20px] max-lg:rounded-0">

                        <?php
                        if ( have_rows( 'vertical_banner_right_side' ) ) :
                            while ( have_rows( 'vertical_banner_right_side' ) ) : the_row();
                                ?>

                                <div>
                                    <div class="relative z-10 max-[550px]:pt-0 max-[550px]:overflow-hidden">

                                        <?php 

                                        if ( have_rows( 'images' ) ) :
                                            while ( have_rows( 'images' ) ) : the_row();

                                                $desktop = get_sub_field( 'desktop' );
                                                $mobile = get_sub_field( 'mobile' );

                                                if ( $mobile ) :

                                                    $mobile_url = $mobile[ 'url' ];
                                                    $mobile_alt = $mobile[ 'alt' ];
                                                    ?>

                                                    <img src="<?php echo esc_url($mobile_url); ?>" class="hidden max-[550px]:block w-[100%] max-w-[500%]" alt="<?php echo esc_attr($mobile_alt); ?>">
                                                
                                                <?php
                                                endif;

                                                if ( $desktop ) :

                                                    $desktop_url = $desktop[ 'url' ];
                                                    $desktop_alt = $desktop[ 'alt' ];
                                                    ?>

                                                    <img src="<?php echo esc_url($desktop_url); ?>" class="max-lg:w-full max-lg:h-full max-[550px]:hidden" alt="<?php echo esc_attr($desktop_alt); ?>">

                                                <?php
                                                endif;
                                            endwhile;
                                        endif; 
                                        
                                        $bg_color = 'bg-[#5148F94D]';
                                        $text_color = 'text-white';

                                        if (is_single(20)) {

                                            $bg_color = 'bg-[#FFFFFF1A]';
                                            
                                        } elseif (is_single(24)) {

                                            $text_color = 'text-primary';
                                        }
                                        
                                        if ( have_rows( 'testimony' ) ) :
                                            while ( have_rows( 'testimony' ) ) : the_row();
                                                if (is_single(21)) :

                                                    $subtitle_image = get_sub_field( 'subtitle_image' );
                                                
                                                    if ( $subtitle_image ) :

                                                        $subtitle_alt = $subtitle_image[ 'alt' ];
                                                        $subtitle_url = $subtitle_image[ 'url' ];
                                                        ?>
        
                                                            <img src="<?php echo esc_url($subtitle_url); ?>" class="absolute -right-[103px] top-[72px] max-md:hidden max-xl:right-0 max-[1360px]:-right-[2%]" alt="<?php echo esc_attr($subtitle_alt); ?>">
        
                                                        <?php 
                                                    endif;
                                                endif;

                                                $message = get_sub_field( 'message' );
                                                $profile = get_sub_field( 'profile' );

                                                $position = '-top-[4%]';
                                                $quote_style = 'mx-auto mb-[2px] opacity-30';

                                                if (is_single(24)) {
                                                    $position = 'top-auto bottom-[5%]';
                                                }

                                                if (is_single(22)) {
                                                    $quote_style = 'm-0 mb-[2px] opacity-[0.5] float-right';
                                                }

                                                if (!is_single(21)) : 
                                                ?>

                                                    <div class="absolute -right-[9%] <?php echo $position; ?> <?php echo $bg_color; ?> backdrop-filter backdrop-blur-[28px] [box-shadow:0px_25.35px_27.85px_0px_#00000026] text-white text-center py-[14px] px-[25px] rounded-[20px] rounded-es-none max-w-[241px] max-[1030px]:right-0 max-[550px]:hidden max-[1360px]:-right-[2%]">
                                                        <img src="<?php echo get_template_directory_uri()."/src/assets/img/smart-video-quote.png"?>" class="w-[104px] h-[68px] <?php echo $quote_style; ?>" alt="subtitle">
                                                        <h2 class="font-extrabold text-[22px] leading-[25px] mb-[10px]"><?php echo $message; ?></h2>
                                                        <span class="text-sm leading-[19px] block mx-auto"><?php echo $profile; ?></span>
                                                    </div>

                                                <?php 
                                                endif;
                                            endwhile;
                                        endif; ?>

                                    </div>
                                </div>

                                <?php
                                get_template_part( 'src/blocks/layouts/pages/vertical/trust-factors' ); 

                            endwhile;
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>