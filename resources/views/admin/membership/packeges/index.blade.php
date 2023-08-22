@extends('layouts.master')
@section('title', 'What is the Rwanda ICT Chamber ?')
@section('css')

@stop
@section('page-header')

@stop

@section('content')
    <!--begin::Card-->
    {{-- <div class="card card-custom gutter-b">

        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Membership Packeges</span>

        </div>
        @livewire('packege')

    </div> --}}

    {{-- user role modal --}}

    <p>Membership Overview</p>
    <div class="row" style="padding:2rem ">
        <div class="col-md-2">
            <div class="card card-custom gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column bg-[#FFF0E2]" style="background: #FFF0E2; color:#F5841F">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class=" text-[#F5841F] font-weight-bold">Total iWorkers</div>
                        <div class="font-weight-bolder font-size-h3 py-2 ">
                            {{ approvedRegistrationType(\App\Models\RegistrationType::iWorker) }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                            style="color: #4FB95A"></i> Verified </span>

                    <!--end::Progress-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-custom gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column bg-[#FFF0E2]" style="background: #FFF0E2; color:#F5841F">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class=" font-weight-bold">Total Busness Directory</div>
                        <div class="font-weight-bolder font-size-h3">
                            {{ approvedRegistrationType(\App\Models\RegistrationType::MSME) }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                            style="color: #4FB95A"></i> Verified </span>
                    <!--end::Progress-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-custom gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column bg-[#FFF0E2]" style="background: #FFF0E2; color:#F5841F">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class=" font-weight-bold">Digital Service Providers</div>
                        <div class="font-weight-bolder font-size-h3">
                            {{ approvedRegistrationType(\App\Models\RegistrationType::DSP) }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                            style="color: #4FB95A"></i> Verified </span>
                    <!--end::Progress-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-custom gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column bg-[#FFF0E2]" style="background: #FFF0E2; color:#F5841F">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class=" font-weight-bold">Digital Service Providers</div>
                        <div class="font-weight-bolder font-size-h3">
                            {{ approvedRegistrationType(\App\Models\RegistrationType::DSP) }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                            style="color: #4FB95A"></i> Verified </span>
                    <!--end::Progress-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-custom gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column bg-[#FFF0E2]" style="background: #FFF0E2; color:#F5841F">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class=" font-weight-bold">Digital Service Providers</div>
                        <div class="font-weight-bolder font-size-h3">
                            {{ approvedRegistrationType(\App\Models\RegistrationType::DSP) }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <span class="my-4 items-center flex"> <i class="fa fa-check-circle fa-1x bg-[#4FB95A]"
                            style="color: #4FB95A"></i> Verified </span>
                    <!--end::Progress-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>



    <div class="card">
        <div class="=">
            <!--begin::Table-->
            <div class="card-header">Membership Subscriptions</div>
            <div class="table-responsive">
                <!--begin: Datatable-->
                {{--            {{ $dataTable->table() }} --}}
                <table class="table " id="kt_datatable1">
                    <thead>
                        <tr>
                            <th>Subscriber</th>
                            <th>Memberships Owner</th>
                            <th>Membership Plan</th>

                            <th>Organisation Type</th>
                            <th>Date</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($packeges as $packege)
                            <tr>
                                <td>James KARANGWA <p>+250 786 444 444</p>
                                </td>
                                <td>ICT CHAMBER</td>
                                <td>Ignition</td>
                                <td>e-commerce</td>
                                <td>09/02/2023</td>
                                <td>Pending</td>

                            </tr>
                            <tr>
                                <td>James KARANGWA <p>+250 786 444 444</p>
                                </td>
                                <td>ICT CHAMBER</td>
                                <td>Ignition</td>
                                <td>e-commerce</td>
                                <td>09/02/2023</td>
                                <td>Pending</td>

                            </tr>
                            <tr>
                                <td>James KARANGWA <p>+250 786 444 444</p>
                                </td>
                                <td>ICT CHAMBER</td>
                                <td>Ignition</td>
                                <td>e-commerce</td>
                                <td>09/02/2023</td>
                                <td>Pending</td>

                            </tr>



                            <div class="modal fade" id="modalUpdatePackege" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.membership.packeges.edit', $packege->id) }}"
                                        method="post" id="submissionFormEdit" class="submissionForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="0" id="PackegeId" name="PackegeId">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Package</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="packege_name">Package Name</label>
                                                    <input type="text" id="edit-packege_name" name="packege_name"
                                                        class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <x-image-file-label label="Logo" />
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="edit-cover_picture" name="cover_picture" />
                                                        <label class="custom-file-label" for="edit-logo">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="packege_description">Description</label>
                                                    <textarea type="text" class="form-control" id="edit-packege_description" name="packege_description"></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Table-->
        </div>
    </div>

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
                $("#PackegeId").val($(this).data('id'));
                $("#edit-packege_name").val($(this).data('packege_name'));
                $("#edit-packege_description").val($(this).data('packege_description'));
                $('#submissionFormEdit').attr('action', url);
            });
            $(document).on('click', '.js-delete', function(e) {
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

            $('#exampleModal').on('hidden.bs.modal', function(e) {
                $('#PartnerId').val(0);
            });
        </script>

    @endsection

@endsection
