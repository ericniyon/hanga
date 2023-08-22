@extends('layouts.master')
@section('title', 'What is the Rwanda ICT Chamber ?')
@section('css')

@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Memberships</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Plan</a>
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
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">New Membership Plan</span>
                {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">Applicatio</span> --}}
            </h3>
        </div>

        <form action="{{ route('admin.membership_level.membership_level.save_plan') }}" method="POST" class="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Plan</h4>

                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Plan Name </label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Plan name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="price">Plan Price</label>
                                <input type="text" id="price" name="price" class="form-control"
                                    placeholder="Plan Price" required="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group">

                        <button type="submit" class="btn btn-primary"><i class="la la-check"></i>Save </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card">

        <div class="card-body">
            <table class="w-100 table">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Plan Pricec</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->price }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modalUpdateplan"
                                    data-name="{{ $plan->name }}"
                                    data-id="{{ $plan->id }}"
                                    data-price="{{ $plan->price }}" class="js-edit">
                                    <i class="fa fa-edit text-info  "></i>
                                </a>

                                <a href="{{ route('admin.membership.plans.delete', $plan->id) }}" class="js-delete">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
<div class="modal fade" id="modalUpdateplan" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.membership.plans.edit', $plan->id) }}" method="post" id="submissionFormEdit"
                class="submissionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0" id="planId" name="planId">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" id="edit-name" name="name" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="price"> Price</label>
                            <input type="text" id="edit-price" name="price" class="form-control" required />
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
                    @empty
                        <tr>
                            <td>No plan have been created yet !</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Body-->



    </div>

    {{-- user role modal --}}

    @section('scripts')
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest(\App\Http\Requests\ValidatePartners::class, '.submissionForm') !!}
        <script>
            $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
            $('.nav-all-partners').addClass('menu-item-active');

            $(document).ready(function() {
                $('#table').DataTable();
            });
            $(document).on('click', '.js-edit', function(e) {
                e.preventDefault();
                $("#modalUpdate").modal('show');
                var url = $(this).data('url');
                $("#planId").val($(this).data('id'));
                $("#edit-name").val($(this).data('name'));
                $("#edit-price").val($(this).data('price'));
                $('#submissionFormEdit').attr('action', url);
            });
            $(document).on('click', '.js-delete', function(e) {
                e.preventDefault();
                var href = this.href;

                Swal.fire({
                    title: "Are you sure?",
                    text: "Delete this   ?",
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

            $('#exampleModal').on('hidden.bs.modal', function(e) {
                $('#PartnerId').val(0);
            });
        </script>
    @endsection

@endsection
