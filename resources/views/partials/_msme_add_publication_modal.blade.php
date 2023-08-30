<div class="modal fade" id="addpublicationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add Publication
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.team.member.store.publication') }}" id="formpub" method="post">
                @csrf
                <input type="hidden" name="id" id="solutionId" value="0">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" id="title" class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="custom-select">
                            <option value="">@lang('client_registration.choose')</option>
                            <option value="news">News</option>
                            <option value="event">Hosted In Event</option>
                            {{-- <option value="pmf">PMF</option> --}}
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
