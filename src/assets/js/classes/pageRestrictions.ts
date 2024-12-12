/* import User from "./user"; */
import { User } from "../models/User";
import { AuthTokenManager } from "../api";

const authManager = AuthTokenManager.getInstance();
const userRoles = new User().getRoles();

export class PageRestrictions {
    private exceptionPages: string[];
    constructor() {
        this.exceptionPages = [
            '/plan/', 
            '/sample/'
        ];
    }

    checkRedirect(): void {
        const currentPage = window.location.pathname;
        const TOKEN = authManager.validateToken();
        if (TOKEN.isValid) {
            if ((userRoles.includes('user-without-active-plan-with-free-sample') && this.exceptionPages.includes(currentPage))) {
                window.location.href = '/login';
            }
        } else {
            if (this.exceptionPages.includes(currentPage)) {
                window.location.href = '/login';
            }
        }

        /* if (
            // 1. Token exists, userRoles contains the specific role, and the current page is an exception
            (this.apiToken && userRoles.includes('user-without-active-plan-with-free-sample') && this.exceptionPages.includes(currentPage)) || 
            // 2. Token is missing and the current page is an exception
            (!this.apiToken && this.exceptionPages.includes(currentPage))
        ) {
            window.location.href = '/login';
        } */
    }
}