<?php

namespace App\Http\Livewire;

use App\Client;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{

    public string $query = '';
    protected $queryString = ['query' => ['except' => '']];

    public function render()
    {
        $query = $this->query;
        $query = strtolower($query);
        $clients = empty($query) ?
            collect() :
            Client::with(['registrationType', 'application'])
                ->active()
                ->searchName($query)
                ->whereNotNull('registration_type_id')
                ->withoutMe()
                ->limit(10)
                ->get();

        return view('livewire.search', [
            'clients' => $clients
        ]);
    }

    /**
     * @param Builder $builder
     */
    public function getWhereNotIn(Builder $builder): void
    {
//        $builder->whereNotIn("status", [ApplicationBaseModel::DRAFT, ApplicationBaseModel::REJECTED]);
    }
}
