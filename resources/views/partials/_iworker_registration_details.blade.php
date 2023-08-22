<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4">Individual/Company Identification</h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Registration type:</strong>
                    <span>{{ $model->iworker_type }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Name:</strong>
                    <span>{{ $model->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>ID Type:</strong>
                    <span>{{ $model->id_type }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>ID Number:</strong>
                    <span>{{ $model->id_number }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone number :</strong>
                    <span><a href="tel:{{ $model->phone }}">{{ $model->phone }}</a></span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone email :</strong>
                    <a href="mailto:{{ $model->email }}">{{ $model->email }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Website :</strong>
                    <a href="{{ $model->website }}">{{ $model->website??'N/A' }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Portfolio link :</strong>
                    <a href="{{ $model->portfolio_link }}">{{ $model->portfolio_link??'N/A' }}</a>
                </p>
            </div>


            @if($model->iworker_type==\App\Constants::Company)
                <div class="col-md-6">
                    <p>
                        <strong>Registration date :</strong>
                        <span>{{ $model->comp_date_of_registration->toDateString() }}</span>
                    </p>
                </div>
                @if(!isset($is_owner) || $is_owner==true)
                    <div class="col-md-6">
                        <p class="d-flex align-items-center">
                            <strong class="mr-4">RDB certificate</strong>
                            @if($model->rdb_certificate)
                                <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-light-primary rounded-pill py-2 px-5">
                                    @include('partials.buttons._svg_download_icon')
                                    Download
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                @endif

            @endif

            @if(!isset($is_owner) || $is_owner==true)
                <div class="col-md-12">
                    <p>
                        <strong class="d-block">Brief bio</strong>
                        {{ optional($model->application)->bio??'Not given' }}
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>

@if($model->iworker_type==\App\Constants::Individual)
    <div class="card gutter-b rounded border-0 shadow-none">
        <div class="card-body">
            <h4 class="font-weight-bolder mb-4">Qualification</h4>
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>Date of birth:</strong>
                        <span>{{ $model->dob->toDateString() }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Gender:</strong>
                        <span>{{ $model->gender }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Level of study:</strong>
                        <span>{{ $model->studyLevel->name }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Field of study:</strong>
                        <span>{{ $model->field_of_study }}</span>
                    </p>
                </div>

                @if(!isset($is_owner) || $is_owner==true)

                    <div class="col-md-6">
                        <p class="d-flex align-items-center">
                            <strong class="mr-4">Supporting document</strong>
                            @if($model->supporting_document)
                                <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'doc']) }}"
                                   target="_blank" data-toggle="tooltip" title="{{__('client_registration.download')}}"
                                   class="btn btn-sm btn-light-primary rounded-pill">
                                    @include('partials.buttons._svg_download_icon')
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                @endif

                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong>Physical disability:</strong>
                        {{ $model->physical_disability??'N/A' }}
                    </p>
                </div>
            </div>

        </div>
    </div>
@endif


<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4">
            Address & More details
        </h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Province name:</strong>
                    <span>{{ $model->province->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>District:</strong>
                    <span>{{ optional($model->district)->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Sector:</strong>
                    <span>{{optional($model->sector)->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Cell:</strong>
                    <span>{{ optional($model->cell)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Village:</strong>
                    <span>{{ optional($model->village)->name??'N/A' }}</span>
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <strong>Can attend online training?:</strong>
                    <span class="label label-inline label-light-info rounded-pill font-weight-bolder">
                    {{ $model->can_attend_online_class?'Yes':'No' }}
                    </span>
                </p>
            </div>
            @if(!isset($is_owner) || $is_owner==true)
                <div class="col-md-6">
                    <p>
                        <strong>Have a bank account ?:</strong>
                        <span class="label label-inline label-light-info rounded-pill font-weight-bolder">
                    {{ $model->has_bank_account?'Yes':'No' }}
                    </span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Have access to credit ?:</strong>
                        <span
                            class="label label-inline label-light-info rounded-pill font-weight-bolder">{{ $model->credit_access?'Yes':'No' }}</span>
                    </p>
                </div>
            @endif
        </div>

        <div class="row">
            @if(!isset($is_owner) || $is_owner==true)
                <div class="col-md-6">
                    <p>
                        <strong class="d-block font-weight-bolder">Credit source</strong>
                        @forelse($model->creditSources as $item)
                            <span class="badge badge-info rounded-pill my-1">{{ $item->name }}</span>
                        @empty
                            <span class="label label-inline label-light-info">None</span>
                        @endforelse
                    </p>
                </div>
            @endif
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Payments that can be used to pay you</strong>
                    @forelse($model->paymentMethods as $item)
                        <span class="badge badge-info rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Software development skills</strong>
                    @forelse($model->skills as $item)
                        <span class="badge badge-info rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-warning">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-12">
                <div>
                    <strong class="d-block font-weight-bolder">
                        Digital platforms used to sell goods and services
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
                                No data available
                            </li>
                        @endforelse
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>

@if($model->iworker_type==\App\Constants::Company)
    <div class="card gutter-b rounded border-0 shadow-none">
        <div class="card-body">
            <h4 class="font-weight-bolder mb-4">
                Company representative details
            </h4>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>Name:</strong>
                        <span>{{ $model->cp_representative_name }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Phone:</strong>
                        <a href="tel:{{ $model->cp_representative_phone }}">{{ $model->cp_representative_phone }}</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Email:</strong>
                        <a href="mailto:{{ $model->cp_representative_email }}">{{ $model->cp_representative_email }}</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Position:</strong>
                        <span>{{ $model->cp_representative_position }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Gender:</strong>
                        <span>{{ $model->cp_representative_gender }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Physical disability:</strong>
                        <span>{{ $model->physical_disability??'N/A' }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card gutter-b rounded border-0 shadow-none">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    Company branches
                </h4>

                @if($application->canUpdateInfo)
                    <button type="button"
                            class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                            id="addBranchButton">
                        @include('partials._plus_icon')
                        Add New
                    </button>
                @endif
            </div>
            <div class="card card-body p-0 rounded-sm">
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-solid table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Sector</th>
                            <th>Cell</th>
                            <th>Village</th>
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
                                @if($application->canUpdateInfo)
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
                                                    class="btn btn-sm btn-info js-edit-branch rounded-pill mr-2">
                                                @include('partials.buttons._edit_svg_icon')
                                            </button>
                                            <a href="{{ route('client.iworker.branches.destroy',encryptId($item->id)) }}"
                                               data-toggle="tooltip" title="Delete"
                                               class="btn btn-sm btn-danger js-delete rounded-pill">
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
    <div class="card gutter-b rounded border-0 shadow-none">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    Company employees
                </h4>

                @if($application->canUpdateInfo)
                    <button type="button"
                            class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                            id="addEmployeeButton">
                        @include('partials._plus_icon')
                        Add New
                    </button>
                @endif
            </div>
            <div class="card card-body p-0 rounded-sm">
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-solid table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Rec.Date</th>
                            <th>Level of study</th>
                            <th>Field of study</th>
                            <th>Document</th>
                            @if($application->canUpdateInfo)
                                <th></th>
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
                                <td>{{ $item->field_of_study }}</td>
                                <td>
                                    <a href="{{ route('client.employees.download.document',encryptId($item->id)) }}"
                                       target="_blank" class="btn btn-sm btn-light-primary rounded-pill"
                                       data-toggle="tooltip"
                                       title="Download">
                                        @include('partials.buttons._svg_download_icon')
                                    </a>
                                </td>
                                @if($application->canUpdateInfo)
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
                                                    class="btn btn-sm btn-info js-edit-employee rounded-pill mr-2">
                                                @include('partials.buttons._edit_svg_icon')
                                            </button>
                                            <a href="{{ route('client.iworker.employees.destroy',encryptId($item->id)) }}"
                                               data-toggle="tooltip" title="Delete"
                                               class="btn btn-sm btn-danger js-delete rounded-pill">
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
@endif

@if($model->iworker_type==\App\Constants::Individual)

    <div class="card gutter-b rounded border-0 shadow-none">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-bolder mb-0">
                    Certificate & trainings
                </h4>

                @if($application->canUpdateInfo)
                    <button type="button"
                            class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                            id="addTrainingButton">
                        @include('partials._plus_icon')
                        Add New
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
                                        <strong>Issuer:</strong>
                                        {{ $item->issuer }}
                                    </div>
                                    @if(!isset($is_owner) || $is_owner==true)
                                        <div>
                                            <strong class="">{{__('client_registration.supporting_document')}}:</strong>
                                            <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                               data-toggle="tooltip"
                                               target="_blank"
                                               class="btn btn-sm btn-light-primary rounded-pill font-weight-bolder"
                                               title="{{__('client_registration.download')}}">
                                                @include('partials.buttons._svg_download_icon')
                                                <span
                                                    class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <strong>Issue date:</strong>
                                    {{ optional($item->issuance_date)->toDateString() }}
                                </div>

                                @if($application->canUpdateInfo)
                                    <div class="d-flex align-items-center justify-content-start mt-4">
                                        <button type="button"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}"
                                                data-issuer="{{ $item->issuer }}"
                                                data-issuance_date="{{ optional($item->issuance_date)->format('Y-m-d') }}"
                                                data-toggle="tooltip" title="Edit"
                                                class="btn btn-sm btn-info js-edit-training rounded-pill mr-2">
                                            @include('partials.buttons._edit_svg_icon')
                                        </button>
                                        <a href="{{ route('client.trainings.destroy',encryptId($item->id)) }}"
                                           data-toggle="tooltip" title="Delete"
                                           class="btn btn-sm btn-danger js-delete rounded-pill">
                                            @include('partials.buttons._trash_svg_icon')
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                        No products/solutions found
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endif



<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                Previous experience
            </h4>

            @if($application->canUpdateInfo)
                <button type="button"
                        class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                        id="addExperienceButton">
                    @include('partials._plus_icon')
                    Add New
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
                                    <strong>Client:</strong>
                                    {{ $item->client }}
                                </div>
                                @if(!isset($is_owner) || $is_owner==true)
                                    <div>
                                        <strong class="">{{__('client_registration.supporting_document')}}:</strong>
                                        <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                           data-toggle="tooltip"
                                           target="_blank"
                                           class="btn btn-sm btn-light-primary rounded-pill font-weight-bolder"
                                           title="{{__('client_registration.download')}}">
                                            @include('partials.buttons._svg_download_icon')
                                            <span
                                                class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <strong>Issue date:</strong>
                                {{ optional($item->issuance_date)->toDateString() }}
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

                            @if($application->canUpdateInfo)
                                <div class="d-flex ">
                                    <button type="button"
                                            data-id="{{$item->id}}"
                                            data-service_offered="{{$item->service_offered}}"
                                            data-year_of_completion="{{$item->year_of_completion}}"
                                            data-client="{{$item->client}}"
                                            data-description="{{$item->description}}"
                                            data-toggle="tooltip" title="Edit"
                                            class="btn btn-sm btn-info js-edit-experience rounded-pill mr-2">
                                        @include('partials.buttons._edit_svg_icon')
                                    </button>
                                    <a href="{{ route('client.iworker.experience.destroy',encryptId($item->id)) }}"
                                       data-toggle="tooltip" title="Delete"
                                       class="btn btn-sm btn-danger js-delete rounded-pill">
                                        @include('partials.buttons._trash_svg_icon')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                    No products/solutions found
                </div>
            @endforelse
        </div>

    </div>
</div>


