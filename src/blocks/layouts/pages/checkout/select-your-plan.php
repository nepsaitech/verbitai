<section class="checkout">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pb-[44px] pl-[138px] pr-[60px] max-md:pb-0 max-md:px-0 max-lg:px-5">
                
                <?php 
                if ( have_rows( 'select_plan_left_side' ) ) :
                    while ( have_rows( 'select_plan_left_side' ) ) : the_row();

                    $button = get_sub_field( 'subscription_continue_button' );
                    ?>
                    
                        <div class="max-w-[725px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                            <div class="mb-[23px] max-md:mb-[36px]">

                                <?php 
                                if ( have_rows( 'heading' ) ) :
                                    while ( have_rows( 'heading' ) ) : the_row();
                                    
                                    $title = get_sub_field( 'title' );
                                    $subtitle = get_sub_field( 'subtitle' );
                                    ?>

                                        <h2 class="font-extrabold text-[40px] leading-[100%] mb-[23px] max-md:text-center"><?php echo esc_html( $title ); ?></h2>
                                        <p class="text-[#041D3480] leading-[24px] -tracking-[0.38px] max-md:text-center"><?php echo esc_html( $subtitle ); ?></p>

                                    <?php 
                                    endwhile; 
                                endif; ?>
                                
                            </div>

                            <?php get_template_part( 'src/blocks/components/plan-options' ); ?>

                            <!-- <div class="flex items-center gap-x-[16px] mb-8 max-md:flex-col max-md:gap-[14px] max-md:mb-0" data-checkout="options">
                                <div class="max-md:w-full">
                                    <input id="monthly-plan" class="peer hidden" type="radio" name="plan" value="monthly"/>
                                    <label for="monthly-plan" class="flex cursor-pointer flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                                        <div class="flex items-center justify-between max-md:justify-start">
                                            <h2 class="font-extrabold text-black">Monthly</h2>
                                        </div>
                                        <div class="flex flex-col max-md:text-right">
                                            <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]">$29</h3>
                                            <p class="text-sm -tracking-[0.17px] text-[#041D34A6]">/Month</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="max-md:w-full">
                                    <input id="yearly-plan" class="peer cursor-pointer hidden" type="radio" name="plan" value="yearly"/>
                                    <label for="yearly-plan" class="flex flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                                        <div class="flex items-center justify-between max-md:flex-col max-md:justify-start max-md:items-start">
                                            <h2 class="font-extrabold text-black max-md:leading-[26px]">Yearly</h2>
                                            <span class="inline-block text-white text-center bg-primary rounded-[40px] font-extrabold text-[8px] leading-[11px] py-[3.5px] px-2.5 tracking-[0.1em] min-w-[67px] max-md:leading-[10px]">SAVE 40%</span>
                                        </div>
                                        <div class="flex flex-col max-md:text-right">
                                            <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]">$24</h3>
                                            <p class="text-sm -tracking-[0.17px] text-[#041D34A6]">/Month (billed $228 yearly)</p>
                                        </div>
                                    </label>
                                </div>
                            </div> -->
                            <div class="border-t border-[#000000] border-opacity-[10%] py-[34px] px-6 mb-8 max-md:pt-[40px] max-md:px-2 max-md:mt-[36px] max-md:mb-0">
                                <?php 
                                if ( have_rows( 'hour_subscription' ) ) :
                                    while ( have_rows( 'hour_subscription' ) ) : the_row();
                                        
                                        $hs_title = get_sub_field( 'title' );
                                        $description = get_sub_field( 'description' );
                                        ?>

                                        <div class="flex flex-col gap-y-2 mb-[18px]">
                                            <h3 class="text-[#041D34] font-bold text-[22px] leading-[22px] -tracking-[0.38px]"><?php echo esc_html( $hs_title ); ?></h3>
                                            <p class="text-[#041D34] text-sm leading-[14px] -tracking-[0.38px]"><?php echo esc_html( $description ); ?></p>
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

                                        <!-- <a href="#" class="text-primary border-[1.33px] border-[#5148F933] rounded-[1.33px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[23px]">
                                            <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
                                            Add Hours
                                        </a> -->
                                    
                                    <?php
                                    endwhile;
                                endif;
                                ?>

                            </div>
                            <div class="max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] z-10">


                                <?php 
                                if ( $button ) :

                                    $button_url    = $button[ 'url' ];
                                    $button_title  = $button[ 'title' ];
                                    $button_target = $button[ 'target' ] ? $link[ 'target' ] : '_self';
                                    ?>
                                        
                                <a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[160px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:w-full"><?php echo esc_html( $button_title ); ?></a>

                                <?php endif; ?>

                            </div>
                        </div>

                    <?php 
                    endwhile; 
                endif; ?>

            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:py-5 max-md:px-[25px] max-lg:px-5 max-md:rounded-[20px] max-md:max-w-full max-md:mt-[14px] max-md:min-h-0 max-md:h-auto" data-checkout="free-trial">
                
                <?php
                if ( have_rows( 'select_plan_right_side' ) ) :
                    while ( have_rows( 'select_plan_right_side' ) ) : the_row(); 
                    
                    $spr_title  = get_sub_field( 'title' );
                    $inclusions = get_sub_field( 'inclusions' );
                    ?>

                    <div class="flex flex-col max-w-[389px] w-full gap-3">
                        <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-3">
                            <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]"><?php echo esc_html( $spr_title ); ?></h2>
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
                            endif; 
                            ?>

                        </ul>
                    </div>
                    
                    <?php 
                    endwhile;
                endif; ?>

            </div>
        </div>
    </div>
</section>