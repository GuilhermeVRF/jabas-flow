<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyEmailRequest extends FormRequest
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
            'verification_code' => 'required|numeric|digits:6',
            'email' => 'required|email'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'verification_code.required' => 'O código de verificação é obrigatório',
            'verification_code.numeric' => 'O código de verificação deve ser numérico',
            'verification_code.digits' => 'O código de verificação deve ter 6 dígitos',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser válido'
        ];
    }
}
