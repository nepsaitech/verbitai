const businessPlan = document.querySelectorAll('input[name="plan-package"]') as NodeListOf<HTMLInputElement>;
const hourPlan = document.getElementById('hourly-plan') as HTMLSelectElement;

businessPlan.forEach(input => {
  input.addEventListener('click', () => updateBusinessPlan(input));
});

hourPlan?.addEventListener('change', (event) => updateHourlyPlan(event.target as HTMLSelectElement));

const cancelPlan = document.querySelector('.js-checkout-cancel-btn');

function getDefaultPlan(plan: string, recurring: string) {
  const inputEl = document.querySelector(
    `input[data-plan="${plan}"][data-recurring="${recurring}"]`
  ) as HTMLInputElement;
  return inputEl ? inputEl.value : null;
}

const urlPlan = (window as any).getUrlParameter('plan');
const urlQuantity = (window as any).getUrlParameter('quantity');
const URLPriceId = (window as any).getUrlParameter('price_id');

document.addEventListener('DOMContentLoaded', selectPlan);
function selectPlan() {
  const hourlySelect = document.querySelector('select#hourly-plan') as HTMLSelectElement;
  if (urlPlan == "package" && hourlySelect) {
    const matchingOption = Array.from(hourlySelect.options).find(option => option.value === "1");
    if (matchingOption) {
      hourlySelect.selectedIndex = matchingOption.index;
      businessPlan.forEach(input => input.checked = false);
      hourlySelect?.classList.add('border-primary');
      updatePlanLink(urlPlan, urlQuantity, URLPriceId);
    }
  } else {
    if (urlPlan && urlQuantity && URLPriceId) {
      businessPlan.forEach(input => {
        if (input.value === URLPriceId) {
          input.checked = true;
        } else {
          input.checked = false;
        }
        updatePlanLink(urlPlan, urlQuantity, URLPriceId);
      });
    } else {
      const defaultPlan = getDefaultPlan("business", "year");
      if (defaultPlan) {
        updatePlanLink('business', 1, defaultPlan);
      }
    }
  }
}

const continueBtn = document.querySelector('.js-plan-continue-btn');
function updatePlanLink(plan: string, quantity: number, priceId: string): void {
  const sanitizedUrl = `/self-service/payment?plan=${encodeURIComponent(plan)}&quantity=${encodeURIComponent(quantity)}&price_id=${encodeURIComponent(priceId)}`;
  continueBtn?.setAttribute('href', sanitizedUrl);
}

function updateBusinessPlan(input: HTMLInputElement): void {
  const selectedPlan = input.getAttribute('data-plan');
  const selectedPriceId = input.value;

  if (selectedPlan && selectedPriceId) {
    updatePlanLink(selectedPlan, 1, selectedPriceId);
    hourPlan.classList.remove('border-primary');
    hourPlan.selectedIndex = 0;
  }
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
}