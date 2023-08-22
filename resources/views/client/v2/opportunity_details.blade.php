@extends('client.v2.layout.app')

@section('title',"Opportunity Details")

@section('content')
    @if(Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">
        <div>
            <div class="h-100px bg-light-light w-100 rounded"></div>
            <div class="w-100 mt-n30" style="z-index: 2001;top: 20px;">
                <div
                    class="d-flex mt-5 flex-column flex-md-row align-items-start mb-9 pr-md-0  card card-body border-0 overflow-hidden"
                    style="background-color: rgba(255,255,255,0.1)">
                    <img
                        class="w-sm-200px w-100 h-sm-200px h-auto object-cover mr-0 mr-md-5 rounded-lg shadow-sm "
                        src="{{ $opportunity->getJobOpportunityLogo() }}"
                        alt=""/>
                    <div class="d-flex flex-column flex-grow-1 mx-md-2 w-100">
                        <div class="d-flex justify-content-lg-between flex-lg-row flex-column">
                            <div class="d-flex flex-column flex-grow-1">
                                <div class="font-weight-bold text-dark font-size-lg mb-1 font-size-h2">
                                    {{$opportunity->job_title ?? ''}}
                                </div>
                                <div class="font-weight-bolder ">
                                    {{$opportunity->company_name ?? ''}}
                                </div>
                                <span class="badge badge-info rounded-xl align-self-start my-3">
                                    {{optional($opportunity->opportunityType)->name ?? 'N/A'}}
                                </span>
                                @if ($opportunity->deadline)
                                    <span class="text-info font-weight-bold">
                                        {{ __('app.deadline') }}: {{ $opportunity->deadline ? Carbon\Carbon::parse($opportunity->deadline)->isoFormat('ddd, MMM DD, Y LT') :'N/A'}}
                                    </span>
                                @endif
                                {{-- <div class="text-muted">Organiser</div>
                                 <div class="text-dark mb-3 font-weight-bolder">Fablab Rwanda</div>--}}
                                <div class="row justify-content-center align-items-center mr-md-2">

                                    <div class="col-md-6 my-2">
                                        <div class="card shadow border-0 min-h-125px">
                                            <div class="card-body p-2">
                                                <div class="d-flex flex-column h-100">
                                                    <h5 class="font-weight-bolder text-dark">
                                                    <span class="svg-icon text-info">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                          viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
                                                    </span>
                                                        {{ __('app.about_this_opportunity') }}
                                                    </h5>
                                                    <div class="ml-6">

                                                        <div class="d-flex justify-content-between my-1">
                                                            <span class="font-weight-bolder">@lang('app.availability_type'):</span>
                                                            <span>{{$opportunity->availabilityTypes->name??'N/A'}}</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between my-1">
                                                            <span class="font-weight-bolder">@lang('app.availability_time'):</span>
                                                            <span>{{ $opportunity->availability_time ??'N/A'}}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between my-1">
                                                            <span class="font-weight-bolder">@lang('app.grant'):</span>
                                                            <span>{{($opportunity->grant)?number_format($opportunity->grant,'2').' RWF':'N/A'}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="card shadow border-0 min-h-125px">
                                            <div class="card-body p-2">
                                                <div class="d-flex flex-column h-100">
                                                    <h5 class="font-weight-bolder text-dark">
                                                    <span class="svg-icon text-info">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                          viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
</svg>
                                                    </span>
                                                        @lang("app.requirements")
                                                    </h5>
                                                    <div class="ml-6">
                                                        <div class="d-flex justify-content-between my-1">
                                                            <span class="font-weight-bolder d-block ">{{ __('app.required_experience') }}:</span>
                                                            <span>{{$opportunity->required_experience?$opportunity->required_experience . ' years':'N/A'}}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between my-1">
                                                            <span class="font-weight-bolder d-block min-w-100px">{{ __('app.education_level') }}:</span>
                                                            <span>{{$opportunity->opportunityStudyLevel->pluck('name')->implode(", ")}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                @if($opportunity->link)
                                    <a href="{{ $opportunity->link }}" target="_blank"
                                       class="btn btn-primary rounded border-2 my-2 w-md-150px w-100 text-white font-weight-boldest shadow float-md-right mr-md-20">
                                        @lang("client_registration.apply")
                                    </a>
                                @else
                                    <div class="my-7"></div>
                                @endif
                                @if($opportunity->attachment)
                                    <a href="{{ $opportunity->getJobOpportunityAttachment() }}"@lang("client_registration.download")
                                       class="btn btn-primary rounded border-2 my-2 w-md-150px w-100 text-white font-weight-boldest shadow float-md-right mr-md-20 btn-sm">
                                    <span class="svg-icon">
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.18164 9.78516C7.19626 9.80383 7.21493 9.81894 7.23625 9.82932C7.25757 9.83971 7.28097 9.84511 7.30469 9.84511C7.3284 9.84511 7.35181 9.83971 7.37312 9.82932C7.39444 9.81894 7.41312 9.80383 7.42773 9.78516L9.61523 7.01758C9.69531 6.91602 9.62305 6.76562 9.49219 6.76562H8.04492V0.15625C8.04492 0.0703125 7.97461 0 7.88867 0H6.7168C6.63086 0 6.56055 0.0703125 6.56055 0.15625V6.76367H5.11719C4.98633 6.76367 4.91406 6.91406 4.99414 7.01562L7.18164 9.78516ZM14.4531 9.10156H13.2812C13.1953 9.10156 13.125 9.17188 13.125 9.25781V12.2656H1.48438V9.25781C1.48438 9.17188 1.41406 9.10156 1.32812 9.10156H0.15625C0.0703125 9.10156 0 9.17188 0 9.25781V13.125C0 13.4707 0.279297 13.75 0.625 13.75H13.9844C14.3301 13.75 14.6094 13.4707 14.6094 13.125V9.25781C14.6094 9.17188 14.5391 9.10156 14.4531 9.10156Z"
                                            fill="white"/>
                                        </svg>
                                    </span>
                                        @lang("app.attachment")
                                    </a>
                                @endif
                                <div class="font-weight-bolder mt-5">
                                <span class="svg-icon">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0003 11.9694L11.0003 15.0194C11.0003 15.2846 11.1057 15.539 11.2932 15.7265C11.4807 15.9141 11.7351 16.0194 12.0003 16.0194C12.2626 16.0183 12.514 15.9142 12.7003 15.7294L19.7003 8.72941C19.794 8.63645 19.8684 8.52585 19.9192 8.40399C19.97 8.28213 19.9961 8.15142 19.9961 8.01941C19.9961 7.8874 19.97 7.75669 19.9192 7.63483C19.8684 7.51297 19.794 7.40237 19.7003 7.30941L12.7003 0.30941C12.5599 0.171803 12.3821 0.0786238 12.189 0.0415192C11.996 0.0044136 11.7963 0.0250292 11.6149 0.100788C11.4335 0.176547 11.2785 0.304089 11.1692 0.467472C11.0598 0.630856 11.0011 0.822832 11.0003 1.01941V4.11941H10.1503C8.57038 4.14297 7.00425 3.82244 5.56063 3.18006C4.117 2.53769 2.83046 1.58885 1.7903 0.399408C1.66494 0.232528 1.49051 0.109053 1.29146 0.0462875C1.09241 -0.0164776 0.8787 -0.0153847 0.680296 0.0494099C0.47839 0.117545 0.30353 0.248396 0.181208 0.422884C0.0588856 0.597372 -0.00449753 0.806371 0.000295639 1.01941C0.000295639 10.1394 8.0803 11.6994 11.0003 11.9694ZM10.1503 6.13941C10.8191 6.1415 11.4874 6.09807 12.1503 6.00941C12.387 5.97349 12.603 5.85382 12.759 5.67214C12.915 5.49047 13.0006 5.25886 13.0003 5.01941V3.42941L17.5803 8.01941L13.0003 12.6094V11.0194C13.0003 10.7542 12.8949 10.4998 12.7074 10.3123C12.5199 10.1248 12.2655 10.0194 12.0003 10.0194C11.0903 10.0194 3.8903 9.81941 2.3303 3.58941C4.5946 5.25885 7.33713 6.15315 10.1503 6.13941Z"
                                    fill="#2A337E"/>
                                </svg>

                                </span>
                                   @lang("app.share_on")
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <x-social-media
                                        :url="route('jobs.details', ['job_id'=>encryptId($opportunity->id)])"
                                        :title="$opportunity->job_title"/>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>


    <div class="opportunity-card-details  ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center my-10 h6 text-info">@lang("client_registration.more_details")</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-2 order-1 order-md-0">
                    {!! $opportunity->job_details !!}
                </div>
            </div>

        </div>
    </div>
@stop
