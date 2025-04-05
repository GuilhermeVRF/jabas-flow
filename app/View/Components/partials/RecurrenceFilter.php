<?php

namespace App\View\Components\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecurrenceFilter extends Component
{
    public $search;
    /**
     * Create a new component instance.
     */
    public function __construct($search)
    {
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.recurrence-filter');
    }
}
