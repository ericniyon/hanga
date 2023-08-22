<div class="modal fade" id="reviewsModal" tabindex="-1" aria-labelledby="connectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">
                    {{ __("app.Rating and reviews") }}
                </h5>
                @include('partials.includes._close_modal_button')
            </div>
            <input type="hidden" name="rating">
            @csrf
            <div class="modal-body" onscroll="onScrollModal(this)">
                <div class="loader-div text-center" style="margin: 100px;display: none">
                    <img src="{{asset('frontend/assets/loader2.svg')}}" style="height: 100px;width: 100px"
                         alt="loader">
                </div>
                <div class="reviews-body"></div>

                <div class="loader-more text-center" style="visibility: hidden">
                    <img src="{{asset('frontend/assets/loader2.svg')}}" style="height: 50px;width: 50px"
                         alt="loader">
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-light btn-sm "
                        data-dismiss="modal">
                    {{ __("client_registration.close") }}
                </button>
            </div>
        </div>
    </div>
</div>
