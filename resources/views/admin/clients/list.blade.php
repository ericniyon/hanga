@extends("layouts.master")
@section("title",'All Clients')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Clients</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-active">Client</a>
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
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">All Clients</span></h3>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Registered clients</span>


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
                        <th>Client Name</th>
                        <th></th>
                        <th>Client phone</th>
                        <th>Client Email</th>
                        <th>OTP</th>
{{--                        <th>Registration Type</th>--}}
                        <th>Created At</th>
{{--                        <th>Is Verified</th>--}}
                        <th>Status</th>
{{--                        <th>Actions</th>--}}

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
        $('.nav-all-clients').addClass('menu-item-active');
        let url= "{{ route('admin.clients.list') }}"
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'client_name', name: 'first_name'},
                {data: 'first_name', name: 'last_name',visible: false, className: 'none'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'otp', name: 'otp'},
                // {data: 'type', name: 'client.registrationType.name'},
                {data: 'created_at',name: 'created_at'},
                // // {data: 'is_verified', name: 'status'},
                {data: 'is_active', name: 'is_active'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            // 'order': [[5, 'desc']]
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure you want to Delete this User?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = href;
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
        });
        $(document).on('click', '.btn-change-status', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure you want to change status of this Client?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, continue!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = href;
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
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

