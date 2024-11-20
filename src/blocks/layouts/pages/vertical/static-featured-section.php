<?php
    global $post;
    $slug = $post->post_name;
?>

<section class="static-featured-section <?php echo $slug; ?>">
    <div class="max-w-screen-xl mx-auto">
        <div class="py-20 px-5">
            <h2 class="text-center uppercase font-bold tracking-[5px] text-xl mb-[110px]"><?php the_sub_field('heading'); ?></h2>

            <?php
            if( have_rows('item') ):
                $counter = 0;
                while( have_rows('item') ) : the_row();
                    $counter++;
                    $title       = get_sub_field('title');
                    $description = get_sub_field('description');
                    $image       = get_sub_field('image');
                    
                    $even_row_first_col_styles = "order-1";
                    $even_row_second_col_styles = "order-2";

                    if ($counter % 2 == 0) {
                        $even_row_first_col_styles = "order-2";
                        $even_row_second_col_styles = "order-1";
                    }
                    ?>
                    
                    <div class="flex justify-around items-center feature max-md:flex-col max-md:gap-[4rem]">
                        <div class="text-left <?php echo $even_row_first_col_styles; ?> description max-md:order-2 max-md:text-center">
                            <h2 class="text-4xl font-extrabold mb-3"><?php echo $title; ?></h2>
                            <div class="text-[22px] leading-[30px] mb-6">
                                <p><?php echo $description; ?></p>
                            </div>

                            <?php
                            if ( $start_free_btn ) :

                                $start_free_btn_url = $start_free_btn[ 'url' ];
                                $start_free_btn_title = $start_free_btn[ 'title' ];
                                $start_free_btn_target = $start_free_btn[ 'target' ] ? $start_free_btn[ 'target' ] : '_self';
                                ?>

                            <a href="<?php echo esc_url( $start_free_btn_url ); ?>" target="<?php echo esc_attr( $start_free_btn_target ); ?>" class="bg-primary !text-white uppercase py-5 px-10 rounded-[100px] font-bold tracking-[1px] js-start-free-btn"><?php echo esc_html( $start_free_btn_title ); ?></a>

                            <?php endif; ?>

                        </div>
                        <div class="relative max-w-[555px] w-full text-left <?php echo $even_row_second_col_styles; ?> max-lg:max-w-[400px] max-md:order-1">
                            <?php
                            if (1 === $counter && is_single(22)) : ?>

                                <div class="max-md:mb-5">
                                    <div class="flex justify-end relative max-[440px]:left-[15px] max-[440px]:scale-[0.7] max-md:scale-[0.8] max-md:justify-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/benefits-triangle-bg.png" alt="benefits triangle bg">
                                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/benefits-trace-triangle-bg.png" class="absolute top-[2px] right-[17px] max-md:right-auto max-md:left-0" alt="benefits trace triangle bg">
                                        <img src="<?php echo esc_url($image); ?>" class="absolute top-[84px] right-[54px] z-[2] max-[440px]:max-w-[217px] max-[440px]:left-auto max-[440px]:right-[43px] max-md:max-w-[270px] max-md:inset-x-0 max-md:m-auto" alt="featured">
                                        <ul class="scale-[0.7] absolute top-[31px] left-[86px] flex justify-center items-center gap-x-[5px] min-h-[150px] z-[1] wavelength max-[440px]:-left-[29px] max-md:-left-0">
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
                                    </div>
                                    <ul class="flex flex-col gap-y-[11px] w-fit absolute left-[63px] top-2/4 z-[3] max-[440px]:scale-[0.6] max-[440px]:-left-[42px] max-[440px]:top-auto max-[440px]:bottom-[88px] max-md:-left-0 max-md:scale-[0.8]">
                                        <li class="bg-white flex items-center rounded-[4.5px] py-[6px] px-[12px] [box-shadow:0px_21px_36px_0px_#5148F933] w-fit gap-[6px]">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.5 4.14111C17.43 4.14111 17.895 4.14111 18.2765 4.24334C19.3117 4.52074 20.1204 5.32938 20.3978 6.36466C20.5 6.74616 20.5 7.21114 20.5 8.14111V17.3411C20.5 19.0213 20.5 19.8614 20.173 20.5031C19.8854 21.0676 19.4265 21.5265 18.862 21.8141C18.2202 22.1411 17.3802 22.1411 15.7 22.1411H9.3C7.61984 22.1411 6.77976 22.1411 6.13803 21.8141C5.57354 21.5265 5.1146 21.0676 4.82698 20.5031C4.5 19.8614 4.5 19.0213 4.5 17.3411V8.14111C4.5 7.21114 4.5 6.74616 4.60222 6.36466C4.87962 5.32938 5.68827 4.52074 6.72354 4.24334C7.10504 4.14111 7.57003 4.14111 8.5 4.14111M9.5 15.1411L11.5 17.1411L16 12.6411M10.1 6.14111H14.9C15.4601 6.14111 15.7401 6.14111 15.954 6.03212C16.1422 5.93625 16.2951 5.78327 16.391 5.5951C16.5 5.38119 16.5 5.10117 16.5 4.54111V3.74111C16.5 3.18106 16.5 2.90103 16.391 2.68712C16.2951 2.49896 16.1422 2.34598 15.954 2.25011C15.7401 2.14111 15.4601 2.14111 14.9 2.14111H10.1C9.53995 2.14111 9.25992 2.14111 9.04601 2.25011C8.85785 2.34598 8.70487 2.49896 8.60899 2.68712C8.5 2.90103 8.5 3.18106 8.5 3.74111V4.54111C8.5 5.10117 8.5 5.38119 8.60899 5.5951C8.70487 5.78327 8.85785 5.93625 9.04601 6.03212C9.25992 6.14111 9.53995 6.14111 10.1 6.14111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <p class="text-[#041D34A6] text-lg leading-[35px] -tracking-[0.25px]">Generate Tests</p>
                                        </li>
                                        <li class="bg-white flex items-center rounded-[4.5px] py-[6px] px-[12px] [box-shadow:0px_21px_36px_0px_#5148F933] w-fit gap-[6px] ml-[42px]">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5 10.6411V6.94111C20.5 5.26096 20.5 4.42088 20.173 3.77914C19.8854 3.21466 19.4265 2.75571 18.862 2.46809C18.2202 2.14111 17.3802 2.14111 15.7 2.14111H9.3C7.61984 2.14111 6.77976 2.14111 6.13803 2.46809C5.57354 2.75571 5.1146 3.21466 4.82698 3.77914C4.5 4.42088 4.5 5.26096 4.5 6.94111V17.3411C4.5 19.0213 4.5 19.8613 4.82698 20.5031C5.1146 21.0676 5.57354 21.5265 6.13803 21.8141C6.77976 22.1411 7.61984 22.1411 9.3 22.1411H12.5M14.5 11.1411H8.5M10.5 15.1411H8.5M16.5 7.14111H8.5M18.5 21.1411V15.1411M15.5 18.1411H21.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <p class="text-[#041D34A6] text-lg leading-[35px] -tracking-[0.25px]">Add New Comment</p>
                                        </li>
                                        <li class="bg-white flex items-center rounded-[4.5px] py-[6px] px-[12px] [box-shadow:0px_21px_36px_0px_#5148F933] w-fit gap-[6px] ml-[84px]">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.09 13.6511L15.92 17.6311M15.91 6.65111L9.09 10.6311M21.5 5.14111C21.5 6.79797 20.1569 8.14111 18.5 8.14111C16.8431 8.14111 15.5 6.79797 15.5 5.14111C15.5 3.48426 16.8431 2.14111 18.5 2.14111C20.1569 2.14111 21.5 3.48426 21.5 5.14111ZM9.5 12.1411C9.5 13.798 8.15685 15.1411 6.5 15.1411C4.84315 15.1411 3.5 13.798 3.5 12.1411C3.5 10.4843 4.84315 9.14111 6.5 9.14111C8.15685 9.14111 9.5 10.4843 9.5 12.1411ZM21.5 19.1411C21.5 20.798 20.1569 22.1411 18.5 22.1411C16.8431 22.1411 15.5 20.798 15.5 19.1411C15.5 17.4843 16.8431 16.1411 18.5 16.1411C20.1569 16.1411 21.5 17.4843 21.5 19.1411Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <p class="text-[#041D34A6] text-lg leading-[35px] -tracking-[0.25px]">Share with students</p>
                                        </li>
                                    </ul>
                                </div>

                            <?php else : ?>

                                <img src="<?php echo esc_url($image); ?>" alt="featured">

                            <?php endif; ?>

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
</section>