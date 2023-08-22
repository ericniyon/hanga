<div class="row justify-content-center">

    <div class="col-md-8">
        <h4>
            {{ __("app.Available APIs") }}
        </h4>
        <div class="my-5">
            <div class="input-icon">
                <input type="search"
                       class="form-control placeholder-dark border-info form-control-lg  rounded-lg border-2"
                       wire:model.debounce.750ms="query"
                       placeholder="{{ __("auth.search") }}..."/>
                <span class="svg-icon svg-icon-info svg-icon-2x">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M16 16L12.4584 12.4521L16 16ZM14.4211 7.71053C14.4211 9.49027 13.7141 11.1971 12.4556 12.4556C11.1971 13.7141 9.49027 14.4211 7.71053 14.4211C5.93078 14.4211 4.22394 13.7141 2.96547 12.4556C1.707 11.1971 1 9.49027 1 7.71053C1 5.93078 1.707 4.22394 2.96547 2.96547C4.22394 1.707 5.93078 1 7.71053 1C9.49027 1 11.1971 1.707 12.4556 2.96547C13.7141 4.22394 14.4211 5.93078 14.4211 7.71053V7.71053Z"
    stroke="#2A337E" stroke-width="2" stroke-linecap="round"/>
</svg>

                </span>
            </div>
        </div>
        <div class=" h-20px mb-2">
            <div wire:loading class="w-100 h-100">
                <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                    <div> {{ __("app.Please wait") }}... &nbsp;</div>
                    <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-50px">
                </div>
            </div>
        </div>

        @forelse ($apis as $key => $api)
            @include('partials.v2._api_item')
        @empty
            <div class="alert alert-info">
                {{ __("app.No APIs found") }}
            </div>
        @endforelse

        @include('partials.includes._pagination', ['paginator' => $apis])

    </div>
</div>
