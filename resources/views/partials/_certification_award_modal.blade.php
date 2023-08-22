<div class="modal fade" id="addCertificateModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __("app.Certifications / Awards") }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.awards.store') }}" id="formCertificate" method="post">
                @csrf
                <input type="hidden" name="id" id="certificateId" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="certificate_name">{{ __("client_registration.name") }}</label>
                        <input type="text" name="name" id="certificate_name" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="certificate_category">
                            {{ __("client_registration.category") }}
                        </label>
                        <select name="category" id="certificate_category" class="custom-select">
                            <option value="">{{ __("client_registration.choose") }}</option>
                            @foreach(\App\Models\CertificationAward::categories() as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="issue_date">{{ __("client_registration.issue_date") }}</label>
                                <input type="text" name="issue_date" id="issue_date"
                                       class="form-control rounded datepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expiry_date">{{ __("app.Expiry date") }}</label>
                                <input type="text" name="expiry_date" id="expiry_date"
                                       class="form-control rounded datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="certification_description">
                            {{ __("client_registration.description") }}
                        </label>
                        <textarea name="description" id="certification_description"
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


<script>
    function initializeCertificationAward() {
        $('#addCertificateButton').on('click', function () {
            $('#certificateId').val(0);
            $('#addCertificateModal').modal();
        });

        let formCertificate = $('#formCertificate');
        formCertificate.validate();
        formCertificate.on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find(':submit');
            if (!form.valid()) return;

            btn.addClass('spinner spinner-right spinner-white')
                .prop('disabled', true);

            let data = form.serializeArray();
            data.push({name: 'application_id', value: $('#application_id').val()});

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: data,
                completed: function (response) {

                }, success: function (response) {
                    location.reload();
                }, error: function (response) {
                    btn.removeClass('spinner spinner-right spinner-white')
                        .prop('disabled', false);
                }
            })


        });

        $('.js-edit-certification').on('click', function () {
            $('#certificateId').val($(this).data('id'));
            $('#certificate_name').val($(this).data('name'));
            $('#certificate_category').val($(this).data('category'));
            $('#certification_description').val($(this).data('description'));
            $('#issue_date').val($(this).data('issue_date'));
            $('#expiry_date').val($(this).data('expiry_date'));

            $('#addCertificateModal').modal();
        });
    }
</script>
