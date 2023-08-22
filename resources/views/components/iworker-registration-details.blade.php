<div class="card gutter-b rounded {{$cardClasses}}">
    <div class="card-body">
        <div class="mb-4 d-md-flex align-items-center justify-content-between">
            <h4 class="font-weight-bolder">
                {{ __("client_registration.individual") }}
                /
                {{ __("client_registration.company_identification") }}
            </h4>
            @if($application->canUpdateInfo && $editable)
                <x-edit-button data-toggle="modal" data-target="#editCompanyInfoModal">
                    @include('partials.buttons._edit_svg_icon')
                </x-edit-button>
            @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.type") }}:</strong>
                    <span>{{ __("app.".$model->iworker_type) }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.name") }}:</strong>
                    <span>{{ $model->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.id_type')}}:</strong>
                    <span>{{ $model->id_type }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.id_number')}}:</strong>
                    <span>{{ $model->id_number }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.phone') }} :</strong>
                    <span><a href="tel:{{ $model->phone }}">{{ $model->phone }}</a></span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.email') }} :</strong>
                    <a href="mailto:{{ $model->email }}">{{ $model->email }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.website')}} :</strong>
                    <a href="{{ $model->website }}">{{ $model->website??'N/A' }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__('client_registration.portfolio_link')}} :</strong>
                    <a href="{{ $model->portfolio_link }}">{{ $model->portfolio_link??'N/A' }}</a>
                </p>
            </div>

            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{__("app.categories")}}
                    </strong>
                    @forelse($application->categories as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>

            @if($model->iworker_type==\App\Constants::Company)
                <div class="col-md-6">
                    <p>
                        <strong>{{ __("client_registration.registration_date") }} :</strong>
                        <span>{{ $model->comp_date_of_registration->toDateString() }}</span>
                    </p>
                </div>
                @if($editable || $review)
                    <div class="col-md-6">
                        <p class="d-flex align-items-center">
                            <strong class="mr-4">
                                {{ __("client_registration.rdb_certificate") }}
                            </strong>
                            @if($model->rdb_certificate)
                                <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-light-info rounded py-2 px-5">
                                    @include('partials.buttons._svg_download_icon')
                                    {{ __('client_registration.download') }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                @endif

            @else
                <div class="col-md-6">
                    <p>
                        <strong>{{ __("client_registration.date_of_birth") }}:</strong>
                        <span>{{ $model->dob ? $model->dob->toDateString() : 'N/A' }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>{{ __("client_registration.gender") }}:</strong>
                        <span>{{ $model->gender }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong>{{ __("client_registration.physical_disability") }}:</strong>
                        {{ $model->physicalDisability->name??'N/A' }}
                    </p>
                </div>

                <div class="col-md-12">
                    <div class="card card-body p-3 my-3">
                        <h4 class="font-weight-bolder mb-4">{{ __('app.qualification') }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <strong>{{ __("client_registration.level_of_study") }}:</strong>
                                    <span>{{ optional($model->studyLevel)->name }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>{{ __("client_registration.field_of_study") }}:</strong>
                                    <span>{{ $model->fieldOfStudy->name??'N/A' }}</span>
                                </p>
                            </div>

                            @if($editable || $review)
                                <div class="col-md-6">
                                    <p class="d-flex align-items-center">
                                        <strong class="mr-4">
                                            {{ __("client_registration.supporting_document") }}
                                        </strong>
                                        @if($model->supporting_document)
                                            <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'doc']) }}"
                                               target="_blank" data-toggle="tooltip"
                                               title="{{__('client_registration.download')}}"
                                               class="btn btn-sm btn-light-info rounded font-weight-bolder">
                                                @include('partials.buttons._svg_download_icon')
                                                <span
                                                        class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>

            @endif

            @if($editable || $review)
                <div class="col-md-12">
                    <p>
                        <strong class="d-block">{{ __("client_registration.brief_bio") }}</strong>
                        {{ optional($model->application)->bio??'Not given' }}
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>


<div class="card gutter-b rounded {{$cardClasses}}">
    <div class="card-body">
        <div class="mb-4 d-md-flex align-items-center justify-content-between">
            <h4 class="font-weight-bolder">
                {{--                Address & More details--}}
                {{ __('client_registration.more_details_and_address') }}
            </h4>
            @if($application->canUpdateInfo && $editable)
                <x-edit-button data-toggle="modal" data-target="#editMoreDetailsModal">
                    @include('partials.buttons._edit_svg_icon')
                </x-edit-button>
            @endif
        </div>
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
                    <span>{{ optional($model->district)->name??'N/A'}}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.sector") }}:</strong>
                    <span>{{optional($model->sector)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.cell") }}:</strong>
                    <span>{{ optional($model->cell)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{__("client_registration.village")}}:</strong>
                    <span>{{ optional($model->village)->name??'N/A' }}</span>
                </p>
            </div>
            @if($model->iworker_type==\App\Constants::Individual)
                <div class="col-md-6">
                    <p>
                        <strong class="d-block">{{ __('client_registration.device_literacy') }}:</strong>
                        @foreach($model->digital_literacy??[] as $item)
                            <span class="badge badge-secondary rounded my-1">{{ $item }}</span>
                        @endforeach
                    </p>
                </div>
            @endif
            <div class="col-md-6">
                <p>
                    <strong>{{ __("client_registration.are_you_able_to_attend_an_online_class") }}?:</strong>
                    <span class="badge badge-secondary rounded my-1">
                    {{ $model->can_attend_online_class?'Yes':'No' }}
                    </span>
                </p>
            </div>
            @if($editable || $review)
                <div class="col-md-6">
                    <p>
                        <strong>{{ __("client_registration.do_you_have_a_bank_account") }} ?:</strong>
                        <span class="badge badge-secondary rounded my-1">
                    {{ $model->has_bank_account?'Yes':'No' }}
                    </span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>{{ __("client_registration.do_you_have_access_to_credit") }} ?:</strong>
                        <span
                                class="badge badge-secondary rounded my-1">{{ $model->credit_access?'Yes':'No' }}</span>
                    </p>
                </div>
            @endif
        </div>

        <div class="row">
            @if($editable|| $review)
                <div class="col-md-6">
                    <p>
                        <strong class="d-block font-weight-bolder">{{__('client_registration.credit_source')}}</strong>
                        @forelse($model->creditSources as $item)
                            <span class="badge badge-secondary  rounded my-1">{{ $item->name }}</span>
                        @empty
                            <span class="label label-inline label-secondary">
                                {{ __("app.none") }}
                            </span>
                        @endforelse
                    </p>
                </div>
            @endif

            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">{{__('app.business_sector')}}</strong>
                    @forelse($application->businessSectors as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-secondary">None</span>
                    @endforelse
                </p>
            </div>


            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.what_are_digital_payments_that_can_be_used_to_pay_you") }}

                    </strong>
                    @forelse($model->paymentMethods as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">{{ __("app.none") }}</span>
                    @endforelse
                </p>
            </div>


            <div class="col-md-12">
                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.do_you_have_any_software_development_skills") }}

                    </strong>
                    @forelse($model->skills as $item)
                        <span class="badge badge-secondary rounded my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-warning">{{ __('app.none') }}</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-12">
                <div>
                    <strong class="d-block font-weight-bolder">
                        {{ __("client_registration.does_your_business_currently_selling_services_or_goods_over_digital_platforms") }}
                    </strong>

                    <ul class="list-group">

                        @forelse($model->iWorkerDigitalPlatforms as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->platform->name }}
                                <a href="" target="_blank">
                                    {{ $item->link }}
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __("app.none") }}
                            </li>
                        @endforelse
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>

@include('partials._expertise_and_interests')

@if($model->iworker_type==\App\Constants::Company)
    @if($editable)
        <div class="card gutter-b rounded {{$cardClasses}}">
            <div class="card-body">

                <div class="mb-4 d-md-flex align-items-center justify-content-between">
                    <h4 class="font-weight-bolder">
                        {{ __("app.company_representative_details") }}
                    </h4>
                    @if($application->canUpdateInfo && $editable)
                        <x-edit-button data-toggle="modal" data-target="#editRepresentativeModal">
                            @include('partials.buttons._edit_svg_icon')
                        </x-edit-button>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.representative_name") }}:</strong>
                            <span>{{ $model->cp_representative_name }}</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.phone") }}:</strong>
                            <a href="tel:{{ $model->cp_representative_phone }}">{{ $model->cp_representative_phone }}</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.email") }}:</strong>
                            <a href="mailto:{{ $model->cp_representative_email }}">{{ $model->cp_representative_email }}</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.position") }}:</strong>
                            <span>{{ $model->cp_representative_position }}</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.gender") }}:</strong>
                            <span>{{ $model->cp_representative_gender }}</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>{{ __("client_registration.physical_disability") }}:</strong>
                            <span>{{ $model->repPhysicalDisability->name??'N/A' }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="card gutter-b rounded {{$cardClasses}}">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    {{ __("client_registration.branches") }}
                </h4>

                @if($application->canUpdateInfo && $editable)
                    <button type="button"
                            class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                            id="addBranchButton">
                        @include('partials._plus_icon')
                        {{ __("client_registration.add_new") }}
                    </button>
                @endif
            </div>
            <div class="card card-body p-0 rounded-sm">
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-solid table-hover">
                        <thead>
                        <tr>
                            <th>{{ __("client_registration.name") }}</th>
                            <th>{{ __("client_registration.province") }}</th>
                            <th>{{ __("client_registration.district") }}</th>
                            <th>{{ __("client_registration.sector") }}</th>
                            <th>{{ __("client_registration.cell") }}</th>
                            <th>{{ __("client_registration.village") }}</th>
                            @if($application->canUpdateInfo)
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($application->branches as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->province->name }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->sector->name }}</td>
                                <td>{{ $item->cell->name }}</td>
                                <td>{{ $item->village->name }}</td>
                                @if($application->canUpdateInfo && $editable)
                                    <td>
                                        <div class="d-flex">
                                            <button type="button"
                                                    data-id="{{$item->id}}"
                                                    data-name="{{$item->name}}"
                                                    data-province="{{$item->province_id}}"
                                                    data-district="{{$item->district_id}}"
                                                    data-sector="{{$item->sector_id}}"
                                                    data-cell="{{$item->cell_id}}"
                                                    data-village="{{$item->village_id}}"
                                                    data-toggle="tooltip" title="Edit"
                                                    class="btn btn-sm btn-info js-edit-branch rounded mr-2">
                                                @include('partials.buttons._edit_svg_icon')
                                            </button>
                                            <a href="{{ route('client.iworker.branches.destroy',encryptId($item->id)) }}"
                                               data-toggle="tooltip" title="Delete"
                                               class="btn btn-sm btn-danger js-delete rounded">
                                                @include('partials.buttons._trash_svg_icon')
                                            </a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card gutter-b rounded {{$cardClasses}}">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    {{ __("client_registration.company_employees") }}
                </h4>

                @if($application->canUpdateInfo && $editable)
                    <button type="button"
                            class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                            id="addEmployeeButton">
                        @include('partials._plus_icon')
                        {{ __("client_registration.add_new") }}
                    </button>
                @endif
            </div>
            <div class="card card-body p-0 rounded-sm">
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-solid table-hover">
                        <thead>
                        <tr>
                            <th>{{ __("client_registration.name") }}</th>
                            <th>{{ __("client_registration.position") }}</th>
                            <th>{{ __("client_registration.recruitment_date") }}</th>
                            <th>{{ __("client_registration.level_of_study") }}</th>
                            <th>{{ __("client_registration.field_of_study") }}</th>
                            @if($application->canUpdateInfo)
                                <th>{{ __("client_registration.supporting_document") }}</th>
                                @if($editable)
                                    <th></th>
                                @endif
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model->companyEmployees as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->recruitment_date->toDateString() }}</td>
                                <td>{{ $item->studylevel->name }}</td>
                                <td>{{ $item->fieldOfStudy->name??'' }}</td>

                                @if($application->canUpdateInfo)
                                    <td>
                                        <a href="{{ route('client.employees.download.document',encryptId($item->id)) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-light-info rounded font-weight-bolder"
                                           data-toggle="tooltip"
                                           title="Download">
                                            @include('partials.buttons._svg_download_icon')
                                            {{--      <span
                                                      class="d-none d-md-inline">{{__('client_registration.download')}}</span>--}}
                                        </a>
                                    </td>
                                    @if($editable)
                                        <td>
                                            <div class="d-flex">
                                                <button type="button"
                                                        data-id="{{$item->id}}"
                                                        data-name="{{$item->name}}"
                                                        data-position="{{$item->position}}"
                                                        data-recruitment_date="{{ optional($item->recruitment_date)->toDateString()}}"
                                                        data-level_of_study_id="{{$item->level_of_study_id}}"
                                                        data-field_of_study="{{$item->field_of_study}}"
                                                        data-toggle="tooltip" title="Edit"
                                                        class="btn btn-sm btn-info js-edit-employee rounded mr-2">
                                                    @include('partials.buttons._edit_svg_icon')
                                                </button>
                                                <a href="{{ route('client.iworker.employees.destroy',encryptId($item->id)) }}"
                                                   data-toggle="tooltip" title="Delete"
                                                   class="btn btn-sm btn-danger js-delete rounded">
                                                    @include('partials.buttons._trash_svg_icon')
                                                </a>
                                            </div>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

@if($model->iworker_type==\App\Constants::Individual)

    <div class="card gutter-b rounded {{$cardClasses}}">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    {{ __("client_registration.certificates_n_trainings") }}
                </h4>

                @if($application->canUpdateInfo && $editable)
                    <button type="button"
                            class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                            id="addTrainingButton">
                        @include('partials._plus_icon')
                        {{ __("client_registration.add_new") }}
                    </button>
                @endif
            </div>

            <div class="accordion accordion-toggle-arrow rounded" id="accordionCertificate">
                @forelse($model->certificates as $item)
                    <div class="card rounded">
                        <div class="card-header rounded">
                            <div
                                    class="card-title collapsed d-flex align-items-center justify-content-between"
                                    data-toggle="collapse"
                                    data-target="#certificate{{$item->id}}">
                                <span>{{ $item->name }}</span>
                            </div>
                        </div>
                        <div id="certificate{{$item->id}}" class="collapse"
                             data-parent="#accordionCertificate">
                            <div class="card-body">

                                <div class="d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ __("client_registration.issuer") }}:</strong>
                                        {{ $item->issuer }}
                                    </div>
                                    @if( $editable)
                                        <div>
                                            <strong class="">{{__('client_registration.supporting_document')}}:</strong>
                                            <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                               data-toggle="tooltip"
                                               target="_blank"
                                               class="btn btn-sm btn-light-info rounded font-weight-bolder"
                                               title="{{__('client_registration.download')}}">
                                                @include('partials.buttons._svg_download_icon')
                                                <span class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <strong>{{ __("client_registration.issue_date") }}:</strong>
                                    {{ optional($item->issuance_date)->toDateString() }}
                                </div>

                                @if($application->canUpdateInfo  && $editable)
                                    <div class="d-flex align-items-center justify-content-start mt-4">
                                        <button type="button"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}"
                                                data-issuer="{{ $item->issuer }}"
                                                data-issuance_date="{{ optional($item->issuance_date)->format('Y-m-d') }}"
                                                data-toggle="tooltip" title="Edit"
                                                class="btn btn-sm btn-info js-edit-training rounded mr-2">
                                            @include('partials.buttons._edit_svg_icon')
                                        </button>
                                        <a href="{{ route('client.trainings.destroy',encryptId($item->id)) }}"
                                           data-toggle="tooltip" title="Delete"
                                           class="btn btn-sm btn-danger js-delete rounded">
                                            @include('partials.buttons._trash_svg_icon')
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                        {{ __("app.none") }}
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endif

<div class="card gutter-b rounded {{$cardClasses}}">
    <div class="card-body">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{__("client_registration.previous_experience")}}
            </h4>

            @if($application->canUpdateInfo  && $editable)
                <button type="button"
                        class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                        id="addExperienceButton">
                    @include('partials._plus_icon')
                    {{ __('client_registration.add_new') }}
                </button>
            @endif
        </div>

        <div class="accordion accordion-toggle-arrow rounded" id="accordionExperience">
            @forelse($model->experiences as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div
                                class="card-title collapsed d-flex align-items-center justify-content-between"
                                data-toggle="collapse"
                                data-target="#experience{{$item->id}}">
                            <span>{{ $item->service_offered }}</span>
                        </div>
                    </div>
                    <div id="experience{{$item->id}}" class="collapse"
                         data-parent="#accordionExperience">
                        <div class="card-body">

                            <div class="d-md-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ __("client_registration.client_name") }}:</strong>
                                    {{ $item->client }}
                                </div>
                                @if($editable || $review)
                                    <div>
                                        <strong class="">{{__('client_registration.supporting_document')}}:</strong>
                                        <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                           data-toggle="tooltip"
                                           target="_blank"
                                           class="btn btn-sm btn-light-info rounded font-weight-bolder"
                                           title="{{__('client_registration.download')}}">
                                            @include('partials.buttons._svg_download_icon')
                                            <span
                                                    class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>


                            <div>
                                <strong>{{__('client_registration.year_of_completion')}}:</strong>
                                {{ $item->year_of_completion }}
                            </div>

                            <div>
                                <strong class="d-block">{{__('client_registration.description')}}:</strong>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>

                            @if($application->canUpdateInfo && $editable)
                                <div class="d-flex ">
                                    <button type="button"
                                            data-id="{{$item->id}}"
                                            data-service_offered="{{$item->service_offered}}"
                                            data-year_of_completion="{{$item->year_of_completion}}"
                                            data-client="{{$item->client}}"
                                            data-description="{{$item->description}}"
                                            data-toggle="tooltip" title="Edit"
                                            class="btn btn-sm btn-info js-edit-experience rounded mr-2">
                                        @include('partials.buttons._edit_svg_icon')
                                    </button>
                                    <a href="{{ route('client.iworker.experience.destroy',encryptId($item->id)) }}"
                                       data-toggle="tooltip" title="Delete"
                                       class="btn btn-sm btn-danger js-delete rounded">
                                        @include('partials.buttons._trash_svg_icon')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                    {{ __("app.none") }}
                </div>
            @endforelse
        </div>

    </div>
</div>

@if($model->iworker_type==\App\Constants::Individual)

    <div class="card gutter-b rounded {{$cardClasses}}">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    {{ __("app.Affiliations") }}
                </h4>

                @if($application->canUpdateInfo && $editable)
                    <button type="button"
                            class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                            id="addAffiliationButton">
                        @include('partials._plus_icon')
                        {{ __("client_registration.add_new") }}
                    </button>
                @endif
            </div>

            <div class="accordion accordion-toggle-arrow rounded" id="accordionAffiliation">
                @forelse($application->client->affiliations as $item)
                    <div class="card rounded">
                        <div class="card-header rounded">
                            <div
                                    class="card-title collapsed d-flex align-items-center justify-content-between"
                                    data-toggle="collapse"
                                    data-target="#affiliation{{$item->id}}">
                                <span>
                                    {{ $item->employer->name }}</span>
                                <span
                                        class="label label-inline label-light-{{$item->statusColor}} rounded mr-4 font-weight-bolder">{{ $item->status }}</span>
                            </div>
                        </div>
                        <div id="affiliation{{$item->id}}" class="collapse"
                             data-parent="#accordionAffiliation">
                            <div class="card-body">

                                <div>
                                    <strong>{{ __("client_registration.position") }}:</strong>
                                    {{ $item->position }}
                                </div>
                                <div>
                                    <strong>{{ __("client_registration.description") }}:</strong> <br>
                                    {{ $item->description??'None' }}
                                </div>

                                @if($application->canUpdateInfo  && $editable)
                                    <div class="d-flex align-items-center justify-content-start mt-4">
                                        <x-edit-button
                                                data-id="{{$item->id}}"
                                                data-employer_id="{{$item->employer_id}}"
                                                data-position="{{$item->position}}"
                                                data-status="{{$item->status}}"
                                                data-description="{{$item->description}}"
                                                classes="js-edit-affiliation"
                                                classes="js-edit-affiliation mr-2"/>
                                        <x-delete-button
                                                :href="route('client.affiliations.destroy',encryptId($item->id))"/>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                        {{ __("app.none") }}
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endif


