@extends('client.v2.layout.app')
@section('title', 'Company application details')
@section('styles')
    @livewireStyles
@stop
@section('content')
    @if (Auth::guard('client')->check())
        @include('partials.includes._home_nav')
    @endif
    <div class="container my-5">
        <div>
            <div>
                <div class="h-80px bg-light-light w-100 rounded d-none d-md-block"></div>

                <div class="px-4 mt-md-n15 mt-0" style="z-index: 2001;top: 20px;background-color: rgba(255,255,255,0.1);">
                    <span class="badge bg-light-info rounded-pill">STARTUP</span>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <!--begin::User-->
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div
                                        class="symbol symbol-60 symbol-xl-100 symbol-xxl-150 mr-5 align-self-start align-self-xxl-start mt-2">
                                        <div class="symbol-label rounded-lg shadow-sm"
                                            style="background-image:url('{{ Storage::disk('logos')->url($model->logo) }}');background-size: contain">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mt-0 mb-1 ">
                                            <span class="font-weight-boldest font-size-h3 text-info">
                                                {{ $model->company_name }}
                                            </span>
                                        </div>
                                        <div class="align-self-start">
                                            <span
                                                class="badge badge-info rounded-lg font-weight-bold align-self-start m-1">{{ $category->startup_categoty_name }}</span>
                                        </div>
                                        <p class="my-1">
                                            {{ $model->bio }}
                                        </p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                    id="accordion1">
                                                    <div
                                                        class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                                                        <div class="card-header">
                                                            <div class="card-title collapsed pr-3" data-toggle="collapse"
                                                                data-target="#collapse3">
                                                                <div class="card-label pl-4">
                                                                    <span class="svg-icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-6 w-6" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                                                                        </svg>
                                                                    </span>
                                                                    iHUZO Reviews
                                                                    {{-- {{ $item->name ? $item->name :"" }} --}}
                                                                </div>
                                                                <span class="svg-icon svg-icon-primary">
                                                                    @include('partials.icons._sort')
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div id="collapse3" class="collapse " data-parent="#accordion1">
                                                            <div class="card-body p-2 bg-white ">
                                                                <div class="p-2">
                                                                    <div class="checkbox-list">
                                                                        <p
                                                                            style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                                                            {{-- {!! $item->complaint ? html_entity_decode($item->complaint) : '' !!} --}}
                                                                            {{-- {{ __('app.Rate') }} --}}
                                                                        <div class="d-flex mb-3">
                                                                            <x-rating-item :client="$client" />
                                                                        </div>
                                                                        <strong class="font-weight-boldest">
                                                                            {{ number_format($client->ratings_count) }}
                                                                            {{ __('app.Reviews') }}
                                                                        </strong>
                                                                        </p>
                                                                        <p
                                                                            style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                                                            {{-- {!! $item->complaint ? html_entity_decode($item->complaint) : '' !!} --}}
                                                                            {{ __('Average ratings') }}
                                                                            <strong class="font-weight-boldest">
                                                                                {{ $client->ratingAverage() }}

                                                                            </strong>
                                                                        </p>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            {{-- second accordion --}}
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                                    id="accordion11">
                                                    <div
                                                        class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                                                        <div class="card-header">
                                                            <div class="card-title collapsed pr-3" data-toggle="collapse"
                                                                data-target="#collapse2">
                                                                <div class="card-label pl-4">
                                                                    <span class="svg-icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-6 w-6" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                                                                        </svg>
                                                                    </span>
                                                                    Google Reviews
                                                                    {{-- {{ $item->name ? $item->name :"" }} --}}
                                                                </div>
                                                                <span class="svg-icon svg-icon-primary">
                                                                    @include('partials.icons._sort')
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div id="collapse2" class="collapse" data-parent="#accordion11">
                                                            <div class="card-body p-2 bg-white ">
                                                                <div class="p-2">
                                                                    <div class="checkbox-list">
                                                                        <p
                                                                            style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                                                            {{-- {!! $item->complaint ? html_entity_decode($item->complaint) : '' !!} --}}
                                                                            {{-- {{ __('app.Rate') }} --}}
                                                                        <div class="d-flex mb-3">
                                                                            <x-google-ratings :client="$client" />
                                                                        </div>
                                                                        <strong class="font-weight-boldest">
                                                                            {{-- @forelse (\App\Models\GoogleRatings::where('client_id', $client->id)->get() as $__item)
                                                                                {{ number_format(\App\Models\GoogleRevers::where('google_rating', $__item->id)->count()) }}
                                                                                {{ __('app.Reviews') }}
                                                                            @empty
                                                                                {{ number_format(0) }}
                                                                                {{ __('app.Reviews') }}
                                                                            @endforelse --}}
                                                                        </strong>
                                                                        </p>
                                                                        <p
                                                                            style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                                                            {{-- {!! $item->complaint ? html_entity_decode($item->complaint) : '' !!} --}}
                                                                            {{ __('Average ratings') }}
                                                                            <strong class="font-weight-boldest">
                                                                                {{-- {{ $client->ratingAverage() }} --}}

                                                                            </strong>
                                                                        </p>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            {{-- second accordion --}}
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @include('partials.includes._rating_button')
                                        </div>
                                    </div>
                                </div>
                                <!--end::User-->

                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div
                                class="d-flex align-items-md-end align-items-center flex-column justify-content-center pt-8 mb-4">
                                @if ($model->website)
                                    <a href="{{ $model->website }}" target="_blank"
                                        class="btn btn-primary text-white w-100 my-2 w-md-150px border-2 rounded shadow">
                                        {{ __('app.Visit') }} {{ __('client_registration.website') }}
                                    </a>
                                @endif
                                @if ($model->pitch_deck)
                                    <a href="{{ Storage::disk('pitch_deck')->url($model->pitch_deck) }}" target="_blank"
                                        class="btn btn-outline-primary w-100 my-2 w-md-150px border-2 rounded shadow btn-connect">
                                        Pitch Deck
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                        </span>
                        {{ __('client_registration.phone') }}:
                        <a href="tel:{{ $model->phone }}" class="text-dark">
                            {{ $model->phone }}
                        </a>
                    </div>
                    <div class="col-md-3">
                        <span class="svg-icon text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        {{ __('client_registration.email') }}:
                        <a href="mailto:{{ $model->email }}" class="text-dark">
                            {{ $model->email }}
                        </a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills custom-navs justify-content-between border-bottom border-bottom-light"
                            id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold active" id="messages-tab"
                                    data-toggle="tab" href="#messages" role="tab" aria-controls="messages"
                                    aria-selected="false">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="settings-tab"
                                    data-toggle="tab" href="#settings" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    Startup Team
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="services-tab"
                                    data-toggle="tab" href="#services" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    {{ __('client_registration.products') }}
                                    / {{ __('client_registration.services') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="businessModel-tab"
                                    data-toggle="tab" href="#businessModel" role="tab" aria-controls="businessModel"
                                    aria-selected="false">
                                    Business Model
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="traction-tab"
                                    data-toggle="tab" href="#traction" role="tab" aria-controls="traction"
                                    aria-selected="false">
                                    Traction
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="investment-tab"
                                    data-toggle="tab" href="#investment" role="tab" aria-controls="investment"
                                    aria-selected="false">
                                    Investment & Fundraising
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 text-dark-75 font-weight-bold" id="reviews-tab"
                                    data-toggle="tab" href="#reviews" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    {{ __('app.Rating and reviews') }}
                                    <span class="p-2 font-weight-boldest ml-2 badge badge-primary text-white badge-pill">
                                        {{ $client->ratings_count }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content container-fluid mt-10">

                            <div class="tab-pane py-4 active" id="messages" role="tabpanel"
                                aria-labelledby="messages-tab">
                                <div class="mb-5 mt-4">
                                    <div>
                                        <span class="text-primary">Category</span>
                                    </div>
                                    <div>
                                        <h6>
                                            {{ $category->startup_category_name }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div>
                                        <span class="text-primary">Interest</span>
                                    </div>
                                    <div>
                                        <h6>
                                            {{ $subCategory->startup_sub_category_name }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="text-primary">
                                        Problem
                                    </div>
                                    <div>
                                        <p class="text-justify">
                                            {{ $model->problem }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="text-primary">
                                        Mission
                                    </div>
                                    <div>
                                        <p class="text-justify">
                                            {{ $model->mission }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane py-4" id="settings" role="tabpanel" aria-labelledby="settings-tab">

                                <div class="my-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="font-weight-bolder mb-4 mt-4">
                                            Team Members
                                            [{{ $teamMembers->count() }}]
                                        </h6>

                                    </div>
                                    <div class="accordion accordion-toggle-arrow rounded " id="awardAccordion">
                                        @forelse($teamMembers as $item)
                                            <div class="card rounded mb-3">
                                                <div class="card-header rounded">
                                                    <div class="card-title collapsed d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse" data-target="#award{{ $item->id }}">
                                                        <span class="capitalize">{{ $item->team_firstname }}
                                                            {{ $item->team_lastname }} </span>
                                                        <span
                                                            class="label label-inline label-info rounded-xl d-block mr-10">{{ $item->team_position }}</span>
                                                    </div>
                                                </div>
                                                <div id="award{{ $item->id }}" class="collapse"
                                                    data-parent="#awardAccordion">
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <strong>Name</strong>
                                                                <p>
                                                                    <span>{{ $item->team_firstname . ' ' . $item->team_firstname }}</span>-
                                                                    <span>{{ $item->team_position }}</span>
                                                                </p>

                                                            </div>
                                                            <div class="col-6">
                                                                <strong class="d-block">LinkedIn profile</strong>
                                                                <a href="{{ $item->team_linkedin }}"
                                                                    target="_blank">{{ $item->team_linkedin }}</a>
                                                            </div>
                                                            <div class="col-6">
                                                                <strong class="d-block">Email</strong>
                                                                <a
                                                                    href="mailto:{{ $item->team_email }}">{{ $item->team_email }}</a>
                                                            </div>
                                                            <div class="col-6">
                                                                <strong class="d-block">Phone</strong>
                                                                <a
                                                                    href="tel:{{ $item->team_phone }}">{{ $item->team_phone }}</a>
                                                            </div>
                                                            <div class="col-12 mt-4">
                                                                <strong
                                                                    class="d-block">{{ __('client_registration.description') }}</strong>
                                                                <p>{{ $item->team_description }}</p>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert bg-light-info rounded">
                                                No Team Mate Added Yet!
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>

                            {{-- solution Tab --}}
                            <div class="tab-pane py-4" id="services" role="tabpanel" aria-labelledby="services-tab">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="font-weight-bolder mb-4 mt-4">
                                        {{ __('client_registration.products') }}
                                        / {{ __('client_registration.solutions') }}
                                        [{{ $solutions->count() }}]
                                    </h4>
                                </div>


                                <div class="accordion accordion-toggle-arrow" id="accrodionProductServices">
                                    @foreach ($solutions as $item)
                                        <div class="card rounded mb-4">
                                            <div class="card-header rounded">
                                                <div class="card-title collapsed d-flex align-items-center justify-content-between"
                                                    data-toggle="collapse" data-target="#collapse2{{ $item->id }}">
                                                    <span>{{ $item->name }}</span>
                                                    <span
                                                        class="label label-inline label-light-primary rounded d-block mr-10">{{ $item->product_type }}</span>
                                                </div>
                                            </div>
                                            <div id="collapse2{{ $item->id }}" class="collapse"
                                                data-parent="#accrodionProductServices">
                                                <div class="card-body">

                                                    <div>
                                                        <strong
                                                            class="d-block">{{ __('client_registration.description') }}</strong>
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
                                                                <strong>Product Url:</strong>
                                                                <a href="{{ str_starts_with($item->product_link, 'http') ? $item->product_link : 'http://' . $item->product_link }}"
                                                                    target="_blank">
                                                                    {{ $item->name }}-Link
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

                            {{-- Business Model Tab --}}
                            <div class="tab-pane py-4" id="businessModel" role="tabpanel"
                                aria-labelledby="businessModel-tab">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="font-weight-bolder mb-4 mt-4">
                                        Business Model
                                    </h4>
                                </div>

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
                                        <div class="col-md-4 my-1"
                                            style="display:{{ in_array('B2B', $bsmodel) ? '' : 'none !important' }}">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox" {{ in_array('B2B', $bsmodel) ? 'checked' : '' }}
                                                    name="business_model[]" value="B2B" id="angel" disabled>
                                                B2B
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1"
                                            style="display:{{ in_array('B2B', $bsmodel) ? '' : 'none !important' }}"
                                            {{ in_array('B2C', $bsmodel) ? 'checked' : '' }}>
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox" {{ in_array('B2C', $bsmodel) ? 'checked' : '' }}
                                                    name="business_model[]" value="B2C" id="angel" disabled>
                                                B2C
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1"
                                            style="display:{{ in_array('B2B', $bsmodel) ? '' : 'none !important' }}">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox" {{ in_array('B2B2C', $bsmodel) ? 'checked' : '' }}
                                                    name="business_model[]" value="B2B2C" id="angel" disabled>
                                                B2B2C
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1"
                                            style="display:{{ in_array('B2B', $bsmodel) ? '' : 'none !important' }}">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox" {{ in_array('C2C', $bsmodel) ? 'checked' : '' }}
                                                    name="business_model[]" value="C2C" id="angel" disabled>
                                                C2C
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1"
                                            style="display:{{ in_array('B2B', $bsmodel) ? '' : 'none !important' }}">
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

                            {{-- Traction Tab --}}
                            <div class="tab-pane py-4" id="traction" role="tabpanel" aria-labelledby="traction-tab">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="font-weight-bolder mb-4 mt-4">
                                        Traction
                                    </h4>
                                </div>

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


                                @if (count($publications) > 0)
                                    <h4 class="font-weight-bolder mb-4 mt-4 text-primary">Publications </h4>
                                    <div class="accordion accordion-toggle-arrow" id="accordionExample2">
                                        @foreach ($publications as $item)
                                            <div class="card rounded mb-4">
                                                <div class="card-header rounded">
                                                    <div class="card-title collapsed d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#collapse2{{ $item->id }}">
                                                        <span>{{ $item->title }}</span>
                                                        <span
                                                            class="label label-inline label-light-primary rounded d-block mr-10">{{ $item->product_type }}</span>
                                                    </div>
                                                </div>
                                                <div id="collapse2{{ $item->id }}" class="collapse"
                                                    data-parent="#accordionExample2">
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
                                @endif
                            </div>

                            {{-- Traction Tab --}}
                            <div class="tab-pane py-4" id="investment" role="tabpanel" aria-labelledby="investment-tab">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="font-weight-bolder mb-4 mt-4">
                                        Investment & Fundraising
                                    </h4>
                                </div>

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
                                                <input type="checkbox" name="target_investors[]" value="angel"
                                                    id="angel" {{ in_array('angel', $tgtinvestor) ? 'checked' : '' }}
                                                    disabled>
                                                Angel
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox"
                                                    {{ in_array('investors', $tgtinvestor) ? 'checked' : '' }}
                                                    name="target_investors[]" value="investors" id="Investors"disabled>
                                                Investors
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox"
                                                    {{ in_array('VCs', $tgtinvestor) ? 'checked' : '' }}
                                                    name="target_investors[]" value="VCs" id="VCs"disabled>
                                                VCs
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox"
                                                    {{ in_array('Corporates', $tgtinvestor) ? 'checked' : '' }}
                                                    name="target_investors[]" value="Corporates" id="Corporates"disabled>
                                                Corporates
                                                <span class="rounded-0"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 my-1">
                                            <label class="checkbox checkbox-info">
                                                <input type="checkbox"
                                                    {{ in_array('Grants', $tgtinvestor) ? 'checked' : '' }}
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

                            {{-- reviews Tab --}}
                            <div class="tab-pane py-4" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <livewire:v2.reviews :model="$client" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


@stop

@push('scripts')
    @livewireScripts
@endpush

@section('scripts')


@stop
