<header class="bg-primary">
    <div class="fixed w-full max-w-full px-[39px] py-[33px] z-50 max-sm:p-[11px] max-md:px-5 js-header">
        <section class="bg-[rgba(81,72,249,0.7)] flex justify-between items-center backdrop-filter backdrop-blur-[17px] rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:[box-shadow:0px_1px_0px_0px_rgba(255,_255,_255,_0.10)_inset] max-sm:bg-none max-sm:backdrop-filter-none max-sm:backdrop-blur-none max-sm:p-4 max-[860px]:pl-[23px]">
            <div class="mr-8 max-[600px]:w-fit max-sm:flex max-sm:items-center max-[860px]:w-[18%] max-[860px]:mr-0 logo" data-section="logo">
                <div class="w-[126px] leading-[0] max-[600px]:w-[126px] max-sm:w-[95px] max-sm:h-[33px] max-[860px]:w-full">

                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'logo' ) ) :
                                while ( have_rows( 'logo' ) ) : the_row();
                                    
                                    $logo_variation = get_sub_field( 'variation_1' );
                                    

                                    if ( $logo_variation ) :

                                        $logo_variation_url = $logo_variation[ 'url' ];
                                        $logo_variation_alt = $logo_variation[ 'alt' ]; ?>
                                        
                                        <a href="<?= SELF_SERVICE_HOME_URL; ?>">
                                            <img src="<?php echo esc_url( $logo_variation_url ); ?>" id="site-logo" alt="<?php echo esc_attr( $logo_variation_alt ); ?>">
                                        </a>

                                    <?php
                                    endif;
                                endwhile;
                            endif;
                        endwhile;
                    endif;  
                    ?>

                </div>
            </div>
        </section>
    </div>
</header>