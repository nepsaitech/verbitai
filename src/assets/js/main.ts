/**
* Add query params for Sign Up
**/
const verticalInputs = document.querySelectorAll<HTMLInputElement>('input[name="vertical"]');
const startFreeBtn   = document.querySelectorAll('.js-start-free-btn');
const signupURL      = startFreeBtn.length > 0 ? startFreeBtn[0].getAttribute('href') || '' : '';

if (verticalInputs.length > 0) {
    verticalInputs.forEach((radio) => {
        radio.addEventListener('click', setVertical);
    });
}

function setVertical(event: any) {
    try {
        const id = (event.target as HTMLInputElement).dataset.id || '';
        localStorage.setItem('vertical_id', id);
        const vertical_id = localStorage.getItem('vertical_id');
        if (vertical_id) setStartFreeURL(vertical_id);
    } catch (error) {
        console.error("Failed:", error);
    }
}

function setStartFreeURL(vertical_id: string) {
    const wpURL = `${location.protocol}//${location.hostname}/plan`;
    const finalURL = `${signupURL}?vertical_id=${vertical_id}&redirect_url=${wpURL}&template_name=ss`;
    startFreeBtn.forEach((btn) => btn.setAttribute('href', finalURL));
    return finalURL;
}

document.addEventListener('DOMContentLoaded', () => {
    setStartFreeURL(localStorage.getItem('vertical_id') || '');
});