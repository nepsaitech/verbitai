import { ErrorMessages } from '../classes/errorMessages';

export class AuthTokenManager {
    private static instance: AuthTokenManager;
    private tokenKey: string = 'vb_token';
  
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
        const token = localStorage.getItem(this.tokenKey);

        if (!token) {
            return { isValid: false, result: ErrorMessages.TOKEN_MISSING };
        }

        /* const payload = this.decodeToken(token);
        if (!payload?.exp) {
            return { isValid: false, result: ErrorMessages.TOKEN_INVALID };
        }
        
        const currentTime = Math.floor(Date.now() / 1000);
        if (currentTime > payload.exp) { // Replace it to ">" if there's valid token
            return { isValid: false, result: ErrorMessages.TOKEN_EXPIRED };
        } */
        
        return { isValid: true,  result: token };
    }

    // Decode the token (Base64 URL-decoded) and get the payload
    private decodeToken(token: string): Record<string, any> | null {
        try {
            const payload = token.split('.')[1];
            const decoded = atob(payload.replace(/-/g, '+').replace(/_/g, '/')); // Base64 URL decode
            return JSON.parse(decoded);
        } catch (error) {
            return null;
        }
    }
}