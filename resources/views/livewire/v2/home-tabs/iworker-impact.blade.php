

@livewireScripts

<script>
    $(document).ready(function(){

if($('.brands_slider').length)
     {
         var brandsSlider = $('.brands_slider');

         brandsSlider.owlCarousel(
         {
             loop:true,
             autoplay:true,
             autoplayTimeout:5000,
             nav:false,
             dots:false,
             autoWidth:true,
             items:8,
             margin:42
         });

         if($('.brands_prev').length)
         {
             var prev = $('.brands_prev');
             prev.on('click', function()
             {
                 brandsSlider.trigger('prev.owl.carousel');
             });
         }

         if($('.brands_next').length)
         {
             var next = $('.brands_next');
             next.on('click', function()
             {
                 brandsSlider.trigger('next.owl.carousel');
             });
         }
     }


 });
</script>
</div>



 <div class="row">
    <div class="col-12 h-20px">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div>{{ __('app.Please wait') }} ... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div>
            <div class="row my-4 justify-content-center">
                <div class="col-12">

                    @forelse (App\Models\Impact::where('impact_section', 'iWorker')->get() as $item)
        <div class="col-md-12" style="text-align: center">

            <div class="col-md-1">
                <img src="{{ asset('images/dots.svg') }}" alt="" style="float: right; position: absolute">
            </div>
            <h2 style="padding-bottom: 2em"> <span class="iworkers">{{$item->impact_title}}</span> Dashboard</h3>
    <p style="text-align: justify">
    {{$item->impact_description}}
        </p>

        <iframe title="MSMS - Page 1" width="1200" height="800" src="{{$item->impact_link}}" frameborder="0" allowFullScreen="true"></iframe>
    </div>
        @empty
        <div class="col-md-12 d-flex flex-column justify-content-center" style="min-height: 109px">
            <div class="alert alert-custom alert-white shadow-sm rounded alert-notice">
                <div class="alert-icon">
                    <span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                    </span>
                </div>
                <div class="alert-text">
                    {{ __('No dashboard rated teck busness found') }}
                </div>
            </div>
        </div>
        @endforelse
                </div>
            </div>

{{-- partners --}}

</div>


    </div>

    <div class="col-lg-12">
        @include('client.v2.layout.v2.techpartners')
    </div>
    <div class="col-lg-12">

        {{-- @include('client.v2.layout.v2.testmonials') --}}
    </div>
</div>
