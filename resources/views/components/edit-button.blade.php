<button {{ $attributes }}
        data-toggle="tooltip" title="{{__('client_registration.edit')}}"
        type="button" class="btn btn-sm btn-info rounded font-weight-bolder {{ $classes }}">
    @include('partials.buttons._edit_svg_icon')
    @if($showText)
        <span class="d-none d-md-inline">@lang('client_registration.edit')</span>
    @endif
</button>
