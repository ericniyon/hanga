<div class="modal fade" id="addAffiliates" aria-labelledby="addAffiliates" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addAffiliates">
                    Add New Affiliate
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-content">
                <form action="{{route('client.affiliates.attach')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{__('affiliates.label_group')}}</label> <br>
                            <select name="grou_name" class="form-control select2 @error('grou_name') is-invalid @enderror" style="width: 100%">
                                <option value="">{{__('affiliates.option_default')}}</option>
                                @forelse ($groups as $item)
                                <option value="{{$item->id}}" {{old('grou_name')==$item->id?'selected':''}}>{{$item->group_name}}</option>
                                @empty
                                <option value="" disabled>{{__('affiliates.no_data')}}</option>
                                @endforelse
                            </select>
                            @error('grou_name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('affiliates.label_client')}}</label> <br>
                            <select name="client" class="form-control select2 @error('client') is-invalid @enderror" style="width: 100%">
                                <option value="">{{__('affiliates.option_default')}}</option>
                                @forelse ($clients as $item)
                                <option value="{{$item->id}}" {{old('client')==$item->id?'selected':''}}>{{$item->client_name?$item->client_name:$item->name.': '.$item->type_name}}</option>
                                @empty
                                <option value="" disabled>{{__('affiliates.no_data')}}</option>
                                @endforelse
                            </select>
                            @error('client')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light text-uppercase btn-sm "
                                data-dismiss="modal">
                            {{ __("client_registration.close") }}

                        </button>
                        <button class="btn btn-info btn-sm text-uppercase"  wire:loading.attr="disabled">
                            <span wire:loading.remove wire.target="saveGroup">{{__('client_registration.save_changes')}}</span>
                            <span wire:loading wire.target="saveGroup">{{__('affiliates.saving')}}</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
