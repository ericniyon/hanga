<div class="modal fade" id="connectModal" tabindex="-1" aria-labelledby="connectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">
                    {{ __("app.Request connection") }}
                </h5>
                @include('partials.includes._close_modal_button')
            </div>
            <form action="" method="post" id="request-connection-form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="connect-services">{{ __("app.Select service you are interested in") }}:</label>
                        <select style="width: 100%" multiple required class="form-control"
                                data-placeholder="{{ __("app.Select Service") }}" name="services[]" id="connect-services"
                                tabindex="-1" aria-hidden="true">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">{{ __("app.Include a personal message") }} ({{ __("app.optional") }}):</label>
                        <textarea name="message" placeholder="" rows="5" maxlength="200"
                                  id="message"
                                  class="form-control"></textarea>
                        <small id="emailHelp" class="form-text text-muted">{{ __("app.No more than 200 characters") }}.</small>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="submit" class="btn btn-info btn-sm rounded text-white">
                        {{ __("app.Send Request") }}
                    </button>
                    <button type="button" class="btn btn-light btn-sm "
                            data-dismiss="modal">
                        {{ __("client_registration.close") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
