<header class="bg-primary">
    <div class="fixed w-full max-w-full px-[39px] py-[33px] z-50 max-sm:py-[11px] max-sm:px-2.5 max-md:px-5 max-[880px]:px-[20px]" data-header="wrap">    
        <section id="masthead" class="flex justify-between items-center rounded-[100px] py-4 pl-[38px] pr-[23px] max-sm:p-4 max-sm:[box-shadow:0px_1px_0px_0px_rgba(255,_255,_255,_0.10)_inset] max-[880px]:pl-4">
            <div class="mr-8 max-sm:flex max-sm:items-center logo" data-section="logo">
                <div class="w-[126px] h-[43px] leading-[0] max-sm:w-[95px] max-sm:h-[33px]"><?php the_custom_logo(); ?></div>
            </div><!-- .site-branding -->
            <div class="flex items-center" data-section="menu">
                <nav id="site-navigation" class="main-navigation w-fit">
                    <button class="menu-toggle !border-0 pr-1" aria-controls="primary-menu" aria-expanded="false" data-toggle="desktop-menu-btn">
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

                        <div class="mobile-menu-footer">
                            <?php wp_nav_menu( array( 'theme_location' => 'mobile-footer-menu',)); ?>
                        </div>
                    </div>
                </nav><!-- #site-navigation -->

                <a href="#" class="border-2 border-solid border-[#2EC6BA] rounded-[56px] !text-[#3DDED1] text-lg font-bold leading-[38px] py-[5px] px-[27px] max-md:hidden">Contact Sales</a>
                
                <?php
                session_start();
                if ( isset($_SESSION['customer_roles']) && in_array("registered", $_SESSION['customer_roles']) ) :    

                    $current_user = wp_get_current_user();
                    $first_name = get_user_meta( $current_user->ID, 'first_name', true );
                    $last_name = get_user_meta( $current_user->ID, 'last_name', true );
                    $full_name = esc_html( $first_name ) . ' ' . esc_html( $last_name );
                    $avatar = get_avatar( $current_user->ID, 96 ); 
                    $avatar_url = get_avatar_url( $current_user->ID );
                    $is_default_avatar = strpos( $avatar_url, 'd=mm' ) !== false || strpos( $avatar_url, 'd=blank' ) !== false;
                    $profile_url = get_edit_profile_url( $current_user->ID ); ?>
                    

                    <div class="flex gap-[11px] items-center ml-[28px] max-md:ml-0">
                        
                        <?php if ( !$is_default_avatar ) :

                            echo get_avatar( $current_user->ID, 42 );

                        else : 

                            $initials = strtoupper(mb_substr( $first_name, 0, 1 ) . mb_substr($last_name, 0, 1)); ?>

                            <a href="<?php echo esc_url( $profile_url ); ?>" class="text-[13px] leading-[18px] w-[42px] h-[42px] rounded-full overflow-hidden flex justify-center items-center bg-white text-primary font-bold max-md:text-base max-md:leading-[22px] max-md:w-[52px] max-md:h-[52px]"><?php echo esc_html( $initials ); ?></a>

                        <?php endif; ?>

                        <div class="relative flex flex-row gap-[11px] items-center cursor-pointer" data-toggle="profile">

                            <p class="text-white leading-[22px] max-[800px]:hidden"><?php echo esc_html( $full_name ); ?></p>

                            <svg class="max-[800px]:hidden" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9648 0.710938L5.96484 5.71094L0.964844 0.710938" stroke="white"/></svg>

                            <div class="profile-menu hidden absolute -left-[59%] top-[183%] w-[148px] flex-col bg-white rounded-[20px] [box-shadow:0px_4px_14px_0px_#0000001A]">
                                <?php wp_nav_menu( array( 'theme_location' => 'profile-menu') ); ?>
                            </div>

                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </section><!-- #masthead -->
    </div>
</header>