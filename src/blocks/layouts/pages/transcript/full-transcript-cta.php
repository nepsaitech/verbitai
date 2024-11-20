<section class="full-transcript-cta js-full-transcript-cta">
    <div class="bg-[#F6F6FF] min-h-[470px] max-[999px]:bg-transparent max-[999px]:min-h-0">
        <div class="max-w-[1315px] mx-auto">
            <div class="pt-[107px] max-sm:px-0 max-[1320px]:px-5">
                
                <?php 
                if ( have_rows( 'content' ) ):
                    while ( have_rows( 'content' ) ) : the_row();

                        $icon        = get_sub_field( 'icon' );
                        $description = get_sub_field( 'description' );
                        $link        = get_sub_field( 'link' );
                        ?>
                    
                        <div class="flex flex-wrap justify-between items-center max-md:flex-col bg-primary text-white py-[22px] px-[42px] rounded-[20px] gap-5 max-sm:rounded-[40px] max-sm:mb-0 max-md:p-[26px] max-md:gap-[17px] max-md:text-center max-[999px]:mb-4 js-full-transcript-wrap">
                            <div class="relative pl-[29px] max-md:pl-0 js-full-transcript-info">

                                <?php 
                                if ( $icon ) :

                                    $icon_url = $icon[ 'url' ];
                                    $icon_alt = $icon[ 'alt' ];
                                    ?>

                                    <img src="<?php echo esc_url( $icon_url ); ?>" class="absolute top-2/4 left-0 -translate-y-2/4 max-md:hidden"  alt="<?php echo esc_attr( $icon_alt ); ?>">

                                <?php endif; ?>

                                <?php echo $description; ?>

                            </div>

                            <?php 
                            if ( $link ) :

                                $link_url    = $link[ 'url' ];
                                $link_title  = $link[ 'title' ];
                                $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                                ?>

                                <a href="#" class="!text-white text-lg leading-[38px] py-[1px] px-[19px] rounded-[56px] font-bold border-2 border-solid border-white text-center max-md:max-w-[323px] max-md:w-full max-md:py-[5px] js-full-transcript-btn" data-target="purchase"><?php echo esc_html( $link_title ); ?></a>


                            <?php endif; ?>

                        </div>

                    <?php
                    endwhile;
                endif; ?>

            </div>
        </div>
    </div>
</section>