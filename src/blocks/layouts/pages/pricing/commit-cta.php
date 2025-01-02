<section class="commit-cta">
    <div class="bg-[#F2F6FF] pb-[57px] max-md:pb-[69px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between items-center max-w-[1091px] gap-4 mx-auto max-md:flex-col max-md:gap-[46px]">

                <?php
                $package_id = 1920;
                $package = get_post($package_id);

                if ($package && $package->post_type === 'plan-option') :
                    $package_title    = get_field('hourly_plan_title', $package_id);
                    $package_hr_id    = get_field('hourly_plan_id', $package_id);
                    $package_icon     = get_field('hourly_plan_icon', $package_id);
                    $package_subtitle = get_field('hourly_plan_subtitle', $package_id);
                    $package_duration = get_field('hourly_plan_duration', $package_id);
                    $package_button   = get_field('hourly_plan_button', $package_id);

                    $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
                    $str_hr_id = $stripe->products->retrieve($package_hr_id);

                    $str_hr_price_id = $str_hr_id->default_price;
                    $str_hr_price_data = $stripe->prices->retrieve($str_hr_price_id, []);

                    $str_hr_amount_dollars = $str_hr_price_data->unit_amount / 100;
                    $str_hr_currency = currency_symbol($str_hr_price_data->currency);
                    $str_hr_amount = $str_hr_amount_dollars;
                    ?>

                    <div class="flex justify-between items-center max-w-[856px] py-[29px] px-[33px] border border-solid border-[#0320861A] rounded-[40px] gap-5 w-full max-md:flex-col max-md:10 max-md:border-transparent max-md:p-0 max-md:gap-[27px]">
                        <div class="flex items-center flex-[1_0_auto] gap-5 max-md:flex-col max-md:text-center max-md:gap-[5px]">
                            
                            <?php 
                            if ( $package_icon ) :

                                $package_icon_url = $package_icon[ 'url' ];
                                $package_icon_alt = $package_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $package_icon_url ); ?>" class="max-md:mx-auto w-[57px] h-[57px] object-cover" alt="<?php echo esc_attr( $package_icon_alt ); ?>">

                            <?php endif; ?>

                            <div>
                                <input type="hidden" name="package" id="hourly-price-id" value="<?= esc_attr($str_hr_price_id); ?>">
                                <h2 class="text-[22px] text-[#041D34] leading-[34px] -tracking-[0.38px] font-bold"><?php echo esc_html( $package_title ); ?></h2>
                                <div class="text-sm text-[#041D34A5] leading-[26px] max-md:leading-[21px] max-md:max-w-[286px] mx-auto"><?php echo $package_subtitle; ?></div>
                            </div>
                        </div>
                        <div class="flex gap-[25px] items-center justify-end flex-[1_0_auto] max-lg:flex-col max-lg:gap-2 max-md:flex-row max-md:gap-8 max-md:justify-center">
                            <div class="flex items-end justify-center flex-[1_0_auto]">
                                <span class="text-[28px] leading-[24px] text-[#303030] font-sfpro700 font-bold"><?= esc_html($str_hr_currency); ?><?= esc_html($str_hr_amount); ?></span>&nbsp;&nbsp;/&nbsp;<span class="text-base text-[#303030] font-sfpro">hour</span>
                            </div>
                            
                            <?php
                            if ( $package_button ) :

                                $package_button_url    = $package_button[ 'url' ];
                                $package_button_title  = $package_button[ 'title' ];
                                $package_button_target = $package_button[ 'target' ] ? $package_button[ 'target' ] : '_self';
                                ?>

                                <a href="#" target="<?php echo esc_attr( $package_button_target ); ?>" class="flex-[1_0_auto] bg-white !text-[#032086] text-center text-lg leading-[38px] p-[7px] rounded-[40px] font-bold w-full max-w-[180px] [box-shadow:0px_7px_8px_0px_#5148F91A] js-hourly-btn"><?php echo esc_html( $package_button_title ); ?></a>

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