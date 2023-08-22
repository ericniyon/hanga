<div class="row mt-5 justify-content-center">
    @forelse($items as $item)
        <div class="col-xxl-4 col-md-6">
            <div class="card border-0">
                <div
                        class=" mb-7 hr-card border border-light-light p-4 min-h-150px  d-flex align-items-md-center flex-column flex-md-row">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-80 rounded-0 flex-shrink-0 mr-4 d-none d-md-inline-block">
                        <img class="img-fluid rounded-lg object-contain"
                             src="{{ $item->profile_photo_url }}"
                             alt="Logo">
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Section-->
                    <div class="d-flex flex-column flex-grow-1 justify-content-center">
                        <!--begin::Title-->
                        <a href="{{ route('v2.client.details',encryptId($item->id)) }}"
                           class="text-info font-weight-bolder font-size-h4 text-hover-primary mb-1">
                            {{ $item->name }}

                            @if($item->application->status==\App\Models\ApplicationBaseModel::APPROVED)
                                <span class="svg-icon">
                                      @include('partials.icons._verified')
                                  </span>
                            @endif
                        </a>
                        <!--end::Title-->
                        <!--begin::Desc-->
                        <span class="text-dark-50 font-weight-normal font-size-sm">
                                {{ str_limit($item->application->bio) }}
                            </span>
                        <!--begin::Desc-->
                        <div class="mt-2 d-flex  align-items-center justify-content-between">
                            <div>
                                @php
                                    $average= round($item->ratings_avg_rating,2);
                                @endphp
                                <div class="mr-2">
                                    <span class="mr-2">Rate</span>
                                    <strong>{{ $item->ratings_count }} {{ __('app.Reviews') }} </strong>
                                </div>
                                <div class="d-flex">
                                    <strong class="mr-2 h2 mb-0">
                                        {{ $average }}
                                    </strong>
                                    @include('partials.includes._rating_starts')
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('v2.client.details',encryptId($item->id)) }}"
                                   class="btn btn-outline-info btn-sm rounded border-2">
                                    {{ __('app.View Details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-6 d-flex flex-column justify-content-center" style="min-height: 109px">
            <div class="alert alert-custom alert-white shadow-sm rounded alert-notice">
                <div class="alert-icon">
                    <span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                    </span>
                </div>
                <div class="alert-text">
                    {{ __('app.No high rated users found') }}
                </div>
            </div>
        </div>
    @endforelse
</div>
