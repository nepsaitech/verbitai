<div id="one-time-summary" class="flex flex-col w-full gap-3">
    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">
        <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]">Order summary</h2>
    </div>
    <div>
        <div>
            <div class="flex items-center justify-between mb-9">
                <h3 class="font-bold -tracking-[0.38px] leading-[34px]"><span id="package-quantity">5</span> <span id="package-interval">Hour(s)</span></h3>
                <div class="font-bold leading-[34px] -tracking-[0.38px] underline">
                    <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                    <span class="js-payment-currency"></span><span class="js-payment-subtotal"></span>
                </div>
            </div>
            <div id="coupon-result" class="hidden text-sm text-[#d11f1f] text-left mb-1"></div>
            <div class="relative flex justify-between items-center mb-9 group">
                <input type="text" name="coupon" id="cardholder-coupon" class="peer text-[#00000080] !py-[17px] !pl-[10px] !pr-[55px] !rounded-[6px] border !border-transparent w-full underline focus:bg-transparent focus:outline-none focus:!border-primary focus:no-underline" placeholder="Enter Coupon">
                <a href="#" id="coupon-button" class="hidden group-hover:block absolute right-2.5 top-2/4 -translate-y-2/4 font-[500] !text-primary text-sm leading-[34px] -tracking-[0.17px] z-20">Apply</a>

                <div id="spinner" class="hidden absolute left-12 top-2/4 -translate-y-2/4 z-20 w-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/spinner-fading-line.gif" alt="loading...">
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between border-t border-black border-opacity-[20%] pt-[19px]">
                    <h3 class="font-bold leading-normal -tracking-[0.38px]">Total</h3>
                    <div class="font-bold leading-normal -tracking-[0.38px]">
                        <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                        <span class="js-payment-currency"></span><span class="js-payment-subtotal js-ps-coupon"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>