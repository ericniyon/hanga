<div class="col-lg-8">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card mb-3 rounded border-0">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        @if ($job->logo)
                        <img src="{{route('get.image.path',str_replace("/","",$job->logo))}}" style="height: 100%;" alt=""
                            class="img-fluid rounded-left object-cover">
                    @elseif ($job->client_id)
                        <img src="{{ $job->client->profilePhotoUrl }}" style="height: 100%;" alt=""
                            class="img-fluid rounded-left object-cover">
                    @else
                    <img src="{{ asset('images/background.png') }}" style="height: 100%;" alt=""
                    class="img-fluid rounded-left object-cover">
                    @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card-body d-flex flex-column h-100  justify-content-between p-4">

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <h4 class="font-weight-bolder">
                                    {{$job->company_name ?? ''}}
                                </h4>
                                <span class="label label-light-{{getColorByJobType(optional($job->opportunityType)->name)}} label-inline rounded-pill">
                                    {{optional($job->opportunityType)->name ?? 'N/A'}}
                                    </span>
                            </div>
                            <h5 class="font-weight-bold">
                                {{$job->job_title ?? ''}}
                            </h5>
                            @if ($job->deadline)
                                <h6 class="text-danger font-weight-bolder">
                                    Deadline: {{ $job->deadline ? Carbon\Carbon::parse($job->deadline)->isoFormat('LLLL') :'N/A'}}
                                </h6>
                            @endif
                            <div class="mb-0 mt-3 d-md-flex align-items-center justify-content-between">
                                @if ($job->link)
                                <a href="{{$job->link}}" target="_blank"
                                   class="text-primary">
                                   {{$job->link}}
                                </a>
                                @endif
                                {{-- <span class="label label-light-{{getColorByJobType(optional($job->opportunityType)->name)}} label-inline rounded-pill">
                                      Grant:{{($job->grant)?number_format($job->grant,'2').' RWF':'N/A'}}
                                </span> --}}
                            </div>
                            <div class="d-flex">
                                @if($job->attachment)
                                <a href="{{(asset('storage/job_opportunities/attachments').$job->attachment)}}" download class="btn btn-sm btn-light-success mt-4 rounded-pill font-weight-bolder text-uppercase px-6">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                    @lang('attachment')
                                </a>
                                @endif
                                <x-social-media :url="url()->current()" :title="$job->job_title" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card rounded border-0">
        <div class="card-body">

            <h5 class="font-weight-bolder">
                @lang('app.about_this_opportunity')
            </h5>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <p class="card-text "><strong>@lang('app.required_experience')</strong>:
                            <span class="badge badge-secondary badge-pill">{{$job->required_experience?$job->required_experience . ' years':'N/A'}}</span>
                        </p>
                        <p class="card-text "><strong>@lang('app.education_level') </strong>:
                            <span class="badge badge-secondary badge-pill">{{$job->opportunityStudyLevel->pluck('name')->implode(", ")}}</span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text"><strong>@lang('app.availability_type')</strong>:
                            <span class="badge badge-secondary badge-pill">{{$job->availabilityTypes->name??'N/A'}}</span>
                        </p>
                        <p class="card-text"><strong>@lang('app.availability_time') </strong>:
                            <span class="badge badge-secondary badge-pill">{{$job->availability_time??'N/A'}}</span>
                        </p>

                    </div>
                    <div class="col-md-4">
                        <p class="card-text"><strong>@lang('app.grant') </strong>:
                            <span class="badge badge-secondary badge-pill">{{($job->grant)?number_format($job->grant,'2').' RWF':'N/A'}}</span>
                        </p>
                    </div>
                </div>
                <hr>
                <h3 class="font-weight-bolder">@lang('client_registration.more_details')</h3>
                <p class="card-text">
                    {!! $job->job_details ?? ''!!}
                </p>
        </div>
    </div>

</div>
