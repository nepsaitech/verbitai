<header class="bg-primary">
    <div class="fixed w-full max-w-full px-[39px] py-[33px] z-50 max-sm:p-[11px] max-md:px-5">    
        <section id="masthead" class="flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:p-4 max-sm:[box-shadow:0px_1px_0px_0px_rgba(255,_255,_255,_0.10)_inset] max-[860px]:pl-[23px]">
            <div class="mr-8 max-[600px]:w-fit max-sm:flex max-sm:items-center max-[860px]:w-[18%] max-[860px]:mr-0 logo" data-section="logo">
                <div class="w-[126px] leading-[0] max-[600px]:w-[126px] max-sm:w-[95px] max-sm:h-[33px] max-[860px]:w-full">

                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'logo' ) ) :
                                while ( have_rows( 'logo' ) ) : the_row();
                                
                                    $logo_variation_1 = get_sub_field( 'variation_1' );

                                    if ( $logo_variation_1 ) :

                                        $logo_variation_1_url = $logo_variation_1[ 'url' ];
                                        $logo_variation_1_alt = $logo_variation_1[ 'alt' ]; ?>
                                        
                                        <a href="<?php echo home_url(); ?>">
                                            <img src="<?php echo esc_url( $logo_variation_1_url ); ?>" alt="<?php echo esc_attr( $logo_variation_1_alt ); ?>">
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

                            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu',)); ?>

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
                if ( is_user_logged_in() ) :

                    $current_user = wp_get_current_user();
                    $first_name = get_user_meta( $current_user->ID, 'first_name', true );
                    $last_name = get_user_meta( $current_user->ID, 'last_name', true );
                    $full_name = esc_html( $first_name ) . ' ' . esc_html( $last_name );
                    $trimmed_full_name = ( strlen( $full_name ) > 15 ) ? substr( $full_name, 0, 12 ) . '...' : $full_name;
                    $avatar = get_avatar( $current_user->ID, 96 ); 
                    $avatar_url = get_avatar_url( $current_user->ID );
                    $is_default_avatar = strpos( $avatar_url, 'd=mm' ) !== false || strpos( $avatar_url, 'd=blank' ) !== false;
                    $profile_url = get_edit_profile_url( $current_user->ID ); ?>
                    

                    <div class="flex gap-[11px] items-center max-md:ml-0">
                        
                        <?php if ( !$is_default_avatar ) :

                            echo get_avatar( $current_user->ID, 42 );

                        else : 

                            $initials = strtoupper(mb_substr( $first_name, 0, 1 ) . mb_substr($last_name, 0, 1)); ?>

                            <a href="<?php echo esc_url( $profile_url ); ?>" class="text-[13px] leading-[18px] w-[42px] h-[42px] rounded-full overflow-hidden flex justify-center items-center bg-white text-primary font-bold max-md:text-base max-md:leading-[22px] max-md:w-[52px] max-md:h-[52px]"><?php echo esc_html( $initials ); ?></a>

                        <?php endif; ?>
                        
                        <div class="relative flex flex-row gap-[11px] items-center cursor-pointer" data-toggle="profile">

                            <p class="text-white leading-[22px] max-[800px]:hidden"><?php echo esc_html( $trimmed_full_name ); ?></p>

                            <svg class="max-[800px]:hidden" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9648 0.710938L5.96484 5.71094L0.964844 0.710938" stroke="white"/></svg>

                            <div class="profile-menu hidden absolute -left-[59%] top-[183%] w-[148px] flex-col bg-white rounded-[20px] [box-shadow:0px_4px_14px_0px_#0000001A]">
                                <?php wp_nav_menu( array( 'theme_location' => 'profile-menu') ); ?>
                            </div>

                        </div>
                    </div>

                <?php else : ?>

                    <?php
                    if ( have_rows( 'header', 'option' ) ) :
                        while ( have_rows( 'header', 'option' ) ) : the_row();
                            if ( have_rows( 'buttons' ) ) :
                                while ( have_rows( 'buttons' ) ) : the_row();
                                
                                    $contact_sales_link = get_sub_field( 'contact_sales' );
                                    $start_free_link = get_sub_field( 'start_free' );

                                    if ( $contact_sales_link ) :

                                        $contact_sales_link_url    = $contact_sales_link[ 'url' ];
                                        $contact_sales_link_title  = $contact_sales_link[ 'title' ];
                                        $contact_sales_link_target = $contact_sales_link[ 'target' ] ? $contact_sales_link[ 'target' ] : '_self';
                                        ?>
                                        
                                        <a href="<?php echo esc_url( $contact_sales_link_url ); ?>" target="<?php echo esc_attr( $contact_sales_link_target ); ?>" class="border-2 border-solid border-[#2EC6BA] rounded-[56px] !text-[#3DDED1] text-lg font-bold leading-[38px] py-[5px] px-[27px] mr-[28px] max-[600px]:hidden max-[860px]:mr-[2%] max-[860px]:py-[15px] max-[860px]:px-[2%] max-[860px]:w-[32%] max-[860px]:text-center max-[860px]:leading-[100%]"><?php echo esc_html( $contact_sales_link_title ); ?></a>

                                    <?php
                                    endif;

                                    if ( $start_free_link ) :

                                        $start_free_link_url    = $start_free_link[ 'url' ];
                                        $start_free_link_title  = $start_free_link[ 'title' ];
                                        $start_free_link_target = $start_free_link[ 'target' ] ? $contact_sales_link[ 'target' ] : '_self';
                                        ?>

                                        <a href="<?php echo esc_url( $start_free_link_url ); ?>" target="<?php echo esc_attr( $start_free_link_target ); ?>" class="flex justify-center leading-[48px] items-center bg-secondary !text-[#031C34] text-center py-[2px] px-[20px] w-[115px] h-[52px] rounded-[58px] font-bold max-[600px]:w-[115px] max-[600px]:px-[20px] max-md:py-4 max-[860px]:w-[23%] max-[860px]:py-[1rem] max-[860px]:px-[2%]"><?php echo esc_html( $start_free_link_title ); ?></a>

                                    <?php
                                    endif;
                                endwhile;
                            endif;
                        endwhile;
                    endif;  
                endif; 
                ?>

            </div>
        </section><!-- #masthead -->
    </div>
</header>