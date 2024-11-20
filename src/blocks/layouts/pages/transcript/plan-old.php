<section class="plan-modal">
    <div class="bg-[#00000080] flex justify-center items-center p-32 max-lg:px-8">
        <div class="bg-white w-[760px] min-h-[469px] rounded-[20px] p-4 max-lg:w-full">
            <div class="w-[10px] h-[10px]">
                <a href="#" data-close-btn="plan">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L9 9" stroke="black"/><path d="M9 0.5L0.5 9" stroke="black"/></svg>
                </a>
            </div>
            <div class="flex justify-between py-[3rem] px-[3rem] max-lg:flex-col max-lg:py-4 max-lg:px-2 max-lg:space-y-8">
                <div class="text-[#041D34] flex flex-col justify-between grow-0 shrink-0 pt-6 w-full max-w-[245px] max-lg:w-full max-lg:flex-grow max-lg:basis-2/4 max-lg:max-w-full max-lg:pt-0 max-lg:text-center">
                    <div>
                        <h2 class="text-primary text-[30px] leading-9 font-bold mb-6 max-lg:mb-3">Don't stop now - keep transcribing</h2>
                        <p>You've reached your 30-minute transcription limit. Choose a plan and keep transcribing your files.</p>
                    </div>
                    <div class="flex space-x-4 items-center max-lg:justify-center max-lg:mt-3">
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/wcag-brand.png" alt="wcag"></a>
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/gdpr-brand.png" alt="gdpr"></a>
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/iso-brand.png" alt="iso"></a>
                    </div>
                </div>
                <div class="text-[#303030] flex flex-col justify-between grow-0 shrink-0 w-full max-w-[310px] max-lg:w-full max-lg:flex-grow max-lg:basis-2/4 max-lg:max-w-full">
                    <fieldset class="space-y-[42px] mb-[26px] max-lg:space-y-5">
                        <div>
                            <input id="business" class="peer/business hidden" type="radio" name="status" checked />
                            <label for="business" class="peer-checked/business:text-primary space-y-[24px] border border-solid border-[#00000033] rounded-[10px] block py-3 px-5">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-base font-bold text-[#303030]">Business Plan</h2>
                                        <p class="text-[#0000008c]">Starting at</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-[10px] text-primary leading-[23px] w-fit bg-[#5148F90F] rounded-[30px] px-[7px]">Best Value</span>
                                        <i class="font-normal flex justify-center items-center w-[14px] h-[14px] border-2 border-solid border-[#00000033] rounded-full">
                                            <svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3L3 5L7 1" stroke="white" stroke-width="1.5"/></svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex peer-checked:hidden text-[#303030]">
                                    <span class="text-[28px] font-bold">$17</span>&nbsp;&nbsp;/&nbsp;<span class="text-[22px]">month</span>
                                </div>
                                <p class="text-xs text-black">Cancel anytime</p>
                            </label>
                        </div>
                        <div>
                            <input id="hourly" class="peer/hourly hidden" type="radio" name="status" />
                            <label for="hourly" class="peer-checked/hourly:text-primary border border-solid border-[#00000033] rounded-[10px] block py-3 px-5">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-base font-bold text-[#303030] mb-2">Hourly plan</h2>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <i class="font-normal flex justify-center items-center w-[14px] h-[14px] border-2 border-solid border-[#00000033] rounded-full">
                                            <svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3L3 5L7 1" stroke="white" stroke-width="1.5"/></svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex peer-checked:hidden text-[#303030]">
                                    <span class="text-[28px] font-bold">$30</span>&nbsp;&nbsp;/&nbsp;<span class="text-[22px]">buy 5 hours</span>
                                </div>
                            </label>
                        </div>
                    </fieldset>
                    <div class="flex justify-end max-lg:justify-center">
                        <a href="#" class="inline-block bg-primary !text-white text-center text-lg py-3 px-7 rounded-[56px] font-bold w-fit max-md:py-4 max-sm:w-full">Continue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>