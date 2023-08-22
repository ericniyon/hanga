@extends("layouts.master")
@section("title",'Applications Details')
@section("css")

@stop
@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Details |</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route("admin.all.applications")}}" class="text-muted active">All Applications</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted active">Application Details</a>&nbsp;&nbsp;
                            <span class=" label label-light-primary label-inline rounded-pill">{{$type}}</span>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
        </div>
    </div>
@stop
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <div class="card-header p-1 d-flex align-items-center justify-content-md-between">
                    <h4 class="mb-0">Application Details of {{$application->client->name}}</h4>
                    <div>
                    <span
                        class=" label label-light-{{$application->status_color}} label-inline rounded-pill">{{ $application->status }}</span>
                        @if(returnBackOrResubmitted($application))
                            <span class=" label label-warning label-inline rounded-pill">{{returnBackOrResubmitted($application)}}</span>
                        @endif
                    </div>

                </div>
                <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                           aria-controls="pills-home" aria-selected="true">
                            <i class="flaticon2-copy text-white"></i>
                            &nbsp;
                            Details
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                           aria-controls="pills-contact" aria-selected="false">
                            <i class="flaticon2-list text-white"></i>
                            &nbsp;
                            History
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content border border-light p-4 rounded-sm" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                 aria-labelledby="pills-home-tab">
                @include('admin.applications.partials._assigned_user')
                @if ($type == App\Models\RegistrationType::DSP)
                    <x-dsp-registration-details :model="$model" :editable="false"/>
                @elseif ($type == App\Models\RegistrationType::MSME)
                    <x-msme-registration-details :model="$model" :editable="false"/>
                @elseif ($type == App\Models\RegistrationType::iWorker)
                    <x-iworker-registration-details :model="$model" :editable="false"/>
                @endif
                <div class="row my-5"></div>
                @include('admin.applications.partials._reviews_approval')

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @include('admin.applications.partials._history')
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        $('.nav-application-section').addClass('menu-item-active  menu-item-open');
        $('#message-container').hide()
        $('#status').change(function (){
            var el=$('#message-container');
            var messageElement=$('#message-id');
            var myArray =@json($application->getMessageStatuses());
            if($.inArray($(this).val(),myArray) !== -1 ){
                el.slideDown();
            }else {
                el.slideUp()
                messageElement.val('');
            }
        });


    </script>

@stop
