<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SuggestedItem extends Component
{
    public string $title;
    public string $subTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $subTitle = '')
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.suggested-item');
    }
}
