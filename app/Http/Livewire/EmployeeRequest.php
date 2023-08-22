<?php

namespace App\Http\Livewire;

use App\Constants;
use App\Models\Affiliation;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeRequest extends Component
{
    use WithPagination;

    public string $query = '';
    protected $queryString = ['query' => ['except' => '']];


    public function render()
    {
        $this->query = strtolower(trim($this->query));
        $employees = Affiliation::with(['client'])
            ->where('employer_id', '=', auth('client')->id())
            ->whereHas('client', function (Builder $builder) {
                $builder->where('name', 'ILIKE', "%$this->query%");
            })
            ->latest()->paginate();
        return view('livewire.employee-request', compact('employees'));
    }

    public function approve(Affiliation $employee)
    {
        $employee->status = Constants::Approved;
        $employee->update();
    }

    public function reject(Affiliation $employee)
    {
        $employee->status = Constants::Rejected;
        $employee->update();
    }
}
