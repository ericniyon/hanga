<div class="modal fade" id="EditCompanyAddressModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                   Edit @lang('client_registration.company_address')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.msme.update.company.address', $application->id) }}" id="formEditCompanyAddress" method="post">
                @csrf
                <div class="modal-body">
                        <div class="my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            for="province_id">@lang('client_registration.province')</label>
                                        <select name="province_id" id="province_id" required
                                                class="custom-select  custom-select-sm">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach($provinces as $item)
                                                <option
                                                    {{ optional($model)->province_id==$item->id?'selected':'' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            for="district_id">@lang('client_registration.district')</label>
                                        <select name="district_id" id="district_id" required
                                                class="custom-select  custom-select-sm">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach($districts as $item)
                                                <option
                                                    {{ optional($model)->district_id == $item->id?'selected':'' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sector_id">@lang('client_registration.sector')</label>
                                        <select name="sector_id" id="sector_id" required
                                                class="custom-select  custom-select-sm">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach($sectors as $item)
                                                <option
                                                    {{ optional($model)->sector_id == $item->id?'selected':'' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cell_id">@lang('client_registration.cell')</label>
                                        <select name="cell_id" id="cell_id" required
                                                class="custom-select  custom-select-sm">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach($cells as $item)
                                                <option
                                                    {{ optional($model)->cell_id == $item->id?'selected':'' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="village_id">@lang('client_registration.village')</label>
                                        <select name="village_id" id="village_id" required
                                                class="custom-select custom-select-sm">
                                            <option value="">@lang('client_registration.choose')</option>
                                            @foreach($villages as $item)
                                                <option
                                                    {{ optional($model)->village_id == $item->id?'selected':'' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="my-3">
                            <h4 class="font-weight-bold text-dark">@lang('client_registration.more_details')</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="website">@lang('client_registration.website')</label>
                                        <input type="url" value="{{ $model->website??'' }}"
                                               name="website" required
                                               id="website" class="form-control form-control-sm">
                                    </div>
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
