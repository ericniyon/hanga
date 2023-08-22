<style>
    .tw-w-40 {
        width: 10rem !important;
        height: 10rem !important;
    }
</style>
<div class="row">

    <div class="col-12 h-20px">
        @include('partials.includes._small_loading')
    </div>
    <div class="col-lg-3" x-data="{ open: true }">
        @include('partials.v2._filter_by_title')
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion1">
            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#iworker_filter2">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                                </svg>
                            </span>
                            {{ __('client_registration.services') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="iworker_filter2" class="collapse {{ count($selectedServices) > 0 ? 'show' : '' }}"
                    data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="checkbox-list">
                            @foreach ($services as $service)
                                <label class="checkbox checkbox-info" wire:key="service_key_id{{ $service->id }}">
                                    <input type="checkbox" value="{{ $service->id }}" wire:model="selectedServices"
                                        class="check-services">
                                    {{ $service->nameLocale }}
                                    <span class="rounded-sm"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#iworker_filter1">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            {{ __('app.location') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="iworker_filter1" class="collapse {{ $provinceId > 0 ? 'show' : '' }}" data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="form-group form-group-sm mb-1">
                            <label for="province_id">Province</label>
                            <select wire:change="loadDistricts" wire:model="provinceId" name="province_id"
                                id="province_id" class="form-control rounded">
                                <option value="0">-- Select province --</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm mb-1">
                            <label for="district_id">
                                {{ __('client_registration.district') }}
                            </label>
                            <select name="district_id" wire:change="loadSectors" wire:model="districtId"
                                id="district_id" class="form-control rounded">
                                <option value="0">
                                    -- {{ __('client_registration.choose') }} {{ __('client_registration.district') }}
                                    --
                                </option>
                                @foreach ($districts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm mb-1">
                            <label for="sector_id">{{ __('client_registration.sector') }}</label>
                            <select name="sector_id" wire:model="sectorId" id="sector_id" class="form-control rounded">
                                <option value="0">
                                    -- {{ __('client_registration.choose') }} {{ __('client_registration.sector') }}
                                    --
                                </option>
                                @foreach ($sectors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#iworker_filter3">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                                </svg>
                            </span>
                            {{ __('app.business_sector') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="iworker_filter3" class="collapse {{ count($selectedBusinessSectors) > 0 ? 'show' : '' }}"
                    data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        {{-- <div class="p-2">
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Filter business sector" title="Filter business sector">
                        </div> --}}
                        <div class="p-2">
                            <div class="checkbox-list">
                                @foreach ($businessSectors as $businessSector)
                                    <label class="checkbox checkbox-info">
                                        <input type="checkbox" value="{{ $businessSector->id }}"
                                            wire:model="selectedBusinessSectors"
                                            wire:key="selectedBusinessSectors_{{ $businessSector->id }}"
                                            class="check-services">
                                        {{ $businessSector->nameLocale }}
                                        <span class="rounded-sm"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#iworker_filter4">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                </svg>
                            </span>
                            {{ __('app.area_of_interest') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="iworker_filter4" class="collapse {{ count($selectedInterests) > 0 ? 'show' : '' }}"
                    data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">

                        <div class="p-2">
                            <div class="checkbox-list">
                                @foreach ($areaOfInterests as $item)
                                    <label class="checkbox checkbox-info">
                                        <input type="checkbox" value="{{ $item->id }}"
                                            wire:model="selectedInterests" wire:loading.attr="disabled"
                                            wire:key="selectedInterests_{{ $item->id }}" class="check-services">
                                        {{ $item->nameLocale }}
                                        <span class="rounded-sm"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-9">
        <div class="row  justify-content-center mb-5">

            <div class="col-md-12 " style="justify-content: center">
                @foreach(\App\Models\FeatureContent::where('tab','iWorkers')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
            </div>
        </div>
        <div class="row my-4 justify-content-center">
            <div class="col-12">
                <x-search-input wire:model.debounce.500ms="search" />
            </div>
        </div>
        <div class="row">
            @foreach ($clients as $item)
                <div class="col-lg-12">
                    <div
                        class="d-flex mt-5 flex-column flex-md-row align-items-start mb-9 card border-0 overflow-hidden tw-shadow tw-p-4 tw-rounded-lg">
                        <img class="tw-w-40 tw-h-40 object-contain rounded-lg" src="{{ $item->profile_photo_url }}"
                            alt="">
                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mx-2">
                            <div class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                                {{ $item->application->iWorkerRegistration->name ?? $item->name }}
                            </div>


                            <p class="text-muted">
                                @forelse($item->application->categories??[] as $s)
                                    <span>
                                        {{ $s->name }}
                                        @if (!$loop->last)
                                            -
                                        @endif
                                    </span>
                                @empty
                                @endforelse
                            </p>
                            <p>
                                {{ str_limit($item->application->bio, 500) }}
                            </p>
                            <div class="d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <div>
                                            <span>{{ __('app.Rate') }}</span>
                                            <span class="font-weight-bolder">
                                                {{ number_format($item->ratings_count) }}
                                                {{ __('app.Reviews') }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="font-weight-boldest mr-2 h4 mb-0">
                                                {{ $item->ratingAverage() }} </div>
                                            <x-rating-item :client="$item" />
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="{{ route('v2.iworker.details', encryptId($item->id)) }}"
                                            class="btn btn-sm rounded btn-outline-info font-weight-boldest border-2">
                                            {{ __('app.View Details') }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
            @endforeach
        </div>


        @include('partials.includes._pagination', ['paginator' => $clients])
    </div>
</div>
