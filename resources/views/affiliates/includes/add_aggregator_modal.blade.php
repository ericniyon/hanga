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
            <form action="{{route('client.aggregator.attach')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{__('DSP/MSME Name')}}</label>
                        <select name="company" id="1company" class="form-control" id="">
                            <option value="">Select Company</option>
                            @forelse ($clients as $item)
                            <option value="{{$item->id}}">{{$item->msme_name??$item->dsp_name}}</option>
                            @empty
                            <option value="" disabled>-- Nothing Found --</option>
                            @endforelse
                        </select>
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
