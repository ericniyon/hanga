@extends('layouts.app')
@section('title'," | Opportunity details")
@section('styles')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' integrity='sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==' crossorigin='anonymous'/>
@endsection
@section('content')
    <div class="container my-5">
        <h2 class="font-weight-bolder mb-5">
            {{$job->job_title ?? ''}}
        </h2>
        <div class="row">
            <x-opportunity-details :job="$job" />
            <div class="col-lg-4">
                <div class="card card-body mb-5 border-0">

                    <div>
                        <h4>
                            @lang('app.recommendations')
                        </h4>
                        <div class="list-group list-group-flush">
                            @foreach ($similarJob as $opportunity)
                            <div class="list-group-item px-0 d-flex flex-row align-items-center">
                                @if ($opportunity->logo)
                                    <img
                                        class="img-fluid h-50px w-50px object-cover img-thumbnail shadow-none border-light rounded-0 mr-2"
                                        src="{{ asset('frontend/assets/logo.png') }}" alt="">
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
