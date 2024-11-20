/* // src/api/getUserDetails.ts
import { fetchWithAuth } from './fetchWithAuth';
import { User } from '../models/User';

let cachedUser: User | null = null;

export async function getUserDetails(option: 'initials' | 'email' | 'fullName'): Promise<string> {
    if (cachedUser) {
      return getUserDetailByOption(cachedUser, option);
    }
  
    try {
      const response = await fetchWithAuth('/me');
      if (!response.ok) {
        throw new Error(`Failed to fetch user details: ${response.statusText}`);
      }
      const data = await response.json();
      cachedUser = new User(data);
      
      return getUserDetailByOption(cachedUser, option);
    } catch (error) {
      console.error("Error fetching user details:", error);
      throw error;
    }
  }
  
// Helper function to return data based on the option
function getUserDetailByOption(user: User, option: 'initials' | 'email' | 'fullName'): string {
    switch (option) {
        case 'initials':
        return user.getInitials();
        case 'email':
        return user.getEmailPrefix();
        case 'fullName':
        return user.getFullName();
        default:
        throw new Error('Invalid option');
    }
} */