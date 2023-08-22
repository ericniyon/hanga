<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="connectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">
                    {{ __("app.Rating and reviews") }}
                </h5>
                @include('partials.includes._close_modal_button')
            </div>
            <form action="" method="post" id="post-rating-form">
                <input type="hidden" name="rating">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message">{{ __("app.Select rating of your choice") }}:</label>
                        <div class="rating-icons"></div>
                    </div>
                    <div class="form-group">
                        <label for="comment">{{ __("app.Additional Comment") }} ({{ __("app.optional") }}):</label>
                        <textarea name="comment" placeholder="" maxlength="200" rows="5"
                                  id="comment"
                                  class="form-control border-info border-2"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="submit" class="btn btn-info text-white" id="rating-button"
                            disabled>
                        {{ __("app.Post Rating") }}
                    </button>
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">
                        {{ __("client_registration.close") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
