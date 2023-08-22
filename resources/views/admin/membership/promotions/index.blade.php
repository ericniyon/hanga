@extends("layouts.master")
@section("title",'What is the Rwanda ICT Chamber ?')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Memberships</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Membership Promotions</a>
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
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Membership Promotions</span>
                               {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">Applicatio</span> --}}
            </h3>
            {{-- <div class="card-toolbar">
                <a href="{{ route('admin.membership.packeges.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Packege</a>

            </div> --}}
        </div>
        <!--end::Header-->
        @livewire('promotion')
        <!--begin::Body-->

        <!--end::Body-->
    </div>

    {{--user role modal--}}




    <div class="card">
        <div class="card-body">

            <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <!--begin: Datatable-->
                {{--            {{ $dataTable->table() }}--}}
                <table class="table " id="kt_datatable1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Valid from</th>
                        <th>Valid to</th>
                        <th>Promotion </th>
                        <th>Status </th>

                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                        @forelse ($promotions as $promotion)
                        <tr>
                            <td>{{ $promotion->id }}</td>
                            <td>{{ $promotion->time_from_date }}</td>
                            <td>{{ $promotion->time_to_date }}</td>
                            <td class="{{ $promotion->time_to_date > Carbon\Carbon::today()->toDateString() ? "text-light badge badge-success" : 'text-danger text-light badge badge-danger'}}">
                                {{ $promotion->time_to_date > Carbon\Carbon::today()->toDateString() ? "Active" : 'in active'}}
                            </td>
                            <td>

                                {{ $promotion->promotion ? $promotion->promotion : "Free" }}</td>
                            <td>
                                <a href="#" data-toggle="modal"
                                    data-target="#modalUpdatePromotion"
                                    data-promotion="{{$promotion->promotion}}"
                                   data-id="{{$promotion->id}}"
                                   data-time_from_date="{{$promotion->time_from_date}}"
                                   data-time_to_date="{{$promotion->time_to_date}}"
                                   data-total_free="{{$promotion->total_free}}"
                                   data-membership_packeges_id="{{$promotion->membership_packeges_id}}"
                                    class="js-edit">
                                    <i class="fa fa-edit text-info  "></i>
                                </a>
                                <a href="{{ route('admin.promotion.promotion.delete', $promotion->id) }}" class="js-delete">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>



        <div class="modal fade" id="modalUpdatePromotion" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.promotion.packeges.edit', $promotion->id)}}" method="post" id="submissionFormEdit" class="submissionForm"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0" id="PromotionId" name="PromotionId">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Promotion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="promotion">Promotion</label>
                            <input type="text" id="edit-promotion" name="promotion" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">


                                <label class="\" for="edit-time_from_date">Valid From</label>
                                <input type="date" min="{{ Carbon\Carbon::today()->toDateString() }}" id="edit-time_from_date" class="form-control"  name="time_from_date"/>

                        </div>
                        <div class="form-group">


                                <label class="\" for="edit-time_to_date">Valid To</label>
                                <input type="date" min="{{ Carbon\Carbon::today()->toDateString() }}"  id="edit-time_to_date" class="form-control"  name="time_to_date"/>

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
                            <tr class="text-center">
                                <td colspan="5">No promotion have been created yet !</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Table-->
        </div>
        </div>
    </div>

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
            $("#PromotionId").val($(this).data('id'));
            $("#edit-time_from_date").val($(this).data('time_from_date'));
            $("#edit-promotion").val($(this).data('promotion'));
            $("#edit-time_to_date").val($(this).data('time_to_date'));
            $("#edit-membership_packeges_id").val($(this).data('membership_packeges_id'));
            $("#edit-total_free").val($(this).data('total_free'));
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

@endsection
