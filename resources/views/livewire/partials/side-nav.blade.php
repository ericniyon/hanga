<div class="card">
    <div class="card-body">
        @if (getClientFields() >= 90)
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion1">
                <div class="card bg-light-light shadow-none rounded my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title collapsed pr-3" data-toggle="collapse" aria-expanded="true"
                            aria-controls="collapseOne" data-target="#platforms_types_id">
                            <div class="card-label pl-4">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                        </path>
                                    </svg>
                                </span>
                                My Profile
                            </div>

                        </div>
                    </div>
                    <div id="platforms_types_id" class="collapse show" data-parent="#accordion">
                        <div class="card-body p-2 bg-white ">
                            <div class="checkbox-list">
                                <label class="" wire:key="dp_key_id1">
                                    <input type="radio" value="1" wire:model="selectedPlatformTypes">
                                    <a href="{{ route('client.profile') }}" class="active">Information</a>
                                    <span class="rounded-sm"></span>
                                </label>
                                <label class="" wire:key="dp_key_id2">
                                    <input type="radio" value="2" wire:model="selectedPlatformTypes">
                                    <a href="{{ route('client.company.edit.address') }}">
                                        Business Information
                                    </a>
                                    <span class="rounded-sm"></span>
                                </label>
                                <label class="" wire:key="dp_key_id3">
                                    <input type="radio" value="3" wire:model="selectedPlatformTypes">
                                    <a href="{{ route('client.company.edit.service-product') }}">

                                        Services & Products
                                    </a>
                                    <span class="rounded-sm"></span>
                                </label>
                                <label class="" wire:key="dp_key_id4">
                                    <input type="radio" value="4" wire:model="selectedPlatformTypes">
                                    <a href="{{ route('client.company.edit.interest') }}">
                                        Field of Interest
                                    </a>
                                    <span class="rounded-sm"></span>
                                </label>
                                <label class="" wire:key="dp_key_id4">
                                    <input type="radio" value="4" wire:model="selectedPlatformTypes">
                                    Settings
                                    <span class="rounded-sm"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (getClientFields() < 90)
            <a href="{{ route('client.dsp.application.form') }}" class="">
                <div
                    class="bg-light-light shadow-none rounded-xl my-2 p-5 d-flex justify-content-between align-items-start">
                    <h5 class="mb-0">
                        <span class="svg-icon">
                            @include('partials.icons._my_connections')

                        </span>
                        My Profile
                    </h5>

                </div>
            </a>
        @endif
        <a href="{{ route('client.my_membership') }}">
            <div
                class="bg-light-light shadow-none rounded-xl my-2 p-5 d-flex justify-content-between align-items-start hover:bg-blue-900">
                <h5 class="mb-0">
                    <span class="svg-icon">
                        @include('partials.icons._services')
                    </span>
                    My Memberships
                </h5>

            </div>
        </a>

        <a href="{{ route('client.my_advocacy') }}">
            <div
                class="bg-light-light shadow-none rounded-xl my-2 p-5 d-flex justify-content-between align-items-start">
                <h5 class="mb-0">
                    <span class="svg-icon">
                        @include('partials.icons._resources')
                    </span>
                    Track My Requests
                </h5>

            </div>
        </a>

        <a href="{{ route('client.my_services') }}">
            <div
                class="bg-light-light shadow-none rounded-xl my-2 p-5 d-flex justify-content-between align-items-start">
                <h5 class="mb-0">
                    <span class="svg-icon">
                        @include('partials.icons._resources')
                    </span>
                    My Services
                </h5>

            </div>
        </a>

        <a href="{{ route('client.my_opportunities') }}">
            <div
                class="bg-light-light shadow-none rounded-xl my-2 p-5 d-flex justify-content-between align-items-start hover:bg-blue-900">
                <h5 class="mb-0">
                    <span class="svg-icon">
                        @include('partials.icons._services')
                    </span>
                    Opportunities
                </h5>

            </div>
        </a>

    </div>
</div>
