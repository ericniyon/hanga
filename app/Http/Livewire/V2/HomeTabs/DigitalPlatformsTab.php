<?php

namespace App\Http\Livewire\V2\HomeTabs;

use App\Models\ApplicationSolution;
use App\Models\BusinessSector;
use App\Models\PlatformType;
use App\Models\Province;
use App\Models\Rating;
use App\Models\Service;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DigitalPlatformsTab extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public Collection $platformTypes;
    public Collection $specialties;
    public string $search = '';

    public array $selectedPlatformTypes = [];
    public array $selSpec = [];

    public $queryString = [
        'search' => ['except' => ''],
        'selSpec' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function mount()
    {
        $this->platformTypes = PlatformType::query()->get();
        $this->specialties = BusinessSector::query()->get();
    }


    public function render()
    {
        $query = $this->search;

        $digitalPlatforms = ApplicationSolution::with(['application','specialties'])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->with(['platformTypes', 'application.client' => function ($query) {
                $query->active();
            }])
            ->where(function (Builder $builder) {
                $builder->whereNull('has_api')
                    ->orWhere('has_api', '=', false);
            })
            ->when($query, function (Builder $builder) use ($query) {
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
            })
            ->when($this->selectedPlatformTypes, function (Builder $builder) {
                $builder->whereHas('solutionPlatforms', function (Builder $builder) {
                    $builder->whereIn('platform_type_id', $this->selectedPlatformTypes);
                });
            })
            ->when($this->selSpec, function (Builder $builder) {
                $builder->whereHas('businessSectors', function (Builder $builder) {
                    $builder->whereIn('business_sector_id', $this->selSpec);
                });
            })
            ->where('solution_enabled', '=', true)
            ->orderRating("application_solutions.id")
            ->latest()
            ->paginate(10);

        return view('livewire.v2.home-tabs.digital-platforms-tab', [
            'digitalPlatforms' => $digitalPlatforms
        ]);
    }
}
