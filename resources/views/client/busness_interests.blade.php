@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @include('partials.includes._home_nav')

    <style>
        .sideList{
            text-align: center;
            font-size: 1.3rem;
        }
        .sideList li{
            width: 400px;
            padding: 1.3rem ;
            left: 0%;
            right: 0%;
            top: 0%;
            bottom: 83.33%;
        }
        .sideList li a{
            padding-bottom: 1.3rem;
            padding-left: 1.3rem;
            padding-top: 1.3rem;
            padding-right: 4rem;
            background: #ddd;
            background: #F8F8F8;
            border-radius: 32px;


        }
    </style>
    <div class="container-fluid tw-bg-gray-50" >
        <div class="row" style="margin: auto 3rem">
            <div class="col-lg-3 my-5">

                @livewire('partials.side-nav')
            {{-- profiling --}}

                <div class="card shadow-none rounded border-0 mb-4 mt-5">

                    <!--begin::Body-->
                    <div class="card-body px-4 overflow-auto">
                        <h4 class="mb-3">
                            {{ __("app.Recent connection requests") }}
                        </h4>
                        <div class="list-group list-group-flush rounded-bottom">
                            {{-- @forelse($pendingRequest as $pending)
                                @php
                                    $requester=$pending->requester;
                                @endphp
                                <x-client-item :item="$requester"/>
                            @empty
                                <div class="alert alert-custom alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __("app.There is no pending connection request available") }}
                                    </div>
                                </div>
                            @endforelse --}}

                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <div class="card shadow-none rounded border-0 mb-4">
                    <div class="card-header p-4 border-bottom-0">
                        <h4 class="mb-0">
                            {{ __("app.Recent messages") }}
                        </h4>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse(recentMessage() as $message)
                                @php
                                    $amMessagingTo=amMessagingTo($message->id)
                                @endphp
                                @if($amMessagingTo)
                                    <a href="{{route("client.my.messages",["client"=>encryptId($amMessagingTo->id??'0')])}}"
                                       class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{optional($amMessagingTo)->name}}</h6>
                                                <p class="mb-1 small text-muted">{{ str_limit($message->message,20) }}

                                                </p>
                                            </div>
                                            <small>{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</small>
                                        </div>
                                    </a>
                                @endif
                            @empty
                                <div class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __("app.There is no recent messages") }}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @include('partials._your_dashboard')
                        </div>
                    </div>
                    <!--end::Body-->
                </div>

                {{-- <x-profile-card :editable="true" classes="" :application="$application"/> --}}

            </div>




            <div class="col-lg-9 my-5 mx-5">
                <div class="card shadow-none rounded border-0 mb-4">
                    <!--begin::Body-->
                    <div class="card-body">
                       <div class="">
                        <span> <span id="greeting" style="font-size: 1rem"></span> : {{ auth('client')->user()->name }}</span>
                       </div>
                       <div class="py-2"><h3>Complete Profile</h3></div>
                    </div>

                    <!--end::Body-->
                </div>

                <div class="card shadow-none rounded border-0 mb-4">

                    <div class="card-body py-4">

                        <div class="pb-5" data-wizard-type="step-content">

                                    <div class="my-3">
                                        <h3 class="font-weight-bold text-dark">
                                            @lang('app.expertise_Interests')
                                        </h3>

                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('partials._group_area_of_interests')
                                            </div>

                                            <div class="col-md-12">
                                                <h4>@lang('client_registration.area_of_expertise')</h4>
                                                <div class="form-group">

                                                    <div class="row">
                                                        @foreach($supportServices as $item)
                                                            <div class="col-md-4 my-1">
                                                                <label class="checkbox checkbox-info">
                                                                    <input type="checkbox"
                                                                           {{in_array($item->id,$selected_supports) ? 'checked' : ''}} name="support_service_id[]"
                                                                           value="{{$item->id}}"
                                                                           id="support_service_id{{$item->id}}">
                                                                    {{$item->name}}
                                                                    <span class="rounded-0"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <button type="submit" id="js-submit-application"
                            class="btn btn-primary font-weight-bolder text-uppercase rounded btn-sm js-submit-button"
                            data-wizard-type="action-submit">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            @lang('Update')
                        </button>

                                    </div>
                                </div>
                    </div>
                </div>


            </div>

        </div>
    </div>






@endsection


@section('scripts')
    @livewireScripts
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function () {
            readURL(this);
        });

        $('.submit-form').validate();
    </script>

    <script>
        function greeting(){
            var myDate = new Date();
            var hrs = myDate.getHours();

            var greet;

            if (hrs < 12)
                greet = 'Good Morning';
            else if (hrs >= 12 && hrs <= 17)
                greet = 'Good Afternoon';
            else if (hrs >= 17 && hrs <= 24)
                greet = 'Good Evening';
            document.getElementById('greeting').innerHTML = greet
            }
            greeting()
    </script>
@stop
