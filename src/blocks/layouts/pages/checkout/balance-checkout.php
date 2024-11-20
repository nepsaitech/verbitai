<section class="balance-checkout">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pl-[138px] pr-[60px] max-md:px-0 max-lg:px-5">

                <?php 
                if ( have_rows( 'balance_checkout_left_side' ) ) :
                    while ( have_rows( 'balance_checkout_left_side' ) ) : the_row(); 
                    
                        $continue_btn = get_sub_field( 'continue' );
                        ?>

                        <div class="max-w-[786px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                            <div class="mb-[37px]">

                            <?php 
                            if ( have_rows( 'heading' ) ) :
                                while ( have_rows( 'heading' ) ) : the_row(); 
                                
                                    $bcl_title = get_sub_field( 'title' );
                                    $subtitle = get_sub_field( 'subtitle' );
                                    ?>

                                    <h2 class="font-extrabold text-[40px] leading-[100%] mb-[11px] max-md:text-center max-md:mb-[36px]"><?php echo esc_html( $bcl_title ); ?></h2>
                                    <p class="text-[#041D3480] font-[500] leading-[24px] -tracking-[0.38px] max-md:text-center"><?php echo esc_html( $subtitle ); ?></p>

                                <?php 
                                endwhile; 
                            endif; ?>

                            </div>
                            <div class="flex flex-col gap-2.5 mb-[37px]">

                                <?php 
                                if ( have_rows( 'instructions' ) ) :
                                    while ( have_rows( 'instructions' ) ) : the_row(); 
                                    
                                        $title = get_sub_field( 'title' );
                                        $subtitle = get_sub_field( 'subtitle' );
                                        ?>

                                        <h2><?php echo esc_html( $title ); ?></h2>
                                        <div class="flex items-center gap-2.5">

                                            <?php 
                                            if ( have_rows( 'notification' ) ) :
                                                while ( have_rows( 'notification' ) ) : the_row(); 
                                                
                                                    $production_hours = get_sub_field( 'production_hours' );
                                                    $renewal = get_sub_field( 'renewal' );
                                                    ?>
                                                    <div class="flex items-center gap-2.5">
                                                        <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.65"><circle cx="8" cy="8" r="7.25" stroke="black" stroke-width="1.5"/><path d="M5.78906 5.7203C5.96758 5.21282 6.31995 4.78489 6.78375 4.51231C7.24755 4.23973 7.79285 4.14009 8.32308 4.23104C8.8533 4.32198 9.33423 4.59765 9.68068 5.00921C10.0271 5.42077 10.2168 5.94166 10.216 6.47963C10.216 7.99829 7.93797 8.75762 7.93797 8.75762M7.96733 11.7972H7.97746" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g></svg></span>
                                                        <p class="text-[#FF0000] font-bold leading-[100%]"><?php echo esc_html( $production_hours ); ?></p>
                                                    </div>
                                                    <p class="text-xs italic text-[#000000A6]"><?php echo esc_html( $renewal ); ?></p>


                                                <?php 
                                                endwhile;
                                            endif; ?>

                                        </div>

                                    <?php 
                                    endwhile;
                                endif; ?>

                            </div>
                            <div class="bg-[#5148F91A] rounded-[20px] flex justify-between items-center p-6 mb-[36px]">
                                <div>

                                    <?php 
                                    if ( have_rows( 'banner' ) ) :
                                        while ( have_rows( 'banner' ) ) : the_row(); 
                                        
                                            $title = get_sub_field( 'title' );
                                            $description = get_sub_field( 'description' );
                                            ?>

                                            <h2 class="text-[#041D34] mb-[22px] font-bold text-[22px] leading-[22px] -tracking-[0.38px] max-w-[280px]"><?php echo $title; ?></h2>
                                            <p class="leading-[16px] text-[#041D34] -tracking-[0.38px]"><?php echo esc_html( $description ); ?></p>

                                        <?php 
                                        endwhile;
                                    endif; ?>

                                </div>
                                <div>
                                    <div class="relative flex justify-between items-center">
                                        <a href="#" class="peer flex items-center bg-white !text-[#041D34A6] border-[1.33px] border-primary rounded-[4px] relative py-[4px] px-2.5 min-w-[146px] w-full js-buy-hrs-dropdown">
                                            <span class="inline-block w-fit"><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4216_924)"><path d="M13.1204 7.73824C13.1509 7.49656 13.1667 7.25028 13.1667 7.00033C13.1667 3.77866 10.555 1.16699 7.33333 1.16699C4.11167 1.16699 1.5 3.77866 1.5 7.00033C1.5 10.222 4.11167 12.8337 7.33333 12.8337C7.58732 12.8337 7.83751 12.8174 8.08294 12.7859M7.33333 3.50033V7.00033L9.51405 8.09068M11.4167 12.8337V9.33366M9.66667 11.0837H13.1667" stroke="black" stroke-width="1.17" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4216_924"><rect width="14" height="14" fill="white" transform="translate(0.333374)"/></clipPath></defs></svg></span>
                                            <p class="font-bold -tracking-[0.22px] text-xs mx-[5px] w-fit">5 Hours</p>
                                            <span class="inline-block w-fit mr-2.5"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#696969"/></svg></span>
                                            <p class="font-normal text-[#041D34] -tracking-[0.17px] w-fit">$13</p>
                                        </a>
                                        <ul class="hidden absolute right-0 top-[100%] min-w-[175px] rounded-[4px] border-[1.33px] border-[#5C6C7B33] [box-shadow:0px_4px_24px_0px_#00000014] z-10 bg-white buy-hrs-options js-buy-hrs-options">
                                            <li class="p-2.5 w-full bg-[#F5F5F5] hover:bg-[#F5F5F5] active">
                                                <div class="relative mb-2">
                                                    <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Buy 5 hours</h2>
                                                    <span class="hidden absolute right-0 top-0 bg-primary rounded-full items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746826 2.85156L2.62024 4.85156L6.36708 0.851562" stroke="white"/></svg></span>
                                                </div>
                                                <p class="text-sm leading-[84%] -tracking-[0.17px] text-[#000000A6]">$13</p>
                                            </li>
                                            <li class="p-2.5 w-full hover:bg-[#F5F5F5]">
                                                <div class="relative mb-2">
                                                    <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Use Existing balance</h2>
                                                    <span class="hidden absolute right-0 top-0 bg-primary rounded-full items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746826 2.85156L2.62024 4.85156L6.36708 0.851562" stroke="white"/></svg></span>
                                                </div>
                                                <p class="text-sm leading-[84%] -tracking-[0.17px] text-[#000000A6]">-</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] max-md:z-10 max-md:justify-center max-md:gap-0">

                                <?php
                                if ( $continue_btn ) :

                                    $continue_btn_link   = $continue_btn[ 'url' ];
                                    $continue_btn_title  = $continue_btn[ 'title' ];
                                    $continue_btn_target = $continue_btn[ 'target' ] ? $continue_btn[ 'target' ] : '_self';
                                    ?>

                                    <a href="<?php echo esc_url( $continue_btn_link ); ?>" target="<?php echo esc_attr( $continue_btn_target ); ?>" class="inline-block bg-primary !text-white text-center text-[17px] leading-[38px] py-[7px] px-2.5 min-w-[146px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:px-[26px]"><?php echo esc_html( $continue_btn_title ); ?></a>

                                <?php endif; ?>

                            </div>
                        </div>

                    <?php 
                    endwhile; 
                endif; ?>

            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:px-2.5 max-md:py-[24px] max-lg:px-5 max-md:rounded-none max-md:max-w-full max-md:mt-[45px] max-md:min-h-0 max-md:h-auto max-md:pb-[142px]" data-checkout="free-trial">
                <div class="flex flex-col max-w-[390px] w-full bg-white rounded-[20px] p-[30px] max-md:px-[19px] max-md:max-w-full">
                    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">

                        <?php 
                        if ( have_rows( 'balance_checkout_right_side' ) ) :
                            while ( have_rows( 'balance_checkout_right_side' ) ) : the_row(); 
                            
                            $bcr_title = get_sub_field( 'title' );
                            ?>

                            <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]"><?php echo esc_html( $bcr_title ); ?></h2>

                            <?php 
                            endwhile;
                        endif; ?>

                    </div>
                    <div>
                        <div class="flex flex-col justify-between min-h-[469px] pb-[36px] border-b border-[#000000] border-opacity-[20%] mb-[22px]">
                            <ul>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                    </div>
                                    <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                        <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                    </div>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">verylong_name.mp4</span>
                                    </div>
                                    <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                        <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                    </div>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65_newrecording.wav</span>
                                    </div>
                                    <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                        <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">3 Orders</h2>
                            <div class="flex items-center bg-[#FF00001A] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                            </div>
                        </div>
                        <div class="flex items-center bg-[#FF00001A] rounded-[10px] gap-[5px] py-2 px-[22px] min-h-[28px]">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3791_15252)"><path d="M6.84009 2.5C7.35329 1.61111 8.63629 1.61111 9.14949 2.5L14.3456 11.5C14.8588 12.3889 14.2173 13.5 13.1909 13.5H2.79864C1.77224 13.5 1.13074 12.3889 1.64394 11.5L6.84009 2.5Z" fill="#FF0202"/><path d="M8 5.83203V8.4987M8 11.1654H8.00667" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_3791_15252"><rect width="16" height="16" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg>
                            <span class="text-[#FF0202] text-xs font-bold leading-[16px]">Note: You exceeded your balance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>