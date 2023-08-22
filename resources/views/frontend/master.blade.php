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

    <meta content="iHuzo - Accelerating growth of Micro, Small and Medium Enterprises (MSMEs) through expanding e-commerce in Rwanda. #RwandaICTChamber #AFR." name="ihuzo ihuzo.rw">
    <meta content="iHuzo - Accelerating growth of Micro, Small and Medium Enterprises (MSMEs) through expanding e-commerce in Rwanda. #RwandaICTChamber #AFR." name="ihuzo ihuzo.rw guhuza">
    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ihuzo @yield('title')</title>
    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/logo.png') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tailwind.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
    @stack('custom-styles')

</head>
<body class="">
@include('partials.v2._toasts')


@yield("content")




@include('partials.includes.modals._request_connection')

@stack('scripts')

<script src="{{ asset('frontend/js/app.js') }}"></script>
@yield('scripts')
@stack('custom-scripts')
<div class="notification-panel">

    <div class="notifications-data"></div>

</div>

@include('frontend.notification_item')
@include('partials.includes.scripts._connection_scripts')
 <script>
    var responsiveSlider = function() {

var slider = document.getElementById("sliderslideshow");
var sliderWidth = slider.offsetWidth;
var slideList = document.getElementById("slideshow");
var count = 1;
var items = slideList.querySelectorAll("div").length;
var prev = document.getElementById("prev");
var next = document.getElementById("next");

window.addEventListener('resize', function() {
  sliderWidth = slider.offsetWidth;
});

var prevSlide = function() {
  if(count > 1) {
    count = count - 2;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = 1) {
    count = items - 1;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
};

var nextSlide = function() {
  if(count < items) {
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = items) {
    slideList.style.left = "0px";
    count = 1;
  }
};

next.addEventListener("click", function() {
  nextSlide();
});

prev.addEventListener("click", function() {
  prevSlide();
});

setInterval(function() {
  nextSlide()
}, 5000);

};

window.onload = function() {
responsiveSlider();
}


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
    });
</script>
</body>
</html>
