@extends('client.v2.layout.app')

@section('title', 'Login')

@section('content')
    <div class="container my-5 font-quicksand">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card border-0 rounded-lg shadow position-relative p-md-20 px-3 py-10 overflow-hidden"
                    style="background-image: url({{ asset('images/v2/computer_3_cropped_1.png') }});background-size: cover;background-position: center;">
                    <div style="position: absolute;top: 0;left: 0;width: 100%;height: 50%;background-color: rgba(245,132,31,0.7);z-index: 20"
                        ;></div>
                    <div class="text-center text-white" style="z-index: 21">
                        <div class="mb-10">
                            <h1 class=" display-4">{{ __('app.Welcome Back') }}!</h1>
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
                                <li class="nav-item mr-0" role="presentation">
                                    <a class="nav-link py-5 rounded-0 border-bottom border-bottom-primary border-4 font-weight-bolder text-dark"
                                        id="pills-home-tab" href="javascript:void(0);" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        {{ __('app.Sign In') }}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link py-5 rounded-0 font-weight-bolder text-dark-75"
                                        id="pills-profile-tab" href="{{ route('v2.register') }}" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        {{ __('app.Sign Up') }}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form action="{{ route('v2.login.post') }}" method="post" class="p-5 p-md-10">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="text" name="username" value="{{ old('username') }}"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75 {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                id="email"
                                                placeholder="{{ __('client_registration.email') }}/ {{ __('client_registration.phone') }}">
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password"
                                                class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                id="password" placeholder="{{ __('client_registration.password') }}">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group text-left">
                                            <span class="text-dark-75">
                                                {{ __('client_registration.forgot_password') }}
                                                ?</span>
                                            <strong>
                                                <a href="{{ route('v2.forgot.password') }}" class="text-dark">
                                                    {{ __('app.Get Help') }}
                                                </a>
                                            </strong>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill btn-lg">
                                            {{ __('app.Login') }}
                                        </button>

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
