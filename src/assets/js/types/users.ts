export interface UserInfo {
    success: boolean;
    content: {
        custom_platform_data: {
            self_service: boolean;
            company_name: string;
            id: number;
            email: string;
            name: string;
            roles: string[];
            group_ids: (string | null)[];
            timezone: string;
            customer_ids: number[];
            is_test: boolean;
        };
        token: string;
        sub: string;
        zoneinfo: string;
        email_verified: boolean;
        iss: string;
        given_name: string;
        origin_jti: string;
        aud: string;
        event_id: string;
        token_use: string;
        auth_time: number;
        exp: number;
        iat: number;
        family_name: string;
        jti: string;
        cognito_username: string;
        email: string;
    };
}