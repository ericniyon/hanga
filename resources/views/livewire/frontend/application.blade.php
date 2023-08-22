<div>

    <style>
        .testimonial-slider .carousel-indicators button {
    width: 10px;
    height: 10px;
    background-color: #dc3545;
    border-radius: 100%;
}
.testimonial-slider {
    padding: 10px 0px 40px;
}
.heading-title:after{
    background: #2A337E
}
    </style>
<section class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-12" style="margin-left: 2rem">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading-title" style="display: flex; justify-content: space-between">
                            <h2 > Call  for  <strong class="text-active" style="color: #FD8902">Application</strong>  </h2>
                            {{-- <h2 style="text-align: start">Call  For  <strong class="text-active" style="color: #FD8902">Application</strong>  </h2> --}}
                        </div>
                        </div>
                        <div class="col-md-6">

                            <h1 >  <strong class="text-active" style="color: #FD8902">Application form for Data Intelligence Acceleration Program info-session for companies</strong>  </h1>

                        </div>
                </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <img class="img-radius img-border img-shadow img-margin no-margin-lg"

                    src="{{ asset('images/ict_chamber.png') }}" alt="image alt">
                </div>

                <div class="col-lg-6 col-md-12">
                    {{-- <h2>Call For Application</h2> --}}
                    <p style="margin-left: 2rem; text-align:justify">
                        The Rwanda ICT Chamber,  in collaboration with Cenfri, MINICT, and other partners are working to support interested businesses to explore the data the use of data to improve their businesses and the economy at large. The companies present in this info-session will get the opportunity to get more information on how the Data Intelligence Acceleration Program will support them in the following aspects:

                        
                    </p>
                    {{-- <h2>Suitable Education Background or Experience </h2> --}}
                    <p >
                        <ul style="margin-left: 3rem; list-style:initial">
                            <li>Determine the company's Data Management Maturity/Readiness Status</li>
                            <li>Develop a company Data Strategy </li>
                            <li>Train & certify staff in Data Management skills</li>
                            <li>Improve compliance with new Data Privacy Law </li>
                            <li>Access relevant public or private sector datasets for innovation </li>
                            
                        </ul>
                    </p>
                    <p style="margin-left: 2rem; text-align:justify">
                    ICT Chamber is therefore inviting interested companies to submit applications for the info session that will take place on 18th Nov 2022, time and venue of info session will be communicated before the day of this session through emails and SMSes. Deadline for application for this info session is  16th Nov 2022
                    </p>
                    <a style="margin-left: 2rem" href="https://docs.google.com/forms/d/e/1FAIpQLScO-i5Cec5ks9IHCY38Dha6knx5GAkCffIKTZYL3jc2ggOjvQ/viewform" target="__blank" class="btn btn-md btn-primary btn-outline">Apply Here</a>
                </div>
                <div class="col-md-12">
                    <hr class="separator">
                </div>
                        @forelse ($applications as $application)

                <div class="col-md-12 col-lg-4">
                    <div class="feature mb-3 text-center">
                        <i class="craftico-sustainability"></i>
                        <h4>{{ $application->title }}</h4>
                        <p>{{ $application->requirements }}</p>
                        <a href="{{ route('v2.detailed.apply', $application->id ) }}" class="btn btn-default btn-outline-primary" >Apply Now</a>
                    </div>

                </div>
                @empty

                        @endforelse


            </div>
        </div>
    </section>



</div>
