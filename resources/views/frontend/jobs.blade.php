@extends('layouts.app')
@section('title',"Opportunities")
@section('styles')
    @livewireStyles
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' integrity='sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==' crossorigin='anonymous'/>
@endsection
@section('content')
    <div class="container my-5">
        <h2 class="font-weight-bolder mb-5">
            {{ucfirst(__('app.opportunities'))}}
        </h2>
        <div class="row">
            <div class="col-md-8">
                @livewire('opportunity')
            </div>
            <div class="col-md-4">
                <div class="card card-body mb-5 border-0">
                    <div class="mt-5">
                        <h4 class="popular-title">
                            {{ucfirst(__('app.recommendations'))}}
                        </h4>
                        <div class="list-group list-group-flush">
                            @forelse($trendingJob as $opportunity)
                            <div class="list-group-item px-0 d-flex flex-row align-items-center">
                                @if ($opportunity->logo)
                                <img
                                    class="img-fluid h-50px w-50px object-cover img-thumbnail shadow-none border-light rounded-0 mr-2"
                                    src="{{asset("storage/job_opportunities/logo".$opportunity->logo)}}" alt="">
                                @else
                                <img
                                    class="img-fluid h-50px w-50px object-cover img-thumbnail shadow-none border-light rounded-0 mr-2"
                                    src="{{ asset('images/background.png') }}" alt="">
                                @endif
                                <div class="details">
                                    <a href="{{ route('jobs.details', ['job_id'=>encryptId($opportunity->id)]) }}"><h6>{{ \Illuminate\Support\Str::limit($opportunity->job_title, 45, $end='...') ?? ''}}</h6></a>
                                    <p>{{Carbon\Carbon::parse($opportunity->deadline)->isoFormat('ddd, MMM DD, Y LT') ??'N/A'}}</p>
                                </div>
                            </div>
                            @empty
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3 rounded border-0">
                                        <div class="card-body">
                                <div class="alert alert-custom alert-notice alert-light-warning  rounded-0 mt-3">
                                    <div class="alert-text">
                                        {{__('No opportunity')}}
                                    </div></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                    {{-- <div class="single-sidebar-widget newsletter-widget">
                        <h4 class="newsletter-title">Newsletter</h4>
                        <p>
                            Subscribe to our newsletter to get updates about our events
                        </p>
                        <form class="" action="">
                            <label for="email" class="sr-only">Email</label>
                            <div class="input-group input-group-solid input-group-sm">
                                <input placeholder="Email address" name="email" id="email" type="email"
                                       class="form-control" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Email address'">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary font-weight-bolder text-white">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="mt-4">
                            You can unsubscribe at any time
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @livewireScripts
@stop
