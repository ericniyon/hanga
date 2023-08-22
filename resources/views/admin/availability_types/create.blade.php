@extends('layouts.master')

@section("title","Availability Types")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Availability Types</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Availability Types</a>
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
                        <h3 class="card-label">Availability Types List</h3>
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
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach(\App\Models\AvailabilityType::all() as $key=>$availabilitytype)

                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$availabilitytype->name}}</td>
                                <td>{{$availabilitytype->description}}</td>
                                <td>{{$availabilitytype->created_at}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="" data-name="{{$availabilitytype->name}}" data-date=""
                                           data-availability-type-id="{{$availabilitytype->id}}"
                                           data-description="{{$availabilitytype->description}}"
                                           data-kn="{{$availabilitytype->name_kn}}"
                                           class="btn btn-primary js-edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a href="{{route('admin.availability-type.destroy',$availabilitytype->id)}}" class="btn btn-danger js-delete"><span
                                                class="fa fa-trash"></span> Delete</a>
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
            <form action="{{route('admin.availability-type.store')}}" method="post" id="submissionForm" class="submissionForm" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Availability Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="name_kn" name="name_kn"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" placeholder="description" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i> Save </button>
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
            <form action="" method="POST" id="submissionFormEdit" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0"  id="availabilitytype-id" name="availabilitytype-id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="edit-name" name="name" placeholder="name" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="edit-kn" name="name_kn"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="edit-description" name="description" placeholder="description" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-refresh"></i>Update</button>
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
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateAvailabilityType::class,'.submissionForm') !!}
    <script>

        $(document).ready(function() {
            $('#table').DataTable();
        } );

        $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-availability-types').addClass('menu-item-active');
        $(document).on('click', '.js-edit', function (e) {
            e.preventDefault();
            $("#modalUpdate").modal('show');
            var availability_type_id = $(this).data('availability-type-id')
            var url = "{{route('admin.availability-type.update',':id')}}"
            url = url.replace(':id', availability_type_id)
            $("#availabilitytype-id").val($(this).data('id'));
            $("#edit-name").val($(this).data('name'));
            $("#edit-kn").val($(this).data('kn'));
            $("#edit-description").val($(this).data('description'));
            $('#submissionFormEdit').attr('action', url);
        });
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Availability Type ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = href;
                }
            });
        });

        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#availabilitytype-id').val(0);
        });
    </script>

@endsection

