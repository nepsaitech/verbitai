<?php
get_header();

get_template_part( 'src/blocks/layouts/pages/transcript/site-head' ); ?>

<section class="full-transcript-cta">
    <div class="max-w-screen-xl mx-auto">
        <div class="py-8 px-5">
            <div class="flex justify-between items-center max-md:flex-col bg-primary text-white py-[22px] px-[42px] rounded-[20px] gap-[2rem] max-md:text-center">
                <div class="relative pl-9 max-md:pl-0">
                    <svg class="absolute -translate-y-2/4 top-2/4 left-0 max-md:static max-md:transform-none max-md:mx-auto max-md:mb-[5px]" width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.125 18L16.0806 20L20.4808 15.5M21.4441 11.5499C21.4537 11.3678 21.4586 11.1845 21.4586 11C21.4586 5.47715 17.0808 1 11.6805 1C6.28017 1 1.90234 5.47715 1.90234 11C1.90234 16.4354 6.14265 20.858 11.4248 20.9966M11.6805 5V11L15.3359 12.8692" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p><strong>Here’s your 30-minute transcription preview</strong> - upgrade to get the full transcript!</p>
                </div>
                <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="!text-white py-3 px-8 rounded-[56px] font-bold border-2 border-solid border-white text-center">Get full transcript</a>
            </div>
        </div>
    </div>
</section>

<section class="transcript-main">
    <div class="max-w-screen-xl mx-auto">
        <div class="py-8 px-5">
            <div class="flex justify-between gap-4">
                <div class="w-[70%] bg-white shadow-[0px_7px_8px_0px_#5148F91A] rounded-[20px] p-10">
                    <div class="border-b border-solid border-[#30303014]">
                        <h1 class="font-bold text-[30px] mb-[12px]">What is a podcast?</h1>
                        <div class="flex items-center gap-4 mb-10">
                            <div class="flex items-center gap-[6px]">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.8335 7.9987H15.1668M1.8335 7.9987C1.8335 11.6806 4.81826 14.6654 8.50016 14.6654M1.8335 7.9987C1.8335 4.3168 4.81826 1.33203 8.50016 1.33203M15.1668 7.9987C15.1668 11.6806 12.1821 14.6654 8.50016 14.6654M15.1668 7.9987C15.1668 4.3168 12.1821 1.33203 8.50016 1.33203M8.50016 1.33203C10.1677 3.1576 11.1153 5.52672 11.1668 7.9987C11.1153 10.4707 10.1677 12.8398 8.50016 14.6654M8.50016 1.33203C6.83264 3.1576 5.88499 5.52672 5.8335 7.9987C5.88499 10.4707 6.83264 12.8398 8.50016 14.6654" stroke="#30303099" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-[#30303099] text-sm">English (USA)</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.50016 3.9987V7.9987L11.1668 9.33203M15.1668 7.9987C15.1668 11.6806 12.1821 14.6654 8.50016 14.6654C4.81826 14.6654 1.8335 11.6806 1.8335 7.9987C1.8335 4.3168 4.81826 1.33203 8.50016 1.33203C12.1821 1.33203 15.1668 4.3168 15.1668 7.9987Z" stroke="#30303099" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-[#30303099] text-sm">22:10:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-9">
                        <div class="flex items-center gap-[14px]">
                            <a href="#" class="flex items-center gap-1 !text-[#041D34] p-3 rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6448 15.4444H18.0216M11.6448 15.4444L9.94434 19M11.6448 15.4444L14.1917 10.1191C14.3969 9.69002 14.4996 9.47546 14.64 9.40766C14.7621 9.3487 14.9044 9.3487 15.0265 9.40766C15.1669 9.47546 15.2695 9.69002 15.4747 10.1191L18.0216 15.4444M18.0216 15.4444L19.7221 19M1.94434 4.77778H7.27767M7.27767 4.77778H10.3888M7.27767 4.77778V3M10.3888 4.77778H12.611M10.3888 4.77778C9.94777 7.40648 8.92441 9.78772 7.42483 11.7862M9.05545 12.7778C8.51098 12.5332 7.95558 12.193 7.42483 11.7862M7.42483 11.7862C6.22258 10.8647 5.14679 9.60146 4.611 8.33333M7.42483 11.7862C5.99843 13.6871 4.14117 15.2416 1.94434 16.3333" stroke="black" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Translate
                            </a>
                            <a href="#" class="flex items-center gap-1 !text-[#041D34] p-3 rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 17.6H6.6665M12.5 17.6H18M7.9665 3H16.3665C18.0467 3 18.8867 3 19.5285 3.32698C20.093 3.6146 20.5519 4.07354 20.8395 4.63803C21.1665 5.27976 21.1665 6.11984 21.1665 7.8V16.2C21.1665 17.8802 21.1665 18.7202 20.8395 19.362C20.5519 19.9265 20.093 20.3854 19.5285 20.673C18.8867 21 18.0467 21 16.3665 21H7.9665C6.28635 21 5.44627 21 4.80453 20.673C4.24005 20.3854 3.7811 19.9265 3.49348 19.362C3.1665 18.7202 3.1665 17.8802 3.1665 16.2V7.8C3.1665 6.11984 3.1665 5.27976 3.49348 4.63803C3.7811 4.07354 4.24005 3.6146 4.80453 3.32698C5.44627 3 6.28635 3 7.9665 3Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Get Captions
                            </a>
                            <a href="#" class="flex items-center gap-1 !text-[#041D34] p-3 rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1611_8308)"><path d="M6.83301 7.4L6.99902 7.5M3.99902 6.1V9.06925C3.99902 9.59601 3.99902 9.85939 4.06233 10.105C4.11843 10.3226 4.21082 10.5293 4.33562 10.7162C4.47643 10.9272 4.67271 11.1028 5.06528 11.454L11.2431 16.9815C12.0369 17.6918 12.4338 18.0469 12.8789 18.1726C13.2708 18.2833 13.6871 18.2718 14.0723 18.1395C14.5098 17.9893 14.8864 17.6127 15.6395 16.8595L17.1071 15.3919C17.9397 14.5593 18.3561 14.143 18.502 13.667C18.6302 13.2487 18.6178 12.7999 18.4665 12.3893C18.2944 11.9222 17.8556 11.5296 16.9781 10.7444L10.9102 5.31523C10.5731 5.01369 10.4046 4.86292 10.2129 4.75542C10.0428 4.66007 9.85967 4.59011 9.66934 4.54776C9.45474 4.5 9.22863 4.5 8.77642 4.5H5.59902C5.03897 4.5 4.75894 4.5 4.54503 4.60899C4.35687 4.70487 4.20389 4.85785 4.10802 5.04601C3.99902 5.25992 3.99902 5.53995 3.99902 6.1Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><g filter="url(#filter0_d_1611_8308)"><path d="M16.333 8L16.333 17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.999 12.75H22.499" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17.749 8L17.749 17.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></g><defs><filter id="filter0_d_1611_8308" x="11.999" y="7" width="12.5" height="11.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feOffset dx="1"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1611_8308"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1611_8308" result="shape"/></filter><clipPath id="clip0_1611_8308"><rect width="24" height="24" fill="white" transform="translate(0.833008)"/></clipPath></defs></svg>
                                Add Tags
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center gap-1 !text-primary py-3 px-7 rounded-[60px] border-2 border-solid border-primary text-center font-bold">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1611_8317)"><path d="M21 15.5664V16.7664C21 18.4466 21 19.2866 20.673 19.9284C20.3854 20.4929 19.9265 20.9518 19.362 21.2394C18.7202 21.5664 17.8802 21.5664 16.2 21.5664H7.8C6.11984 21.5664 5.27976 21.5664 4.63803 21.2394C4.07354 20.9518 3.6146 20.4929 3.32698 19.9284C3 19.2866 3 18.4466 3 16.7664V15.5664M17 10.5664L12 15.5664M12 15.5664L7 10.5664M12 15.5664V3.56641" stroke="#5148F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_1611_8317"><rect width="24" height="24" fill="white" transform="translate(0 0.566406)"/></clipPath></defs></svg>                            
                                Export
                            </a>
                        </div>
                    </div>
                    <div class="text-sm">
                        <div class="flex gap-7">
                            <div class="w-[365px] pt-6">
                                <h2 class="text-[#303030] font-bold">Speaker 1</h2>
                            </div>
                            <div>
                                <div class="py-6 px-8 rounded-[20px]">
                                    <div class="flex items-center gap-1 text-[10px]">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.5 3V6L8.5 7M11.5 6C11.5 8.76142 9.26142 11 6.5 11C3.73858 11 1.5 8.76142 1.5 6C1.5 3.23858 3.73858 1 6.5 1C9.26142 1 11.5 3.23858 11.5 6Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        <p class="text-black">00:00:18</p>
                                    </div>
                                    <div>
                                        <p>or you've heard about a ton of people starting podcasts and you want to know if that's some thing be into, whatever your reason, welcome. We'd love to help you understand what a podcast A podcast is essentially a series or of digital audio files that are made available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-7">
                            <div class="w-[365px] pt-6">
                                <h2 class="text-[#303030] font-bold">Speaker 2</h2>
                            </div>
                            <div>
                                <div class="bg-[#5148F90D] py-6 px-8 rounded-[20px]">
                                    <div class="flex items-center gap-1 text-[10px]">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.5 3V6L8.5 7M11.5 6C11.5 8.76142 9.26142 11 6.5 11C3.73858 11 1.5 8.76142 1.5 6C1.5 3.23858 3.73858 1 6.5 1C9.26142 1 11.5 3.23858 11.5 6Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        <p class="text-black">00:00:18</p>
                                    </div>
                                    <div>
                                        <p>or you've heard about a ton of people starting podcasts and you want to know if that's some thing be into, whatever your reason, welcome. We'd love to help you understand what a podcast A podcast is essentially a series or of digital audio files that are made available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex relative justify-end bg-primary rounded-[20px] text-white pt-[35px] pb-[25px] px-4 mt-10">
                        <figure class="absolute left-0 bottom-0">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcript-featured-cta-img.png" alt="photo">
                        </figure>
                        <div class="max-w-[355px] text-center">
                            <h2 class="text-[27px] font-extrabold mb-3">Want more transcriptions like this?</h2>
                            <p class="max-w-[282px] mx-auto mb-2">Upgrade now to unlock full platform access and features!</p>
                            <a href="#" class="inline-block bg-white !text-primary text-center text-lg py-3 px-7 rounded-[100px] font-bold w-[68%] mx-auto">Get Started!</a>
                        </div>
                        <div class="max-w-[274px]">
                            <ul class="flex flex-col gap-3 text-left">
                                <li class="relative pl-6">
                                    <svg class="absolute top-[12px] -translate-y-2/4 left-0" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="9.07227" cy="8.5" r="8.125" fill="#3DDED1"/><path d="M5.63086 9.125L7.97263 11.625L12.6562 6.625" stroke="#161978" stroke-width="1.25"/></svg>
                                    Unified platform for transcription,  captioning & translation
                                </li>
                                <li class="relative pl-6">
                                    <svg class="absolute top-[12px] -translate-y-2/4 left-0" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="9.07227" cy="8.5" r="8.125" fill="#3DDED1"/><path d="M5.63086 9.125L7.97263 11.625L12.6562 6.625" stroke="#161978" stroke-width="1.25"/></svg>
                                    Unlimited live sessions
                                </li>
                                
                                <li class="relative pl-6">
                                    <svg class="absolute top-[12px] -translate-y-2/4 left-0" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="9.07227" cy="8.5" r="8.125" fill="#3DDED1"/><path d="M5.63086 9.125L7.97263 11.625L12.6562 6.625" stroke="#161978" stroke-width="1.25"/></svg>
                                    20hrs of pre-recorded files
                                </li>
                                <li class="relative pl-6">
                                    <svg class="absolute top-[12px] -translate-y-2/4 left-0" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="9.07227" cy="8.5" r="8.125" fill="#3DDED1"/><path d="M5.63086 9.125L7.97263 11.625L12.6562 6.625" stroke="#161978" stroke-width="1.25"/></svg>
                                    Advanced editing capabilities
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <sidebar class="w-[362px]">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/transcript-video.png" alt="transcript video">
                    </div>
                    <div class="flex justify-between items-center max-md:flex-col bg-primary text-white p-[30px] rounded-[20px] gap-[2rem] max-md:text-center">
                        <h2 class="text-xl font-bold">Impressed?</h2>
                        <a href="<?php echo (get_field('start_free_btn', 'option')) ? get_field('start_free_btn', 'option')['url'] : '#'; ?>" class="!text-white p-3 rounded-[56px] font-bold border-2 border-solid border-white text-center">Upgrade Now</a>
                    </div>
                </sidebar>
            </div>
        </div>
    </div>
</section>

<section class="plan-modal">
    <div class="bg-[#00000080] flex justify-center items-center p-32 max-lg:px-8">
        <div class="bg-white w-[760px] min-h-[469px] rounded-[20px] p-4 max-lg:w-full">
            <div class="w-[10px] h-[10px]">
                <a href="#" data-close-btn="plan">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L9 9" stroke="black"/><path d="M9 0.5L0.5 9" stroke="black"/></svg>
                </a>
            </div>
            <div class="flex justify-between py-[3rem] px-[3rem] max-lg:flex-col max-lg:py-4 max-lg:px-2 max-lg:space-y-8">
                <div class="text-[#041D34] flex flex-col justify-between grow-0 shrink-0 pt-6 w-full max-w-[245px] max-lg:w-full max-lg:flex-grow max-lg:basis-2/4 max-lg:max-w-full max-lg:pt-0 max-lg:text-center">
                    <div>
                        <h2 class="text-primary text-[30px] leading-9 font-bold mb-6 max-lg:mb-3">Don't stop now - keep transcribing</h2>
                        <p>You've reached your 30-minute transcription limit. Choose a plan and keep transcribing your files.</p>
                    </div>
                    <div class="flex space-x-4 items-center max-lg:justify-center max-lg:mt-3">
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/wcag-brand.png" alt="wcag"></a>
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/gdpr-brand.png" alt="gdpr"></a>
                        <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/iso-brand.png" alt="iso"></a>
                    </div>
                </div>
                <div class="text-[#303030] flex flex-col justify-between grow-0 shrink-0 w-full max-w-[310px] max-lg:w-full max-lg:flex-grow max-lg:basis-2/4 max-lg:max-w-full">
                    <fieldset class="space-y-[42px] mb-[26px] max-lg:space-y-5">
                        <div>
                            <input id="business" class="peer/business hidden" type="radio" name="status" checked />
                            <label for="business" class="peer-checked/business:text-primary space-y-[24px] border border-solid border-[#00000033] rounded-[10px] block py-3 px-5">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-base font-bold text-[#303030]">Business Plan</h2>
                                        <p class="text-[#0000008c]">Starting at</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-[10px] text-primary leading-[23px] w-fit bg-[#5148F90F] rounded-[30px] px-[7px]">Best Value</span>
                                        <i class="font-normal flex justify-center items-center w-[14px] h-[14px] border-2 border-solid border-[#00000033] rounded-full">
                                            <svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3L3 5L7 1" stroke="white" stroke-width="1.5"/></svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex peer-checked:hidden text-[#303030]">
                                    <span class="text-[28px] font-bold">$17</span>&nbsp;&nbsp;/&nbsp;<span class="text-[22px]">month</span>
                                </div>
                                <p class="text-xs text-black">Cancel anytime</p>
                            </label>
                        </div>
                        <div>
                            <input id="hourly" class="peer/hourly hidden" type="radio" name="status" />
                            <label for="hourly" class="peer-checked/hourly:text-primary border border-solid border-[#00000033] rounded-[10px] block py-3 px-5">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-base font-bold text-[#303030] mb-2">Hourly plan</h2>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <i class="font-normal flex justify-center items-center w-[14px] h-[14px] border-2 border-solid border-[#00000033] rounded-full">
                                            <svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3L3 5L7 1" stroke="white" stroke-width="1.5"/></svg>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex peer-checked:hidden text-[#303030]">
                                    <span class="text-[28px] font-bold">$30</span>&nbsp;&nbsp;/&nbsp;<span class="text-[22px]">buy 5 hours</span>
                                </div>
                            </label>
                        </div>
                    </fieldset>
                    <div class="flex justify-end max-lg:justify-center">
                        <a href="#" class="inline-block bg-primary !text-white text-center text-lg py-3 px-7 rounded-[56px] font-bold w-fit max-md:py-4 max-sm:w-full">Continue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
/* if ( have_rows( 'plan_blocks' ) ) {
    while ( have_rows( 'plan_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/plan/';

        // Global section
        if ('trusted' === get_row_layout() || 'testimonial' === get_row_layout() || 'faq' === get_row_layout() || 'simplify-cta' === get_row_layout()) {
            $dir = 'src/blocks/layouts/';
        }

        if ('banner' === get_row_layout() || 'smart-video' === get_row_layout() || 'what-you-get' === get_row_layout() || 'static-featured-section' === get_row_layout()) {
            $dir = 'src/blocks/layouts/pages/plan/';
        }
        
        include $dir . get_row_layout() . '.php';
    }
} */

get_footer();