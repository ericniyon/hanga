<?php

namespace App\View\Components;

use App\Models\DSPRegistration;
use App\Models\RegistrationType;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DspRegistrationDetails extends Component
{

    public bool $editable;
    public DSPRegistration $model;
    public string $cardClasses = '';
    public bool $isPreview;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(DSPRegistration $model, bool $editable = false, $cardClasses = 'border-0', bool $isPreview = false)
    {
        $this->editable = $editable;
        $this->model = $model;
        $this->cardClasses = $cardClasses;
        $this->isPreview = $isPreview;
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
        return view('components.dsp-registration-details', compact('application', 'registrationTypes', 'selected_interests'));
    }
}
