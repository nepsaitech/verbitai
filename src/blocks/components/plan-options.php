<div class="flex items-center gap-x-[16px] mb-8 max-md:flex-col max-md:gap-[14px] max-md:mb-0" data-checkout="options">
    <div class="max-md:w-full">

        <?php
        $business_id = 1907;
        $business = get_post($business_id);

        if ($business && $business->post_type === 'plan-option') :
            $business_mo_id = get_field( 'monthly_plan_id', $business_id );
            $monthly_additional_info  = get_field( 'plan_selection_additional_info', $business_id );

            $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
            $str_mo_id = $stripe->products->retrieve($business_mo_id);

            $str_mo_price_id = $str_mo_id->default_price;
            $str_mo_price_data = $stripe->prices->retrieve($str_mo_price_id, []);
            $str_mo_interval = $str_mo_price_data->recurring->interval;

            $str_mo_amount_dollars = $str_mo_price_data->unit_amount / 100;
            $str_mo_currency = currency_symbol($str_mo_price_data->currency);
            $str_mo_amount = $str_mo_amount_dollars;
            ?>

            <input id="monthly-plan" class="peer hidden" type="radio" name="plan-package" data-plan="business" value="price_1QSaJtRu1vbnX4dYqqv7hcKi"/>
            <label for="monthly-plan" class="flex cursor-pointer flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                <div class="flex items-center justify-between max-md:justify-start">
                    <h2 class="font-extrabold text-black"><?= ucfirst(esc_html($str_mo_interval).'ly'); ?></h2>
                </div>
                <div class="flex flex-col max-md:text-right">
                    <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]"><?= esc_html($str_mo_currency); ?><?= $str_mo_amount; ?></h3>
                    <p class="text-sm -tracking-[0.17px] text-[#041D34A6]">/<?= ucfirst(esc_html($str_mo_interval)); ?></p>
                </div>
            </label>
        
        <?php endif;  ?>

    </div>
    <div class="max-md:w-full">
        
        <?php
        $business_id = 1907;
        $business = get_post($business_id);

        if ($business && $business->post_type === 'plan-option') :
            $business_title       = get_the_title($business_id);
            $business_yr_id       = get_field( 'yearly_plan_id', $business_id );
            $yearly_additional_info = get_field('plan_selection_additional_info', $business_id);

            $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
            $str_yr_id = $stripe->products->retrieve($business_yr_id);

            $str_yr_price_id = $str_yr_id->default_price;
            $str_yr_price_data = $stripe->prices->retrieve($str_yr_price_id, []);
            $str_yr_interval = $str_yr_price_data->recurring->interval;

            $str_yr_amount_dollars = $str_yr_price_data->unit_amount / 100;
            $str_yr_currency = currency_symbol($str_yr_price_data->currency);
            $str_yr_amount = $str_yr_amount_dollars;
            ?>

            <input id="yearly-plan" class="peer cursor-pointer hidden" type="radio" name="plan-package" data-plan="business" data-recurring="month" value="price_1QTZPpRu1vbnX4dYyEmKHG29" checked/>
            <label for="yearly-plan" class="flex flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                <div class="flex items-center justify-between max-md:flex-col max-md:justify-start max-md:items-start">
                    <h2 class="font-extrabold text-black max-md:leading-[26px]"><?= ucfirst(esc_html($str_yr_interval).'ly'); ?></h2>
                    <span class="inline-block text-white text-center bg-primary rounded-[40px] font-extrabold text-[8px] leading-[11px] py-[3.5px] px-2.5 tracking-[0.1em] min-w-[67px] max-md:leading-[10px]">SAVE <?php /* echo esc_html( $yearly_discount ); */ ?>20%</span>
                </div>
                <div class="flex flex-col max-md:text-right">
                    <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]"><?= esc_html($str_yr_currency); ?><?= $str_yr_amount; ?></h3>
                    <p class="text-sm -tracking-[0.17px] text-[#041D34A6]">/Month (billed <?= esc_html($str_yr_currency); ?><?= esc_html( $str_yr_amount*12 ); ?> yearly)</p>
                </div>
            </label>

        <?php endif; ?>

    </div>
</div>