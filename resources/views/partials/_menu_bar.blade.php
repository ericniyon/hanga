<ul class="nav justify-content-between menu-bar">
    <li class="nav-item">
        <a class="nav-link d-flex flex-column font-weight-bolder" href="{{ route('client.home') }}">
                                    <span class="svg-icon d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
</svg>
                                    </span>
            <span class="d-none d-md-inline-block">
                                        Home
                                   </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex flex-column font-weight-bolder {{ request()->url()==route('client.my.networks')?'active':'' }}"
           href="{{ route('client.my.networks') }}">
                                    <span class="svg-icon  d-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                           viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
</svg>
                                        </span>
            <span class="d-none d-md-inline-block">
                                        My Connections
                                   </span>
        </a>
    </li>
    <li class="nav-item position-relative">
        <a class="nav-link d-flex flex-column font-weight-bolder {{ str_contains(Request::url(), 'job-opportunities') ?'active':''  }}"
           href="{{ route('client.opportunities.list') }}">
           <span class="svg-icon  d-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
           </span>
            <x-counter :number="getOpportunityCount()"/>
            <span class="d-none d-md-inline-block">Opportunities</span>
        </a>
    </li>

    <li class="nav-item position-relative">
        <a class="nav-link  d-flex flex-column font-weight-bolder {{ request()->url()==route('client.my.messages')?'active':'' }}"
           href="{{ route('client.my.messages') }}">
                <span class="svg-icon d-block">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
</svg>
                </span>
            <span class="d-none d-md-inline-block">Messages</span>
            <x-counter :class-name="'message-badge'"
                       :number="\App\Models\Message::query()->where('status','=','Pending')->where('to','=',Auth::guard('client')->id())->count()"/>
        </a>

    </li>

</ul>
