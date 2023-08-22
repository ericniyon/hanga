<?php

namespace App\Http\Livewire;

use App\Models\ApplicationSolution;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Solution extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $query = '';
    private $solutions;
    public $selectedPlatformId;

    protected $queryString = ['query' => ['except' => '']];

    public function mount()
    {
        $this->selectedPlatformId = null;
    }

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = $this->query;


        $builder = ApplicationSolution::with(['platformTypes', 'application.client' => function ($query) {
            $query->active();
        }])->where(function (Builder $builder) {
            $builder->where('has_api', '=', null);
        })->when($query, function (Builder $builder) use ($query) {
            $builder->where(function (Builder $q) use ($query) {
                $q->where('name', 'iLIKE', "%$query%")
                    ->orWhere('dsp_name', 'iLIKE', "%$query%")
                    ->orWhere('description', 'iLIKE', "%$query%")
                    ->orWhereHas('application', function (Builder $builder) use ($query) {
                        $builder->whereHas('client', function (Builder $builder) use ($query) {
                            $builder->where('name', 'iLIKE', "%$query%");
                        });
                    });
            });
        })->when($this->selectedPlatformId, function (Builder $builder) {
            $builder->whereHas('solutionPlatforms', function (Builder $builder) {
                $builder->whereIn('platform_type_id', [$this->selectedPlatformId]);
            });
        })->where('solution_enabled', '=', true);

        $selectedPlatform = $this->selectedPlatformId;
        $this->selectedPlatformId = null;


        $this->solutions = $builder->latest()->paginate(6);
        $platforms = \App\Models\PlatformType::all();
        return view('livewire.solution', ['solutions' => $this->solutions, 'platforms' => $platforms, 'selectedPlatform' => $selectedPlatform]);
    }

    public function filterByPlatform($platform = null)
    {
        $this->selectedPlatformId = $platform;
//        dd($platform);
//        $query = ApplicationSolution::with(['platformTypes', 'application.client'])
//            ->whereHas('solutionPlatforms', function (Builder $builder) use ($platform) {
//                $builder->where('platform_type_id', $platform);
//            });
    }

}
