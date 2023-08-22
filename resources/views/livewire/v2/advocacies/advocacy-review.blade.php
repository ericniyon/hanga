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
                <div class="card">
                    <div class="card-body">
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._my_connections')

                                </span>
                                Setttings
                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start hover:bg-blue-900">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._services')
                                </span>
                                <a href="{{ route('client.my_membership') }}" class="m-3">My Memberships</a>
                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._resources')
                                </span>
                                <a href="{{ route('client.my_advocacy') }}" class="m-3">Advocacy</a>

                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._my_connections')

                                </span>
                                Our Impacts
                            </h5>

                        </div>
                    </div>
                </div>



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
                    <ul class="nav nav-pills custom-navs justify-content-around mt-5" id="myTab" role="tablist"
                        style="background-color: white;padding: 1.3rem;">


                        <!--Put Search-->

                        <li class="nav-item-tab">
                            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'api') }}"
                                id="home-tab" style="margin-left: 70px;" data-toggle="tab" wire:click="$set('tab','api')"
                                href="#all" role="tab" aria-controls="home"
                                aria-selected="true">{{ __('My Advocacy') }}
                            </a>
                        </li>

                        <li class="nav-item-tab">
                            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'msme') }}"
                                id="profile-tab" data-toggle="tab" wire:click="$set('tab','msme')" href="#msmes"
                                role="tab" aria-controls="profile"
                                aria-selected="false">{{ __('Access to Finance') }}</a>
                        </li>

                        <li class="nav-item-tab">
                            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'dp') }}"
                                id="dp-tab" data-toggle="tab" wire:click="$set('tab','dp')" href="#dp" role="tab"
                                aria-controls="messages" aria-selected="false">
                                {{ __('Access to Market') }}
                            </a>
                        </li>

                        <li class="nav-item-tab">
                            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'opportunities') }}"
                                id="opportunities-tab" data-toggle="tab" wire:click="$set('tab','opportunities')"
                                href="#opportunities" role="tab" aria-controls="settings" aria-selected="false">
                                {{ __('Capacity Builiding') }}
                            </a>
                        </li>
                    </ul>
                    <!--begin::Body-->
                    <div class="tab-content" style="padding-top: 0px">

                        <div class="tab-pane {{ getActiveClass($tab, 'api') }}" id="all" role="tabpanel"
                            aria-labelledby="home-tab" style="border: none">

                            @if ($tab == 'api')
                                {{-- <livewire:v2.advocacies.my-advocacy/> --}}
                                <div class="row p-3">
                                    <h3 class="p-3" style="color: #2A337E; font-weight: 500">Back to Recent advocacy</h3>
                                </div>
                                <div class="row justify-between p-3">
                                    <div class="col-md-6">My Advocacy</div>
                                    <div class="col-md-6">
                                        <button class="btn btn-sm"
                                            style="float: right;background: #2A337E; color:#fff;border-radius:50px">Edit</button>
                                    </div>
                                </div>

                                <div class="row p-3">
                                    <div class="col-md-4">
                                        Advocacy/issues category
                                        <br>
                                        <br>

                                        <span class="rounded-lg px-5 py-3 mt-5" style="background: #F7F7F7">{{$advocacy->category}}</span>
                                    </div>
                                    <div class="col-md-4">TAGs

                                        <br>
                                        <br>

                                        <span class="rounded-lg px-5 py-3 mt-5" style="background: #F7F7F7">{{ $advocacy->tags }},</span>
                                    </div>
                                    <div class="col-md-4">Ccc
                                        <br>
                                        <br>

                                        <span class="rounded-lg px-5 py-3 mt-5" style="background: #F7F7F7">James</span>
                                    </div>
                                </div>
                                <div class="row p-5">
                                    <p>{{ $advocacy->description }}</p>
                                </div>

                                <div class="">
                                    <h3>Attachement</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                    </svg>Reference document
                                </div>
                                <div class="mt-5">
                                    <h3 class="mb-5">Status</h3>
                                    <span class="p-5 mt-5" style="background: #FFDBDB;">Return</span>
                                    <span class="p-5 mt-5" style="">Ihuzo</span>
                                </div>
                                <div class="p-5" style="background: #F4F4F4;border-radius: 5px; margin-top: 2rem">
                                    <p>Please and references regard to your claims.</p>
                                </div>
                                <div class="p-5" style="float: right">
                                    <button class="btn btn-sm btn-outline-primary" style="border-radius: 50px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                            <path
                                                d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z" />
                                        </svg>
                                        Reply </button>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane {{ getActiveClass($tab, 'msme') }}" id="msmes" role="tabpanel"
                            aria-labelledby="profile-tab" style="border: none">
                            @if ($tab == 'msme')
                                <livewire:v2.advocacies.accss-to-finance />
                            @endif
                        </div>

                        <div class="tab-pane {{ getActiveClass($tab, 'iworker') }}" id="iworkers" role="tabpanel"
                            aria-labelledby="settings-tab" style="border: none">
                            @if ($tab == 'iworker')
                                <livewire:v2.advocacies.access-to-market />
                            @endif
                        </div>

                        <div class="tab-pane {{ getActiveClass($tab, 'dp') }}" id="dp" role="tabpanel"
                            aria-labelledby="dp-tab" style="border: none">
                            @if ($tab == 'dp')
                                <livewire:v2.advocacies.capacity-builiding />
                            @endif
                        </div>



                    </div>

                    {{-- @include('partials/__memberships') --}}
                    <!--end::Body-->
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
