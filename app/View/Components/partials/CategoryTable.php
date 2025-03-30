<?php

namespace App\View\Components\partials;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryTable extends Component
{
    public $categories;
    public $categoriesRelatedToBudgetsCount;
    /**
     * Create a new component instance.
     */
    public function __construct(Category $categories, $categoriesRelatedToBudgetsCount)
    {
        $this->categories = $categories;
        $this->categoriesRelatedToBudgetsCount = $categoriesRelatedToBudgetsCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.category-table');
    }
}
