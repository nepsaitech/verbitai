<section class="plan-options">
    <div class="bg-[#F2F6FF] pt-[80px] pb-[80px] px-8 max-[880px]:pt-[68px] max-[880px]:px-[14px] max-[880px]:mb-[48px] max-[880px]:pb-[48px]">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex gap-5 items-center justify-center max-[880px]:flex-col max-[880px]:gap-[48px]">

                <?php 
                $starter_product_id = 1304; // Starter Plan
                $starter_product = wc_get_product($starter_product_id);

                if ($starter_product) :

                    $title       = $starter_product->get_name();
                    $price       = $starter_product->get_price();
                    $icon        = get_field( 'free_plan_icon', $starter_product_id );
                    $subtitle    = get_field( 'free_plan_subtitle', $starter_product_id );
                    $duration    = get_field( 'free_plan_duration', $starter_product_id );
                    $description = get_field( 'free_plan_description', $starter_product_id );
                    $button      = get_field( 'free_plan_button', $starter_product_id );
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-[35px] px-[16px] text-sm text-[#041D34] text-center bg-white [box-shadow:0px_7px_8px_0px_#5148F91A] rounded-[40px] max-w-[347px] w-full min-h-[342px] max-[880px]:max-w-[352px]">
                        <div class="bg-[#008A7E] w-[57px] h-[57px] flex justify-center items-center mx-auto -mt-[13px] rounded-full">

                            <?php 
                            if ( $icon ) :

                                $icon_url = $icon[ 'url' ];
                                $icon_alt = $icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>">

                            <?php endif; ?>
                            
                        </div>
                        <h2 class="text-[22px] leading-[34px] mb-[3px] font-bold max-[880px]:mb-[2px]"><?php echo esc_html( $title ); ?></h2>
                        <h3 class="text-xs text-[#00000066] leading-[23px] mb-[22px] w-fit mx-auto rounded-[38px]"><?php echo esc_html( $subtitle ); ?></h3>
                        
                        <div class="flex flex-col text-[#303030] justify-center flex-grow basis-full gap-1">
                            <span class="text-[28px] leading-[24px] font-bold"><?php echo ( "0" === $price ) ? 'Free':''; ?></span><span class="text-xs leading-[18px]"><?php echo esc_html( $duration ); ?></span>
                        </div>
                        
                        <div class="mx-auto text-[#041D34A5] text-sm leading-[19px] -tracking-[0.17px] my-[22px]">
                            <p><?php echo esc_html( $description ); ?></p>
                        </div>

                        <?php 
                        if ( $button ) :

                            $button_url    = $button[ 'url' ];
                            $button_title  = $button[ 'title' ];
                            $button_target = $button[ 'target' ] ? $button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" class="inline-block bg-transparent !text-[#008A7E] border-2 border-solid border-[#008A7E] text-center text-lg leading-[38px] py-[5px] px-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full max-[880px]:border-[#2EC6BA] max-[880px]:!text-[#2EC6BA]"><?php echo esc_html( $button_title ); ?></a>
                        
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php 
                $monthly_product_id = 1310; // Monthly Plan
                $yearly_product_id = 1312; // Yearly Plan
                $monthly_product = wc_get_product($monthly_product_id);
                $yearly_product = wc_get_product($yearly_product_id);

                if ($monthly_product && $yearly_product) :
                    $yearly_title     = preg_replace('/\s*\(.*?\)\s*/', '', $yearly_product->get_name());
                    $monthly_price    = $monthly_product->get_regular_price();
                    $yearly_price     = $yearly_product->get_regular_price();
                    $currency_symbol  = get_woocommerce_currency_symbol();
                    $upgrade_icon     = get_field( 'upgrade_plan_icon', $yearly_product_id );
                    $upgrade_subtitle = get_field( 'upgrade_plan_subtitle', $yearly_product_id );
                    $upgrade_button   = get_field( 'upgrade_plan_button', $yearly_product_id );
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-10 px-5 text-xs text-[#041D34] text-center bg-white [box-shadow:0px_22.38px_12.21px_0px_#5148F90F] rounded-[40px] max-w-[347px] w-full min-h-[493px] max-[880px]:max-w-[352px]">
                        <div class="bg-primary w-[57px] h-[57px] flex justify-center items-center mx-auto mb-[4px] -mt-[22px] rounded-full">

                            <?php 
                            if ( $upgrade_icon ) :

                                $upgrade_icon_url = $upgrade_icon[ 'url' ];
                                $upgrade_icon_alt = $upgrade_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $upgrade_icon_url ); ?>" alt="<?php echo esc_attr( $upgrade_icon_alt ); ?>">

                            <?php endif; ?>

                        </div>
                        <h2 class="text-[22px] leading-[34px] mb-[3px] font-bold"><?php echo esc_html( $yearly_title ); ?></h2>
                        <h3 class="text-[13px] text-primary leading-[17px] mb-[22px] w-fit mx-auto bg-[#5148F90F] rounded-[38px] px-[8.3px]"><?php echo esc_html( $upgrade_subtitle ); ?></h3>
                        <fieldset>
                            <div class="flex flex-wrap items-center justify-center  gap-x-[7px]">
                                <input type="hidden" id="yearly-plan-id" value="<?php echo $monthly_product_id; ?>">
                                <input type="hidden" id="monthly-plan-id" value="<?php echo $yearly_product_id; ?>">
                                <input type="checkbox" id="business-plan" name="business-plan" class="peer hidden" data-plan-id="">
                                <p class="leading-[26px] text-[#041D34A5] peer-checked:text-primary peer-checked:font-bold">Monthly</p>
                                    <label for="business-plan" class="flex w-[38px] justify-end peer-checked:justify-start border border-solid border-[#5148F933] rounded-[26px] p-[1.3px]">
                                        <span class="inline-block rounded-full w-[18px] h-[18px] bg-primary"></span>
                                    </label>
                                <p class="leading-[26px] text-primary peer-checked:text-[#041D34A5] font-bold peer-checked:font-normal">Yearly</p>
                                <div class="hidden text-[#303030] peer-checked:flex items-end justify-center mt-[22px] w-full">
                                    <span class="text-[28px] font-bold"><?php echo $currency_symbol; ?><?php echo $monthly_price; ?> <span class="text-base  font-normal">/ month</span></span>
                                </div>
                                <div class="flex text-[#303030] peer-checked:hidden items-end justify-center mt-[22px] w-full">
                                    <span class="text-[28px] font-bold"><?php echo $currency_symbol; ?><?php echo $yearly_price; ?> <span class="text-base  font-normal">/ year</span></span>
                                </div>
                            </div>
                        </fieldset>

                        <div class="mx-auto text-[#041D34A5] text-sm my-[22px]">
                            <ul class="flex flex-col p-0 text-left gap-[16px] business-plan">

                                <?php
                                if ( have_rows( 'upgrade_plan_inclusions', $yearly_product_id ) ) :
                                    while ( have_rows( 'upgrade_plan_inclusions', $yearly_product_id ) ) : the_row();

                                        $item = get_sub_field( 'item' );
                                        ?>

                                        <li class="relative pl-6"><?php echo esc_html( $item ); ?></li>

                                    <?php 
                                    endwhile;
                                endif; ?>

                            </ul>
                        </div>

                        <?php 
                        if ( $upgrade_button ) :

                            $upgrade_button_url    = $upgrade_button[ 'url' ];
                            $upgrade_button_title  = $upgrade_button[ 'title' ];
                            $upgrade_button_target = $upgrade_button[ 'target' ] ? $upgrade_button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $upgrade_button_url ); ?>" target="<?php echo esc_attr( $upgrade_button_target ); ?>" class="inline-block bg-primary !text-white text-center text-lg leading-[38px] p-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full js-business-plan-btn"><?php echo esc_html( $upgrade_button_title ); ?></a>
                        
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php
                $enterprise_product_id = 1306; // Enterprise Plan
                $enterprise_product = wc_get_product($enterprise_product_id);

                if ($enterprise_product) :
                    $enterprise_title     = $enterprise_product->get_name();
                    $enterprise_icon     = get_field( 'upgrade_plan_icon', $enterprise_product_id );
                    $enterprise_subtitle = get_field( 'upgrade_plan_subtitle', $enterprise_product_id );
                    $enterprise_button   = get_field( 'upgrade_plan_button', $enterprise_product_id );
                    ?>

                    <div class="flex flex-col justify-center flex-grow basis-full pb-10 px-2 text-xs text-[#041D34] text-center bg-white [box-shadow:0px_7px_8px_0px_#5148F91A] rounded-[40px] max-w-[347px] w-full min-h-[446px] max-[880px]:max-w-[352px]">
                        <div class="bg-[#FDB525] w-[57px] h-[57px] flex justify-center items-center mx-auto -mt-[21px] mb-[2px] rounded-full">

                            <?php 
                            if ( $enterprise_icon ) :

                                $enterprise_icon_url = $enterprise_icon[ 'url' ];
                                $enterprise_icon_alt = $enterprise_icon[ 'alt' ];
                                ?>

                                <img src="<?php echo esc_url( $enterprise_icon_url ); ?>" alt="<?php echo esc_attr( $enterprise_icon_alt ); ?>">

                            <?php endif; ?>
                            
                        </div>
                        <h2 class="text-[22px] leading-[34px] font-bold"><?php echo esc_html( $enterprise_title ); ?></h2>
                        <h3 class="text-xs text-[#00000066] leading-[23px] w-fit mx-auto rounded-[38px] px-2"><?php echo esc_html( $enterprise_subtitle ); ?></h3>
                        <div class="mx-auto text-[#041D34A5] text-sm my-[22px] max-w-[276px] w-full">
                            <ul class="flex flex-col p-0 text-left gap-[16px] enterprise-plan">

                                <?php
                                if ( have_rows( 'upgrade_plan_inclusions', $enterprise_product_id ) ) :
                                    while ( have_rows( 'upgrade_plan_inclusions', $enterprise_product_id ) ) : the_row();

                                        $item = get_sub_field( 'item' );
                                        ?>

                                        <li class="relative pl-6"><?php echo esc_html( $item ); ?></li>

                                        <?php 
                                    endwhile;
                                endif; ?>

                            </ul>
                        </div>

                        <?php 
                        if ( $enterprise_button ) :

                            $enterprise_button_url    = $enterprise_button[ 'url' ];
                            $enterprise_button_title  = $enterprise_button[ 'title' ];
                            $enterprise_button_target = $enterprise_button[ 'target' ] ? $enterprise_button[ 'target' ] : '_self';
                            ?>

                            <a href="<?php echo esc_url( $enterprise_button_url ); ?>" target="<?php echo esc_attr( $enterprise_button_target ); ?>" class="inline-block bg-transparent !text-[#FDB525] border-2 border-solid border-[#FDB525] text-center text-lg leading-[38px] py-[5px] px-[7px] rounded-[56px] font-bold mx-auto max-w-[180px] w-full"><?php echo esc_html( $enterprise_button_title ); ?></a>
                        
                        <?php endif; ?>
                        
                    </div>

                <?php endif; ?>

            </div>
                
        </div>
    </div>
</section>




