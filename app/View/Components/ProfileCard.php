<?php

namespace App\View\Components;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCard extends Component
{
    public bool $editable;
    public $application;
    public string $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $editable = false, $application = null,string $classes='')
    {
        $this->editable = $editable;
        $this->application = $application;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.profile-card');
    }
}
