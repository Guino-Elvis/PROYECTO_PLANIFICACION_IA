import { Benefit } from "./benefit.model";

export interface Plan {
    id?: number;
    name?: string;
    monthly_price?: string;
    description?: string;
    team_size?: string;
    premium_support_months?: string;
    free_updates_months?: string;
    status?: string;
    benefits?: Benefit[];
    created_at?: string | null;
    updated_at?: string | null;
}