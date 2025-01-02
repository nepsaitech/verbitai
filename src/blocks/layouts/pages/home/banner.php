<section class="banner">
    <div class="relative bg-primary p-8 min-h-[776px] max-sm:pb-6 max-md:min-h-[1070px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="relative pt-[130px] text-base text-white text-center z-10">
                <h1 class="text-[62px] font-[900] leading-[68px] mb-[12px] max-w-[982px] mx-auto max-sm:text-[38px] max-sm:leading-[41px]">
                <?php the_sub_field('slogan'); ?></h1>
                <div class="font-secondary text-lg mb-[38px] max-w-[670px] mx-auto max-sm:mb-[27px] max-sm:text-base max-sm:leading-[23px]">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
                
                <?php
                $args = array(
                    'post_type'      => 'vertical',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                );

                $verticals = new WP_Query($args);

                if ($verticals->have_posts()) : ?>

                    <ul class="flex gap-[14px] justify-center items-stretch max-md:flex-wrap max-sm:gap-[7px]">

                        <?php 
                        while ( $verticals->have_posts() ) :
                            $verticals->the_post(); 
                            $id = get_the_ID();
                            $title = get_the_title();
                            $slug = get_post_field( 'post_name', get_the_ID() );
                            $custom_titles = [
                                'media' => 'Media Production',
                                'corporate' => 'Corporate & General Business',
                                'legal-and-government' => '<span class="block max-sm:hidden">Legal &</span> Government',
                            ];
                            $title = $custom_titles[$slug] ?? get_the_title();
                            ?>

                            <li class="flex-grow basis-full max-w-[145px] max-sm:max-w-fit">
                                <label href="<?php echo esc_attr( the_permalink() ); ?>" class="relative text-black flex flex-col bg-white rounded-[20px] min-h-[166px] w-full h-full text-sm justify-center items-center pt-[38px] px-[17px] pb-[15px] cursor-pointer max-sm:py-[1px] max-sm:px-[18px] max-sm:min-h-0 max-sm:flex-row max-sm:rounded-[37px] max-sm:bg-transparent max-sm:border max-sm:border-solid max-sm:border-white max-sm:!text-white max-sm:justify-start max-sm:gap-[.5rem]">
                                    <input id="vertical" class="peer hidden" type="radio" name="vertical" data-name="<?php echo esc_attr( $slug ); ?>" data-id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
                                    <div class="block peer-checked:hidden absolute left-[16px] top-[16px] border border-solid border-black w-[16px] h-[16px] rounded-[3px] max-sm:static max-sm:border-white"></div>
                                    <div class="hidden peer-checked:flex justify-center items-center absolute left-[16px] top-[16px] border border-solid border-primary bg-primary w-[16px] h-[16px] rounded-[3px] max-sm:static max-sm:border-white">
                                        <svg width="9" height="8" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.74707 2.85156L2.62049 4.85156L6.36732 0.851562" stroke="white"/></svg>
                                    </div>
                                    <figure class="w-[52px] h-[52px] mb-[21px] max-sm:hidden"><?php the_post_thumbnail(); ?></figure>
                                    <span class="text-sm leading-[19px] text-[#030404] max-sm:text-white max-sm:leading-[42px]"><?php echo $title; ?></span>
                                </label>
                            </li>

                        <?php
                        endwhile;
                        wp_reset_postdata(); 
                        ?>

                    </ul>

                <?php endif; ?>

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

        <?php
        $background_image = get_sub_field( 'background_image' );
    
        if ( $background_image ) :
    
            $background_image_url = $background_image[ 'url' ];
            $background_image_alt = $background_image[ 'alt' ];
            ?>
    
            <img src="<?php echo esc_url( $background_image_url ); ?>" class="absolute left-0 bottom-0" alt="<?php echo esc_attr( $background_image_alt ); ?>">
    
        <?php endif; ?>

    </div>
</section>