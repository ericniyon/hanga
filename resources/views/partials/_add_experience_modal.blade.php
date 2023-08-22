<div class="modal fade" id="addExperienceModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @lang('client_registration.previous_experience')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.experience.store') }}" id="formSaveExperience" method="post">
                @csrf
                <input type="hidden" name="id" id="experienceId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="service_offered">@lang('client_registration.service_offered')</label>
                        <input type="text" name="service_offered" id="service_offered" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="experience_client">@lang('client_registration.client_name')</label>
                        <input type="text" name="client" id="experience_client" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="year_of_completion">@lang('client_registration.year_of_completion')</label>
                        <input type="number" min="{{ now()->year-50 }}" name="year_of_completion"
                               id="year_of_completion" max="{{ now()->year }}"
                               class="form-control rounded yearpicker">
                    </div>
                    <div class="form-group">
                        <label for="experience_description">@lang('client_registration.description')</label>
                        <textarea name="description" id="experience_description"
                                  class="form-control rounded"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
