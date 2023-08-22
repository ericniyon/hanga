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
                        <h3 class="card-label">ICT CHAMBER CLUSTERS & ASSOCIATIONS </h3>
                    </div>
                </div>
                @livewire('cluster-update',['cluster' => $cluster])
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.modal -->


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

            var i = 1;
            $('#add').click(function() {
                i++;
                new_field = `
                <div id="row${i}" class="row mx-auto px-20">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="item">Item:</label>
                            <input required type="text" name="items[]" class="form-control" />
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
