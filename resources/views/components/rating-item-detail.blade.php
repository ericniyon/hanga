<div>

    <a href="{{encryptId($client->id)}}"
       class="mt-4 d-flex text-dark text-hover-primary show-reviews">
        <div class="flex-grow-1">
            <span class="tw-text-xl tw-font-semibold">{{ __("app.Rating and reviews") }} ({{$client->ratings_count}})</span></div>
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
        </span>
    </a>
    <div class="d-flex mt-3 align-items-center">
        <div class="text-center">
            @php
                $average = $client->ratingAverage();
            @endphp
            <span style="font-size: 40px;font-weight: bold">{{number_format($average,1)}}</span>
            <div style="margin-top: -15px;">

                @include('partials.includes._rating_starts')
            </div>
        </div>
        <div class="flex-grow-1 ml-5">
            @for($i=5;$i>=1;$i--)
                <div class="d-flex align-items-center">
                    <span style="font-weight: bold">{{$i}}</span>
                    <div class="flex-grow-1 ml-2">
                        <div class="progress progress-xs bg-info-o-60">
                            <div class="progress-bar bg-info" role="progressbar"
                                 style="width: {{$client->countRating($i)}}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
