@extends('layouts.master')
@section('content')




<div>
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

<div class="row">
    <div class="col-md-8">
        <div class="card card-custom gutter-b">
            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
            <div class="card-header flex-wrap">

                <div class="card-title" style="display: flex">

                    <h3 class="card-label">Partners</h3>

                </div>

                <div class="card-title" style="display: flex">
                    <a href="{{ route('admin.save.partner') }}">

                        <h3 class="btn btn-md btn-primary">Add New</h3>
                    </a>

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
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\OurPartner::all() as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ asset('partners/'.$item->logo) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('admin.show.partners', $item->id) }}"><i class="fa fa-edit"></i></a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No partner found yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>

                </tfoot>
                </table>

                {{-- {{$dataTable->table()}} --}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap">

                <div class="card-title" style="display: flex">

                    <h3 class="card-label">Update Partner</h3>

                </div>

            </div>
            <div class="table-responsive">
                <form action="{{ route('admin.update.partners', $partner->id) }}" method="POST" enctype="multipart/form-data" class="submissionForm p-5">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">

                            <input type="file" name="logo" value="{{ asset('partners/'.$item->logo) }}" id="" placeholder="Partner Logo" class="form-control">
                        </div>
                        <div class="col-md-12 p-5">

                            <input type="text" name="name" id="" value="{{ $partner->name }}" placeholder="Name" class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-md btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>








<!--start::Store Opportunity-->

<!--end::Store Opportunity-->






@endsection
