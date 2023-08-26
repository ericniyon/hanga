<div class="row">
    <div class="col-12">
        @include('partials.includes._small_loading')
    </div>

    <div class="col-lg-3">
        @include('partials.v2._filter_by_title')

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion1">
            <div class="card bg-light-light shadow-none rounded my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#platforms_types_id">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                            </span>
                            {{ __('app.platform_type') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                @php
                    $categories = \App\Models\StartupCategory::all();
                @endphp
                <div id="platforms_types_id" class="collapse {{ count($categories) > 0 ? 'show' : '' }}"
                    data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="checkbox-list">
                            @foreach ($categories as $category)
                                <label class="checkbox checkbox-info" wire:key="dp_key_id{{ $category->id }}">
                                    <input type="checkbox" value="{{ $category->id }}"
                                        wire:model="selectedPlatformTypes" />
                                    {{ $category->startup_category_name }}
                                    <span class="rounded-sm"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="card bg-light-light shadow-none rounded my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#specialities_filter">
                        <div class="card-label pl-4">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </span>
                            {{ __('app.Specialities') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="specialities_filter" class="collapse {{ count($selSpec) > 0 ? 'show' : '' }}"
                    data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="checkbox-list">
                            @foreach ($specialties as $item)
                                <label class="checkbox checkbox-info" wire:key="spec_key_id{{ $item->id }}">
                                    <input type="checkbox" value="{{ $item->id }}" wire:model="selSpec" />
                                    {{ $item->name }}
                                    <span class="rounded-sm"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>


    </div>
    <div class="col-lg-9">
        <div class="row my-4 justify-content-center mb-5">

            <div class="col-md-12 " style="justify-content: center">
                @foreach (\App\Models\FeatureContent::where('tab', 'Web/Mobile apps')->get() as $key => $content)
                    {!! $content->content !!}
                @endforeach
            </div>
        </div>
        <div class="row my-4 justify-content-center">
            <div class="col-12">
                <x-search-input wire:model.debounce.500ms="search" />
            </div>
        </div>

        @foreach ($digitalPlatforms as $item)
            @include('partials.v2._digital_platforms')
        @endforeach

        @include('partials.includes._pagination', ['paginator' => $digitalPlatforms])

    </div>
</div>
