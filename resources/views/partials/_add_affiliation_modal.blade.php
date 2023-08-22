<div class="modal fade" id="addAffiliationModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __("app.Affiliation") }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.affiliations.store') }}" id="formSaveAffiliation" method="post">
                @csrf
                <input type="hidden" name="id" id="affiliationId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="employer_id" class="d-block">{{ __("app.Employer") }}</label>
                        <select name="employer_id" id="employer_id"
                                class="custom-select d-block" style="width: 100%">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">{{ __("client_registration.position") }}</label>
                        <input type="text" value=""
                               name="position" id="position"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">
                            {{ __("client_registration.description") }}
                        </label>
                        <textarea class="form-control" name="description"
                                  id="description"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
