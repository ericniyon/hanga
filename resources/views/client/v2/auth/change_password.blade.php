@extends('client.v2.layout.app')

@section('title',"Set password")

@section('content')
    <div class="container my-5 font-quicksand">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card border-0 rounded-lg custom-shadow position-relative p-md-20 px-3 py-10 overflow-hidden"
                     style="background-image: url({{ asset('images/v2/computer_3_cropped_1.png') }});background-size: cover;background-position: center;">
                    <div
                            style="position: absolute;top: 0;left: 0;width: 100%;height: 50%;background-color: rgba(245,132,31,0.7);z-index: 20"
                            ;></div>
                    <div class="text-center text-white" style="z-index: 21">
                        <div class="mb-10">
                            <h1 class=" display-4">{{ __('app.Welcome Back') }}!</h1>
                            <h1 class=" display-4">
                                {{ __('app.on') }} <span
                                        class="font-weight-boldest">IHUZO</span>
                                @if(app()->getLocale()=='en')
                                    {{ __('app.Platform') }}
                                @endif
                            </h1>
                        </div>
                        <div class="rounded-lg shadow min-h-400px  overflow-hidden"
                             style="background: rgba(251, 251, 251, 0.93);">
                            <h6 class="bg-white text-dark font-weight-boldest p-5">
                                @lang('client_registration.new_password_title')
                            </h6>

                            <form method="POST" action="{{ route('v2.change.password.store') }}" id="formRegister"
                                  autocomplete="off" class="p-5 p-md-10">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group text-left mt-10">
                                    <label for="password" class="font-weight-bold sr-only">
                                        @lang('client_registration.new_password')
                                    </label>
                                    <input type="password"
                                           name="password" value="{{ old('password') }}"
                                           class="form-control rounded border-info border-2 form-control-lg placeholder-dark-50 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           id="password" placeholder="{{ __('app.Enter New Password') }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                    @endif
                                </div>

                                <div class="form-group text-left">
                                    <label for="confirm_password" class="font-weight-bold sr-only">
                                        @lang('client_registration.confirm_password')
                                    </label>
                                    <input type="password"
                                           class="form-control rounded border-info border-2 form-control-lg placeholder-dark-50 {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                           id="confirm_password"
                                           name="password_confirmation" value="{{ old('password_confirmation') }}"
                                           required
                                           placeholder="@lang('client_registration.retype_password')"/>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                                          </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary text-white btn-block rounded-pill btn-lg">
                                    @lang('client_registration.save_password') &nbsp;
                                </button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
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
