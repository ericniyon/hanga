<?php

namespace App\View\Components;

use App\Models\Connection;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewConnectionRequestButton extends Component
{
    public Connection $item;
    public string $text;
    public string $size;

    /**
     * Create a new component instance.
     *
     * @param Connection $item
     * @param string $text
     * @param string $size
     */
    public function __construct(Connection $item, string $text = 'View', string $size = 'btn-sm')
    {
        $this->item = $item;
        $this->text = $text;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.view-connection-request-button');
    }
}
