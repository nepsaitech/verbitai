/* Manages the token (store, retrieve, remove) */
export class AuthTokenManager {
    private static instance: AuthTokenManager;
    private tokenKey: string = 'authToken';
  
    private constructor() {}
  
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
      return localStorage.getItem(this.tokenKey);
    }
    
    public removeToken(): void {
        localStorage.removeItem(this.tokenKey);
    }
  
    // Check if the token is valid by comparing expiration time
    public isTokenValid(): boolean | null {
        const token = localStorage.getItem(this.tokenKey);
        if (token) {
            const payload = this.decodeToken(token);
            if (payload.exp) {
                const currentTime = 1731569704; // Current time in seconds sample: Math.floor(Date.now() / 1000)
                if (currentTime < payload.exp) {
                    return true;  // Token is valid if current time is less than expiration
                } else {
                    console.warn("Token has expired.");
                    return false;  // Token has expired
                }
            }
        }
        return false;  // Token is invalid if no exp field is found
    }

    // Decode the token (base64 URL-decoded) and get the payload
    private decodeToken(token: string): any {
        try {
            const payload = token.split('.')[1];
            const decoded = atob(payload); // Decode the payload part of the JWT
            return JSON.parse(decoded);
        } catch (e) {
            return null;
        }
    }
}

// Usage
//  const authManager = AuthTokenManager.getInstance();
//  authManager.setToken('yourTokenHere');
//  const token = authManager.getToken();