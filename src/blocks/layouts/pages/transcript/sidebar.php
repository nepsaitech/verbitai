<?php
if ( have_rows( 'sidebar' ) ):
    while ( have_rows( 'sidebar' ) ) : the_row(); 
    ?>

        <sidebar class="flex-[1_0_auto] max-w-[362px] w-full max-[1050px]:hidden">
            <div class="sidebar max-w-[362px] max-[1320px]:max-w-full">
                <div class="relative max-w-[362px] w-full bg-white rounded-[20px] [box-shadow:0px_7.84px_8.96px_0px_#5148F91A] py-[5px] px-[7px] mb-[14px] max-[1050px]:max-w-[362px] max-[1050px]:mb-[28px] max-[1050px]:mx-auto js-video">
                    <div class="hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcripted-video.png" class="w-full h-full object-cover" alt="transcript video">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcripted-frequency.png" class="w-full h-auto object-cover mt-[7px] max-[1050px]:mt-[11px]" alt="transcript frequency">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcripted-timeline.png" class="w-full h-auto object-cover -mt-[26px] max-[1050px]:hidden" alt="transcript timeline">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcripted-play-button.png" class="absolute inset-0 top-[24%] mx-auto" alt="transcript play button">
                        <div class="text-left -mt-[28px] pl-[13px] hidden max-[1050px]:block">
                            <div class="text-center w-fit">
                                <span class="bg-[#EFEFF9] rounded-[3px] border border-primary inline-block w-[13px] h-[32px] mb-1"></span>
                                <p class="text-[8px] leading-[11px] text-black w-fit">00:00:18:250
                                <span class="block">(1.945s)</span></p>
                            </div>
                        </div>
                    </div>
                    <div id="smart-player-video" class="rounded-[14px] overflow-hidden"></div>
                </div>

                <?php 
                if ( have_rows( 'cta' ) ):
                    while ( have_rows( 'cta' ) ) : the_row();
                        
                        $title = get_sub_field( 'title' );
                        $link  = get_sub_field( 'link' );
                        ?>

                        <div class="max-w-[362px] w-full flex justify-center items-center max-md:flex-col bg-primary text-white py-[29.6px] px-[30px] rounded-[20px] gap-[37px] max-md:text-center js-transcript">
                            <h2 class="text-xl leading-[21px] font-bold flex-[0_1_auto]"><?php echo esc_html( $title ); ?></h2>

                            <?php 
                            if ( $link ) :

                                $link_url    = $link[ 'url' ];
                                $link_title  = $link[ 'title' ];
                                $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                                ?>

                                <a href="#" class="flex-[1_0_auto] !text-white text-lg leading-[38px] px-[18px] rounded-[56px] font-bold border-2 border-solid border-white text-center" data-target="purchase"><?php echo esc_html( $link_title ); ?></a>

                            <?php endif; ?>

                        </div>

                     <?php
                    endwhile;
                endif; ?>

            </div>
        </sidebar>

    <?php
    endwhile;
endif; ?>