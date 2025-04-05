<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest
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
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'category' => 'nullable|exists:categories,id',
            'billingDate' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,paid',
            'recurrenceDate' => 'required_if:isRecurrence,true|nullable|date',
            'recurrenceType' => 'required_if:isRecurrence,true|in:daily,weekly,monthly,yearly',
            'recurrenceAmount' => 'required_if:isRecurrence,true|nullable|numeric|min:1',
            'recurrenceCounter' => 'nullable|numeric|min:1',
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
            'type.required' => 'O campo tipo é obrigatório',
            'type.in' => 'O campo tipo deve ser despesa ou receita',
            'amount.required' => 'O campo valor é obrigatório',
            'amount.numeric' => 'O campo valor deve ser um número',
            'category.required' => 'O campo categoria é obrigatório',
            'category_.exists' => 'Categoria não encontrada',
            'billingDate.required' => 'O campo data de vencimento é obrigatório',
            'billingDate.date' => 'O campo data de vencimento deve ser uma data',
            'description.string' => 'O campo descrição deve ser uma string',
            'status.required' => 'O campo status é obrigatório',
            'status.in' => 'O campo status deve ser pendente ou pago',
            'isRecurrence.required' => 'O campo recorrência é obrigatório',
            'isRecurrence.boolean' => 'O campo recorrência deve ser um booleano',
            'recurrenceDate.required_if' => 'O campo data de recorrência é obrigatório',
            'recurrenceDate.date' => 'O campo data de recorrência deve ser uma data',
            'recurrenceType.required_if' => 'O campo tipo de recorrência é obrigatório',
            'recurrenceType.in' => 'O campo tipo de recorrência deve ser diário, semanal, mensal ou anual',
            'recurrenceAmount.required_if' => 'O campo valor de recorrência é obrigatório',
            'recurrenceAmount.numeric' => 'O campo valor de recorrência deve ser um número',
            'recurrenceAmount.min' => 'O campo valor de recorrência deve ser maior que 0',
            'recurrenceCounter.numeric' => 'O campo contador de recorrência deve ser um número',
            'recurrenceCounter.min' => 'O campo contador de recorrência deve ser maior que 0',
        ];
    }
}
