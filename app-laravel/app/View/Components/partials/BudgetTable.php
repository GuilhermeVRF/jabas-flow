<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BudgetTable extends Component
{
    public $budgets;
    /**
     * Create a new component instance.
     */
    public function __construct($budgets)
    {
        $this->budgets = $budgets;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.budget-table');
    }
}
