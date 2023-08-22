@extends('client.v2.layout.app')

@section('title',"ICT Chamber Membership")

@section('content')
@livewireStyles
    @if(Auth::guard('client')->check() && Request::segment(2) != 'ict-chember-membership')
        @include('partials.includes._home_nav')
    @endif
<div class="container">
    @include('partials/membership/__membership', ['data'=> $data,'clusters' => $clusters,'cluster_items' => $cluster_items])
</div>
@livewireScripts
@stop
