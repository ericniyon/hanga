@extends('client.v2.layout.app')
@section('styles')

@stop
@section('content')

    <div class="container my-5">
        @include('partials._return_back_message')

        <div class="card  shadow-sm rounded">
            <div class="card-body pb-0">

                <div class="d-flex align-items-center justify-content-between">
                    @include('partials.includes.take_me_back')
                    <h4 class="font-weight-bolder">
                        @lang('client_registration.application_form_of') {{ auth('client')->user()->registrationType->name }}
                    </h4>
                </div>

                <!--begin: Wizard-->
                <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        {{-- company information --}}
                        <div class="wizard-steps px-0 pb-8 px-lg-0 py-lg-3">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        @lang('client_registration.company_details')</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->

                            {{-- team section --}}
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Team</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        @lang('client_registration.product')
                                        / @lang('client_registration.services') </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Business Model</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Traction </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Investment & Fundraising </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Review </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="row justify-content-center pb-10 pb-lg-12 ">
                        <div class="col-xl-12 col-xxl-10">
                            <!--begin: Wizard Form-->
                            <form class="form" id="formCreate" method="post" enctype="multipart/form-data"
                                autocomplete="off" action="{{ route('client.startup.application.save') }}">
                                @csrf

                                <input type="hidden" id="id" name="id" value="{{ $model->id ?? 0 }}">
                                <input type="hidden" id="current_step" name="current_step" value="{{ $currentStep }}">
                                <input type="hidden" id="application_id" name="application_id"
                                    value="{{ $model->id ?? 0 }}">

                                {{-- company information --}}
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        @lang('client_registration.business_identification')
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_name">@lang('client_registration.company_name')</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="company_name" id="company_name"
                                                    value="{{ $model->company_name ?? '' }}"
                                                    placeholder="@lang('client_registration.company_name')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tin">@lang('client_registration.tin')</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="tin" id="tin" value="{{ $model->tin ?? '' }}"
                                                            placeholder="@lang('client_registration.tin')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="company_phone">@lang('client_registration.phone_number')</label>
                                                        <input type="tel" class="form-control form-control-sm"
                                                            name="company_phone" id="company_phone"
                                                            value="{{ $model->company_phone ?? auth('client')->user()->phone }}"
                                                            placeholder="@lang('client_registration.phone_number')">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_email">@lang('client_registration.email')</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    name="company_email" id="company_email"
                                                    value="{{ $model->company_email ?? auth('client')->user()->email }}"
                                                    placeholder="@lang('client_regisetration.company_email')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="registration_date">@lang('client_registration.registration_date')</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm datepicker"
                                                            name="registration_date"
                                                            value="{{ $model != null ? \Carbon\Carbon::parse($model->registration_date)->format('Y-m-d') : '' }}"
                                                            id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                                            placeholder="@lang('client_registration.registration_date')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="website">@lang('client_registration.website')</label>
                                                        <input type="url" class="form-control form-control-sm"
                                                            name="website" id="website" min="0"
                                                            value="{{ $model->website ?? '' }}"
                                                            placeholder="@lang('client_registration.website')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="d-md-flex justify-content-between align-content-center mb-1">
                                                    <label for="logo">
                                                        Logo
                                                    </label>
                                                    @if ($model->logo ?? 0)
                                                        <a target="_blank"
                                                            href="{{ Storage::disk('logos')->url($model->logo) }}"
                                                            download="{{ $model->company_name }}-logo"
                                                            class="btn btn-light-info rounded-pill btn-sm py-1">
                                                            @include('partials.buttons._svg_download_icon')
                                                            <span class="d-none d-md-inline">
                                                                @lang('client_registration.download')
                                                            </span>
                                                        </a>
                                                    @endif

                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input"
                                                        id="logo">
                                                    <label class="custom-file-label" for="logo">@lang('client_registration.choose_file')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="d-md-flex justify-content-between align-content-center mb-1">
                                                    <label for="rdb_certificate">@lang('client_registration.rdb_certificate')
                                                        @include('partials._default_allowed_file_info')
                                                    </label>
                                                    @if ($model->rdb_certificate ?? 0)
                                                        <a target="_blank"
                                                            download="{{ $model->company_name }}-certificate"
                                                            href="{{ Storage::disk('rdb_certificate')->url($model->rdb_certificate) }}"
                                                            class="btn btn-light-info rounded-pill btn-sm py-1">
                                                            @include('partials.buttons._svg_download_icon')
                                                            <span class="d-none d-md-inline">
                                                                @lang('client_registration.download')
                                                            </span>
                                                        </a>
                                                    @endif

                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="rdb_certificate"
                                                        class="custom-file-input" id="rdb_certificate">
                                                    <label class="custom-file-label"
                                                        for="rdb_certificate">@lang('client_registration.choose_file')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="d-md-flex justify-content-between align-content-center mb-1">
                                                    <label for="rdb_certificate">Pitch Deck
                                                        @include('partials._default_allowed_file_info')
                                                    </label>
                                                    @if ($model->pitch_deck ?? 0)
                                                        <a target="_blank"
                                                            download="{{ $model->company_name }}-pitch_decks"
                                                            href="{{ Storage::disk('pitch_deck')->url($model->pitch_deck) }}"
                                                            class="btn btn-light-info rounded-pill btn-sm py-1">
                                                            @include('partials.buttons._svg_download_icon')
                                                            <span class="d-none d-md-inline">
                                                                @lang('client_registration.download')
                                                            </span>
                                                        </a>
                                                    @endif

                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="pitch_deck" class="custom-file-input"
                                                        id="pitch_deck">
                                                    <label class="custom-file-label" for="pitch_deck">@lang('client_registration.choose_file')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="mb-3">{{ __('app.business_category') }}</strong>
                                                <div class="row">
                                                    @foreach ($categories as $item)
                                                        <div class="col-md-4 my-1">
                                                            <label class="checkbox checkbox-info">
                                                                <input type="radio"
                                                                    {{ $selected_categories ? 'checked' : '' }}
                                                                    name="company_category" value="{{ $item->id }}"
                                                                    id="categories_id{{ $item->id }}">
                                                                {{ $item->startup_category_name }}
                                                                <span class="rounded-0"></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="business_sector"
                                                    class="font-weight-bolder">@lang('client_registration.what_sector_is_your_business')</label>
                                                <div class="row">
                                                    @foreach ($businessSectors as $item)
                                                        <div class="col-md-4 my-2">
                                                            <label class="checkbox checkbox-info">
                                                                <input type="radio" value="{{ $item->id }}"
                                                                    name="business_sector_id"
                                                                    {{ $selected_sub_categories ? 'checked' : '' }} />
                                                                {{ $item->startup_sub_category_name }}
                                                                <span class="rounded-0 border"></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="form-group">
                                                    <label for="bio" class="d-block font-weight-bolder">
                                                        Short Business Description and Specialization
                                                    </label>
                                                    <textarea class="form-control" name="business_description" id="bio" x-model="content"
                                                        placeholder="Business Description Short and Specialization">{{ $model == null ? '' : $model->bio }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="form-group">
                                                    <label for="problem" class="d-block font-weight-bolder">
                                                        Problem
                                                    </label>
                                                    <textarea class="form-control" name="problem" id="problem" x-model="content" placeholder="Problem">{{ $model == null ? '' : $model->problem }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div data-limit="800" x-data="{ content: '{{ optional($model)->mission ?? '' }}', limit: $el.dataset.limit, get remaining() { var rem = this.limit - this.content.length; if (rem <= 0) return 0; return rem } }">
                                                <div class="form-group">
                                                    <label for="mission"
                                                        class="d-block font-weight-bolder">Mission</label>
                                                    <textarea class="form-control" name="mission" id="mission" x-model="content" placeholder="Mission">{{ $model->mission ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- teams section --}}
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            Company Team
                                        </h4>
                                        <button type="button" data-toggle="modal" data-target="#addAddTeamMateModal"
                                            class="btn btn-info btn-sm font-weight-bolder rounded">
                                            @include('partials._add_svg_icon')
                                            Add
                                        </button>
                                    </div>
                                    @if ($teamMembers->count() == 0)
                                        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                            <div class="alert-icon">
                                                @include('partials._alert_info_icon')
                                            </div>
                                            <div class="alert-text">
                                                You don't have a team mate right now
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-body p-0 rounded-sm  shadow-none">
                                            <div class="table-responsive">
                                                <table class="table table-head-solid table-head-custom">
                                                    <thead>
                                                        <tr>
                                                            <th>Firstname</th>
                                                            <th>Lastname</th>
                                                            <th>Positions</th>
                                                            <th>Phone</th>
                                                            <th>Email</th>
                                                            <th style="min-width: 100px;">@lang('client_registration.options')</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($teamMembers as $item)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ $item->team_linkedin ?? '#!' }}"
                                                                        target=" {{ $item->team_linkedin != null ? '_blank' : '' }}">
                                                                        <span>{{ $item->team_firstname }}</span>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ $item->team_linkedin ?? '#!' }}"
                                                                        target=" {{ $item->team_linkedin != null ? '_blank' : '' }}">
                                                                        <span>{{ $item->team_lastname }}</span>
                                                                    </a>

                                                                </td>
                                                                <td>
                                                                    <span>{{ $item->team_position }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $item->team_phone }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $item->team_email }}</span>
                                                                </td>

                                                                <td>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            data-id="{{ $item->id }}"
                                                                            data-name="{{ $item->team_firstname }}"
                                                                            data-type="{{ $item->type }}"
                                                                            data-description="{{ $item->description }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.edit') }}"
                                                                            class="btn btn-sm btn-light-info js-edit rounded-pill">
                                                                            @include('partials.buttons._edit_svg_icon')
                                                                            <span
                                                                                class="d-none d-md-inline">@lang('client_registration.edit')</span>
                                                                        </button>
                                                                        <a href="{{ route('client.projects.destroy', encryptId($item->id)) }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.delete') }}"
                                                                            class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                            @include('partials.buttons._trash_svg_icon')
                                                                            <span class="d-none d-md-inline">
                                                                                @lang('client_registration.delete')
                                                                            </span>
                                                                        </a>
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

                                {{-- product section --}}
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            Company Solution
                                        </h4>
                                        <button type="button" id="addSolutionButton"
                                            class="btn btn-info btn-sm font-weight-bolder rounded">
                                            @include('partials._add_svg_icon')
                                            @lang('client_registration.add_new')
                                        </button>
                                    </div>
                                    @if ($solutions->count() == 0)
                                        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                            <div class="alert-icon">
                                                @include('partials._alert_info_icon')
                                            </div>
                                            <div class="alert-text">
                                                You don't have any solution right now
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-body p-0 rounded-sm  shadow-none">
                                            <div class="table-responsive">
                                                <table class="table table-head-solid table-head-custom">
                                                    <thead>
                                                        <tr>
                                                            <th>@lang('client_registration.type')</th>
                                                            <th>@lang('client_registration.name')</th>
                                                            <th>@lang('client_registration.description')</th>
                                                            <th style="min-width: 100px;">@lang('client_registration.options')</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($solutions as $item)
                                                            <tr>
                                                                <td>
                                                                    <span
                                                                        class="badge badge-{{ $item->typeColor }} rounded-pill">{{ $item->product_type }}</span>
                                                                </td>
                                                                <td>{{ $item->name }}</td>

                                                                <td>{{ $item->description ?? 'N/A' }}</td>
                                                                <td>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            data-id="{{ $item->id }}"
                                                                            data-name="{{ $item->name }}"
                                                                            data-type="{{ $item->type }}"
                                                                            data-description="{{ $item->description }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.edit') }}"
                                                                            class="btn btn-sm btn-light-info js-edit rounded-pill">
                                                                            @include('partials.buttons._edit_svg_icon')
                                                                            <span
                                                                                class="d-none d-md-inline">@lang('client_registration.edit')</span>
                                                                        </button>
                                                                        <a href="{{ route('client.projects.destroy', encryptId($item->id)) }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.delete') }}"
                                                                            class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                            @include('partials.buttons._trash_svg_icon')
                                                                            <span class="d-none d-md-inline">
                                                                                @lang('client_registration.delete')
                                                                            </span>
                                                                        </a>
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

                                {{-- business model --}}
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div data-limit="800" x-data="{ content: '{{ optional($model)->target_customers ?? '' }}', limit: $el.dataset.limit, get remaining() { var rem = this.limit - this.content.length; if (rem <= 0) return 0; return rem } }">
                                                <div class="form-group">
                                                    <label for="target_customers" class="d-block font-weight-bolder">
                                                        Target Customers
                                                    </label>
                                                    <textarea class="form-control" name="target_customers" id="target_customers" x-model="content"
                                                        placeholder="Who are your Targeted Customers">{{ optional($model)->target_customers ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 row mb-3">
                                            @php
                                                $bsmodel = $model == null ? ($business_model = []) : explode(',', $model->business_model);
                                            @endphp
                                            <label for="revenue_stream" class="d-block font-weight-bolder col-12">
                                                Business Model
                                            </label>
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox checkbox-info">
                                                    <input type="checkbox"
                                                        {{ in_array('B2B', $bsmodel) ? 'checked' : '' }}
                                                        name="business_model[]" value="B2B" id="angel">
                                                    B2B
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox checkbox-info">
                                                    <input type="checkbox"
                                                        {{ in_array('B2C', $bsmodel) ? 'checked' : '' }}
                                                        name="business_model[]" value="B2C" id="angel">
                                                    B2C
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox checkbox-info">
                                                    <input type="checkbox"
                                                        {{ in_array('B2B2C', $bsmodel) ? 'checked' : '' }}
                                                        name="business_model[]" value="B2B2C" id="angel">
                                                    B2B2C
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox checkbox-info">
                                                    <input type="checkbox"
                                                        {{ in_array('C2C', $bsmodel) ? 'checked' : '' }}
                                                        name="business_model[]" value="C2C" id="angel">
                                                    C2C
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox checkbox-info">
                                                    <input type="checkbox"
                                                        {{ in_array('C2B', $bsmodel) ? 'checked' : '' }}
                                                        name="business_model[]" value="C2B" id="angel">
                                                    C2B
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div data-limit="800" x-data="{ content: '{{ optional($model)->revenue_stream ?? '' }}', limit: $el.dataset.limit, get remaining() { var rem = this.limit - this.content.length; if (rem <= 0) return 0; return rem } }">
                                                <div class="form-group">
                                                    <label for="revenue_stream" class="d-block font-weight-bolder">Revenue
                                                        Stream</label>
                                                    <input type="text" class="form-control" name="revenue_stream"
                                                        id="revenue_stream" x-model="content"
                                                        placeholder="Revenue Stream"
                                                        {{ optional($model)->revenue_stream ?? '' }} />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div data-limit="800" x-data="{ content: '{{ optional($model)->customer_value ?? '' }}', limit: $el.dataset.limit, get remaining() { var rem = this.limit - this.content.length; if (rem <= 0) return 0; return rem } }">
                                                <div class="form-group">
                                                    <label for="customer_value" class="d-block font-weight-bolder">What
                                                        value do you bring to
                                                        customers</label>
                                                    <textarea class="form-control" name="customer_value" id="customer_value" x-model="content"
                                                        placeholder="What value do you bring to
                                                        customers">{{ optional($model)->customer_value ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div data-limit="800" x-data="{ content: '{{ optional($model)->gmt_channel ?? '' }}', limit: $el.dataset.limit, get remaining() { var rem = this.limit - this.content.length; if (rem <= 0) return 0; return rem } }">
                                                <div class="form-group">
                                                    <label for="gmt_channel" class="d-block font-weight-bolder">GMT
                                                        Channels</label>
                                                    <input type="text" class="form-control" name="gmt_channel"
                                                        id="gmt_channel" x-model="content" placeholder="GMT Channel"
                                                        {{ optional($model)->gmt_channel ?? '' }} />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Traction --}}
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        Traction
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="market_size_tam">Market size (TAM)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="market_size_tam" id="market_size_tam"
                                                    value="{{ $model->market_size_tam ?? '' }}" placeholder="TAM">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="market_size_sam">Market size (SAM)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="market_size_sam" id="market_size_sam"
                                                    value="{{ $model->market_size_sam ?? '' }}" placeholder="SAM">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="market_size_som">Market size (SOM)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="market_size_som" id="market_size_som"
                                                    value="{{ $model->market_size_som ?? '' }}" placeholder="SOM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="active_users">Number of Active Users</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="active_users" id="active_users"
                                                    value="{{ $model->active_users ?? '' }}"
                                                    placeholder="Number of Active Users">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="active_users">Number of Paying Customers</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="paying_customers" id="paying_customers"
                                                    value="{{ $model->paying_customers ?? '' }}"
                                                    placeholder="Number of Paying Customers">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="anual_recuring_revenue">Anual Recuring Revenue</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="anual_recuring_revenue" id="anual_recuring_revenue"
                                                    value="{{ $model->anual_recuring_revenue ?? '' }}"
                                                    placeholder="Number of Active Users">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="revenue_frequency">Revenue Frequency</label>
                                                <select name="revenue_frequency" id="revenue_frequency"
                                                    class="custom-select">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="quatery">Quatery</option>
                                                    <option value="bi-anual">Bi Anual</option>
                                                    <option value="anualy">Anualy</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="customer_growth_rate">Customer Growth Rate</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="customer_growth_rate" id="customer_growth_rate"
                                                    value="{{ $model->customer_growth_rate ?? '' }}" max="100"
                                                    min="0" placeholder="Customer Growth Rate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gross_transaction_value">Gross Transaction Value (if
                                                    any)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="gross_transaction_value" id="gross_transaction_value"
                                                    value="{{ $model->gross_transaction_value ?? '' }}"
                                                    placeholder="Gross Transaction Value (if any)">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            Company publication
                                        </h4>
                                        <button type="button" data-toggle="modal" data-target="#addpublicationModal"
                                            class="btn btn-info btn-sm font-weight-bolder rounded">
                                            @include('partials._add_svg_icon')
                                            Add
                                        </button>
                                    </div>
                                    @if ($publications->count() == 0)
                                        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                            <div class="alert-icon">
                                                @include('partials._alert_info_icon')
                                            </div>
                                            <div class="alert-text">
                                                You don't have any publication
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-body p-0 rounded-sm  shadow-none">
                                            <div class="table-responsive">
                                                <table class="table table-head-solid table-head-custom">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Type</th>
                                                            {{-- <th style="min-width: 100px;">@lang('client_registration.options')</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($publications as $key => $item)
                                                            <tr>
                                                                <td>
                                                                    {{ $key + 1 }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ $item->url ?? '#!' }}"
                                                                        target=" {{ $item->url != null ? '_blank' : '' }}">
                                                                        <span>{{ $item->title }}</span>
                                                                    </a>

                                                                </td>
                                                                <td>
                                                                    <span>{{ $item->type }}</span>
                                                                </td>

                                                                {{-- <td>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            data-id="{{ $item->id }}"
                                                                            data-name="{{ $item->team_firstname }}"
                                                                            data-type="{{ $item->type }}"
                                                                            data-description="{{ $item->description }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.edit') }}"
                                                                            class="btn btn-sm btn-light-info js-edit rounded-pill">
                                                                            @include('partials.buttons._edit_svg_icon')
                                                                            <span
                                                                                class="d-none d-md-inline">@lang('client_registration.edit')</span>
                                                                        </button>
                                                                        <a href="{{ route('client.projects.destroy', encryptId($item->id)) }}"
                                                                            data-toggle="tooltip"
                                                                            title="{{ __('client_registration.delete') }}"
                                                                            class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                            @include('partials.buttons._trash_svg_icon')
                                                                            <span class="d-none d-md-inline">
                                                                                @lang('client_registration.delete')
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                {{-- Investment & foundraising --}}
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        Investment & fundraising
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="active_users">Current Startup Stage</label>
                                                <select name="current_startup_stage" id="current_startup_stage"
                                                    class="custom-select">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->current_startup_stage == 'pre-seed') ? 'selected' : '' }}
                                                        value="pre-seed">pre-seed</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->current_startup_stage == 'seed') ? 'selected' : '' }}
                                                        value="seed">
                                                        Seed</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->current_startup_stage == 'series a') ? 'selected' : '' }}
                                                        value="series a">Series A</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->current_startup_stage == 'series b') ? 'selected' : '' }}
                                                        value="series b">
                                                        Series B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="previous_investment_size">Previous Investment Size</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="previous_investment_size" id="previous_investment_size"
                                                    value="{{ $model->previous_investment_size ?? '' }}"
                                                    placeholder="Previous Investment Size">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="active_users">Type Of Investment</label>
                                                <select name="previous_investment_type" id="previous_investment_type"
                                                    class="custom-select">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->previous_investment_type == 'n/a') ? 'selected' : '' }}
                                                        value="n/a">N/A</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->previous_investment_type == 'grant') ? 'selected' : '' }}
                                                        value="grant">Grant</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->previous_investment_type == 'equity') ? 'selected' : '' }}
                                                        value="equity">Equity</option>
                                                    <option
                                                        {{ ($model == null ? '' : $model->previous_investment_type == 'dept') ? 'selected' : '' }}
                                                        value="dept">Dept</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="mb-3">
                                                    Target Investors
                                                </strong>
                                                <div class="row">
                                                    @php
                                                        $tgtinvestor = $model == null ? ($target_investors = []) : explode(',', $model->target_investors);
                                                    @endphp
                                                    <div class="col-md-4 my-1">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox" name="target_investors[]"
                                                                value="angel" id="angel"
                                                                {{ in_array('angel', $tgtinvestor) ? 'checked' : '' }}>
                                                            Angel
                                                            <span class="rounded-0"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 my-1">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                {{ in_array('investors', $tgtinvestor) ? 'checked' : '' }}
                                                                name="target_investors[]" value="investors"
                                                                id="Investors">
                                                            Investors
                                                            <span class="rounded-0"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 my-1">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                {{ in_array('VCs', $tgtinvestor) ? 'checked' : '' }}
                                                                name="target_investors[]" value="VCs" id="VCs">
                                                            VCs
                                                            <span class="rounded-0"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 my-1">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                {{ in_array('Corporates', $tgtinvestor) ? 'checked' : '' }}
                                                                name="target_investors[]" value="Corporates"
                                                                id="Corporates">
                                                            Corporates
                                                            <span class="rounded-0"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 my-1">
                                                        <label class="checkbox checkbox-info">
                                                            <input type="checkbox"
                                                                {{ in_array('Grants', $tgtinvestor) ? 'checked' : '' }}
                                                                name="target_investors[]" value="Grants" id="Grants">
                                                            Grants
                                                            <span class="rounded-0"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="target_investment_size">Target Investment Size</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="target_investment_size" id="target_investment_size"
                                                    value="{{ $model->target_investment_size ?? '' }}"
                                                    placeholder="Target Investment Size">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fundraising_breakdown">Fundraising reason/ Breakdown</label>
                                                <textarea name="fundraising_breakdown" class="form-control" id="" cols="30" rows="10">{{ $model == null ? '' : $model->fundraising_breakdown }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- review --}}
                                <div class="pb-5 " data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            {{ __('app.review_submit') }}
                                        </h4>
                                        <a href="{{ $model == null ? '' : route('onepager.download', $model->id) }}"
                                            class="btn btn-light-success font-weight-bolder text-uppercase rounded btn-sm px-4">
                                            Download PDF
                                        </a>
                                    </div>

                                    @if ($currentStep == $steps)
                                        <x-msme-registration-details :review="true" :model="$model"
                                            card-classes="border shadow-sm" />
                                    @endif

                                </div>

                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between  mt-5 pt-10">
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

    @include('partials._msme_add_publication_modal')
    @include('partials._msme_add_team_modal')
    @include('partials._msme_add_solution_modal')
    @include('partials._certification_award_modal')

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateStartupRegistration::class, '#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateStartUpSolution::class, '#formSaveSolution') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateStartupTeam::class, '#formSaveTeam') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateStartUpPublication::class, '#formpub') !!}

    <script src="{{ asset('frontend/js/msme.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
    <script>
        $(function() {
            initializeCertificationAward();

            let form = $("#formCreate");
            form.validate();

            let isLoading = false;
            let currentStep = "{{ $currentStep }}";
            currentStep = parseInt(currentStep);

            if (currentStep > {{ $steps }}) {
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

                let formData = new FormData(this);
                formData.append('current_step', currentStep);
                $btn.addClass('spinner spinner-white spinner-right disabled');
                $btn.prop('disabled', true);
                isLoading = true;
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        currentStep++;
                        if (currentStep === {{ $steps }}) {
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
                // console.log(currentStep);
                form.trigger('submit');
                KTUtil.scrollTop();
                wizard.stop();
            });
        });
    </script>


@stop
