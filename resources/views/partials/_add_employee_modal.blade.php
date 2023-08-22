<div class="modal fade" id="addEmployeeModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @lang('client_registration.employee')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.employees.store') }}" id="formSaveEmployee" method="post">
                @csrf
                <input type="hidden" name="id" id="employeeId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="employee_name">{{ __("client_registration.name") }}</label>
                        <input type="text" name="name" id="employee_name" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="employee_position">@lang('client_registration.position')</label>
                        <input type="text" name="position" id="employee_position" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="employee_recruitment_date">@lang('client_registration.recruitment_date')</label>
                        <input type="text" max="{{ now()->format('Y-md-') }}" name="recruitment_date"
                               id="employee_recruitment_date" class="form-control rounded datepicker">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="employee_level_of_study_id">@lang('client_registration.level_of_study')</label>
                                <select name="level_of_study_id" id="employee_level_of_study_id" class="custom-select">
                                    <option value="">@lang('client_registration.choose')</option>
                                    @foreach(\App\Models\StudyLevel::all() as $item)
                                        <option value="{{ $item->id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_field_of_study">@lang('client_registration.field_of_study')</label>
                                <select name="field_of_study" class="custom-select"
                                        id="employee_field_of_study">
                                    <option
                                        value="">{{__('client_registration.choose')}}</option>
                                    @foreach($fieldOfStudies as  $item)
                                        <option
                                            {{ optional($model)->field_of_study==$item->name?'selected':'' }}
                                            value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="employee_field_of_study">
                            @lang('client_registration.supporting_document')
                            @include('partials._default_allowed_file_info')
                        </label>
                        <div class="custom-file">
                            <input type="file" name="supporting_document" class="custom-file-input"
                                   id="employee_supporting_document">
                            <label class="custom-file-label"
                                   for="employee_supporting_document">@lang('client_registration.choose_file')</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
