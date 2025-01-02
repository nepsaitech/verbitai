export async function fetchWithAuth(
  url: string, 
  method: string = 'GET', 
  options: RequestInit = {},
  contentType: string = 'application/json',
  credentials: RequestCredentials = 'include'
): Promise<Response> {
  const pagesNotRequiringLogin = ['/self-service', '/pricing'];
  const headers = {
    'Content-Type': contentType,
    ...options.headers,
  };

  const requestOptions: RequestInit = {
    method,
    headers,
    credentials,
    ...options,
  };

  const response = await fetch(url, requestOptions);
  if (!response.ok) {
    const currentPath = window.location.pathname;
    /* if (response.status === 401 || response.status === 403 && !pagesNotRequiringLogin.includes(currentPath)) { */
    if (response.status === 401 || response.status === 403) {
      /* window.location.href = 'https://users-staging.verbit.co/'; */
      throw new Error('Invalid or expired token. Redirecting to login.');
    }
    /* throw new Error(`HTTP error! Status: ${response.status}`); */
  }

  return response;
}