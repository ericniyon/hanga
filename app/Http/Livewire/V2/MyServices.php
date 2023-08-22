<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;
use App\Models\Connection;
use App\Models\Application;
use App\Client;

class MyServices extends Component
{
    public string $tab = '';


    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'api');
    }

    public function render()
    {
        $user = auth('client')->user();
        $application = Application::with('client.registrationType')
        ->where('client_id', '=', auth('client')->id())
        ->first();

        if (is_null($application)) {
            return redirect()->to(route('v2.join.as'));
        }
        $suggested = Client::with(['registrationType', 'application.businessSectors'])
        ->withCount('ratings')
        ->withSum('ratings', 'rating')
        ->withoutMe()
            ->whereHas('registrationType')
            ->notConnectedWithMe()
            ->mySuggestions()
            ->limit(10)
            ->get();
        $pendingRequest = Connection::query()
            ->where("friend_id", $user->id)
            ->where("status", Connection::PENDING)
            ->get();

        return view('livewire.v2.my-services', [
            'application' => $application,
            'suggested' => $suggested,
            'pendingRequest' => $pendingRequest,
        ])->extends('client.v2.layout.app')
        ->section('content');
    }
}
