<?php

namespace App\Http\Livewire;

use App\Models\JobOpportunity;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Opportunity extends Component
{
    public string $query = '';
    public string $type = '';
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    protected $queryString = ['query' => ['except' => ''], 'type' => ['except' => '']];

    public function updatingType()
    {
        $this->resetPage();
    }
    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = strtolower($this->query);
        $type_id = $this->type;

        $jobs = JobOpportunity::query()
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
            ->when($type_id, function ($q) use ($type_id) {
                $q->where('opportunity_type_id', $type_id);
            })
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.opportunity', compact('jobs'));
    }
}
