@foreach($clients as $item)
    <div class=" @if(!$loop->last) border-bottom border-bottom-light @endif py-2 my-3 mx-4">
    <x-client-item :item="$item"/>
    </div>
@endforeach
