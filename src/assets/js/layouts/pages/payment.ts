import { User } from "../../models/User";
import stripePromise from "../../main";

const userData = new User();
const cardHolderFirstName = document.getElementById('cardholder-firstname') as HTMLInputElement;
const cardHolderLastName = document.getElementById('cardholder-lastname') as HTMLInputElement;
const cardHolderEmail = document.getElementById('cardholder-email') as HTMLSpanElement;

let userId: string;
let userName: string;
let userEmail: string;
let userFirstName: string;
let userLastName: string;

const priceId = getUrlParameter('price_id');
const selectedPlan = getUrlParameter('plan');
const selectedPlanQuantity = getUrlParameter('quantity');

document.addEventListener('DOMContentLoaded', async () => {
    await userData.loadUserData();

    userFirstName = userData.getFirstName();
    userLastName = userData.getLastName();
    userEmail = userData.getEmail();
    
    if (cardHolderFirstName && cardHolderLastName && cardHolderEmail) {
        cardHolderFirstName.value = userFirstName;
        cardHolderLastName.value = userLastName;
        cardHolderEmail.textContent = userEmail;
    }
});

const subscriptionSummary = document.getElementById('subscription-summary');
const oneTimeSummary = document.getElementById('one-time-summary');
const packageQuantity = document.getElementById('package-quantity') as HTMLSpanElement;
const cardButton = document.getElementById('card-button') as HTMLButtonElement;
const cardButtonLabel = cardButton?.querySelector('span');
const successPaymentIndicator = document.querySelector('.success-check-indicator');

cardButtonLabel?.classList.remove('hidden');
successPaymentIndicator?.classList.add('hidden');

if (selectedPlan === "business") {
    oneTimeSummary?.remove();
} else {
    if (cardButtonLabel) cardButtonLabel.textContent = 'Pay Now';
    if (packageQuantity) packageQuantity.textContent = selectedPlanQuantity;
    subscriptionSummary?.remove();
}

/* const stripePromise = loadStripe('pk_test_51Q7yckRu1vbnX4dYRprklwVdrOfYG81CF1iRwvgaRJu3mfu0KzNCUbshNW9IhfrGDmve0E19RBDufZIn0VAB7jJp00ApCK1lnC'); */

stripePromise.then(stripe => {
    if (!stripe) {
        console.error('Stripe.js failed to load');
        return;
    }

    const elements = stripe.elements();

    const cardNumber = document.getElementById('card-number');
    const cardExpiry = document.getElementById('card-expiry');
    const cardCvc = document.getElementById('card-cvc');

    const cardNumberElement = elements.create('cardNumber', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                '::placeholder': {
                    color: '#fa755a',
                },
            },
        },
    });
    const cardExpiryElement = elements.create('cardExpiry');
    const cardCvcElement = elements.create('cardCvc');

    if (cardNumber && cardExpiry && cardCvc) {
        cardNumberElement.mount('#card-number');
        cardExpiryElement.mount('#card-expiry');
        cardCvcElement.mount('#card-cvc');
    }

    const cardHolderZipCode = document.getElementById('cardholder-zipcode') as HTMLInputElement;
    const cardResult: HTMLElement | null = document.getElementById('card-result');

    function getCurrencySymbol(currencyCode: string): string {
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: currencyCode,
            currencyDisplay: 'symbol',
        });

        // We just need to extract the symbol
        const formatted = formatter.format(0);
        return formatted.replace(/[0-9.,]/g, '').trim();
    }

    const couponButton = document.getElementById('coupon-button') as HTMLButtonElement;
    const cardHolderCoupon = document.getElementById('cardholder-coupon') as HTMLInputElement;
    const paymentSubtotal = document.querySelectorAll('.js-payment-subtotal') as NodeListOf<HTMLSpanElement>;
    const couponResult = document.getElementById('coupon-result');
    const couponSpinner = document.getElementById('spinner') as HTMLElement;
    const totalIntervalLabelWithCoupon = document.querySelectorAll('.js-pil-coupon') as NodeListOf<HTMLSpanElement>;
    const subtotalWithCoupon = document.querySelector('.js-ps-coupon') as HTMLSpanElement;
    
    let validCoupon: string | null = null;

    couponButton?.addEventListener('click', async (e) => {
        e.preventDefault();
    
        couponSpinner.classList.remove('hidden');

        try {
            const couponCode = cardHolderCoupon?.value;
            const couponApi = await fetch(`${window.stagingUrl}/wp-admin/admin-ajax.php?action=validate_coupon`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    price_id: priceId,
                    quantity: selectedPlanQuantity,
                    coupon_code: couponCode,
                }),
            });

            if (!couponApi.ok) {
                console.error(`Error: ${couponApi.status}`);
                return;
            }

            const couponRes = await couponApi.json();

            if (couponRes.success) {
                const {code, total} = couponRes.data.coupon;

                validCoupon = code;
                cardHolderCoupon.value = code;
                
                if (subscriptionSummary) {
                    paymentSubtotal.forEach(el => el.textContent = total);
                } else {
                    subtotalWithCoupon.textContent = total;
                }

                totalIntervalLabelWithCoupon?.forEach(el => el.remove());
                
                couponResult?.classList.add('hidden');
                couponResult && (couponResult.textContent = '');
                couponSpinner.classList.add('hidden');
            } else {
                if (couponResult && couponSpinner) {
                    couponSpinner.classList.add('hidden');
                    couponResult.classList.remove('hidden');
                    couponResult.textContent = 'Invalid coupon code.';
                }
            }
        } catch (error) {
            console.error('Error:', error);
        }
    
    });

    const displayPlanDetails = async () => {
        try {
            const productApi = await fetch(`${window.stagingUrl}/wp-admin/admin-ajax.php?action=product_details`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    price_id: priceId,
                    quantity: selectedPlanQuantity,
                }),
            });
            
            if (!productApi.ok) {
                console.log(`Error: ${productApi.status}`);
                return;
            }
            
            const productRes = await productApi.json();
            
            if (productRes.success) {
                const {currency, price, interval, subtotal, trial} = productRes.data.product;

                const currencySymbol = getCurrencySymbol(currency);
                const freeTrial = trial.status;

                const paymentCurrency = document.querySelectorAll('.js-payment-currency') as NodeListOf<HTMLSpanElement>;
                const paymentAmount = document.querySelectorAll('.js-payment-amount') as NodeListOf<HTMLSpanElement>;
                const paymentInterval = document.querySelectorAll('.js-payment-interval') as NodeListOf<HTMLSpanElement>;
                const freeTrialWrap = document.getElementById('free-trial');
                const freeTrialMsg = document.getElementById('free-trial-msg');
                const dropdownInterval = document.querySelectorAll('.js-dropdown-interval') as NodeListOf<HTMLSpanElement>;
                const dropdownPlanList = document.querySelectorAll('.js-dropdown-plan li') as NodeListOf<HTMLLIElement>;
                const textPlaceholderloader = document.querySelectorAll('.js-tp-loader') as NodeListOf<HTMLSpanElement>;

                dropdownPlanList.forEach(item => {
                    const intervalOption = item.getAttribute('data-interval');
                    const checkIcon = item?.querySelector('.js-check-icon');
                    const isSelected = interval === intervalOption;
                    
                    if (interval === intervalOption) {
                        item?.classList.add('bg-[#F5F5F5]');
                    }

                    item?.classList.toggle('bg-[#F5F5F5]', isSelected);
                
                    if (checkIcon) {
                        checkIcon.classList.toggle('hidden', !isSelected);
                        checkIcon.classList.toggle('block', isSelected);
                    }
                });

                if (paymentCurrency || paymentAmount || paymentInterval || paymentSubtotal || dropdownInterval) {
                    paymentCurrency.forEach(el => el.textContent = currencySymbol);
                    paymentAmount.forEach(el => el.textContent = price);
                    paymentSubtotal.forEach(el => el.textContent = subtotal);
                    paymentInterval.forEach(el => el.textContent = '/' + interval);
                    dropdownInterval.forEach(el => el.textContent = interval + 'ly');
                    
                    textPlaceholderloader.forEach(el => el.classList.add('hidden'));
                }

                if (freeTrial && freeTrialMsg) {
                    freeTrialMsg.textContent = trial.message;
                } else {
                    if (freeTrialWrap) {
                        freeTrialWrap.remove();
                    }
                }
            } else {
                console.error('Error fetching product details');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };
    
    displayPlanDetails();

    cardButton?.addEventListener('click', async () => {
        const placeOrderLoader = document.querySelector('.circle-loader ');

        placeOrderLoader?.classList.remove('hidden');
        cardButtonLabel?.classList.add('hidden');

        if (!priceId) {
            console.warn('Please select a product.');
            return;
        }

        // Create the Payment Method
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardNumberElement,
            billing_details: {
                name: `${cardHolderFirstName?.value} ${cardHolderLastName?.value}`,
            },
        });

        await userData.loadUserData();

        /* userId = userData.getCognitoUsername();
        userName = userData.getFullName();
        userEmail = userData.getEmail(); */

        userId = '1234';
        userName = 'Nepo';
        userEmail = 'nepo@mail.com';

        if (error) {
            if (cardResult) cardResult.textContent = error.message || 'An unknown error occurred.';
            placeOrderLoader?.classList.add('hidden');
            cardButtonLabel?.classList.remove('hidden');
            return;
        }

        try {
            // Create PaymentIntent on the backend
            const paymentApi = await fetch(`${window.stagingUrl}/wp-admin/admin-ajax.php?action=payment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    payment_method_id: paymentMethod.id,
                    price_id: priceId,
                    quantity: selectedPlanQuantity,
                    user_id: userId,
                    user_name: userName,
                    user_email: userEmail,
                    coupon_code: validCoupon,
                }),
            });

            if (!paymentApi.ok) {
                if (cardResult) cardResult.textContent = `Error: ${paymentApi.status}`;
                return;
            }

            const paymentRes = await paymentApi.json();

            if (!paymentRes.success) {
                if (cardResult) cardResult.textContent = paymentRes.data.message || 'An error occurred.';
                placeOrderLoader?.classList.add('hidden');
                cardButtonLabel?.classList.remove('hidden');
                return;
            }

            const { payment_intent_id } = paymentRes.data;
            
            if (paymentRes.success) {
                let redirectUrl = '';
                placeOrderLoader?.classList.add('hidden');
                successPaymentIndicator?.classList.remove('hidden');
                cardButton.textContent = '';

                if (!payment_intent_id) {
                    redirectUrl = `/verify`;
                } else { 
                    redirectUrl = `/confirmation?transaction_id=${payment_intent_id}`;
                }
                
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 3000);
            } else {
                if (cardResult) cardResult.textContent = 'Payment failed. Please try again.';
                placeOrderLoader?.classList.add('hidden');
                cardButtonLabel?.classList.remove('hidden');
            }

            cardNumberElement.clear();
            cardExpiryElement.clear();
            cardCvcElement.clear();
        } catch (error) {
            console.error('Error creating payment:', error);
            if (cardResult) cardResult.textContent = 'An unexpected error occurred.';
            placeOrderLoader?.classList.add('hidden');
            cardButtonLabel?.classList.add('hidden');
        }
    });
}).catch((error) => {
    console.error('Error initializing Stripe:', error);
});

function getUrlParameter(name: string): string | null {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

const swithPlan = document.getElementById('switch-plan') as HTMLElement;
swithPlan?.addEventListener('click', () => {
    const nextSibling = swithPlan.nextElementSibling as HTMLElement | null;
    if (nextSibling) {
        nextSibling.classList.toggle('hidden');
    }
});