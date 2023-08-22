
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4 "  data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item nav-dashboard" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon flaticon-home"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">System Configs Section</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            @can('Manage Partners')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.partner.create')}}" class="menu-link menu-toggle">

										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    <span class="menu-text">Partners</span>
                    {{--                                <i class="menu-arrow"></i>--}}
                </a>

            </li>
            @endcan
            @can('Manage Webinars')
                <li class="menu-item menu-item-submenu nav-events" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-event-calendar-symbol"></i>
                        <span class="menu-text">Webinars & Events</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Webinars & Events</span>
                            </span>
                            </li>
                            <li class="menu-item nav-webinars" aria-haspopup="true">
                                <a href="{{ route('admin.webinars.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Webinars</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('Manage Opportunities')
              <li class="menu-item menu-item-submenu nav-job-opportunities" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-website"></i>
                        <span class="menu-text">Opportunities</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Job</span>
                        </span>
                            </li>
                            <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.job.opportunities.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Opportunities</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            {{-- ============================== --}}
              <li class="menu-item menu-item-submenu nav-job-opportunities" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-website"></i>
                        <span class="menu-text">Applications</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Job</span>
                        </span>
                            </li>
                            <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.trainning.applications') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Applications</span>
                                </a>
                            </li>
                            <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.trainning.applicats') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Applicants</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            {{-- ============================== --}}
              <li class="menu-item menu-item-submenu nav-job-opportunities" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-website"></i>
                        <span class="menu-text">Content and ratings</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Job</span>
                        </span>
                            </li>
                            <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.tabs.contents') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Content  </span>
                                </a>
                            </li>
                            <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.google.googles') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Ratings  </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- ========================================= --}}
            @can('Creating an Open APIs')
                <li class="menu-item menu-item-submenu nav-open-apis" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Expand-arrows.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">APIs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">APIs</span>
                        </span>
                            </li>
                            <li class="menu-item nav-open-apis-list" aria-haspopup="true">
                                <a href="{{ route('admin.open-apis.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Open APIs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('Creating Digital Platforms')
                <li class="menu-item menu-item-submenu nav-digital-platforms" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Pixels.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="10" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="4" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="16" y="16" width="4" height="4" rx="1"/>
                            </g>
                            </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">Digital Platforms</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Digital Platforms</span>
                        </span>
                            </li>
                            <li class="menu-item nav-digital-platforms-list" aria-haspopup="true">
                                <a href="{{ route('admin.digital-platforms.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Digital Platforms</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu nav-digital-platforms" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Pixels.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="10" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="4" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="16" y="16" width="4" height="4" rx="1"/>
                            </g>
                            </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">Our Impacts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Our Impacts</span>
                        </span>
                            </li>
                            <li class="menu-item nav-digital-platforms-list" aria-haspopup="true">
                                <a href="{{ route('admin.impact.content') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Our Impacts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu nav-digital-platforms" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Pixels.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="10" y="16" width="4" height="4" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="10" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="4" y="4" width="4" height="4" rx="1"/>
                                <rect fill="#000000" x="16" y="16" width="4" height="4" rx="1"/>
                            </g>
                            </svg><!--end::Svg Icon--></span>
                        <span class="menu-text"> Resources </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text"> Resources Categoies</span>
                        </span>
                            </li>
                            <li class="menu-item nav-digital-platforms-list" aria-haspopup="true">
                                <a href="{{ route('admin.resources.category') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All  Resources Categoies</span>
                                </a>
                            </li>
                            <li class="menu-item nav-digital-platforms-list" aria-haspopup="true">
                                <a href="{{ route('admin.resources.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All  Resources</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

                <li class="menu-section">
                    <h4 class="menu-text">Verification Request Section</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu nav-application-section" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Requests</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Requests</span>
                            </span>
                            </li>
                            @canany(["Review Application","Approve Application"])
                            <li class="menu-item nav-applications-my-tasks" aria-haspopup="true">
                                <a href="{{route("admin.applications.my.tasks")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">My Tasks</span>
                                </a>
                            </li>
                            @endcanany
                            <li class="menu-item nav-all-applications" aria-haspopup="true">
                                <a href="{{route("admin.all.applications")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">All Requests</span>
                                </a>
                            </li>
                            @can("Assign Application")
                            <li class="menu-item nav-pending-applications" aria-haspopup="true">
                                <a href="{{route("admin.pending.applications")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Pending Requests</span>
                                </a>
                            </li>
                            <li class="menu-item nav-assigned-applications" aria-haspopup="true">
                                <a href="{{route("admin.assigned.applications")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Assigned Requests</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu nav-application-section" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Membership Packeges</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            @canany(["Review Application","Approve Application"])
                            <li class="menu-item nav-applications-my-tasks" aria-haspopup="true">
                                <a href="{{route("admin.membership.packeges")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Packege(s)</span>
                                </a>
                            </li>

                            <li class="menu-item nav-applications-my-tasks" aria-haspopup="true">
                                <a href="{{route("admin.membership.plans")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Packege Plan </span>
                                </a>
                            </li>

                            <li class="menu-item nav-applications-my-tasks" aria-haspopup="true">
                                <a href="{{route("admin.membership.promotions")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Packege Promotions </span>
                                </a>
                            </li>

                            @endcanany



                            @can("Assign Application")
                            <li class="menu-item nav-pending-applications" aria-haspopup="true">
                                <a href="{{route("admin.cluster.association")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Cluster Association</span>
                                </a>
                            </li>
                            <li class="menu-item nav-assigned-applications" aria-haspopup="true">
                                <a href="{{route("admin.strategic.strategic")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text"> Strategic Oriantation</span>
                                </a>
                            </li>
                            <li class="menu-item nav-assigned-applications" aria-haspopup="true">
                                <a href="{{route("admin.benefit.benefit")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text"> Services & Benefits</span>
                                </a>
                            </li>
                            <li class="menu-item nav-assigned-applications" aria-haspopup="true">
                                <a href="{{route("admin.membership_level.membership_level")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text"> Membership Levels</span>
                                </a>
                            </li>
                            <li class="menu-item nav-assigned-applications" aria-haspopup="true">
                                <a href="{{route("admin.all.memberships")}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">  Memberships Application(s)</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            <li class="menu-section">
                <h4 class="menu-text">Reporting Section</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu nav-reporting" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-event-calendar-symbol"></i>
                    <span class="menu-text">Reporting</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Reporting</span>
                        </span>
                        </li>
                        <li class="menu-item nav-general-report" aria-haspopup="true">
                            <a href="{{ route('admin.general.reporting.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">General Report</span>
                            </a>
                        </li>
                       @can("Manage Report")
                            <li class="menu-item nav-report-source" aria-haspopup="true">
                                <a href="{{ route('admin.report.source.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text"> Report Sources</span>
                                </a>
                            </li>
                            <li class="menu-item nav-report-list" aria-haspopup="true">
                                <a href="{{ route('admin.report.list') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text"> Report List</span>
                                </a>
                            </li>
                        @endcan
                        <li class="menu-item nav-custom-report" aria-haspopup="true">
                            <a href="{{ route('admin.construct.reports') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Generate Custom Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu nav-reporting" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-event-calendar-symbol"></i>
                    <span class="menu-text">Partners</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Reporting</span>
                        </span>
                        </li>
                        <li class="menu-item nav-general-report" aria-haspopup="true">
                            <a href="{{ route('admin.our.partners') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Our Partners</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            {{--  --}}
            @can('Client Feedback')
            <li class="menu-section">
                <h4 class="menu-text">Client Feedback</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu nav-client-feedback" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon2-website"></i>
                    <span class="menu-text">Feedback</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Feedback</span>
                        </span>
                        </li>
                        <li class="menu-item nav-client-feedback-list" aria-haspopup="true">
                            <a href="{{ route('admin.feedback.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">All Feedback</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu nav-client-feedback" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon2-website"></i>
                    <span class="menu-text">Advocaies</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text">Interests Services</span>
                        </span>
                        </li>
                        <li class="menu-item nav-client-feedback-list" aria-haspopup="true">
                            <a href="{{ route('admin.list.advocacy.intersts') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Interests Services</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
            {{--  --}}
            @can('User Management')
                <li class="menu-section">
                    <h4 class="menu-text">System Users Section</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu nav-user-managements" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users"></i>
                        <span class="menu-text">User Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">User Management</span>
                            </span>
                            </li>
                            <li class="menu-item nav-all-users" aria-haspopup="true">
                                <a href="{{ route('admin.users.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Users</span>
                                </a>
                            </li>
                            <li class="menu-item nav-all-clients" aria-haspopup="true">
                                <a href="{{ route('admin.clients.list') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Clients</span>
                                </a>
                            </li>
                            <li class="menu-item nav-all-permissions" aria-haspopup="true">
                                <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Permissions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('Manage Ihuzo Members')
            <li class="menu-item nav-all-members" aria-haspopup="true">
                <a href="{{route('admin.clients.index')}}" class="menu-link">
                    <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Bezier-curve.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M4.95312427,14.3025791 L3.04687573,13.6974209 C4.65100965,8.64439903 7.67317997,6 12,6 C16.32682,6 19.3489903,8.64439903 20.9531243,13.6974209 L19.0468757,14.3025791 C17.6880467,10.0222676 15.3768837,8 12,8 C8.62311633,8 6.31195331,10.0222676 4.95312427,14.3025791 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M5.73243561,6 L9.17070571,6 C9.58254212,4.83480763 10.6937812,4 12,4 C13.3062188,4 14.4174579,4.83480763 14.8292943,6 L18.2675644,6 C18.6133738,5.40219863 19.2597176,5 20,5 C21.1045695,5 22,5.8954305 22,7 C22,8.1045695 21.1045695,9 20,9 C19.2597176,9 18.6133738,8.59780137 18.2675644,8 L14.8292943,8 C14.4174579,9.16519237 13.3062188,10 12,10 C10.6937812,10 9.58254212,9.16519237 9.17070571,8 L5.73243561,8 C5.38662619,8.59780137 4.74028236,9 4,9 C2.8954305,9 2,8.1045695 2,7 C2,5.8954305 2.8954305,5 4,5 C4.74028236,5 5.38662619,5.40219863 5.73243561,6 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z M4,19 C2.34314575,19 1,17.6568542 1,16 C1,14.3431458 2.34314575,13 4,13 C5.65685425,13 7,14.3431458 7,16 C7,17.6568542 5.65685425,19 4,19 Z M4,17 C4.55228475,17 5,16.5522847 5,16 C5,15.4477153 4.55228475,15 4,15 C3.44771525,15 3,15.4477153 3,16 C3,16.5522847 3.44771525,17 4,17 Z M20,19 C18.3431458,19 17,17.6568542 17,16 C17,14.3431458 18.3431458,13 20,13 C21.6568542,13 23,14.3431458 23,16 C23,17.6568542 21.6568542,19 20,19 Z M20,17 C20.5522847,17 21,16.5522847 21,16 C21,15.4477153 20.5522847,15 20,15 C19.4477153,15 19,15.4477153 19,16 C19,16.5522847 19.4477153,17 20,17 Z" fill="#000000"/></g>
                        </svg>
                    </span>
                    <span class="menu-text">Ihuzo Members</span>
                </a>
            </li>
            @endcan
            @canany(systemSettingsPermissions())
            <li class="menu-section">
                <h4 class="menu-text">System Settings Section</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu nav-system-settings" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Select.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
													<path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    <span class="menu-text">System Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">System Settings</span>
												</span>
                        </li>
                        @can("Manage Digital Services")
                        <li class="menu-item nav-all-services" aria-haspopup="true">
                            <a href="{{route('admin.service.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Digital Services</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Business Sectors")
                        <li class="menu-item nav-all-business-sectors" aria-haspopup="true">
                            <a href="{{route('admin.business.sector.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Business Sectors</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Registration Types")
                        <li class="menu-item nav-all-registration-types" aria-haspopup="true">
                            <a href="{{route('admin.registration.type.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Registration Types</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Opportunity Types")
                        <li class="menu-item nav-opportunity-types" aria-haspopup="true">
                            <a href="{{route('admin.opportunity-type.index')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Opportunity Types</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Company Categories")
                        <li class="menu-item nav-all-company-categories" aria-haspopup="true">
                            <a href="{{route('admin.company.category.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Company Categories</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Platform Type")
                        <li class="menu-item nav-all-platform-types" aria-haspopup="true">
                            <a href="{{route('admin.platform.type.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Platform Type</span>
                            </a>
                        </li>
                        @endif

                        <li class="menu-item nav-all-i-worker-categories" aria-haspopup="true">
                            <a href="{{route('admin.i.worker.category.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">I Worker Categories</span>
                            </a>
                        </li>
                        @can("Manage Level of Studies")
                        <li class="menu-item nav-all-level-of-studies" aria-haspopup="true">
                            <a href="{{route('admin.level.of.study.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Level of Studies</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage iWorker Software skills")
                        <li class="menu-item nav-all-i-worker-software-skills" aria-haspopup="true">
                            <a href="{{route('admin.i.worker.software.skills.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">I Worker Software skills</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Payment Methods")
                        <li class="menu-item nav-all-payment-methods" aria-haspopup="true">
                            <a href="{{route('admin.payment.method.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Payment Methods</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Digital platforms")
                        <li class="menu-item nav-all-digital-platforms" aria-haspopup="true">
                            <a href="{{route('admin.digital.platform.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Digital platforms</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Income Ranges")
                        <li class="menu-item nav-all-income-ranges" aria-haspopup="true">
                            <a href="{{route('admin.income.range.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Income Ranges</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Credit Sources")
                        <li class="menu-item nav-all-credit-sources" aria-haspopup="true">
                            <a href="{{route('admin.credit.source.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Credit Sources</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Physical Disability")
                        <li class="menu-item nav-all-physical-disability" aria-haspopup="true">
                            <a href="{{route('admin.physical.disability.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Physical Disability</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Field Of Study")
                        <li class="menu-item nav-all-field-of-study" aria-haspopup="true">
                            <a href="{{route('admin.field.of.study.create')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Field Of Study</span>
                            </a>
                        </li>
                        @endcan
                        @can("Manage Specialities")
                            <li class="menu-item nav-all-specialities" aria-haspopup="true">
                                <a href="{{route('admin.specialities.create')}}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Specialities</span>
                                </a>
                            </li>
                        @endcan
{{--                        @can("Manage System Parameters")--}}
{{--                        <li class="menu-item nav-all-system-parameters" aria-haspopup="true">--}}
{{--                            <a href="{{route('admin.system_parameter.index')}}" class="menu-link">--}}
{{--                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="menu-text">System Parameters</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endcan--}}

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{route('admin.audits.index')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">System Audits</span>
                            </a>
                        </li>
                        <li class="menu-item nav-job-opportunities-list" aria-haspopup="true">
                                <a href="{{ route('admin.news.interest') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">News Interests </span>
                                </a>
                            </li>
                    </ul>
                </div>
            </li>
            @endcanany
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
