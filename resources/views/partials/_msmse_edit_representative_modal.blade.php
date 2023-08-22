<div class="modal fade" id="editRepresentativeDetailsModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('client_registration.representative_details')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.msme.update.representative.details', $application->id) }}" id="formeditRepresentativeDetails" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="representative_name">@lang('client_registration.representative_name')</label>
                                <input type="text" name="representative_name" id="representative_name"
                                       class="form-control form-control-sm" required
                                       value="{{ $model->representative_name??'' }}"
                                       placeholder="@lang('client_registration.full_name')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="representative_email">@lang('client_registration.representative_email')</label>
                                <input type="text" name="representative_email" id="representative_email"
                                       class="form-control form-control-sm" required
                                       value="{{ $model->representative_email??'' }}"
                                       placeholder="@lang('client_registration.email_address')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="representative_phone">@lang('client_registration.representative_phone')</label>
                                <input type="text" name="representative_phone" id="representative_phone"
                                       class="form-control form-control-sm" required
                                       value="{{ $model->representative_phone??'' }}"
                                       placeholder="@lang('client_registration.phone_number')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="representative_position">@lang('client_registration.representative_position')</label>
                                <input type="text" name="representative_position"
                                       id="representative_position"
                                       class="form-control form-control-sm" required
                                       value="{{ $model->representative_position??'' }}"
                                       placeholder="@lang('client_registration.position')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="representative_gender">@lang('client_registration.gender')</label>
                                <select name="representative_gender" id="representative_gender" required
                                        class="custom-select custom-select-sm">
                                    <option value="">@lang('client_registration.choose')</option>
                                    @foreach(\App\Constants::genders() as $item)
                                        <option
                                            {{ optional($model)->representative_gender==$item?'selected':'' }}
                                            value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @include('partials.forms._physical_disability')
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
