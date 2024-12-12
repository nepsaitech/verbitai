<div class="relative w-fit">
    <select name="plan-package" id="hourly-plan" data-plan="package" data-value="price_1QTePORu1vbnX4dY18VTfgZp" class="text-primary border-[1.33px] border-[#5148F933] rounded-[1.33px] relative py-[7px] px-[11px] pr-8 -tracking-[0.17px] leading-[23px] focus-within:outline-primary">
        <option value="" disabled selected>Add Hours</option>

        <?php 
        if ( have_rows( 'package' ) ) :
            while ( have_rows( 'package' ) ) : the_row();
            
            $hour = get_sub_field( 'hour' );
            ?>

            <option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>

            <?php 
            endwhile;
        endif; ?>

    </select>

    <span class="absolute top-2/4 right-[5px] -translate-y-2/4 bg-white p-2"><svg width="7" height="5" viewBox="0 0 7 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.80441 3.81766L6.19494 1.42713C6.61491 1.00716 6.31747 0.289062 5.72353 0.289062H0.942484C0.348547 0.289062 0.0511014 1.00716 0.471078 1.42713L2.8616 3.81766C3.12195 4.07801 3.54406 4.07801 3.80441 3.81766Z" fill="#5148F9"/></svg></span>
</div>