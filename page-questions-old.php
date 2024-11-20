<?php
/* acf_form_head(); */
get_header();

get_template_part( 'src/blocks/layouts/pages/questions/site-head' ); ?>


<?php
$args = array(
    'post_type'      => 'question',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);

$question_posts = new WP_Query($args);

if ($question_posts->have_posts()) : ?>

    <ul>

        <?php while ($question_posts->have_posts()) :
            $question_posts->the_post(); 
            $options = get_sub_field('question_option');
            echo the_title() . '<br>';

            if( have_rows('question_option') ):
                while( have_rows('question_option') ): the_row(); 
                    $answer = get_sub_field('answer'); ?>
                    <div>
                        <input type="radio" id="<?php echo $answer; ?>" name="question" value="<?php echo $answer; ?>" />
                        <label for="<?php echo $answer; ?>"><?php echo $answer; ?></label>
                    </div>
                <?php
                endwhile;
            endif; ?>
            <a href="">Continue</a>
            <a href="">Skip</a>
        <?php
        endwhile;
        wp_reset_postdata(); 
        ?>

    </ul>

    <div>

    </div>

<?php endif; ?>


<?php
/* acf_form(array(
    'post_id'       => 'user_' . get_current_user_id(),
    'field_groups'  => array('group_66a34d1fc96ef'),
    'submit_value'  => 'Submit',
    'return'        => add_query_arg('updated', 'true', get_permalink()),
));
 */
/* if ( have_rows( 'mailer_blocks' ) ) {
    while ( have_rows( 'mailer_blocks' ) ) {
        the_row();

        $dir = 'src/blocks/layouts/pages/mailer/';
        
        include $dir . get_row_layout() . '.php';
    }
}

get_template_part( 'src/blocks/layouts/pages/mailer/footer' ); */