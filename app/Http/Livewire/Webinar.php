<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Webinar extends Component
{
    public string $query = '';
    public function render()
    {
        $query = strtolower($this->query);
        if(empty($query)) {
            $webinars = \App\Models\Webinar::query()->where(function ($q) {
                $q->whereDate("end_date", '>=', now())
                    ->orWhereHas("otherDates", function ($q) {
                        $q->whereDate("end_date", '>=', now());
                    });
            })->latest()->paginate(10);
        }else{
            $webinars = \App\Models\Webinar::query()->where(function ($q) {
                $q->whereDate("end_date", '>=', now())
                    ->orWhereHas("otherDates", function ($q) {
                        $q->whereDate("end_date", '>=', now());
                    });
            })->where(function(Builder $builder) use ($query) {
                $builder->where(DB::raw("LOWER(title)"), 'LIKE', "%$query%")
                ->orWhere(DB::raw("LOWER(short_description)"), 'LIKE', "%$query%")
                    ->orWhere(DB::raw("LOWER(type)"), 'LIKE', "%$query%");
            })->latest()->paginate(10);
        }

        return view('livewire.webinar',compact('webinars'));
    }
}
