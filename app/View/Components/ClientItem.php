<?php

namespace App\View\Components;

use App\Client;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientItem extends Component
{
    public Client $item;

    public bool $showClientName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Client $item, bool $showClientName = false)
    {
        $this->item = $item;
        $this->showClientName = $showClientName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.client-item');
    }
}
