@extends('client.v2.layout.app')

@section('title','Request verification')

@section('styles')
    @livewireStyles
@stop
@section('content')
    @include('partials.includes._home_nav')
    <div class="container my-5">

        <div class="card shadow-none rounded border-0 h-100 mb-4">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-center flex-column">
                <h4 class="text-center font-weight-bolder">IHUZO verification</h4>
                <livewire:request-verification :application="$application"/>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    @livewireScripts
@stop
