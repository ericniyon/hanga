@extends("layouts.master")
@section("title",'Report')
@section("css")
    <style>
        .datepicker{
            z-index: 9999 !important;
        }
        .datepicker-orient-top{
            z-index: 9999 !important;
        }
        @media (min-width: 992px){
            .header-fixed {
                z-index: 9 !important;
            }
        }

    </style>
@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader" style="z-index: 9 !important;">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Reports</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Reports</a>
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
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark"> Reports</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Table-->
            <form method="get" action="{{route("admin.generate.report")}}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="select-report"> Reports</label>
                        <select class="form-control select2" id="select-report" name="report">
                            <option value="">SELECT REPORT</option>
                            @foreach($reports as $report)
                                <option data-report="{{$report}}" value="{{$report->id}}">{{$report->report_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="filter_selector"> Select Filter(Optional)</label>
                        <select class="form-control " id="filter_selector" name="filter_selector">
                            <option selected disabled="">--Select Filter--</option>

                        </select>
                    </div>
                    <div class="col-4" id="filter_container">
                        <label for="filter_value"> Filter By <span id="filter_description"> </span> </label>
                        <span data-placement="left" data-toggle="tooltip" data-theme="dark"
                              title="For date filter please follow format yyyy-mm-dd" class="fa fa-question-circle"></span>
                        <input id="filter_value" name="filter_value" class="form-control">
                    </div>
                </div>
                <hr>

                <div class="row" id="period_container">
                    <div class="col-12">
                        <h5 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark"> Period</span>
                        </h5>
                    </div>
                    <div class="form-group col-6">
                        <label for="start_date"> Start Date of <span class="date_filter_name"></span></label>
                        <input required readonly autocomplete="off" value="{{$start_date}}" type="text" name="start_date" id="start_date" class="form-control filter-datepicker">
                    </div>
                    <div class="form-group col-6">
                        <label for="end_date"> End Date of <span class="date_filter_name"></span></label>
                        <input autocomplete="off" required readonly value="{{$end_date}}" type="text" name="end_date" id="end_date" class="form-control filter-datepicker" >
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12">
                            <h3>Column List</h3>
                        </div>
                        <div class="col-12">
                            <div class="row"  id="column_list">

                            </div>
                        </div>
                    </div>

                <div class="row mt-5" id="submit-button-container">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-sm mb-5"><span class="la la-check-circle-o"></span> Generate Report</button>
                    </div>
                </div>
            </form>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>

    <!--end::Notice-->


@stop

@section('scripts')
    <script>
        $('.nav-reporting').addClass('menu-item-active  menu-item-open');
        $('.nav-custom-report').addClass('menu-item-active');

        $('.filter-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            todayBtn: "linked",
            clearBtn: true,
        });
        $('#period_container').hide();
        $("#submit-button-container").hide();
        var filterSelector=$('#filter_selector')
        var reportSelector=$('#select-report');
        reportSelector.val('').trigger("change")
        reportSelector.change(function () {
            var report=$('#select-report option:selected').data("report");
            var columns=report["column_list"].split(",");
            if (report["require_date_filter"]==1){
                $('#period_container').show();
                $('.date_filter_name').html(report["date_filter_description"])
            }else {
                $('#period_container').hide();
            }

            $("#column_list").html("");
              filterSelector.empty();
             filterSelector.append("<option value=''>---select Filter---</option>")

            $("#submit-button-container").show()
            for(var id=0;id <columns.length;id++ ){
                $('#column_list').append("<div class='col-4' style='padding: 2px'>" +
                    "<div class='card' style='padding-left:5px'><div class='row'>" +
                    "<label class='col-9 col-form-label'>"+columns[id]+"</label>" +
                    "<div class='col-3'><span class='switch switch-outline switch-icon switch-success'>" +
                    "<i></i><label style='margin:0'><input type='checkbox' checked value='"+columns[id]+"' name='columnList[]'>" +
                    "<span></span></label></span></div></div> </div></div>")
                filterSelector.append("<option value='"+columns[id]+"'>"+columns[id] +"</option>")

            }
        });
        filterSelector.change(function (){
            $('#filter_container').show();
            $('#filter_description').html($(this).val())
        })

    </script>
@endsection
