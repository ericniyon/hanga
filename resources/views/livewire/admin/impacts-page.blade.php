


<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css"/>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('page-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Impacts</h5>
                <!--end::Page Title-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@stop


@if ($updateMode)

<div class="card card-custom gutter-b">
    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
    <div class="card-header flex-wrap">

        <div class="card-title" style="display: flex">

            <h3 class="card-label">Create Impact</h3>

        </div>
    </div>
    <form wire:submit.prevent="store"  class="submissionForm p-5" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">

                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Impact Title </label>
                                <input type="text" wire:model.defer="impact_title" class="form-control" placeholder=" title"/>
                            </div>
                            @error('impact_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Dashboard Link </label>
                                <input type="text" wire:model.defer="impact_link" class="form-control" placeholder=" link"/>
                            </div>
                            @error('impact_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" >Page Section  </label>
                                <select wire:model.defer="impact_section" id="" class="form-control">
                                 <option value="Teck Business">Teck Business</option>
                                 <option value="Business">Business</option>
                                 <option value="iWorker">iWorker</option>
                                 <option value="Web/Mobile app">Web/Mobile app</option>
                                 <option value="Opportunitie">Opportunitie</option>
                                 <option value="Digital Finance">Digital Finance</option>
                                </select>
                            </div>
                            @error('impact_section')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Impact DXescription </label>
                                 <textarea class="form-control summernote" wire:model.defer="impact_description" id="" cols="10" rows="5"></textarea>
                             </div>
                             @error('impact_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>




            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button> --}}
                    <button type="button" wire:click="update()" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                </div>
            </div>
        </div>
    </form>
</div>


@else

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap">
        <div class="card-title" style="display: flex">

            <h3 class="card-label">All Impacts</h3>

        </div>

        <div class="card-toolbar">
            @can('Publishing Job Opportunities')
            <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#" onclick="window.location.href='{{ route('admin.impact.create') }}'">
                    <span class="flaticon2-add-1"></span>
                    New Record
                </button>
            @endcan
            <!-- Modal-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
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
                        <th>#</th>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Actions</th>
                        {{-- <th>Address</th> --}}
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse (App\Models\Impact::all() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->impact_title }}</td>
                        <td>{{ $item->impact_section }}</td>
                        <td>
                            <a href="#" class="btn btn-md btn-primary" wire:click.prevent="edit({{ $item->id }})">
                                <i class="fa fa-edit"></i> </a>
                        </td>
                        {{-- <td>{{ $item->impact_description }}</td> --}}
                        {{-- <td></td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No impact created yet</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>

            </tfoot>
            </table>

            {{-- {{$dataTable->table()}} --}}
        </div>
        <!--end: Datatable-->
    </div>
</div>

@endif

<!--start::Store Opportunity-->

<!--end::Store Opportunity-->


<script type="text/javascript">
    $(document).ready(function() {
    $('.summernote').summernote({
        height:200
    });
    });
    </script>
</div>
