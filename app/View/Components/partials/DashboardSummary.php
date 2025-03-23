<?php

namespace App\View\Components\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardSummary extends Component
{
    public $totalAmount;
    public $totalIncomeAmount;
    public $totalExpenseAmount;
    public $incomeVariation;
    public $expenseVariation;
    /**
     * Create a new component instance.
     */
    public function __construct($totalAmount, $totalIncomeAmount, $totalExpenseAmount, $incomeVariation, $expenseVariation)
    {
        $this->totalAmount = $totalAmount;
        $this->totalIncomeAmount = $totalIncomeAmount;
        $this->totalExpenseAmount = $totalExpenseAmount;
        $this->incomeVariation = $incomeVariation;
        $this->expenseVariation = $expenseVariation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.dashboard-summary');
    }
}
