@extends('layouts.master')

@section("title","Open APIs")
<style>
    .showthis{
        display:none;
    }
</style>

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Open APIs</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Open APIs</a>
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
                        <h3 class="card-label">APIs List</h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        @can('Creating an Open APIs')
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addApiModal">
                                <span class="flaticon-add"></span>
                                New Open API
                            </button>
                        @endcan

                        <!-- Modal-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        {{$dataTable->table()}}
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
{{-- Open APIs  --}}
    <div class="modal fade" id="addApiModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('admin.open-apis.store')}}" method="post" id="add-api-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Api</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Name </label>
                                    <input type="text" id="api_name" name="api_name" class="form-control" placeholder="API name"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Link</label>
                                    <input type="url" id="link" name="link" class="form-control" placeholder="API Link" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Owner Name</label>
                                    <input type="text" id="api_owner" name="api_owner" class="form-control" placeholder="Owner name"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Logo</label>
                                        <div class="custom-file">
                                            <input type="file" id="owner_logo" name="owner_logo" class="custom-file-input" required/>
                                            <label for="owner_logo" class="custom-file-label">Choose logo</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">SELECT</option>
                                        <option value="MoMo API">MoMo API</option>
                                        <option value="Callflow APIs">Callflow APIs</option>
                                        <option value="Digital Payment API">Digital Payment API</option>
                                        <option value="Virtual cards API">Virtual cards API</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Link</label>
                                    <input type="url" id="link" name="link" class="form-control" placeholder="API Link" required/>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">API Description</label>
                                <textarea rows="5" class="form-control" name="description" id="description" placeholder="API description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
    {{-- end : Open APis --}}
{{--edit: Open APIs  --}}
    <div class="modal fade" id="editApiModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="" method="post" id="edit-api-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Api</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Name</label>
                                    <input type="url" id="edit-api_name" name="api_name" class="form-control" placeholder="API Name" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Link</label>
                                    <input type="url" id="edit-link" name="link" class="form-control" placeholder="API Link" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">API Owner </label>
                                    <input type="text" id="edit-api_owner" name="api_owner" class="form-control" placeholder="Owner name"/>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Owner Logo</label>
                                        <div class="custom-file">
                                            <input type="file" id="edit-owner_logo" name="owner_logo" class="custom-file-input" required/>
                                            <label for="logo" class="custom-file-label">Choose logo</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">API Description</label>
                                <textarea rows="5" class="form-control" name="description" id="edit-description" placeholder="API description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
    {{-- end : Open APis --}}
    {{-- delete: Open Apis --}}
    <form action="" method="post" id="delete-api-form" class="submissionForm" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
    </form>
    {{-- delete: Open Apis --}}
    <!-- /.modal -->
      <!-- Modal -->
  <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModal-aria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div id="description-details"></div>
         <div class="row text-center d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-default " data-dismiss="modal">Close</button>

        </div>
        </div>
      </div>
    </div>
  </div>
    {{-- description details --}}


@endsection


@section("scripts")

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateOpenApiForm::class,'#add-api-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateOpenApiForm::class,'#edit-api-form') !!}
    {{$dataTable->scripts()}}

    <script>
        $('.nav-open-apis').addClass('menu-item-active  menu-item-open');
        $('.nav-open-apis-list').addClass('menu-item-active');

        //File editing script
        $(document).on("change",'.custom-file-input', function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).on('click', '.edit-api', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            $("#edit-api_name").val($(this).data('api_name'));
            $("#edit-link").val($(this).data('link'));
            $("#edit-api_owner").val($(this).data('ower_name'));
            $("#edit-type").val($(this).data('type'));
            $("#edit-description").val($(this).data('description'));
            $("#edit_type").val($(this).data('job-type'));
            $('#edit-api-form').attr('action', url);
        });
        $(document).on('click', '.delete-api', function (e) {
            e.preventDefault();
            $('#delete-api-form').attr('action', url);
            var url = $(this).data('url');
            Swal.fire({
                title: "Delete  API",
                text: " Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = url;
                    // $('#delete-api-form').submit();
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
        });
        $(document).on('click', '.disable-api', function (e) {
            e.preventDefault();
            $('#delete-api-form').attr('action', url);
            var url = $(this).data('url');
            var status = $(this).data('status');
            Swal.fire({
                title: status+" This API",
                text: " Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, "+status+" it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = url;
                    // $('#delete-api-form').submit();
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
        });
        $(document).on('click', '#desc-details-btn', function (e) {
            e.preventDefault();
            var description = $(this).data('description');
            $('#description-details').text(description);
        });
    </script>
@endsection
