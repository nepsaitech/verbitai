<section class="trust-factors">
    <div class="max-w-[906px] mx-auto max-lg:max-w-full">
        <div class="relative max-md:mt-0">
            <?php 
            if ( have_rows( 'trust_factors' ) ):
                while ( have_rows( 'trust_factors' ) ) : the_row(); ?>

                <div class="flex flex-wrap items-center mt-[17px] gap-[11px] max-md:mt-[60px] max-md:space-x-0 max-md:gap-10 max-md:justify-center">

                    <?php 
                    if ( have_rows( 'g2_rating_and_reviews' ) ):
                        while ( have_rows( 'g2_rating_and_reviews' ) ) : the_row(); 
                        
                        $g2_icon = get_sub_field( 'icon' );
                        $g2_label = get_sub_field( 'label' );
                        ?>

                            <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">

                                <?php
                                if ( $g2_icon ) :

                                    $g2_icon_url = $g2_icon[ 'url' ];
                                    $g2_icon_alt = $g2_icon[ 'alt' ];
                                    ?>

                                    <img src="<?php echo esc_url( $g2_icon_url ); ?>" class="max-md:order-1 max-md:mb-[9px]" alt="<?php echo esc_attr( $g2_icon_alt ); ?>">

                                <?php endif; ?>

                                <span class="text-white uppercase text-xs font-[500] leading-[32px] max-[550px]:text-black max-md:order-3"><?php echo esc_html( $g2_label ); ?></span>
                                <img src="<?php echo get_template_directory_uri()."/src/assets/img/star-rating.png"?>" class="max-md:order-2 max-md:mb-[2px]" alt="star rating">
                            </div>

                        <?php 
                        endwhile;
                    endif;

                    if ( have_rows( 'hours_transcribed_yearly' ) ):
                        while ( have_rows( 'hours_transcribed_yearly' ) ) : the_row(); 
                        
                        $hours_transcribed_icon = get_sub_field( 'icon' );
                        $hours_transcribed_total = get_sub_field( 'no_of_hours' );
                        $hours_transcribed_label = get_sub_field( 'label' );
                        ?>
                        
                        <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">

                            <?php
                            if ( $hours_transcribed_icon ) :

                                $hours_transcribed_icon_url = $hours_transcribed_icon[ 'url' ];
                                $hours_transcribed_icon_alt = $hours_transcribed_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $hours_transcribed_icon_url ); ?>" alt="<?php echo esc_attr( $hours_transcribed_icon_alt ); ?>">

                            <?php endif; ?>

                            <span class="text-white uppercase text-xs font-normal leading-[32px] max-[550px]:text-black max-md:leading-[26px]"><span class="text-[#3DDED1] font-bold max-md:block"><?php echo esc_html( $hours_transcribed_total ); ?> Hours</span>  <?php echo esc_html( $hours_transcribed_label ); ?></span>

                        </div>

                        <?php 
                        endwhile; 
                    endif; ?>

                </div>

                <?php 
                endwhile; 
            endif; 
            ?>

        </div>
    </div>
</section>