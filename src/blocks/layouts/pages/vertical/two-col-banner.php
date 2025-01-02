<section class="banner">
    <div class="bg-primary p-8 min-h-[900px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="py-20 text-base text-white text-center">
                <h2 class="text-sm uppercase tracking-[.8rem] mb-9"><?php the_title(); ?></h2>
                <h1 class="text-[62px] font-[900] leading-[110%] mb-[2rem] max-w-[982px] mx-auto max-sm:text-[38px]"><?php the_sub_field('slogan'); ?></h1>
                <div class="text-lg mb-[4rem] max-w-[670px] mx-auto">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                <div class="flex flex-col space-y-[1rem] justify-center text-center items-center mt-[3rem]">
                    <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="w-fit bg-secondary !text-[#031C34] uppercase py-5 px-10 rounded-[100px] font-bold tracking-[1px] [box-shadow:0px_24px_34px_0px_rgba(0,_0,_0,_0.10)] mx-auto">Start for free</a>
                    <p class="text-[13px] text-white">Free trial available</p>
                </div> 
            </div>
        </div>
    </div>
</section>