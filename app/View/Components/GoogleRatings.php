<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Client;
use App\Models\Client as ModelsClient;

class GoogleRatings extends Component
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
        // $google_ratings = ModelsClient::
        return view('components.google-ratings');
    }
}
