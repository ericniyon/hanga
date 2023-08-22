@extends('layouts.master')

@section("title","Webinars & Workshops")
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css" rel="stylesheet">
@endsection
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Webinars & Workshops</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Webinars & Workshops</a>
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
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Create new event</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: form-->
                        <form action="{{ route('admin.webinars.store') }}" method="POST" id="WebinarForm" enctype="multipart/form-data">
                            @csrf
                                <div class="row mx-auto px-20">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="event_title">Event Title</label>
                                            <input type="text" class="form-control" name="title"  value="{{ old('title') }}" accept="image/*" placeholder="Event Title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="event_title">Event Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo" id="photo" required>
                                            <label class="custom-file-label photo" for="customFile">Choose Photo</label>
                                        </div>
                                        <x-image-file-label label=""/>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="event_title">Event Type</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">--select--</option>
                                                <option {{ old('type') == "Webinars" ? "selected" : "" }} value="Webinars">Webinars</option>
                                                <option {{ old('type') == "Workshops" ? "selected" : "" }} value="Workshops">Workshops</option>
                                                <option {{ old('type') == "Training" ? "selected" : "" }} value="Training">Training</option>
                                                <option {{ old('type') == "Info-Session" ? "selected" : "" }} value="Info Session">Info Session</option>
                                                <option {{ old('type') == "Breakfast-meeting" ? "selected" : "" }} value="Breakfast meeting">Breakfast meeting</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Company">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Kigali, Rwanda">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="start_date">Start time</label>
                                            <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date') }}"  >

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="end_date">End Time</label>
                                            <input type="datetime-local" class="form-control" name="end_date" value="{{ old('end_date') }}">

                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="end_date">&nbsp;</label>
                                            <button type="button" name="add" id="add" class="form-control bg-primary px-auto mx-auto"><i class="la la-plus text-white"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="dynamic_field">
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-6">
                                        <div class="form-group ml-5">
                                            <label>Is it Free ?</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                <input type="radio" name="is_free" value=1>
                                                <span></span>Yes</label>
                                                <label class="radio">
                                                <input type="radio" checked="checked" name="is_free" value=0>
                                                <span></span>No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="price">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row mx-auto px-20 mt-4">
                                    <div class="col-md-12">
                                        <x-image-file-label label="Attachment"/>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input attachment" name="attachment" id="attachment" required>
                                            <label class="custom-file-label attachment" for="customFile">Choose Attachment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20 mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" >
                                                Short Description
                                            </label>
                                            <textarea rows="5" name="short_description" class="form-control" required>{{ old('short_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20 mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" >
                                                Long Description
                                            </label>
                                            <textarea id="summernote" name="long_description" class="form-control summernote" required>{{ old('long_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary "><span class="la la-check-circle-o"></span> Save Event</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end: form-->
                        </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.modal -->


@endsection


@section("scripts")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <!-- Laravel Javascript Validation -->
       <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
       {!! JsValidator::formRequest(\App\Http\Requests\ValidateWebinarForm::class,'#WebinarForm') !!}
    <script>
        $('.nav-events').addClass('menu-item-active  menu-item-open');
        $('.nav-nav-webinars').addClass('menu-item-active');
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
            });
            var i=1;
            $('#add').click(function(){
                i++;
                new_field = `
                <div id="row${i}" class="row mx-auto px-20">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="start_date">Start Time:</label>
                            <input required type="datetime-local" name="start_time[]" class="form-control name_list" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="end_date">End Time:</label>
                            <input required type="datetime-local" name="end_time[]" class="form-control name_list" />
                        </div>
                    </div>
                    <div class="col-md-1 btn_remove" id="${i}">
                        <div class="form-group">
                            <label for="end_date">&nbsp;</label>
                            <button type="button" name="add" id="add" class="form-control bg-danger px-auto"><i class="la la-minus text-white"></i></button>
                        </div>
                    </div>
                    </div>
                        `;
                $('#dynamic_field').append(new_field);
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
                $(this).remove();
            });
            $(document).on('change','input[name="is_free"]', function(e){
                e.preventDefault();
                ($(this).val() == 1) ? $('#price').css('display','none') : $('#price').css('display','block');
            })
        });
    </script>
    <script type="application/javascript">
        $(document).on('change','#photo',function(e){
            e.preventDefault();
            var fileName = e.target.files[0].name;
            $('.custom-file-label.photo').html(fileName);
        });
        $(document).on('change','#attachment',function(e){
            e.preventDefault();
            var fileName = e.target.files[0].name;
            $('.custom-file-label.attachment').html(fileName);
        });
    </script>

@endsection
