@if(in_array(optional($application)->status,[\App\Models\ApplicationBaseModel::RETURN_BACK,\App\Models\ApplicationBaseModel::REJECTED]))
    @if($history)
        <div
            class="alert alert-custom alert-{{ $history->status==\App\Models\ApplicationBaseModel::REJECTED?'danger':'secondary'  }} fade show rounded-sm py-2"
            role="alert">
            <div class="alert-icon">
                @include('partials._alert_info_icon')
            </div>
            <div class="alert-text">{{ $history->external_comment }}</div>
        </div>
    @endif
@endif
