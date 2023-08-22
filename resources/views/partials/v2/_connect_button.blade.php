@if(auth()->guard('client')->id() !=$item->id)

    @php
        $existConnection=connectionExists($item->id);
    @endphp

    @if(!$existConnection || optional($existConnection)->status==\App\Models\Connection::REJECTED)
        <button
                data-url="{{route("client.send.connection.request",encryptId($item->id))}}"
                type="button" data-toggle="modal"
                data-target="#connectModal"
                data-services="{{optional($item->application)->services??''}}"
                class="btn btn-outline-primary w-100 my-2 w-md-150px border-2 rounded shadow btn-connect">
            {{ __('app.Connect') }}
        </button>

    @elseif($existConnection->status==\App\Models\Connection::PENDING)
        @if($existConnection->requester_id==auth("client")->id())
            {{--                <x-cancel-connection-request-button :item="$existConnection" class="mt-4"/>--}}
            <a href="{{route("client.review.connection.request",["connection"=>encryptId($existConnection->id),"choice"=>encryptId(2)])}}"
               class="btn btn-danger w-100 my-2 w-md-150px border-2 rounded shadow btn-connect">
                {{ __('app.Cancel Request') }}
            </a>
        @else
            {{--        <x-view-connection-request-button :item="$existConnection" class="mt-4"/>--}}
        @endif
    @elseif($existConnection->status==\App\Models\Connection::ACCEPTED)
        <a href="{{route("client.my.messages",["client"=>encryptId($item->id??'0')])}}" type="button"
           class="btn btn-success w-100 my-2 w-md-150px border-2 rounded shadow btn-connect">
            {{ __('app.Message') }}
        </a>
    @endif


@endif
