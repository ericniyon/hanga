@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')

    @include('partials.includes._home_nav')

@endsection


@section('scripts')
    @livewireScripts
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function() {
            readURL(this);
        });

        $('.submit-form').validate();
    </script>

    <script>
        function greeting() {
            var myDate = new Date();
            var hrs = myDate.getHours();

            var greet;

            if (hrs < 12)
                greet = 'Good Morning';
            else if (hrs >= 12 && hrs <= 17)
                greet = 'Good Afternoon';
            else if (hrs >= 17 && hrs <= 24)
                greet = 'Good Evening';
            document.getElementById('greeting').innerHTML = greet
        }
        greeting()
    </script>

    <script>
        var totalProgress, progress;
        const circles = document.querySelectorAll('.progressBar');

        for (var i = 0; i < circles.length; i++) {
            totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
            progress = circles[i].parentElement.getAttribute('data-percent');

            console.log("totalProgress: ", totalProgress);
            console.log("progress: ", progress);

            circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 100;

        }
    </script>
@stop
