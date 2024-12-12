<section class="commit-cta">
    <div class="bg-[#F2F6FF] pb-[57px] max-md:pb-[69px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between items-center max-w-[1091px] gap-4 mx-auto max-md:flex-col max-md:gap-[46px]">

                <?php 
                $hourly_product_id = 1338; // Hourly Plan
                $hourly_product = wc_get_product($hourly_product_id);

                if ($hourly_product) :

                    $hourly_price    = $hourly_product->get_price();
                    $hourly_icon     = get_field( 'hourly_plan_hourly_icon', $hourly_product_id );
                    $hourly_title    = get_field( 'hourly_plan_title', $hourly_product_id );
                    $hourly_subtitle = get_field( 'hourly_plan_subtitle', $hourly_product_id );
                    $hourly_button   = get_field( 'hourly_plan_button', $hourly_product_id );
                    ?>

                    <div class="flex justify-between items-center max-w-[856px] py-[29px] px-[33px] border border-solid border-[#0320861A] rounded-[40px] gap-5 w-full max-md:flex-col max-md:10 max-md:border-transparent max-md:p-0 max-md:gap-[27px]">
                        <div class="flex items-center flex-[1_0_auto] gap-5 max-md:flex-col max-md:text-center max-md:gap-[5px]">
                            
                            <?php 
                            if ( $hourly_icon ) :

                                $hourly_icon_url = $hourly_icon[ 'url' ];
                                $hourly_icon_alt = $hourly_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $hourly_icon_url ); ?>" class="max-md:mx-auto w-[57px] h-[57px] object-cover" alt="<?php echo esc_attr( $hourly_icon_alt ); ?>">

                            <?php endif; ?>

                            <div>
                                <input type="hidden" id="js-hourly-plan" value="<?php echo $hourly_product_id; ?>">
                                <h2 class="text-[22px] text-[#041D34] leading-[34px] -tracking-[0.38px] font-bold"><?php echo esc_html( $hourly_title ); ?></h2>
                                <div class="text-sm text-[#041D34A5] leading-[26px] max-md:leading-[21px] max-md:max-w-[286px] mx-auto"><?php echo $hourly_subtitle; ?></div>
                            </div>
                        </div>
                        <div class="flex gap-[25px] items-center justify-end flex-[1_0_auto] max-lg:flex-col max-lg:gap-2 max-md:flex-row max-md:gap-8 max-md:justify-center">
                            <div class="flex items-end justify-center flex-[1_0_auto]">
                                <span class="text-[28px] leading-[24px] text-[#303030] font-sfpro700 font-bold">$<?php echo esc_html( $hourly_price ); ?></span>&nbsp;&nbsp;/&nbsp;<span class="text-base text-[#303030] font-sfpro">hour</span>
                            </div>
                            
                            <?php
                            if ( $hourly_button ) :

                                $hourly_button_url    = $hourly_button[ 'url' ];
                                $hourly_button_title  = $hourly_button[ 'title' ];
                                $hourly_button_target = $hourly_button[ 'target' ] ? $hourly_button[ 'target' ] : '_self';
                                ?>

                                <a href="<?php echo esc_url( $hourly_button_url ); ?>" target="<?php echo esc_attr( $hourly_button_target ); ?>" class="flex-[1_0_auto] bg-white !text-[#032086] text-center text-lg leading-[38px] p-[7px] rounded-[40px] font-bold w-full max-w-[180px] [box-shadow:0px_7px_8px_0px_#5148F91A] js-hourly-plan-btn"><?php echo esc_html( $hourly_button_title ); ?></a>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div>
                        <?php 
                        $iso_logo = get_sub_field( 'commit_logo' );
                        if ( $iso_logo ) :

                            $iso_logo_url = $iso_logo[ 'url' ];
                            $iso_logo_alt = $iso_logo[ 'alt' ];
                            ?>
                        <img src="<?php echo esc_url( $iso_logo_url ); ?>" alt="<?php echo esc_attr( $iso_logo_alt ); ?>">

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>