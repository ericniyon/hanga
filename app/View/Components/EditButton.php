<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{

    public bool $showText;
    public string $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $showText = true, string $classes = '')
    {
        $this->showText = $showText;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.edit-button');
    }
}
