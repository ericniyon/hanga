<?php

namespace App\Http\Livewire;

use App\Models\ApplicationSolution;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class OpenApi extends Component
{
    public string $query = '';
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';
    protected $queryString = ['query' => ['except' => '']];


    public function render()
    {
        $query = strtolower($this->query);
        if (empty($query)) {
            $open_apis = ApplicationSolution::where('has_api', true)
                ->where('open_api_enabled', '=', true)
                ->latest()
                ->paginate(6);
        } else {
            $open_apis = ApplicationSolution::where('has_api', true)
                ->where('open_api_enabled', '=', true)
                ->where(function (Builder $builder) use ($query) {
                    $builder->orWhere('api_name', 'ilike', '%' . $query . '%')
                        ->orWhere('dsp_name', 'ilike', '%' . $query . '%')
                        ->orWhere('api_description', 'ilike', '%' . $query . '%');
                })
                ->latest()
                ->paginate(6);
        }
        return view('livewire.open-api', compact('open_apis'));
    }
}
