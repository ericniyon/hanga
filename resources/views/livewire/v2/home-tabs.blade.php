<div class="min-h-450px">
    <!-- Nav tabs -->
    <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist">

    </ul>
    <!-- Tab panes -->
    <div class="tab-content py-4">
        <div class="tab-pane {{ getActiveClass($tab, 'dsp') }}" id="all" role="tabpanel" aria-labelledby="home-tab">

            @if ($tab == 'dsp')
                <livewire:v2.home-tabs.dsp-tab />
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab, 'msme') }}" id="msmes" role="tabpanel"
            aria-labelledby="profile-tab">
            @if ($tab == 'msme')
                <livewire:v2.home-tabs.msme-tab />
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab, 'dp') }}" id="dp" role="tabpanel" aria-labelledby="dp-tab">
            @if ($tab == 'dp')
                <livewire:v2.home-tabs.digital-platforms-tab />
            @endif
        </div>


        <div class="tab-pane {{ getActiveClass($tab, 'opportunities') }}" id="opportunities" role="tabpanel">
            @if ($tab == 'opportunities')
                <livewire:v2.home-tabs.opportunities-tab />
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab, 'events') }}" id="events_tab" role="tabpanel"
            aria-labelledby="reviews-tab">
            @if ($tab == 'events')
                <livewire:v2.home-tabs.events-tab />
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab, 'comparison') }}" id="comparison_tab" role="tabpanel"
            aria-labelledby="comparison">
            @if ($tab == 'comparison')
                <livewire:v2.home-tabs.comparison />
            @endif
        </div>
    </div>

    @include('partials.includes._loading')

</div>
