declare const stripeConfig: {
    publicKey: string;
};

declare global {
    interface Window {
        getUrlParameter: (name: string) => string | null;
        getCurrencySymbol: (currencyCode: string) => string;
        stagingUrl: string;
    }
}

window.stagingUrl = 'https://staging-wp.verbit.co/self-service';

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
const startFreeBtn   = document.querySelectorAll('.js-start-free-btn');
const signupURL      = startFreeBtn?.length > 0 ? startFreeBtn[0]?.getAttribute('href') || '' : '';

if (verticalInputs.length > 0) {
    verticalInputs.forEach((radio) => {
        radio.addEventListener('click', setVertical);
    });
}

function setVertical(event: any) {
    try {
        const id = (event.target as HTMLInputElement).dataset.id || '';
        const name = (event.target as HTMLInputElement).dataset.name || '';
        localStorage.setItem('vb_vertical_id', id);
        localStorage.setItem('vb_vertical', name);
        const vertical_id = localStorage.getItem('vb_vertical_id');
        const vertical = localStorage.getItem('vb_vertical');
        if (vertical_id && vertical) setStartFreeURL(vertical_id, vertical);
    } catch (error) {
        console.error("Failed:", error);
    }
}

function setStartFreeURL(vertical_id: string, vertical: string) {
    const wpURL = `${location.protocol}//${location.hostname}/self-service/plan`;
    const finalURL = `${signupURL}?vertical_id=${vertical_id}?vertical=${vertical}&redirect_url=${wpURL}&template_name=ss`;
    startFreeBtn.forEach((btn) => btn.setAttribute('href', finalURL));
    return finalURL;
}

document.addEventListener('DOMContentLoaded', () => {
    setStartFreeURL(localStorage.getItem('vb_vertical_id') || '', localStorage.getItem('vb_vertical') || '');
});