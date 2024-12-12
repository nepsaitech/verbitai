<div id="subscription-summary" class="flex flex-col w-full gap-3">
    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">
        <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]">Summary</h2>
    </div>
    <div>
        <div class="flex items-center justify-between">
            <h2 class="font-bold leading-[34px] -tracking-[0.38px]">Verbit Business</h2>
            <a href="#" class="underline !text-[#000000A6] leading-[34px] -tracking-[0.38px]">7 -day free trial</a>
        </div>
        <div>
            <h3 class="mb-[15px] text-sm leading-[34px] -tracking-[0.17px] text-[#041D34A6]">Subscription</h3>
            <div class="flex items-center justify-between mb-[20px]">
                <input type="hidden" id="previous-selected-plan" value="">
                <div class="relative flex justify-between items-center">
                    <a href="#" id="switch-plan" class="peer !text-[#041D34A6] border-[1.33px] border-[#5C6C7B33] rounded-[4px] relative py-[4px] pl-[11px] pr-[24px] -tracking-[0.17px] leading-[31px] min-w-[77px] w-full min-h-[41px]">
                        <span class="absolute top-2/4 right-[11px] -translate-y-2/4"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#696969"/></svg></span>
                        <span class="capitalize js-dropdown-interval"></span>
                    </a>
                    <ul class="hidden absolute left-0 top-[111%] min-w-[175px] rounded-[4px] border-[1.33px] border-[#5C6C7B33] [box-shadow:0px_4px_24px_0px_#00000014] z-10 bg-white js-dropdown-plan">
                        <li class="p-2.5 w-full cursor-pointer hover:bg-[#F5F5F5]" data-interval="month">
                            <a href="/payment/?plan=business&price_id=price_1QSaJtRu1vbnX4dYqqv7hcKi" class="!text-[#000000A6] block">
                                <div class="relative mb-2">
                                    <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Monthly</h2>
                                    <span class="absolute right-0 top-0 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px] js-check-icon"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746826 2.85156L2.62024 4.85156L6.36708 0.851562" stroke="white"/></svg></span>
                                </div>
                                <p class="text-sm leading-[84%] -tracking-[0.17px]">$30/mo</p>
                            </a>
                        </li>
                        <li class="p-2.5 w-full cursor-pointer hover:bg-[#F5F5F5]" data-interval="year">
                            <a href="/payment/?plan=business&price_id=price_1QTZPpRu1vbnX4dYyEmKHG29" class="!text-[#000000A6] block">
                                <div class="relative mb-2">
                                    <h2 class="font-bold leading-[84%] -tracking-[0.38px]">Yearly</h2>
                                    <span class="absolute right-0 top-0 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px] js-check-icon"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746826 2.85156L2.62024 4.85156L6.36708 0.851562" stroke="white"/></svg></span>
                                </div>
                                <p class="text-sm leading-[84%] -tracking-[0.17px]">$228/yr (billed upfront)</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="leading-[34px] -tracking-[0.38px] text-[#041D34A6]">
                    <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                    <span class="js-payment-currency"></span><span class="js-payment-amount"></span><span class="js-payment-interval"></span>
                </div>
            </div>
            <div id="coupon-result" class="hidden text-sm text-[#d11f1f] text-left mb-1"></div>
            <div class="relative flex justify-between items-center mb-[20px] group">
                <input type="text" name="coupon" id="cardholder-coupon" class="peer text-[#00000080] !py-[17px] !pl-[10px] !pr-[55px] !rounded-[6px] border !border-transparent w-full underline focus:outline-none focus:!border-primary focus:no-underline" placeholder="Enter Coupon">
                <a href="#" id="coupon-button" class="hidden group-hover:block absolute right-2.5 top-2/4 -translate-y-2/4 font-[500] !text-primary text-sm leading-[34px] -tracking-[0.17px]">Apply</a>

                <div id="spinner" class="hidden absolute left-12 top-2/4 -translate-y-2/4 z-20 w-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/spinner-fading-line.gif" alt="loading...">
                </div>
            </div>
            <div class="mb-[130px] max-md:mb-[111px]">
                <div class="flex items-center justify-between border-b border-black border-opacity-[20%] pb-2 mb-[15px]">
                    <h3 class="text-sm leading-[34px] -tracking-[0.17px] text-[#00000080]">Subtotal</h3>

                    <div class="leading-[38px] -tracking-[0.38px] text-[#000000A6]">
                        <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                        <span class="js-payment-currency"></span><span class="js-payment-subtotal"></span><span class="js-payment-interval js-pil-coupon"></span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <h2 class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">Total due today</h2>
                    <div class="font-bold text-[22px] leading-[34px] -tracking-[0.38px]">
                        <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                        <span class="js-payment-currency"></span><span class="js-payment-subtotal"></span><span class="js-payment-interval js-pil-coupon"></span>
                    </div>
                </div>
                <div id="free-trial" class="flex items-center justify-between">
                    <h3 id="free-trial-msg" class="text-sm leading-[34px] -tracking-[0.17px] text-[#000000A6]"></h3>
                    <div class="text-sm leading-[34px] -tracking-[0.17px] text-[#000000A6]">
                        <?php get_template_part( 'src/blocks/components/loaders/text-placeholder' ); ?>
                        <span class="js-payment-currency"></span><span class="js-payment-amount"></span><span class="js-payment-interval">
                    </div>
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