@if(auth('client')->check())
@extends("frontend.master")
@section('title', 'Advocacy and Complaints')
@section('styles')
    @livewireStyles
@stop
@section("content")

{{-- @include('client.v2.navigation.nav') --}}
@include('partials.includes._home_nav')


    <div class="container">
        <div class="row my-3">
            <div class="col">

                @if (auth('client')->check())
                <livewire:v2.advocacy-complains.a-c-tabs>
                @else

                    <livewire:v2.advocacy-complains.consumer-a-c-tab>
                @endif

            </div>
        </div>
    </div>





    @include('partials.client._footer')
    @include('partials._feedback_modal')


@endsection


@push('scripts')
    @livewireScripts
@endpush
@section("scripts")

    <script>

        {{--let partnersCount = {{ $partners->count() }};--}}
        
        $(function () {
            $(document).on('click', '.category-tab a', function (e) {
                e.preventDefault();
                $(".category-tab a").removeClass("active");
                $(this).addClass('active');
            })
        })



    </script>


@endsection



@endif
