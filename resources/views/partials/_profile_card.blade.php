<div class="card shadow-none rounded border-0 mb-4">
    <!--begin::Body-->
    <div class="card-body">
        <div class="text-center mb-4">
            <div class="symbol symbol-60 symbol-circle symbol-xl-90" data-toggle="modal"
                data-target="#profilePictureModal">
                <div class="symbol-label" style="background-image:url()">
                    <button type="button" data-toggle="modal" data-target="#profilePictureModal" class="btn btn-icon">
                        <span class="svg-icon text-white" data-toggle="tooltip" title=""
                            data-original-title="Change profile picture">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </span>
                    </button>
                </div>
                <i class="symbol-badge symbol-badge-bottom bg-success"></i>
            </div>
            {{-- <h4 class="font-weight-bold my-2">{{ auth('client')->user()->name }}</h4>
            <div class="text-muted mb-2">{{ auth('client')->user()->registrationType->name }}</div> --}}
        </div>


        <div>
            {{-- @if (isset($application) && $application)
                <h4 class="font-weight-bolder d-block text-dark-75 text-hover-primary font-size-lg text-center">
                    My Profile
                </h4>
                <div class="d-flex justify-content-around">
                    @if ($application->canBeEdited())
                        <a href="{{ $application->getApplyUrl() }}"
                            class="btn btn-light-primary btn-sm rounded-pill font-weight-bolder">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Edit
                        </a>
                    @endif
                    @if ($application->canBeDeleted())
                        <a href="{{ route('client.reset.registration') }}"
                            class="btn btn-danger btn-sm js-delete rounded-pill font-weight-bolder">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Delete
                        </a>
                    @endif
                    @if ($application->status != \App\Models\ApplicationBaseModel::DRAFT)
                        <a href="{{ $application->detailsUrl() }}"
                            class="btn btn-light-info btn-sm rounded-pill font-weight-bolder">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Details
                        </a>
                    @endif
                </div>
            @endif --}}
        </div>
    </div>
    <!--end::Body-->
</div>
