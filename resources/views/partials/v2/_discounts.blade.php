<div
        class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card p-3 overflow-hidden tw-rounded-lg tw-shadow border-0">
    <img class="w-125px object-contain rounded-lg shadow-sm"
         src="{{ $item->cover_photo ? asset('storage/discount_img/'.$item->cover_photo) : ''  }}"
         alt="{{ $item->title }}">
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span
                class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
           {{$item->title ?? ''}}
        </span>
        <div>
            {{$item->description ?? ''}}
        </div>


        <div class="d-flex align-items-center mt-3">
            <div class="mr-2">
                <span class="font-weight-bolder">
                    {{ __('app.share_on') }}
                </span>
            </div>
            <x-social-media :url=/>

        </div>
        @if ($item->to)
            {{-- <h6 class="text-dark-75 small mt-3">
                : {{$item->to ? Carbon\Carbon::parse($item->to)->isoFormat('ddd, MMM DD, Y LT') : 'N/A'}}
            </h6> --}}
        @endif
    </div>
    <!--end::Title-->
    <div class="w-md-150px w-100">
        {{-- @if(  ) --}}
            <a href="" target="_blank" class="btn btn-info rounded border-2 my-2 w-100">
                {{ __('app.Visit') }}
            </a>
        {{-- @endif --}}
        <button wire:click="showDiscountDetail({{ $item->id }})"
           class="btn btn-outline-info rounded border-2 my-2 w-100">
            {{ __('app.View Details') }}
        </button>
    </div>
</div>
