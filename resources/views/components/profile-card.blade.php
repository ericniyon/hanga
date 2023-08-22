<div class="card shadow-none rounded border-0 {{$classes}}" {{ $attributes }}>
    <!--begin::Body-->
    <div class="card-body p-2 p-md-10">
        <div class="text-center mb-4">
            <div class="symbol symbol-60 symbol-circle img-thumbnail symbol-xl-90" data-toggle="modal"
                 data-target="#profilePictureModal">
                <div class="symbol-label"
                     style="background-image:url({{ asset('storage/'.auth('client')->user()->profile_photo) ?  asset('storage/'.auth('client')->user()->profile_photo) : auth('client')->user()->profile_photo_url }})">

                </div>

                @if($editable)
                    <button type="button" data-toggle="modal" data-target="#profilePictureModal"
                            class="btn btn-icon btn-info shadow symbol-badge symbol-badge-bottom tw-w-8 tw-h-8">
                            <span class="svg-icon text-primary" data-toggle="tooltip" title=""
                                  data-original-title="Change profile picture">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                </svg>
                            </span>
                    </button>
                @endif
            </div>

            <h4 class="font-weight-bold my-2">
                {{ auth('client')->user()->clientName }}
                @if(optional($application)->status==\App\Models\ApplicationBaseModel::APPROVED)
                    <span class="text-primary svg-icon">
                        @include('partials.icons._verified')
                   </span>
                @endif
            </h4>
            <div class="text-muted mb-2">{{ auth('client')->user()->registrationType->name }}</div>
        </div>
        <div>
            @if(!is_null($application))
                <div class="d-flex flex-column tw-space-y-3 justify-content-around">
                    @if( $application->canBeEdited())
                        <a href="{{ $application->getApplyUrl() }}"
                           class="btn btn-light-primary btn-sm rounded font-weight-bolder">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                              <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                    clip-rule="evenodd"/>
                            </svg>
                            </span>
                            <span class="d-none d-md-inline">{{__('client_registration.edit')}}</span>
                        </a>
                    @endif
                    @if($application->canBeDeleted())
                        <a href="{{ route('client.reset.registration') }}"
                           class="btn btn-danger btn-sm js-delete rounded font-weight-bolder">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                  <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </span>
                            <span class="d-none d-md-inline">{{__('client_registration.delete')}}</span>
                        </a>
                    @endif
                    @if($application->status!=\App\Models\ApplicationBaseModel::DRAFT)
                        <a href="{{ $application->detailsUrl() }}"
                           class="btn btn-light-info btn-sm rounded font-weight-bolder px-5">
                            {{ __("app.Edit Profile") }}
                        </a>

                        @if(!in_array($application->status,[\App\Models\ApplicationBaseModel::DRAFT,\App\Models\ApplicationBaseModel::APPROVED]))
                            <a href="{{ route('client.verification') }}"
                               class="btn btn-info btn-sm rounded font-weight-bolder px-5">
                                {{ __('app.Verification') }}
                            </a>
                        @endif
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-4">
            @if(in_array(auth('client')->user()->type,[\App\Models\RegistrationType::MSME,\App\Models\RegistrationType::DSP]))
                <a href="{{ route('client.my.employees') }}"
                   class="d-flex align-items-center justify-content-between mb-4 bg-light-success rounded px-5 py-2">
                    <div class="font-weight-boldest text-capitalize text-success text-hover-success font-size-lg mb-1">
                        <i class="bi bi-people-fill text-success"></i>
                        {{ __('app.Affiliations') }}
                    </div>
                    {{--                    <span class="font-weight-bolder text-success py-1 font-size-lg h3">0</span>--}}
                </a>
            @endif

            <x-rating-item-detail :client="auth('client')->user()->loadCount('ratings')->loadSum('ratings','rating')"/>

        </div>
    </div>
    <!--end::Body-->
</div>
