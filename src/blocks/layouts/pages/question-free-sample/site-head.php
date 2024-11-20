<header class="bg-[#F2F6FF]">
    <div class="fixed bg-transparent w-full max-w-full pt-[33px] px-[39px] z-50 max-sm:p-[11px] max-md:px-5">    
        <section id="masthead" class="flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:bg-none max-sm:backdrop-filter-none max-sm:backdrop-blur-none max-sm:p-4">
            <div class="mr-8 max-sm:flex max-sm:items-center logo" data-section="logo">
                <div class="w-[126px] h-[43px] leading-[0] max-sm:w-[95px] max-sm:h-[33px]">
                    
                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'logo' ) ) :
                                while ( have_rows( 'logo' ) ) : the_row();
                                
                                    $logo_variation_1 = get_sub_field( 'variation_1' );
                                    $logo_variation_2 = get_sub_field( 'variation_2' );

                                    if ( $logo_variation_1 ) {

                                        $logo_variation_1_url = $logo_variation_1[ 'url' ];
                                        $logo_variation_1_alt = $logo_variation_1[ 'alt' ];
                                    }

                                    if ( $logo_variation_2 ) :

                                        $logo_variation_2_url = $logo_variation_2[ 'url' ];
                                        $logo_variation_2_alt = $logo_variation_2[ 'alt' ]; 
                                        ?>
                                        
                                        <a href="<?php echo home_url(); ?>">
                                            <img src="<?php echo esc_url( $logo_variation_2_url ); ?>" id="site-logo" alt="<?php echo esc_attr( $logo_variation_2_alt ); ?>">
                                        </a>

                                    <?php
                                    endif;
                                endwhile;
                            endif;
                        endwhile;
                    endif;  
                    ?>

                </div>
            </div><!-- .site-branding -->
        </section><!-- #masthead -->
    </div>
</header>

<script>
    var logoVariation1Url = "<?php echo esc_url( $logo_variation_1_url ); ?>";
    var logoVariation1Alt = "<?php echo esc_url( $logo_variation_1_url ); ?>";
</script>
