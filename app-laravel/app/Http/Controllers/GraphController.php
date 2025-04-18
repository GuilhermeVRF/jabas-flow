<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\GraphService;

class GraphController extends Controller
{
    private $graphService;

    public function __construct()
    {
        $this->graphService = new GraphService();
    }

    public function index(){
        return $this->graphService->index();
    }

    public function generateIncomeXExpenseGraph(Request $request){
        return $this->graphService->generateIncomeXExpenseGraph($request);
    }

    public function generateIncomeEvolutionGraph(){
        return $this->graphService->generateIncomeEvolutionGraph();
    }

    public function generateExpenseEvolutionGraph(){
        return $this->graphService->generateExpenseEvolutionGraph();
    }

    public function generateCategoriesWithMostSpendingGraph(){
        return $this->graphService->generateCategoriesWithMostSpendingGraph();    
    }
}
