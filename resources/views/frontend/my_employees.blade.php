@extends('client.v2.layout.app')

@section('title',"Affiliation request")

@section('styles')
    @livewireStyles
@stop

@section('content')
    @include('partials.includes._home_nav')
    <div class="container">
        <livewire:employee-request/>
    </div>

@stop


@section('scripts')
    @livewireScripts
@stop
