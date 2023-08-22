@extends("layouts.master")
@section("title", 'Report generation')
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Users</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/dashboard" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Report</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--end::Toolbar-->
        </div>
    </div>
@stop
@section("content")
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="flex-wrap card-header">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            Generate Report
                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                    <!--end::Dropdown-->

                    {{-- {{dd($user->permissions)}} --}}
                </div>
                <div class="card-body">
                    <!--begin: Datatable -->
                    <form class="form" action="{{route('admin.general.reporting.generated')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="start_date">Report Name</label>
                                <input required  type="text" name="report_name" id="report_name" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="start_date">Registration Start Date</label>
                                <input required readonly autocomplete="off" type="text" name="start_date" id="start_date" class="form-control end-today-datepicker">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="end_date">Registration End Date</label>
                                <input required readonly  type="text" name="end_date" id="end_date" class="form-control end-today-datepicker" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="registration_types">Registration Type</label>
                                    <select multiple class="form-control" name="types[]" id="registration_types">
                                        @foreach($registrationTypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categories">Registration Type</label>
                                    <select multiple class="form-control" name="categories[]" id="categories">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="business_sectors">Business Sectors</label>
                                    <select multiple class="form-control" name="sectors[]" id="business_sectors">
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="services">Services</label>
                                    <select multiple class="form-control" name="services[]" id="services">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="provinces">Provinces</label>
                                    <select multiple class="form-control" name="provinces[]" id="provinces">
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="districts">Districts</label>
                                    <select multiple class="form-control" name="districts[]" id="districts">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sectors">Sectors</label>
                                    <select multiple class="form-control" name="location_sectors[]" id="sectors">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cells">Cell</label>
                                    <select multiple class="form-control" name="cells[]" id="cells">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="villages">Villages</label>
                                    <select multiple class="form-control" name="villages[]" id="villages">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-default"><span class="la la-close"></span>
                                    Clear
                                </button>
                                <button type="submit" class="btn btn-primary js-submit-button"><span class="la la-check-circle-o"></span>
                                    Generate Report
                                </button>

                            </div>
                        </div>
                    </form>

                </div>


            </div>

        </div>
    </div>
@stop
@section("scripts")
    <script>
        $('.nav-reporting').addClass('menu-item-active  menu-item-open');
        $('.nav-general-report').addClass('menu-item-active');
        let $btn = $('.js-submit-button');

        $(document).on("change","#registration_types",function (){
            loadBusinessAndServices();
        })

        $(document).on("change","#provinces",function (){
            loadDistricts();
        })
        $(document).on("change","#districts",function (){
            loadSector();
        })
        $(document).on("change","#sectors",function (){
            loadCells();
        })
        $(document).on("change","#cells",function (){
            loadVillages();
        })

        let loadDistricts = function () {
            let element = $('#districts');
            element.empty();
            $btn.addClass('spinner spinner-white spinner-right disabled');
            $btn.prop('disabled', true);
            $.ajax({
                url:"{{route('getMultipleDistricts')}}",
                method: "POST",
                data:{
                    "provinces":$('#provinces').val(),
                    "_token":'{{csrf_token()}}'
                },
                success: function (data) {
                    data.forEach(function (item) {
                        element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                    });
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }, error: function (response) {
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }
            })
        };
        let loadSector = function () {
            let element = $('#sectors');
            element.empty();
            $btn.addClass('spinner spinner-white spinner-right disabled');
            $btn.prop('disabled', true);
            $.ajax({
                url:"{{route('getMultipleSectors')}}",
                method: "POST",
                data:{
                    "districts":$('#districts').val(),
                    "_token":'{{csrf_token()}}'
                },
                success: function (data) {
                    data.forEach(function (item) {
                        element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                    });
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }, error: function (response) {
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }
            })

        };
        let loadCells = function () {
            let element = $('#cells');
            element.empty();
            $btn.addClass('spinner spinner-white spinner-right disabled');
            $btn.prop('disabled', true);
            $.ajax({
                url:"{{route('getMultipleCells')}}",
                method: "POST",
                data:{
                    "sectors":$('#sectors').val(),
                    "_token":'{{csrf_token()}}'
                },
                success: function (data) {
                    data.forEach(function (item) {
                        element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                    });
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }, error: function (response) {
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }
            });

        };
        let loadVillages = function () {
            let element = $('#villages');
            element.empty();
            $btn.addClass('spinner spinner-white spinner-right disabled');
            $btn.prop('disabled', true);
            $.ajax({
                url:"{{route('getMultipleVillages')}}",
                method: "POST",
                data:{
                    "cells":$('#cells').val(),
                    "_token":'{{csrf_token()}}'
                },
                success: function (data) {
                    data.forEach(function (item) {
                        element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                    });
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }, error: function (response) {
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }
            });
        };
        let loadBusinessAndServices=function (){
            let categories = $('#categories');
            categories.empty();
            $btn.addClass('spinner spinner-white spinner-right disabled');
            $btn.prop('disabled', true);
            $.ajax({
                url:"{{route('getDedicatedServicesAndBusiness')}}",
                method: "POST",
                data:{
                    "types":$('#registration_types').val(),
                    "_token":'{{csrf_token()}}'
                },
                success: function (data) {
                    data["categories"].forEach(function (item) {
                        categories.append("<option value='" + item.id + "' >" + item.name + "</option>");
                    });
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }, error: function (response) {
                    $btn.removeClass('spinner spinner-white spinner-right disabled')
                        .prop('disabled', false);
                }
            });
        }
        $('.end-today-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            endDate:'today',
            todayHighlight: true,
            todayBtn: "linked",
            clearBtn: true,
        });
    </script>
@stop

