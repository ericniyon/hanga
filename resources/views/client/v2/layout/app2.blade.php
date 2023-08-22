<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3KGMYL68K7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3KGMYL68K7');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ihuzo.rw" content="iHuzo - Accelerating growth of Micro, Small and Medium Enterprises (MSMEs) through expanding e-commerce in Rwanda. #RwandaICTChamber #AFR.">

    <title>IHUZO @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tailwind.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
    @stack('css')
    @stack('custom-styles')
    <style>
        .gb-img{
            margin-top: 38em
        }
        @media screen and (max-width: 700px){
            .gb-img{
                margin-top: 0%;
                position: relative;
                top: -120px;
            }

            .left-text span{
                position: relative;
                z-index: 999;
                margin: 0 auto;
                left: 0;
                right: 0;

            }
            .row-impact{
                margin-bottom: 0px !important;
                padding-bottom: 0px !important
            }
            main{
                padding: 0px
            }
        }
        $items: 4;
    $animation-time: 19s;
    $transition-time: 10.5s;
    $scale: 20%;

    $total-time: ($animation-time * $items);
    $scale-base-1: (1 + $scale / 100%);
    /*! normalize.css v4.0.0 | MIT License | github.com/necolas/normalize.css */html {
      font-family: sans-serif;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%
    }

    body { margin: 0 }


    /* main css */

    .slideshow {
      position: absolute;
      width: 100%;
      height: 380px;
      overflow: hidden;
    }

    .slideshow-image {
      position: absolute;
      width: 100%;
      height: 100%;
      background: no-repeat 50% 50%;
      background-size: cover;
      -webkit-animation-name: kenburns;
      animation-name: kenburns;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      -webkit-animation-duration: 16s;
      animation-duration: 16s;
      opacity: 1;
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
    }

    .slideshow-image:nth-child(1) {
      -webkit-animation-name: kenburns-1;
      animation-name: kenburns-1;
      z-index: 3;
    }

    .slideshow-image:nth-child(2) {
      -webkit-animation-name: kenburns-2;
      animation-name: kenburns-2;
      z-index: 2;
    }

    .slideshow-image:nth-child(3) {
      -webkit-animation-name: kenburns-3;
      animation-name: kenburns-3;
      z-index: 1;
    }

    .slideshow-image:nth-child(4) {
      -webkit-animation-name: kenburns-4;
      animation-name: kenburns-4;
      z-index: 0;
    }
     @-webkit-keyframes
    kenburns-1 {  0% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     1.5625% {
     opacity: 1;
    }
     23.4375% {
     opacity: 1;
    }
     26.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     98.4375% {
     opacity: 0;
     -webkit-transform: scale(1.21176);
     transform: scale(1.21176);
    }
     100% {
     opacity: 1;
    }
    }
     @keyframes
    kenburns-1 {  0% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     1.5625% {
     opacity: 1;
    }
     23.4375% {
     opacity: 1;
    }
     26.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     98.4375% {
     opacity: 0;
     -webkit-transform: scale(1.21176);
     transform: scale(1.21176);
    }
     100% {
     opacity: 1;
    }
    }
    @-webkit-keyframes
    kenburns-2 {  23.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     26.5625% {
     opacity: 1;
    }
     48.4375% {
     opacity: 1;
    }
     51.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
    }
    @keyframes
    kenburns-2 {  23.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     26.5625% {
     opacity: 1;
    }
     48.4375% {
     opacity: 1;
    }
     51.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
    }
    @-webkit-keyframes
    kenburns-3 {  48.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     51.5625% {
     opacity: 1;
    }
     73.4375% {
     opacity: 1;
    }
     76.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
    }
    @keyframes
    kenburns-3 {  48.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     51.5625% {
     opacity: 1;
    }
     73.4375% {
     opacity: 1;
    }
     76.5625% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
    }
    @-webkit-keyframes
    kenburns-4 {  73.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     76.5625% {
     opacity: 1;
    }
     98.4375% {
     opacity: 1;
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
    }
    @keyframes
    kenburns-4 {  73.4375% {
     opacity: 1;
     -webkit-transform: scale(1.2);
     transform: scale(1.2);
    }
     76.5625% {
     opacity: 1;
    }
     98.4375% {
     opacity: 1;
    }
     100% {
     opacity: 0;
     -webkit-transform: scale(1);
     transform: scale(1);
    }
    }
    </style>
</head>
<body >

<div id="app">
    <div class="my_loader">
        <div class="inner">
        </div>
    </div>
    <div class="slideshow">
        <div class="slideshow-image" style="background-image: url('{{ asset('images/background.png') }}')">
        </div>
            <div class="slideshow-image" style="background-image: url('{{ asset('images/new_background.png') }}')"></div>
            <div class="slideshow-image" style="background-image: url('{{ asset('images/Ihuzo-bg.jpeg') }}')"></div>
            <div class="slideshow-image" style="background-image: url('{{ asset('images/low_background.png') }}')"></div>
          </div>


    <div class="content-wrapper d-flex flex-column justify-content-between " style="min-height: 100vh">
        <div class="border-bottom" >
            <div class="container ">
                <nav class="navbar navbar-expand-lg navbar-light font-quicksand">
                    <a class="navbar-brand" href="#"><img src="{{asset("frontend/assets/logo.png")}}" style="height: 50px" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse home-nav" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark"
                                   href="{{ route('v2.auth.how.it.works') }}">
                                    {{ __('app.How it Works') }}
                                </a>
                            </li>


                            {{-- <li class="nav-item">
                                <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark "
                                   href="https://ihuzoapi.vercel.app/" target="__blank">
                                    {{ __('app.APIs') }}
                                </a>
                            </li> --}}


                            {{-- <li class="nav-item">
                                <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark "
                                   href="{{ route('v2.apply') }}">
                                    {{ __('Apply') }}
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white rounded bg-hover-light-primary text-center"
                                   href="{{ route('v2.impacts') }}">
                                    {{ __('Our Impacts') }}
                                </a>
                            </li> --}}

                            <li class="nav-item dropdown">
                                <a href="#"
                                   class="nav-link dropdown-toggle nav-link dropdown-toggle mx-1 rounded bg-hover-light-primary text-center text-white text-hover-dark"
                                   data-toggle="dropdown">
                                    {{ app()->getLocale()=='en'?'English':'Kinyarwanda' }}
                                    <span class="svg-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                               viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"/>
                                            </svg>
                                    </span>
                                </a>

                                <div class="dropdown-menu shadow rounded-top-0">
                                    <a class="dropdown-item" href="{{ url('/setlocale/en') }}">English</a>
                                    <a class="dropdown-item" href="{{ url('/setlocale/rw') }}">Kinyarwanda</a>
                                </div>

                            </li>
                            @if(auth('client')->check())
                                @include('partials._profile-dropdown')
                            @else('client')

                                <li class="nav-item mx-2">
                                    <a class="nav-link px-4 rounded text-info border border-info text-center text-hover-info"
                                       href="{{ route('v2.login') }}">
                                        {{ __('auth.login') }}
                                    </a>
                                </li>

                                <li class="nav-item mx-2">
                                    <a class="nav-link px-4 rounded text-white border border-info text-center text-hover-white bg-info"
                                       href="{{ route('v2.register') }}">
                                        {{ __('auth.signup') }}
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item mx-2">
                                <a class="nav-link px-4 rounded border border-white text-white text-hover-info"
                                   href="{{ route('login') }}">
                                    <span class="svg-icon">
                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" stroke="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M8.50033 13.5833V15.6666C6.84272 15.6666 5.25301 16.3251 4.08091 17.4972C2.90881 18.6693 2.25033 20.259 2.25033 21.9166H0.166992C0.166992 19.7065 1.04497 17.5869 2.60777 16.0241C4.17057 14.4613 6.29019 13.5833 8.50033 13.5833ZM8.50033 12.5416C5.0472 12.5416 2.25033 9.74475 2.25033 6.29163C2.25033 2.8385 5.0472 0.041626 8.50033 0.041626C11.9535 0.041626 14.7503 2.8385 14.7503 6.29163C14.7503 9.74475 11.9535 12.5416 8.50033 12.5416ZM8.50033 10.4583C10.8024 10.4583 12.667 8.59371 12.667 6.29163C12.667 3.98954 10.8024 2.12496 8.50033 2.12496C6.19824 2.12496 4.33366 3.98954 4.33366 6.29163C4.33366 8.59371 6.19824 10.4583 8.50033 10.4583ZM17.8753 16.7083H18.917V21.9166H10.5837V16.7083H11.6253V15.6666C11.6253 14.8378 11.9546 14.043 12.5406 13.4569C13.1267 12.8709 13.9215 12.5416 14.7503 12.5416C15.5791 12.5416 16.374 12.8709 16.96 13.4569C17.5461 14.043 17.8753 14.8378 17.8753 15.6666V16.7083ZM15.792 16.7083V15.6666C15.792 15.3904 15.6822 15.1254 15.4869 14.9301C15.2915 14.7347 15.0266 14.625 14.7503 14.625C14.4741 14.625 14.2091 14.7347 14.0138 14.9301C13.8184 15.1254 13.7087 15.3904 13.7087 15.6666V16.7083H15.792Z"
                                                    fill="currentColor"/>
                                            </svg>

                                    </span>
                                    {{ __('auth.staffLogin') }}
                                </a>
                            </li>


                        </ul>
                    </div>
                </nav>

                <div class="content mt-5 position-relative font-quicksand">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="left-text" style="line-height: 1">
                                @lang('auth.find')
                                <span class="font-weight-bolder text-info">@lang('auth.trusted_company')</span>
                                @lang('auth.for_your_biz')
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mt-3">
                                @if(!auth('client')->check())
                                    <div class="col-lg-4 mt-1">
                                         <a href="{{route('v2.register')}}"
                                            class="btn btn-primary rounded-pill btn-block text-white font-weight-bolder">
                                             Get Started
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
                            <img src="{{asset('frontend/assets/computer_3_cropped.png')}}"
                                 class="computer-img"
                                 alt="">
                        </div>
                    </div>

                </div>
            </div>
            <main class="py-0">
                {{--                @include('partials._alerts')--}}

                @include('partials.v2._toasts')

                @yield('content')
            </main>
        </div>
        <div>
            @include('partials.client._footer')
        </div>

    </div>


    @include('partials.includes.modals._request_connection')

    @include('partials.includes.modals._rating_modal')

    @include('partials.includes.modals._reviews_modal')

    @include('partials.includes.modals._view_request_modal')
    <div class="notification-panel">

        <div class="notifications-data"></div>

    </div>

</div>
{{--@include('partials._feedback_modal')--}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@stack('scripts')



<!-- Scripts -->
<script src="{{ asset('frontend/js/app.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}
<script>
    var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#0BB783",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#D7F9EF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };

    let showErrors = function (response) {
        // isSubmitting = false;
        let errors = response.responseJSON.errors;
        let error = response.responseJSON.error;
        if (errors) {
            for (const $key in errors) {
                if (errors.hasOwnProperty($key)) {
                    Swal.fire("Error try again", errors[$key][0], "error");
                    break;
                }
            }

        } else if (error) {
            Swal.fire("Error", error, "error");
        } else {
            Swal.fire({
                title: "Error try again later",
                icon: "warning",
            });
        }

    };
</script>
<script>

    let removeToast = function () {
        $('#toast-notification').fadeOut('slow');
    };


    $(function () {

        // wait 2 seconds and find element with id toast-notification and remove from DOM with fadeOut
        setTimeout(function () {
            removeToast();
        }, 5000);

        // on click of element with id close-toast then remove element with id toast-notification from DOM with fadeOut
        $('#close-toast').click(function () {
            removeToast();
        });


        // find  an anchor tag with href attribute equal to the current URL and add active class
        let item = $('a[href="{{ request()->fullUrl() }}"]');
        if (item)
            item.addClass('nav-active');

        $(document).tooltip({selector: '[data-toggle="tooltip"]'});
        // reset form inside a modal when it is closed
        $('.modal').on('hidden.bs.modal', function (event) {
            $(this).find('form')[0].reset();
        });

        setTimeout(function () {
            $('.my_loader').fadeOut(500);
        }, 500);

        $(document).on('change', '.custom-file-input', function () {
            //get the file name
            const input = $(this);
            var fileName = input.val();
            if (fileName === '') {
                input.next('.custom-file-label').html('Choose file');
            } else {
                //replace the "Choose a file" label
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                // alert(cleanFileName);
                input.next('.custom-file-label').html(cleanFileName);
            }

        });

        $(document).on('click', '#js-submit-application', function (e) {
            e.preventDefault();

            /*   if (!$('#terms_conditions').is(':checked') && $('#hidden_tc').val() === '1') {
                   Swal.fire({
                       title: "{{__('app.terms_and_conditions')}}",
                    html: "{{__('app.please_accept_terms_conditions')}}",
                    icon: "error",
                });
                return;
            }*/

            let self = $(this);
            Swal.fire({
                title: "Are you sure?",
                html: "Do you want to submit your application?",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "No,cancel",
                confirmButtonText: "Submit",
                customClass: {
                    cancelButton: "btn btn-secondary",
                    confirmButton: "btn btn-success"
                }
            }).then(function (result) {
                if (result.value) {
                    let form = self.parents('form');

                    form.trigger('submit');
                }
            });
            return false;
        });
    });


    $(document).on('click', ".btn-view-request-connection", function () {
        let accept_url = $(this).data("accept_url")
        let ignore_url = $(this).data("ignore_url")
        $('#btn-accept-request').attr("href", accept_url);
        $('#btn-ignore-request').attr("href", ignore_url);
        $("#con-request_massage").html($(this).data("message"))
        $("#con-requester_name").html($(this).data("name"))
        $("#con-requester_bio").html($(this).data("bio"))
        var imageUrl = $(this).data("image_url");
        $("#con-image").html('<img class="h-100px w-100px object-cover align-self-center" src="' + imageUrl + '" alt="">')
        let element = $("#con-requester_services");
        element.empty();
        let services = $(this).data("services")
        $.each(services, function (index, value) {
            element.append('<small class="badge bg-info text-white   m-1">' + value.name + '</small>');
        });
    })

    $(document).ready(function () {

        $('.select2').select2();


    });


</script>
@include('partials.includes.scripts._connection_scripts')
<script>
    let page = 0;
    let url = "";
    $(document).on('click', '.show-reviews', function (e) {
        e.preventDefault();
        page = 0;
        $("#reviewsModal").modal('show');

        $(".loader-div").show();
        $(".reviews-body").empty();

        url = "/client/get-client-rating/request/" + $(this).attr("href") + "/";
        $.ajax({
            url: url + page,
            success: function (res) {
                page++;
                $(".reviews-body").html(res);
            },
            complete: function () {
                $(".loader-div").hide();
            }
        })
    })


    let loadingMore = false;

    function onScrollModal(elem) {
        if (atBottom(elem) && !loadingMore) {
            $(".loader-more").css('visibility', 'visible');
            loadingMore = true;
            $.ajax({
                url: url + page,
                success: function (res) {
                    page++;
                    $(".reviews-body").append(res);
                },
                complete: function () {
                    $(".loader-more").css('visibility', 'hidden');
                    loadingMore = false;
                }
            })
        }
    }


    function atBottom(ele) {
        let sh = ele.scrollHeight;
        let st = ele.scrollTop;
        let ht = ele.offsetHeight;
        if (ht === 0) {
            return true;
        }
        return st === sh - ht;
    }


</script>
@include('partials.includes.scripts._rating')

@yield('scripts')
@stack('custom-scripts')

@include('frontend.notification_item')

</body>
</html>
