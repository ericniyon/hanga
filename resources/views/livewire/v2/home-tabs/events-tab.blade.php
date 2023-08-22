<div class="row">
    <div class="col-12 h-20px mb-2">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div> {{ __('app.Please wait') }}... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        @include('partials.v2._filter_by_title')
        @foreach($eventTypes as $eventType)
            <div
                class="bg-light-light shadow-none rounded-0 my-2 p-3 d-flex justify-content-between align-items-start">
                <h5 class="mb-0">
                    <span class="svg-icon">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.75 1.25H13.75V2.5H8.75V1.25Z" fill="#2A337E"/>
                        <path d="M6.25 1.25H7.5V2.5H6.25V1.25Z" fill="#2A337E"/>
                        <path d="M8.75 3.75H13.75V5H8.75V3.75Z" fill="#2A337E"/>
                        <path d="M6.25 3.75H7.5V5H6.25V3.75Z" fill="#2A337E"/>
                        <path d="M8.75 6.25H13.75V7.5H8.75V6.25Z" fill="#2A337E"/>
                        <path d="M6.25 6.25H7.5V7.5H6.25V6.25Z" fill="#2A337E"/>
                        <path
                            d="M3.125 12.5C3.47018 12.5 3.75 12.2202 3.75 11.875C3.75 11.5298 3.47018 11.25 3.125 11.25C2.77982 11.25 2.5 11.5298 2.5 11.875C2.5 12.2202 2.77982 12.5 3.125 12.5Z"
                            fill="#2A337E"/>
                        <path d="M2.5 2.5H3.75V8.125H2.5V2.5Z" fill="#2A337E"/>
                        <path
                            d="M4.375 1.25H1.875C1.70924 1.25 1.55027 1.31585 1.43306 1.43306C1.31585 1.55027 1.25 1.70924 1.25 1.875V13.125C1.25 13.2908 1.31585 13.4497 1.43306 13.5669C1.55027 13.6842 1.70924 13.75 1.875 13.75H4.375C4.54076 13.75 4.69973 13.6842 4.81694 13.5669C4.93415 13.4497 5 13.2908 5 13.125V1.875C5 1.70924 4.93415 1.55027 4.81694 1.43306C4.69973 1.31585 4.54076 1.25 4.375 1.25ZM4.375 13.125H1.875V1.875H4.375V13.125Z"
                            fill="#2A337E"/>
                    </svg>
                    </span>
                    {{ $eventType }}
                </h5>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="{{ $eventType }}"
                           wire:model="selectedEventTypes"/>
                    <span class="border-info border-2 rounded-sm"></span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-lg-9">
        <div class="row  justify-content-center mb-5">

            <div class="col-md-12 " style="justify-content: center">
                @foreach(\App\Models\FeatureContent::where('tab','Events')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
            </div>
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-12">
                <x-search-input wire:model.debounce.500ms="search"/>
            </div>
        </div>

        @foreach($events as $event)
            @include('partials.v2._event_item')
        @endforeach

        @include('partials.includes._pagination', ['paginator' => $events])

    </div>
</div>
