<?php
if ( have_rows( 'button_actions' ) ) : 
    while ( have_rows( 'button_actions' ) ) : the_row();
    ?>

        <div class="w-full flex items-center gap-[14px] max-md:flex-wrap max-md:gap-[9px] max-md:items-stretch">

            <?php
            if ( have_rows( 'translate' ) ):
                while ( have_rows( 'translate' ) ) : the_row();

                    $translate_icon = get_sub_field( 'icon' );
                    $translate_label = get_sub_field( 'label' );
                ?>

                    <a href="#" class="flex items-center gap-[5px] leading-[31px] -tracking-[0.22px] !text-[#041D34A6] py-[4.6px] px-[10px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center max-md:border-[1.3px] max-md:justify-center max-md:order-2 max-md:flex-grow max-md:basis-[48.2%]" data-target="translate">

                    <?php 
                    if ( $translate_icon ) : 
                        
                        $translate_icon_url = $translate_icon[ 'url' ];
                        $translate_icon_alt = $translate_icon[ 'alt' ];
                        ?>

                        <img src="<?php echo esc_url( $translate_icon_url ); ?>" alt="<?php echo esc_attr( $translate_icon_alt ); ?>">
                    
                    <?php endif; ?>

                    <?php echo $translate_label; ?>
                    
                    </a>

                <?php
                endwhile;
            endif; ?>

            <?php
            if ( have_rows( 'download' ) ):
                while ( have_rows( 'download' ) ) : the_row();

                    $download_icon         = get_sub_field( 'icon' );
                    $download_label        = get_sub_field( 'label' );
                    $download_mobile_label = get_sub_field( 'mobile_label' );
                ?>

                    <a href="#" class="flex items-center gap-[5px] leading-[31px] -tracking-[0.22px] !text-[#041D34A6] py-[4.6px] px-[10px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center max-md:border-[1.3px] max-md:justify-center max-md:order-4 max-md:flex-grow max-md:basis-[48.2%]" data-target="export">

                    <?php 
                    if ( $download_icon ) : 
                        
                        $download_icon_url = $download_icon[ 'url' ];
                        $download_icon_alt = $download_icon[ 'alt' ];
                        ?>

                        <img src="<?php echo esc_url( $download_icon_url ); ?>" alt="<?php echo esc_attr( $download_icon_alt ); ?>">
                    
                    <?php endif; ?>

                    <span class="max-md:hidden"><?php echo $download_label; ?></span>
                    <span class="hidden max-md:block"><?php echo $download_mobile_label; ?></span>
                    
                    </a>

                <?php
                endwhile;
            endif; ?>

            <?php
            if ( have_rows( 'tags' ) ):
                while ( have_rows( 'tags' ) ) : the_row();

                    $tags_icon = get_sub_field( 'icon' );
                    $tags_label = get_sub_field( 'label' );
                    $tags_mobile_label = get_sub_field( 'mobile_label' );
                ?>

                    <a href="#" class="flex items-center gap-[5px] leading-[31px] -tracking-[0.22px] !text-[#041D34A6] py-[4.6px] px-[9.1px] rounded-[4px] border-2 border-solid border-[#5C6C7B33] text-center max-md:border-[1.3px] max-md:justify-center max-md:order-3 max-md:flex-grow max-md:basis-[48.2%]" data-target="tags">

                    <?php 
                    if ( $tags_icon ) : 
                        
                        $tags_icon_url = $tags_icon[ 'url' ];
                        $tags_icon_alt = $tags_icon[ 'alt' ];
                        ?>

                        <img src="<?php echo esc_url( $tags_icon_url ); ?>" alt="<?php echo esc_attr( $tags_icon_alt ); ?>">
                    
                    <?php endif; ?>
                    
                    <?php echo $tags_label; ?>
                    
                    </a>

                <?php
                endwhile;
            endif; ?>

            <?php
            if ( have_rows( 'export' ) ):
                while ( have_rows( 'export' ) ) : the_row();

                    $export_icon = get_sub_field( 'icon' );
                    $export_label = get_sub_field( 'label' );
                    $export_mobile_label = get_sub_field( 'mobile_label' );
                ?>

                    <a href="#" class="flex items-center gap-[6px] leading-[38px] !text-primary py-[1px] px-[20.5px] rounded-[56px] border-2 border-solid border-primary text-center font-bold absolute right-[41px] max-md:border-[1.3px] max-md:justify-center max-md:rounded-[4px] max-md:static max-md:order-1 max-md:flex-grow max-md:basis-[48.2%]" data-target="export">

                    <?php 
                    if ( $export_icon ) : 
                        
                        $export_icon_url = $export_icon[ 'url' ];
                        $export_icon_alt = $export_icon[ 'alt' ];
                        ?>

                        <img src="<?php echo esc_url( $export_icon_url ); ?>" alt="<?php echo esc_attr( $export_icon_alt ); ?>">
                    
                    <?php endif; ?>
                    
                    <?php echo $export_label; ?>
                    
                    </a>

                <?php
                endwhile;
            endif; ?>

        </div>

    <?php 
    endwhile;
endif; ?>
