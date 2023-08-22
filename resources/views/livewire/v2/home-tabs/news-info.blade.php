<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @extends("frontend.master")
@section('title', 'Home')
@section('styles')
    @livewireStyles
@stop
@section("content")
<style>
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


{{-- including navigation --}}
@include('client.v2.navigation.nav')
{{-- including navigation --}}


<div class="">
    {{-- <h3>{{ auth('client')->user() }}</h3> --}}
</div>


    <div class="container">
        <div class="row my-3">
            <div class="col">

                {{-- <livewire:v2.home-news-tabs/> --}}

            </div>
        </div>
    </div>



    {{-- <x-top-rated/> --}}

    @include('partials.client._footer')
    @include('partials._feedback_modal')


@endsection


@push('scripts')
    @livewireScripts
@endpush
@section("scripts")

    <script>

        {{--let partnersCount = {{ $partners->count() }};--}}
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

        $(function () {
            $(document).on('click', '.category-tab a', function (e) {
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



</div>
