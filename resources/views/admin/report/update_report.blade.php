@extends("layouts.master")
@section("title",'Update Report')
@section("css")

@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Update Report</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route("admin.report.list")}}" class="text-muted">Reports</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">update Report</a>
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
                <span class="card-label font-weight-bolder text-dark"> Update Report</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <form method="post" action="{{route("admin.update.report",encryptId($systemReport->id))}}">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="end_date"> Report Name </label>
                        <input  type="text" value="{{$systemReport->report_name}}" name="report_name" placeholder="Enter Report Name" class="form-control" >
                    </div>
                    <div class="form-group col-6">
                        <label for="end_date"> Report Source </label>
                        <input readonly=""  type="text"  value="{{$systemReport->data_source}}" name="report_source" placeholder="Enter Report Name" class="form-control" >
                    </div>
                    <div class="col-6" style="padding: 2px">
                        <label for="end_date">  </label>
                        <div class="card  " style="padding-left:  5px">
                            <div class="row">
                                <label class="col-8 col-form-label  ">Require Date Filter ?</label>
                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
                                                                 <i></i>
																<label style="margin: 0">
																	<input type="checkbox" @if($systemReport->require_date_filter==1)
                                                                           checked=""
                                                                           @endif
                                                                           id="require_date_filter"
                                                                           name="require_date_filter">
																	<span></span>

																</label>
															</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding: 2px">
                        <label for="end_date">  </label>
                        <div class="card  " style="padding-left:  5px">
                            <div class="row">
                                <label class="col-8 col-form-label">Is Report Active ?</label>
                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
                                                                 <i></i>
																<label style="margin: 0">
																	<input type="checkbox" @if($systemReport->is_active==1)
                                                                           checked=""
                                                                           @endif
                                                                           name="is_active">
																	<span></span>

																</label>
															</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6 {{$systemReport->require_date_filter==0?"hide":""}}" id="date_filter_container">
                        <label for="end_date"> Date Filter </label>
                        <select id="date_filter" name="date_filter" class="form-control">
                            <option value=""> --SELECT--</option>
                            @foreach($columns as $column)
                                <option @if($systemReport->date_filter==$column) selected @endif value="{{$column}}">{{$column}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 {{$systemReport->require_date_filter==0?"hide":""}}" id="date_filter_desc_container">
                        <label for="end_date"> Date Filter Description </label>
                        <input  type="text" value="{{$systemReport->date_filter_description}}"
                                name="date_filter_description"
                                placeholder="Enter Date Filter Description"
                                class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3>Column List</h3>
                    </div>
                    @foreach($columns as $column)
                        <div class="col-4" style="padding: 2px">
                            <div class="card  " style="padding-left:  5px">
                                <div class="row">
                                    <label class="col-9 col-form-label  ">{{$column}}</label>
                                    <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
                                                                 <i></i>
																<label style="margin: 0">
																	<input type="checkbox"
                                                                           @if(in_array($column,explode(",",$systemReport->column_list))) checked @endif
                                                                           value="{{$column}}"
                                                                           name="columnList[]">
																	<span></span>

																</label>
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-sm mb-5"><span class="la la-check-circle-o"></span> Update Report</button>
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
        $('.nav-report-list').addClass('menu-item-active');
        $("#require_date_filter").click(function (e) {
            if($('#require_date_filter').is(":checked")){
                $("#date_filter_container").show();
                $("#date_filter_desc_container").show();
            }else {
                $("#date_filter_container").hide();
                $("#date_filter_desc_container").hide();

                $("#date_filter").val("");
                $("#date_filter_desc").val("");
            }



        });
    </script>
@endsection
