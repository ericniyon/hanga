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
            <div class="card-title" style="display: flex">

                <h3 class="card-label">Applicants List</h3>

            </div>

            <div class="card-toolbar">
                @can('Publishing Job Opportunities')
                <button type="button" class="btn btn-primary" wire:click.prevent="export()">
                    <span class="fa fa-file"></span>
                    Excel Export
                </button>
                @endcan
                <!-- Modal-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="card-header">
        <div class="row">
            <h5>Filiters</h5>
        </div>
        <div class="row mt-2">
            <div class="col-md-1">
                <select wire:model.lazy="perPage" id="" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="search" wire:model.debounce.500="searchKey" id="" class="form-control"
                placeholder="search order">
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label for="" class="mt-2 mr-2">From: </label>
                <input type="date" wire:model.lazy="from" id="" class="form-control"
                min='2022-01-01' max="{{date('Y-d-m')}}">
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <label for="" class="mt-2 mr-2">To: </label>
                <input type="date" wire:model.lazy="until" id="" class="form-control"
                min='2022-01-01' max="{{date('Y-d-m')}}">
            </div>
            <div class="col-md-2">
                <select wire:model.lazy="bySkills" id="" class="form-control">
                    <option value="">All</option>
                    <option value="UI Design"> UI Design</option>
                    <option value="IT Business Analysis and Consultacy">IT Business Analysis and Consultacy</option>
                    <option value="Photography">Photography</option>
                    <option value="Videography">Videography</option>
                    <option value="Content Creation">Content Creation</option>
                    <option value="IT Support">IT Support</option>
                    <option value="Digital marketing (door to door)">Digital marketing (door to door)</option>
                    <option value="CopyWriting">CopyWriting</option>
                    <option value="Sales and marketing (door to door)">Sales and marketing (door to door)</option>
                    <option value="Mobile application development">Mobile application development</option>
                    <option value="Web development">Web development</option>
                </select>
            </div>
        </div>
    </div>
            <div class="table-responsive">
                <div class="">
                    {{-- filters setions  --}}

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Address</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->full_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->phone_number }}</td>
                            <td>{{ $application->age }}</td>
                            <td>{{ $application->physical_attendence_district }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        <td>Showing {{ $applications->count()  }} of {{ \App\Models\ApplicantInfo::all()->count()  }}</td>
                    </tr>
                    </tr>
                </tfoot>
                </table>

                {{-- {{$dataTable->table()}} --}}
            </div>
            <!--end: Datatable-->
        </div>
    </div>


    <!--start::Store Opportunity-->

    <!--end::Store Opportunity-->
{{--    editJobOpportunityModal--}}



</div>
