<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class ApiPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'status' => 'required',
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'team_size' => 'required|string|max:255',
            'premium_support_months' => 'required|integer|min:0',
            'free_updates_months' => 'required|integer|min:0',
            'benefits' => 'array',
            'benefits.*' => 'exists:benefits,id',
        ];
    }
}
