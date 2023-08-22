<?php

namespace App\Http\Livewire\V2\HomeTabs;

use App\Models\JobOpportunity;
use App\Models\OpportunityType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class OpportunitiesTab extends Component
{
    public Collection $opportunityTypes;
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public array $selectedOpportunityTypes = [];

    public $queryString = [
        'search' => ['except' => ''],
        'selectedOpportunityTypes' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->opportunityTypes = OpportunityType::query()
            ->get();
    }

    public function render()
    {
        $query = strtolower($this->search);

        $opportunities = JobOpportunity::with('opportunityType')
            ->where(function (Builder $query) {
                $query->where(function (Builder $builder) {
                    $builder->whereDate('deadline', '>=', Carbon::today())
                        ->orWhere(function ($q) {
                            $q->whereDate('expiration_date', '>=', Carbon::today());
                        });
                })->orWhere(function (Builder $builder) {
                    $builder->whereNull('deadline')
                        ->orWhereNull('expiration_date');
                });
            })->when($query, function (Builder $builder) use ($query) {
                $builder->where(function ($q) use ($query) {
                    $q->where('job_title', 'ilike', '%' . $query . '%')
                        ->orWhere('company_name', 'ilike', '%' . $query . '%')
                        ->orWhere('job_details', 'ilike', '%' . $query . '%')
                        ->whereDate('deadline', '>=', Carbon::today());
                });
            })
            ->when($this->selectedOpportunityTypes, function (Builder $q) {
                $q->whereIn('opportunity_type_id', $this->selectedOpportunityTypes);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.v2.home-tabs.opportunities-tab', [
            'opportunities' => $opportunities
        ]);
    }
}
