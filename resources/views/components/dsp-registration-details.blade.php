<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-md-flex align-items-center justify-content-between mb-2">
            <h4 class="font-weight-bolder">@lang('client_registration.business_identification')</h4>
            @if($editable)
                <x-edit-button data-toggle="modal" data-target="#editDspBusinessIdentification"/>
            @endif
        </div>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __("app.company") }}:</strong> <br>
                    <span>{{ $model->company_name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.company_categories") }}
                    </strong>
                    @forelse($application->categories as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.tin')}}:</strong>
                    <span>{{ $model->TIN }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.phone_number') }} :</strong>
                    <span>
                        <a href="tel:{{ $model->company_phone }}">{{ $model->company_phone }}</a>
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.company_email') }} :</strong>
                    <span>
                                        <a href="mailto:{{ $model->company_email }}">{{ $model->company_email }}</a>
                                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.registration_date') }} :</strong>
                    <span>{{ optional($model->registration_date)->toDateString() }}</span>
                </p>
            </div>
            @if($editable || $isPreview)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">{{ __('client_registration.rdb_certificate') }}</strong>
                        @if($model->rdb_certificate)
                            <a href="{{ route('dsp.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                               data-toggle="tooltip" title="{{__('client_registration.download')}}"
                               class="btn btn-sm btn-light-info rounded py-1 font-weight-bolder">
                                @include('partials.buttons._svg_download_icon')
                                <span class="d-none d-md-inline">
                                    {{__('client_registration.download')}}
                                </span>
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            @endif
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.number_of_employees') }} :</strong>
                    <span>{{ $model->number_of_employees }}</span>
                </p>
            </div>
            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">{{ __('app.business_sector') }}</strong>
                    @forelse($application->businessSectors as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>

            @if($editable || $isPreview)
                <div class="col-md-6">
                    <strong>{{ __('client_registration.brief_bio') }}</strong>
                    <p>
                        {{ optional($model->application)->bio }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

@include('partials._expertise_and_interests')

<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 d-flex">
            <span class="flex-grow-1">@lang('client_registration.company_address')</span>
            @if($editable)
                <x-edit-button data-toggle="modal" data-target="#editDspAddress"/>
            @endif
        </h4>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>@lang('client_registration.province'):</strong>
                    <span>{{ optional($model->province)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>@lang('client_registration.district'):</strong>
                    <span>{{ optional($model->district)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>@lang('client_registration.sector'):</strong>
                    <span>{{ optional($model->sector)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>@lang('client_registration.cell'):</strong>
                    <span>{{ optional($model->cell)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>@lang('client_registration.village'):</strong>
                    <span>{{ optional($model->village)->name??'N/A' }}</span>
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.website') }}:</strong>
                    <a href="{{ $model->website??'' }}"
                       target="_blank">{{ $model->website??'None' }}</a>
                </p>
            </div>


        </div>
    </div>
</div>

<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 d-flex">
            <span class="flex-grow-1">{{ __('app.company_representative_details') }}</span>
            @if($editable)
                <x-edit-button data-toggle="modal" data-target="#editDspRepresentative"/>
            @endif
        </h4>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.representative_name') }}:</strong>
                    <span>{{ $model->representative_name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.phone_number') }}:</strong>
                    <a href="tel:{{ $model->representative_phone }}">{{ $model->representative_phone }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.email') }}:</strong>
                    <a href="mailto:{{ $model->representative_email }}">{{ $model->representative_email }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.position') }}:</strong>
                    <span>{{ $model->representative_position }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.gender')}}:</strong>
                    <span>{{ $model->representative_gender }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.physical_disability') }}:</strong>
                    <span>{{ $model->representative_physical_disability??'N/A' }}</span>
                </p>
            </div>
        </div>
    </div>
</div>

@include('partials._certification_standards_card')

<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{ __("client_registration.projects_completed") }} ({{ $application->completedProjects->count() }})
            </h4>

            @if($application->canUpdateInfo && $editable)
                <button type="button"
                        class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                        id="addProjectButton">
                    @include('partials._plus_icon')
                    {{ __("client_registration.add_new") }}
                </button>
            @endif
        </div>
        <div class="accordion accordion-toggle-arrow rounded" id="accordionExample1">
            @forelse($application->completedProjects as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div class="card-title collapsed" data-toggle="collapse"
                             data-target="#collapseOne{{$item->id}}">
                            {{ $item->name }}
                        </div>
                    </div>
                    <div id="collapseOne{{$item->id}}" class="collapse"
                         data-parent="#accordionExample1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <strong>{{__("client_registration.name")}}:</strong>
                                        <span>{{ $item->client_name }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <strong>{{ __('app.from') }}:</strong>
                                        <span>{{ $item->start_date->toDateString() }}</span>,
                                        <strong>{{ __('app.to') }}:</strong>
                                        <span>{{ $item->end_date->toDateString() }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong class="d-block">{{ __('client_registration.description') }}</strong>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>

                            @if($application->canUpdateInfo && $editable)
                                <div class="d-flex align-items-center justify-content-start">
                                    <x-edit-button
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-description="{{ $item->description }}"
                                            data-client_name="{{ $item->client_name }}"
                                            data-start_date="{{ optional($item->start_date)->toDateString() }}"
                                            data-end_date="{{ optional($item->end_date)->toDateString() }}"
                                            classes="js-edit mr-4"/>

                                    <x-delete-button :href="route('client.projects.destroy',encryptId($item->id))"/>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                    {{ __('app.No Projects completed found') }}
                </div>
            @endforelse
        </div>

    </div>
</div>

<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">


        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{ __('client_registration.products') }} / {{ __("client_registration.solutions") }}
                ({{ $application->applicationSolutions->count() }})
            </h4>

            @if($application->canUpdateInfo && $editable)
                <button type="button"
                        class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                        id="addSolutionButton">
                    @include('partials._plus_icon')
                    {{ __("client_registration.add_new") }}
                </button>
            @endif
        </div>

        <div class="accordion accordion-toggle-arrow rounded" id="accordionExample2">
            @forelse($application->applicationSolutions as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div
                                class="card-title collapsed d-flex align-items-center justify-content-between"
                                data-toggle="collapse"
                                data-target="#collapse2{{$item->id}}">
                            <span>{{ $item->name }}</span>
                            <span
                                    class="label label-inline label-light-{{$item->typeColor}} rounded-xl d-block mr-10">{{ $item->type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{$item->id}}" class="collapse"
                         data-parent="#accordionExample2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong class="d-block">{{ __("client_registration.product") }}
                                        / {{ __('client_registration.solution') }} {{ __('client_registration.description') }}</strong>
                                    <p>{{ $item->description }}</p>
                                </div>

                            </div>

                            <strong class="font-weight-bolder d-block">{{ __("client_registration.platforms") }}</strong>
                            @foreach($item->platformTypes as $type)
                                <span class="label label-inline label-info rounded-pill mr-5">{{ $type->name }}</span>
                            @endforeach


                            @if($item->has_api)
                                <p>
                                    <strong>{{ __("client_registration.api_name") }}:</strong>
                                    <span>{{ $item->api_name }}</span>
                                </p>
                                <p>
                                    <strong>{{ __("client_registration.api_link") }}:</strong>
                                    <a href="{{ $item->api_link }}"
                                       target="_blank">{{ $item->api_link }}</a>
                                </p>
                                <p>
                                    <strong class="d-block">{{ __("client_registration.api_description") }}</strong>
                                    {{ $item->api_description }}
                                </p>

                            @endif
                            @if($application->canUpdateInfo && $editable)

                                <div class="d-flex align-items-center justify-content-start mt-4">

                                    <x-edit-button
                                            data-id="{{$item->id}}"
                                            data-type="{{$item->type}}"
                                            data-name="{{ $item->name }}"
                                            data-description="{{ $item->description }}"
                                            data-has_api="{{ $item->has_api }}"
                                            data-platforms="{{$item->platformTypes->pluck('id')}}"
                                            data-api_name="{{ $item->api_name }}"
                                            data-api_link="{{ $item->api_link }}"
                                            data-api_description="{{ $item->api_description }}"
                                            data-cp_name="{{ $item->dsp_name }}"
                                            data-cp_email="{{ $item->email }}"
                                            data-cp_phone="{{ $item->phone }}"
                                            classes="js-edit-solution mr-4"/>

                                    <x-delete-button :href="route('client.solutions.destroy',encryptId($item->id))"/>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                    {{ __("app.No products/solutions found") }}
                </div>
            @endforelse
        </div>

    </div>
</div>



<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">


        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{ __('client_registration.products') }} / {{ __("client_registration.solutions") }}
                ({{ $application->applicationSolutions->count() }})
            </h4>

            @if($application->canUpdateInfo && $editable)
                <button type="button"
                        class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                        id="addSolutionButton">
                    @include('partials._plus_icon')
                    {{ __("client_registration.add_new") }}
                </button>
            @endif
        </div>

        <div class="accordion accordion-toggle-arrow rounded" id="accordionExample2">
            @forelse($application->applicationSolutions as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div
                                class="card-title collapsed d-flex align-items-center justify-content-between"
                                data-toggle="collapse"
                                data-target="#collapse2{{$item->id}}">
                            <span>{{ $item->name }}</span>
                            <span
                                    class="label label-inline label-light-{{$item->typeColor}} rounded-xl d-block mr-10">{{ $item->type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{$item->id}}" class="collapse"
                         data-parent="#accordionExample2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong class="d-block">{{ __("client_registration.product") }}
                                        / {{ __('client_registration.solution') }} {{ __('client_registration.description') }}</strong>
                                    <p>{{ $item->description }}</p>
                                </div>

                            </div>

                            <strong class="font-weight-bolder d-block">{{ __("client_registration.platforms") }}</strong>
                            @foreach($item->platformTypes as $type)
                                <span class="label label-inline label-info rounded-pill mr-5">{{ $type->name }}</span>
                            @endforeach


                            @if($item->has_api)
                                <p>
                                    <strong>{{ __("client_registration.api_name") }}:</strong>
                                    <span>{{ $item->api_name }}</span>
                                </p>
                                <p>
                                    <strong>{{ __("client_registration.api_link") }}:</strong>
                                    <a href="{{ $item->api_link }}"
                                       target="_blank">{{ $item->api_link }}</a>
                                </p>
                                <p>
                                    <strong class="d-block">{{ __("client_registration.api_description") }}</strong>
                                    {{ $item->api_description }}
                                </p>

                            @endif
                            @if($application->canUpdateInfo && $editable)

                                <div class="d-flex align-items-center justify-content-start mt-4">

                                    <x-edit-button
                                            data-id="{{$item->id}}"
                                            data-type="{{$item->type}}"
                                            data-name="{{ $item->name }}"
                                            data-description="{{ $item->description }}"
                                            data-has_api="{{ $item->has_api }}"
                                            data-platforms="{{$item->platformTypes->pluck('id')}}"
                                            data-api_name="{{ $item->api_name }}"
                                            data-api_link="{{ $item->api_link }}"
                                            data-api_description="{{ $item->api_description }}"
                                            data-cp_name="{{ $item->dsp_name }}"
                                            data-cp_email="{{ $item->email }}"
                                            data-cp_phone="{{ $item->phone }}"
                                            classes="js-edit-solution mr-4"/>

                                    <x-delete-button :href="route('client.solutions.destroy',encryptId($item->id))"/>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                    {{ __("app.No products/solutions found") }}
                </div>
            @endforelse
        </div>

    </div>
</div>
