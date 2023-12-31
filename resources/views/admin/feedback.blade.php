@extends('layouts.master')

@section("title","Feedback")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Feedback</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Feedback</a>
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
                        <h3 class="card-label">Feedback List</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Feedback</th>
                            <th>Submittion Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($allFeedback as $key=>$feedback)

                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$feedback->names}}</td>
                                <td>{{$feedback->email}}</td>
                                <td>{{$feedback->phone}}</td>
                                <td>{{$feedback->feedback}}</td>
                                <td>{{$feedback->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

@endsection
@section("scripts")
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
        $('.nav-client-feedback').addClass('menu-item-active  menu-item-open');
        $('.nav-client-feedback-list').addClass('menu-item-active');
    </script>

@endsection
