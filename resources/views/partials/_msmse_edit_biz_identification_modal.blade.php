<div class="modal fade" id="editBizIdentificationModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('client_registration.business_identification')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.msme.update.business.identification', $application->id) }}" id="formeditBizIdentification" method="post">
                @csrf
                <div class="modal-body scroll overflow-hidden" style="max-height:70vh">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="company_name">@lang('client_registration.company_name')</label>
                                    <input type="text" class="form-control form-control-sm"
                                           name="company_name"
                                           id="company_name" value="{{ $model->company_name??'' }}"
                                           placeholder="@lang('client_registration.company_name')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tin">@lang('client_registration.tin')</label>
                                            <input type="text" class="form-control form-control-sm"
                                                   name="tin"
                                                   id="tin" value="{{ $model->tin??'' }}"
                                                   placeholder="@lang('client_registration.tin')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="company_phone">@lang('client_registration.phone_number')</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                   name="company_phone"
                                                   id="company_phone"
                                                   value="{{ $model->company_phone??'' }}"
                                                   placeholder="@lang('client_registration.phone_number')">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_email">@lang('client_registration.email')</label>
                                    <input type="email" class="form-control form-control-sm"
                                           name="company_email"
                                           id="company_email" value="{{ $model->company_email??'' }}"
                                           placeholder="@lang('client_registration.company_email')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="registration_date">@lang('client_registration.registration_date')</label>
                                            <input type="text" class="form-control form-control-sm datepicker"
                                                   name="registration_date"
                                                   value="{{ optional(optional($model)->registration_date)->format('Y-m-d')??'' }}"
                                                   id="registration_date" max="{{ now()->format('Y-m-d') }}"
                                                   placeholder="@lang('client_registration.registration_date')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="number_of_employees">@lang('client_registration.number_of_employees')</label>
                                            <input type="number" class="form-control form-control-sm"
                                                   name="number_of_employees"
                                                   id="number_of_employees" min="0"
                                                   value="{{ $model->number_of_employees??'' }}"
                                                   placeholder="@lang('client_registration.number_of_employees')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div
                                        class="d-md-flex justify-content-between align-content-center mb-1">
                                        <label
                                            for="rdb_certificate">@lang('client_registration.rdb_certificate')</label>
                                        @if($model->rdb_certificate??0)
                                            <a target="_blank"
                                               href="{{ route('msme.download.file',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                               class="btn btn-light-primary rounded-pill btn-sm py-1">
                                                @include('partials.buttons._svg_download_icon')
                                                <span class="d-none d-md-inline">
                                                    @lang('client_registration.download')
                                              </span>
                                            </a>
                                        @endif

                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="rdb_certificate" class="custom-file-input"
                                               id="rdb_certificate">
                                        <label class="custom-file-label"
                                               for="rdb_certificate">@lang('client_registration.choose_file')
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>{{__('app.business_category')}}</strong>
                                    <div class="row">
                                        @foreach($categories as $item)
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                           {{in_array($item->id,$selected_categories) ? 'checked' : ''}} name="categories_id[]"
                                                           value="{{$item->id}}"
                                                           id="categories_id{{$item->id}}">
                                                    {{$item->name}}
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>@lang('client_registration.what_sector_is_your_business')</strong>
                                    <div class="row">
                                        @foreach($businessSectors as $item)
                                            <div class="col-md-4">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{$item->id}}"
                                                           name="business_sector_id[]" {{in_array($item->id,$selected_business_sectors) ? 'checked' : ''}}/>
                                                    {{$item->name}}
                                                    <span class="rounded-0 border"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>
                                        @lang('client_registration.which_payment_does_your_business_offer')?
                                    </strong>
                                    <div class="row">
                                        @foreach($paymentMethods as $item)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="{{$item->id}}"
                                                               name="payment_method_id[]" {{in_array($item->id,$selected_payments) ? 'checked' : ''}}/>
                                                        {{$item->name}}
                                                        <span class="rounded-0"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <strong>
                                        @lang('client_registration.does_your_business_currently_selling_services_or_goods_over_digital_platforms')
                                        ?
                                        @lang('client_registration.if_any_choose_at_least_one')?
                                    </strong>
                                    <div class="row">
                                        @foreach($platforms as $item)
                                            <div class="col-md-4">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{$item->id}}"
                                                           name="platform_id[]" {{in_array($item->id,$selected_platforms) ? 'checked' : ''}}/>
                                                    {{$item->name}}
                                                    <span class="rounded-0"></span>
                                                </label>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>
                                       {{__('app.area_of_interest')}}
                                    </strong>
                                    <div class="row">
                                        @foreach($supportServices as $item)
                                            <div class="col-md-4 my-1">
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                           {{in_array($item->id,$selected_supports) ? 'checked' : ''}} name="support_service_id[]"
                                                           value="{{$item->id}}"
                                                           id="support_service_id{{$item->id}}">
                                                    {{$item->name}}
                                                    <span class="rounded-0"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @include('partials._group_area_of_interests')
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bio">Brief bio</label>
                                    <textarea class="form-control form-control-sm" name="bio" id="bio"
                                              placeholder="Description">{{ optional(optional($model)->application)->bio??'' }}</textarea>
                                </div>
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
