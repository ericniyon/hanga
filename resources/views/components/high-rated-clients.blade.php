<div class="row mt-5 justify-content-center">
    @forelse($items as $item)
        <div class="col-md-6">
            <div class="card mb-7 shadow-sm rounded border-light-light">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-60 symbol-circle flex-shrink-0 mr-4">
                            <div class="symbol-label"
                                 style="background-image: url({{ $item->profile_photo_url }})"></div>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="{{ route('client.details',$item->name_slug) }}"
                               class="text-dark font-weight-bolder font-size-lg text-hover-primary mb-1">
                                {{ $item->name }}

                                @if($item->application->status==\App\Models\ApplicationBaseModel::APPROVED)
                                    <x-verified-icon classes="text-success svg-icon-1x"/>
                                @endif
                            </a>
                            <!--end::Title-->
                            <!--begin::Desc-->
                            <span class="text-dark-50 font-weight-normal font-size-sm">
                                         {{ str_limit($item->application->bio,200) }}
                                        </span>
                            <!--begin::Desc-->
                            <div class="mt-2">
                                <x-rating-item :client="$item"/>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-6 d-flex flex-column justify-content-center" style="min-height: 109px">
            <div class="alert alert-custom alert-white shadow-sm rounded alert-notice">
                <div class="alert-icon">
                    <span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    </span>
                </div>
                <div class="alert-text">
                    No high rated users found
                </div>
            </div>
        </div>
    @endforelse
</div>
