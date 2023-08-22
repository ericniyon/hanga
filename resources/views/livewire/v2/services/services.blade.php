
    <div class="col-lg-9 my-5">

                <div class="card shadow-none rounded border-0 mb-4">
                    <ul class="nav nav-pills custom-navs justify-content-around mt-5" id="myTab" role="tablist" style="background-color: white;padding: 1.3rem;">


            <!--Put Search-->

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'MyAdvocacy') }}" id="MyAdvocacy-tab" style="margin-left: 70px;" data-toggle="tab" wire:click="$set('tab','MyAdvocacy')" href="#all" role="tab" aria-controls="home" aria-selected="true">{{ __('My Advocacy') }}
                </a>
            </li>

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'AccesstoFinancialService') }}"

                id="AccesstoFinancialService-tab" data-toggle="tab"  wire:click="$set('tab','AccesstoFinancialService')" href="#AccesstoFinancialService" role="tab" aria-controls="profile" aria-selected="false">{{ __('Access to Financial Service') }}</a>
            </li>

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'AccesstoMarket') }}" id="AccesstoMarket-tab" data-toggle="tab"  wire:click="$set('tab','AccesstoMarket')" href="#AccesstoMarket" role="tab" aria-controls="messages" aria-selected="false">
                  {{ __('Access to Market') }}
                </a>
            </li>

            <li class="nav-item-tab">
                <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab,'CapacityBuiliding') }}" id="CapacityBuiliding-tab" data-toggle="tab" wire:click="$set('tab','CapacityBuiliding')" href="#CapacityBuiliding" role="tab" aria-controls="settings" aria-selected="false">
               {{ __('Capacity Builiding') }}
                </a>
            </li>
        </ul>
                    <!--begin::Body-->
                    <div class="tab-content" style="padding-top: 0px">

                <div class="tab-pane {{ getActiveClass($tab,'MyAdvocacy') }}" id="MyAdvocacy" role="tabpanel" aria-labelledby="MyAdvocacy-tab" style="border: none">

                    @if($tab == 'MyAdvocacy')
                        <livewire:v2.services.advocacy/>
                    @endif
                </div>
                <div class="tab-pane {{ getActiveClass($tab,'AccesstoFinancialService') }}" id="AccesstoFinancialService" role="tabpanel"
                     aria-labelledby="profile-tab" style="border: none">
                    @if($tab == 'AccesstoFinancialService')
                        <livewire:v2.services.access-to-finance/>
                    @endif
                </div>

                <div class="tab-pane {{ getActiveClass($tab,'AccesstoMarket') }}" id="AccesstoMarket" role="tabpanel"
                     aria-labelledby="settings-tab" style="border: none">
                    @if($tab == 'AccesstoMarket')
                        <livewire:v2.services.access-to-market/>
                    @endif
                </div>

                <div class="tab-pane {{ getActiveClass($tab,'CapacityBuiliding') }}" id="CapacityBuiliding" role="tabpanel" aria-labelledby="dp-tab" style="border: none">
                    @if($tab == 'CapacityBuiliding')
                        <livewire:v2.services.capacity-builiding/>
                    @endif
                </div>



            </div>

                    {{-- @include('partials/__memberships') --}}
                    <!--end::Body-->
                </div>




            </div>
