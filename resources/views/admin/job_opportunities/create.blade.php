@extends('layouts.master')

@section("title","Job Opportunities")
<style>
    .showthis{
        display:none;
    }
</style>

@section('page-header')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Opportunities</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-active">Opportunities</a>
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

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Opportunities List</h3>
            </div>
            <div class="card-toolbar">
                @can('Publishing Job Opportunities')
                <!-- Button trigger modal-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModalLong">
                    <span class="flaticon2-add-1"></span>
                    New Record
                </button>
                @endcan
                <!-- Modal-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive">
                {{$dataTable->table()}}
            </div>
            <!--end: Datatable-->
        </div>
    </div>


    <!--start::Store Opportunity-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('admin.job.opportunity.store')}}" method="post" id="add-job-opportunity-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Opportunity</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Company Logo</label>
                                        <div class="custom-file">
                                            <input type="file" id="logo" name="logo" class="custom-file-input" required/>
                                            <label for="logo" class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <x-image-file-label label=""/>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Company </label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company name"/>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="w-100 d-block">Opportunity Type</label>
                                    <select name="opportunity_type" id="type" class="form-control select2" style="width: 100% !important;">
                                        <option value="">SELECT</option>
                                        @foreach(\App\Models\OpportunityType::all() as $opportunity_type)
                                            <option value="{{$opportunity_type->id}}">{{$opportunity_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
{{--                            <div class="col-lg-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="name">Type</label>--}}
{{--                                    <select name="job_type" id="type" class="form-control">--}}
{{--                                        <option value="">SELECT</option>--}}
{{--                                        @foreach(\App\Models\JobType::all() as $job_type)--}}
{{--                                            <option value="{{$job_type->id}}">{{$job_type->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Opportunity name</label>
                                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Opportunity name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="level" class="d-block">Required Education level</label>

                                        <select style="width: 100% !important;" name="study_level[]" id="edit_study_level" class="form-control select2" multiple="multiple">
                                            <option value="">SELECT</option>
                                            @foreach(\App\Models\StudyLevel::all() as $study_level)
                                                <option value="{{$study_level->id}}">{{$study_level->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="required_experience">Required experience(years)</label>
                                    <input type="text" class="form-control" id="required_experience" name="required_experience">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="level" >Availability Types</label>
                                    <select name="availability_type_id" class="form-control availability_type" id="availability_type_id"  >
                                        <option value="">SELECT</option>
                                        @foreach(\App\Models\AvailabilityType::all() as $availability_type)
                                            <option value="{{$availability_type->id}}">{{$availability_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="availability_time" class="availabity_time_label">Availability time(Hours)</label>
                                    <input type="text" class="form-control availability-hours" id="availability_time" name="availability_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 ">
                                <label for="has_name" >Has a grant?</label>
                                <input type="checkbox" class="checkbox trigger" name="has_grant">
                            </div>
                                <div class="col-lg-6" >
                                    <div class="form-group showthis">
                                        <label for="name" id="grant_label">Grant(RWF)</label>
                                        <input type="text" id="grant" name="grant" placeholder="Amount" class="form-control grant"/>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Deadline</label>
                                    <input type="datetime-local" id="deadline" name="deadline" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Display expiry date</label>
                                    <input type="datetime-local" id="expiration_date" name="expiration_date" class="form-control"  required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="attachment" id="attachment"
                                                   aria-describedby="attachment">
                                            <label class="custom-file-label" for="attachment">Choose file</label>
                                        </div>
                                        <x-image-file-label label=""/>
                                    </div>
                                </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Link</label>
                                    <input type="url" id="link" name="link" placeholder="https://example.com" class="form-control"/>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="job_details">Opportunity Description</label>
                                    <textarea class="form-control summernote" name="job_details" id="job_details" placeholder="Write down opportunity description ....."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-check"></i>Confirm </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
    <!--end::Store Opportunity-->
{{--    editJobOpportunityModal--}}
    <div class="modal fade" id="editJobOpportunityModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('admin.job.opportunity.update')}}" method="post" id="edit-job-opportunity-form" class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Opportunity</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Company Logo</label>
                                    <div class="custom-file">
                                        <input type="hidden" id="edit_job_id" name="job_id" class="form-control"/>
                                        <input type="file" id="edit_logo" name="logo" class="custom-file-input" aria-describedby="logo"/>
                                        <label for="logo" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-image-file-label label=""/>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Company</label>
                                    <input type="text" id="edit_company_name" name="company_name" class="form-control" placeholder="Company name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="d-block">Opportunity Type</label>
                                    <select name="opportunity_type" id="edit_opportunity_type" class="form-control select2" style="width: 100%!important;">
                                        <option value="">SELECT</option>
                                        @foreach(\App\Models\OpportunityType::all() as $opportunity_type)
                                            <option value="{{$opportunity_type->id}}">{{$opportunity_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Opportunity name</label>
                                    <input type="text" id="edit_job_title" name="job_title" class="form-control" placeholder="Opportunity name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group d-block">
                                    <label for="study_level" >Required Education Level</label>
                                        <select style="width: 100% !important;" name="study_level[]" class="form-control select2 " id="kt_select2_3"  multiple="multiple">
                                            <option value="">SELECT</option>
                                            @foreach(\App\Models\StudyLevel::all() as $study_level)
                                                <option value="{{$study_level->id}}">{{$study_level->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="required_experience">Required experience(Years)</label>
                                    <input type="text" class="form-control" id="edit_required_experience" name="required_experience">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="level" >Availability Types</label>
                                    <select name="availability_type_id" class="form-control availability_type" id="edit_availability_type_id" style="width:100%">
                                        <option value="">SELECT</option>
                                        @foreach(\App\Models\AvailabilityType::all() as $availability_type)
                                            <option value="{{$availability_type->id}}">{{$availability_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
                                    <label for="availability_time" class="edit-availabity_time_label">Availability time(Hours)</label>
                                    <input type="text" class="form-control edit-availability-hours" id="edit_availability_time" name="availability_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="has_name">Has a grant?</label>
                                <input type="checkbox" class="checkbox  trigger" value="1" name="has_grant" id="edit_has_grant">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group showthis">
                                    <label for="name">Grant(RWF)</label>
                                    <input type="text" id="edit_grant" name="grant" placeholder="Amount" class="form-control grant"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Deadline</label>
                                    <input type="datetime-local" id="edit_deadline" name="deadline" class="form-control"  required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Display expiry date</label>
                                <input type="datetime-local" id="edit_expiration_date" name="expiration_date" class="form-control"  required/>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Attachment</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="attachment" id="edit_attachment"
                                               aria-describedby="attachment">
                                        <label class="custom-file-label" for="attachment">Choose file</label>
                                    </div>
                                    <x-image-file-label label=""/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Link</label>
                                    <input type="text" id="edit_link" name="link" placeholder="https://example.com" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Opportunity Description</label>
                                    <textarea class="form-control summernote" name="job_details" id="edit_job_details" placeholder="Write down Job description ....."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="la la-close"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="la la-refresh"></i>Update </button>
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

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateJobOpportunity::class,'#add-job-opportunity-form') !!}
    {!! JsValidator::formRequest(App\Http\Requests\ValidateEditJobOpportunity::class,'#edit-job-opportunity-form') !!}
    {{$dataTable->scripts()}}

    <script>
        $('.nav-job-opportunities').addClass('menu-item-active  menu-item-open');
        $('.nav-job-opportunities-list').addClass('menu-item-active');

        $('.select2').select2({
            placeholder: "Select Required Education Level ",
            width:'100%',

        });
        $(".availability-hours").hide();
        $(".availabity_time_label").hide();
        //File editing script
        $(document).on("change",'.custom-file-input', function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        //Controlling Availability type Hours
        $( document ).ready(function() {
        $(document).on("change",".availability_type", function(event){
            console.log($(this).val())
                if ($(this).val() == 2) {
                    $(".availability-hours").show();
                    $(".availabity_time_label").show();

                } else {
                    $(".availability-hours").hide();
                    $(".availability-hours").val('');
                    $(".availabity_time_label").hide();
                }
                //Updating
            if ($(this).val() == 2) {
                $(".edit-availability-hours").show();
                $(".edit-availabity_time_label").show();

            } else {
                $(".edit-availability-hours").hide();
                $(".edit-availability-hours").val('');
                $(".edit-availabity_time_label").hide();
            }
            });
        });
        //Checkbox
        $(document).ready(function(){
            $(".trigger").click(function(){
                if (this.checked) {
                    $(".showthis").show()
                }else{
                    $(".grant").val('')
                    $(".showthis").hide()
                }
                // $(".showthis").toggle();
            });
        });

        $("input[name='has_grant']").change(function() {
            $(this).next('.grant').toggle(this.checked);
        });
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                focus:true
            })
        });

        $(document).on('click', '.edit-job-opportunity', function (e) {
            e.preventDefault();
            // $("#editJobOpportunityModal").modal('show');
            var url2 = $(this).data('url2');
            var url = $(this).data('url');
            $.getJSON(url2,function(response){
                $("#edit_job_details").summernote("code", response.job_details);
                var has_grant=response.has_grant;
                console.log(has_grant)
                if (has_grant === true) {
                    $('.showthis').show();
                    $('#edit_has_grant').prop('checked', true);
                } else {
                    $('.showthis').hide();
                    $(".grant").val('')
                    $('#edit_has_grant').prop('checked', false);
                }
            });


            // console.log(job_details)
            $("#edit_job_id").val($(this).data('job-opportunity-id'));
            $("#edit_company_name").val($(this).data('company-name'));
            $("#edit_job_title").val($(this).data('job-title'));
            $("#edit_job_type").val($(this).data('job-type'));

            var has_grant=$(this).data('has-grant');
            $("#edit_required_experience").val($(this).data('required-experience'))
            $("#edit_opportunity_type").val($(this).data('opportunity-type'));
            $("#edit_availability_type_id").val($(this).data('availability-type'));
            $("#edit_availability_time").val($(this).data('availability-time'));
            // $("#edit_study_level").val($(this).data('study-level'));
            console.log($(this).data('study-levels'))
            $('#kt_select2_3').val($(this).data('study-levels'));
            $('#kt_select2_3').trigger('change');
            $("#edit_link").val($(this).data('link'));
            var deadline= $(this).data('deadline')
            var expiration_date=$(this).data('expiration-date')

            // Deadline update
            var isoStr = new Date(deadline).toISOString();
            $('#edit_deadline').val(isoStr.substring(0,isoStr.length-1));

            // Expiration Date update
                var isoStr = new Date(expiration_date).toISOString();
                $('#edit_expiration_date').val(isoStr.substring(0, isoStr.length - 1));


            $("#edit_grant").val($(this).data('grant'));
            $('#edit-job-opportunity-form').attr('action', url);
        });
        $(document).on('click', '.delete-job-opportunity', function (e) {
            e.preventDefault();
            var delete_job_opportunity= $(this).data("delete-job-opportunity-id");
            var url = "{{route('admin.job.opportunity.destroy',':job-opportunity-id')}}";
            url = url.replace(":job-opportunity-id", delete_job_opportunity)
            Swal.fire({
                title: "Delete  Opportunity",
                text: " Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.value) {
                    location.href=url;
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
        });

        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#IncomeId').val(0);
        });
    </script>



@endsection
