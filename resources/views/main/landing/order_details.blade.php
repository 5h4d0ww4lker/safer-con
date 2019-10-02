@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')


<!--================Categories Banner Area =================-->
<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>{{$item->name}}</h3>
            <ul>
                <li><a href="#">Home Page</a></li>
                <li><a href="#">Order</a></li>
                <li class="current"><a href="#">{{$item->name}}</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Product Details Area =================-->
<section class="product_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="product_details_slider">
                    <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                        <ul>
                            <!-- SLIDE  -->
                            <li data-index="rs-137221490" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-136228343" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Los Angeles" data-param1="13/08/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-135960434" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="The Colors of Feelings" data-param1="11/08/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->


                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-134008155" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Powerful Iceland" data-param1="20/07/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-134774977" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Paris Poetry" data-param1="28/07/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-134208766" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Creativity Room - New Fubiz 2015" data-param1="22/07/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-132884121" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Animated GIFS - New Fubiz 2015" data-param1="07/07/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-130740141" data-transition="scaledownfrombottom" data-slotamount="7" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="/{{$item->file_1}}" data-rotate="0" data-saveperformance="off" data-title="Naive New Beaters - Run Away" data-param1="15/06/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="/{{$item->file_1}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                            </li>
                            <!-- SLIDE  -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product_details_text">
                    <h3>{{$item->name}}</h3>
                    <h6>Arrival Date:&nbsp;<span>{{$order->delivery_date}}</span></h6>
                    <h6>Status:&nbsp;<span>{{$order->status}}</span></h6>
                    <!-- <ul class="p_rating">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <div class="add_review">
                                <a href="#">5 Reviews</a>
                                <a href="#">Add your review</a>
                            </div> -->

                   
                    <p> {{$itemDetail->description}}</p>
                    <!-- <div class="p_color">
                                <h4 class="p_d_title">color <span>*</span></h4>
                                <ul class="color_list">
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div> -->
                    <!-- <div class="p_color">
                                <h4 class="p_d_title">size <span>*</span></h4>
                                <select class="selectpicker">
                                    <option>Select your size</option>
                                    <option>Select your size M</option>
                                    <option>Select your size XL</option>
                                </select>
                            </div> -->

                    <!-- <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </div> -->
                </div>
            </div>

            <div class="col-lg-3 offset-1">
                <div class="product_details_text">
                    <h3>Merchant Info</h3>
                    <!-- <ul class="p_rating">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <div class="add_review">
                                <a href="#">5 Reviews</a>
                                <a href="#">Add your review</a>
                            </div> -->
                    <h6><span>Name:</span> {{$merchant->name}}&nbsp;{{$merchant->father_name}}</h6>
                    <h6><span>Email: </span>{{$merchant->email}}</h6>
                    <p><span>Region:</span> {{$address->region}} <br />
                    <span>City:</span> {{$address->city}} <br />
                    <span>Sub City:</span> {{$address->sub_city}} <br/>
                    <span>Location: </span>{{$address->location}} <br />
                    <span>Building: </span>{{$address->building}}


                    </p>
                  

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Details Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <nav class="tab_menu">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>
                <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (1)</a>
                        -->
                <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>{{$itemDetail->description}}</p>
            </div>
            <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h4>Rocky Ahmed</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                    </div> -->
            <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div> -->
            <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <p>{{$itemDetail->additional_info}}</p>
            </div>

        </div>
    </div>
</section>
<!--================End Product Details Area =================-->

<!--================End Related Product Area =================-->

<!--================End Related Product Area =================-->

@endsection