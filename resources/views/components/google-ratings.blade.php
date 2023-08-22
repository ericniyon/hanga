<div>
@php

$average = 0;

@endphp

{{-- @dump(\App\Models\GoogleRatings::where('client_id', $client->id)->get('rating'))
@dump($client->id) --}}


    @foreach (\App\Models\GoogleRatings::where('client_id', $client->id)->get() as $item)

    @php

    $average = $item->rating ? $item->rating : 0;

    $average = $item->rating ? $item->rating : 0;
    
    @endphp
    @endforeach

    
    @include('partials.includes._rating_starts')
</div>
