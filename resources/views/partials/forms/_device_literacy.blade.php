
<label for="digital_literacy">@lang('client_registration.device_literacy')</label>
<div class="checkbox-inline">

    @foreach(\App\Constants::literacy() as $item)
        <label class="checkbox">
            <input name="digital_literacy[]"
                   {{ in_array($item,optional($model)->digital_literacy??[])?'checked':'' }} type="checkbox"
                   value="{{ $item }}"/> {{ __('app.'.$item) }}
            <span></span>
        </label>
    @endforeach

</div>
