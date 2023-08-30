@extends('client.v2.layout.app')

@section('title', 'OTP')

@section('content')
    <div class="container my-5 font-quicksand">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card border-0 rounded-lg shadow position-relative px-md-20  pt-md-20 px-3  overflow-hidden"
                    style="">
                    <div style="position: absolute;top: 0;left: 0;width: 100%;height: 50%;background-color: rgb(42,51,126,0.9);z-index: 20;background-image: url({{ asset('images/v2/computer_3_cropped_signup.png') }});background-size: cover;background-position: top;"
                        ;></div>
                    <div class="text-center text-white" style="z-index: 21">
                        <div class="mb-10">
                            <h1 class=" display-4">{{ __('app.Welcome') }}!</h1>
                            <h1 class=" display-4">
                                {{ __('app.on') }} <span class="font-weight-boldest">IHUZO</span>
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
                                        {{ __('app.OTP') }}
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form action="{{ route('v2.otp.verify') }}" method="post" class="p-5 p-md-10">
                                        @csrf
                                        <input type="hidden" name="phone_number" value="{{ $client->phone }}">
                                        <div class="text-center mt-10 w-100 min-h-55px d-flex justify-content-center">
                                            <p class="text-center h6 text-info  max-w-300px mb-5">
                                                {{-- {!! __('client_registration.receive_otp_title', [
                                                    'phone' => '---' . substr($client->phone, -4),
                                                    'email' => '---' . $email_exploded,
                                                ]) !!} --}}
                                                Thank Your for registering you can now login using your email and phone
                                                number as your password!
                                            </p>

                                        </div>

                                        {{-- <div class="form-group mt-10">
                                            <label for="otp" class="sr-only">{{ __('app.OTP') }}</label>
                                            <input type="text" name="otp"
                                                class="form-control rounded border-info border-2 form-control-lg text-center placeholder-dark-75 {{ $errors->has('otp') ? ' is-invalid' : '' }}"
                                                id="otp" placeholder="--------">
                                            @if ($errors->has('otp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('otp') }}</strong>
                                                </span>
                                            @endif
                                        </div> --}}

                                        {{-- <div class="text-center">
                                            <span class="text-dark-75">
                                                {{ __("app.Didn't receive code") }}?
                                            </span>
                                        </div>

                                        <a href="{{ route('v2.otp.resent', ['phone' => encrypt($client->phone)]) }}"
                                            class="btn btn-outline-info btn-block my-5 rounded-pill btn-lg font-weight-bolder">
                                            {{ __('app.Resend') }} {{ __('app.OTP') }}
                                        </a> --}}

                                        <a href="/v2/client/login" class="btn btn-info btn-block rounded-pill btn-lg">
                                            Login
                                        </a>
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
