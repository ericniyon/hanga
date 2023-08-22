<div class="mb-2 border-bottom border-light">
    <div class="d-flex align-items-center mb-2">
        <!--begin::Symbol-->
        <div>
            <div style="width: 50px;height: 50px;overflow: hidden" class="mr-5 d-flex align-items-center justify-content-center">
                <div class="symbol symbol-50 symbol-light symbol-circle">
                    <img src="{{ $item->profile_photo_url }}"  onerror="if (this.src !== 'error.jpg') this.src = '{{$item->defaultPhotoUrl}}';" class="h-50 align-self-center" alt="">
                </div>
            </div>
        </div>
        <!--end::Symbol-->
        <!--begin::Text-->
        <div class="flex-grow-1 mr-2">
            <div><a href="{{ route('client.details',['slug'=>$item->name_slug]) }}"
                    class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                    {{ $item->name }}
                </a></div>
            <div>
                <span class="text-muted font-weight-bold">
                            {{ $item->application->bio ??'' }}
                        </span>
            </div>
            <div class="mt-1"><span class="badge badge-primary rounded-lg">{{$item->registrationType->name??''}}</span>
            <span class="ml-2">

                                            @for($x=0;$x<5;$x++)
                    @if($x<3)
                        <span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\General\Star.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    @else
                        <span class="svg-icon svg-icon-primary svg-icon-sm"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\General\Half-star.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    @endif
                @endfor
            </span>
            </div>
        </div>
        <!--end::Text-->
        <div>
            <a href="" class="btn btn-sm btn-light-primary rounded-xl  font-weight-bolder d-flex">
                            <span class="svg-icon mr-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                  <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </span>
                Connect
            </a>
        </div>

    </div>
</div>
