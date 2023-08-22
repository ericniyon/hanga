@extends("layouts.master")
@section("title",'Members Details')
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
                            <a href="{{route("admin.clients.index")}}" class="text-muted active">All members</a>
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
            <div class="card-header py-1 d-flex align-items-center justify-content-md-between">
                <h4 class="mb-0">Details of {{$application->client->name}}</h4>
            </div>
        </div>
        <div class="mt-0">
                @if ($type == App\Models\RegistrationType::DSP)
                    <x-dsp-registration-details :model="$model" :editable="false"/>
                @elseif ($type == App\Models\RegistrationType::MSME)
                    <x-msme-registration-details :model="$model" :editable="false"/>
                @elseif ($type == App\Models\RegistrationType::iWorker)
                    <x-iworker-registration-details :model="$model" :editable="false"/>
                @endif
        </div>



    </div>
@endsection


@section('scripts')
    <script>
        $('.nav-all-members').addClass('menu-item-active');
    </script>


@stop
