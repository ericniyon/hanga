@extends("layouts.master")
@section("title",' Report Results')
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
    @include('partials._alerts')
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 id="title" class="card-label">{{$report->report_name}}</h3>
            </div>

            <div class="card-toolbar">
                <a href="{{route("admin.construct.reports")}}" class="btn btn-outline-primary btn-sm"><span class="fa fa-backward"></span> Back</a>
                &nbsp;&nbsp;<div class="btn-group">
                    <a id="download-dropdown" class="btn btn-primary  dropdown-toggle btn-sm" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><span class="fa fa-file-download"></span> Download
                    </a>
                    <div class="dropdown-menu" style="">
                        <a target="_blank" id="excel" href="{{request()->fullUrl()."&download=1"}}" class="dropdown-item"
                           data-url=""> EXCEL
                        </a>
                        <a id="ajax-url" href="{{request()->fullUrl()}}"></a>
                    </div>
                </div>
            </div>
            <!--end::Dropdown-->

            <!--begin::Modal-->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th>{{$column}}</th>
                        @endforeach

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!--end: Datatable-->
        </div>
    </div>

    <!--end::Notice-->


@stop

@section('scripts')

    <script src="{{asset("assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3")}}"></script>
    <script src="{{asset("assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.3")}}"></script>
    <script>
        $('.nav-reporting').addClass('menu-item-active  menu-item-open');
        $('.nav-custom-report').addClass('menu-item-active');
        $(document).ready(function (){
            var listOfObjects = [];
            $.each({!! $columnNames !!}, function (index, value) {
                var singleObj = {};
                singleObj['data'] = value["name"];
                singleObj['name'] = value["name"];
                listOfObjects.push(singleObj);
            });

            let table =$('#kt_datatable1').DataTable({
                processing: true,
                serverSide: true,
                // dom: 'Bfrtip',
                language: {
                    processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
                ajax: $('#ajax-url').attr("href"),
                columns: listOfObjects,
                lengthMenu: [[10,25, 100, -1], [10,25, 100, "All"]],
                pageLength: 10,
                order: [[0, 'desc']]
            });
        })




    </script>
@endsection
