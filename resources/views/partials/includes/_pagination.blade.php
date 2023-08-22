<div class="row justify-content-between align-items-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            {{__('app.Showing')}} {{ $paginator->firstItem() }} {{ __('app.to') }} {{ $paginator->lastItem() }} {{ __('app.of') }} {{ $paginator->total() }} {{ __('app.entries') }}
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-center">
            {{ $paginator->onEachSide(1)->links() }}
        </div>
    </div>
</div>
