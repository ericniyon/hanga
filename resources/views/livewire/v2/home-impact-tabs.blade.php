<div class="min-h-450px">

    <!-- Nav tabs -->
    <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist">
        <li class="nav-item d-none d-lg-flex w-md-200px">
            <span class="nav-link rounded-0 text-info text-left pl-0">
                  <span>
                      <span class="svg-icon mr-3">
                          @include('partials.icons._filter')
                        </span>
                        {{ __('app.Filter By') }}
                  </span>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'dp') }}" id="dp-tab"
               data-toggle="tab" wire:click="$set('tab','dp')"
               href="#dp"
               role="tab" aria-controls="messages" aria-selected="false">
                {{ __('Web/Mobile apps') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'dsp') }}" id="home-tab"
               data-toggle="tab" wire:click="$set('tab','dsp')"
               href="#all"
               role="tab" aria-controls="home" aria-selected="true">{{ __('Tech Business') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'msme') }}" id="profile-tab"
               data-toggle="tab" wire:click="$set('tab','msme')"
               href="#msmes"
               role="tab" aria-controls="profile" aria-selected="false">{{ __('Busines Directory') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'iworker') }}"
               id="settings-tab"
               data-toggle="tab" wire:click="$set('tab','iworker')"
               href="#iworkers"
               role="tab" aria-controls="settings" aria-selected="false">{{ __('app.iWorkers') }}</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'comparison') }}"
               data-toggle="tab" wire:click="$set('tab','comparison')"
               href="#comparison_tab">
                {{ __('Digital Finance') }}
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'events') }}"
               data-toggle="tab" wire:click="$set('tab','events')"
               href="#events_tab">
                {{ __('app.Events') }}
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'discounts') }}"
               data-toggle="tab" wire:click="$set('tab','discounts')"
               href="#discounts_tab">
                {{ __('Discounts') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'opportunities') }}"
               id="opportunities-tab"
               data-toggle="tab" wire:click="$set('tab','opportunities')"
               href="#opportunities"
               role="tab" aria-controls="settings" aria-selected="false">
                {{ __('app.Opportunities') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'news') }}"
               id="news-tab"
               data-toggle="tab" wire:click="$set('tab','news')"
               href="#news"
               role="tab" aria-controls="settings" aria-selected="false">
                {{ __('News') }}
            </a>
        </li>




    </ul>
    <!-- Tab panes -->
    <div class="tab-content py-4">
        <div class="tab-pane {{ getActiveClass($tab, 'dsp') }}" id="all" role="tabpanel"
            aria-labelledby="home-tab">

            @if ($tab == 'dsp')
                <livewire:v2.home-tabs.dsp-impact />
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab, 'msme') }}" id="msmes" role="tabpanel"
            aria-labelledby="profile-tab">
            @if ($tab == 'msme')
                <livewire:v2.home-tabs.msms-impact />
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab, 'iworker') }}" id="iworkers" role="tabpanel"
            aria-labelledby="settings-tab">
            @if ($tab == 'iworker')
                <livewire:v2.home-tabs.iworker-impact />
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab, 'dp') }}" id="dp" role="tabpanel" aria-labelledby="dp-tab">
            @if ($tab == 'dp')
                <livewire:v2.home-tabs.dp-impact />
            @endif
        </div>


        <div class="tab-pane {{ getActiveClass($tab, 'opportunities') }}" id="opportunities" role="tabpanel">
            @if ($tab == 'opportunities')
                <livewire:v2.home-tabs.opportunity-impact />
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab,'news') }}" id="news_tab" role="tabpanel"
             aria-labelledby="news">
            @if($tab == 'news')
            <livewire:v2.home-tabs.news />


            @endif
        </div>

    </div>



    @include('partials.includes._loading')

</div>
