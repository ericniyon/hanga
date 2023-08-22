<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-capitalize">Business identification</h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Company name:</strong>
                    <span>{{ $model->company_name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Company Category:</strong>
                    <span>{{ $application->companyCategory->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>TIN:</strong>
                    <span>{{ $model->tin }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone number :</strong>
                    <span><a href="tel:{{ $model->company_phone }}">{{ $model->company_phone }}</a></span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone email :</strong>
                    <span>
                                        <a href="mailto:{{ $model->company_email }}">{{ $model->company_email }}</a>
                                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Registration date :</strong>
                    <span>{{ optional($model->registration_date)->toDateString() }}</span>
                </p>
            </div>

            @if(!isset($is_owner) || $is_owner==true)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">{{__('client_registration.rdb_certificate')}}</strong>
                        @if($model->rdb_certificate)
                            <a href="{{ route('msme.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                               target="_blank" data-toggle="tooltip" title="{{__('client_registration.download')}}"
                               class="btn btn-sm btn-light-primary rounded-pill px-5">
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
                    <strong>Number of employees :</strong>
                    <span>{{ $model->number_of_employees }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Business sectors</strong>
                    @forelse($application->businessSectors as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Payments offered</strong>
                    @forelse($model->paymentMethods as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Digital platforms used to sell goods/services</strong>
                    @forelse($model->digitalPlatforms as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">Categories of support services offered</strong>
                    @forelse($application->services as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>

            @if(!isset($is_owner) || $is_owner==true)
                <div class="col-md-12">
                    <strong>Company bio</strong>
                    <p>
                        {{ optional($model->application)->bio }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-capitalize">
            Company address
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
                    <span>{{ $model->district->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Sector:</strong>
                    <span>{{ $model->sector->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Cell:</strong>
                    <span>{{ $model->cell->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Village:</strong>
                    <span>{{ $model->village->name??'N/A' }}</span>
                </p>
            </div>
            {{--<div class="col-md-6">
                <p class="d-flex align-items-center">
                    <strong class="mr-4">Company logo</strong>
                    @if($model->logo)
                        <a href="{{ route('msme.download.file',['id'=>encryptId($model->id),'type'=>'logo']) }}"
                           target="_blank"
                           class="btn btn-sm btn-light-primary rounded py-2 px-5">
                            <i class="bi bi-cloud-download"></i>
                            Download
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>--}}

            <div class="col-md-6">
                <p>
                    <strong>Website:</strong>
                    <a href="{{ $model->website??'' }}"
                       target="_blank">{{ $model->website??'None' }}</a>
                </p>
            </div>


        </div>
    </div>
</div>

<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-capitalize">
            Representative details
        </h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Name:</strong>
                    <span>{{ $model->representative_name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone:</strong>
                    <a href="tel:{{ $model->representative_phone }}">{{ $model->representative_phone }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Email:</strong>
                    <a href="mailto:{{ $model->representative_email }}">{{ $model->representative_email }}</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Position:</strong>
                    <span>{{ $model->representative_position }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Gender:</strong>
                    <span>{{ $model->representative_gender }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Physical disability:</strong>
                    <span>{{ $model->representative_physical_disability??'N/A' }}</span>
                </p>
            </div>
        </div>
    </div>
</div>

@include('partials._certification_standards_card')
<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                Products / Services ({{ $application->applicationSolutions->count() }})
            </h4>

            @if($application->canUpdateInfo)
                <button type="button"
                        class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                        id="addSolutionButton">
                    @include('partials._plus_icon')
                    Add New
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
                                class="label label-inline label-light-{{$item->typeColor}} rounded-pill d-block mr-10">{{ $item->type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{$item->id}}" class="collapse"
                         data-parent="#accordionExample2">
                        <div class="card-body">

                            <div>
                                <strong class="d-block">Description</strong>
                                <p>{{ $item->description }}</p>
                            </div>
                            @if($application->canUpdateInfo)
                                <div class="d-flex align-items-center justify-content-start">
                                    <button type="button"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-type="{{ $item->type }}"
                                            data-description="{{ $item->description }}"
                                            data-toggle="tooltip" title="Edit"
                                            class="btn btn-sm btn-light-info js-edit rounded-pill mr-4">
                                        @include('partials.buttons._edit_svg_icon')
                                    </button>
                                    <a href="{{ route('client.solutions.destroy',encryptId($item->id)) }}"
                                       data-id="{{ $item->id }}"
                                       data-name="{{ $item->name }}"
                                       data-type="{{ $item->type }}"
                                       data-description="{{ $item->description }}"
                                       data-toggle="tooltip" title="Delete"
                                       class="btn btn-sm btn-light-danger js-delete rounded-pill">
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
