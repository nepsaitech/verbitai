export interface UserTypes {
    content: {
        id: number;
        apiToken: string;
        initials: string;
        firstName: string;
        lastName: string;
        email: string;
        roles: (string | number)[];
    }
}