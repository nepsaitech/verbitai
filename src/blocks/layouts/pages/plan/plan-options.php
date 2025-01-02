<?php
$cookie_vertical       = ""; //TODO: get cookie value
$vertical              = get_sub_field( 'vertical' );
$quick_test_item_array = array();
$get_full_item_array   = array();

if ( $vertical ) {

    $args = array(
        'post_type'      => 'vertical',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );

    $verticals = new WP_Query($args);

    if ( $verticals->have_posts() ) {
        while ( $verticals->have_posts() ) {
            $verticals->the_post();

            $slug = get_post_field( 'post_name', get_the_ID() );

            if ( $slug === $vertical ) {
                if ( have_rows( 'plan' ) ) {
                    while ( have_rows( 'plan' ) ) { the_row();
                        if ( have_rows( 'quick_test_drive' ) ) {
                            while ( have_rows( 'quick_test_drive' ) ) { the_row();

                                $quick_test_icon     = get_sub_field( 'icon' );
                                $quick_test_title    = get_sub_field( 'title' );
                                $quick_test_subtitle = get_sub_field( 'subtitle' );
                                $quick_test_button   = get_sub_field( 'button' );
                
                                if ( have_rows( 'inclusions' ) ) {
                                    while ( have_rows( 'inclusions' ) ) { the_row();

                                        $quick_test_item         = get_sub_field( 'item' );
                                        $quick_test_item_array[] = $quick_test_item;
                                    }
                                }
                            }
                        }
                        if ( have_rows( 'get_full_access' ) ) {
                            while ( have_rows( 'get_full_access' ) ) { the_row();

                                $get_full_icon     = get_sub_field( 'icon' );
                                $get_full_title    = get_sub_field( 'title' );
                                $get_full_subtitle = get_sub_field( 'subtitle' );
                                $get_full_button   = get_sub_field( 'button' );
                
                                if ( have_rows( 'inclusions' ) ) {
                                    while ( have_rows( 'inclusions' ) ) { the_row();

                                        $get_full_item         = get_sub_field( 'item' );
                                        $get_full_item_array[] = $get_full_item;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        wp_reset_postdata(); 
    }
} else {
    if ( have_rows( 'default_plan' ) ) {
        while ( have_rows( 'default_plan' ) ) { the_row();
            if ( have_rows( 'quick_test_drive' ) ) {
                while ( have_rows( 'quick_test_drive' ) ) { the_row();

                    $quick_test_icon     = get_sub_field( 'icon' );
                    $quick_test_title    = get_sub_field( 'title' );
                    $quick_test_subtitle = get_sub_field( 'subtitle' );
                    $quick_test_button   = get_sub_field( 'button' );
    
                    if ( have_rows( 'inclusions' ) ) {
                        while ( have_rows( 'inclusions' ) ) { the_row();

                            $quick_test_item = get_sub_field( 'item' );
                            $quick_test_item_array[] = $quick_test_item;
                        }
                    }
                }
            }
            if ( have_rows( 'get_full_access' ) ) {
                while ( have_rows( 'get_full_access' ) ) { the_row();

                    $get_full_icon     = get_sub_field( 'icon' );
                    $get_full_title    = get_sub_field( 'title' );
                    $get_full_subtitle = get_sub_field( 'subtitle' );
                    $get_full_button   = get_sub_field( 'button' );
    
                    if ( have_rows( 'inclusions' ) ) {
                        while ( have_rows( 'inclusions' ) ) { the_row();

                            $get_full_item         = get_sub_field( 'item' );
                            $get_full_item_array[] = $get_full_item;
                        }
                    }
                }
            }
        }
    }
}
?>

<section class="plan-options">
    <div class="px-8 max-[880px]:pt-[34px] max-[880px]:relative max-[880px]:px-[14px]">
        <div class="max-w-screen-xl mx-auto max-[880px]:relative max-[880px]:z-20">
            <div class="flex gap-10 items-center justify-center -mt-[242px] max-[880px]:flex-col max-[880px]:mt-0 max-[880px]:gap-[44px] max-lg:gap-5">
                <div class="flex flex-col justify-between flex-grow basis-full p-[14px] pb-[29px] text-sm text-[#041D34] text-center bg-white [box-shadow:0px_11px_20px_15px_#5148F90D] rounded-[40px] max-w-[392px] min-h-[445px] w-full max-[880px]:min-h-0 max-[800px]:pb-[30px]">
                    <div class="max-[880px]:mb-[29px]">
                        <div class="bg-[#F6F6FF] flex justify-center items-center h-[86px] mb-[13px] rounded-[30px] max-[880px]:h-[101px]">

                            <?php
                            if ( $quick_test_icon ) :

                                $quick_test_icon_url = $quick_test_icon[ 'url' ];
                                $quick_test_icon_alt = $quick_test_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $quick_test_icon_url ); ?>" class="-mt-[45px]" alt="<?php echo esc_attr( $quick_test_icon_alt ); ?>">

                            <?php endif; ?>

                        </div>
                        <h2 class="text-primary text-[32px] leading-[34px] mb-2 font-bold max-[880px]:mb-1"><?php echo esc_html( $quick_test_title ); ?></h2>
                        <h3 class="font-bold text-base text-[#041D3480] leading-[23px] rounded-[38px]"><?php echo esc_html( $quick_test_subtitle ); ?></h3>
                        <div class="mx-auto text-[#041D34A6] text-sm leading-[18px] mt-[22px] max-w-[264px]">
                            
                            <?php if ( !empty( $quick_test_item_array ) ) : ?>

                                <ul class="flex flex-col gap-2 p-0 text-left business-plan">

                                    <?php foreach ( $quick_test_item_array as $item ) : ?>

                                        <li class="relative pl-6"><?php echo $item; ?></li>

                                    <?php  endforeach; ?>

                                </ul>

                            <?php endif; ?>
                            
                        </div>
                    </div>
                    
                    <?php
                    if ( $quick_test_button ) :

                        $quick_test_button_url    = $quick_test_button[ 'url' ];
                        $quick_test_button_title  = $quick_test_button[ 'title' ];
                        $quick_test_button_target = $quick_test_button[ 'target' ] ? $quick_test_button[ 'target' ] : '_self'; 
                        ?>

                        <a href="/self-service/funnel-upload" target="<?php echo esc_attr( $quick_test_button_target ); ?>" class="relative inline-block bg-primary !text-white text-center text-lg py-3 px-7 rounded-[100px] font-bold max-w-[342px] w-full mx-auto max-sm:max-w-[286px]">
                            <span class="max-[880px]:hidden"><?php echo esc_html( $quick_test_button_title ); ?></span>
                            <span class="hidden max-[880px]:block max-[880px]:text-left">Get started</span>
                            <span class="inline-block absolute right-[21px] top-2/4 -translate-y-2/4">
                                <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.64844 6.5C1.09615 6.5 0.648438 6.94772 0.648438 7.5C0.648437 8.05228 1.09615 8.5 1.64844 8.5L1.64844 6.5ZM21.3555 8.20711C21.7461 7.81658 21.7461 7.18342 21.3555 6.79289L14.9916 0.428933C14.6011 0.0384089 13.9679 0.0384089 13.5774 0.428933C13.1868 0.819458 13.1868 1.45262 13.5774 1.84315L19.2342 7.5L13.5774 13.1569C13.1868 13.5474 13.1868 14.1805 13.5774 14.5711C13.9679 14.9616 14.6011 14.9616 14.9916 14.5711L21.3555 8.20711ZM1.64844 8.5L20.6484 8.5L20.6484 6.5L1.64844 6.5L1.64844 8.5Z" fill="white"/></svg>
                            </span>
                        </a>

                    <?php endif; ?>

                </div>
                <div class="flex flex-col justify-between flex-grow basis-full p-[14px] pb-[29px] text-sm text-[#041D34] text-center bg-white [box-shadow:0px_11px_20px_15px_#5148F90D] rounded-[40px] max-w-[392px] min-h-[445px] w-full max-[880px]:min-h-[445px] max-[800px]:pb-[30px]">
                    <div class="max-[880px]:mb-[38px]">
                        <div class="bg-[#F6F6FF] flex justify-center items-center h-[86px] mb-[13px] rounded-[30px] max-[880px]:h-[101px]">

                            <?php
                            if ( $get_full_icon ) :

                                $get_full_icon_url = $get_full_icon[ 'url' ];
                                $get_full_icon_alt = $get_full_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $get_full_icon_url ); ?>" class="-mt-[45px]" alt="<?php echo esc_attr( $get_full_icon_url ); ?>">

                            <?php endif; ?>

                        </div>
                        <h2 class="text-primary text-[32px] leading-[34px] mb-2 font-bold"><?php echo esc_html( $get_full_title ); ?></h2>
                        <h3 class="font-bold text-base text-[#041D3480] leading-[23px] rounded-[38px]"><?php echo esc_html( $get_full_subtitle ); ?></h3>
                        <div class="mx-auto text-[#041D34A6] text-sm leading-[18px] mt-[22px] max-w-[264px]">

                            <?php if ( !empty( $get_full_item_array ) ) : ?>

                                <ul class="flex flex-col gap-2 p-0 text-left business-plan">

                                    <?php foreach ( $get_full_item_array as $item ) : ?>

                                        <li class="relative pl-6"><?php echo $item; ?></li>

                                    <?php  endforeach; ?>

                                </ul>

                            <?php endif; ?>

                        </div>
                    </div>

                    <?php
                    if ( $get_full_button ) :

                        $get_full_button_url    = $get_full_button[ 'url' ];
                        $get_full_button_title  = $get_full_button[ 'title' ];
                        $get_full_button_target = $get_full_button[ 'target' ] ? $get_full_button[ 'target' ] : '_self';
                        ?>
                        
                        <a href="/self-service/subscription-checkout" target="<?php echo esc_attr( $get_full_button_target ); ?>" class="relative inline-block !text-primary text-center text-lg py-2.5 px-7 rounded-[76px] font-bold max-w-[342px] w-full mx-auto border-2 border-primary max-sm:max-w-[286px] max-[880px]:text-left">
                            <?php echo esc_html( $get_full_button_title ); ?>
                            <span class="inline-block absolute right-[21px] top-2/4 -translate-y-2/4">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.35156 6.8457C0.799278 6.8457 0.351563 7.29342 0.351562 7.8457C0.351562 8.39799 0.799278 8.8457 1.35156 8.8457L1.35156 6.8457ZM21.0587 8.55281C21.4492 8.16229 21.4492 7.52912 21.0587 7.1386L14.6947 0.774636C14.3042 0.384112 13.671 0.384112 13.2805 0.774636C12.89 1.16516 12.89 1.79833 13.2805 2.18885L18.9373 7.8457L13.2805 13.5026C12.89 13.8931 12.89 14.5262 13.2805 14.9168C13.671 15.3073 14.3042 15.3073 14.6947 14.9168L21.0587 8.55281ZM1.35156 8.8457L20.3516 8.8457L20.3516 6.8457L1.35156 6.8457L1.35156 8.8457Z" fill="#5148F9"/></svg>
                            </span>
                        </a>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="hidden absolute min-h-[537px] bg-primary w-full top-0 inset-x-0 max-[880px]:block max-[880px]:z-10"></div>
    </div>
</section>




