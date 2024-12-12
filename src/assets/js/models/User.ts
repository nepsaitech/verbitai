import { fetchWithAuth } from "../api";

export class User {
    private cognito_username: string = '';
    private given_name: string = '';
    private family_name: string = '';
    private email: string = '';
    private roles: string[] = [];

    constructor() {
      this.loadUserData();
    }

    public async loadUserData(): Promise<void> {
      const USER_API = 'https://self-service-staging.verbit.co/api/v1/me';
      try {
        const response = await fetchWithAuth(USER_API);
        const data = await response.json();
        
        this.cognito_username = data.content.cognito_username;
        this.given_name = data.content.given_name;
        this.family_name = data.content.family_name;
        this.email = data.content.email;
        this.roles = data.content.custom_platform_data.roles;
      } catch (error) {
        console.warn(error);
      }
    }

    public getCognitoUsername(): string {
      return this.cognito_username;
    }
  
    public getInitials(): string {
      const firstInitial = this.given_name?.charAt(0).toUpperCase();
      const lastInitial = this.family_name?.charAt(0).toUpperCase();
      return `${firstInitial}${lastInitial}`;
    }

    public getEmailPrefix(): string {
      const emailPrefix = this.email?.split('@')[0];
      return emailPrefix?.length > 15 ? `${emailPrefix?.substring(0, 15)}...` : emailPrefix;
    }

    public getEmail(): string {
      return this.email;
    }

    public getFullName(): string {
      return `${this.given_name} ${this.family_name}`;
    }

    public getFirstName(): string {
      return this.given_name;
    }

    public getLastName(): string {
      return this.family_name;
    }

    public getRoles(): string[] {
      return this.roles;
    }
}