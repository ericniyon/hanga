<div class="mr-2">
    <button class="btn btn-light-info font-weight-bolder text-uppercase rounded btn-sm px-4"
        data-wizard-type="action-prev">

        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                    <path
                        d="M6.96323356,15.1775211 C6.62849853,15.5122561 6.08578582,15.5122561 5.75105079,15.1775211 C5.41631576,14.842786 5.41631576,14.3000733 5.75105079,13.9653383 L10.8939067,8.82248234 C11.2184029,8.49798619 11.7409054,8.4866328 12.0791905,8.79672747 L17.2220465,13.5110121 C17.5710056,13.8308912 17.5945795,14.3730917 17.2747004,14.7220508 C16.9548212,15.0710098 16.4126207,15.0945838 16.0636617,14.7747046 L11.5257773,10.6149773 L6.96323356,15.1775211 Z"
                        fill="#000000" fill-rule="nonzero"
                        transform="translate(11.500001, 12.000001) scale(-1, 1) rotate(-270.000000) translate(-11.500001, -12.000001) " />
                </g>
            </svg>
        </span>
        @lang('app.previous')
        &nbsp;
    </button>
</div>
<div>
    <button type="submit" id="js-submit-application"
        class="btn btn-success font-weight-bolder text-uppercase rounded btn-sm js-submit-button"
        data-wizard-type="action-submit">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        @lang('app.submit')
    </button>

    {{-- <a type="" class=" font-weight-bolder pl-5 mr-2">
        Sava as draft
    </a> --}}

    <button type="submit" class="btn btn-info font-weight-bolder pl-5 rounded btn-sm  text-uppercase js-submit-button"
        data-wizard-type="action-next">@lang('client_registration.next_step')

        <span class="svg-icon mr-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        &nbsp;
    </button>
</div>
