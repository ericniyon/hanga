@extends("layouts.auth")
@section("title",__('Reset Password'))
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
                    <!--end::Login Sign up form-->
                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3 class="opacity-100 font-weight-normal">Forgotten Password ?</h3>
                            <p class="opacity-100">Enter your email to reset your password</p>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form" id="kt_login_forgot_form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-10">
                                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" autocomplete="off" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button id="kt_login_forgot_submit" type="submit" class="btn btn-pill btn-danger opacity-90 px-15 py-3 m-2">Request</button>
                                <a href="{{ url()->previous() }}" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/login-general.js')}}"></script>
@endsection
