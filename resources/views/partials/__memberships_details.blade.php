@extends('client.v2.layout.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    @include('partials.includes._home_nav')

    <style>
        .sideList {
            text-align: center;
            font-size: 1.3rem;
        }

        .sideList li {
            width: 400px;
            padding: 1.3rem;
            left: 0%;
            right: 0%;
            top: 0%;
            bottom: 83.33%;
        }

        .sideList li a {
            padding-bottom: 1.3rem;
            padding-left: 1.3rem;
            padding-top: 1.3rem;
            padding-right: 4rem;
            background: #ddd;
            background: #F8F8F8;
            border-radius: 32px;


        }
        /*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
	.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}

	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}

	.modal.left.fade.in .modal-dialog{
		left: 0;
	}

/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}

	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}
    </style>
    <div class="container-fluid tw-bg-gray-50">
        <div class="row" style="margin: auto 5rem">
            <div class="col-lg-3 my-5">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._my_connections')

                                </span>
                                Setttings
                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start hover:bg-blue-900">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._services')
                                </span>
                                <a href="{{ route('client.my_membership') }}" class="m-3">My Memberships</a>
                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._resources')
                                </span>
                                    <a href="{{ route('client.my_advocacy') }}" class="m-3">Advocacy</a>
                            </h5>

                        </div>
                        <div
                            class="bg-light-light shadow-none rounded-lg my-2 p-3 d-flex justify-content-between align-items-start">
                            <h5 class="mb-0">
                                <span class="svg-icon">
                                    @include('partials.icons._my_connections')

                                </span>
                                Our Impacts
                            </h5>

                        </div>
                    </div>
                </div>
                <div class="card shadow-none rounded border-0 mb-4 mt-5">

                    <!--begin::Body-->
                    <div class="card-body px-4 overflow-auto">
                        <h4 class="mb-3">
                            {{ __('app.Recent connection requests') }}
                        </h4>
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse($pendingRequest as $pending)
                                @php
                                    $requester = $pending->requester;
                                @endphp
                                <x-client-item :item="$requester" />
                            @empty
                                <div class="alert alert-custom alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __('app.There is no pending connection request available') }}
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <div class="card shadow-none rounded border-0 mb-4">
                    <div class="card-header p-4 border-bottom-0">
                        <h4 class="mb-0">
                            {{ __('app.Recent messages') }}
                        </h4>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @forelse(recentMessage() as $message)
                                @php
                                    $amMessagingTo = amMessagingTo($message->id);
                                @endphp
                                @if ($amMessagingTo)
                                    <a href="{{ route('client.my.messages', ['client' => encryptId($amMessagingTo->id ?? '0')]) }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{ optional($amMessagingTo)->name }}</h6>
                                                <p class="mb-1 small text-muted">{{ str_limit($message->message, 20) }}

                                                </p>
                                            </div>
                                            <small>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @endif
                            @empty
                                <div class="alert alert-custom  alert-light-warning p-5  rounded m-3">
                                    <div class="alert-text tw-text-sm">
                                        {{ __('app.There is no recent messages') }}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom">
                            @include('partials._your_dashboard')
                        </div>
                    </div>

                <x-profile-card :editable="true" classes="" :application="$application"/>

                    <!--end::Body-->
                </div>
            </div>
            <div class="col-lg-9 my-5">
                <div class="card shadow-none rounded border-0 mb-4">

                    <div class="row">
                        <div class="card-body">
                            <div class="col-md-12">

                                <div class="pb-5" data-wizard-type="step-content">
                                    {{-- {{ $packege }} --}}
                                    @livewire('i-c-t-chamber.membership', ['packege' => $packege])

                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ __('app.Update profile picture') }}
                    </h4>
                    @include('partials.includes._close_modal_button')
                </div>
                <form action="{{ route('client.update.profile') }}" class="submit-form" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4">
                                <div class="symbol symbol-100 rounded-0">
                                    
                                    <img src="{{ auth('client')->user()->profile_photo_url }}" alt=""
                                        id="profile_photo_preview" class="img-fluid w-100 h-100" style="object-fit: cover">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="first_name">
                                        {{ __('app.First Name') }}
                                    </label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        value="{{ auth('client')->user()->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">
                                        {{ __('app.Last Name') }}
                                    </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        value="{{ auth('client')->user()->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        {{ __('app.Profile picture') }}
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" name="profile_photo" class="custom-file-input"
                                            accept="image/png,image/jpeg" id="profile_photo">
                                        <label class="custom-file-label" for="profile_photo">Choose image</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-light-info rounded">
                                        {{ __('client_registration.save_changes') }}
                                    </button>
                                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                        {{ __('client_registration.close') }}
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



	<!-- Modal -->


</div><!-- container -->



@endsection


@section('scripts')
    @livewireScripts
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function() {
            readURL(this);
        });

        $('.submit-form').validate();
    </script>
@stop
