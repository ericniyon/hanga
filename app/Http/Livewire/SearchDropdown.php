<?php

namespace App\Http\Livewire;

use App\Client;
use App\Models\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchDropdown extends Component
{

    public string $query = '';
//    protected $queryString = ['query' => ['except' => '']];

    public function render()
    {

        $query = $this->query;
        $query = strtolower($query);
        $clients = empty($query) ? collect() : Client::with('registrationType')
            ->where(function(Builder $builder) use ($query) {
                $builder->whereHas('application',function (Builder $builder) use ($query) {
                    $builder->whereRaw("document_vectors @@ plainto_tsquery(?)",[$query])
                        ->orWhere("bio","LIKE","%$query%");
                })
            ->orWhereRaw("document_vectors @@ plainto_tsquery(?)",[$query])
                    ->orWhere(DB::raw("LOWER(name)"), 'LIKE', "%$query%") ;
            })
            ->whereHas('application',function (Builder $builder){
                $builder->whereNotIn("status",[Application::DRAFT,Application::REJECTED]);
            })
            ->whereNotNull('registration_type_id')->withoutMe()->orderSearch()->limit(10)->get();


        return view('livewire.search-dropdown', compact('clients'));
    }
}
