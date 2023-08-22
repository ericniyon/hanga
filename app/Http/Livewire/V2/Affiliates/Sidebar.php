<?php

namespace App\Http\Livewire\V2\Affiliates;

use App\Client;
use App\Models\AffiliateCohort;
use App\Models\RegistrationType;
use Livewire\Component;

class Sidebar extends Component
{
    // public $aggregators, $affiliates, $affiliate_requests;

    public function mount()
    {

        // $affiliate_requests;
    }
    public function render()
    {
        $aggregators = Client::where('affiliated_by',auth('client')->id())->whereStatus('Approved')
                        ->whereNotNull('verified_at')->whereOwnerStatus('Approved')
                        ->whereHas('registrationType', function($query){
                            $query->where('name','!=',RegistrationType::iWorker);
                        })
                        ->join('client_affiliate','client_affiliate.affiliates','clients.id')
                        ->count();
        $affiliates = Client::where('affiliated_by',auth('client')->id())
                    ->whereNotNull('verified_at')->whereStatus('Approved')->whereOwnerStatus('Approved')
                    ->whereHas('registrationType', function($query){ $query->whereName(RegistrationType::iWorker); })
                    ->join('client_affiliate','client_affiliate.affiliates','clients.id')->count();

        $affiliates_pending = Client::where('affiliated_by',auth('client')->id())
                    ->whereNotNull('verified_at')->whereStatus('Pending')->whereOwnerStatus('Approved')
                    ->whereHas('registrationType', function($query){ $query->whereName(RegistrationType::iWorker); })
                    ->join('client_affiliate','client_affiliate.affiliates','clients.id')->count();

        $requests_pending = Client::whereIsActive(true)->whereNotNull('verified_at')
                            ->whereHas('registrationType')->whereStatus('Pending')
                            ->whereHas("application")
                            ->where('affiliates',auth('client')->id())
                            ->join('client_affiliate','client_affiliate.affiliated_by','clients.id')
                            ->count();

        $requests = Client::whereIsActive(true)->whereNotNull('verified_at')
                            ->whereHas('registrationType')
                            ->whereStatus('Approved')
                            ->whereOwnerStatus('Approved')
                            ->where('affiliates',auth('client')->id())
                            ->join('client_affiliate','client_affiliate.affiliated_by','clients.id')
                            ->count();

        $groups = AffiliateCohort::whereClientId(auth('client')->user()->id)->doesntHave('parent')->count();

        return view('livewire.v2.affiliates.sidebar', compact('aggregators','groups','affiliates','affiliates_pending','requests','requests_pending'));
    }
}
