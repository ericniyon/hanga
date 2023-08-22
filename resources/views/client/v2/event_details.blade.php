@extends('client.v2.layout.app')

@section('title',"Event Details")

@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">
        <div>
            <div class="h-100px bg-light-light w-100 rounded-lg"></div>
            <div class="w-100 mt-n25" style="z-index: 2001;top: 20px;">
                <div
                    class="d-flex mt-5 flex-column flex-md-row align-items-start mb-9 pr-md-0  card card-body border-0 overflow-hidden"
                    style="background-color: rgba(255,255,255,0.1)">
                    <img
                        class="w-sm-200px w-100 h-sm-200px h-auto object-cover mr-0 mr-md-5 rounded-lg shadow-sm border"
                        src="{{ $event->getImage() }}" alt=""/>
                    <div class="d-flex flex-column flex-grow-1 mx-md-2 w-100">
                        <div class="d-flex justify-content-lg-between flex-lg-row flex-column">
                            <div class="font-weight-bold text-dark font-size-lg mb-1 font-size-h2">
                                {{ $event->title }}
                            </div>
                            @if($event->attachment)
                                <a href="{{ $event->getAttachment() }}" download target="_blank"
                                   class="btn btn-primary rounded border-2 my-2 w-md-150px w-100 text-white font-weight-boldest shadow float-md-right mr-md-20">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
  <path fill-rule="evenodd"
        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
        clip-rule="evenodd"/>
</svg>
                                </span>
                                    {{ __('client_registration.download') }}
                                </a>
                            @endif
                        </div>
                        <div class="d-flex">
                            <div class="text-muted mr-2">@lang('app.Organiser')</div>
                            <div class="text-dark mb-3 font-weight-bolder">
                                {{ $event->company }}
                            </div>
                        </div>
                        <div>
                            <span class="font-weight-bolder bg-light-success rounded-lg px-2 ">{{$event->type}}</span>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-4 my-2">
                                <div class="card shadow border-0 h-100">
                                    <div class="card-body p-2">
                                        <div class="d-flex flex-column h-100">
                                            <h5 class="font-weight-bolder text-dark">
                                            <span class="svg-icon text-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                            </span>
                                                {{ __('app.location') }}
                                            </h5>
                                            <div class="ml-6">
                                                <div>{{ $event->location }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="card shadow border-0 h-100">
                                    <div class="card-body p-2">
                                        <div class="d-flex flex-column h-100">
                                            <h5 class="font-weight-bolder text-dark">
                                            <span class="svg-icon text-info">
                                               <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 9H6V11H4V9ZM4 13H6V15H4V13ZM8 9H10V11H8V9ZM8 13H10V15H8V13ZM12 9H14V11H12V9ZM12 13H14V15H12V13Z"
                                                fill="black"/>
                                            <path
                                                d="M2 20H16C17.103 20 18 19.103 18 18V4C18 2.897 17.103 2 16 2H14V0H12V2H6V0H4V2H2C0.897 2 0 2.897 0 4V18C0 19.103 0.897 20 2 20ZM16 6L16.001 18H2V6H16Z"
                                                fill="#2A337E"/>
                                            </svg>
                                            </span>
                                                @lang('app.event_dates')
                                            </h5>
                                            <div class="ml-6">
                                                <div class="d-flex justify-content-between">
                                                    <span class="font-weight-bolder">@lang('app.start_date')</span>
                                                    <span class="font-weight-bolder">@lang('app.end_date')</span>
                                                </div>

                                                @foreach ($event->otherDates as $item)

                                                    <div class="d-flex justify-content-between my-1">
                                                        <span>
                                                            {{ optional($item->start_date)->format('M d , Y') }}
                                                        </span>
                                                        <span>{{optional($item->end_date)->format("M d , Y")}}</span>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="card shadow border-0 h-100">
                                    <div class="card-body p-2">
                                        <div class="d-flex flex-column  h-100">
                                            <h5 class="font-weight-bolder text-dark mb-0">
                                                <span class="svg-icon text-info">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                </span>
                                                @lang('auth.read_more')
                                            </h5>
                                            <div class="ml-6">
                                                <div class="d-flex justify-content-between my-3">
                                                    <span class="font-weight-bolder">@lang("app.price"):</span>
                                                    <span>
                                                            @if ($event->is_free)
                                                            {{ __('app.free') }}
                                                        @else
                                                            RWF {{ number_format($event->price) }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="bg-white shadow text-center p-5 text-info font-weight-bolder mb-5 rounded">
                    @lang("client_registration.more_details")
                </div>

                {!! $event->long_description !!}
            </div>
        </div>


    </div>




@stop
