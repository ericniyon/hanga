@extends('layouts.app')
@section('title',"Login")
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">

                <div class="card mb-3 border-0 rounded shadow">
                    <div class="card-body">

                        <h1 class="text-center font-weight-bold mb-5">@lang('client_registration.login')</h1>
                        <p class="text-center mb-10 font-weight-bold">
                            <img src="{{ asset('frontend/assets/logo.png') }}" class="img-fluid h-50px"
                                 alt="Ihuzo logo">
                        </p>

                        <form method="POST" action="{{ route('client.login') }}" id="formLogin"
                              autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="username" class="">@lang('client_registration.phone')/@lang('client_registration.email')</label>
                                <input id="username" type="text"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} rounded"
                                       name="username" autocomplete="email"
                                       value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group ">
                                <label for="password" class="">@lang('client_registration.password')</label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} rounded"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                    @lang('client_registration.remember_me')
                                    <span class="rounded"></span>
                                </label>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit"
                                        class="btn btn-light-primary font-weight-boldest px-10 rounded btn-block">
                                     <span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="24px" height="24px" viewBox="0 0 24 24">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3"
                                                      transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) "
                                                      x="8" y="6" width="2" height="12" rx="1"/>
                                                <path
                                                    d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                    transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                                <path
                                                    d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                                            </g>
                                        </svg>
                                     </span>
                                    @lang('client_registration.login')
                                </button>
                            </div>
                            <div class="form-group text-center">
                                <a class="btn btn-link" href="{{ route('client.password.request') }}">
                                    @lang('client_registration.forgot_password') ?
                                </a>
                            </div>

                        </form>

                        <p class="text-center">
                            @lang('client_registration.dont_have_account')? <a href="{{ route('client.register') }}">@lang('client_registration.create_account')</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let isLoading = false;
        $(function () {
            $('#formLogin').on('submit', function (e) {
                e.preventDefault();
                if (isLoading) return;

                let button = $(this).find(':submit');
                button.addClass('spinner spinner-primary spinner-sm spinner-right')
                    .prop('disabled', true);
                e.target.submit();
                isLoading = false;

            });
        });
    </script>
@stop
