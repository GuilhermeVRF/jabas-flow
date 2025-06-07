<?php

namespace App\Http\Services;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardService{
    public function index(Request $request){
        $month = $request->input('month') ?? Carbon::now()->month;
        $search = $request->input('search');
        $userId = auth()->id();

        $startOfMonth = Carbon::createFromDate(null, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate(null, $month, 1)->endOfMonth();

        $startOfLastMonth = $startOfMonth->copy()->subMonth()->startOfMonth();
        $endOfLastMonth = $startOfMonth->copy()->subMonth()->endOfMonth();

        $budgetsQuery = $this->getBudgetsQuery($userId, $search, $startOfMonth, $endOfMonth);
        $budgets = $budgetsQuery->orderBy('type', 'desc')->orderBy('amount', 'desc')->paginate(10);
        $totalIncomeAmount = (clone $budgetsQuery)->where('type', 'income')->sum('amount');
        $totalExpenseAmount = (clone $budgetsQuery)->where('type', 'expense')->sum('amount');
        
        // Comparação com o mês anterior
        $lastMonthIncome = $this->getMonthBudgetAmount($userId, 'income', $startOfLastMonth, $endOfLastMonth);
        $lastMonthExpense = $this->getMonthBudgetAmount($userId, 'expense', $startOfLastMonth, $endOfLastMonth);
        $expenseVariation = $this->getBudgetVariation($totalExpenseAmount, $lastMonthExpense);
        $incomeVariation = $this->getBudgetVariation($totalIncomeAmount, $lastMonthIncome);
        
        return view('dashboard', [
            'month' => $month,
            'budgets' => $budgets,
            'search' => $search,
            'totalExpenseAmount' => number_format($totalExpenseAmount, 2, ',', '.'),
            'totalIncomeAmount' => number_format($totalIncomeAmount, 2, ',', '.'),
            'totalAmount' => number_format($totalIncomeAmount - $totalExpenseAmount, 2, ',', '.'),
            'expenseVariation' => number_format($expenseVariation, 2, ',', '.') . '%',
            'incomeVariation' => number_format($incomeVariation, 2, ',', '.') . '%',
        ]);
    }

    private function getBudgetsQuery($userId, $search, $startOfMonth, $endOfMonth){
        return Budget::where('user_id', $userId)
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'LIKE', "%$search%");
            })
            ->whereBetween('billing_date', [$startOfMonth, $endOfMonth]);
    }

    private function getMonthBudgetAmount($userId, $type, $startOfMonth, $endOfMonth){
        return Budget::where('user_id', $userId)
            ->where('type', $type)
            ->whereBetween('billing_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
    }

    private function getBudgetVariation($totalAmount, $lastMonthAmount){
        return $lastMonthAmount != 0 ? 
            (($totalAmount - $lastMonthAmount)/$lastMonthAmount) * 100 
            :
            ($totalAmount != 0 ? 100 : 0);
    }
}