@extends('client.v2.layout.app')
@section('title',"Connections")
@section('styles')
    @livewireStyles
@endsection

@section('content')
    @include('partials.includes._home_nav')

    <div class="container-fluid tw-bg-gray-50">
        <div class="py-10">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <x-profile-card :editable="false"/>

                    @include('partials._your_dashboard')

                </div>
                <div class="col-md-8 mb-4 mb-md-0">
                    <div class="card card-custom gutter-b">
                        <div class="card-header mb-4 pt-3 pb-2 min-h-auto border-light-light">
                            <div class="card-title my-0">
                                <h3 class="mb-0">
                                    Who viewed your profile
                                </h3>

                            </div>
                        </div>
                        <div class="card-body pt-0 px-3">

                            {{-- <div class="list-group list-group-flush rounded-bottom">
                                @forelse($viewers as $item)
                                    @php
                                        $visitor=$item->visitor;
                                    @endphp
                                    <div
                                        class=" @if(!$loop->last) border-bottom border-bottom-light @endif py-2 my-3 mx-4">
                                        <x-client-item :item="$visitor"/>
                                    </div>
                                @empty
                                    <div class="alert alert-custom alert-notice alert-light-warning p-5  rounded-0 m-3">
                                        <div class="alert-text">
                                            There is no one viewed your profile yet
                                        </div>
                                    </div>
                                @endforelse
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @livewireScripts
@stop
