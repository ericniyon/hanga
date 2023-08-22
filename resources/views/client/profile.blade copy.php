@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    {{-- @include('partials.includes._home_nav') --}}

    <style>
        .sideList {
            text-align: center;
            font-size: 1.3rem;
        }

        .sideList li {
            width: 400px;
            padding: 1.3rem;
            left: 0%;
            right: 0%;
            top: 0%;
            bottom: 83.33%;
        }

        .sideList li a {
            padding-bottom: 1.3rem;
            padding-left: 1.3rem;
            padding-top: 1.3rem;
            padding-right: 4rem;
            background: #ddd;
            background: #F8F8F8;
            border-radius: 32px;


        }



        .progressdiv {
            position: relative;
        }

        .progressdiv:after {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 25px;
            transform: translate(-50%, -50%);
            content: attr(data-percent) "%";
        }

        .progressBar {
            display: block;
            margin: 0 auto;
            overflow: hidden;
            transform: rotate(-90deg) rotateX(180deg);
        }

        .progressBar circle {
            stroke-dashoffset: 0;
            transition: stroke-dashoffset 1s ease;
            stroke: #2A337E;
            stroke-width: 5px;
        }

        .progressBar .bar {
            stroke: #fff;
        }
    </style>
    <div class="container-fluid tw-bg-gray-50">
        <div class="row" style="margin: auto 3rem">
            <div class="col-lg-3 my-5">

                @livewire('partials.side-nav')
                {{-- profiling --}}

                <div class="card shadow-none rounded border-0 mb-4 mt-5">

                    <!--begin::Body-->
                    <div class="card-body px-4 overflow-auto">
                        <h4 class="mb-3">
                            {{ __('app.Recent connection requests') }}
                        </h4>
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse($pendingRequest as $pending)
                                @php
                                    $requester = $pending->requester;
                                @endphp
                                <x-client-item :item="$requester" />
                            @empty
                                <div class="alert alert-custom alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __('app.There is no pending connection request available') }}
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <div class="card shadow-none rounded border-0 mb-4">
                    <div class="card-header p-4 border-bottom-0">
                        <h4 class="mb-0">
                            {{ __('app.Recent messages') }}
                        </h4>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse(recentMessage() as $message)
                                @php
                                    $amMessagingTo = amMessagingTo($message->id);
                                @endphp
                                @if ($amMessagingTo)
                                    <a href="{{ route(' client.my.messages', ['client' => encryptId($amMessagingTo->id ?? '0')]) }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{ optional($amMessagingTo)->name }}</h6>
                                                <p class="mb-1 small text-muted">{{ str_limit($message->message, 20) }}

                                                </p>
                                            </div>
                                            <small>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @endif
                            @empty
                                <div class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __('app.There is no recent messages') }}
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

                {{-- <x-profile-card :editable="true" classes="" :application="$application" /> --}}

            </div>


            {{-- <input type="hidden" value="{{ getClientFields() }}" id="progressValue"> --}}

            {{-- <div class="col-lg-9 my-5 mx-5">
                <div class="card shadow-none rounded border-0 mb-4">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="">
                            <span style=""> <span id="greeting" style="font-size: 1rem"></span> :
                                {{ auth('client')->user()->name }}

                                <div class="progressdiv" data-percent={{ getClientFields() }} style="float: right">
                                    <svg class="progressBar" width="120" height="120">
                                        <circle r="50" cx="58" cy="58" fill="transparent"
                                            stroke-dasharray="326" stroke-dashoffset="0"></circle>
                                        <circle class="bar" r="50" cx="58" cy="58"
                                            fill="transparent" stroke-dasharray="326" stroke-dashoffset="0"></circle>
                                    </svg>
                                </div>
                            </span>


                        </div>

                    </div>

                </div>

                <!--end::Body-->





                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-none rounded border-0 mb-4 mx-24">

                            <div class="card-body py-4 ">

                                <div class="">

                                    <div class="">
                                        <form action="{{ route('client.update.profile') }}" class="submit-form"
                                            enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                @csrf

                                                <div class="row justify-content-center align-items-center">
                                                    <div class="col-md-12" style="border:1px solid #2A337E; ">



                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="symbol symbol-100">
                                                                    <img src="{{ asset('storage/' . auth('client')->user()->profile_photo) ? asset('storage/' . auth('client')->user()->profile_photo) : auth('client')->user()->profile_photo_url }}"
                                                                        alt="" id="profile_photo_preview"
                                                                        class="img-fluid mt-5"
                                                                        style="  border-radius:100%;
                                                    border:solid #2A337E 2px ;
                                                    padding:5px;
                                                    width: 100px;
                                                    height: 100px;
                                                    ">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="custom-file" style="margin-top:4rem">
                                                                    <input type="file" name="profile_photo"
                                                                        class="custom-file-input"
                                                                        accept="image/png,image/jpeg" id="profile_photo">
                                                                    <label class="custom-file-label"
                                                                        for="profile_photo">Choose
                                                                        image</label>
                                                                </div>
                                                            </div>
                                                        </div>









                                                    </div>
                                                    <div class="col-md-12 pt-5">
                                                        <div class="form-group">
                                                            <label for="first_name">
                                                                {{ __('app.First Name') }}
                                                            </label>
                                                            <input type="text" class="form-control" name="first_name"
                                                                id="first_name"
                                                                value="{{ auth('client')->user()->first_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name">
                                                                {{ __('app.Last Name') }}
                                                            </label>
                                                            <input type="text" class="form-control" name="last_name"
                                                                id="last_name"
                                                                value="{{ auth('client')->user()->last_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name">
                                                                {{ __('User category') }}
                                                            </label>
                                                            <select class="form-control">
                                                                <option>--- Business Company ---</option>
                                                                <option></option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="last_name">
                                                                {{ __('Short Biography') }}
                                                            </label>
                                                            <textarea class="form-control" rows='3' cols=''>

                                                </textarea>
                                                        </div>

                                                        <div class=" ">
                                                            <button type="submit" class="btn btn-light-info bg-[#F5841F]"
                                                                style="background:#F5841F;
                                                padding:1rem 44px;widith:100%">
                                                                {{ __('client_registration.save_changes') }}
                                                            </button>
                                                            {{-- <a></a> --}
                                                            <a class="float-right text-[#000000]" type=""
                                                                data-dismiss="modal">
                                                                {{ __('Skip for  Now') }}
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>



    <!-- Modal -->
    {{-- <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ __('app.Update profile picture') }}
                    </h4>
                    @include('partials.includes._close_modal_button')
                </div>
                <form action="{{ route('client.update.profile') }}" class="submit-form" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4">
                                <div class="symbol symbol-100 rounded-0">
                                    {{-- <div class="symbol-label"
                                    style="background-image:url({{ asset('images/low_background.png') }})">

                                </div> --}
                                    <img src="{{ auth('client')->user()->profile_photo_url }}" alt=""
                                        id="profile_photo_preview" class="img-fluid w-100 h-100"
                                        style="object-fit: cover">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="first_name">
                                        {{ __('app.First Name') }}
                                    </label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        value="{{ auth('client')->user()->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">
                                        {{ __('app.Last Name') }}
                                    </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        value="{{ auth('client')->user()->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        {{ __('app.Profile picture') }}
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" name="profile_photo" class="custom-file-input"
                                            accept="image/png,image/jpeg" id="profile_photo">
                                        <label class="custom-file-label" for="profile_photo">Choose image</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-light-info rounded">
                                        {{ __('client_registration.save_changes') }}
                                    </button>
                                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                        {{ __('client_registration.close') }}
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@endsection


@section('scripts')
    @livewireScripts
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function() {
            readURL(this);
        });

        $('.submit-form').validate();
    </script>

    <script>
        function greeting() {
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

    <script>
        var totalProgress, progress;
        const circles = document.querySelectorAll('.progressBar');

        for (var i = 0; i < circles.length; i++) {
            totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
            progress = circles[i].parentElement.getAttribute('data-percent');

            console.log("totalProgress: ", totalProgress);
            console.log("progress: ", progress);

            circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 100;

        }
    </script>
@stop
