@extends('layouts.master')
@section("title","User Management")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Users</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Users Management</a>
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
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
    <div class="card card-custom gutter-b">
        <div class="flex-wrap card-header">
            <div class="card-title">
                <h3 class="kt-portlet__head-title">
                    Users
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="javascript:void(0)" class="btn btn-primary"
                   data-toggle="modal"
                   data-target="#addModal" >
                    <i class="la la-plus"></i>
                    New User
                </a>
            </div>
            <!--end::Dropdown-->

        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>

        </div>


        {{--user role modal--}}
        <div data-backdrop="static" class="modal fade" id="addModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="add-user-form" action="{{route('admin.users.store')}} "
                          method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                                       placeholder="user name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" name="telephone" class="form-control"
                                       aria-describedby="emailHelp"
                                       placeholder="Telephone">
                            </div>
                            <div class="form-group ">
                                <label for="name">Job Title</label>
                                <input id="job_title" type="text" name="job_title" class="form-control form-control-sm" aria-describedby="emailHelp"
                                       placeholder="Job Title">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="la la-close"></span> Close
                            </button>
                            <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                                Save User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--user update modal--}}
        <div data-backdrop="static" class="modal fade" id="edit-user-model" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form" id="edit-user-form" action=""
                          method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control form-control-sm" aria-describedby="emailHelp"
                                       placeholder="user name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control form-control-sm" aria-describedby="emailHelp"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input id="telephone" type="text" name="telephone" class="form-control form-control-sm"
                                       aria-describedby="emailHelp"
                                       placeholder="Telephone">
                            </div>
                            <div class="form-group ">
                                <label for="name">Job Title</label>
                                <input id="edit_job_title" type="text" name="job_title" class="form-control form-control-sm" aria-describedby="emailHelp"
                                       placeholder="Job Title">
                            </div>
                            <div class="form-group">
                                <label for="is_active">Active</label>
                                <select class="form-control form-control-sm" id="is_active" name="is_active">
                                    <option disabled selected>--select--</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
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

    </div>

    </div>
</div>


@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUpdateUser::class,'#edit-user-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateUser::class,'#add-user-form') !!}
    {{ $dataTable->scripts() }}

    <script>
        $('.nav-user-managements').addClass('menu-item-active  menu-item-open');
        $('.nav-all-users').addClass('menu-item-active');

        $('#edit-user-model').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var href = button.data('url');
            $("#telephone").val($(button).data("telephone"));
            $("#email").val($(button).data("email"));
            $("#name").val($(button).data("name"));
            $("#is_active").val($(button).data("is_active"));
            $("#edit_job_title").val($(button).data("job_title"));
            $('#edit-user-form').attr("action", $(this).data('url'));
            var modal = $(this);
            modal.find('form').attr('action', href)
        })


    </script>
    @endsection
