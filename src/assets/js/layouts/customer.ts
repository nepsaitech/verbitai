import { AuthTokenManager } from "../api";
import { ButtonTypes } from "../types/button";
import { User } from "../models/User";

const authManager = AuthTokenManager.getInstance();
const userData = new User();
declare const buttonsACFData: ButtonTypes[];

/* async function fetchProfileMenu() {
    try {
        const wpURL = `${location.protocol}//${location.hostname}`;
        const response = await fetch(`http://verbit.local/wp-json/custom/v1/profile-menu`);
        console.log(response);
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        
        const menuItems = await response.json();

        // Define interface for TypeScript
        interface MenuItem {
            url: string;
            title: string;
        }

        // Generate menu HTML
        const menuHtml = (menuItems as MenuItem[])
            .map((item) => `<a href="${item.url}" class="menu-item">${item.title}</a>`)
            .join('');

        // Insert menu into the container
        const profileMenuContainer = document.querySelector('.profile-menu');
        if (profileMenuContainer) {
            profileMenuContainer.innerHTML = menuHtml;
        }
    } catch (error) {
        console.error('Failed to fetch profile menu:', error);
    }
} */


async function displayUserData() {
    const initials = userData.getInitials();
    const email    = userData.getEmailPrefix();
    const avatar   = `
        <div id="avatar-profile" class="flex gap-[11px] items-center ml-[11px] max-md:ml-0">
            <a href="#" class="text-[13px] leading-[18px] w-[42px] h-[42px] rounded-full overflow-hidden flex justify-center items-center bg-white text-primary font-bold max-md:text-base max-md:leading-[22px] max-md:w-[52px] max-md:h-[52px] customer-initials">${initials}</a>
            <div class="relative z-10 flex flex-row gap-[11px] items-center cursor-pointer" data-toggle="profile">
                <p class="text-white leading-[22px] max-[800px]:hidden email-prefix">${email}</p>
                <svg class="max-[800px]:hidden" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9648 0.710938L5.96484 5.71094L0.964844 0.710938" stroke="white"/></svg>
                <div class="profile-menu hidden absolute -left-[59%] top-[183%] w-[148px] flex-col bg-white rounded-[20px] [box-shadow:0px_4px_14px_0px_#0000001A]"></div>
            </div>
        </div>`;
    const contactSalesCTA = `
        <a href="${Object.values(buttonsACFData)[0].url}" target="${Object.values(buttonsACFData)[0].target}" class="border-2 border-solid border-[#2EC6BA] rounded-[56px] !text-[#3DDED1] text-lg font-bold leading-[38px] py-[5px] px-[27px] mr-[17px] max-[600px]:hidden max-[860px]:mr-[2%] max-[860px]:py-[15px] max-[860px]:px-[2%] max-[860px]:w-[32%] max-[860px]:text-center max-[860px]:leading-[100%]">${Object.values(buttonsACFData)[0].title}</a>`;


    /* const startFreeCTA = `
        <a href="${Object.values(buttonsACFData)[1].url}" target="${Object.values(buttonsACFData)[1].target}" class="flex justify-center leading-[48px] items-center bg-secondary !text-[#031C34] text-center py-[2px] px-[20px] ml-[17px] w-[115px] h-[52px] rounded-[58px] font-bold max-[600px]:w-[115px] max-[600px]:px-[20px] max-md:py-4 max-[860px]:w-[23%] max-[860px]:py-[1rem] max-[860px]:px-[2%]">${Object.values(buttonsACFData)[1].title}</a>`; */

    const startFreeCTA = `
        <a href="${Object.values(buttonsACFData)[1].url}" target="${Object.values(buttonsACFData)[1].target}" class="flex justify-center leading-[48px] items-center bg-secondary !text-[#031C34] text-center py-[2px] px-[20px] ml-[17px] w-[115px] h-[52px] rounded-[58px] font-bold max-[600px]:w-[115px] max-[600px]:px-[20px] max-md:py-4 max-[860px]:py-[1rem] max-[860px]:px-[2%]">${Object.values(buttonsACFData)[1].title}</a>`;
    const headerCTA = `
        <a href="${Object.values(buttonsACFData)[0].url}" target="${Object.values(buttonsACFData)[0].target}" class="border-2 border-solid border-[#2EC6BA] rounded-[56px] !text-[#3DDED1] text-lg font-bold leading-[38px] py-[5px] px-[27px] mr-[28px] max-[600px]:hidden max-[860px]:mr-[2%] max-[860px]:py-[15px] max-[860px]:px-[2%] max-[860px]:w-[32%] max-[860px]:text-center max-[860px]:leading-[100%]">${Object.values(buttonsACFData)[0].title}</a>
        <a href="${Object.values(buttonsACFData)[1].url}" target="${Object.values(buttonsACFData)[1].target}" class="flex justify-center leading-[48px] items-center bg-secondary !text-[#031C34] text-center py-[2px] px-[20px] w-[115px] h-[52px] rounded-[58px] font-bold max-[600px]:w-[115px] max-[600px]:px-[20px] max-md:py-4 max-[860px]:w-[23%] max-[860px]:py-[1rem] max-[860px]:px-[2%]">${Object.values(buttonsACFData)[1].title}</a>`;

    const avatarContainer = document.querySelector("header .js-header-right") as HTMLElement;
    const isPageFunnelUpload = document.querySelector('.page-template-page-upload-funnel');
    const isPageUpload = document.querySelector('.page-template-page-upload');
    const isPageVertical = document.querySelector('.single-vertical');

    if (avatarContainer) {
        if (authManager.isTokenValid()) {
            if (isPageFunnelUpload || isPageUpload) {
                avatarContainer.innerHTML = contactSalesCTA + avatar;
            } else {
                avatarContainer.innerHTML = avatar;
            }
        } else {
            if (isPageVertical) {
                avatarContainer.innerHTML = startFreeCTA;
            } else {
                avatarContainer.innerHTML = startFreeCTA;
                /* avatarContainer.innerHTML = headerCTA; */
            }
        }

        // await fetchProfileMenu();
    }

    /* if (avatarContainer) {
        if (!isAuthenticated && isPageVertical) {
            avatarContainer.innerHTML = startFreeCTA;
        } else if (!isAuthenticated) {
            avatarContainer.innerHTML = headerCTA;
        } else if ((isAuthenticated && isPageFunnelUpload) || (isAuthenticated && isPageUpload)) {
            avatarContainer.innerHTML = contactSalesCTA + avatar;
        } else if (!isAuthenticated) {
            avatarContainer.innerHTML = headerCTA;
        } else {
            avatarContainer.innerHTML = avatar;
        }
    } */
}

document.addEventListener("DOMContentLoaded", displayUserData);