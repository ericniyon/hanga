@extends('client.v2.layout.app')
@section('title',"Opportunities List")
@section('styles')
@livewireStyles
@endsection
@section('content')

    @include('partials.includes._home_nav')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="font-weight-bolder mb-0">
                        @lang("app.My Opportunities")
                    </h2>
                    @php
                        $client = auth()->guard('client')->user();
                    @endphp
                    @if ($client->registration_type_id == 1 && $client->application->status == 'Approved')
                        <button type="button" class="btn btn-info text-white rounded font-weight-bolder"
                                data-toggle="modal"
                                data-target="#exampleModalLong">
                            @include('partials._plus_icon')
                            @lang('app.create_opportunity')
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <livewire:my-opportunities/>

    </div>


    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('client.store.job.opportunity')}}" method="post" id="add-job-opportunity-form"
                  class="submissionForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title">
                            {{ __('app.new_opportunity') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type">@lang("app.Opportunity Type")</label>
                                    <select name="opportunity_type" id="type" class="form-control">
                                        <option value="">@lang("app.select")</option>
                                        @foreach(\App\Models\OpportunityType::all() as $opportunity_type)
                                            <option
                                                value="{{$opportunity_type->id}}">{{$opportunity_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="job_title">{{__("app.Opportunity name")}}</label>
                                    <input type="text" id="job_title" name="job_title" class="form-control"
                                           placeholder="{{__("app.Opportunity name")}}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="level" class="d-block">@lang("app.Required Education level")</label>

                                    <select style="width: 100% !important;" name="study_level[]" id="edit_study_level"
                                            class="form-control select2" multiple="multiple">
                                        <option value="">@lang("app.select")</option>
                                        @foreach(\App\Models\StudyLevel::all() as $study_level)
                                            <option value="{{$study_level->id}}">{{$study_level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="required_experience">@lang("app.Required experience(years)")</label>
                                    <input type="number" class="form-control" id="required_experience"
                                           name="required_experience">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label for="level">@lang("app.Availability Types")</label>
                                    <select name="availability_type_id" class="form-control availability_type"
                                            id="availability_type_id">
                                        <option value="">@lang("app.select")</option>
                                        @foreach(\App\Models\AvailabilityType::all() as $availability_type)
                                            <option
                                                value="{{$availability_type->id}}">{{$availability_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="availability_time" class="availabity_time_label">@lang("app.Availability time(Hours)")</label>
                                    <input type="number" class="form-control availability-hours" id="availability_time"
                                           name="availability_time">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 ">
                                <label class="checkbox">
                                    <input type="checkbox" class="checkbox trigger" name="has_grant" id="has_grant"/>
                                    @lang("app.Has a grant ?")
                                    <span class="rounded-sm"></span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group showthis">
                                    <label for="grant" id="grant_label">@lang("app.Grant(RWF)")</label>
                                    <input type="number" id="grant" name="grant" placeholder="@lang("app.amount")"
                                           class="form-control grant"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="link">@lang("app.Link")</label>
                                    <input type="text" id="link" name="link" placeholder="https://example.com"
                                           class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">@lang('app.attachment')</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="attachment" id="attachment"
                                               aria-describedby="attachment">
                                        <label class="custom-file-label" for="attachment">@lang("client_registration.choose_file")</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="deadline">@lang('app.deadline')</label>
                                    <input type="datetime-local" id="deadline" name="deadline" class="form-control"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="job_details">@lang("client_registration.description")</label>
                                    <textarea class="form-control summernote" name="job_details" id="job_details"
                                              placeholder="@lang("app.Write here opportunity description")"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        @include('partials._modal_footer_buttons')
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>

@stop


@section("scripts")
    @livewireScripts
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
    {!! JsValidator::formRequest(App\Http\Requests\ValidateFrontJobOpportunity::class,'#add-job-opportunity-form') !!}
    <script>
        //Controlling Availability type Hours
        $(document).ready(function () {
            $(document).on("change", ".availability_type", function (event) {
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
    </script>
@endsection
