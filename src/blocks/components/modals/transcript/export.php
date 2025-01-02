<section class="hidden fixed bg-[#00000080] inset-0 justify-center items-center px-[22px] z-[60] export" data-type="modal" data-modal="export">
    <div>
        <div class="relative bg-white w-[331px] min-h-[435px] rounded-[20px] pt-[45px] px-[25px] overflow-hidden" data-info="content">
            <a href="#" class="inline-block absolute left-[21px] top-5 max-md:top-[18px]" data-close="export">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.860614 0.152679C0.665524 -0.042755 0.34922 -0.042755 0.15413 0.152679C-0.0409601 0.348113 -0.0409601 0.664974 0.15413 0.860408L5.29405 6.00939L0.17293 11.1395C-0.0221597 11.335 -0.0221599 11.6518 0.17293 11.8473C0.368021 12.0427 0.684324 12.0427 0.879414 11.8473L6.00054 6.71712L11.1217 11.8473C11.3167 12.0427 11.6331 12.0427 11.8281 11.8473C12.0232 11.6518 12.0232 11.335 11.8281 11.1395L6.70702 6.00939L11.8469 0.860408C12.042 0.664974 12.042 0.348113 11.8469 0.152679C11.6519 -0.042755 11.3355 -0.042755 11.1405 0.152679L6.00054 5.30166L0.860614 0.152679Z" fill="black" fill-opacity="0.5"/></svg>
            </a>

            <?php 
            if ( have_rows( 'content' ) ):
                while ( have_rows( 'content' ) ) : the_row(); 
                
                $title       = get_sub_field( 'title' );
                $description = get_sub_field( 'description' );
                $link        = get_sub_field( 'link' );
                ?>

                    <div class="text-center mb-6"> 
                        <h2 class="text-black text-[22px] leading-[28px] font-extrabold mb-1"><?php echo esc_html( $title ); ?></h2>
                        <p class="text-[#041D34A6] leading-[23px] -tracking-[0.17px]"><?php echo esc_html( $description ); ?></p>
                    </div>
                    <div data-action="export-file-selection" id="export-format">
                        <div class="export-field mb-6">
                            <label for="export-format" class="text-sm leading-[21px] block mb-[3px]">Select the format</label>
                            <div class="relative">
                                <span class="absolute left-[17px] top-2/4 -translate-y-2/4"><svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.23763 1.04004V3.44952C7.23763 3.77622 7.23763 3.93957 7.30121 4.06435C7.35714 4.17411 7.44637 4.26335 7.55614 4.31927C7.68092 4.38285 7.84427 4.38285 8.17096 4.38285H10.5804M7.23763 0.882812H4.2043C3.22421 0.882812 2.73416 0.882812 2.35981 1.07355C2.03053 1.24133 1.76281 1.50905 1.59504 1.83833C1.4043 2.21267 1.4043 2.70272 1.4043 3.68281V9.74948C1.4043 10.7296 1.4043 11.2196 1.59504 11.594C1.76281 11.9232 2.03053 12.191 2.35981 12.3587C2.73416 12.5495 3.22421 12.5495 4.2043 12.5495H7.93763C8.91772 12.5495 9.40777 12.5495 9.78211 12.3587C10.1114 12.191 10.3791 11.9232 10.5469 11.594C10.7376 11.2196 10.7376 10.7296 10.7376 9.74948V4.38281L7.23763 0.882812Z" stroke="#5148F9" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <select id="file-format-selection" name="export-format" class="border border-[#71717F33] rounded-[8px] text-sm leading-[48px] text-[#031C34] h-[48px] pl-[37px] w-full">
                                    <option value="txt">Text document (.txt)</option>
                                    <option value="docx">Document Format (.docx)</option>
                                    <option value="srt">SubRip Subtitle Format (.srt)</option>
                                    <option value="web_vtt">Web Video Text Tracks (.web_vtt)</option>
                                    <option value="sami">Synchronized Accessible Media Interchange (.sami)</option>
                                    <option value="pdf">Portable Document Format (.pdf)</option>
                                </select>
                                <span class="flex items-center justify-center absolute right-[5px] top-2/4 -translate-y-2/4 bg-white w-[30px] h-[10px]"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.63937 4.06766L6.0299 1.67713C6.44987 1.25716 6.15243 0.539062 5.55849 0.539062H0.777445C0.183508 0.539062 -0.113938 1.25716 0.306039 1.67713L2.69656 4.06766C2.95691 4.32801 3.37902 4.32801 3.63937 4.06766Z" fill="#696969"/></svg></span>
                                <span class="hidden absolute right-[32px] top-2/4 -translate-y-2/4 justify-center items-center bg-primary text-[8px] tracking-[10%] rounded-[40px] text-white text-center font-extrabold max-w-[29px] w-full min-h-[18px] leading-[9px] uppercase js-pro-tag">pro</span>
                            </div>
                        </div>
                        <div class="mb-[40px]" data-filetype="txt">
                            <div class="mb-6">
                                <?php 
                                if ( have_rows( 'toggle_labels' ) ):
                                    while ( have_rows( 'toggle_labels' ) ) : the_row(); 

                                        $first_label  = get_sub_field( 'first' );
                                        $second_label = get_sub_field( 'second' );
                                        ?>

                                        <label for="show-time-code" class="flex justify-between items-center">
                                            <p class="text-sm leading-[48px]"><?php echo esc_html( $first_label ); ?></p>
                                            <input type="checkbox" id="show-time-code" name="show-time-code" class=
                                            "peer hidden" value="show-time-code">
                                            <div class="bg-[#5148F91A] flex w-[35px] peer-checked:justify-end peer-checked:bg-primary rounded-[26px] p-[2px]">
                                                <span class="inline-block rounded-full w-[18px] h-[18px] bg-white"></span>
                                            </div>
                                        </label>
                                        <label for="show-speaker-name" class="flex justify-between items-center">
                                            <p class="text-sm leading-[48px]"><?php echo esc_html( $second_label ); ?></p>
                                            <input type="checkbox" id="show-speaker-name" name="show-speaker-name" class=
                                            "peer hidden" value="show-speaker-name">
                                            <div class="bg-[#5148F91A] flex w-[35px] peer-checked:justify-end peer-checked:bg-primary rounded-[26px] p-[2px]">
                                                <span class="inline-block rounded-full w-[18px] h-[18px] bg-white"></span>
                                            </div>
                                        </label>
                                        
                                    <?php
                                    endwhile;
                                endif; ?>
                                
                            </div>

                            <?php 
                            if ( $link ) :

                                $link_url    = $link[ 'url' ];
                                $link_title  = $link[ 'title' ];
                                $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                                ?>

                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" id="file-export-btn" class="relative block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-5 rounded-[56px] font-bold max-w-[298px] w-full"><?php echo esc_html( $link_title ); ?></a>

                            <?php endif; ?>

                        </div>
                        <div class="text-center rounded-[10px] bg-[linear-gradient(130.39deg,_rgba(255,_255,_255,_0.1)_7.94%,_rgba(48,_43,_147,_0.1)_72.98%)] py-[30px] px-[21px] mb-[23px] hidden" data-filetype="docx">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/export-format-icon.png" alt="export format icon" class="mx-auto">
                            <div class="mb-[17px]">
                                <h2 class="text-black leading-[22px] font-bold">Export in many formats</h2>
                                <p class="text-[#041D34A6] -tracking-[0.17px] leading-[23px]">Upgrade your plan to get full access to all formats</p>
                            </div>
                            <a href="#" class="relative block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-5 rounded-[56px] mx-auto font-bold max-w-[203px] w-full">Upgrade Now</a>
                        </div>
                    </div>
                    
                    <?php
                endwhile;
            endif; ?>

        </div>
    </div>
</section>