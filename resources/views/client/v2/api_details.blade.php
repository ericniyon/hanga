@extends('client.v2.layout.app')

@section('title',"API Detail")
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="">

        <div>

            <div class="px-4 mt-0" style="background-color: #F8F8F8">
                <div class="container">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <div>
                                <!--begin::User-->
                                <div class="d-flex flex-column flex-md-row align-items-md-center">
                                    <div
                                        class="symbol symbol-60 symbol-xl-100 symbol-xxl-150 mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label rounded-circle shadow-sm"
                                             style="background-image:url({{ $model->logoUrl }})"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                            <span
                                                class="font-weight-boldest font-size-h3 text-info">{{ $model->api_name }}</span>

                                        </div>
                                        <div class="align-self-start">
                                             <span
                                                 class="badge badge-info rounded font-weight-bold align-self-start">
                                                @if ($model->application )
                                                     <a class="text-white"
                                                        href="">
                                                         {{optional(optional($model->application)->client)->name}}
                                                         @if(optional($model->application)->status==\App\Models\ApplicationBaseModel::APPROVED)
                                                             <span
                                                                 class="svg-icon svg-icon-1x ml-2 text-primary">@include('partials.icons._verified')</span>
                                                         @endif
                                                    </a>
                                                 @else
                                                     {{$model->dsp_name??'N/A'}}
                                                 @endif

                                            </span>
                                        </div>
                                        <p class="mt-3">
                                            {{ str_limit($model->description,200) }}
                                        </p>


                                    </div>
                                </div>
                                <!--end::User-->

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="d-flex align-items-md-end align-items-center min-h-md-50px flex-column justify-content-center pt-8">

                                @if($model->api_link)
                                    <a href="{{ $model->api_link }}" target="_blank"
                                       class="btn btn-outline-primary w-100 my-2 w-md-150px border-2 rounded text-hover-white ">
                                        @lang("app.Visit")
                                    </a>
                                @endif

                            </div>

                            <h3 class="mt-4 font-weight-bolder">@lang("app.Rate")</h3>
                            <h2 class="font-weight-bolder">
                                {{ round($model->ratings_avg_rating,2) }}
                            </h2>
                            <div class="d-flex">
                                @php
                                    $average =  $model->ratings_avg_rating;
                                @endphp
                                @include('partials.includes._rating_starts')
                            </div>
                            <h4 class="mb-2"> {{ $model->ratings_count }} {{ str_plural('Review',$model->ratings_count) }}</h4>
                            <div>
                                @if(auth()->guard('client')->check())
                                    <button type="button"
                                            data-url="{{ route('client.dp.rating.store',encryptId($model->id)) }}"
                                            data-rating="{{ optional($model->myRating)->rating }}"
                                            data-comment="{{ optional($model->myRating)->comment }}"
                                            class="btn btn-sm btn-primary py-1 rounded text-white px-4 btn-open-rating">
                                        @lang("app.Write a Review")
                                    </button>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="pl-2 nav-link rounded-0 text-dark-75 font-weight-bold active" id="home-tab"
                                   data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    @lang("client_registration.description")
                                </a>
                            </li>

                            <li class="nav-item mx-md-20 mx-0">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" data-toggle="tab"
                                   href="#representative_details" role="tab" aria-controls="messages"
                                   aria-selected="false">
                                    @lang("app.related_apis")
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 tw-relative text-dark-75 font-weight-bold"
                                   id="reviews-tab"
                                   data-toggle="tab" href="#reviews" role="tab" aria-controls="settings"
                                   aria-selected="false">
                                    @lang("app.Rating and reviews")
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content container-fluid">
                            <div class="tab-pane active py-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                {{ $model->api_description }}
                            </div>

                            <div class="tab-pane py-4" id="representative_details" role="tabpanel"
                                 aria-labelledby="representative_details">
                                <div class="row">
                                    @foreach($relatedApis as $api)
                                        <div class="col-xl-6">
                                            @include('partials.v2._api_item')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane py-4" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <livewire:v2.reviews :model="$model"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop

@push('scripts')
    @livewireScripts
@endpush
