@php
    $team = \App\Models\StartupCompanyTeam::where('client_id', '=', $model->id ?? 0)
        ->latest()
        ->get();
@endphp
<div class="card gutter-b rounded">
    <div class="card-body">

        <h4 class="font-weight-bolder mb-4 text-primary">Team</h4>
        <div class="accordion accordion-toggle-arrow rounded " id="awardAccordion">
            @forelse($team as $item)
                <div class="card rounded">
                    <div class="card-header rounded">
                        <div class="card-title collapsed d-flex align-items-center justify-content-between"
                            data-toggle="collapse" data-target="#award{{ $item->id }}">
                            <span class="capitalize">{{ $item->team_firstname }} {{ $item->team_lastname }} </span>
                            <span
                                class="label label-inline label-info rounded-xl d-block mr-10">{{ $item->team_position }}</span>
                        </div>
                    </div>
                    <div id="award{{ $item->id }}" class="collapse" data-parent="#awardAccordion">
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
                                    <a href="{{ $item->team_linkedin }}" target="_blank">{{ $item->team_linkedin }}</a>
                                </div>
                                <div class="col-6">
                                    <strong class="d-block">Email</strong>
                                    <a href="mailto:{{ $item->team_email }}">{{ $item->team_email }}</a>
                                </div>
                                <div class="col-6">
                                    <strong class="d-block">Phone</strong>
                                    <a href="tel:{{ $item->team_phone }}">{{ $item->team_phone }}</a>
                                </div>
                                <div class="col-12 mt-4">
                                    <strong class="d-block">{{ __('client_registration.description') }}</strong>
                                    <p>{{ $item->team_description }}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @empty
                <div class="alert bg-light-info rounded">
                    {{ __('app.No certification / Standard / Award added yet') }}
                </div>
            @endforelse
        </div>

    </div>
</div>
