<section class="trusted">
    <div class="max-w-screen-xl mx-auto">
        <div class="pt-[23px] px-5 text-base text-primary text-center max-md:pt-[82px] max-md:px-3">

            <?php
            if ( have_rows( 'trusted_companies', 'option' ) ):
                while ( have_rows( 'trusted_companies', 'option' ) ) : the_row();

                    $heading = get_sub_field( 'heading' );
                    $link    = get_sub_field( 'link' );
                    ?>

                    <h2 class="text-[22px] leading-[65px] font-extrabold mb-[40px]"><?php echo esc_html( $heading ); ?></h2>
                    <ul class="grid grid-cols-5 gap-5 items-center max-sm:grid-cols-3">

                        <?php
                        if ( have_rows( 'logo' ) ):
                            while( have_rows( 'logo' ) ) : the_row();
                            
                                $logo = get_sub_field( 'image' );
                                
                                if ( $logo ) :
                                    
                                    $url =  $logo[ 'url' ];
                                    $alt =  $logo[ 'alt' ];
                                    ?>

                                    <li>
                                        <div class="relative flex justify-center">
                                            <img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
                                        </div>
                                    </li>

                                <?php
                                endif;
                            endwhile;
                        endif;
                            
                        if ( $link ) :

                            $link_url   = $link[ 'url' ];
                            $link_title = $link[ 'title' ];
                            ?>

                            <li class="max-sm:hidden">
                                <a href="<?php echo esc_url( $link_url ); ?>" class="text-primary visited:text-primary font-extrabold"><?php echo esc_html( $link_title ); ?></a>
                            </li>

                        <?php endif; ?>

                    </ul>

                <?php
                endwhile;
            endif;
            ?>

        </div>
    </div>
</section>