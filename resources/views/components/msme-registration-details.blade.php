@php
    $products = \App\Models\StartupSolution::where('client_id', \auth('client')->id())->get();
    $publications = \App\Models\StartupPublication::where('client_id', \auth('client')->id())->get();
@endphp
{{-- company information --}}
<div class="card gutter-b rounded ">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Company Registration:</strong> <br>
                    <span>{{ $model->company_name }}</span>
                </p>
            </div>
            <div class="col-md-6">

                <p>
                    <strong class="d-block font-weight-bolder">
                        {{ __('client_registration.company_categories') }}
                    </strong>
                    <span
                        class="badge badge-secondary rounded my-1">{{ \App\Models\StartupSubCategory::where('id', $model->sub_category_id)->pluck('startup_sub_category_name')->first() }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.tin') }}:</strong>
                    <span>{{ $model->tin }}</span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.phone') }} :</strong>
                    <span><a href="tel:{{ $model->phone }}">{{ $model->phone }}</a></span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.email') }} :</strong>
                    <span>
                        <a href="mailto:{{ $model->email }}">{{ $model->email }}</a>
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>{{ __('client_registration.registration_date') }} :</strong>
                    <span>{{ $model->registration_date }}</span>
                </p>
            </div>

            @if ($model->rdb_certificate)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">{{ __('client_registration.rdb_certificate') }}</strong>
                        @if ($model->rdb_certificate)
                            <a href="{{ Storage::disk('rdb_certificate')->url($model->rdb_certificate) }}"
                                target="_blank" download="{{ $model->company_name }}-certificate" data-toggle="tooltip"
                                title="{{ __('client_registration.download') }}"
                                class="btn btn-sm btn-light-info rounded py-1 font-weight-bolder px-5">
                                @include('partials.buttons._svg_download_icon')
                                <span class="d-none d-md-inline">
                                    {{ __('client_registration.download') }}
                                </span>
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            @endif

            @if ($model->logo)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">Company Logo</strong>
                        @if ($model->logo)
                            <a href="{{ Storage::disk('logos')->url($model->logo) }}" target="_blank"
                                download="{{ $model->company_name }}-certificate" data-toggle="tooltip"
                                title="Company Logo"
                                class="btn btn-sm btn-light-info rounded py-1 font-weight-bolder px-5">
                                @include('partials.buttons._svg_download_icon')
                                <span class="d-none d-md-inline">
                                    Download
                                </span>
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            @endif
            @if ($model->pitch_deck)
                <div class="col-md-6">
                    <p class="d-flex align-items-center">
                        <strong class="mr-4">Company Pitch Deck</strong>
                        @if ($model->logo)
                            <a href="{{ Storage::disk('pitch_deck')->url($model->pitch_deck) }}" target="_blank"
                                download="{{ $model->company_name }}-pitch Deck" data-toggle="tooltip"
                                title="Company pitch deck"
                                class="btn btn-sm btn-light-info rounded py-1 font-weight-bolder px-5">
                                @include('partials.buttons._svg_download_icon')
                                <span class="d-none d-md-inline">
                                    Download
                                </span>
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            @endif
            <div class="col-md-6">
                <p>
                    <strong class="d-block font-weight-bolder">{{ __('app.business_sector') }}</strong>
                    <span
                        class="badge badge-secondary rounded my-1">{{ \App\Models\StartupCategory::where('id', $model->category_id)->pluck('startup_category_name')->first() }}</span>
                </p>
            </div>
            @if ($model->website)
                <div class="col-md-6">
                    <p>
                        <strong class="d-block font-weight-bolder">Website</strong>
                        <a href="{{ $model->website }}" target="_blank">link to website</a>
                    </p>
                </div>
            @endif


            @if ($editable || $review)
                <div class="col-md-12">
                    <strong>{{ __('client_registration.brief_bio') }}</strong>
                    <p style="text-align:justify">
                        {{ $model->bio }}
                    </p>
                </div>
            @endif

            @if ($editable || $review)
                <div class="col-md-12">
                    <strong>Problem</strong>
                    <p style="text-align:justify">
                        {{ $model->problem }}
                    </p>
                </div>
            @endif

            @if ($editable || $review)
                <div class="col-md-12">
                    <strong>Mission</strong>
                    <p style="text-align:justify">
                        {{ $model->mission }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- team section --}}
@include('partials._certification_standards_card')

{{-- product and services --}}
<div class="card card-body gutter-b rounded  {{ $cardClasses }}">
    <h4 class="font-weight-bolder text-primary">Product / Services</h4>

    <div>
        <div class="accordion accordion-toggle-arrow" id="accordionExample2">
            @foreach ($products as $item)
                <div class="card rounded mb-4">
                    <div class="card-header rounded">
                        <div class="card-title collapsed d-flex align-items-center justify-content-between"
                            data-toggle="collapse" data-target="#collapse2{{ $item->id }}">
                            <span>{{ $item->name }}</span>
                            <span
                                class="label label-inline label-light-primary rounded d-block mr-10">{{ $item->product_type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{ $item->id }}" class="collapse" data-parent="#accordionExample2">
                        <div class="card-body">

                            <div>
                                <strong class="d-block">{{ __('client_registration.description') }}</strong>
                                <p>{{ $item->description }}</p>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <strong>Active Users:</strong>
                                    <p>
                                        {{ $item->active_users }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <strong>Capacity:</strong>
                                    <p>
                                        {{ $item->capacity }}
                                    </p>
                                </div>
                                @if ($item->product_link)
                                    <div class="col-md-4 col-sm-12">
                                        <strong>Capacity:</strong>
                                        <a href="{{ str_starts_with($item->product_link, 'http') ? $item->product_link : 'http://' . $item->product_link }}"
                                            target="_blank">
                                            {{ $item->product_link }}
                                        </a>
                                    </div>
                                @endif
                                <div class="col-md-4 col-sm-12">
                                    <strong>Status:</strong>
                                    <p>
                                        {{ $item->status }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- business model --}}
<div class="card gutter-b rounded ">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-primary">Business Model</h4>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <strong>Target Customer</strong> <br>
                    <span>{{ $model->target_customers }}</span>
                </p>
            </div>
            <div class="col-md-12 mt-3">
                <p>
                    <strong>What value do you bring to customers</strong> <br>
                    <span>{{ $model->customer_value }}</span>
                </p>
            </div>
            <div class="col-md-12 row mb-5">

                <div class="col-md-12">
                    <strong class="d-block font-weight-bolder">
                        Business Model
                    </strong>
                </div>
                {{-- <div class="col-md-12 row mb-3"> --}}
                @php
                    $bsmodel = $model == null ? ($business_model = []) : explode(',', $model->business_model);
                @endphp
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('B2B', $bsmodel) ? 'checked' : '' }} name="business_model[]"
                            value="B2B" id="angel" disabled>
                        B2B
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('B2C', $bsmodel) ? 'checked' : '' }} name="business_model[]"
                            value="B2C" id="angel" disabled>
                        B2C
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('B2B2C', $bsmodel) ? 'checked' : '' }}
                            name="business_model[]" value="B2B2C" id="angel" disabled>
                        B2B2C
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('C2C', $bsmodel) ? 'checked' : '' }}
                            name="business_model[]" value="C2C" id="angel" disabled>
                        C2C
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('C2B', $bsmodel) ? 'checked' : '' }}
                            name="business_model[]" value="C2B" id="angel" disabled>
                        C2B
                        <span class="rounded-0"></span>
                    </label>
                </div>
                {{-- </div> --}}
            </div>
            <div class="col-md-6 mt-4">
                <strong>Revenue Stream</strong>
                <p>
                    <span>{{ $model->revenue_stream }}</span>
                </p>
            </div>
            <div class="col-md-6 mt-4">
                <strong>GMT Channels</strong>
                <p>
                    <span>{{ $model->gmt_channel }}</span>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Traction --}}
<div class="card gutter-b rounded ">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-primary">Publications</h4>
        <div class="separator separator-dashed  mb-3"></div>

        <div class="row">
            <div class="col-md-4">
                <p>
                    <strong>Market size (TAM)</strong> <br>
                    <span>{{ $model->market_size_tam }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong>Market size (SAM)</strong> <br>
                    <span>{{ $model->market_size_sam }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong>Market size (SOM)</strong> <br>
                    <span>{{ $model->market_size_som }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong>Active Users</strong> <br>
                    <span>{{ $model->active_users }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong> Paying Customers</strong> <br>
                    <span>{{ $model->paying_customers }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong> Anual Recuring Revenue </strong> <br>
                    <span>${{ number_format($model->anual_recuring_revenue ?? 0) }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong> Customer Growth Rate </strong> <br>
                    <span>{{ $model->customer_growth_rate }}%</span>
                </p>
            </div>
            @if ($model->gross_transaction_value)
                <div class="col-md-4">
                    <p>
                        <strong> Gross Transaction Value </strong> <br>
                        <span>{{ $model->gross_transaction_value }}</span>
                    </p>
                </div>
            @endif
        </div>


        <h4 class="font-weight-bolder mb-4 mt-4 text-primary">Traction</h4>
        <div class="accordion accordion-toggle-arrow" id="accordionExample2">
            @foreach ($publications as $item)
                <div class="card rounded mb-4">
                    <div class="card-header rounded">
                        <div class="card-title collapsed d-flex align-items-center justify-content-between"
                            data-toggle="collapse" data-target="#collapse2{{ $item->id }}">
                            <span>{{ $item->title }}</span>
                            <span
                                class="label label-inline label-light-primary rounded d-block mr-10">{{ $item->product_type }}</span>
                        </div>
                    </div>
                    <div id="collapse2{{ $item->id }}" class="collapse" data-parent="#accordionExample2">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <strong>Title:</strong>
                                    <p>
                                        {{ $item->title }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <strong>type:</strong>
                                    <p>
                                        {{ $item->type }}
                                    </p>
                                </div>
                                @if ($item->url)
                                    <div class="col-md-4 col-sm-12">
                                        <strong>url:</strong><br>
                                        <a href="{{ str_starts_with($item->url, 'http') ? $item->url : 'http://' . $item->url }}"
                                            target="_blank">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Investment and Fundraising --}}
<div class="card gutter-b rounded ">
    <div class="card-body">
        <h4 class="font-weight-bolder mb-4 text-primary">Investment & Fundraising</h4>
        <div class="separator separator-dashed  mb-3"></div>
        <div class="row">
            <div class="col-md-4">
                <p>
                    <strong>Current Stage</strong> <br>
                    <span>{{ $model->current_startup_stage }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong>Previous Investment Size</strong> <br>
                    <span>
                        ${{ number_format($model->previous_investment_size ?? 0) }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <strong>Type Of Investment</strong> <br>
                    <span class="uppercase">{{ $model->previous_investment_type }}</span>
                </p>
            </div>
            <div class="col-md-12 row mb-4">
                <div class="col-12">
                    <strong>Target Investors</strong>
                </div>
                @php
                    $tgtinvestor = $model == null ? ($target_investors = []) : explode(',', $model->target_investors);
                @endphp
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" name="target_investors[]" value="angel" id="angel"
                            {{ in_array('angel', $tgtinvestor) ? 'checked' : '' }} disabled>
                        Angel
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('investors', $tgtinvestor) ? 'checked' : '' }}
                            name="target_investors[]" value="investors" id="Investors"disabled>
                        Investors
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('VCs', $tgtinvestor) ? 'checked' : '' }}
                            name="target_investors[]" value="VCs" id="VCs"disabled>
                        VCs
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('Corporates', $tgtinvestor) ? 'checked' : '' }}
                            name="target_investors[]" value="Corporates" id="Corporates"disabled>
                        Corporates
                        <span class="rounded-0"></span>
                    </label>
                </div>
                <div class="col-md-4 my-1">
                    <label class="checkbox checkbox-info">
                        <input type="checkbox" {{ in_array('Grants', $tgtinvestor) ? 'checked' : '' }}
                            name="target_investors[]" value="Grants" id="Grants"disabled>
                        Grants
                        <span class="rounded-0"></span>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <p>
                    <strong> Target Investment Size</strong> <br>
                    <span>${{ number_format($model->target_investment_size ?? 0) }}</span>
                </p>
            </div>
            <div class="col-md-12">
                <strong class="mb-4"> Fundraising reason/ Breakdown </strong>
                <p style="text-align:justify">
                    <span>{{ $model->fundraising_breakdown }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
