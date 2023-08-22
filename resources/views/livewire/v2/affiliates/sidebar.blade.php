<div>
<ul class="nav nav-pills custom-navs justify-content-around" id="myTab" role="tablist"
        style="height: 56px;
        left: 119px;
        top: 128px;
        background: #F8F8F8;"
>
    <li class="nav-item d-none d-lg-flex w-md-200px" style="width: 100%!important">
        <span class="nav-link rounded-0 text-info text-left pl-3" style="width: 100%!important">
                <span style="width: 100%!important">
                    <span class="svg-icon mr-3">
                        @include('partials.icons._filter')
                    </span>
                    {{ __('app.Filter By') }}
                </span>
        </span>
    </li>
</ul>
    <!-- Tab panes -->
<div class="tab-content py-2">
    <ul class="nav nav-pills custom-navs affiliates-sidebar" role="tablist" style="background-color: white;">
        <li class="nav-item d-none d-lg-flex w-md-200px {{request()->is('client/my/networks')?'active':''}}">
            <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.my.networks')}}">
                <span>
                    My Connection (0)
                </span>
            </a>
        </li>
        @if (auth('client')->user()->type_name=='DSP' || auth('client')->user()->type_name=='MSME')
        <div class="accordion accordion-svg-toggle w-100"
             id="accordion1" style="border: none;border-radius: none;">
            <div class="card shadow-none rounded-0 my-2 border overflow-hidden" style="border: none;border-radius: none;">
                <div class="card-header bg-white" style="border: none;border-radius: none;">
                    <div class="card-title {{ (request()->is('client/my/affiliate-requests') || request()->is('client/my/affiliates'))?'':'collapsed'}} pr-3" data-toggle="collapse"
                         data-target="#collapse1">
                        <div class="card-label pl-4">
                             <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                        </svg>
                            </span>
                            Affiliates
                        </div>
                        <span class="svg-icon svg-icon-primary">
                            @include('partials.icons._sort')
                        </span>
                    </div>
                </div>
                <div id="collapse1" class="collapse {{ (request()->is('client/my/affiliate-requests') || request()->is('client/my/affiliates'))?'show':''}}" data-parent="#accordion1">
                    <div class="card-body p-2 bg-white show" style="border: none;border-radius: none;">
                        <ul class="nav nav-pills custom-navs affiliates-sidebar" role="tablist" style="background-color: white;padding-top: 0px!important">
                            <li class="nav-item d-none d-lg-flex w-md-200px {{request()->is('client/my/affiliate-requests')?'active':''}}">
                                <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.affiliates.requests')}}">
                                    <span>
                                        Requests ({{$requests_pending}})
                                    </span>
                                    {{-- <span class="count text-center">
                                        <span class="text-center">{{$requests}}</span>
                                    </span> --}}
                                </a>
                            </li>
                            <li class="nav-item d-none d-lg-flex w-md-200px {{request()->is('client/my/affiliates')?'active':''}}">
                                <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.affiliates.index')}}">
                                    <span>
                                        My Affiliates ({{$affiliates}})
                                    </span>
                                    {{-- <span class="count text-center">
                                        <span class="text-center">{{$affiliates_pending}}</span>
                                    </span> --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @elseif(auth('client')->user()->type_name=='iWorker')
        <li class="nav-item {{request()->is('/client/my/affiliate-requests')?'active':''}}">
            <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.affiliates.requests')}}">
                <span>
                    {{ __('Affiliates ('.$affiliates.')') }}
                </span>
            </a>
        </li>
        @endif
        <li class="nav-item mt-2 {{request()->is('client/my/aggregators')?'active':''}}">
            <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.aggregators.index')}}">
            <span> Aggregators ({{$aggregators}})</span>
            </a>
        </li>
        <li class="nav-item mt-2 {{request()->is('client/my/groups')?'active':''}}">
            <a class="nav-link rounded-0 text-info text-left pl-0" href="{{route('client.cohorts.index')}}">
                    <span>
                        {{ __('Groups ('.$groups.')') }}
                    </span>
            </a>
        </li>
    </ul>
</div>



@include('partials.includes._loading')

</div>
