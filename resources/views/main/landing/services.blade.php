@extends('landing_master')

@section('main_content')
@section('title', 'Services - Safer-con')
<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Services</h2>
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="#" class="active">Services</a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- Professional Builde -->
<section class="professional_builder row">
    <div class="container">
        <div class="row builder_all">

            @foreach($services as $service)
            <div class="col-md-3 col-sm-6 builder">
                <i class="fa fa-home" aria-hidden="true"></i>
                <h4>{{$service->label}}</h4>
                {{strip_tags($service->description)}}
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Professional Builde -->

<section class="what_we_area row">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>WHAT WE OFFER</h2>
            <h4>These are list of services we provide.</h4>
        </div>
        <div class="row construction_iner">

        @foreach($offers as $offer)
            <div class="col-md-4 col-sm-6 construction">
                <div class="cns-img">
                    <img src="{{$offer->image}}" alt="">
                </div>
                <div class="cns-content">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <a href="#">{{$offer->label}}</a>
                    <p>{{$offer->description}} </p>
                </div>
            </div>
            @endforeach
          
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