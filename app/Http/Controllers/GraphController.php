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

    public function generateIncomeXExpenseGraph(){
        return $this->graphService->generateIncomeXExpenseGraph();
    }
}
