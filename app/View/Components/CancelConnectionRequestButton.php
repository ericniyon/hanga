<?php

namespace App\View\Components;

use App\Models\Connection;
use Illuminate\View\Component;

class CancelConnectionRequestButton extends Component
{
    public Connection $item;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Connection $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cancel-connection-request-button');
    }
}
