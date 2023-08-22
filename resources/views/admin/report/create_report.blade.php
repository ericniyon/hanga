@extends("layouts.master")
@section("title",'Create Report')

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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Create Reports</h5>
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
                <span class="card-label font-weight-bolder text-dark"> Create New Reports</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <form method="post" action="{{route("admin.create.report")}}">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="end_date"> Report Name </label>
                        <input  type="text" name="report_name" placeholder="Enter Report Name" class="form-control" >
                    </div>
                    <div class="form-group col-6">
                        <label for="end_date"> Report Source </label>
                        <input readonly=""  type="text"  value="{{$reportSource->name}}" name="report_source" placeholder="Enter Report Name" class="form-control" >
                    </div>
                    <div class="col-3" style="padding: 2px">
                        <label for="end_date">  </label>
                        <div class="card  " style="padding-left:  5px">
                            <div class="row">
                                <label class="col-8 col-form-label  ">Require Date Filter?</label>
                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
                                                                 <i></i>
																<label style="margin: 0">
																	<input type="checkbox" id="require_date_filter"
                                                                           name="require_date_filter">
																	<span></span>

																</label>
															</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-4" id="date_filter_container">
                        <label for="date_filter"> Date Filter </label>
                        <select id="date_filter" name="date_filter" class="form-control">
                            <option value=""> --SELECT--</option>
                            @foreach($columns as $column)
                                <option value="{{$column}}">{{$column}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-5" id="date_filter_desc_container">
                        <label for="date_filter_desc"> Date Filter Description </label>
                        <input id="date_filter_desc"  type="text"  name="date_filter_description" placeholder="Enter Date Filter Description" class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3>Column List</h3>
                    </div>
                    <div class="col-12">
                        <div class="col-3" style="padding: 2px">
                            <label for="end_date">  </label>
                            <div class="card  " style="padding-left:  5px">
                                <div class="row">
                                    <label class="col-8 col-form-label  ">Select All Column</label>
                                    <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
                                                                 <i></i>
																<label style="margin: 0">
																	<input type="checkbox" id="select_all"
                                                                           name="select_all">
																	<span></span>
																</label>
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                                           value="{{$column}}"
                                                                           name="columnList[]" class="column">
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
                        <button type="submit" class="btn btn-primary btn-sm mb-5"><span class="la la-check-circle-o"></span> Create Report</button>
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
        $("#date_filter_container").hide();
        $("#date_filter_desc_container").hide();
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
        $("#select_all").click(function (e) {
           if($('#select_all').is(":checked")){
               $(".column"). prop("checked", true);
           }else{
               $(".column"). prop("checked", false);
           }
        });

        $('.column').on('click',function(){

            if($('.column:checked').length == $('.column').length){
                $('#select_all').prop('checked',true);
            }else{

                $('#select_all').prop('checked',false);

            }
        });
    </script>
@endsection
