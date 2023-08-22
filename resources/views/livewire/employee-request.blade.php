<div>
    <h4 class="my-4 font-weight-bolder">Affiliation requests</h4>
    <div class="row my-5">
      <div class="col-md-6">
          <label for="search" class="sr-only">Search</label>
          <div class="input-icon">
              <input type="search" class="form-control form-control-solid" name="search" id="search"
                     wire:model="query" autocomplete="off"
                     placeholder="Search">
              <span class="svg-icon  text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                  <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </span>
          </div>
      </div>
    </div>

    <div class="list-group mt-4">
        @forelse($employees as $item)
            <div class="my-2 {{ !$loop->last?'border-bottom border-light':'' }}">
                <div class="d-flex align-items-start mb-2 hover-opacity-75">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50 symbol-light mr-5 symbol-circle d-none d-md-block">
                        <img
                            src="{{$item->client->profilePhotoUrl}}"
                            onerror="this.src='https://ui-avatars.com/api/?name={{$item->client->name}}&amp;color=F34D10&amp;background=FBCAB8'"
                            class="h-50px w-50px object-contain align-self-center" alt="">
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <a href="{{ route('client.details',$item->client->name_slug) }}"
                           class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">
                            {{ $item->client->name }}
                            {{--                            <small class="label label-inline rounded-pill label-light-success font-weight-bolder">DSP</small>--}}
                        </a>

                        <p class="mb-0">
                            {{ $item->description }}
                        </p>
                        <p class="font-size-sm text-dark-50 font-weight-bolder mb-0">
                            {{ $item->position }} &nbsp;&nbsp;&nbsp;&nbsp;
                            <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                    <!--end::Text-->
                    <div class="d-flex flex-row align-items-center">
                        @if($item->status==\App\Constants::Pending)
                            <button wire:click="approve({{ $item }})" wire:loading.attr="disabled" type="button"
                                    class="btn btn-sm btn-light-primary rounded-pill mr-4 font-weight-bolder">
                                Approve
                            </button>
                            <button wire:loading.attr="disabled" wire:click="reject({{$item}})" type="button"
                                    class="btn btn-sm btn-secondary rounded-pill font-weight-bolder">
                                Reject
                            </button>
                        @else
                            <span
                                class="label label-light-{{ $item->statusColor }} label-inline rounded-pill font-weight-bolder">{{ $item->status }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="my-2">
                <div class="alert alert-custom alert-light alert-notice py-3">
                    <div class="alert-icon">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                              <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </div>
                    <div class="alert-text">
                        No results found
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{$employees->links()}}
    </div>

</div>
