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

    public function edit($id){
        return $this->budgetService->edit($id);
    }

    public function show($id){
        return $this->budgetService->show($id);
    }

    public function store(BudgetRequest $request){
        return $this->budgetService->store($request);
    }

    public function update(BudgetRequest $request, $id){
        return $this->budgetService->update($request, $id);
    }
}
