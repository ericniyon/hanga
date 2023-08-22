<!-- Modal -->
<div class="modal fade " id="feedbackModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content page1-->
        <div style="" class="modal-content" id="main_popup">
            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="col-lg-12">
                    <button type="button" class="close close_model" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle
                                "></span>
                    </button>
                </div>
                <div class="mx-auto">
                    <img src="{{ asset('images/feedback.jpg') }}"/>
                </div>
                <div class="text-center">
                    <h3>{{ __("app.feedback_modal_title") }}</h3>
                </div>
                <div class="row text-center mx-auto">

                    <button type="button" id="give_feedback" class="btn btn-primary">Give Feedback</button>

                </div>
            </div>
        </div>
        <!--END Modal content page1-->
        <!-- Modal content page2-->
        <div id="page2" style="display:none;" class="modal-content" style="box-shadow:none;">
            <div class="modal-header d-flex justify-content-center ">
                <h4 class="modal-title text-center"> Your Feedback</h4>
            </div>
            <div class="modal-body second_tab">
                <form action="{{ route('save.feedback') }}" method="POST" id="feedbackForm">
                    @csrf
                    <div class="form-group row">
                        {{-- <label for="">@lang('client_registration.names')</label> --}}
                        <input type="text" class="form-control rounded-0" value="{{auth()->user()->name ?? ''}}"
                               name="names" placeholder="@lang('client_registration.names')" required>
                    </div>
                    <div class="form-group row">
                        {{-- <label for="">@lang('client_registration.email_address')</label> --}}
                        <input type="email" class="form-control rounded-0" value="{{auth()->user()->email ?? ''}}"
                               name="email" placeholder="@lang('client_registration.email_address')" required>
                    </div>
                    <div class="form-group row">
                        {{-- <label for="">@lang('auth.phone_number')</label> --}}
                        <input type="text" class="form-control rounded-0" value="{{auth()->user()->phone ?? ''}}"
                               name="phone" placeholder="@lang('auth.phone_number')" required>
                    </div>
                    <div class="form-group row">
                        {{-- <label for="Feedback">@lang('feedback')</label> --}}
                        <textarea name="feedback" id="feedback" class="form-control rounded-0" rows="5"
                                  placeholder="Your Feedback" required></textarea>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary rounded-0" id="submitBtn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Modal content page2-->
        <!-- Modal content page 4-->
        <div id="page4" style="display:none;" class="modal-content">
            <div class="modal-body ">
                <div class="col-lg-12">
                    <button type="button" class="close close_model" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle
                                        "></span>
                    </button>
                </div>
                <div class="thank_you_body">
                    <div class="text-center my-10">
                        <h3>
                            <span>Thank you</span><br> Your feedback was sent perfectly.
                            <br>
                            {{-- <br>
                            <br>
                            <br>
                            We appreciate your feedback and want to make sure we meet your expectations. --}}
                        </h3>

                    </div>
                    <div class="row text-center d-flex justify-content-center mt-5">

                        <button type="submit" class="btn btn-default " data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>

        </div>
        <!--End Modal content page 4-->
    </div>
</div>
@push('custom-scripts')
    <script type="text/javascript">
        $(document).on('click', "#feedbackBtn", function (e) {
            $("#main_popup").show();
            $("#page4").hide();
            $("#page2").hide();
        });
        $(document).on('click', "#give_feedback,#arr3", function (e) {
            e.preventDefault();
            $("#page2").show();
            $("#page4").hide();
            $("#main_popup").hide();
        });
        $(document).on('submit', '#feedbackForm', function (e) {
            e.preventDefault();
            var btn = $('#submitBtn');
            btn.addClass('spinner spinner-darker-primary spinner-left mr-3');
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    btn.removeClass('spinner spinner-darker-primary spinner-left mr-3');
                    $("#page2").hide();
                    $("#main_popup").hide();
                    $("#page4").show();
                }
            })
        })
    </script>
@endpush
