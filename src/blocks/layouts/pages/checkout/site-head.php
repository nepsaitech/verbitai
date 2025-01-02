<header class="bg-[#F2F6FF]">
    <div class="fixed w-full max-w-full px-[39px] pt-[33px] z-50 max-sm:p-[11px] max-md:px-5">    
        <section id="masthead" class="flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:backdrop-filter max-sm:backdrop-blur-[34px] max-sm:[box-shadow:0px_1px_0px_0px_#FFFFFF1A_inset] max-sm:bg-[#F2F6FF] max-sm:p-4 max-sm:pr-[33px]">
            <div class="mr-8 max-sm:flex max-sm:items-center logo" data-section="logo">
                <div class="w-[126px] h-[43px] leading-[0] max-sm:w-[95px] max-sm:h-[33px]">

                    <?php
                    if ( !is_page_template('page-confirmation-checkout.php') ) :
                        if ( have_rows( 'header', 'option' ) ) :
                            while ( have_rows( 'header', 'option' ) ) : the_row();
                                if ( have_rows( 'logo' ) ) :
                                    while ( have_rows( 'logo' ) ) : the_row();
                                    
                                        $logo_variation_2 = get_sub_field( 'variation_2' );

                                        if ( $logo_variation_2 ) :

                                            $logo_variation_2_url = $logo_variation_2[ 'url' ];
                                            $logo_variation_2_alt = $logo_variation_2[ 'alt' ]; ?>
                                            
                                            <a href="<?= SELF_SERVICE_HOME_URL; ?>">
                                                <img src="<?php echo esc_url( $logo_variation_2_url ); ?>" alt="<?php echo esc_attr( $logo_variation_2_alt ); ?>">
                                            </a>

                                        <?php
                                        endif;
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                    endif;
                    ?>
                    
                </div>
            </div><!-- .site-branding -->
            <div class="flex items-center">
                <nav id="site-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'checkout-menu' )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </section><!-- #masthead -->
    </div>
</header>