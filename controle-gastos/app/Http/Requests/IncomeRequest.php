<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            "frequency" => "required",
            "value" => "required",
            "income_type" => "required"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'frequency.required' => 'O campo Frequência é obrigatório',
            'value.required' => 'O campo Valor é obrigatório',
            'income_type.required' => 'O campo Tipo de Renda é obrigatório'
        ];
    }
}
