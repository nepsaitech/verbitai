<section class="confirmation-checkout">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[183px] pl-[138px] pr-[60px] max-md:px-0 max-lg:px-5">

                <?php 
                if ( have_rows( 'confirmation_checkout_left_side' ) ) :
                    while ( have_rows( 'confirmation_checkout_left_side' ) ) : the_row(); 
                    
                        $ccl_title = get_sub_field( 'title' );
                        $description = get_sub_field( 'description' );
                        $button = get_sub_field( 'button' );
                        ?>

                        <div class="max-w-[786px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                            <div class="mb-[45px]">
                                <h2 class="font-extrabold text-[40px] leading-[100%] mb-[24px] max-md:text-center max-md:mb-[36px]"><?php echo esc_html( $ccl_title ); ?></h2>
                                <p class="leading-[22px] text-[#041D34A6]"><?php echo esc_html( $description ); ?></p>
                            </div>
                            <div class="max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] max-md:z-10 max-md:justify-center max-md:gap-0">

                                <?php
                                if ( $button ) :

                                    $button_link   = $button[ 'url' ];
                                    $button_title  = $button[ 'title' ];
                                    $button_target = $button[ 'target' ] ? $button[ 'target' ] : '_self';
                                    ?>

                                    <a href="<?php echo esc_url( $button_link ); ?>" target="<?php echo esc_attr( $button_target ); ?>" class="inline-block bg-primary !text-white text-center text-[17px] leading-[52px] py-[5px] px-2.5 min-w-[184px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:px-[26px]"><?php echo esc_html( $button_title ); ?></a>

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
                        if ( have_rows( 'confirmation_checkout_right_side' ) ) :
                            while ( have_rows( 'confirmation_checkout_right_side' ) ) : the_row(); 
                            
                                $ccr_title = get_sub_field( 'title' );
                                ?>

                                <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]"><?php echo esc_html( $ccr_title ); ?></h2>

                            <?php 
                            endwhile; 
                        endif; ?>

                    </div>
                    <div>
                        <div class="flex flex-col justify-between min-h-[469px] pb-[36px] border-b border-[#000000] border-opacity-[20%] mb-[22px]">
                            <ul>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[30px]">
                                    <div class="flex gap-6">
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>0.00</p>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[30px]">
                                    <div class="flex gap-6">
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>0.00</p>
                                </li>
                                <li class="flex justify-between items-center border-b border-[#EFEFEF] py-[30px]">
                                    <div class="flex gap-6">
                                        <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                    </div>
                                    <p class="font-bold text-sm leading-[100%] -tracking-[0.38px]"><span class="text-xs -tracking-[0.38px]">$<span>0.00</p>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <h2 class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">3 Orders</h2>
                            <p class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">$0.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>