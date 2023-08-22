<div class="min-h-450px">
    <ul class="nav nav-pills custom-navs justify-content-between" id="myTab" role="tablist" style="background-color: white;padding: 2px;">
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
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'ICT_Laws') }}" id="ICT_Laws-tab" style="margin-left: 70px;" data-toggle="tab" wire:click="$set('tab','ICT_Laws')" href="#ICT_Laws" role="tab" aria-controls="home" aria-selected="true">{{ __('ICT Laws') }}
                </a>
            </li>

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'ICT_Policies') }}" id="ICT_Policies-tab" data-toggle="tab"  wire:click="$set('tab','ICT_Policies')" href="#ICT_Policies" role="tab" aria-controls="profile" aria-selected="false">{{ __('ICT Policies') }}</a>
            </li>
            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'ICT_Regulations') }}" id="ICT_Regulations-tab" data-toggle="tab" wire:click="$set('tab','ICT_Regulations')" href="#ICT_Regulations" role="tab" aria-controls="settings" aria-selected="false">{{ __('ICT Regulations') }}</a>
            </li>
            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'ICT_Strategies') }}" id="ICT_Strategies-tab" data-toggle="tab"  wire:click="$set('tab','ICT_Strategies')" href="#ICT_Strategies" role="tab" aria-controls="messages" aria-selected="false">
                  {{ __('ICT Strategies') }}
                </a>
            </li>

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'opportunities') }}" id="opportunities-tab" data-toggle="tab" wire:click="$set('tab','opportunities')" href="#opportunities" role="tab" aria-controls="settings" aria-selected="false">
               {{ __('Documentations') }}
                </a>
            </li>
            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'events') }}" data-toggle="tab"  wire:click="$set('tab','events')" href="#events_tab">
                   {{ __('Others') }}
                </a>
            </li>


        </ul>
    <!-- Nav tabs -->
    <div class="row" style="justify-content: right">

    <div class="col-lg-3 mt-5"
    x-data="{ open: true }">
   @include('partials.v2._filter_by_title')
   <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
        id="accordion1" style="margin-top: 2rem">
       <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
           <div class="card-header">
               <div class="card-title collapsed pr-3" data-toggle="collapse"
                    data-target="#collapse2">
                   <div class="card-label pl-4">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round"
                                           stroke-linejoin="round" stroke-width="2"
                                           d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                                   </svg>
                       </span>
                       {{ __('Categories')}}
                   </div>
                   <span class="svg-icon svg-icon-primary">
                       @include('partials.icons._sort')
                   </span>
               </div>
           </div>
           <div id="collapse2" class="collapse"
                data-parent="#accordion1">
               <div class="card-body p-2 bg-white">
                   <div class="checkbox-list">
                    @foreach ($categories as $item)
                    <div class=" shadow-none rounded  p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                        <label for="job_1" class="mb-0 h5">
                            {{ $item->title }}
                        </label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="1" wire:model="selectedResourcesCategory" id="job_1">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>
                    @endforeach
                   </div>
               </div>
           </div>
       </div>




   </div>
</div>

        <div class="col-md-9">
            <div class="tab-content" style="padding-top: 0px">

                <div class="tab-pane {{ getActiveClass($tab,'ICT_Laws') }}" id="ICT_Laws" role="tabpanel" aria-labelledby="ICT_Laws-tab" style="border: none">

                    @if($tab == 'ICT_Laws')
                        <livewire:v2.resources-tabs.api-tab/>
                    @endif
                </div>
                <div class="tab-pane {{ getActiveClass($tab,'ICT_Policies') }}" id="ICT_Policies" role="tabpanel"
                     aria-labelledby="ICT_Policies-tab" style="border: none">
                    @if($tab == 'ICT_Policies')
                        <livewire:v2.resources-tabs.tools-tab/>
                    @endif
                </div>

                <div class="tab-pane {{ getActiveClass($tab,'ICT_Regulations') }}" id="ICT_Regulations" role="tabpanel"
                     aria-labelledby="ICT_Regulations-tab" style="border: none">
                    @if($tab == 'ICT_Regulations')
                        <livewire:v2.resources-tabs.template-tab/>
                    @endif
                </div>

                <div class="tab-pane {{ getActiveClass($tab,'ICT_Strategies') }}" id="ICT_Strategies" role="tabpanel" aria-labelledby="ICT_Strategies-tab" style="border: none">
                    @if($tab == 'ICT_Strategies')
                        <livewire:v2.resources-tabs.plugnins-tab/>
                    @endif
                </div>


                <div class="tab-pane {{ getActiveClass($tab,'opportunities') }}" id="opportunities" role="tabpanel" style="border: none">
                    @if($tab == 'opportunities')
                        <livewire:v2.resources-tabs.documentation-tab/>
                    @endif
                </div>
                <div class="tab-pane {{ getActiveClass($tab,'events') }}" id="events_tab" role="tabpanel"
                     aria-labelledby="reviews-tab" style="border: none">
                    @if($tab == 'events')
                        <livewire:v2.resources-tabs.other-tab/>
                    @endif
                </div>

            </div>

        </div>


    </div>
    <!-- Tab panes -->
    {{-- <div class="tab-content py-4">

        <div class="tab-pane {{ getActiveClass($tab,'api') }}" id="api" role="tabpanel" aria-labelledby="home-tab" style="border: none">

            @if($tab == 'api')
                <livewire:v2.resources-tabs.api-tab/>
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab,'msme') }}" id="msmes" role="tabpanel"
             aria-labelledby="profile-tab" style="border: none">
            @if($tab == 'msme')
                <livewire:v2.home-tabs.msme-tab/>
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab,'iworker') }}" id="iworkers" role="tabpanel"
             aria-labelledby="settings-tab" style="border: none">
            @if($tab == 'iworker')
                <livewire:v2.home-tabs.iworker-tab/>
            @endif
        </div>

        <div class="tab-pane {{ getActiveClass($tab,'dp') }}" id="dp" role="tabpanel" aria-labelledby="dp-tab" style="border: none">
            @if($tab == 'dp')
                <livewire:v2.home-tabs.digital-platforms-tab/>
            @endif
        </div>


        <div class="tab-pane {{ getActiveClass($tab,'opportunities') }}" id="opportunities" role="tabpanel">
            @if($tab == 'opportunities')
                <livewire:v2.home-tabs.opportunities-tab/>
            @endif
        </div>
        <div class="tab-pane {{ getActiveClass($tab,'events') }}" id="events_tab" role="tabpanel"
             aria-labelledby="reviews-tab">
            @if($tab == 'events')
                <livewire:v2.home-tabs.events-tab/>
            @endif
        </div>

    </div> --}}



    @include('partials.includes._loading')

</div>
