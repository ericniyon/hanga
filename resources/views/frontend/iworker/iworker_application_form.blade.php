@extends('client.v2.layout.app')
@section('styles')
@stop
@section('content')

    <div class="container my-5">
        <div class="card  shadow-sm">
            <div class="card-body pb-0">
                <div class=" d-md-flex align-items-center justify-content-between">
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
                        <div class="wizard-steps pb-8 px-lg-0 py-lg-3">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        @lang('client_registration.individual')
                                        /@lang('client_registration.company_details')

                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">@lang('app.expertise_Interests')</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">@lang('client_registration.more_details_and_address')</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>

                            @if(optional($model)->iworker_type==\App\Constants::Company)
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">@lang('client_registration.representative_details')</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">@lang('client_registration.branches')</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">@lang('client_registration.company_employees')</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                            @endif
                            @if(optional($model)->iworker_type==\App\Constants::Individual)
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">@lang('client_registration.certificates_n_trainings')</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">@lang('client_registration.previous_experience') </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            @if(optional($model)->iworker_type==\App\Constants::Individual)
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">@lang('affiliation')</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                            @endif

                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">{{ __('app.review_submit') }}</h3>
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
                                  action="{{ route('client.iworker.application.save') }}">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{ $model->id??0 }}">
                                <input type="hidden" id="current_step" name="current_step" value="{{ $currentStep }}">
                                <input type="hidden" id="application_id" name="application_id"
                                       value="{{ $model->application_id??0 }}">

                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">
                                        @lang('client_registration.individual')
                                        /@lang('client_registration.company_identification')
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label
                                                        for="iworker_type">@lang('client_registration.register_as')</label>
                                                <select name="iworker_type" id="iworker_type" class="custom-select">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    @foreach(\App\Constants::iWorkerTypes() as $item)
                                                        <option
                                                                {{ optional($model)->iworker_type==$item?'selected':''}}
                                                                value="{{ $item }}">
                                                            {{ __("app.".$item) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_type">@lang('client_registration.id_type')</label>
                                                <select name="id_type" id="id_type" class="custom-select">
                                                    <option value="">@lang('client_registration.choose')</option>
                                                    @foreach(\App\Constants::idTypes() as $item)
                                                        <option
                                                                {{ optional($model)->id_type==$item?'selected':'' }}
                                                                value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_number">@lang('client_registration.id_number')</label>
                                                <input type="text" class="form-control" name="id_number"
                                                       id="id_number" value="{{ $model->id_number??'' }}"
                                                       placeholder="@lang('client_registration.id_number')">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">@lang('client_registration.name')</label>
                                                <input type="text" class="form-control" name="name"
                                                       id="name"
                                                       value="{{ $model->name??'' }}"
                                                       placeholder="@lang('client_registration.name')">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">@lang('client_registration.phone_number')</label>
                                                <input type="tel" class="form-control" name="phone"
                                                       id="phone"
                                                       value="{{ $model->phone??auth('client')->user()->phone }}"
                                                       placeholder="@lang('client_registration.phone_number')">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">@lang('client_registration.email')</label>
                                                <input type="email" class="form-control" name="email"
                                                       id="email"
                                                       value="{{ $model->email??auth('client')->user()->email }}"
                                                       placeholder="@lang('client_registration.email')">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="website">@lang('client_registration.website')</label>
                                                <input type="url" class="form-control" name="website"
                                                       id="website" value="{{ $model->website??'' }}"
                                                       placeholder="@lang('client_registration.website')">
                                                <span class="small d-block">
                                                   Start with <strong>www</strong> e.g www.example.com
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label
                                                        for="portfolio_link">@lang('client_registration.portfolio_link')</label>
                                                <input type="url" class="form-control" name="portfolio_link"
                                                       id="portfolio_link" value="{{ $model->portfolio_link??'' }}"
                                                       placeholder="Portfolio link">
                                                <span class="small d-block">
                                                   Start with <strong>www</strong> e.g www.example.com
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 company hide">
                                            <div class="form-group">
                                                <label
                                                        for="comp_date_of_registration">@lang('client_registration.registration_date')</label>
                                                <input type="text" class="form-control datepicker"
                                                       name="comp_date_of_registration"
                                                       value="{{ optional(optional($model)->comp_date_of_registration)->format('Y-m-d')??'' }}"
                                                       id="comp_date_of_registration" max="{{ now()->format('Y-m-d') }}"
                                                       placeholder="@lang('client_registration.registration_date')">
                                            </div>
                                        </div>

                                        <div class="col-md-4 company hide">
                                            <div class="form-group">
                                                <div
                                                        class="d-md-flex justify-content-between align-content-center mb-1">
                                                    <label
                                                            for="rdb_certificate">
                                                        @lang('client_registration.rdb_certificate')
                                                        @include('partials._default_allowed_file_info')
                                                    </label>
                                                    @if($model->rdb_certificate??0)
                                                        <a target="_blank"
                                                           href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                                           data-toggle="tooltip"
                                                           title="{{__('client_registration.download')}}"
                                                           class="btn btn-light-info py-1 rounded">
                                                            @include('partials.buttons._svg_download_icon')
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="rdb_certificate"
                                                           name="rdb_certificate">
                                                    <label class="custom-file-label" for="rdb_certificate">
                                                        @lang('client_registration.choose_file')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 individual hide">
                                            <div class="form-group">
                                                <label for="dob">@lang('client_registration.date_of_birth')</label>
                                                <input type="text" class="form-control datepicker" name="dob"
                                                       value="{{ optional(optional($model)->dob)->format('Y-m-d')??'' }}"
                                                       id="dob"
                                                       max="{{ now()->addYears(-18)->format('Y-m-d') }}"
                                                       placeholder="@lang('client_registration.date_of_birth')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 individual hide">
                                            {{--<h4>Qualifications</h4>--}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gender">@lang('client_registration.gender')</label>
                                                        <select name="gender" id="gender"
                                                                class="custom-select">
                                                            <option
                                                                    value="">@lang('client_registration.choose')</option>
                                                            @foreach(\App\Constants::genders() as $item)
                                                                <option
                                                                        {{ optional($model)->gender==$item?'selected':'' }}
                                                                        value="{{ $item }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                                for="level_of_study_id">@lang('client_registration.level_of_study')</label>
                                                        <select name="level_of_study_id" id="level_of_study_id"
                                                                class="custom-select">
                                                            <option
                                                                    value="">@lang('client_registration.choose')</option>
                                                            @foreach(\App\Models\StudyLevel::all() as $item)
                                                                <option
                                                                        {{ optional($model)->level_of_study_id==$item->id?'selected':'' }}
                                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                                for="field_of_study_id">@lang('client_registration.field_of_study')</label>
                                                        <select name="field_of_study_id" class="custom-select"
                                                                id="field_of_study_id">
                                                            <option
                                                                    value="">{{__('client_registration.choose')}}</option>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div
                                                                class="d-md-flex justify-content-between align-content-center mb-1">
                                                            <label
                                                                    for="supporting_document">
                                                                @lang('client_registration.supporting_document')
                                                                @include('partials._default_allowed_file_info')
                                                            </label>
                                                            @if($model->supporting_document??0)
                                                                <a target="_blank"
                                                                   href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'doc']) }}"
                                                                   data-toggle="tooltip"
                                                                   title="{{__('client_registration.download')}}"
                                                                   class="btn btn-light-info py-1 rounded">
                                                                    @include('partials.buttons._svg_download_icon')
                                                                    <span
                                                                            class="d-none d-inline font-weight-bolder">{{__('client_registration.download')}}</span>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="supporting_document"
                                                                   name="supporting_document">
                                                            <label class="custom-file-label" for="supporting_document">
                                                                @lang('client_registration.choose_file')
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                                for="physical_disability_id">@lang('client_registration.physical_disability')</label>
                                                        <select name="physical_disability_id" class="custom-select"
                                                                id="physical_disability_id">
                                                            <option
                                                                    value="">{{__('client_registration.choose')}}</option>
                                                            @foreach($physicalDisabilities as  $item)
                                                                <option
                                                                        {{ optional($model)->physical_disability_id==$item->id?'selected':'' }}
                                                                        value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong>@lang('client_registration.in_which_category_are_you_are_in')
                                                    ?</strong>
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


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label
                                                        for="business_sector"
                                                        class="font-weight-bolder">@lang('client_registration.what_sector_is_your_business')</label>
                                                <div class="row">
                                                    @foreach($businessSectors as $item)
                                                        <div class="col-md-4">
                                                            <label class="checkbox my-1">
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
                                            @include('partials._brief_bio')
                                        </div>
                                    </div>


                                </div>

                                <div class="pb-5" data-wizard-type="step-content">

                                    <div class="my-3">
                                        <h4 class="font-weight-bold text-dark text-capitalize">
                                            @lang('app.expertise_Interests')
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <strong>{{__('app.area_of_expertise')}}</strong>
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
                                        <h4 class="font-weight-bold text-dark text-capitalize">
                                            @if(optional($model)->iworker_type==\App\Constants::Company)
                                                @lang('client_registration.head_office')
                                            @endif
                                            @lang('client_registration.address')
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label
                                                            for="province_id">@lang('client_registration.province')</label>
                                                    <select name="province_id" id="province_id"
                                                            class="custom-select">
                                                        <option
                                                                value="">@lang('client_registration.choose')</option>
                                                        @foreach($provinces as $item)
                                                            <option

                                                                    {{ optional($model)->province_id==$item->id?'selected':'' }}

                                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label
                                                            for="district_id">@lang('client_registration.district')</label>
                                                    <select name="district_id" id="district_id"
                                                            class="custom-select">
                                                        <option
                                                                value="">@lang('client_registration.choose')</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sector_id">@lang('client_registration.sector')</label>
                                                    <select name="sector_id" id="sector_id"
                                                            class="custom-select">
                                                        <option value="">@lang('client_registration.choose')</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cell_id">@lang('client_registration.cell')</label>
                                                    <select name="cell_id" id="cell_id"
                                                            class="custom-select">
                                                        <option value="">@lang('client_registration.choose')</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
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
                                        <div
                                                x-data="{
                                            credit_access:'{{ optional($model)->credit_access==1?'Yes':'No'}}'
                                            }"
                                                class="row">
                                            <div class="col-md-6 individual">
                                                <div class="form-group">
                                                    @include('partials.forms._device_literacy')
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @if(optional($model)->iworker_type==\App\Constants::Company)
                                                            @lang('client_registration.does_your_company_able_to_attend_an_online_training')
                                                        @else
                                                            @lang('client_registration.are_you_able_to_attend_an_online_class')
                                                            ?
                                                        @endif
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="can_attend_online_class"
                                                               {{ optional($model)->can_attend_online_class==1?'checked':'' }}
                                                               value="{{\App\Constants::Yes}}"/> {{\App\Constants::Yes}}
                                                        <span></span>
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="can_attend_online_class"
                                                               {{ optional($model)->can_attend_online_class==0?'checked':'' }}
                                                               value="{{\App\Constants::No}}"/> {{\App\Constants::No}}
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @if(optional($model)->iworker_type==\App\Constants::Company)
                                                            @lang('client_registration.does_your_company_have_a_bank_account')
                                                            ?
                                                        @else
                                                            @lang('client_registration.do_you_have_a_bank_account') ?
                                                        @endif
                                                    </label>

                                                    <label class="radio">
                                                        <input type="radio" name="has_bank_account"
                                                               {{ optional($model)->has_bank_account==1?'checked':'' }}
                                                               value="Yes"/> Yes
                                                        <span></span>
                                                    </label>

                                                    <label class="radio">
                                                        <input type="radio" name="has_bank_account"
                                                               {{ optional($model)->has_bank_account==0?'checked':'' }}
                                                               value="No"/> No
                                                        <span></span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @if(optional($model)->iworker_type==\App\Constants::Company)
                                                            @lang('client_registration.does_your_company_have_access_to_credit')
                                                            ?
                                                        @else
                                                            @lang('client_registration.do_you_have_access_to_credit') ?
                                                        @endif
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="credit_access" x-model="credit_access"
                                                               {{ optional($model)->credit_access===1?'checked':'' }}
                                                               value="{{ \App\Constants::Yes }}"/> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="credit_access" x-model="credit_access"
                                                               {{ optional($model)->credit_access===0?'checked':'' }}
                                                               value="{{ \App\Constants::No }}"/> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12" x-show="credit_access==='Yes'" x-transition>
                                                <div class="form-group">
                                                    <label
                                                            class="d-block">@lang('client_registration.credit_source')</label>
                                                    <div class="checkbox-inline">
                                                        @foreach(\App\Models\CreditSource::all() as $item)
                                                            <label class="checkbox checkbox-info">
                                                                <input type="checkbox" value="{{ $item->id }}"
                                                                       {{ in_array($item->id,$creditSources)?'checked':'' }}
                                                                       name="credit_sources[]"/> {{ $item->name }}
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @if(optional($model)->iworker_type==\App\Constants::Company)
                                                            @lang('client_registration.what_are_digital_payments_that_can_be_used_to_pay_your_company')
                                                            ?
                                                        @else
                                                            @lang('client_registration.what_are_digital_payments_that_can_be_used_to_pay_you')
                                                            ?
                                                        @endif
                                                    </label>
                                                    <div class="checkbox-inline">
                                                        @foreach(\App\Models\PaymentMethod::all() as $item)
                                                            <label class="checkbox checkbox-info">
                                                                <input type="checkbox" value="{{ $item->id }}"
                                                                       {{ in_array($item->id,$payments)?'checked':'' }}
                                                                       name="digital_payments[]"/> {{ $item->name }}
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @if(optional($model)->iworker_type==\App\Constants::Company)
                                                            @lang('client_registration.does_your_company_have_any_software_development_skills')
                                                            ?
                                                            @lang('client_registration.if_yes_choose_capabilities')
                                                        @else
                                                            @lang('client_registration.do_you_have_any_software_development_skills')
                                                            ?
                                                            @lang('client_registration.if_yes_choose_capabilities')

                                                        @endif
                                                    </label>
                                                    <div class="row">
                                                        @foreach(\App\Models\IworkerSoftSkill::all() as $item)
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="checkbox checkbox-info">
                                                                        <input type="checkbox" value="{{ $item->id }}"
                                                                               {{ in_array($item->id,$skills)?'checked':'' }}
                                                                               name="software_skills[]"/> {{ $item->name }}
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="d-block font-weight-bolder">
                                                        @lang('client_registration.do_you_sell_goods_and_services_over_digital_platforms')
                                                        ?
                                                        @lang('client_registration.if_yes_provide_a_link_fo_those_that_are_applicable')
                                                    </label>
                                                    <div class="row">
                                                        @foreach(\App\Models\DigitalPlatform::all() as $item)
                                                            @php
                                                                $platform=getSelectedPlatform($platforms,$item->id);
                                                            @endphp
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label
                                                                            for="platforms_link{{$item->id}}">{{ $item->name }}</label>
                                                                    <input type="url"
                                                                           value="{{ optional($platform)->link }}"
                                                                           name="platforms_links[]"
                                                                           id="platforms_link{{$item->id}}"
                                                                           class="form-control">
                                                                    <input type="hidden" name="platforms[]"
                                                                           value="{{ $item->id }}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                @if(optional($model)->iworker_type==\App\Constants::Company)
                                    {{--company representative--}}
                                    <div class="pb-5 company hide" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">
                                            @lang('client_registration.representative')
                                        </h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="cp_representative_name">@lang('client_registration.representative_name')</label>
                                                    <input type="text" name="cp_representative_name"
                                                           id="cp_representative_name"
                                                           class="form-control"
                                                           value="{{ $model->cp_representative_name??'' }}"
                                                           placeholder="@lang('client_registration.full_name')">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="cp_representative_email">@lang('client_registration.representative_email')</label>
                                                    <input type="text" name="cp_representative_email"
                                                           id="cp_representative_email"
                                                           class="form-control"
                                                           value="{{ $model->cp_representative_email??'' }}"
                                                           placeholder="@lang('client_registration.email_address')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="cp_representative_phone">@lang('client_registration.representative_phone')</label>
                                                    <input type="text" name="cp_representative_phone"
                                                           id="cp_representative_phone"
                                                           class="form-control"
                                                           value="{{ $model->cp_representative_phone??'' }}"
                                                           placeholder="@lang('client_registration.phone_number')">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="cp_representative_position">@lang('client_registration.representative_position')
                                                    </label>
                                                    <input type="text" name="cp_representative_position"
                                                           id="cp_representative_position"
                                                           class="form-control"
                                                           value="{{ $model->cp_representative_position??'' }}"
                                                           placeholder="@lang('client_registration.position')">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="cp_representative_gender">@lang('client_registration.gender')</label>
                                                    <select name="cp_representative_gender"
                                                            id="cp_representative_gender"
                                                            class="custom-select">
                                                        <option value="">@lang('client_registration.choose')</option>
                                                        @foreach(\App\Constants::genders() as $item)
                                                            <option
                                                                    {{ optional($model)->cp_representative_gender==$item?'selected':'' }}
                                                                    value="{{$item}}">{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                            for="rep_physical_disability_id">@lang('client_registration.physical_disability')</label>
                                                    <select name="rep_physical_disability_id" class="custom-select"
                                                            id="rep_physical_disability_id">
                                                        <option
                                                                value="">{{__('client_registration.choose')}}</option>
                                                        @foreach($physicalDisabilities as  $item)
                                                            <option
                                                                    {{ optional($model)->rep_physical_disability_id==$item->id?'selected':'' }}
                                                                    value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{--Company branches--}}
                                    <div class="pb-5 company hide" data-wizard-type="step-content">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h4 class="mb-0 font-weight-bold text-dark">
                                                @lang('client_registration.branches')
                                            </h4>
                                            <button type="button" id="addBranchButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                @include('partials._add_svg_icon')
                                                @lang('client_registration.add_new')
                                            </button>
                                        </div>
                                        <div class="card card-body p-0 rounded shadow-sm">
                                            <table class="table table-head-solid table-head-custom table-hover">
                                                <thead>
                                                <tr>
                                                    <th>@lang('client_registration.name')</th>
                                                    <th>@lang('client_registration.province')</th>
                                                    <th>@lang('client_registration.district')</th>
                                                    <th>@lang('client_registration.sector')</th>
                                                    <th>@lang('client_registration.cell')</th>
                                                    <th>@lang('client_registration.village')</th>
                                                    <th>@lang('client_registration.options')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($branches as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->province->name }}</td>
                                                        <td>{{ $item->district->name }}</td>
                                                        <td>{{ $item->sector->name }}</td>
                                                        <td>{{ $item->cell->name }}</td>
                                                        <td>{{ $item->village->name }}</td>
                                                        <td>
                                                            <div class="">
                                                                <button type="button"
                                                                        data-id="{{$item->id}}"
                                                                        data-name="{{$item->name}}"
                                                                        data-province="{{$item->province_id}}"
                                                                        data-district="{{$item->district_id}}"
                                                                        data-sector="{{$item->sector_id}}"
                                                                        data-cell="{{$item->cell_id}}"
                                                                        data-village="{{$item->village_id}}"
                                                                        title="Edit" data-toggle="tooltip"
                                                                        class="btn btn-sm btn-light-info js-edit-branch rounded">
                                                                    @include('partials.buttons._edit_svg_icon')
                                                                </button>
                                                                <a href="{{ route('client.iworker.branches.destroy',encryptId($item->id)) }}"
                                                                   title="Delete" data-toggle="tooltip"
                                                                   class="btn btn-sm btn-danger js-delete rounded">
                                                                    @include('partials.buttons._trash_svg_icon')
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @empty
                                                    <tr>
                                                        <td colspan="7">
                                                            @include('partials._no_data')
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                    {{--Company Employees--}}
                                    <div class="pb-5 company hide" data-wizard-type="step-content">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h4 class="mb-0 font-weight-bold text-dark">
                                                @lang('client_registration.company_employees')
                                            </h4>
                                            <button type="button" id="addEmployeeButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                @include('partials._add_svg_icon')
                                                @lang('client_registration.add_new')
                                            </button>
                                        </div>
                                        <div class="card rounded p-0  shadow-sm">
                                            <div class="table-responsive">
                                                <table class="table table-head-solid table-head-custom table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('client_registration.name')</th>
                                                        <th>@lang('client_registration.position')</th>
                                                        <th>@lang('client_registration.rec_date')</th>
                                                        <th>@lang('client_registration.level_of_study')</th>
                                                        <th>@lang('client_registration.field_of_study')</th>
                                                        <th>@lang('client_registration.supporting_document')</th>
                                                        <th>@lang('client_registration.options')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($employees as $item)
                                                        <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->position}}</td>
                                                            <td>{{ optional($item->recruitment_date)->toDateString()}}</td>
                                                            <td>{{ $item->studyLevel->name }}</td>
                                                            <td>{{ $item->fieldOfStudy->name??'' }}</td>
                                                            <td>
                                                                <a href="{{ route('client.employees.download.document',encryptId($item->id)) }}"
                                                                   target="_blank"
                                                                   class="btn btn-sm btn-light-info rounded font-weight-bolder">
                                                                    @include('partials.buttons._svg_download_icon')
                                                                    @lang('client_registration.download')
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="w-100px">
                                                                    <button type="button"
                                                                            data-id="{{$item->id}}"
                                                                            data-name="{{$item->name}}"
                                                                            data-position="{{$item->position}}"
                                                                            data-recruitment_date="{{ optional($item->recruitment_date)->toDateString()}}"
                                                                            data-level_of_study_id="{{$item->level_of_study_id}}"
                                                                            data-field_of_study="{{$item->field_of_study}}"
                                                                            title="Edit" data-toggle="tooltip"
                                                                            class="btn btn-sm btn-info js-edit-employee rounded">
                                                                        @include('partials.buttons._edit_svg_icon')
                                                                    </button>
                                                                    <a href="{{ route('client.iworker.employees.destroy',encryptId($item->id)) }}"
                                                                       title="Delete" data-toggle="tooltip"
                                                                       class="btn btn-sm btn-danger js-delete rounded">
                                                                        @include('partials.buttons._trash_svg_icon')
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7">
                                                                @include('partials._no_data')
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                                {{--Certificates & Trainings--}}
                                @if(optional($model)->iworker_type==\App\Constants::Individual)
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h4 class="mb-0 font-weight-bold text-dark">
                                                @lang('client_registration.certificates_n_trainings')
                                            </h4>
                                            <button type="button" id="addTrainingButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                @include('partials._add_svg_icon')
                                                @lang('client_registration.add_new')
                                            </button>
                                        </div>
                                        @if($certificates->count()==0)
                                            <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                                <div class="alert-icon">
                                                    @include('partials._alert_info_icon')
                                                </div>
                                                <div class="alert-text">
                                                    @lang('client_registration.you_dont_have_any_certificates_n_trainings_added_yet.')
                                                    @lang('client_registration.click')
                                                    <strong>@lang('client_registration.add_new')</strong> @lang('client_registration.add_some')
                                                    .
                                                </div>
                                            </div>
                                        @else
                                            <div class="card card-body p-0 rounded-sm">
                                                <div class="table-responsive">
                                                    <table class="table table-head-solid table-head-custom table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>@lang('client_registration.name')</th>
                                                            <th>@lang('client_registration.issuer')</th>
                                                            <th>@lang('client_registration.issue_date')</th>
                                                            <th>@lang('client_registration.supporting_document')</th>
                                                            <th>@lang('client_registration.options')</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($certificates as $item)
                                                            <tr>

                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->issuer }}</td>
                                                                <td>{{ optional($item->issuance_date)->toDateString() }}</td>
                                                                <td>
                                                                    <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                                                       target="_blank" title="Download"
                                                                       data-toggle="tooltip"
                                                                       class="btn btn-light-info btn-sm rounded font-weight-bolder">
                                                                        @include('partials.buttons._svg_download_icon')
                                                                        <span
                                                                                class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                            class="d-flex align-items-center justify-content-center">
                                                                        <x-edit-button
                                                                                data-id="{{ $item->id }}"
                                                                                data-name="{{ $item->name }}"
                                                                                data-issuer="{{ $item->issuer }}"
                                                                                data-issuance_date="{{ optional($item->issuance_date)->format('Y-m-d') }}"
                                                                                title="Edit" data-toggle="tooltip"
                                                                                class="btn btn-sm btn-light-info js-edit-training rounded font-weight-bolder mr-2"/>

                                                                        <x-delete-button
                                                                                :href="route('client.trainings.destroy',encryptId($item->id)) "
                                                                                title="Delete" data-toggle="tooltip"
                                                                                class="btn btn-sm btn-danger js-delete rounded font-weight-bolder"/>
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
                                @endif

                                {{--Previous experience--}}
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            @lang('client_registration.previous_experience')
                                        </h4>
                                        <button type="button" id="addExperienceButton"
                                                class="btn btn-info btn-sm font-weight-bolder rounded">
                                            @include('partials._add_svg_icon')
                                            @lang('client_registration.add_new')
                                        </button>
                                    </div>
                                    @if($experiences->count()==0)
                                        <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                            <div class="alert-icon">
                                                @include('partials._alert_info_icon')
                                            </div>
                                            <div class="alert-text">
                                                @lang('client_registration.you_dont_have_any_previous_experience_added_yet.') @lang('client_registration.click')
                                                <strong>@lang('client_registration.add_new')</strong> @lang('client_registration.add_some')
                                                .
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-body p-0 rounded-sm">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-head-solid table-head-custom">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('client_registration.service_offered')</th>
                                                        <th>@lang('client_registration.year_of_completion')</th>
                                                        <th>@lang('client_registration.client')</th>
                                                        <th>@lang('client_registration.description')</th>
                                                        <th>@lang('client_registration.options')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($experiences as $item)
                                                        <tr>
                                                            <td>{{ $item->service_offered }}</td>
                                                            <td>{{ $item->year_of_completion }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ str_limit($item->description,50) }}</td>
                                                            <td>
                                                                <div class="">
                                                                    <x-edit-button type="button"
                                                                                   data-id="{{$item->id}}"
                                                                                   data-service_offered="{{$item->service_offered}}"
                                                                                   data-year_of_completion="{{$item->year_of_completion}}"
                                                                                   data-client="{{$item->client}}"
                                                                                   data-description="{{$item->description}}"
                                                                                   classes="js-edit-experience"
                                                                                   :show-text="false"/>

                                                                    <x-delete-button
                                                                            :href="route('client.iworker.experience.destroy',encryptId($item->id))"
                                                                            :show-text="false"/>
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

                                @if(optional($model)->iworker_type==\App\Constants::Individual)
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h4 class="mb-0 font-weight-bold text-dark">
                                                {{ __("app.Affiliation") }}
                                            </h4>
                                            <button type="button" id="addAffiliationButton"
                                                    class="btn btn-info btn-sm font-weight-bolder rounded">
                                                @include('partials._add_svg_icon')
                                                @lang('client_registration.add_new')
                                            </button>
                                        </div>
                                        @if($affiliations->count()==0)
                                            <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
                                                <div class="alert-icon">
                                                    @include('partials._alert_info_icon')
                                                </div>
                                                <div class="alert-text">
                                                    {{ __("app.No_data_available_display_add_New") }}
                                                    .
                                                </div>
                                            </div>
                                        @else
                                            <div class="card card-body p-0 rounded-sm">


                                                <div class="table-responsive">
                                                    <table class="table table-hover table-head-solid table-head-custom">
                                                        <thead>
                                                        <tr>
                                                            <th>{{ __("app.Employer") }}</th>
                                                            <th>
                                                                {{ __("client_registration.position") }}
                                                            </th>
                                                            <th>
                                                                {{ __("client_registration.description") }}
                                                            </th>
                                                            <th>
                                                                {{ __("app.Status") }}
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($affiliations as $item)
                                                            <tr>
                                                                <td>{{ $item->employer->name }}</td>
                                                                <td>{{ $item->position }}</td>
                                                                <td>{{ str_limit($item->description,50) }}</td>
                                                                <td>
                                                                    <span
                                                                            class="badge badge-{{ $item->statusColor }} rounded">
                                                                        {{ $item->status }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <x-edit-button type="button"
                                                                                       data-id="{{$item->id}}"
                                                                                       data-employer_id="{{$item->employer_id}}"
                                                                                       data-position="{{$item->position}}"
                                                                                       data-status="{{$item->status}}"
                                                                                       data-description="{{$item->description}}"
                                                                                       classes="js-edit-affiliation"
                                                                                       :show-text="false"/>

                                                                        <x-delete-button
                                                                                :href="route('client.affiliations.destroy',encryptId($item->id))"
                                                                                :show-text="false"/>
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
                                @endif


                                <div class="pb-5 " data-wizard-type="step-content">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h4 class="mb-0 font-weight-bold text-dark">
                                            {{ __('app.review_submit') }}
                                        </h4>
                                    </div>

                                    @if($currentStep == $totalFormSteps)
                                        <x-iworker-registration-details :model="$model" :review="true"
                                                                        card-classes="border shadow-sm"/>
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

    @include('partials._add_training_modal')

    @include('partials._add_experience_modal')

    @include('partials._add_branch_modal')

    @include('partials._add_employee_modal')


    @include('partials._add_affiliation_modal')

@stop

@section('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateIworker::class,'#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateTraining::class,'#formSaveTraining') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateExperience::class,'#formSaveExperience') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateBranch::class,'#formSaveBranch') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateEmployee::class,'#formSaveEmployee') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAffiliation::class,'#formSaveAffiliation') !!}

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script src="{{ asset('frontend/js/iworker.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
    <script>

        @if(optional($model)->level_of_study_id)
        getFieldOfStudies("{{ optional($model)->level_of_study_id }}", "{{ optional($model)->field_of_study_id }}");
        @endif

        $(function () {


            let isLoading = false;
            let currentStep = "{{$currentStep}}";
            currentStep = parseInt(currentStep);
            /* let finalStep = 8;
             if ($('#iworker_type') === '{{App\Constants::Individual}}') {
                finalStep = 6;
            }*/

            if (currentStep > {{$totalFormSteps}}) {
                currentStep = 1;
            }

            let wizard = new KTWizard('kt_wizard_v3', {
                startStep: currentStep, // initial active step number
                clickableSteps: true,  // allow step clicking
            });

            let form = $("#formCreate");
            form.validate();


            form.on('submit', function (e) {
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

                    success: function (data) {
                        if (currentStep === 1) {
                            location.reload();
                            return;
                        }
                        currentStep++;

                        if (currentStep === {{$totalFormSteps}}) {
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
                form.trigger('submit');
                KTUtil.scrollTop();
                wizard.stop();
            });


            let loadDistricts = function (provinceId, selectedValue, element = $('#district_id')) {
                if (!provinceId) return;
                element.empty();
                element.append("<option value=''>CHOOSE</option>");
                $.getJSON('/districts/' + provinceId)
                    .done(function (response) {
                        element.empty();
                        element.append("<option value=''>CHOOSE</option>");
                        response.forEach(function (item) {
                            element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                        });
                        element.val(selectedValue);
                    });
            };

            let loadSector = function (districtId, selectedValue, element = $('#sector_id')) {
                if (!districtId) return;
                $.getJSON('/sectors/' + districtId, function (data) {
                    element.empty();
                    element.append('<option value=""></option>');
                    $.each(data, function (index, value) {
                        element.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    element.val(selectedValue);
                });

            };
            let loadCells = function (districtId, selectedValue, element = $('#cell_id')) {
                if (!districtId) return;
                $.getJSON('/cells/' + districtId, function (data) {
                    element.empty();
                    element.append('<option value=""></option>');
                    $.each(data, function (index, value) {
                        element.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    element.val(selectedValue);
                });

            };
            let loadVillages = function (districtId, selectedValue, element = $('#village_id')) {
                if (!districtId) return;
                $.getJSON('/villages/' + districtId, function (data) {
                    element.empty();
                    element.append('<option value=""></option>');
                    $.each(data, function (index, value) {
                        element.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    element.val(selectedValue);
                });

            };


            $('#province_id').on('change', function () {
                if (!$(this).val()) return;
                loadDistricts($(this).val(), null);
            });


            $('#district_id').on('change', function () {

                if (!$(this).val()) return;
                loadSector($(this).val(), null);
            });
            $('#sector_id').on('change', function () {

                if (!$(this).val()) return;
                loadCells($(this).val(), null);
            });


            $('#cell_id').on('change', function () {
                if (!$(this).val()) return;
                loadVillages($(this).val(), null);
            });


            loadDistricts({{$model->province_id??0}}, {{$model->district_id??0}});
            loadSector({{$model->district_id??0}}, {{$model->sector_id??0}});
            loadCells({{$model->sector_id??0}}, {{$model->cell_id??0}});
            loadVillages({{$model->cell_id??0}}, {{$model->village_id??0}});

        });


    </script>


@stop
