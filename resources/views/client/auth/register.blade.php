@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">

                <div class="card mb-3 border-0 rounded shadow-xs">
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold mb-5">@lang('client_registration.create_account')</h1>
                        <p class="text-center mb-10 font-weight-bold">
                            <img src="{{ asset('frontend/assets/logo.png') }}" class="img-fluid h-50px"
                                 alt="Ihuzo logo">
                        </p>
                        <form method="POST" action="{{ route('client.register') }}" autocomplete="off" id="formRegister"
                              aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="">First Name</label>
                                        <input id="first_name" type="text"
                                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} rounded"
                                               name="first_name"
                                               value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="">Last Name</label>
                                        <input id="last_name" type="text"
                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }} rounded"
                                               name="last_name"
                                               value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="phone"
                                       class="">@lang('client_registration.phone_number')</label>

                                <input id="phone" type="tel"
                                       class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} rounded"
                                       name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email"
                                       class="">@lang('client_registration.email_address')</label>

                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} rounded"
                                       name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group text-center">
                                <button type="submit"
                                        class="btn btn-light-primary font-weight-boldest px-10 rounded">
                                    @lang('client_registration.create_account')
                                </button>
                            </div>
                        </form>
                        <p class="text-center">
                            @lang('client_registration.have_account')? <a href="{{ route('client.login') }}">@lang('client_registration.login')</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')  }}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateClientRegistration::class,'#formRegister') !!}

    <script>
        let isLoading = false;
        $(function () {

            $('#formRegister').on('submit', function (e) {
                e.preventDefault();
                if (isLoading) return;
                if (!$(this).valid()) return;
                isLoading = true;

                let button = $(this).find(':submit');
                button.addClass('spinner spinner-primary spinner-sm spinner-right')
                    .prop('disabled', true);
                e.target.submit();

            });
        });
    </script>
@stop
