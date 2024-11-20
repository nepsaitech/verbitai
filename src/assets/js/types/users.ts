export interface UserInfo {
    sub: string;
    zoneinfo: string;
    email_verified: boolean;
    'custom:platform_data': PlatformData;
    iss: string;
    'cognito:username': string;
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
    email: string;
}

export interface PlatformData {
    self_service: boolean;
    company_name: string;
    id: number;
    email: string;
    name: string;
    roles: string[];
    group_ids: (number | null)[];
    timezone: string;
    customer_ids: number[];
    is_test: boolean;
}