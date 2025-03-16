<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class DashboardService{
    public function index(Request $request){
        $startingDate = $request->input('starting_date', null);
        $endingDate = $request->input('ending_date', null);
        
        return view('dashboard', [
            'selectedStartDate' => $startingDate,
            'selectedEndDate' => $endingDate
        ]);
    }
}