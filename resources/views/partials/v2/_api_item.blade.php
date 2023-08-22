<div class="p-4 custom-card-api-item mb-5 border-light">
    <div class="d-flex flex-column flex-md-row align-items-center">

        <div class="symbol symbol-80 mr-md-3 align-self-start">
            <img alt="Pic" src="{{ $api->logoUrl }}" class="object-contain rounded"/>
        </div>
        <div class="d-flex w-100 flex-column w-100">
            <div class="d-flex justify-content-between align-items-center">
                <span class="font-weight-boldest h4 text-info">{{$api->api_name ?? ''}}</span>
                <a href="{{ route('v2.apis.details',encryptId($api->id)) }}"
                   class="btn btn-outline-info btn-sm border-2 rounded">
                    {{ __("app.View Details") }}
                </a>
            </div>
            <span class="font-weight-bold badge badge-info align-self-start">
                    @if ($api->application_id)
                    {{optional(optional($api->application)->client)->name ?? ''}}
                @else
                    {{$api->dsp_name ?? ''}}
                @endif
                </span>
            {{--    <p class="mt-2">
                    <a href="{{$api->link ?? ''}}" target="_blank" style="word-break: break-all;" class="text-muted">
                        {{$api->api_link ?? ''}}
                    </a>
                </p>--}}
            <p>
                {{ str_limit($api->api_description,200) ?? ''}}
            </p>
            <div class="d-flex flex-column mt-2">
                @php
                    $average= round($api->ratings_avg_rating,2);
                @endphp
                <div class="d-flex">
                    <div class="d-flex flex-column mr-3">
                        <div class="font-weight-boldest h4  text-info tw-uppercase mb-0">{{ __("app.Rate") }}</div>
                        <div class="font-weight-boldest h3 text-info mb-0">
                            {{ $average }}
                        </div>
                    </div>
                    <div class="d-flex flex-column">

                        <div>@include('partials.includes._rating_starts')</div>
                        <div
                                class="font-weight-bolder"> {{ $api->ratings_count }}
                            {{ __("app.Reviews") }}
                        </div>
                    </div>
                </div>
                <div>


                </div>
            </div>
        </div>
    </div>
</div>
