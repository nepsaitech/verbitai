
import { ModalManager } from '../modal';

// Initialize modal manager
document.addEventListener('DOMContentLoaded', () => {
  const modalManager = new ModalManager();
});

const plan = localStorage.getItem('customer_plan') || 'yearly';
const planElements = {
  monthly: document.getElementById('monthly-plan') as HTMLInputElement,
  hourly: document.getElementById('hourly-plan') as HTMLSelectElement,
  yearly: document.getElementById('yearly-plan') as HTMLInputElement
};

// Select the saved plan from localStorage or default to yearly
const selectedPlan = planElements[plan as keyof typeof planElements];
const planInputs = document.querySelectorAll('input[name="plan-package"]') as NodeListOf<HTMLInputElement>;
const selectPlan = document.getElementById('hourly-plan') as HTMLSelectElement;

// Initially set the saved plan when the page loads
if (selectedPlan) {
  applySelectedPlan(selectedPlan, planInputs, selectPlan);
}

// Function to visually select the current plan
function applySelectedPlan(selectedPlan: HTMLElement, planInputs: NodeListOf<HTMLInputElement>, selectPlan: HTMLSelectElement) {
  planInputs.forEach(input => {
    input.checked = false;
    input.classList.remove('border-primary', 'focus:border-primary');
  });

  if (selectedPlan instanceof HTMLInputElement) {
    selectedPlan.checked = true;
  } else if (selectedPlan instanceof HTMLSelectElement) {
    selectPlan.value = '1';
    selectPlan.classList.add('border-primary', 'focus:border-primary');
  }
}

planInputs.forEach(input => {
  input.addEventListener('click', () => {
    const newPlan = input.id.replace('-plan', '');
    localStorage.setItem('customer_plan', newPlan);
    applySelectedPlan(input, planInputs, selectPlan);
    console.log(`Plan updated in localStorage: ${newPlan}`);
  });
});

selectPlan.addEventListener('change', (event) => {
  const input = event.target as HTMLSelectElement;
  const newPlan = input.id.replace('-plan', '');
  const newPlanValue = selectPlan.value;
  localStorage.setItem('customer_plan', newPlan);
  localStorage.setItem('customer_plan_no_of_hours', newPlanValue);
});

const cancelPlan = document.querySelector('.js-checkout-cancel-btn');
cancelPlan?.addEventListener('click', () => {
  localStorage.removeItem('customer_plan');
  localStorage.removeItem('customer_plan_no_of_hours');
});