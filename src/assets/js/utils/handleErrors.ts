export function handleErrors(response: Response): Response {
    if (!response.ok) {
      if (response.status === 401) {
        console.warn("Unauthorized! Redirecting to login.");
        window.location.href = '/login';
      } else {
        console.error(`Error: ${response.status} - ${response.statusText}`);
      }
    }
    return response;
}