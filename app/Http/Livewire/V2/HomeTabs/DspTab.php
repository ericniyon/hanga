<?php

namespace App\Http\Livewire\V2\HomeTabs;

use App\Client;
use App\Models\ApplicationBaseModel;
use App\Models\BusinessSector;
use App\Models\District;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Service;
use App\Models\StartupCompanyProfile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DspTab extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public Collection $services;
    public Collection $provinces;

    public array $selectedServices = [];
    public array $selectedBusinessSectors = [];

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
        'provinceId' => ['except' => 0],
        'districtId' => ['except' => 0],
        'sectorId' => ['except' => 0],
    ];

    /*  public function paginationView(): string
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

        $clients = StartupCompanyProfile::orWhere('company_name', 'like', '%' . $search . '%')
            ->paginate(10);

        $businessSectors = BusinessSector::query()
            ->get();

        return view('livewire.v2.home-tabs.dsp-tab', [
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
