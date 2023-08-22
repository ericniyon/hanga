<?php

namespace App\Http\Livewire\V2\HomeTabs;

use App\Models\OpportunityType;
use App\Models\Webinar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EventsTab extends Component
{
    public array $eventTypes;
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public array $selectedEventTypes = [];

    public $queryString = [
        'search' => ['except' => ''],
        'selectedEventTypes' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->eventTypes = [
            'Webinars',
            'Workshops',
            'Training'
        ];
    }

    public function render()
    {
        $query = strtolower($this->search);
        $events = Webinar::with(['otherDates'])
            ->where(function ($q) {
                $q->whereDate("end_date", '>=', now())
                    ->orWhereHas("otherDates", function ($q) {
                        $q->whereDate("end_date", '>=', now());
                    });
            })
            ->when(!empty($query), function (Builder $q) use ($query) {
                $q->where(function (Builder $builder) use ($query) {
                    $builder->where(DB::raw("LOWER(title)"), 'LIKE', "%$query%")
                        ->orWhere(DB::raw("LOWER(short_description)"), 'LIKE', "%$query%")
                        ->orWhere(DB::raw("LOWER(type)"), 'LIKE', "%$query%");
                });
            })
            ->when($this->selectedEventTypes, function (Builder $q) {
                $q->whereIn('type', $this->selectedEventTypes);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.v2.home-tabs.events-tab', [
            'events' => $events
        ]);
    }
}
