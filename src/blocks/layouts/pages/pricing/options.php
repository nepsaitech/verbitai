<section class="plan-options">
    <div class="bg-[#F2F6FF] pt-[80px] pb-[80px] px-8 max-[880px]:pt-[68px] max-[880px]:px-[14px] max-[880px]:mb-[48px] max-[880px]:pb-[48px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex gap-5 items-center justify-center max-[880px]:flex-col max-[880px]:gap-[48px]">

                <?php
                $starter_id = 1917;
                $starter = get_post($starter_id);

                if ($starter && $starter->post_type === 'plan-option') :
                    $starter_title       = get_the_title($starter_id);
                    $starter_icon        = get_field( 'free_plan_icon', $starter_id );
                    $starter_subtitle    = get_field( 'free_plan_subtitle', $starter_id );
                    $starter_duration    = get_field( 'free_plan_duration', $starter_id );
                    $starter_description = get_field( 'free_plan_description', $starter_id );
                    $starter_button      = get_field( 'free_plan_button', $starter_id );
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-[35px] px-[16px] text-sm text-[#041D34] text-center bg-white [box-shadow:0px_7px_8px_0px_#5148F91A] rounded-[40px] max-w-[347px] w-full min-h-[342px] max-[880px]:max-w-[352px]">
                        <div class="bg-[#008A7E] w-[57px] h-[57px] flex justify-center items-center mx-auto -mt-[13px] rounded-full">

                            <?php 
                            if ( $starter_icon ) :

                                $starter_icon_url = $starter_icon[ 'url' ];
                                $starter_icon_alt = $starter_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $starter_icon_url ); ?>" alt="<?php echo esc_attr( $starter_icon_alt ); ?>">

                            <?php endif; ?>
                            
                        </div>
                        <h2 class="text-[22px] leading-[34px] mb-[3px] font-bold max-[880px]:mb-[2px]"><?php echo esc_html( $starter_title ); ?></h2>
                        <h3 class="text-xs text-[#00000066] leading-[23px] mb-[22px] w-fit mx-auto rounded-[38px]"><?php echo esc_html( $starter_subtitle ); ?></h3>
                        
                        <div class="flex flex-col text-[#303030] justify-center flex-grow basis-full gap-1">
                            <span class="text-[28px] leading-[24px] font-bold">Free</span><span class="text-xs leading-[18px]"><?php echo esc_html( $starter_duration ); ?></span>
                        </div>
                        
                        <div class="mx-auto text-[#041D34A5] text-sm leading-[19px] -tracking-[0.17px] my-[22px]">
                            <p><?php echo esc_html( $starter_description ); ?></p>
                        </div>

                        <?php 
                        if ( $starter_button ) :

                            $starter_button_url    = $starter_button[ 'url' ];
                            $starter_button_title  = $starter_button[ 'title' ];
                            $starter_button_target = $starter_button[ 'target' ] ? $starter_button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $starter_button_url ); ?>" target="<?php echo esc_attr( $starter_button_target ); ?>" class="inline-block bg-transparent !text-[#008A7E] border-2 border-solid border-[#008A7E] text-center text-lg leading-[38px] py-[5px] px-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full max-[880px]:border-[#2EC6BA] max-[880px]:!text-[#2EC6BA]"><?php echo esc_html( $starter_button_title ); ?></a>
                        
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php                    
                $business_id = 1907;
                $business = get_post($business_id);

                if ($business && $business->post_type === 'plan-option') :
                    $business_title       = get_the_title($business_id);
                    $business_mo_id       = get_field( 'monthly_plan_id', $business_id );
                    $business_yr_id       = get_field( 'yearly_plan_id', $business_id );
                    $business_icon        = get_field( 'upgrade_plan_icon', $business_id );
                    $business_subtitle    = get_field( 'upgrade_plan_subtitle', $business_id );
                    $business_duration    = get_field( 'upgrade_plan_duration', $business_id );
                    $business_description = get_field( 'upgrade_plan_description', $business_id );
                    $business_button      = get_field( 'upgrade_plan_button', $business_id );

                    $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
                    $str_mo_id = $stripe->products->retrieve($business_mo_id);
                    $str_yr_id = $stripe->products->retrieve($business_yr_id, ['expand' => ['prices']]);

                    $str_mo_price_id = $str_mo_id->default_price;
                    $str_mo_price_data = $stripe->prices->retrieve($str_mo_price_id, []);
                    $str_mo_interval = $str_mo_price_data->recurring->interval;

                    $str_mo_amount_dollars = $str_mo_price_data->unit_amount / 100;
                    $str_mo_currency = currency_symbol($str_mo_price_data->currency);
                    $str_mo_amount = $str_mo_amount_dollars;

                    $str_yr_price_id = $str_yr_id->default_price;
                    $str_yr_price_data = $stripe->prices->retrieve($str_yr_price_id, []);
                    $str_yr_interval = $str_yr_price_data->recurring->interval;

                    $str_yr_amount_dollars = $str_yr_price_data->unit_amount / 100;
                    $str_yr_currency = currency_symbol($str_yr_price_data->currency);
                    $str_yr_amount = $str_yr_amount_dollars;
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-10 px-5 text-xs text-[#041D34] text-center bg-white [box-shadow:0px_22.38px_12.21px_0px_#5148F90F] rounded-[40px] max-w-[347px] w-full min-h-[493px] max-[880px]:max-w-[352px]">
                        <div class="bg-primary w-[57px] h-[57px] flex justify-center items-center mx-auto mb-[4px] -mt-[22px] rounded-full">

                            <?php 
                            if ($business_icon) :

                                $business_icon_url = $business_icon[ 'url' ];
                                $business_icon_alt = $business_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $business_icon_url ); ?>" alt="<?php echo esc_attr( $business_icon_alt ); ?>">

                            <?php endif; ?>

                        </div>
                        <h2 class="text-[22px] leading-[34px] mb-[3px] font-bold"><?php echo esc_html( $business_title ); ?></h2>
                        <h3 class="text-[13px] text-primary leading-[17px] mb-[22px] w-fit mx-auto bg-[#5148F90F] rounded-[38px] px-[8.3px]"><?php echo esc_html( $business_subtitle ); ?></h3>
                        <fieldset>
                            <div class="flex flex-wrap items-center justify-center  gap-x-[7px]">
                                <input type="hidden" name="business" id="monthly-price-id" value="<?= esc_attr($str_mo_price_id); ?>">
                                <input type="hidden" name="business" id="yearly-price-id" value="<?= esc_attr($str_yr_price_id); ?>">
                                <input type="checkbox" id="business-toggle" name="business-plan" class="peer hidden" value="<?= $str_mo_price_id; ?>">
                                <p class="leading-[26px] text-[#041D34A5] peer-checked:text-primary peer-checked:font-bold">Monthly</p>
                                    <label for="business-toggle" class="flex w-[38px] justify-end peer-checked:justify-start border border-solid border-[#5148F933] rounded-[26px] p-[1.3px]">
                                        <span class="inline-block rounded-full w-[18px] h-[18px] bg-primary"></span>
                                    </label>
                                <p class="leading-[26px] text-primary peer-checked:text-[#041D34A5] font-bold peer-checked:font-normal">Yearly</p>
                                <div class="hidden text-[#303030] peer-checked:flex items-end justify-center mt-[22px] w-full">
                                    <span class="text-[28px] font-bold"><?php echo $str_mo_currency; ?><?php echo $str_mo_amount; ?> <span class="text-base  font-normal js-plan-interval">/ <?php echo $str_mo_interval; ?></span></span>
                                </div>
                                <div class="flex text-[#303030] peer-checked:hidden items-end justify-center mt-[22px] w-full">
                                    <span class="text-[28px] font-bold"><?php echo $str_yr_currency; ?><?php echo $str_yr_amount; ?> <span class="text-base  font-normal js-plan-interval">/ <?php echo $str_mo_interval; ?></span></span>
                                </div>
                            </div>
                        </fieldset>

                        <div class="mx-auto text-[#041D34A5] text-sm my-[22px]">
                            <ul class="flex flex-col p-0 text-left gap-[16px] business-plan">

                                <?php
                                if ( have_rows( 'upgrade_plan_inclusions', $business_id ) ) :
                                    while ( have_rows( 'upgrade_plan_inclusions', $business_id ) ) : the_row();

                                        $item = get_sub_field( 'item' );
                                        ?>

                                        <li class="relative pl-6"><?php echo esc_html( $item ); ?></li>

                                    <?php 
                                    endwhile;
                                endif; ?>

                            </ul>
                        </div>

                        <?php 
                        if ( $business_button ) :

                            $business_button_url    = $business_button[ 'url' ];
                            $business_button_title  = $business_button[ 'title' ];
                            $business_button_target = $business_button[ 'target' ] ? $business_button[ 'target' ] : '_self';
                            ?>

                            <a href="#" target="<?php echo esc_attr( $business_button_target ); ?>" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] p-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full js-business-btn"><?php echo esc_html( $business_button_title ); ?></a>
                        
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php
                $enterprise_id = 1910;
                $enterprise = get_post($enterprise_id);
    
                    if ($enterprise && $enterprise->post_type === 'plan-option') :
                        $enterprise_title       = get_the_title($enterprise_id);
                        $enterprise_icon        = get_field( 'upgrade_plan_icon', $enterprise_id );
                        $enterprise_subtitle    = get_field( 'upgrade_plan_subtitle', $enterprise_id );
                        $enterprise_duration    = get_field( 'upgrade_plan_duration', $enterprise_id );
                        $enterprise_description = get_field( 'upgrade_plan_description', $enterprise_id );
                        $enterprise_button      = get_field( 'upgrade_plan_button', $enterprise_id );
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-10 px-2 text-xs text-[#041D34] text-center bg-white [box-shadow:0px_7px_8px_0px_#5148F91A] rounded-[40px] max-w-[347px] w-full min-h-[446px] max-[880px]:max-w-[352px]">
                        <div class="bg-[#FDB525] w-[57px] h-[57px] flex justify-center items-center mx-auto -mt-[21px] mb-[2px] rounded-full">

                            <?php 
                            if ( $enterprise_icon ) :

                                $enterprise_icon_url = $enterprise_icon[ 'url' ];
                                $enterprise_icon_alt = $enterprise_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $enterprise_icon_url ); ?>" alt="<?php echo esc_attr( $enterprise_icon_alt ); ?>">

                            <?php endif; ?>
                            
                        </div>
                        <h2 class="text-[22px] leading-[34px] font-bold"><?php echo esc_html( $enterprise_title ); ?></h2>
                        <h3 class="text-xs text-[#00000066] leading-[23px] w-fit mx-auto rounded-[38px] px-2"><?php echo esc_html( $enterprise_subtitle ); ?></h3>
                        <div class="mx-auto text-[#041D34A5] text-sm my-[22px] max-w-[276px] w-full">
                            <ul class="flex flex-col p-0 text-left gap-[16px] enterprise-plan">

                                <?php
                                if ( have_rows( 'upgrade_plan_inclusions', $enterprise_id ) ) :
                                    while ( have_rows( 'upgrade_plan_inclusions', $enterprise_id ) ) : the_row();

                                        $item = get_sub_field( 'item' );
                                        ?>

                                        <li class="relative pl-6"><?php echo esc_html( $item ); ?></li>

                                        <?php 
                                    endwhile;
                                endif; ?>

                            </ul>
                        </div>

                        <?php 
                        if ( $enterprise_button ) :

                            $enterprise_button_url    = $enterprise_button[ 'url' ];
                            $enterprise_button_title  = $enterprise_button[ 'title' ];
                            $enterprise_button_target = $enterprise_button[ 'target' ] ? $enterprise_button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $enterprise_button_url ); ?>" target="<?php echo esc_attr( $enterprise_button_target ); ?>" class="inline-block bg-transparent !text-[#FDB525] border-2 border-solid border-[#FDB525] text-center text-lg leading-[38px] py-[5px] px-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full"><?php echo esc_html( $enterprise_button_title ); ?></a>
                        
                        <?php endif; ?>
                        
                    </div>

                <?php endif; ?>

            </div>
                
        </div>
    </div>
</section>




