@extends('client.v2.layout.app')
@section('title', 'Affiliates')
@section('styles')
    @livewireStyles
@endsection
@push('css')
@endpush
@section('content')
    @include('partials.includes._home_nav')

   <div class="container my-3">
    <div class="row">
        <div class="col-md-3 mb-4 mb-md-0">
            {{-- @include('affiliates.includes.sidebar') --}}
            <livewire:v2.affiliates.sidebar >

        </div>
        <livewire:v2.affiliates.affiliates >
    </div>
   </div>

@endsection

@include('affiliates.includes.add_affiliates_modal')
@section('scripts')
    @livewireScripts

@stop
