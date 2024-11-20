import { AuthTokenManager } from './AuthTokenManager';

// Automates API requests with the token. 
export async function fetchWithAuth(url: string, options: RequestInit = {}): Promise<Response> {
  const authManager = AuthTokenManager.getInstance();
  const token = authManager.getToken();

  // Match the headers with the token here

  const headers = {
    ...options.headers,
    Authorization: token ? `Bearer ${token}` : '',
    'Content-Type': 'application/json',
  };

  return fetch(url, { ...options, headers });
}