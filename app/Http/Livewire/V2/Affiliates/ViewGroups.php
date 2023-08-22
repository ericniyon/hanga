<?php

namespace App\Http\Livewire\V2\Affiliates;

use App\Client;
use App\Models\AffiliateCohort;
use Livewire\Component;
use Livewire\WithPagination;

class ViewGroups extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    public $search = "";
    protected $queryString = [
        'search'=>['except' => ""]
    ];

    public function delete($id)
    {
        $group = AffiliateCohort::findOrFail($id)->delete();
    }
    public function render()
    {
        $groups = AffiliateCohort::whereClientId(auth('client')->user()->id)
        ->where('group_name', 'like', '%' . $this->search . '%')
        ->latest()->paginate(10);

        $groups = Client::withCount('cohorts')->where('client_aggregator.aggrerated_by',auth('client')->id())
                    ->join('client_aggregator','client_aggregator.aggrerated_by','clients.id')
                    ->select('clients.*')
                    ->paginate(10);
        return view('livewire.v2.affiliates.view-groups', compact('groups'));
    }
}
