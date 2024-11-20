<header class="bg-[#F2F6FF]">
    <div class="fixed w-full max-w-full px-[39px] pt-[33px] z-50 max-sm:p-[11px] max-md:px-5">    
        <section id="masthead" class="flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:bg-none max-sm:backdrop-filter-none max-sm:backdrop-blur-none max-sm:p-4">
            <div class="mr-8 max-sm:flex max-sm:items-center logo" data-section="logo">
                <div class="w-[126px] h-[43px] leading-[0] max-sm:w-[95px] max-sm:h-[33px]">

                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'logo' ) ) :
                                while ( have_rows( 'logo' ) ) : the_row();
                                
                                    $logo_variation_2 = get_sub_field( 'variation_2' );

                                    if ( $logo_variation_2 ) :

                                        $logo_variation_2_url = $logo_variation_2[ 'url' ];
                                        $logo_variation_2_alt = $logo_variation_2[ 'alt' ]; ?>
                                        
                                        <a href="<?php echo home_url(); ?>">
                                            <img src="<?php echo esc_url( $logo_variation_2_url ); ?>" alt="<?php echo esc_attr( $logo_variation_2_alt ); ?>">
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
            <div class="flex items-center" data-section="menu">
                <nav id="site-navigation" class="main-navigation w-fit">
                    <button class="menu-toggle !border-0" aria-controls="primary-menu" aria-expanded="false" data-toggle="desktop-menu-btn">
                        <svg class="stroke-white max-[600px]:stroke-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21M3 6H21M3 18H15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div class="mobile-menu">
                        <div>
                            <div class="items-center gap-1 border-b border-solid border-[#FFFFFF80] pb-[30px]  mb-4 mobile-menu-header">
                                <button class="!border-0 js-burger-menu">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.49805 17.5L17.502 6.49609" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M6.49805 6.50781L17.502 17.5117" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
                                </button>
                                <div class="w-[126px] h-[43px] leading-[0] logo"><?php the_custom_logo(); ?></div>
                            </div>

                            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu',)); ?>

                        </div>

                        <div class="mobile-menu-footer">
                            <?php wp_nav_menu( array( 'theme_location' => 'mobile-footer-menu',)); ?>
                        </div>
                    </div>
                </nav><!-- #site-navigation -->
                
                <?php
                // Initialize an array to hold the button links
                $header_buttons = array();

                if ( have_rows( 'header', 'option' ) ) :
                    while ( have_rows( 'header', 'option' ) ) : the_row();
                        if ( have_rows( 'buttons' ) ) :
                            while ( have_rows( 'buttons' ) ) : the_row();

                                $contact_sales_link = get_sub_field( 'contact_sales' );
                                $start_free_link = get_sub_field( 'start_free' );

                                if ( $contact_sales_link ) :
                                    $contact_sales_link_url    = esc_url( $contact_sales_link[ 'url' ] );
                                    $contact_sales_link_title  = esc_html( $contact_sales_link[ 'title' ] );
                                    $contact_sales_link_target = esc_attr( $contact_sales_link[ 'target' ] ? $contact_sales_link[ 'target' ] : '_self' );

                                    // Add the contact sales link to the buttons array
                                    $header_buttons[] = array(
                                        'url' => $contact_sales_link_url,
                                        'title' => $contact_sales_link_title,
                                        'target' => $contact_sales_link_target,
                                    );
                                endif;

                                if ( $start_free_link ) :
                                    $start_free_link_url    = esc_url( $start_free_link[ 'url' ] );
                                    $start_free_link_title  = esc_html( $start_free_link[ 'title' ] );
                                    $start_free_link_target = esc_attr( $start_free_link[ 'target' ] ? $start_free_link[ 'target' ] : '_self' );

                                    // Add the start free link to the buttons array
                                    $header_buttons[] = array(
                                        'url' => $start_free_link_url,
                                        'title' => $start_free_link_title,
                                        'target' => $start_free_link_target,
                                    );
                                endif;

                            endwhile;
                        endif;
                    endwhile;
                endif;

                // Encode the buttons array as JSON
                $header_buttons_json = json_encode($header_buttons);
                ?>

                <script>
                    // Pass the PHP data to a JavaScript variable
                    const buttonsData = <?php echo $header_buttons_json; ?>;
                </script>

                <div class="flex items-center pricing js-header-right"></div>
                
            </div>
        </section><!-- #masthead -->
    </div>
</header>