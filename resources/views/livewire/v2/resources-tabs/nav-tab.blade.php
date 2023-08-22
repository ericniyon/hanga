<div>
    @livewireStyles
    <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist" style="background-color: white;padding: 2px;">
        <!--Put Search-->

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'api') }}" id="home-tab" style="margin-left: 0px;" data-toggle="tab" wire:click="$set('tab','api')" href="#all" role="tab" aria-controls="home" aria-selected="true">{{ __('APIs') }}
            </a>
        </li>

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'msme') }}" id="profile-tab" data-toggle="tab"  wire:click="$set('tab','msme')" href="#msmes" role="tab" aria-controls="profile" aria-selected="false">{{ __('Business') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'iworker') }}" id="settings-tab" data-toggle="tab" wire:click="$set('tab','iworker')" href="#iworkers" role="tab" aria-controls="settings" aria-selected="false">{{ __('app.iWorkers') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'dp') }}" id="dp-tab" data-toggle="tab"  wire:click="$set('tab','dp')" href="#dp" role="tab" aria-controls="messages" aria-selected="false">
              {{ __('Web/Mobile apps') }}
            </a>
        </li>

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'opportunities') }}" id="opportunities-tab" data-toggle="tab" wire:click="$set('tab','opportunities')" href="#opportunities" role="tab" aria-controls="settings" aria-selected="false">
           {{ __('app.Opportunities') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'events') }}" data-toggle="tab"  wire:click="$set('tab','events')" href="#events_tab">
               {{ __('app.Events') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'discounts') }}" data-toggle="discounts_tab" wire:click="$set('tab','discounts')" href="#discounts_tab">
                    {{ __('app.Discount And Coupons') }}
            </a>
        </li>

    </ul>
    @livewireScripts
</div>
