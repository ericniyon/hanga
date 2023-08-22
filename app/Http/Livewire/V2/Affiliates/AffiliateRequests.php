<?php

namespace App\Http\Livewire\V2\Affiliates;

use App\Client;
use App\Models\RegistrationType;
use Livewire\Component;
use Livewire\WithPagination;

class AffiliateRequests extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    public $search_query = "";
    protected $queryString = [
        'search_query'=>['except' => ""]
    ];

    public function render()
    {
        $affiliators = Client::whereIsActive(true)->whereNotNull('verified_at')
                            ->whereHas('registrationType', function($query){
                                $query->where('name',RegistrationType::iWorker);
                            })
                            ->whereHas('application')
                            ->whereStatus('Approved')
                            ->whereOwnerStatus('Approved')
                            ->where('affiliates',auth('client')->id())
                            ->searchName($this->search_query)
                            ->join('client_affiliate','client_affiliate.affiliated_by','clients.id')
                            ->select('clients.*','client_affiliate.status','client_affiliate.id as affliationId')
                            ->orderByDesc('client_affiliate.created_at')->paginate(10);

        return view('livewire.v2.affiliates.affiliate-requests',compact('affiliators'));
    }
}
