<div>
    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion12"">


        <div class="card shadow-none rounded-1 p-4 my-2 border overflow-hidden" style="background: #FFEDDD"">
            <div class="card-header">
                <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="false">
                    <div class="card-label pl-4">
                        <span style="color: #2A337E; font-weight: bold; font-size: 18px">

                            About Advocacy

                        </span>
                        <p>IHUZO advocacy aims to bring about positive change in ICT sector. By advocating for a
                            particular cause or issue, individuals can help bring attention to a problem and work
                            towards a solution.</p>

                    </div>
                    <span class="svg-icon svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>



    <div class="row p-5">
        <div class="col-md-4">

            <h2>Advocacy</h2>
        </div>
        <div class="col-md-4">
            <span>Submission Date</span>
        </div>
        <div class="col-md-4">
            <h3>Status</h3>


        </div>
    </div>



    <div class="">

        <!--begin::Title-->
        @forelse (\App\Models\AccessToFinance::all() as $item)
        <a href="{{ route('client.advocacy_review', $item->id) }}" style="color:black">
            <div class="card" style="border-left: 1.4rem solid orange" >
            <div class="row p-5 my-5" >
                <div class="col-md-4">
                    <p>
                        {!! Str::limit($item->description, 300, '...') !!}
                    </p>
                    <h2>TAGs</h2>
                    <p>{{ $item->tags }}</p>
                </div>
                <div class="col-md-4">
                    <span>{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background: {{ $oriantaion_background_colors[array_rand($oriantaion_background_colors)] }};">
                        <div class="card-body">
                            <h3>Return</h3>
                            <p>please add reference to you advocacy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
            @empty
        <p>Ops there no recent advocacy request </p>
            @endforelse


    </div>



</div>
