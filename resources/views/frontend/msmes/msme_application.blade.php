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
                            <!--end::Wizard Step 1 Nav-->

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        @lang('app.expertise_Interests')</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                       @lang('client_registration.address_n_more')</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>


                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        @lang('client_registration.representative_details')</h3>
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
                                    <h3 class="wizard-title">
                                        {{ __('app.review_submit') }}</h3>
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
                                  autocomplete="off"
                                  action="{{ route('client.msme.application.save') }}">
                                @csrf

                                <input type="hidden" id="id" name="id" value="{{ $model->id??0 }}">
                                <input type="hidden" id="current_step" name="current_step" value="{{ $currentStep}}">
                                <input type="hidden" id="application_id" name="application_id"
                                       value="{{ $model->application_id??0 }}">

                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        @lang('client_registration.business_identification')
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="company_name">@lang('client_registration.company_name')</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="company_name"
                                                       id="company_name" value="{{ $model->company_name??'' }}"
                                                       placeholder="@lang('client_registration.company_name')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tin">@lang('client_registration.tin')</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                               name="tin"
                                                               id="tin" value="{{ $model->tin??'' }}"
                                                               placeholder="@lang('client_registration.tin')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="company_phone">@lang('client_registration.phone_number')</label>
                                                        <input type="tel" class="form-control form-control-sm"
                                                               name="company_phone"
                                                               id="company_phone"
                                                               value="{{ $model->company_phone??auth('client')->user()->phone  }}"
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
                                                       name="company_email"
                                                       id="company_email"
                                                       value="{{ $model->company_email??auth('client')->user()->email  }}"
                                                       placeholder="@lang('client_regisetration.company_email')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="registration_date">@lang('client_registration.registration_date')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm datepicker"
                                                               name="registration_date"
                                                               value="{{ optional(optional($model)->registration_date)->format('Y-m-d')??'' }}"
                                                               id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                                               placeholder="@lang('client_registration.registration_date')">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="number_of_employees">@lang('client_registration.number_of_employees')</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                               name="number_of_employees"
                                                               id="number_of_employees" min="0"
                                                               value="{{ $model->number_of_employees??'' }}"
                                                               placeholder="@lang('client_registration.number_of_employees')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div
                                                    class="d-md-flex justify-content-between align-content-center mb-1">
                                                    <label
                                                        for="rdb_certificate">@lang('client_registration.rdb_certificate')
                                                        @include('partials._default_allowed_file_info')
                                                    </label>
                                                    @if($model->rdb_certificate??0)
                                                        <a target="_blank"
                                                           href="{{ route('msme.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                                           class="btn btn-light-info rounded-pill btn-sm py-1">
                                                            @include('partials.buttons._svg_download_icon')
                                                            <span class="d-none d-md-inline">
                                                                @lang('client_registration.download')
                                                          </span>
                                                        </a>
                                                    @endif

                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="rdb_certificate" class="custom-file-input"
                                                           id="rdb_certificate">
                                                    <label class="custom-file-label"
                                                           for="rdb_certificate">@lang('client_registration.choose_file')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{__('app.business_category')}}</strong>
                                                <div class="row">
                                                    @foreach($categories as $item)
                                                        <div class="col-md-4 my-1">
                                                            <label class="checkbox checkbox-info">
                                                                <input type="checkbox"
                                                                       {{in_array($item->id,$selected_categories) ? 'checked' : ''}} name="categories_id[]"
                                                                       value="{{$item->id}}"
                                                                       id="categories_id{{$item->id}}">
                                                                {{$item->name}}
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
                                                <label
                                                    for="business_sector"
                                                    class="font-weight-bolder">@lang('client_registration.what_sector_is_your_business')</label>
                                                <div class="row">
                                                    @foreach($businessSectors as $item)
                                                        <div class="col-md-4">
                                                            <label class="checkbox checkbox-info">
                                                                <input type="checkbox" value="{{$item->id}}"
                                                                       name="business_sector_id[]" {{in_array($item->id,$selected_business_sectors) ? 'checked' : ''}}/>
                                                                {{$item->name}}
                                                                <span class="rounded-0 border"></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="business_sector" class="font-weight-bolder">
                                                    @lang('client_registration.which_payment_does_your_business_offer')?
                                                </label>
                                                <div class="row">
                                                    @foreach($paymentMethods as $item)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="checkbox checkbox-info">
                                                                    <input type="checkbox" value="{{$item->id}}"
                                                                           name="payment_method_id[]" {{in_array($item->id,$selected_payments) ? 'checked' : ''}}/>
                                                                    {{$item->name}}
                                                                    <span class="rounded-0"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="platform_business" class="font-weight-bolder">
                                                    @lang('client_registration.does_your_business_currently_selling_services_or_goods_over_digital_platforms')
                                                    ?
                                                    @lang('client_registration.if_any_choose_at_least_one')?
                                                </label>
                                                <div class="row">
                                                    @foreach($platforms as $item)
                                                        <div class="col-md-4">
                                                            <label class="checkbox checkbox-info">
                                                                <input type="checkbox" value="{{$item->id}}"
                                                                       name="platform_id[]" {{in_array($item->id,$selected_platforms) ? 'checked' : ''}}/>
                                                                {{$item->name}}
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
                                            @include('partials._brief_bio')
                                        </div>
                                    </div>

                                </div>

                                <div class="pb-5" data-wizard-type="step-content">


                                    <div class="my-3">
                                        <h4 class="font-weight-bold text-dark">
                                            @lang('app.expertise_Interests')
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <strong>
                                                        {{__('app.which_category_digital_services_interested_in')}}
                                                    </strong>
                                                    <div class="row">
                                                        @foreach($supportServices as $item)
                                                            <div class="col-md-4 my-1">
                                                                <label class="checkbox checkbox-info">
                                                                    <input type="checkbox"
                                                                           {{in_array($item->id,$selected_supports) ? 'checked' : ''}} name="support_service_id[]"
                                                                           value="{{$item->id}}"
                                                                           id="support_service_id{{$item->id}}">
                                                                    {{$item->name}}
                                                                    <span class="rounded-0"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                @include('partials._group_area_of_interests')
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="pb-5" data-wizard-type="step-content">


                                    <div class="my-3">
                                        <h4 class="font-weight-bold text-dark">
                                            @lang('client_registration.company_address')
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="province_id">@lang('client_registration.province')</label>
                                                    <select name="province_id" id="province_id" required
                                                            class="form-control  form-control-sm">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach($provinces as $item)
                                                            <option
                                                                {{ optional($model)->province_id==$item->id?'selected':'' }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="district_id">@lang('client_registration.district')</label>
                                                    <select name="district_id" id="district_id" required
                                                            class="form-control  form-control-sm">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach($districts as $item)
                                                            <option
                                                                {{ optional($model)->district_id == $item->id?'selected':'' }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sector_id">@lang('client_registration.sector')</label>
                                                    <select name="sector_id" id="sector_id" required
                                                            class="form-control  form-control-sm">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach($sectors as $item)
                                                            <option
                                                                {{ optional($model)->sector_id == $item->id?'selected':'' }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cell_id">@lang('client_registration.cell')</label>
                                                    <select name="cell_id" id="cell_id" required
                                                            class="form-control  form-control-sm">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach($cells as $item)
                                                            <option
                                                                {{ optional($model)->cell_id == $item->id?'selected':'' }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="village_id">@lang('client_registration.village')</label>
                                                    <select name="village_id" id="village_id" required
                                                            class="form-control form-control-sm">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach($villages as $item)
                                                            <option
                                                                {{ optional($model)->village_id == $item->id?'selected':'' }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
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
                                                    <input type="url" value="{{ $model->website??'' }}"
                                                           name="website" required
                                                           id="website" class="form-control form-control-sm">
                                                </div>
                                            </div>

                                        </div>
                                        {{-- <div class="row">
                                             <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label
                                                         for="company_description">@lang('client_registration.description')</label>
                                                     <textarea class="form-control form-control-sm"
                                                               name="company_description"
                                                               id="company_description" required
                                                               placeholder="@lang('client_registration.company_description')">{{ $model->company_description??'' }}</textarea>
                                                 </div>
                                             </div>
                                         </div>--}}
                                    </div>


                                </div>

                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        @lang('client_registration.representative')
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="representative_name">@lang('client_registration.representative_name')</label>
                                                <input type="text" name="representative_name" id="representative_name"
                                                       class="form-control form-control-sm" required
                                                       value="{{ $model->representative_name??'' }}"
                                                       placeholder="@lang('client_registration.full_name')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="representative_email">@lang('client_registration.representative_email')</label>
                                                <input type="text" name="representative_email" id="representative_email"
                                                       class="form-control form-control-sm" required
                                                       value="{{ $model->representative_email??'' }}"
                                                       placeholder="@lang('client_registration.email_address')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="representative_phone">@lang('client_registration.representative_phone')</label>
                                                <input type="text" name="representative_phone" id="representative_phone"
                                                       class="form-control form-control-sm" required
                                                       value="{{ $model->representative_phone??'' }}"
                                                       placeholder="@lang('client_registration.phone_number')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="representative_position">@lang('client_registration.representative_position')</label>
                                                <input type="text" name="representative_position"
                                                       id="representative_position"
                                                       class="form-control form-control-sm" required
                                                       value="{{ $model->representative_position??'' }}"
                                                       placeholder="@lang('client_registration.position')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="representative_gender">@lang('client_registration.gender')</label>
                                                <select name="representative_gender" id="representative_gender" required
                                                        class="form-control form-control-sm">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    @foreach(\App\Constants::genders() as $item)
                                                        <option
                                                            {{ optional($model)->representative_gender==$item?'selected':'' }}
                                                            value="{{$item}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @include('partials.forms._physical_disability')
                                        </div>
                                    </div>

                                </div>

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            @lang('client_registration.products')
                                            & @lang('client_registration.services')
                                        </h4>
                                        <button type="button" id="addSolutionButton"
                                                class="btn btn-info btn-sm font-weight-bolder rounded">
                                            @include('partials._add_svg_icon')
                                            @lang('client_registration.add_new')
                                        </button>
                                    </div>
                                    @if($solutions->count()==0)
                                        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                            <div class="alert-icon">
                                                @include('partials._alert_info_icon')
                                            </div>
                                            <div class="alert-text">
                                                @lang('client_registration.you_dont_have_any_product_or_service_added_yet') @lang('client_registration.click')
                                                <strong>@lang('client_registration.add_new')
                                                </strong> @lang('client_registration.add_some').
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
                                                    @foreach($solutions as $item)
                                                        <tr>
                                                            <td>
                                                                <span
                                                                    class="badge badge-{{ $item->typeColor }} rounded-pill">{{ $item->type }}</span>
                                                            </td>
                                                            <td>{{ $item->name }}</td>

                                                            <td>{{ $item->description??'N/A' }}</td>
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
                                                                    <a href="{{ route('client.projects.destroy',encryptId($item->id)) }}"
                                                                       data-toggle="tooltip"
                                                                       title="{{ __('client_registration.delete') }}"
                                                                       class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                        @include('partials.buttons._trash_svg_icon')
                                                                        <span
                                                                            class="d-none d-md-inline">
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


                                <div class="pb-5 " data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                          {{ __("app.review_submit") }}
                                        </h4>
                                    </div>

                                    @if($currentStep == $steps)
                                        <x-msme-registration-details
                                                :review="true"
                                                :model="$model" card-classes="border shadow-sm"/>
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

    @include('partials._msme_add_solution_modal')
    @include('partials._certification_award_modal')

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateMsmeRegistration::class,'#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class,'#formSaveSolution') !!}

    <script src="{{ asset('frontend/js/msme.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
    <script>
        $(function () {
            initializeCertificationAward();

            let form = $("#formCreate");
            form.validate();

            let isLoading = false;
            let currentStep = "{{$currentStep}}";
            currentStep = parseInt(currentStep);

            if (currentStep > {{ $steps }}) {
                currentStep = 1;
            }

            let wizard = new KTWizard('kt_wizard_v3', {
                startStep: currentStep, // initial active step number
                clickableSteps: true,  // allow step clicking
            });

            form.on('submit', function (e) {
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
                    success: function (data) {
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
                    }, error: function (response) {
                        showErrors(response);

                        $btn.removeClass('spinner spinner-white spinner-right disabled')
                            .prop('disabled', false);
                        isLoading = false;
                    }
                });
                return false;
            });

            wizard.on('afterPrev', function (wizard) {
                currentStep = wizard.currentStep;
                $('#current_step').val(currentStep);
            });
            wizard.on('beforeNext', function (wizard) {
                currentStep = wizard.currentStep;
                $('#current_step').val(currentStep);
                KTUtil.scrollTop();
                console.log(currentStep);
                form.trigger('submit');
                KTUtil.scrollTop();
                wizard.stop();
            });
        });

    </script>


@stop
