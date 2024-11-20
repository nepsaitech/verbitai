interface HTMLElementWithDataAttributes extends HTMLElement {
    dataset: {
        target?: string;
        close?: string;
    };
}

export class ModalManager {
    private buttons: NodeListOf<HTMLElementWithDataAttributes>;
    private modals: NodeListOf<HTMLElementWithDataAttributes>;
    private closeButtons: NodeListOf<HTMLElementWithDataAttributes>;

    constructor() {
        this.buttons = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-target]');
        this.modals = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-modal]');
        this.closeButtons = document.querySelectorAll<HTMLElementWithDataAttributes>('[data-close]');
        this.init();
    }

    private init() {
        // Add click event listeners to each button
        this.buttons.forEach(button => {
            button.addEventListener('click', () => this.handleButtonClick(button));
        });

        // Add click event listeners to close buttons
        this.closeButtons.forEach(button => {
            button.addEventListener('click', () => this.handleCloseClick(button));
        });

        // Close modal if clicked outside the modal content
        window.addEventListener('click', (event: MouseEvent) => this.handleOutsideClick(event));
    }

    private handleButtonClick(button: HTMLElementWithDataAttributes) {
        const targetValue = button.dataset.target;
        if (targetValue) {
            // Hide all modals
            this.hideAllModals();

            // Show the modal that matches the target
            const targetModal = document.querySelector<HTMLElementWithDataAttributes>(`[data-modal="${targetValue}"]`);
            if (targetModal) {
                targetModal.style.display = 'flex';
            }
        }
    }

    private handleCloseClick(button: HTMLElementWithDataAttributes) {
        const closeValue = button.dataset.close;
        if (closeValue) {
            const modalToClose = document.querySelector<HTMLElementWithDataAttributes>(`[data-modal="${closeValue}"]`);
            if (modalToClose) {
                modalToClose.style.display = 'none';
            }
        }
    }

    private handleOutsideClick(event: MouseEvent) {
        const openModal = document.querySelector<HTMLElementWithDataAttributes>('section[style*="flex"]');
        if (openModal && event.target === openModal) {
            openModal.style.display = 'none';
        }
    }

    private hideAllModals() {
        this.modals.forEach(modal => {
            modal.style.display = 'none';
        });
    }
}
