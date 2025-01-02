<?php
/*
Template Name: Contact Sales Page
Template Post Type: page
*/

get_header();
get_template_part( 'src/blocks/layouts/site-head' );
?>

<div class="hubspot-form">
    <div class="max-w-[1920px] mx-auto">
        <div class="py-40 px-5">
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
            hbspt.forms.create({
            portalId: "4023006",
            formId: "b6e9b2fe-5518-4339-999d-0ce877f07e51"
            });
            </script>
        </div>
    </div>
</div>

<?php
get_footer();