<div>
    @if (session()->has('message'))
        <div class="alert alert-secondary">
          {{ session('message') }}
        </div>
        @endif
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Applications</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="http://127.0.0.1:8000/admin/dashboard" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Applications</a>
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

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Opportunities List</h3>
            </div>
            <div class="card-toolbar">
                @can('Publishing Job Opportunities')
                <!-- Button trigger modal-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModalLong">
                    <span class="flaticon2-add-1"></span>
                    New Record
                </button>
                @endcan
                <!-- Modal-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->title }}</td>
                            <td>{{ $application->created_at }}</td>
                            <td>{{ $application->status }}
                            <input wire:click="changeStatus({{ $application->id }})" type="checkbox" {{ $application->status == 1 ? 'checked' : ''  }}>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>

                </table>

                {{-- {{$dataTable->table()}} --}}
            </div>
            <!--end: Datatable-->
        </div>
    </div>


    <!--start::Store Opportunity-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form  id="add-job-opportunity-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Application</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Application Title </label>
                                        <input type="text" wire:model.defer="title" class="form-control" placeholder="application title"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Requirements </label>
                                        <input type="text" wire:model.defer="requirements" class="form-control" placeholder="Application requirements"/>
                                    </div>
                                </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="button" wire:click="store" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
    <!--end::Store Opportunity-->
{{--    editJobOpportunityModal--}}



</div>
