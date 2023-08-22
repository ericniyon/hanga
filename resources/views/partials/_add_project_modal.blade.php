<div class="modal fade" id="addAddProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('client_registration.Project')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.projects.store') }}" id="formSaveProject" method="post">
                @csrf
                <input type="hidden" name="id" id="projectId" value="0">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="project_name">@lang('client_registration.title')</label>
                        <input type="text" name="name" id="project_name" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="client_name">@lang('client_registration.client_name')</label>
                        <input type="text" name="client_name" id="client_name" class="form-control rounded">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">@lang('client_registration.start_date')</label>
                                <input type="text" name="start_date" id="start_date" class="form-control rounded datepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">@lang('client_registration.end_date')</label>
                                <input type="text" name="end_date" id="end_date" class="form-control rounded datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="project_description">@lang('client_registration.description')</label>
                        <textarea name="description" id="project_description"
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
