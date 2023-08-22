<div>
    @section('title', 'Single Resources')
    @livewireStyles
    @include('partials.includes._home_nav')


    <div class="container my-3">
        <div class="min-h-450px">

            <!-- Nav tabs -->
            <div class="row" style="justify-content: right; margin-top: 2em">
                <div class="col-lg-3 py-4"
                x-data="{ open: true }">

                <h1>Categories</h1>
               <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                    id="accordion1">
                    <div class=" shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                        <label for="job_1" class="mb-0 h5">
                            Open Api's</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="1" id="job_1">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>
                    <div class=" shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                        <label for="job_1" class="mb-0 h5">
                            Partner API's</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="1" id="job_1">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>
                    <div class=" shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                        <label for="job_1" class="mb-0 h5">
                            Internal API's</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="1" id="job_1">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>
                    <div class=" shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                        <label for="job_1" class="mb-0 h5">
                            Composite API's</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="1" id="job_1">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>


               </div>
           </div>
                <div class="col-md-9" style="margin: auto">
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, dolor totam? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Laudantium veniam libero cum nobis illum repellat saepe reiciendis itaque ut consequuntur.</p> --}}

                        <h2 style="margin: auto">{{ $resource->resource_title }}</h2>
                    <div class="d-flex mt-5 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4">
                        <img class="w-md-125px w-100 h-125px object-contain align-self-start mr-md-2 rounded-lg shadow-sm" src="{{ asset('resources_covers/'.$resource->resource_cover) }}" alt="">
                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mx-2">
                            <span class="font-weight-boldest text-dark font-size-lg mb-1 font-size-h4">
                                {{ $resource->resource_title }}
                                 </span>
                        <div>

                                                </div>
                                    <p>
                                {{-- Minima et ut modi fa Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores autem tenetur ratione? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, blanditiis. --}}
                            </p>
                            <div class="" style="display: flex">
                                <a class="btn btn-md btn-info" style="width: 100px;
                            height: 42px;" href="{{ $resource_link }}" target="__blank">Open Api</a>
                            <a class="btn btn-md btn-info" style="width: 100px;
                            height: 42px;">Paid</a>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <span>Rate</span>
                                        <div class="font-weight-boldest h4 mb-0">
                                            0
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder">
                                        0  Review(s)
                                    </div>
                                </div>
                                <div>
                            <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                    </div>

                            </div>




                        </div>
                        <!--end::Title-->

                    </div>
                    <h2>Api Description</h2>
                    <p>{!! $resource->resource_description !!}</p>


                    {{-- <h2>Payment Gatway</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero blanditiis iste molestias veritatis reiciendis autem exercitationem molestiae necessitatibus, soluta, dolores impedit cupiditate error. Consequuntur provident nesciunt ea, enim magni corrupti ut nihil. Odio, porro beatae? Nostrum at sed autem repellat modi necessitatibus accusamus, tempore, veniam velit tempora unde quaerat soluta.</p> --}}
                </div>


            </div>
            <!-- Tab panes -->




            @include('partials.includes._loading')

        </div>

    </div>
    @livewireScripts
</div>
