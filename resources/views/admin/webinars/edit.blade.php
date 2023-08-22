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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Webnars & Workshops</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Webnars & Workshops</a>
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
                        <h3 class="card-label">Edit event</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: form-->
                        <form action="{{ route('admin.webinars.update',encryptId($webinar->id)) }}" method="POST" id="WebinarForm" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                                <div class="row mx-auto px-20">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="event_title">Event Title</label>
                                            <input type="text" class="form-control" name="title" value={{$webinar->title}} accept="image/*" placeholder="Event Title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="event_title">Event Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input photo" name="photo" id="photo" >
                                            <label class="custom-file-label photo" for="customFile">Choose Photo</label>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="file" class="form-control" name="photo" placeholder="Event Photo">
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="event_title">Event Type</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">--select--</option>
                                                <option {{$webinar->type ='Webinars' ?"selected"  : ''}} value="Webinars">Webinars</option>
                                                <option {{$webinar->type ='Workshops'? "selected" : ''}} value="Workshops">Workshops</option>
                                                <option {{$webinar->type ='Training' ?"selected"  : ''}} value="Training">Training</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" name="company" value="{{$webinar->company ?? ''}}" placeholder="Company">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control" value="{{$webinar->location ?? ''}}" placeholder="Kigali, Rwanda">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="start_date">Start Date</label>
                                            <input type="datetime-local" class="form-control" name="start_date" value="{{Carbon\Carbon::parse($webinar->start_date)->format('Y-m-d\TH:i') ?? ''}}">

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="end_date">End Date</label>
                                            <input type="datetime-local" class="form-control" name="end_date" value="{{Carbon\Carbon::parse($webinar->end_date)->format('Y-m-d\TH:i') ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="end_date">&nbsp;</label>
                                            <button type="button" name="add" id="add" class="form-control bg-success"><i class="la la-plus text-white"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="dynamic_field">
                                        @if ($webinar->otherDates)
                                        @foreach ($webinar->otherDates ?? [] as $key => $event)
                                            <div id="row{{$key+100}}" class="row mx-auto px-20">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="start_date">Start Time:</label>
                                                        <input required type="datetime-local" name="start_time[]" class="form-control" value="{{$event->start_date->format('Y-m-d\TH:i')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="end_date">End Time:</label>
                                                        <input required type="datetime-local" name="end_time[]" class="form-control" value="{{$event->end_date->format('Y-m-d\TH:i')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-1 btn_remove" id="{{$key+100}}">
                                                    <div class="form-group">
                                                        <label for="end_date">&nbsp;</label>
                                                        <button type="button" name="add" id="add" class="form-control text-danger">x</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                   </table>
                                </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-6">
                                        <div class="form-group ml-5">
                                            <label>Is it Free ?</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                <input type="radio" {{$webinar->is_free =true ? "checked" : ''}} name="is_free" value=1>
                                                <span></span>Yes</label>
                                                <label class="radio">
                                                <input type="radio" {{$webinar->is_free =false ? "checked" : ''}} name="is_free" value=0>
                                                <span></span>No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" value="{{$webinar->price ?? 0}}">
                                    </div>
                                    </div>
                                    <div class="row mx-auto px-20 mt-4">
                                        <div class="col-md-12">
                                            <label for="event_title">Attachment</label>
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
                                                <textarea rows="5" name="short_description" class="form-control" required>{{$webinar->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-auto px-20 mt-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description" >
                                                    Long Description
                                                </label>
                                                <textarea id="summernote" name="long_description" class="form-control summernote" required>{!! $webinar->long_description!!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row mx-auto px-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success "><span class="la la-check-circle-o"></span> Update Event</button>
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
       {!! JsValidator::formRequest(\App\Http\Requests\ValidateWebinarEditForm::class,'#WebinarForm') !!}
    <script>
        $('.nav-items').addClass('menu-item-active  menu-item-open');
        $('.nav-webinars').addClass('menu-item-active');
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
                            <button type="button" name="add" id="add" class="form-control bg-danger"><i class="la la-minus text-white"></i></button>
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
        });
    </script>

@endsection
