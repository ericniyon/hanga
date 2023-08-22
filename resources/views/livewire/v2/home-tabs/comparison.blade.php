<style>
    img.logo-bank {
        object-fit: contain;
        height: 35px;
    }

    .card-footer {
        padding: 0 !important;
    }



    .check-btn {
        border: none !important;
        background: none !important;
    }

    .para {
        padding-right: 10.25rem !important;
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:hover, .nav-tabs .nav-link.active:focus{
        background-color:#fff;
        border-color: none
    }
    .nav-item:hover {

    }

    .compare li a {
        cursor: pointer !important;
        font-size: 1rem !important;
        margin: 0 !important;
        text-align: left !important;

    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        border-color: none;
        border-color: #fff;

    }
    #selectID{
        height:38px !important;
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="mb-4 col-md-3 mt-10">
            <div>
                <h4>Commercial banks</h4>
            </div>
            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle mt-5" id="accordion1">
                <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#iworker_filter2"
                            aria-expanded="false">
                            <div class="card-label pl-4">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11">
                                        </path>
                                    </svg>
                                </span>
                                Loans
                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="iworker_filter2" class="collapse" data-parent="#accordion1" style="">
                        <div class="card-body p-2 bg-white ">
                            <ul class="nav nav-tabs nav-justified custom-navs md-pills pills-primary d-flex flex-column compare"
                                id="v-pills-tab">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link rounded-0" data-toggle="pill" href="#worke" role="tab"
                                        aria-selected="true">iWorkers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="pill" href="#treasury"
                                        role="tab">Treasury
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="pill" href="#equipment"
                                        role="tab">Equipment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="pill" href="#digital"
                                        role="tab">Digital
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#other-loans"
                                        role="tab">Other</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#mortage"
                                        role="tab">Mortage
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#account">
                            <div class="card-label pl-4">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </span>
                                Accounts
                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="account" class="collapse " data-parent="#accordion1">
                        <div class="card-body p-2 bg-white ">
                            <ul class="nav custom-navs md-pills pills-primary d-flex flex-column">
                                <li class="nav-item">
                                    <a class="nav-link rouned-0" data-toggle="tab" href="#curr-account"
                                        role="tab">Current
                                        Accounts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#fixed-account"
                                        role="tab">Fixed
                                        Term
                                        Deposit Accounts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#saving-account"
                                        role="tab">Savings
                                        Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>



                <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#cards">
                            <div class="card-label pl-4">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5">
                                        </path>
                                    </svg>
                                </span>
                                Cards
                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="cards" class="collapse " data-parent="#accordion1">
                        <div class="card-body p-2 bg-white ">
                            <ul class="nav custom-navs md-pills pills-primary d-flex flex-column">
                                <li class="nav-item">
                                    <a class="nav-link rouned-0" data-toggle="tab" href="#credit-cards"
                                        role="tab">Credit Cards
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#debit-cards"
                                        role="tab">
                                        Debit Cards
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
{{-- e --}}

                <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                    <div class="card-header">
                        <div class="card-title collapsed pr-3" data-toggle="collapse" data-target="#ebanking">
                            <div class="card-label pl-4">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5">
                                        </path>
                                    </svg>
                                </span>
                                eBanking
                            </div>
                            <span class="svg-icon svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="ebanking" class="collapse " data-parent="#accordion1">
                        <div class="card-body p-2 bg-white ">
                            <ul class="nav custom-navs md-pills pills-primary d-flex flex-column">
                                {{-- <li class="nav-item">
                                    <a class="nav-link rouned-0" data-toggle="tab" href="#credit-cards"
                                        role="tab">Credit Cards
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#banking"
                                        role="tab">
                                        E-banking
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>




                {{-- e --}}

            </div>
        </div>
        <div class="col-md-9">
            {{-- <div class="d-flex justify-content-between align-items-center">
        </div> --}}
        <div class="col-md-12 " style="justify-content: center">
                @foreach(\App\Models\FeatureContent::where('tab','Digital Finance')->get() as $key=>$content)
                {!! $content->content !!}
                @endforeach
            </div>  
            <div class="tab-content mt-5" style="border: none; padding:0">
                <div class="tab-pane fade show active" id="worke" role="tabpanel"
                    aria-labelledby="v-pills-home-tab" style="border: none; padding:0">
                    <div class="flex" style="display: flex; justify-content: space-between">
                        <div class="">
                            <ul class="nav md-pills pills-primary">
                                <li class="nav-item-tab">
                                    <a class="nav-link rouned-0 active" data-toggle="tab" href="#individual"
                                        role="tab" style="font-weight: bold;line-height:1;">Individuals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate"
                                        role="tab" style="font-weight: bold;line-height:1;">Corporate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme"
                                        role="tab" style="font-weight: bold;line-height:1;">MSME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus"
                                        role=" tab" style="font-weight: bold;line-height:1;">Business
                                        Group /
                                        Community</a>
                                </li>
                            </ul>
                        </div>
                        <div style="display: flex">
                            {{-- <label for="paginate" class="text-nowrap mr-2 ml-2 mb-0 mt-2" style="text-align: center; ">Section</label>
                            <select class="form-control form-control-sm" wire:model="selectedSection" id="selectID">
                                <option value="" selected>Filter</option>

                                <option value="">Minimum Interest rate</option>
                            </select> --}}
                        </div>
                    </div>

                    <div class="tab-content" >

                        <div class="tab-pane fade show active" id="individual" role="tabpanel1" style="border: none; padding:0">
                            @foreach ($info as $key => $item)
                                @if ($item->application_type == 'Individual')
                                    <div class="card my-2 shadow">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                        alt="logo"></div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Maximum interest rate</strong></h5>
                                                    </div>
                                                    <div>
                                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_type }}</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_method }}</div>
                                                </div>
                                                <div>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ url($item->bank->website) }}"
                                                        target="_blank"><strong>
                                                            Get started</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                            <button
                                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2 font-bold"
                                                type="button" data-toggle="collapse"
                                                data-target="#test-{{ $item->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample" style="font-weight: bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                    <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                Check other details
                                            </button>
                                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                                aria-labelledby="heading-collapsed">
                                                <div class="card-body row">
                                                    <div class="col-md-12">
                                                        <table class="table w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Processing fee</th>
                                                                    <th>Charges</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Avarage application fee</td>
                                                                    <td>{{ $item->avg_application_fee }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Avarage administration fee</td>
                                                                    <td>{{ $item->avg_adm_fee }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Avarage commission fee</td>
                                                                    <td> {{ $item->avg_comm_fee }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Avarage insurance fee</td>
                                                                    <td>{{ $item->avg_insurance_fee }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Avarage other fees</td>
                                                                    <td>{{ $item->avg_other_charges }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="tab-pane fade show" id="panel-corporate" role="tabpanel1">
                            @foreach ($info as $key => $item)
                                @if ($item->application_type == 'Corporate')
                                    <div class="card my-2 shadow">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                        alt=""></div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Maximum interest rate</strong></h5>
                                                    </div>
                                                    <div>
                                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_type }}</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_method }}</div>
                                                </div>
                                                <div>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ url($item->bank->website) }}"
                                                        target="_blank"><strong>
                                                            Get started</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                            <button
                                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                                type="button" data-toggle="collapse"
                                                data-target="#test-{{ $item->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-chevron-down pull-right"></i>
                                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                                            </button>
                                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                                aria-labelledby="heading-collapsed">
                                                <div class="card-body row">
                                                    <div class="col">
                                                        <h6><strong>Processing fee & Charges</strong></h6>
                                                        <ul class="list-style-none list-group">
                                                            <li class="list-group-item">Avarage application fee:
                                                                {{ $item->avg_application_fee }}</li>
                                                            <li class="list-group-item">Avarage administration fee:
                                                                {{ $item->avg_adm_fee }}</li>
                                                            <li class="list-group-item">Avarage commission fee:
                                                                {{ $item->avg_comm_fee }}</li>
                                                            <li class="list-group-item">Avarage insurance fee:
                                                                {{ $item->avg_insurance_fee }}</li>
                                                            <li class="list-group-item">Avarage other fees:
                                                                {{ $item->avg_other_charges }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade in show" id="panel-msme" role="tabpanel1">
                            @foreach ($info as $key => $item)
                                @if ($item->application_type == 'MSME')
                                    <div class="card my-2 shadow">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                        alt=""></div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Maximum interest rate</strong></h5>
                                                    </div>
                                                    <div>
                                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_type }}</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_method }}</div>
                                                </div>
                                                <div>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ url($item->bank->website) }}"
                                                        target="_blank"><strong>
                                                            Get started</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                            <button
                                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                                type="button" data-toggle="collapse"
                                                data-target="#test-{{ $item->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-chevron-down pull-right"></i>
                                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                                            </button>
                                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                                aria-labelledby="heading-collapsed">
                                                <div class="card-body row">
                                                    <div class="col">
                                                        <h6><strong>Processing fee & Charges</strong></h6>
                                                        <ul class="list-style-none list-group">
                                                            <li class="list-group-item">Avarage application fee:
                                                                {{ $item->avg_application_fee }}</li>
                                                            <li class="list-group-item">Avarage administration fee:
                                                                {{ $item->avg_adm_fee }}</li>
                                                            <li class="list-group-item">Avarage commission fee:
                                                                {{ $item->avg_comm_fee }}</li>
                                                            <li class="list-group-item">Avarage insurance fee:
                                                                {{ $item->avg_insurance_fee }}</li>
                                                            <li class="list-group-item">Avarage other fees:
                                                                {{ $item->avg_other_charges }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade in show" id="panel-bus" role="tabpanel1">
                            @foreach ($info as $key => $item)
                                @if ($item->application_type == 'Business Group / Community')
                                    <div class="card my-2 shadow">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                        alt=""></div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Maximum interest rate</strong></h5>
                                                    </div>
                                                    <div>
                                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_type }}</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <h5><strong>Interest rate</strong></h5>
                                                    </div>
                                                    <div>{{ $item->interest_rate_method }}</div>
                                                </div>
                                                <div>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ url($item->bank->website) }}"
                                                        target="_blank"><strong>
                                                            Get started</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                            <button
                                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                                type="button" data-toggle="collapse"
                                                data-target="#test-{{ $item->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-chevron-down pull-right"></i>
                                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                                            </button>
                                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                                aria-labelledby="heading-collapsed">
                                                <div class="card-body row">
                                                    <div class="col">
                                                        <h6><strong>Processing fee & Charges</strong></h6>
                                                        <ul class="list-style-none list-group">
                                                            <li class="list-group-item">Avarage application fee:
                                                                {{ $item->avg_application_fee }}</li>
                                                            <li class="list-group-item">Avarage administration fee:
                                                                {{ $item->avg_adm_fee }}</li>
                                                            <li class="list-group-item">Avarage commission fee:
                                                                {{ $item->avg_comm_fee }}</li>
                                                            <li class="list-group-item">Avarage insurance fee:
                                                                {{ $item->avg_insurance_fee }}</li>
                                                            <li class="list-group-item">Avarage other fees:
                                                                {{ $item->avg_other_charges }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center py-9">
                                        <h1 class="text-muted display-1">No content</h1>
                                    </div>
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- treasury --}}

            <div class="tab-pane fade " id="treasury" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="">
                    <ul class="nav md-pills pills-primary">
                        <li class="nav-item-tab">
                            <a class="nav-link rouned-0 active" data-toggle="tab" href="#individual-tres"
                                role="tab">Individuals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-tres"
                                role="tab">Corporate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-tres"
                                role="tab">MSME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-tres"
                                role=" tab">Business
                                Group /
                                Community</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade in active show" id="individual-tres" role="tabpanel1">
                        @foreach ($treasury_info as $key => $item)
                            @if ($item->application_type == 'Individual')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade in show" id="panel-corporate-tres" role="tabpanel1">
                        @foreach ($treasury_info as $key => $item)
                            @if ($item->application_type == 'Corporate')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade in show" id="panel-msme-tres" role="tabpanel1">
                        @foreach ($treasury_info as $key => $item)
                            @if ($item->application_type == 'MSME')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade in show" id="panel-bus-tres" role="tabpanel1">
                        @foreach ($treasury_info as $key => $item)
                            @if ($item->application_type == 'Community')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            {{-- end treasury --}}
            {{-- equipment --}}
            <div class="tab-pane fade " id="equipment" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="">
                    <ul class="nav md-pills pills-primary">
                        <li class="nav-item-tab">
                            <a class="nav-link rouned-0 active" data-toggle="tab" href="#individual-equipment"
                                role="tab">Individuals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-equipment"
                                role="tab">Corporate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-equipment"
                                role="tab">MSME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-equipment"
                                role=" tab">Business
                                Group /
                                Community</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="individual-equipment" role="tabpanel1">
                        @foreach ($equipment_info as $key => $item)
                            @if ($item->application_type == 'Individual')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade show" id="panel-corporate-equipment" role="tabpanel1">
                        @foreach ($equipment_info as $key => $item)
                            @if ($item->application_type == 'Corporate')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade show" id="panel-msme-equipment" role="tabpanel1">
                        @foreach ($equipment_info as $key => $item)
                            @if ($item->application_type == 'MSME')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <a class="d-flex justify-content-center text-center py-2"
                                            data-bs-toggle="collapse" href="#test-{{ $item->id }}"
                                            role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check <i class="fa fa-chevron-down pull-right"></i>
                                        </a>



                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col left">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none">
                                                        <li>Avarage application fee:
                                                            {{ $item->avg_application_fee }}
                                                        </li>
                                                        <li>Avarage administration fee: {{ $item->avg_adm_fee }}
                                                        </li>
                                                        <li>Avarage commission fee: {{ $item->avg_comm_fee }}</li>
                                                        <li>Avarage insurance fee: {{ $item->avg_insurance_fee }}
                                                        </li>
                                                        <li>Avarage other fees: {{ $item->avg_other_charges }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade in show" id="panel-bus-equipment" role="tabpanel1">
                        @foreach ($equipment_info as $key => $item)
                            @if ($item->application_type == 'Community')
                                <div class="card my-2 shadow">
                                    <div class="card-header">

                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
            {{-- end equipment --}}

            <div class="tab-pane fade " id="digital" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="">
                    <ul class="nav md-pills pills-primary">
                        <li class="nav-item-tab">
                            <a class="nav-link rouned-0 active show" data-toggle="tab" href="#individual-digital"
                                role="tab">Individuals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-digital"
                                role="tab">Corporate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-digital"
                                role="tab">MSME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-digital"
                                role=" tab">Business
                                Group /
                                Community</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in show active" id="individual-digital" role="tabpanel1">
                        @foreach ($digital_info as $key => $item)
                            @if ($item->application_type == 'Individual')
                                <div class="card my-2 shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                    alt=""></div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Maximum interest rate</strong></h5>
                                                </div>
                                                <div>
                                                    {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_type }}</div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="my-3">
                                                    <h5><strong>Interest rate</strong></h5>
                                                </div>
                                                <div>{{ $item->interest_rate_method }}</div>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary"
                                                    href="{{ url($item->bank->website) }}"
                                                    target="_blank"><strong>
                                                        Get started</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <button
                                            class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                            type="button" data-toggle="collapse"
                                            data-target="#test-{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Check other details<i class="fa fa-chevron-down pull-right"></i>
                                        </button>
                                        <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                            aria-labelledby="heading-collapsed">
                                            <div class="card-body row">
                                                <div class="col">
                                                    <h6><strong>Processing fee & Charges</strong></h6>
                                                    <ul class="list-style-none list-group">
                                                        <li class="list-group-item">Avarage application fee:
                                                            {{ $item->avg_application_fee }}</li>
                                                        <li class="list-group-item">Avarage administration fee:
                                                            {{ $item->avg_adm_fee }}</li>
                                                        <li class="list-group-item">Avarage commission fee:
                                                            {{ $item->avg_comm_fee }}</li>
                                                        <li class="list-group-item">Avarage insurance fee:
                                                            {{ $item->avg_insurance_fee }}</li>
                                                        <li class="list-group-item">Avarage other fees:
                                                            {{ $item->avg_other_charges }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade in show" id="panel-corporate-digital" role="tabpanel1">
                        @foreach ($digital_info as $key => $item)
                            @if (property_exists($item->application_type, 'Corporate') == false)
                                <div class="d-flex justify-content-center align-items-center py-9">
                                    <h1 class="text-muted display-1">No content</h1>
                                </div>
                            @break
                        @endif
                        @if ($item->application_type == 'Corporate' && property_exists($item->application_type, 'Corporate') == false)
                            <div class="card my-2 shadow">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                alt=""></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Maximum interest rate</strong></h5>
                                            </div>
                                            <div>
                                                {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_type }}</div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_method }}</div>
                                        </div>
                                        <div>
                                            <a class="btn btn-outline-primary"
                                                href="{{ url($item->bank->website) }}"
                                                target="_blank"><strong>
                                                    Get started</strong></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button
                                        class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                        type="button" data-toggle="collapse"
                                        data-target="#test-{{ $item->id }}" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        Check other details<i class="fa fa-chevron-down pull-right"></i>
                                    </button>
                                    <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                        aria-labelledby="heading-collapsed">
                                        <div class="card-body row">
                                            <div class="col">
                                                <h6><strong>Processing fee & Charges</strong></h6>
                                                <ul class="list-style-none list-group">
                                                    <li class="list-group-item">Avarage application fee:
                                                        {{ $item->avg_application_fee }}</li>
                                                    <li class="list-group-item">Avarage administration fee:
                                                        {{ $item->avg_adm_fee }}</li>
                                                    <li class="list-group-item">Avarage commission fee:
                                                        {{ $item->avg_comm_fee }}</li>
                                                    <li class="list-group-item">Avarage insurance fee:
                                                        {{ $item->avg_insurance_fee }}</li>
                                                    <li class="list-group-item">Avarage other fees:
                                                        {{ $item->avg_other_charges }}</li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center py-9">
                                <h1 class="text-muted display-1">No content</h1>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade in show" id="panel-msme-digital" role="tabpanel1">
                    @foreach ($digital_info as $key => $item)
                        @if ($item->application_type == 'MSME')
                            <div class="card my-2 shadow">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                alt=""></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Maximum interest rate</strong></h5>
                                            </div>
                                            <div>
                                                {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_type }}</div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_method }}</div>
                                        </div>
                                        <div>
                                            <a class="btn btn-outline-primary"
                                                href="{{ url($item->bank->website) }}"
                                                target="_blank"><strong>
                                                    Get started</strong></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">

                                    <button
                                        class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                        type="button" data-toggle="collapse"
                                        data-target="#test-{{ $item->id }}" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        Check other details<i class="fa fa-chevron-down pull-right"></i>
                                    </button>
                                    <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                        aria-labelledby="heading-collapsed">
                                        <div class="card-body row">
                                            <div class="col">
                                                <h6><strong>Processing fee & Charges</strong></h6>
                                                <ul class="list-style-none list-group">
                                                    <li class="list-group-item">Avarage application fee:
                                                        {{ $item->avg_application_fee }}</li>
                                                    <li class="list-group-item">Avarage administration fee:
                                                        {{ $item->avg_adm_fee }}</li>
                                                    <li class="list-group-item">Avarage commission fee:
                                                        {{ $item->avg_comm_fee }}</li>
                                                    <li class="list-group-item">Avarage insurance fee:
                                                        {{ $item->avg_insurance_fee }}</li>
                                                    <li class="list-group-item">Avarage other fees:
                                                        {{ $item->avg_other_charges }}</li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade in show" id="panel-bus-digital" role="tabpanel1">
                    @foreach ($digital_info as $key => $item)
                        @if ($item->application_type == 'Business Group / Community')
                            <div class="card my-2 shadow">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                                alt=""></div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Maximum interest rate</strong></h5>
                                            </div>
                                            <div>
                                                {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_type }}</div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="my-3">
                                                <h5><strong>Interest rate</strong></h5>
                                            </div>
                                            <div>{{ $item->interest_rate_method }}</div>
                                        </div>
                                        <div>
                                            <a class="btn btn-outline-primary"
                                                href="{{ url($item->bank->website) }}"
                                                target="_blank"><strong>
                                                    Get started</strong></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">

                                    <button
                                        class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                        type="button" data-toggle="collapse"
                                        data-target="#test-{{ $item->id }}" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        Check other details<i class="fa fa-chevron-down pull-right"></i>
                                    </button>
                                    <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                        aria-labelledby="heading-collapsed">
                                        <div class="card-body row">
                                            <div class="col">
                                                <h6><strong>Processing fee & Charges</strong></h6>
                                                <ul class="list-style-none list-group">
                                                    <li class="list-group-item">Avarage application fee:
                                                        {{ $item->avg_application_fee }}</li>
                                                    <li class="list-group-item">Avarage administration fee:
                                                        {{ $item->avg_adm_fee }}</li>
                                                    <li class="list-group-item">Avarage commission fee:
                                                        {{ $item->avg_comm_fee }}</li>
                                                    <li class="list-group-item">Avarage insurance fee:
                                                        {{ $item->avg_insurance_fee }}</li>
                                                    <li class="list-group-item">Avarage other fees:
                                                        {{ $item->avg_other_charges }}</li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center py-9">
                                <h1 class="text-muted display-1">No content</h1>
                            </div>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="other-loans" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="">
            <ul class="nav md-pills pills-primary">
                <li class="nav-item-tab">
                    <a class="nav-link rouned-0 show active" data-toggle="tab" href="#individual-other"
                        role="tab">Individuals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-other"
                        role="tab">Corporate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-other"
                        role="tab">MSME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-other"
                        role=" tab">Business
                        Group /
                        Community</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade in show active" id="individual-other" role="tabpanel1">
                @foreach ($other_loan_info as $key => $item)
                    @if ($item->application_type == 'Individual')
                        <div class="card my-2 shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                            alt=""></div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Maximum interest rate</strong></h5>
                                        </div>
                                        <div>
                                            {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_type }}</div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_method }}</div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ url($item->bank->website) }}"
                                            target="_blank"><strong>
                                                Get started</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <button
                                    class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                    type="button" data-toggle="collapse"
                                    data-target="#test-{{ $item->id }}" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Check other details<i class="fa fa-chevron-down pull-right"></i>
                                </button>
                                <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                    aria-labelledby="heading-collapsed">
                                    <div class="card-body row">
                                        <div class="col">
                                            <h6><strong>Processing fee & Charges</strong></h6>
                                            <ul class="list-style-none list-group">
                                                <li class="list-group-item">Avarage application fee:
                                                    {{ $item->avg_application_fee }}</li>
                                                <li class="list-group-item">Avarage administration fee:
                                                    {{ $item->avg_adm_fee }}</li>
                                                <li class="list-group-item">Avarage commission fee:
                                                    {{ $item->avg_comm_fee }}</li>
                                                <li class="list-group-item">Avarage insurance fee:
                                                    {{ $item->avg_insurance_fee }}</li>
                                                <li class="list-group-item">Avarage other fees:
                                                    {{ $item->avg_other_charges }}</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade in show" id="panel-corporate-other" role="tabpanel1">
                @foreach ($other_loan_info as $key => $item)
                    @if ($item->application_type == 'Corporate')
                        <div class="card my-2 shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                            alt=""></div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Maximum interest rate</strong></h5>
                                        </div>
                                        <div>
                                            {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_type }}</div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_method }}</div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ url($item->bank->website) }}"
                                            target="_blank"><strong>
                                                Get started</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <button
                                    class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                    type="button" data-toggle="collapse"
                                    data-target="#test-{{ $item->id }}" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Check other details<i class="fa fa-chevron-down pull-right"></i>
                                </button>
                                <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                    aria-labelledby="heading-collapsed">
                                    <div class="card-body row">
                                        <div class="col">
                                            <h6><strong>Processing fee & Charges</strong></h6>
                                            <ul class="list-style-none list-group">
                                                <li class="list-group-item">Avarage application fee:
                                                    {{ $item->avg_application_fee }}</li>
                                                <li class="list-group-item">Avarage administration fee:
                                                    {{ $item->avg_adm_fee }}</li>
                                                <li class="list-group-item">Avarage commission fee:
                                                    {{ $item->avg_comm_fee }}</li>
                                                <li class="list-group-item">Avarage insurance fee:
                                                    {{ $item->avg_insurance_fee }}</li>
                                                <li class="list-group-item">Avarage other fees:
                                                    {{ $item->avg_other_charges }}</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade in show" id="panel-msme-other" role="tabpanel1">
                @foreach ($other_loan_info as $key => $item)
                    @if ($item->application_type == 'MSME')
                        <div class="card my-2 shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                            alt=""></div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Maximum interest rate</strong></h5>
                                        </div>
                                        <div>
                                            {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_type }}</div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_method }}</div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ url($item->bank->website) }}"
                                            target="_blank"><strong>
                                                Get started</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <button
                                    class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                    type="button" data-toggle="collapse"
                                    data-target="#test-{{ $item->id }}" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Check other details<i class="fa fa-chevron-down pull-right"></i>
                                </button>
                                <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                    aria-labelledby="heading-collapsed">
                                    <div class="card-body row">
                                        <div class="col">
                                            <h6><strong>Processing fee & Charges</strong></h6>
                                            <ul class="list-style-none list-group">
                                                <li class="list-group-item">Avarage application fee:
                                                    {{ $item->avg_application_fee }}</li>
                                                <li class="list-group-item">Avarage administration fee:
                                                    {{ $item->avg_adm_fee }}</li>
                                                <li class="list-group-item">Avarage commission fee:
                                                    {{ $item->avg_comm_fee }}</li>
                                                <li class="list-group-item">Avarage insurance fee:
                                                    {{ $item->avg_insurance_fee }}</li>
                                                <li class="list-group-item">Avarage other fees:
                                                    {{ $item->avg_other_charges }}</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade in show" id="panel-bus-other" role="tabpanel1">
                @foreach ($other_loan_info as $key => $item)
                    @if ($item->application_type == 'Business Group / Community')
                        <div class="card my-2 shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                            alt=""></div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Maximum interest rate</strong></h5>
                                        </div>
                                        <div>
                                            {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_type }}</div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="my-3">
                                            <h5><strong>Interest rate</strong></h5>
                                        </div>
                                        <div>{{ $item->interest_rate_method }}</div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ url($item->bank->website) }}"
                                            target="_blank"><strong>
                                                Get started</strong></a>
                                    </div>
                                </div>
                                </>
                                <div class="card-footer">

                                    <button
                                        class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                        type="button" data-toggle="collapse"
                                        data-target="#test-{{ $item->id }}" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        Check other details<i class="fa fa-chevron-down pull-right"></i>
                                    </button>
                                    <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                        aria-labelledby="heading-collapsed">
                                        <div class="card-body row">
                                            <div class="col">
                                                <h6><strong>Processing fee & Charges</strong></h6>
                                                <ul class="list-style-none list-group">
                                                    <li class="list-group-item">Avarage application fee:
                                                        {{ $item->avg_application_fee }}</li>
                                                    <li class="list-group-item">Avarage administration
                                                        fee:
                                                        {{ $item->avg_adm_fee }}</li>
                                                    <li class="list-group-item">Avarage commission fee:
                                                        {{ $item->avg_comm_fee }}</li>
                                                    <li class="list-group-item">Avarage insurance fee:
                                                        {{ $item->avg_insurance_fee }}</li>
                                                    <li class="list-group-item">Avarage other fees:
                                                        {{ $item->avg_other_charges }}</li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center py-9">
                                <h1 class="text-muted display-1">No content</h1>
                            </div>
                        @break
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="tab-pane fade " id="mortage" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="">
        <ul class="nav md-pills pills-primary">
            <li class="nav-item-tab">
                <a class="nav-link rouned-0 show active" data-toggle="tab"
                    href="#individual-mortage" role="tab">Individuals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-mortage"
                    role="tab">Corporate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-mortage"
                    role="tab">MSME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-mortage"
                    role=" tab">Business
                    Group /
                    Community</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in show active" id="individual-mortage" role="tabpanel1">
            @foreach ($mortage_loan as $key => $item)
                @if ($item->application_type == 'Individual')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                        alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Maximum interest rate</strong></h5>
                                    </div>
                                    <div>
                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_type }}</div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_method }}</div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ url($item->bank->website) }}"
                                        target="_blank"><strong> Get started</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>
                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="card-body row">
                                    <div class="col">
                                        <h6><strong>Processing fee & Charges</strong></h6>
                                        <ul class="list-style-none list-group">
                                            <li class="list-group-item">Avarage application fee:
                                                {{ $item->avg_application_fee }}</li>
                                            <li class="list-group-item">Avarage administration fee:
                                                {{ $item->avg_adm_fee }}</li>
                                            <li class="list-group-item">Avarage commission fee:
                                                {{ $item->avg_comm_fee }}</li>
                                            <li class="list-group-item">Avarage insurance fee:
                                                {{ $item->avg_insurance_fee }}</li>
                                            <li class="list-group-item">Avarage other fees:
                                                {{ $item->avg_other_charges }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="tab-pane fade in show" id="panel-corporate-mortage" role="tabpanel1">
            @foreach ($mortage_loan as $key => $item)
                @if ($item->application_type == 'Corporate')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                        alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Maximum interest rate</strong></h5>
                                    </div>
                                    <div>
                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_type }}</div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_method }}</div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ url($item->bank->website) }}"
                                        target="_blank"><strong> Get started</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>
                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="card-body row">
                                    <div class="col">
                                        <h6><strong>Processing fee & Charges</strong></h6>
                                        <ul class="list-style-none list-group">
                                            <li class="list-group-item">Avarage application fee:
                                                {{ $item->avg_application_fee }}</li>
                                            <li class="list-group-item">Avarage administration fee:
                                                {{ $item->avg_adm_fee }}</li>
                                            <li class="list-group-item">Avarage commission fee:
                                                {{ $item->avg_comm_fee }}</li>
                                            <li class="list-group-item">Avarage insurance fee:
                                                {{ $item->avg_insurance_fee }}</li>
                                            <li class="list-group-item">Avarage other fees:
                                                {{ $item->avg_other_charges }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="tab-pane fade in show" id="panel-msme-mortage" role="tabpanel1">
            @foreach ($mortage_loan as $key => $item)
                @if ($item->application_type == 'MSME')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                        alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Maximum interest rate</strong></h5>
                                    </div>
                                    <div>
                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_type }}</div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_method }}</div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ url($item->bank->website) }}"
                                        target="_blank"><strong> Get started</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>
                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="card-body row">
                                    <div class="col">
                                        <h6><strong>Processing fee & Charges</strong></h6>
                                        <ul class="list-style-none list-group">
                                            <li class="list-group-item">Avarage application fee:
                                                {{ $item->avg_application_fee }}</li>
                                            <li class="list-group-item">Avarage administration fee:
                                                {{ $item->avg_adm_fee }}</li>
                                            <li class="list-group-item">Avarage commission fee:
                                                {{ $item->avg_comm_fee }}</li>
                                            <li class="list-group-item">Avarage insurance fee:
                                                {{ $item->avg_insurance_fee }}</li>
                                            <li class="list-group-item">Avarage other fees:
                                                {{ $item->avg_other_charges }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="tab-pane fade in show" id="panel-bus-mortage" role="tabpanel1">
            @foreach ($mortage_loan as $key => $item)
                @if ($item->application_type == 'Community')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }} class="thumbnail logo-bank"
                                        alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Maximum interest rate</strong></h5>
                                    </div>
                                    <div>
                                        {{ $item->minimum_interest_rate }}%-{{ $item->maximum_interest_rate }}%
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_type }}</div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <h5><strong>Interest rate</strong></h5>
                                    </div>
                                    <div>{{ $item->interest_rate_method }}</div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ url($item->bank->website) }}"
                                        target="_blank"><strong> Get started</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>
                            <div id="test-{{ $item->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="card-body row">
                                    <div class="col">
                                        <h6><strong>Processing fee & Charges</strong></h6>
                                        <ul class="list-style-none list-group">
                                            <li class="list-group-item">Avarage application fee:
                                                {{ $item->avg_application_fee }}</li>
                                            <li class="list-group-item">Avarage administration fee:
                                                {{ $item->avg_adm_fee }}</li>
                                            <li class="list-group-item">Avarage commission fee:
                                                {{ $item->avg_comm_fee }}</li>
                                            <li class="list-group-item">Avarage insurance fee:
                                                {{ $item->avg_insurance_fee }}</li>
                                            <li class="list-group-item">Avarage other fees:
                                                {{ $item->avg_other_charges }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center py-9">
                        <h1 class="text-muted display-1">No content</h1>
                    </div>
                @break
            @endif
        @endforeach
    </div>
</div>
</div>

<div class="tab-pane fade" id="curr-account" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0 show" data-toggle="tab" href="#individual-acc"
                role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-acc"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-acc"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-acc"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade show" id="individual-acc" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Individual')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade show" id="panel-corporate-acc" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Corporate')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-msme-acc" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'MSME')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show" id="panel-bus-acc" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Community')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
</div>

</div>
<div class="tab-pane fade" id="fixed-account" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0 show active" data-toggle="tab"
                href="#individual-fixed" role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-fixed"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-fixed"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-fixed"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in show active" id="individual-fixed" role="tabpanel1">
        @foreach ($fixedTermAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Individual')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show" id="panel-corporate-fixed" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Corporate')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show" id="panel-msme-fixed" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'MSME')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show" id="panel-bus-fixed" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Community')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
</div>

</div>
<div class="tab-pane fade" id="saving-account" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0" data-toggle="tab" href="#individual-saving"
                role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-saving"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-saving"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-saving"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in show" id="individual-saving" role="tabpanel1">
        @foreach ($savingAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Individual')
                    {{-- @foreach ($data->service as $labels) --}}

                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show" id="panel-corporate-saving" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Corporate')
                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-msme-saving" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'MSME')
                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-bus-saving" role="tabpanel1">
        @foreach ($currAccount as $item)
            @foreach ($item->services as $data)
                @if ($data->application_type == 'Community')
                    <div class="card my-2 shadow">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank" alt=""></div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[0] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $data->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        {{ $data->data[1] }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong></strong>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-outline-primary"
                                        href="{{ $item->bank->tariff }}"
                                        target="_blank"><strong>
                                            Tariff</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[2] }}</strong> :
                                                {{ $data->data[2] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[3] }}</strong> :
                                                {{ $data->data[3] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[4] }}</strong> :
                                                {{ $data->data[4] }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[5] }}</strong> :
                                                {{ $data->data[5] }}
                                            </li>

                                            <li class="list-group-item">
                                                <strong>{{ $data->service->labels[6] }}</strong> :
                                                {{ $data->data[6] }}
                                            </li>
                                            {{-- <li class="list-group-item">{{ $data->service->labels[2] }}: {{
                                                    $item->avg_other_charges }}
                                                </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @break
                        @endforeach --}}
                @endif
            @endforeach
        @endforeach
    </div>
</div>

</div>
<div class="tab-pane fade" id="credit-cards" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0 active show" data-toggle="tab"
                href="#individual-credit" role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-credit"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-credit"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-credit"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in show active" id="individual-credit" role="tabpanel1">
        @foreach ($credit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Individual')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-corporate-credit" role="tabpanel1">
        @foreach ($credit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Corporate')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-msme-credit" role="tabpanel1">
        @foreach ($credit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'MSME')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-bus-credit" role="tabpanel1">
        @foreach ($credit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Community')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
</div>
<div class="tab-pane fade" id="debit-cards" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0 active show" data-toggle="tab"
                href="#individual-debit" role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-debit"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-debit"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-debit"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in show active" id="individual-debit" role="tabpanel1">
        @foreach ($debit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Individual')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-corporate-debit" role="tabpanel1">
        @foreach ($debit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Corporate')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-msme-debit" role="tabpanel1">
        @foreach ($debit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'MSME')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-bus-debit" role="tabpanel1">
        @foreach ($debit as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Community')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>Card type</strong>
                                    </div>
                                    <div>
                                        {{ $service->card_type }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[0] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[0] }}</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->service->labels[1] }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->data[1] }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[2] }}</strong>
                                                    </div>
                                                    <div>
                                                        {{ $service->data[2] }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex flex-column align-items-center">
                                                    <div class="my-3">
                                                        <strong>{{ $service->service->labels[3] }}</strong>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
</div>
<div class="tab-pane fade show" id="banking" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="">
    <ul class="nav md-pills pills-primary">
        <li class="nav-item-tab">
            <a class="nav-link rouned-0 active show" data-toggle="tab"
                href="#individual-ebanking" role="tab">Individuals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-corporate-ebanking"
                role="tab">Corporate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-msme-ebanking"
                role="tab">MSME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-0" data-toggle="tab" href="#panel-bus-ebanking"
                role=" tab">Business
                Group /
                Community</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade in show active" id="individual-ebanking" role="tabpanel1">
        @foreach ($ebanking_data as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Individual')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[0]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[0]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[1]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[1]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[2]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[2]->price }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                {{ $service->features[3]->name }} :
                                                <strong>{{ $service->features[3]->price }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[4] }} :
                                                <strong>{{ $data->data[4] }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[5] }} :
                                                <strong>{{ $data->data[5] }}</strong>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-corporate-ebanking" role="tabpanel1">
        @foreach ($ebanking_data as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Corporate')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[0]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[0]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[1]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[1]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[2]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[2]->price }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                {{ $service->features[3]->name }} :
                                                <strong>{{ $service->features[3]->price }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[4] }} :
                                                <strong>{{ $data->data[4] }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[5] }} :
                                                <strong>{{ $data->data[5] }}</strong>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-msme-ebanking" role="tabpanel1">
        @foreach ($ebanking_data as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'MSME')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[0]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[0]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[1]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[1]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[2]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[2]->price }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                {{ $service->features[3]->name }} :
                                                <strong>{{ $service->features[3]->price }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[4] }} :
                                                <strong>{{ $data->data[4] }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[5] }} :
                                                <strong>{{ $data->data[5] }}</strong>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="tab-pane fade in show active" id="panel-bus-ebanking" role="tabpanel1">
        @foreach ($ebanking_data as $item)
            @foreach ($item->services as $service)
                @if ($service->application_type == 'Business Group / Community')
                    <div class="card my-2 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div><img src={{ $item->bank->logo }}
                                        class="thumbnail logo-bank"
                                        alt="{{ $item->bank->name }}"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[0]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[0]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[1]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[1]->price }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="my-3">
                                        <strong>{{ $service->features[2]->name }}</strong>
                                    </div>
                                    <div>
                                        <strong>{{ $service->features[2]->price }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                            <button
                                class="d-flex justify-content-center align-items-center w-100 border-none text-primary check-btn text-center py-2"
                                type="button" data-toggle="collapse"
                                data-target="#test-{{ $item->bank->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Check other details<i class="fa fa-chevron-down pull-right"></i>
                            </button>



                            <div id="test-{{ $item->bank->id }}" class="collapse bg-secondary"
                                aria-labelledby="heading-collapsed">
                                <div class="">
                                    <div class="">

                                        <ul class="list-style-none borderless">
                                            <li class="list-group-item">
                                                {{ $service->features[3]->name }} :
                                                <strong>{{ $service->features[3]->price }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[4] }} :
                                                <strong>{{ $data->data[4] }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                {{ $data->service->labels[5] }} :
                                                <strong>{{ $data->data[5] }}</strong>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
