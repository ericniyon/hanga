@extends('client.v2.layout.app')
@section('title', 'Invitation Links')
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
        <div class="col-md-9 mb-4 mb-md-0">
            <div class="row mb-4 mb-md-0 w-100" style="background: #F8F8F8; padding-right: 0px; padding-left:0px;height:auto;">
                <div class="affiliate-header d-flex justify-content-between">
                    <h3>{{__('Links')}}</h3>
                    <button data-toggle="modal" data-target="#addAggregator" class=" btn-primary btn mr-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                              </svg>
                        </span>
                        <span>{{__('Create New Link')}}</span>
                    </button>
                </div>
                <div class="row p-3">
                    @forelse ($links as $link)
                    <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg  overflow-hidden tw-p-4 tw-shadow">
                        <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                            <h3 class="text-center px-5" style="
                                display: flex; align-items: center; color: #141414; font-weight: 600;">
                                {{$link->cohort->group_name}}
                            </h3>

                            <div class="d-flex px-5">
                                {{-- <p>{{Str::limit($group->description,160)}}</p> --}}
                            </div>
                            <span class="px-5 d-flex justify-content-between">
                                <strong class="text-success">{{__('Joined Number')}}: {{__('0')}}</strong>
                                <strong class="text-primary">Expected Number: {{$link->max_joins}}</strong>
                            </span>
                        </div>
                        <!--end::Title-->
                        <div class="w-md-150px w-100 button-groups" style="margin-left: 10px!important;">
                            <a href="{{encryptId($link->id)}}" class=" btn-primary btn w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 16">
                                    <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                </svg>
                                Visit
                            </a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-pagination">
                                @include('partials.includes._pagination', ['paginator' => $links])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>

@endsection

@include('affiliates.includes.add_link_modal')
@section('scripts')
    <script src="{{asset("assets/js/pages/crud/forms/widgets/select2.js?v=7.0.3")}}"></script>
    @livewireScripts
    <script>
        $('#company1').select2({
            placeholder: "{{ __('Select Group') }}"
        });
    </script>
@stop
