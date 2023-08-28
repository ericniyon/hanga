<div class="modal fade" id="addAddSolutionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('client_registration.product')/@lang('client_registration.solution')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.solution.save.startup') }}" id="formSaveSolution" method="post">
                @csrf
                <input type="hidden" name="id" id="solutionId" value="0">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="solution_type">@lang('client_registration.product_type')</label>
                        <select name="solution_type" id="solution_type" class="custom-select">
                            <option value="">@lang('client_registration.choose')</option>
                            {{-- @foreach (\App\Models\ApplicationSolution::types() as $item) --}}
                            <option value="hardware">Hardware</option>
                            <option value="software">Software</option>
                            <option value="product">Product</option>
                            <option value="service">Service</option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="solution_name">@lang('client_registration.name')</label>
                        <input type="text" name="name" id="solution_name" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="solution_description">@lang('client_registration.description')</label>
                        <textarea rows="7" name="description" id="solution_description" class="form-control rounded"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="solution_status">Status</label>
                        <select name="solution_status" id="solution_status" class="custom-select">
                            <option value="">@lang('client_registration.choose')</option>
                            <option value="prototype">Prototype</option>
                            <option value="mvp">MVP</option>
                            <option value="pmf">PMF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="active_users">Active Users</label>
                        <input type="text" name="active_users" id="active_users" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="text" name="capacity" id="capacity" class="form-control rounded">
                    </div>
                    <div class="form-group">
                        <label for="product_link">Product Link (Optional)</label>
                        <input type="text" name="product_link" id="product_link" class="form-control rounded">
                    </div>

                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
