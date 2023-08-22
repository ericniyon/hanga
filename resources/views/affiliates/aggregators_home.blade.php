@extends('client.v2.layout.app')
@section('title', 'Aggregators')
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
            <div class="card card-custom shadow-sm border rounded-0 gutter-b">
                <div class="card-header bg-light-light border-bottom-0 py-2 min-h-auto border-light-light rounded-0">
                    <div class="card-title my-0">
                        <h4 class="mb-0 px-4 py-2">
                            {{ __("affiliates.header") }}
                        </h4>
                    </div>

                    <button data-toggle="modal" data-target="#addAggregator" class=" btn-primary btn pl-5 ml-5" style="padding-right: 0px!importent;margin-right: 0px!importent;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                        </span>
                        <span>Add New Aggregates</span>
                    </button>
                </div>

                <div class="row w-100 accordion" style="background: #F8F8F8; margin:0px!important; padding-top: 1rem!important">
                    @forelse ($aggregators as $client)
                    <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg  overflow-hidden tw-p-4" style="border-bottom-right-radius: 0px!important;border-bottom-left-radius: 0px!important;">
                        <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                            <img src="{{ $client->profile_photo_url }}"
                                    onerror="this.src='{{$client->defaultPhotoUrl}}'"
                                    class="h-80px w-80px object-cover align-self-center"
                                    alt="">
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                            <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                                {{$client->client_name?$client->client_name:$client->name}}
                                <button class="btn btn-sm accordion_btn" style="background-color: #2A337E!important; border: 1px solid #2A337E;">{{$client->type_name}}</button>
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
                            <span class="badge badge-pill p-2 px-5 mb-2 {{$client->pivot_status=="Approved"?'badge-success':($client->pivot_status=="Denied"?'badge-danger':'badge-info')}}">{{$client->pivot_status}}</span>
                            <a href="{{ route('v2.client.details',['client'=>encryptId($client->id),'from'=>url()->current()]) }}" class="accordion_btn btn btn-sm btn-primary"
                                 style="padding: 10px 30px!important;background: #F5841F!important; border:1px solid #F5841F" target="_blank">{{ __('app.View Details') }}</a>
                        </div>
                    </div>
                    <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center justify-content-between mb-9 card  tw-p-4 collapsed pr-3" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}"
                        style="margin-top: -2.4rem!important;">
                        <div class="card-label pl-4">
                            View Groups ({{$client->cohorts()->count()}})
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                    <div id="collapse{{$loop->iteration}}" class="collapse" data-parent="#accordion{{$loop->iteration}}">
                        <div class="card-body bg-white m-4" style="margin-top: -2.3rem!important;">
                            <div class="row">
                                @forelse (\App\Models\AffiliateCohort::whereClientId($client->id)->orderByDesc('created_at')->get() as $group)
                                <div class="col-md-3">
                                    <div class="card p-3">
                                        <h3 class="card-title">{{$group->group_name}}</h3>
                                        <p class="card-text">{{Str::limit($group->description,120)}}</p>
                                        <div class="row">
                                          <div class="col-md-6 text-success">Joins: {{$group->joins()->count()}}</div>
                                          <div class="col-md-3">
                                          </div>
                                          {{-- <div class="col-md-2"></div> --}}
                                          <div class="col-md-3">
                                              <a href="!#" title="View Group Member">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                              </a>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                @empty
                                <div class="container">
                                    <div class="row">
                                        <h5 class="text-center text-primary">No Groups Yet</h5>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                            <div class="alert-text">
                                {{ __("app.There is no pending connection request available") }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
   </div>

@endsection

@include('affiliates.includes.add_aggregator_modal')
@section('scripts')
    <script src="{{asset("assets/js/pages/crud/forms/widgets/select2.js?v=7.0.3")}}"></script>
    @livewireScripts
    <script>
            $('#company').select2({
                placeholder: "{{ __('SELECT DSP or MSME Name') }}"
            });
    </script>
@stop
