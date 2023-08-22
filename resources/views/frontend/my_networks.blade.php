@extends('client.v2.layout.app')
@section('title',"Connections")
@section('styles')
    @livewireStyles
@endsection

@section('content')

    @include('partials.includes._home_nav')

    <div class="container my-5">

        <div class="row">
            <div class="col-md-3 mb-4 mb-md-0">
                {{-- @include('affiliates.includes.sidebar') --}}
            <livewire:v2.affiliates.sidebar >
            </div>
            <div class="col-md-9 mb-4 mb-md-0">
                <div class="card card-custom shadow-sm border rounded-0 gutter-b">
                    <div class="card-header bg-light-light border-bottom-0 p-0 min-h-auto border-light-light rounded-0">
                        <div class="card-title my-0">
                            <h4 class="mb-0 px-4 py-2">
                                {{ __("app.Invitations") }}
                            </h4>
                        </div>

                        <ul class="connection-tab nav nav-tabs p-0 nav-tabs-line">
                            <li class="nav-item tw-mx-0">
                                <a class="nav-link tw-mx-0 tw-w-32 justify-content-center px-4 rounded-0 tw-border-0 active"
                                   data-toggle="tab" href="#kt_tab_pane_1">
                                    {{ __("app.Received") }}
                                </a>
                            </li>
                            <li class="nav-item tw-mx-0">
                                <a class="nav-link tw-mx-0 tw-w-32 justify-content-center px-4  px-3 rounded-0 tw-border-0"
                                   data-toggle="tab" href="#kt_tab_pane_2">
                                    {{ __("app.Sent") }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body pt-0">
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel"
                                 aria-labelledby="kt_tab_pane_2">
                                <div class="list-group list-group-flush rounded-bottom">
                                    @forelse($pendingRequests as $item)
                                        @php
                                            $requester=$item->requester;
                                        @endphp

                                        <div class="list-group-item px-0 border-bottom-light-light">
                                            @php
                                                $existConnection=connectionExists($requester->id);
                                            @endphp
                                            <div class="d-flex flex-column flex-md-row align-items-start mb-2 alert alert-notice alert-custom alert-light-primary tw-rounded-md bg-white shadow tw-border-l-8">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                                                    <img src="{{ $requester->profile_photo_url }}"
                                                         onerror="this.src='{{$requester->defaultPhotoUrl}}'"
                                                         class="h-80px w-80px object-cover align-self-center"
                                                         alt="">
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Text-->
                                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <a href="{{ route('v2.client.details',['client'=>encryptId($requester->id),'from'=>url()->current()]) }}"
                                                       class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">
                                                        {{ $requester->clientName }}
                                                        @if($requester->application->status==\App\Models\ApplicationBaseModel::APPROVED)
                                                            <span class="svg-icon text-info">
                                                                @include('partials.icons._verified')
                                                            </span>
                                                        @endif
                                                        <small
                                                                class="label label-inline rounded label-info font-weight-bolder ml-3">{{ $requester->registrationType->name }}</small>
                                                    </a>

                                                    <p class="font-size-sm text-dark-75 mb-0">
                                                        {{ str_limit($requester->application->bio,200) }}
                                                    </p>

                                                    @if($requester->application && count($requester->application->businessSectors) > 0)
                                                        <div>
                                                            @foreach($requester->application->businessSectors as $sector)
                                                                <small
                                                                        class="badge bg-light-info text-info  rounded m-1">
                                                                    {{ $sector->name }}
                                                                </small>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @php
                                                        $average=round($item->ratings_avg_rating,1);
                                                    @endphp
                                                    <div>
                                                        <div>
                                                            <span class="text-info h5 mr-2">Rate</span>
                                                            <span
                                                                    class="font-weight-bolder text-dark">
                                                               {{ $item->ratings_count }} {{ str_plural('Review',$item->ratings_count) }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span
                                                                    class="text-info h5 font-weight-bolder mr-2">{{ $average }}
                                                            </span>

                                                            @include('partials.includes._rating_starts')
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Text-->
                                                @if(auth("client")->user())
                                                    <div class="d-flex flex-column align-items-md-end  w-md-200px">
                                                        @if(!$existConnection || optional($existConnection)->status==\App\Models\Connection::REJECTED)
                                                            <x-connect-button :item="$requester" class="mt-4"/>
                                                        @elseif($existConnection->status==\App\Models\Connection::PENDING)
                                                            @if($existConnection->requester_id==auth("client")->id())
                                                                <x-cancel-connection-request-button
                                                                        :item="$existConnection" class="mt-4"/>
                                                            @else
                                                                <x-view-connection-request-button
                                                                        :item="$existConnection" :text="__('app.View Details')"
                                                                        class="mt-4"/>
                                                            @endif
                                                        @elseif($existConnection->status==\App\Models\Connection::ACCEPTED)
                                                            <x-message-button :item="$requester" class="mt-4"/>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    @empty
                                        <div
                                                class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                                            <div class="alert-text">
                                                {{ __("app.There is no pending connection request available") }}
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel"
                                 aria-labelledby="kt_tab_pane_2">
                                <div class="list-group list-group-flush rounded-bottom">
                                    @forelse($sentRequests as $sent)
                                        @php
                                            $friend=$sent->friend;
                                        @endphp
                                        @if(is_null($friend))
                                            @continue
                                        @endif

                                        <x-client-item :item="$friend"/>
                                    @empty
                                        <div
                                                class="alert alert-custom alert-light-warning p-5  rounded m-3">
                                            <div class="alert-text">
                                                {{ __('app.There is no pending connection request available') }}
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:my-connections/>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @livewireScripts
@stop
