@csrf
<input type="hidden" name="id" id="solutionId" value="{{ $solution->id??0 }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="solution_type">@lang('client_registration.product_type')</label>
            <select name="solution_type" id="solution_type"
                    class="custom-select custom-select-sm rounded-sm solution_type">
                <option value="">@lang('client_registration.choose')</option>
                @foreach(\App\Models\ApplicationSolution::types() as $item)
                    <option
                        {{ (isset($solution) && $solution['type'])==$item?'selected':'' }}
                        value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="solution_name">@lang('client_registration.name')</label>
            <input type="text" name="name" id="solution_name" value="{{ $solution->name??'' }}"
                   class="form-control form-control-sm rounded-sm">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="solution_description">@lang('client_registration.description')</label>
    <textarea name="description" id="solution_description"
              class="form-control form-control-sm rounded-sm">{{ $solution->description??'' }}</textarea>
</div>

<div>
    <h6>@lang('client_registration.type_of_platform')</h6>
    <div class="row">
        @foreach(\App\Models\PlatformType::all() as $item)
            <div class="col-md-4">
                <div class="my-2">
                    <label class="checkbox mb-4">
                        <input type="checkbox" name="platforms[]"
                               value="{{ $item->id }}"/> {{ $item->name }}
                        <span class="rounded-sm"></span>
                    </label>
                    <label for="link{{ $item->id }}" class="sr-only">Link</label>
                    <input type="url" name="link{{ $item->id }}" id="link{{ $item->id }}"
                           class="form-control form-control-sm rounded-sm" placeholder="Link"/>

                </div>

            </div>
        @endforeach

        <div class="col">
            <div class="hide mt-5 has-api-div" id="has-api-div">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>
                                @lang('client_registration.does_your_product_has_an_open_api')?
                            </label>
                            <div class="radio-inline">
                                <label class="radio">
                                    <input name="has_api" type="radio"
                                           {{ isset($solution) && $solution->has_api?'checked':'' }}
                                           value="1"/> @lang('client_registration.yes')
                                    <span></span>
                                </label>
                                <label class="radio">
                                    <input name="has_api" type="radio"
                                           {{ isset($solution) && $solution->has_api?'checked':'' }}
                                           value="0"/> @lang('client_registration.no')
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Product logo</label>
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
    <div id="api-description" class="hide api-description">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="api_name">@lang('client_registration.api_name')</label>
                    <input type="text" value="{{ $solution->api_name??'' }}" name="api_name" class="form-control"
                           id="api_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="api_link">@lang('client_registration.api_link')</label>
                    <input type="url" value="{{ $solution->api_link??'' }}" name="api_link" class="form-control"
                           id="api_link">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="api_description">@lang('client_registration.api_description')</label>
            <textarea name="api_description" class="form-control "
                      id="api_description">{{ $solution->api_description??'' }}</textarea>
        </div>

    </div>
</div>

<h4>Contact person</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="cp_name">Name</label>
            <input type="text" name="dsp_name" id="cp_name" value="{{ $solution->dsp_name??'' }}"
                   class="form-control form-control-sm rounded-sm">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="cp_email">Email</label>
            <input type="email" name="email" id="cp_email" value="{{ $solution->email??'' }}"
                   class="form-control form-control-sm rounded-sm">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="cp_phone">Phone number</label>
            <input type="tel" name="phone" id="cp_phone" value="{{ $solution->phone??'' }}"
                   class="form-control form-control-sm rounded-sm">
        </div>
    </div>
</div>
