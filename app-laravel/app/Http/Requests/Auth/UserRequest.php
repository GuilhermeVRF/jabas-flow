<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareBeforeValidation(): void
    {
        $this->merge([
            'cpfcnpj' => preg_replace('/[^0-9]/', '', $this->cpfcnjpj),
            'phone' => preg_replace('/[^0-9]/', '', $this->phone),
        ]);
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cpfcnpj' => 'required|string|min:11|max:14|unique:users',
            'phone' => 'required|string|min:11',
            'password' => 'required|string|min:8|max:255|regex:/^(?=.*[!@#$%^&*()\-_=+{};:,<.>]).+$/',
            'password_confirmation' => 'required|string|same:password',
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'cpfcnjpj.required' => 'O campo CPF/CNPJ é obrigatório',
            'cpfcnjpj.string' => 'O campo CPF/CNPJ deve ser uma string',
            'cpfcnjpj.min' => 'O campo CPF/CNPJ deve ter no mínimo 11 caracteres',
            'cpfcnjpj.max' => 'O campo CPF/CNPJ deve ter no máximo 14 caracteres',
            'cpfcnpj.unique' => 'CPF/CNPJ já cadastrado',
            'phone.required' => 'O campo telefone é obrigatório',
            'phone.string' => 'O campo telefone deve ser uma string',
            'phone.min' => 'O campo telefone deve ter no mínimo 11 caracteres',
            'password.required' => 'O campo senha é obrigatório',
            'password.string' => 'O campo senha deve ser uma string',
            'password.min' => 'O campo senha deve ter no mínimo 8 caracteres',
            'password.max' => 'O campo senha deve ter no máximo 255 caracteres',
            'password.regex' => 'O campo senha deve conter pelo menos um caractere especial',
            'password_confirmation.required' => 'O campo confirmação de senha é obrigatório',
            'password_confirmation.string' => 'O campo confirmação de senha deve ser uma string',
            'password_confirmation.same' => 'As senhas não coincidem',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.string' => 'O campo e-mail deve ser uma string',
            'email.email' => 'O campo e-mail deve ser um email válido',
            'email.max' => 'O campo e-mail deve ter no máximo 255 caracteres',
            'email.unique' => 'E-mail já cadastrado',
        ];
    }
}
