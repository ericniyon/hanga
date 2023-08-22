<div class="modal fade" id="addAddSolutionModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('client_registration.product')/@lang('client_registration.solution')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('client.solutions.store') }}" enctype="multipart/form-data" id="formSaveSolution"
                  method="post">
                @csrf
                <input type="hidden" name="id" id="solutionId" value="0">
                <div class="modal-body scroll overflow-hidden"  style="max-height: 500px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="solution_type">@lang('client_registration.product_type')</label>
                                <select name="solution_type" id="solution_type"
                                        class="custom-select custom-select-sm rounded-sm">
                                    <option value="">@lang('client_registration.choose')</option>
                                    @foreach(\App\Models\ApplicationSolution::types() as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="solution_name">@lang('client_registration.name')</label>
                                <input type="text" name="name" id="solution_name"
                                       class="form-control form-control-sm rounded-sm">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="solution_description">@lang('client_registration.description')</label>
                        <textarea name="description" id="solution_description"
                                  class="form-control form-control-sm rounded-sm"></textarea>
                    </div>
                    <div>
                        <h6>@lang('client_registration.type_of_platform')</h6>
                        <div class="row">
                            @foreach(\App\Models\PlatformType::all() as $item)
                                <div class="col-md-4">
                                    <div class="my-2">
                                        <input type="hidden" name="platformTypes[]"
                                               value="{{ $item->id }}"/>
                                        <label for="link{{ $item->id }}">{{ $item->name }}</label>
                                        <input type="url" name="platforms[]" id="link{{ $item->id }}"
                                               class="form-control form-control-sm rounded-sm" placeholder="{{ __("app.Link") }}"/>

                                    </div>

                                </div>
                            @endforeach

                            <div class="col">
                                <div class="hide mt-5" id="has-api-div">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>@lang('client_registration.does_your_product_has_an_open_api')
                                                    ?</label>
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input name="has_api" type="radio"
                                                               value="1"/> @lang('client_registration.yes')
                                                        <span></span>
                                                    </label>
                                                    <label class="radio">
                                                        <input name="has_api" type="radio"
                                                               value="0"/> @lang('client_registration.no')
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>{{ __("app.Product logo") }}</label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="logo">
                                                    <label class="custom-file-label" for="logo">Choose</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div id="api-description" class="hide">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="api_name">@lang('client_registration.api_name')</label>
                                        <input type="text" name="api_name" class="form-control" id="api_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="api_link">@lang('client_registration.api_link')</label>
                                        <input type="url" name="api_link" class="form-control" id="api_link">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="api_description">@lang('client_registration.api_description')</label>
                                <textarea name="api_description" class="form-control"
                                          id="api_description"></textarea>
                            </div>

                        </div>
                    </div>
                    <h4>{{ __("app.Contact person") }}</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cp_name">{{ __("client_registration.name") }}</label>
                                <input type="text" name="dsp_name" id="cp_name"
                                       class="form-control form-control-sm rounded-sm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cp_email">{{ __('client_registration.email') }}</label>
                                <input type="email" name="email" id="cp_email"
                                       class="form-control form-control-sm rounded-sm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cp_phone">{{ __("client_registration.phone_number") }}</label>
                                <input type="tel" name="phone" id="cp_phone"
                                       class="form-control form-control-sm rounded-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @include('partials._modal_footer_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
