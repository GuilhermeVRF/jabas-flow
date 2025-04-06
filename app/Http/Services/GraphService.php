<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class GraphService{
    public function index(){
        return view('graph.index');
    }  

    public function generateIncomeXExpenseGraph(){
        $graph = $this->makeGraphRequest('/incomeXExpense', [
            'income' => 760,
            'expense' => 400,
        ]);
        return view('graph.incomeXExpense',[
            'graph' => $graph,
        ]);
    }

    private function makeGraphRequest(string $endpoint, array $payload)
    {
        $response = Http::post("http://localhost:5001{$endpoint}", $payload);
        
        if ($response->successful()) {
            return base64_encode($response->body());
        }

        return null;
    }
}