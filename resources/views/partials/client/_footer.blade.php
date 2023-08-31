<div class="text-white bg-info" style="margin-top: 10rem !important">
    <div class="container">
        <div class="py-5 row">
            <div class="col-md-3">
                <div class="mb-5">
                    <img src="{{ asset('frontend/assets/logo.png') }}" class="max-h-50px img-fluid" alt="Logo">
                </div>
                <p>
                    {{ __('app.footer_background') }}
                </p>
                <a href="{{ route('about') }}" class="text-white border-2 btn btn-sm btn-outline-primary">
                    {{ __('app.Read More') }}
                </a>
            </div>
            <div class="col-md-3">
                <h5 class="mb-5 border-2 text-primary d-inline-block border-bottom border-bottom-primary">
                    {{ __('app.Quick Link') }}
                </h5>
                <div class="d-flex flex-column">
                    <a href="{{ route('client.advocacy.complains') }}"
                        class="text-white my-2">{{ __('Advocacies and Complaints') }}</a>
                    {{-- <a href="{{  route('v2.impacts') }}" class="text-white my-2">{{ __('Our Impacts') }}</a> --}}
                    <span data-toggle="modal" data-target="#exampleModal" class="text-white my-2 cursor-pointer">
                        {{ __('app.Feedback') }}
                    </span>
                    <a href="{{ route('about') }}" class="text-white my-2">{{ __('app.About us') }}</a>
                    <a href="{{ route('v2.apis') }}" class="text-white my-2">{{ __('app.APIs') }}</a>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="mb-5 border-2 text-primary d-inline-block border-bottom border-bottom-primary">
                    {{ __('auth.our_partners') }}
                </h5>
                <div class="d-flex flex-column">
                    @foreach (\App\Models\Partner::all() as $item)
                        <span class="my-2 text-white">{{ $item->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="mb-5 border-2 text-primary d-inline-block border-bottom border-bottom-primary">
                    {{ __('app.Keep In Touch') }}
                </h5>
                <div class="d-flex flex-column">
                    <div class="my-2 text-white">
                        <i class="fa fa-phone text-primary"></i> +250 781 499 535
                    </div>
                    <div class="my-2 text-white">
                        <i class="fa fa-envelope text-primary"></i> membership@ict.rw
                    </div>
                    <a href="https://www.instagram.com/ihuzorwanda/" target="_blank" class="my-2 text-white">
                        <i class="fa fa-instagram text-primary">
                        </i> ihuzorwanda
                    </a>
                    <a href="https://twitter.com/iHuzoRwanda" target="_blank" class="my-2 text-white">

                        <i class="fa fa-twitter-square text-primary"></i> iHuzoRwanda
                    </a>
                    <a href="https://www.facebook.com/iHuzoRwanda" target="_blank" class="my-2 text-white">

                        <i class="fa fa-facebook-square text-primary"></i> iHuzoRwanda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-4 text-center text-white" style="background-color: #121B65">
    <strong>Ihuzo &copy; &nbsp; {{ now()->year }}</strong>
</div>


<!-- Modal -->
<div class="modal fade font-quicksand" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog rounded-0">
        <div class="modal-content rounded-0">
            <div class="pb-0 modal-header border-bottom-0">
                <h4></h4>
                <button type="button" class="p-4 border close border-3 border-info text-info" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-info font-weight-bolder">&times;</span>
                </button>
            </div>
            <form action="{{ route('save.feedback') }}" method="post">
                @csrf
                <div class="pt-0 modal-body">
                    <div class="text-center">
                        <img src="{{ asset('images/v2/feedback _1.png') }}" alt="Feedback" class="img-fluid">
                        <h4 class="mt-4 mb-10 text-info font-quicksand">
                            {!! __('app.feedback_modal_title') !!}
                        </h4>
                    </div>

                    <div class="my-4">
                        <label for="names" class="sr-only">Names</label>
                        <input type="text" class="border-2 form-control rounded-0 border-info placeholder-dark"
                            value="{{ auth()->user()->name ?? '' }}" name="names" id="names"
                            placeholder="@lang('client_registration.names')" required>

                    </div>

                    <div class="my-4">
                        <label for="phone_number" class="sr-only">Phone number</label>
                        <input type="tel" name="phone" id="phone_number"
                            class="border-2 form-control rounded-0 border-info placeholder-dark"
                            placeholder="{{ __('client_registration.phone_number') }}">
                    </div>
                    <div class="my-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email"
                            class="border-2 form-control rounded-0 border-info placeholder-dark"
                            placeholder="{{ __('client_registration.email') }}">
                    </div>
                    <div class="my-4">
                        <label for="feedback" class="sr-only">Feedback</label>
                        <textarea name="feedback" id="feedback" class="border-2 form-control rounded-0 border-info placeholder-dark"
                            rows="8" placeholder="{{ __('app.Your feedback') }}"></textarea>
                    </div>
                    <p class="text-dark">
                        {{ __('app.Your feedback and information will be protected') }}.
                    </p>
                    <div class="my-4">
                        <button type="submit" class="btn btn-info rounded-pill w-100">
                            {{ __('app.send') }}
                        </button>
                    </div>


                    <!-- Repo -->
            </form>

        </div>
    </div>
</div>
