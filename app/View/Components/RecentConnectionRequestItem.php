<?php

namespace App\View\Components;

use App\Client;
use App\Models\Connection;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentConnectionRequestItem extends Component
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
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.recent-connection-request-item');
    }
}
