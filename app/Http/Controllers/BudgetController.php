<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Http\Services\BudgetService;

class BudgetController extends Controller
{
    private $budgetService;

    public function __construct(BudgetService $budgetService){
        $this->budgetService = $budgetService;
    }

    public function create(){
        return $this->budgetService->create();
    }

    public function store(BudgetRequest $request){
        return $this->budgetService->store($request);
    }
}
