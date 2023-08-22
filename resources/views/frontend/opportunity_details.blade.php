@extends('layouts.app')
@section('title',"Opportunity Details")
@section('styles')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' integrity='sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==' crossorigin='anonymous'/>
@endsection
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card card-body card-custom card-stretch py-0">
                    @include('partials._menu_bar')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">

                @include('partials._profile_card')

                @include('partials._your_dashboard')

            </div>
            {{-- <h2 class="font-weight-bolder mb-5">
                Opportunity Details
            </h2> --}}
            <x-opportunity-details :job="$job" />
        </div>

@stop
