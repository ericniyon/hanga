<div class="card-body">
    @if (session()->has('msg'))
        <div class="alert alert-success">New packege has been created succesfully !</div>
    @endif
    <form>
        @csrf
        <div class="row mx-auto px-20 mt-4">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">
                        Valide From
                    </label>
                    <input type="date" id="image" wire:model='time_from_date' class="form-control" min="{{ \Carbon\Carbon::today()->toDateString() }}"
                        required>{{ old('time_from_date') }}</input>
                    @error('time_from_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">
                        Valide To
                    </label>
                    <input type="date" id="image" wire:model='time_to_date' class="form-control" min="{{ \Carbon\Carbon::today()->toDateString() }}"
                        required>{{ old('time_to_date') }}</input>
                    @error('time_to_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 ">
                <label for="">Packege</label>
                <select wire:model="membership_packeges_id" id="" class="form-control">
                    <option value="">---- select packege ----</option>
                    @forelse (App\Models\MembershipPackege::all() as $packege)
                        <option value="{{ $packege->id }}">{{ $packege->packege_name }}</option>
                    @empty
                    @endforelse
                    @error('membership_packeges_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </select>

            </div>

            <div class="row justify-center pl-5">

                <div class="col-md-7 ">
                    <div class="form-group">
                        <label>Is it Free ?</label>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio"  wire:model="total_free" value="0">
                                <span></span>Yes</label>
                            <label class="radio" for="no">
                                <input type="radio"  wire:model="total_free" value="1" id="no">
                                <span></span>No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                            @if ($total_free)
                            <label for="pname">
                                Promotion
                            </label>
                            <input id="pname" wire:model='promotion' type="number" class="form-control"
                                required>{{ old('promotion') }}</input>
                            @error('promotion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @endif
                        </div>
                    </div>
            </div>

        </div>
        <div class="row mx-auto px-20 mt-5">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" wire:click.prevent='save' class="btn btn-primary "><span
                            class="la la-check-circle-o"></span>
                        <span wire:loading.remove>Continue</span>
                        <span wire:loading>Sending....</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
