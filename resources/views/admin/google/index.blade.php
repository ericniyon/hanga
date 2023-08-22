@extends('layouts.master')

@section('title', 'Content')

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Tabs</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">New Contents</a>
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
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Ratings List</h3>
            </div>
            <div class="card-toolbar">
                <!-- Button trigger modal-->
                <a href="{{ route('admin.create.google') }}" type="button" class="btn btn-primary">
                    <span class="flaticon2-add-1"></span>
                    New rating
                </a>

                <!-- Modal-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-head-solid table-head-custom" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reviewer Name</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th>Review Date</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (\App\Models\GoogleRevers::all() as $key => $content)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{!! $content->full_name !!}</td>
                            <td>{!! $content->cuastomer_rating !!}</td>
                            <td>{!! $content->feedback !!}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.content.edit', $content->id) }}"
                                        class="btn btn-primary js-edit"><span class="fa fa-edit"></span> Edit</a>

                                    <a href="{{ route('admin.content.delete', $content->id) }}"
                                        class="btn btn-danger js-delete"><span class="fa fa-trash"></span> Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>







@endsection
