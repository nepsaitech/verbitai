<section class="subscription-checkout">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pb-[93px] pl-[138px] pr-[60px] max-md:pb-0 max-md:px-0 max-lg:px-5">
                <div class="max-w-[725px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                    <div class="flex items-center text-center relative gap-2.5 w-full mb-8 max-md:justify-center max-md:mb-[45px]">
                        <div>
                            <label for="file" class="text-xs leading-[11px] text-[#808080] block -mb-1">Create Account</label>
                            <progress id="file" value="100" max="100">100%</progress>
                        </div>
                        <div>
                            <label for="file" class="text-xs leading-[11px] text-[#808080] block -mb-1">Upload File</label>
                            <progress id="file" value="100" max="100">100%</progress>
                        </div>
                        <div>
                            <label for="file" class="text-xs leading-[11px] font-bold text-[#808080] block -mb-1">Complete Order</label>
                            <progress id="file" value="30" max="100">30%</progress>
                        </div>
                    </div>

                    <?php 
                    if ( have_rows( 'subscription_checkout_left_side' ) ) :
                        while ( have_rows( 'subscription_checkout_left_side' ) ) : the_row(); 
                        
                            $continue_button = get_sub_field( 'subscription_continue_button' );
                            ?>

                            <div class="max-md:mb-[36px] mb-8">

                                <?php 
                                if ( have_rows( 'heading' ) ) :
                                    while ( have_rows( 'heading' ) ) : the_row(); 
                                    
                                    $scl_title       = get_sub_field( 'title' );
                                    $scl_instruction = get_sub_field( 'instruction' );
                                    ?>

                                    <h2 class="font-extrabold text-[40px] leading-[100%] mb-2.5 max-md:text-center"><?php echo esc_html( $scl_title ); ?></h2>
                                    <p class="text-[#041D3480] leading-[24px] -tracking-[0.38px] max-md:text-center"><?php echo esc_html( $scl_instruction ); ?></p>

                                    <?php
                                    endwhile;
                                endif; ?>

                            </div>
                            
                            <?php get_template_part( 'src/blocks/components/plan-options' ); ?>

                            <div class="border-t border-[#000000] border-opacity-[10%] py-[34px] px-6 mb-8 max-md:pt-[40px] max-md:px-2 max-md:mt-[36px] max-md:mb-0">

                                <?php 
                                if ( have_rows( 'hour_subscription' ) ) :
                                    while ( have_rows( 'hour_subscription' ) ) : the_row();

                                    $hrs_title       = get_sub_field( 'title' );
                                    $hrs_instruction = get_sub_field( 'instruction' );
                                    ?>
                                        <div class="flex flex-col gap-y-2 mb-[18px]">
                                            <h3 class="text-[#041D34] font-bold text-[22px] leading-[22px] -tracking-[0.38px]"><?php echo esc_html( $hrs_title ); ?></h3>
                                            <p class="text-[#041D34] text-sm leading-[14px] -tracking-[0.38px]"><?php echo esc_html( $hrs_instruction ); ?></p>
                                        </div>

                                        <div class="relative w-fit">
                                            <select name="plan-package" id="hourly-plan" class="text-primary border-[1.33px] border-[#5148F933] rounded-[1.33px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[23px]">
                                                <option value="" disabled selected>Add Hours</option>
    
                                                <?php 
                                                if ( have_rows( 'package' ) ) :
                                                    while ( have_rows( 'package' ) ) : the_row();
                                                    
                                                    $hour = get_sub_field( 'hour' );
                                                    ?>
    
                                                    <option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
    
                                                    <?php 
                                                    endwhile;
                                                endif; ?>
    
                                            </select>

                                            <span class="absolute top-2/4 right-[5px] -translate-y-2/4 bg-white p-2"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
                                        </div>

                                    <?php 
                                    endwhile;
                                endif; ?>

                            </div>
                            <div class="max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] z-10">

                                <?php 
                                if ( $continue_button ) :

                                    $continue_button_url    = $continue_button[ 'url' ];
                                    $continue_button_title  = $continue_button[ 'title' ];
                                    $continue_button_target = $continue_button[ 'target' ] ? $continue_button[ 'target' ] : '_self';
                                    ?>

                                    <a href="<?php echo esc_url( $continue_button_url ); ?>" target="<?php echo esc_attr( $continue_button_target ); ?>" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[160px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:w-full"><?php echo esc_html( $continue_button_title ); ?></a>
                            
                                <?php endif; ?>        
                                
                            </div>

                        <?php 
                        endwhile;
                    endif; ?>

                </div>
            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:py-5 max-md:px-[25px] max-lg:px-5 max-md:rounded-[20px] max-md:max-w-full max-md:mt-[14px] max-md:min-h-0 max-md:h-auto" data-checkout="free-trial">

                <?php
                if ( have_rows( 'subscription_checkout_right_side' ) ) :
                    while ( have_rows( 'subscription_checkout_right_side' ) ) : the_row(); 
                    
                    $scr_title  = get_sub_field( 'title' );
                    $inclusions = get_sub_field( 'inclusions' );
                    $cancel_button = get_sub_field( 'subscription_cancel_button' );
                    ?>

                        <div class="flex flex-col max-w-[389px] w-full gap-3">
                            <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-3">
                                <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]"><?php echo esc_html( $scr_title ); ?></h2>


                                <?php
                                if ( $cancel_button ) :

                                    $cancel_button_url    = $cancel_button[ 'url' ];
                                    $cancel_button_title  = $cancel_button[ 'title' ];
                                    $cancel_button_target = $cancel_button[ 'target' ] ? $cancel_button[ 'target' ] : '_self';
                                    ?>

                                    <a href="<?php echo esc_url( $cancel_button_url ); ?>" target="<?php echo esc_attr( $cancel_button_target ); ?>" class="text-primary leading-[29px] max-md:text- js-checkout-cancel-btn"><?php echo esc_html( $cancel_button_title ); ?></a>

                                <?php endif; ?>

                            </div>
                            <ul class="flex flex-col p-0 text-left gap-1">

                                <?php
                                if ( have_rows( 'inclusions' ) ):
                                    while ( have_rows( 'inclusions' ) ) : the_row();

                                        $item = get_sub_field( 'item' );
                                        ?>
                                        
                                        <li class="relative py-[7px] pl-[21px] text-[#041D34A6]  leading-[130%] -tracking-[0.17px] max-md:leading-6 max-md:pl-[19px]">
                                            <span class="absolute left-0 top-2.5 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.395264 2.85156L2.26868 4.85156L6.01552 0.851562" stroke="white"/></svg></span>
                                                
                                            <?php echo esc_html( $item ); ?> 
                                        </li>

                                    <?php
                                    endwhile;
                                endif; ?>

                            </ul>
                        </div>

                    <?php 
                    endwhile;
                endif; ?>

            </div>
        </div>
    </div>
</section>