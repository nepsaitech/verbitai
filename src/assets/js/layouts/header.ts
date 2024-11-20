import { MenuDropdown } from './menu';

/**
* Hide and show the dropdown menu when the user clicks on the menu item.
**/
new MenuDropdown('header .menu-item-has-children');
new MenuDropdown('.menu-toggle');

/**
* Close the mobile menu.
**/
const burgerMenu = document.querySelector<HTMLElement>('.js-burger-menu');
burgerMenu?.addEventListener('click', () => {
    document.querySelector('.menu-toggle')?.classList.remove('active');
});

/**
* Logout customer account.
**/
const logoutBtn = document.querySelector('div[data-toggle="profile"] .logout-menu');
logoutBtn?.addEventListener('click', function() {
    localStorage.removeItem('customer_id');
});


const headerEl = document.querySelector('header') as HTMLElement;
if (headerEl) {
    const observer = new MutationObserver((mutationsList) => {
        for (const mutation of mutationsList) {
            if (mutation.type === 'childList') {
                const avatarSection = document.getElementById('avatar-profile');
                if (avatarSection) {
                    observer.disconnect();
                    new MenuDropdown('#avatar-profile');
                    break;
                }
            }
        }
    });
    observer.observe(headerEl, {
        childList: true,
        subtree: true,
    });
}