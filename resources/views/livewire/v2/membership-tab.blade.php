@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @include('partials.includes._home_nav')

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
    </style>
    <div class="container-fluid tw-bg-gray-50">
        <div class="row" style="margin: auto 3rem">
            <div class="col-lg-3 my-5">
                @livewire('partials.side-nav')



                {{-- company profile cards --}}

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
                                    <a href="{{ route('client.my.messages', ['client' => encryptId($amMessagingTo->id ?? '0')]) }}"
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

                <x-profile-card :editable="true" classes="" :application="$application" />
            </div>
            <div class="col-lg-9 my-5">
                <div class="card shadow-none rounded border-0 mb-4">

                    {{--  --}}
                </div>
                <div class="card shadow-none rounded-md border-0 mb-4" style="background: #E8EAFF">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="card-body py-4">
                                <h4 class="mb-4 font-weight-bolder">{{ __('Active Memberships') }}</h4>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae minima repellendus
                                    mollitia!</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row  mx-4">
                        <div class="row ">

                            {{-- @dump(auth('client')->user()->registration_type_id) --}}
                            {{-- @dump(App\Models\Client::all()) --}}


                            @forelse (App\Models\MembershipApplication::where('applicant_id', auth('client')->user()->id)->get() as $item)
                            @if ($item->packege_id != null)

                                @foreach (App\Models\MembershipPackege::where('id', $item->packege_id)->get() as $member)
                                @dump($member)
                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                    <!-- Card-->
                                    <div class="card rounded shadow-sm border-0">
                                        <div class="card-body p-2">
                                            <img src="{{ auth('client')->user()->profile_photo_url }}" alt=""
                                                class="d-block mx-auto mb-3 w-100">
                                            {{-- <p class="small">
                                                @forelse (App\Models\MembershipPackege::where('id', $item->packege_id)->get() as $packege_)
                                                @dump($packege_)
                                                @empty
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                                                @endforelse
                                            </p> --}}

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @endif


                                @empty
                                {{-- <p>No membership you have subscribed on yet !</p> --}}
                                <p class="px-4 text-bg-warning">You've not subscribed to any packege</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="card shadow-none rounded border-0 mb-4">

                    <!--begin::Body-->
                    <div class="card-body">
                        <h4 class="mb-4 font-weight-bolder">{{ __('All Memberships Services') }}</h4>

                        <div class="list-group list-group-flush">
                            <div class="alert alert-custom  alert-light-warning p-5  rounded ">
                                <div class="alert-text" style="color: #000000">
                                    Find all memberships of IHUZO partners and aggregators and choose best membership plan
                                    suit for you
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <livewire:search />
                            </div>
                            <div class="col-md-4 mt-5">
                                <select name="" id="" class="form-control shadow-sm rounded-lg align-center"
                                    style="height:42px !important">
                                    <option value="0">-- All --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @include('partials/__memberships')
                    <!--end::Body-->
                </div>




            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModal"
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
                                    {{--  <div class="symbol-label"
                                           style="background-image:url({{ asset('images/low_background.png') }})">

                                      </div> --}}
                                    <img src="{{ auth('client')->user()->profile_photo_url }}" alt=""
                                        id="profile_photo_preview" class="img-fluid w-100 h-100" style="object-fit: cover">
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
    </div>


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
@stop
