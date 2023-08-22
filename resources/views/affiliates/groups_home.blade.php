@extends('client.v2.layout.app')
@section('title', 'Groups/Cohorts')
@section('styles')
    @livewireStyles
@endsection
@push('css')
<link >
{{-- <link rel="stylesheet" href="{{asset('select2/css/select2.css')}}"> --}}
<link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">
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
                <div class="row w-100 accordion" id="accordion-container" style="background: #F8F8F8; margin:0px!important; padding-top: 1rem!important">
                    @foreach ($groups as $client)
                    <div class="d-flex py-5 w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow" style="border-radius: 6px 6px 0px 0px">
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
                            <a  title="Send on Whatsapp" href="https://wa.me/?text={{$client->link->link}}?group={{encryptId($client->link->id)}}" target="_blank" class="btn-primary btn w-100 d-flex" style="padding: 8px 30px!important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                                <span class="ml-1">Share</span>
                            </a>
                            @else
                            <a title="Create new link" class="btn-primary d-flex btn w-100 btn-outline" data-toggle="modal" data-target="#addLink{{$client->id}}" style="padding: 8px 30px!important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                </svg>
                                <span class="ml-1">New</span>
                            </a>
                            @endif
                            <a data-toggle="modal" class="btn-secondary-outline d-flex btn w-100 btn-outline mt-2" title="Send broadcast to group member" data-target="#sendBroadcastParent{{$client->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-broadcast" viewBox="0 0 16 16">
                                    <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                                </svg>
                                <span class="ml-1"> Message</span>
                            </a>
                            <div class="dropdown">
                                <a href="{{route('client.affiliates.goup.members',encryptId($client->id))}}" title="View Group Member" class="btn-secondary btn btn-sm d-flex mt-2" style="padding: 8px 30px!important">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                    <span class="ml-1">View</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center justify-content-between mb-9 card tw-p-4 collapsed pr-3"
                    data-toggle="collapse" data-target="#collapse-group{{$loop->iteration}}"
                        style="margin-top: -2.4rem!important;">
                        <div class="card-label pl-4">
                            View Groups ({{$client->children()->count()}})
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                    <div id="collapse-group{{$loop->iteration}}" class="collapse w-100" data-parent="#accordion-container">
                        <div class="card-body affiliates-container m-4" style="margin-top: -2.3rem!important;border-radius: 0px 0px 7px 7px!important;">
                            <div class="row">
                                @forelse ($client->children as $group)
                                <div class="col-md-3 card pt-5 pb-2 {{($loop->iteration%4 != 0)?'mr-2':''}}">
                                    <div class="row">
                                      <div class="col-12 mb-5 d-flex justify-content-between">
                                        <h5>{{$group->group_name}}</h5>
                                        <a  title="Send on Whatsapp" href="{{route('client.cohorts.delete',encryptId($group->id))}}" class="text-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-cohort-form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                            {{-- <span>Share</span> --}}
                                        </a>
                                        <form id="delete-cohort-form" action="{{route('client.cohorts.delete',encryptId($group->id))}}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                      </div>
                                      <div class="d-flex">
                                          <div class="col-md-6 text-success">Joins: {{$group->joins()->count()}}</div>
                                          <div class="col-md-2">
                                            @if($group->link()->exists())
                                            <a  title="Send on Whatsapp" href="https://wa.me/?text={{$group->link->link}}?group={{encryptId($group->link->id)}}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                </svg>
                                                {{-- <span>Share</span> --}}
                                            </a>
                                            @else
                                            <a title="Create new link" data-toggle="modal" data-target="#addLinkSubGroup{{$group->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                                    <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                                    <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                                                </svg>
                                            </a>
                                            @endif
                                          </div>
                                          <div class="col-md-2">
                                            <a data-toggle="modal" title="Send broadcast to group member" data-target="#sendBroadcast{{$group->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-broadcast" viewBox="0 0 16 16">
                                                    <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                                                </svg>
                                            </a>
                                          </div>
                                          <div class="col-md-2">
                                              <a href="{{route('client.affiliates.goup.members',encryptId($group->id))}}" title="View Group Member">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                              </a>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                {{-- Add new link to share --}}
                                <div class="modal fade" id="addLinkSubGroup{{$group->id}}" aria-labelledby="addAggregator" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="addAggregator">
                                                    Create New Link
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('client.invitations.store')}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$group->id}}" name="group" id="group" class="form-control">
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <label for="">{{__('affiliates.expiry_time')}}</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="date" name="expiry_date" min="{{\Carbon\Carbon::now()->addDay()}}" id="" class="form-control @error('expiry_date') is-invalid @enderror"
                                                             value="{{old('expiry_date')}}">
                                                            @error('expiry_date')
                                                            <span class="invalid-feedback">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" name="expiry_time" id="" class="form-control @error('expiry_time') is-invalid @enderror" value="{{old('expiry_time')}}">
                                                            @error('expiry_time')
                                                            <span class="invalid-feedback">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">{{__('affiliates.max_joins')}}</label>
                                                        <input type="number" name="maximum_joins" value="{{old('maximum_joins')}}" id="" class="form-control @error('maximum_joins') is-invalid @enderror">
                                                        @error('maximum_joins')
                                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="btn btn-light text-uppercase btn-sm "
                                                            data-dismiss="modal">
                                                        {{ __("client_registration.close") }}
                                                    </button>
                                                    <button type="submit" class="btn btn-info text-uppercase btn-sm ">
                                                        {{ __("client_registration.save_changes") }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- broadcast message --}}
                                <div class="modal fade" id="sendBroadcast{{$group->id}}" aria-labelledby="sendBroadcast" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0 pb-0">
                                                <h5 class="modal-title" id="sendBroadcast">
                                                    Send a Broadcast
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('client.broadcast.send')}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$group->id}}" name="group" id="group" class="form-control">
                                                    <div class="form-group">
                                                        <label for="">{{__('Broadcast Title')}}</label>
                                                        <input type="text" required name="title" class="form-control @error('title') is-invalid @enderror"
                                                         value="{{old('title')}}">
                                                        @error('title')
                                                        <span class="invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">{{__('Broadcast Message')}}</label>
                                                        <textarea required name="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="5"
                                                        >{{old('message')}}</textarea>
                                                        @error('message')
                                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0 pt-0 pb-0">
                                                    <button type="button" class="btn btn-light text-uppercase btn-sm "
                                                            data-dismiss="modal">
                                                        {{ __("client_registration.close") }}
                                                    </button>
                                                    <button type="submit" class="btn btn-info text-uppercase btn-sm ">
                                                        {{ __("client_registration.save_changes") }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="container">
                                    <div class="row">
                                        <h5 class="text-center text-primary">No Groups Yet</h5>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    {{-- @empty --}}
                    <div class="modal fade" id="addLink{{$client->id}}" aria-labelledby="addAggregator" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="addAggregator">
                                        Create New Link
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('client.invitations.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$client->id}}" name="group" id="group" class="form-control">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="">{{__('affiliates.expiry_time')}}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="date" name="expiry_date" min="{{\Carbon\Carbon::now()->addDay()}}" id="" class="form-control @error('expiry_date') is-invalid @enderror"
                                                 value="{{old('expiry_date')}}">
                                                @error('expiry_date')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <input type="time" name="expiry_time" id="" class="form-control @error('expiry_time') is-invalid @enderror" value="{{old('expiry_time')}}">
                                                @error('expiry_time')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{__('affiliates.max_joins')}}</label>
                                            <input type="number" name="maximum_joins" value="{{old('maximum_joins')}}" id="" class="form-control @error('maximum_joins') is-invalid @enderror">
                                            @error('maximum_joins')
                                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-light text-uppercase btn-sm "
                                                data-dismiss="modal">
                                            {{ __("client_registration.close") }}
                                        </button>
                                        <button type="submit" class="btn btn-info text-uppercase btn-sm ">
                                            {{ __("client_registration.save_changes") }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- broadcast for parent group --}}
                    <div class="modal fade" id="sendBroadcastParent{{$client->id}}" aria-labelledby="sendBroadcastParent" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 pb-0">
                                    <h5 class="modal-title" id="sendBroadcastParent">
                                        Send a Broadcast
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('client.broadcast.send')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$client->id}}" name="group" id="group" class="form-control">
                                        <div class="form-group">
                                            <label for="">{{__('Broadcast Title')}}</label>
                                            <input type="text" required name="title" class="form-control @error('title') is-invalid @enderror"
                                             value="{{old('title')}}">
                                            @error('title')
                                            <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{__('Broadcast Message')}}</label>
                                            <textarea required name="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="5"
                                            >{{old('message')}}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 pt-0 pb-0">
                                        <button type="button" class="btn btn-light text-uppercase btn-sm "
                                                data-dismiss="modal">
                                            {{ __("client_registration.close") }}
                                        </button>
                                        <button type="submit" class="btn btn-info text-uppercase btn-sm ">
                                            {{ __("client_registration.save_changes") }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class=" mb-1 mb-md-0 w-100" style="background: #F8F8F8;">
                        <div class="custom-pagination d-flex justify-content-start ml-0 pl-0">
                            @include('partials.includes._pagination', ['paginator' => $groups])
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>

@endsection

@include('affiliates.includes.add_group_modal')
@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
<script src="{{asset('select2/js/select2.full.min.js')}}"></script>
    @livewireScripts
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');

            alert("Link copied to the clipboard!!");
        }
    </script>
@stop
