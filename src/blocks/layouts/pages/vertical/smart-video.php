<section class="smart-video">
    <div class="max-w-[906px] mx-auto max-lg:max-w-full">
        <div class="relative -mt-[11.1rem] max-md:mt-0">
            <div class="relative rounded-[20px] max-lg:rounded-0">

                <?php 
                $thumbnail = get_sub_field('thumbnail');
                $subtitle = get_sub_field('subtitle');

                if( $thumbnail ): 
                    $thumbnail_url = $thumbnail['url'];
                    $thumbnail_alt = $thumbnail['alt'];

                    if ($subtitle) {
                        $subtitle_url = $subtitle['url'];
                        $subtitle_alt = $subtitle['alt'];
                    }
                ?>
                    <figure>
                        <div class="relative z-10 max-md:pt-[60%] max-md:overflow-hidden">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" class="max-lg:w-full max-lg:h-full max-md:absolute max-md:top-2/4 max-md:left-2/4 max-md:-translate-x-2/4 max-md:-translate-y-2/4 max-md:w-[104%] max-md:max-w-[500%]" alt="<?php echo esc_attr($thumbnail_alt); ?>">
                            
                            <!-- Education Interactive Subtitle -->
                            <?php if (is_single(21)) : ?>

                                <img src="<?php echo esc_url($subtitle_url); ?>" class="absolute -right-[103px] top-[72px] max-md:hidden max-xl:right-0" alt="<?php echo esc_attr($subtitle_alt); ?>">

                            <?php endif; ?>
                            
                            <!-- Video Play Button -->
                            <?php
                            if( have_rows('video_button') ):
                                while( have_rows('video_button') ) : the_row(); 
                                    $desktop = get_sub_field('desktop');
                                    $mobile = get_sub_field('mobile');

                                    $desktop_url = $desktop['url'];
                                    $mobile_url = $mobile['url'];
                                ?>
                                    <img src="<?php echo esc_url($desktop_url); ?>" class="absolute left-2/4 top-2/4 -translate-x-[37%] -translate-y-[28%] max-md:hidden" alt="play button">
                                    <img src="<?php echo esc_url($mobile_url); ?>" class="absolute left-2/4 top-2/4 -translate-x-[37%] -translate-y-[28%] hidden max-md:block" alt="play button">
                                <?php endwhile; ?>
                            <?php endif; ?>
                            
                            <?php
                                $bg_color = 'bg-[#5148F94D]';
                                $text_color = 'text-white';

                                if (is_single(20)) {
                                    $bg_color = 'bg-[#FFFFFF1A]';
                                } elseif (is_single(24)) {
                                    $text_color = 'text-primary';
                                }
                            ?>

                            <h2 class="absolute left-6 bottom-5 text-[42px] font-bold leading-[42px] <?php echo $text_color; ?> max-w-[157px] w-full max-sm:text-[21px] max-sm:leading-[21px] max-sm:top-[57px] max-sm:bottom-auto max-sm:max-w-[80px] max-sm:left-[18px]">How it works?</h2>
                            
                            <!-- Smart Video Interactive Subtitle -->
                            <?php if (!is_single(21)) : ?>
                                
                                <div class="absolute -right-[5%] -top-[14%] <?php echo $bg_color; ?>  backdrop-filter backdrop-blur-[28.350000381469727px] [box-shadow:0px_25.35px_27.85px_0px_#00000026] text-white text-center py-[14px] px-[25px] rounded-[20px] rounded-es-none max-w-[241px] max-[1030px]:right-0 max-md:hidden">
                                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/smart-video-quote.png"?>" class="w-[104px] h-[68px] mx-auto mb-[2px] opacity-30" alt="subtitle">
                                    <h2 class="font-extrabold text-[22px] leading-[25px] mb-[10px]">Now I can focus on the things that really matter</h2>
                                    <span class="text-sm leading-[19px] block mx-auto">David Bertallo,<br> Student NYC, NY</span>
                                </div>

                            <?php endif; ?>

                        </div>
                    </figure>
                    <!-- <video class="relative z-10 h-full w-full rounded-[20px]" controls>
                        <source src="<!?php echo get_template_directory_uri()."/src/assets/video/video.mp4"?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                <?php endif; ?>
            </div>
            <div class="flex justify-around space-x-7 items-center mt-[37px] max-md:mt-[67px] max-md:space-x-0 max-md:gap-10 max-md:justify-center">
                <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/ai-transcription-logo.png"?>" class="max-md:order-1 max-md:mb-[9px]" alt="star rating">
                    <span class="uppercase text-xs font-[500] leading-[32px] max-md:order-3">ai transcription</span>
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/star-rating.png"?>" class="max-md:order-2 max-md:mb-[2px]" alt="star rating">
                </div>
                <div class="flex items-center gap-[5px] max-md:flex-col max-md:gap-0 max-md:justify-center max-md:text-center">
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/clock-rewind.png"?>" alt="star rating">
                    <span class="uppercase text-xs font-normal leading-[32px] max-md:leading-[26px]"><span class="text-primary font-bold max-md:block">3.9M+ Hours</span>  Transcribed Yearly</span>
                </div>
            </div>
        </div>
    </div>
</section>