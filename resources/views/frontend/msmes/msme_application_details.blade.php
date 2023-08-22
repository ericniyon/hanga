@extends('client.v2.layout.app')
@section('title',$application->client->registrationType->name.' application details')
@section('content')

@include('partials.includes._home_nav')
    <div class="container my-5">


        @include('partials.v2._profile_details_title')

        @include('partials._return_back_message')

        <x-msme-registration-details card-classes="shadow-sm" :model="$model" :editable="true"/>

    </div>


    <input type="hidden" name="application_id" id="application_id" value="{{ $model->application_id }}">
    @include('partials._certification_award_modal')

    @include('partials._msme_add_solution_modal')
    @include('partials._msmse_edit_biz_identification_modal')
    @include('partials._msmse_edit_representative_modal')
    @include('partials._msmse_edit_company_address_modal')
@stop


@section('scripts')

    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAward::class,'#formCertificate') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateSolution::class,'#formSaveSolution') !!}

    {!! JsValidator::formRequest(\App\Http\Requests\ValidateMsmesBizIdentification::class,'#formeditBizIdentification') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateMsmesCompanyAddress::class,'#formEditCompanyAddress') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateMsmesRepresentative::class,'#formeditRepresentativeDetails') !!}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/msme.js')}}"></script>
    <script>
        $(function () {
            initializeCertificationAward();
        });
    </script>
@stop

