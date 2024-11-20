<section class="fixed bg-[#00000080] inset-0 hidden justify-center items-center px-[22px] z-[60] purchase" data-type="modal" data-modal="purchase">
    <div>
        <div class="relative bg-white max-w-[760px] w-full flex items-stretch rounded-[20px] [box-shadow:0px_4px_14px_0px_#0000001A] text-[#041D34A6] overflow-hidden max-md:flex-col" data-info="content">
            <a href="#" class="inline-block absolute left-[21px] top-5 max-md:top-[18px]" data-close="purchase">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 0.5L9 9" stroke="black"/><path d="M9 0.5L0.5 9" stroke="black"/></svg>
            </a>
            
            <?php 
            if ( have_rows( 'content' ) ):
                while ( have_rows( 'content' ) ) : the_row(); ?>

                    <div class="flex flex-col justify-between flex-[1_0_auto] bg-[#F6F6FF] max-w-[363px] w-full min-h-[469px] pt-[82px] pb-[61px] pl-[65px] pr-5 max-md:max-w-full max-md:min-h-0 max-md:pt-[36px] max-md:px-[33px] max-md:pb-[18px] max-md:text-center">

                        <?php
                        if ( have_rows( 'left_section' ) ):
                            while ( have_rows( 'left_section' ) ) : the_row();

                                $title       = get_sub_field( 'title' );
                                $description = get_sub_field( 'description' );
                                ?>

                                <div>
                                    <h2 class="text-primary text-[30px] leading-9 font-bold mb-[25px] max-md:mb-[12px]"><?php echo esc_html( $title ); ?></h2>
                                    <p class="-leading-[0.17px]"><?php echo esc_html( $description ); ?></p>
                                </div>
                                <div class="flex items-center gap-x-[11px] max-md:hidden">

                                    <?php 
                                    if ( have_rows( 'standards' ) ):
                                        while ( have_rows( 'standards' ) ) : the_row(); 

                                            $brand = get_sub_field( 'brand' );

                                            if ( $brand ) :
                                                
                                                $brand_url = $brand[ 'url' ];
                                                $brand_alt = $brand[ 'alt' ];
                                                ?>
                                        
                                                <img src="<?php echo esc_url( $brand_url ); ?>" alt="<?php echo esc_attr( $brand_alt ); ?>">

                                            <?php
                                            endif;
                                        endwhile;
                                    endif; ?>

                                </div>

                            <?php
                            endwhile;
                        endif; ?>

                    </div>
                    <div class="pt-[81px] pl-[55px] pr-[44px] pb-[61px] max-md:pt-[25px] max-md:px-[25px] max-md:pb-[35px]">

                        <?php
                        if ( have_rows( 'right_section' ) ):
                            while ( have_rows( 'right_section' ) ) : the_row();

                                $title       = get_sub_field( 'title' );
                                $description = get_sub_field( 'description' );
                                $link        = get_sub_field( 'link' );
                                ?>

                                <div class="flex flex-col justify-between h-full w-full max-md:gap-[43px]">
                                    <ul class="flex flex-col p-0 text-left max-md:gap-[8px] max-md:text-[#5C6C7B]">
                                        
                                        <?php
                                        if ( have_rows( 'list' ) ):
                                            while ( have_rows( 'list' ) ) : the_row();

                                                $item = get_sub_field( 'item' );
                                                ?>
                                                
                                                <li class="relative py-[7px] pl-[21px] leading-[130%] -tracking-[0.17px] max-md:leading-6 max-md:pl-[19px] max-md:left-2">
                                                    <span class="absolute left-0 top-2.5 bg-primary rounded-full flex items-center justify-center w-[13px] h-[13px] max-md:top-[12px]"><svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.746094 2.85156L2.61951 4.85156L6.36635 0.851562" stroke="white"/></span>
                                                        
                                                    <?php echo esc_html( $item ); ?> 
                                                        
                                                </li>
                                                
                                                <?php
                                            endwhile;
                                        endif; ?>

                                    </ul>
                                    
                                    <?php 
                                    if ( $link ) :

                                        $link_url    = $link[ 'url' ];
                                        $link_title  = $link[ 'title' ];
                                        $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
                                        ?>

                                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="relative block bg-primary !text-white text-center text-lg leading-[38px] py-[7px] px-5 rounded-[56px] font-bold max-w-[298px] w-full"><?php echo esc_html( $link_title ); ?></a>
                                    
                                    <?php endif; ?>

                                </div>

                            <?php
                            endwhile;
                        endif; ?>

                    </div>

                <?php
                endwhile;
            endif; ?>

        </div>
    </div>
</section>