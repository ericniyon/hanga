<div class="col-lg-8">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card mb-3 rounded border-0">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        {{-- @if ($discount->cover_image)
                            <img src="{{ route('get.image.path', str_replace('/', '', $discount->cover_image)) }}"
                                style="height: 100%;" alt="" class="img-fluid rounded-left object-cover">
                            @elseif (!$discount->cover_image)
                        <img src="" style="height: 100%;" alt=""
                            class="img-fluid rounded-left object-cover">
                    @else
                            <img src="{{ asset('images/background.png') }}" style="height: 100%;" alt=""
                                class="img-fluid rounded-left object-cover">
                            @endif --}}
                    </div>
                    {{-- <div class="col-md-9">
                        <div class="card-body d-flex flex-column h-100  justify-content-between p-4">

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <h4 class="font-weight-bolder">
                                    {{ $discount->title ?? '' }}
                                </h4>
                                <span class="label label-light label-inline rounded-pill">
                                    {{ optional($discount->discount) ?? 'N/A' }}
                                </span>
                            </div>
                            <h5 class="font-weight-bold">
                                {{ $discount->title ?? '' }}
                            </h5>
                            @if ($discount->to)
                                <h6 class="text-danger font-weight-bolder">
                                    Deadline:
                                    {{ $discount->to ? Carbon\Carbon::parse($discount->to) : 'N/A' }}
                                </h6>
                            @endif
                            <div class="mb-0 mt-3 d-md-flex align-items-center justify-content-between">
                                @if ($discount->from)
                                    <a href="{{ $discount->from }}" target="_blank" class="text-primary">
                                        {{ $discount->from }}
                                    </a>
                                @endif

                            </div>
                            <div class="d-flex">
                                @if ($discount->cover_image)
                                    <a href="{{ asset('storage/discount/') . $discount->cover_image }}" download
                                        class="btn btn-sm btn-light-success mt-4 rounded-pill font-weight-bolder text-uppercase px-6">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        @lang('attachment')
                                    </a>
                                @endif
                                <x-social-media :url="url()->current()" :title="$discount->title" />
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


</div>
