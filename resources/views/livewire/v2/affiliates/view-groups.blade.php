<div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle w-100 p-3" id="accordion1">
    @forelse ($groups as $client)
    <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
        <div class="card-header">
            <div class="card">
                <div class="row mt-1">
                    <div class="col-md-2">
                        <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                            <img src="{{ $client->profile_photo_url }}" onerror="this.src='{{$client->defaultPhotoUrl}}'"
                                    class="h-80px w-80px object-cover align-self-center" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 name-container text-center justify-content-center">
                        <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                            {{$client->client_name}}
                            <span class="badge badge-pill badge-info py-1">{{$client->registrationType->name}}</span>
                        </span>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end mr-2">
                        <div class="d-flex flex-column">
                            @php
                                $average=round($client->ratings_avg_rating,1);
                            @endphp
                            <div>
                                <div class="d-flex">
                                    <span class="text-info h5 mr-2">Rate</span>
                                    <span
                                            class="font-weight-bolder text-dark">
                                        {{ $client->ratings_count }} {{ str_plural('Review',$client->ratings_count) }}
                                    </span>
                                </div>
                                <div class="d-flex">
                                    <span
                                            class="text-info h5 font-weight-bolder mr-2">{{ $average }}
                                    </span>

                                    @include('partials.includes._rating_starts')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end mt-4">
                        <a href="!#" title="View Group Member"><i class="fa fa-eye"></i></a>
                        <a href="!#" title="Send a Broadcast"><i class="fa fa-user"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}">
                <div class="card-label pl-4">
                    View Groups ({{$client->cohorts()->count()}})
                </div>
                <span class="svg-icon svg-icon-primary">
                    @include('partials.icons._sort')
                </span>
            </div>
        </div>
        <div id="collapse{{$loop->iteration}}" class="collapse" data-parent="#accordion{{$loop->iteration}}">
            <div class="card-body p-2 bg-white ">
                <div class="row">
                    @forelse (\App\Models\AffiliateCohort::whereClientId($client->id)->orderByDesc('created_at')->get() as $group)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-3">
                              <h3 class="card-title">{{$group->group_name}}</h3>
                              <p class="card-text">{{Str::limit($group->description,120)}}</p>
                              <div class="row">
                                <div class="col-md-4 text-success">Joins: </div>
                                <div class="col-md-2">
                                    @if($group->link()->exists())
                                    <p id="p1{{$group->id}}" class="d-none">{{$group->link->link}}</p>
                                    <a title="share link" onclick="copyToClipboard('#p1{{$group->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                        </svg>
                                    </a>
                                    @else
                                    <a title="Create new link" class="btn-outline" data-toggle="modal" data-target="#addNewGroup{{$group->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                        </svg>
                                    </a>
                                    @endif
                                </div>
                                {{-- <div class="col-md-2"></div> --}}
                                <div class="col-md-3">
                                    <a href="!#" title="View Group Member"><i class="fa fa-eye"></i></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="!#" title="Send a Broadcast"><i class="fa fa-user"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="modal fade" id="addNewGroup{{$group->id}}" aria-labelledby="addAggregator" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="addAggregator">
                                        Create New Invitation Link
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('client.invitations.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="group" value="{{$group->id}}" class="text">
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
    </div>
    @empty
    @endforelse
</div>
