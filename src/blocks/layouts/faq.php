<section class="faq">
    <div class="max-w-[1060px] mx-auto">
        <div class="py-[109px] px-5 max-md:pt-[94px] max-md:pb-[60px]">
            <h2 class="text-[40px] font-extrabold leading-[55px] mb-5 max-md:text-[32px] max-md:leading-[44px]">FAQ</h2>
                
            <?php if( have_rows('item') ): ?>

                <ul class="flex flex-wrap gap-4 max-md:gap-0">

                    <?php
                    while( have_rows('item') ) : the_row();
                        $question = get_sub_field('question');
                        $answer = get_sub_field('answer'); ?>

                        <li class="border-b border-solid border-[#00000033] w-full">
                            <a href="#" class="flex justify-between pt-3 pb-6 focus:outline-none max-md:py-4">
                                <span class="text-xl text-black max-md:text-lg max-md:leading-[25px]"><?php echo $question; ?></span>
                                <svg class="max-md:hidden" xmlns="http://www.w3.org/2000/svg" width="33" height="16" viewBox="0 0 33 16" fill="none"><path d="M1.09863 1.3125L16.7994 14.8125L32.5002 1.3125" stroke="black"/></svg>
                            </a>
                            <div class="hidden mb-4">
                                <p><?php echo $answer; ?></p>
                            </div>
                        </li>

                    <?php endwhile; ?>

                </ul>

            <?php endif; ?>

        </div>
    </div>
</section>