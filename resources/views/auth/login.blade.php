@extends("layouts.auth")
@section("title","Login Page")
@section("content")
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('{{asset('media/bg-2.jpg')}}');">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{asset('media/ihuzo-logo.png')}}" class="max-h-90px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3 class="opacity-100 font-weight-normal">Sign In To Admin</h3>
                            <p class="opacity-100">Enter your details to login to your account:</p>
                        </div>
                        <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
                            @include('partials._alerts')
                            @csrf
                            <div class="form-group">
                                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror" type="email" placeholder="Email address" name="email" autofocus autocomplete="off" required />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="off"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />Remember me
                                    <span></span></label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>
                                    @endif
                            </div>
                            <div class="form-group text-center mt-10">
                                <button id="kt_login_signin_submit" class="btn btn-pill btn-danger opacity-90 px-15 py-3">Sign In</button>
                            </div>
                        </form>
                        {{-- <div class="mt-10">
                            <span class="opacity-40 mr-4">Don't have an account yet?</span>
                            <a href="javascript:;" id="kt_login_signup" class="text-white opacity-30 font-weight-normal">Sign Up</a>
                        </div> --}}
                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
@endsection
