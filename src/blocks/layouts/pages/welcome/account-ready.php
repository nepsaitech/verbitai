<section class="confirmation-checkout">
    <div class="mx-auto">
        <div class="flex justify-center">

            <?php 
            if ( have_rows( 'welcome_content' ) ) :
                while ( have_rows( 'welcome_content' ) ) : the_row(); 
                
                    $icon = get_sub_field( 'icon' );
                    $title = get_sub_field( 'title' );
                    $description = get_sub_field( 'description' );
                    $button = get_sub_field( 'button' );
                    ?>

                    <div class="max-w-[676px] w-full text-center mt-[150px] max-sm:mt-[90px]">
                        <div class="mb-[40px]">

                            <?php 
                            if ( $icon ) :
                                
                                $icon_url = $icon[ 'url' ];
                                $icon_alt = $icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $icon_url ); ?>" class="mx-auto mb-[30px]" lt="<?php echo esc_attr( $icon_alt ); ?>">
                            
                            <?php endif; ?>
                            <h2 class="font-extrabold text-[40px] leading-[45px] mb-[12px]"><?php echo esc_html( $title ); ?></h2>
                            <p class="leading-[22px] text-[#041D34A6]"><?php echo esc_html( $description ); ?></p>
                        </div>

                        <?php
                            if ( $button ) :

                            $button_link   = $button[ 'url' ];
                            $button_title  = $button[ 'title' ];
                            $button_target = $button[ 'target' ] ? $button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $button_link ); ?>" target="<?php echo esc_attr( $button_target ); ?>" class="inline-block bg-primary !text-white text-center text-[17px] leading-[42px] py-[5px] px-2.5 max-w-[200px] w-full rounded-[56px] font-bold max-md:px-[26px]"><?php echo esc_html( $button_title ); ?></a>

                        <?php endif; ?>
                    </div>

                <?php 
                endwhile; 
            endif; ?>

        </div>
    </div>
</section>