<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Planos extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'NomePlano' => 'string|max:30|regex:/^[a-z A-Z âáãéẽêíîĩõòôũûú0-9.-,]*$/',
             'DonoPlano' => 'int|max:8',
            'PrecoPlano' => 'float|max:30',
             'DescPlano' => 'string|max:11|regex:/^[a-z A-Z âáãéẽêíîĩõòôũûú0-9.-,]*$/'
            
        ];
    }
}
