<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3KGMYL68K7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-3KGMYL68K7');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ihuzo.rw"
        content="iHuzo - Accelerating growth of Micro, Small and Medium Enterprises (MSMEs) through expanding e-commerce in Rwanda. #RwandaICTChamber #AFR.">

    <title>IHUZO @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;700&family=Lato:wght@100;300;400;700&family=Montserrat:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('frontend/css/tailwind.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
    @stack('css')
    @stack('custom-styles')
    <style>
        .custom-file {
            position: relative;
            overflow: hidden;
            margin-bottom: 10px;
            display: inline-block;

        }

        .custom-file-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            opacity: 0;
            z-index: 100;
        }

        .custom-file img {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        ul.file-list {
            font-family: arial;
            list-style: none;
            padding: 0;
        }

        ul.file-list li {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        .remove-list {
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>

<body class="bg-white" style="font-family: Montserrat !important">

    <div id="app">
        {{-- <div class="my_loader">
            <div class="inner">
            </div>
        </div> --}}
        <div class="content-wrapper d-flex flex-column justify-content-between " style="min-height: 100vh">
            <div class="flex-grow-1">
                @if (!auth('client')->check())
                    <nav class="navbar navbar-expand-lg navbar-light shadow-sm top-background-2">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('frontend/assets/logo.svg') }}" style="height: 50px"
                                    alt="Ihuzo Logo" /></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white bg-hover-light-primary text-center"
                                            href="{{ auth()->check() ? route('v2.home') : url('/') }}">
                                            {{ __('auth.home') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white bg-hover-light-primary text-center"
                                            href="{{ route('v2.auth.how.it.works') }}">
                                            {{ __('app.How it Works') }}
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark"
                                            href="{{ route('client.chamber.membership') }}">
                                            {{ __('app.Membership') }}
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white rounded bg-hover-light-primary text-center"
                                            href="https://ihuzoapi.vercel.app/" target='__blank'>
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
                                            href="{{ route('v2.apply') }}">
                                            {{ __('Apply') }}
                                        </a>
                                    </li> --}}

                                    <li class="nav-item dropdown">
                                        <a href="#"
                                            class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white bg-hover-light-primary text-center border-2"
                                            data-toggle="dropdown">
                                            {{ app()->getLocale() == 'en' ? 'English' : 'Kinyarwanda' }}
                                            <span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </span>
                                        </a>

                                        <div class="dropdown-menu shadow rounded-top-0">
                                            <a class="dropdown-item" href="{{ url('/setlocale/en') }}">English</a>
                                            <a class="dropdown-item" href="{{ url('/setlocale/rw') }}">Kinyarwanda</a>
                                        </div>

                                    </li>
                                    @guest('client')
                                        <li class="nav-item mx-2">
                                            <a class="nav-link px-4 rounded text-info border border-2 border-info text-center text-hover-info"
                                                href="{{ route('v2.login') }}">
                                                {{ __('app.Login') }}
                                            </a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a class="nav-link px-4 rounded text-white border border-2 border-info text-center text-hover-white bg-info"
                                                href="{{ route('v2.register') }}">
                                                {{ __('app.Sign Up') }}
                                            </a>
                                        </li>
                                    @endguest

                                    @auth('client')
                                        @include('partials._profile-dropdown')
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                @else
                @endif
                <main class="py-0">
                    {{--                @include('partials._alerts') --}}

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
    {{-- @include('partials._feedback_modal') --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scripts')



    <script src="{{ asset('frontend/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
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

        let showErrors = function(response) {
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
        let removeToast = function() {
            $('#toast-notification').fadeOut('slow');
        };


        $(function() {

            // wait 2 seconds and find element with id toast-notification and remove from DOM with fadeOut
            setTimeout(function() {
                removeToast();
            }, 5000);

            // on click of element with id close-toast then remove element with id toast-notification from DOM with fadeOut
            $('#close-toast').click(function() {
                removeToast();
            });


            // find  an anchor tag with href attribute equal to the current URL and add active class
            let item = $('a[href="{{ request()->fullUrl() }}"]');
            if (item)
                item.addClass('nav-active');

            $(document).tooltip({
                selector: '[data-toggle="tooltip"]'
            });
            // reset form inside a modal when it is closed
            $('.modal').on('hidden.bs.modal', function(event) {
                $(this).find('form')[0].reset();
            });

            setTimeout(function() {
                $('.my_loader').fadeOut(500);
            }, 500);

            $(document).on('change', '.custom-file-input', function() {
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

            $(document).on('click', '#js-submit-application', function(e) {
                e.preventDefault();

                /*   if (!$('#terms_conditions').is(':checked') && $('#hidden_tc').val() === '1') {
                       Swal.fire({
                           title: "{{ __('app.terms_and_conditions') }}",
                        html: "{{ __('app.please_accept_terms_conditions') }}",
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
                }).then(function(result) {
                    if (result.value) {
                        let form = self.parents('form');
                        console.log(form);
                        form.trigger('submit');
                    }
                });
                return false;
            });
        });


        $(document).on('click', ".btn-view-request-connection", function() {
            let accept_url = $(this).data("accept_url")
            let ignore_url = $(this).data("ignore_url")
            $('#btn-accept-request').attr("href", accept_url);
            $('#btn-ignore-request').attr("href", ignore_url);
            $("#con-request_massage").html($(this).data("message"))
            $("#con-requester_name").html($(this).data("name"))
            $("#con-requester_bio").html($(this).data("bio"))
            var imageUrl = $(this).data("image_url");
            $("#con-image").html('<img class="h-100px w-100px object-cover align-self-center" src="' + imageUrl +
                '" alt="">')
            let element = $("#con-requester_services");
            element.empty();
            let services = $(this).data("services")
            $.each(services, function(index, value) {
                element.append('<small class="badge bg-info text-white   m-1">' + value.name + '</small>');
            });
        })

        $(document).ready(function() {

            $('.select2').select2();


        });
    </script>
    @include('partials.includes.scripts._connection_scripts')

    <script>
        let page = 0;
        let url = "";
        $(document).on('click', '.show-reviews', function(e) {
            e.preventDefault();
            page = 0;
            $("#reviewsModal").modal('show');

            $(".loader-div").show();
            $(".reviews-body").empty();

            url = "/client/get-client-rating/request/" + $(this).attr("href") + "/";
            $.ajax({
                url: url + page,
                success: function(res) {
                    page++;
                    $(".reviews-body").html(res);
                },
                complete: function() {
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
                    success: function(res) {
                        page++;
                        $(".reviews-body").append(res);
                    },
                    complete: function() {
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
