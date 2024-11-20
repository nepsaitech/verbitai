<?php
    global $post;
    $slug = $post->post_name;
?>

<section class="what-you-get <?php echo $slug; ?>">
    <div class="max-w-[1077px] mx-auto">
        <div class="py-[109px]"> 
            <h2 class="text-center uppercase font-bold tracking-[0.3em] text-xl leading-[19px] mb-[109px]"><?php the_sub_field('heading'); ?></h2>
            <div class="space-y-[200px] max-md:space-y-[85px] max-[1100px]:px-[17px]">

                <?php
                if ( have_rows( 'item' ) ) :

                    $counter = 0;
                    while ( have_rows( 'item' ) ) :
                        the_row();
                        $counter++;
                        $suptitle    = get_sub_field( 'suptitle' );
                        $title       = get_sub_field( 'title' );
                        $description = get_sub_field( 'description' );
                        $image       = get_sub_field( 'image' );
                        
                        $even_row_first_col_styles  = "order-1";
                        $even_row_second_col_styles = "order-2";

                        if ( $counter % 2 == 0 ) {

                            $even_row_first_col_styles  = "order-2";
                            $even_row_second_col_styles = "order-1";
                        }

                        $image_width_style         = "";
                        $title_space_style         = "";
                        $image_position_left_style = "";

                        if ( 1 === $counter ) {

                            $image_width_style = "max-md:max-w-[248px]";
                            $title_space_style = "max-md:mt-[47px]";
                        }

                        if ( 2 === $counter ) {

                            $image_position_left_style = "max-md:left-[16px]";
                        }
                        ?>
                        
                        <div class="flex justify-between items-center feature max-md:flex-col max-md:gap-0 max-lg:gap-[2rem]">
                            <div class="text-left w-full description <?php echo $even_row_first_col_styles; ?> max-md:order-2 max-md:text-center">
                                <h3 class="text-lg leading-5 text-[rgba(0,0,0,0.5)] mb-3 <?php echo $title_space_style; ?>"><?php echo $suptitle; ?></h3>
                                <h2 class="text-[40px] leading-[45px] font-extrabold mb-3 max-md:text-[32px] max-md:leading-[35px]"><?php echo $title; ?></h2>
                                <div class="text-[22px] leading-[30px] mb-6 max-md:text-base max-md:leading-[22px]">
                                    <p><?php echo $description; ?></p>
                                </div>

                                <?php
                                $start_free_btn = get_field('start_free_btn', 'option');

                                if ( $start_free_btn ) :

                                    $start_free_btn_url = $start_free_btn[ 'url' ];
                                    $start_free_btn_title = $start_free_btn[ 'title' ];
                                    $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                                    ?>

                                    <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="bg-primary !text-white font-bold text-lg leading-[48px] uppercase py-2.5 px-[40.5px] rounded-[78px] tracking-[0.07em] js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                                <?php endif; ?>

                            </div>
                            <div class="relative text-left max-w-[555px] w-full <?php echo $even_row_second_col_styles .' '. $image_width_style .' '. $image_position_left_style; ?> max-md:order-1 max-lg:max-w-[400px]">
                                <img src="<?php echo esc_url($image); ?>" alt="featured">
                                
                                <?php 
                                if (1 === $counter && is_front_page()) : 
                                    ?>
        
                                    <ul class="scale-75 absolute top-[43%] -left-[19px] max-sm:-left-[52px] max-sm:top-[29%] max-sm:scale-[0.4] max-md:-left-[33px] max-md:top-[39%] flex justify-center items-center gap-x-[5px] min-h-[150px] wavelength">
                                        <li class="border-none bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="border-none bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                    </ul>
                                    
                                <?php 
                                endif;
                                if (3 === $counter && is_front_page()) : 
                                    ?>
        
                                    <ul class="scale-50 absolute top-[39%] -left-[19px] max-sm:-left-[39px] max-sm:top-[34%] max-sm:scale-[0.4] max-md:-left-[33px] max-md:top-[39%] flex justify-center items-center gap-x-[5px] min-h-[150px] wavelength">
                                        <li class="border-none bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="border-none bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                        <li class="bg-primary w-[8px] rounded-[20px]"></li>
                                    </ul>
                                    
                                <?php endif; ?>

                                <?php if ( 2 === $counter && is_front_page() ) : ?>
                                    <ul class="absolute top-[8.85rem] right-[5rem] flex flex-col gap-y-[10px] max-sm:-right-[2rem] max-sm:-top-[0.32rem]  max-lg:scale-[.7] max-lg:-top-[0.15rem] max-lg:right-0 animate-subtitle">
                                        <li>
                                            <div class="flex justify-center items-center gap-x-[18px]">
                                                <div class="w-[40px] h-[40px] rounded-full bg-[#3DDED1] flex justify-center items-center profile">
                                                    <h2 class="uppercase text-white text-[17px] leading-[23px] font-bold">TS</h2>
                                                </div>
                                                <div class="relative flex flex-col justify-center flex-[1_0_auto] max-w-[238px] min-h-[54px] w-full bg-white rounded-[13px] pt-[13px] pb-2 px-[7px] [box-shadow:0px_21px_36px_0px_#5148F933] chat">
                                                    <p class="text-right text-sm leading-[19px] text-black z-[1]">That's it for now, please update me.</p>
                                                    <span class="block text-right text-[10px] leading-[14px] font-bold uppercase text-[#00000033] z-[1]">now</span>
                                                    <div class="bg-white w-4 h-4 rounded-[3px] -rotate-45 absolute top-2/4 -translate-y-2/4 -left-[3px]"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex justify-center items-center gap-x-[18px]">
                                                <div class="w-[40px] h-[40px] rounded-full bg-[#FDB525] flex justify-center items-center profile">
                                                    <h2 class="uppercase text-white text-[17px] leading-[23px] font-bold">NR</h2>
                                                </div>
                                                <div class="relative flex flex-col justify-center flex-[1_0_auto] max-w-[238px] min-h-[54px] w-full bg-white rounded-[13px] pt-[13px] pb-2 px-[23px] [box-shadow:0px_21px_36px_0px_#5148F933] chat">
                                                    <p class="text-right text-sm leading-[19px] text-black z-[1]">Great, what about the review?</p>
                                                    <span class="block text-right text-[10px] leading-[14px] font-bold uppercase text-[#00000033] z-[1]">now</span>
                                                    <div class="bg-white w-4 h-4 rounded-[3px] -rotate-45 absolute top-2/4 -translate-y-2/4 -left-[3px]"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex justify-center items-center gap-x-[18px]">
                                                <div class="w-[40px] h-[40px] rounded-full bg-[#EA4335] flex justify-center items-center profile">
                                                    <h2 class="uppercase text-white text-[17px] leading-[23px] font-bold">ED</h2>
                                                </div>
                                                <div class="relative flex flex-col justify-center flex-[1_0_auto] max-w-[238px] min-h-[54px] w-full bg-white rounded-[13px] pt-[13px] pb-2 px-[25px] [box-shadow:0px_21px_36px_0px_#5148F933] chat">
                                                    <p class="text-right text-sm leading-[19px] text-black z-[1">Agree, will update soon.</p>
                                                    <span class="block text-right text-[10px] leading-[14px] font-bold uppercase text-[#00000033] z-[1]">now</span>
                                                    <div class="bg-white w-4 h-4 rounded-[3px] -rotate-45 absolute top-2/4 -translate-y-2/4 -left-[3px]"></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                <?php endif; ?>

                                <?php 
                                if ( 1 === $counter ) :
                                    if ( have_rows( 'social_media', 'option' ) ) : 
                                        while ( have_rows( 'social_media', 'option' ) ) :
                                            the_row();
                                            ?>

                                            <div class="absolute left-[2.1rem] bottom-[3.4rem] flex items-center justify-center gap-x-[24px] max-md:-bottom-[31px] max-md:left-[3%]">

                                                <?php
                                                if ( have_rows( 'what_you_get_section' ) ) : 
                                                    while ( have_rows( 'what_you_get_section' ) ) :
                                                        the_row();

                                                        if ( have_rows( 'item' ) ) : 
                                                            while ( have_rows( 'item' ) ) :
                                                                the_row();

                                                                $logo = get_sub_field( 'logo' );
                                                                $link = get_sub_field( 'link' );

                                                                if ( $logo ) :
                                                                    $logo_url    = $logo['url'];
                                                                    $logo_alt    = $logo['alt'];
                                                                    $link_url    = $link['url'];
                                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                                                    ?>

                                                                    <div><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>"></a></div>
                                                            
                                                                <?php 
                                                                endif;
                                                            endwhile;  
                                                        endif;
                                                    endwhile;  
                                                endif; ?>

                                            </div>

                                        <?php
                                        endwhile;
                                    endif;
                                endif; 
                                ?>

                            </div>
                        </div>

                    <?php 
                    endwhile;
                else :
                    // Do something...
                endif;
                ?>

            </div>
        </div>
    </div>
</section>