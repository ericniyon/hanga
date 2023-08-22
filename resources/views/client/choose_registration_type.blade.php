@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-none bg-transparent border-0 my-3">

            <div class="card-body">
                <h2 class="text-center">
                    @lang('client_registration.area_intended_to_be_registered_in')
                </h2>
                <div class="row justify-content-center text-center my-0 my-md-25">
                    <!-- begin: Pricing-->
                    <div class="col-md-4 col-xxl-3 bg-white rounded-0 shadow-sm">
                        <div class="pt-25 pb-25 pb-md-10 px-4">
                            <h4 class="mb-15">@lang('client_registration.dsp')</h4>
                            {{-- <span
                                 class="px-7 py-3 font-size-h1 font-weight-bold d-inline-flex flex-center bg-primary-o-10 rounded-lg mb-15">Free</span>
                             <br>--}}
                            <p class="mb-10 d-flex flex-column text-dark-50">
                                <span>@lang('client_registration.dsp_in_full')</span>
                                <span>@lang('client_registration.dsp_short_desc')</span>
                            </p>
                            <a href="{{ route('client.apply.now',['type'=>\App\Models\RegistrationType::DSP]) }}"
                               class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">
                                @lang('client_registration.apply')
                            </a>
                        </div>
                    </div>
                    <!-- end: Pricing-->
                    <!-- begin: Pricing-->
                    <div class="col-md-4 col-xxl-3 bg-primary my-md-n15 rounded-0 shadow-sm">
                        <div class="pt-25 pt-md-37 pb-25 pb-md-10 py-md-28 px-4">
                            <h4 class="text-white mb-15">@lang('client_registration.iworker')</h4>

                            <p class="text-white mb-10 d-flex flex-column">
                                @lang('client_registration.iworker_short_desc')
                            </p>
                            <a href="{{ route('client.apply.now',['type'=>\App\Models\RegistrationType::iWorker]) }}"
                               class="btn btn-white text-uppercase font-weight-bolder px-15 py-3">
                                @lang('client_registration.apply')
                            </a>
                        </div>
                    </div>
                    <!-- end: Pricing-->
                    <!-- begin: Pricing-->
                    <div class="col-md-4 col-xxl-3 bg-white rounded-0 shadow-sm">
                        <div class="pt-25 pb-25 pb-md-10 px-4">
                            <h4 class="mb-15">@lang('client_registration.msme')</h4>
                            <p class="mb-10 d-flex flex-column text-dark-50">
                                {{-- <span> Digital commerce for Micro</span>
                                <span>Small & medium  Enterprises(MSMEs)</span> --}}
                                <span>@lang('client_registration.msme_short_desc')</span>
                            </p>
                            <a href="{{ route('client.apply.now',['type'=>\App\Models\RegistrationType::MSME]) }}"
                               class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">
                                @lang('client_registration.apply')
                            </a>
                        </div>
                    </div>
                    <!-- end: Pricing-->
                </div>
            </div>
        </div>
    </div>
@stop
