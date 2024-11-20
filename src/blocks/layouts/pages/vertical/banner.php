<section class="banner">
    <div class="bg-primary p-8 min-h-[780px] max-sm:pb-[55px] max-md:min-h-0 max-sm:px-6">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center">
                <div class="w-full max-w-[552px]">
                    <div class="pt-[139px] text-base text-white text-center">
                        <h2 class="text-sm leading-[22px] uppercase tracking-[0.3em] mb-4"><?php the_title(); ?></h2>
                        <h1 class="text-[53px] font-[900] leading-[58px] mb-[36px] mx-auto max-sm:text-[38px] max-sm:leading-[41px]">
                        <?php the_sub_field('slogan'); ?></h1>
                        <div class="font-primary text-lg mb-[38px] -tracking-[0.01em] mx-auto max-sm:mb-[27px] max-sm:text-base max-sm:leading-[23px]">
                            <p><?php the_sub_field('description'); ?></p>
                        </div>
                        <div class="flex flex-col gap-[15px] justify-center text-center items-center mt-[38px] max-sm:mt-[27px]">

                            <?php
                                $start_free_btn = get_field('start_free_btn', 'option');

                                if ( $start_free_btn ) :

                                    $start_free_btn_url = $start_free_btn[ 'url' ];
                                    $start_free_btn_title = $start_free_btn[ 'title' ];
                                    $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                                    ?>
                            <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="w-full bg-secondary !text-[#031C34] text-lg uppercase py-5 px-10 rounded-[100px] font-bold tracking-[1px] max-w-[246px] [box-shadow:0px_24px_34px_0px_rgba(0,_0,_0,_0.10)] mx-auto js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                            <?php endif; ?>

                            <p class="text-[13px] text-white">Free trial available</p>
                        </div> 
                    </div>
                </div>
                <div class="w-full max-w-[557px]">
                    <div class="relative rounded-[20px] max-lg:rounded-0">

                        <?php 
                        $thumbnail = get_sub_field('thumbnail');
                        $subtitle = get_sub_field('subtitle');

                        if( $thumbnail ): 
                            $thumbnail_url = $thumbnail['url'];
                            $thumbnail_alt = $thumbnail['alt'];

                            if ($subtitle) {
                                $subtitle_url = $subtitle['url'];
                                $subtitle_alt = $subtitle['alt'];
                            }
                        ?>
                            <figure>
                                <div class="relative z-10 max-md:pt-[60%] max-md:overflow-hidden">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" class="max-lg:w-full max-lg:h-full max-md:absolute max-md:top-2/4 max-md:left-2/4 max-md:-translate-x-2/4 max-md:-translate-y-2/4 max-md:w-[104%] max-md:max-w-[500%]" alt="<?php echo esc_attr($thumbnail_alt); ?>">
                                    
                                    <!-- Education Interactive Subtitle -->
                                    <?php if (is_single(21)) : ?>

                                        <img src="<?php echo esc_url($subtitle_url); ?>" class="absolute -right-[103px] top-[72px] max-md:hidden max-xl:right-0" alt="<?php echo esc_attr($subtitle_alt); ?>">

                                    <?php endif; ?>
                                    
                                    <?php
                                        $bg_color = 'bg-[#5148F94D]';
                                        $text_color = 'text-white';

                                        if (is_single(20)) {
                                            $bg_color = 'bg-[#FFFFFF1A]';
                                        } elseif (is_single(24)) {
                                            $text_color = 'text-primary';
                                        }
                                    ?>
                                    
                                    <!-- Smart Video Interactive Subtitle -->
                                    <?php if (!is_single(21)) : ?>
                                        
                                        <div class="absolute -right-[5%] -top-[14%] <?php echo $bg_color; ?>  backdrop-filter backdrop-blur-[28.350000381469727px] [box-shadow:0px_25.35px_27.85px_0px_#00000026] text-white text-center py-[14px] px-[25px] rounded-[20px] rounded-es-none max-w-[241px] max-[1030px]:right-0 max-md:hidden">
                                            <img src="<?php echo get_template_directory_uri()."/src/assets/img/smart-video-quote.png"?>" class="w-[104px] h-[68px] mx-auto mb-[2px] opacity-30" alt="subtitle">
                                            <h2 class="font-extrabold text-[22px] leading-[25px] mb-[10px]">Now I can focus on the things that really matter</h2>
                                            <span class="text-sm leading-[19px] block mx-auto">David Bertallo,<br> Student NYC, NY</span>
                                        </div>

                                    <?php endif; ?>

                                </div>
                            </figure>
                        <?php endif; ?>
                        </div>
                        <div class="flex justify-around space-x-7 items-center mt-[37px] max-md:mt-[67px] max-md:space-x-0 max-md:gap-10 max-md:justify-center">
                        <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">
                            <img src="<?php echo get_template_directory_uri()."/src/assets/img/ai-transcription-logo.png"?>" class="max-md:order-1 max-md:mb-[9px]" alt="star rating">
                            <span class="uppercase text-xs font-[500] leading-[32px] max-md:order-3">ai transcription</span>
                            <img src="<?php echo get_template_directory_uri()."/src/assets/img/star-rating.png"?>" class="max-md:order-2 max-md:mb-[2px]" alt="star rating">
                        </div>
                        <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">
                            <img src="<?php echo get_template_directory_uri()."/src/assets/img/clock-rewind.png"?>" alt="star rating">
                            <span class="uppercase text-xs font-normal leading-[32px] max-md:leading-[26px]"><span class="text-primary font-bold max-md:block">3.9M+ Hours</span>  Transcribed Yearly</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>