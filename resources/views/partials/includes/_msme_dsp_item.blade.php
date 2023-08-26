<div
    class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
    {{-- @php
        $google_rating_id;
    @endphp --}}
    <img class="w-md-125px w-100 h-125px object-contain align-self-start mr-md-2 rounded-lg shadow-sm"
        src="{{ Storage::disk('logos')->url($item->logo) }}" alt="">
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
            {{ $name }}
            {{-- @if (optional($item->application)->status == \App\Models\ApplicationBaseModel::APPROVED)
                <span class="svg-icon ml-2 text-primary">
                    @include('partials.icons._verified')
                </span>
            @endif --}}
        </span>
        {{--                    <span class="badge badge-info rounded-lg font-weight-bold align-self-start">Software Development</span> --}}


        @if ($item)
            <div>

                <span class="badge badge-info rounded-lg font-weight-bold align-self-start m-1">
                    {{ \App\Models\StartupCategory::where('id', $item->category_id)->pluck('startup_category_name')->first() }}
                </span>
            </div>
        @endif
        <p>
            {{ str_limit(optional($item->bio)->bio, 200) }}
        </p>
        <div class="d-flex row">
            <div class="d-flex flex-column col-md-6">
                <span>{{ __('iHuzo rating & Review') }}</span>
                <div class="d-flex">
                    {{-- <div class="mr-2"> --}}

                    {{-- <div class="font-weight-boldest h4 mb-0">
                        {{ $item->ratingAverage() }}
                    </div> --}}
                    {{-- <br>
                </div> --}}
                    {{-- <x-rating-item :client="$item" /> --}}
                    <div class="font-weight-bolder ml-2">
                        {{ number_format($item->ratings_count) }} {{ __('app.Reviews') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::Title-->
    <div class="w-md-150px w-100">
        <a href="{{ route('v2.client.details', encryptId($item->id)) }}"
            class="btn btn-outline-info rounded border-2 my-2 w-md-150px w-100">
            {{ __('app.View Details') }}
        </a>
        @if (auth('client')->check())
            <button type="button" class="btn btn-outline-primary rounded border-2 my-2 w-md-150px w-100">
                Connect
            </button>
            @include('partials.v2._connect_button', ['item' => $item])
        @endif
    </div>
</div>
