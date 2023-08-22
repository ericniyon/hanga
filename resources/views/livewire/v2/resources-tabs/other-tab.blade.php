<div class="row">
    



<div class="col-lg-12">

    <div class="row my-4 justify-content-center mb-5">
        <div class="col-md-12 " style="justify-content: center">

            {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit ducimus aliquam dolore quia unde corporis. Illum voluptatibus nam expedita quasi laborum, officiis minima cum. Consectetur porro neque tempore enim laborum sequi eveniet! Nam soluta nisi id, maiores repellendus delectus officia! --}}
        </div>
    </div>
    <div class="row my-4 justify-content-center">
        <div class="col-12">
            <x-search-input wire:model.debounce.500ms="search"/>
        </div>
    </div>

    <div class="row" style="justify-content: center">
        @forelse (App\Models\Resources::where('resource_field', "Others")->get() as $item)
        <div class="col-md-4">
            <div class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-1 overflow-hidden tw-p-4"
            style="border: 1px dashed grey; "
            >
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 mx-2" style="width: 139px;
                height: 30em; padding: 1em">
                    <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                                    {{ $item->resource_title }}
                    </span>

                                <div>

                <img class="w-md-125px w-100 h-125px object-contain align-self-start mr-md-2 rounded-lg shadow-sm" src="{{ asset('resources_covers/'.$item->resource_cover) ? asset('resources_covers/'.$item->resource_cover) : 'https://ui-avatars.com/api/?name=Eric+Niyo&amp;color=2A337E&amp;background=EDEFF3' }}" alt="">

                                        </div>
                    <p style="margin: auto">
                        {!! Str::limit($item->resource_description, 250, '...') !!}
                    </p>
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <div class="mr-2">
                                <span>Rate</span>
                                <div class="font-weight-boldest h4 mb-0">
                                    0
                                </div>
                            </div>
                            <div class="font-weight-bolder">
                                0  Review(s)
                            </div>
                        </div>
                        <div>
                    <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
            </div>

                    </div>
                    <a href="#" wire:click="singleResource({{ $item->id }})" class="btn btn-outline-info"> View More
                    </a>
                </div>
                <!--end::Title-->
            </div>
        </div>

        @empty
        <p>There is no resource found yet!</p>
        @endforelse


    </div>

</div>


</div>
