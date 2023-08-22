@extends("layouts.master")
@section("title", 'Company Category to Registration Type')
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Registration Type</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Company Category Assignment</a>
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
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="flex-wrap card-header">
                    <div class="card-title">
                        <h3 class="kt-portlet__head-title">
                            Manage Company Category for <b>{{$registration_type->name}}
                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                    <!--end::Dropdown-->


                </div>
                <div class="card-body">
                    <!--begin: Datatable -->
                    <form class="form"
                          action="{{route('admin.company.category.to.registration.type.store',encryptId($registration_type->id))}}"
                          method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="registration_type_id" value="{{encryptId($registration_type->id)}}">
                        <div class="form-group">

                            <div class="row">
                                @foreach($company_categories as $company_category)
                                    <div class="col-md-3" style="padding: 2px">
                                        <label class="checkbox checkbox-outline checkbox-primary">
                                            <input type="checkbox"
{{--                                                   @if($registration_type->categories->contains($company_category)) checked--}}
{{--                                                   @endif--}}
                                                   {{ in_array($company_category->id,$registration_type->categories->pluck('id')->toArray())?'checked':'' }}
                                                   value="{{$company_category->id}}"
                                                   name="categories[]"> {{$company_category->name}}
                                            <span></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                            Update Company Category
                        </button>

                    </form>

                </div>


            </div>

        </div>
    </div>
@stop
@section("scripts")

@stop



