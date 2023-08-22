@extends("layouts.master")
@section("title",' Report Source')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Report Source</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Report source</a>
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
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">List of Report Sources</h3>
            </div>
            <div class="card-toolbar">
                <button type="button"
                        data-toggle="modal"
                        data-target="#addModal"
                        id="addButton" class="btn btn-primary">
                    <span class="la la-plus"></span>
                    New Report Source
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
                        <th>Source Name</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reportSources as $key=>$report)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $report->name }}</td>
                            <td>{{$report->type}}</td>
                            <td>{{ $report->created_at }}</td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary  dropdown-toggle btn-sm" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Actions
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a href="{{route('admin.create.report.view',["reportSource"=>$report->id])}}"
                                           class="dropdown-item"> Create Report
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item edit-btn"
                                           data-toggle="modal"
                                           data-target="#editModal"
                                           data-name="{{$report->name}}"
                                           data-type="{{$report->type}}"
                                           data-url="{{route("admin.report.source.update",$report->id)}}"> Edit
                                        </a>
                                        <a class="dropdown-item delete_btn"
                                           data-url="{{route("admin.report.source.destroy",$report->id)}}"> Delete
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
                            <h5 class="modal-title" id="exampleModalLabel">Add Report Source</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <form autocomplete="off"
                              class="kt-form validate-form"
                              id="add_form"
                              action="{{route('admin.report.source.store')}} "
                              method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Report Source(Table name or view name)</label>
                                    <input required type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="payment_type">Source Type</label>
                                    <select required name="type" id="payment_type" class="form-control custom-select">
                                        <option value="">--SELECT--</option>
                                       <option value="Table">Table</option>
                                       <option value="View">View</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                </button>
                                <button type="submit" class="btn btn-primary save-button">
                                    <span class="la la-check-circle-o"></span>
                                    Save Report Source
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <form autocomplete="off"
                              class="kt-form validate-form"
                              action=""
                              id="edit_form"
                              method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Report Source(Table name or view name)</label>
                                    <input required type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="payment_type">Source Type</label>
                                    <select required name="type" id="source_type" class="form-control custom-select">
                                        <option value="">--SELECT--</option>
                                        <option value="Table">Table</option>
                                        <option value="View">View</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="la la-close"></span> Close
                                </button>
                                <button type="submit" class="btn btn-primary save-button">
                                    <span class="la la-check-circle-o"></span>
                                    Update Report Source
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
        $('.nav-report-source').addClass('menu-item-active');

        $('#kt_datatable1').DataTable({
            responsive: true
        });

        $(document).on('click','.edit-btn',function (e) {
            e.preventDefault();
            $('#name').val($(this).data('name'));
            $('#source_type').val($(this).data('type'));
            $('#edit_form').attr('action', $(this).data('url'));
        });

        $(document).on('click','.delete_btn',function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            swal.fire({
                title: 'Are you sure?',
                text: "Report Source will be deleted !",
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
                }
            });
        });
    </script>
@endsection
