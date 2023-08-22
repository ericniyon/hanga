<button data-url="{{route("client.send.connection.request",encryptId($item->id))}}" type="button" data-toggle="modal"
        data-target="#connectModal"
        data-services="{{$item->application->services}}"
        class="btn btn-light-info rounded {{ $size }} font-weight-bolder btn-connect min-w-125px">
    @if($showIcon)
        <span class="svg-icon mr-0">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
             <path fill-rule="evenodd"
                   d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                   clip-rule="evenodd"/>
           </svg>
       </span>
    @endif
    {{ __("app.Connect") }}
</button>
