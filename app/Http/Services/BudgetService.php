<?php

namespace App\Http\Services;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Recurrence;

class BudgetService
{
    public function create()
    {
        $categories = Category::where('user_id', auth()->user()->id)->select('id', 'name')->get();
        return view('budget.create', compact('categories'));
    }

    public function store(BudgetRequest $request){
        $budget = Budget::create([
            'name' => $request->name,
            'type' => $request->type,
            'amount' => $request->amount,
            'category_id' => $request->category,
            'billing_date' => $request->billingDate,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);

        if($request->isRecurrence){
            $recurrence = Recurrence::create([
                'day' => date('d', strtotime($request->recurrenceDate)),
                'frequency' => $request->recurrenceType,
                'times' => $request->recurrenceAmount,
            ]);

            $budget->recurrence_id = $recurrence->id;
            $budget->save();
        }

        return redirect()->back()->with('success', $request->type === 'income' ? 'Receita cadastrada com sucesso' : 'Despesa cadastrada com sucesso');
    }
}