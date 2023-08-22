@extends('layouts.master')

@section("title","Digital Platform Details")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Digital Platform Details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digital-platforms.index')}}" class="text-muted">Digital Platforms</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Digital Platform Details</a>
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
                        <h3 class="card-label">{{$solution->name??''}} Details</h3>
                    </div>
                </div>
                <div class="row col-md-12">
                <div class="card-body">
                   <div class="row col-md-12">
                       @if ($solution->owner_logo)
                       <div class="col-sm-4">
                           <div class="row">
                               <h6>Owner Logo</h6>
                           </div>
                           <div class="row">
                           <a href="{{route('get.api.owner_logo.path', $solution->id)}}" target="_blank">
                               <img src="{{route('get.api.owner_logo.path', $solution->id)}}" class="img-fluid" height="50px" width="100px" alt="no logo found"></a>

                           </div>
                        </div>
                        @endif
                       <div class="col-sm-4">
                           <h6 class="mb-3">DSP Name</h6>
                           <h3 class="badge badge-secondary rounded-0">{{$solution->dsp_name??'N/A'}}</h3>
                       </div>
                       <div class="col-sm-4">
                        <h6 class="mb-3">Telephone</h6>
                           <h3 class="badge badge-secondary rounded-0">{{$solution->phone ?? 'N/A'}}</h3>
                       </div>
                       <div class="col-sm-4">
                           <h6 class="mb-3">Email</h6>
                           <h3 class="badge badge-secondary rounded-0">{{$solution->email ?? 'N/A'}}</h3>
                       </div>
                   </div>
                    <div class="row ">
                        <div class="col-sm-6 text-capitalize mt-5">
                            <h4>Specialities</h4>
                            @forelse($solution->businessSectors as $specialty)
                                <input type="checkbox" checked disabled> {{$specialty->name}} <br>
                            @empty
                                <span class="text-muted">None</span>
                            @endforelse
                        </div>
                        <div class="col-sm-6 text-capitalize mt-5">
                            <h4>Platforms</h4>
                            @forelse($solution->platformTypes as $platform)
                                <input type="checkbox" checked disabled> <a href=" {{$platform->pivot->link}}"data-toggle="tooltip" data-placement="right" title="{{$platform->pivot->link}}">{{$platform->name}}</a>
                                <br>
                            @empty
                                <span class="text-muted">None</span>
                            @endforelse
                        </div>
                </div>
                    <div class="row my-5">
                        <div class="col-sm-12 text-capitalize ">
                            <h4>API Description</h4>
                            {!! $solution->description??'N/A' !!}
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-sm-6">
                            <a class="badge badge-primary rounded-0" href="{{$solution->link??'N/A'}}" target="_blank">{{$solution->link?'More info':''}}</a>
                        </div>
                    </div>
            </div>
                </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection
