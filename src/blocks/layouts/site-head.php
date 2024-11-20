<?php
    $header_bg_color = $header_style_1 = $header_style_2 = $header_style_3 = $header_style_4 = $complete_segment_logo_url = $complete_segment_logo_alt = "";
    if ( is_page_template('page-transcript.php') || is_page_template('page-question-free-sample.php') ) {  // Sample and Question page
        
        if ( is_page_template('page-question-free-sample.php') ) {
            $header_bg_color = "bg-transparent";
            $header_style_1 = "py-[33px]";
        } else {
            $header_bg_color = "bg-[#F2F6FF]";
        }

        $header_style_1 .= " fixed w-full max-w-full px-[39px] z-50 max-sm:p-[11px] max-md:px-5";
        $header_style_2 = "flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:p-4";
        $header_style_3 = "mr-8 max-sm:flex max-sm:items-center logo";
        $header_style_4 = "w-[126px] h-[43px] leading-[0] max-sm:w-[95px] max-sm:h-[33px]";
    } elseif ( is_page_template('page-plan.php') || is_page_template('page-upload.php') || is_page_template('page-upload-funnel.php') ) { // Plan page
        $header_bg_color = "bg-primary";
        $header_style_1 = "fixed w-full max-w-full px-[39px] py-[33px] z-50 max-sm:p-[11px] max-md:px-5";
        $header_style_2 = "bg-[rgba(81,72,249,0.7)] flex justify-between items-center backdrop-filter backdrop-blur-[17px] rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:[box-shadow:0px_1px_0px_0px_rgba(255,_255,_255,_0.10)_inset] max-sm:bg-none max-sm:backdrop-filter-none max-sm:backdrop-blur-none max-sm:p-4 max-[860px]:pl-[23px]";
        $header_style_3 = "mr-8 max-[600px]:w-fit max-sm:flex max-sm:items-center max-[860px]:w-[18%] max-[860px]:mr-0 logo";
        $header_style_4 = "w-[126px] leading-[0] max-[600px]:w-[126px] max-sm:w-[95px] max-sm:h-[33px] max-[860px]:w-full";
    } else { // Front page
        $header_bg_color = "bg-primary";
        $header_style_1 = "fixed w-full max-w-full px-[39px] py-[33px] z-50 max-sm:p-[11px] max-md:px-5";
        $header_style_2 = "bg-gradient-to-t from-white/10 to-white/10 bg-[rgba(81,72,249,0.7)] flex justify-between items-center [box-shadow:0px_1px_0px_0px_rgba(255,_255,_255,_0.10)_inset] backdrop-filter backdrop-blur-[17px] rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:bg-none max-sm:backdrop-filter-none max-sm:backdrop-blur-none max-sm:p-4 max-[860px]:pl-[23px]";
        $header_style_3 = "mr-8 max-[600px]:w-fit max-sm:flex max-sm:items-center max-[860px]:w-[18%] max-[860px]:mr-0 logo";
        $header_style_4 = "w-[126px] leading-[0] max-[600px]:w-[126px] max-sm:w-[95px] max-sm:h-[33px] max-[860px]:w-full";
    }
?>

<header class="<?php echo esc_attr( $header_bg_color ); ?>">
    <div class="<?php echo esc_attr( $header_style_1 ); ?> js-header">
        <section class="<?php echo esc_attr( $header_style_2 ); ?>">
            <div class="<?php echo esc_attr( $header_style_3 ); ?>" data-section="logo">
                <div class="<?php echo esc_attr( $header_style_4 ); ?>">

                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'logo' ) ) :
                                while ( have_rows( 'logo' ) ) : the_row();

                                    $complete_segment_logo = get_sub_field( 'variation_1' );
                                    if ( $complete_segment_logo ) {
                                        $complete_segment_logo_url = $complete_segment_logo[ 'url' ];
                                        $complete_segment_logo_alt = $complete_segment_logo[ 'alt' ];
                                    }

                                    if ( is_page( array(314, 421, 655)) ) { // Transcript page
                                        $logo_variation = get_sub_field( 'variation_2' );
                                    } else {
                                        $logo_variation = get_sub_field( 'variation_1' );
                                    }

                                    if ( $logo_variation ) :

                                        $logo_variation_url = $logo_variation[ 'url' ];
                                        $logo_variation_alt = $logo_variation[ 'alt' ]; ?>
                                        
                                        <a href="<?php echo home_url(); ?>">
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
            </div><!-- .site-branding -->
            <div class="flex items-center max-[860px]:flex-[1_0_auto] max-[860px]:justify-end" data-section="menu">
                <nav id="site-navigation" class="main-navigation w-fit">
                    <button class="menu-toggle !border-0" aria-controls="primary-menu" aria-expanded="false" data-toggle="desktop-menu-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21M3 6H21M3 18H15" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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

                            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>

                        </div>

                        <div>
                            <div class="relative flex flex-col gap-[11px] items-center">

                                <div class="hidden w-full profile-menu max-[600px]:border-t-[0.5px] max-[600px]:border-white max-[600px]:pt-2.5 max-[600px]:pb-[16px] max-[600px]:flex">
                                    <?php wp_nav_menu( array( 'theme_location' => 'profile-menu') ); ?>
                                </div>

                            </div>

                            <div class="mobile-menu-footer">
                                <?php wp_nav_menu( array( 'theme_location' => 'mobile-footer-menu',)); ?>
                            </div>

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
                    const buttonsACFData = <?php echo $header_buttons_json; ?>;

                    // Logo update when question form submit
                    var completeSegmentLogoUrl = "<?php echo esc_url( $complete_segment_logo_url ); ?>";
                    var completeSegmentLogoAlt = "<?php echo esc_url( $complete_segment_logo_alt ); ?>";
                </script>

                <div class="flex items-center js-header-right"></div>

            </div>
        </section><!-- #masthead -->
    </div>
</header>