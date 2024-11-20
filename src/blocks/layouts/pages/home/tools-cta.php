<section class="tools-cta">
    <div class="max-w-[1060px] mx-auto">
        <div class="py-[87px] pb-[84px] max-md:pt-[60px] max-xl:px-[17px]">
            <div class="flex justify-center items-center space-x-[59px] max-lg:space-x-7 max-md:flex-col max-md:space-x-0 max-md:space-y-[60px]">

                <?php
                if( have_rows('tools') ):
                    $counter = 0;
                    while( have_rows('tools') ) : the_row();
                        $counter++;
                        $icon        = get_sub_field('icon');
                        $title       = get_sub_field('title');
                        $description = get_sub_field('description');
                        $link        = get_sub_field('link');

                        $box_styles = "bg-secondary text-[#363194]";
                        $btn_styles = "!text-[#363194] border-[#363194]";

                        if ($counter % 2 == 0) {
                            $box_styles = "bg-[#312AB4] text-white";
                            $btn_styles = "!text-white border-white";
                        }

                        ?>
                        
                        <div class="rounded-[40px] pt-[61px] pb-[50px] px-[58px] w-2/4 min-h-[479px] <?php echo $box_styles; ?> max-lg:p-8 max-md:min-h-0 max-md:w-full max-md:py-[29px] max-md:px-[28px]">
                            <img src="<?php echo esc_attr($icon); ?>" class="mb-[39px] max-md:w-[59px] max-md:h-[59px] max-md:mb-[46px]" alt="icon">
                            <h2 class="font-extrabold text-[32px] leading-[36px] mb-3"><?php echo $title; ?></h2>
                            <div class="mb-6">
                                <p><?php echo $description; ?></p>
                            </div>

                            <?php
                            if ($link) :
                                
                                $link_url    = $link[ 'url' ];
                                $link_title  = $link[ 'title' ];
                                $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                            ?>

                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="capitalize px-[18px] rounded-[58px] font-bold leading-[48px] border-2 border-solid max-w-[127px] w-full <?php echo $btn_styles; ?>"><?php echo esc_html( $link_title ); ?></a>

                            <?php endif; ?>

                        </div>

                    <?php
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </div>
</section>