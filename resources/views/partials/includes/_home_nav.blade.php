@php
    $clientsFields = \App\Models\StartupCompanyProfile::where('client_id', \auth('client')->id())->first();
@endphp

<div class="bg-info tw-py-2 md:tw-h-20 tw-w-full tw-flex  tw-items-center" style="height: 6rem;">
    <div class="container " style="margin-right: 10em; padding-top: 1rem; padding-bottom: 1rem">

        <div class="" style="position: absolute;left: 8.98%;right: 82.86%;top: 2.5%;bottom: 60%;">
            <img src="{{ asset('frontend/assets/logo.png') }}" class="max-h-50px img-fluid">
        </div>

        <ul class="nav justify-content-between menu-bar align-items-md-center"
            style="margin-left: 25em; margin-right: 2em">
            <li class="nav-item">
                <a class="nav-link d-flex flex-column font-weight-bolder  px-0 {{ request()->url() == route('client.home') ? 'text-primary' : 'text-white' }} "
                    href="{{ route('client.home') }}">
                    <span class="svg-icon svg-icon-2x d-block">
                        <svg width="32" height="34" viewBox="0 0 32 34" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M31 29.3233V17.5843C31.0001 16.7676 30.8334 15.9595 30.5103 15.2094C30.1871 14.4594 29.7142 13.7832 29.1205 13.2223L18.061 2.77035C17.504 2.24374 16.7665 1.95032 16 1.95032C15.2335 1.95032 14.496 2.24374 13.939 2.77035L2.8795 13.2223C2.28584 13.7832 1.81293 14.4594 1.48975 15.2094C1.16656 15.9595 0.999913 16.7676 1 17.5843V29.3233C1 30.119 1.31607 30.8821 1.87868 31.4447C2.44129 32.0073 3.20435 32.3233 4 32.3233H28C28.7956 32.3233 29.5587 32.0073 30.1213 31.4447C30.6839 30.8821 31 30.119 31 29.3233Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="mt-3">
                        {{ __('auth.home') }}
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex flex-column font-weight-bolder px-0 {{ request()->url() == route('client.my.networks') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('client.my.networks') }}">
                    <span class="svg-icon  svg-icon-2x d-block">
                        @include('partials.icons._my_connections')

                    </span>
                    <span class="mt-3">
                        {{ __('app.Connections') }}
                    </span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link d-flex flex-column font-weight-bolder px-0 {{ request()->url() == route('client.services') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('client.services') }}">
                    <span class="svg-icon  svg-icon-2x d-block">
                        @include('partials.icons._services')

                    </span>
                    <span class="mt-3">
                        {{ __('Services') }}
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex flex-column font-weight-bolder  px-0  {{ request()->url() == route('client.news') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('client.news') }}">
                    <span class="svg-icon  svg-icon-2x d-block">
                        @include('partials.icons._news')

                    </span>
                    <span class="mt-3">
                        {{ __('News') }}
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex flex-column font-weight-bolder  px-0  {{ request()->url() == route('client.resources') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('client.resources') }}">
                    <span class="svg-icon  svg-icon-2x d-block">
                        @include('partials.icons._resources')

                    </span>
                    <span class="mt-3">
                        {{ __('Resources') }}
                    </span>
                </a>
            </li>
            {{-- @if (auth()->guard('client')->user()->registration_type_id == 1) --}}
            <li class="nav-item position-relative">
                <a class="nav-link d-flex flex-column font-weight-bolder px-0 {{ str_contains(Request::url(), 'job-opportunities') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('client.opportunities.list') }}">
                    <span class="svg-icon svg-icon-2x d-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </span>
                    <span class="mt-3">
                        {{ __('app.My Opportunities') }}
                    </span>
                </a>
            </li>
            {{-- @endif --}}
            {{-- <li class="nav-item position-relative">
                <a class="nav-link  d-flex flex-column font-weight-bolder px-0 {{ request()->url()==route('client.my.messages')?'text-primary':'tw-text-white' }}"
                   href="{{  route('client.advocacy.complains') }}">
                            <span class="svg-icon svg-icon-2x d-block">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                            </svg>
                                                        </span>
                    <span class="mt-3">
                        {{ __("Advocacy Complaints") }}
                    </span>
                    {{-- <x-counter :class-name="'message-badge'"
                               :number="\App\Models\Message::query()->where('status','=','Pending')->where('to','=',Auth::guard('client')->id())->count()"/> --}}
            </a>
            </li>


            <li class="nav-item position-relative">
                <a class="nav-link  d-flex flex-column font-weight-bolder px-0 {{ request()->url() == route('client.my.messages') ? 'text-primary' : 'tw-text-white' }}"
                    href="{{ route('client.my.messages') }}">
                    <span class="svg-icon svg-icon-2x d-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                        </svg>
                    </span>
                    <span class="mt-3">
                        {{ __('app.Messages') }}
                    </span>
                    <x-counter :class-name="'message-badge'" :number="\App\Models\Message::query()
                        ->where('status', '=', 'Pending')
                        ->where('to', '=', Auth::guard('client')->id())
                        ->count()" />
                </a>
            </li>


            <li class="nav-item dropdown">
                <a id="navbarDropdown"
                    class="nav-link dropdown-toggle nav-link d-flex flex-column font-weight-bolder {{ request()->url() == route('client.profile') ? 'text-primary' : 'tw-text-white' }}"
                    href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre style="background: #F4CE9B !important; border-radius: 50px; ">
                    <div class="symbol symbol-30 symbol-lg-30 symbol-circle ">
                        <img alt="Pic"
                            src="{{ $clientsFields->logo ? Storage::disk('logos')->url($clientsFields->logo) : '' }}"
                            style="display: inline-block; " />
                        <span class="" style="color:#2A337E">
                            {{ __('app.My Profile') }}


                            {{-- <progress value="15" max="100" style="border: 1px solid #2A337E; border-radius: 50%; width: 30px; height: 30px;"></progress> --}}
                            {{-- <span  style="width: 35px; height: 35px; border-radius: 50px; border: 1px solid #2A337E ;padding:.6rem">{{ $clientsFields }}%</span> --}}

                        </span>
                    </div>
                </a>






                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('client.profile') }}">
                        {{ __('app.My Profile') }}
                    </a>

                    <a class="dropdown-item" href="{{ route('client.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </div>
</div>
<script>
    function progressBar(progressVal, totalPercentageVal = 100) {
        var strokeVal = (4.64 * 100) / totalPercentageVal;
        var x = document.querySelector('.progress-circle-prog');
        x.style.strokeDasharray = progressVal * (strokeVal) + ' 999';
        var el = document.querySelector('.progress-text');
        var from = $('.progress-text').data('progress');
        $('.progress-text').data('progress', progressVal);
        var start = new Date().getTime();

        setTimeout(function() {
            var now = (new Date().getTime()) - start;
            var progress = now / 700;
            el.innerHTML = progressVal / totalPercentageVal * 100 + '%';
            if (progress < 1) setTimeout(arguments.callee, 10);
        }, 10);

    }

    progressBar(10, 200);
</script>
