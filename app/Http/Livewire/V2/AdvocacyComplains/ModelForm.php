<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use App\Client;
use App\Models\Advocacie;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Builder;


class ModelForm extends Component
{
    use WithFileUploads;

    public $feedback;
    public $document;
    public $address;
    public $category;

    public Advocacie $advocacie;

    public $addressed = [
        'state' => 'SCHEDULER'
    ];

    protected $rules = [
        'advocacie.feedback' => 'required|min:300',
        'advocacie.address' => 'required',
        'advocacie.document' => 'required',
    ];

    public function mount()
    {
        $this->advocacie = $advocacie ?? new Advocacie();
    }

    public function store()
    {
        // dd(implode(',',$this->addressed));
        $validatedData = $this->validate([
            'document' => 'required|mimes:pdf|max:1024',
            'category' => 'required',

        ]);

        if ($this->document) {
            # code...
            $file = $this->document->store('adivocacy', 'public');
        }

        Advocacie::create([
            'complaint' => $this->feedback,
            'addressed_to' => implode($this->addressed),
            'document' => $file,
            'category' => $this->category,

            'sender' => auth('client')->check() ? auth('client')->user()->id : null,
            'phone' => auth('client')->check() ? auth('client')->user()->phone : null,
            'name' => auth('client')->check() ? auth('client')->user()->name : null,
            'email' => auth('client')->check() ? auth('client')->user()->email : null,

        ]);
        session()->flash('success', 'Feedback submitted successfully');

        return redirect()->route('client.advocacy.complains');
    }

    public function render()
    {
        // $clients = Client::with(['application.businessSectors', 'ratings', 'application.msmeRegistration'])
        // ->withCount('ratings')
        // ->withSum('ratings', 'rating')

        // ->whereHas('registrationType', function (Builder $query) {
        //     $query->where('name', '=', 'MSME');
        // })
        // ->orderRating();

        $clients = Client::with(['application.businessSectors', 'application.dspRegistration'])
            ->whereHas('registrationType', function (Builder $query) {
                $query->where('name', '=', 'DSP');
            })->get();


        return view('livewire.v2.advocacy-complains.model-form', ['clients' => $clients]);
    }


    public function updated($name)
    {
        $this->validateOnly($name, [
            'advocacie.feedback' => 'required',
            'advocacie.address' => 'required',
        'advocacie.document' => 'required',
        ]);
    }
}
