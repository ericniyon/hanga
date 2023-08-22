<div class="">
    <style>
        .modal {
            /*From Right/Left */
        }

        .modal.drawer {
            display: flex !important;
            pointer-events: none;
        }

        .modal.drawer * {
            pointer-events: none;
        }

        .modal.drawer .modal-dialog {
            margin: 0px;
            display: flex;
            flex: auto;
            transform: translate(25%, 0);
        }

        .modal.drawer .modal-dialog .modal-content {
            border: none;
            border-radius: 0px;
        }

        .modal.drawer .modal-dialog .modal-content .modal-body {
            overflow: auto;
        }

        .modal.drawer.show {
            pointer-events: auto;
        }

        .modal.drawer.show * {
            pointer-events: auto;
        }

        .modal.drawer.show .modal-dialog {
            transform: translate(0, 0);
        }

        .modal.drawer.right-align {
            flex-direction: row-reverse;
        }

        .modal.drawer.left-align:not(.show) .modal-dialog {
            transform: translate(-25%, 0);
        }

        .button-switch {
            font-size: .7em;
            height: 1.875em;
            margin-bottom: 0.625em;
            position: relative;
            width: 4.5em;
            color: #fff
        }

        .button-switch .lbl-off,
        .button-switch .lbl-on {
            cursor: pointer;
            display: block;
            font-size: 0.9em;
            font-weight: bold;
            line-height: 1em;
            position: absolute;
            top: 0.5em;
            transition: opacity 0.25s ease-out 0.1s;
            text-transform: uppercase;
        }

        .button-switch .lbl-off {
            right: 0.4375em;
        }

        .button-switch .lbl-on {
            color: #fefefe;
            opacity: 0;
            left: 0.4375em;
        }

        .button-switch .switch {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            height: 0;
            font-size: 1em;
            left: 0;
            line-height: 0;
            outline: none;
            position: absolute;
            top: 0;
            width: 0;
        }

        .button-switch .switch:before,
        .button-switch .switch:after {
            content: "";
            font-size: 1em;
            position: absolute;
        }

        .button-switch .switch:before {
            border-radius: 1.25em;
            background: #bdc3c7;
            height: 1.875em;
            left: -0.25em;
            top: -0.1875em;
            transition: background-color 0.25s ease-out 0.1s;
            width: 4.5em;
        }

        .button-switch .switch:after {
            box-shadow: 0 0.0625em 0.375em 0 #666;
            border-radius: 50%;
            background: #fefefe;
            height: 1.5em;
            transform: translate(0, 0);
            transition: transform 0.25s ease-out 0.1s;
            width: 1.5em;
        }

        .button-switch .switch:checked:after {
            transform: translate(2.5em, 0);
        }

        .button-switch .switch:checked~.lbl-off {
            opacity: 0;
        }

        .button-switch .switch:checked~.lbl-on {
            opacity: 1;
        }

        .button-switch .switch#switch-orange:checked:before {
            background: #e67e22;
        }

        .button-switch .switch#switch-blue:checked:before {
            background: #3498db;
        }
    </style>
    @if ($preview)

    @php
        $plan_name = '';
        $plan_price = 0;
        $plan_id = 0;
        $packege_promotion = '';
    @endphp

        <div class="accordion accordion-light accordion-light-borderless " id="accordion33">
            <div class="accordion accordion-light accordion-light-borderless " id="accordion33">
                <div class="card bg-light-light shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 " data-toggle="" data-target="#collapse33" aria-expanded="false"
                            style="background: #FFEDDD">
                            <div class="card-label pl-4">

                                <span style="color: #2A337E; font-weight: bold; font-size: 10px" class="p-4">

                                    Membership Overview
                                </span><br>
                                <span style="color: #2A337E; font-weight: bold; font-size: 14px" class="p-4">

                                    {{ $packege->packege_name }}<br>
                                </span>
                                @foreach (App\Models\Plan::where('id', $MemberPlan)->get() as $plan)
                                    <span style="color: #2A337E; font-weight: bold; font-size: 18px" class="p-4">

                                        {{ $plan->name }} : @if ($promotion_rate == 0)
                                                            Free
                                                            @else

                                                            RWF {{ (int)$plan->price * ($promotion_rate / 100)}}/ YEAR
                                                            @endif
                                        <br>


                                    </span>
                                    @php
                                        $this->plan_name = $plan->name;
                                        $this->plan_price = (int)$plan->price;
                                        $this->plan_id = $plan->id;
                                    @endphp
                                @endforeach

                            </div>

                            <div class="flex mt-5 mb-5">

                                <a type="button" class="rounded-full py-3 px-10" data-toggle="modal"
                                    data-target="#exampleModalRight"
                                    style="background: #F5841F;color:#fff;border-radius: 50px">
                                    Subscribe
                                </a>
                                <br>
                                <br>
                                <span>Expire a 12th May 2023 </span>
                                input
                                <div class="button-switch my-2">
                                    <input type="checkbox" id="switch-orange" class="switch" />
                                    <label for="switch-orange" class="lbl-off">Off</label>
                                    <label for="switch-orange" class="lbl-on">On</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion33" style="">
                        <div class="card-body p-2 bg-white ">

                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <table class="table  table-border"
                                            style="width: 100% !important">
                                            <thead style="background: #F2F6FE">
                                                <tr>
                                                    <th class="">Features</th>
                                                    <th> {{ $this->plan_name }} <br> RWF {{ $this->plan_price }}/ YEAR
                                                    {{-- @forelse (App\Models\Plan::all() as $plan)
                                                        </th>
                                                    @empty
                                                    @endforelse --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse (App\Models\PlanFeatures::all() as $features)
                                                {{-- @dump($features->plan_id) --}}
                                                @if (in_array($this->plan_name, $features->plan_id))

                                                <tr>
                                                    <td>{!! $features->name !!} </td>
                                                    <td></td>
                                                </tr>
                                                @else

                                                @endif
                                                @empty
                                                @endforelse

                                            </tbody>


                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>



        @if (App\Models\ClusterAssociationCategory::where('membership_packeges_id',$packege->id)->count() > 0)

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion14">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion14">
                <div class="card  shadow-sm rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse14"
                            aria-expanded="false">
                            <div class="card-label pl-4">

                                <span
                                    style="color: #2A337E; font-weight: bold; font-size: 18px; text-transform: lowercase"
                                    class="p-4">

                                    ICT CHAMBER CLUSTERS & ASSOCIATIONS
                                </span>

                            </div>
                            <button class="px-8 text-white font-bold py-1"
                                style="background: #2A337E; border-radius: 50px;">
                                Change
                            </button>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion14" style="">
                        <div class="card-body p-2 bg-white ">
                            <div class="p-2">

                                <div class="row">
                                    @forelse (App\Models\ClusterAssociationCategory::where('membership_packeges_id',$packege->id)->get() as $cluster )

                                        <div class="col-md-6">

                                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                id="accordion-{{ $cluster->id }}" style="background: #fff">
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
                                                                        fill="currentColor" class="bi bi-graph-up-arrow"
                                                                        viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                                                    </svg>
                                                                </span>

                                                                {{ $cluster->title }}

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div id="" class=""
                                                        data-parent="#accordion-{{ $cluster->id }}" style="">
                                                        <div class="card-body p-2 " style="background: #F7F7F7">
                                                            <div class="p-2">
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


                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
        @endif



        @if (App\Models\StrategicOriantation::where('membership_packeges_id', $packege->id)->count() > 0)

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion29">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion29">
                <div class="card  shadow-sm rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse29"
                            aria-expanded="false">
                            <div class="card-label pl-4">

                                <span
                                    style="color: #2A337E; font-weight: bold; font-size: 18px; text-transform: lowercase"
                                    class="p-4">

                                    ICT CHAMBER PROGRAMS, PROJECTS & STRATEGIC ORIENTATION
                                </span>

                            </div>
                            <button class="px-8 text-white font-bold py-1"
                                style="background: #2A337E; border-radius: 50px;">
                                Change
                            </button>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion29" style="">
                        <div class="card-body p-2 bg-white ">
                            <div class="p-2">

                                <div class="row">
                                    @forelse (App\Models\StrategicOriantation::where('membership_packeges_id', $packege->id)->get() as $item)
                                        <div class="col-md-4">

                                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                id="accordion-{{ $item->id }}">

                                                <div
                                                    class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                    <div class="card-header"
                                                        style="background: {{ $oriantaion_background_colors[array_rand($oriantaion_background_colors)] }};border-radius: 10px 10px 0 0">
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
        @endif



        @if (App\Models\ServiceBenefit::where('membership_packeges_id', $packege->id)->count() > 0)

        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion30">
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion30">
                <div class="card  shadow-none rounded-1  my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse30"
                            aria-expanded="false">
                            <div class="card-label pl-4">

                                <span
                                    style="color: #2A337E; font-weight: bold; font-size: 18px;text-transform: lowercase"
                                    class="p-4">

                                    MEMBERSHIP SERVICES & BENEFITS
                                </span>

                            </div>
                            <button class="px-8 text-white font-bold py-1"
                                style="background: #2A337E; border-radius: 50px;">
                                Change
                            </button>
                        </div>
                    </div>
                    <div id="" class="" data-parent="#accordion30" style="">
                        <div class="card-body p-2 bg-white ">
                            <div class="p-2">
                                <div class="row">
                                    <div class="tab-content container-fluid">
                                        <div class="tab-pane active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row my-5">

                                                @forelse (App\Models\ServiceBenefit::where('membership_packeges_id', $packege->id)->get() as $___item)
                                                    <div class="col-md-4">
                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $benefit_background_colors[array_rand($benefit_background_colors)] }};border-radius: 10px 10px 0 0">
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
                                            </div>


                                        </div>






                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
        @endif


        @livewire('payment-modal', ['packege' => $packege, 'plan_price' => $this->plan_price])
        @livewire('pay', ['packege' => $packege, 'plan_price' => $this->plan_price])
        @livewire('second-payment-modal', ['packege' => $packege, 'plan_price' => $this->plan_price])
    @else
        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion12">
            <div class="card  shadow-none rounded-1 p-4 my-2 border overflow-hidden" style="background: #FFEDDD">
                <div class="card-header">
                    <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse3"
                        aria-expanded="false">
                        <div class="card-label pl-4">
                            <span style="color: #2A337E; font-weight: bold; font-size: 18px">

                                {{ $packege->packege_name }}
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
                <div id="" class="" data-parent="#accordion12" style="">
                    <div class="card-body p-2 " style="background: #FFEDDD">
                        <div class="p-2">
                            <div class="checkbox-list">
                                <p
                                    style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                    {!! $packege->packege_description !!}


                                </p>


                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>



        @if (App\Models\ClusterAssociationCategory::where('membership_packeges_id', $packege->id)->count() > 0)
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
                                    @forelse (App\Models\ClusterAssociationCategory::where('membership_packeges_id', $packege->id)->get() as $cluster)
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
        @endif


        @if (App\Models\StrategicOriantation::where('membership_packeges_id', $packege->id)->count() > 0)
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
                                    @forelse (App\Models\StrategicOriantation::where('membership_packeges_id', $packege->id)->get() as $item)
                                        <div class="col-md-4">

                                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                id="accordion-{{ $item->id }}">

                                                <div
                                                    class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                    <div class="card-header"
                                                        style="background: {{ $oriantaion_background_colors[array_rand($oriantaion_background_colors)] }};border-radius: 10px 10px 0 0">
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

        @endif



        @if (App\Models\ServiceBenefit::where('membership_packeges_id', $packege->id)->count() > 0)
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
                            <div class="p-2">


                                <div class="row">
                                    <div class="tab-content container-fluid">
                                        <div class="tab-pane active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <div class="row my-5">

                                                @forelse (App\Models\ServiceBenefit::where('membership_packeges_id', $packege->id)->get() as $___item)
                                                    <div class="col-md-4">

                                                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                            id="accordion-{{ $___item->id }}">

                                                            <div
                                                                class="card bg-light-light shadow-none rounded-0 my-2  overflow-hidden">
                                                                <div class="card-header"
                                                                    style="background: {{ $benefit_background_colors[array_rand($benefit_background_colors)] }};border-radius: 10px 10px 0 0">
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
                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
        @endif


        @if (App\Models\PlanFeatures::where('membership_packeges_id', $packege->id)->count() > 0)
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
                                <p class="p-4">About membership level.</p>

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
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <table class="table  table-border"
                                            >
                                            <thead style="background: #F2F6FE">
                                                <tr>
                                                    <th class="">DETAILS</th>
                                                    @forelse (App\Models\Plan::all() as $plan)
                                                        <th> {{ $plan->name }} <br>
                                                            @if ($promotion_rate == 0)
                                                            Free
                                                            @else

                                                            RWF {{ (int)$plan->price * ($promotion_rate / 100)}}/ YEAR
                                                            @endif
                                                        </th>
                                                    @empty
                                                    @endforelse
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse (App\Models\PlanFeatures::where('membership_packeges_id', $packege->id)->orderBy('id','ASC')->get() as $features)


                                                <tr>
                                                        <td>{!! $features->name !!} </td>

                                                        <td>
                                                            @forelse ($features->plan_id as $__item)
                                                                @if ($__item == 'IGNITION')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" style="color: #121B65"
                                                                        height="20" fill="currentColor"
                                                                        class="bi bi-check-circle-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                    </svg>
                                                                @endif


                                                            @empty
                                                            @endforelse


                                                        </td>


                                                        <td>

                                                            @forelse ($features->plan_id as $__item)
                                                                @if ($__item == 'ACCELERATOR')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" style="color: #121B65"
                                                                        height="20" fill="currentColor"
                                                                        class="bi bi-check-circle-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                    </svg>
                                                                @endif


                                                            @empty
                                                            @endforelse

                                                        </td>


                                                        <td>
                                                            @forelse ($features->plan_id as $__item)
                                                                @if ($__item == 'TAKEOFF')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" style="color: #121B65"
                                                                        height="20" fill="currentColor"
                                                                        class="bi bi-check-circle-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                    </svg>
                                                                @endif


                                                            @empty
                                                            @endforelse

                                                        </td>

                                                        <td>
                                                            @forelse ($features->plan_id as $__item)
                                                                @if ($__item == 'CRUISE')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" style="color: #121B65"
                                                                        height="20" fill="currentColor"
                                                                        class="bi bi-check-circle-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                    </svg>
                                                                @endif


                                                            @empty
                                                            @endforelse

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
                                                                <input

                                                                type="radio" style="display: none"
                                                                    wire:model="MemberPlan"
                                                                    value="{{ $plan->id }}"
                                                                    class="btn btn-primary  rounded btn-sm mambershipBTN"
                                                                    id="btn-check-outlined-{{ $plan->id }}"
                                                                    autocomplete="off" wire:click='changePreview'>

                                                                <label onclick="window.scrollTo(0, 0);" class="btn btn-outline-primary mambershipBTN"
                                                                    style="background: {{ $bg }};border: 1px solid #2A337E; padding:6px; color: #2A337E"
                                                                    for="btn-check-outlined-{{ $plan->id }}">

                                                                    Subscribe
                                                                </label>

                                                                <br>



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
        @else
        <p class="text-danger text-lg">You won't subscribe on packege without plans !!!</p>
        @endif
    @endif


</div>
