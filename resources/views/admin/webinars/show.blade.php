@extends('layouts.master')

@section("title","Webnars & Workshops")
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
        <div class="container bg-white">
            <!--begin::Card-->

                    <div class="row mb-2 pt-2 mx-auto mt-4">
                        <div class="col-md-10">
                          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                              {{-- <strong class="d-inline-block mb-2 text-primary">World</strong> --}}
                              <h1 class="mx-2 mt-2 mb-0">{{$webinar->title}}</h1>
                              <div class="ml-3 text-muted">Event hosted by <a href="#">{{$webinar->company}}</a>
                                </div>
                              <p class="card-text mb-auto mt-2 px-2 mx-auto">{!!$webinar->short_description!!}.</p>
                              <div>
                                    <h6 class="left">Price: <span class="text-primary">{{$webinar->is_free ? 'Free' : $webinar->price . ' RWF'}}</span></h6>
                                    <h6 class="right">Location: <span class="text-primary">{{$webinar->location}}</span></h6>
                              </div>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                @if ($webinar->photo)
                                <img src="{{ asset($webinar->photo) }}" alt="photo"  class="bd-placeholder-img" data-fancybox width="200" height="250">
                                @else
                                <svg class="bd-placeholder-img" width="200" height="250" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Event Image</text></svg>
                                @endif
                            </div>
                          </div>
                        </div>
                    </div>
                    <main role="main" class="container mt-3">
                        <div class="row">
                          <div class="col-md-8 blog-main">
                            <div class="blog-post">
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
                              <hr>
                                <div>{!!$webinar->long_description!!}</div>

                                <div class="my-5">
                                    <a href="{{ route('admin.webinars.edit', encryptId($webinar->id)) }}" class="btn btn-outline-success btn-lg px-5"><span><i class="fas fa-recycle"></i></span> Update Event</a>
                                </div>
                          </div><!-- /.blog-main -->
                        </div><!-- /.row -->

                      </main>
        <!--end::Container-->
    </div>
    <!-- /.modal -->


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
