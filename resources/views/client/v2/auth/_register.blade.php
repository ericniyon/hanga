@extends('client.v2.layout.main_auth')

@section('title', 'Register')

@section('content')
    <div class=" mb-5 font-quicksand">
        <div class="row justify-content-center ">

            <div class="col-md-3  " style="background-image:url({{ asset('images/register.png') }});">

                <div class="row text-center" style="padding: 3rem 3rem">
                    <div class="col-md-10 "><img src="{{ asset('frontend/assets/logo.svg') }}" alt="" style="width: 80%" /></div>
                    <div class="col-md-10 " style="font-size: 32px; color: #fff;line-height: 25.28px;top: 2rem;">
                        <p>Find Trusted Digital Commerce PartnersFor Your Business</p>
                    </div>
                </div>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-4 col-lg-4 ml-auto mr-auto" >
                <form action="#" autocomplete="off">
                    <div class="row " style="padding: 8rem 1rem">
                        <div class="col-md-12">

                            <h1>Sign UP</h1>
                        </div>
                        <div class="col-md-12">
                            <p>Create IHUZO account fo free</p>
                        </div>


                        <div class="row" style="margin-top: 3rem">
                            <div class="col-md-12 flex">
                                <a href="#" class="" style="border-radius: 50px; border: 1px solid black; padding: 1rem 2rem; color: gray">
                                    <i class="fa fa-google mr-2"></i>
                                    <span class="font-weight-bold">Register with google</span>

                                </a>
                            </div>

                        </div>
                        <div class="row ml-2" style="margin-top: 3rem">
                            <div class="col-md-12 flex">
                                <a href="#" class="" style="border-radius: 50px; border: 1px solid black; padding: 1rem 2rem; color: #fff; background: #000000">
                                    <i class="fa fa-apple mr-2"></i>
                                    <span class="font-weight-bold">Register with Apple</span>

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
                                <label for="Names" class="form-label">Names</label>
                                <input type="text" class="form-control" id="Names"
                                    placeholder="Separate name with space">
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 mb-4">
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="emailInput"
                                    placeholder="ihuzo@example.com">
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 mb-4">
                            <div class="mb-3">
                                <label for="Phone Number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="Phone Number"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 mb-4">
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordInput">
                            </div>
                        </div>

                        <!-- Phone Number -->



                        <!-- Password Confirmation -->


                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <a href="#" class="btn btn-block py-2" style="border-radius: 50px; background: #F5841F; color: #fff">
                                <span class="font-weight-bold">Sign Up</span>
                            </a>
                        </div>



                        <!-- Already Registered -->
                        <div class="text-center w-100 mt-2">
                            <p class="text-muted font-weight-bold">Already have account? <a href="{{ route('v2.login') }}"
                                    class="text-primary ml-2">Log In</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
