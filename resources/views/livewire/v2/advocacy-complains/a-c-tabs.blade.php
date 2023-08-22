<div class="min-h-450px">

    <!-- Nav tabs -->
<ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist" style="background-color: white;padding: 5px;">
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

        {{-- <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 " style="margin-left: 70px;"  href="{{ route('client.advocacy.complains') }}">{{ __('Advocacy & Complaints') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'services') }}" id="profile-tab" data-toggle="tab"  wire:click="$set('tab','services')" href="#services" role="tab" aria-controls="profile" aria-selected="false">{{ __('Services') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 " id="settings-tab"  href="{{ route('client.resources') }}"  aria-selected="false">{{ __('Resources') }}</a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0" id="news"  href="{{ route('client.news') }}" aria-selected="false">
              {{ __('News') }}
            </a>
        </li>

        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0" id="connection" href="{{ route('client.my.networks') }}" aria-selected="false">
           {{ __('Connections') }}
            </a>
        </li>
        <li class="nav-item-tab">
            <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'notifications') }}" data-toggle="tab"  wire:click="$set('tab','notifications')" href="#notifications">
               {{ __('Notifications') }}
            </a>
        </li> --}}

    </ul>
    <!-- Tab panes -->
    <div class="tab-content py-4">
        <livewire:v2.advocacy-complains.tabs.home/>

        <div class="tab-pane {{ getActiveClass($tab,'services') }}" id="services" role="tabpanel"
             aria-labelledby="profile-tab">
            @if($tab == 'services')
            <livewire:v2.advocacy-complains.tabs.services/>

            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab,'resources') }}" id="resources" role="tabpanel"
             aria-labelledby="settings-tab">
            @if($tab == 'resources')
            <livewire:v2.advocacy-complains.tabs.resources/>

            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab,'news') }}" id="news" role="tabpanel" aria-labelledby="dp-tab">
            @if($tab == 'news')
            <livewire:v2.advocacy-complains.tabs.news/>

            @endif
        </div>


        <div class="tab-pane {{ getActiveClass($tab,'connection') }}" id="connection" role="tabpanel">
            @if($tab == 'connection')
                <livewire:v2.advocacy-complains.tabs.connections/>
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab,'notifications') }}" id="notifications" role="tabpanel"
             aria-labelledby="reviews-tab">
            @if($tab == 'notifications')
                <livewire:v2.advocacy-complains.tabs.notifications/>
            @endif
        </div>

    </div>



    @include('partials.includes._loading')

</div>
