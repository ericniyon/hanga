<div class="card-body">
    @if (session()->has('msg'))
    <div class="alert alert-success">New packege has been created succesfully !</div>
    @endif
    <form action="{{ route('admin.membership.packeges.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mx-auto px-20 mt-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pname">
                    Packege Name
                </label>
                <input id="pname" name='packege_name' class="form-control"
                    required>{{ old('packege_name') }}</input>
                @error('packege_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">
                    Packege Image
                </label>
                <input type="file" id="image" name='cover_picture' class="form-control"
                    required>{{ old('cover_picture') }}</input>
                @error('cover_picture')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group" wire:ignore>
                <label for="packege_description">
                    Long Description
                </label>
                <textarea id="packege_description" name="packege_description"
                    class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" required>{{ old('packege_description') }}</textarea>
                @error('packege_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mx-auto px-20">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit"  class="btn btn-primary "><span
                        class="la la-check-circle-o"></span>
                    <span wire:loading.remove>Continue</span>
                    <span wire:loading>Sending....</span>
                </button>
            </div>
        </div>
    </div>
    </form>
</div>
