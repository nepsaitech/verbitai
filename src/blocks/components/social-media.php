<div class="social-media">
    <?php if ( have_rows( 'social_media', 'option' ) ): ?>
        <ul class="flex gap-[18px]">
            <?php while ( have_rows( 'social_media', 'option' ) ):
                the_row();
                $logo = get_sub_field( 'logo' ); 
                if( $logo ):
                    $url = $logo['url'];
                    $alt = $logo['alt'];
                    ?>
                    <li>
                        <a href="#" target="_blank"><img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a>
                    </li>
                <?php endif; ?>
            <?php
            endwhile; ?>
        </ul>
    <?php endif; ?>
</div>