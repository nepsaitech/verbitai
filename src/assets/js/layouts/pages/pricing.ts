const saveButton = document.querySelector('.js-business-plan-btn');
saveButton?.addEventListener('click', () => {
    setPlanId();
});

function setPlanId() {
    const businessPlan = document.getElementById('business-plan') as HTMLInputElement;
    const monthlyPlanID = document.getElementById('monthly-plan-id') as HTMLInputElement;
    const yearlyPlanID = document.getElementById('yearly-plan-id') as HTMLInputElement;

    const moID = monthlyPlanID?.value || '';
    const yrID = yearlyPlanID?.value || '';

    const id = businessPlan?.checked ? moID : yrID;
    localStorage.setItem('customer_plan', id);
}
setPlanId();

const hourlyPlanInput = document.getElementById('js-hourly-plan') as HTMLInputElement;
const hourlyPlanBtn = document.querySelector('.js-hourly-plan-btn') as HTMLButtonElement;
hourlyPlanBtn.addEventListener('click', () => {
    localStorage.setItem('customer_plan', hourlyPlanInput.value);
    localStorage.setItem('customer_plan_no_of_hours', '1');
});