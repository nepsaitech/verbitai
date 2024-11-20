<section class="no-addons">
    <div class="mx-auto">
        <div class="flex max-md:flex-col max-md:px-2.5">
            <div class="flex flex-col flex-grow pt-[122px] pl-[138px] pr-[60px] max-md:px-0 max-lg:px-5">
                <div class="max-w-[590px] w-full flex flex-col max-md:gap-0 max-md:max-w-full">
                    <!-- <div class="flex items-center text-center relative gap-2.5 w-full mb-8 max-md:justify-center max-md:mb-[45px]">
                        <div>
                            <label for="file" class="text-xs leading-[11px] text-[#808080] block -mb-1">Create Account</label>
                            <progress id="file" value="100" max="100">100%</progress>
                        </div>
                        <div>
                            <label for="file" class="text-xs leading-[11px] text-[#808080] block -mb-1">Upload File</label>
                            <progress id="file" value="100" max="100">100%</progress>
                        </div>
                        <div>
                            <label for="file" class="text-xs leading-[11px] font-bold text-[#808080] block -mb-1">Complete Order</label>
                            <progress id="file" value="30" max="100">30%</progress>
                        </div>
                    </div> -->
                    <div class="mb-[22px] border-b border-[#000000] border-opacity-[10%]">
                        <h2 class="font-extrabold text-[40px] leading-[100%] mb-[12px] max-md:text-center max-md:mb-[36px]">Payment details</h2>
                        <div class="flex flex-col gap-1 pb-[12px]">
                            <h3 class="font-bold text-sm leading-[18px] -tracking-[0.17px]">Signed in as</h3>
                            <a href="#" class="text-sm leading-[18px] -tracking-[0.17px] !text-[#041D34A6]">nomi@useflowzz.com</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-[16px] mb-8 max-md:flex-col max-md:gap-[14px] max-md:mb-0" data-checkout="form">
                        <form action="" class="w-full">
                            <div class="flex flex-col">
                                <div class="mb-[16px]">
                                    <a href="" class="!text-[#0570DE] flex items-center justify-center gap-x-[7px] font-sfpro600[box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#0570DE] !py-[14px] !px-[12px] font-[600]">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3179_14295)"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 4.5H0.5V3.75C0.5 3.06 0.948 2.5 1.5 2.5H15.5C16.052 2.5 16.5 3.06 16.5 3.75V4.5ZM16.5 7V13.5C16.5 13.7652 16.3946 14.0196 16.2071 14.2071C16.0196 14.3946 15.7652 14.5 15.5 14.5H1.5C1.23478 14.5 0.98043 14.3946 0.792893 14.2071C0.605357 14.0196 0.5 13.7652 0.5 13.5V7H16.5ZM4.5 10.5C4.23478 10.5 3.98043 10.6054 3.79289 10.7929C3.60536 10.9804 3.5 11.2348 3.5 11.5C3.5 11.7652 3.60536 12.0196 3.79289 12.2071C3.98043 12.3946 4.23478 12.5 4.5 12.5H5.5C5.76522 12.5 6.01957 12.3946 6.20711 12.2071C6.39464 12.0196 6.5 11.7652 6.5 11.5C6.5 11.2348 6.39464 10.9804 6.20711 10.7929C6.01957 10.6054 5.76522 10.5 5.5 10.5H4.5Z" fill="#0570DE"/></g><defs><clipPath id="clip0_3179_14295"><rect width="16" height="16" fill="white" transform="translate(0.5 0.5)"/></clipPath></defs></svg>
                                        Card
                                    </a>
                                </div>
                                <div class="flex flex-col gap-2.5 mb-[24px]">
                                    <div class="flex gap-2.5">
                                        <div class="flex flex-col flex-grow">
                                            <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">First name</label>
                                            <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="John">
                                        </div>
                                        <div class="flex flex-col flex-grow">
                                            <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Last name</label>
                                            <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="Due">
                                        </div>
                                    </div>
                                    <div class="flex gap-2.5">
                                        <div class="relative flex flex-col flex-grow">
                                            <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Card number</label>
                                            <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !pl-[12px] !pr-[136px]" placeholder="1234 1234 1234 1234">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/banks.png" class="absolute top-[65%] right-[12px] -translate-y-2/4" alt="banks">
                                        </div>
                                    </div>
                                    <div class="flex gap-2.5">
                                        <div class="flex flex-col flex-grow">
                                            <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">Expiration</label>
                                            <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="MM / YY">
                                        </div>
                                        <div class="flex flex-col flex-grow">
                                            <label for="firstname" class="font-sfpro600 text-[#4F5B76] text-[13px] leading-[16px] mb-1 font-[600]">CVV</label>
                                            <input type="text" name="firstname" class="font-sfpro600 [box-shadow:0px_2px_4px_0px_#00000012] h-[43px] !rounded-[6px] border-2 border-[#E0E0E0] !py-[14px] !px-[12px]" placeholder="CVV">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-[12px]">
                                    <label class="flex gap-[12px] items-start">
                                        <input type="checkbox" class="relative top-[2px] border !border-[#8a2929] rounded-[2px] opacity-[.4] checked:opacity-100" />
                                        <p class="font-sfpro font-bold text-[#4F5B76] text-xs leading-[14px]">I agree to save my payment information for future purchases.</p>
                                    </label>
                                    <label class="flex gap-[12px] items-start">
                                        <input type="checkbox" class="relative top-[2px] border !border-[#8a2929] rounded-[2px] opacity-[.4] checked:opacity-100" />
                                        <p class="font-sfpro text-[#4F5B76] text-xs leading-[14px]">I authorize Verbit to process future payments according to the terms and conditions. The subscription can be canceled at any time</p>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center gap-[32px] max-md:fixed max-md:bg-white max-md:py-[21px] max-md:px-[17px] max-md:inset-x-0 max-md:bottom-0 max-md:[box-shadow:0px_-1px_14px_0px_#0000001A] max-md:backdrop-filter backdrop-blur-[10px] max-md:z-10 max-md:justify-center max-md:gap-0">
                        <a href="#" class="font-bold text-lg leading-[38px] !text-black max-md:w-full max-md:max-w-[171px] max-md:text-center">Back</a>
                        <a href="#" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[160px] w-fit rounded-[56px] font-bold max-md:min-w-0 max-md:px-[26px]">Pay</a>
                    </div>
                </div>   
            </div>
            <div class="bg-[#F6F6FF] h-screen max-w-[517px] w-full pt-[130px] pl-[64px] max-md:px-2.5 max-md:py-[24px] max-lg:px-5 max-md:rounded-none max-md:max-w-full max-md:mt-[45px] max-md:min-h-0 max-md:h-auto max-md:pb-[142px]" data-checkout="free-trial">
                <div class="flex flex-col max-w-[390px] w-full gap-3 bg-white rounded-[20px] p-[30px] max-md:px-[19px] max-md:max-w-full">
                    <div class="flex flex-wrap items-center gap-[13px] border-b border-[#041D34] border-opacity-[10%] pb-1">
                        <h2 class="font-bold text-[#041D34] text-[22px] leading-[34px] -tracking-[0.38px]">Order summary</h2>
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