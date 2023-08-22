@extends('layouts.master')

@section("title","Partners")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Partners</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Partners</a>
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
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Partners List</h3>
            </div>
            <div class="card-toolbar">
                <!-- Button trigger modal-->
                <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#exampleModalLong">
                    <span class="flaticon2-add-1"></span>
                    New Partner
                </button>

                <!-- Modal-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-head-solid table-head-custom" id="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($partners as $key=>$partner)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            <div
                                class="symbol symbol-40 bg-transparent align-self-center">
                                <div class="symbol-label rounded-0"
                                     style="background-size: contain!important;background-image:url({{ $partner->getLogoUrl() }});background-color: transparent!important;"></div>
                            </div>

                        </td>
                        <td>{{$partner->name}}</td>
                        {{--                                <td><img src="{{route('get.partner.img.path',str_replace("/","",$partner->logo))}}" width="150px" height="150px" alt="no_image" class="img-fluid img-thumbnail"></td>--}}
                        <td>{{$partner->description}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="#" data-name="{{$partner->name}}" data-date=""
                                   data-id="{{$partner->id}}"
                                   data-logo="{{$partner->logo}}"
                                   data-description="{{$partner->description}}"
                                   class="btn btn-primary js-edit"><span class="fa fa-edit"></span> Edit</a>

                                <a href="{{route('admin.partner.delete',$partner->id)}}"
                                   class="btn btn-danger js-delete"><span
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

    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.partner.store')}}" method="post" id="submissionForm" class="submissionForm"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Partner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="0" name="PartnerId">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   required/>
                        </div>

                        <div class="form-group">
                            <x-image-file-label label="Logo"/>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo"/>
                                <label class="custom-file-label" for="logo">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>



    <div class="modal fade" id="modalUpdate" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.partner.edit')}}" method="post" id="submissionFormEdit" class="submissionForm"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0" id="PartnerId" name="PartnerId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Partner</h4>
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
                            <x-image-file-label label="Logo"/>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit-logo" name="logo"/>
                                <label class="custom-file-label" for="edit-logo">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="edit-description"
                                      name="description"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    {!! JsValidator::formRequest(\App\Http\Requests\ValidatePartners::class,'.submissionForm') !!}
    <script>

        $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-all-partners').addClass('menu-item-active');

        $(document).ready(function () {
            $('#table').DataTable();
        });
        $(document).on('click', '.js-edit', function (e) {
            e.preventDefault();
            $("#modalUpdate").modal('show');
            var url = $(this).data('url');
            $("#PartnerId").val($(this).data('id'));
            $("#edit-name").val($(this).data('name'));
            $("#edit-description").val($(this).data('description'));
            $('#submissionFormEdit').attr('action', url);
        });
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Partner  ?",
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
            $('#PartnerId').val(0);
        });
    </script>

@endsection
