<?php

namespace App\View\Components\v2;

use Closure;
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
     * @return View
     */
    public function render(): View
    {
        return view('components.v2.high-rated-clients');
    }
}
