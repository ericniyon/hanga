<?php

namespace App\Http\Livewire;

use App\Models\JobOpportunity;
use App\Models\OpportunityType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class MyOpportunities extends Component
{
    public Collection $opportunityTypes;
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public array $s_op_types = [];

    public $queryString = [
        'search' => ['except' => ''],
        's_op_types' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->opportunityTypes = OpportunityType::all();
    }

    public function render()
    {
        $query = strtolower($this->search);

        $opportunities = JobOpportunity::with('opportunityType')
            ->where('client_id', '=', auth()->guard('client')->id())
            ->where(function ($query) {
                $query->whereDate('deadline', '>=', Carbon::today())
                    ->orWhere(function ($q) {
                        $q->whereDate('expiration_date', '>=', Carbon::today());
                    });
            })->when($query, function (Builder $builder) use ($query) {
                $builder->where(function ($q) use ($query) {
                    $q->where('job_title', 'ilike', '%' . $query . '%')
                        ->orWhere('company_name', 'ilike', '%' . $query . '%')
                        ->orWhere('job_details', 'ilike', '%' . $query . '%')
                        ->whereDate('deadline', '>=', Carbon::today());
                });
            })
            ->when($this->s_op_types, function (Builder $q) {
                $q->whereIn('opportunity_type_id', $this->s_op_types);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('livewire.my-opportunities', [
            'opportunities' => $opportunities
        ]);
    }
}
