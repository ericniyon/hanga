<div class="">
    @forelse (App\Models\MembershipPackege::all() as $item)

<div
    class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
    <img class="w-md-125px w-100 h-125px object-contain align-self-start mr-md-2 rounded-lg shadow-sm"
        src="{{ asset('photos/'.$item->cover_picture) }}" alt="">
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
            <a href="{{ route('client.single.packege', $item->id) }}" class="text-black" style="color: black">

                {{ $item->packege_name }}
            </a>
        </span>
        <p>
           {!! $item->packege_description !!}
        </p>

    </div>

    <div class="w-md-150px w-100">

        @if (count($item->promotions)>0)
        @forelse ($item->promotions as $promotion)
        @if ($promotion->time_to_date > Carbon\Carbon::today()->toDateString() && $promotion->promotion != 'free')

        <span class="text-primary " style="font-size: 2rem; font-weight: 800">{{ $promotion->promotion }} %
            <br>
        <small style="color: #2A337E;font-size: 1rem; font-weight: 600">Valid to : {{ $promotion->time_to_date }}</small>
        </span>
        @elseif ($promotion->promotion=='free')
        <span class="text-primary " style="font-size: 2rem; font-weight: 800">Free
            <br>
        <small style="color: #2A337E;font-size: 1rem; font-weight: 600">Valid to : {{ $promotion->time_to_date }}</small>
        </span>
        @endif
        @empty

        @endforelse
        @else

        @endif

    </div>
</div>

@empty

@endforelse

</div>
