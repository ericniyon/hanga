@extends('client.v2.layout.main_auth')

@section('title', 'Login')

@section('content')
    <div class=" mb-5 font-quicksand">
        <div class="row justify-content-center ">

            <div class="col-md-3  " style="background: #96A1FF; border-radius: 0 0 2rem 0 ">

                <div class="row text-center" style="padding: 3rem 3rem">
                    <div class="col-md-10 "><img src="{{ asset('frontend/assets/logo.svg') }}" alt=""
                            style="width: 100%" /></div>
                    <div class="col-md-10 " style="font-size: 22px; color: #fff;line-height: 25.28px;top: 2rem;">
                        <p>Find Trusted Digital Commerce PartnersFor Your Business</p>
                    </div>
                </div>


                <img src="{{ asset('images/login.png') }}" alt="" class="mb-5 "
                    style="position: relative; right: -8rem; top: -5rem; margin: 1rem 3rem">

            </div>

            <!-- Registeration Form -->
            <div class="col-md-4 col-lg-4 ml-auto mr-auto">
                <form action="{{ route('v2.login.post') }}" autocomplete="off" method="POST">
                    @csrf
                    <div class="row " style="padding: 8rem 1rem">
                        <div class="col-md-12">

                            <h1>Log In</h1>
                        </div>
                        <div class="col-md-12">
                            <p>Welcome on IHUZO Platform Create free account</p>
                        </div>


                        <div class="row" style="margin-top: 3rem">
                            <div class="col-md-12 flex">
                                <a href="{{ route('v2.redirectToGoogle') }}" class=""
                                    style="border-radius: 50px; border: 1px solid black; padding: 1rem 2rem; color: gray">
                                    <i class="fa fa-google mr-2"></i>
                                    <span class="font-weight-bold">Continue with google</span>

                                </a>
                            </div>

                        </div>
                        <div class="row ml-2" style="margin-top: 3rem">
                            <div class="col-md-12 flex">
                                <a href="#" class=""
                                    style="border-radius: 50px; border: 1px solid black; padding: 1rem 2rem; color: #fff; background: #000000">
                                    <i class="fa fa-apple mr-2"></i>
                                    <span class="font-weight-bold">Continue with Apple</span>

                                </a>
                            </div>

                        </div>

                        <!-- First Name -->


                        <!-- Last Name -->

                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-5 py-5">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Email Address -->
                        <div class=" col-lg-12 col-md-12 mb-4">
                            <div class="mb-3">
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
                        </div>
                        <div class=" col-lg-12 col-md-12 mb-4">
                            <div class="mb-3">
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
                        </div>

                        <!-- Phone Number -->


                        <!-- Password -->
                        <div class=" col-lg-12 col-md-12 mb-4 mr-5">
                            <span class="text-dark-75">
                                {{ __('client_registration.forgot_password') }}
                                ?</span>
                            <strong>
                                <a href="{{ route('v2.forgot.password') }}" class="text-dark">
                                    {{ __('app.Get Help') }}
                                </a>
                            </strong>
                        </div>


                        <!-- Password Confirmation -->


                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">

                            <button type="submit" class="btn  btn-block rounded-pill btn-lg" style="border-radius: 50px; background: #2A337E; color: #F5841F">
                                {{ __('app.Login') }}
                            </button>

                        </div>



                        <!-- Already Registered -->
                        <div class="text-center w-100 mt-2">
                            <p class="text-muted font-weight-bold">Don’t Have Account ? <a
                                    href="{{ route('v2.register') }}" class="text-primary ml-2">Sign Up</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
