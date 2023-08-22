@extends('client.v2.layout.app')
@section('title', 'Groups/Cohorts')
@section('styles')
    @livewireStyles
@endsection
@push('css')
@endpush
@section('content')
    @include('partials.includes._home_nav')
<style>
    .btn + .btn{
        margin-left: 0px;
    }
</style>
   <div class="container my-3">
    <div class="row">
        <div class="col-md-3 mb-4 mb-md-0">
            {{-- @include('affiliates.includes.sidebar') --}}
            <livewire:v2.affiliates.sidebar >
        </div>
        <div class="col-md-9 mb-4 mb-md-0">
            <div class="row mb-4 mb-md-0 w-100" style="background: #F8F8F8; padding-right: 0px; padding-left:0px;height:auto;">
                <div class="affiliate-header d-flex justify-content-between mb-4">
                    <h3>Groups</h3>
                    <button data-toggle="modal" data-target="#addAggregator" class=" btn-primary btn mr-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                        </span>
                        <span>Add New Group</span>
                    </button>
                </div>
                @foreach ($groups as $client)
                <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
                    <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                        <img src="{{ $client->client->profile_photo_url }}"
                                onerror="this.src='{{$client->client->defaultPhotoUrl}}'"
                                class="h-80px w-80px object-cover align-self-center"
                                alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                            {{$client->group_name}}
                        </span>

                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <p>
                                    {{$client->description}}
                                </p>
                            </div>
                        </div>
                        <span class="font-weight-bold text-dark font-size-md mb-1 font-size-h6">
                            Members: {{$client->joins()->count()}}
                        </span>
                    </div>
                    <div class="w-md-150px w-100 button-groups">
                        @if($client->link()->exists())
                        <p id="p1{{$client->id}}" class="d-none">{{$client->link->link}}</p>
                        <a title="share link" onclick="copyToClipboard('#p1{{$client->id}}')" class="btn-primary btn w-100" style="padding: 8px 30px!important">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                            </svg>
                            <span>Share</span>
                        </a>
                        @else
                        <a title="Create new link" class="btn-primary d-flex btn w-100 btn-outline" data-toggle="modal" data-target="#addNewGroup{{$client->id}}" style="padding: 8px 30px!important">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                            </svg>
                            <span>New</span>
                        </a>
                        @endif
                        <div class="dropdown">
                            <a href="{{route('client.affiliates.goup.members',encryptId($client->id))}}" title="View Group Member" class="btn-info btn btn-sm d-flex mt-2" style="padding: 8px 30px!important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                                <span>View</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- @empty --}}

                @endforeach
                <div class=" mb-1 mb-md-0 w-100" style="background: #F8F8F8;">
                    <div class="custom-pagination d-flex justify-content-start ml-0 pl-0">
                        {{-- @include('partials.includes._pagination', ['paginator' => $groups]) --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>

@endsection

@include('affiliates.includes.add_group_modal')
@section('scripts')
    @livewireScripts
    <script>
        function copyToClipboard(element) {
            var $temp = $("<p>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@stop
