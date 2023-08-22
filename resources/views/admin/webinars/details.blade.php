@extends('layouts.master')

@section("title","Webinars & Workshops")
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css" rel="stylesheet">
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<style>
.img-fluid {
        border: white solid 10px;
        box-shadow: 0 0 15px #0000006b;
    }
</style>
@endsection
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Webnars & Workshops</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted" href="{{ route('admin.webinars.index') }}" >Webnars & Workshops</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted" href="#" >Event Details</a>
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
                        <h3 class="card-label">{{$webinar->title??''}} Details</h3>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="card-body">
                        <main role="main" class="container mt-3">
                            <div class="row">
                                <img src="{{$webinar->getImage()}}" alt="" class="img-fluid d-block mb-5">
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                <div class="event-details">
                                    <h6>Event Date and Time:</h6>
                                    <div class="row">
                                        <div class="col-4 my-2">
                                            <strong>Start Time</strong> : {{ Carbon\Carbon::parse($webinar->start_date)->format('M d, Y h:m A')}} <br>
                                            <strong>End Time</strong>&nbsp;&nbsp; : {{ Carbon\Carbon::parse($webinar->end_date)->format('M d, Y h:m A')}}
                                        </div>
                                    @if ($webinar->otherDates)
                                        @foreach (json_decode($webinar->otherDates) ?? [] as $key => $event)
                                            <div class="col-4 my-2">
                                                <strong>Start Time</strong> : {{ Carbon\Carbon::parse($event->start_date)->format('M d, Y h:m A')}} <br>
                                                <strong>End Time</strong> &nbsp;&nbsp;: {{ Carbon\Carbon::parse($event->end_date)->format('M d, Y h:m A')}}
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>
                                    <p class="mt-3">
                                        <div class="ml-3 text-muted">Event hosted by <a href="#">{{$webinar->company}}</a>
                                    </p>
                                  <hr>
                                    <div class="text-dark">{{$webinar->short_description}}</div>
                                    <hr>
                                    <div>{!!$webinar->long_description!!}</div>
                                    <div class="my-5 row">
                                        <div class="col-sm-4">
                                            @if(($webinar->attachment)!=null)
                                            <h5 class="mb-3">Attachment</h5>
                                                <a href="{{$webinar->getAttachment()}}"
                                                   class="badge-pill" download>
                                                    <button class="btn btn-sm btn-outline-info"><i class="la la-download"></i>Download</button></a>
                                            @endif
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <p>&nbsp;</p>
                                            <a href="{{ route('admin.webinars.edit', encryptId($webinar->id)) }}" class="btn btn-outline-success btn-sm px-5"><span><i class="fas fa-recycle"></i></span> Update Event</a>
                                        </div>

                                    </div>
                              </div><!-- /.blog-main -->
                            </div><!-- /.row -->

                          </main>
                    </div>
                </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection



@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <!-- Laravel Javascript Validation -->
       <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
       {!! JsValidator::formRequest(\App\Http\Requests\ValidateWebinarForm::class,'#WebinarForm') !!}
    <script>
        $('.nav-events').addClass('menu-item-active  menu-item-open');
        $('.nav-webinars').addClass('menu-item-active');
    </script>

@endsection
