<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HighRatedClients extends Component
{

    public Collection $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.high-rated-clients');
    }
}
