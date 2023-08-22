<div class="container my-5">

    <div class="row justify-content-center mt-5 flex-row-reverse align-items-center">
        <div class="col-md-6">
            <h3 class="text-center font-weight-bolder">
                @lang('app.ecommerce_n_digital_platforms')
            </h3>
            <div class="position-relative">
                <label for="search" class="sr-only">@lang('auth.search')</label>
                <div class="input-icon">
                    <input type="search" class="form-control border-white shadow-xs" name="search" id="search"
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
                <div style="position: absolute;right: 0;top:50%;" class="spinner spinner-primary spinner-right "
                     wire:loading.delay></div>
            </div>
            @if($solutions->count() > 0)
                <p class="mt-2 mb-0 text-center font-weight-bolder text-dark-50">
                    Showing {{ $solutions->firstItem() }} to {{ $solutions->lastItem() }} out
                    of {{ $solutions->total() }}
                    digital platforms
                </p>
            @endif
        </div>

        <div class="col-md-12">
            <ul class="nav justify-content-center">
                <li class="nav-item m-3">
                    <a class="nav-link py-2 rounded-pill {{!is_null($selectedPlatform)?'bg-light-primary':'bg-primary text-white'}}  text-center bg-hover-primary text-hover-white"
                       wire:click.prevent="filterByPlatform()"
                       href="">
                        @lang('app.all')
                    </a>
                </li>

                @foreach ($platforms  as $platform)
                    <li class="nav-item m-3">
                        <a class="nav-link py-2 rounded-pill text-center bg-hover-primary text-hover-white {{$selectedPlatform!=$platform->id?'bg-light-primary':'bg-primary text-white'}} "
                           wire:click.prevent="filterByPlatform({{$platform->id}})"
                           href="">
                            {{$platform->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>


    <div class="row mt-5 justify-content-center">
        @forelse ($solutions as $key => $solution)
            <div class="col-xl-6 col-md-6">
                <!--begin::Stats Widget 1-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                     style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-'.($key >= 5 ? 1:$key+1).'.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex align-items-start flex-column flex-grow-1">
                            <div class="flex-grow-1">
                                <a href="#" class="font-weight-bold text-muted text-hover-primary d-block font-size-h5">
                                    {{$solution->name}}
                                </a>
                                @if ($solution->application )
                                    <a class="badge bg-light-primary px-4 py-2 font-weight-bolder rounded-pill"
                                       href="{{ route('client.details', $solution->application->client->name_slug) }}">{{optional(optional($solution->application)->client)->name}}</a>
                                    <x-rating-item :client="optional($solution->application)->client"/>
                                @else
                                    <span
                                        class="badge bg-light-primary px-4 py-2 font-weight-bolder rounded-pill">{{$solution->dsp_name??'N/A'}}</span>
                                @endif
                                <div class="font-weight-bold my-3">
                                    @lang('app.call'):
                                    @if ($solution->application)
                                        <a href="tel:{{optional(optional($solution->application)->client)->company_phone}}">{{optional(optional($solution->application)->dspRegistrations)->company_phone}}</a>
                                    @else
                                        <a href="tel:{{$solution->phone}}">{{$solution->phone}}</a>

                                    @endif
                                    <br>

                                </div>
                            </div>
                            <p class="text-dark-50 font-weight-bolder  m-0">
                                <strong>@lang('app.platform_type')</strong> <br>
                                @forelse ($solution->platformTypes as $platform)
                                    @if($platform->pivot->link)
                                        <small>
                                            <a href="{{$platform->pivot->link}}" target="_blank">
                                                {{$platform->name}} {{!$loop->last ? ' | ':' '}}
                                            </a>
                                        </small>
                                    @else
                                        <small>
                                            {{$platform->name}} {{!$loop->last ? ' | ':' '}}
                                        </small>
                                    @endif
                                @empty
                                    <small>
                                        N/A
                                    </small>
                                @endforelse
                            </p>

                            @if($solution->description)
                                <p class="text-dark-50 font-weight-bolder  m-0">
                                    <strong>@lang('client_registration.description')</strong> <br>
                                    <small>
                                        {{$solution->description}}
                                    </small>
                                </p>
                            @endif
                        </div>
                        @if($solution->logoUrl)
                            <img src="{{ $solution->logoUrl }}" alt=""
                                 class="align-self-center h-100px w-100px object-cover rounded p-0 img-thumbnail">
                        @endif
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 1-->
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
                        @lang('app.no_results_found')
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row justify-content-end mt-5  align-items-center">
        <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-end">
                {{ $solutions->links() }}
            </div>
        </div>
    </div>
</div>
