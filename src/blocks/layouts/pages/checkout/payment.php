<section class="payment">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pl-[138px] pr-[60px] max-md:px-0 max-lg:px-5">
                <div class="max-w-[590px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
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
                            <progress id="file" value="60" max="100">80%</progress>
                        </div>
                    </div>

                    <?php 
                    if ( have_rows( 'payment_left_side' ) ) :
                        while ( have_rows( 'payment_left_side' ) ) : the_row(); 
                        
                        $title = get_sub_field( 'title' );
                        ?>

                            <div class="mb-[22px] border-b border-[#000000] border-opacity-[10%]">
                                <h2 class="font-extrabold text-[40px] leading-[100%] mb-[12px] max-md:text-center max-md:mb-[36px]"><?php echo esc_html( $title ); ?></h2>
                                <div class="flex flex-col gap-1 pb-[12px]">
                                    <h3 class="font-bold text-sm leading-[18px] -tracking-[0.17px]">Signed in as</h3>
                                    
                                    <?php
                                    if ( isset($_SESSION['roles']) && in_array("registered", $_SESSION['roles']) ) :
                                        $email = $_SESSION['email'] ?? '';
                                    ?>
                                    
                                    <a href="#" class="text-sm leading-[18px] -tracking-[0.17px] !text-[#041D34A6]"><?php echo esc_html( $email ); ?>@gmail.com</a>
                                    
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="flex items-center gap-x-[16px] mb-8 max-md:flex-col max-md:gap-[14px] max-md:mb-0" data-checkout="form">
                                <form action="" class="w-full">
                                    <div class="flex flex-col">
                                        <div class="mb-[16px]">
                                            <a href="" class="!text-[#0570DE] flex items-center justify-center gap-x-[7px] font-sfpro600[box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#0570DE] !py-[14px] !px-[12px] font-[600]">
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3179_14295)"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 4.5H0.5V3.75C0.5 3.06 0.948 2.5 1.5 2.5H15.5C16.052 2.5 16.5 3.06 16.5 3.75V4.5ZM16.5 7V13.5C16.5 13.7652 16.3946 14.0196 16.2071 14.2071C16.0196 14.3946 15.7652 14.5 15.5 14.5H1.5C1.23478 14.5 0.98043 14.3946 0.792893 14.2071C0.605357 14.0196 0.5 13.7652 0.5 13.5V7H16.5ZM4.5 10.5C4.23478 10.5 3.98043 10.6054 3.79289 10.7929C3.60536 10.9804 3.5 11.2348 3.5 11.5C3.5 11.7652 3.60536 12.0196 3.79289 12.2071C3.98043 12.3946 4.23478 12.5 4.5 12.5H5.5C5.76522 12.5 6.01957 12.3946 6.20711 12.2071C6.39464 12.0196 6.5 11.7652 6.5 11.5C6.5 11.2348 6.39464 10.9804 6.20711 10.7929C6.01957 10.6054 5.76522 10.5 5.5 10.5H4.5Z" fill="#0570DE"/></g><defs><clipPath id="clip0_3179_14295"><rect width="16" height="16" fill="white" transform="translate(0.5 0.5)"/></clipPath></defs></svg>
                                                Card
                                            </a>
                                        </div>
                                        <div class="flex flex-col gap-2.5 mb-[24px]">
                                            <div class="flex gap-2.5">
                                                <div class="flex flex-col flex-grow">
                                                    <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">First name</label>
                                                    <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="John">
                                                </div>
                                                <div class="flex flex-col flex-grow">
                                                    <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Last name</label>
                                                    <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="Due">
                                                </div>
                                            </div>
                                            <div class="flex gap-2.5">
                                                <div class="relative flex flex-col flex-grow">
                                                    <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Card number</label>
                                                    <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !pl-[12px] !pr-[136px]" placeholder="1234 1234 1234 1234">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/banks.png" class="absolute top-[65%] right-[12px] -translate-y-2/4" alt="banks">
                                                </div>
                                            </div>
                                            <div class="flex gap-2.5">
                                                <div class="flex flex-col flex-grow">
                                                    <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Expiration</label>
                                                    <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="MM / YY">
                                                </div>
                                                <div class="flex flex-col flex-grow">
                                                    <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">CVV</label>
                                                    <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="CVV">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <?php 
                                        if ( have_rows( 'consents' ) ) :
                                            while ( have_rows( 'consents' ) ) : the_row(); 
                                            
                                            $first_consent = get_sub_field( 'first_consent' );
                                            $second_consent = get_sub_field( 'second_consent' );
                                            ?>

                                                <div class="flex flex-col gap-[12px]">
                                                    <label class="flex gap-[12px] items-start">
                                                        <input type="checkbox" class="relative top-[2px] border !border-[#8a2929] rounded-[2px] opacity-[.4] checked:opacity-100" />
                                                        <p class="font-sfpro text-[#4F5B76] text-xs leading-[14px]"><?php echo esc_html( $first_consent ); ?></p>
                                                    </label>
                                                    <label class="flex gap-[12px] items-start">
                                                        <input type="checkbox" class="relative top-[2px] border !border-[#8a2929] rounded-[2px] opacity-[.4] checked:opacity-100" />
                                                        <p class="font-sfpro text-[#4F5B76] text-xs leading-[14px]"><?php echo esc_html( $second_consent ); ?></p>
                                                    </label>
                                                </div>

                                            <?php
                                            endwhile;
                                        endif; ?>

                                    </div>
                                </form>
                            </div>
                            <div class="flex items-center gap-[32px] max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] max-md:z-10 max-md:justify-center max-md:gap-0">

                                <?php 
                                if ( have_rows( 'payment_buttons' ) ) :
                                    while ( have_rows( 'payment_buttons' ) ) : the_row();

                                        $back_button  = get_sub_field( 'back' );
                                        $start_button = get_sub_field( 'start' );
    
                                        if ( $back_button ) :

                                            $back_button_url    = $back_button[ 'url' ];
                                            $back_button_title  = $back_button[ 'title' ];
                                            $back_button_target = $back_button[ 'target' ] ? $back_button[ 'target' ] : '_self';
                                            ?>

                                            <a href="<?php echo esc_url( $back_button_url ); ?>" target="<?php echo esc_attr( $back_button_target ); ?>" class="font-bold text-lg leading-[38px] !text-black max-md:w-full max-md:max-w-[171px] max-md:text-center"><?php echo esc_html( $back_button_title ); ?></a>

                                        <?php
                                        endif; 
                                        
                                        if ( $start_button ) :

                                            $start_button_url    = $start_button[ 'url' ];
                                            $start_button_title  = $start_button[ 'title' ];
                                            $start_button_target = $start_button[ 'target' ] ? $start_button[ 'target' ] : '_self';
                                            ?>

                                            <a href="<?php echo esc_url( $start_button_url ); ?>" target="<?php echo esc_attr( $start_button_target ); ?>" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[160px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:px-[26px]"><?php echo esc_html( $start_button_title ); ?></a>
                                    
                                        <?php
                                        endif;
                                    endwhile;
                                endif; ?>

                            </div>

                        <?php
                        endwhile;
                    endif; ?>

                </div>
            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:px-2.5 max-md:py-[24px] max-lg:px-5 max-md:rounded-none max-md:max-w-full max-md:mt-[45px] max-md:min-h-0 max-md:h-auto max-md:pb-[142px]" data-checkout="free-trial">
                <div class="flex flex-col max-w-[390px] w-full gap-3 bg-white rounded-[20px] p-[30px] max-md:px-[19px] max-md:max-w-full">
                    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">
                        <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]">Summary</h2>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <h2 class="font-bold leading-[34px] -tracking-[0.38px]">Verbit business</h2>
                            <a href="#" class="underline !text-[#000000A6] leading-[34px] -tracking-[0.38px]">7 -day free trial</a>
                        </div>
                        <div>
                            <h3 class="mb-[15px] text-sm leading-[34px] -tracking-[0.17px] text-[#041D34A6]">Subscription</h3>
                            <div class="flex items-center justify-between mb-[20px]">
                                <input type="hidden" id="previous-selected-plan" value="">
                                <?php
                                $monthly_product_id = 1310; // Monthly Plan
                                $yearly_product_id = 1312; // Yearly Plan
                                $monthly_product = wc_get_product($monthly_product_id);
                                $yearly_product = wc_get_product($yearly_product_id);

                                switch ($monthly_product_id) {
                                    case 1310:     
                                        break;
                                    
                                    default:
                                        break;
                                }
                                ?>

                                <div class="relative flex justify-between items-center">
                                    <a href="#" class="peer !text-[#041D34A6] border-[1.33px] border-[#5C6C7B33] rounded-[4px] relative py-[4px] pl-[11px] pr-[24px] -tracking-[0.17px] leading-[31px] min-w-[77px] w-full">
                                        <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#696969"/></svg></span>
                                        Monthly
                                    </a>
                                    <ul class="hidden peer-hover:block absolute left-0 top-[111%] min-w-[175px] rounded-[4px] border-[1.33px] border-[#5C6C7B33] [box-shadow:0px_4px_24px_0px_#00000014] z-10 bg-white">
                                        <li class="p-2.5 w-full cursor-pointer bg-[#F5F5F5] hover:bg-[#F5F5F5]">
                                            <div class="relative mb-2">
                                                <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Monthly</h2>
                                                <span class="absolute right-0 top-0 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746826 2.85156L2.62024 4.85156L6.36708 0.851562" stroke="white"/></svg></span>
                                            </div>
                                            <p class="text-sm leading-[84%] -tracking-[0.17px] text-[#000000A6]">$30/mo</p>
                                        </li>
                                        <li class="p-2.5 w-full cursor-pointer hover:bg-[#F5F5F5]">
                                            <div class="relative mb-2">
                                                <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Yearly</h2>
                                            </div>
                                            <p class="text-sm leading-[84%] -tracking-[0.17px] text-[#000000A6]">$228/yr (billed upfront)</p>
                                        </li>
                                    </ul>
                                </div>
                                <p class="leading-[34px] -tracking-[0.38px] text-[#041D34A6]">$29/month</p>
                            </div>
                            <div class="relative flex justify-between items-center mb-[20px]">
                                <input type="text" name="coupon" class="peer text-[#00000080] !py-[17px] !pl-[10px] !pr-[55px] !rounded-[6px] border !border-transparent w-full underline focus:outline-none focus:!border-primary focus:no-underline" placeholder="Enter Coupon">
                                <a href="#" class="hidden peer-focus:block absolute right-2.5 top-2/4 -translate-y-2/4 font-[500] !text-primary text-sm leading-[34px] -tracking-[0.17px]">Apply</a>
                            </div>
                            <div class="mb-[130px] max-md:mb-[111px]">
                                <div class="flex items-center justify-between border-b border-black border-opacity-[20%] pb-2 mb-[15px]">
                                    <h3 class="text-sm leading-[34px] -tracking-[0.17px] text-[#00000080]">Subtotal</h3>
                                    <p class="leading-[38px] -tracking-[0.38px] text-[#000000A6]">$29/month</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <h2 class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">Total due today</h2>
                                    <p class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">$0/month</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm leading-[34px] -tracking-[0.17px] text-[#000000A6]">*after your 7-day free trial, on Sept 8th</h3>
                                    <p class="text-sm leading-[34px] -tracking-[0.17px] text-[#000000A6]">$29/month</p>
                                </div>
                            </div>
                            <div>
                                <div class="border-b border-black border-opacity-[20%] mb-[12px]">
                                    <h2 class="font-bold leading-[28px] -tracking-[0.38px]">Terms & conditions</h2>
                                </div>
                                <div>
                                    <ul class="flex flex-col p-0 text-left gap-1">
                                        <li class="text-xs relative py-[7px] pl-[21px] text-[#041D34A6] leading-[130%] -tracking-[0.17px] max-md:leading-6 max-md:pl-[19px]">
                                            <span class="absolute left-0 top-2 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.395264 2.85156L2.26868 4.85156L6.01552 0.851562" stroke="white"/></svg></span>
                                            Billing will automatically begin once the free trial ends.
                                        </li>
                                        <li class="text-xs relative py-[7px] pl-[21px] text-[#041D34A6] leading-[130%] -tracking-[0.17px] max-md:leading-6 max-md:pl-[19px]">
                                            <span class="absolute left-0 top-2 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.395264 2.85156L2.26868 4.85156L6.01552 0.851562" stroke="white"/></svg></span>
                                            Cancel before the free trial ends to avoid any charges.
                                        </li>
                                        <li class="text-xs relative py-[7px] pl-[21px] text-[#041D34A6] leading-[130%] -tracking-[0.17px] max-md:leading-6 max-md:pl-[19px]">
                                            <span class="absolute left-0 top-2 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.395264 2.85156L2.26868 4.85156L6.01552 0.851562" stroke="white"/></svg></span>
                                            We will send you a reminder 48hrs before your trial ends.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>