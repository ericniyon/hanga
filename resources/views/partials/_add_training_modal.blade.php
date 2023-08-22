<div class="modal fade" id="addTrainingModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @lang('client_registration.certificates_n_trainings')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.trainings.store') }}" enctype="multipart/form-data" id="formSaveTraining"
                  method="post">
                @csrf
                <input type="hidden" name="id" id="trainingId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="training_name">@lang('client_registration.name')</label>
                        <input type="text" name="name" id="training_name"
                               class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="issuer">@lang('client_registration.issuer')</label>
                        <input type="text" name="issuer" id="issuer"
                               class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="issuance_date">@lang('client_registration.issue_date')</label>
                        <input type="text" name="issue_date" id="issuance_date" max="{{ now()->format('Y-m-d') }}"
                               class="form-control rounded datepicker">
                    </div>

                    <div class="form-group">
                        <label for="tr_supporting_document">
                            @lang('client_registration.supporting_document')
                            @include('partials._default_allowed_file_info')
                        </label>
                        <div class="custom-file">
                            <input type="file" name="supporting_document" class="custom-file-input"
                                   id="tr_supporting_document">
                            <label class="custom-file-label"
                                   for="tr_supporting_document">@lang('client_registration.choose_file')</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
