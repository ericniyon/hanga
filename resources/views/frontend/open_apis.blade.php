@extends('layouts.app')
@section('title',"Open APIs")
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="container my-5">
        @livewire('open-api')
    </div>
@stop
@section('scripts')
    @livewireScripts
@stop

