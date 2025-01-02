const saveBtn = document.querySelector('.js-business-btn');
const businessToggleEl = document.getElementById('business-toggle') as HTMLInputElement;
businessToggleEl?.addEventListener('change', setPlanPriceId);

function setPlanPriceId() {
    const monthlyPriceEl = document.getElementById('monthly-price-id') as HTMLInputElement;
    const yearlyPriceEl = document.getElementById('yearly-price-id') as HTMLInputElement;
    
    const monthlyPriceId = monthlyPriceEl?.value || '';
    const yearlyPriceId = yearlyPriceEl?.value || '';
    let planPriceId = "";

    if (businessToggleEl?.checked) {
        planPriceId = monthlyPriceId;
    } else {
        planPriceId = yearlyPriceId;
    }
    saveBtn?.setAttribute('href', `/self-service/subscription-checkout?plan=business&quantity=1&price_id=${encodeURIComponent(planPriceId)}`);
}
setPlanPriceId();

const hourlyPlanEl = document.getElementById('hourly-price-id') as HTMLInputElement;
const hourlyPlanBtn = document.querySelector('.js-hourly-btn') as HTMLButtonElement;
const hourlyPriceId = hourlyPlanEl.value;
hourlyPlanBtn?.setAttribute('href', `/self-service/subscription-checkout?plan=package&quantity=1&price_id=${encodeURIComponent(hourlyPriceId)}`);