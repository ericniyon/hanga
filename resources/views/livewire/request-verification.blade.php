<div>
    <div class="d-flex align-items-center justify-content-center flex-column">

        <p class="text-center">
            A verified account has a checkmark
            <span class="svg-icon text-primary">
                @include('partials.icons._verified')
            </span>
            next to the name.
        </p>


        @if($application->verification_requested)

            @if($history)
                <div
                        class="alert alert-custom alert-light-{{ $history->status==\App\Models\ApplicationBaseModel::REJECTED?'danger':'secondary'  }} fade show rounded py-2"
                        role="alert">
                    <div class="alert-icon text-white">
                        @include('partials._alert_info_icon')
                    </div>
                    <div class="alert-text">{{ $history->external_comment }}</div>
                </div>
            @endif

            @if(in_array($application->status,[\App\Models\ApplicationBaseModel::REJECTED,\App\Models\ApplicationBaseModel::RETURN_BACK]))
                <button type="button" wire:click="resubmit"
                        class="btn btn-sm rounded btn-info font-weight-bolder my-2 px-6"
                        wire:loading.attr="disabled">
                    Resubmit Verification
                </button>

            @elseif($application->status!=\App\Models\ApplicationBaseModel::APPROVED)
                <button type="button" wire:click="cancelRequest" wire:loading.attr="disabled"
                        class="btn btn-sm rounded btn-danger font-weight-bolder px-6">
                    Cancel Request
                </button>

            @else
                <h4 class="mt-5 alert alert-light-info alert-custom alert rounded py-3">
                    <div class="alert-icon">
                        <span class="svg-icon text-primary">@include('partials.icons._verified')</span>
                    </div>
                    <div class="alert-text">
                        Your account has already been verified
                    </div>
                </h4>
            @endif
        @else

            <p>
                No verification request found
            </p>

            <button type="button" wire:click="request"
                    class="btn btn-sm rounded btn-info font-weight-bolder px-6"
                    wire:loading.attr="disabled">
                Apply Now
            </button>
        @endif
    </div>
</div>
