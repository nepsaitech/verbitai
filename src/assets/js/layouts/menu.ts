export class MenuDropdown {
  private menuWithDropdown: HTMLElement | null;

  constructor(selector: string) {
    this.menuWithDropdown = document.querySelector(selector) as HTMLElement | null;
    this.initialize();
  }

  private initialize() {
    if (this.menuWithDropdown) {
      this.menuWithDropdown.addEventListener('click', this.toggleDropdown.bind(this));

      // Add event listener to close the dropdown when clicking outside
      document.addEventListener('click', this.handleClickOutside.bind(this));
    }
  }

  private toggleDropdown(event: Event) {
    event.stopPropagation(); // Prevent the event from triggering the outside click handler
    if (this.menuWithDropdown) {
      this.menuWithDropdown.classList.toggle('active');
    }
  }

  private handleClickOutside(event: MouseEvent) {
    const targetElement = event.target as HTMLElement;
    
    // Check if the click is outside the dropdown menu
    if (this.menuWithDropdown && !this.menuWithDropdown.contains(targetElement)) {
      const dropdownMenu = this.menuWithDropdown.querySelector('ul');
      if (dropdownMenu && this.menuWithDropdown.classList.contains('active')) {
        this.menuWithDropdown.classList.remove('active');
      }
    }
  }
}
