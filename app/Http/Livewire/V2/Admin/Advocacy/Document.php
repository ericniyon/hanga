<?php

namespace App\Http\Livewire\V2\Admin\Advocacy;

use Livewire\Component;
use App\Models\Advocacie;

class Document extends Component
{
    public $document;

    public function mount()
    {
        $document = Advocacie::find($this->document);
        $this->document = $document->document;

    }
    public function render()
    {
        return view('livewire.v2.admin.advocacy.document', ['document' => $this->document])
                ->extends('frontend.master')
                ->section('content');
    }
}
