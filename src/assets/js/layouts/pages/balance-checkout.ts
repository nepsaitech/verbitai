const buyHoursBtn = document.querySelector('.js-buy-hrs-dropdown');
const buyHoursOption = document.querySelector('.js-buy-hrs-options');
const buyHoursItems = buyHoursOption?.querySelectorAll('li');

if (buyHoursBtn && buyHoursOption) {
    buyHoursBtn.addEventListener('click', () => {
        if (buyHoursOption.classList.contains('hidden')) {
            buyHoursOption.classList.add('block');
            buyHoursOption.classList.remove('hidden');
        } else {
            buyHoursOption.classList.add('hidden');
            buyHoursOption.classList.remove('block');
        }
    });
    if (buyHoursItems) {
        buyHoursItems.forEach(option => {
            option.addEventListener('click', () => {
                if (option.classList.contains('disabled')) {
                    return;
                }
                buyHoursItems.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');
                buyHoursOption.classList.remove('!block');
            });
        });
    }
}