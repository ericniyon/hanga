@extends("layouts.master")
@section("title",'All Members')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Members</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Members</a>
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
                <span class="card-label font-weight-bolder text-dark">All Members</span>
                {{--                <span class="text-muted mt-3 font-weight-bold font-size-sm">Application which are not yet assigned</span>--}}
            </h3> <div class="card-toolbar">
{{--                <a href="javascript:void(0)" class="btn btn-primary"--}}
{{--                   data-toggle="modal"--}}
{{--                   data-target="#addModal" >--}}
{{--                    <i class="la la-plus"></i>--}}
{{--                    Upload Excel--}}
{{--                </a>--}}
            </div>
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
                        <th></th>
                        <th>Member phone</th>
                        <th>Member Email</th>
                        <th>Registration Type</th>
                        <th>Created At</th>
                        <th>Is Verified</th>
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

    {{--user role modal--}}
    <div data-backdrop="static" class="modal fade" id="addModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload members excel file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form  action="{{route('admin.users.bulky.upload')}} "
                      method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="excel_file">Excel File</label>
                            <input id="excel_file" type="file" name="excel_file" class="form-control form-control-sm" aria-describedby="emailHelp"
                                   placeholder="Excel File" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                class="la la-close"></span> Close
                        </button>
                        <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                            Upload Excel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div data-backdrop="static" class="modal fade" id="change-client" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Ownership</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form  action=" "
                      method="POST" enctype="multipart/form-data" id="change-client-form">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <label for="client_search_input" class="d-block">Search Owner</label>
                        <select id="client_search_input" class="form-control" name="name" style="width: 100%">

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                class="la la-close"></span> Close
                        </button>
                        <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop

@section('scripts')
    <script src="{{asset("assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.3")}}"></script>
    <script>
        $('.nav-all-members').addClass('menu-item-active');
        let url= "{{ route('admin.clients.index') }}"
        $('#kt_datatable1').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'member_name',name:'msmeRegistrations.company_name' },
                {data: 'member_name', name: 'dspRegistrations.company_name',visible: false, className: 'none'},
                {data: 'member_name', name: 'iWorkerRegistrations.name',visible: false, className: 'none'},
                {data: 'client.phone', name: 'client.phone'},
                {data: 'client.email', name: 'client.email'},
                {data: 'type', name: 'client.registrationType.name'},
                {data: 'creation_date', name: 'created_at'},
                {data: 'is_verified', name: 'status'},
                {data: 'is_active', name: 'client.is_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            'order': [[8, 'desc']]
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure you want to Delete this Member?",
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
                title: "Are you sure you want to change status of this Member?",
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
        $(document).on('click', '.btn-change-client', function (e) {
            e.preventDefault();
            var href = this.href;
            console.log(href)
            $('#change-client').modal('show')
            $('#change-client-form').attr('action',href)
        });

        $('.end-today-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            endDate:'today',
            todayHighlight: true,
            todayBtn: "linked",
            clearBtn: true,
        });

        $("#client_search_input").select2({
            placeholder: "Search for new Owner",
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            ajax: {
                url: "/admin/ihuzo/members/search.client",
                dataType: "json",
                type: "GET",
                data: function (params) {
                    return queryParameters = {
                        name: params.term,
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text:item.first_name + ' ' + item.last_name,
                                id: item.id,
                            }
                        })
                    };
                }
            }
        });
    </script>
@endsection
