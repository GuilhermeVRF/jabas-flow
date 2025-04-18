<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecurrenceRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'frequency' => 'required|in:daily,weekly,monthly',
            'times' => 'required|integer|min:1',
            'counter' => 'required|integer|min:1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'amount.required' => 'O campo valor é obrigatório',
            'amount.numeric' => 'O campo valor deve ser um número',
            'date.required' => 'O campo data é obrigatório',
            'date.date' => 'O campo data deve ser uma data válida',
            'frequency.required' => 'O campo frequência é obrigatório',
            'frequency.in' => 'A frequência deve ser diária, semanal ou mensal',
            'times.required' => 'O campo vezes é obrigatório',
            'times.integer' => 'O campo vezes deve ser um número inteiro',
            'times.min' => 'O campo vezes deve ser pelo menos 1',
            'counter.required' => 'O campo contador é obrigatório',
            'counter.integer' => 'O campo contador deve ser um número inteiro',
            'counter.min' => 'O campo contador deve ser pelo menos 1',
        ];
    }
}
