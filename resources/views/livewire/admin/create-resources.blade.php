


<div>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('page-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Resources</h5>
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

            <h3 class="card-label">Update Resource</h3>

        </div>
    </div>
    <form class="submissionForm p-5" action="{{ route('admin.update.resource') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
            <div class="modal-body">

                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Resource Title </label>
                                <input type="text" name="resource_title" class="form-control" placeholder=" title"/>
                            </div>
                            @error('resource_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Link (if available)</label>
                                <input type="text" name="resource_link" class="form-control" placeholder=" link"/>
                            </div>
                            @error('resource_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" >Page Section  </label>
                                <select name="resource_field" id="" class="form-control">
                                 <option value="API's">API's</option>
                                 <option value="Tools">Tools</option>
                                 <option value="Templates">Templates</option>
                                 <option value="Plugins">Plugins</option>
                                 <option value="Documantations">Documantations</option>
                                 <option value="Others">Others</option>
                                </select>
                            </div>
                            @error('resource_field')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Cover Image </label>
                                <input type="file" name="resource_cover"  class="form-control" placeholder=" link"/>
                            </div>
                            @error('resource_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Category </label>
                                <select name="resource_category" id="" class="form-control">
                                    @foreach (App\Models\ResourcesCategory::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>

                                    @endforeach
                                   </select>
                            </div>
                            @error('resource_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Resource Description </label>
                                 <textarea class="form-control summernote" name="resource_description" id="" cols="10" rows="5"></textarea>
                             </div>
                             @error('resource_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>




            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="submit"  class="btn btn-primary"><i class="la la-check"></i>Update </button>
                </div>
            </div>
        </div>
    </form>
</div>


@else

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap">
        <div class="card-title" style="display: flex">

            <h3 class="card-label">All Resources</h3>

        </div>

        <div class="card-toolbar">
            @can('Publishing Job Opportunities')
            <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#" onclick="window.location.href='{{ route('admin.resources.create') }}'">
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
                @foreach (App\Models\ResourcesCategory::all() as $item)

                <option value="UI Design"> UI Design</option>
                @endforeach
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
                    @forelse (App\Models\Resources::all() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->resource_title }}</td>
                        <td>{{ $item->resource_field }}</td>
                        <td>
                            <a href="{{ route('admin.show.resource', $item->id) }}" class="btn btn-md btn-primary">
                                <i class="fa fa-edit"></i> </a>
                        </td>
                        {{-- <td>{{ $item->resource_description }}</td> --}}
                        {{-- <td></td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No resource found yet</td>
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
<script type="text/javascript">
    $(document).ready(function() {
    $('.summernote').summernote({
    height: 300,
    });
    });
    </script>
<!--end::Store Opportunity-->



</div>
