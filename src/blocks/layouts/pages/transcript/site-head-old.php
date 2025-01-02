<section class="bg-[#F6F6FF] max-sm:p-3">
    <header id="masthead" class="bg-white flex justify-between items-center py-6 px-8 max-sm:bg-none max-sm:p-3">
        <div class="mr-8 max-sm:flex max-sm:items-center" data-section="logo">
            <div class="w-[120px] leading-[0]">

                <?php
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
                ?>

            </div>
        </div><!-- .site-branding -->
        <div class="flex items-center gap-8" data-section="menu">
            <nav id="site-navigation" class="main-navigation w-fit">
                <button class="menu-toggle !border-0" aria-controls="primary-menu" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21M3 6H21M3 18H15" stroke="#161978" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
            
            <?php
                if ( is_user_logged_in() ) :

                    $current_user = wp_get_current_user();
                    $first_name = get_user_meta( $current_user->ID, 'first_name', true );
                    $last_name = get_user_meta( $current_user->ID, 'last_name', true );
                    $full_name = esc_html( $first_name ) . ' ' . esc_html( $last_name );
                    $avatar = get_avatar( $current_user->ID, 96 ); 
                    $avatar_url = get_avatar_url( $current_user->ID );
                    $is_default_avatar = strpos( $avatar_url, 'd=mm' ) !== false || strpos( $avatar_url, 'd=blank' ) !== false;
                    $profile_url = get_edit_profile_url( $current_user->ID ); ?>
                    

                    <div class="flex gap-3 items-center ml-6">
                        
                        <?php if ( !$is_default_avatar ) :

                            echo get_avatar( $current_user->ID, 42 );

                        else : 

                            $initials = strtoupper(mb_substr( $first_name, 0, 1 ) . mb_substr($last_name, 0, 1)); ?>

                            <a href="<?php echo esc_url( $profile_url ); ?>" class="w-[42px] h-[42px] rounded-full overflow-hidden flex justify-center items-center bg-primary text-white visited:text-white font-bold"><?php echo esc_html( $initials ); ?></a>

                        <?php endif; ?>

                        <p class="text-primary max-sm:hidden"><?php echo esc_html( $full_name ); ?></p>
                    </div>

                <?php else : ?>
                    
                    <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="inline-block bg-secondary !text-[#031C34] text-center py-5 px-3 rounded-[100px] font-bold tracking-[1px] w-[200px] max-sm:w-[115px] max-md:py-4">Start Free</a>

                <?php endif;
            ?>

        </div>
    </header><!-- #masthead -->
</section>