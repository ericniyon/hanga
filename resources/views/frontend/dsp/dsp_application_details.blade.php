@extends('client.v2.layout.app')
@section('title', $application->client->registrationType->name . ' application details')
@section('content')

    @include('partials.includes._home_nav')
    <div class="container my-5">

        @include('partials.v2._profile_details_title')

        @include('partials._return_back_message')
        <x-dsp-registration-details card-classes="shadow-sm" :model="$model" :editable="true" />

    </div>
    <input type="hidden" name="application_id" id="application_id" value="{{ $model->application_id }}">


    @include('partials._certification_award_modal')
    @include('partials._add_project_modal')
    <!-- Modal -->
    @include('partials._add_solution_modal')


    <div class="modal fade" id="editDspAddress" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('client_registration.company_address')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.dsp.edit.address.company', $model->id) }}" enctype="multipart/form-data"
                    class="dsp-registration-address" method="post">
                    @csrf
                    <div class="modal-body scroll overflow-hidden">
                        <div class="my-3">
                            <h4 class="font-weight-bold text-dark">
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province_id">@lang('client_registration.province')</label>
                                        <select name="province_id" id="province_id" class="custom-select ">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach ($provinces as $item)
                                                <option {{ optional($model)->province_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district_id">@lang('client_registration.district')</label>
                                        <select name="district_id" id="district_id" class="custom-select ">
                                            <option value="">@lang('client_registration.choose')</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sector_id">@lang('client_registration.sector')</label>
                                        <select name="sector_id" id="sector_id" class="custom-select ">
                                            <option value="">@lang('client_registration.choose')</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cell_id">@lang('client_registration.cell')</label>
                                        <select name="cell_id" id="cell_id" class="custom-select ">
                                            <option value="">@lang('client_registration.choose')</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="village_id">@lang('client_registration.village')</label>
                                        <select name="village_id" id="village_id" class="custom-select ">
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
                                        <input type="url" value="{{ $model->website ?? '' }}" name="website"
                                            id="website" class="form-control">
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label
                                            for="company_description">@lang('client_registration.description')</label>
                                        <textarea class="form-control" name="company_description"
                                                  id="company_description"
                                                  placeholder="@lang('client_registration.company_description')">{{ $model->company_description??'' }}</textarea>

                                    </div>
                                </div>
                            </div> --}}
                        </div>


                    </div>
                    <div class="modal-footer">
                        @include('partials._modal_footer_buttons')
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editDspRepresentative" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('client_registration.representative')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.dsp.edit.representative', $model->id) }}" enctype="multipart/form-data"
                    class="dsp-registration-representative" method="post">
                    @csrf
                    <div class="modal-body scroll overflow-hidden">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representative_name">@lang('client_registration.representative_name')
                                    </label>
                                    <input type="text" name="representative_name" id="representative_name"
                                        class="form-control" value="{{ $model->representative_name ?? '' }}"
                                        placeholder="@lang('client_registration.full_name')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representative_email">@lang('client_registration.representative_email')</label>
                                    <input type="text" name="representative_email" id="representative_email"
                                        class="form-control" value="{{ $model->representative_email ?? '' }}"
                                        placeholder="@lang('client_registration.email_address')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representative_phone">@lang('client_registration.representative_phone')</label>
                                    <input type="text" name="representative_phone" id="representative_phone"
                                        class="form-control" value="{{ $model->representative_phone ?? '' }}"
                                        placeholder="@lang('client_registration.phone_number')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representative_position">@lang('client_registration.representative_position')</label>
                                    <input type="text" name="representative_position" id="representative_position"
                                        class="form-control" value="{{ $model->representative_position ?? '' }}"
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
                                            <option {{ optional($model)->representative_gender == $item ? 'selected' : '' }}
                                                value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representative_physical_disability">
                                        @lang('client_registration.physical_disability')
                                    </label>
                                    <input type="text" name="representative_physical_disability"
                                        id="representative_physical_disability"
                                        value="{{ optional($model)->representative_physical_disability }}"
                                        class="form-control" placeholder="">
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


    <div class="modal fade" id="editDspBusinessIdentification" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('client_registration.business_identification')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.dsp.edit.business.identification', $model->id) }}"
                    enctype="multipart/form-data" class="dsp-registration-identification" method="post">
                    @csrf
                    <div class="modal-body scroll overflow-hidden">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">@lang('client_registration.company_name')</label>
                                    <input type="text" class="form-control" name="company_name" required
                                        id="company_name" value="{{ $model->company_name ?? '' }}"
                                        placeholder="@lang('client_registration.company_name')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tin">@lang('client_registration.tin')</label>
                                    <input type="text" class="form-control" name="tin" required id="tin"
                                        value="{{ $model->TIN ?? '' }}" placeholder="@lang('client_registration.tin')">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_phone">@lang('client_registration.phone_number')</label>
                                    <input type="tel" class="form-control" name="company_phone" required
                                        id="company_phone" value="{{ $model->company_phone ?? '' }}"
                                        placeholder="@lang('client_registration.phone_number')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_email">@lang('client_registration.email')</label>
                                    <input type="email" class="form-control" name="company_email" required
                                        id="company_email" value="{{ $model->company_email ?? '' }}"
                                        placeholder="@lang('client_registration.company_email')">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-md-flex justify-content-between align-content-center mb-2">
                                        <label for="registration_date">@lang('client_registration.registration_date')</label>
                                    </div>

                                    <input type="text" class="form-control datepicker" name="registration_date"
                                        required
                                        value="{{ optional(optional($model)->registration_date)->format('Y-m-d') ?? '' }}"
                                        id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                        placeholder="@lang('client_registration.registration_date')">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-md-flex justify-content-between align-content-center mb-1">
                                        <label for="rdb_certificate">@lang('client_registration.rdb_certificate')</label>
                                        @if ($model->rdb_certificate ?? 0)
                                            <a href="{{ route('dsp.download.file', ['id' => encryptId($model->id), 'type' => 'rdb']) }}"
                                                target="_blank" class="btn btn-light-info py-1 rounded-pill">
                                                @include('partials.buttons._svg_download_icon')
                                                <span class="d-none d-md-inline">
                                                    @lang('client_registration.download')
                                                </span>
                                            </a>
                                        @endif

                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="rdb_certificate" class="custom-file-input"
                                            {{ optional($model)->rdb_certificate == null ? 'required' : '' }}
                                            id="rdb_certificate">
                                        <label class="custom-file-label" for="rdb_certificate">@lang('client_registration.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="number_of_employees">@lang('client_registration.number_of_employees')</label>
                                    <input type="number" class="form-control" name="number_of_employees"
                                        id="number_of_employees" min="0" required
                                        value="{{ $model->number_of_employees ?? '' }}" placeholder="Number of employees">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <strong>
                                        {{ __('client_registration.company_categories') }}
                                    </strong>
                                    <div class="row">
                                        @foreach ($categories as $item)
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                        {{ in_array($item->id, $selected_categories) ? 'checked' : '' }}
                                                        name="categories_id[]" value="{{ $item->id }}"
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

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>
                                        @lang('client_registration.which_of_these_categories_of_support_would_you_need_in_your_business')
                                    </strong>
                                    <div class="row">
                                        @foreach ($supportServices as $item)
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                        {{ in_array($item->id, $selected_supports) ? 'checked' : '' }}
                                                        name="support_service_id[]" value="{{ $item->id }}"
                                                        id="support_service_id{{ $item->id }}">
                                                    {{ $item->name }}
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="business_sector">@lang('client_registration.what_sector_is_your_business')</label>
                                    <div class="row">
                                        @foreach ($businessSectors as $item)
                                            <div class="col-md-4">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $item->id }}"
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
                            <div class="col-md-12">
                                @include('partials._group_area_of_interests')
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bio">{{ __('client_registration.brief_bio') }}</label>
                                    <textarea class="form-control" name="bio" id="bio" placeholder="Description">{{ optional(optional($model)->application)->bio ?? '' }}</textarea>
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
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateProject::class, '#formSaveProject') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class, '#formSaveSolution') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAward::class, '#formCertificate') !!}

    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspAddress::class,'.dsp-registration-address') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspRepresentative::class,'.dsp-registration-representative') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspIdentification::class,'.dsp-registration-identification') !!}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script type="text/javascript" src="{{ mix('frontend/js/dsp.js')}}"></script>
    <script>
        $(function() {
            initializeCertificationAward();

            let loadDistricts = function(provinceId, selectedValue) {
                if (!provinceId) return;
                let element = $('#district_id');
                element.empty();
                element.append("<option value=''>CHOOSE</option>");
                $.getJSON('/districts/' + provinceId)
                    .done(function(response) {
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


            loadDistricts({{ $model->province_id ?? 0 }}, {{ $model->district_id ?? 0 }});
            loadSector({{ $model->district_id ?? 0 }}, {{ $model->sector_id ?? 0 }});
            loadCells({{ $model->sector_id ?? 0 }}, {{ $model->cell_id ?? 0 }});
            loadVillages({{ $model->cell_id ?? 0 }}, {{ $model->village_id ?? 0 }});
        });
    </script>
@stop
