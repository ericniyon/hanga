<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="name">Solution name </label>
            <input type="text" id="edit-name" name="name" class="form-control" placeholder="Solution name"
                   value="{{$solution->name}}"/>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="name">Logo</label>
            <div class="custom-file">
                <input type="file" id="edit-logo" name="logo" class="custom-file-input" required/>
                <label for="logo" class="custom-file-label">Choose logo</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="name">DSP Name </label>
            <input type="text" id="edit-dsp_name" name="dsp_name" class="form-control" placeholder="DSP name"
                   value="{{$solution->dsp_name}}"/>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Phone</label>
            <input type="text" id="edit-phone" name="phone" class="form-control" placeholder="Phone Number"
                   value="{{$solution->phone}}" required/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Specialties</label>
            <select name="specialties[]" id="specialties" class="form-control" required multiple>
                <option value="">--select--</option>
                @foreach(\App\Models\BusinessSector::all() as $specialty)
                    <option value="{{$specialty->id}}" {{$solution->businessSectors->where('id', $specialty->id)->first() ? 'selected': ''}}>{{$specialty->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Email</label>
            <input type="text" id="edit-email" name="email" class="form-control" placeholder="Email address"
                   value="{{$solution->email}}" required/>
        </div>
    </div>
</div>
{{-- platform --}}
<h6>@lang('client_registration.type_of_platform')</h6>
<div class="row">
    @foreach(\App\Models\PlatformType::all() as $item)
        <div class="col-md-4">
            <div class="my-2">
                <label class="checkbox mb-4">
                    <input type="checkbox" name="platforms[]"
                           {{$platforms->where('platform_type_id', $item->id)->first()? 'checked':''}}
                           value="{{ $item->id }}"/> {{ $item->name }}
                    <span class="rounded-sm"></span>
                </label>
                <label for="link{{ $item->id }}" class="sr-only">Link</label>
                <input type="url" name="link{{ $item->id }}" id="link{{ $item->id }}"
                       value="{{$platforms->where('platform_type_id', $item->id)->first()->link ?? ''}}"
                       class="form-control rounded-sm" placeholder="Link"/>

            </div>

        </div>
    @endforeach
</div>
{{-- platform --}}
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="5" id="edit-description"
                      name="description">{{$solution->description}}
            </textarea>
        </div>
    </div>
</div>
