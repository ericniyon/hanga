<div class="h-100 w-100" wire:loading>
    <div class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
        <div> {{ __('app.Please wait') }}... &nbsp;</div>
        {{--            <div class="spinner spinner-primary spinner-lg"></div>--}}
        <img src="{{ asset('assets/loader.svg') }}" alt="">
    </div>
</div>
