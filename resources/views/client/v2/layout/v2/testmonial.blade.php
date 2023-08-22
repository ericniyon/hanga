<style>
    #ourtestmonials {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  padding-bottom:30px;
  height:150px;
}
#ourtestmonials .testmonials-wrap {
  display: block;
  width: 100%;
  margin: 0 auto;
  overflow: hidden;
}
#ourtestmonials .testmonials-wrap ul {
  display: block;
  list-style: none;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  margin-top: 2em;
  padding-bottom: 2em;
}
#ourtestmonials .testmonials-wrap ul li {
  display: block;
  float: left;
  position: relative;
  width: 50%;
  height: 100%;
  line-height: 100px;
  text-align: center;
}
#ourtestmonials .testmonials-wrap ul li img {
  vertical-align: middle;
  max-width: 100%;
  max-height: 100%;
  -webkit-transition: 0 linear left;
  -moz-transition: 0 linear left;
  transition: 0 linear left;
}
#ourtestmonials h2{
border-bottom:3px solid #3399ff;
width:100%;
padding:15px;
}
.card{
    border-right: 4px solid #2A3D7D;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
    padding: 15px 15px 15px 100px;
    margin: 10px 10px 100px 20px;
    overflow: hidden;
    position: relative;
    width: 90%;
}
.card:before{
            content: "";
            position: absolute;
            bottom: -4px;
            left: -17px;
            border-top: 25px solid #2A337E;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            transform: rotate(45deg);
        }
.card:after{
            content: "";
            position: absolute;
            top: -4px;
            left: -17px;
            border-top: 25px solid #2A337E;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            transform: rotate(135deg);
        }
.card .card-body .pic{
            display: inline-block;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            overflow: hidden;
            position: absolute;
            top: 60px;
            left: 20px;
        }
.card .pic img{
            width: 200px;
            height: auto;
        }

        .card .description{
            letter-spacing: 1px;
            color: #6f6f6f;
            line-height: 25px;
            margin-bottom: 15px;
        }
        .description{
            text-align: justify;
        }
        @media only screen and (max-width: 767px){
            .card{
                padding: 20px;
                text-align: center;
            }
            .card .pic{
                display: block;
                position: static;
                margin: 0 auto 15px;
            }
        }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<div id="ourtestmonials">
      <div class="testmonials-wrap">
        <ul id="testmonials" class="clearfix">

            {{-- @foreach (\App\Models\Testmonials::all() as $item) --}}
            <li>
                <div class="card">
                    <div class="card-body">
                        <div class="pic">
                            <img src="{{ asset('images/Boy_profile.png') }}">
                        </div>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada vulputate nisi in fermentum.
                             Vivamus ac libero quis nisi auctor pulvinar. Aenean sit amet lectus posuere, mattis massa eget,
                             ullamcorper diam. Nunc sit amet felis eget arcu congue dictum.
                        </p>
                    </div>
                </div>
              </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <div class="pic">
                            <img src="{{ asset('images/Boy_profile.png') }}">
                        </div>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada vulputate nisi in fermentum.
                             Vivamus ac libero quis nisi auctor pulvinar. Aenean sit amet lectus posuere, mattis massa eget,
                             ullamcorper diam. Nunc sit amet felis eget arcu congue dictum.
                        </p>
                    </div>
                </div>
              </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <div class="pic">
                            <img src="{{ asset('images/Boy_profile.png') }}">
                        </div>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada vulputate nisi in fermentum.
                             Vivamus ac libero quis nisi auctor pulvinar. Aenean sit amet lectus posuere, mattis massa eget,
                             ullamcorper diam. Nunc sit amet felis eget arcu congue dictum.
                        </p>
                    </div>
                </div>
              </li>
            <li>
                <div class="card">
                    <div class="card-body">
                        <div class="pic">
                            <img src="{{ asset('images/Boy_profile.png') }}">
                        </div>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada vulputate nisi in fermentum.
                             Vivamus ac libero quis nisi auctor pulvinar. Aenean sit amet lectus posuere, mattis massa eget,
                             ullamcorper diam. Nunc sit amet felis eget arcu congue dictum.
                        </p>
                    </div>
                </div>
              </li>
            {{-- @endforeach --}}

         <li>
         </li>
        </ul>
      </div>
    </div>







    <script>
        $(function() {
      var $testmonialslider = $('#testmonials');
      var testmonials = $testmonialslider.children().length;

      if(testmonials > 2){

          var clientwidth = (testmonials * 220 );
          $testmonialslider.css('width', clientwidth);
      }
      var rotating = true;
      var testmonialspeed = 1800;
      var seetestmonials = setInterval(rotatetestmonials, testmonialspeed);
      $(document).on({
        mouseenter: function() {
          rotating = false;
        },
        mouseleave: function() {
          rotating = true;
        }
      }, '#ourtestmonials');
      function rotatetestmonials() {
        if (rotating != false) {
          var $first = $('#testmonials li:first');
          $first.animate({
            'margin-left': '-200px'
          }, 2000, function() {
            $first.remove().css({
              'margin-left': '0px'
            });
            $('#testmonials li:last').after($first);
          });
        }
      }
    });
    </script>
