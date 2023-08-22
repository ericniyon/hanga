<div>
    <style>
.outer-div,
.inner-div {
  height: $card-height;
  max-width: $card-width;
  margin: 0 auto;
  position: relative;
}

.outer-div {
  perspective: 900px;
  perspective-origin: 50% calc(50% - 18em);
}

.inner-div {
  margin: 0 auto;
  border-radius: 5px;
  font-weight: 400;
  color: $black;
  font-size: 1rem;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
  transform-style: preserve-3d;


  &:hover .social-icon {
    opacity: 1;
    top: 0;
  }

  /*&:hover .front__face-photo,
  &:hover .front__footer {
    opacity: 1;
  }*/
}



.front,
.back {
  position: relative;
  top: 0;
  left: 0;
  backface-visibility: hidden;
}

.front {
  cursor: pointer;
  height: 100%;
  background: $white;
  backface-visibility: hidden;
  border-radius: 5px;
  border:2px solid #E7E7E7;
}



.front__face-photo {
  position: relative;
  top: -60px;
  height: 120px;
  width: 120px;
  margin: 0 auto;
  border-radius: 50%;
  border: 5px solid $white;

  background-size: contain;
  overflow: hidden;
 /* backface-visibility: hidden;
  transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
  z-index: 3;*/
}

.front__text {
  position: relative;
  top: -55px;
  margin: 0 auto;
  backface-visibility: hidden;

  .front__text-header {
    font-weight: 700;
    text-transform: uppercase;
  }

  .front__text-para {
    position: relative;
    top: -5px;
  }

  .front-icons {
    position: relative;
    top: 0;
    font-size: 14px;
    margin-right: 6px;
    color: gray;
  }

  .front__text-hover {
    position: relative;
    top: 10px;
    color: $red;
    backface-visibility: hidden;

    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .4px;

    border: 2px solid $red;
    padding: 8px 15px;
    border-radius: 30px;

    background: $red;
    color: $white;
  }
}

.back {
  transform: rotateY(180deg);
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: $black;
  border-radius: 5px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.social-media-wrapper {
  font-size: 36px;

  .social-icon {
    position: relative;
    top: 20px;
    margin-left: 5px;
    margin-right: 5px;
    opacity: 0;
    color: #fff;
    transition: all 0.4s cubic-bezier(0.3, 0.7, 0.1, 1.9);
  }

  .social-icon:nth-child(1) {
    transition-delay: 0.6s;
  }

  .social-icon:nth-child(2) {
    transition-delay: 0.7s;
  }

  .social-icon:nth-child(3) {
    transition-delay: 0.8s;
  }

  .social-icon:nth-child(4) {
    transition-delay: 0.9s;
  }
}

.fab {
  position: relative;
  top: 0;
  left: 0;
  transition: all 200ms ease-in-out;
}

.fab:hover {
  top: -5px;
}
h2{
    font-weight: 800;
    margin-top: 3em;
}

.logoBar {
    display: none !important;
    position: relative;
    background-color: red !important
}
body{
     background:#eee;
 }
 .brands {
     width: 100%;
     padding-top: 90px;
     padding-bottom: 90px
 }

 .brands_slider_container {
     height: 130px;
     border: solid 1px #e8e8e8;
     box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
     padding-left: 97px;
     padding-right: 97px;
     background: #fff;
 }

 .brands_slider {
     height: 100%;
     margin-top: 50px
 }

 .brands_item {
     height: 100%
 }

 .brands_item img {
     max-width: 100%
 }

 .brands_nav {
     position: absolute;
     top: 50%;
     -webkit-transform: translateY(-50%);
     -moz-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
     -o-transform: translateY(-50%);
     transform: translateY(-50%);
     padding: 5px;
     cursor: pointer
 }

 .brands_nav i {
     color: #e5e5e5;
     -webkit-transition: all 200ms ease;
     -moz-transition: all 200ms ease;
     -ms-transition: all 200ms ease;
     -o-transition: all 200ms ease;
     transition: all 200ms ease
 }

 .brands_nav:hover i {
     color: #676767
 }

 .brands_prev {
     left: 40px
 }

 .brands_next {
     right: 40px
 }
 .testimonial-slider .carousel-indicators button {
    width: 10px;
    height: 10px;
    background-color: #dc3545;
    border-radius: 100%;
}
.testimonial-slider {
    padding: 10px 0px 40px;
}
.iworkers{
    border-bottom: 3px solid #F5841F;
}
</style>

    {{-- In work, do what you enjoy. --}}
    <div class="row" style="justify-content: center" >

        @forelse (App\Models\Impact::where('impact_section', 'Digital Finance')->get() as $item)
        <div class="col-md-10" style="text-align: center">
            <div class="col-md-1">
                <img src="{{ asset('images/dots.svg') }}" alt="" style="float: right; position: absolute">
            </div>
            <h2 style="padding-bottom: 2em"> <span class="iworkers"> {{ $item->impact_title }}</span> Dashboard</h3>
        <p style="text-align: justify">
            {{ $item->impact_description }}
            </p>

        <iframe title="{{ $item->impact_title }}" width="1000" height="700" src="{{ $item->impact_link }}" frameborder="0" allowFullScreen="true"></iframe>
    </div>
        @empty
            <p>No dashboard available in this category</p>
        @endforelse

        <div class="col-md-1">
            <img src="{{ asset('images/dots.svg') }}" alt="" style="float: right; position: absolute">
        </div>

    </div>

    <div class="row" style="justify-content: center;" style="">

        @include('client.v2.layout.v2.techpartners')
    </div>

<div class="row" style="justify-content: center; margin-bottom: 15em">


    <div class="col-md-12" style="text-align: center; ">
        {{-- <h2 style="padding-bottom: 2em">Testmonials</h2> --}}

        {{-- <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis voluptatum facilis illum corrupti id impedit maxime suscipit consequatur porro esse.

            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique nihil iure molestiae sapiente exercitationem ea sed, magni modi doloremque
            corporis odit sequi itaque explicabo aperiam quis fugit pariatur tenetur fugiat?
        </p> --}}


            @include('client.v2.layout.v2.testmonial')
    </div>





</div>
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
