<?php

namespace App\View\Components;

use App\Client;
use Illuminate\View\Component;

class ConnectButton extends Component
{
    public Client $item;
    public bool $showIcon;
    public string $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Client $item, string $size = 'btn-sm', bool $showIcon = false)
    {
        $this->item = $item;
        $this->showIcon = $showIcon;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.connect-button');
    }
}
