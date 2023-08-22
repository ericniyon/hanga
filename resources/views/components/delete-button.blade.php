<a {{$attributes}} href="{{ $href }}"
   data-toggle="tooltip" title="{{__('client_registration.delete')}}"
   class="btn btn-sm btn-danger js-delete font-weight-bolder rounded">
    @include('partials.buttons._trash_svg_icon')
    @if($showText)
        <span class="d-none d-md-inline">
        @lang('client_registration.delete')
    </span>
    @endif
</a>
