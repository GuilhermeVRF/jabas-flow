<?php

namespace App\Http\Services;

use App\Models\Recurrence;
use Illuminate\Http\Request;

class RecurrenceService{
    public function index(Request $request){
        $search = $request->input('search');
        $recurrences = Recurrence::with('budget')
        ->whereHas('budget', function ($query) use ($search) {
            $query->where('user_id', auth()->id());

            if ($search) {
                $query->where('name', 'LIKE', "$search%");
            }
        })
        ->get();

        return view('recurrence.index', [
            'recurrences' => $recurrences,
            'search' => $search
        ]);
    }
}