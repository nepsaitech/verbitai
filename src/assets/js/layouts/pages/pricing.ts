const hourlyPlan = document.querySelector('.js-hourly-plan');
hourlyPlan?.addEventListener('click', () => {
    localStorage.setItem('customer_plan', 'hourly');
   /*  if (localStorage.getItem('customer_plan') !== 'hourly') { */
        localStorage.setItem('customer_plan_no_of_hours', "1");
    /* } */
});


const businessPlan = document.getElementById('business-plan') as HTMLInputElement;
const saveButton = document.querySelector('.js-business-plan-btn');
if (businessPlan && saveButton) {
    saveButton.addEventListener('click', () => {
        const selectedPlan = businessPlan.checked ? 'monthly' : 'yearly';
        localStorage.setItem('customer_plan', selectedPlan);
    });
}


const monthlyPlanId = (document.getElementById('monthly-plan-id') as HTMLInputElement)?.value || '';
const yearlyPlanId = (document.getElementById('yearly-plan-id') as HTMLInputElement)?.value || '';
function updatePlanId() {   
    businessPlan.dataset.planId = businessPlan.checked ? monthlyPlanId : yearlyPlanId;
    localStorage.setItem('customer_plan_id', businessPlan.dataset.planId);
}
updatePlanId();
businessPlan.addEventListener('change', updatePlanId);

