<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4">Business identification</h4>
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
                    <span>{{ $application->companyCategory->name??"" }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>TIN:</strong>
                    <span>{{ $model->TIN }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Phone number :</strong>
                    <span>
                        <a href="tel:{{ $model->company_phone }}">{{ $model->company_phone }}</a>
                    </span>
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
            @if(isset($is_owner) && $is_owner==true)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">RDB certificate</strong>
                        @if($model->rdb_certificate)
                            <a href="{{ route('dsp.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                               data-toggle="tooltip" title="{{__('client_registration.download')}}"
                               class="btn btn-sm btn-light-primary rounded-pill py-1 font-weight-bolder">
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
                    <strong class="d-block font-weight-bolder">Categories of support services offered</strong>
                    @forelse($application->services as $item)
                        <span class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                    @empty
                        <span class="label label-inline label-light-info">None</span>
                    @endforelse
                </p>
            </div>
            @if(isset($is_owner) && $is_owner==true)
                <div class="col-md-6">
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
        <h4 class="font-weight-bolder mb-4">
            Company address
        </h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Province name:</strong>
                    <span>{{ optional($model->province)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>District:</strong>
                    <span>{{ optional($model->district)->name??'N/A' }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Sector:</strong>
                    <span>{{ optional($model->sector)->name??'N/A' }}</span>
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
            {{-- <div class="col-md-6">
                 <p class="d-flex align-items-center">
                     <strong class="mr-4">Company logo</strong>
                     @if($model->logo)
                         <a href="{{ route('dsp.download.file',['id'=>encryptId($model->id),'type'=>'logo']) }}"
                            class="btn btn-sm btn-light-primary rounded py-2 px-5">Download</a>
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
        <h4 class="font-weight-bolder mb-4">
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
                Projects completed ({{ $application->completedProjects->count() }})
            </h4>

            @if($application->canUpdateInfo && $is_owner==true)
                <button type="button"
                        class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                        id="addProjectButton">
                    @include('partials._plus_icon')
                    Add New
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
                                        <strong>Client Name:</strong>
                                        <span>{{ $item->client_name }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <strong>From:</strong>
                                        <span>{{ $item->start_date->toDateString() }}</span>,
                                        <strong>To:</strong>
                                        <span>{{ $item->end_date->toDateString() }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong class="d-block">Description</strong>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>

                            @if($application->canUpdateInfo && $is_owner==true)
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
                    No Projects completed found
                </div>
            @endforelse
        </div>

    </div>
</div>

<div class="card gutter-b rounded border-0 shadow-none">
    <div class="card-body">


        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                Products / Solutions ({{ $application->applicationSolutions->count() }})
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
                                    <strong class="d-block">Product / Solution Description</strong>
                                    <p>{{ $item->description }}</p>
                                </div>

                            </div>

                            <strong class="font-weight-bolder d-block">Platforms</strong>
                            @foreach($item->platformTypes as $type)
                                <span class="label label-inline label-info rounded-pill mr-5">{{ $type->name }}</span>
                            @endforeach


                            @if($item->has_api)
                                <p>
                                    <strong>API Name:</strong>
                                    <span>{{ $item->api_name }}</span>
                                </p>
                                <p>
                                    <strong>API Link:</strong>
                                    <a href="{{ $item->api_link }}"
                                       target="_blank">{{ $item->api_link }}</a>
                                </p>
                                <p>
                                    <strong class="d-block">API Description</strong>
                                    {{ $item->api_description }}
                                </p>

                            @endif
                            @if($application->canUpdateInfo)

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
                                        classes="js-edit-solution mr-4"/>

                                    <x-delete-button :href="route('client.solutions.destroy',encryptId($item->id))"/>
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
