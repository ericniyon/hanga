@extends('frontend.master')
@section('content')
    <div class="top-background">
        <div class="container pb-4">
            <div class="clearfix">
                <div class="float-right pr-3 top-button">
                    <a href="{{ route('view.search') }}" class="btn btn-link  btn-sm text-white font-weight-bolder small">
                        <span class="svg-icon svg-icon-white svg-icon-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        @lang('auth.search')
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-link  btn-sm text-white font-weight-bolder  small">
                        <span class="svg-icon svg-icon-white svg-icon-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </span>
                        @lang('auth.staffLogin')
                    </a>
                    @guest('client')
                        <a href="{{ route('client.register') }}"
                            class="btn btn-link  btn-sm text-white font-weight-bolder small">
                            <span class="svg-icon svg-icon-white svg-icon-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                </svg>
                            </span>
                            @lang('auth.signup')
                        </a>
                    @endguest

                    <div class="btn-group">
                        <a href="#" class="btn btn-link  btn-sm text-white font-weight-bolder  small dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="svg-icon svg-icon-white svg-icon-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            @lang('auth.language')
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/setlocale/en') }}">English</a>
                            <a class="dropdown-item" href="{{ url('/setlocale/rw') }}">Kinyarwanda</a>
                        </div>

                    </div>



                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="{{ asset('frontend/assets/logo.png') }}"
                        style="height: 50px" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse home-nav" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center text-white text-hover-dark-75"
                                href="{{ route('webinars.index') }}">
                                @lang('auth.events')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center text-white text-hover-dark-75"
                                href="{{ route('jobs.index') }}">{{ __('auth.job_opportunities') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center text-white text-hover-dark-75"
                                href="{{ route('about') }}">@lang('auth.about_ihuzo')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center text-white text-hover-dark-75"
                                href="{{ route('dp.index') }}">@lang('auth.digital_platforms')</a>
                        </li>
                        {{--                        <li class="nav-item"> --}}
                        {{--                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center" --}}
                        {{--                               href="https://academy.ihuzo.com/">IHUZO ACADEMY</a> --}}
                        {{--                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded-pill bg-hover-light-primary text-center text-white text-hover-dark-75"
                                href="{{ route('open.apis') }}">@lang('auth.open_api')</a>
                        </li>
                        @auth('client')
                            @include('partials._profile-dropdown')
                        @endauth

                    </ul>
                </div>
            </nav>

            <div class="content mt-5 position-relative">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left-text" style="line-height: 1.2">
                            @lang('auth.find')
                            <span class="font-weight-bolder">@lang('auth.trusted_company')</span>
                            @lang('auth.for_your_biz')
                        </div>
                        <div class="clearfix"></div>
                        <div class="row mt-3">
                            @if (!auth('client')->check())
                                <div class="col-lg-4 mt-1">
                                    <a href="{{ route('client.register') }}"
                                        class="btn btn-primary rounded-pill btn-block btn-lg font-weight-bolder">
                                        @lang('auth.signup')
                                    </a>
                                </div>
                                <div class="col-lg-4 mt-5 mt-md-1">
                                    <a href="{{ route('client.login') }}"
                                        class="btn btn-primary rounded-pill btn-block btn-lg font-weight-bolder">
                                        @lang('auth.login')
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-4 mt-5 mt-md-1">
                                    <a href="{{ route('client.login') }}"
                                        class="btn btn-primary rounded-pill btn-block btn-lg font-weight-bolder">
                                        @lang('app.my_account')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/assets/computer_3_cropped.png') }}" class="computer-img"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="middle-container" data-aos="fade-up">
        <div class="container">
            <div class="curved-line-2 py-4">
                <div class="row curved-line">
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block">
                            <div class="num-circle">
                                <span>
                                    {{ approvedRegistrationType(\App\Models\RegistrationType::DSP) }}
                                </span>
                            </div>
                        </div>
                        <div class="text-center font-weight-bolder circle-bottom-text">
                            @lang('auth.dsp')
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block">
                            <div class="num-circle">
                                <span>
                                    {{ approvedRegistrationType(\App\Models\RegistrationType::MSME) }}
                                </span>
                            </div>
                        </div>
                        <div class="text-center font-weight-bolder circle-bottom-text">
                            MSMEs
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block">
                            <div class="num-circle">
                                <span>
                                    {{ approvedRegistrationType(\App\Models\RegistrationType::iWorker) }}
                                </span>
                            </div>
                        </div>
                        <div class="text-center font-weight-bolder circle-bottom-text">
                            iWorkers
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="low-bottom-container" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-between"
                    style="border-right: 1px solid rgba(255,255,255,.3);">
                    <div class="text-center low-bottom-title">@lang('app.webinars_n_workshops')</div>

                    @forelse($webinars as $item)
                        <a href="{{ route('webinars.details', encryptId($item->id)) }}"
                            style="display: block;color: white">
                            <div class="workshop-item rounded bg-hover-primary border-bottom-0 mb-4">
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-circle symbol-light mr-5">
                                        <span class="symbol-label">
                                            <img alt="{{ $item->title }}" src="{{ $item->getImage() }}"
                                                class="h-50px w-50px align-self-center rounded-circle object-cover">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                        <span class="font-weight-bolder text-white font-size-lg mb-1">
                                            {{ $item->title }}
                                        </span>
                                        <p class="text-white font-size-sm font-weight-bold">{{ $item->short_description }}
                                        </p>
                                        <div class="d-flex align-items-baseline">
                                            <div>
                                                <span class="label label-inline label-light-info rounded-pill">
                                                    {{ $item->type }}
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 text-right">
                                                <span class="font-weight-bolder">
                                                    {{ optional($item->start_date)->format('j') }}
                                                    <sup>{{ optional($item->start_date)->format('S') }}</sup>
                                                    {{ optional($item->start_date)->format('F Y H:i A') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center">
                            <div class="alert alert-secondary alert-custom alert-notice mb-0 w-100 w-md-auto">
                                <div class="alert-icon">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-text font-weight-bolder">
                                    No webinars and Workshops available now!
                                </div>
                            </div>
                        </div>
                    @endforelse

                    @if ($webinars->count() > 0)
                        <div class="pt-5 text-center">
                            <a href="{{ route('webinars.index') }}"
                                class="btn btn-sm btn-secondary custom-button-2 font-weight-bolder">
                                @lang('auth.read_more')
                            </a>
                        </div>
                    @endif

                </div>
                <div class="col-md-6 d-flex flex-column justify-content-between">
                    <div class="text-center low-bottom-title">{{ strtoupper(__('app.opportunities')) }}</div>

                    @forelse($jobs as $item)
                        <a href="{{ route('jobs.details', encryptId($item->id)) }}" style="display: block;color: white">
                            <div class="workshop-item rounded bg-hover-primary border-bottom-0 mb-4">

                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-circle symbol-light mr-5">
                                        <span class="symbol-label">
                                            {{-- <img alt="{{$item->job_title}}"
                                                 src="{{route('get.image.path',str_replace("/","",$item->logo))}}"
                                                 class="h-50px w-50px align-self-center rounded-circle object-cover"> --}}
                                            @if ($item->logo)
                                                <img src="{{ route('get.image.path', str_replace('/', '', $item->logo)) }}"
                                                    style="height: 100%;" alt=""
                                                    class="h-50px w-50px align-self-center rounded-circle object-cover">
                                            @elseif ($item->client_id)
                                                <img src="{{ $item->client->profilePhotoUrl }}" style="height: 100%;"
                                                    alt=""
                                                    class="h-50px w-50px align-self-center rounded-circle object-cover">
                                            @else
                                                <img src="{{ asset('images/background.png') }}" style="height: 100%;"
                                                    alt=""
                                                    class="h-50px w-50px align-self-center rounded-circle object-cover">
                                            @endif
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                        <span class="font-weight-bolder text-white font-size-lg mb-1">
                                            {{ $item->company_name }}
                                        </span>
                                        <p class="text-white font-size-sm font-weight-bold">{{ $item->job_title }}</p>
                                        <div class="d-flex align-items-baseline">
                                            <div>
                                                @lang('app.deadline') :
                                            </div>
                                            <div class="">
                                                <span class="font-weight-bolder">
                                                    {{ optional($item->deadline)->format('j') }}
                                                    <sup>{{ optional($item->deadline)->format('S') }}</sup>
                                                    {{ optional($item->deadline)->format('F Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </a>
                    @empty
                        <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center">
                            <div class="alert alert-secondary alert-custom alert-notice mb-0  w-100 w-md-auto">
                                <div class="alert-icon">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-text font-weight-bolder">
                                    There are no opportunities available now!
                                </div>
                            </div>
                        </div>
                    @endforelse

                    @if ($jobs->count() > 0)
                        <div class="pt-5 text-center">
                            <a href="{{ route('jobs.index') }}"
                                class="btn btn-sm btn-secondary custom-button-2 font-weight-bolder">@lang('auth.read_more')</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <div class="low-partner-container" data-aos="fade-up" style="background-color: #fdfbfb !important">
        <div class="container">
            <div class="text-center"><span class="partner-title">@lang('app.high_rated')</span></div>

            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active rounded-0" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true">
                        DSP
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link rounded-0" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                        role="tab" aria-controls="pills-profile" aria-selected="false">
                        MSMEs
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link rounded-0" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                        role="tab" aria-controls="pills-contact" aria-selected="false">
                        iWORKERS
                    </a>
                </li>
            </ul>
            <div class="tab-content min-h-100px" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <x-high-rated-clients :items="$dsps" />
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <x-high-rated-clients :items="$msmes" />
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <x-high-rated-clients :items="$iworkers" />
                </div>
            </div>
        </div>
    </div>


    <div class="low-partner-container" data-aos="fade-up">
        <div class="container" id="demos">
            <div class="text-center"><span class="partner-title">@lang('auth.our_partners')</span></div>
            <div class="row justify-content-center">
                @foreach ($partners as $key => $item)
                    <div class="col-md-2">
                        <div class="text-center mx-4 shadow rounded img-thumbnail border-0">
                            <img src="{{ $item->getLogoUrl() }}" class="img-fluid  h-100px w-100px  object-contain"
                                alt="  {{ $item->name }}">
                            <p class="font-weight-bolder">
                                {{ $item->name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="owl-carousel owl-theme">
                 @foreach ($partners as $key => $item)
                     <div class="d-flex justify-content-center align-items-center flex-column">
                         <div
                             class="symbol symbol-60 symbol-xl-100 bg-transparent align-self-center">
                             <div class="symbol-label"
                                  style="background-size: contain!important;background-image:url({{route('get.partner.img.path',str_replace("/","",$item->logo))}});background-color: transparent!important;"></div>
                         </div>
                         <p>
                             {{ $item->name }}
                         </p>
                     </div>
                 @endforeach
             </div> --}}

            <div class="d-flex justify-content-center align-items-center">

            </div>


        </div>
    </div>
    <div class="above-footer-container" data-aos="fade-up">
        <div class="container pb-4">
            <div class="text-center p-5"><img src="{{ asset('frontend/assets/logo.png') }}" style="height: 70px;"
                    alt="">
            </div>
            <div class="p-2 text-center i-huzo-text"><span>iHuzo Digital Commerce is a digital onboarding project by Rwanda
                    ICT Chamber in partnership with Access To Finance Rwanda</span>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="d-flex tile-item-info">
                        <div><img src="{{ asset('frontend/assets/location.png') }}" alt=""></div>
                        <div class="flex-grow-1 details-info">
                            <div>@lang('auth.office_location')</div>
                            <div class="tile-sub-title">Telecom house 6 Floor. Kigali</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex tile-item-info">
                        <div><img src="{{ asset('frontend/assets/phone.png') }}" alt=""></div>
                        <div class="flex-grow-1 details-info">
                            <div>@lang('auth.phone_number')</div>
                            <div class="tile-sub-title">+250 781 161 487</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex tile-item-info">
                        <div><img src="{{ asset('frontend/assets/email.png') }}" alt=""></div>
                        <div class="flex-grow-1 details-info">
                            <div>Email</div>
                            <div class="tile-sub-title">info@ict.rw</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center font-weight-bolder mt-3">QUICK LINKS</div>
            <div class="text-center">
                <ul class="quick-links mt-3">
                    <li><a href="/">@lang('auth.home')</a></li>
                    <li><a href="{{ route('about') }}">@lang('auth.about_ihuzo')</a></li>
                    <li><a href="{{ route('webinars.index') }}">@lang('auth.events')</a></li>
                    <li><a href="https://academy.ihuzo.com/">Ihuzo Academy</a></li>
                    <li><a href="#" data-target="#feedbackModal" data-toggle="modal" id="feedbackBtn">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="social-footer" data-aos="fade-up">
        <div class="container">
            <div class="text-center">
                <span class="svg-icon svg-icon-primary text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </span>
                <span class="svg-icon svg-icon-primary text-primary mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </span>
                <span class="svg-icon svg-icon-primary text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-twitter" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
    @include('partials._feedback_modal')
@endsection


@section('scripts')
    <script>
        let partnersCount = {{ $partners->count() }};
        // console.log(partnersCount);

        /*      $('.owl-carousel').owlCarousel({
                      loop: true,
                      margin: 10,
                      center: true,
                      responsiveClass: true,
                      autoplay: true,
                      autoplayTimeout: 1500,
                      autoplayHoverPause: true,
                      items: partnersCount < 4 ? partnersCount : 3,
                      merge: true,
                      navigation: true,
                      responsive: {
                          0: {
                              items: 2,
                              // navigation: true
                          },
                          600: {
                              items: partnersCount < 4 ? partnersCount : 3,
                              // navigation: true
                          },
                          1000: {
                              items: partnersCount < 6 ? partnersCount : 5,
                              // navigation: true,
                              // loop: true
                          }
                      }
                  });
          */

        $(function() {
            $(document).on('click', '.category-tab a', function(e) {
                e.preventDefault();
                $(".category-tab a").removeClass("active");
                $(this).addClass('active');
            })
        })


        // $('.carousel .carousel-item').each(function(){
        //     var minPerSlide = 3;
        //     var next = $(this).next();
        //     if (!next.length) {
        //         next = $(this).siblings(':first');
        //     }
        //     next.children(':first-child').clone().appendTo($(this));
        //
        //     for (var i=0;i<minPerSlide;i++) {
        //         next=next.next();
        //         if (!next.length) {
        //             next = $(this).siblings(':first');
        //         }
        //
        //         next.children(':first-child').clone().appendTo($(this));
        //     }
        // });
    </script>
@endsection
