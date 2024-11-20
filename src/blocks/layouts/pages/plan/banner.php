<section class="banner">
    <div class="bg-primary pb-2 px-4 min-h-[595px] max-md:pt-8 max-[880px]:min-h-0 max-[880px]:pb-0">
        <div class="max-w-screen-xl mx-auto">
            <div class="pt-[122px] max-sm:pt-[104px] max-xl:pt-[133px]">
                <div class="flex justify-center items-center text-center relative gap-2.5 w-full phase">
                    <div>
                        <label for="file" class="text-xs leading-[11px] font-bold text-white block -mb-1">Set Account</label>
                        <progress id="file" value="75" max="100">75%</progress>
                    </div>
                    <div>
                        <label for="file" class="text-xs leading-[11px] text-[#FFFFFF66] block -mb-1">Upload</label>
                        <progress id="file" value="0" max="100" class="opacity-50">0%</progress>
                    </div>
                    <div>
                        <label for="file" class="text-xs leading-[11px] font-normal text-[#FFFFFF66] block -mb-1">Complete Order</label>
                        <progress id="file" value="0" max="100" class="opacity-50">0%</progress>
                    </div>
                </div>
            </div>
            <div class="pt-[49px] text-base text-white text-center max-md:pt-[25px]">
                <div class="text-[#FFFFFFB3] leading-[23px]">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                <h1 class="text-[40px] font-extrabold leading-[45px] max-w-[982px] mx-auto"><?php the_sub_field('slogan'); ?></h1>
            </div>
        </div>
    </div>
</section>