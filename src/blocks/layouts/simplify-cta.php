<section class="simplify-cta">
    <div class="max-w-[1060px] mx-auto">
        <div class="max-md:py-0 max-xl:px-[17px]">
            <div class="relative rounded-[40px] bg-primary p-16 max-sm:px-5 max-md:py-[54px]">
                <div class="flex justify-center items-center gap-[19px] max-lg:flex-col max-lg:text-center">
                    <h2 class="font-extrabold text-[32px] text-white leading-[36px]">
                        <?php
                        if( have_rows('simplify', 'option') ):
                            while( have_rows('simplify', 'option') ) : the_row();
                                the_sub_field('heading');
                            endwhile;
                        endif; ?>    
                    </h2>

                    <?php
                    $start_free_btn = get_field('start_free_btn', 'option');

                    if ( $start_free_btn ) :

                        $start_free_btn_url = $start_free_btn[ 'url' ];
                        $start_free_btn_title = $start_free_btn[ 'title' ];
                        $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                        ?>

                        <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="bg-white !text-primary font-bold text-lg leading-[48px] uppercase py-2.5 px-[40.5px] rounded-[78px] tracking-[0.07em] js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                    <?php endif; ?>

                </div>
                <div class="absolute opacity-50 top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 max-lg:hidden">
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/rectangle-graphic-bg.png"?>" alt="rectangle graphic">
                </div>
            </div>
        </div>
    </div>
</section>