@extends('layouts.master')

@section("title","Registration Types")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Registration Types</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Registration Types</a>
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
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Registration Types List</h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
{{--                        <button type="button" class="btn btn-warning" data-toggle="modal"--}}
{{--                                data-target="#exampleModalLong">--}}
{{--                            <span class="flaticon-add"></span>--}}
{{--                            Add New Type--}}
{{--                        </button>--}}

                        <!-- Modal-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-striped" id="table">
                        {{--                    <table class="table table-striped" id="kt_datatable">--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
{{--                            <th>Business sectors</th>--}}
{{--                            <th>Services</th>--}}
                            <th>Company Category</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($registrations as $key=>$registration)

                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$registration->name}}</td>
{{--                                <td><a href="{{route("admin.registration_type.add.business_sector",encryptId($registration->id))}}"><span class="badge badge-info">--}}
{{--                                            {{$registration->businessSectors->count()}}</span>--}}
{{--                                    </a></td>--}}
{{--                                <td><a href="{{route("admin.registration_type.add.service",encryptId($registration->id))}}"><span class="badge badge-info">--}}
{{--                                            {{$registration->services->count()}}--}}
{{--                                        </span></a>--}}
{{--                                </td>--}}
                                <td><a href="{{route("admin.registration.type.add.company.category",encryptId($registration->id))}}"><span class="badge badge-info">
                                            {{$registration->categories->count()}}
                                        </span></a></td>
                                <td>{{$registration->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">Actions
                                        </button>
                                        <div class="dropdown-menu" style="">
{{--                                            <a class="dropdown-item" href={{route("admin.registration_type.add.business_sector",encryptId($registration->id))}}>Manage Business Sectors</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
{{--                                            <a class="dropdown-item" href={{route("admin.registration_type.add.service",encryptId($registration->id))}}>Manage Services</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
                                            <a class="dropdown-item" href={{route("admin.registration.type.add.company.category",encryptId($registration->id))}}>Manage Categories</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" data-name="{{$registration->name}}" data-date=""
                                               data-id="{{$registration->id}}"
                                               data-kn="{{$registration->name_kn}}"
                                               class=" js-edit dropdown-item"><li class="la la-edit"></li> Edit</a>
                                            <a href="{{route('admin.registration.type.delete',$registration->id)}}" class=" js-delete dropdown-item"><li
                                                    class="la la-trash"></li> Delete</a>
                                            <a href="#" class="edit-btn dropdown-item "
                                               data-toggle="modal"></a>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.registration.type.store')}}" method="post" id="submissionForm" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name (Eng)</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="name_kn" name="name_kn" class="form-control"
                                   required/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>



    <div class="modal fade" id="modalUpdate" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.registration.type.edit')}}" method="post" id="submissionFormEdit" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0"  id="RegistrationId" name="RegistrationId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name (Eng)</label>
                            <input type="text" id="edit-name" name="name" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="edit-kn" name="name_kn" class="form-control"
                                   required/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>





    <!-- /.modal -->


@endsection


@section("scripts")
    <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest(\App\Http\Requests\ValidateRegistrationTypes::class,'.submissionForm') !!}
    <script>

        $(document).ready(function() {
            $('#table').DataTable();
        } );

        $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-all-registration-types').addClass('menu-item-active');
        $(document).on('click', '.js-edit', function (e) {
            e.preventDefault();
            $("#modalUpdate").modal('show');
            console.log($(this).data('id'));
            console.log($(this).data('name'));
            console.log($(this).data('kn'));
            var url = $(this).data('url');
            $("#RegistrationId").val($(this).data('id'));
            $("#edit-name").val($(this).data('name'));
            $("#edit-kn").val($(this).data('kn'));
            $('#submissionFormEdit').attr('action', url);
        });
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Type ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
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

        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#RegistrationId').val(0);
        });
    </script>

@endsection
