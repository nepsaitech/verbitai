<?php
if ( have_rows( 'bottom_cta' ) ):
    while ( have_rows( 'bottom_cta' ) ) : the_row(); 

        $display     = get_sub_field( 'display' );
        $title       = get_sub_field( 'title' );
        $description = get_sub_field( 'description' );
        $link        = get_sub_field( 'link' );
        
        
        if ( 'show' == $display ) : ?>

            <div class="bg-gradient-to-t from-[rgba(255,255,255,1)_85%] to-[rgba(255,255,255,0.5)] absolute bottom-[40px] inset-x-0 pt-[40px] px-[40px] max-md:px-0 max-md:bottom-0">
                <div class="flex relative justify-between bg-primary rounded-[20px] text-white pt-[40px] pb-[39px] pl-[56px] pr-[54px] mt-10 mx-auto max-[1250px]:flex-wrap max-[1250px]:px-5 max-[1149px]:py-[55px] max-[1149px]:px-[28px]">
                    <div class="flex-[1_0_auto] max-w-[382px] w-full text-center max-[1149px]:max-w-full max-[1149px]:mb-6">
                        <h2 class="text-[27px] leading-[27px] font-extrabold mb-[15px] max-[1149px]:mb-4 max-[1149px]:text-[22px]"><?php echo esc_html( $title ); ?></h2>
                        <p class="max-w-[282px] w-full mx-auto mb-[15px] text-lg leading-[25px] max-[1149px]:max-w-full max-[1149px]:text-base max-[1149px]:leading-[22px]"><?php echo esc_html( $description ); ?></p>

                        <?php 
                        if ( $link ) :

                            $link_url    = $link[ 'url' ];
                            $link_title  = $link[ 'title' ];
                            $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                            ?>

                            <a href="#" class="inline-block border-2 border-solid border-white !text-white text-center text-lg leading-[38px] py-[5.9px] px-[7px] rounded-[55px] font-bold max-w-[254.6px] w-full mx-auto" data-target="purchase"><?php echo esc_html( $link_title ); ?></a>
                            
                        <?php endif; ?>

                    </div>
                    <div class="flex-[1_0_auto] max-w-[275px] w-full max-[1149px]:mx-auto">
                        <ul class="flex flex-col gap-y-[22.1px] text-left">

                            <?php 
                            if ( have_rows( 'list' ) ):
                                while ( have_rows( 'list' ) ) : the_row(); 
                                    
                                    $item = get_sub_field( 'item' );
                                    ?>

                                    <li class="relative pl-[35px]">
                                        <svg class="absolute top-[12px] -translate-y-2/4 left-0" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="9.07227" cy="8.5" r="8.125" fill="#FFFFFF"/><path d="M5.63086 9.125L7.97263 11.625L12.6562 6.625" stroke="#161978" stroke-width="1.25"/></svg>
                                        <p class="leading-[24px]"><?php echo esc_html( $item ); ?></p>
                                    </li>

                                <?php
                                endwhile;
                            endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        
        <?php
        endif;
    endwhile;
endif; ?>