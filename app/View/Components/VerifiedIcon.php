<?php

namespace App\View\Components;

use App\Models\Application;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerifiedIcon extends Component
{
    public string $classes;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $classes = '')
    {
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.verified-icon');
    }
}
