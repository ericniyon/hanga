<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class DetailsItem extends Component
{
    public string $label;
    public ?string $key;
    public Model $model;
    public ?string $value;

    public bool $isFile;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, $model, string $key = null, string $value = null,bool $isFile=false)
    {
        $this->key = $key;
        $this->label = $label;
        $this->model = $model;
        $this->value = $value;
        $this->isFile = $isFile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.details-item');
    }
}
