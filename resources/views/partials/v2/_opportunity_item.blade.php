<div
        class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card p-3 overflow-hidden tw-rounded-lg tw-shadow border-0">
    <img class="w-125px object-contain rounded-lg shadow-sm"
         src="{{ $item->getJobOpportunityLogo() }}"
         alt="">
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span
                class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
           {{$item->company_name ?? ''}}
        </span>
        <div>
            {{$item->job_title ?? ''}}
        </div>
        <span
                class="badge badge-primary text-white rounded-lg font-weight-bold align-self-start mt-3">
              {{optional($item->opportunityType)->name ?? 'N/A'}}
        </span>

        <div class="d-flex align-items-center mt-3">
            <div class="mr-2">
                <span class="font-weight-bolder">
                    {{ __('app.share_on') }}
                </span>
            </div>
            <x-social-media :url="route('jobs.details', ['job_id'=>encryptId($item->id)])" :title="$item->job_title"/>

        </div>
        @if ($item->deadline)
            <h6 class="text-dark-75 small mt-3">
                @lang('app.deadline')
                : {{$item->deadline ? Carbon\Carbon::parse($item->deadline)->isoFormat('ddd, MMM DD, Y LT') : 'N/A'}}
            </h6>
        @endif
    </div>
    <!--end::Title-->
    <div class="w-md-150px w-100">
        @if( $item->link )
            <a href="{{ $item->link  }}" target="_blank" class="btn btn-info rounded border-2 my-2 w-100">
                {{ __('app.Visit') }}
            </a>
        @endif
        <a href="{{ route('v2.opportunity.details',encryptId($item->id)) }}"
           class="btn btn-outline-info rounded border-2 my-2 w-100">
            {{ __('app.View Details') }}
        </a>
    </div>
</div>
