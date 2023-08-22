
@extends("layouts.master")
@section("title",'Generated Report')
@section("css")
<style>
    .btn-group, .btn-group-vertical {
        margin-bottom: 10px !important;
        margin-top: 5px !important;
    }
</style>
@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Report</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.general.reporting.index') }}" class="text-muted">Generate Report</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Generated Report</a>
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

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-1 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark" id="title">{{$report_name}}</span>
            </h3>

            <div class="card-toolbar">
                <a href="{{route("admin.general.reporting.index")}}" class="btn btn-outline-primary btn-sm"><span class="fa fa-backward"></span> Back</a>
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

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Table-->
            <div class="table-responsive">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Member phone</th>
                        <th>Member Email</th>
                        <th>Registration Type</th>
{{--                        <th>Is verified</th>--}}
                        <th>Registration Date</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>


@stop

@section('scripts')
    <script>
        var url=$("#ajax-url");
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            ajax:url,
            columns: [
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'type', name: 'registrationType.name'},
                // {data: 'is_verified', name: 'application.status'},
                {data: 'registration_date', name: 'application.created_at'},
            ],
        }).draw();
    </script>
@endsection
