import { ErrorMessages } from '../classes/errorMessages';

export class AuthTokenManager {
    private static instance: AuthTokenManager;
    private tokenKey: string = 'staging_id_token';
  
    public static getInstance(): AuthTokenManager {
      if (!AuthTokenManager.instance) {
        AuthTokenManager.instance = new AuthTokenManager();
      }
      return AuthTokenManager.instance;
    }
  
    public setToken(token: string): void {
      localStorage.setItem(this.tokenKey, token);
    }
  
    public getToken(): string | null {
        return this.validateToken().result || null;
    }
    
    public removeToken(): void {
        localStorage.removeItem(this.tokenKey);
    }
    
    public validateToken(): { isValid: boolean; result?: string } {
        const token = this.getCookie(this.tokenKey);

        if (!token) {
            return { isValid: false, result: ErrorMessages.TOKEN_MISSING };
        }

        const payload = this.decodeToken(token);
        /* if (!payload?.exp) {
            return { isValid: false, result: ErrorMessages.TOKEN_INVALID };
        } */
        
        const currentTime = Math.floor(Date.now() / 1000);
        if (currentTime > payload?.exp) {
            return { isValid: false, result: ErrorMessages.TOKEN_EXPIRED };
        }
        
        return { isValid: true,  result: token };
    }
    
    private decodeToken(token: string): Record<string, any> | null {
        try {
            const payload = token.split('.')[1];
            const decoded = atob(payload.replace(/-/g, '+').replace(/_/g, '/'));
            return JSON.parse(decoded);
        } catch (error) {
            return null;
        }
    }

    private getCookie(name: string): string | null {
        const matches = document.cookie.match(new RegExp(
            `(?:^|; )${name.replace(/([.$?*|{}()\[\]\\\/\+^])/g, '\\$1')}=([^;]*)`
        ));
        return matches ? decodeURIComponent(matches[1]) : null;
    }
}