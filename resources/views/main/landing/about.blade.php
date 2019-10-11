@extends('landing_master')

@section('main_content')
@section('title', 'About - Safer-con')
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>About Us</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#" class="active">About Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>ABOUT US</h2>
                <h4>Let us tell you a few things about us.</h4>
            </div>
            @foreach($abouts as $about)
            <div class="row about_row">
                <div class="col-md-5 col-sm-6 about_client about_pages_client">
                    <img src="{{$about->image}}" alt="">
                </div>
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>{{$about->label}}</h2>
                    </div>
                    <p>{{strip_tags($about->description)}}</p>
                    <a href="#" class="button_all">Contact Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- call Area -->
    <section class="call_min_area">
        <div class="container">
            @foreach($contacts as $contact)
            <h2>{{$contact->phone}}</h2>
            @endforeach
            <p>Contact With Us. We are the top Construction Company. With years of experience.</p>
           
        </div>
    </section>
    <!-- End call Area -->





    <!-- Our Team Area -->
    <section class="our_team_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Team</h2>
                <h4>Most experienced and founding members</h4>
            </div>
            <div class="row team_row">
                @foreach($teams as $team)
                <div class="col-md-3 col-sm-6 wow fadeInUp">
                   <div class="team_membar">
                        <img src="{{$team->image}}" alt="">
                        <div class="team_content">
                           
                            <a href="#" class="name">{{$team->label}}</a>
                            <h6>{{strip_tags($team->description)}}</h6>
                        </div>
                   </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section>
    <!-- End Our Team Area -->
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