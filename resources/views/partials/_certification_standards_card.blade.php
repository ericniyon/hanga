@php
    $awards=\App\Models\CertificationAward::where('application_id','=',$model->application_id??0 )->latest()->get();
@endphp
<div class="card gutter-b rounded {{ $cardClasses }}">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="font-weight-bolder mb-0">
                {{ __("app.Certificate standard award") }} ({{ $awards->count() }})
            </h4>

            @if($application->canUpdateInfo && $editable)
                <button type="button"
                        class="btn btn-sm btn-light-info rounded btn-hover-text-white font-weight-bolder"
                        id="addCertificateButton">
                    @include('partials._plus_icon')
                    {{ __("client_registration.add_new") }}
                </button>
            @endif
        </div>


        <div class="accordion accordion-toggle-arrow rounded " id="awardAccordion">
            @forelse($awards as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div
                                class="card-title collapsed d-flex align-items-center justify-content-between"
                                data-toggle="collapse"
                                data-target="#award{{$item->id}}">
                            <span>{{ $item->name }}</span>
                            <span
                                    class="label label-inline label-info rounded-xl d-block mr-10">{{ $item->category }}</span>
                        </div>
                    </div>
                    <div id="award{{$item->id}}" class="collapse"
                         data-parent="#awardAccordion">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <p>
                                        <strong>{{ __("client_registration.issue_date") }}</strong>
                                        <span>{{ optional($item->issue_date)->toDateString()??'N/A' }}</span>,
                                        <strong>{{ __("app.Expiry date") }}</strong>
                                        <span>{{ optional($item->expiry_date)->toDateString()??'N/A' }}</span>
                                    </p>

                                </div>
                                <div class="col-12">
                                    <strong class="d-block">{{ __("client_registration.description") }}</strong>
                                    <p>{{ $item->description }}</p>
                                </div>
                                @if($application->canUpdateInfo && $editable)
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-start">

                                            <x-edit-button
                                                    classes="js-edit-certification mr-4"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-description="{{ $item->description }}"
                                                    data-category="{{ $item->category }}"
                                                    data-issue_date="{{ optional($item->issue_date)->toDateString() }}"
                                                    data-expiry_date="{{ optional($item->expiry_date)->toDateString() }}"/>
                                            <x-delete-button
                                                    :href="route('client.awards.destroy',encryptId($item->id))"/>

                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            @empty
                <div class="alert bg-light-info rounded">
                    {{ __("app.No certification / Standard / Award added yet") }}
                </div>
            @endforelse
        </div>

    </div>
</div>
