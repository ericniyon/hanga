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

.megamenu {
  position: static;
 border-radius: 50%
}

.megamenu .dropdown-menu {
  background: none;
  border: none;
  /* width: 2000px; */
  float: center;
  position: relative;
    left: 25%;
    right: 0;
    border-radius: 50%;
}





code {
  color: #745eb1;
  background: #fff;
  padding: 0.1rem 0.2rem;
  border-radius: 0.2rem;
}


    </style>



  <div class="top-background" style="z-index: 4;">

        <div class="container pb-5 mb-5">
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
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark"
                               href="{{ route('v2.auth.how.it.works') }}">
                                {{ __('app.How it Works') }}
                            </a>
                        </li>


                        {{-- <li class="nav-item">
                            <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark "
                               href="{{ route('v2.apis') }}">
                                {{ __('app.APIs') }}
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link text-hover-info px-4 tw-text-blue-900 lg:tw-text-white rounded bg-hover-light-primary text-center"
                               href="{{ route('v2.impacts') }}">
                                {{ __('Our Impacts') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 rounded bg-hover-light-primary text-center text-white text-hover-dark "
                               href="{{ route('v2.apply') }}">
                                {{ __('Apply') }}
                            </a>
                        </li>




                        {{-- mega menu --}}
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

                        {{-- <li class="nav-item mx-2">
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
                        </li> --}}


                    </ul>
                </div>
            </nav>





        </div>
    </div>

