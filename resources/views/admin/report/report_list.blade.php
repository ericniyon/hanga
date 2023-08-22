@extends("layouts.master")
@section("title",'Report List')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Report List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Report List</a>
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
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Report List</h3>
            </div>
            <div class="card-toolbar">
                <button type="button"
                        data-toggle="modal"
                        data-target="#addModal"
                        id="addButton" class="btn btn-primary">
                    <span class="la la-plus"></span>
                    New Report
                </button>
            </div>
            <!--end::Dropdown-->

            <!--begin::Modal-->

        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive">
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Report Name</th>
                    <th>Data Source</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $key=>$report)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $report->report_name }}</td>
                        <td>{{$report->data_source}}</td>
                        <td>
                            @if($report->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary  dropdown-toggle btn-sm" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a href="{{route("admin.edit.report.view",encryptId($report->id))}}" class="dropdown-item"
                                       data-url=""> Edit
                                    </a>
                                    <a class="dropdown-item delete_btn"
                                       data-url="{{route("admin.destroy.report",encryptId($report->id))}}"> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!--end: Datatable-->

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <form autocomplete="off"
                              class="kt-form validate-form"
                              id="add_form"
                              action="{{route('admin.create.report.view')}} "
                              method="get">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="payment_type">Report Source</label>
                                    <select style="width: 100%" required name="reportSource" id="payment_type" class="form-control select2 custom-select">
                                        <option value="">--SELECT--</option>
                                      @foreach($reportSources as $source)
                                          <option value="{{$source->id}}">{{$source->name}}</option>
                                          @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                </button>
                                <button type="submit" class="btn btn-primary save-button">
                                    <span class="la la-check-circle-o"></span>
                                    Continue
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.nav-reporting').addClass('menu-item-active  menu-item-open');
        $('.nav-report-list').addClass('menu-item-active');
        $('#kt_datatable1').DataTable({});
        $('.delete_btn').click(function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            swal.fire({
                title: 'Are you sure?',
                text: "This Report will be deleted !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff1533',
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonColor: '#06c4ff',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $(location).attr('href', url)
                } else if (result.dismiss === 'cancel') {
                    /*  swal.fire(
                     'Cancelled',
                     'Department is not Activated :)',
                     'error'
                     )*/
                }
            });
        });
    </script>
@endsection
