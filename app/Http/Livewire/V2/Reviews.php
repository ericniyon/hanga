<?php

namespace App\Http\Livewire\V2;

use App\Client;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public Model $model;

    public function mount(Model $model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $reviews = $this->model
            ->ratings()
            ->with('doneBy')
            ->latest()
            ->paginate(10);
        return view('livewire.v2.reviews', [
            'reviews' => $reviews,
        ]);
    }
}
