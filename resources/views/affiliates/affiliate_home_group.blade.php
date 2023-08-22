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
            <div class="row affiliate-header w-100 d-flex justify-content-between align-items-center" style="padding: 0px;">
                <div class="card-title">My Affiliates</div>
                <div style="height:100%;" class="mr-4 d-flex search-box">
                    <input type="search" class="form-control" wire:model.debounce.400="search_query">
                    <button type="submit" class="btn btn-info search_btn" wire:click="search()">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                @if(auth('client')->user()->type_name!='iWorker')
                <button data-toggle="modal" data-target="#addAffiliates" class=" btn-primary btn addAffiliates">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                          </svg>
                    </span>
                    <span>Add Affiliates</span>
                </button>
                @endif
            </div>
            <div class="row mb-1 mb-md-0 w-100 pt-3" style="background: #F8F8F8; padding-right: 0px; padding-left:0px;">
                @forelse ($affiliates as $client)
                <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg overflow-hidden tw-p-4 tw-shadow">
                    <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                        <img src="{{ $client->profile_photo_url }}"
                                onerror="this.src='{{$client->defaultPhotoUrl}}'"
                                class="h-80px w-80px object-cover align-self-center"
                                alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                            {{$client->client_name?$client->client_name:$client->name}}
                            <button class="btn btn-sm">{{$client->type_name}}</button>
                        </span>
                        <div>
                            <span class="">
                                Freelancer - Sales Agent
                            </span>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                @php
                                    $average=round($client->ratings_avg_rating,1);
                                @endphp
                                <div>
                                    <div class="d-flex">
                                        <span class="text-info h5 mr-2">Rate</span>
                                        <span
                                                class="font-weight-bolder text-dark">
                                            {{ $client->ratings_count }} {{ str_plural('Review',$client->ratings_count) }}
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
                        <span class="badge badge-pill p-2 px-5 mb-2 {{$client->status=="Approved"?'badge-success':($client->status=="Denied"?'badge-danger':'badge-info')}}">{{$client->status}}</span>
                        <a href="{{ route('v2.client.details',['client'=>encryptId($client->id),'from'=>url()->current()]) }}" class=" btn-primary btn w-100">Visit</a>
                    </div>
                </div>
                @empty
                <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row align-items-center mb-4 card tw-rounded-lg overflow-hidden tw-p-4 tw-shadow">
                    <h6 class="text-primary text-center">No Request Yet!</h6>
                </div>
                @endforelse
            </div>
            <div class="row mb-1 mb-md-0 w-100" style="background: #F8F8F8;">
                <div class="custom-pagination d-flex justify-content-start ml-0 pl-0">
                    @include('partials.includes._pagination', ['paginator' => $affiliates])
                </div>
            </div>
        </div>
        {{-- <livewire:v2.affiliates.affiliates > --}}
    </div>
   </div>

@endsection

@include('affiliates.includes.add_affiliates_modal')
@section('scripts')
    @livewireScripts
    <script>

    </script>
@stop
