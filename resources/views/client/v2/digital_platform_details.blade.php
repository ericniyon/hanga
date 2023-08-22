@extends('client.v2.layout.app')

@section('title', 'Digital Platform Details')

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
                            <span class="badge bg-light-info rounded">
                                {{ __("app.digital_platform") }}
                            </span>
                            <div class="mt-4">
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
                                                class="font-weight-boldest font-size-h3 text-info">{{ $model->name }}</span>
                                        </div>
                                        <div class="align-self-start">
                                             <span
                                                 class="badge badge-info rounded-lg font-weight-bold align-self-start">
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
                                        <h2 class="mt-4 font-weight-bolder">@lang("app.Rate")</h2>
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
                                        @if(auth()->guard('client')->check())
                                            <div>
                                                <button type="button"
                                                        data-url="{{ route('client.dp.rating.store',encryptId($model->id)) }}"
                                                        data-rating="{{ optional($model->myRating)->rating }}"
                                                        data-comment="{{ optional($model->myRating)->comment }}"
                                                        class="btn btn-sm btn-primary py-1 rounded-pill text-white px-4 btn-open-rating">
                                                    @lang("app.Write a Review")
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <!--end::User-->

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="d-flex align-items-md-end align-items-center min-h-md-50px flex-column justify-content-center pt-8">

                                @if($model->website)
                                    <a href="{{ $model->website }}" target="_blank"
                                       class="btn btn-primary w-100 my-2 w-md-150px border-2 rounded shadow text-white">
                                        @lang("app.Visit")
                                    </a>
                                @endif


                            </div>

                            <h2 class="mt-4 font-weight-bolder">
                                {{ __('client_registration.address') }}
                            </h2>
                            <div>

                                <h6 class="mb-3">
                                    <span class="svg-icon text-info">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                       class="bi bi-telephone" viewBox="0 0 16 16">
                                      <path
                                          d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>

                                    </span>
                                    @lang("app.tel"): <a href="tel:{{ $model->phone }}" class="text-dark-75">
                                        {{ $model->phone }}
                                    </a>
                                </h6>
                                <h6 class="mb-3">
                                    <span class="svg-icon text-info">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
</svg>

                                    </span>
                                    @lang("client_registration.email"): <a href="mailto:{{ $model->email }}"
                                              class="text-dark-75">{{ $model->email }}</a>
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="pl-2 nav-link rounded-0 text-dark-75 font-weight-bold active" id="home-tab"
                                   data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    @lang("client_registration.description")
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" id="messages-tab"
                                   data-toggle="tab" href="#messages" role="tab" aria-controls="messages"
                                   aria-selected="false">
                                    @lang("app.availability_on")
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="px-2 nav-link rounded-0 text-dark-75 font-weight-bold" data-toggle="tab"
                                   href="#representative_details" role="tab" aria-controls="messages"
                                   aria-selected="false">
                                    @lang("app.related_digital_platforms")
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
                                {{ $model->description }}
                            </div>
                            <div class="tab-pane py-4" id="messages" role="tabpanel" aria-labelledby="messages-tab">

                                <div>
                                    @forelse ($model->platformTypes as $platform)

                                        <div class="d-flex align-items-center my-3">
                                            <span class="svg-icon">
                                                 @include('partials.icons._platform_icon')
                                            </span>
                                            <span class="mx-2 font-weight-bolder tw-text-xl md:tw-w-72">
                                                 {{$platform->name}}
                                            </span>
                                            @if($platform->pivot->link)
                                                <a href="{{$platform->pivot->link}}"
                                                   class="tw-text-gray-500 text-hover-info" target="_blank">
                                                    {{$platform->pivot->link}}
                                                </a>
                                            @endif
                                        </div>


                                    @empty

                                    @endforelse

                                </div>
                            </div>
                            <div class="tab-pane py-4" id="representative_details" role="tabpanel"
                                 aria-labelledby="representative_details">
                                <div class="row">

                                    @foreach($relatedDigitalPlatforms as $item)
                                        @if($item->id == $model->id)
                                            @continue
                                        @endif

                                        <div class="col-lg-12 col-xl-6">
                                            @include('partials.v2._digital_platforms')
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

@section('scripts')
    <script>
        $(document).ready(function () {

        });
    </script>
@stop
