<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class ApiReasonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'detalle' => 'required',
            'status' => 'required',
        ];
    }
}
