<?php

namespace App\View\Components\parials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputColor extends Component
{
    public $name;
    public $previewUserColors;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $previewUserColors)
    {
        $this->name = $name;
        $this->previewUserColors = $previewUserColors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.parials.input-color');
    }
}
