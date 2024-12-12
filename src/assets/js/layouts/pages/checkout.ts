
import { ModalManager } from '../modal';

declare const adminAjax: { ajax_url: string };

document.addEventListener('DOMContentLoaded', () => {
  const modalManager = new ModalManager();
});

const businessPlan = document.querySelectorAll('input[name="plan-package"]') as NodeListOf<HTMLInputElement>;
const hourPlan = document.getElementById('hourly-plan') as HTMLSelectElement;

businessPlan.forEach(input => {
  input.addEventListener('click', () => updateBusinessPlan(input));
});

hourPlan?.addEventListener('change', (event) => updateHourlyPlan(event.target as HTMLSelectElement));

const cancelPlan = document.querySelector('.js-checkout-cancel-btn');
cancelPlan?.addEventListener('click', () => cancelPlanSelection());

/* const continueBtn = document.querySelector('.js-plan-continue-btn');
continueBtn?.addEventListener('click', () => {
  localStorage.removeItem('customer_plan_no_of_hours');
}); */

defaultPlanSelection();

function defaultPlanSelection(): void {
  const lStorePlan = localStorage.getItem('customer_plan');
  const lStoreHrs = localStorage.getItem('customer_plan_no_of_hours');
  const hourlySelect = document.querySelector('select#hourly-plan') as HTMLSelectElement;

  if (lStorePlan == "1338" && hourlySelect) {
    const matchingOption = Array.from(hourlySelect.options).find(option => option.value === lStoreHrs);
    if (matchingOption) {
      hourlySelect.selectedIndex = matchingOption.index;
      businessPlan.forEach(input => input.checked = false);
      hourlySelect?.classList.add('border-primary');
      /* addProductToCart(lStorePlan, matchingOption.value); */
    }
  } else {
    businessPlan.forEach(input => {
      if (input.checked) {
        localStorage.setItem('customer_plan', input.value);
        /* addProductToCart(input.value, '0'); */
      } else if (input.value === lStorePlan) {
        input.checked = true;
        /* addProductToCart(input.value, '0'); */
      } else {
        input.checked = false;
      }
    });
  }
}

const continueBtn = document.querySelector('.js-plan-continue-btn');

function updatePlanLink(plan: string, quantity: number, priceId: string): void {
  const sanitizedUrl = `/payment?plan=${encodeURIComponent(plan)}&quantity=${encodeURIComponent(quantity)}&price_id=${encodeURIComponent(priceId)}`;
  continueBtn?.setAttribute('href', sanitizedUrl);
}

const defaultPlan = 'business';
const defaultPriceId = 'price_1QTZPpRu1vbnX4dYyEmKHG29';
updatePlanLink(defaultPlan, 1, defaultPriceId);

function updateBusinessPlan(input: HTMLInputElement): void {
  const selectedPlan = input.getAttribute('data-plan');
  const selectedPriceId = input.value;

  if (selectedPlan && selectedPriceId) {
    updatePlanLink(selectedPlan, 1, selectedPriceId);
    hourPlan.classList.remove('border-primary');
    hourPlan.selectedIndex = 0;
  }

  /* const planID = input.value;
  localStorage.setItem('customer_plan', planID);
  addProductToCart(planID, '0');
  localStorage.removeItem('customer_plan_no_of_hours');
    
  if (hourPlan) {
    hourPlan.classList.remove('border-primary');
    hourPlan.selectedIndex = 0;
  } */
}

function updateHourlyPlan(event: HTMLSelectElement): void {
  const input = event;
  const packageQuantity = parseInt(hourPlan.value);
  const packagePlan = input.getAttribute('data-plan');
  const packagePriceId = input.getAttribute('data-value');

  if (packagePlan && packageQuantity && packagePriceId) {
    updatePlanLink(packagePlan, packageQuantity, packagePriceId);
    businessPlan?.forEach(input => input.checked = false);
    hourPlan?.classList.add('border-primary');
  }

  /* if (planID && hoursValue) {
    localStorage.setItem('customer_plan', planID);
    localStorage.setItem('customer_plan_no_of_hours', hoursValue);
    businessPlan?.forEach(input => input.checked = false);
    hourPlan?.classList.add('border-primary');

    const sanitizedUrl = `/payment?plan=${encodeURIComponent(plan)}&price_id=${encodeURIComponent(priceId)}`;
    continueBtn?.setAttribute('href', sanitizedUrl);
  } */
}

function cancelPlanSelection(): void {
  localStorage.removeItem('customer_plan');
  localStorage.removeItem('customer_plan_no_of_hours');
}

// Function to handle adding a product to the WooCommerce cart
/* function addProductToCart(productId: string, hours: string): void {
  const data = new FormData();
  data.append('action', 'add_product_to_cart');
  data.append('product_id', productId);
  data.append('hours', hours);

  fetch(adminAjax.ajax_url, {
      method: 'POST',
      body: data,
  })
  .then((response) => response.json())
  .then((response) => {
      if (response.success) {
        console.log('Product added to cart!');
      } else {
        console.log('Failed to add product to cart.');
      }
  })
  .catch((error) => {
      console.error('Error adding product to cart:', error);
  });
} */
