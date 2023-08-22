@extends('client.v2.layout.app')
@section('title', 'DSP application form')
@section('content')

    @include('partials.includes._home_nav')

    <div class="container my-5">


        @include('partials._return_back_message')

        <div class="d-flex justify-between">
            <div class="mr-3">
                @livewire('partials.side-nav')
            </div>
            <div>
                <div class="card  shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            {{-- @include('partials.includes.take_me_back') --}}
                            <h4 class="font-weight-bolder">
                                @lang('client_registration.application_form_of') {{ auth('client')->user()->registrationType->name }}
                            </h4>
                        </div>
                        <!--begin: Wizard-->
                        <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                            data-wizard-clickable="true">
                            <!--begin: Wizard Nav-->
                            <div class="wizard-nav">
                                <div class="wizard-steps px-0 pb-8 px-lg-0 py-lg-3">
                                    <!--begin::Wizard Step 1 Nav-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                @lang('client_registration.company_details')</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                {{ __('app.expertise_Interests') }}</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 1 Nav-->
                                    <!--begin::Wizard Step 2 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                @lang('client_registration.more_details_and_address')</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2 Nav-->
                                    <!--begin::Wizard Step 3 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                @lang('client_registration.representative_details')</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 3 Nav-->

                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                @lang('client_registration.projects_completed')</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                @lang('client_registration.solutions')</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                                {{ __('app.review_submit') }}</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Wizard Nav-->
                            <!--begin: Wizard Body-->
                            <div class="row justify-content-center py-0">
                                <div class="col-xl-10 col-xxl-10">
                                    <!--begin: Wizard Form-->
                                    <form class="form" id="formCreate" method="post" enctype="multipart/form-data"
                                        autocomplete="off" action="{{ route('client.dsp.application.save') }}">
                                        @csrf
                                        <input type="hidden" id="current_step" name="current_step"
                                            value="{{ $currentStep }}">
                                        <input type="hidden" id="id" name="id" value="{{ $model->id ?? 0 }}">
                                        <input type="hidden" id="application_id" name="application_id"
                                            value="{{ $model->application_id ?? 0 }}">

                                        <!--begin: Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                            <h4 class="font-weight-bold text-dark">
                                                @lang('client_registration.business_identification')
                                            </h4>
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="company_name">@lang('client_registration.company_name')</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="company_name" required id="company_name"
                                                                value="{{ $model->company_name ?? '' }}"
                                                                placeholder="@lang('client_registration.company_name')">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="tin">@lang('client_registration.tin')</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="tin" required id="tin"
                                                                value="{{ $model->TIN ?? '' }}"
                                                                placeholder="@lang('client_registration.tin')">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="company_phone">@lang('client_registration.phone_number')</label>
                                                            <input type="tel" class="form-control form-control-sm"
                                                                name="company_phone" required id="company_phone"
                                                                value="{{ $model->company_phone ?? auth('client')->user()->phone }}"
                                                                placeholder="@lang('client_registration.phone_number')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="company_email">@lang('client_registration.email')</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="company_email" required id="company_email"
                                                                value="{{ $model->company_email ?? auth('client')->user()->email }}"
                                                                placeholder="@lang('client_registration.company_email')">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div
                                                                class="d-md-flex justify-content-between align-content-center mb-2">
                                                                <label for="registration_date">@lang('client_registration.registration_date')</label>
                                                            </div>

                                                            <input type="text"
                                                                class="form-control form-control-sm datepicker"
                                                                name="registration_date" required
                                                                value="{{ optional(optional($model)->registration_date)->format('Y-m-d') ?? '' }}"
                                                                id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                                                placeholder="@lang('client_registration.registration_date')">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div
                                                                class="d-md-flex justify-content-between align-content-center mb-1">
                                                                <label for="rdb_certificate">
                                                                    @lang('client_registration.rdb_certificate')
                                                                    @include('partials._default_allowed_file_info')
                                                                </label>
                                                                @if ($model->rdb_certificate ?? 0)
                                                                    <a href="{{ route('dsp.download.file', ['id' => encryptId($model->id), 'type' => 'rdb']) }}"
                                                                        target="_blank" data-toggle="tooltip"
                                                                        title="{{ __('client_registration.download') }}"
                                                                        class="btn btn-light-info py-1 rounded">
                                                                        @include('partials.buttons._svg_download_icon')
                                                                        <span class="d-none d-md-inline">
                                                                            @lang('client_registration.download')
                                                                        </span>
                                                                    </a>
                                                                @endif

                                                            </div>
                                                            <div class="custom-file input-group-sm">
                                                                <input type="file" name="rdb_certificate"
                                                                    class="custom-file-input"
                                                                    {{ optional($model)->rdb_certificate }}
                                                                    id="rdb_certificate">
                                                                <label class="custom-file-label"
                                                                    for="rdb_certificate">@lang('client_registration.choose_file')</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="number_of_employees">@lang('client_registration.number_of_employees')</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="number_of_employees" id="number_of_employees"
                                                                min="0" required
                                                                value="{{ $model->number_of_employees ?? '' }}"
                                                                placeholder="Number of employees">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <strong class="d-block">@lang('client_registration.company_categories')</strong>
                                                            {{--  <select name="" id="" class="custom-select select2 w-100" multiple>
                                                                  <option value=""></option>
                                                                  @foreach ($categories as $item)
                                                                      <option value="">  {{$item->name}}</option>
                                                                  @endforeach
                                                              </select> --}}
                                                            <div class="row">
                                                                @foreach ($categories as $item)
                                                                    <div class="col-md-4 my-1">
                                                                        <label class="checkbox checkbox-info">
                                                                            <input type="checkbox"
                                                                                {{ in_array($item->id, $selected_categories) ? 'checked' : '' }}
                                                                                name="categories_id[]"
                                                                                value="{{ $item->id }}"
                                                                                id="categories_id{{ $item->id }}">
                                                                            {{ $item->name }}
                                                                            <span class="rounded-0"></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <strong class="d-block">@lang('client_registration.business_sectors')</strong>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                @foreach ($businessSectors as $item)
                                                                    <div class="col-md-4 my-2">
                                                                        <label class="checkbox checkbox-info">
                                                                            <input type="checkbox"
                                                                                value="{{ $item->id }}"
                                                                                name="business_sector_id[]"
                                                                                {{ in_array($item->id, $selected_business_sectors) ? 'checked' : '' }} />
                                                                            {{ $item->name }}
                                                                            <span class="rounded-0 border"></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    @include('partials._brief_bio')
                                                </div>
                                            </div>

                                        </div>
                                        <!--end: Wizard Step 1-->

                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">

                                            <div class="my-3">
                                                <h3 class="font-weight-bold text-dark">
                                                    @lang('app.expertise_Interests')
                                                </h3>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('partials._group_area_of_interests')
                                                    </div>

                                                    <div class="col-md-12">
                                                        <h4>@lang('client_registration.area_of_expertise')</h4>
                                                        <div class="form-group">

                                                            <div class="row">
                                                                @foreach ($supportServices as $item)
                                                                    <div class="col-md-4 my-1">
                                                                        <label class="checkbox checkbox-info">
                                                                            <input type="checkbox"
                                                                                {{ in_array($item->id, $selected_supports) ? 'checked' : '' }}
                                                                                name="support_service_id[]"
                                                                                value="{{ $item->id }}"
                                                                                id="support_service_id{{ $item->id }}">
                                                                            {{ $item->name }}
                                                                            <span class="rounded-0"></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 2-->
                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">

                                            <div class="my-3">
                                                <h4 class="font-weight-bold text-dark">
                                                    @lang('client_registration.company_address')
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="province_id">@lang('client_registration.province')</label>
                                                            <select name="province_id" id="province_id"
                                                                class="custom-select">
                                                                <option value="">@lang('client_registration.choose')</option>
                                                                @foreach ($provinces as $item)
                                                                    <option
                                                                        {{ optional($model)->province_id == $item->id ? 'selected' : '' }}
                                                                        value="{{ $item->id }}">{{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="district_id">@lang('client_registration.district')</label>
                                                            <select name="district_id" id="district_id"
                                                                class="custom-select">
                                                                <option value="">@lang('client_registration.choose')</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sector_id">@lang('client_registration.sector')</label>
                                                            <select name="sector_id" id="sector_id"
                                                                class="custom-select">
                                                                <option value="">@lang('client_registration.choose')</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="cell_id">@lang('client_registration.cell')</label>
                                                            <select name="cell_id" id="cell_id" class="custom-select">
                                                                <option value="">@lang('client_registration.choose')</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="village_id">@lang('client_registration.village')</label>
                                                            <select name="village_id" id="village_id"
                                                                class="custom-select">
                                                                <option value="">@lang('client_registration.choose')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="my-3">
                                                <h4 class="font-weight-bold text-dark">@lang('client_registration.more_details')</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="website">@lang('client_registration.website')</label>
                                                            <input type="url" value="{{ $model->website ?? '' }}"
                                                                name="website" id="website"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="company_description">@lang('client_registration.description')</label>
                                                            <textarea class="form-control form-control-sm" name="company_description"
                                                                      id="company_description"
                                                                      placeholder="@lang('client_registration.company_description')">{{ $model->company_description??'' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>


                                        </div>
                                        <!--end: Wizard Step 2-->

                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <h4 class="mb-10 font-weight-bold text-dark">
                                                {{ __('app.company_representative_details') }}
                                            </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_name">@lang('client_registration.representative_name')
                                                        </label>
                                                        <input type="text" name="representative_name"
                                                            id="representative_name" class="form-control form-control-sm"
                                                            value="{{ $model->representative_name ?? '' }}"
                                                            placeholder="@lang('client_registration.full_name')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_email">@lang('client_registration.representative_email')</label>
                                                        <input type="text" name="representative_email"
                                                            id="representative_email" class="form-control form-control-sm"
                                                            value="{{ $model->representative_email ?? '' }}"
                                                            placeholder="@lang('client_registration.email_address')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_phone">@lang('client_registration.representative_phone')</label>
                                                        <input type="text" name="representative_phone"
                                                            id="representative_phone" class="form-control form-control-sm"
                                                            value="{{ $model->representative_phone ?? '' }}"
                                                            placeholder="@lang('client_registration.phone_number')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_position">@lang('client_registration.representative_position')</label>
                                                        <input type="text" name="representative_position"
                                                            id="representative_position"
                                                            class="form-control form-control-sm"
                                                            value="{{ $model->representative_position ?? '' }}"
                                                            placeholder="@lang('client_registration.representative_position')">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_gender">@lang('client_registration.gender')</label>
                                                        <select name="representative_gender" id="representative_gender"
                                                            class="custom-select">
                                                            <option value="">@lang('client_registration.choose')</option>
                                                            @foreach (\App\Constants::genders() as $item)
                                                                <option
                                                                    {{ optional($model)->representative_gender == $item ? 'selected' : '' }}
                                                                    value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="representative_physical_disability">
                                                            @lang('client_registration.physical_disability')
                                                        </label>
                                                        <select name="representative_physical_disability"
                                                            class="custom-select" id="representative_physical_disability">
                                                            <option value="">{{ __('client_registration.choose') }}
                                                            </option>
                                                            @foreach (\App\Models\PhysicalDisability::all() as $item)
                                                                <option
                                                                    {{ optional($model)->representative_physical_disability == $item->name ? 'selected' : '' }}
                                                                    value="{{ $item->name }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end: Wizard Step 3-->
                                        {{--                                @include('partials._certification_awards_tab') --}}
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h4 class="mb-0 font-weight-bold text-dark">
                                                    @lang('client_registration.projects_completed')
                                                </h4>
                                                <button type="button" id="addProjectButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                    @include('partials._add_svg_icon')
                                                    @lang('client_registration.add_new')
                                                </button>
                                            </div>

                                            @if ($projects->count() == 0)
                                                <div
                                                    class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                                    <div class="alert-icon">
                                                        @include('partials._alert_info_icon')
                                                    </div>
                                                    <div class="alert-text">
                                                        {{ __('app.No Projects completed found') }}
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card card-body p-0 rounded-sm">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-solid table-head-custom table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>@lang('client_registration.title')</th>
                                                                    <th>@lang('client_registration.client_name')</th>
                                                                    <th>@lang('client_registration.start_date')</th>
                                                                    <th>@lang('client_registration.end_date')</th>
                                                                    <th>@lang('client_registration.options')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($projects as $item)
                                                                    <tr>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->client_name }}</td>
                                                                        <td>{{ optional($item->start_date)->toDateString() }}
                                                                        </td>
                                                                        <td>{{ optional($item->end_date)->toDateString() }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="">
                                                                                <x-edit-button classes="js-edit"
                                                                                    data-id="{{ $item->id }}"
                                                                                    data-name="{{ $item->name }}"
                                                                                    data-description="{{ $item->description }}"
                                                                                    data-client_name="{{ $item->client_name }}"
                                                                                    data-start_date="{{ optional($item->start_date)->toDateString() }}"
                                                                                    data-end_date="{{ optional($item->end_date)->toDateString() }}" />
                                                                                <x-delete-button :href="route(
                                                                                    'client.projects.destroy',
                                                                                    encryptId($item->id),
                                                                                )" />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="pb-5" data-wizard-type="step-content">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h4 class="mb-0 font-weight-bold text-dark">
                                                    @lang('client_registration.solutions') /@lang('client_registration.product')
                                                    / @lang('client_registration.platform')
                                                </h4>
                                                <button type="button" id="addSolutionButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                    @include('partials._add_svg_icon')
                                                    @lang('client_registration.add_new')
                                                </button>
                                            </div>

                                            @if ($solutions->count() == 0)
                                                <div
                                                    class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                                    <div class="alert-icon">
                                                        @include('partials._alert_info_icon')
                                                    </div>
                                                    <div class="alert-text">
                                                        {{ __('app.solutions found') }}
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card rounded-0 border-0 shadow-none">
                                                    <div class="table-responsive">
                                                        <div class="table-responsive">
                                                            <table class="table table-head-solid table-head-custom">
                                                                <thead>
                                                                    <tr>
                                                                        <th>@lang('client_registration.type')</th>
                                                                        <th>@lang('client_registration.name')</th>
                                                                        <th>@lang('client_registration.platforms')</th>
                                                                        <th>@lang('client_registration.api')</th>
                                                                        <th>@lang('client_registration.options')</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($solutions as $item)
                                                                        <tr>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-{{ $item->typeColor }} rounded">{{ $item->type }}</span>
                                                                            </td>
                                                                            <td>{{ $item->name }}</td>
                                                                            <td>
                                                                                @foreach ($item->platformTypes as $platform)
                                                                                    <span
                                                                                        class="badge badge-secondary rounded">{{ $platform->name }}</span>
                                                                                @endforeach
                                                                            </td>
                                                                            <td>{{ $item->api_name ?? 'N/A' }}</td>
                                                                            <td>
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-center">
                                                                                    <x-edit-button
                                                                                        data-id="{{ $item->id }}"
                                                                                        data-type="{{ $item->type }}"
                                                                                        data-name="{{ $item->name }}"
                                                                                        data-description="{{ $item->description }}"
                                                                                        data-has_api="{{ $item->has_api ? 1 : 0 }}"
                                                                                        data-platforms="{{ $item->platformTypes->pluck('id') }}"
                                                                                        data-api_name="{{ $item->api_name }}"
                                                                                        data-api_link="{{ $item->api_link }}"
                                                                                        data-api_description="{{ $item->api_description }}"
                                                                                        data-platforms_links="{{ $item->platformTypes->pluck('pivot.link') }}"
                                                                                        data-cp_name="{{ $item->dsp_name }}"
                                                                                        data-cp_email="{{ $item->email }}"
                                                                                        data-cp_phone="{{ $item->phone }}"
                                                                                        classes="js-edit-solution mr-2" />

                                                                                    <x-delete-button :href="route(
                                                                                        'client.solutions.destroy',
                                                                                        encryptId($item->id),
                                                                                    )" />
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="pb-5 " data-wizard-type="step-content">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h4 class="mb-0 font-weight-bold text-dark">
                                                    {{ __('app.review_submit') }}
                                                </h4>
                                            </div>

                                            @if ($currentStep == $formTotalSteps)
                                                <x-dsp-registration-details :model="$model" :is-preview="true"
                                                    card-classes="border shadow-sm" />
                                            @endif

                                        </div>

                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between mt-5 pt-10">
                                            @include('partials._wizard_form_buttons')
                                        </div>
                                        <!--end: Wizard Actions-->
                                    </form>
                                    <!--end: Wizard Form-->
                                </div>
                            </div>
                            <!--end: Wizard Body-->
                        </div>
                        <!--end: Wizard-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('partials._certification_award_modal')

    <!-- Modal -->
    @include('partials._add_project_modal')
    <!-- Modal -->
    @include('partials._add_solution_modal')

@stop

@section('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspRegistration::class, '#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateProject::class, '#formSaveProject') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class, '#formSaveSolution') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAward::class, '#formCertificate') !!}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/dsp.js') }}"></script>

    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
    <script>
        $(function() {
            /*//////////*/
            initializeCertificationAward();
            let form = $("#formCreate");
            form.validate();
            let isLoading = false;
            let currentStep = "{{ $currentStep }}";
            currentStep = parseInt(currentStep);
            if (currentStep > {{ $formTotalSteps }}) {
                currentStep = 1;
            }
            let wizard = new KTWizard('kt_wizard_v3', {
                startStep: currentStep, // initial active step number
                clickableSteps: true, // allow step clicking
            });
            form.on('submit', function(e) {
                e.preventDefault();
                if (isLoading === true) return;
                let $btn = $('.js-submit-button');
                const form = $(this);
                if (!form.valid()) return;
                const formData = new FormData(this);
                $btn.addClass('spinner spinner-white spinner-right disabled');
                $btn.prop('disabled', true);
                isLoading = true;
                $.ajax({
                    url: form.attr('action') + "?current_step=" + currentStep,
                    method: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        currentStep++;
                        if (currentStep === {{ $formTotalSteps }}) {
                            location.reload();
                            return;
                        }
                        $('#current_step').val(currentStep);
                        $('#id').val(data.id);
                        $('#application_id').val(data.application_id);
                        if (data.success) {
                            window.location = data.location;
                        } else {
                            wizard.goNext();
                            KTUtil.scrollTop();
                            $btn.removeClass('spinner spinner-white spinner-right disabled')
                                .prop('disabled', false);
                        }
                        isLoading = false;
                    },
                    error: function(response) {
                        showErrors(response);
                        $btn.removeClass('spinner spinner-white spinner-right disabled')
                            .prop('disabled', false);
                        isLoading = false;
                    }
                });
                return false;
            });
            wizard.on('afterPrev', function(wizard) {
                currentStep = wizard.currentStep;
                $('#current_step').val(currentStep);
            });
            wizard.on('beforeNext', function(wizard) {
                currentStep = wizard.currentStep;
                $('#current_step').val(currentStep);
                KTUtil.scrollTop();
                form.trigger('submit');
                KTUtil.scrollTop();
                wizard.stop();
            });
            let loadDistricts = function(provinceId, selectedValue) {
                if (!provinceId) return;
                let element = $('#district_id');
                element.empty();
                element.append("<option value=''>CHOOSE</option>");
                $.getJSON('/districts/' + provinceId)
                    .done(function(response) {
                        element.empty();
                        element.append("<option value=''>CHOOSE</option>");
                        response.forEach(function(item) {
                            element.append("<option value='" + item.id + "' >" + item.name +
                                "</option>");
                        });
                        element.val(selectedValue);
                    });
            };
            let loadSector = function(districtId, selectedValue) {
                if (!districtId) return;
                let element = $('#sector_id');
                element.empty();
                element.append('<option value="">CHOOSE</option>');
                $.getJSON('/sectors/' + districtId, function(data) {
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
                    $.each(data, function(index, value) {
                        element.append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                    element.val(selectedValue);
                });
            };
            let loadCells = function(districtId, selectedValue) {
                if (!districtId) return;
                $.getJSON('/cells/' + districtId, function(data) {
                    let element = $('#cell_id');
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
                    $.each(data, function(index, value) {
                        element.append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                    element.val(selectedValue);
                });
            };
            let loadVillages = function(districtId, selectedValue) {
                if (!districtId) return;
                $.getJSON('/villages/' + districtId, function(data) {
                    let element = $('#village_id');
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
                    $.each(data, function(index, value) {
                        element.append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                    element.val(selectedValue);
                });
            };


            $('#province_id').on('change', function() {

                if (!$(this).val()) return;
                loadDistricts($(this).val(), null);
            });


            $('#district_id').on('change', function() {

                if (!$(this).val()) return;
                loadSector($(this).val(), null);
            });
            $('#sector_id').on('change', function() {

                if (!$(this).val()) return;
                loadCells($(this).val(), null);
            });


            $('#cell_id').on('change', function() {

                if (!$(this).val()) return;
                loadVillages($(this).val(), null);
            });

            loadDistricts({{ $model->province_id ?? 0 }}, {{ $model->district_id ?? 0 }});
            loadSector({{ $model->district_id ?? 0 }}, {{ $model->sector_id ?? 0 }});
            loadCells({{ $model->sector_id ?? 0 }}, {{ $model->cell_id ?? 0 }});
            loadVillages({{ $model->cell_id ?? 0 }}, {{ $model->village_id ?? 0 }});
        });
    </script>


@stop
