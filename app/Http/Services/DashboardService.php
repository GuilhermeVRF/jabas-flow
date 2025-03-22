<?php

namespace App\Http\Services;

use App\Models\Budget;
use Illuminate\Http\Request;

class DashboardService{
    public function index(Request $request){
        $search = $request->input('search');

        $budgets = Budget::where('user_id', auth()->id())
        ->when($search, function($query) use ($search){
            return $query->where('name', 'LIKE', "%$search%");
        })
        ->paginate(10);

        return view('dashboard', [
            'budgets' => $budgets,
            'search' => $search,
        ]);
    }
}