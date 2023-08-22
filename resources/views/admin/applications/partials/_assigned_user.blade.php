@if($application->assignment)
    <div class="card shadow-none">
        <div class="card-body">
            <div class="accordion accordion-toggle-arrow mb-3" id="application-assigned-to">
                <div class="card">
                    <div class="card-header py-0">
                        <div class="card-title collapsed" data-toggle="collapse"
                             data-target="#application-assigned-to-section" aria-expanded="false">Application is
                            assigned to:
                        </div>
                    </div>
                    <div id="application-assigned-to-section" class="collapse" data-parent="#application-assigned-to"
                         style="">
                        <div class="row">
                            <div class="col-md-3">
                                <p class=" mt-3 ml-5 font-weight-bold">
                                    <strong>Name </strong>: {{optional($application->assignment->assignedTo)->name}}</p>
                            </div>
                            <div class="col-md-3">
                                <p class=" mt-3 font-weight-bold">
                                    <strong> Email </strong>: {{optional($application->assignment->assignedTo)->email}}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class=" mt-3 font-weight-bold font-size-medium ">
                                    <strong>Telephone</strong>
                                    : {{optional($application->assignment->assignedTo)->telephone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
