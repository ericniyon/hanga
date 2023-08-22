<?php

namespace App\Http\Livewire\V2\Affiliates;

use App\Client;
use App\Models\RegistrationType;
use Livewire\Component;
use Livewire\WithPagination;

class Affiliates extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    public $search_query = "";
    protected $queryString = [
        'search_query'=>['except' => ""]
    ];

    public function render()
    {
        $affiliates = Client::where('affiliated_by',auth('client')->id())
                            ->whereHas('application')
                            ->searchName($this->search_query)
                            ->whereNotNull('verified_at')
                            ->whereOwnerStatus('Approved')
                            ->whereHas('registrationType', function($query){
                                $query->where('name',RegistrationType::iWorker);
                            })
                            ->join('client_affiliate','client_affiliate.affiliates','clients.id')
                            ->select('clients.*','client_affiliate.status','client_affiliate.id as affliationId')
                            ->orderByDesc('client_affiliate.created_at')->paginate(10);

        return view('livewire.v2.affiliates.affiliates', compact('affiliates'));
    }
}
