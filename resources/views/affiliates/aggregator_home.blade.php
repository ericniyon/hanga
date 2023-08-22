@extends('client.v2.layout.app')
@section('title', 'Aggregators')
@section('styles')
<link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">
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
        <livewire:v2.affiliates.aggregators >
    </div>
   </div>

@endsection

@include('affiliates.includes.add_affiliates_modal')
@section('scripts')
<script src="{{asset('select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
    @livewireScripts

@stop
