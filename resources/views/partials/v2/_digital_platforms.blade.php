<div
        class="d-flex flex-column flex-md-row align-items-md-start mb-9 card tw-rounded-lg p-2 border-0 overflow-hidden  tw-shadow">
    <div class="symbol symbol-100 w-100px mr-md-3 d-none d-md-inline-block">
        <img alt="Logo" class="rounded-lg tw-object-contain" src="{{ $item->logoUrl }}"/>
    </div>

    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <div class="d-flex justify-content-md-between flex-column flex-md-row">
            <div class="d-flex flex-column">
                <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h3">{{ $item->name }}</span>
                <span class="badge badge-info rounded font-weight-bold align-self-start">
             @if ($item->application )
                        <a class="text-white"
                           href="">
                    {{optional(optional($item->application)->client)->name}}
                            @if(optional($item->application)->status==\App\Models\ApplicationBaseModel::APPROVED)
                                <span
                                        class="svg-icon svg-icon-1x ml-2 text-primary">@include('partials.icons._verified')</span>
                            @endif
                </a>
                        {{--                <x-rating-item :client="optional($item->application)->client"/>--}}
                    @else
                        {{$item->dsp_name??'N/A'}}
                    @endif

            </span>
            </div>
            <div class="d-none d-md-block">
                @include('partials.v2._dp_details_button')
            </div>
        </div>
        <p class="my-1">
            {{ str_limit($item->description) }}
        </p>
        <div>
            @foreach($item->specialties as $specialty)
                <span class="badge bg-light-info text-info rounded my-1">{{$specialty->name}}</span>
            @endforeach
        </div>
        <div class="my-1">
            @forelse ($item->platformTypes as $platform)
                @if($platform->pivot->link)
                    <a class="font-weight-bolder text-info" href="{{$platform->pivot->link}}" target="_blank">
                        {{$platform->name}} {{!$loop->last ? ' | ':' '}}
                    </a>
                @else
                    <span>
                        {{$platform->name}} {{!$loop->last ? ' | ':' '}}
                    </span>
                @endif
            @empty

            @endforelse

        </div>
        {{-- <div class="d-flex flex-column mt-2">
            @php
                $average= round($item->ratings_avg_rating,2);
            @endphp
            <div class="d-flex">
                <div class="mr-2">
                    <span>{{ __('app.Rate') }}</span>
                    <div class="font-weight-boldest h4 mb-0">{{ $average }}</div>
                </div>
                <div class="font-weight-bolder">
                    {{ $item->ratings_count }}  {{ __('app.Reviews') }}
                </div>
            </div>
            <div>
                @include('partials.includes._rating_starts')
            </div>
        </div> --}}

        <div class="d-flex row">
            <div class="d-flex flex-column col-md-6">
                @php
                $average= round($item->ratings_avg_rating,2);
            @endphp
                <span>{{ __('iHuzo rating & Review') }}</span>
                <div class="d-flex">

                    @include('partials.includes._rating_starts')
                    <div class="font-weight-bolder ml-2">
                        {{ $item->ratings_count }}  {{ __('app.Reviews') }}
                    </div>
                </div>

            </div>
            <div class="d-flex flex-column col-md-6">
                <span>{{ __('Google rating & Reviews') }}</span>
                <div class="d-flex">
                    {{-- <div class="mr-2"> --}}

                    {{-- <div class="font-weight-boldest h4 mb-0">
                        {{ $item->ratingAverage() }}
                    </div> --}}
                    {{-- <br>
                </div> --}}
                    <x-google-ratings  />
                    {{-- @include('partials.includes._rating_starts') --}}
                    <div class="font-weight-bolder ml-2">
                        {{-- @dump(\App\Models\GoogleRevers::where('google_rating',$item->id)->count()) --}}

                        {{-- @forelse (\App\Models\GoogleRatings::where('client_id', $item->id)->get() as $item)
                        {{ number_format(\App\Models\GoogleRevers::where('google_rating',$item->id)->count()) }} {{ __('app.Reviews') }}
                        @empty
                        @endforelse --}}
                        {{ number_format(0) }} {{ __('app.Reviews') }}
                    </div>
                </div>

            </div>
        </div>
        <div class="d-md-none">
            @include('partials.v2._dp_details_button')
        </div>

    </div>
    <!--end::Title-->
</div>
