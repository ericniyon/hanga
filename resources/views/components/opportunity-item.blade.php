@props(['isClient'=>false,'job'])

<div
    class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card card-body p-3 overflow-hidden shadow border-0">
    <img class="w-125px object-cover rounded-lg shadow-sm"
         src="{{ $job->getJobOpportunityLogo() }}"
         alt="">
    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mx-2">
        <span
            class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
          {{$job->job_title ?? ''}}
        </span>

        <span
            class="badge badge-primary text-white rounded-lg font-weight-bold align-self-start mt-3">
              {{optional($job->opportunityType)->name ?? 'N/A'}}
        </span>

        <div class="d-flex align-items-center mt-3">
            <div class="mr-2">
                <span class="font-weight-bolder">Share on</span>
            </div>
            <x-social-media :url="route('jobs.details', ['job_id'=>encryptId($job->id)])" :title="$job->job_title"/>

        </div>
        @if ($job->deadline)
            <h6 class="text-dark-75 small mt-3">
                @lang('app.deadline')
                : {{$job->deadline ? Carbon\Carbon::parse($job->deadline)->isoFormat('ddd, MMM DD, Y LT') : 'N/A'}}
            </h6>
        @endif
    </div>
    <!--end::Title-->
    <div class="w-md-150px w-100">
        @if( $job->link )
            <a href="{{ $job->link  }}" target="_blank" class="btn btn-info rounded border-2 my-2 w-100">
                @lang("app.Visit")
            </a>
        @endif
        <a href="{{ route('v2.opportunity.details',encryptId($job->id)) }}"
           class="btn btn-outline-info rounded border-2 my-2 w-100">
            @lang("app.View Details")
        </a>
    </div>
</div>




