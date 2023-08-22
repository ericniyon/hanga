
<div class="col-lg-8">
    <div class="card mb-3 rounded border-0 shadow-sm">
        <div class="card-body">
            <div class="single-sidebar-widget search-widget">
                <form class="" action="">
                    <label for="search" class="sr-only">{{__('auth.search')}}</label>
                    <div class="input-group">
                        <input placeholder="{{__('auth.search')}}" name="search" id="search" type="search"
                               class="form-control shadow-sm" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = '{{__('auth.search')}} ..'"
                               wire:model="query" wire:model.debounce="query"
                        >
                        <div class="input-group-addon input-group-append">
                            <button type="submit" class="btn btn-primary text-white">
                                {{ __('auth.search') }}
                                           <span class="svg-icon">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
                                           </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @forelse($webinars as $webinar)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 rounded border-0 shadow-sm">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{$webinar->getImage()}}" style="height: 100%;" alt=""
                                 class="img-fluid object-cover rounded-left">
                        </div>
                        <div class="col-md-8">
                            <div
                                class="card-body d-flex flex-column h-100 align-items-baseline justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="font-weight-bolder">
                                            {{$webinar->title}}
                                        </h4>
                                        <span class="label label-light-primary label-inline rounded-0">
                                                     {{$webinar->type}}
                                                </span>
                                    </div>
                                    <p class="card-text">
                                        {{$webinar->short_description}}
                                    </p>

                                    <div
                                        class="card-text mb-0 mt-3 d-md-flex align-items-center justify-content-between">
                                        <h6 class="text-primary">
                                            <span class="font-weight-bolder">{{optional($webinar->start_date)->format("j")}}<sup>{{optional($webinar->start_date)->format("S")}}</sup> {{optional($webinar->start_date)->format("F Y H:i A")}}</span>
                                        </h6>
                                        <span
                                            class="label label-light-primary label-inline rounded-pill">
                                                        @if($webinar->is_free)
                                                Free
                                            @else
                                                RWF {{$webinar->price}}
                                            @endif
                                                    </span>
                                    </div>
                                </div>
                                <a href="{{ route('webinars.details',encryptId($webinar->id)) }}"
                                   class="btn btn-primary btn-sm rounded-pill text-white font-weight-bolder mt-4">
                                    {{__("auth.read_more")}}
                                    <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 rounded border-0">
                    <div class="card-body">
            <div class="alert alert-custom alert-notice alert-light-warning  rounded-0 mt-3">
                <div class="alert-text">
                    {{__('app.no_events')}}
                </div></div>
                </div>
            </div>
            </div>
        </div>
    @endforelse
    {!! $webinars->links() !!}
</div>
