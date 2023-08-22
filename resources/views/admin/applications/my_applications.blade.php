@extends("layouts.master")
@section("title",'MY Applications')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">My Tasks</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">My Tasks</a>
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
    <!--end::Notice-->
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">My Tasks</span>
                {{--                <span class="text-muted mt-3 font-weight-bold font-size-sm">Application which are not yet assigned</span>--}}
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <!--begin: Datatable-->
                {{--            {{ $dataTable->table() }}--}}
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Member Name</th>
                        <th></th>
                        <th>Member phone</th>
                        <th>Member Email</th>
                        <th>Registration Type</th>
                        <th>Submission Date</th>
                        <th>Status</th>
                        <th>Actions</th>

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
    <script src="{{asset("assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.3")}}"></script>
    <script>
        $('.nav-application-section').addClass('menu-item-active  menu-item-open');
        $('.nav-applications-my-tasks').addClass('menu-item-active');
        let url= "{{ route('admin.applications.my.tasks') }}"
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'client.name', name: 'client.first_name'},
                {data: 'client.first_name', name: 'client.last_name',visible: false, className: 'none'},
                {data: 'client.phone', name: 'client.phone'},
                {data: 'client.email', name: 'client.email'},
                {data: 'type', name: 'client.registrationType.name'},
                {data: 'submission_date', name: 'submission_date'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            'order': [[6, 'asc']]
        });

        $('.end-today-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            endDate:'today',
            todayHighlight: true,
            todayBtn: "linked",
            clearBtn: true,
        });
    </script>
@endsection
