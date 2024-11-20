/* import { UserTypes } from "../types/user";

export default class User {
    private apiToken: string | null = null;
    private email: string | null = null;
    private initials: string | null = null;
    private roles: (string | number)[] = [];
    private finishSignUp: boolean = false;
    private finishUploadFile: boolean = false;

    // Static mock data to simulate API response
    private static mockUserData: UserTypes = {
        content: {
            id: 1,
            initials: "JD",
            firstName: "John",
            lastName: "Doe",
            email: "johndoe@example.com",
            roles: ["user"],
            apiToken: "mockAPIToken123",
        }
    };

    constructor() {
        this.loadUserData();
    }

    private loadUserData(): void {
        const data = User.mockUserData.content;

        localStorage.setItem("customer_token", data.apiToken);

        this.apiToken = localStorage.getItem("customer_token");
        this.initials = this.fullNameInitials(`${data.firstName} ${data.lastName}`);
        this.email = this.emailPrefix(data.email);
        this.roles = data.roles;

        // Set completion statuses for the stepper
        this.finishSignUp = true;
        this.finishUploadFile = true;
    }

    private fullNameInitials(fullName: string): string {
        return fullName.split(" ")
            .map(name => name.charAt(0).toUpperCase())
            .join("");
    }

    private emailPrefix(email: string): string {
        const prefix = email.split('@')[0];
        return prefix.length > 15 ? `${prefix.substring(0, 15)}...` : prefix;
    }

    public getInitials(): string | null {
        return this.initials;
    }

    public getEmail(): string | null {
        return this.email;
    }

    public getRoles(): (string | number)[] {
        return this.roles;
    }

    public isSignUpFinished(): boolean {
        return this.finishSignUp;
    }

    public isFileUploadFinished(): boolean {
        return this.finishUploadFile;
    }
} */