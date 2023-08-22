@extends('layouts.master')

@section("title","Digital Platforms")
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Digital Platforms</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Digital Platforms</a>
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
                        <h3 class="card-label">Digital Platforms</h3>
                    </div>
                    <div class="card-toolbar">
                        @can('Creating Digital Platforms')
                            <!-- Button trigger modal-->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addApiModal">
                                <span class="flaticon-add"></span>
                                New Record
                            </button>
                            <!-- Modal-->
                        @endcan
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
{{-- Digital Platforms  --}}
    <div class="modal fade" id="addApiModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('admin.digital-platforms.store')}}" method="post" id="add-api-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Digital Platform</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Solution Name </label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Solution name"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Logo</label>
                                    <div class="custom-file">
                                        <input type="file" id="logo" name="logo" class="custom-file-input" required/>
                                        <label for="logo" class="custom-file-label">Choose logo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Owner Name </label>
                                        <input type="text" id="name" name="dsp_name" class="form-control" placeholder="Owner name"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Telephone" required/>
                                    </div>
                                </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email address" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="url" id="website" name="website" class="form-control" placeholder="http or https://www.website.com" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Specialties</label>
                                        <select name="specialties[]" id="specialties" class="form-control" required multiple>
                                            <option value="">--select--</option>
                                            @foreach(\App\Models\BusinessSector::all() as $specialty)
                                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        {{-- platform --}}
                        <h6>@lang('client_registration.type_of_platform')</h6>
                        <div class="row">
                            @foreach(\App\Models\PlatformType::all() as $item)
                                <div class="col-md-4">
                                    <div class="my-2">
                                        <label class="checkbox mb-4">
                                            <input type="checkbox" name="platforms[]"
                                                value="{{ $item->id }}"/> {{ $item->name }}
                                            <span class="rounded-sm"></span>
                                        </label>
                                        <label for="link{{ $item->id }}" class="sr-only">Link</label>
                                        <input type="url" name="link{{ $item->id }}" id="link{{ $item->id }}"
                                            class="form-control rounded-sm" placeholder="Link"/>

                                    </div>

                                </div>
                            @endforeach
                        </div>
                        {{-- platform --}}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5"
                                    name="description">
                                    </textarea>
                                </div>
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

    <div class="modal fade" id="editPlatformsModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="" method="post" id="edit-api-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Digital Platform</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
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

    <form action="" method="post" id="delete-api-form" class="submissionForm" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
    </form>

    {{-- description details --}}
    <!-- Button trigger modal -->
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
    <!-- /.modal -->


@endsection


@section("scripts")
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateDSPSolutionForm::class,'#add-api-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateDSPSolutionForm::class,'#edit-api-form') !!}
    {{$dataTable->scripts()}}

    <script>
        $('.nav-digital-platforms').addClass('menu-item-active  menu-item-open');
        $('.nav-digital-platforms-list').addClass('menu-item-active');

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        //File editing script
        $(document).on("change",'.custom-file-input', function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).on('click', '.edit-api', function (e) {
            e.preventDefault();
            var link = $(this).data('url');
            var url = $(this).data('formUrl');
            $('#edit-api-form').attr('action', url);
            $.ajax({
                url: link,
                type: 'GET',
                success: function (data) {
                    $('#editPlatformsModal').modal('show');
                    $('#editPlatformsModal').find('.modal-body').html(data);
                }
            });
        });
        $(document).on('click', '.delete-api', function (e) {
            e.preventDefault();
            $('#delete-api-form').attr('action', url);
            var url = $(this).data('url');
            Swal.fire({
                title: "Delete This Platform",
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
                title: status+" This Platform",
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
