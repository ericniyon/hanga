<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === config('app.name'))
<img src="{{ asset('frontend/assets/logo.png') }}" class="logo" alt="Ihuzo Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
