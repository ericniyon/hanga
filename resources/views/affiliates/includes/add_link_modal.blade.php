<div class="modal fade" id="addAggregator" aria-labelledby="addAggregator" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addAggregator">
                    Add New Aggregator
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('client.invitations.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{__('DSP/MSME Name')}}</label>
                        <select name="group" id="group" class="form-control" id="">
                            <option value="">{{__('affiliates.Select Group')}}</option>
                            @forelse ($groups as $item)
                            <option value="{{$item->id}}" {{old('group')==$item->id?'selected':''}}>{{$item->group_name}}</option>
                            @empty
                            <option value="" disabled>-- No Groups Found --</option>
                            @endforelse
                        </select>
                        @error('group')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="">{{__('affiliates.expiry_time')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="expiry_date" min="{{\Carbon\Carbon::now()->addDay()}}" id="" class="form-control @error('expiry_date') is-invalid @enderror"
                             value="{{old('expiry_date')}}">
                            @error('expiry_date')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="expiry_time" id="" class="form-control @error('expiry_time') is-invalid @enderror" value="{{old('expiry_time')}}">
                            @error('expiry_time')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('affiliates.max_joins')}}</label>
                        <input type="number" name="maximum_joins" value="{{old('maximum_joins')}}" id="" class="form-control @error('maximum_joins') is-invalid @enderror">
                        @error('maximum_joins')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-light text-uppercase btn-sm "
                            data-dismiss="modal">
                        {{ __("client_registration.close") }}
                    </button>
                    <button type="submit" class="btn btn-info text-uppercase btn-sm ">
                        {{ __("client_registration.save_changes") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
