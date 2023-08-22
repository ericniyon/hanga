<div class="card  shadow-sm border rounded overflow-hidden gutter-b">
    <div class="card-header bg-light-light border-bottom-0 overflow-hidden border-light-light rounded-0 d-flex flex-column flex-md-row p-0 align-items-center justify-content-between">
        <div class="bg-info text-primary h-50px d-flex align-items-center px-4 border-bottom border-bottom-primary tw-border-b-4  w-100 w-md-auto">
            <h4 class="mb-0">
                {{count($myConnections)}} {{ __("app.Connections") }}
            </h4>
        </div>
        <div class="input-group my-2 my-md-0 w-275px mr-md-3">
            <input type="text" class="form-control border-info border-2"
                   wire:model="connection" wire:model.debounce="connection"
                   placeholder="{{ __("auth.search") }}..."/>
            <div class="input-group-append">
                <button class="btn btn-info" type="button" id="button-addon2">
                    <span class="svg-icon">
                        @include('partials.icons._search_icon')
                </span>
                </button>
            </div>
        </div>
    </div>


    <div class="card-body px-3">

        <div class="list-group list-group-flush rounded-bottom">
            @forelse($myConnections as $item)
                <div class=" @if(!$loop->last) border-bottom border-bottom-light @endif py-2 my-3 mx-4">
                    <x-client-item :item="$item"/>
                </div>
            @empty
                <div class="alert alert-custom alert-light-warning p-5  rounded m-3">
                    <div class="alert-text">
                        {{ __("app.There are no connections available") }}
                    </div>
                </div>
            @endforelse
            {{$myConnections->links()}}
        </div>
    </div>
</div>
