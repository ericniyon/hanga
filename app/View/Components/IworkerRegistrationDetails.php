<?php

namespace App\View\Components;

use App\Models\IworkerRegistration;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use Illuminate\View\Component;

class IworkerRegistrationDetails extends Component
{

    public bool $editable;
    public IworkerRegistration $model;
    public string $cardClasses = '';
    public bool $review;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(IworkerRegistration $model, bool $editable = false, $cardClasses = 'border-0', bool $review = false)
    {
        $this->model = $model;
        $this->editable = $editable;
        $this->cardClasses = $cardClasses;
        $this->review = $review;
    }


    public function render()
    {
        $application = $this->model->application;
        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();
        return view('components.iworker-registration-details', compact('application', 'registrationTypes', 'selected_interests'));
    }
}
