<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public string $href;
    public bool $showText;
    public string $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $href, bool $showText = true, string $classes = '')
    {
        $this->href = $href;
        $this->showText = $showText;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-button');
    }
}
