<?php

namespace App\View\Components;

use App\Client;
use Illuminate\View\Component;

class RatingItem extends Component
{

    public Client $client;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        //
        $this->client = $client;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rating-item');
    }
}
