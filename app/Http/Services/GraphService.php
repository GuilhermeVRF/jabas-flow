<?php

namespace App\Http\Services;

use App\Models\Budget;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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

    public function generateIncomeEvolutionGraph(){
        $graph = $this->generateGenericTypeEvolutionGraph('income', '/incomeEvolution');
        
        return view('graph.incomeEvolution', [
            'graph' => $graph,
        ]);    
    }

    public function generateExpenseEvolutionGraph(){
        $graph = $this->generateGenericTypeEvolutionGraph('expense', '/expenseEvolution');
        
        return view('graph.expenseEvolution', [
            'graph' => $graph,
        ]);     
    }

    private function generateGenericTypeEvolutionGraph(string $type, string $endpoint){
        $start = Carbon::now()->startOfYear(); 
        $end = Carbon::now()->startOfMonth(); 

        $periods = collect(CarbonPeriod::create($start, '1 month', $end))
            ->map(fn($date) => $date->format('m/Y'));

        $incomeEvolution = [];
        foreach($periods as $period){
            $start = Carbon::createFromFormat('m/Y', $period)->startOfMonth();
            $end = Carbon::createFromFormat('m/Y', $period)->endOfMonth();

            $income = Budget::filterByDateAndType(auth()->user()->id, $type, $start, $end)->sum('amount');

            $incomeEvolution[$period] = (float) $income;
        }
        
        return $this->makeGraphRequest($endpoint, [
            'data' => $incomeEvolution,
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