<div class="col-lg-9 my-5 mx-5">
    <div class="card shadow-none rounded border-0 mb-4">
        <!--begin::Body-->
        <div class="card-body">
            <div class="card shadow-none rounded border-0 mb-4">
                <ul class="nav nav-pills custom-navs  mt-5" id="myTab" role="tablist"
                    style="background-color: white;padding: 1.3rem;">


                    <!--Put Search-->

                    <li class="nav-item-tab">
                        <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'OpportunitiesEvents') }}"
                            id="OpportunitiesEvents-tab" style="margin-left: 70px;" data-toggle="tab"
                            wire:click="$set('tab','OpportunitiesEvents')" href="#all" role="tab"
                            aria-controls="home" aria-selected="true">{{ __('Opportunities & Events') }}
                        </a>
                    </li>

                    <li class="nav-item-tab ml-5">
                        <a class="nav-link rounded-0 text-info text-left pl-0 {{ getActiveClass($tab, 'RecentOpportunities') }}"
                            id="RecentOpportunities-tab" data-toggle="tab"
                            wire:click="$set('tab','RecentOpportunities')" href="#RecentOpportunities" role="tab"
                            aria-controls="profile" aria-selected="false">{{ __('Recent Opportunities') }}</a>
                    </li>


                </ul>

                <div class="tab-content" style="padding-top: 0px">

                    <div class="tab-pane {{ getActiveClass($tab, 'OpportunitiesEvents') }}" id="OpportunitiesEvents" role="tabpanel"
                        aria-labelledby="OpportunitiesEvents-tab" style="border: none">

                        @if ($tab == 'OpportunitiesEvents')
                            <livewire:v2.opportunities.opportunity-events />
                        @endif
                    </div>
                    <div class="tab-pane {{ getActiveClass($tab, 'RecentOpportunities') }}"
                        id="RecentOpportunities" role="tabpanel" aria-labelledby="profile-tab"
                        style="border: none">
                        @if ($tab == 'RecentOpportunities')
                            <livewire:v2.opportunities.recent-opportunities />
                        @endif
                    </div>





                </div>
            </div>

            <!--end::Body-->
        </div>




    </div>

</div>
