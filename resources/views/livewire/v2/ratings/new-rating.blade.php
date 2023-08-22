<div>
    @if (session()->has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
    {{-- Be like water. --}}
    <form >
        @csrf

        <div class="row mx-auto px-20">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="event_title">Company Name</label>
                    <select id="client_id" class="form-control" wire:model="client_id">
                        <option value="">--select--</option>
                        @forelse ($clients as $item)
                            <option {{ old('client_id') == "$item->company_name" ? 'selected' : '' }}
                                value="{{ $item->application->client_id }}">{{ $item->company_name }}</option>

                        @empty
                        @endforelse

                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="company">Average rating</label>
                    <input type="number" class="form-control" wire:model="rating" value="{{ old('rating') }}"
                        placeholder="Rating">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="location">link</label>
                    <input type="text" wire:model="link" value="{{ old('link') }}" class="form-control"
                        placeholder="Kigali, Rwanda">
                </div>
            </div>
        </div>

        {{--  --}}
        <div class="row mx-auto px-20">
            <div class="col-md-3">
                <div class="form-group">

                    <label for="full_name">Reviewer Name</label>
                    <input type="text" class="form-control" wire:model="full_name.0" value="{{ old('full_name') }}">

                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">

                    <label for="cuastomer_rating">Customer Ratings</label>
                    <input type="text" class="form-control" wire:model="cuastomer_rating.0"
                        value="{{ old('cuastomer_rating') }}">

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">

                    <label for="review_date">Review Date</label>
                    <input type="datetime-local" class="form-control" wire:model="review_date.0"
                        value="{{ old('review_date') }}">

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <label for="feedback">Feedback</label>
                    {{-- <input type="text" class="form-control" name="feedback" value="{{ old('feedback') }}"> --}}
                    <textarea rows="3" wire:model="feedback.0" class="form-control" required>{{ old('feedback') }}</textarea>
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                    <label for="end_date">&nbsp;</label>
                    <button type="button" name="add" id="add" wire:click.prevent="add({{ $i }})"
                        class="form-control bg-primary px-auto mx-auto"><i class="la la-plus text-white"></i></button>
                </div>
            </div>
        </div>
        @foreach ($inputs as $key => $value)
            <div class="row mx-auto px-20">
                <div class="col-md-3">
                    <div class="form-group">

                        <label for="full_name">Reviewer Name</label>
                        <input type="text" class="form-control" wire:model="full_name.{{ $value }}" value="{{ old('full_name') }}">

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">

                        <label for="cuastomer_rating">Customer Ratings</label>
                        <input type="text" class="form-control" wire:model="cuastomer_rating.{{ $value }}"
                            value="{{ old('cuastomer_rating') }}">

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">

                        <label for="review_date">Review Date</label>
                        <input type="datetime-local" class="form-control" wire:model="review_date.{{ $value }}"
                            value="{{ old('review_date') }}">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="feedback">Feedback</label>
                        {{-- <input type="text" class="form-control" name="feedback" value="{{ old('feedback') }}"> --}}
                        <textarea rows="3" wire:model="feedback.{{ $value }}" class="form-control" required>{{ old('feedback') }}</textarea>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label for="end_date">&nbsp;</label>
                        <button type="button" name="add" id="add" wire:click.prevent="remove({{$key}})" class="form-control bg-danger px-auto"><i
                                class="la la-minus text-white"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div id="dynamic_field">
        </div> --}}



        <div class="row mx-auto px-20">
            <div class="col-md-12">
                <div class="form-group">
                    <button  wire:click.prevent="store()" class="btn btn-primary "><span class="la la-check-circle-o"></span> Save
                        </button>
                </div>
            </div>
        </div>
    </form>
</div>
