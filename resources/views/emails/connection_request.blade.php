@component('mail::message',['data' =>$data])
Hi {{$data["friend"]}}, I'd like to join your iHUZO network.
<div style="width: 100%">
<div style="display: inline-block;width: 60px">
<img style="height: 50px;width: 50px;align-self: center" src="{{$data["profile_image"]}}" alt="">
</div>
<div style="display: inline-block">
<h4 style="margin-bottom: 0 !important;">{{$data["requester_name"]}}</h4>
{{$data["requester_type"]}}
</div>
<div style="display: block">
<p>{{$data["requester_bio"]}}</p>
</div>
</div>
<div style="width: 100%;margin-top: -20px !important;">
<div style="display: inline-block">
@component('mail::button', ['url' => $data["profile_url"]])
    View Profile
@endcomponent
</div>
<div style="display: inline-block">
@component('mail::button', ['url' => $data["accept_url"]])
    Accept
@endcomponent
</div>
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
