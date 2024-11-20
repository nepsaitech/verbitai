<?php
// Prepare the HTML responses to pass to JavaScript
$image = $title = $description = $icon = $slogan = '';

if ( have_rows( 'bp_question_left_side' ) ) {
    while ( have_rows( 'bp_question_left_side' ) ) { the_row();

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
        <h2 class="text-primary font-extrabold text-[22px] leading-normal mb-[2px]">' . esc_html( $title ) . '</h2>
        <p class="leading-[19px]">' . esc_html( $description ) . '</p>
    </div>
';

$slogan = esc_html( $slogan );
?>

<section class="questions">
    <div class="mx-auto">
        <div class="flex items-stretch overflow-hidden max-[980px]:flex-col">
            <div class="flex-grow basis-2/4 max-[980px]:basis-full">
                <div class="flex h-screen pt-[145px] pb-[50px] pl-[157px] max-[980px]:items-start max-[980px]:h-auto max-[980px]:bg-transparent max-[980px]:pt-[112px] max-[980px]:pl-0 max-[980px]:justify-center js-pf-segment">
                    <div class="max-w-[353px] max-[980px]:max-w-[302px]">

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


                        // Register your JavaScript file and pass the content
                        wp_localize_script('question-before-platform', 'beforePlatformQuestions', array(
                            'questions' => $questions_array,
                            'result' => $success_html,
                            'slogan'  => $slogan
                        ));
                        ?>
                        
                        <div class="js-question-wrap"></div>
                    </div> 
                </div>
            </div>
            <div class="h-screen bg-primary flex-[1_0_auto] max-w-[570px] w-full max-[980px]:hidden max-[1100px]:max-w-[440px]">

                <?php
                if ( have_rows( 'bp_question_right_side' ) ) :
                    while ( have_rows( 'bp_question_right_side' ) ) : the_row();
                
                        $slogan = get_sub_field( 'question_slogan' ); ?>
                
                        <div class="h-full question-slider">
                            <div class="!flex h-full items-center justify-center">
                                <div class="max-w-[505px] w-full -ml-[25%]">
                                    <ul class="flex gap-x-[19px] flex-wrap">
                                        
                                        <?php
                                        if ( have_rows( 'photo_gallery' ) ) :
                                            $count = 0;

                                            while ( have_rows( 'photo_gallery' ) ) : the_row();

                                                $photo  = get_sub_field( 'image' );
                                                
                                                $list_style = "relative top-[67px] flex-[1_0_auto] max-w-[207px] w-full min-h-[270px] overflow-hidden rounded-[19px] flex items-end";

                                                if ($count % 2 !== 0) {

                                                    $list_style = "relative flex-[1_0_auto] max-w-[207px] w-full min-h-[270px] overflow-hidden rounded-[19px] flex items-end";
                                                }

                                                switch ($count) {
                                                    case 1:
                                                        $bg_color = "bg-[#363194]";
                                                        break;
                                                    case 2:
                                                        $bg_color = "bg-[#3DDED1]";
                                                        break;
                                                    case 3:
                                                        $bg_color = "bg-white";
                                                        break;
                                                    default:
                                                        $bg_color = "bg-[#FDB525]";
                                                        break;
                                                }

                                                $count++;

                                                if ( $photo ) :

                                                    $photo_url = $photo[ 'url' ];
                                                    $photo_alt = $photo[ 'alt' ];
                                                    ?>

                                                    <li class="<?php echo esc_attr( $list_style ); ?>">
                                                        <img src="<?php echo esc_url( $photo_url ); ?>" class="w-full h-auto object-cover z-[2] absolute inset-x-0 bottom-0" alt="<?php echo esc_attr( $photo_alt ); ?>">
                                                        <div class="relative rounded-[19px] min-h-[227px] w-full z-[1] <?php echo esc_attr( $bg_color ); ?>"></div>
                                                    </li>

                                                <?php
                                                endif;
                                            endwhile;
                                        endif;
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="!flex h-full items-end justify-center">
                                <div class="relative max-w-[623px] w-full -ml-[18%]">

                                    <?php
                                    if ( have_rows( 'featured_testimony' ) ) :
                                        while ( have_rows( 'featured_testimony' ) ) : the_row(); 
                                        
                                            $image   = get_sub_field( 'photo' );
                                            $name    = get_sub_field( 'name' );
                                            $message = get_sub_field( 'message' );
                                            $info    = get_sub_field( 'additional_info' );
                                            ?>
                                            
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/question-triangle.png" class="absolute -top-[30%] left-[16%] z-[1]" alt="triangle">
                    
                                            <div class="relative z-[2]">

                                                <?php
                                                if ( $image ) :

                                                    $image_url = $image[ 'url' ];
                                                    $image_alt = $image[ 'alt' ];
                                                    ?>
                                                     
                                                    <img src="<?php echo esc_url( $image_url ); ?>" class="w-[515px] h-auto object-cover z-[2]" alt="<?php echo esc_attr( $image_alt ); ?>">

                                                <?php endif; ?>

                                                <div class="absolute right-[2%] bottom-2/4 max-w-[191px] w-full">
                                                    <h2 class="text-white text-[22px] leading-[25px] font-extrabold mb-2.5"><?php echo esc_html( $message ); ?></h2>
                                                    <p class="text-white text-sm leading-[19px]"><?php echo esc_html( $name ); ?>, <span class="block"><?php echo esc_html( $info ); ?></span></p>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/question-quote.png" class="absolute -top-[68px] -right-[52px] w-[104px] h-auto object-cover opacity-30" alt="quote">
                                                </div>
                                            </div>

                                        <?php
                                        endwhile;
                                    endif;
                                    ?>

                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                endif;
                ?>
                
                <div class="hidden max-[980px]:bg-primary max-[980px]:py-[21px] max-[980px]:px-3 max-[980px]:w-full">
                    <div class="text-center max-[980px]:bg-white max-[980px]:rounded-[40px] pt-[26px] px-2.5 pb-[25px]">
                        <span class="flex items-center justify-center w-[31px] h-[31px] rounded-full bg-[#3DDED1] mx-auto mb-5 max-[980px]:mb-[7px]"><svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 5.5L6.5 10.5L16 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <div>
                            <h2 class="text-primary text-[22px] leading-[34px] -tracking-[0.38px] font-bold mb-[11px] max-[980px]:text-[19px] max-[980px]:leading-[26px] max-[980px]:-tracking-[0.28px]">Your sample is ready</h2>
                            <div class="flex gap-x-[2px] items-center mb-6 max-[980px]:mb-[11px] max-[980px]:justify-center">
                                <span class="max-[980px]:hidden"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.16683 1.32385V3.73334C8.16683 4.06003 8.16683 4.22338 8.23041 4.34816C8.28634 4.45792 8.37557 4.54716 8.48534 4.60309C8.61012 4.66667 8.77347 4.66667 9.10016 4.66667H11.5096M5.25016 9.33329L6.41683 10.5L9.04183 7.87496M8.16683 1.16663H5.1335C4.1534 1.16663 3.66336 1.16663 3.28901 1.35736C2.95973 1.52514 2.69201 1.79286 2.52423 2.12214C2.3335 2.49649 2.3335 2.98653 2.3335 3.96663V10.0333C2.3335 11.0134 2.3335 11.5034 2.52423 11.8778C2.69201 12.2071 2.95973 12.4748 3.28901 12.6426C3.66336 12.8333 4.1534 12.8333 5.1335 12.8333H8.86683C9.84692 12.8333 10.337 12.8333 10.7113 12.6426C11.0406 12.4748 11.3083 12.2071 11.4761 11.8778C11.6668 11.5034 11.6668 11.0134 11.6668 10.0333V4.66663L8.16683 1.16663Z" stroke="#5148F9" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <p class="text-[#041D3488] text-xs leading-[23px] -tracking-[0.17px]">Conf_NYC-23-23-1113-3252g.mp4</p>
                            </div>
                            <a href="#" class="flex-[1_0_auto] bg-primary !text-white leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] font-bold max-w-[142px] w-full">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>