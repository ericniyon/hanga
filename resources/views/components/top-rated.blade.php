<div class="" data-aos="fade-up">
    <div class="text-center">
        <div style="background-color: #f0f0f3 !important" class="p-4 text-ihuzo">
            <h4 class="mb-0 font-weight-boldest font-quicksand">
                {{ __('app.Top Rated') }}
            </h4>
        </div>
    </div>
    <div class="container">
        <ul class="nav custom-navs nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active rounded-0" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                   role="tab"
                   aria-controls="pills-home" aria-selected="true">
                    {{ __('Tech Business') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-0" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                   role="tab"
                   aria-controls="pills-profile" aria-selected="false">
                    {{ __('Busines Directory') }}
                </a>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <a class="nav-link rounded-0" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                   role="tab"
                   aria-controls="pills-contact" aria-selected="false">
                    {{ __('app.iWorkers') }}
                </a>
            </li> --}}
        </ul>
        <div class="tab-content min-h-100px" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <x-v2.high-rated-clients :items="$dsps"/>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <x-v2.high-rated-clients :items="$msmes"/>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <x-v2.high-rated-clients :items="$iworkers"/>
            </div>
        </div>
    </div>
</div>
