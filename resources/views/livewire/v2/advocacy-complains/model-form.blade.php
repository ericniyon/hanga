<div>
    <style>
        .select2-container--classic .select2-selection--multiple{
            border: 2px solid #2a337e !important;
            border-radius: 0px !important;
            border-width: 2px !important;
            padding: 0.65rem 1rem !important;
            font-size: 1rem !important;


        }
    </style>
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">

    <script src="{{ asset('select2/js/select2.full.min.js') }}"></script>

        <div wire:ignore.self class="modal fade font-quicksand" role="dialog" id="ComplantsModal" aria-labelledby="ComplantsModalLabel"
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

                <form wire:submit.prevent="store">
                    @csrf

                    <div class="modal-body pt-0">
                        <div class="text-center">
                            <img src="{{ asset('images/v2/feedback _1.png') }}" alt="Feedback" class="img-fluid">
                            <h4 class="text-info mb-10 mt-4 font-quicksand">
                                {!! __("app.feedback_modal_title") !!}
                            </h4>
                        </div>
                        @error('feedback')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="my-4" wire:ignore>
                            <label for="feedback" class="sr-only">Feedback</label>
                            <textarea wire:model.defer="feedback" id="feedback"
                                      class="form-control rounded-0 border-2 border-info placeholder-dark summernote" rows="8"
                                      placeholder="{{ __("app.Your feedback") }}"></textarea>

                        </div>

                        <div wire:ignore>

                            <label for="">Select a Business or Tech Company Addressed To</label>
                            <select  class="selectServices form-control rounded-0 border-2 border-info placeholder-dark" wire:model.prevent="address" multiple style="width: 100%;height: 100%; border: 2px solid navy !important" >
                                @foreach ($clients as $item)

                                <option class="" value="{{ $item->id }}">{{ $item->application->dspRegistration->company_name??$item->name }}</option>
                                @endforeach
                              </select>
                              @error('address')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        <div>

                            <label for="">Choose from option below</label>
                            <select  class="form-control rounded-0 border-2 border-info placeholder-dark" wire:model.prevent="category">
                                <option class="" value="Complants">Complants</option>
                                <option class="" value="Issues">Issues</option>
                                <option class="" value="Suggestions">Suggestions</option>
                                <option class="" value="Recommandations">Recommandations</option>

                              </select>
                              @error('category')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        <div class="my-4" >
                            <label for="document" class="sr-only">Select Document</label>
                            <input type="file" wire:model="document" class="form-control rounded-0 border-2 border-info placeholder-dark">
                            @error('document')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="" wire:loading wire:target="document">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">uploading</div>
                                  </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    @push('scripts')
    <script>
        $(document).ready(function(){

            $('.selectServices').select2({
                theme: 'classic',
                placeholder: "Select a Business or Tech Company Addressed To",
                allowClear: true,
                containerCssClass: "pink",
                templateResult: function (data, container) {
                    if (data.element) {
                    $(container).addClass($(data.element).attr("class"));
                    }
                    return data.text;
                }
        });
            $('.selectServices').on('change',function(e){
                @this.set('addressed',$(this).val());
            });


        });

        $(document).ready(function() {

            $('#feedback').summernote({
            height:200,

            callbacks: {
            onChange: function(contents, $editable) {


            @this.set('feedback', contents);
      }
  }
        });
    });
    </script>


    @endpush
</div>

