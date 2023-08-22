@extends('layouts.app')
@section('title','Change password')
@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-6">
                @include('partials._alerts')
                {{--   <div class="alert alert-custom alert-light-warning mb-5 py-2 fade show rounded"
                        role="alert">
                       <div class="alert-icon"><i class="flaticon2-information"></i></div>
                       <div class="alert-text">
                           Password must be at least 8 characters in length(a-z) with at least one special
                           character(!#$..)
                           , one digit(0-9) and one capital letter(A-Z).
                       </div>
                   </div>--}}

                <div class="card border-0 shadow-sm">
                    <form method="POST" action="{{ route('client.change.password.store') }}" id="formRegister"
                          autocomplete="off">
                        @csrf
                        <div class="card-body py-19">
                            <input type="hidden" name="token" value="{{ $token }}">
                            @csrf

                            <h6 class="mb-10">
                                @lang('client_registration.new_password_title')
                            </h6>

                            <div class="form-group mb-10">
                                <label for="password">@lang('client_registration.new_password')</label>
                                <input id="password" type="password" placeholder="@lang('client_registration.password')"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} rounded"
                                       name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                @endif
                            </div>

                            <div class="form-group mb-10">
                                <label for="password-confirm">@lang('client_registration.confirm_password')</label>
                                <input id="password-confirm" type="password" placeholder="@lang('client_registration.retype_password')"
                                       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }} rounded"
                                       name="password_confirmation" value="{{ old('password_confirmation') }}" required
                                       >

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                                          </span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-light-primary font-weight-bolder rounded px-10"
                                    id="btnSubmit">
                                @lang('client_registration.save_password') &nbsp;
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidatePasswordRegistration::class) !!}
    <script>
        $(function () {

            $('#formRegister').on('submit', function (e) {
                e.preventDefault();

                if (!$(this).valid()) return;

                var btnSubmit = $('#btnSubmit');

                btnSubmit.addClass('spinner spinner-right spinner-primary').prop('disabled', true);
                e.target.submit();
            });
        });

    </script>
@stop
