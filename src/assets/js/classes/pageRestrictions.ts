/* import User from "./user"; */
import { User } from "../models/User";
import { AuthTokenManager } from "../api";

const authManager = AuthTokenManager.getInstance();
const userRoles = new User().getRoles();

export class PageRestrictions {
    private exceptionPages: string[];
    private authManager: AuthTokenManager;
    private user: User;

    constructor() {
        this.exceptionPages = [
            '/sample/',
            '/subscription-checkout/',
            '/payment/'
        ];
        this.authManager = AuthTokenManager.getInstance();
        this.user = new User();
    }

    async checkRedirect(): Promise<void> {
        const currentPage = window.location.pathname;
        const TOKEN = authManager.validateToken();

        /* if (!TOKEN.isValid) {
            if (this.exceptionPages.includes(currentPage)) {
                window.location.href = '/login';
            }
            console.log('invalid token!!!');
            return;
        } */

        /* if ((userRoles.includes('user-without-active-plan-with-free-sample') && this.exceptionPages.includes(currentPage))) {
            window.location.href = '/login';
        } */

        // Fetch user roles and validate them
        try {
            await this.user.loadUserData();
            const userRoles = this.user.getRoles();
    
            if (
            userRoles.includes('user-without-active-plan-with-free-sample') &&
            this.exceptionPages.includes(currentPage)
            ) {
            console.log('Restricted access for user role. Redirecting to login...');
            window.location.href = '/login';
            }
        } catch (error) {
            console.error('Failed to fetch user data. Redirecting to login...');
            /* window.location.href = '/login'; */
        }
    }
}