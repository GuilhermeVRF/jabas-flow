<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use \App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request){
        return $this->categoryService->index($request);
    }

    public function create(){
        return $this->categoryService->create();
    }

    public function store(CategoryRequest $request){
        return $this->categoryService->store($request);
    }
}
