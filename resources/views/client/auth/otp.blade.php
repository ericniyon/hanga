@extends('layouts.app')
@section('title','Verify OTP')
@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-6">
                @include('partials._alerts')
                <div class="card mt-10 mb-3 border-0 rounded shadow-sm">
                    <form method="POST" action="{{ route('client.otp.verify') }}" id="formRegister"
                          autocomplete="off">

                        <div class="card-body py-19">
                            <input type="hidden" name="phone_number" value="{{ $client->phone }}">
                            @csrf

                            <div class="alert alert-custom alert-light-warning rounded">
                                <div class="alert-text font-weight-bolder">
                                    {!! __('client_registration.receive_otp_title',['phone' =>$client->phone,'email' => $client->email ]) !!}
                                </div>
                            </div>

                            <div class="form-group mb-10">
                                <label for="otp">@lang('client_registration.otp')</label>
                                <input id="otp" type="password"
                                       placeholder="@lang('client_registration.pass_code_enter')"
                                       class="form-control{{ $errors->has('otp') ? ' is-invalid' : '' }} rounded"
                                       name="otp" value="" required autofocus>

                                @if ($errors->has('otp'))
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('otp') }}</strong>
                                          </span>
                                @endif
                            </div>


                            <button type="submit"
                                    class="btn btn-primary text-uppercase font-weight-bolder rounded px-10"
                                    id="btnSubmit">
                                @lang('client_registration.verify_code') &nbsp;
                            </button>

                            <p class="mt-5">
                                @lang('client_registration.not_received')
                                <a href="{{ route('client.otp.resent',['phone'=>encrypt($client->phone)]) }}"
                                   class="btn btn-link">
                                    @lang('client_registration.resend_code')
                                </a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Laravel Javascript Validation -->

    <script>
        $(function () {

            $('#formRegister').on('submit', function (e) {
                e.preventDefault();

                // if (!$(this).valid()) return;

                var btnSubmit = $('#btnSubmit');

                btnSubmit.addClass('spinner spinner-white spinner-right').prop('disabled', true);
                e.target.submit();
            });
        });

    </script>
@stop
