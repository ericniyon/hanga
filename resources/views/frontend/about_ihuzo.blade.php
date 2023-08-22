@extends('client.v2.layout.app')
@section('title', 'About')
@section('content')
    <div class="h-200px d-flex align-items-center"
         style="background-image: url({{ asset('images/ihuza-about.jpg') }});background-position: left;background-size: auto;background-repeat: no-repeat;filter: blur(0px)">
        <div class="container text-white">
            <h1 class="text-left display-3 mb-5 font-weight-bolder">
                {{ __("app.About iHuzo Project") }}
            </h1>
            <p class="font-weight-bolder">
                {!! __("app.about_ihuzo_subtitle") !!}
            </p>
        </div>

    </div>
    <div class="container my-5">

        <div class="row my-5">
            <div class="col">
                <div class='card card-body card-custom'>
                    <h1 class='font-weight-bolder mb-4 text-center text-primary text-uppercase'>
                        {{ __("app.Key project targets") }}
                    </h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div
                                    class="card card-custom shadow-none bg-primary rounded-xl gutter-b hover-opacity-80 h-150px">
                                <!--begin::Body-->
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                                    <h1 class="font-weight-bolder text-white display-2 d-block counter">
                                        1,500
                                    </h1>
                                    <span class="font-weight-bold text-white font-size-h5">
                                     {{ __("app.local_bus_onboard") }}
                                    </span>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div
                                    class="card card-custom  shadow-none bg-primary rounded-xl gutter-b hover-opacity-80 h-150px">
                                <!--begin::Body-->
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                                    <h1 class="font-weight-bolder text-white display-2 d-block counter">
                                        2,000
                                    </h1>
                                    <span class="font-weight-bolder text-white font-size-h5">
                                       {{ __("app.iWorkers livelihoods improved or created") }}
                                    </span>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div
                                    class="card card-custom shadow-none bg-primary rounded-xl gutter-b hover-opacity-80 h-150px">
                                <!--begin::Body-->
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                                    <h1 class="font-weight-bolder text-white display-2 d-block counter">
                                        100
                                    </h1>
                                    <span class="font-weight-bolder text-white font-size-h5">
                                        {{ __("app.centers_offering_ecommerce") }}
                                    </span>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-body mb-4 shadow-none card-custom h-100" style="text-align: justify !important;">
                    <h1 class="font-weight-bolder mb-4 text-primary">
                        {{ __("app.Background") }}
                    </h1>
                    {!! __("app.background_sub") !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body shadow-none card-custom mt-4 mt-md-0">
                    <h1 class="font-weight-bolder mb-4 text-primary">
                        {{ __("app.The main objectives") }}
                    </h1>

                    <div class="d-flex align-items-center mb-9 bg-light-secondary rounded px-5 py-2">
                        <span class="svg-icon svg-icon-sm text-primary mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>

                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <p class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ __("app.obj1") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-9 bg-light-secondary rounded px-5 py-2">
                        <span class="svg-icon svg-icon-sm text-primary mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>

                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <p class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ __("app.obj2") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-9 bg-light-secondary rounded px-5 py-2">
                        <span class="svg-icon svg-icon-sm text-primary mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>

                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <p class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ __("app.obj3") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-9 bg-light-secondary rounded px-5 py-2">
                        <span class="svg-icon svg-icon-sm text-primary mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>

                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <p class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ __("app.obj4") }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-9 bg-light-secondary rounded px-5 py-2">
                        <span class="svg-icon svg-icon-sm text-primary mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>

                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <p class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ __("app.obj5") }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
    <script>
        /*!
         * jquery.counterup.js 2.0.0
         *
         * Copyright 2013, Benjamin Intal http://gambit.ph @bfintal
         * Released under the GPL v2 License
         *
         * Amended by Ciro Mattia Gonano and others
         *
         * Date: Mar 24, 2016
         */
        (function ($) {
            "use strict";

            $.fn.counterUp = function (options) {

                // Defaults
                var settings = $.extend({
                        'time': 400,
                        'delay': 10,
                        'formatter': false,
                        callback: function () {
                        }
                    }, options),
                    s;

                return this.each(function () {

                    // Store the object
                    var $this = $(this),
                        counter = {
                            time: $(this).data('counterup-time') || settings.time,
                            delay: $(this).data('counterup-delay') || settings.delay
                        };

                    var counterUpper = function () {
                        var nums = [];
                        var divisions = counter.time / counter.delay;
                        var num = $this.text();
                        var isComma = /[0-9]+,[0-9]+/.test(num);
                        num = num.replace(/,/g, '');
                        var decimalPlaces = (num.split('.')[1] || []).length;

                        var isTime = /[0-9]+:[0-9]+:[0-9]+/.test(num);

                        // Convert time to total seconds
                        if (isTime) {
                            var times = num.split(':'),
                                m = 1;
                            s = 0;
                            while (times.length > 0) {
                                s += m * parseInt(times.pop(), 10);
                                m *= 60;
                            }
                        }

                        // Generate list of incremental numbers to display
                        for (var i = divisions; i >= 1; i--) {

                            var newNum = parseFloat(num / divisions * i).toFixed(decimalPlaces);

                            // Add incremental seconds and convert back to time
                            if (isTime) {
                                newNum = parseInt(s / divisions * i);
                                var hours = parseInt(newNum / 3600) % 24;
                                var minutes = parseInt(newNum / 60) % 60;
                                var seconds = parseInt(newNum % 60, 10);
                                newNum = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
                            }

                            // Preserve commas if input had commas
                            if (isComma) {
                                while (/(\d+)(\d{3})/.test(newNum.toString())) {
                                    newNum = newNum.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                                }
                            }
                            if (settings.formatter) {
                                newNum = settings.formatter.call(this, newNum);
                            }
                            nums.unshift(newNum);
                        }

                        $this.data('counterup-nums', nums);
                        $this.text('0');

                        // Updates the number until we're done
                        var f = function () {
                            $this.html($this.data('counterup-nums').shift());
                            if ($this.data('counterup-nums').length) {
                                setTimeout($this.data('counterup-func'), counter.delay);
                            } else {
                                $this.data('counterup-nums', null);
                                $this.data('counterup-func', null);
                                settings.callback.call(this);
                            }
                        };
                        $this.data('counterup-func', f);

                        // Start the count up
                        setTimeout($this.data('counterup-func'), counter.delay);
                    };

                    // Perform counts when the element gets into view
                    $this.waypoint(function (direction) {
                        counterUpper();
                        this.destroy(); //-- Waypoint 3.0 version of triggerOnce
                    }, {offset: '100%'});
                });

            };

        })(jQuery);
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1500
            });
        });
    </script>
@stop
