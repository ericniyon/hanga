@extends('layouts.master')

@section('title', 'ICT CHAMBER CLUSTERS & ASSOCIATIONS')
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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">ICT CHAMBER CLUSTERS & ASSOCIATIONS</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">ICT CHAMBER CLUSTERS & ASSOCIATIONS</a>
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
                        <h3 class="card-label">MEMBERSHIP LEVELS AND FEES SERVICES</h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addApiModal">
                            <span class="flaticon-add"></span>
                            New Plan
                        </button>

                        <!-- Modal-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: form-->
                    <form action="{{ route('admin.membership_level.membership_level.save') }}" method="POST"
                        id="WebinarForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-auto px-20 mt-4">
                            <div class="form-group col-md-6">
                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Select Packeg</label>
                        <select name="membership_packeges_id" id="" class="form-control">
                            @forelse (App\Models\MembershipPackege::all() as $item)

                            <option value="{{ $item->id }}">{{ $item->packege_name }}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('membership_packeges_id')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                    </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="title">
                                        Membership Level Details
                                    </label>
                                    <textarea id="summernote" name="name" class="form-control summernote" required>{{ old('name') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto px-20 mt-4">
                            {{-- <div class="col-md-12"> --}}
                                @forelse (App\Models\Plan::all() as $plan)
                                    <div class="col-md-3">
                                        <input type="checkbox" id="{{ $plan->name }}" name="plans[]" value="{{ $plan->name }}">
                                        <label for="{{ $plan->name }}">{{ $plan->name }}</label>
                                    </div>
                                @empty
                                @endforelse

                            {{-- </div> --}}
                        </div>
                        <div class="row mx-auto px-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary "><span
                                            class="la la-check-circle-o"></span> Save</button>
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

    <div class="modal fade" id="addApiModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.membership_level.membership_level.save_plan') }}" method="POST"
                >
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Plan Name </label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Plan name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">Plan Price</label>
                                    <input type="text" id="price" name="price" class="form-control"
                                        placeholder="Plan Price" required="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                    class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i>Save </button>
                        </div>
                    </div>
                </div>
        </div>

        </form>
        <!-- /.modal-content -->
    </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateWebinarForm::class, '#WebinarForm') !!}
    <script>
        $('.nav-events').addClass('menu-item-active  menu-item-open');
        $('.nav-nav-webinars').addClass('menu-item-active');
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
            });
            var i = 1;
            $('#add').click(function() {
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
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                $(this).remove();
            });
            $(document).on('change', 'input[name="is_free"]', function(e) {
                e.preventDefault();
                ($(this).val() == 1) ? $('#price').css('display', 'none'): $('#price').css('display',
                    'block');
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
