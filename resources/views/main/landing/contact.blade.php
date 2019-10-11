<!-- Slider area -->
@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Safer-con')
<!-- Preloader -->


<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Contact Us</h2>
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="#" class="active">Contact Us</a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- Map -->
<div class="contact_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d233533.81021805512!2d90.44069804466251!3d23.85534870087626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1482565625375"></iframe>
</div>
<!-- End Map -->

<!-- All contact Info -->
<section class="all_contact_info">
    <div class="container">
        <div class="row contact_row">
            <div class="col-sm-6 contact_info">
                <h2>Contact Info</h2>
                @foreach($contacts as $contact)
                <p>{{$contact->description}}</p>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                <div class="location">
                    <div class="location_laft">
                        <a href="#">location</a>
                        <a href="#">phone</a>
                        <a href="#">fax</a>
                        <a href="#">email</a>
                    </div>
                    <div class="address">
                        <a href="#">{{$contact->location}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                     
                        <a href="#">{{$contact->phone}}</a>
                        <a href="#">{{$contact->fax}}</a>
                        <a href="#">{{$contact->email}}</a>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="col-sm-6 contact_info send_message">
                <h2>Send Us a Message</h2>
                <form class="form-inline contact_box">
                    <input type="text" class="form-control input_box" placeholder="First Name *">
                    <input type="text" class="form-control input_box" placeholder="Last Name *">
                    <input type="text" class="form-control input_box" placeholder="Your Email *">
                    <input type="text" class="form-control input_box" placeholder="Subject">
                    <input type="text" class="form-control input_box" placeholder="Your Website">
                    <textarea class="form-control input_box" placeholder="Message"></textarea>
                    <button type="submit" class="btn btn-default">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End All contact Info -->
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