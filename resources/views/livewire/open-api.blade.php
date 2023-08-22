<div class="">

    <div class="row justify-content-center mt-5 flex-row-reverse align-items-center">
        <div class="col-md-6">
            <h2 class="text-center my-4 font-weight-bolder">
                @lang('app.available_apis')
            </h2>
            <div>
                <label for="search" class="sr-only">@lang('auth.search')</label>
                <div class="input-icon">
                    <input type="search" class="form-control shadow-sm border-white" name="search" id="search"
                           wire:model="query" autocomplete="off" wire:model.debounce="query"
                           placeholder="{{__('auth.search')}}">
                    <span class="svg-icon  text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"/>
                    </svg>
                </span>
                </div>
            </div>

            @if($open_apis->count() > 0)
                <p class="mt-2 mb-0 text-center font-weight-bolder text-dark-50">
                    Showing {{ $open_apis->firstItem()??0 }} to {{ $open_apis->lastItem()??0 }} out
                    of {{ $open_apis->total() }}
                    @lang('app.open_apis')
                </p>
            @endif
        </div>

    </div>


    <div class="mb-5"></div>
    <div class="row justify-content-center">
        @forelse ($open_apis as $key => $api)
            <div class="col-md-6">
                <div class="card card-custom shadow-sm card-stretch gutter-b"
                     style="background-position: right top; background-size: 40% auto;background-repeat:no-repeat; background-image: url({{ asset('assets/media/svg/shapes/abstract-'.($key >= 5 ? 1:$key+1).'.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-start py-0">
                        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>
                                    <span
                                        class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$api->api_name ?? ''}}</span>
                                    <div>
                                        @if ($api->application_id)
                                            <span
                                                class="font-weight-bolder label label-inline label-light-warning rounded-pill">{{optional(optional($api->application)->client)->name ?? ''}}</span>
                                        @else
                                            <span
                                                class="font-weight-bolder label label-inline label-light-warning rounded-pill">{{$api->dsp_name ?? ''}}</span>
                                        @endif
                                    </div>
                                    <a href="{{$api->link ?? ''}}" target="_blank" class="max-w-150px max-w-md-300px d-block">
                                        {{$api->api_link ?? ''}}
                                    </a>
                                </div>
                                <img src="{{ $api->logoUrl }}" alt=""
                                     class="align-self-end flex-shrink-1 w-100px h-100px object-contain img-thumbnail p-0 rounded">
                            </div>


                            <p class="w-100" style="word-break: break-word">
                                {{$api->api_description ?? ''}}
                            </p>
                        </div>

                    </div>
                    <!--end::Body-->
                </div>
            </div>
        @empty
            <div class="col-md-6">
                <div class="alert alert-custom alert-notice alert-warning  rounded py-2 mt-3">
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
                        {{__('No API Found!')}}
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <nav class="justify-content-center d-flex">
        @if ($open_apis->isNotEmpty())
            {{$open_apis->links()}}
        @endif
    </nav>
</div>
