 <form class="mb-5">
        @csrf
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion11">
            <div class="card  shadow-none rounded-1 p-4 my-2 border overflow-hidden" style="background: #FFEDDD">
                <div class="card-header">
                    <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse22"
                        aria-expanded="false">
                        <div class="card-label pl-4">
                            <span style="color: #2A337E; font-weight: bold; font-size: 18px">
                                What is the Rwanda ICT Chamber ?
                            </span>

                        </div>
                        <span class="svg-icon svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div id="" class="" data-parent="#accordion11" style="">
                    <div class="card-body p-2 "style="background: #FFEDDD">
                        <div class="p-2">
                            <div class="checkbox-list">
                                <p
                                    style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">
                                    @forelse (App\Models\WhatisICTChamber::all() as $item)
                                        {!! $item->what_is_the_rwanda_ict_chamber !!}
                                    @empty
                                    @endforelse

                                </p>


                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion12">
            <div class="card  shadow-none rounded-1 p-4 my-2 border overflow-hidden" style="background: #FFEDDD">
                <div class="card-header">
                    <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse3"
                        aria-expanded="false">
                        <div class="card-label pl-4">
                            <span style="color: #2A337E; font-weight: bold; font-size: 18px">

                                What is ICT Chamber Membership?
                                {{-- <p>{{ Request::segment(2) }}</p> --}}
                            </span>

                        </div>
                        <span class="svg-icon svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div id="" class="" data-parent="#accordion12" style="">
                    <div class="card-body p-2 " style="background: #FFEDDD">
                        <div class="p-2">
                            <div class="checkbox-list">
                                <p
                                    style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                    @forelse (App\Models\WhatisICTChamberMembership::all() as $item)
                                        {!! $item->what_is_ict_chamber_membership !!}
                                    @empty
                                    @endforelse

                                </p>


                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>


        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion14">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion14">
                <div class="card bg-light-light shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse14"
                            aria-expanded="false" style="background: #FFEDDD">
                            <div class="card-label pl-4">

                                <span style="color: #2A337E; font-weight: bold; font-size: 18px" class="p-4">

                                    ICT CHAMBER CLUSTERS & ASSOCIATIONS
                                </span>

                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion14" style="">
                        <div class="card-body p-2 bg-white ">
                            <div class="p-2">

                                <div class="row">
                                    @forelse ($clusters as $cluster)
                                        <div class="col-md-6">

                                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                id="accordion-{{ $cluster->id }}">
                                                <div
                                                    class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                                                    <div class="card-header">
                                                        <div class="card-title pr-3 collapsed" data-toggle="collapse"
                                                            data-target="#collapse-{{ $cluster->id }}"
                                                            aria-expanded="false">
                                                            <div class="card-label pl-4">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-graph-up-arrow"
                                                                        viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                    </svg>
                                                                </span>

                                                                {{ $cluster->title }}

                                                            </div>
                                                            <span class="svg-icon svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-filter" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div id="" class=""
                                                        data-parent="#accordion-{{ $cluster->id }}" style="">
                                                        <div class="card-body p-2 " style="background: #F7F7F7">
                                                            <div class="p-2">

                                                                <p>
                                                                    {!! $cluster->description !!}
                                                                </p>

                                                                <ul>


                                                                    @forelse (App\Models\AssociationItem::where('cluster_association_categories_id', $cluster->id)->get() as $_item)
                                                                        <li>
                                                                            <label class="checkbox checkbox-info">
                                                                                <input type="checkbox"
                                                                                    id="cluster_ids-{{ $_item->id }}"
                                                                                    value="{{ $_item->id }}"
                                                                                    wire:model.defer="clustreItems"
                                                                                    class="check-services">
                                                                                {{ $_item->name }}
                                                                                <span class="rounded-sm"></span>
                                                                            </label>
                                                                        </li>
                                                                    @empty
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                    {{--  --}}

                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>





        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion29">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion29">
                <div class="card bg-light-light shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse29"
                            aria-expanded="false" style="background: #FFEDDD">
                            <div class="card-label pl-4">

                                <span style="color: #2A337E; font-weight: bold; font-size: 18px" class="p-4">

                                    ICT CHAMBER PROGRAMS, PROJECTS & STRATEGIC ORIENTATION
                                </span>

                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion29" style="">
                        <div class="card-body p-2 bg-white ">
                            <p>
                                The ICT Chamber works with partners to design projects and
                                interventions that help member companies as well as serve the
                                broader Rwandan community in achieving its mission of a
                                competitive digital economy.
                            </p>
                            <div class="p-2">

                                <div class="row">
                                    @forelse (App\Models\StrategicOriantation::all() as $item)
                                        <div class="col-md-4">

                                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                id="accordion-{{ $item->id }}">

                                                <div
                                                    class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                    <div class="card-header"
                                                        style="background: {{ $item->color }};border-radius: 10px 10px 0 0">
                                                        <div class="card-title pr-3 collapsed" data-toggle="collapse"
                                                            data-target="#collapse-{{ $item->id }}"
                                                            aria-expanded="false">
                                                            <div class="card-label pl-4" style="display: flex; ">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-graph-up-arrow"
                                                                        viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                    </svg>
                                                                </span>

                                                                <span style="font-weight: bold; font-size: 14px"
                                                                    class="ml-5">{{ $item->title }}</span>

                                                            </div>

                                                            </span>
                                                        </div>
                                                        <p style="margin-left: 1rem !important">{!! $item->description !!}
                                                        </p>
                                                    </div>
                                                    <div id="" class=""
                                                        data-parent="#accordion-{{ $item->id }}" style="">
                                                        <div class="card-body p-2 bg-white "
                                                            style="border: none !important">
                                                            <div class="p-2">

                                                                <ul>
                                                                    @forelse (App\Models\OriantationItem::where('strategic_oriantation_id',$item->id)->get() as $__item)
                                                                        <li>
                                                                            <label class="checkbox checkbox-info">
                                                                                <input type="checkbox"
                                                                                    id="oriantation_ids{{ $__item->id }}"
                                                                                    value="{{ $__item->id }}"
                                                                                    wire:model="StrategicOriantation"
                                                                                    class="check-services">
                                                                                {{ $__item->name }}
                                                                                <span class="rounded-sm"></span>
                                                                            </label>
                                                                        </li>
                                                                    @empty
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    @empty

                                    @endforelse


                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion30">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion30">
                <div class="card bg-light-light shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse30"
                            aria-expanded="false" style="background: #FFEDDD">
                            <div class="card-label pl-4">

                                <span style="color: #2A337E; font-weight: bold; font-size: 18px" class="p-4">

                                    MEMBERSHIP SERVICES & BENEFITS
                                </span>

                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion30" style="">
                        <div class="card-body p-2 bg-white ">
                            <p>
                                Why Should I Join the ICT Chamber as a Full Member?
                            </p>
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>Please select category that describe you or your
                                            organization</p>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="nav nav-pills custom-navs justify-content-between border-bottom border-bottom-light"
                                            id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold active"
                                                    id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">
                                                    Student
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    id="messages-tab" data-toggle="tab" href="#messages"
                                                    role="tab" aria-controls="messages" aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">Innovstor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    data-toggle="tab" href="#representative_details" role="tab"
                                                    aria-controls="messages" aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">Startup</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    id="settings-tab" data-toggle="tab" href="#settings"
                                                    role="tab" aria-controls="settings" aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">
                                                    ICT SME & Corporate
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    id="services-tab" data-toggle="tab" href="#services"
                                                    role="tab" aria-controls="settings" aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">
                                                    ICt Consultant
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    id="reviews-tab" data-toggle="tab" href="#reviews"
                                                    role="tab" aria-controls="settings" aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">
                                                    iWorkers

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="listyles nav-link rounded-0 text-dark-75 font-weight-bold"
                                                    id="CommunityParters-tab" data-toggle="tab"
                                                    href="#CommunityParters" role="tab" aria-controls="settings"
                                                    aria-selected="false"
                                                    style="padding: .4rem !important;color:black; border-bottom:none; border-radius: 20px!important">
                                                    ICT Community & Partners

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="tab-content container-fluid">
                                        <div class="tab-pane active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="radio" value="Undergraduate"
                                                                    wire:model.lazy="StudentBenefitSubCategory"
                                                                    class="check-services">
                                                                Undergraduate
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="radio" value="Postgraduate"
                                                                    wire:model.lazy="StudentBenefitSubCategory"
                                                                    class="check-services">
                                                                Postgraduate
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <select id="countries" style="padding: .3rem"
                                                                wire:model.lazy="StudentBenefitUniversity"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option>Choose a school/university</option>
                                                                @foreach ($universities as $university)

                                                                <option value="University of Rwanda">{{ $university }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row my-5">

                                                @forelse (App\Models\ServiceBenefit::where('category', 'Stundent')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="" class=""
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse


                                                {{-- </div> --}}
                                            </div>


                                        </div>
                                        <div class="tab-pane py-4" id="messages" role="tabpanel"
                                            aria-labelledby="messages-tab">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Idea Stage"
                                                                    wire:model.lazy="InnovatorInvesterSubCategory"
                                                                    class="check-services">
                                                                Idea Stage
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Prototype Stage"
                                                                    wire:model.lazy="InnovatorInvesterSubCategory"
                                                                    class="check-services">
                                                                Prototype Stage
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox"
                                                                    value="Markket Validation Stage"
                                                                    wire:model.lazy="InnovatorInvesterSubCategory"
                                                                    class="check-services">
                                                                Markket Validation Stage
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @forelse (App\Models\ServiceBenefit::where('category', 'Innovester')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="collapse-{{ $___item->id }}"
                                                                    class="collapse"
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="representative_details" role="tabpanel"
                                            aria-labelledby="representative_details">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox"
                                                                    value="Lifestyle Business  Startup"
                                                                    wire:model.lazy="StartupsBenefitSubCategory"
                                                                    class="check-services">
                                                                Lifestyle Business Startup
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Early Growth Startup"
                                                                    wire:model.lazy="StartupsBenefitSubCategory"
                                                                    class="check-services">
                                                                Early Growth Startup
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="High Growth Startup"
                                                                    wire:model.lazy="StartupsBenefitSubCategory"
                                                                    class="check-services">
                                                                High Growth Startup
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row my-4">
                                                @forelse (App\Models\ServiceBenefit::where('category', 'Startups')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="collapse-{{ $___item->id }}"
                                                                    class="collapse"
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>



                                        </div>
                                        <div class="tab-pane py-4" id="settings" role="tabpanel"
                                            aria-labelledby="settings-tab">
                                            <div class="my-4">
                                                @forelse (App\Models\ServiceBenefit::where('category', 'ICT MSM & Corporate')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="collapse-{{ $___item->id }}" class=""
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>

                                        </div>
                                        <div class="tab-pane py-4" id="services" role="tabpanel"
                                            aria-labelledby="services-tab">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Policy & Strategy "
                                                                    wire:model.lazy="ICTCOnsoltantSubCategory"
                                                                    class="check-services">
                                                                Policy & Strategy
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Software Development"
                                                                    wire:model.lazy="ICTCOnsoltantSubCategory"
                                                                    class="check-services">
                                                                Software Development
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="ICT Integrations"
                                                                    wire:model.lazy="ICTCOnsoltantSubCategory"
                                                                    class="check-services">
                                                                ICT Integrations <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>



                                                    </ul>
                                                </div>
                                            </div>
                                            @forelse (App\Models\ServiceBenefit::where('category', 'ICT Consoltant')->get() as $___item)
                                                <div class="col-md-4">

                                                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                        id="accordion-{{ $___item->id }}">

                                                        <div
                                                            class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                            <div class="card-header"
                                                                style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                <div class="card-title pr-3 collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse-{{ $___item->id }}"
                                                                    aria-expanded="false">
                                                                    <div class="card-label pl-4"
                                                                        style="display: flex; ">
                                                                        <span class="svg-icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor"
                                                                                class="bi bi-graph-up-arrow"
                                                                                viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                            </svg>
                                                                        </span>

                                                                        <span
                                                                            style="font-weight: bold; font-size: 14px"
                                                                            class="ml-5">{{ $___item->title }}</span>

                                                                    </div>

                                                                    </span>
                                                                </div>
                                                                <p class="m-2">{!! $___item->description !!}</p>
                                                            </div>
                                                            <div id="collapse-{{ $___item->id }}" class="collapse"
                                                                data-parent="#accordion-{{ $___item->id }}"
                                                                style="">
                                                                <div class="card-body p-2 bg-white "
                                                                    style="border: none !important">
                                                                    <div class="p-2">

                                                                        <ul>
                                                                            @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse

                                        </div>
                                        <div class="tab-pane py-4 " id="reviews" role="tabpanel"
                                            aria-labelledby="reviews-tab">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Digital Ambassador"
                                                                    wire:model.lazy="iWorkerSubCategory"
                                                                    class="check-services">
                                                                Digital Ambassador
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Digital Services Agent"
                                                                    wire:model.lazy="iWorkerSubCategory"
                                                                    class="check-services">
                                                                Digital Services Agent
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Freelancer"
                                                                    wire:model.lazy="iWorkerSubCategory"
                                                                    class="check-services">
                                                                Freelancer
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Gig Worker "
                                                                    wire:model.lazy="iWorkerSubCategory"
                                                                    class="check-services">
                                                                Gig Worker
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @forelse (App\Models\ServiceBenefit::where('category', 'iWorkers')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="collapse-{{ $___item->id }}"
                                                                    class="collapse"
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>

                                            <!-- Livewire Component wire-end:IvdSmnDdkewCKK2GKBLd -->
                                        </div>
                                        <div class="tab-pane py-4 " id="CommunityParters" role="tabpanel"
                                            aria-labelledby="CommunityParters-tab">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p>Please choose one sub-category </p>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="nav nav-pills custom-navs justify-content-around border-bottom-light"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Academia"
                                                                    wire:model.lazy="ICTCommunitySubCategory"
                                                                    class="check-services">
                                                                Academia
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Government Agency"
                                                                    wire:model.lazy="ICTCommunitySubCategory"
                                                                    class="check-services">
                                                                Government Agency
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Foundation"
                                                                    wire:model.lazy="ICTCommunitySubCategory"
                                                                    class="check-services">
                                                                Foundation
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Development  Partner"
                                                                    wire:model.lazy="ICTCommunitySubCategory"
                                                                    class="check-services">
                                                                Development Partner
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>
                                                        <li class="nav-item">
                                                            <label class="checkbox checkbox-info"
                                                                wire:key="service_key_id1">
                                                                <input type="checkbox" value="Private Company"
                                                                    wire:model.lazy="ICTCommunitySubCategory"
                                                                    class="check-services">
                                                                Private Company
                                                                <span class="rounded-sm"></span>
                                                            </label>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @forelse (App\Models\ServiceBenefit::where('category', 'ICT Community & Partners')->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $___item->color }};border-radius: 10px 10px 0 0">
                                                                    <div class="card-title pr-3 collapsed"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse-{{ $___item->id }}"
                                                                        aria-expanded="false">
                                                                        <div class="card-label pl-4"
                                                                            style="display: flex; ">
                                                                            <span class="svg-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-graph-up-arrow"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                                </svg>
                                                                            </span>

                                                                            <span
                                                                                style="font-weight: bold; font-size: 14px"
                                                                                class="ml-5">{{ $___item->title }}</span>

                                                                        </div>

                                                                        </span>
                                                                    </div>
                                                                    <p class="m-2">{!! $___item->description !!}</p>
                                                                </div>
                                                                <div id="collapse-{{ $___item->id }}"
                                                                    class="collapse"
                                                                    data-parent="#accordion-{{ $___item->id }}"
                                                                    style="">
                                                                    <div class="card-body p-2 bg-white "
                                                                        style="border: none !important">
                                                                        <div class="p-2">

                                                                            <ul>
                                                                                @forelse (App\Models\BenefitItem::where('service_benefit_id',$___item->id)->get() as $iitem)
                                                                                    <li>
                                                                                        <label
                                                                                            class="checkbox checkbox-info">
                                                                                            <input type="checkbox"
                                                                                                id="{{ $___item->id }}benefit_ids-{{ $iitem->id }}"
                                                                                                value="{{ $iitem->id }}"
                                                                                                wire:model.defer="StudentServiceBenefits"
                                                                                                class="check-services">
                                                                                            {{ $iitem->name }}
                                                                                            <span
                                                                                                class="rounded-sm"></span>
                                                                                        </label>
                                                                                    </li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>

                                            <!-- Livewire Component wire-end:IvdSmnDdkewCKK2GKBLd -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion33">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion33">
                <div class="card bg-light-light shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 " data-toggle="" data-target="#collapse33" aria-expanded="false"
                            style="background: #FFEDDD">
                            <div class="card-label pl-4">

                                <span style="color: #2A337E; font-weight: bold; font-size: 10px" class="p-4">

                                    How Much Are Membership Fees ?
                                </span><br>
                                <span style="color: #2A337E; font-weight: bold; font-size: 18px" class="p-4">

                                    MEMBERSHIP LEVELS AND FEES SERVICES <br>
                                </span>
                                <p>About membership level.</p>

                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion33" style="">
                        <div class="card-body p-2 bg-white ">

                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-responsive table-border"
                                            style="width: 100% !important">
                                            <thead style="background: #F2F6FE">
                                                <tr>
                                                    <th class="">DETAILS</th>
                                                    @forelse (App\Models\Plan::all() as $plan)
                                                        <th> {{ $plan->name }} <br> RWF {{ $plan->price }}/ YEAR
                                                        </th>
                                                    @empty
                                                    @endforelse
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse (App\Models\PlanFeatures::orderBy('id','ASC')->get() as $features)
                                                    <tr>
                                                        <td>{!! $features->name !!} </td>

                                                        <td>
                                                            @forelse ($features->plan_id as $__item) @if ($__item == 'IGNITION')


                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="color: #121B65"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            @endif


                                                            @empty @endforelse


                                                        </td>


                                                        <td>

                                                            @forelse ($features->plan_id as $__item) @if ($__item == 'ACCELERATOR')


                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="color: #121B65"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            @endif


                                                            @empty @endforelse

                                                        </td>


                                                        <td>
                                                            @forelse ($features->plan_id as $__item) @if ($__item == 'TAKEOFF')


                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="color: #121B65"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            @endif


                                                            @empty @endforelse

                                                        </td>

                                                        <td>
                                                            @forelse ($features->plan_id as $__item) @if ($__item == 'CRUISE')


                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" style="color: #121B65"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            @endif


                                                            @empty @endforelse

                                                        </td>




                                                    </tr>
                                                @empty
                                                @endforelse
                                                <tr>
                                                    <td colspan="5"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                </tr>
                                            </tbody>

                                            <tfoot style="">
                                                <tr style="margin-top:20rem">
                                                    <td class="text">
                                                        <p>Select your plan</p>
                                                    </td>
                                                    @forelse (App\Models\Plan::all() as $plan)
                                                        <td>
                                                            <span>
                                                                <input type="radio" style="display: none"
                                                                    wire:model="MemberPlan" value="{{ $plan->id }}"
                                                                    class="btn btn-success  rounded btn-sm mambershipBTN"
                                                                    id="btn-check-outlined-{{ $plan->id }}" autocomplete="off">
                                                                <label class="btn btn-outline-primary mambershipBTN"
                                                                    style="background: {{ $bg }};border: 1px solid #2A337E; padding:6px; color: #2A337E"
                                                                    for="btn-check-outlined-{{ $plan->id }}">

                                                                    Subscribe
                                                                </label><br>



                                                            </span>

                                                        </td>
                                                    @empty
                                                    @endforelse
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

        <button type="submit" class="btn btn-success font-weight-bolder text-uppercase rounded btn-sm"
            wire:click.prevent='store'>
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <span wire:loading.remove>@lang('app.submit')</span>
            <span wire:loading>Saving ...</span>
        </button>

    </form>
