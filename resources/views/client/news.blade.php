@extends('client.v2.layout.app')
@section('title', 'News')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @include('partials.includes._home_nav')

   <div class="container my-3">
       <livewire:v2.news-tabs/>
   </div>

    <x-top-rated/>

@endsection


@section('scripts')
    @livewireScripts
    <script>

    </script>
@stop
