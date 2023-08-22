@extends('layouts.master')

@section("title","Opportunity Types")

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Opportunity Types</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Opportunity Types</a>
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
                        <h3 class="card-label">Opportunity Types List</h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModalLong">
                            <span class="flaticon-add"></span>
                            Add New Type
                        </button>

                        <!-- Modal-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-striped" id="table">
                        {{--                    <table class="table table-striped" id="kt_datatable">--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach(\App\Models\OpportunityType::all() as $key=>$opportunitytype)

                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$opportunitytype->name}}</td>
                                <td>{{$opportunitytype->description}}</td>
                                <td>{{$opportunitytype->created_at}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="" data-name="{{$opportunitytype->name}}" data-date=""
                                           data-opportunity-type-id="{{$opportunitytype->id}}"
                                           data-description="{{$opportunitytype->description}}"
                                           data-kn="{{$opportunitytype->name_kn}}"
                                           class="btn btn-primary js-edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a href="{{route('admin.opportunity-type.destroy',$opportunitytype->id)}}" class="btn btn-danger js-delete"><span
                                                class="fa fa-trash"></span> Delete</a>
                                    </div>
                                </td>
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

    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.opportunity-type.store')}}" method="post" id="submissionForm" class="submissionForm" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Opportunity Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="name_kn" name="name_kn"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" placeholder="description" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i> Save </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>



    <div class="modal fade" id="modalUpdate" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="submissionFormEdit" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="0"  id="opportunitytype-id" name="opportunitytype-id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="edit-name" name="name" placeholder="name" class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="name_kn">Name (Kin)</label>
                            <input type="text" id="edit-kn" name="name_kn"  class="form-control"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" id="edit-description" name="description" placeholder="description" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-refresh"></i>Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>





    <!-- /.modal -->


@endsection


@section("scripts")
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateOpportunityType::class,'.submissionForm') !!}
    <script>

        $(document).ready(function() {
            $('#table').DataTable();
        } );

        $('.nav-system-settings').addClass('menu-item-active  menu-item-open');
        $('.nav-opportunity-types').addClass('menu-item-active');
        $(document).on('click', '.js-edit', function (e) {
            e.preventDefault();
            $("#modalUpdate").modal('show');
            var opportunity_type_id = $(this).data('opportunity-type-id')
            var url = "{{route('admin.opportunity-type.update',':id')}}"
            url = url.replace(':id', opportunity_type_id)
            $("#opportunitytype-id").val($(this).data('id'));
            $("#edit-name").val($(this).data('name'));
            $("#edit-kn").val($(this).data('kn'));
            $("#edit-description").val($(this).data('description'));
            $('#submissionFormEdit').attr('action', url);
        });
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            var href = this.href;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Opportunity Type ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location = href;
                }
            });
        });

        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#opportunitytype-id').val(0);
        });
    </script>

@endsection

