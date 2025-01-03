/**
 * Update the header styles based on the scroll position.
*/
window.addEventListener('scroll', () => {

    const scrollPosition = window.scrollY;
    const header = document.querySelector('.js-header');
    const headerSection = header?.querySelector('section');
  
    if (header && headerSection) {

      if (scrollPosition > 0) {

        header.classList.add('py-[11px]','px-[9px]');
        headerSection.classList.add('backdrop-filter', 'backdrop-blur-[34px]', '[box-shadow:0px_1px_0px_0px_#FFFFFF1A_inset]', 'bg-[linear-gradient(45deg,_#f3f3f3,_transparent)]'
        );
      } else {

        header.classList.add('py-[11px]','px-[9px]');
        headerSection.classList.remove('backdrop-filter', 'backdrop-blur-[34px]', '[box-shadow:0px_1px_0px_0px_#FFFFFF1A_inset]', 'bg-[linear-gradient(45deg,_#f3f3f3,_transparent)]'
        );
      }
    }
});


/**
 * Show and hide the full transcript button based on the scroll position.
*/
function revertStylesForFullTranscript(fullTranscript: HTMLElement, fullTranscriptWrap: HTMLElement, fullTranscriptInfo: HTMLElement, fullTranscriptBtn: HTMLElement) {

    fullTranscript.classList.remove('relative', 'z-20');
    fullTranscriptWrap.classList.remove('fixed', 'left-0', 'right-0', 'bottom-[22px]', 'max-md:p-0', 'max-[999px]:mb-0', 'max-[1050px]:p-0', 'max-[1050px]:mb-0', 'max-[1050px]:max-w-[328px]', 'max-[1050px]:mx-auto');
    fullTranscriptInfo.classList.remove('hidden');
    fullTranscriptBtn.classList.remove('bg-primary', 'max-w-[328px]', 'w-full', 'border-none', 'm-auto', 'px-[0]', 'py-[8.5px]');
    fullTranscriptWrap.classList.add('bg-primary', 'max-md:p-[26px]', 'max-[999px]:mb-4');
}

/**
 * Add scroll event listener to show and hide the full transcript button.
*/
window.addEventListener('scroll', () => {

    const fullTranscript = document.querySelector('.js-full-transcript-cta') as HTMLElement;
    const fullTranscriptWrap = document.querySelector('.js-full-transcript-wrap') as HTMLElement;
    const fullTranscriptInfo = fullTranscript?.querySelector('.js-full-transcript-info') as HTMLElement;
    const fullTranscriptBtn = fullTranscript?.querySelector('.js-full-transcript-btn') as HTMLElement;

    if (!fullTranscript || !fullTranscriptWrap || !fullTranscriptInfo || !fullTranscriptBtn) {
        return;
    }

    if (window.innerWidth <= 1050) {

        const scrollPosition = window.scrollY;
        const targetPosition = fullTranscript.scrollHeight;

        if (scrollPosition >= targetPosition) {

            fullTranscript.classList.add('relative', 'z-20');
            fullTranscriptWrap.classList.add('fixed', 'left-0', 'right-0', 'bottom-[22px]', 'max-md:p-0', 'max-[999px]:mb-0', 'max-[1050px]:p-0', 'max-[1050px]:mb-0', 'max-[1050px]:max-w-[328px]', 'max-[1050px]:mx-auto');
            fullTranscriptInfo.classList.add('hidden');
            fullTranscriptBtn.classList.add('bg-primary', 'max-w-[328px]', 'w-full', 'border-none', 'm-auto', 'px-[0]', 'py-[8.5px]');
            fullTranscriptWrap.classList.remove('bg-primary', 'max-md:p-[26px]', 'max-[999px]:mb-4');
        } else {

            revertStylesForFullTranscript(fullTranscript, fullTranscriptWrap, fullTranscriptInfo, fullTranscriptBtn);
        }
    } else {

        revertStylesForFullTranscript(fullTranscript, fullTranscriptWrap, fullTranscriptInfo, fullTranscriptBtn);
    }
});

/**
* Show and hide the modal based on the data-target and data-close attributes.
**/
interface HTMLElementWithDataAttributes extends HTMLElement {
    dataset: {
        target?: string;
        close?: string;
    };
}

// Get all buttons and modals with data-target and data-modal attributes
const buttons = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-target]');
const modals = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-modal]');

// Add click event listeners to each button
buttons.forEach(button => {
    button.addEventListener('click', () => {
        const targetValue = button.dataset.target;
        if (targetValue) {
            // Hide all modals
            modals.forEach(modal => {
                modal.style.display = 'none';
            });

            // Show the modal that matches the target
            const targetModal = document.querySelector<HTMLElementWithDataAttributes>(`[data-modal="${targetValue}"]`);
            if (targetModal) {
                targetModal.style.display = 'flex';
            }
        }
    });
});

// Close modal when the close button is clicked
const closeButtons = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-close]');
closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const closeValue = button.dataset.close;
        if (closeValue) {
            const modalToClose = document.querySelector<HTMLElementWithDataAttributes>(`[data-modal="${closeValue}"]`);
            if (modalToClose) {
                modalToClose.style.display = 'none';
            }
        }
    });
});

// Close modal if clicked outside the modal content
window.addEventListener('click', (event: MouseEvent) => {
    const openModal = document.querySelector<HTMLElementWithDataAttributes>('section[style*="flex"]');
    if (openModal && event.target === openModal) {
        openModal.style.display = 'none';
    }
});


/**
 * Update the export format dropdown to show the corresponding content based on the selected value.
*/
const exportFormat = document.getElementById('export-format') as HTMLFormElement | null;

if (exportFormat) {
    const exportdropdown = exportFormat.querySelector('select') as HTMLSelectElement | null;
    const proTag = exportFormat.querySelector('.js-pro-tag') as HTMLElement | null;

    if (exportdropdown && proTag) {
        // Add the change event listener to the dropdown
        exportdropdown.addEventListener('change', function (this: HTMLSelectElement) {
            const fileType = this.value;  // Get the selected value from the dropdown
            
            // Find all div elements with the data-filetype attribute and hide them
            const fileTypeDivs = document.querySelectorAll('div[data-filetype]') as NodeListOf<HTMLDivElement>;
            fileTypeDivs.forEach(div => {
                div.classList.add('hidden');
            });

            // Show the div that matches the selected filetype
            const targetDiv = document.querySelector(`div[data-filetype="${fileType}"]`) as HTMLDivElement | null;
            if (targetDiv) {
                targetDiv.classList.remove('hidden');
            }

            // Modify the proTag element based on the filetype value
            if (fileType === 'docx') {
                proTag.classList.remove('hidden');
                proTag.classList.add('flex');
            } else {
                console.log('this is other file types');
                proTag.classList.add('flex');
                proTag.classList.remove('hidden');
                targetDiv?.classList.remove('hidden');
            }
        });
    }
}

const fileExportBtn = document.getElementById('file-export-btn') as HTMLButtonElement | null;
fileExportBtn?.addEventListener("click", async () => {
    console.log("Export button clicked");
    const dropdown = document.getElementById("file-format-selection") as HTMLSelectElement;
    
    const selectedValue = dropdown?.value;
  
    console.log("Selected Value:", selectedValue);
  
    await exportSampleFile(selectedValue);
});
  
const exportSampleFile = async (selectedValue: string) => {
    const jobID = localStorage.getItem('vb_job_id') || '';

    try {
        const exportFileRes = await fetchWithAuth(`https://self-service-staging.verbit.co/api/v1/job/sample/download-transcription?job_id=${jobID}&caption_format=${selectedValue}`);

        if (!exportFileRes.ok) {
            console.error("Failed to fetch status:", exportFileRes.status);
            return;
        }

        const fileBlob = await exportFileRes.blob();

        const fileExtension = selectedValue.toLowerCase();
        const fileName = `sample-transcription.${fileExtension}`;

        const downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(fileBlob);
        downloadLink.download = fileName;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);

        console.log("File exported successfully:", fileName);
    } catch (error) {
        console.error('Error loading video player:', error);
    }
};

/**
 * Add a sticky class to the sidebar when the user scrolls past 160px.
*/
window.addEventListener('scroll', function() {
    const sidebar = document.querySelector('.sidebar') as HTMLElement | null;
    const scroll = window.scrollY;

    if (sidebar) {
        if (scroll >= 130) {
            sidebar.classList.add('sticky');
        } else {
            sidebar.classList.remove('sticky');
        }
    }
});


/**
 * Scroll to the top of the page when the back to top button is clicked.
*/
const backTopBtn = document.querySelector<HTMLButtonElement>('[data-action="back-to-top"]');

if (backTopBtn) {
    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        
        // Calculate the position for showing the button (30% of the page height)
        const threshold = documentHeight * 0.3;

        if (scrollPosition > threshold) {
            backTopBtn.style.display = 'block';
        } else {
            backTopBtn.style.display = 'none';
        }
    });

    // When the back-to-top button is clicked, smoothly scroll to the top
    backTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    });
}

import { fetchWithAuth } from '../../api/fetchWithAuth';

const embeddableWidgetEl = document.getElementById('embeddable-widget');
document.addEventListener('DOMContentLoaded', async () => {
    await getSampleTranscript();
});

const getSampleTranscript = async () => {
    const jobID = localStorage.getItem('vb_job_id') || '';

    try {
        const embeddableWidgetRes = await fetchWithAuth(`https://self-service-staging.verbit.co/api/v1/job/sample/get-embeddable-widget?job_id=${jobID}`);

        if (!embeddableWidgetRes.ok) {
            console.error("Failed to fetch status:", embeddableWidgetRes.status);
            return;
        }

        const embeddableWidgetData = await embeddableWidgetRes.json();
        const { html, title, media_url } =  embeddableWidgetData.content;
        if (embeddableWidgetEl) {
            embeddableWidgetEl.innerHTML = html;
            
            // Dynamically load the script
            const script = document.createElement('script');
            script.src = 'https://api-staging.verbit.co/assets/widget_v2.js';
            script.type = 'text/javascript';
            script.async = true;
            script.onload = () => {
                console.log('Verbit widget script loaded successfully.');
            };
            script.onerror = () => {
                console.error('Failed to load Verbit widget script.');
            };
            document.body.appendChild(script);
        }

        // how to readd this here 'verbit-widget', 'https://api-staging.verbit.co/assets/widget_v2.js';

        /* if (embeddableWidgetData.success) {
            console.log("embeddableWidgetData is here:", embeddableWidgetData);
            embeddableWidgetEl?.append(embeddableWidgetData.content.html);
        } else {
            console.error("Failed to start transcription:", embeddableWidgetData);
        } */
        
        const smartPlayerTitle = document.getElementById('smart-player-title');
        if (smartPlayerTitle) smartPlayerTitle.textContent = title;

        /* const smartPlayerVideo = document.getElementById('smart-player-video');
        if (smartPlayerVideo) {
            smartPlayerVideo.innerHTML = media_url;
        } */
    } catch (error) {
        console.error('Error loading video player:', error);
    }
};

const createYouTubeEmbed = (url: string) => {
    const iframe = document.createElement('iframe');
    iframe.src = url.replace('watch?v=', 'embed/');
    iframe.width = '560';
    iframe.height = '196';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    return iframe;
};


console.log('Transcript page loaded');