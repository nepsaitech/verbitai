<?php

// Customers data
/* $customersFilePath = get_template_directory() . '/src/endpoints/customers.json';
$customersData = file_get_contents($customersFilePath);
$customers = json_decode($customersData, true);
$firstname = null;

foreach ($customers as $customer) {
    if ($customer['customer_id'] == 2) {
        $firstname = $customer['firstname'];
        break;
    }
} */

// Prepare the HTML responses to pass to JavaScript
$image = $title = $description = $icon = $slogan = '';
if ( have_rows( 'ds_question_left_side' ) ) {
    while ( have_rows( 'ds_question_left_side' ) ) { the_row();
        $slogan = get_sub_field( 'question_slogan' );
        if ( have_rows( 'question_success_message' ) ) {
            while ( have_rows( 'question_success_message' ) ) { the_row(); 
                $icon        = get_sub_field( 'icon' );
                $title       = get_sub_field( 'title' );
                $description = get_sub_field( 'description' );
                if ( $icon ) {
                    $icon_url = $icon[ 'url' ];
                    $icon_alt = $icon[ 'alt' ];

                    $image = '<img src="' . $icon_url . '" class="w-[50px] h-auto object-cover mx-auto mb-2" alt="' . $icon_alt . '">';
                }
            }
        }
    }
}

$success_html = '
    <div class="flex flex-col justify-center text-center">
        ' . $image . '
        <h2 class="text-white font-extrabold text-[22px] leading-normal mb-[2px]">' . esc_html( $title ) . ' Sample!</h2>
        <p class="text-white leading-[19px]">' . esc_html( $description ) . '</p>
    </div>
';

$slogan = esc_html( $slogan );

$transcripting_html = '
    <div class="w-full flex flex-col items-center justify-center max-[880px]:mt-[35px]">
        <div class="text-center relative -top-[10%] max-[880px]:static max-[880px]:flex max-[880px]:items-center max-[880px]:gap-x-2 max-[880px]:bg-white max-[880px]:rounded-[79px] max-[880px]:[box-shadow:0px_7px_8px_0px_#5148F91A] max-[880px]:max-w-[351px] max-[880px]:w-full max-[880px]:pt-[11px] max-[880px]:pl-[30px] max-[880px]:min-h-[79px]">
            <img src="' . get_template_directory_uri() . '/src/assets/img/video-loader.gif" class="w-[280px] h-auto object-cover mx-auto max-[880px]:hidden" alt="loader">
            <img src="' . get_template_directory_uri() . '/src/assets/img/static-loader.png" class="w-[55px] h-auto object-cover hidden max-[880px]:inline-block" alt="loader">
            <div class="-mt-[70px] max-[880px]:mt-0">
                <h2 class="text-[#041D34] text-[26px] leading-[34px] -tracking-[0.38px] font-bold mb-2 max-[880px]:text-[19px] max-[880px]:leading-[26px] max-[880px]:-tracking-[0.28px]">Transcribing your file...</h2>
                <p class="text-[#041D3488] max-[880px]:text-xs max-[880px]:leading-[23px]">Conf_NYC-23-23-1113-3252g.mp4</p>
            </div>
        </div>
        <div class="hidden max-[880px]:flex text-center mt-[23px] max-w-[279px] max-auto">
            <p class="leading-[19px] text-[#0000004D]">We will send you an Email once your transcription is ready.</p>
        </div>
    </div>
';

$sample_ready_html = '
    <div class="max-[880px]:bg-primary max-[880px]:py-[21px] max-[880px]:px-3 max-[880px]:w-full">
        <div class="text-center max-[880px]:bg-white max-[880px]:rounded-[40px] pt-[26px] px-2.5 pb-[25px]">
            <span class="flex items-center justify-center w-[31px] h-[31px] rounded-full bg-[#3DDED1] mx-auto mb-5 max-[880px]:mb-[7px]"><svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 5.5L6.5 10.5L16 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <div>
                <h2 class="text-primary text-[22px] leading-[34px] -tracking-[0.38px] font-bold mb-[11px] max-[880px]:text-[19px] max-[880px]:leading-[26px] max-[880px]:-tracking-[0.28px]">Your sample is ready</h2>
                <div class="flex gap-x-[2px] items-center mb-6 max-[880px]:mb-[11px] max-[880px]:justify-center">
                    <span class="max-[880px]:hidden"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.16683 1.32385V3.73334C8.16683 4.06003 8.16683 4.22338 8.23041 4.34816C8.28634 4.45792 8.37557 4.54716 8.48534 4.60309C8.61012 4.66667 8.77347 4.66667 9.10016 4.66667H11.5096M5.25016 9.33329L6.41683 10.5L9.04183 7.87496M8.16683 1.16663H5.1335C4.1534 1.16663 3.66336 1.16663 3.28901 1.35736C2.95973 1.52514 2.69201 1.79286 2.52423 2.12214C2.3335 2.49649 2.3335 2.98653 2.3335 3.96663V10.0333C2.3335 11.0134 2.3335 11.5034 2.52423 11.8778C2.69201 12.2071 2.95973 12.4748 3.28901 12.6426C3.66336 12.8333 4.1534 12.8333 5.1335 12.8333H8.86683C9.84692 12.8333 10.337 12.8333 10.7113 12.6426C11.0406 12.4748 11.3083 12.2071 11.4761 11.8778C11.6668 11.5034 11.6668 11.0134 11.6668 10.0333V4.66663L8.16683 1.16663Z" stroke="#5148F9" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <p class="text-[#041D3488] text-xs leading-[23px] -tracking-[0.17px]">Conf_NYC-23-23-1113-3252g.mp4</p>
                </div>
                <a href="' . home_url() . '/sample" class="flex-[1_0_auto] bg-primary !text-white leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] font-bold max-w-[142px] w-full">Continue</a>
            </div>
        </div>
    </div>
';
?>

<section class="questions">
    <div class="mx-auto">
        <div class="flex items-stretch max-[880px]:flex-col">
            <div class="flex-grow basis-2/4 max-[880px]:basis-full">
                <div class="flex bg-[#F6F6FF] h-full justify-center pt-[163px] pb-[50px] max-[880px]:items-start max-[880px]:h-auto max-[880px]:bg-transparent max-[880px]:pt-[115px] js-segment">
                    <div class="max-w-[353px] max-[880px]:max-w-[302px]">

                        <?php
                        $args = array(
                            'post_type'      => 'question',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                        );

                        $questions = new WP_Query($args);
                        $questions_array  = array();

                        if ( $questions->have_posts() ) :
                            while ( $questions->have_posts() ) :
                                $questions->the_post();
                                $question_id = get_the_ID();
                                $title = get_the_title();

                                $answers  = array();

                                if ( have_rows( 'question_answers' ) ) {
                                    while ( have_rows( 'question_answers' ) ) { the_row();
                                        $answer = get_sub_field('item');
                                        $answers[] = $answer;
                                    }
                                }

                                $questions_array[] = array(
                                    'id'      => $question_id,
                                    'title'   => $title,
                                    'answers' => $answers,
                                );

                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                        <!-- <div class="js-questions">
                            <div class="segment">
                                <h3 class="leading-[23px] text-[#041D3488] -tracking-[0.17px] mb-12 max-[880px]:text-center max-[880px]:mb-6">We're almost there! A few questions will help us make your experience even better.</h3>
                                <div class="mb-[23px] max-[880px]:text-center">
                                    <h2 class="text-primary text-[22px] leading-[30px] font-extrabold mb-[7px] max-[880px]:mb-0">How frequently do you plan to use Verbit?</h2>
                                    <h4 class="text-xs leading-[20px] text-[#5148F980] font-bold"><span class="current-question-count">1</span> out of <span class="total-questions-count">3</span> Questions</h4>
                                </div>
                                <ul class="options flex flex-col gap-y-2.5 mb-[23px]">
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="only-once" class="peer hidden" name="question" value="only-once">
                                        <label for="only-once" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Only once</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="weekly" class="peer hidden" name="question" value="weekly">
                                        <label for="weekly" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Weekly</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="every-other-week" class="peer hidden" name="question" value="every-other-week">
                                        <label for="every-other-week" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Every other week</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="monthly" class="peer hidden" name="question" value="monthly">
                                        <label for="monthly" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Monthly</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="hidden segment">
                                <div class="mb-[23px] max-[880px]:text-center">
                                    <h2 class="text-primary text-[22px] leading-[30px] font-extrabold mb-[7px] max-[880px]:mb-0">What level of service do your projects require?</h2>
                                    <h4 class="text-xs leading-[20px] text-[#5148F980] font-bold"><span class="current-question-count">2</span> out of <span class="total-questions-count">3</span> Questions</h4>
                                </div>
                                <ul class="options flex flex-col gap-y-2.5 mb-[23px]">
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="ai" class="peer hidden" name="question" value="ai">
                                        <label for="ai" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">AI generated</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="human" class="peer hidden" name="question" value="human">
                                        <label for="human" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Human-made</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="both" class="peer hidden" name="question" value="both">
                                        <label for="both" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">Both</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="deciding" class="peer hidden" name="question" value="deciding">
                                        <label for="deciding" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">I need help deciding</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="hidden segment">
                                <div class="mb-[23px] max-[880px]:text-center">
                                    <h2 class="text-primary text-[22px] leading-[30px] font-extrabold mb-[7px] max-[880px]:mb-0">How big is your team?</h2>
                                    <h4 class="text-xs leading-[20px] text-[#5148F980] font-bold"><span class="current-question-count">3</span> out of <span class="total-questions-count">3</span> Questions</h4>
                                </div>
                                <ul class="options flex flex-col gap-y-2.5 mb-[23px]">
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="1-10" class="peer hidden" name="question" value="1-10">
                                        <label for="1-10" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">1-10 people</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="10-50" class="peer hidden" name="question" value="10-50">
                                        <label for="10-50" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">10-50</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="50-500" class="peer hidden" name="question" value="50-500">
                                        <label for="50-500" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">50-500</label>
                                    </li>
                                    <li class="max-w-[302px] w-full">
                                        <input type="radio" id="500+" class="peer hidden" name="question" value="500+">
                                        <label for="500+" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary">500+</label>
                                    </li>
                                </ul>
                            </div> 
                        </div>
                        <div class="flex items-center gap-x-[18px] transition-all ease-in js-questions-btn">
                            <a href="#" class="flex-[1_0_auto] bg-primary !text-white leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] font-bold max-w-[142px] w-full">Continue</a>
                            <a href="#" class="flex-[1_0_auto] bg-transparent !text-[#42424266] leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] max-w-[142px] w-full">skip</a>
                        </div>  -->

                        <div class="js-question-wrap"></div>
                    </div>
                    <!-- <div class="text-center max-w-[390px]">
                        <div>
                            <img src="<!?php echo get_template_directory_uri(); ?>/src/assets/img/grafitti.png" class="w-[50px] h-auto object-cover mx-auto mb-2" alt="loader">
                            <h2 class="text-white font-extrabold text-[22px] leading-normal mb-[2px]">Thanks for sharing, Tal!</h2>
                            <p class="text-white leading-[19px]">Your answers help us customize your experience. Sit tight, your transcription is on its way!</p>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="hidden bg-primary h-screen items-center justify-center max-[880px]:h-auto max-[880px]:px-[21px] max-[880px]:min-h-[576px]" data-question="complete">
                    <div class="text-center max-w-[390px]">
                        <div>
                            <img src="<!?php echo get_template_directory_uri(); ?>/src/assets/img/grafitti.png" class="w-[50px] h-auto object-cover mx-auto mb-2" alt="loader">
                            <h2 class="text-white font-extrabold text-[22px] leading-normal mb-[2px]">Thanks for sharing, Tal!</h2>
                            <p class="text-white leading-[19px]">Your answers help us customize your experience. Sit tight, your transcription is on its way!</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="h-screen flex-grow basis-2/4 flex items-center justify-center max-[880px]:basis-full js-transcription-wrap">                
            </div>
        </div>
    </div>
</section>

<?php
// Register your JavaScript file and pass the content
wp_localize_script('question-during-sample', 'duringSampleQuestions', array(
    'questions'     => $questions_array,
    'result'        => $success_html,
    'slogan'        => $slogan,
    'transcripting' => $transcripting_html,
    'sample_ready'  => $sample_ready_html,
));