<?php
/* function start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'start_session'); */

/**
 * verbitwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package verbitwp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function verbitwp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on verbitwp, use a find and replace
		* to change 'verbitwp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'verbitwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'verbitwp' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'verbitwp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'verbitwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verbitwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verbitwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'verbitwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verbitwp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'verbitwp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'verbitwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'verbitwp_widgets_init' );


/**
 * Implement the custom enqueues.
 */
require get_template_directory() . '/src/inc/custom-enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/src/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/src/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/src/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/src/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/src/inc/jetpack.php';
}

/**
 * Custom menu locations.
 */
require get_template_directory() . '/src/inc/register-menu.php';

/**
 * Custom ACF fields.
 */
require get_template_directory() . '/src/inc/custom-acf.php';

/**
 * Custom functions.
 */
require get_template_directory() . '/src/inc/custom-functions.php';



require 'vendor/autoload.php';
use Stripe\StripeClient;

add_action('wp_ajax_product_details', 'product_details_handler');
add_action('wp_ajax_nopriv_product_details', 'product_details_handler');

function product_details_handler() {
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

	$input = json_decode(file_get_contents('php://input'), true);
	$price_id = isset($input['price_id']) ? sanitize_text_field($input['price_id']) : null;
	$quantity = isset($input['quantity']) ? sanitize_text_field($input['quantity']) : 1;

	if (!$price_id) {
        wp_send_json_error(['message' => 'Subscription plan not found']);
        wp_die();
    }
	
    try {
		$price = $stripe->prices->retrieve($price_id);
		$product_id = $price->product;
		$product = $stripe->products->retrieve($product_id);
		$trial_status = false;

		if (isset($price->metadata['Free Trial'])) {
			$trial_period = $price->metadata['Free Trial'];
			// Calculate trial end date - Current time + 7 days
			$trial_end_timestamp = time() + ($trial_period * 24 * 60 * 60); 
			$trial_end_date = date('M jS', $trial_end_timestamp);
			$trial_status = true;
			$trial_message = '*after your '. $trial_period .'-day free trial, on ' . $trial_end_date;
		}

		// Check if the price has a trial period
		/* $trial_period = $price->recurring->trial_period_days;

		if (isset($trial_period)) {
			var_dump('this has a trial period of ' . $trial_period);
			exit;
			$trial_period = $price->recurring->trial_period_days;

			// Calculate trial end date - Current time + 7 days
			$trial_end_timestamp = time() + ($trial_period * 24 * 60 * 60); 
			$trial_end_date = date('M jS', $trial_end_timestamp);
			$trial_notification = '*after your '. $trial_period .'-day free trial, on ' . $trial_end_date;
		} else {
			$trial_notification = 'hi';
		} */

		// Product name
		$product_name = $product->name;

		// Base unit price (e.g., in dollars)
		$unit_price = $price->unit_amount / 100;

		// Payment interval
		if ($price_id === 'price_1QTePORu1vbnX4dY18VTfgZp') {
			// (e.g., hour or day)
			$payment_interval = 'hour';
		} else {
			// (e.g., month or year)
			$payment_interval = $price->recurring->interval;
		}

		// Currency (e.g., USD)
		$unit_currency = $price->currency;

		// Example quantity
		/* $quantity = 1; */

		// Calculate total price before adjustments
		// $base_total = $unit_price * $quantity;

		// Tax rate (e.g., 10%)
		// $tax_rate = 0.1;
		// $tax_amount = $base_total * $tax_rate;

		// Apply coupon discount (e.g., $5 off)
		// $coupon_discount = 5;

		// Other charges (e.g., shipping fee or handling fee)
		// $additional_charges = 2;

		// Final subtotal calculation
		// $subtotal = $base_total + $tax_amount - $coupon_discount + $additional_charges;

		$subtotal = $unit_price * $quantity;
		
		$output = [
            'product' => [
                'name' => $product_name,
                'price' => $unit_price,
				'currency' => $unit_currency,
				'interval' => $payment_interval,
				'subtotal' => $subtotal,
				'trial' => [
					'status' => $trial_status,
					'message' => $trial_message,
				]
            ]
		];

        wp_send_json_success($output);
	} catch (\Stripe\Exception\ApiErrorException $e) {
		wp_send_json_error(['message' => $e->getMessage()]);
	}

	wp_die();
}

add_action('wp_ajax_payment', 'payment_handler');
add_action('wp_ajax_nopriv_payment', 'payment_handler');

function payment_handler() {
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

	$input = json_decode(file_get_contents('php://input'), true);
    $payment_method_id = isset($input['payment_method_id']) ? sanitize_text_field($input['payment_method_id']) : null;
	$price_id = isset($input['price_id']) ? sanitize_text_field($input['price_id']) : null;
	$quantity = isset($input['quantity']) ? sanitize_text_field($input['quantity']) : 1;
	$coupon_code = isset($input['coupon_code']) ? sanitize_text_field($input['coupon_code']) : null;
    $user_id = isset($input['user_id']) ? sanitize_text_field($input['user_id']) : null;
    $user_name = isset($input['user_name']) ? sanitize_text_field($input['user_name']) : null;
    $user_email = isset($input['user_email']) ? sanitize_text_field($input['user_email']) : null; 
    /* $couponCode = isset($input['coupon']) ? sanitize_text_field($input['coupon']) : null; */

	/* if (!$user_id || !$payment_method_id || !$price_id) {
        wp_send_json_error(['message' => 'Subscription plan not found']);
        wp_die();
    } */

	/* $coupon = $stripe->coupons->retrieve($couponCode);
	echo "<pre>";
	var_dump($coupon);
	echo "</pre>"; */

	$plan = null;

	switch ($price_id) {
		case 'price_1QSaJtRu1vbnX4dYqqv7hcKi':
			$plan = 'business';
			break;
		case 'price_1QTZPpRu1vbnX4dYyEmKHG29':
			$plan = 'business';
			break;
		case 'price_1QTePORu1vbnX4dY18VTfgZp':
			$plan = 'pay-as-you-go';
			break;
		default:
			wp_send_json_error(['message' => 'Invalid subscription plan']);
			wp_die();
	}

    try {
		// Get the price object
		$price = $stripe->prices->retrieve($price_id);

		// Validate coupon code if provided
		/* $promotion_code_id = null; */
		
		/* echo "<pre>";
		print_r('DISPLAY PROMOTION CODE ', $coupon_code);
		$promotion_codes = $stripe->promotionCodes->all(['code' => $coupon_code]);
		print_r('DISPLAY PROMOTION CODE OBJECT ', $promotion_codes);
		echo "</pre>";
		exit; */

		/* if ($coupon_code) {
			$promotion_codes = $stripe->promotionCodes->all(['code' => $coupon_code]);
			
			if (!empty($promotion_codes->data)) {
				$promotion_code_id = $promotion_codes->data[0]->id;
			} else {
				wp_send_json_error(['message' => 'Invalid coupon code.']);
				wp_die();
			}
		} */

		// Search customers where vb_user_id matches or is null
		/* $query = "email:'{$user_email}'";
    
		// Add vb_user_id to the query if it exists
		if (!empty($user_id)) {
			$query .= " AND metadata['vb_user_id']:'{$user_id}'";
		}

		$existing_customers = $stripe->customers->search(['query' => $query]); */

		/* // First search: by vb_user_id
		 $customers_by_id = $stripe->customers->search([
			'query' => "metadata['vb_user_id']:'{$user_id}'",
		]);
	
		// Second search: by email
		$customers_by_email = $stripe->customers->search([
			'query' => "email:'{$user_email}'",
		]); */
	
		// Combine results
		/* $customers = array_merge($customers_by_id->data, $customers_by_email->data); */

		// Search for a customer using both external_user_id and email
		$existing_customers = $stripe->customers->search([
			'query' => "metadata['vb_user_id']:'{$user_id}' AND email:'{$user_email}'",
		]);

		if (count($existing_customers->data) > 0) {
			// Customer exists, proceed to attach the payment method
			$customer_id = $existing_customers->data[0]->id;
		} else {
			// Create a new customer if not found
			$customer = $stripe->customers->create([
				'email' => $user_email, // $user_email
				'name' => $user_name, // $user_name
				'metadata' => ['vb_user_id' => $user_id], // $user_id
			]);
			$customer_id = $customer->id;
		}
		
		// Customer already exists
		$stripe->paymentMethods->attach(
		$payment_method_id,
		['customer' => $customer_id] // $customer_id
		);

		$has_coupon = false;
		if (!empty($coupon_code)) {
			$coupon_data = get_coupon_discount($coupon_code);
			$has_coupon = true;
		}

		// Create the payment (subscription or one-time)
		if ($plan === 'business') {
			// Handle subscription payment
			/* $subscriptions = $stripe->subscriptions->create([
			'customer' => $customer_id,
			'items' => [['price' => $price_id]],
			'default_payment_method' => $payment_method_id,
			'recurring' => [
				'trial_period_days' => 7,
			]
			]); */

			// Create subscription
			$subscription_data = [
				'customer' => $customer_id, // $customer_id
				'items' => [['price' => $price_id]],
				'default_payment_method' => $payment_method_id,
			];

			/* print_r('promotion_code_id ->' . $promotion_code_id);
			print_r('promotion_code ->' . $coupon_data['promotion_code_id']);
			exit; */

			// Add promotion code if available
			$code_id = $coupon_data['id'];

			if ($coupon_data['type'] === 'promotion') {
				$subscription_data['promotion_code'] = $code_id;
			} else {
				$subscription_data['discounts'] = [[
					'coupon' => $coupon_code,
				]];
			}

			/* if (!empty($promotion_code_id)) {
			} else {
				try {
					$coupons = $stripe->coupons->retrieve($coupon_code);
	
					if (!empty($coupons)) {
						$subscription_data['discounts'] = [[
							'coupon' => $coupon_code,
						]];
					}
				} catch (\Exception $e) {
					wp_send_json_error(['message' => 'Error retrieving coupon details: ' . $e->getMessage()]);
					wp_die();
				}
			} */

			$subscriptions = $stripe->subscriptions->create($subscription_data);
		} else {

			$base_total = payment_base_total($stripe, $price_id, $quantity);
			/* 
			$discount_amount = $base_total * ($coupon_data['discount'] / 100);
			$total = max(0, $base_total - $discount_amount);
			$total_in_cents = round($total * 100); */

			// Check if the discount is not empty or zero
			if ($has_coupon) {
				$discount_amount = $base_total * ($coupon_data['discount'] / 100);
				$total = max(0, $base_total - $discount_amount);
			} else {
				// No discount applied
				$total = $base_total;
			}

			$total_in_cents = round($total * 100);

			// Create one-time payment with coupon support
			$payment_data = [
				'amount' => $total_in_cents,
				'currency' => $price->currency,
				'payment_method_types' => ['card'],
				'payment_method' => $payment_method_id,
				'customer' => $customer_id, // $customer_id
				'confirm' => true,
				'metadata' => [
					'vb_user_id' => $user_id, //$user_id
					'vb_user_name' => $user_name, //$user_name
					'vb_user_email' => $user_email, //$user_email
				],
				'error_on_requires_action' => true,
			];

			$paymentIntent = $stripe->paymentIntents->create($payment_data);
		}

		wp_send_json_success(['message' => 'Successfully saved card.']);
	} catch (\Stripe\Exception\ApiErrorException $e) {
		wp_send_json_error(['message' => $e->getMessage()]);
	}

	wp_die();
}

function payment_base_total($stripe, $price_id, $quantity) {
	$price = $stripe->prices->retrieve($price_id);
	$unit_price = $price->unit_amount / 100;
	$base_total = $unit_price * $quantity;
	return $base_total;
}

add_action('wp_ajax_validate_coupon', 'validate_coupon_handler');
add_action('wp_ajax_nopriv_validate_coupon', 'validate_coupon_handler');

function validate_coupon_handler() {
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

	$input = json_decode(file_get_contents('php://input'), true);
	$coupon_code = isset($input['coupon_code']) ? sanitize_text_field($input['coupon_code']) : null;
	$price_id = isset($input['price_id']) ? sanitize_text_field($input['price_id']) : null;
	$quantity = isset($input['quantity']) ? sanitize_text_field($input['quantity']) : 1;

	if (!$coupon_code || !$price_id) {
        wp_send_json_error(['message' => 'Coupon field is empty']);
        wp_die();
    }

    try {
		$subtotal = payment_base_total($stripe, $price_id, $quantity);

		$coupon_data = get_coupon_discount($coupon_code);

		$discount_amount = ($subtotal * $coupon_data['discount']) / 100;
		$total = $subtotal - $discount_amount;

		$output = [
			'success' => 'true',
            'coupon' => [
                'code' => $coupon_code,
				'total' => $total,
            ]
		];

        wp_send_json_success($output);

		wp_send_json_success(['message' => 'Valid coupon code.']);
	} catch (\Stripe\Exception\ApiErrorException $e) {
		wp_send_json_error(['message' => $e->getMessage()]);
	}

	wp_die();
}




function get_coupon_discount($coupon_code) {

	/* $promotion_code_id = null;
		$discount = 0;
		
	if ($coupon_code) {
		$promotion_codes = $stripe->promotionCodes->all(['code' => $coupon_code]);

		// If not a promotion code, attempt as a coupon ID
		if (empty($promotion_codes->data)) {
			$coupons = $stripe->coupons->retrieve($coupon_code);

			if (!empty($coupons)) {
				$promotion_code_id = $coupon_code; // Set coupon ID as fallback
				$discount = $coupons->percent_off ?? 0;					
			} else {
				wp_send_json_error(['message' => 'Invalid coupon code.']);
				wp_die();
			}
		} else {
			// Use promotion code details
			$promotion_code_id = $promotion_codes->data[0]->id;
			$discount = $promotion_codes->data[0]->coupon->percent_off ?? 0;
		}
	} */

    // Initialize the Stripe client
    $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

    // Check if the coupon code exists
    /* if (!$coupon_code) {
        wp_send_json_error(['message' => 'Coupon code is required.']);
        wp_die();
    }
 */

    try {
        // Attempt to retrieve promotion codes by coupon code
        $promotion_codes = $stripe->promotionCodes->all(['code' => $coupon_code]);

        // If no promotion codes found, attempt to retrieve coupon ID
        if (empty($promotion_codes->data)) {
            try {
                $coupons = $stripe->coupons->retrieve($coupon_code);

                // If coupon exists, set the discount and promotion code ID
                if (!empty($coupons)) {
                    return [
						'type' => 'coupon',
                        'id' => $coupon_code, // Coupon code as ID
                        'discount' => $coupons->percent_off ?? 0, // Get discount percent
                    ];
                } else {
                    wp_send_json_error(['message' => 'Invalid coupon code.']);
                    wp_die();
                }
            } catch (\Exception $e) {
                wp_send_json_error(['message' => 'Error retrieving coupon details: ' . $e->getMessage()]);
                wp_die();
            }
        } else {
            // If promotion code exists, get the discount and promotion code ID
            $promotion_code_id = $promotion_codes->data[0]->id;
            $discount = $promotion_codes->data[0]->coupon->percent_off ?? 0;

            return [
				'type' => 'promotion',
                'id' => $promotion_code_id,
                'discount' => $discount,
            ];
        }
    } catch (\Exception $e) {
        wp_send_json_error(['message' => 'Error processing coupon: ' . $e->getMessage()]);
        wp_die();
    }
}

// Hook to add meta data when the order status is completed
/* add_action('woocommerce_order_status_completed', function($order_id) {
    $order = wc_get_order($order_id);
    if ($order) {
        $message = 'Your order has been successfully completed! Order ID: ' . $order_id;
        $order->update_meta_data('_completion_message', $message);
        $order->save();
    }
});

// Display the custom message on the Thank You page
add_action('woocommerce_thankyou', function($order_id) {
    $order = wc_get_order($order_id);
    if ($order) {
        $message = $order->get_meta('_completion_message');
        if ($message) {
            echo '<p>' . esc_html($message) . '</p>';
        }
    }
}); */









add_action('woocommerce_thankyou', 'create_stripe_payment_intent_on_order_received', 10, 1);

function create_stripe_payment_intent_on_order_received($order_id) {

    // Initialize Stripe Client with your secret key
    $stripe = new \Stripe\StripeClient('sk_test_51Q7yckRu1vbnX4dYAbCV3rY5wyOjv1UWCluhGaiTYCKQyXGR5S7orJKM7qYmJt99zCZTBjZFazn2poQnHsPFqN1k00WGSoGEd9');

    // Get the WooCommerce order
    $order = wc_get_order($order_id);
    if (!$order) {
        error_log('Order not found for ID: ' . $order_id);
        return;
    }

	// Get customer email from the order
    $customer_email = $order->get_billing_email();
    $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();

    // Attempt to retrieve an existing Stripe customer by email
    $stripe_customer = $stripe->customers->search([
        'query' => "email:'$customer_email'"
    ]);

    if (!empty($stripe_customer->data)) {
        // Use the existing customer ID
        $customer_id = $stripe_customer->data[0]->id;
    } else {
        // Create a new customer in Stripe
        $stripe_customer = $stripe->customers->create([
            'email' => $customer_email,
            'name'  => $customer_name,
        ]);
        $customer_id = $stripe_customer->id;
    }

	$stripe->subscriptions->create([
		'customer' => $customer_id,
		'items' => [['price' => 'price_1MowQULkdIwHu7ixraBm864M']],
	]);

	// Get the first product ID from the order
    $product_id = null;
    foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id(); // Simple product ID
        break; // Exit the loop after getting the first product
    }

	echo "<pre>";
	print_r('hello there');
	echo "</pre>";

    if ($product_id) {
        $product = wc_get_product($product_id);
		$payment_type = ($product->is_type('subscription') || $product->is_type('variable-subscription')) ? 'subscription' : 'single';
    } else {
        error_log('No products found in the order.');
    }

	echo "<pre>";
	print_r('hi there');
	echo "</pre>";

    $order_amount = (int) ($order->get_total() * 100); // Amount in cents
    $currency = $order->get_currency();

	echo "<pre>";
	print_r('amount!');
	echo "</pre>";

    try {
        // Create PaymentIntent
        $payment_intent = $stripe->paymentIntents->create([
            'amount' => $order_amount,
            'currency' => $currency,
			'customer' => $customer_id,
            /* 'payment_method_types' => ['card'], */
            'metadata' => ['order_id' => $order_id],
        ]);

		echo "<pre>";
		print_r('payment_intent!');
		echo "</pre>";

        // Retrieve the PaymentIntent ID
        $payment_intent_id = $payment_intent->id;

        // Fetch payment method details
        $payment_intent_info = $stripe->paymentIntents->retrieve($payment_intent_id, []);
        $payment_method_id = $payment_intent_info->id;


		echo "<pre>";
		print_r('payment customer ' . $payment_intent_info->customer);
		echo "</pre>";

        if (!$payment_method_id) {
            error_log('Payment method not found for PaymentIntent: ' . $payment_intent_id);
            return;
        }

        /* $payment_method = $stripe->paymentMethods->retrieve($payment_method_id);
		$payment_method_types = $payment_intent->payment_method_types;
        if ($payment_method->type !== 'card') {
			echo "Unsupported payment method type";
            error_log('Unsupported payment method type: ' . $payment_method->type);
            return;
        }*/

        $token = 'eyJraWQiOiJ5VUFoODEzOXZlbFwvNEpxeTJ0V01KZE55VktlUEJaWnBTRG5TUDVxc3ZnUT0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhZWE3NDBhYS1iZjg1LTQ5MTMtYjY0NC03ZTg5ODBiYThlMWEiLCJ6b25laW5mbyI6IkFtZXJpY2FcL0xvc19BbmdlbGVzIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImN1c3RvbTpwbGF0Zm9ybV9kYXRhIjoie1wic2VsZl9zZXJ2aWNlXCI6dHJ1ZSxcImNvbXBhbnlfbmFtZVwiOlwiQW1vcyBBc2hlcm92XCIsXCJpZFwiOjEzNDA0LFwiZW1haWxcIjpcImFtb3MuYXNoZXJvdkBleHRlcm5hbC52ZXJiaXQuYWlcIixcIm5hbWVcIjpcIlwiLFwicm9sZXNcIjpbXCJjdXN0b21lcl9hZG1pblwiXSxcImdyb3VwX2lkc1wiOltudWxsXSxcInRpbWV6b25lXCI6XCJBbWVyaWNhXC9Mb3NfQW5nZWxlc1wiLFwiY3VzdG9tZXJfaWRzXCI6WzM0MjBdLFwiaXNfdGVzdFwiOnRydWV9IiwiaXNzIjoiaHR0cHM6XC9cL2NvZ25pdG8taWRwLmV1LXdlc3QtMS5hbWF6b25hd3MuY29tXC9ldS13ZXN0LTFfM3NnRmR6YjR5IiwiY29nbml0bzp1c2VybmFtZSI6ImFlYTc0MGFhLWJmODUtNDkxMy1iNjQ0LTdlODk4MGJhOGUxYSIsImdpdmVuX25hbWUiOiJBbW9zIiwib3JpZ2luX2p0aSI6ImZhMDRhZmZhLTBmMzYtNDY2Ny1iMDBkLTU2OWRkYmI0NDQ2NSIsImF1ZCI6IjQ5aGVlaTlwYW5kYTFhODR1MnEwY2k4cDA2IiwiZXZlbnRfaWQiOiI1Zjc2MGI4Ni1kNDIzLTRhMmEtOGZkYi01MzUyNTE2OTM5NTUiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTczMjg1ODY0MSwiZXhwIjoxNzMyOTQ1MDM5LCJpYXQiOjE3MzI4NTg2NDEsImZhbWlseV9uYW1lIjoiQXNoZXJvdiIsImp0aSI6ImRjN2JiZWE4LTQxZDYtNGMwMS04MmNmLWFhNDg5YTEzOWFlNyIsImVtYWlsIjoiYW1vcy5hc2hlcm92QGV4dGVybmFsLnZlcmJpdC5haSJ9.LTcFDkhzdLW-YmiBNVAV4mwuLPn6_Mjkv8RBvvezApWCyv23THo6cvkLHr3NPWbi5A0mWnORlu41iM0SqQxApiRGRAFU7ELU3jQAnpmCqwm0lOhAVIODMRvB1ESmsv0wY-FFlycJ75CnCnyQfsT0CnJF4wBcj_ZvSGcRaQXdam8lHQtAMJx4CjFsHwiYmyvJP1zch8JbWZVoi_I45OG39SQkUDuzxpDnwA5e428dLUUp3cpDVxNvgbrSUbFPP5toy3wnBE0qfs7jGH5VXbsezZiKjCYrK-T73x8uzBLoenNF9Z7f8CxGucroqIVFe611_RD0KIJndTOEGYBBU9gvFw';
        /* $api_url = 'https://self-service-staging.verbit.co/api/v1/me'; */

        // Fetch user data
        /* $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ]);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code !== 200) {
            error_log('Failed to fetch user data. HTTP Code: ' . $http_code);
            return;
        } 

        $user_data = json_decode($response, true); */

        // Prepare payment data
        $payment_data = [
			'detail' => [],
            'transaction_id' => $payment_intent_id,
            'customer_id' => $payment_intent_info->customer,
            /* 'user_email' => $user_data['content']['email'],
            'user_name' => $user_data['content']['cognito_username'],
            'user_company_name' => $user_data['content']['custom_platform_data']['company_name'],
            'user_id' => (string) $user_data['content']['custom_platform_data']['id'], */
			'user_email' => 'amos.asherov@external.verbit.ai',
            'user_name' => 'aea740aa-bf85-4913-b644-7e8980ba8e1a',
            'user_company_name' => 'Amos Asherov',
            'user_id' => '3420',
            'origin_order_id' => 'self-service',
            'amount' => $order_amount,
            'currency' => $currency,
			'country_code' => '',
            'context' => [],
            'request_origin' => 'self-service',
            'items' => [],
            'payment_type' => $payment_type,
            'payment_provider_name' => 'stripe',
			'vid' => 'AT'
        ];
		

        // Send payment data to Verbit API
        $verbit_api_url = 'https://payment-staging.verbit.co/api/v1/user/payment';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $verbit_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payment_data));
        $verbit_response = curl_exec($ch);
        $verbit_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
		
		echo "<pre>";
		print_r('payment data here ' . json_encode($payment_data));
		print_r('USER DATATYPE ' . gettype($payment_data->user_id));
		echo "</pre>";

		var_dump('verbit_response ' . $verbit_response);
		var_dump('verbit_http_code ' . $verbit_http_code);

        if ($verbit_http_code === 200 || $verbit_http_code === 201) {
            error_log('Payment data successfully sent to Verbit API.');
        } else {
            error_log('Failed to send payment data to Verbit API. HTTP Code: ' . $verbit_http_code);
        }
    } catch (\Stripe\Exception\ApiErrorException $e) {
        error_log('Stripe API Error: ' . $e->getMessage());
    } catch (Exception $e) {
        error_log('General Error: ' . $e->getMessage());
    }
}

/* function fetch_third_party_user($user_id) {
    $api_url = "https://thirdpartyapi.com/users/$user_id";
    $response = wp_remote_get($api_url);
    
    if (is_wp_error($response)) {
        return null;
    }

    $user_data = json_decode(wp_remote_retrieve_body($response), true);
    return $user_data;
} */


/* $stripe = new \Stripe\StripeClient('sk_test_51Q7yckRu1vbnX4dYAbCV3rY5wyOjv1UWCluhGaiTYCKQyXGR5S7orJKM7qYmJt99zCZTBjZFazn2poQnHsPFqN1k00WGSoGEd9');

try {
    $stripe->paymentIntents->create([
        'amount' => 1099,
		'currency' => 'usd',
		'payment_method_types' => ['card'],
		'metadata' => ['order_id' => '6735'],
    ]);

    echo json_encode(['success' => true, 'message' => 'PaymentIntent created successfully']);
} catch (\Stripe\Exception\ApiErrorException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} */