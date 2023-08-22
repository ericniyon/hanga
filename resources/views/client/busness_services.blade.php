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

                    <div class="card-body py-4">

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
                                <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
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
                                        <table class="table table-head-solid table-head-custom table-hover">
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
                                                        <td>{{ optional($item->start_date)->toDateString() }}</td>
                                                        <td>{{ optional($item->end_date)->toDateString() }}</td>
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
                                <div class="alert alert-custom alert-notice alert-light-warning  rounded-0">
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
                                                                    <x-edit-button data-id="{{ $item->id }}"
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
                    </div>
                </div>


            </div>

        </div>
    </div>



    @include('partials._certification_award_modal')

    <!-- Modal -->
    @include('partials._add_project_modal')
    <!-- Modal -->
    @include('partials._add_solution_modal')


@endsection


@section('scripts')
    @livewireScripts
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateDspRegistration::class,'#formCreate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateProject::class,'#formSaveProject') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class,'#formSaveSolution') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAward::class,'#formCertificate') !!}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/dsp.js')}}"></script>

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
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

        $('.submit-form').validate();
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

     <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script class="{{ asset('assets/js/pages/custom/wizard/wizard-3.min.js') }}"></script>
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
@stop
