<?php

namespace App\View\Components;

use App\Traits\HasTopRated;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopRated extends Component
{
    use HasTopRated;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {

        $msmes = $this->getHighRatedMsmes();


        $dsps = $this->getHighRatedDsp();


        $iworkers = $this->getHighRatedIworkers();

        return view('components.top-rated', [
            'msmes' => $msmes,
            'dsps' => $dsps,
            'iworkers' => $iworkers,
        ]);
    }
}
