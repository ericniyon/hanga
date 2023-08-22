@extends('client.v2.layout.app')
@section('title', 'Aggregator\'s Requests')
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
                </div>
                <div class="row mb-1 mb-md-0 w-100 pt-3" style="background: #F8F8F8; margin:0px!important;">
                    @forelse ($aggregation_requests as $client)
                    <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row card align-items-center mb-2 tw-rounded-lg  overflow-hidden tw-p-4 tw-shadow">
                        <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                            <img src="{{ $client->profile_photo_url }}"
                                    onerror="this.src='{{$client->defaultPhotoUrl}}'"
                                    class="h-80px w-80px object-cover align-self-center"
                                    alt="">
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                            <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                                {{$client->client_name}}
                                <button class="btn btn-sm">{{$client->registrationType->name}}</button>
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
                        <div class="w-md-150px w-100 button-groups">
                            @if ($client->pivot_status=='Pending')
                            <a href="{{route('client.aggregator.approve',encryptId($client->pivot_id))}}" class="btn btn-outline-info btn ml-3 w-100">Accept</a>
                            <a href="{{route('client.aggregator.deny',encryptId($client->pivot_id))}}" class="btn btn-info btn w-100 ml-3 mt-2" style="margin-left: -0.05rem;">Reject</a>
                            @else
                            <span class="badge badge-pill p-2 px-5 mb-2 {{$client->pivot_status=="Approved"?'badge-success':'badge-danger'}}">{{$client->pivot_status}}</span>
                            @endif
                            <a href="{{ route('v2.client.details',['client'=>encryptId($client->id),'from'=>url()->current()]) }}" target="_blank" class="btn btn-primary w-100 mt-2">
                                {{ __('app.View Details') }}
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row align-items-center mb-4 card tw-rounded-lg overflow-hidden tw-p-4 tw-shadow">
                        <h6 class="text-primary text-center">No Request Yet!</h6>
                    </div>
                    @endforelse
                </div>
                <div class="row mb-1 mb-md-0 w-100 ml-0" style="background: #F8F8F8;">
                    <div class="custom-pagination d-flex justify-content-start ml-0 pl-0">
                        @include('partials.includes._pagination', ['paginator' => $aggregation_requests])
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>

@endsection

@section('scripts')
    <script src="{{asset("assets/js/pages/crud/forms/widgets/select2.js?v=7.0.3")}}"></script>
    @livewireScripts
    <script>
            $('#company').select2({
                placeholder: "{{ __('SELECT DSP or MSME Name') }}"
            });
    </script>
@stop
