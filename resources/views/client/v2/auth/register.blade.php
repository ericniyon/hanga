@extends('client.v2.layout.app')

@section('title', 'Sign Up')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card border-0 rounded-lg shadow position-relative px-md-20  pt-md-20 px-3  overflow-hidden"
                    style="">
                    <div style="position: absolute;top: 0;left: 0;width: 100%;height: 50%;background-color: rgb(42,51,126,0.9);z-index: 20;background-image: url({{ asset('images/v2/computer_3_cropped_signup.png') }});background-size: cover;background-position: top;"
                        ;></div>
                    <div class="text-left text-white" style="z-index: 21">
                        <div class="mb-10 text-center">
                            <h1 class=" display-4">{{ __('app.Welcome') }}!</h1>
                            <h1 class=" display-4">
                                {{ __('app.on') }}
                                <span class="font-weight-boldest">IHUZO</span>
                                @if (app()->getLocale() == 'en')
                                    {{ __('app.Platform') }}
                                @endif
                            </h1>
                        </div>
                        <div class="rounded-lg custom-shadow  overflow-hidden"
                            style="background: rgba(251, 251, 251, 0.93);">
                            <ul class="nav nav-pills bg-white mb-3 nav-justified nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link py-5 rounded-0 font-weight-bolder text-dark-75"
                                        id="pills-profile-tab" href="{{ route('v2.login') }}" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        {{ __('app.Sign In') }}
                                    </a>
                                </li>
                                <li class="nav-item mr-0" role="presentation">
                                    <a class="nav-link py-5 rounded-0 border-bottom border-bottom-info border-4 font-weight-bolder text-dark"
                                        id="pills-home-tab" href="javascript:void(0);" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        {{ __('app.Sign Up') }}
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form action="{{ route('v2.register.post') }}" method="post" autocomplete="off"
                                        id="formRegister" class="p-5 p-md-10">
                                        @csrf

                                        <div class="form-group">
                                            <label for="first_name" class="sr-only">
                                                {{ __('app.First Name') }}
                                            </label>
                                            <input id="first_name" type="text" placeholder="{{ __('app.First Name') }}"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75{{ $errors->has('first_name') ? ' is-invalid' : '' }} rounded"
                                                name="first_name" value="{{ old('first_name') }}" required autofocus>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback " role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name" class="sr-only">
                                                {{ __('app.Last Name') }}
                                            </label>
                                            <input id="last_name" type="text" placeholder="{{ __('app.Last Name') }}"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75{{ $errors->has('last_name') ? ' is-invalid' : '' }} rounded"
                                                name="last_name" value="{{ old('last_name') }}" required autofocus>

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback " role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" class="sr-only">@lang('client_registration.phone_number')</label>

                                            <input id="phone" type="tel" placeholder="@lang('client_registration.phone_number')"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75{{ $errors->has('phone') ? ' is-invalid' : '' }} rounded"
                                                name="phone" value="{{ old('phone') }}" required>

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="sr-only">@lang('client_registration.email_address')</label>

                                            <input id="email" type="email" placeholder="@lang('client_registration.email_address')"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75{{ $errors->has('email') ? ' is-invalid' : '' }} rounded"
                                                name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <button type="submit" class="btn btn-info btn-block rounded-pill btn-lg">
                                            @lang('client_registration.create_account')
                                        </button>
                                    </form>


                                </div>


                            </div>
                        </div>

                        <div class="form-group text-center mt-10">
                            <span class="text-dark-75">
                                {{ __('app.By clicking Next you agree') }}
                            </span>
                            <strong>
                                <a href="" class="text-dark">
                                    {{ __('app.Terms & Conditions') }}
                                </a>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\ValidateClientRegistration::class, '#formRegister') !!}

    <script>
        let isLoading = false;
        $(function() {

            $('#formRegister').on('submit', function(e) {
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
