<section class="smart-video">
    <div class="max-w-[906px] mx-auto max-lg:max-w-full">
        <div class="-mt-[15rem]">
            <div data-video="audience" class="relative min-h-[283px] rounded-[20px] overflow-hidden audience-video max-lg: rounded-0">
                <figure class="absolute inset-0 z-20">
                    <div class="relative z-10 h-full">
                        <img src="<?php echo the_sub_field('thumbnail'); ?>"  class="max-lg:w-full h-full object-cover" alt="thumbnail">
                    </div>
                </figure>
                <video class="relative z-10 h-full w-full" controls>
                    <source src="<?php echo the_sub_field('video'); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="flex justify-around space-x-7 items-center py-[3rem] mt-[4rem]">
                <div class="flex items-center space-x-4 max-md:flex-col max-md:gap-[1rem] max-md:justify-center max-md:text-center">
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/ai-transcription-logo.png"?>" alt="star rating">
                    <span class="uppercase">ai transcription</span>
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/star-rating.png"?>" alt="star rating">
                </div>
                <div class="flex items-center space-x-4 max-md:flex-col max-md:gap-[1rem] max-md:justify-center max-md:text-center">
                    <img src="<?php echo get_template_directory_uri()."/src/assets/img/clock-rewind.png"?>" alt="star rating">
                    <span class="uppercase"><span class="text-primary max-md:block">3.9M+ Hours</span> Transcribed Yearly</span>
                </div>
            </div>
        </div>
    </div>
</section>