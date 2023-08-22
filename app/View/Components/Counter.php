<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Counter extends Component
{

    public int $number;
    public bool $showPlus;
    public string $className;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $number, bool $showPlus = true,$className='')
    {
        $this->number = $number;
        $this->showPlus = $showPlus;
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.counter');
    }
}
