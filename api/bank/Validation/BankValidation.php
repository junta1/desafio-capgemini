<?php

namespace Bank\Validation;

use Illuminate\Foundation\Http\FormRequest;

class BankValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'value.required' => 'O campo valor é obrigatório!',
            'value.max' => 'O campo valor possui o tamanho máximo de 255 caracteres!',
        ];
    }
}
