
<div class="">
    <div class="position-relative " x-data="{isOpen:true}" @click.away="isOpen=false">
        <div class="form-group mb-0">
            <label for="search" class="sr-only">Search</label>
            <input type="search" class="form-control form-control-lg rounded shadow border-white" name="search" id="search" wire:model="query"
                   autocomplete="off" wire:model.debounce="query"
                   placeholder="Search..."
                   @focus="isOpen=true"
                   @keydown.escape.window="isOpen=false"
                   @keydown.shift.tab="isOpen=false"
            >
        </div>


        @if(! empty($query))
            <div class="position-absolute  card card-body p-2 rounded shadow-lg w-100 mt-4 zindex-1"
                 x-show.transition.opacity="isOpen"
            >
                @if($clients->count() > 0)
                    <div class="mb-2 list-group list-group-flush">
                        @forelse($clients as $item)
                            <div class="d-flex align-items-center flex-wrap mb-2 hover-opacity-80 list-group-item px-0">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50 symbol-light mr-5 symbol-circle">
                                    <img src="{{ $item->profile_photo_url }}"
                                         onerror="if (this.src !== 'error.jpg') this.src = '{{$item->defaultPhotoUrl}}';"
                                         class="h-30px w-30px object-cover align-self-center"
                                         alt="">
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="{{ route('client.details',['slug'=>$item->name_slug,'from'=>url()->current()]) }}"
                                       class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 handle-click-search-event">
                                        {{ $item->name }}
                                    </a>
                                    <small class="text-muted font-weight-bold">
                                        {{ $item->registrationType->name }}
                                    </small>
                                </div>
                                <!--end::Text-->
                                <div>

                                </div>

                            </div>
                        @empty
                        @endforelse
                    </div>

                @elseif(!empty($query))
                    <p class="mb-0 p-3">
                        No results found for
                        <strong>{{ $query }}</strong>
                    </p>
                @endif
            </div>

        @endif
    </div>

</div>
