@extends("layouts.master")
@section("title",' New Requests')
@section("css")
    <link type="text/css" href="{{asset('js/datatables.net-bs/css/datatable-checkboxes.css')}}" rel="stylesheet"/>
@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">New Requests</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">New Requests</a>
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
        <div class="card-header py-5 d-md-flex align-items-center justify-content-between">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">New Requests</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">

            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                    <thead>
                    <tr class="text-left">
                        <th class="no-sort" style="width: 20px !important;"></th>
                        <th style="max-width: 20px !important;">#</th>
                        <th>Member Name</th>
                        <th>Member phone</th>
                        <th>Member Email</th>
                        <th>Registration Type</th>
                        <th>Submission Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $key=>$application)
                        <tr>
                            @if(auth()->user()->can("Assign Application"))
                                <td style="width: 10px !important;" onclick="event.stopPropagation()">
                                    <div class="text-center">
                                        <label>
                                            <input type="checkbox" onclick="event.stopPropagation()"
                                                   data-item="{{$application->id}}" class="dt-checkboxes checkbox">
                                        </label></div>
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td style="max-width: 10px !important;">
                                <span class="ql-bg-black">{{++$key}}</span>
                            </td>
                            <td class="pl-0">
                                {{ trans($application->client->name)}}
                            </td>
                            <td>
                                {{optional($application->client)->phone}}
                            </td>
                            <td>
                                {{$application->client->phone}}
                            </td>
                            <td>
                                {{$application->client->registrationType->name}}
                            </td>
                            <td>
                                <span class="text-muted font-weight-bold">{{$application->submission_date}}</span>
                            </td>
                            <td class="text-right" style="width: 80px !important;">
                                    <a href="{{route("admin.application.details",encryptId($application->id))}}"
                                       class="btn btn-primary edit-btn btn-sm">
                                        <span class="la la-folder"></span>
                                        Details
                                    </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            @can("Assign Application")
            @if(count($applications)>0)
                <div class="pull-right p-2 my-5">
                    <a href="" data-toggle="modal"
                       data-target="#assignModal"
                       class="btn btn-outline-primary pull-right"><span class="la la-plus-circle"></span> Assign
                        Application</a>
                </div>
            @endif
            <div class="modal fade" id="assignModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign Application</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <form autocomplete="off"
                              class="kt-form validate-form"
                              action="{{route("admin.assign.multiple.application")}}" id="assign_form" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="assign-application">Assign Application To:</label>
                                    <select style="width: 100%" id="assign-application" name="assign_to" class="form-control" required>
                                        <option value="" selected disabled>---SELECT--</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" id="applications_ids" name="applications">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                        class="la la-close"></span> Close
                                </button>
                                <button type="submit" class="btn btn-primary save-button massive-assignment">
                                    <span class="la la-check-circle-o"></span>
                                    Assign
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>
@stop
 
@section('scripts')
    <script src="{{asset("assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3")}}"></script>
    <script src="{{asset("assets/js/pages/crud/datatables/basic/basic.js?v=7.0.3")}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.net-bs/js/datatable-checkboxes.js')}}"></script>
    <script src="{{asset("assets/js/pages/crud/forms/widgets/select2.js?v=7.0.3")}}"></script>
    <script>
        $('.nav-application-section').addClass('menu-item-active  menu-item-open');
        $('.nav-pending-applications').addClass('menu-item-active');
        $('#select-service').select2({
            placeholder: "{{ __('SELECT SERVICE NAME') }}"
        });

        if ("{{auth()->user()->can("Assign Application")}}") {
            $('#kt_datatable1').DataTable({
                "language": {
                    processing: '<i style="color:#3C8DBC" class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                select: {
                    info: false
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'autoWidth': true,
                "order": [[6, "asc"]],
                'columnDefs': [
                    {
                        'targets': 0,
                        'orderable': false,
                        'render': function (data, type, row, meta) {
                            return data;
                        },
                        'checkboxes': {
                            'selectRow': true,
                            'selectAllRender': '<div class="text-center"><label class=""><input type="checkbox" class="dt-checkboxes members"></label></div>'
                        }
                    }, {
                        'targets': 6,
                    }
                ],

            });
        } else {
            $('#kt_datatable1').DataTable({
                select: {
                    info: false
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'autoWidth': true,
                "order": [[6, "asc"]],
                'columnDefs': [
                    {
                        'targets': 0,
                        'orderable': false,
                        'render': function (data, type, row, meta) {
                            return data;
                        },
                        'checkboxes': {
                            'selectRow': true,
                            'selectAllRender': ' '
                        }
                    }, {
                        'targets': 6,
                    }
                ],

            });
        }


        $(document).ready(function () {
            $(".dt-checkboxes").click(function () {
                var data = $(".checkbox:checked");
                $(".select-item").html(data.length + " rows selected");
            });


            $(".massive-assignment").click(function (e) {
                let data = [];
                $(".checkbox:checked").each(function () {
                    let arr = {};
                    arr["id"] = $(this).data('item');
                    data.push(arr);
                });
                if (data.length <= 0) {
                    e.preventDefault();
                    swal.fire(
                        'Error',
                        'Please select one application to assign',
                        'error'
                    );
                } else {
                    $("#applications_ids").val(JSON.stringify(data));
                }

            })
        });
        $('#assign-application').select2();

        $("#select-service").change(function () {
            window.location.href = $('#select-service option:selected').data("url");
        });
    </script>
@endsection
