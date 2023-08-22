@extends('client.v2.layout.app')

@section('title',"How it works")

@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/v2/svgs/how-it-works-image-svg.svg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="font-weight-boldest display-3 font-quicksand">iHUZO</h1>
                <p>
                    {{ __("app.how_it_works_heading") }}
                </p>
            </div>
        </div>
        <h1 class="text-ihuzo display-3 font-weight-boldest font-quicksand">
            {{ __("app.How it Works") }}
        </h1>

        <div class="my-5 position-relative min-h-500px min-h-md-400px">
            <div class="row">
                <div class="col-md-8">
                    <div
                            class="p-3 mt-0 overflow-hidden bg-white border border-primary rounded-0 w-md-200px w-100 text-info font-weight-bolder zindex-2 position-relative">
                        <span class="svg-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10"
                                        fill="#2A337E"/>
                            </svg>
                            </span>
                        <span class="ml-3">
                            {{ __("app.Have an account") }}
                        </span>
                    </div>
                    <div
                            class="my-10 ml-0 how-dotted-line-ihuzo d-none d-md-inline-flex zindex-0 w-100 w-md-500px w-xl-650px ml-md-20"></div>
                    <div
                            class="ml-0 ml-md-30 d-flex flex-column justify-content-center align-items-start font-quicksand font-weight-normal"
                            style="font-size: 18px;line-height: 22px">
                        <div class="mt-10 w-md-300px w-100 mt-md-0 h-100px text-dark-75 font-quicksand">
                            {{ __("app.Create a") }} <span
                                    class="font-weight-boldest text-dark">{{ __("app.Free account") }}</span>
                            {{ __("app.on iHUZO to explore all features and opportunities on this platform") }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="w-100 h-250px position-relative zindex-2">
                        <img src="{{ asset('images/v2/have_account.svg') }}" class="mt-10 w-100 img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="my-5 position-relative min-h-500px min-h-md-400px">
            <div class="row">
                <div class="col-md-8">
                    <div
                            class="p-3 mt-0 overflow-hidden bg-white border border-primary rounded-0 w-md-200px w-100 text-info font-weight-bolder zindex-2 position-relative">
                        <span class="svg-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10"
                                        fill="#2A337E"/>
                            </svg>
                            </span>
                        <span class="ml-3">
                            {{ __("app.Explore") }}
                        </span>
                    </div>
                    <div
                            class="my-10 ml-0 how-dotted-line-ihuzo d-none d-md-inline-flex zindex-0 w-100 w-md-500px w-xl-650px ml-md-20"></div>
                    <div
                            class="ml-0 ml-md-30 d-flex flex-column justify-content-center align-items-start font-quicksand font-weight-normal"
                            style="font-size: 18px;line-height: 22px">
                        <div class="mt-10 w-md-300px w-100 mt-md-0 h-100px text-dark-75 font-quicksand">
                            {{ __("app.Explore iWorkers,Digital services Providers who meet your requirements") }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="w-100 h-250px position-relative zindex-2">
                        <img src="{{ asset('images/v2/explore.svg') }}" class="mt-10 w-100 img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="my-5 position-relative min-h-500px min-h-md-400px">
            <div class="row">
                <div class="col-md-8">
                    <div
                            class="p-3 mt-0 overflow-hidden bg-white border border-primary rounded-0 w-md-200px w-100 text-info font-weight-bolder zindex-2 position-relative">
                        <span class="svg-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10"
                                        fill="#2A337E"/>
                            </svg>
                            </span>
                        <span class="ml-3">
                            {{ __("app.Connect") }}
                        </span>
                    </div>
                    <div
                            class="my-10 ml-0 how-dotted-line-ihuzo d-none d-md-inline-flex zindex-0 w-100 w-md-500px w-xl-650px ml-md-20"></div>
                    <div
                            class="ml-0 ml-md-30 d-flex flex-column justify-content-center align-items-start font-quicksand font-weight-normal"
                            style="font-size: 18px;line-height: 22px">
                        <div class="mt-10 w-md-300px w-100 mt-md-0 h-100px text-dark-75 font-quicksand">
                            {{ __("app.Sell your products through Rwandan multiple Digital Platforms across the country and world") }}.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="w-100 h-250px position-relative zindex-2">
                        <img src="{{ asset('images/v2/connect.svg') }}" class="mt-10 w-100 img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-10">
        <x-top-rated/>
    </div>
@stop
