<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatóriod.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'color.string' => 'O campo cor deve ser uma string.',
            'color.max' => 'O campo cor deve ter no máximo 7 caracteres.',
            'color.regex' => 'O campo cor deve ser uma cor hexadecimal válida.',
        ];
    }
}
