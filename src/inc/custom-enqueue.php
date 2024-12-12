<?php
/**
 * Enqueue custom styles and scripts.
 */
function enqueue_custom_script() {

	// Enqueue default css
	wp_enqueue_style( 'default-css', get_stylesheet_uri(), array(), _S_VERSION );

	// Enqueue rtl css
	wp_style_add_data( 'rtl-css', 'rtl', 'replace' );

	// Comment reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue slick css
	wp_enqueue_style( 'slick-lib', get_template_directory_uri() . '/src/vendor/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme-lib', get_template_directory_uri() . '/src/vendor/css/slick-theme.css', array(), _S_VERSION );
	

	// Enqueue tailwind css
	wp_enqueue_style( 'tailwind-css', get_template_directory_uri() . '/src/assets/css/output.css', array(), _S_VERSION );

    // Path to the manifest file.
    $manifest_path = get_template_directory() . '/dist/manifest.json';
    
    // Check if the manifest file exists.
    if ( file_exists( $manifest_path ) ) {

        // Get the content of the manifest file.
        $manifest = json_decode( file_get_contents( $manifest_path ), true);
		
		// Enqueue on all pages
        if ( isset( $manifest[ 'header.js' ] ) ) {
            wp_enqueue_script('header', get_template_directory_uri() . $manifest[ 'header.js' ], array(), null, true);
        }

		if ( isset( $manifest[ 'customer.js' ] ) ) {
			wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true);
		}

		/* if ( isset( $manifest[ 'pageRestrictions.js' ] ) ) {
            wp_enqueue_script('pageRestrictions', get_template_directory_uri() . $manifest[ 'pageRestrictions.js' ], array(), null, false);
        }
 */
		// Enqueue on home page
        if ( is_front_page() && isset( $manifest[ 'home.js' ] ) ) {
			wp_enqueue_script('home', get_template_directory_uri() . $manifest[ 'home.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
        }

		// Enqueue on pricing page
		if ( is_page( 8 ) && isset( $manifest[ 'pricing.js' ] ) ) {
            wp_enqueue_script('pricing', get_template_directory_uri() . $manifest[ 'pricing.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
        } 

		// Enqueue on transcript page
		if ( is_page( 314 ) && isset( $manifest[ 'transcript.js' ] ) ) {
            wp_enqueue_script('transcript', get_template_directory_uri() . $manifest[ 'transcript.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
        }
    
		// Enqueue on checkout page
		if ( is_page( array( 987, 991, 993, 995, 1001, 1003, 1301 ) ) && isset( $manifest[ 'checkout.js' ] ) ) {
            wp_enqueue_script('checkout', get_template_directory_uri() . $manifest[ 'checkout.js' ], array(), null, true);
            wp_enqueue_script('payment', get_template_directory_uri() . $manifest[ 'payment.js' ], array(), null, true);
			wp_localize_script('checkout', 'adminAjax', [
				'ajax_url' => admin_url('admin-ajax.php'),
			]);
        }

		// Enqueue on upload page
		if ( is_page( array( 318, 538 ) ) && isset( $manifest[ 'upload.js' ] ) ) {
            wp_enqueue_script('upload', get_template_directory_uri() . $manifest[ 'upload.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
		}

		// Enqueue on funnel upload page
		if ( is_page( array(538, 421) )  && isset( $manifest[ 'funnel-upload.js' ] ) )  {
            wp_enqueue_script('funnel-upload', get_template_directory_uri() . $manifest[ 'funnel-upload.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
        }
		
		// Enqueue on plan page
		if ( is_page( 282 )  && isset( $manifest[ 'plan.js' ] ) )  {
            wp_enqueue_script('plans', get_template_directory_uri() . $manifest[ 'plan.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
        }

		// Enqueue on question page during sample
		if ( is_page( 421 )  && isset( $manifest[ 'question-during-sample.js' ] ) )  {
            wp_enqueue_script('question-during-sample', get_template_directory_uri() . $manifest[ 'question-during-sample.js' ], array(), null, true);
			/* wp_enqueue_script('funnel-upload', get_template_directory_uri() . $manifest[ 'funnel-upload.js' ], array(), null, true); */
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
		}

		// Enqueue on question page before platform
		if ( is_page( 655  )  && isset( $manifest[ 'question-before-platform.js' ] ) )  {
            wp_enqueue_script('question-before-platform', get_template_directory_uri() . $manifest[ 'question-before-platform.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
		}

		// Enqueue on payment page
		if ( is_page( 991  )  && isset( $manifest[ 'payment.js' ] ) )  {
            wp_enqueue_script('payment', get_template_directory_uri() . $manifest[ 'payment.js' ], array(), null, true);
        }

		// Enqueue on balance checkout page
		if ( is_page( 1005  )  && isset( $manifest[ 'balance-checkout.js' ] ) )  {
            wp_enqueue_script('balance-checkout', get_template_directory_uri() . $manifest[ 'balance-checkout.js' ], array(), null, true);
        }

		// Enqueue on vertical page
		if ( get_post_type() === 'vertical' && isset( $manifest[ 'vertical.js' ] ) )  {
            wp_enqueue_script('vertical', get_template_directory_uri() . $manifest[ 'vertical.js' ], array(), null, true);
			/* wp_enqueue_script('customer', get_template_directory_uri() . $manifest[ 'customer.js' ], array(), null, true); */
			wp_localize_script('vertical', 'verticalData', ['id' => get_the_ID()]);
		}

		// Enqueue all pages
		if ( isset( $manifest[ 'main.js' ] ) )  {
            wp_enqueue_script('main', get_template_directory_uri() . $manifest[ 'main.js' ], array(), null, true);
        }
	}

	// Enqueue WP jquery
	wp_enqueue_script('jquery');

	// Enqueue slick js
	wp_enqueue_script( 'jquery-migrate-lib', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '1.2.1', true );
	wp_enqueue_script( 'slick-lib', get_template_directory_uri() . '/src/vendor/js/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/src/assets/js/custom.js', array(), _S_VERSION, true );
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');