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
    <form class="submissionForm p-5" action="{{ route('admin.update.resource', $resource->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
            <div class="modal-body">

                <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Resource Title </label>
                                <input type="text" name="resource_title" value="{{ $resource->resource_title }}" class="form-control" placeholder=" title"/>
                            </div>
                            @error('resource_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Link (if available)</label>
                                <input type="text" name="resource_link" value="{{ $resource->resource_link }}" class="form-control" placeholder=" link"/>
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
                                <select name="resource_field" id="" value="{{ $resource->resource_field }}" class="form-control">
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
                                <input type="file" name="resource_cover" value="{{ asset('resource_cover/'.$resource->resource_cover) }}"  class="form-control" placeholder=" link"/>
                                <img src="{{ asset(''.$resource->resource_field) }}" alt="" srcset="">
                            </div>
                            @error('resource_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Category </label>
                                <select name="resource_category" value="{{ $resource->resource_field }}" id="" class="form-control">
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
                                 <textarea class="form-control"  name="resource_description" id="" cols="10" rows="5">{{ $resource->resource_description }}</textarea>
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






<!--start::Store Opportunity-->

<!--end::Store Opportunity-->






@endsection
