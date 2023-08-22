<div class="card shadow-none rounded border-0 my-4">
    <div class="card-body">
        <h4 class="mb-4">
            {{ __("app.Your Dashboard") }}
        </h4>
        <a href="{{route('client.profile.viewers')}}"
           class="d-flex align-items-center justify-content-between mb-4 bg-light-warning rounded px-5 py-2">
            <div
                    class="font-weight-boldest text-capitalize text-warning text-hover-primary font-size-lg mb-1">
               {{ __("app.Who viewed your profile") }}
            </div>
            <span class="font-weight-bolder text-warning py-1 font-size-lg h3">{{count(myProfileViews())}}</span>
        </a>
        <a href="{{ route('client.my.networks') }}"
           class="d-flex align-items-center justify-content-between mb-4 bg-light-success rounded px-5 py-2">
            <div
                    class="font-weight-boldest text-capitalize text-success text-hover-success font-size-lg mb-1">
                {{ __("app.Connections") }}
            </div>
            <span class="font-weight-bolder text-success py-1 font-size-lg h3">{{count(myConnections())}}</span>
        </a>
        {{-- <div class="card card-custom bg-light-info card-stretch no-gutters">
            <!--begin::Body-->
            <div class="card-body py-2 my-4">
                <a href="{{auth("client")->user()->application->detailsUrl() }}"
                   class="card-title font-weight-bolder text-info font-size-h6 mb-2 text-hover-state-dark d-block">
                    {{ __("app.Profile completion") }}
                </a>
                @php
                $profileCompleted=profilePercentage();
                 $remaining=100-$profileCompleted;
                @endphp
                <div class="font-weight-bold text-info font-size-sm">
                    <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{$profileCompleted}}%</span>
                    @if($remaining !=0)
                      {{$remaining}} {{ __("app.% to goal") }}
                    @endif
                </div>
                <div class="progress progress-xs mt-4 bg-info-o-60">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$profileCompleted}}%;"
                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <!--end::Body-->
        </div> --}}
    </div>
    <!--end::Body-->
</div>
