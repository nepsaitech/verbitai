<section class="addons-and-translation">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pb-[44px] pl-[77px] pr-[60px] max-md:pb-0 max-md:px-0 max-lg:px-5">
                
                <?php 
                if ( have_rows( 'addons_and_translations_checkout_left_side' ) ) :
                    while ( have_rows( 'addons_and_translations_checkout_left_side' ) ) : the_row(); 
                    
                        $atcl_title = get_sub_field( 'title' );
                        ?>

                        <div class="max-w-[786px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                            <div class="mb-[14px]">
                                <h2 class="font-extrabold text-[40px] leading-[100%] max-md:text-center max-md:mb-[36px]"><?php echo esc_html( $atcl_title ); ?></h2>
                            </div>
                            <div class="border border-[#EFEFEF] rounded-[20px] py-[24px] px-[30px] mb-[14px]">
                                <div class="border-b border-[#EFEFEF] pb-[27px] mb-[15px]">
                                    
                                    <?php 
                                    if ( have_rows( 'form_heading' ) ) :
                                        while ( have_rows( 'form_heading' ) ) : the_row(); 
                                        
                                            $atcl_subtitle = get_sub_field( 'subtitle' );
                                            $atcl_instruction = get_sub_field( 'instruction' );
                                            ?>

                                            <h2 class="font-bold text-[#041D34] text-[22px] leading-[100%] -tracking-[0.38px] mb-2.5"><?php echo esc_html( $atcl_subtitle ); ?></h2>
                                            <p class="font-bold text-[#041D34A6] leading-[23px] -tracking-[0.17px] mb-3"><?php echo esc_html( $atcl_instruction ); ?></p>
                                            <ul class="flex flex-col gap-2 text-[#041D34A6] list-disc list-outside pl-[19px]">
                                                
                                                <?php 
                                                if ( have_rows( 'inclusions' ) ) :
                                                    while ( have_rows( 'inclusions' ) ) : the_row(); 
                                                    
                                                        $item = get_sub_field( 'item' );
                                                        ?>
                                            
                                                        <li class="leading-[100%] -tracking-[0.17px] text-[19px]"><?php echo esc_html( $item ); ?></li>

                                                    <?php 
                                                    endwhile; 
                                                endif; ?>

                                            </ul>

                                        <?php 
                                        endwhile; 
                                    endif; ?>

                                </div>
                                <div class="flex flex-col gap-y-[5px]">
                                    <div class="flex justify-between items-center py-2.5 w-full max-md:flex-col">
                                        <h2 class="font-bold text-sm leading-[15px] text-[#031C34] max-md:mb-2">audiod65.wav</h2>
                                        <div class="flex justify-between items-center max-w-[326px] w-full">
                                            <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                                <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                            </div>
                                            <a href="#" class="text-primary border-2 border-[#5148F933] rounded-[4px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[20px] max-w-[232px] w-full">
                                                <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
                                                Add Human Review
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <div class="flex justify-between items-center py-2.5 w-full max-md:flex-col">
                                        <h2 class="font-bold text-sm leading-[15px] text-[#031C34] max-md:mb-2">verylong_name.mp4</h2>
                                        <div class="flex justify-between items-center max-w-[326px] w-full">
                                            <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                                <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                            </div>
                                            <a href="#" class="opacity-50 text-primary border-2 border-[#5148F933] rounded-[4px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[20px] max-w-[232px] w-full">
                                                <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
                                                Add Human Review
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="flex justify-between items-center py-2.5 w-full max-md:flex-col">
                                        <h2 class="font-bold text-sm leading-[15px] text-[#031C34] max-md:mb-2">audiod65_newrecording.wav</h2>
                                        <div class="flex justify-between items-center max-w-[326px] w-full">
                                            <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-2 px-2.5 min-w-[78px] min-h-[28px]">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4214_13752)"><path d="M6 3V6L8 7M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_4214_13752"><rect width="12" height="12" fill="white"/></clipPath></defs></svg>
                                                <span class="text-[#031C34B3] text-[10px] leading-[100%] italic">00:35:40</span>
                                            </div>
                                            <a href="#" class="text-primary border-2 border-[#5148F933] rounded-[4px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[20px] max-w-[232px] w-full">
                                                <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
                                                Add Human Review
                                            </a>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <?php 
                            if ( have_rows( 'buttons' ) ) :
                                while ( have_rows( 'buttons' ) ) : the_row(); 
                                
                                    $continue = get_sub_field( 'continue' );
                                    ?>

                                    <div class="flex gap-[14px] mb-[38px]">

                                        <?php 
                                        if ( have_rows( 'translation' ) ) :
                                            while ( have_rows( 'translation' ) ) : the_row(); 
                                            
                                                $translation_title = get_sub_field( 'title' );
                                                $translation_subtitle = get_sub_field( 'subtitle' );
                                                $translation_link = get_sub_field( 'link' );
                                                ?>

                                                <button class="flex flex-col flex-grow justify-center border !bg-transparent !border-[#EFEFEF] rounded-[20px] min-h-[101px] px-[30px] py-2.5" data-target="translation">
                                                    <p class="text-primary"><?php echo esc_html( $translation_title ); ?></p>
                                                    <span class="text-[#041D34A6]"><?php echo esc_html( $translation_subtitle ); ?></span>
                                                </button>

                                                <?php
                                            endwhile; 
                                        endif;
                                        if ( have_rows( 'add_keywords' ) ) :
                                            while ( have_rows( 'add_keywords' ) ) : the_row(); 
                                            
                                                $add_keywords_title = get_sub_field( 'title' );
                                                $add_keywords_subtitle = get_sub_field( 'subtitle' );
                                                ?>

                                                <button class="flex flex-col flex-grow justify-center border !bg-transparent !border-[#EFEFEF] rounded-[20px] min-h-[101px] px-[30px] py-2.5" data-target="keywords">
                                                    <p class="text-primary"><?php echo esc_html( $add_keywords_title ); ?></p>
                                                    <span class="text-[#041D34A6]"><?php echo esc_html( $add_keywords_subtitle ); ?></span>
                                                </button>

                                            <?php 
                                            endwhile; 
                                        endif; ?>

                                    </div>

                                    <div class="max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] max-md:z-10 max-md:justify-center max-md:gap-0">

                                        <?php
                                        if ( $continue ) :

                                            $continue_link   = $continue[ 'url' ];
                                            $continue_title  = $continue[ 'title' ];
                                            $continue_target = $continue[ 'target' ] ? $continue[ 'target' ] : '_self';
                                            ?>

                                        <a href="<?php echo esc_url( $continue_link ); ?>" target="<?php echo esc_attr( $continue_target ); ?>" class="inline-block bg-primary !text-white text-center text-[17px] leading-[52px] py-[5px] px-2.5 min-w-[234px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:px-[26px]"><?php echo esc_html( $continue_title ); ?></a>

                                        <?php endif; ?>

                                    </div>

                                <?php 
                                endwhile; 
                            endif; ?>

                        </div>
                
                    <?php 
                    endwhile; 
                endif; ?>

            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:px-2.5 max-md:py-[24px] max-lg:px-5 max-md:rounded-none max-md:max-w-full max-md:mt-[45px] max-md:min-h-0 max-md:h-auto max-md:pb-[142px]" data-checkout="free-trial">
                <div class="flex flex-col max-w-[390px] w-full bg-white rounded-[20px] p-[30px] max-md:px-[19px] max-md:max-w-full">
                    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">
                        
                        <?php 
                        if ( have_rows( 'addons_and_translations_checkout_right_side' ) ) :
                            while ( have_rows( 'addons_and_translations_checkout_right_side' ) ) : the_row(); 
                            
                            $atcr_title = get_sub_field( 'title' );
                            ?>

                                <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]"><?php echo esc_html( $atcr_title ); ?></h2>

                            <?php 
                            endwhile;
                        endif; ?>

                    </div>
                    <div>
                        <div class="flex flex-col justify-between min-h-[469px] pb-[36px] border-b border-[#000000] border-opacity-[20%] mb-[22px]">
                            <ul>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6 items-center">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <div class="flex flex-col gap-1">
                                            <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                        </div>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>0.00</p>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6 items-center">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <div class="flex flex-col gap-1">
                                            <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">verylong_name.mp4</span>
                                            <p class="text-xs leading-[23px] text-[#041D34A6]">Translation: <strong>English</strong> To <strong>Spanish</strong></p>
                                        </div>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>18.00</p>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[27px]">
                                    <div class="flex gap-6 items-center">
                                        <a href="#">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M10.6667 4.00004V3.46671C10.6667 2.71997 10.6667 2.3466 10.5213 2.06139C10.3935 1.8105 10.1895 1.60653 9.93865 1.4787C9.65344 1.33337 9.28007 1.33337 8.53333 1.33337H7.46667C6.71993 1.33337 6.34656 1.33337 6.06135 1.4787C5.81046 1.60653 5.60649 1.8105 5.47866 2.06139C5.33333 2.3466 5.33333 2.71997 5.33333 3.46671V4.00004M6.66667 7.66671V11M9.33333 7.66671V11M2 4.00004H14M12.6667 4.00004V11.4667C12.6667 12.5868 12.6667 13.1469 12.4487 13.5747C12.2569 13.951 11.951 14.257 11.5746 14.4487C11.1468 14.6667 10.5868 14.6667 9.46667 14.6667H6.53333C5.41323 14.6667 4.85318 14.6667 4.42535 14.4487C4.04903 14.257 3.74307 13.951 3.55132 13.5747C3.33333 13.1469 3.33333 12.5868 3.33333 11.4667V4.00004" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                                        </a>
                                        <div class="flex flex-col gap-1">
                                            <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65_newrecording.wav</span>
                                            <p class="text-xs leading-[23px] text-[#041D34A6]">+Standard human review ($1.00/min)</p>
                                        </div>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>21.00</p>
                                </li>
                            </ul>
                            <div class="relative flex justify-between items-center">
                                <input type="text" name="coupon" class="text-[#00000080] !pl-[10px] !pr-[55px] !rounded-[6px] w-full !border !border-[#5C6C7B33] h-[43px] focus:outline-none !focus:!border-[#5C6C7B33]" placeholder="Enter Coupon">
                                <a href="#" class="absolute right-2.5 top-2/4 -translate-y-2/4 font-[500] !text-primary text-sm leading-[34px] -tracking-[0.17px]">Apply</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <h2 class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">3 Orders</h2>
                            <p class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">$39</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>