@extends('layouts.app')
@section('title','Forgot password')
@section('content')
    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">

                    <div class="card-body">
                        <h4 class="mb-10">
                            @lang('client_registration.reset_password')
                        </h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('client.password.email') }}" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="username">@lang('client_registration.phone_number')/@lang('client_registration.email')</label>
                                <input id="username" type="tel"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username"
                                       value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-light-primary text-uppercase">
                                    @lang('client_registration.send_password_reset_code')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
