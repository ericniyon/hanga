<?php

namespace App\Http\Livewire\V2;

use App\Models\ApplicationSolution;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class AvailableApis extends Component
{

    public string $query = '';

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    protected $queryString = ['query' => ['except' => '']];

    public function render()
    {
        $query = trim(strtolower($this->query));

        $apis = ApplicationSolution::where('has_api', true)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->where('open_api_enabled', '=', true)
            ->when(!empty($query), function (Builder $builder) use ($query) {
                $builder->where(function (Builder $builder) use ($query) {
                    $builder->orWhere('api_name', 'ilike', '%' . $query . '%')
                        ->orWhere('dsp_name', 'ilike', '%' . $query . '%')
                        ->orWhere('api_description', 'ilike', '%' . $query . '%');
                });
            })
            ->latest()
            ->paginate(10);
        return view('livewire.v2.available-apis', [
            'apis' => $apis
        ]);
    }
}
