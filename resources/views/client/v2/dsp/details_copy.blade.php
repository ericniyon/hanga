@extends('client.v2.layout.app')
@section('title', 'Company application details')
@section('styles')
    @livewireStyles
@stop
@section('content')
    @if (auth('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">

        <div>
            <div>
                <div class="h-80px bg-light-light w-100 rounded d-none d-md-block"></div>

                <div class="px-4 mt-md-n15 mt-0" style="z-index: 2001;top: 20px;background-color: rgba(255,255,255,0.1);">
                    <span class="badge bg-light-info rounded-pill">DSP</span>
                    <div class="row">
                        <div class="col-md-12">
                                <!--begin::User-->
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div
                                        class="symbol symbol-60 symbol-xl-100 symbol-xxl-150 mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label rounded-lg shadow-sm"
                                            style="background-image:url('{{ $client->profile_photo_url }}');background-size: contain;">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                            <span class="font-weight-boldest font-size-h3 text-info">
                                                {{ $client->name }}
                                            </span>
                                            <div>
                                                @if ($application->status == \App\Models\ApplicationBaseModel::APPROVED)
                                                    <span
                                                        class="svg-icon text-primary ml-2">@include('partials.icons._verified')</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="align-self-start">
                                            @foreach ($model->application->businessSectors as $sector)
                                                <span
                                                    class="badge badge-info rounded-lg font-weight-bold align-self-start m-1">{{ $sector->name }}</span>
                                            @endforeach
                                        </div>
                                        <p class="my-1">
                                            {{ $application->bio }}
                                        </p>

                                        @if ($application->status == \App\Models\ApplicationBaseModel::APPROVED)
                                            <div
                                                class="align-self-start rounded-pill border pl-0 pr-3 border-primary text-primary mb-3">
                                                <span class="rounded-pill svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                {{ __('app.Verified Company') }}
                                            </div>
                                        @endif







                                        {{-- <p class="mb-0">

                                            {{ __('app.Rate') }}
                                            <strong class="font-weight-boldest">
                                                {{ number_format($client->ratings_count) }}
                                                {{ __("app.Reviews") }}
                                            </strong>
                                        </p> --}}
                                        {{-- <h4 class="font-weight-boldest"> {{ $client->ratingAverage() }}</h4> --}}
                                        <div class="d-flex mb-3">
                                            <x-rating-item :client="$client" />
                                        </div>
                                        <div>
                                            @include('partials.includes._rating_button')
                                        </div>
                                    </div>
                                </div>
                                <!--end::User-->
                        </div>
                        <div class="col-md-6">
                            <div
                                class="d-flex align-items-md-end align-items-center flex-column justify-content-center pt-8">
                                @if ($model->website)
                                    <a href="{{ $model->website }}" target="_blank"
                                        class="btn btn-primary text-white w-100 my-2 w-md-150px border-2 rounded shadow">
                                        {{ __('app.Visit') }}
                                        {{ __('client_registration.website') }}
                                    </a>
                                @endif

                                @if (auth()->guard('client')->check())
                                    @include('partials.v2._connect_button', ['item' => $client])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-6">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span class="text-dark font-weight-bolder">{{ __('client_registration.province') }}:</span>
                        {{ optional($model->province)->name }}
                        ,
                        <span class="text-dark font-weight-bolder">{{ __('client_registration.district') }}:</span>
                        {{ optional($model->district)->name }}
                        ,
                        <span class="text-dark font-weight-bolder">{{ __('client_registration.sector') }}:</span>
                        {{ optional($model->sector)->name }}
                        <span class="text-dark font-weight-bolder">{{ __('client_registration.cell') }}:</span>
                        {{ optional($model->cell)->name }}
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                        </span>
                        {{ __('client_registration.phone') }}:
                        <a href="tel: {{ $model->company_phone }}" class="text-dark">
                            {{ $model->company_phone }}
                        </a>
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        {{ __('client_registration.email') }}:
                        <a href="mailto:{{ $model->company_email }}" class="text-dark">
                            {{ $model->company_email }}
                        </a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs justify-content-between border-bottom border-bottom-light"
                            id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="pl-2 nav-link rounded-0 text-dark-75 font-weight-bold active" id="home-tab"
                                    data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                    aria-selected="true">
                                    {{ __('app.Company Details') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" id="messages-tab"
                                    data-toggle="tab" href="#messages" role="tab" aria-controls="messages"
                                    aria-selected="false">{{ __('app.expertise_Interests') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" data-toggle="tab"
                                    href="#representative_details" role="tab" aria-controls="messages"
                                    aria-selected="false">{{ __('client_registration.representative_details') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" id="settings-tab"
                                    data-toggle="tab" href="#settings" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    {{ __('app.Certifications / Awards') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" id="services-tab"
                                    data-toggle="tab" href="#services" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    {{ __('client_registration.products') }} / {{ __('client_registration.solutions') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold"
                                    id="projects-completed-tab" data-toggle="tab" href="#projects_completed">
                                    {{ __('client_registration.projects_completed') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" id="reviews-tab"
                                    data-toggle="tab" href="#reviews" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    {{ __('app.Rating and reviews') }}
                                    <span
                                        class="p-2 font-weight-boldest ml-2 badge badge-primary text-white rounded-circle">
                                        {{ $client->ratings_count }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content container-fluid">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.company_name') }}:</strong>
                                            <span> {{ $model->company_name }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>
                                            <strong class="d-block font-weight-bolder">
                                                {{ __('client_registration.company_categories') }}
                                            </strong>
                                            @forelse($application->categories as $item)
                                                <span
                                                    class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-light-info">None</span>
                                            @endforelse
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.tin') }}:</strong>
                                            <span>{{ $model->TIN }}</span>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.registration_date') }}:</strong>
                                            <span>{{ $model->registration_date->toDateString() }}</span>
                                        </p>
                                    </div>
                                    @if ($editable)
                                        <div class="col-md-6">
                                            <p class="d-flex align-items-center">
                                                <strong
                                                    class="mr-4">{{ __('client_registration.rdb_certificate') }}</strong>
                                                @if ($model->rdb_certificate)
                                                    <a href="{{ route('dsp.download.file', ['id' => encryptId($model->id), 'type' => 'rdb']) }}"
                                                        data-toggle="tooltip"
                                                        title="{{ __('client_registration.download') }}"
                                                        class="btn btn-sm btn-light-primary rounded py-1 font-weight-bolder">
                                                        @include('partials.buttons._svg_download_icon')
                                                        <span class="d-none d-md-inline">
                                                            {{ __('client_registration.download') }}
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
                                            <strong
                                                class="d-block font-weight-bolder">{{ __('app.business_sector') }}</strong>
                                            @forelse($application->businessSectors as $item)
                                                <span
                                                    class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-light-info">None</span>
                                            @endforelse
                                        </p>
                                    </div>

                                    @if ($editable)
                                        <div class="col-md-6">
                                            <strong>{{ __('client_registration.brief_bio') }}</strong>
                                            <p>
                                                {{ optional($application)->bio }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-md-flex align-items-center justify-content-between my-2">
                                    @if ($editable && $application->can_update_info)
                                        <x-edit-button data-toggle="modal" data-target="#editDspBusinessIdentification" />
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="mt-3">
                                    @include('partials._area_of_interests')
                                </div>

                                <div>
                                    <h6>
                                        @if ($model->application->client->typeName == \App\Models\RegistrationType::MSME)
                                            {{ __('app.category_digital_services_interested_in') }}
                                        @else
                                            {{ __('app.area_of_expertise') }}
                                        @endif

                                    </h6>
                                    <p>

                                        @forelse($model->application->services as $item)
                                            <span
                                                class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                        @empty
                                            <span class="label label-inline label-se">None</span>
                                        @endforelse
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="representative_details" role="tabpanel"
                                aria-labelledby="representative_details">
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.representative_name') }}:</strong>
                                            <span>{{ $model->representative_name }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.phone') }}:</strong>
                                            <a href="tel:{{ $model->representative_phone }}"
                                                class="text-info">{{ $model->representative_phone }}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.email') }}:</strong>
                                            <a href="mailto:{{ $model->representative_email }}"
                                                class="text-info">{{ $model->representative_email }}</a>
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
                                            <strong>{{ __('client_registration.gender') }}:</strong>
                                            <span>{{ $model->representative_gender }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.physical_disability') }}:</strong>
                                            <span>{{ $model->representative_physical_disability ?? 'N/A' }}</span>
                                        </p>
                                    </div>
                                </div>

                                @if ($editable)
                                    <x-edit-button data-toggle="modal" data-target="#editDspRepresentative" />
                                @endif

                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                @php
                                    $awards = \App\Models\CertificationAward::where('application_id', '=', $model->application_id ?? 0)
                                        ->latest()
                                        ->get();
                                @endphp
                                <div class="my-3">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{ __('client_registration.certification_standards_awards') }}
                                            ({{ $awards->count() }})
                                        </h6>

                                        @if ($application->can_update_info && $editable)
                                            <button type="button"
                                                class="btn btn-sm btn-light-info rounded-pill btn-hover-text-white font-weight-bolder"
                                                id="addCertificateButton">
                                                @include('partials._plus_icon')
                                                {{ __('client_registration.add_new') }}
                                            </button>
                                        @endif
                                    </div>
                                    <div class="accordion accordion-toggle-arrow rounded " id="awardAccordion">
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="services" role="tabpanel" aria-labelledby="services-tab">
                                <div class="d-flex align-items-center justify-content-between mb-4 mt-3">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ __('client_registration.products') }}
                                        / {{ __('client_registration.solutions') }}
                                        ({{ $application->applicationSolutions->count() }})
                                    </h4>

                                    @if ($application->canUpdateInfo && $editable)
                                        <button type="button"
                                            class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                                            id="addSolutionButton">
                                            @include('partials._plus_icon')
                                            {{ __('client_registration.add_new') }}
                                        </button>
                                    @endif
                                </div>

                                <div class="accordion accordion-toggle-arrow rounded" id="accordionExample2">
                                    @forelse($application->applicationSolutions as $item)
                                        <div class="card rounded">
                                            <div class="card-header rounded">
                                                <div class="card-title collapsed d-flex align-items-center justify-content-between"
                                                    data-toggle="collapse" data-target="#collapse2{{ $item->id }}">
                                                    <span>{{ $item->name }}</span>
                                                    <span
                                                        class="label label-inline label-light-{{ $item->typeColor }} rounded-xl d-block mr-10">{{ $item->type }}</span>
                                                </div>
                                            </div>
                                            <div id="collapse2{{ $item->id }}" class="collapse"
                                                data-parent="#accordionExample2">
                                                <div class="card-body">

                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <strong
                                                                class="d-block">{{ __('client_registration.product') }}
                                                                / {{ __('client_registration.solution') }}
                                                                {{ __('client_registration.description') }}
                                                            </strong>
                                                            <p>{{ $item->description }}</p>
                                                        </div>

                                                    </div>

                                                    <strong class="font-weight-bolder d-block">
                                                        {{ __('client_registration.platforms') }}
                                                    </strong>
                                                    @foreach ($item->platformTypes as $type)
                                                        <span
                                                            class="label label-inline label-info rounded-pill mr-5">{{ $type->name }}</span>
                                                    @endforeach


                                                    @if ($item->has_api)
                                                        <p>
                                                            <strong>{{ __('client_registration.api_name') }}:</strong>
                                                            <span>{{ $item->api_name }}</span>
                                                        </p>
                                                        <p>
                                                            <strong>{{ __('client_registration.api_link') }}:</strong>
                                                            <a href="{{ $item->api_link }}"
                                                                target="_blank">{{ $item->api_link }}</a>
                                                        </p>
                                                        <p>
                                                            <strong class="d-block">
                                                                {{ __('client_registration.api_description') }}
                                                            </strong>
                                                            {{ $item->api_description }}
                                                        </p>
                                                    @endif
                                                    @if ($application->can_update_info && $editable)
                                                        <div class="d-flex align-items-center justify-content-start mt-4">

                                                            <x-edit-button data-id="{{ $item->id }}"
                                                                data-type="{{ $item->type }}"
                                                                data-name="{{ $item->name }}"
                                                                data-description="{{ $item->description }}"
                                                                data-has_api="{{ $item->has_api }}"
                                                                data-platforms="{{ $item->platformTypes->pluck('id') }}"
                                                                data-api_name="{{ $item->api_name }}"
                                                                data-api_link="{{ $item->api_link }}"
                                                                data-api_description="{{ $item->api_description }}"
                                                                data-cp_name="{{ $item->dsp_name }}"
                                                                data-cp_email="{{ $item->email }}"
                                                                data-cp_phone="{{ $item->phone }}"
                                                                classes="js-edit-solution mr-4" />

                                                            <x-delete-button :href="route(
                                                                'client.solutions.destroy',
                                                                encryptId($item->id),
                                                            )" />
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-light-warning alert-custom rounded">
                                            {{ __('app.No products/solutions found') }}
                                        </div>
                                    @endforelse
                                </div>

                            </div>
                            <div class="tab-pane" id="projects_completed" role="tabpanel">
                                <div class="d-flex align-items-center justify-content-between mb-4 mt-3">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ __('client_registration.projects_completed') }}
                                        ({{ $application->completedProjects->count() }})
                                    </h4>

                                    @if ($application->canUpdateInfo && $editable)
                                        <button type="button"
                                            class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                                            id="addProjectButton">
                                            @include('partials._plus_icon')
                                            {{ __('client_registration.add_new') }}
                                        </button>
                                    @endif
                                </div>
                                <div class="accordion accordion-toggle-arrow rounded" id="accordionProjects">
                                    @forelse($application->completedProjects as $item)
                                        <div class="card rounded">
                                            <div class="card-header rounded">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                    data-target="#collapseProject{{ $item->id }}">
                                                    {{ $item->name }}
                                                </div>
                                            </div>
                                            <div id="collapseProject{{ $item->id }}" class="collapse"
                                                data-parent="#accordionProjects">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>
                                                                <strong>{{ __('client_registration.name') }}:</strong>
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
                                                            <strong
                                                                class="d-block">{{ __('client_registration.description') }}</strong>
                                                            <p>{{ $item->description }}</p>
                                                        </div>
                                                    </div>

                                                    @if ($application->can_update_info && $editable)
                                                        <div class="d-flex align-items-center justify-content-start">
                                                            <x-edit-button data-id="{{ $item->id }}"
                                                                data-name="{{ $item->name }}"
                                                                data-description="{{ $item->description }}"
                                                                data-client_name="{{ $item->client_name }}"
                                                                data-start_date="{{ optional($item->start_date)->toDateString() }}"
                                                                data-end_date="{{ optional($item->end_date)->toDateString() }}"
                                                                classes="js-edit mr-4" />

                                                            <x-delete-button :href="route(
                                                                'client.projects.destroy',
                                                                encryptId($item->id),
                                                            )" />
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-light-warning alert-custom  rounded">
                                            {{ __('app.No Projects completed found') }}
                                        </div>
                                    @endforelse
                                </div>

                            </div>
                            <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <livewire:v2.reviews :model="$client" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


@stop

@push('scripts')
    @livewireScripts
@endpush
