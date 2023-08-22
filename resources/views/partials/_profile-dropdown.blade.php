<li class="nav-item dropdown mx-2">
    <a class="nav-link dropdown-toggle rounded border border-0 px-5  bg-hover-light-primary  tw-text-blue-900 lg:tw-text-white text-hover-info  d-flex align-items-center justify-content-center"
       title="{{ auth('client')->user()->name }}" href="#" id="navbarDropdown"
       role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ auth('client')->user()->name }}
        {{-- <div class="symbol symbol-20 symbol-light symbol-circle">
             <img src="{{ auth('client')->user()->profile_photo_url }}"
                  class="h-20px w-20px object-cover align-self-center"
                  alt="">
         </div>--}}
        <span class="svg-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
        </span>
    </a>
    <div class="dropdown-menu rounded-top-0  mt-1 shadow" aria-labelledby="navbarDropdown">
        <form action="{{ route('v2.logout') }}" class="hide" method="post" id="logoutForm">
            @csrf
        </form>
        {{-- &&( auth('client')->user()->application->status!=\App\Models\ApplicationBaseModel::DRAFT) --}}
        {{-- @if(auth('client')->user()->application) --}}
            <a class="dropdown-item" href="{{ route('client.profile') }}">
                {{ __("app.My Profile") }}
            </a>
            {{-- <a class="dropdown-item" href="{{ route('v2.client.details',encryptId(auth('client')->id())) }}">
                {{ __('app.Application Details') }}
            </a> --}}
            <div class="dropdown-divider"></div>
        {{-- @endif --}}
        {{--        <a class="dropdown-item" href="#">Another action</a>--}}

        <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logoutForm').submit();"
           href="{{ route('v2.logout') }}">
            {{ __('app.Logout') }}
        </a>
    </div>
</li>
