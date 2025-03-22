<?php

namespace App\Http\Services;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardService{
    public function index(Request $request){
        $search = $request->input('search');

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth(); 

        $budgets = Budget::where('user_id', auth()->id())
        ->when($search, function($query) use ($search){
            return $query->where('name', 'LIKE', "%$search%");
        })
        ->whereBetween('billing_date', [$startOfMonth, $endOfMonth])
        ->orderBy('billing_date', 'desc')
        ->paginate(10);

        return view('dashboard', [
            'budgets' => $budgets,
            'search' => $search,
        ]);
    }
}