<div class="form-group">
    <label for="representative_physical_disability">
        @lang('client_registration.physical_disability')
    </label>

    <select name="representative_physical_disability" id="representative_physical_disability"
            class="custom-select custom-select-sm">
        <option value="">{{__('client_registration.choose')}}</option>
        @foreach(\App\Models\PhysicalDisability::all() as $item)
            <option
                    {{ optional($model)->representative_physical_disability==$item->name?'selected':'' }}
                    value="{{ $item->name }}">{{$item->name}}</option>
        @endforeach
    </select>

</div>
