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
                const avatarSection = document.querySelector('div[data-toggle="profile"]');
                if (avatarSection) {
                    observer.disconnect();
                    new MenuDropdown('div[data-toggle="profile"]');
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


// Update the header style when the user scrolls the page.
declare const siteLogo: {
    url_1: string;
    url_2: string;
};
const scrollHeader = document.querySelector('.js-scrl-header') as HTMLElement;
if (scrollHeader) {
    const scrollSection = scrollHeader.querySelector('.js-scrl-header section') as HTMLElement;
    const scrollLogo = scrollHeader.querySelector('div[data-section="logo"] img') as HTMLImageElement;

    const headerScrollDisplay = () => {
        if (window.scrollY > 50) {
            scrollSection?.classList.add('scrolled');
            if ( scrollLogo ) scrollLogo.src = siteLogo.url_1;
        } else {
            scrollLogo.src = siteLogo.url_2;
            scrollSection?.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', headerScrollDisplay);
}

// Remove the menu section from the upload page.
const isPagePlatformUpload = document.querySelector('.page-template-page-upload');
const headerMenu = isPagePlatformUpload?.querySelector('div[data-section="menu"]');
if (isPagePlatformUpload) {
    headerMenu?.remove();
}