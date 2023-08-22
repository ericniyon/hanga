@extends('client.v2.layout.app')
@section('title','Company application details')
@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">

        <div>
            <div>
                <div class="h-80px bg-light-light w-100 rounded d-none d-md-block"></div>

                <div class="px-4 mt-md-n20 mt-0"
                     style="z-index: 2001;top: 20px;background-color: rgba(255,255,255,0.1);">
                     <span class="badge bg-light-info rounded">
                               iWorker
                     </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <!--begin::User-->
                                <div class="d-flex align-items-center">
                                    <div
                                            class="symbol symbol-60 symbol-xl-100  mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label"
                                             style="background-image:url('{{ $client->profile_photo_url }}');background-size: contain   "></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                    <span
                                            class="font-weight-boldest font-size-h3 text-info">
                                     {{ $model->name }}
                                    </span>

                                        </div>
                                        <div>
                                            <div class="badge badge-info rounded align-self-start">
                                                {{ $model->iworker_type }}
                                            </div>
                                            @if($application->isVerified())
                                                <span
                                                        class="svg-icon text-primary">@include('partials.icons._verified')</span>
                                            @endif
                                        </div>
                                        <p class="my-1">
                                            {{ $application->bio }}
                                        </p>


                                    </div>
                                </div>
                                <!--end::User-->

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                    class="d-flex align-items-md-end align-items-center flex-column justify-content-center pt-8">
                                @if($model->website)
                                    <a href="{{ $model->website }}"
                                       class="btn btn-primary text-white w-100 my-2 w-md-150px border-2 rounded-0 shadow">
                                        {{ __("app.Visit") }} {{ __("client_registration.website") }}
                                    </a>
                                @endif
                                @if(auth('client')->check())
                                    @include('partials.v2._connect_button',['item'=>$client])
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="ml-md-5">
                                <h4 class="mb-0">
                                    {{ __("app.Rate") }}
                                </h4>

                                <h1 class="font-weight-boldest">
                                    {{ $client->ratingAverage() }}
                                </h1>
                                <div class="d-flex mb-3">
                                    <x-rating-item :client="$client"/>
                                </div>
                                <div class="h5">
                                    {{ number_format($client->ratings_count) }}
                                    {{ __("app.Reviews") }}
                                </div>
                                <div>
                                    @include('partials.includes._rating_button')
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="ml-0 ml-md-5">
                                <h4>{{ __("client_registration.address") }}</h4>
                                <p>
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
</svg>

                                </span>
                                    <span>
                                     <span
                                             class="text-dark font-weight-bolder">{{__('client_registration.province')}}:</span> {{ optional($model->province)->name }}
                        ,
                        <span
                                class="text-dark font-weight-bolder">{{ __('client_registration.district') }}:</span> {{ optional($model->district)->name }}
                        ,
                        <span
                                class="text-dark font-weight-bolder">{{__('client_registration.sector')}}:</span> {{ optional($model->sector)->name }}
                        <span
                                class="text-dark font-weight-bolder">{{ __('client_registration.cell') }}:</span> {{ optional($model->cell)->name }}
                                </span>
                                </p>
                                <p>
                                <span class="svg-icon">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
<path
        d="M10.9264 15C11.1255 15.0011 11.3229 14.9626 11.5071 14.8866C11.6912 14.8107 11.8583 14.6988 11.9987 14.5575L14.031 12.5252C14.1707 12.3847 14.2491 12.1947 14.2491 11.9965C14.2491 11.7984 14.1707 11.6084 14.031 11.4679L11.0314 8.46817C10.8908 8.3285 10.7008 8.2501 10.5027 8.2501C10.3045 8.2501 10.1145 8.3285 9.97396 8.46817L8.77409 9.66054C7.94337 9.43905 7.174 9.03128 6.52433 8.46817C5.96273 7.81747 5.55516 7.04846 5.33196 6.21841L6.52433 5.01854C6.664 4.87803 6.7424 4.68796 6.7424 4.48984C6.7424 4.29173 6.664 4.10166 6.52433 3.96115L3.52465 0.961469C3.38414 0.821795 3.19407 0.743397 2.99596 0.743397C2.79784 0.743397 2.60777 0.821795 2.46726 0.961469L0.442478 3.00125C0.301217 3.14167 0.189339 3.30881 0.113373 3.49294C0.0374067 3.67706 -0.00112545 3.87446 2.50224e-05 4.07364C0.06806 6.95505 1.21945 9.705 3.22468 11.7753C5.295 13.7805 8.04495 14.9319 10.9264 15ZM2.99971 2.5588L4.942 4.50109L3.9746 5.46849C3.88298 5.55432 3.81436 5.66177 3.77506 5.781C3.73575 5.90024 3.72701 6.02743 3.74963 6.15092C4.02992 7.40356 4.62337 8.56464 5.47444 9.52556C6.43461 10.3777 7.59599 10.9713 8.84908 11.2504C8.9707 11.2758 9.09674 11.2706 9.21585 11.2353C9.33497 11.1999 9.44344 11.1355 9.53151 11.0479L10.4989 10.058L12.4412 12.0003L10.9414 13.5001C8.45442 13.4361 6.08151 12.4436 4.28957 10.7179C2.55944 8.92525 1.56407 6.54921 1.49987 4.05864L2.99971 2.5588ZM13.4986 6.75085H14.9984C15.0179 5.8592 14.8566 4.97284 14.5243 4.14518C14.192 3.31753 13.6956 2.56573 13.0649 1.93509C12.4343 1.30444 11.6825 0.808009 10.8548 0.47571C10.0272 0.143411 9.1408 -0.0178756 8.24915 0.00157081V1.50141C8.945 1.47734 9.63837 1.59666 10.2862 1.85195C10.9339 2.10724 11.5223 2.49305 12.0146 2.98538C12.507 3.47772 12.8928 4.06607 13.148 4.71385C13.4033 5.36163 13.5227 6.055 13.4986 6.75085Z"
        fill="#2A337E"/>
</svg>


                                </span>
                                    <span>
                                    {{ __("client_registration.phone") }}:  <a href="tel:{{ $model->phone }}"
                                                                               class="text-dark">{{ $model->phone }}</a>
                                </span>
                                </p>
                                <p>
                                <span class="svg-icon">
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15H11.25V13.5H7.5C4.245 13.5 1.5 10.755 1.5 7.5C1.5 4.245 4.245 1.5 7.5 1.5C10.755 1.5 13.5 4.245 13.5 7.5V8.5725C13.5 9.165 12.9675 9.75 12.375 9.75C11.7825 9.75 11.25 9.165 11.25 8.5725V7.5C11.25 5.43 9.57 3.75 7.5 3.75C5.43 3.75 3.75 5.43 3.75 7.5C3.75 9.57 5.43 11.25 7.5 11.25C8.535 11.25 9.48 10.83 10.155 10.1475C10.6425 10.815 11.4825 11.25 12.375 11.25C13.8525 11.25 15 10.05 15 8.5725V7.5C15 3.36 11.64 0 7.5 0ZM7.5 9.75C6.255 9.75 5.25 8.745 5.25 7.5C5.25 6.255 6.255 5.25 7.5 5.25C8.745 5.25 9.75 6.255 9.75 7.5C9.75 8.745 8.745 9.75 7.5 9.75Z"
                                            fill="#2A337E"/>
                                    </svg>
                                </span>
                                    <span>
                                 {{ __("client_registration.email") }}:   <a href="mailto:{{ $model->email }}"
                                                                             class="text-dark">
                            {{ $model->email }}
                        </a>
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold active px-1" id="home-tab"
                                   data-toggle="tab" href="#home"
                                   role="tab" aria-controls="home" aria-selected="true">
                                    {{ __("app.Individual") }}/{{ __("client_registration.company_identification") }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1 " id="profile-tab"
                                   data-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">
                                    {{ __("client_registration.more_details") }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1" id="expertise-tab"
                                   data-toggle="tab" href="#expertise"
                                   role="tab" aria-controls="expertise" aria-selected="false">
                                    {{ __("app.expertise_Interests") }}
                                </a>
                            </li>
                            @if($model->iworker_type==\App\Constants::Company)
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1"
                                       id="company_representative_tab"
                                       data-toggle="tab" href="#company_representative"
                                       role="tab" aria-controls="company_representative" aria-selected="false">
                                        {{ __("app.company_representative_details") }}
                                    </a>
                                </li>
                            @endif
                            @if($model->iworker_type==\App\Constants::Individual)
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1"
                                       id="certificate-tab"
                                       data-toggle="tab" href="#certificate"
                                       role="tab" aria-controls="certificate" aria-selected="false">
                                        {{ __("client_registration.certificates_n_trainings") }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1"
                                   id="previous-experience-tab"
                                   data-toggle="tab" href="#previous-experience"
                                   role="tab" aria-controls="previous-experience" aria-selected="false">
                                    {{ __("client_registration.previous_experience") }}
                                </a>
                            </li>
                            @if($model->iworker_type==\App\Constants::Individual)
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1"
                                       id="affiliations-tab"
                                       data-toggle="tab" href="#affiliations"
                                       role="tab" aria-controls="affiliations" aria-selected="false">
                                        {{ __("app.Affiliations") }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold px-1" id="reviews-tab"
                                   data-toggle="tab" href="#reviews"
                                   role="tab" aria-controls="reviews" aria-selected="false">
                                    {{ __("app.Rating and reviews") }}
                                    <span class="p-2 font-weight-boldest ml-2 badge badge-primary text-white rounded-circle">
                                              {{ $client->ratings_count }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content container-fluid">
                            <div class="tab-pane py-5 active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mb-4 d-md-flex align-items-center justify-content-between">
                                    <h4 class="font-weight-bolder">

                                        {{ __("app.Individual") }}
                                        /{{ __("client_registration.company_identification") }}</h4>
                                    {{--   @if($application->can_update_info && $editable)
                                           <x-edit-button data-toggle="modal" data-target="#editCompanyInfoModal">
                                               @include('partials.buttons._edit_svg_icon')
                                           </x-edit-button>
                                       @endif--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __("client_registration.type") }}:</strong>
                                            <span>{{ $model->iworker_type }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __("client_registration.name") }}:</strong>
                                            <span>{{ $model->name }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{__('client_registration.id_type')}}:</strong>
                                            <span>{{ $model->id_type }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{__('client_registration.id_number')}}:</strong>
                                            <span>{{ $model->id_number }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.phone') }} :</strong>
                                            <span><a href="tel:{{ $model->phone }}">{{ $model->phone }}</a></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __('client_registration.email') }} :</strong>
                                            <a href="mailto:{{ $model->email }}">{{ $model->email }}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{__('client_registration.website')}} :</strong>
                                            <a href="{{ $model->website }}">{{ $model->website??'N/A' }}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{__('client_registration.portfolio_link')}} :</strong>
                                            <a href="{{ $model->portfolio_link }}">{{ $model->portfolio_link??'N/A' }}</a>
                                        </p>
                                    </div>

                                    <div class="col-md-12">
                                        <p>
                                            <strong class="d-block font-weight-bolder"></strong>
                                            @forelse($application->categories as $item)
                                                <span
                                                        class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-light-info">{{ __("app.none") }}</span>
                                            @endforelse
                                        </p>
                                    </div>

                                    @if($model->iworker_type==\App\Constants::Company)
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.registration_date") }} :</strong>
                                                <span>{{ $model->comp_date_of_registration->toDateString() }}</span>
                                            </p>
                                        </div>
                                        @if($editable)
                                            <div class="col-md-6">
                                                <p class="d-flex align-items-center">
                                                    <strong class="mr-4">
                                                        {{ __("client_registration.rdb_certificate") }}
                                                    </strong>
                                                    @if($model->rdb_certificate)
                                                        <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'rdb']) }}"
                                                           target="_blank"
                                                           class="btn btn-sm btn-light-info rounded py-2 px-5">
                                                            @include('partials.buttons._svg_download_icon')
                                                            {{ __("client_registration.download") }}
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </p>
                                            </div>
                                        @endif

                                    @else
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.date_of_birth") }}:</strong>
                                                <span>{{ $model->dob ? $model->dob->toDateString() : 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.gender") }}:</strong>
                                                <span>{{ $model->gender }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="d-flex align-items-center">
                                                <strong>{{ __("client_registration.physical_disability") }}:</strong>
                                                {{ $model->physicalDisability->name??'N/A' }}
                                            </p>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="card card-body p-3 my-3">
                                                <h4 class="font-weight-bolder mb-4">{{ __('app.qualification') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <strong>{{ __("client_registration.level_of_study") }}
                                                                :</strong>
                                                            <span>{{ optional($model->studyLevel)->name }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <strong>{{ __("client_registration.field_of_study") }}
                                                                :</strong>
                                                            <span>{{ $model->fieldOfStudy->name??'N/A' }}</span>
                                                        </p>
                                                    </div>

                                                    @if($editable)
                                                        <div class="col-md-6">
                                                            <p class="d-flex align-items-center">
                                                                <strong class="mr-4">
                                                                    {{ __("client_registration.supporting_document") }}
                                                                </strong>
                                                                @if($model->supporting_document && $editable)
                                                                    <a href="{{ route('client.iworker.download.docs',['id'=>encryptId($model->id),'type'=>'doc']) }}"
                                                                       target="_blank" data-toggle="tooltip"
                                                                       title="{{__('client_registration.download')}}"
                                                                       class="btn btn-sm btn-light-info rounded font-weight-bolder">
                                                                        @include('partials.buttons._svg_download_icon')
                                                                        <span
                                                                                class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                                                    </a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </p>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    @if($editable)
                                        <div class="col-md-12">
                                            <p>
                                                <strong class="d-block">{{ __("client_registration.brief_bio") }}</strong>
                                                {{ optional($model->application)->bio??'Not given' }}
                                            </p>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="tab-pane py-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mb-4 d-md-flex align-items-center justify-content-between">
                                    <h4 class="font-weight-bolder">
                                        {{ __("client_registration.more_details_and_address") }}
                                    </h4>
                                    @if($application->canUpdateInfo && $editable)
                                        <x-edit-button data-toggle="modal" data-target="#editMoreDetailsModal">
                                            @include('partials.buttons._edit_svg_icon')
                                        </x-edit-button>
                                    @endif
                                </div>
                                <div class="row">

                                    @if($model->iworker_type==\App\Constants::Individual)
                                        <div class="col-md-6">
                                            <p>
                                                <strong class="d-block">{{ __('client_registration.device_literacy') }}
                                                    :</strong>
                                                @forelse($model->digital_literacy??[] as $item)
                                                    <span
                                                            class="badge badge-secondary rounded-pill my-1">{{ $item }}</span>
                                                @empty
                                                    N/A
                                                @endforelse
                                            </p>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <p>
                                            <strong>{{ __("client_registration.are_you_able_to_attend_an_online_class") }}
                                                ?:</strong>
                                            <span class="badge badge-secondary rounded-pill my-1">
                    {{ $model->can_attend_online_class?'Yes':'No' }}
                    </span>
                                        </p>
                                    </div>
                                    @if($editable || $review)
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.do_you_have_a_bank_account") }}
                                                    ?:</strong>
                                                <span class="badge badge-secondary rounded-pill my-1">
                    {{ $model->has_bank_account?'Yes':'No' }}
                    </span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.do_you_have_access_to_credit") }}
                                                    ?:</strong>
                                                <span
                                                        class="badge badge-secondary rounded-pill my-1">{{ $model->credit_access?'Yes':'No' }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    @if($editable|| $review)
                                        <div class="col-md-6">
                                            <p>
                                                <strong
                                                        class="d-block font-weight-bolder">{{__('client_registration.credit_source')}}</strong>
                                                @forelse($model->creditSources as $item)
                                                    <span
                                                            class="badge badge-secondary  rounded-pill my-1">{{ $item->name }}</span>
                                                @empty
                                                    <span class="label label-inline label-secondary">None</span>
                                                @endforelse
                                            </p>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <p>
                                            <strong
                                                    class="d-block font-weight-bolder">{{__('app.business_sector')}}</strong>
                                            @forelse($application->businessSectors as $item)
                                                <span
                                                        class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-secondary">{{ __("app.none") }}</span>
                                            @endforelse
                                        </p>
                                    </div>


                                    <div class="col-md-12">
                                        <p>
                                            <strong class="d-block font-weight-bolder">
                                                {{ __("client_registration.what_are_digital_payments_that_can_be_used_to_pay_you") }}

                                            </strong>
                                            @forelse($model->paymentMethods as $item)
                                                <span
                                                        class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-light-info">{{ __("app.none") }}</span>
                                            @endforelse
                                        </p>
                                    </div>


                                    <div class="col-md-12">
                                        <p>
                                            <strong class="d-block font-weight-bolder">
                                                {{ __("client_registration.do_you_have_any_software_development_skills") }}
                                            </strong>
                                            @forelse($model->skills as $item)
                                                <span
                                                        class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                            @empty
                                                <span class="label label-inline label-light-warning">{{ __("app.none") }}</span>
                                            @endforelse
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <strong class="d-block font-weight-bolder">
                                                {{ __("app.Digital platforms used to sell goods/services") }}
                                            </strong>

                                            <ul class="list-group">

                                                @forelse($model->iWorkerDigitalPlatforms as $item)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $item->platform->name }}
                                                        <a href="{{ $item->link }}" target="_blank">
                                                            {{ $item->link }}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __("app.none") }}
                                                    </li>
                                                @endforelse
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane py-5" id="expertise" role="tabpanel" aria-labelledby="messages-tab">
                                <div>
                                    @include('partials._area_of_interests')
                                </div>

                                <div>
                                    <h6>
                                        @if($model->application->client->typeName==\App\Models\RegistrationType::MSME)
                                            {{__('app.category_digital_services_interested_in')}}
                                        @else
                                            {{__('app.area_of_expertise')}}
                                        @endif

                                    </h6>
                                    <p>

                                        @forelse($model->application->services as $item)
                                            <span
                                                    class="badge badge-secondary rounded-pill my-1">{{ $item->name }}</span>
                                        @empty
                                            <span class="label label-inline label-se">{{ __("app.none") }}</span>
                                        @endforelse
                                    </p>
                                </div>
                            </div>

                            @if($model->iworker_type==\App\Constants::Company)
                                <div class="tab-pane py-5" id="company_representative" role="tabpanel"
                                     aria-labelledby="company_representative-tab">
                                    <div class="mb-4 d-md-flex align-items-center justify-content-between">
                                        <h4 class="font-weight-bolder">
                                            {{ __("app.company_representative_details") }}
                                        </h4>
                                        @if($application->canUpdateInfo && $editable)
                                            <x-edit-button data-toggle="modal" data-target="#editRepresentativeModal">
                                                @include('partials.buttons._edit_svg_icon')
                                            </x-edit-button>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.representative_name") }}:</strong>
                                                <span>{{ $model->cp_representative_name }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.phone") }}:</strong>
                                                <a href="tel:{{ $model->cp_representative_phone }}">{{ $model->cp_representative_phone }}</a>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.email") }}:</strong>
                                                <a href="mailto:{{ $model->cp_representative_email }}">{{ $model->cp_representative_email }}</a>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.position") }}:</strong>
                                                <span>{{ $model->cp_representative_position }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.gender") }}:</strong>
                                                <span>{{ $model->cp_representative_gender }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>{{ __("client_registration.physical_disability") }}:</strong>
                                                <span>{{ $model->repPhysicalDisability->name??'N/A' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($model->iworker_type==\App\Constants::Individual)
                                <div class="tab-pane py-5" id="certificate" role="tabpanel"
                                     aria-labelledby="certificate-tab">

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h4 class="font-weight-bolder mb-0">
                                            {{ __("client_registration.certificates_n_trainings") }}
                                        </h4>

                                        {{--@if($application->canUpdateInfo && $editable)
                                            <button type="button"
                                                    class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                                                    id="addTrainingButton">
                                                @include('partials._plus_icon')
                                                Add New
                                            </button>
                                        @endif--}}
                                    </div>

                                    <div class="accordion accordion-toggle-arrow rounded" id="accordionCertificate">
                                        @forelse($model->certificates as $item)
                                            <div class="card rounded">
                                                <div class="card-header rounded">
                                                    <div
                                                            class="card-title collapsed d-flex align-items-center justify-content-between"
                                                            data-toggle="collapse"
                                                            data-target="#certificate{{$item->id}}">
                                                        <span>{{ $item->name }}</span>
                                                    </div>
                                                </div>
                                                <div id="certificate{{$item->id}}" class="collapse"
                                                     data-parent="#accordionCertificate">
                                                    <div class="card-body">

                                                        <div
                                                                class="d-md-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>{{ __("client_registration.issuer") }}:</strong>
                                                                {{ $item->issuer }}
                                                            </div>
                                                            @if( $editable)
                                                                <div>
                                                                    <strong
                                                                            class="">{{__('client_registration.supporting_document')}}
                                                                        :</strong>
                                                                    <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                                                       data-toggle="tooltip"
                                                                       target="_blank"
                                                                       class="btn btn-sm btn-light-info rounded font-weight-bolder"
                                                                       title="{{__('client_registration.download')}}">
                                                                        @include('partials.buttons._svg_download_icon')
                                                                        <span
                                                                                class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <strong>{{ __('client_registration.issue_date') }}:</strong>
                                                            {{ optional($item->issuance_date)->toDateString() }}
                                                        </div>

                                                        @if($application->canUpdateInfo  && $editable)
                                                            <div
                                                                    class="d-flex align-items-center justify-content-start mt-4">
                                                                <button type="button"
                                                                        data-id="{{ $item->id }}"
                                                                        data-name="{{ $item->name }}"
                                                                        data-issuer="{{ $item->issuer }}"
                                                                        data-issuance_date="{{ optional($item->issuance_date)->format('Y-m-d') }}"
                                                                        data-toggle="tooltip" title="Edit"
                                                                        class="btn btn-sm btn-info js-edit-training rounded-pill mr-2">
                                                                    @include('partials.buttons._edit_svg_icon')
                                                                </button>
                                                                <a href="{{ route('client.trainings.destroy',encryptId($item->id)) }}"
                                                                   data-toggle="tooltip" title="Delete"
                                                                   class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                    @include('partials.buttons._trash_svg_icon')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-light-warning alert-custom alert-notice rounded-sm">
                                                {{ __("app.none") }}
                                            </div>
                                        @endforelse
                                    </div>

                                </div>
                            @endif
                            <div class="tab-pane py-5" id="previous-experience" role="tabpanel"
                                 aria-labelledby="experience-tab">

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="font-weight-bolder mb-0">
                                        {{ __("client_registration.previous_experience") }}
                                    </h4>

                                    @if($application->can_update_info  && $editable)
                                        <button type="button"
                                                class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                                                id="addExperienceButton">
                                            @include('partials._plus_icon')
                                            {{ __("client_registration.add_new") }}
                                        </button>
                                    @endif
                                </div>

                                <div class="accordion accordion-toggle-arrow rounded" id="accordionExperience">
                                    @forelse($model->experiences as $item)
                                        <div class="card rounded">
                                            <div class="card-header rounded">
                                                <div
                                                        class="card-title collapsed d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#experience{{$item->id}}">
                                                    <span>{{ $item->service_offered }}</span>
                                                </div>
                                            </div>
                                            <div id="experience{{$item->id}}" class="collapse"
                                                 data-parent="#accordionExperience">
                                                <div class="card-body">

                                                    <div class="d-md-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong>{{ __('client_registration.client_name') }}
                                                                :</strong>
                                                            {{ $item->client }}
                                                        </div>
                                                        @if($editable)
                                                            <div>
                                                                <strong
                                                                        class="">{{__('client_registration.supporting_document')}}
                                                                    :</strong>
                                                                <a href="{{ route('client.trainings.download.document',encryptId($item->id)) }}"
                                                                   data-toggle="tooltip"
                                                                   target="_blank"
                                                                   class="btn btn-sm btn-light-info rounded font-weight-bolder"
                                                                   title="{{__('client_registration.download')}}">
                                                                    @include('partials.buttons._svg_download_icon')
                                                                    <span
                                                                            class="d-none d-md-inline">{{__('client_registration.download')}}</span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>


                                                    <div>
                                                        <strong>{{__('client_registration.year_of_completion')}}
                                                            :</strong>
                                                        {{ $item->year_of_completion }}
                                                    </div>

                                                    <div>
                                                        <strong
                                                                class="d-block">{{__('client_registration.description')}}
                                                            :</strong>
                                                        <p>
                                                            {{ $item->description }}
                                                        </p>
                                                    </div>

                                                    @if($application->canUpdateInfo && $editable)
                                                        <div class="d-flex ">
                                                            <button type="button"
                                                                    data-id="{{$item->id}}"
                                                                    data-service_offered="{{$item->service_offered}}"
                                                                    data-year_of_completion="{{$item->year_of_completion}}"
                                                                    data-client="{{$item->client}}"
                                                                    data-description="{{$item->description}}"
                                                                    data-toggle="tooltip" title="Edit"
                                                                    class="btn btn-sm btn-info js-edit-experience rounded-pill mr-2">
                                                                @include('partials.buttons._edit_svg_icon')
                                                            </button>
                                                            <a href="{{ route('client.iworker.experience.destroy',encryptId($item->id)) }}"
                                                               data-toggle="tooltip" title="Delete"
                                                               class="btn btn-sm btn-danger js-delete rounded-pill">
                                                                @include('partials.buttons._trash_svg_icon')
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-light-info alert-custom  rounded">
                                            {{ __("app.none") }}
                                        </div>
                                    @endforelse
                                </div>

                            </div>

                            @if($model->iworker_type==\App\Constants::Individual)
                                <div class="tab-pane py-5" id="affiliations" role="tabpanel"
                                     aria-labelledby="settings-tab">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h4 class="font-weight-bolder mb-0">
                                            {{ __("app.Affiliations") }}
                                        </h4>

                                        @if($application->canUpdateInfo && $editable)
                                            <button type="button"
                                                    class="btn btn-sm btn-light-primary rounded-pill btn-hover-text-white font-weight-bolder"
                                                    id="addAffiliationButton">
                                                @include('partials._plus_icon')
                                                {{ __("client_registration.add_new") }}
                                            </button>
                                        @endif
                                    </div>

                                    <div class="accordion accordion-toggle-arrow rounded" id="accordionAffiliation">
                                        @forelse($application->client->affiliations as $item)
                                            <div class="card rounded">
                                                <div class="card-header rounded">
                                                    <div
                                                            class="card-title collapsed d-flex align-items-center justify-content-between"
                                                            data-toggle="collapse"
                                                            data-target="#affiliation{{$item->id}}">
                                <span>
                                    {{ $item->employer->name }}</span>
                                                        <span
                                                                class="label label-inline label-light-{{$item->statusColor}} rounded-pill mr-4 font-weight-bolder">{{ $item->status }}</span>
                                                    </div>
                                                </div>
                                                <div id="affiliation{{$item->id}}" class="collapse"
                                                     data-parent="#accordionAffiliation">
                                                    <div class="card-body">

                                                        <div>
                                                            <strong>{{ __("client_registration.position") }}:</strong>
                                                            {{ $item->position }}
                                                        </div>
                                                        <div>
                                                            <strong>{{ __("client_registration.description") }}
                                                                :</strong> <br>
                                                            {{ $item->description??'None' }}
                                                        </div>

                                                        @if($application->can_update_info  && $editable)
                                                            <div
                                                                    class="d-flex align-items-center justify-content-start mt-4">
                                                                <x-edit-button
                                                                        data-id="{{$item->id}}"
                                                                        data-employer_id="{{$item->employer_id}}"
                                                                        data-position="{{$item->position}}"
                                                                        data-status="{{$item->status}}"
                                                                        data-description="{{$item->description}}"
                                                                        classes="js-edit-affiliation"
                                                                        classes="js-edit-affiliation mr-2"/>
                                                                <x-delete-button
                                                                        :href="route('client.affiliations.destroy',encryptId($item->id))"/>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-light-warning alert-custom  rounded">
                                                {{ __("app.none") }}
                                            </div>
                                        @endforelse
                                    </div>

                                </div>
                            @endif
                            <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <livewire:v2.reviews :model="$client"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
