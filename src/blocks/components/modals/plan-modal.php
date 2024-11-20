<section class="plan-modal">
    <div class="fixed bg-[#00000080] inset-0">
        <div class="bg-white max-w-[760px] h-[470px] flex items-stretch">
            <div class="text-[#041D34]">
                <div>
                    <h2 class="text-primary text-[30px] leading-9 font-bold"></h2>
                    <p>You've reached your 30-minute transcription limit. Choose a plan and keep transcribing your files.</p>
                </div>
                <div class="flex space-x-4 items-center">
                    <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/wcag-brand.png" alt="wcag"></a>
                    <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/gdpr-brand.png" alt="gdpr"></a>
                    <a><img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/iso-brand.png" alt="iso"></a>
                </div>
            </div>
            <div class="text-[#303030]">
                <fieldset>
                    <legend>Published status</legend>

                    <input id="draft" class="peer/draft" type="radio" name="status" checked />
                    <label for="draft" class="peer-checked/draft:text-sky-500">Draft</label>

                    <input id="published" class="peer/published" type="radio" name="status" />
                    <label for="published" class="peer-checked/published:text-sky-500">Published</label>

                    <div class="hidden peer-checked/draft:block">Drafts are only visible to administrators.</div>
                    <div class="hidden peer-checked/published:block">Your post will be publicly visible on your site.</div>
                </fieldset>
            </div>
        </div>
    </div>
</section>