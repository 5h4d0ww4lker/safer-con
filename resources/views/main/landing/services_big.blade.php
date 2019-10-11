@extends('landing_master')

@section('main_content')
@section('title', 'About - Safer-con')
  <!-- Our Services Area -->
  <section class="our_services_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Services</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="portfolio_inner_area">
                <div class="portfolio_filter">
                    <ul>
                        <li data-filter="*" class="active"><a href=""> All</a></li>
                        <li data-filter=".photography"><a href="">ARCHITECTURE</a></li>
                        <li data-filter=".branding"><a href="">Building</a></li>
                        <li data-filter=".webdesign"><a href="">CONSTRUCTION</a></li>
                        <li data-filter=".adversting"><a href="">DESIGN</a></li>
                        <li data-filter=".painting"><a href="">Painting</a></li>
                    </ul>
                </div>
                <div class="portfolio_item">
                   <div class="grid-sizer"></div>
                    <div class="single_facilities col-xs-4 p0 painting photography adversting">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-1.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 webdesign">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-2.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 painting p0 photography branding">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-3.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 adversting webdesign adversting">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-4.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 painting adversting branding">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-5.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 webdesign photography magazine adversting">
                       <div class="single_facilities_inner">
                          	<img src="images/gallery/sv-6.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->

    @endsection
