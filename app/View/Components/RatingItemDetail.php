<?php

namespace App\View\Components;

use App\Client;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingItemDetail extends Component
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
     * @return View
     */
    public function render(): View
    {
        return view('components.rating-item-detail');
    }
}
