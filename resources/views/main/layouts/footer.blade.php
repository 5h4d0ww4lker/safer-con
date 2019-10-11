   <!-- Footer Area -->
   <footer class="footer_area">
       <div class="container">
           <div class="footer_row row">
               <div class="col-md-3 col-sm-6 footer_about">
                   <img src="{{asset('/public/main/images/logo.png')}}" alt="">
               </div>
               <div class="col-md-3 col-sm-6 footer_about">
                   <h2>ABOUT OUR COMPANY</h2>

                   <?php

                    use App\Models\About;

                    $abouts = About::first()->paginate(1000);
                    ?>
                   @foreach($abouts as $about )
                   <?php $str = $about->description;
                    $short = substr($str, 0, 100);
                    ?>
                   <p>{{strip_tags($short)}}</p>
                   @endforeach
                   <ul class="socail_icon">
                       <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                   </ul>
               </div>
               <div class="col-md-3 col-sm-6 footer_about quick">
                   <h2>Quick links</h2>
                   <ul class="quick_link">
                       <li><a href="{{url('/')}}"><i class="fa fa-chevron-right"></i>Home</a></li>
                       <li><a href="{{url('/about')}}"><i class="fa fa-chevron-right"></i>About</a></li>
                       <li><a href="{{url('/services')}}"><i class="fa fa-chevron-right"></i> Services</a></li>
                       <li><a href="{{url('/gallery')}}"><i class="fa fa-chevron-right"></i>Gallery</a></li>

                   </ul>
               </div>

               <div class="col-md-3 col-sm-6 footer_about">
                   <h2>CONTACT US</h2>
                   <address>
                       <?php

                        use App\Models\Contact;

                        $contacts = Contact::first()->paginate(1000);
                        ?> @foreach($contacts as $contact )
                       <ul class="my_address">

                           <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>{{$contact->email}}</a></li>
                           <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>{{$contact->phone}}</a></li>
                           <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$contact->location}} </span></a></li>
                       </ul>
                       @endforeach
                   </address>
               </div>
           </div>
       </div>
       <div class="copyright_area">
           Copyright 2019 All rights reserved. Designed by <a href="https://leuNet.com">LeuNet ICT Solutions.</a>
       </div>
   </footer>
   <!-- End Footer Area -->

   <!-- jQuery JS -->
   <script src=" {{asset('/public/main/js/jquery-1.12.0.min.js') }}"></script>
   <!-- Bootstrap JS -->
   <script src=" {{asset('/public/main/js/bootstrap.min.js') }}"></script>
   <!-- Animate JS -->
   <script src=" {{asset('/public/main/vendors/animate/wow.min.js') }}"></script>
   <!-- Camera Slider -->
   <script src=" {{asset('/public/main/vendors/camera-slider/jquery.easing.1.3.js') }}"></script>
   <script src=" {{asset('/public/main/vendors/camera-slider/camera.min.js') }}"></script>
   <!-- Isotope JS -->
   <script src=" {{asset('/public/main/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
   <script src=" {{asset('/public/main/vendors/isotope/isotope.pkgd.min.js') }}"></script>
   <!-- Progress JS -->
   <script src=" {{asset('/public/main/vendors/Counter-Up/jquery.counterup.min.js') }}"></script>
   <script src=" {{asset('/public/main/vendors/Counter-Up/waypoints.min.js') }}"></script>
   <!-- Owlcarousel JS -->
   <script src=" {{asset('/public/main/vendors/owl_carousel/owl.carousel.min.js') }}"></script>
   <!-- Stellar JS -->
   <script src=" {{asset('/public/main/vendors/stellar/jquery.stellar.js') }}"></script>
   <!-- Theme JS -->
   <script src=" {{asset('/public/main/js/theme.js') }}"></script>