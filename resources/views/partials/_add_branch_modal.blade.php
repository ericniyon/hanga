<div class="modal fade" id="addBranchModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @lang('client_registration.branch')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.branches.store') }}" id="formSaveBranch" method="post">
                @csrf
                <input type="hidden" name="id" id="branchId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="branch_name">@lang('client_registration.name')</label>
                        <input type="text" name="name" id="branch_name" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="branch_province_id">@lang('client_registration.province')</label>
                        <select name="province_id" id="branch_province_id" class="custom-select">
                            <option value="">@lang('client_registration.choose')</option>
                            @foreach($provinces as $item)
                                <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_district_id">@lang('client_registration.district')</label>
                                <select name="district_id" id="branch_district_id" class="custom-select">
                                    <option value="">@lang('client_registration.choose')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_sector_id">@lang('client_registration.sector')</label>
                                <select name="sector_id" id="branch_sector_id" class="custom-select">
                                    <option value="">@lang('client_registration.choose')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_cell_id">@lang('client_registration.cell')</label>
                                <select name="cell_id" id="branch_cell_id" class="custom-select">
                                    <option value="">@lang('client_registration.choose')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_village_id">@lang('client_registration.village')</label>
                                <select name="village_id" id="branch_village_id" class="custom-select">
                                    <option value="">@lang('client_registration.choose')</option>
                                </select>
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
