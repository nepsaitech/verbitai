<section class="banner">
    <div class="bg-primary p-8 min-h-[780px] max-sm:pb-[55px] max-md:min-h-0 max-sm:px-6">
        <div class="max-w-screen-xl mx-auto">
            <div class="pt-[139px] text-base text-white text-center">
                <h2 class="text-sm leading-[22px] uppercase tracking-[0.3em] mb-4"><?php the_title(); ?></h2>
                <h1 class="text-[53px] font-[900] leading-[58px] mb-[36px] mx-auto max-sm:text-[38px] max-sm:leading-[41px]">
                <?php the_sub_field('slogan'); ?></h1>
                <div class="font-primary text-lg mb-[38px] -tracking-[0.01em] mx-auto max-sm:mb-[27px] max-sm:text-base max-sm:leading-[23px]">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                <div class="flex flex-col gap-[15px] justify-center text-center items-center mt-[38px] max-sm:mt-[27px]">

                    <?php
                        $start_free_btn = get_field('start_free_btn', 'option');

                        if ( $start_free_btn ) :

                            $start_free_btn_url = $start_free_btn[ 'url' ];
                            $start_free_btn_title = $start_free_btn[ 'title' ];
                            $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                            ?>
                    <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="w-full bg-secondary !text-[#031C34] text-lg uppercase py-5 px-10 rounded-[100px] font-bold tracking-[1px] max-w-[246px] [box-shadow:0px_24px_34px_0px_rgba(0,_0,_0,_0.10)] mx-auto js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                    <?php endif; ?>

                    <p class="text-[13px] text-white">Free trial available</p>
                </div> 
            </div>
        </div>
    </div>
</section>