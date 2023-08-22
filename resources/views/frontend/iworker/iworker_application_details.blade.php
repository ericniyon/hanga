@extends('client.v2.layout.app')
@section('title',$application->client->registrationType->name.' application details')
@section('content')

    @include('partials.includes._home_nav')

    <div class="container my-5">
        @include('partials.v2._profile_details_title')
        @include('partials._return_back_message')
        <x-iworker-registration-details card-classes="shadow-sm" :model="$model" :editable="true"/>
    </div>
    <input type="hidden" name="application_id" id="application_id" value="{{ $model->application_id }}">
    <input type="hidden" id="id" name="id" value="{{ $model->id }}">
    @include('partials._add_training_modal')

    @include('partials._add_experience_modal')

    @include('partials._add_branch_modal')

    @include('partials._add_employee_modal')
    @include('partials._add_affiliation_modal')

    <div class="modal fade" id="editCompanyInfoModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Identification
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.iworker.update.information',encryptId($model->id)) }}"
                      id="formUpdateInformation" method="post" class="submit-form">
                    @csrf
                    <input type="hidden" name="iworker_type" value="{{$model->iworker_type}}">
                    <div class="modal-body scroll overflow-hidden" style="max-height:70vh">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="iworker_type" class="d-block">{{__('client_registration.type')}}</label>
                                    <select name="iworker_type" disabled id="iworker_type"
                                            class="custom-select">
                                        <option value=""></option>
                                        @foreach(\App\Constants::iWorkerTypes() as $item)
                                            <option
                                                {{ $model->iworker_type==$item?'selected':'' }} value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{__('client_registration.name')}}</label>
                                    <input type="text" value="{{ $model->name }}"
                                           name="name" id="name"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_type" class="d-block">{{__('client_registration.id_type')}}</label>
                                    <select name="id_type" id="id_type"
                                            class="custom-select">
                                        <option value=""></option>
                                        @foreach(\App\Constants::idTypes() as $item)
                                            <option
                                                {{ $model->id_type==$item?'selected':'' }} value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_number">{{__('client_registration.id_number')}}</label>
                                    <input type="number" value="{{ $model->id_number }}"
                                           name="id_number" id="id_number"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">{{__('client_registration.phone')}}</label>
                                    <input type="tel" value="{{ $model->phone }}"
                                           name="phone" id="phone"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">{{__('client_registration.email')}}</label>
                                    <input type="email" value="{{ $model->email }}"
                                           name="email" id="email"
                                           class="form-control">
                                </div>
                            </div>

                            @if($model->iworker_type==\App\Constants::Individual)

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
                                        <label for="dob">@lang('client_registration.date_of_birth')</label>
                                        <input type="text" class="form-control datepicker" name="dob"
                                               value="{{ optional(optional($model)->dob)->format('Y-m-d')??'' }}"
                                               id="dob"
                                               max="{{ now()->format('Y-m-d') }}"
                                               placeholder="@lang('client_registration.date_of_birth')">
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
                                            for="field_of_study_id">{{__('client_registration.field_of_study')}}</label>
                                        <select name="field_of_study_id" class="custom-select"
                                                id="field_of_study_id">
                                            <option
                                                value="">{{__('client_registration.choose')}}</option>
                                            @foreach($fieldOfStudies as  $item)
                                                <option
                                                    {{ optional($model)->field_of_study_id==$item->id?'selected':'' }}
                                                    value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="supporting_document">@lang('client_registration.supporting_document')</label>
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

                            @else

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="rdb_certificate">@lang('client_registration.rdb_certificate')</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="rdb_certificate"
                                                   name="rdb_certificate">
                                            <label class="custom-file-label" for="rdb_certificate">
                                                @lang('client_registration.choose_file')
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                            @endif

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="website">{{__('client_registration.website')}}</label>
                                    <input type="url" value="{{ $model->website }}"
                                           name="website" id="website"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="portfolio_link">{{__('client_registration.portfolio_link')}}</label>
                                    <input type="url" value="{{ $model->portfolio_link }}"
                                           name="portfolio_link" id="portfolio_link"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        for="physical_disability_id">{{__('client_registration.physical_disability')}}</label>
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


                        <div class="form-group">
                            <strong>Categories</strong>
                            <div class="row">
                                @foreach(\App\Models\CompanyCategory::orderBy('name')->get() as $item)
                                    <div class="col-md-4 my-1">
                                        <label class="checkbox">
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

                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" name="bio"
                                      id="bio">{{ optional($model)->application->bio??'' }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        @include('partials._modal_footer_buttons')
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMoreDetailsModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Address & More details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.iworker.update.more.details',encryptId($model->id)) }}"
                      id="formUpdateMoreDetail" method="post" class="submit-form">
                    @csrf
                    <input type="hidden" name="iworker_type" value="{{$model->iworker_type}}">
                    <div class="modal-body overflow-hidden" id="scrollDetails" style="max-height:70vh">
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
                                                value="">@lang('client_registration.choose_file')</option>
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
                                                value="">@lang('client_registration.choose_file')</option>

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
                                <div class="col-md-4 individual">
                                    <div class="form-group">
                                        @include('partials.forms._device_literacy')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h4 class="font-weight-bold text-dark">@lang('client_registration.more_details')</h4>
                            <div class="row">

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
                                        @foreach(\App\Constants::yesNos() as $item)
                                            <label class="radio">
                                                <input type="radio" name="can_attend_online_class"
                                                       {{ getTruthyValue(optional($model)->can_attend_online_class)==$item?'checked':'' }}
                                                       value="{{$item}}"/> {{$item}}
                                                <span></span>
                                            </label>
                                        @endforeach

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
                                        @foreach(\App\Constants::yesNos() as $item)
                                            <label class="radio">
                                                <input type="radio" name="has_bank_account"
                                                       {{ getTruthyValue(optional($model)->has_bank_account)==$item?'checked':'' }}
                                                       value="{{$item}}"/> {{$item}}
                                                <span></span>
                                            </label>
                                        @endforeach
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
                                        @foreach(\App\Constants::yesNos() as $item)
                                            <label class="radio">
                                                <input type="radio" name="credit_access"
                                                       {{ getTruthyValue(optional($model)->credit_access)==$item?'checked':'' }}
                                                       value="{{$item}}"/> {{$item}}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            class="d-block font-weight-bolder">@lang('client_registration.credit_source')</label>
                                        <div class="checkbox-inline">
                                            @foreach(\App\Models\CreditSource::all() as $item)
                                                <label class="checkbox">
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
                                        <label
                                            for="business_sector"
                                            class="font-weight-bolder">@lang('client_registration.what_sector_is_your_business')</label>
                                        <div class="row">
                                            @foreach($businessSectors as $item)
                                                <div class="col-md-4">
                                                    <label class="checkbox">
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
                                                <label class="checkbox">
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
                                                        <label class="checkbox">
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
                                                        <input type="text"
                                                               value="{{ optional($platform)->link }}"
                                                               name="platforms_link{{$item->id}}"
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

                        <div class="row">
                            <div class="col-md-12">
                                @include('partials._group_area_of_interests')
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong class="d-block">{{__('app.area_of_expertise')}}</strong>
                                    <div class="row">
                                        @foreach($supportServices as $item)
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox">
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

                        </div>
                    </div>
                    <div class="modal-footer">
                        @include('partials._modal_footer_buttons')
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editRepresentativeModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Company representative details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.iworker.update.company.representative',encryptId($model->id)) }}"
                      method="post" class="submit-form">
                    @csrf
                    <input type="hidden" name="iworker_type" value="{{$model->iworker_type}}">
                    <div class="modal-body overflow-hidden" style="max-height:70vh">

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
                    <div class="modal-footer">
                        @include('partials._modal_footer_buttons')
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop


@section('scripts')

    {!! JsValidator::formRequest(\App\Http\Requests\ValidateTraining::class,'#formSaveTraining') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateExperience::class,'#formSaveExperience') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateBranch::class,'#formSaveBranch') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateEmployee::class,'#formSaveEmployee') !!}

    {!! JsValidator::formRequest(\App\Http\Requests\ValidateIworkerInformation::class,'#formUpdateInformation') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateIworkerMoreDetails::class,'#formUpdateMoreDetail') !!}

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/iworker.js')}}"></script>
    <script>

        @if(optional($model)->level_of_study_id)
        getFieldOfStudies("{{ optional($model)->level_of_study_id }}", "{{ optional($model)->field_of_study_id }}");
        @endif
        $(function () {

            let loadDistricts = function (provinceId, selectedValue, element = $('#district_id')) {
                if (!provinceId) return;
                element.empty();
                element.append("<option value=''>CHOOSE</option>");
                $.getJSON('/districts/' + provinceId)
                    .done(function (response) {
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
