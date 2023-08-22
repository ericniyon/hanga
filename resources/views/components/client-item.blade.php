@php
    $existConnection=connectionExists($item->id);
@endphp
<div class="d-flex align-items-start mb-2">
    <!--begin::Symbol-->
    <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block">
        <img src="{{ $item->profile_photo_url }}" onerror="this.src='{{$item->defaultPhotoUrl}}'"
             class="h-80px w-80px object-cover align-self-center"
             alt="">
    </div>
    <!--end::Symbol-->
    <!--begin::Text-->
    <div class="d-flex flex-column flex-grow-1 mr-2">
        <a href="{{ route('v2.client.details',['client'=>encryptId($item->id),'from'=>url()->current()]) }}"
           class="font-weight-bolder text-dark-75 text-hover-info font-size-lg mb-1">
            {{ $item->clientName }}
            @if($item->application->status==\App\Models\ApplicationBaseModel::APPROVED)
                <span class="svg-icon text-info">
                    @include('partials.icons._verified')
                </span>
            @endif
            <small
                    class="badge rounded-pill badge-{{ $item->registrationType->getTypeColorAttribute() }} font-weight-bolder ml-3">{{ $item->registrationType->name }}</small>
        </a>
        @if($showClientName)
            <p class="tw-text-sm mb-0">
                {{ $item->name }}
            </p>
        @endif

        <p class="font-size-sm text-dark-75 mb-0">
            {{ str_limit($item->application->bio,200) }}
        </p>

        @if($item->application && count($item->application->businessSectors) > 0)
            <div>
                @foreach($item->application->businessSectors as $sector)
                    <small class="badge bg-info text-white  rounded m-1">
                        {{ $sector->name }}
                    </small>
                @endforeach
            </div>
        @endif
    </div>
    <!--end::Text-->
    @if(auth("client")->user())
        <div class="d-flex flex-column align-items-center flex-wrap">
            @if(!$existConnection || optional($existConnection)->status==\App\Models\Connection::REJECTED)
                <x-connect-button :item="$item" class="mt-4"/>
            @elseif($existConnection->status==\App\Models\Connection::PENDING)
                @if($existConnection->requester_id==auth("client")->id())
                    <x-cancel-connection-request-button :item="$existConnection" class="mt-4"/>
                @else
                    <x-view-connection-request-button :text="__('app.View')" :item="$existConnection" class="mt-4"/>
                @endif
            @elseif($existConnection->status==\App\Models\Connection::ACCEPTED)
                <x-message-button :item="$item" class="mt-4"/>
            @endif
        </div>
    @endif
</div>
