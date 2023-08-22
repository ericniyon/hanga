<div class="min-h-450px">

    <!-- Nav tabs -->
<ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist" style="padding: 5px;">
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

        <!--Put Search-->

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 " style="margin-left: 70px;color:navy"  href="{{ route('client.advocacy.complains') }}">{{ __('Advocacy & Complaints') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'services') }}" id="profile-tab" data-toggle="tab"  wire:click="$set('tab','services')" href="#services" role="tab" aria-controls="profile" aria-selected="false">{{ __('Services') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'resources') }}" id="settings-tab" data-toggle="tab" wire:click="$set('tab','resources')" href="#resources" role="tab" aria-controls="settings" aria-selected="false">{{ __('Resources') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'news') }}" id="news" data-toggle="tab"  wire:click="$set('tab','news')" href="#news" role="tab" aria-controls="messages" aria-selected="false">
              {{ __('News') }}
            </a>
        </li>

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'connection') }}" id="connection" data-toggle="tab" wire:click="$set('tab','connection')" href="#connection" role="tab" aria-controls="settings" aria-selected="false">
           {{ __('Connections') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'notifications') }}" data-toggle="tab"  wire:click="$set('tab','notifications')" href="#notifications">
               {{ __('Notifications') }}
            </a>
        </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content py-4">
        <livewire:v2.advocacy-complains.tabs.tracker/>

    </div>



    @include('partials.includes._loading')

</div>
