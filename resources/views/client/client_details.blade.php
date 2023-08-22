@extends('layouts.app')
@section('title',$client->name)

@section('content')
    <div class="container my-4">
        @include('partials._alerts')

        @if(auth("client")->id())
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card card-body card-custom card-stretch py-0">
                        @include('partials._menu_bar')

                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card card-custom mb-5">
                    <!--begin::Body-->
                    <div class="card-body pt-15">
                        <!--begin::User-->
                        <div class="mb-10">
                            <div class="symbol symbol-100 symbol-circle symbol-xl-150">
                                <div class="symbol-label border-light border border-2"
                                     style="background-image:url({{ $client->profile_photo_url }})"></div>
                            </div>
                            <h4 class="font-weight-bolder my-2">
                                {{ $client->name }}
                                @if($client->application->status===\App\Models\ApplicationBaseModel::APPROVED)
                                    <x-verified-icon classes="text-success"/>
                                @endif
                            </h4>
                            <div class="text-muted mb-2">
                                {{ $client->registrationType->description }} ({{ $client->type }})
                            </div>

                            <div class="mb-2">
                                Call:
                                <a href="tel:{{ $client->phone }}">
                                    {{ $client->phone }}
                                </a>
                            </div>
                            <div class="mb-2">
                                Email:
                                <a href="mailto:{{ $client->email }}">
                                    {{ $client->email }}
                                </a>
                            </div>

                            <p>
                                {{ optional($client->application)->bio }}
                            </p>
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="mb-10">

                        </div>
                    @if(auth('client')->id() && auth()->guard('client')->id() != $client->id)
                        @php
                            $existConnection=connectionExists($client->id);
                        @endphp
                        <!--end::Contact-->
                            <!--begin::Nav-->
                            @if(!$existConnection || optional($existConnection)->status==\App\Models\Connection::REJECTED)
                                <x-connect-button :item="$client" size="btn-sm" :show-icon="false" class="mt-4"/>
                            @elseif($existConnection->status==\App\Models\Connection::PENDING)
                                @if($existConnection->requester_id==auth("client")->id())

                                    <x-cancel-connection-request-button :item="$existConnection" class="mt-4"/>

                                @else

                                    <x-view-connection-request-button :item="$existConnection" size="btn-sm"
                                                                      text="View connection request" class="mt-4"/>

                                @endif
                            @elseif($existConnection->status==\App\Models\Connection::ACCEPTED)
                                <x-message-button :item="$client" class="mt-4"/>
                            @endif

                            {{--                            @if($client->ratings()->where("done_by_id","=",auth()->guard('client')->id())->count() <= 0)--}}
                            <button data-url="{{route("client.post.rating.request",encryptId($client->id))}}"
                                    type="button"
                                    data-rating="{{$client->ratingNumber}}"
                                    data-comment="{{$client->ratingComment}}"
                                    class="btn btn-sm btn-light-info rounded-pill font-weight-bolder btn-open-rating">

                                <span class="bi bi-star-fill"></span>
                                Rate
                            </button>
                        {{--                        @endif--}}
                    @endif

                        <x-rating-item-detail :client="$client"/>
                    </div>
                    <!--end::Body-->

                </div>


                @if($client->type==\App\Models\RegistrationType::iWorker)
                    {{--                    @include('partials._iworker_registration_details',['is_owner'=>false])--}}
                    <x-iworker-registration-details :model="$model" :editable="false"/>
                @elseif($client->type==\App\Models\RegistrationType::DSP)
                    <x-dsp-registration-details :model="$model" :editable="false"/>
                @elseif($client->type==\App\Models\RegistrationType::MSME)
                    <x-msme-registration-details :model="$model" :editable="false"/>
                @endif

            </div>

            <div class="col-md-4">
                <div class="flex-row-auto">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Body-->
                        <div class="card-body">
                            <h4 class="mb-5">Connections you may be interested in</h4>

                            @foreach($recommendations as $item)
                                <div class=" @if(!$loop->last) border-bottom border-bottom-light @endif py-2 my-3 mx-4">
                                    <x-client-item :item="$item"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@stop


@section("scripts")

@endsection
