<section class="banner">
    <div class="bg-primary pb-2 px-4 min-h-[507px] max-md:pt-8 max-[880px]:min-h-0">
        <div class="max-w-screen-xl mx-auto">
            <div class="pt-[122px] max-sm:pt-[104px] max-xl:pt-[133px]">
                <div class="flex justify-center items-center text-center relative gap-2.5 w-full">
                    <div>
                        <label for="file" class="text-xs leading-[11px] font-normal text-white block -mb-1">Set Account</label>
                        <progress id="file" value="100" max="100">100%</progress>
                    </div>
                    <div>
                        <label for="file" class="text-xs leading-[11px] font-bold text-white block -mb-1">Upload</label>
                        <progress id="file" value="50" max="100">50%</progress>
                    </div>
                    <div>
                        <label for="file" class="text-xs leading-[11px] font-normal text-[#FFFFFF66] block -mb-1">Complete Order</label>
                        <progress id="file" value="0" max="100">0%</progress>
                    </div>
                </div>
            </div>
            <div class="pt-[18px] text-base text-white text-center max-md:pt-[25px]">
                <h1 class="text-[40px] font-extrabold leading-[45px] mb-[13px] max-w-[982px] mx-auto max-sm:text-[38px] max-md:mb-[12px]"><?php the_sub_field('slogan'); ?></h1>
                <div class="text-[#ffffffc7] leading-[23px] mb-[38px] max-md:mb-[25px]">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>