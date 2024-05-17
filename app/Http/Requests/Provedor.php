<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Provedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'NomeProvedor' => 'string|max:90|regex:/^[a-zA-Z âáãéẽêíîĩõòôũûú]*$/',
            'password' => 'string|max:30',
            'EmailProvedor' => 'string|max:90|email',
            'CnpjProvedor' => 'string|max:11|regex:/[0-9.-]{11,14}/'
            
        ];
    }
}
