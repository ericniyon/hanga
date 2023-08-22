@extends('layouts.master')

@section("title","Job Opportunities")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Opportunities</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.job.opportunities.index')}}" class="text-muted">Opportunities</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Opportunity Details</a>
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
                        <h3 class="card-label">{{$job_opportunity->job_title??''}} Details</h3>
                    </div>
                </div>
                <div class="row col-md-12">
                <div class="card-body">
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="row">
                               <h6>Logo</h6>
                           </div>
                           <div class="row">
                               @if($job_opportunity->logo)
                           <a href="{{$job_opportunity->getJobOpportunityLogo()}}" target="_blank">
                               <img src="{{$job_opportunity->getJobOpportunityLogo()}}" class="img-fluid" height="50px" width="100px" alt="no logo found"></a>
                               @else
                                   <img src={{asset('assets/media/job-opportunities.png')}}
                                        class="img-fluid height="50px" width="50px" alt="no  found">
                               @endif

                           </div>

                       </div>
                       <div class="col-sm-2">
                           <h6 class="mb-2">Company:</h6>
                           <h3 class="badge badge-secondary">{{$job_opportunity->company_name??'N/A'}}</h3>
                       </div>
                       <div class="col-sm-4">
                           <span class="mb-3">Deadline: </span>
                           <h3 class="badge badge-primary">{{optional($job_opportunity->deadline)->format('Y-m-d,H:i')??'N/A'}}
                           </h3>
                       </div>
                       <div class="col-sm-4">
                           <span class="mb-3">Display expiry date: </span>
                           <h3 class="badge badge-primary">{{optional($job_opportunity->deadline)->format('Y-m-d,H:i')??'N/A'}}
                           </h3>
                       </div>
                   </div>

                </div>
                </div>
            <!--end::Card-->
        </div>
            <div class="card card-custom  col-md-10  my-5 mx-lg-30  mt-5 mb-5">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-3">Opportunity type </h6>
                            <span class="badge badge-secondary">{{$job_opportunity->opportunityType->name?? 'N/A'}}</span>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Grant</h6>
                            <span class="badge badge-info">{{($job_opportunity->grant)?number_format($job_opportunity->grant,'2').' RWF':'N/A'}}</span>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Attachment</h6>
                            @if(($job_opportunity->attachment)!=null)
                                <a href="{{$job_opportunity->getJobOpportunityAttachment()}}"
                                   class="badge-pill" download>
                                    <button class="btn btn-sm btn-outline-info"><i class="la la-download"></i>Download</button></a>
                            @else
                                <span class="badge badge-secondary">No Attachment Available</span>
                            @endif

                        </div>
                    </div>

                    <div class="row mt-sm-10" >
                        <div class="col-sm-3">
                            <h6>Required Education Level</h6>
                            <span class="badge badge-secondary">{{$job_opportunity->opportunityStudyLevel->pluck('name')->implode(", ")??'N/A'}}</span>
                        </div>
                        <div class="col-sm-3">
                            <h6>Required Experience(Years)</h6>
                            <span class="badge badge-secondary">{{$job_opportunity->required_experience??'N/A'}}</span>
                        </div>
                        <div class="col-sm-3">
                            <h6>Availability Types</h6>
                            <span class="badge badge-secondary">{{$job_opportunity->availabilityTypes->name??'N/A'}}</span>
                        </div>
                        <div class="col-sm-3">
                            <h6>Availability Hours</h6>
                            <span class="badge badge-success rounded-card">{{$job_opportunity->availability_time??'N/A'}}</span>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card card-custom  col-md-10  mx-lg-30 mb-10">
                <div class="card-body">
                <div class="row ">
                    <div class="col-sm-12 text-capitalize ">
                        <h4>Opportunity Description</h4>
                        {!! $job_opportunity->job_details??'N/A' !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="" href="{{$job_opportunity->link??'N/A'}}" target="_blank"><button class="btn btn-outline-primary">{{$job_opportunity->link?'More info':''}}</button></a>
                    </div>
                </div>
            </div>
            </div>
        <!--end::Container-->
    </div>
@endsection
