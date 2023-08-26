<div class="modal fade" id="addAddTeamMateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add Team Member
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.team.member.store.startup') }}" id="formSaveTeam" method="post">
                @csrf
                <input type="hidden" name="id" id="solutionId" value="0">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="team_firstname">firstname</label>
                        <input type="text" name="team_firstname" id="team_firstname" class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="team_lastname">Lastname</label>
                        <input type="text" name="team_lastname" id="team_lastname" class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="team_phone">Phone</label>
                        <input type="text" name="team_phone" id="team_phone" class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="team_email">Email</label>
                        <input type="text" name="team_email" id="team_email" class="form-control rounded">
                    </div>

                    <div class="form-group">
                        <label for="team_position">Position</label>
                        <input type="text" name="team_position" id="team_position" class="form-control rounded">
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
