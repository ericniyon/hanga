<?php

namespace App\Http\Livewire;

use App\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyConnections extends Component
{
    public string $connection = '';

    public function render()
    {
        $query = strtolower($this->connection);
        if (empty($query))
        {
            $myConnections = Client::with(['registrationType', 'application.businessSectors'])
                ->withoutMe()
                ->connectedWithMe()
                ->paginate(10);
        }
        else
        {
            $myConnections = Client::with(['registrationType', 'application.businessSectors'])
                ->searchName($query)
                ->whereNotNull('registration_type_id')
                ->withoutMe()
                ->connectedWithMe()
                ->latest()
                ->paginate(10);

        }
        return view('livewire.my-connections', compact('myConnections'));
    }
}
