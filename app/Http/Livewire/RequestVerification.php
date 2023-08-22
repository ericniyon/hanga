<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationBaseModel;
use Livewire\Component;

class RequestVerification extends Component
{
    public Application $application;

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function render()
    {
        $history = $this->application->histories()
            ->whereIn('status', [ApplicationBaseModel::RETURN_BACK, ApplicationBaseModel::REJECTED])
            ->whereNotNull('external_comment')
            ->orderByDesc('id')
            ->first();

        return view('livewire.request-verification', [
            'history' => $history,
        ]);
    }

    public function request()
    {
        $application = $this->application;

        $application->update([
            'verification_requested' => true,
            'submission_date' => now(),
            'status' => ApplicationBaseModel::SUBMITTED,
        ]);
    }


    public function resubmit()
    {
        $application = $this->application;

        $application->update([
            'verification_requested' => true,
            'status' => ApplicationBaseModel::UNDER_REVIEW,
        ]);
    }

    public function cancelRequest()
    {
        $application = $this->application;

        $application->update([
            'verification_requested' => false,
            'submission_date' => null
        ]);
    }
}
