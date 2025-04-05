<?php

namespace App\Http\Services;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Recurrence;
use App\Utils\BudgetUtils;

class BudgetService
{
    public function create()
    {
        $categories = Category::where('user_id', auth()->user()->id)->select('id', 'name')->get();
        return view('budget.create', compact('categories'));
    }

    public function edit($id){
        $categories = Category::where('user_id', auth()->user()->id)->select('id', 'name')->get();
        $budget = Budget::where('user_id', auth()->user()->id)->with('recurrence', 'category')->findOrFail($id);
        return view('budget.edit', compact('budget', 'categories'));
    }

    public function show($id){
        $budget = Budget::where('user_id', auth()->user()->id)->with('recurrence', 'category')->findOrFail($id);
        $budget->type = BudgetUtils::formatType($budget->type);
        $budget->status = BudgetUtils::formatStatus($budget->status);
        $budget->amount = BudgetUtils::formatAmount($budget->amount);
        return response()->json($budget);
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
        
        if ($request->boolean('isRecurrence')) {
            $recurrence = Recurrence::create([
                'date' => $request->recurrenceDate,
                'frequency' => $request->recurrenceType,
                'times' => $request->recurrenceAmount,
            ]);

            $budget->recurrence_id = $recurrence->id;
            $budget->save();
        }

        return redirect()->back()->with('success', $request->type === 'income' ? 'Receita cadastrada com sucesso' : 'Despesa cadastrada com sucesso');
    }

    public function update(BudgetRequest $request, $id){
        $budget = Budget::where('user_id', auth()->user()->id)->with('recurrence')->findOrFail($id);
        $budget->update([
            'name' => $request->name,
            'type' => $request->type,
            'amount' => $request->amount,
            'category_id' => $request->category,
            'billing_date' => $request->billingDate,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);
        
        if($request->boolean('isRecurrence')){
            $recurrence = Recurrence::updateOrCreate(
                ['id' => $budget->recurrence_id],
            [
                'date' => $request->recurrenceDate,
                'frequency' => $request->recurrenceType,
                'times' => $request->recurrenceAmount,
                'counter' => $request->recurrenceCounter ?? 0
            ]);

            $budget->recurrence_id = $recurrence->id;
            $budget->save();
        }

        return redirect()->back()->with('success', $request->type === 'income' ? 'Receita atualizada com sucesso' : 'Despesa atualizada com sucesso');
    }
}