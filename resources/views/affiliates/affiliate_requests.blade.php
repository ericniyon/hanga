@extends('client.v2.layout.app')
@section('title', 'Affiliates')
@section('styles')
    @livewireStyles
@endsection
@push('css')
@endpush
@section('content')
    @include('partials.includes._home_nav')

   <div class="container my-3">
    <div class="row">
        <div class="col-md-3 mb-4 mb-md-0">
            {{-- @include('affiliates.includes.sidebar') --}}
            <livewire:v2.affiliates.sidebar >
        </div>
        <div class="col-md-9 mb-4 mb-md-0">
            <div class="row mb-4 mb-md-0 w-100" style="background: #F8F8F8; padding-right: 0px; padding-left:0px;height:auto;">
                <div class="affiliate-header d-flex justify-content-between">
                    <h3>Affiliate Requests</h3>
                </div>
                @forelse ($requests as $request)
                <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row align-items-center mb-4 card tw-rounded-lg overflow-hidden tw-p-4 tw-shadow">
                    <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                        <img src="{{ $request->profile_photo_url }}"
                                onerror="this.src='{{$request->defaultPhotoUrl}}'"
                                class="h-80px w-80px object-cover align-self-center"
                                alt="">
                    </div>
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                            {{$request->client_name?$request->client_name:$request->name}}
                            <button class="btn btn-sm">{{$request->type_name}}</button>
                        </span>
                        <div>
                            <span class="">
                                Freelancer - Sales Agent
                            </span>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                @php
                                    $average=round($request->ratings_avg_rating,1);
                                @endphp
                                <div>
                                    <div class="d-flex">
                                        <span class="text-info h5 mr-2">Rate</span>
                                        <span
                                                class="font-weight-bolder text-dark">
                                            {{ $request->ratings_count }} {{ str_plural('Review',$request->ratings_count) }}
                                        </span>
                                    </div>
                                    <div class="d-flex">
                                        <span
                                                class="text-info h5 font-weight-bolder mr-2">{{ $average }}
                                        </span>

                                        @include('partials.includes._rating_starts')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Title-->
                    <div class="w-md-150px w-100 button-groups">
                        <a href="{{route('client.affiliates.approve',encryptId($request->affliationId))}}" class=" btn-info btn w-100">Accept</a>
                        <a href="{{route('client.affiliates.deny',encryptId($request->affliationId))}}" class="btn-outline-info btn w-100 mt-2" style="margin-left: -0.05rem;">Reject</a>
                        <a href="{{ route('v2.client.details',['client'=>encryptId($request->id),'from'=>url()->current()]) }}" class="btn">
                            {{ __('app.View Details') }}
                        </a>
                    </div>
                </div>
                @empty
                <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row align-items-center mb-4 card tw-rounded-lg overflow-hidden tw-p-4 tw-shadow">
                    <h6 class="text-primary text-center">No Request Yet!</h6>
                </div>
                @endforelse
                {{-- <div class="w-100 container pl-2">
                </div> --}}
            </div>
            <span class="px-5"></span>
            <livewire:v2.affiliates.affiliate-requests>
        </div>

    </div>
   </div>

@endsection

@section('scripts')
    @livewireScripts
    <script>

    </script>
@stop
