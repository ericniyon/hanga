@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @include('partials.includes._home_nav')

    <style>
        .sideList {
            text-align: center;
            font-size: 1.3rem;
        }

        .sideList li {
            width: 400px;
            padding: 1.3rem;
            left: 0%;
            right: 0%;
            top: 0%;
            bottom: 83.33%;
        }

        .sideList li a {
            padding-bottom: 1.3rem;
            padding-left: 1.3rem;
            padding-top: 1.3rem;
            padding-right: 4rem;
            background: #ddd;
            background: #F8F8F8;
            border-radius: 32px;


        }
    </style>
    <div class="container-fluid tw-bg-gray-50">
        <div class="row" style="margin: auto 3rem">
            <div class="col-lg-3 my-5">

                @livewire('partials.side-nav')
                {{-- profiling --}}

                <div class="card shadow-none rounded border-0 mb-4 mt-5">

                    <!--begin::Body-->
                    <div class="card-body px-4 overflow-auto">
                        <h4 class="mb-3">
                            {{ __('app.Recent connection requests') }}
                        </h4>
                        <div class="list-group list-group-flush rounded-bottom">
                            {{-- @forelse($pendingRequest as $pending)
                                @php
                                    $requester=$pending->requester;
                                @endphp
                                <x-client-item :item="$requester"/>
                            @empty
                                <div class="alert alert-custom alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __("app.There is no pending connection request available") }}
                                    </div>
                                </div>
                            @endforelse --}}

                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <div class="card shadow-none rounded border-0 mb-4">
                    <div class="card-header p-4 border-bottom-0">
                        <h4 class="mb-0">
                            {{ __('app.Recent messages') }}
                        </h4>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse(recentMessage() as $message)
                                @php
                                    $amMessagingTo = amMessagingTo($message->id);
                                @endphp
                                @if ($amMessagingTo)
                                    <a href="{{ route('client.my.messages', ['client' => encryptId($amMessagingTo->id ?? '0')]) }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{ optional($amMessagingTo)->name }}</h6>
                                                <p class="mb-1 small text-muted">{{ str_limit($message->message, 20) }}

                                                </p>
                                            </div>
                                            <small>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @endif
                            @empty
                                <div class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __('app.There is no recent messages') }}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @include('partials._your_dashboard')
                        </div>
                    </div>
                    <!--end::Body-->
                </div>

                {{-- <x-profile-card :editable="true" classes="" :application="$application"/> --}}

            </div>




            <div class="col-lg-9 my-5 mx-5">
                <div class="card shadow-none rounded border-0 mb-4">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="">
                            <span> <span id="greeting" style="font-size: 1rem"></span> :
                                {{ auth('client')->user()->name }}</span>
                        </div>
                        <div class="py-2">
                            <h3>Complete Profile</h3>
                        </div>
                    </div>

                    <!--end::Body-->
                </div>

                <div class="card shadow-none rounded border-0 mb-4">

                    <form action="{{ route('client.dsp.update.business.identification', $model) }}" method="POST">
                        @csrf

                        <div class="card-body py-4">

                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h4 class="font-weight-bold text-dark">
                                @lang('client_registration.business_identification')
                            </h4>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name">@lang('client_registration.company_name')</label>
                                            <input type="text" class="form-control form-control-sm" name="company_name"
                                                required id="company_name" value="{{ $model->company_name ?? '' }}"
                                                placeholder="@lang('client_registration.company_name')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tin">@lang('client_registration.tin')</label>
                                            <input type="number" class="form-control form-control-sm" name="tin"
                                                required id="tin" value="{{ $model->TIN ?? '' }}"
                                                placeholder="@lang('client_registration.tin')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_phone">@lang('client_registration.phone_number')</label>
                                            <input type="tel" class="form-control form-control-sm" name="company_phone"
                                                required id="company_phone"
                                                value="{{ $model->company_phone ?? auth('client')->user()->phone }}"
                                                placeholder="@lang('client_registration.phone_number')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_email">@lang('client_registration.email')</label>
                                            <input type="email" class="form-control form-control-sm" name="company_email"
                                                required id="company_email"
                                                value="{{ $model->company_email ?? auth('client')->user()->email }}"
                                                placeholder="@lang('client_registration.company_email')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="d-md-flex justify-content-between align-content-center mb-2">
                                                <label for="registration_date">@lang('client_registration.registration_date')</label>
                                            </div>

                                            <input type="text" class="form-control form-control-sm datepicker"
                                                name="registration_date" required
                                                value="{{ optional(optional($model)->registration_date)->format('Y-m-d') ?? '' }}"
                                                id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                                placeholder="@lang('client_registration.registration_date')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="d-md-flex justify-content-between align-content-center mb-1">
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
                                                <input type="file" name="rdb_certificate" class="custom-file-input"
                                                    {{ optional($model)->rdb_certificate }} id="rdb_certificate">
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
                                                name="number_of_employees" id="number_of_employees" min="0"
                                                required value="{{ $model->number_of_employees ?? '' }}"
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
                                </div>

                                <div class="col-md-12">
                                    @include('partials._brief_bio')
                                </div>
                            </div>

                        </div>

                        <button type="submit"
                            class="btn btn-primary font-weight-bolder text-uppercase rounded btn-sm js-submit-button"
                            data-wizard-type="action-submit">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            @lang('Update')
                        </button>

                    </div>
                    </form>
                </div>


            </div>

        </div>
    </div>






@endsection


@section('scripts')
    @livewireScripts
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspRegistration::class,'#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateProject::class,'#formSaveProject') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class,'#formSaveSolution') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAward::class,'#formCertificate') !!}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/dsp.js')}}"></script>

      <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function() {
            readURL(this);
        });


    </script>
<script>
        $(function () {
            /*//////////*/
            initializeCertificationAward();
            let form = $("#formCreate");
            form.validate();
            let isLoading = false;
            let currentStep = "{{$currentStep}}";
            currentStep = parseInt(currentStep);
            if (currentStep > {{ $formTotalSteps }}) {
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
                        currentStep++;
                        if (currentStep === {{$formTotalSteps}}) {
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
            let loadDistricts = function (provinceId, selectedValue) {
                if (!provinceId) return;
                let element = $('#district_id');
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
            let loadSector = function (districtId, selectedValue) {
                if (!districtId) return;
                let element = $('#sector_id');
                element.empty();
                element.append('<option value="">CHOOSE</option>');
                $.getJSON('/sectors/' + districtId, function (data) {
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
                    $.each(data, function (index, value) {
                        element.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    element.val(selectedValue);
                });
            };
            let loadCells = function (districtId, selectedValue) {
                if (!districtId) return;
                $.getJSON('/cells/' + districtId, function (data) {
                    let element = $('#cell_id');
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
                    $.each(data, function (index, value) {
                        element.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    element.val(selectedValue);
                });
            };
            let loadVillages = function (districtId, selectedValue) {
                if (!districtId) return;
                $.getJSON('/villages/' + districtId, function (data) {
                    let element = $('#village_id');
                    element.empty();
                    element.append('<option value="">CHOOSE</option>');
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
    <script>
        function greeting() {
            var myDate = new Date();
            var hrs = myDate.getHours();

            var greet;

            if (hrs < 12)
                greet = 'Good Morning';
            else if (hrs >= 12 && hrs <= 17)
                greet = 'Good Afternoon';
            else if (hrs >= 17 && hrs <= 24)
                greet = 'Good Evening';
            document.getElementById('greeting').innerHTML = greet
        }
        greeting()
    </script>
@stop
