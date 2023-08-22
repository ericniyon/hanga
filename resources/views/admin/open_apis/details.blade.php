@extends('layouts.master')

@section("title","API Details")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">API Details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.open-apis.index')}}" class="text-muted">Open Apis</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">API Details</a>
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

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom col-md-10 mx-lg-30 my-5 align-items-center">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">{{$openApi->type??''}} Details</h3>
                    </div>
                </div>
                <div class="row col-md-12">
                <div class="card-body">
                   {{-- <div class="row">
                       @if ($openApi->logo)
                       <div class="col-sm-4 mx-auto my-5">
                           <div class="row">
                           <a href="{{route('get.api.owner_logo.path', $openApi->id)}}" target="_blank">
                               <img src="{{route('get.api.owner_logo.path', $openApi->id)}}" class="img-fluid" height="50px" width="100px" alt="no logo found"></a>

                           </div>
                        </div>
                        @endif
                   </div> --}}
                   <div class="row col-md-12">
                       <div class="col-sm-4">
                           <h6 class="mb-3">API Name</h6>
                           <h3 class="badge badge-primary rounded-0">{{$openApi->api_name??'N/A'}}</h3>
                       </div>
                       <div class="col-sm-4">
                        <h6 class="mb-3">API Link</h6>
                           <h3 class="badge badge-primary rounded-0">{{$openApi->api_link ?? 'N/A'}}</h3>
                       </div>
                       <div class="col-sm-4">
                        <h6 class="mb-3">Owner</h6>
                           <h3 class="badge badge-primary rounded-0">{{$openApi->dsp_name ?? 'N/A'}}</h3>
                       </div>
                   </div>

                    <div class="row mt-lg-10">
                        <div class="col-sm-12 text-capitalize ">
                            <h4>API Description</h4>
                            {!! $openApi->api_description??'N/A' !!}
                        </div>
                </div>
                    <div class="row pt-3">
                        <div class="col-sm-6">
                            <a class="badge badge-primary rounded-0" href="{{$openApi->link??'N/A'}}" target="_blank">{{$openApi->link?'More info':''}}</a>
                        </div>
                    </div>
            </div>
                </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection
