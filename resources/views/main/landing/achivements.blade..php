@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Safer-con')
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
    @endsection