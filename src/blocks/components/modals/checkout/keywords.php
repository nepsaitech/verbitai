<section class="hidden fixed bg-[#00000080] inset-0 justify-center items-center px-[22px] z-[60] keywords" data-type="modal" data-modal="keywords">
    <div>
        <div class="relative bg-white w-[793px] rounded-[20px] py-[30px] px-[35px] overflow-hidden" data-info="content">
            <a href="#" class="inline-block absolute left-[21px] top-5 max-md:top-[18px]" data-close="keywords">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.860614 0.152679C0.665524 -0.042755 0.34922 -0.042755 0.15413 0.152679C-0.0409601 0.348113 -0.0409601 0.664974 0.15413 0.860408L5.29405 6.00939L0.17293 11.1395C-0.0221597 11.335 -0.0221599 11.6518 0.17293 11.8473C0.368021 12.0427 0.684324 12.0427 0.879414 11.8473L6.00054 6.71712L11.1217 11.8473C11.3167 12.0427 11.6331 12.0427 11.8281 11.8473C12.0232 11.6518 12.0232 11.335 11.8281 11.1395L6.70702 6.00939L11.8469 0.860408C12.042 0.664974 12.042 0.348113 11.8469 0.152679C11.6519 -0.042755 11.3355 -0.042755 11.1405 0.152679L6.00054 5.30166L0.860614 0.152679Z" fill="black" fill-opacity="0.5"/></svg>
            </a>

            <div>

                <?php 
                if ( have_rows( 'files_checkout_modal' ) ) :
                    while ( have_rows( 'files_checkout_modal' ) ) : the_row(); 
                        if ( have_rows( 'add_keywords' ) ) :
                            while ( have_rows( 'add_keywords' ) ) : the_row(); 

                                $title = get_sub_field( 'title' );
                                $description = get_sub_field( 'description' );
                                $placeholder = get_sub_field( 'placeholder' );
                                ?>

                                <div class="text-center mb-6">
                                    <h2 class="font-extrabold text-primary text-[22px] leading-[100%] mb-[12px]"><?php echo esc_html( $title ); ?></h2>
                                    <p class="text-[#041D34A6] leading-[23px] -tracking-[0.17px]"><?php echo esc_html( $description ); ?></p>
                                </div>
                                <div class="flex flex-col gap-6">
                                    <textarea class="rounded-[8px] border border-[#71717F33] h-[166px] text-sm italic text-[#031C344D] p-[12px] focus:outline-none focus:border-[#71717F33]" placeholder="<?php echo esc_html( $placeholder ); ?>"></textarea>
                                    <a href="#" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[146px] w-fit rounded-[56px] font-bold mx-auto" data-close="keywords">Save</a>
                                </div>

                            <?php 
                            endwhile; 
                        endif;
                    endwhile; 
                endif; ?>

            </div>
        </div>
    </div>
</section>