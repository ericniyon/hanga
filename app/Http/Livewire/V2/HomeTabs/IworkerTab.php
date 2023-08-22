<?php

namespace App\Http\Livewire\V2\HomeTabs;

use App\Client;
use App\Models\ApplicationBaseModel;
use App\Models\BusinessSector;
use App\Models\CompanyCategory;
use App\Models\District;
use App\Models\Province;
use App\Models\RegistrationType;
use App\Models\Sector;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class IworkerTab extends Component
{

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public Collection $services;
    public Collection $areaOfInterests;
    public Collection $provinces;

    public array $selectedServices = [];
    public array $selectedBusinessSectors = [];
    public array $selectedInterests = [];

    public string $search = '';
    public int $provinceId = 0;

    public Collection $districts;
    public int $districtId = 0;

    public Collection $sectors;
    public int $sectorId = 0;

    public $queryString = [
        'search' => ['except' => ''],
        'selectedServices' => ['except' => ''],
        'selectedBusinessSectors' => ['except' => ''],
        'selectedInterests' => ['except' => ''],
        'provinceId' => ['except' => 0],
        'districtId' => ['except' => 0],
        'sectorId' => ['except' => 0],
    ];

    /*    public function paginationView(): string
        {
            return 'vendor.pagination.custom';
        }*/

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedServices()
    {
        $this->resetPage();
    }

    public function updatingSelectedBusinessSectors()
    {
        $this->resetPage();
    }


    public function mount()
    {
        $this->services = Service::query()
            ->latest()
            ->get();
        $this->areaOfInterests = CompanyCategory::query()
            ->whereHas('registrationTypes', function (Builder $builder) {
                $builder->where('registration_type_id', '=', RegistrationType::iWorkerId);
            })
            ->get();

        $this->provinces = Province::query()
            ->latest()
            ->get();

        $this->districts = Collection::empty();
        $this->sectors = Collection::empty();
        $this->loadDistricts();
        $this->loadSectors();
    }

    public function render()
    {

        $search = trim($this->search);

        $clients = Client::with(['application.categories' => function ($builder) {
            $builder->limit(2);
        }, 'application.iWorkerRegistration'])
            ->withCount('ratings')
            ->withSum('ratings', 'rating')
            ->whereHas('application', function (Builder $builder) use ($search) {
                $builder->whereNotIn("status", [ApplicationBaseModel::DRAFT, ApplicationBaseModel::REJECTED]);
                $builder->when(!empty($search), function (Builder $builder) use ($search) {
                    $builder->whereHas('iWorkerRegistration', function (Builder $builder) use ($search) {
                        $builder->where('name', 'ilike', "%$search%");
                    });
                });

                $builder->when($this->selectedServices, function (Builder $query) {
                    $query->whereHas('services', function (Builder $query) {
                        $query->whereIn('services.id', $this->selectedServices);
                    });
                });
                $builder->when($this->selectedBusinessSectors, function (Builder $query) {
                    $query->whereHas('businessSectors', function (Builder $query) {
                        $query->whereIn('business_sectors.id', $this->selectedBusinessSectors);
                    });
                });
                $builder->when($this->provinceId > 0, function (Builder $query) {
                    $query->whereHas('iWorkerRegistrations', function (Builder $query) {

                        $query->where('province_id', $this->provinceId);

                        $query->when($this->districtId > 0, function (Builder $query) {
                            $query->where('district_id', $this->districtId);
                        });

                        $query->when($this->sectorId > 0, function (Builder $query) {
                            $query->where('sector_id', $this->sectorId);
                        });

                    });
                });

                $builder->when($this->selectedInterests, function (Builder $query) {
                    $query->whereHas('interests', function (Builder $query) {
                        $query->whereIn('category_id', $this->selectedInterests)
                            ->where('registration_type_id', '=', RegistrationType::iWorkerId);
                    });
                });

            })
            ->whereHas('registrationType', function (Builder $query) {
                $query->where('name', '=', 'iWorker');
            })
            ->orderRating()
            ->paginate(10)
            ->appends(['search' => $this->search, 'selectedServices' => $this->selectedServices]);


        $businessSectors = BusinessSector::query()
            ->get();
        return view('livewire.v2.home-tabs.iworker-tab', [
            'clients' => $clients,
            'businessSectors' => $businessSectors,
        ]);
    }

    public function loadDistricts()
    {
        $this->districts = District::query()
            ->where('province_id', $this->provinceId)
            ->get();
    }

    public function loadSectors()
    {
        $this->sectors = Sector::query()
            ->where('district_id', $this->districtId)
            ->get();
    }
}
