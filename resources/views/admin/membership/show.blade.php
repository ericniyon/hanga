@extends("layouts.master")
@section("title")
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Rwanda ICT Chamber Membership</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="text-muted">Rwanda ICT Chamber Membership</a>
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
            </h3>
        </div>
        {{-- {{ $membership }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    @forelse ($clusters as $item)

                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <ul>

                                @forelse ($item->items as $__item)
                                <li>{{ $__item->name }}</li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ICT CHAMBER PROGRAMS, PROJECTS & STRATEGIC ORIENTATION</span>
            </h3>
        </div>
        {{-- {{ $membership }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    @forelse ($strategics as $item)

                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <ul>

                                @forelse ($item->items as $__item)
                                <li>{{ $__item->name }}</li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>



    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">MEMBERSHIP SERVICES & BENEFITS</span>
            </h3>
        </div>
        {{-- {{ $service_benefits }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    @forelse ($service_benefits as $bn)

                    <tr>
                        <td>{{ $bn->category }}</td>
                        <td>{{ $bn->title }}</td>
                        <td>
                            <ul>
                                @forelse ($item->items as $_item)
                                <li>{{ $_item->name }}</li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                        <td>{{ $bn->description }}</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>




    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">MEMBERSHIP LEVELS AND FEES SERVICES</span>
            </h3>
        </div>
        {{-- {{ $membership }} --}}
        {{-- {{ $plans_ids }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>

                    @forelse ($plans_ids as $plan)
                    <tr>
                        <td>{!! $plan->name !!}</td>
                        <td>RWF {{ $plan->price }} /YEAR</td>
                        <td>
                            <ul>

                                {{-- {{ App\Models\PlanFeatures::where('plan_id', 'IGNITION')->get() }} --}}
                                {{-- @forelse ($plan['plan_id'] as $feature)
                                <li>{{ $feature }}</li>
                                @empty

                                @endforelse --}}
                            </ul>
                        </td>
                        <td>{{ $plan->description }}</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>


<div class="card">
    <div class="card-body float-right">
        <button class="btn btn-md btn-primary">Confirm</button>
        <button class="btn btn-md btn-danger">Reject</button>
    </div>
</div>
</div>



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
