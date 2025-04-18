<?php

namespace App\Http\Services;

use App\Http\Requests\RecurrenceRequest;
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
        ->paginate(10);

        return view('recurrence.index', [
            'recurrences' => $recurrences,
            'search' => $search
        ]);
    }

    public function edit($id){
        $recurrence = Recurrence::with('budget')->findOrFail($id);
        return view('recurrence.edit', [
            'recurrence' => $recurrence
        ]);
    }

    public function update(RecurrenceRequest $request, $id){
        $recurrence = Recurrence::findOrFail($id);
        $recurrence->update([
            'date' => $request->date,
            'frequency' => $request->frequency,
            'times' => $request->times,
            'counter' => $request->counter,
        ]);
        
        $recurrence->budget->update([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);

        return redirect()->route('recurrence.index')->with('success', 'Recorrência atualizada com sucesso!');
    }
}