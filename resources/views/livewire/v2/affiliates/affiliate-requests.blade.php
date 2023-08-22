<div>
    <div class="row affiliate-header w-100 d-flex justify-content-between align-items-center" style="padding: 0px;">
        <div class="card-title">Affiliates</div>
        <div style="height:100%;" class="mr-4 d-flex search-box">
            <input type="search" class="form-control" wire:model.debounce.400="search_query">
            <button type="submit" class="btn btn-info" wire:click="search()">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <div class="row mb-1 mb-md-0 w-100 pt-3" style="background: #F8F8F8; padding-right: 0px; padding-left:0px;">
        @forelse ($affiliators as $client)
        <div class="d-flex w-100 flex-column affiliates-container flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
            <div class="symbol symbol-80 symbol-light mr-5 symbol-circle d-none d-md-block align-self-center">
                <img src="{{ $client->profile_photo_url }}"
                        onerror="this.src='{{$client->defaultPhotoUrl}}'"
                        class="h-80px w-80px object-cover align-self-center"
                        alt="">
            </div>
            <div class="d-flex flex-column flex-grow-1 mx-2 name-container">
                <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                    {{$client->client_name?$client->client_name:$client->name}}
                    <button class="btn btn-sm">{{$client->type_name}}</button>
                </span>
                <div>
                    <span class="">
                        Freelancer - Sales Agent
                    </span>
                </div>

                <div class="d-flex flex-column">
                    <div class="d-flex">
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
            </div>
            <!--end::Title-->
            <div class="w-md-150px w-100 button-groups">
                <a href="{{ route('v2.client.details',['client'=>encryptId($client->id),'from'=>url()->current()]) }}" class=" btn-primary btn w-100">Visit</a>
            </div>
        </div>
        @empty
        <div class="d-flex w-100 mt-3 flex-column affiliates-container flex-md-row align-items-center mb-4 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
            <h6 class="text-primary text-center">No Request Yet!</h6>
        </div>
        @endforelse
    </div>
    <div class="row mb-1 mb-md-0 w-100" style="background: #F8F8F8;">
        <div class="custom-pagination d-flex justify-content-start ml-0 pl-0">
            @include('partials.includes._pagination', ['paginator' => $affiliators])
        </div>
    </div>
</div>
