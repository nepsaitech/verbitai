<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package verbitwp
 */

?>

	<footer class="footer">
		<div class="bg-[#363194]">
			<div class="max-w-[1440px] mx-auto">
				<div class="flex flex-row justify-between py-10 px-[5px] max-lg:flex-col max-lg:px-[59px] max-lg:py-[41px] max-lg:flex-wrap max-lg:gap-3 max-lg:min-h-[560px] max-lg:justify-start">
					<div class="flex-[1_0_auto] max-lg:flex-none">
						<div class="w-[126px] h-[44px] pr-6 logo max-lg:pr-0">
							<?php the_custom_logo(); ?>
						</div>
					</div>
					<div class="flex justify-end gap-8 flex-[1_0_auto] max-lg:flex-none max-xl:justify-start max-xl:flex-wrap">
						<div class="max-w-[260px] w-full max-xl:max-w-fit max-lg:max-w-full max-lg:hidden max-ms:w-full max-lg:w-full">
							<h2 class="text-white font-bold leading-[45px]">Industries</h2>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'industries-menu',
									)
								);
							?>
						</div>
						<div class="max-w-[260px] w-full max-xl:max-w-fit max-lg:max-w-full max-lg:hidden max-ms:w-full max-lg:w-full">
							<h2 class="text-white font-bold leading-[45px]">Solutions</h2>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'solutions-menu',
									)
								);
							?>
						</div>
						<div class="max-w-[260px] w-full max-xl:max-w-fit max-lg:w-full max-lg:max-w-full">
							<h2 class="text-white font-bold leading-[45px]">Resources</h2>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'resources-menu',
									)
								);
							?>
						</div>
						<div class="more-on-verbit max-w-[249px] w-full max-xl:max-w-fit max-lg:max-w-full max-lg:hidden max-ms:w-full max-lg:w-[48%]">
							<h2 class="text-white font-bold leading-[45px]">More on Verbit</h2>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'more-on-verbit-menu',
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- <script src="https://js.stripe.com/v3/"></script>


<script>
	const stripe = Stripe('pk_test_51Q7yckRu1vbnX4dYRprklwVdrOfYG81CF1iRwvgaRJu3mfu0KzNCUbshNW9IhfrGDmve0E19RBDufZIn0VAB7jJp00ApCK1lnC'); // Replace with your Stripe public key
	const elements = stripe.elements();
	const cardElement = elements.create('card');
	cardElement.mount('#card-element');

	document.getElementById('payment-form').addEventListener('submit', async (e) => {
		e.preventDefault();

		// Create a payment token
		const { paymentMethod, error } = await stripe.createPaymentMethod({
			type: 'card',
			card: cardElement,
		});

		if (error) {
			console.error(error);
			alert('Error creating payment method: ' + error.message);
			return;
		}

		// Send the token (paymentMethod.id) to your server
		const response = await fetch('http://verbit.local/wp-json/stripe-payment/v1/payment', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({
				token: paymentMethod.id,
			}),
		});

		const result = await response.json();
		alert(result.message);
	});
</script> -->

<!-- <script id="__bs_script__">//<![CDATA[
  (function() {
    try {
      var script = document.createElement('script');
      if ('async') {
        script.async = true;
      }
      script.src = 'http://HOST:3000/browser-sync/browser-sync-client.js?v=2.29.3'.replace("HOST", location.hostname);
      if (document.body) {
        document.body.appendChild(script);
      } else if (document.head) {
        document.head.appendChild(script);
      }
    } catch (e) {
      console.error("Browsersync: could not append script tag", e);
    }
  })()
//]]></script> -->

</body>
</html>
