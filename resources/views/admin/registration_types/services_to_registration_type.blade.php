@extends("layouts.master")
@section("title", 'Services to Registration Type')
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
                            <a class="text-muted">Services Assignment</a>
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
                            Manage Services for <b>{{$registration_type->name}}
                        </h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                    <!--end::Dropdown-->


                </div>
                <div class="card-body">
                    <!--begin: Datatable -->
                    <form class="form" action="{{route('admin.services_to_registration_type.store',encryptId($registration_type->id))}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="service_id" value="{{encryptId($registration_type->id)}}">
                        <div class="form-group">

                            <div class="row">
                                @foreach($services as $service)
                                    <div class="col-md-3" style="padding: 2px">
                                        <label class="checkbox checkbox-outline checkbox-primary">
                                            <input type="checkbox"
                                                   @if($registration_type->services->contains($service)) checked
                                                   @endif value="{{$service->id}}"
                                                   name="services[]"> {{$service->name}}
                                            <span></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="la la-check-circle-o"></span>
                            Update Services
                        </button>

                    </form>

                </div>


            </div>

        </div>
    </div>
@stop
@section("scripts")

@stop



