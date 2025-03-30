<?php

namespace App\Http\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService{
    public function index(Request $request){
        $search = $request->input('search');

        $categories = Category::where('user_id', auth()->user()->id)
        ->when($search, function($query) use ($search) {
            return $query->where('name', 'LIKE', "%$search%");
        })
        ->orderBy('name', 'ASC')
        ->get();

        $categoriesRelatedToBudgetsCount = $this->getCategoriesRelatedToBudgetsCount($search);

        return view('category.index', [
            'categories' => $categories,
            'search' => $search,
            'categoriesRelatedToBudgetsCount' => $categoriesRelatedToBudgetsCount
        ]);
    }

    public function create(){
        return view('category.create');
    }

    public function edit($id){
        $category = Category::where('user_id', auth()->user()->id)->findOrFail($id);

        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function store(CategoryRequest $request){
        // Verifica se a categoria já existe
        $existingCategory = Category::where('name', $request->name)
            ->where('user_id', auth()->user()->id)
            ->exists();

        if ($existingCategory) {
            return redirect()->back()->with('error', 'Categoria já cadastrada');
        }

        Category::create([
            'name' => $request->name,
            'color' => $request->color,
            'parent_id' => null,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Categoria cadastrada com sucesso');      
    }

    public function update(CategoryRequest $request, $id){
        $category = Category::where('user_id', auth()->user()->id)->findOrFail($id);

        // Verifica se a categoria já existe
        $existingCategory = Category::where('name', $request->name)
            ->where('user_id', auth()->user()->id)
            ->where('id', '!=', $category->id)
            ->exists();

        if ($existingCategory) {
            return redirect()->back()->with('error', 'Categoria já cadastrada');
        }

        $category->update([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Categoria atualizada com sucesso');
    }

    private function getCategoriesRelatedToBudgetsCount($search){
        return Category::
        when($search, function($query) use ($search) {
            return $query->where('name', 'LIKE', "%$search%");
        })
        ->withCount(['budgets' => function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('id', auth()->id());
            });
        }])->pluck('budgets_count', 'name');
    }
}