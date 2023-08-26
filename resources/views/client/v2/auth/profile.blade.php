@extends('client.v2.layout.app')

@section('title', 'Profile')

@section('content')
    <div class="position-relative">
        <div class="h-100px bg-light-primary mt-n4 position-absolute" style="top: 0;left: 0;width: 100%;">

        </div>
        <div>
            <div class="row">
                <div class="col-md-2">
                    <div class="mt-30 d-flex justify-content-end">
                        <a href="" class="d-flex  align-items-center">
                            <span class="svg-icon">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 6.00125H3.14L6.77 1.64125C6.93974 1.43704 7.0214 1.17375 6.99702 0.909329C6.97264 0.644902 6.84422 0.400991 6.64 0.231252C6.43578 0.0615137 6.1725 -0.0201482 5.90808 0.0042315C5.64365 0.0286112 5.39974 0.157036 5.23 0.361252L0.23 6.36125C0.196361 6.40898 0.166279 6.45911 0.14 6.51125C0.14 6.56125 0.14 6.59125 0.0700002 6.64125C0.0246737 6.75591 0.000941121 6.87796 0 7.00125C0.000941121 7.12454 0.0246737 7.24659 0.0700002 7.36125C0.0700002 7.41125 0.0699999 7.44125 0.14 7.49125C0.166279 7.54339 0.196361 7.59353 0.23 7.64125L5.23 13.6413C5.32402 13.7541 5.44176 13.8449 5.57485 13.9071C5.70793 13.9694 5.85309 14.0015 6 14.0013C6.23365 14.0017 6.46009 13.9203 6.64 13.7713C6.74126 13.6873 6.82496 13.5842 6.88631 13.4679C6.94766 13.3515 6.98546 13.2242 6.99754 13.0932C7.00961 12.9622 6.99573 12.8302 6.95669 12.7046C6.91764 12.579 6.8542 12.4623 6.77 12.3613L3.14 8.00125H15C15.2652 8.00125 15.5196 7.8959 15.7071 7.70836C15.8946 7.52082 16 7.26647 16 7.00125C16 6.73604 15.8946 6.48168 15.7071 6.29415C15.5196 6.10661 15.2652 6.00125 15 6.00125Z"
                                        fill="#2A337E" />
                                </svg>

                            </span>
                            <span class="d-flex flex-column ml-2">
                                <span class="d-block font-weight-bolder text-info">Take me Back</span>
                                <span class="d-block text-info">
                                    to homepage
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="card rounded-lg min-h-400px border-0 shadow mt-10">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="d-flex flex-column mr-3">
                                    <img class="max-w-175px"
                                        src="https://www.logolynx.com/images/logolynx/ea/ea08da49fdb744f022634e3a30bacf1a.jpeg"
                                        alt="">
                                    <button class="btn btn-sm btn-info my-3">Upload</button>
                                    <button class="btn btn-sm btn-primary ">Delete</button>
                                </div>
                                <div class="d-flex flex-column">
                                    <h4>FABLAB RWANDA</h4>
                                    <span class="badge badge-info align-self-start my-3">
                                        Main Business Category
                                    </span>
                                    <p class="min-h-100px">
                                        trükinäidist. Lorem Ipsum ei ole ainult viis sajandit säilinud, vaid on ka edasi
                                        kandunud elektroonilisse trükiladumisse,
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse molestias,
                                        numquam officiis provident quae quasi repudiandae sed similique! Consectetur
                                        dignissimos incidunt inventore ipsam iusto molestias nemo sequi ut veritatis
                                        vero?
                                    </p>
                                    <button class="btn btn-sm btn-info align-self-start w-150px">Edit</button>
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-6">
                                    <div class="card rounded-0 h-100">
                                        <div class="card-header bg-info rounded-0 py-3">
                                            <h4 class="text-white mb-0">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <pathdiv stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </span>
                                                Settings
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>Change Password</div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Change Email
                                                    </div>
                                                    <div class="text-muted">
                                                        m----rt@gmail.com
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Change Phone Number
                                                    </div>
                                                    <div class="text-muted">
                                                        +250 78 - --- -17
                                                    </div>div
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-danger w-100 rounded-0 border-2 mt-5"
                                                type="button">Delete Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card rounded-0 h-100">
                                        <div class="card-header bg-info rounded-0 py-3">
                                            <h4 class="text-white mb-0">
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </span>
                                                Public contact and adress
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>Change Password</div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Email
                                                    </div>
                                                    <div class="text-muted">
                                                        m----rt@gmail.com
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Location address
                                                    </div>
                                                    <div class="text-muted">
                                                        48 KG588 ST Kacyiru,Gasabo,Kigali
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Website
                                                    </div>
                                                    <div class="text-muted">
                                                        www.fablab.rw
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-md-6">
                                    <div class="card rounded-0 h-100">
                                        <div class="card-header bg-info rounded-0 py-3">
                                            <h6 class="text-white mb-0">
                                                <span class="svg-icon">
                                                    <svg width="20" height="21" viewBox="0 0 20 21"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12 9H10V7H12V9ZM12 5H10V0H12V5ZM6 17C4.9 17 4.01 17.9 4.01 19C4.01 20.1 4.9 21 6 21C7.1 21 8 20.1 8 19C8 17.9 7.1 17 6 17ZM16 17C14.9 17 14.01 17.9 14.01 19C14.01 20.1 14.9 21 16 21C17.1 21 18 20.1 18 19C18 17.9 17.1 17 16 17ZM7.1 12H14.55C15.3 12 15.96 11.59 16.3 10.97L20 3.96L18.25 3L14.55 10H7.53L3.27 1H0V3H2L5.6 10.59L4.25 13.03C3.52 14.37 4.48 16 6 16H18V14H6L7.1 12Z"
                                                            fill="white" />
                                                    </svg>

                                                </span>
                                                Products & Services and Business category
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Change Email
                                                    </div>
                                                    <div class="text-muted">
                                                        m----rt@gmail.com
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between my-3 align-items-center">
                                                <div>
                                                    <div>
                                                        Change Phone Number
                                                    </div>
                                                    <div class="text-muted">
                                                        +250 78 - --- -17
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="svg-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.045 5.40088C15.423 5.02288 15.631 4.52088 15.631 3.98688C15.631 3.45288 15.423 2.95088 15.045 2.57288L13.459 0.986879C13.081 0.608879 12.579 0.400879 12.045 0.400879C11.511 0.400879 11.009 0.608879 10.632 0.985879L0 11.5849V15.9999H4.413L15.045 5.40088ZM12.045 2.40088L13.632 3.98588L12.042 5.56988L10.456 3.98488L12.045 2.40088ZM2 13.9999V12.4149L9.04 5.39688L10.626 6.98288L3.587 13.9999H2ZM0 17.9999H16V19.9999H0V17.9999Z"
                                                                fill="#2A337E" />
                                                        </svg>

                                                    </span>
                                                    Edit
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-danger w-100 rounded-0 border-2 mt-5"
                                                type="button">Delete Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>
        // without  using jQuery js find the sibling input and set it to checked


        $('.js-registration-type').on('click', function() {

            $(this).siblings('input[type="radio"]').prop('checked', true);

            $('.js-registration-type').removeClass('btn-primary').addClass('btn-outline-primary');

            $(this).removeClass('btn-outline-primary').addClass('btn-primary');

        });
    </script>
@stop
