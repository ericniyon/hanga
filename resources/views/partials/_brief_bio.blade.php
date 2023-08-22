<div data-limit="800"
     x-data="{content: '{{ optional(optional($model)->application)->bio??'' }}',limit: $el.dataset.limit,get remaining() { var rem=this.limit - this.content.length;if(rem<=0) return 0; return rem}}">
    <div class="form-group">
        <label for="bio" class="d-block font-weight-bolder">@lang('client_registration.brief_bio')</label>
        <textarea class="form-control" name="bio" id="bio" x-model="content"
                  placeholder="@lang('client_registration.brief_bio')">{{ optional(optional($model)->application)->bio??'' }}</textarea>
        <span class="text-info small">{{ __('app.You have') }} <span x-text="remaining"></span> {{ __('app.characters remaining') }}.</span>
    </div>
</div>
