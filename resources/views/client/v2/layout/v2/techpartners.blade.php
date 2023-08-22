<style>

 #img {
   width: 100px;
   /* height: 100px; */
   animation: scroll 60s linear infinite;
   align-items: center;
 }

 .slide-track {
   width: 100%;
   display: flex;
   gap: 3em;
   overflow: hidden;
 }

 .slider {
   margin-top: 70px;
   /* background-color: whitesmoke; */
   padding: 8em 2em;
 }

 @keyframes scroll {
   0% {transform: translateX(0);}
   100% {transform: translatex(-1000%)}
 }
 </style>

 {{-- <div class="container"> --}}
    <h2>OUR <b>Partners</b></h2>
   <hr>
   <div class="slider">
     <div class="slide-track">
       <div class="slide">
         <img id="img" src="{{ asset('partners/Coat_of_arms_of_Rwanda.svg') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/fab_lab.svg.png') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/klab.jpg') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/Udemy-Logo.png') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/API-750x350.jpg') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/innovation.jpg') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/Coat_of_arms_of_Rwanda.svg') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/fab_lab.svg.png') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/klab.jpg') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/Udemy-Logo.png') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/API-750x350.jpg') }}" style="margin-top: 3em" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/innovation.jpg') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/Coat_of_arms_of_Rwanda.svg') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/fab_lab.svg.png') }}" alt="">
       </div>
       <div class="slide">
         <img id="img" src="{{ asset('partners/klab.jpg') }}" style="margin-top: 3em" alt="">
       </div>

     </div>
   </div>
   <hr>
   {{-- <hr> --}}
 {{-- </div> --}}
 <!-- HTML-END -->


