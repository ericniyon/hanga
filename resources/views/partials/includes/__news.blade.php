<div class="col-lg-12">
<style>
    p{
        font-size: 14px !important;
        margin-left: 2rem;
        text-align: justify
    }
</style>
    <div style="display: none">
    </div>
    <!--end of popular contents ----->

    <!-- end of popular articles -->

    <!-- favourite articles -->
    <div style="display: none">
    </div>

    <!--End Single New Article-->


    <!-- toRead articles -->
    <div style="display: none">
    </div>
    <!-- end of toRead articles-->



    <!-- myarticles articles -->
    <div style="display: block" class="mt-2 flex-column flex-md-row align-items-center mb-9 card tw-rounded-lg  border-0 overflow-hidden tw-p-4 tw-shadow">
        <div class="row bottom-border">


            <div class="col-md-4">
                <img class="w-md-150px w-100 h-150px object-cover align-self-start mr-md-2 rounded-lg shadow-sm mr-1"
                    src="{{ asset('storage/public/articles/'.$item->coverPicture) }}" alt="Logo">
            </div>

            <div class="col-md-8">
                @if (auth('client')->check())
                <a href="{{  route('client.news-details', $item->id) }}" class="font-size-h5 text-hover-primary mb-1 font-bold"
                    style="color:#141414;">
                    <h5 style="font-weight: 900; margin-left: 2.5rem; text-align: justify">
                        {{ $item->title }}
                    </h5>
                </a>
                @else

                <a href="{{  route('v2.new-details',$item->id) }}" class="font-size-h5 text-hover-primary mb-1 font-bold"
                    style="color:#141414;">
                    <h5 style="font-weight: 900; margin-left: 2.5rem; text-align: justify">
                        {{ $item->title }}
                    </h5>
                </a>
                @endif
                {{-- <br> --}}
                <p style="text-align: justify; font-size: 0px !important" class="p">
                    {!! $content !!}
                     </p>
                     <br>
                <span style="font-size: 1rem; font-weight: gray-800; margin-left: 2.5rem">{{ $item->created_at->format('F d Y')  }} </span>
            </div>

        </div>

    </div>
    <!-- end of myarticles articles -->


    <!-- new articles articles -->
    <div style="display: none">
    </div>
    <!-- update / edit  articles articles -->
    <div style="display: none">
    </div>
    <!-- news detail -->
    <div style="display: none">
        <div class="mx-4 my-4">
        </div>
        <!--end Article Part 2-->

    </div>
    <!-- end of newarticles articles -->



</div>
