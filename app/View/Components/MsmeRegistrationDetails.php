<?php

namespace App\View\Components;

use App\Models\DSPRegistration;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MsmeRegistrationDetails extends Component
{


    public bool $editable;
    public bool $review;
    public MSMERegistration $model;

    public string $cardClasses = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MSMERegistration $model, bool $editable = false, $cardClasses = 'border-0', bool $review = false)
    {
        $this->model = $model;
        $this->editable = $editable;
        $this->cardClasses = $cardClasses;
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        $application = $this->model->application;
        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();
        return view('components.msme-registration-details', compact('application', 'registrationTypes', 'selected_interests'));
    }
}
