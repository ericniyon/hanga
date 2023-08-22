<div class="mt-5">
    <div class="d-flex justify-content-md-between justify-content-center">
        <div class="flex-grow-1">
            <label for="search" class="sr-only">{{ __("auth.search") }}</label>

            <div class="input-icon">
                <input type="search" class="form-control shadow-sm rounded-lg" name="search" id="search"
                       wire:model.debounce.750="query" autocomplete="off"
                       placeholder="{{ __("Search ...") }}">
                <span class="svg-icon  text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"/>
                    </svg>
                </span>
            </div>

        </div>

    </div>
    <div class="text-center w-100">
        <div class="spinner spinner-track spinner-primary spinner-right " wire:loading></div>
    </div>
    <div class="mb-5"></div>

    @if($clients->count() > 0)
        @foreach($clients as $item)
            <div class="my-2 {{ !$loop->last?'border-bottom border-light':'' }}">
                <x-client-item :show-client-name="true" :item="$item"/>
            </div>
        @endforeach
    @elseif(!empty($query))
        <div class="alert alert-custom  alert-light-warning mt-4 rounded-lg py-2">
            <div class="alert-icon svg-icon-warning text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="alert-text">
                {{ __("app.no_results_found") }}
                <strong>{{ $query }}</strong>
            </div>
        </div>
    @endif
</div>
