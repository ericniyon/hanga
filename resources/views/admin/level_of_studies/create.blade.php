@extends('layouts.master')
@section("title","Level of Studies")
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Level of Studies</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Level of Study</a>
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
                        <h3 class="card-label">Level of Studies List</h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModalLong">
                            <span class="flaticon-add"></span>
                            Add New Level
                        </button>

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
                            <th>Name Kn</th>
                            <th>Field Of Studies</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($studies as $key=>$study)

                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$study->name}}</td>
                                <td>{{$study->name_kn}}</td>
                                <td><a href="{{route('admin.add.fields-of-study.to.level-of-study',encryptId($study->id))}}"><span class="badge badge-info">{{\App\Models\FieldOfStudy::query()->where('level_of_study_id','=',$study->id)->count()}}</span></a></td>
                                <td>{{$study->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a href="{{route('admin.add.fields-of-study.to.level-of-study',encryptId($study->id))}}" class="dropdown-item ">Manage Field of Study</a>
                                                <a href="" class="dropdown-item js-edit"
                                                   data-name="{{$study->name}}"
                                                   data-date=""
                                                   data-id="{{$study->id}}"
                                                   data-namekn="{{$study->name_kn}}"
                                                >Edit</a>
                                                <a href="{{route('admin.level.of.study.delete',encryptId($study->id))}}" class="dropdown-item  js-delete">Delete</a>
                                            </div>
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
            <form action="{{route('admin.level.of.study.store')}}" method="post" id="submissionForm" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Level</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
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
            <form action="{{route('admin.level.of.study.edit')}}" method="post" id="submissionFormEdit" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0"  id="StudyId" name="StudyId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Level of Study</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="edit-name" name="name" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="edit-name_kn" name="name_kn" class="form-control"
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
        {!! JsValidator::formRequest(\App\Http\Requests\ValidateLevelOfStudies::class,'.submissionForm') !!}
    <script>

        $(document).ready(function() {
            $('#table').DataTable();
        } );

        $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-all-level-of-studies').addClass('menu-item-active');
        $(document).on('click', '.js-edit', function (e) {
            e.preventDefault();
            $("#modalUpdate").modal('show');
            console.log($(this).data('id'));
            console.log($(this).data('name'));
            var url = $(this).data('url');
            $("#StudyId").val($(this).data('id'));
            $("#edit-name").val($(this).data('name'));
            $("#edit-name_kn").val($(this).data('namekn'));
            $('#submissionFormEdit').attr('action', url);
        });
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Level of study ?",
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
            $('#StudyId').val(0);
        });
    </script>

@endsection
