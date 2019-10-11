 <!-- Slider area -->
 @extends('landing_master')

 @section('main_content')
 @section('title', 'Welcome - Safer-con')
 <section class="slider_area row m0">
     <div class="slider_inner">
         @foreach($homeSliders as $homeSlider)
         <div data-thumb="{{$homeSlider->image}}" data-src="{{$homeSlider->image}}">
             <div class="camera_caption">
                 <div class="container">
                     <h5 class=" wow fadeInUp animated">{{$homeSlider->label}}</h5>
                     <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{$homeSlider->header}}</h3>
                     <p class=" wow fadeInUp animated" data-wow-delay="0.8s">{{$homeSlider->description}}</p>
                   
                 </div>
             </div>
         </div>
         @endforeach
        
     </div>
 </section>
 <!-- End Slider area -->
 <!-- Professional Builde -->
 <section class="professional_builder row">
     <div class="container">
         <div class="row builder_all">
             @foreach($services as $service)
             <div class="col-md-3 col-sm-6 builder">
                 <i class="fa fa-home" aria-hidden="true"></i>
                 <h4>{{$service->label}}</h4>
                 <p>{{strip_tags($service->description)}}</p>
             </div>
             @endforeach

         </div>
     </div>
 </section>
 <!-- End Professional Builde -->



 <!-- Our Featured Works Area -->
 <section class="featured_works row" data-stellar-background-ratio="0.3">
     <div class="tittle wow fadeInUp">
         <h2>Our Previous Works</h2>
         <h4>These are few of our previous works in the past years.</h4>
     </div>
     <div class="featured_gallery">
         @foreach($previousWorks as $previousWork)
         <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
             <img src="{{$previousWork->image}}" alt="">
             <div class="gallery_hover">
                 <h4>{{$previousWork->label}}</h4>
               
             </div>
         </div>
         @endforeach
       
     </div>
 </section>
 <!-- End Our Featured Works Area -->

 <!-- Our Achievments Area -->
 <section class="our_achievments_area" data-stellar-background-ratio="0.3">
     <div class="container">
         <div class="tittle wow fadeInUp">
             <h2>Our Achievments</h2>
             <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
         </div>
         <div class="achievments_row row">
             <div class="col-md-3 col-sm-6 p0 completed">
                 <i class="fa fa-connectdevelop" aria-hidden="true"></i>
                 <span class="counter">800</span>
                 <h6>PROJECT COMPLETED</h6>
             </div>
             <div class="col-md-3 col-sm-6 p0 completed">
                 <i class="fa fa-home" aria-hidden="true"></i>
                 <span class="counter">230</span>
                 <h6>HOUSE RENOVATIONS</h6>
             </div>
             <div class="col-md-3 col-sm-6 p0 completed">
                 <i class="fa fa-child" aria-hidden="true"></i>
                 <span class="counter">1390</span>
                 <h6>WORKERS EMPLOYED</h6>
             </div>
             <div class="col-md-3 col-sm-6 p0 completed">
                 <i class="fa fa-trophy" aria-hidden="true"></i>
                 <span class="counter">125</span>
                 <h6>AWARDS WON</h6>
             </div>
         </div>
     </div>
 </section>
 <!-- End Our Achievments Area -->
 <!-- Our Testimonial Area -->
 <section class="testimonial_area row">
     <div class="container">
         <div class="tittle wow fadeInUp">
             <h2>Our TESTIMONIALS</h2>
             <h4>These are what our clients have said.</h4>
         </div>
         <div class="testimonial_carosel">

         @foreach($testimonials as $testimonial)
             <div class="item">
                 <div class="media">
                     <div class="media-left">
                         <a href="#">
                             <img class="media-object" src="{{$testimonial->image}}" alt="">
                         </a>
                     </div>
                     <div class="media-body">
                         <h4 class="media-heading">{{$testimonial->label}}</h4>
                         <h6>{{$testimonial->designation}}</h6>
                     </div>
                 </div>
                 <p><i class="fa fa-quote-right" aria-hidden="true"></i>{{strip_tags($testimonial->description)}}<i class="fa fa-quote-left" aria-hidden="true"></i></p>
             </div>

             @endforeach
       
         </div>
     </div>
 </section>
 <!-- End Our testimonial Area -->
   <!-- Our Partners Area -->
   <section class="our_partners_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Partners</h2>
                <h4>Some of our sister companies and partners</h4>
            </div>
            <div class="partners">
                @foreach($partners as $partner)
                <div class="item"><img src="{{$partner->image}}" alt=""></div>
                @endforeach
            </div>
        </div>
        
    </section>
    <!-- End Our Partners Area -->

 @endsection