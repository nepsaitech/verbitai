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
    const wpURL = `${location.protocol}//${location.hostname}/plan`;
    const finalURL = `${signupURL}?vertical_id=${vertical_id}?vertical=${vertical}&redirect_url=${wpURL}&template_name=ss`;
    startFreeBtn.forEach((btn) => btn.setAttribute('href', finalURL));
    return finalURL;
}

document.addEventListener('DOMContentLoaded', () => {
    setStartFreeURL(localStorage.getItem('vb_vertical_id') || '', localStorage.getItem('vb_vertical') || '');
});