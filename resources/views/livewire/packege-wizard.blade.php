<div>
    <style>
        .display-none {
            display: none;
        }

        .multi-wizard-step p {
            margin-top: 12px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            position: relative;
            width: 100%;
        }

        .multi-wizard-step button[disabled] {
            filter: alpha(opacity=100) !important;
            opacity: 1 !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            content: " ";
            width: 100%;
            height: 1px;
            z-order: 0;
            position: absolute;
            background-color: #fefefe;
        }

        .multi-wizard-step {
            text-align: center;
            position: relative;
            display: table-cell;
        }
    </style>


    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }} disabled">1</a>
                <p class="{{ $currentStep != 1 ? '' : 'text-primary' }}">Membership</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }} disabled">2</a>
                <p class="{{ $currentStep != 2 ? '' : 'text-primary' }}">CLUSTERS & ASSOCIATIONS</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button" class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }} disabled"
                    disabled="disabled">3</a>
                <p class="{{ $currentStep != 3 ? '' : 'text-primary' }}">STRATEGIC ORIENTATION</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-4" type="button" class="btn {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }} disabled"
                    disabled="disabled">4</a>
                <p class="{{ $currentStep != 4 ? '' : 'text-primary' }}">SERVICES & BENEFITS
                </p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-5" type="button" class="btn {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }} disabled"
                    disabled="disabled">5</a>
                <p class="{{ $currentStep != 5 ? '' : 'text-primary' }}">LEVELS AND FEES SERVICES</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-6" type="button" class="btn {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }} disabled"
                    disabled="disabled">6</a>
                <p class="{{ $currentStep != 6 ? '' : 'text-primary' }}">Preview</p>
            </div>
        </div>
    </div>


    <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin: form-->
                        <form action="{{ route('admin.what.is.ictchamber.save') }}" method="POST" id="WebinarForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mx-auto px-20 mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pname">
                                            Packege Name
                                        </label>
                                        <input id="pname" wire:model.defer='packege_name' class="form-control" required>{{
                                        old('packege_name') }}</input>
                                        @error('packege_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <label for="pname">
                                            Long Description
                                        </label>
                                        <textarea  id="packege_description" wire:model="packege_description"
                                            class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"
                                            required>{{ old('packege_description') }}</textarea>
                                            @error('packege_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto px-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" wire:click='firstStepSubmit'
                                            class="btn btn-primary "><span class="la la-check-circle-o"></span>
                                            <span wire:loading.remove>Continue</span>
                                            <span wire:loading>Sending....</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end: form-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>






    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">

        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin: form-->
                        <form action="{{ route('admin.what.is.ictchamber.save') }}" method="POST" id="WebinarForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mx-auto px-20 mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                            Title</label>
                                        <input class="form-control  @error('cluster_title') is-invalid @enderror"
                                            wire:model="cluster_title"  type="text" required>
                                        @error('cluster_title')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <label class="col-form-label" for="clusterDescription"><span>*</span> Short Description</label> <br>
                                        <textarea wire:model="clusterDescription" id="clusterDescription" class="form-control" cols="3" rows="6"
                                            class=" @error('clusterDescription') is-invalid @enderror"></textarea>
                                    </div>
                                </div>



                            </div>


                            <h4 style="margin-left: 5.5rem">Assocition Items</h4>
                            <div class=" add-input" style="margin-left: 5.5rem">
                                @foreach($clusterItemsLoop as $index=>$item)
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Name</label>
                                        <input type="text" value="clusterItemsLoop[{{$index}}][name]"
                                            name="clusterItemsLoop[{{$index}}][name]"
                                            wire:model.lazy="clusterItemsLoop.{{$index}}.name"
                                            class="form-control @error('clusterItemsLoop.'.$index.'name') is-invalid @enderror"
                                            required>
                                        @error('clusterItemsLoop.'.$index.'name')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-1 pt-3 d-flex justify-content-end align-items-center">
                                        <button class="btn btn-outline-none text-success p-2 mr-2"
                                            wire:click.prevent="addNewRow">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button class="btn btn-outline-none p-2 text-danger"
                                            wire:click.prevent="removeRow({{$index}})" {{$index==0?'disabled':''}}>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="row mx-auto px-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" wire:click='secondStepSubmit'
                                            class="btn btn-primary "><span class="la la-check-circle-o"></span>
                                            <span wire:loading.remove>Continue</span>
                                            <span wire:loading>Sending....</span>
                                        </button>
                                        <button class="btn btn-default nextBtn btn-md pull-right" type="button"
                                            wire:click="back(1)">Back</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end: form-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>






    </div>


    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="oriantationTitle" class="col-form-label pt-0"><span>*</span>
                                        Title</label>
                                    <input class="form-control  @error('oriantationTitle') is-invalid @enderror" wire:model="oriantationTitle"
                                        type="text" id="oriantationTitle" required>
                                    @error('oriantationTitle')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="oriantationColor" class="col-form-label pt-0"><span>*</span>
                                        Color</label>
                                    <input class="form-control  @error('oriantationColor') is-invalid @enderror" wire:model="oriantationColor"
                                        id="oriantationColor" type="text" required>
                                    @error('oriantationColor')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>



                            </div>
                        </div>
                        <div class="col-md-5 border-left">
                            <div class="form-group" wire:ignore>
                                <label class="col-form-label"><span>*</span> Short Description</label> <br>
                                <textarea id="oriantationDescription" wire:model="oriantationDescription" class="form-control" cols="3" rows="6"
                                    class=" @error('oriantationDescription') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Strategic Oriantation Items</h4>
                    <div class=" add-input">
                        @foreach($oriantationItemsLoop as $index=>$item)
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name</label>
                                <input type="text" value="itemsLoop[{{$index}}][name]"
                                    name="oriantationItemsLoop[{{$index}}][name]" wire:model.lazy="oriantationItemsLoop.{{$index}}.name"
                                    class="form-control @error('oriantationItemsLoop.'.$index.'name') is-invalid @enderror"
                                    required>
                                @error('oriantationItemsLoop.'.$index.'name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-1 pt-3 d-flex justify-content-end align-items-center">
                                <button class="btn btn-outline-none text-success p-2 mr-2"
                                    wire:click.prevent="addNewRow">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="btn btn-outline-none p-2 text-danger"
                                    wire:click.prevent="removeRow({{$index}})" {{$index==0?'disabled':''}}>
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" wire:click="thirdStepSubmit"
                                class="btn btn-success btn-sm">Continue</button>
                            <button class="btn btn-default nextBtn btn-sm pull-right" type="button"
                                wire:click="back(2)">Back</button>
                        </div>
                    </div>

                </form>
                <!--end: form-->
            </div>
        </div>
    </div>


    <div class="row setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" id="step-4">
        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="benefitTitle" class="col-form-label pt-0"><span>*</span>
                                        Title</label>
                                    <input class="form-control  @error('benefitTitle') is-invalid @enderror" wire:model="benefitTitle"
                                        id="benefitTitle" type="text" required>
                                    @error('benefitTitle')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    @php
                                        $array1 = ['Desk', 'Table', 'Chair'];

                                        $randomed1 = Arr::random($array1);
                                    @endphp
                                    <label for="benefitColor" class="col-form-label pt-0"><span>*</span>
                                        Color</label>
                                    <input class="form-control  @error('benefitColor') is-invalid @enderror" wire:model="benefitColor"
                                        id="benefitColor" type="text" required>
                                    @error('benefitColor')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="benefitCategory" class="col-form-label pt-0"><span>*</span>
                                        Category</label>
                                    <select class="form-control  @error('benefitCategory') is-invalid @enderror"
                                        wire:model="benefitCategory" id="benefitCategory" >
                                        <option value="Student">Student</option>
                                        <option value="Innovators">Innovators</option>
                                        <option value="Startups">Startups</option>
                                        <option value="ICT SME">ICT SME</option>
                                        <option value="Corporate">Corporate</option>
                                        <option value="ICT Consultant">ICT Consultant</option>
                                        <option value="iWorkers">iWorkers</option>
                                        <option value="ICT Community & Partners">ICT Community & Partners</option>
                                    </select>
                                    @error('benefitCategory')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>



                            </div>
                        </div>
                        <div class="col-md-5 border-left">
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span> Short Description</label> <br>
                                <textarea wire:model="benefitDescription" class="form-control" cols="3" rows="6"
                                    class=" @error('benefitDescription') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Service Benefits Items</h4>
                    <div class=" add-input">
                        @foreach($benefitItemsLoop as $index=>$item)
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name</label>
                                <input type="text" value="benefitItemsLoop[{{$index}}][name]"
                                    name="benefitItemsLoop[{{$index}}][name]" wire:model.lazy="benefitItemsLoop.{{$index}}.name"
                                    class="form-control @error('benefitItemsLoop.'.$index.'name') is-invalid @enderror"
                                    required>
                                @error('benefitItemsLoop.'.$index.'name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-1 pt-3 d-flex justify-content-end align-items-center">
                                <button class="btn btn-outline-none text-success p-2 mr-2"
                                    wire:click.prevent="addNewRow">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="btn btn-outline-none p-2 text-danger"
                                    wire:click.prevent="removeRow({{$index}})" {{$index==0?'disabled':''}}>
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" wire:click="fourthStepSubmit"
                                class="btn btn-success btn-sm">
                            <span wire:loading.remove>Continue</span>
                                            <span wire:loading>Sending....</span>
                            </button>
                            <button class="btn btn-default nextBtn btn-sm pull-right" type="button"
                                wire:click="back(3)">Back</button>
                        </div>
                    </div>

                </form>
                <!--end: form-->
            </div>
        </div>
    </div>



    <div class="row setup-content {{ $currentStep != 5 ? 'display-none' : '' }}" id="step-5">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap">
                    <div class="card-toolbar row w-100">
                        <!-- Button trigger modal-->
                        {{-- imfura start --}}
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addApiModal">
                            <span class="flaticon-add"></span>
                            New Plan
                        </button> --}}
                        @if($new_plan)
                        <form class="col-md-10" method="post" wire:submit.prevent="addPlan()">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Plan Name </label>
                                                <input type="text" id="name" wire:model="plan_name" class="form-control"
                                                    placeholder="Plan name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="price">Plan Price</label>
                                                <input type="text" id="price" wire:model="plan_price" class="form-control"
                                                    placeholder="Plan Price" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-5 pt-2">
                                    <button type="submit" class="btn btn-success">
                                        <span class="flaticon-add"></span>
                                        Save Plan
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="{{$new_plan == false?'col-md-12':'col-md-2'}} d-flex justify-content-end">
                            <button type="button" wire:click="isNewPaln" class="btn btn-primary">
                                <span class="flaticon-add"></span>
                                New Plan
                            </button>
                        </div>
                        {{-- imfura end --}}
                        <!-- Modal-->
                    </div>
                </div>
                <div class="card-body">
                    
                    <!--begin: form-->
                    <form action="{{ route('admin.membership_level.membership_level.save') }}" method="POST"
                        id="WebinarForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-auto px-20 mt-4">
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>

                                    <label for="title">
                                        Membership Feacture
                                    </label>
                                    <textarea id="levelFeeDescription" wire:model='levelFeeDescription' name="name" class="form-control"
                                        required>{{ old('levelFeeDescription') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto px-20 mt-4">
                            {{-- <div class="col-md-12"> --}}
                                @forelse (App\Models\Plan::all() as $plan)
                                <div class="col-md-3">
                                    <input type="checkbox" wire:model='plans' id="{{ $plan->name }}"
                                        value="{{ $plan->id }}">
                                        {{-- value="{{ $plan->name }}"> --}}
                                    <label for="{{ $plan->name }}">{{ $plan->name }}</label>
                                </div>
                                @empty
                                <p>No plan have been created yet</p>
                                @endforelse

                                {{--
                            </div> --}}
                        </div>
                        <div class="row mx-auto px-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" wire:click='fifthStepSubmit'>
                                        Continue</button>
                                    <button class="btn btn-default nextBtn btn-sm pull-right" type="button"
                                        wire:click="back(4)">Back</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end: form-->

                    {{-- model is here --}}

                </div>
            </div>


        </div>
    </div>


    <div class="row setup-content {{ $currentStep != 6 ? 'display-none' : '' }}" id="step-6">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label"></h3>
                    </div>

                </div>
                <div class="card-body">
                        <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">CLUSTERS & ASSOCIATIONS</span>
            </h3>
        </div>
        {{-- {{ $membership }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    {{-- @forelse ($clusters as $item) --}}

                    <tr>
                        <td>{{ $cluster_title }}</td>
                        <td>{!! $clusterDescription !!}</td>
                        <td>
                            <ul>

                                @forelse ($clusterItemsLoop as $key => $__item)

                                <li>
                                    @forelse ($__item as $item)
                                    {{ $item }}
                                    @empty

                                    @endforelse
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                    </tr>
                    {{-- @empty

                    @endforelse --}}
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ICT CHAMBER PROGRAMS, PROJECTS & STRATEGIC ORIENTATION</span>
            </h3>
        </div>
        {{-- {{ $membership }} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                   <tr>
                        <td>{{ $oriantationTitle }}</td>
                        <td>{!! $oriantationDescription !!}</td>
                        <td>
                            <ul>

                                @forelse ($oriantationItemsLoop as $key => $_item)

                                <li>
                                    @forelse ($_item as $item)
                                    {{ $item }}
                                    @empty

                                    @endforelse
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>



    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">MEMBERSHIP SERVICES & BENEFITS</span>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{{ $benefitCategory }}</td>
                        <td>{{ $benefitTitle }}</td>
                        <td>{!! $benefitDescription !!}</td>
                        <td>
                            <ul>

                                @forelse ($benefitItemsLoop as $key => $items)

                                <li>
                                    @forelse ($items as $item)
                                    {{ $item }}
                                    @empty

                                    @endforelse
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>




    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">MEMBERSHIP LEVELS AND FEES SERVICES</span>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{!! $levelFeeDescription !!}</td>

                    </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
                </div>

<div class="card">
    <div class="card-body float-right">
        <button class="btn btn-md btn-primary" wire:click='submitForm'>Confirm</button>
        <button class="btn btn-md btn-info" wire:click="back(1)">Edit</button>
    </div>
</div>
            </div>


        </div>


<script>
$(document).ready(function() {
    $('#packege_description').summernote({
        height: 200,
        codemirror: {
            theme: 'monokai'
        },
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('packege_description', contents);
            }
        }
    });
    $('#clusterDescription').summernote({
        height: 200,
        codemirror: {
            theme: 'monokai'
        },
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('clusterDescription', contents);
            }
        }
    });
    $('#oriantationDescription').summernote({
        height: 200,
        codemirror: {
            theme: 'monokai'
        },
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('oriantationDescription', contents);
            }
        }
    });
    $('#levelFeeDescription').summernote({
        height: 200,
        codemirror: {
            theme: 'monokai'
        },
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('levelFeeDescription', contents);
            }
        }
    });
});
</script>

    </div>
