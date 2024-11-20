import { UserInfo } from "../types/users";
import { AuthTokenManager, fetchWithAuth } from "../api";

export class User {
    private given_name: string = '';
    private family_name: string = '';
    private email: string = '';
    private roles: string[] = [];
    // Add more fields as necessary

    private static mockUserData: UserInfo = {
      sub: "aea740aa-bf85-4913-b644-7e8980ba8e1a",
      zoneinfo: "America/Los_Angeles",
      email_verified: true,
      'custom:platform_data': {
          self_service: true,
          company_name: "Amos Asherov",
          id: 13404,
          email: "amos.asherov@external.verbit.ai",
          name: "",
          roles: ["customer_admin"],
          group_ids: [null],
          timezone: "America/Los_Angeles",
          customer_ids: [3420],
          is_test: true
      },
      iss: "https://cognito-idp.eu-west-1.amazonaws.com/eu-west-1_3sgFdzb4y",
      'cognito:username': "aea740aa-bf85-4913-b644-7e8980ba8e1a",
      given_name: "Amos",
      origin_jti: "ffe60990-e61e-4b83-b314-47d496b087c5",
      aud: "49heei9panda1a84u2q0ci8p06",
      event_id: "63c62abf-da90-4f2d-9200-c16a04094e51",
      token_use: "eyJraWQiOiJ5VUFoODEzOXZlbFwvNEpxeTJ0V01KZE55VktlUEJaWnBTRG5TUDVxc3ZnUT0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhZWE3NDBhYS1iZjg1LTQ5MTMtYjY0NC03ZTg5ODBiYThlMWEiLCJ6b25laW5mbyI6IkFtZXJpY2FcL0xvc19BbmdlbGVzIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImN1c3RvbTpwbGF0Zm9ybV9kYXRhIjoie1wic2VsZl9zZXJ2aWNlXCI6dHJ1ZSxcImNvbXBhbnlfbmFtZVwiOlwiQW1vcyBBc2hlcm92XCIsXCJpZFwiOjEzNDA0LFwiZW1haWxcIjpcImFtb3MuYXNoZXJvdkBleHRlcm5hbC52ZXJiaXQuYWlcIixcIm5hbWVcIjpcIlwiLFwicm9sZXNcIjpbXCJjdXN0b21lcl9hZG1pblwiXSxcImdyb3VwX2lkc1wiOltudWxsXSxcInRpbWV6b25lXCI6XCJBbWVyaWNhXC9Mb3NfQW5nZWxlc1wiLFwiY3VzdG9tZXJfaWRzXCI6WzM0MjBdLFwiaXNfdGVzdFwiOnRydWV9IiwiaXNzIjoiaHR0cHM6XC9cL2NvZ25pdG8taWRwLmV1LXdlc3QtMS5hbWF6b25hd3MuY29tXC9ldS13ZXN0LTFfM3NnRmR6YjR5IiwiY29nbml0bzp1c2VybmFtZSI6ImFlYTc0MGFhLWJmODUtNDkxMy1iNjQ0LTdlODk4MGJhOGUxYSIsImdpdmVuX25hbWUiOiJBbW9zIiwib3JpZ2luX2p0aSI6ImZmZTYwOTkwLWU2MWUtNGI4My1iMzE0LTQ3ZDQ5NmIwODdjNSIsImF1ZCI6IjQ5aGVlaTlwYW5kYTFhODR1MnEwY2k4cDA2IiwiZXZlbnRfaWQiOiI2M2M2MmFiZi1kYTkwLTRmMmQtOTIwMC1jMTZhMDQwOTRlNTEiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTczMTQ4MzMwNiwiZXhwIjoxNzMxNTY5NzA2LCJpYXQiOjE3MzE0ODMzMDYsImZhbWlseV9uYW1lIjoiQXNoZXJvdiIsImp0aSI6IjBhMGFmNTBhLWQ5OTYtNDRmNS1hZTEzLTU0MzFmNzFiOTFjMiIsImVtYWlsIjoiYW1vcy5hc2hlcm92QGV4dGVybmFsLnZlcmJpdC5haSJ9.tOX5pPsDu34tmMa0C9f0UdNtQfPCToN-slIJdsIfu9IxVOYFTwtjz7K_JsKdx4d57d-c_Lt51LSUZSP6fdTpHGws6_Dtuu2CVL2V-gKKvWiEvb90zvu5luL2yrmoUbDW2BL-pM3_tVZ1i5yRnNE3eEnAKqxhbO-lYpTXHu4jwwaf8y-5w-v6-EPPpIvcB_NHd0D_5YAijGCuLuB9C14XGnCks5cU6kvZAeuu1h-Pl9jumULM8O6RTx5JBrrkrv-X9kSsy_09OM4zZ1R46ZEngIjmXJerfbt0TEg5j4u21rXNTkXSwL1mA6ovwzdnqva_UVPUtV5I-jb8B4xdIBjGoQ",
      auth_time: 1731483306,
      exp: 1731569706,
      iat: 1731483306,
      family_name: "Asherov",
      jti: "0a0af50a-d996-44f5-ae13-5431f71b91c2",
      email: "amos.asherov@external.verbit.ai"
    };

    constructor() {
      this.loadUserData();
    }

    private loadUserData(): void {
      /* const response = await fetchWithAuth('/me');
      const data = await response.json();
      this.userData = data; */
      const data = User.mockUserData;
      const authManager = AuthTokenManager.getInstance();
      const platformData = data['custom:platform_data'];
      authManager.setToken(data['token_use']);
      this.given_name = data['given_name'];
      this.family_name = data['family_name'];
      this.email = data['email'];
      this.roles = platformData.roles;
    }
  
    public getInitials(): string {
      const firstInitial = this.given_name.charAt(0).toUpperCase();
      const lastInitial = this.family_name.charAt(0).toUpperCase();
      return `${firstInitial}${lastInitial}`;
    }

    public getEmailPrefix(): string {
      const emailPrefix = this.email.split('@')[0];
      return emailPrefix.length > 15 ? `${emailPrefix.substring(0, 15)}...` : emailPrefix;
    }

    public getFullName(): string {
      return this.given_name;
    }

    public getRoles(): string[] {
      return this.roles;
    }
}

