<?php

namespace App\View\Components;

use App\Client;
use App\Models\Connection;
use Illuminate\View\Component;

class MessageButton extends Component
{
    public Client $item;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Client $item)
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
        return view('components.message-button');
    }
}
