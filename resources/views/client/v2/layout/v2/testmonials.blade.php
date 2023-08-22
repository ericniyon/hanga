<style>
body {
  padding: 0;
  margin: 0;
}

section.row.testimonials {
  /* background-color: #F5F5F5; */
  padding: 20px;
  box-sizing: border-box;
}
section.row.testimonials .owl-carousel {
  width: 100%;
  cursor: move;
}
section.row.testimonials .owl-carousel .item {
  text-align: center;
  font-family: "Lato", sans-serif;
  padding: 30px;
  box-sizing: border-box;
  background-color: #ffffff;
  transition: 0.3s all linear;
}
section.row.testimonials .owl-carousel .item:hover {
  background-color: #2A337E;
}
section.row.testimonials .owl-carousel .item:hover h3,
section.row.testimonials .owl-carousel .item:hover p {
  color: #ffffff;
}
section.row.testimonials .owl-carousel .item:hover img {
  border: 3px solid white;
  box-sizing: border-box;
}
section.row.testimonials .owl-carousel .item h3 {
  color: #2A337E;
}
section.row.testimonials .owl-carousel .item p {
  color: #777777;
  font-family: "Open Sans", sans-serif;
  font-weight: 100;
  font-size: 13 px;
}
section.row.testimonials .owl-carousel .item img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin: 0 auto 30px;
  transition: 0.3s border linear;
}
section.row.testimonials .test-header {
  color: #2A337E;
  font-size: 1.75rem;
  font-weight: 500;
  margin: 0 auto;
  text-align: center;
  width: 100%;
}

section.row.testimonials .owl-dots {
  margin: 20px auto 0;
  /*for centering the dots*/
  text-align: center;
}
section.row.testimonials .owl-dot {
  width: 10px;
  height: 10px;
  border-radius: 100%;
  background-color: #2A337E;
  margin-right: 5px;
  display: inline-block;
}
section.row.testimonials .owl-dot.active {
  background: #F8671F;
}
section.row.testimonials .owl-dots.disabled {
  display: block !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.green.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.green.min.css">
<section class="row testimonials">
	<h2 class="test-header">Testimonials</h2>
    <br><br>
    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo laboriosam, modi quaerat voluptatibus magni voluptate commodi numquam sed sint.</p> --}}
	<div class="owl-carousel">
	  <div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor. Ut vulputate pellentesque accumsan. Mauris et ligula fermentum, accumsan sapien nec, ultricies tortor.</p> </div>
		<div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor. Ut vulputate pellentesque accumsan.</p> </div>
		<div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor.</p> </div>
		<div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor. Ut vulputate pellentesque accumsan. Mauris et ligula fermentum, accumsan sapien nec, ultricies tortor.</p> </div>
		 <div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor. Ut vulputate pellentesque accumsan. Mauris et ligula fermentum, accumsan sapien nec, ultricies tortor.</p> </div>
		 <div class="item">
		  <img src="https://unsplash.it/200" alt="Testimonial" />
		  <h3>FirstName LastName</h3>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem enim, mollis non ante id, aliquam commodo libero. Aliquam scelerisque luctus sem convallis porttitor. Ut vulputate pellentesque accumsan. Mauris et ligula fermentum, accumsan sapien nec, ultricies tortor.</p> </div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.js"></script>
<script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    nav: false,
	dots: true,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
	margin: 20,
	slideSpeed: 3000,
	animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    responsive: {
        0:{
            items: 1
        },
        600:{
            items: 2
        },
		960: {
			items: 3
		}
    }
});




var setMinHeight = function(minheight = 0) {
  jQuery('.owl-carousel').each(function(i,e){
    var oldminheight = minheight;
    jQuery(e).find('.owl-item').each(function(i,e){
      minheight = jQuery(e).height() > minheight ? jQuery(e).height() : minheight;
    });
    jQuery(e).find('.item').css("min-height",minheight + "px");
    minheight = oldminheight;
  });
};

	setMinHeight();
});

$(document).on('resize', function(){
		setMinHeight();
});
</script>
