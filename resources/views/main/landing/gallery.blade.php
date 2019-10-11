 <!-- Slider area -->
 @extends('landing_master')

 @section('main_content')
 @section('title', 'Welcome - Safer-con')
 <section class="our_services_area">
     <div class="container">
         <div class="tittle wow fadeInUp">
             <h2>Galleries</h2>
             <h4>These are some of the memorable events we have had over the years.</h4>
         </div>
         <div class="portfolio_inner_area">

             <div class="portfolio_item">
                 <div class="grid-sizer"></div>

                 @foreach($galleries as $gallery)
                 <div class="single_facilities col-xs-4 p0 painting photography adversting">
                     <div class="single_facilities_inner">
                         <img src="{{$gallery->image}}" alt="">
                         <div class="gallery_hover">
                             <h4>{{$gallery->label}}</h4>
                             <ul>
                                 <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>

                 @endforeach

             </div>
         </div>
     </div>
 </section>
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