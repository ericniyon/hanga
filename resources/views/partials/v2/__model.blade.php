<div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <div class="modal fade font-quicksand" id="ComplantsModal" aria-labelledby="ComplantsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0 pb-0">
                    <h4></h4>
                    <button type="button" class="close border border-3 border-info p-4 text-info" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true" class="text-info font-weight-bolder">&times;</span>
                    </button>
                </div>
                <form action="{{ route('select2') }}">
                    @csrf

                    <div class="modal-body pt-0">
                        <div class="text-center">
                            <img src="{{ asset('images/v2/feedback _1.png') }}" alt="Feedback" class="img-fluid">
                            <h4 class="text-info mb-10 mt-4 font-quicksand">
                                {!! __("app.feedback_modal_title") !!}
                            </h4>
                        </div>

                        <div class="my-4">
                            <label for="feedback" class="sr-only">Feedback</label>
                            <textarea  id="feedback"
                                      class="form-control rounded-0 border-2 border-info placeholder-dark" rows="8"
                                      placeholder="{{ __("app.Your feedback") }}"></textarea>
                        </div>

                        <div>
                            <select class="selectServices" name="addressed" multiple style="width: 100%" data-placeholder="select option">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                              </select>
                        </div>
                        <div class="my-4" >
                            <label for="document" class="sr-only">Select Document</label>
                            <input type="file" wire:model="document" class="form-control rounded-0 border-2 border-info placeholder-dark">
                        </div>

                        <p class="text-dark">
                            {{ __("app.Your feedback and information will be protected") }}.
                        </p>
                        <div class="my-4">
                            <button type="submit" class="btn btn-info rounded-pill w-100">
                                {{ __("app.send") }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function(){


            $('.selectServices').select2({
                theme:'bootstrap4'
            });
            $('.selectServices').on('change',function(e){

                console.log($(this).val())
                @this.set('addressed',$(this).val());


                // @this.set('addressed', $(this).val())
                // var data = $('.selectServices').select2("val");
                // console.log(data);
                // @this.set('addressed',data);
            });

        });
    </script>
    @endpush
</div>

