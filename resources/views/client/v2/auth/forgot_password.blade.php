@extends('client.v2.layout.app')

@section('title',"Forgot password")

@section('content')
    <div class="container my-5 font-quicksand">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card border-0 rounded-lg shadow position-relative p-md-20 px-3 py-10 overflow-hidden"
                     style="background-image: url({{ asset('images/v2/computer_3_cropped_1.png') }});background-size: cover;background-position: center;">
                    <div
                        style="position: absolute;top: 0;left: 0;width: 100%;height: 50%;background-color: rgba(245,132,31,0.7);z-index: 20"
                        ;></div>
                    <div class="text-center text-white" style="z-index: 21">
                        <div class="mb-10">
                            <h1 class=" display-4">Welcome Back!</h1>
                            <h1 class=" display-4">
                                on <span class="font-weight-boldest">IHUZO</span> Platform
                            </h1>
                        </div>
                        <div class="rounded-lg custom-shadow min-h-400px  overflow-hidden"
                             style="background: rgba(251, 251, 251, 0.93);">
                            <h4 class="bg-white text-dark font-weight-boldest p-5">Reset Password</h4>

                            <form action="{{ route('v2.password.email') }}" method="post" class="p-5 p-md-10">
                                @csrf

                                <div class="form-group text-left">
                                    <label for="email" class="font-weight-bold">
                                        Use email or phone number linked to your account
                                    </label>
                                    <input type="text" name="username" value="{{ old('username') }}"
                                           class="form-control rounded border-info border-2 form-control-lg placeholder-dark-75 {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           id="email" placeholder="Email/phone number">

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded-pill btn-lg">
                                    Send me Code
                                </button>
                                <div class="mt-10 text-left d-flex justify-content-between align-items-center">
                                    <div class="text-dark font-size-h4 font-weight-bold">
                                        Remembered password? back to
                                    </div>
                                    <a href="{{ route('v2.login') }}"
                                       class="btn btn-outline-primary rounded-pill font-weight-bolder px-10">
                                        Log In
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
