<div class="flex items-center gap-x-[16px] mb-8 max-md:flex-col max-md:gap-[14px] max-md:mb-0" data-checkout="options">
    <div class="max-md:w-full">

        <?php
        $currency_symbol  = get_woocommerce_currency_symbol();
        $monthly_product_id = 1310; // Monthly Plan
        $monthly_product = wc_get_product($monthly_product_id);

        if ( $monthly_product ) :

            $monthly_title = preg_replace('/.*\(([^)]+)\).*/', '$1', $monthly_product->get_name());
            $monthly_price = $monthly_product->get_regular_price();
            $monthly_additional_info = get_field('plan_selection_additional_info', 1310);
            ?>

            <input id="monthly-plan" class="peer hidden" type="radio" name="plan-package" value="monthly"/>
            <label for="monthly-plan" class="flex cursor-pointer flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                <div class="flex items-center justify-between max-md:justify-start">
                    <h2 class="font-extrabold text-black"><?php echo esc_html( $monthly_title ); ?></h2>
                </div>
                <div class="flex flex-col max-md:text-right">
                    <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]"><?php echo  $currency_symbol; ?><?php echo $monthly_price; ?></h3>
                    <p class="text-sm -tracking-[0.17px] text-[#041D34A6]"><?php echo esc_html( $monthly_additional_info ); ?></p>
                </div>
            </label>
        
        <?php endif;  ?>

    </div>
    <div class="max-md:w-full">
        
        <?php
        $yearly_product_id = 1312; // Yearly Plan
        $yearly_product = wc_get_product($yearly_product_id);

        if ( $yearly_product ) :

            $yearly_title = preg_replace('/.*\(([^)]+)\).*/', '$1', $yearly_product->get_name());
            $yearly_price = $yearly_product->get_regular_price();
            $yearly_discount = $yearly_product->get_sale_price();
            $yearly_additional_info = get_field('plan_selection_additional_info', 1312);
            ?>

            <input id="yearly-plan" class="peer cursor-pointer hidden" type="radio" name="plan-package" value="yearly" checked/>
            <label for="yearly-plan" class="flex flex-col gap-y-[30px] border border-[#00000033] rounded-[20px] w-[185px] min-h-[185px] p-[15px] peer-checked:border-primary peer-checked:border-2 max-md:w-full max-md:min-h-0 max-md:flex-row max-md:items-center max-md:justify-between">
                <div class="flex items-center justify-between max-md:flex-col max-md:justify-start max-md:items-start">
                    <h2 class="font-extrabold text-black max-md:leading-[26px]"><?php echo esc_html( $yearly_title ); ?></h2>
                    <span class="inline-block text-white text-center bg-primary rounded-[40px] font-extrabold text-[8px] leading-[11px] py-[3.5px] px-2.5 tracking-[0.1em] min-w-[67px] max-md:leading-[10px]">SAVE <?php echo esc_html( $yearly_discount ); ?>%</span>
                </div>
                <div class="flex flex-col max-md:text-right">
                    <h3 class="font-bold text-[22px] leading-[31px] -tracking-[0.17px] text-[#041D34A6]"><?php echo  $currency_symbol; ?><?php echo esc_html( $yearly_price ); ?></h3>
                    <p class="text-sm -tracking-[0.17px] text-[#041D34A6]"><?php echo esc_html( $yearly_additional_info ); ?></p>
                </div>
            </label>

        <?php endif; ?>

    </div>
</div>