declare const stripeConfig: {
    publicKey: string;
};

declare global {
    interface Window {
        getBaseUrl: () => string;
        getUrlParameter: (name: string) => string | null;
        getCurrencySymbol: (currencyCode: string) => string;
        localUrl: string;
        stagingUrl: string;
    }
}

window.localUrl = 'http://verbit.local';
window.stagingUrl = 'https://staging-wp.verbit.co/self-service/';
window.getBaseUrl = (): string => window.location.hostname === 'verbit.local' ? window.localUrl : window.stagingUrl;

window.getUrlParameter = function (name: string): string | null {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
};

window.getCurrencySymbol = function (currencyCode: string): string {
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: currencyCode,
        currencyDisplay: 'symbol',
    });

    const formatted = formatter.format(0);
    return formatted.replace(/[0-9.,]/g, '').trim();
};

import { User } from "./models/User";
/* function fetchUserData() { */
    const user = new User();
    user.loadUserData()
/* }
setInterval(fetchUserData, 3000); */

import { loadStripe } from '@stripe/stripe-js';
const stripePromise = loadStripe('pk_test_51Q7yckRu1vbnX4dYRprklwVdrOfYG81CF1iRwvgaRJu3mfu0KzNCUbshNW9IhfrGDmve0E19RBDufZIn0VAB7jJp00ApCK1lnC');
export default stripePromise;

/**
* Add query params for Sign Up
**/
const verticalInputs = document.querySelectorAll<HTMLInputElement>('input[name="vertical"]');
if (verticalInputs.length > 0) {
    verticalInputs.forEach((radio) => {
        radio.addEventListener('click', setVertical);
    });
}

function setVertical(event: any) {
    try {
        const target = event.target as HTMLInputElement;
        const id = target.dataset.id || '';
        const name = target.dataset.name || '';

        localStorage.setItem('vb_vertical_id', id);
        localStorage.setItem('vb_vertical', name);

        setStartFreeURL();
    } catch (error) {
        console.error("Failed:", error);
    }
}

export function setStartFreeURL() {
    const verticalId = localStorage.getItem('vb_vertical_id') || '';
    const verticalName = localStorage.getItem('vb_vertical') || '';

    const startFreeBtn = document.querySelectorAll('.js-start-free-btn');
    const signupUrl = startFreeBtn?.length > 0 ? startFreeBtn[0]?.getAttribute('href') || '' : '';
    const wpUrl = `${location.protocol}//${location.hostname}/self-service/plan`;

    const url = new URL(signupUrl, location.origin);

    const params = new URLSearchParams();
    params.set('vertical_id', verticalId);
    params.set('vertical', verticalName);
    params.set('redirect_url', wpUrl);
    params.set('template_name', 'ss');
    
    url.search = params.toString();

    startFreeBtn.forEach((btn) => btn.setAttribute('href', decodeURIComponent(url.toString())));
}

document.addEventListener('DOMContentLoaded', setStartFreeURL);