<div class="modal-content">
    <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="addAggregator">
            {{__('affiliates.modal_title')}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('client.cohorts.store')}}" method="POST">
    {{-- <form wire:submit.prevent="saveGroup" method="POST"> --}}
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">{{__('affiliates.label_name')}}</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">{{__('affiliates.label_parent')}}</label> <br>
                <select name="parent" class="form-control select2 @error('parent') is-invalid @enderror">
                    <option value="">{{__('affiliates.option_default')}}</option>
                    @forelse($parents as $group)
                    <option value="{{$group->id}}">{{$group->group_name}}</option>
                    @empty
                    <option disabled>{{__('no_data')}}</option>
                    @endforelse
                </select>
                {{-- <input type="text" name="parent" wire:model.lazy="parent" value="{{old('parent')}}" class="form-control @error('parent') is-invalid @enderror"> --}}
                @error('parent')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">{{__('affiliates.label_description')}}</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                 id="" cols="30" rows="4">{{old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer border-top-0">
            <button type="button" class="btn btn-light text-uppercase btn-sm "
                    data-dismiss="modal">
                {{ __("client_registration.close") }}

            </button>
            <button class="btn btn-info btn-sm text-uppercase" type="submit">
                <span>{{__('client_registration.save_changes')}}</span>
            </button>
        </div>
    </form>
</div>
