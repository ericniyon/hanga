@extends('layouts.app')
@section('title', 'Webinar details')

@section('content')
    <div class="container my-5">
        <h2 class="font-weight-bolder mb-5">
            {{ $webinar->title }}
        </h2>

        <div class="row">
            <div class="col-lg-8">
                <div class="card rounded mb-5 card-custom border-0">
                    <img src="{{$webinar->getImage() }}" class="card-img-top object-contain"
                        style='max-height:300px' alt="...">
                    <div class="card-body">
                        <div class="list-group mb-4">
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ __('app.company') }}: {{ $webinar->company }}</h5>
                                    <h5 class="font-weight-bolder">
                                        @if ($webinar->is_free)
                                            {{ __('app.free') }}
                                        @else
                                            RWF {{ $webinar->price }}
                                        @endif
                                    </h5>
                                </div>
                                <p class="mb-1">
                                    {{ __('app.location') }}: {{ $webinar->location }}
                                </p>
                                <p>
                                    {{ __('app.type') }}
                                    <small class="label label-light-info label-inline rounded-0 font-weight-bolder">
                                        {{ $webinar->type }}
                                    </small>
                                </p>

                            </div>
                        </div>

                        <p class="card-text">
                            {!! $webinar->long_description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class='position-sticky top-50px'>
                    <div class="card card-body mb-5 border-0">
                        <div class="text-center">
                            <h6>{{ __('app.event_dates') }}</h6>
                            <span class="badge badge-secondary mt-2 rounded-pill">
                                <span class="font-weight-bolder">{{ __('app.from') }}
                                    {{ optional($webinar->start_date)->format('j') }}<sup>{{ optional($webinar->start_date)->format('S') }}</sup>
                                    {{ optional($webinar->start_date)->format('F Y H:i A') }}</span>
                            </span>
                            <span class="badge badge-secondary mt-2 rounded-pill">
                                <span class="font-weight-bolder">{{ __('app.to') }}
                                    {{ optional($webinar->end_date)->format('j') }}<sup>{{ optional($webinar->end_date)->format('S') }}</sup>
                                    {{ optional($webinar->end_date)->format('F Y H:i A') }}</span>
                            </span>
                            @foreach ($webinar->otherDates as $item)
                                <hr>
                                <span class="badge badge-secondary mt-2 rounded-pill">
                                    <span class="font-weight-bolder">{{ __('app.from') }}
                                        {{ optional($item->start_date)->format('j') }}<sup>{{ optional($item->start_date)->format('S') }}</sup>
                                        {{ optional($item->start_date)->format('F Y H:i A') }}</span>
                                </span>
                                <span class="badge badge-secondary mt-2 rounded-pill">
                                    <span class="font-weight-bolder">{{ __('app.to') }}
                                        {{ optional($item->end_date)->format('j') }}<sup>{{ optional($item->end_date)->format('S') }}</sup>
                                        {{ optional($item->end_date)->format('F Y H:i A') }}</span>
                                </span>
                            @endforeach

                        </div>
                    </div>
                    <div class="card card-body mb-5 border-0">

                        <div class="mt-5">
                            <h4 class="popular-title">
                                {{ __('app.upcoming_events') }}
                            </h4>
                            <div class="list-group list-group-flush">
                                @forelse($upcomingEvents as $event)
                                    <div class="list-group-item px-0 d-flex flex-row align-items-center">
                                        <img class="img-fluid h-50px w-50px object-cover img-thumbnail shadow-none border-light rounded-0 mr-2"
                                            src="{{ route('get.image.webinars.path', $event->id) }}" alt="">
                                        <div class="details">
                                            <a href="{{ route('webinars.details', encryptId($event->id)) }}">
                                                <h6>{{ $event->title }}</h6>
                                            </a>
                                            <p>
                                                <span
                                                    class="font-weight-bolder">{{ optional($event->end_date)->format('j') }}<sup>{{ optional($event->end_date)->format('S') }}</sup>
                                                    {{ optional($event->end_date)->format('F Y H:i A') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-custom alert-notice alert-light-warning  rounded-0 py-2 mt-3">
                                        <div class="alert-text">
                                            {{ __('app.no_events') }}
                                        </div>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
