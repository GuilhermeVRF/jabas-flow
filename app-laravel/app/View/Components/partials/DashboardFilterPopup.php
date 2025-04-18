<?php

namespace App\View\Components\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardFilterPopup extends Component
{
    public $month;
    /**
     * Create a new component instance.
     */
    public function __construct($month)
    {
        $this->month = $month;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.dashboard-filter-popup');
    }
}
