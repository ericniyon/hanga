


<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('page-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Resources Categories</h5>
                <!--end::Page Title-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@stop


@if (session()->has('msg'))
<div class="alert alert-success">
    {{ session('msg') }}
</div>
@endif
<div class="row">
    <div class="col-md-6">

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap">
        <div class="card-title" style="display: flex">

            <h3 class="card-label">All Categories</h3>

        </div>

    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card-header">

    <div class="row mt-2">
        <div class="col-md-3">
            <input type="search" wire:model.debounce.500="searchKey" id="" class="form-control"
            placeholder="search order">
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
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse (\App\Models\ResourcesCategory::all() as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="#" wire:click.prevent="edit({{ $category->id }})" class="btn btn-md btn-primary"><i class="fa fa-edit"></i></a>
                            @if ($delete_id)
                            <a href="#" class="btn btn-md btn-danger">
                                Sure ?
                            </a>
                                @else
                                <a href="#" class="btn btn-md btn-danger" wire:click.prevent="delete({{ $category->id }})">
                                    <i class="fa fa-trash"></i>

                                </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center">No Category found yeet !</td>
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

    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <label for="title">Category Title</label>
                    <input type="text" name="title" wire:model="title" id="title" class="form-control" value="{{ $this->title }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="">
                        @if ($updateMode)

                        <button class="btn btn-md btn-primary mt-5" wire:click.prevent="update()">Update</button>
                        @else

                        <button class="btn btn-md btn-primary mt-5" wire:click.prevent="store">Save</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--start::Store Opportunity-->

<!--end::Store Opportunity-->



</div>
