import { ButtonTypes } from "../types/button";
import { User } from "../models/User";
import { setStartFreeURL } from "../main";

declare const buttonsACFData: ButtonTypes[];



async function displayUserData() {
    const apiUrl = `${(window as any).getBaseUrl()}/wp-json/custom/v1/profile-menu`;
    const menuHtml = await fetchMenuHtml(apiUrl);
    const avatar = `
        <div class="flex gap-[11px] items-center max-md:ml-0">
            <a href="#" id="customer-initials" class="text-[13px] leading-[18px] w-[42px] h-[42px] rounded-full overflow-hidden flex justify-center items-center bg-white text-primary font-bold max-md:text-base max-md:leading-[22px] max-md:w-[52px] max-md:h-[52px] customer-initials"></a>
            <div class="relative z-10 flex flex-row gap-[11px] items-center cursor-pointer" data-toggle="profile">
                <p id="customer-email-prefix" class="text-white leading-[22px] max-[800px]:hidden email-prefix"></p>
                <svg class="max-[800px]:hidden" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9648 0.710938L5.96484 5.71094L0.964844 0.710938" stroke="white"/></svg>
                <div class="profile-menu hidden absolute -left-[51px] right-auto top-[183%] w-[148px] flex-col bg-white rounded-[20px] [box-shadow:0px_4px_14px_0px_#0000001A]">${menuHtml || '<p>Loading...</p>'}</div>
            </div>
        </div>`;
    const contactSalesCTA = `
        <a href="${Object.values(buttonsACFData)[0].url}" target="${Object.values(buttonsACFData)[0].target}" class="w-[173px] border-2 border-solid border-[#2EC6BA] rounded-[56px] !text-[#3DDED1] text-lg font-bold leading-[38px] py-[5px] px-[27px] text-center max-md:w-[127px] max-md:p-[5px] max-md:text-[15px] max-[600px]:hidden">${Object.values(buttonsACFData)[0].title}</a>`;
    const startFreeCTA = `
        <a href="${Object.values(buttonsACFData)[1].url}" target="${Object.values(buttonsACFData)[1].target}" class="flex justify-center leading-[48px] items-center bg-secondary !text-[#031C34] text-center py-[2px] px-[20px] w-[115px] h-[52px] rounded-[58px] font-bold max-[600px]:w-[115px] max-[600px]:px-[20px] max-md:py-4 max-[860px]:py-[1rem] max-[860px]:px-[2%] js-start-free-btn">${Object.values(buttonsACFData)[1].title}</a>`;

    const avatarContainer = document.querySelector("header .js-header-right") as HTMLElement;
    const isPageUpload = document.querySelector('.page-template-page-upload');
    const isPageVertical = document.querySelector('.single-vertical');

    try {
        const user = new User();
        await user.loadUserData();
    
        if (avatarContainer) {
            if (isPageUpload) {
                avatarContainer.innerHTML = '';
            } else {
                avatarContainer.innerHTML = contactSalesCTA + avatar;
            }
        }
    } catch (error) {
        console.error('Failed to display user data:', error);
    
        if (avatarContainer) {
            if (isPageVertical) {
                avatarContainer.innerHTML = startFreeCTA;
            } else {
                avatarContainer.innerHTML = contactSalesCTA + startFreeCTA;
            }
        }
    }

    setStartFreeURL();
}
displayUserData();

async function fetchMenuHtml(apiUrl: string): Promise<string | null> {
    try {
        const response = await fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            console.error(`Failed to fetch menu: ${response.status} ${response.statusText}`);
            return null;
        }

        const data = await response.json();
        return data.menu || null;
    } catch (error) {
        console.error('Error fetching menu:', error);
        return null;
    }
}