<div class="list-group-item list-group-item-action">
    <div class="d-flex d-sm-block d-xl-flex w-100 justify-content-between align-items-center">
        <div>
            <h6 class="mb-1">{{ $item->requester->name }}</h6>
            <p class="mb-1 small text-muted">{{ $item->requester->registrationType->name }}</p>
        </div>
        <div class="">
            <x-view-connection-request-button :item="$item" class="mt-4" />
        </div>
    </div>
</div>
