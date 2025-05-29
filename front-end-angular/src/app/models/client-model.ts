export interface Client {
    id?: number;
    tipo?: string;
    detalle?: string;
    total?: string;
    status?: string;
    image: string | null
    image_url: string | null;
    created_at?: string | null;
    updated_at?: string | null;
}