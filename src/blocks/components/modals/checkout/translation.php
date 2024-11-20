<section class="hidden fixed bg-[#00000080] inset-0 justify-center items-center px-[22px] z-[60] translation" data-type="modal" data-modal="translation">
    <div>
        <div class="relative bg-white w-[793px] rounded-[20px] py-[30px] px-[35px] overflow-hidden" data-info="content">
            <a href="#" class="inline-block absolute left-[21px] top-5 max-md:top-[18px]" data-close="translation">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.860614 0.152679C0.665524 -0.042755 0.34922 -0.042755 0.15413 0.152679C-0.0409601 0.348113 -0.0409601 0.664974 0.15413 0.860408L5.29405 6.00939L0.17293 11.1395C-0.0221597 11.335 -0.0221599 11.6518 0.17293 11.8473C0.368021 12.0427 0.684324 12.0427 0.879414 11.8473L6.00054 6.71712L11.1217 11.8473C11.3167 12.0427 11.6331 12.0427 11.8281 11.8473C12.0232 11.6518 12.0232 11.335 11.8281 11.1395L6.70702 6.00939L11.8469 0.860408C12.042 0.664974 12.042 0.348113 11.8469 0.152679C11.6519 -0.042755 11.3355 -0.042755 11.1405 0.152679L6.00054 5.30166L0.860614 0.152679Z" fill="black" fill-opacity="0.5"/></svg>
            </a>

            <div>
                <div class="text-center mb-6">

                    <?php 
                    if ( have_rows( 'files_checkout_modal' ) ) :
                        while ( have_rows( 'files_checkout_modal' ) ) : the_row(); 
                            if ( have_rows( 'translation_settings' ) ) :
                                while ( have_rows( 'translation_settings' ) ) : the_row(); 

                                    $title = get_sub_field( 'title' );
                                    $description = get_sub_field( 'description' );
                                    ?>

                                    <h2 class="font-extrabold text-primary text-[22px] leading-[100%] mb-[12px]"><?php echo esc_html( $title ); ?></h2>
                                    <p class="text-[#041D34A6] leading-[23px] -tracking-[0.17px]"><?php echo esc_html( $description ); ?></p>

                                <?php 
                                endwhile; 
                            endif;
                        endwhile; 
                    endif; ?>

                </div>
                <div class="flex flex-col gap-6">
                    <ul class="flex flex-col gap-[12px]">
                        <li class="border border-[#EFEFEF] rounded-[20px] p-5">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                <div class="flex items-center gap-[11px]">
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Source</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English <span class="text-[#041D344D]">(Default)</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Target</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="border border-[#EFEFEF] rounded-[20px] p-5">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                <div class="flex items-center gap-[11px]">
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Source</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English <span class="text-[#041D344D]">(Default)</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Target</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="border border-[#EFEFEF] rounded-[20px] p-5">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-[#000000A6] text-sm leading-[100%] -tracking-[0.38px]">audiod65.wav</span>
                                <div class="flex items-center gap-[11px]">
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Source</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English <span class="text-[#041D344D]">(Default)</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="flex items-center gap-[11px]">
                                        <label for="" class="inline-block text-xs leading-[23px] text-[#041D34A6]">Target</label>
                                        <a href="#" class="bg-white flex items-center gap-[5px] !text-[#041D34A6] py-[1.9px] px-[8.4px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center text-xs leading-[31px] max-md:px-[8.5px]">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.03293 9.91667H12.2177M8.03293 9.91667L6.91699 12.25M8.03293 9.91667L9.70433 6.42193C9.83901 6.14033 9.90635 5.99952 9.99849 5.95503C10.0786 5.91633 10.172 5.91633 10.2522 5.95503C10.3443 5.99952 10.4116 6.14033 10.5463 6.42193L12.2177 9.91667M12.2177 9.91667L13.3337 12.25M1.66699 2.91667H5.16699M5.16699 2.91667H7.20866M5.16699 2.91667V1.75M7.20866 2.91667H8.66699M7.20866 2.91667C6.91924 4.64175 6.24767 6.20444 5.26356 7.51592M6.33366 8.16667C5.97635 8.00614 5.61187 7.78288 5.26356 7.51592M5.26356 7.51592C4.47459 6.91119 3.7686 6.0822 3.41699 5.25M5.26356 7.51592C4.32749 8.76338 3.10866 9.78355 1.66699 10.5" stroke="black" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            English</span>
                                            <span class="inline-block">
                                                <svg width="7" height="4" viewBox="0 0 7 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.9714 3.5286L6.36193 1.13807C6.78191 0.718095 6.48446 0 5.89052 0H1.10948C0.515539 0 0.218094 0.718094 0.63807 1.13807L3.0286 3.5286C3.28895 3.78895 3.71105 3.78895 3.9714 3.5286Z" fill="#696969"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-2.5 min-w-[146px] w-fit rounded-[56px] font-bold mx-auto" data-close="translation">Save</a>
                </div>
            </div>

        </div>
    </div>
</section>