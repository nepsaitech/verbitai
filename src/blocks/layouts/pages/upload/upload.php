<section class="before-platform-upload">
    <div class="-mt-[12.1rem] max-md:mt-0">
        <div class="max-w-screen-xl mx-auto">
            <div class="bg-white [box-shadow:0px_7px_8px_0px_#5148F91A] rounded-[40px] p-[40px] max-w-[796px] mb-[75px] mx-auto">
                <ul class="flex items-start justify-between mb-[44px] max-md:bg-primary">
                    <li class="grow-0 shrink-0 max-w-[394px] w-full text-[#041D34] text-center max-md:max-w-full">
                        <div class="max-w-[342px]" data-toggle="upload">
                            <form class="w-full flex flex-col bg-[#5148F90D] border-2 border-dashed border-[#5148F980] rounded-[30px] pt-[33px] pb-[28px] px-6 min-h-[207px] max-md:min-h-0 max-md:justify-start max-md:p-0 max-md:border-0 max-md:bg-transparent js-upload-form">
                                <div class="max-md:flex max-md:flex-row max-md:items-center max-md:gap-4 max-md:justify-between">    
                                    <div class="max-md:flex max-md:items-center max-md:gap-4">
                                        <div class="flex justify-center items-center mx-auto rounded-full mb-[11px] max-md:mb-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/upload.png" alt="icon">
                                        </div>
                                        <h2 class="text-[22px] leading-[34px] text-primary mb-2 font-bold max-md:mb-0">Upload files</h2>
                                    </div>
                                </div>
                                <div class="mx-auto text-[#041D34]">
                                    <p class="text-xs leading-[23px] mb-[13px]">Choose files or drag and drop</p>
                                    <input type="file" id="file-upload" name="files" multiple="multiple" accept="video/*" class="hidden js-file-upload">
                                    <label for="file-upload" class="flex items-center border border-[#5C6C7B33] gap-[5px] text-[#041D34] rounded-[54px] text-xs leading-[31px] py-[2.5px] px-2.5 max-w-[80px] mx-auto js-browse-btn">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.65" d="M8.2238 4.80208L7.57306 3.50062C7.38578 3.12605 7.29213 2.93876 7.15243 2.80193C7.02888 2.68093 6.87998 2.5889 6.71651 2.53251C6.53164 2.46875 6.32225 2.46875 5.90347 2.46875H3.6738C3.0204 2.46875 2.6937 2.46875 2.44414 2.59591C2.22462 2.70776 2.04614 2.88624 1.93429 3.10576C1.80713 3.35532 1.80713 3.68202 1.80713 4.33542V4.80208M1.80713 4.80208H10.6738C11.6539 4.80208 12.1439 4.80208 12.5183 4.99282C12.8476 5.1606 13.1153 5.42832 13.2831 5.7576C13.4738 6.13195 13.4738 6.62199 13.4738 7.60208V10.1687C13.4738 11.1488 13.4738 11.6389 13.2831 12.0132C13.1153 12.3425 12.8476 12.6102 12.5183 12.778C12.1439 12.9687 11.6539 12.9687 10.6738 12.9687H4.60713C3.62704 12.9687 3.13699 12.9687 2.76265 12.778C2.43336 12.6102 2.16565 12.3425 1.99787 12.0132C1.80713 11.6389 1.80713 11.1488 1.80713 10.1687V4.80208Z" stroke="#041D34" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        Browse
                                    </label>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="grow-0 shrink-0 max-w-[394px] w-full text-[#041D34] text-center max-md:max-w-full">
                        <div class="max-w-[342px]" data-toggle="upload">
                            <div class="w-full flex flex-col border-transparent border-2 border-dashed rounded-[30px] pt-[28px] pb-[21px] px-6 min-h-[207px] max-md:min-h-0 max-md:justify-start max-md:p-0 max-md:border-0 max-md:bg-transparent">
                                <div class="max-md:flex max-md:flex-row max-md:items-center max-md:gap-4 max-md:justify-between">    
                                    <div class="max-md:flex max-md:items-center max-md:gap-4">
                                        <div class="flex justify-center items-center mx-auto rounded-full mb-[14px] max-md:mb-0">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/link.png" alt="icon">
                                        </div>
                                        <h2 class="text-[22px] leading-[34px] text-primary mb-2.5 font-bold max-md:mb-0">Paste a public URL</h2>
                                    </div>
                                    <i class="relative hidden max-md:block"></i>
                                </div>
                                <div class="mx-auto text-[#041D34]">
                                    <div class="flex items-center border border-[#5C6C7B33] gap-[5px] text-[#041D34] rounded-[54px] text-xs leading-[31px] py-[2.5px] px-[7px] max-w-[96px] mx-auto cursor-pointer" data-modal="upload-open">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_2825_21317)"><path d="M10 3.05204C10.5425 3.05204 10.8137 3.05204 11.0363 3.11167C11.6402 3.27349 12.1119 3.7452 12.2737 4.34911C12.3333 4.57165 12.3333 4.84289 12.3333 5.38538V10.752C12.3333 11.7321 12.3333 12.2222 12.1426 12.5965C11.9748 12.9258 11.7071 13.1935 11.3778 13.3613C11.0035 13.552 10.5134 13.552 9.53333 13.552H5.8C4.81991 13.552 4.32986 13.552 3.95552 13.3613C3.62623 13.1935 3.35852 12.9258 3.19074 12.5965C3 12.2222 3 11.7321 3 10.752V5.38538C3 4.84289 3 4.57165 3.05963 4.34911C3.22145 3.7452 3.69316 3.27349 4.29707 3.11167C4.51961 3.05204 4.79085 3.05204 5.33333 3.05204M6.26667 4.21871H9.06667C9.39336 4.21871 9.55671 4.21871 9.6815 4.15513C9.79126 4.0992 9.88049 4.00997 9.93642 3.9002C10 3.77542 10 3.61207 10 3.28538V2.81871C10 2.49201 10 2.32866 9.93642 2.20388C9.88049 2.09412 9.79126 2.00488 9.6815 1.94896C9.55671 1.88538 9.39336 1.88538 9.06667 1.88538H6.26667C5.93997 1.88538 5.77662 1.88538 5.65184 1.94896C5.54208 2.00488 5.45284 2.09412 5.39691 2.20388C5.33333 2.32866 5.33333 2.49201 5.33333 2.81871V3.28538C5.33333 3.61207 5.33333 3.77542 5.39691 3.9002C5.45284 4.00997 5.54208 4.0992 5.65184 4.15513C5.77662 4.21871 5.93997 4.21871 6.26667 4.21871Z" stroke="#5C6C7B" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_2825_21317"><rect width="14" height="14" fill="white" transform="translate(0.666748 0.71875)"/></clipPath></defs></svg>
                                        Paste links
                                    </div>
                                    <div class="flex space-x-4 items-center mt-[26px] justify-center">
                                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/youtube-brand.png" alt="wcag"></a>
                                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/google-drive-brand.png" alt="gdpr"></a>
                                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/vimeo-brand.png" alt="iso"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="border-t border-[#E3E3E5] pt-[19.5px]">
                    <h2 class="text-primary text-[25px] leading-[65px] font-extrabold text-center mb-[3px]">Uploaded files <span>(3)</span></h2>
                    <ul class="mb-6 js-ready-files">
                        <li class="flex justify-between items-center  border border-[#EFEFEF] rounded-[20px] p-[23px] pl-[45px] mb-3">
                            <div class="flex flex-[1_0_auto] items-center gap-2">
                                <div class="bg-[#5148F91A] flex justify-center items-center rounded-[4px] w-[82px] h-[67px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/upload-placeholder.png" alt="upload placeholder">
                                </div>
                                <div class="flex-[1_0_auto]">
                                    <h2 class="text-[#031C34] text-sm leading-[15px] font-bold mb-[2px]">Data-Driven Decision Making...</h2>
                                    <p class="text-[#031c34B3] text-xs leading-3 italic mb-[3px]">http://your.link/video_address.mp4</p>
                                    <div class="flex items-center gap-[6px]">
                                        <progress id="file" value="100" max="100"></progress>
                                        <div class="flex items-center gap-[6px]">
                                            <span class="rounded-full w-[16px] h-[16px] flex justify-center items-center bg-primary">
                                                <svg width="9" height="7" viewBox="0 0 9 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.18359 3.21704L3.52537 5.71704L8.20891 0.717041" stroke="white" stroke-width="1.25"/></svg>
                                            </span>
                                            <p class="italic text-[#031c34B3] text-[10px]">Done</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end flex-[1_0_auto] gap-[34px]">
                                <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-[2px] px-[11px]">
                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 3.09204V6.09204L7.5 7.09204M10.5 6.09204C10.5 8.85347 8.26142 11.092 5.5 11.092C2.73858 11.092 0.5 8.85347 0.5 6.09204C0.5 3.33062 2.73858 1.09204 5.5 1.09204C8.26142 1.09204 10.5 3.33062 10.5 6.09204Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <span class="text-[#031c34B3] text-[10px] italic">00:35:40</span>
                                </div>
                                <a href="javascript:;">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5" clip-path="url(#clip0_3961_724)"><path d="M11.1667 4.09196V3.55863C11.1667 2.81189 11.1667 2.43852 11.0213 2.15331C10.8935 1.90242 10.6895 1.69845 10.4387 1.57062C10.1534 1.42529 9.78007 1.42529 9.03333 1.42529H7.96667C7.21993 1.42529 6.84656 1.42529 6.56135 1.57062C6.31046 1.69845 6.10649 1.90242 5.97866 2.15331C5.83333 2.43852 5.83333 2.81189 5.83333 3.55863V4.09196M7.16667 7.75863V11.092M9.83333 7.75863V11.092M2.5 4.09196H14.5M13.1667 4.09196V11.5586C13.1667 12.6787 13.1667 13.2388 12.9487 13.6666C12.7569 14.0429 12.451 14.3489 12.0746 14.5406C11.6468 14.7586 11.0868 14.7586 9.96667 14.7586H7.03333C5.91323 14.7586 5.35318 14.7586 4.92535 14.5406C4.54903 14.3489 4.24307 14.0429 4.05132 13.6666C3.83333 13.2388 3.83333 12.6787 3.83333 11.5586V4.09196" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_3961_724"><rect width="16" height="16" fill="white" transform="translate(0.5 0.092041)"/></clipPath></defs></svg>
                                </a>
                            </div>
                        </li>
                        <li class="flex justify-between items-center  border border-[#EFEFEF] rounded-[20px] p-[23px] pl-[45px] mb-3">
                            <div class="flex flex-[1_0_auto] items-center gap-2">
                                <div class="bg-[#5148F91A] flex justify-center items-center rounded-[4px] w-[82px] h-[67px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/upload-placeholder.png" alt="upload placeholder">
                                </div>
                                <div class="flex-[1_0_auto]">
                                    <h2 class="text-[#031C34] text-sm leading-[15px] font-bold mb-[2px]">Data-Driven Decision Making...</h2>
                                    <p class="text-[#031c34B3] text-xs leading-3 italic mb-[10px]">http://your.link/video_address.mp4</p>
                                    <div class="flex items-center gap-[6px]">
                                        <progress id="file" value="40" max="100"></progress>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end flex-[1_0_auto] gap-[34px]">
                                <div class="flex items-center bg-[#031C340D] rounded-[61px] gap-[5px] py-[2px] px-[11px]">
                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 3.09204V6.09204L7.5 7.09204M10.5 6.09204C10.5 8.85347 8.26142 11.092 5.5 11.092C2.73858 11.092 0.5 8.85347 0.5 6.09204C0.5 3.33062 2.73858 1.09204 5.5 1.09204C8.26142 1.09204 10.5 3.33062 10.5 6.09204Z" stroke="#031C34" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <span class="text-[#031c34B3] text-[10px] italic">00:35:40</span>
                                </div>
                                <a href="javascript:;">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5" clip-path="url(#clip0_3961_724)"><path d="M11.1667 4.09196V3.55863C11.1667 2.81189 11.1667 2.43852 11.0213 2.15331C10.8935 1.90242 10.6895 1.69845 10.4387 1.57062C10.1534 1.42529 9.78007 1.42529 9.03333 1.42529H7.96667C7.21993 1.42529 6.84656 1.42529 6.56135 1.57062C6.31046 1.69845 6.10649 1.90242 5.97866 2.15331C5.83333 2.43852 5.83333 2.81189 5.83333 3.55863V4.09196M7.16667 7.75863V11.092M9.83333 7.75863V11.092M2.5 4.09196H14.5M13.1667 4.09196V11.5586C13.1667 12.6787 13.1667 13.2388 12.9487 13.6666C12.7569 14.0429 12.451 14.3489 12.0746 14.5406C11.6468 14.7586 11.0868 14.7586 9.96667 14.7586H7.03333C5.91323 14.7586 5.35318 14.7586 4.92535 14.5406C4.54903 14.3489 4.24307 14.0429 4.05132 13.6666C3.83333 13.2388 3.83333 12.6787 3.83333 11.5586V4.09196" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_3961_724"><rect width="16" height="16" fill="white" transform="translate(0.5 0.092041)"/></clipPath></defs></svg>
                                </a>
                            </div>
                        </li>
                        <li class="flex flex-col flex-wrap gap-2.5 justify-between items-center border border-[#EFEFEF] rounded-[20px] p-[23px] pl-[32px] mb-3">
                            <div class="flex items-center w-full">
                                <div class="flex flex-[1_0_auto] items-center gap-2">
                                    <div class="flex items-center gap-4">
                                        <a href="javascript:;" class="flex justify-center items-center rounded-[3px] w-[15px] h-[15px] bg-[#0000001A]">
                                            <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 4.09204C1 4.09204 1.06066 3.66742 2.81802 1.91006C4.57538 0.152701 7.42462 0.152701 9.18198 1.91006C9.80462 2.5327 10.2067 3.2924 10.3881 4.09204M1 4.09204V1.09204M1 4.09204H4M11 6.09204C11 6.09204 10.9393 6.51666 9.18198 8.27402C7.42462 10.0314 4.57538 10.0314 2.81802 8.27402C2.19538 7.65139 1.79335 6.89168 1.61191 6.09204M11 6.09204V9.09204M11 6.09204H8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </a>
                                        <div class="bg-[#5148F91A] flex justify-center items-center rounded-[4px] w-[82px] h-[67px]">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/upload-placeholder.png" alt="upload placeholder">
                                        </div>
                                    </div>
                                    <div class="flex-[1_0_auto]">
                                        <h2 class="text-[#031C34] text-sm leading-[15px] font-bold mb-[2px]">Data-Driven Decision Making.docx</h2>
                                        <p class="text-[#031c34B3] text-xs leading-3 italic mb-[10px]">254 KB</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end flex-[1_0_auto] gap-[34px]">
                                    <div>
                                        <a href="" class="text-sm leading-[38px] font-bold underline px-[7px]">Try Again</a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2.5 bg-[#f2f2f2] rounded-[10px] p-2 pl-[22px] w-full">
                                <span class="flex justify-center items-center bg-[#031c346b] rounded-full w-[18px] h-[18px]">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3961_1075)"><path d="M10.5 6.09204V3.49204C10.5 2.65196 10.5 2.23192 10.3365 1.91106C10.1927 1.62881 9.96323 1.39934 9.68099 1.25553C9.36012 1.09204 8.94008 1.09204 8.1 1.09204H4.9C4.05992 1.09204 3.63988 1.09204 3.31901 1.25553C3.03677 1.39934 2.8073 1.62881 2.66349 1.91106C2.5 2.23192 2.5 2.65196 2.5 3.49204V8.69204C2.5 9.53212 2.5 9.95216 2.66349 10.273C2.8073 10.5553 3.03677 10.7847 3.31901 10.9286C3.63988 11.092 4.05992 11.092 4.9 11.092H6.5M8.5 8.09204L11 10.592M11 8.09204L8.5 10.592" stroke="white" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_3961_1075"><rect width="12" height="12" fill="white" transform="translate(0.5 0.092041)"/></clipPath></defs></svg>
                                </span>
                                <p class="text-xs text-[#808080]"><strong>Note:</strong> file couldn't be uploaded due to an unexpected issue. It's on our end, not yours. Please try again.</p>
                            </div>
                        </li>
                    </ul>
                    <!-- for disabled button - bg-[#5148F954] -->
                    <a href="#" class="bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-7 rounded-[55px] font-bold w-full">Submit <span>(1)</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part( 'src/blocks/layouts/pages/upload/url-modal' ); ?>