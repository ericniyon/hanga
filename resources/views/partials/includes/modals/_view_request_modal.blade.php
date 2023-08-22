<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="viewModal">
                    {{ __('app.Request details') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <!--begin::User-->
                    <div class="mb-10">
                        <div class="symbol symbol-100 symbol-circle symbol-xl-150">
                            <div id="con-image" class="symbol symbol-100 symbol-light mr-5 symbol-circle">

                            </div>
                        </div>

                        <h4 id="con-requester_name" class="font-weight-bolder my-2">

                        </h4>
                        <div id="con-requester_bio" class="text-muted mb-2">

                        </div>
                    </div>
                    <!--end::User-->
                    <!--begin::Contact-->
                    <div class="mb-10">
                        <p id="con-request_massage">

                        </p>
                    </div>
                    <div class="mb-10">
                        <label for="">{{ __("app.Your services am interested in") }}:</label>
                        <div id="con-requester_services" class="text-muted mb-2">

                        </div>
                    </div>
                    <!--end::Contact-->
                    <!--begin::Nav-->
                    <a href="" id="btn-accept-request"
                       class="btn btn-success font-weight-bold  px-6  font-weight-bolder mr-5 text-white">
                                <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor"><path fill-rule="evenodd"
                                                               d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                               clip-rule="evenodd"/></svg>
                                </span>
                        {{ __("app.Accept") }}
                    </a>
                    <a href="" id="btn-ignore-request"
                       class="btn btn-secondary font-weight-bold  px-6  font-weight-bolder mr-5">
                        {{ __('app.Ignore') }}
                    </a>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-light text-uppercase btn-sm "
                            data-dismiss="modal">
                        {{ __("client_registration.close") }}

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
