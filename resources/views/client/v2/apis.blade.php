@extends('client.v2.layout.app')

@section('title',"APIs")
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5" style="padding-top: 5em">
        <livewire:v2.available-apis/>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <x-top-rated/>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    @livewireScripts
@endpush
