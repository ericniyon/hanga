<div
        class="d-flex flex-column flex-md-row mb-5 align-items-center mb-9 tw-rounded-lg tw-shadow border-0 p-5">

    <div class="symbol symbol-150 mr-3 w-150px">
        <img alt="Event image" src="{{$event->getImage()}}" class="object-contain rounded-lg shadow-sm"/>
    </div>
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span
                class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
           {{$event->title}}
        </span>
        <div class="d-flex">
            <span class="text-muted mr-2">
                {{ __('app.Organiser') }}
            </span>
            <span class="font-weight-bolder">
                {{ $event->company }}
            </span>
        </div>
        <h6 class="font-weight-bolder my-2 text-warning">{{$event->type}}</h6>
        <p class="text-dark-75 font-weight-bolder">
            {{$event->short_description}}
        </p>

        <div class="d-flex align-items-center">
            <div class="mr-2">
                   <span class="svg-icon svg-icon-2x text-info">
                       <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4 9H6V11H4V9ZM4 13H6V15H4V13ZM8 9H10V11H8V9ZM8 13H10V15H8V13ZM12 9H14V11H12V9ZM12 13H14V15H12V13Z"
      fill="black"/>
<path
        d="M2 20H16C17.103 20 18 19.103 18 18V4C18 2.897 17.103 2 16 2H14V0H12V2H6V0H4V2H2C0.897 2 0 2.897 0 4V18C0 19.103 0.897 20 2 20ZM16 6L16.001 18H2V6H16Z"
        fill="#2A337E"/>
</svg>

                   </span>
            </div>
            <div class="d-flex flex-column align-items-center">
                <span class="text-dark-50">
                    @foreach($event->otherDates as $otherDate)
                        {{optional($event->start_date)->format("d M Y")}}
                        -
                        {{optional($event->end_date)->format("d M Y")}}
                        @if(!$loop->last)
                            <span class="tw-font-bold tw-text-blue-700 tw-mx-2">|</span>
                        @endif
                    @endforeach
                </span>
            </div>
        </div>
    </div>
    <!--end::Title-->
    <div class="w-100 w-md-auto">
        <a href="{{ route('v2.event.details',encryptId($event->id)) }}"
           class="btn btn-outline-primary rounded border-2 my-2 w-100 w-md-150px  font-weight-boldest text-hover-white">
            {{ __('app.View Details') }}
        </a>
    </div>
</div>
