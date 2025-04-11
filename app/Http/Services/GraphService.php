<?php

namespace App\Http\Services;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GraphService{
    public function index(){
        return view('graph.index');
    }  

    public function generateIncomeXExpenseGraph(Request $request){
        $month = $request->input('month') ?? Carbon::now()->month;

        $startOfMonth = Carbon::createFromDate(null, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate(null, $month, 1)->endOfMonth();

        $income = Budget::filterByDateAndType(auth()->user()->id, 'income', $startOfMonth, $endOfMonth)->sum('amount');
        $expense = Budget::filterByDateAndType(auth()->user()->id, 'expense', $startOfMonth, $endOfMonth)->sum('amount');
        
        $graph = $this->makeGraphRequest('/incomeXExpense', [
            'income' => (float) $income,
            'expense' => (float) $expense,
        ]);

        return view('graph.incomeXExpense', [
            'graph' => $graph,
            'month' => $month,
        ]);
    }

    private function makeGraphRequest(string $endpoint, array $payload)
    {
        $response = Http::post("http://localhost:5001{$endpoint}", $payload);
        
        if ($response->successful()) {
            return $response->body();
        }

        return null;
    }
}