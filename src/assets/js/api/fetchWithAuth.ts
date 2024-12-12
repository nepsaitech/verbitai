import { AuthTokenManager } from './AuthTokenManager';

export async function fetchWithAuth(
  url: string, 
  method: string = 'GET', 
  options: RequestInit = {},
  contentType: string = 'application/json'
): Promise<Response> {

  const authManager = AuthTokenManager.getInstance();
  const token = authManager.validateToken();
  
  if (!token.isValid) {
    throw new Error(token.result);
  }

  const headers = {
    Authorization: `Bearer ${token.result}`,
    'Content-Type': contentType,
    ...options.headers,
  };

  const requestOptions: RequestInit = {
    method,
    headers,
    ...options,
  };

  return fetch(url, requestOptions);
}