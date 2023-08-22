<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h4 class="font-weight-bolder text-capitalize">{{ __('client_registration.business_identification') }}</h4>
            @if($application->canUpdateInfo && $editable)
                <x-edit-button data-toggle="modal" data-target="#editBizIdentificationModal"/>
            @endif
        </div>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.company_name") }}:</strong> <br>
                    <span>{{ $model->company_name }}</span>
                </p>
            </div>
            <div class="col-md-6">

                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.company_categories") }}
                    </strong>
                    @forelse($application->categories as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">{{ __("app.none") }}</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.tin") }}:</strong>
                    <span>{{ $model->tin }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.phone") }} :</strong>
                    <span><a href="tel:{{ $model->company_phone }}">{{ $model->company_phone }}</a></span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.email") }} :</strong>
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

            @if($editable || $review)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">{{__('client_registration.rdb_certificate')}}</strong>
                        @if($model->rdb_certificate)
                            <a href="{{ route('msme.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                               target="_blank" data-toggle="tooltip" title="{{__('client_registration.download')}}"
                               class="btn btn-sm btn-light-info rounded py-1 font-weight-bolder px-5">
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
                    <strong>{{ __("client_registration.number_of_employees") }} :</strong>
                    <span>{{ $model->number_of_employees }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">{{__('app.business_sector')}}</strong>
                    @forelse($application->businessSectors as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">{{ __("app.none") }}</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.which_payment_does_your_business_offer") }}
                    </strong>
                    @forelse($model->paymentMethods as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">
                            {{ __("app.none") }}
                        </span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("app.Digital platforms used to sell goods/services") }}
                    </strong>
                    @forelse($model->digitalPlatforms as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">
                            {{ __("app.none") }}
                        </span>
                    @endforelse
                </p>
            </div>


            @if($editable || $review)
                <div class="col-md-12">
                    <strong>{{ __("client_registration.brief_bio") }}</strong>
                    <p>
                        {{ optional($model->application)->bio }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

@include('partials._expertise_and_interests',['cardClasses'=>$cardClasses])

<div class="card gutter-b rounded  {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h4 class="font-weight-bolder text-capitalize">
                {{ __("client_registration.company_address") }}
            </h4>
            @if($application->canUpdateInfo && $editable)
                <x-edit-button data-toggle="modal" data-target="#EditCompanyAddressModal"/>
            @endif
        </div>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.province") }}:</strong>
                    <span>{{ $model->province->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.district") }}:</strong>
                    <span>{{ $model->district->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.sector") }}:</strong>
                    <span>{{ $model->sector->name ?? 'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.cell") }}:</strong>
                    <span>{{ $model->cell->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.village") }}:</strong>
                    <span>{{ $model->village->name??'N/A' }}</span>
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.website") }}:</strong>
                    <a href="{{ $model->website??'' }}"
                       target="_blank">{{ $model->website??'None' }}</a>
                </p>
            </div>


        </div>
    </div>
</div>

<div class="card gutter-b rounded  {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h4 class="font-weight-bolder text-capitalize">

                {{ __("app.company_representative_details") }}
            </h4>
            @if($application->canUpdateInfo && $editable)
                <x-edit-button data-toggle="modal" data-target="#editRepresentativeDetailsModal"/>
            @endif
        </div>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.representative_name") }}:</strong>
                    <span>{{ $model->representative_name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.phone") }}:</strong>
                    <a href="tel:{{ $model->representative_phone }}">{{ $model->representative_phone }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.email") }}:</strong>
                    <a href="mailto:{{ $model->representative_email }}">{{ $model->representative_email }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.position") }}:</strong>
                    <span>{{ $model->representative_position }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.gender") }}:</strong>
                    <span>{{ $model->representative_gender }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.physical_disability") }}:</strong>
                    <span>{{ $model->representative_physical_disability??'N/A' }}</span>
                </p>
            </div>
        </div>
    </div>
</div>

@include('partials._certification_standards_card')

<div class="card gutter-b rounded  {{ $cardClasses }}">
    <div class="card-body">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{ __("client_registration.products") }}
                / {{ __("client_registration.services") }} ({{ $application->applicationSolutions->count() }})
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

        <div class="accordion accordion-toggle-arrow" id="accordionExample2">
            @foreach($application->applicationSolutions as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div
                                class="card-title collapsed d-flex align-items-center justify-content-between"
                                data-toggle="collapse"
                                data-target="#collapse2{{$item->id}}">
                            <span>{{ $item->name }}</span>
                            <span
                                    class="label label-inline label-light-{{$item->typeColor}} rounded d-block mr-10">{{ $item->type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{$item->id}}" class="collapse"
                         data-parent="#accordionExample2">
                        <div class="card-body">

                            <div>
                                <strong class="d-block">{{ __("client_registration.description") }}</strong>
                                <p>{{ $item->description }}</p>
                            </div>
                            @if($application->canUpdateInfo && $editable)
                                <div class="d-flex align-items-center justify-content-start">
                                    <button type="button"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-type="{{ $item->type }}"
                                            data-description="{{ $item->description }}"
                                            data-toggle="tooltip" title="Edit"
                                            class="btn btn-sm btn-light-info js-edit rounded mr-4">
                                        @include('partials.buttons._edit_svg_icon')
                                    </button>
                                    <a href="{{ route('client.solutions.destroy',encryptId($item->id)) }}"
                                       data-id="{{ $item->id }}"
                                       data-name="{{ $item->name }}"
                                       data-type="{{ $item->type }}"
                                       data-description="{{ $item->description }}"
                                       data-toggle="tooltip" title="Delete"
                                       class="btn btn-sm btn-light-danger js-delete rounded">
                                        @include('partials.buttons._trash_svg_icon')
                                    </a>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
