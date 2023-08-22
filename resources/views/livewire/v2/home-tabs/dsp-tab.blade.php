<div class="row">
    <div class="col-12 h-20px">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div>{{ __('app.Please wait') }} ... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>

    <div class="col-lg-3"
         x-data="{ open: true }">
        @include('partials.v2._filter_by_title')
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
             id="accordion1">
            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse"
                         data-target="#collapse2">
                        <div class="card-label pl-4">
                             <span class="svg-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                      fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                                        </svg>
                            </span>
                            {{ __('client_registration.services')}}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="collapse2" class="collapse {{ count($selectedServices)>0?'show':'' }}"
                     data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="checkbox-list">
                            @foreach($services as $service)
                                <label class="checkbox checkbox-info" wire:key="service_key_id{{ $service->id }}">
                                    <input type="checkbox" value="{{ $service->id }}"
                                           wire:model="selectedServices"
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
                    <div class="card-title collapsed pr-3" data-toggle="collapse"
                         data-target="#collapse1">
                        <div class="card-label pl-4">
                             <span class="svg-icon">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </span>
                            {{ __('app.location') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="collapse1" class="collapse {{ $provinceId>0?'show':'' }}" data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        <div class="form-group form-group-sm mb-1">
                            <label for="province_id">{{ __('client_registration.province') }}</label>
                            <select wire:change="loadDistricts" wire:model="provinceId" name="province_id"
                                    id="province_id"
                                    class="form-control rounded">
                                <option value="0">-- {{ __('client_registration.choose') }} --</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm mb-1">
                            <label for="district_id">{{ __('client_registration.district') }}</label>
                            <select name="district_id"
                                    wire:change="loadSectors"
                                    wire:model="districtId" id="district_id" class="form-control rounded">
                                <option value="0">-- {{ __('client_registration.choose') }} --</option>
                                @foreach($districts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm mb-1">
                            <label for="sector_id">{{ __('client_registration.sector') }}</label>
                            <select name="sector_id" wire:model="sectorId" id="sector_id" class="form-control rounded">
                                <option value="0">-- {{ __('client_registration.choose') }} --</option>
                                @foreach($sectors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                <div class="card-header">
                    <div class="card-title collapsed pr-3" data-toggle="collapse"
                         data-target="#collapse3">
                        <div class="card-label pl-4">
                                                     <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                                    </svg>
                                        </span>
                            {{ __('app.business_sector') }}
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="collapse3" class="collapse {{ count($selectedBusinessSectors)>0?'show':'' }}"
                     data-parent="#accordion1">
                    <div class="card-body p-2 bg-white ">
                        {{-- <div class="p-2">
                             <input type="text" class="form-control form-control-sm"
                                    placeholder="Filter business sector" title="Filter business sector">
                         </div>--}}
                        <div class="p-2">
                            <div class="checkbox-list">
                                @foreach($businessSectors as $businessSector)
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


        </div>
    </div>

    <div class="col-lg-9">
        <div class="row  justify-content-center mb-5">

            <div class="col-md-12 " style="justify-content: center">
                @foreach(\App\Models\FeatureContent::where('tab','Tech Business')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
            </div>
        </div>

        <div>
            <div class="row my-4 justify-content-center">
                <div class="col-12">
                    <x-search-input wire:model.debounce.500ms="search"/>
                </div>
            </div>
            @foreach($clients as $item)
                @include('partials.includes._msme_dsp_item',['name'=>$item->application->dspRegistration->company_name??$item->name])
            @endforeach
            @include('partials.includes._pagination',['paginator'=>$clients])
        </div>


    </div>
</div>
