<button type="button" data-toggle="modal" data-target="#viewModal"
        data-accept_url="{{route("client.review.connection.request",["connection"=>encryptId($item->id),"choice"=>encryptId(1)])}}"
        data-ignore_url="{{route("client.review.connection.request",["connection"=>encryptId($item->id),"choice"=>encryptId(0)])}}"
        data-message="{{$item->request_comment}}"
        data-name="{{$item->requester->name}}"
        data-bio="{{$item->requester->application->bio,200}}"
        data-image_url="{{$item->requester->profile_photo_url}}"
        data-services="{{$item->services}}"
        class="btn {{ $size }} btn-light-info rounded font-weight-bolder btn-view-request-connection">{{ $text }}
</button>
