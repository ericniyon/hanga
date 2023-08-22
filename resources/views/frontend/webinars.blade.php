@extends('layouts.app')
@section('title',"Webinars")
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="container my-5">
        <h2 class="font-weight-bolder mb-5">
            Webinars & Workshops
        </h2>
        <div class="row">
            <livewire:webinar/>
            <div class="col-lg-4 sidebar-widgets">
                <div class="card card-body mb-5 border-0 shadow-sm">
                    <div class="mt-5">
                        <h4 class="popular-title">
                            {{__('app.recommendations')}}
                        </h4>
                        <div class="list-group list-group-flush">
                            @forelse($recommendations as $recommendation)

                            <div class="list-group-item px-0 d-flex flex-row align-items-center">
                                <img class="img-fluid h-50px w-50px object-cover img-thumbnail shadow-none border-light rounded-0 mr-2"
                                    src="{{$recommendation->getImage()}}" alt="">
                                <div class="details">
                                    <a href="{{ route('webinars.details',encryptId($recommendation->id)) }}"><h6>{{$recommendation->title}}</h6></a>
                                    <p>{{optional($recommendation->start_date)->format("j")}}<sup>{{optional($recommendation->start_date)->format("S")}}</sup> {{optional($recommendation->start_date)->format("F Y H:i A")}}</p>
                                </div>
                            </div>

                            @empty
                                <div class="alert alert-custom alert-notice alert-light-warning  rounded-0 mt-3">
                                    <div class="alert-text">
                                        {{__('app.no_recommendation')}}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- <div class="single-sidebar-widget newsletter-widget">
                        <h4 class="newsletter-title">{{__('app.newsletter')}}</h4>
                        <p>
                            {{__('app.newsletter_msg')}}
                        </p>
                        <form class="" action="">
                            <label for="email" class="sr-only">{{__('client_registration.email')}}</label>
                            <div class="input-group input-group-solid input-group-sm">
                                <input placeholder="{{__('client_registration.email_address')}}" name="email" id="email" type="email"
                                       class="form-control" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = '{{__('client_registration.email_address')}}'">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary font-weight-bolder text-white">
                                        {{__("app.subscribe")}}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="mt-4">
                            {{__('app.unsubscribe_msg')}}
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @livewireScripts
@stop

