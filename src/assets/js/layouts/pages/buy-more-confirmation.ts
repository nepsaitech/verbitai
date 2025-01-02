import stripePromise from "../../main";

const transactionId = (window as any).getUrlParameter('transaction_id');

stripePromise.then(stripe => {
    if (!stripe) {
        console.error('Stripe.js failed to load');
        return;
    }

    const buyMoreCheckoutConfirmation = async () => {
        try {
            
            const buyMoreConfirmApi = await fetch(`${(window as any).getBaseUrl()}/wp-admin/admin-ajax.php?action=get_payment_details`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    transaction_id: transactionId,
                }),
            });
            
            if (!buyMoreConfirmApi.ok) {
                console.log(`Error: ${buyMoreConfirmApi.status}`);
                return;
            }
            
            const buyMoreConfirmRes = await buyMoreConfirmApi.json();
            const paymentSubtotal = document.querySelector('.js-payment-subtotal') as HTMLElement;
            const paymentTotal = document.querySelector('.js-payment-total') as HTMLElement;
            const paymentCurrency = document.querySelector('.js-payment-currency') as HTMLElement;
            const textPlaceholderloader = document.querySelectorAll('.js-tp-loader') as NodeListOf<HTMLSpanElement>;

            if (buyMoreConfirmRes.success) {
                const { currency, subtotal, total } = buyMoreConfirmRes.data;
                if (paymentCurrency && paymentSubtotal && paymentTotal) {
                    paymentCurrency.textContent = (window as any).getCurrencySymbol(currency);
                    paymentSubtotal.textContent = subtotal;
                    paymentTotal.textContent = total;
                }

                if (textPlaceholderloader) textPlaceholderloader.forEach(el => el.classList.add('hidden'));
            } else {
                console.error('Error fetching details');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };

    buyMoreCheckoutConfirmation();
});