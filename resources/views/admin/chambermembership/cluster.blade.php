@extends("layouts.master")
@section("title",'ICT CHAMBER CLUSTERS & ASSOCIATIONS')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">ICT CHAMBER CLUSTERS & ASSOCIATIONS</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">ICT CHAMBER CLUSTERS & ASSOCIATIONS</a>
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
                <span class="card-label font-weight-bolder text-dark">ICT CHAMBER CLUSTERS & ASSOCIATIONS</span>
                {{--                <span class="text-muted mt-3 font-weight-bold font-size-sm">Application which are not yet assigned</span>--}}
            </h3> <div class="card-toolbar">
                <a href="{{ route('admin.cluster.association.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>New Record</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <!--begin: Datatable-->
                {{--            {{ $dataTable->table() }}--}}
                <table class="table " id="kt_datatable1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Title</th>
                        <th>Description</th>
                        <th>Items</th>

                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                        @forelse (App\Models\ClusterAssociationCategory::all() as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->description !!}</td>
                            <td>
                            </td>
                            <td>
                                <a href="{{ route('admin.cluster.association.edit', $item->id) }}">
                                    <i class="fa fa-edit text-info"></i>
                                </a>
                                <a href="{{ route('admin.cluster.association.delete', $item->id) }}" class="js-delete">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>

    {{--user role modal--}}




@stop


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

        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#PartnerId').val(0);
        });
    </script>
@endsection
