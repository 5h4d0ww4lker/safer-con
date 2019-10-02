@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')


<!--================Home Carousel Area =================-->
<section class="home_carousel_area">
    <div class="home_carousel_slider owl-carousel">

        @foreach($landing_pages as $landing_page)
        <div class="item">
            <div class="h_carousel_item">
                <img src="{{$landing_page->file}}" alt="">
                <div class="carousel_hover">
                    <h3>{{$landing_page->title}}</h3>
                    <h4>{{$landing_page->heading}} </h4>
                    <h5>Including:</h5>
                    <p>{{$landing_page->content}}</p>
                    <a class="discover_btn" href="{{ url('/products')}}">discover now</a>
                </div>
            </div>
        </div>


        @endforeach

    </div>
</section>
<!--================End Home Carousel Area =================-->

<!--================Special Offer Area =================-->
<section class="special_offer_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="special_offer_item">
                    <img class="img-fluid" src="public/main/img/feature-add/special-offer-1.jpg" alt="">
                    <div class="hover_text">
                        <h4>Special Offer</h4>
                        <h5>Young Couple</h5>
                        <a class="shop_now_btn" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="special_offer_item2">
                    <img class="img-fluid" src="public/main/img/feature-add/special-offer-2.jpg" alt="">
                    <div class="hover_text">
                        <h5>girls bag</h5>
                        <a class="shop_now_btn" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Special Offer Area =================-->

<!--================Latest Product isotope Area =================-->
<section class="fillter_latest_product">
    <div class="container">
        <div class="single_c_title">
            <h2>Our Latest Product</h2>
            @if(Session::has('toasts'))
            @foreach(Session::get('toasts') as $toast)
            <div class="alert alert-{{ $toast['level'] }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ $toast['message'] }}
            </div>
            @endforeach
            @endif
        </div>
        <div class="fillter_l_p_inner">
            <ul class="fillter_l_p">
                @foreach($categories as $category)
                <li class="active" data-filter="*"><a href="#">{{ $category->name }}</a></li>
                @endforeach
                <!-- <li data-filter=".woman"><a href="#">{{ $category->name }}</a></li> -->
                <!-- <li data-filter=".acc"><a href="#">Accessories</a></li>
                        <li data-filter=".shoes"><a href="#">Shoes</a></li>
                        <li data-filter=".bags"><a href="#">Bags</a></li> -->
            </ul>
            <div class="row isotope_l_p_inner">
                @foreach($items as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 woman bags">
                    <div class="l_product_item">
                        <div class="l_p_img">
                            <img class="img-fluid" src="{{$item->file_1}}" alt="">
                        </div>
                        <div class="l_p_text">
                            <ul>
                                <li class="p_icon"><a href="{{ url('/product_details/'.$item->id) }}"><i class="icon_piechart" style="color:#d91522;"></i></a></li>
                                <li class="p_icon">
                                    <form class="login_form row" action="{{ route('add_to_cart') }}" method="post">
                                        {{ csrf_field() }}

                                        <input class="form-control" type="hidden" placeholder="Email" name="item_id" value="{{$item->id}}">
                                        <button class="add_cart_btn" type="submit"><span style="font-size:10px">Add To Cart</h5></span>
                                    </form>
                                </li>
                                <li class="p_icon"><a href="{{ url('/add_to_wishlist/'.$item->id) }}"><i class="icon_heart_alt"></i></a></li>
                            </ul>
                            <h4>{{$item->name}}</h4>
                            <h5><del>{{$item->item_price + 15}}</del> {{$item->item_price}} ETB</h5>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <nav aria-label="Page navigation example" class="pagination_area">

                {{ $items->links() }}



            </nav>
        </div>
    </div>
</section>
<!--================End Latest Product isotope Area =================-->

<!--================Product_listing Area =================-->
<section class="product_listing_area">
    <div class="container">
        <div class="row p_listing_inner">
            @foreach($secondaries as $secondary)

            <?php
            $sub_categories = \App\Models\SubCategory::where('category_id', $secondary->id)->get();

            ?>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-6 col-sm-8">
                        <div class="p_list_text">
                            <h3>{{$secondary->name}}</h3>
                            <ul>
                                @foreach($sub_categories as $sub_category)
                                <li><a href="{{ url('/byCategory/'.$sub_category->id) }}">{{$sub_category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <div class="p_list_img">
                            <img src="{{$secondary->default_image}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</section>
<!--================End Product_listing Area =================-->

<!--================Featured Product Area =================-->
<section class="feature_product_area">
    <div class="container">
        <div class="f_p_inner">
            <div class="row">
                <div class="col-lg-3">
                    <div class="f_product_left">
                        <div class="s_m_title">
                            <h2>Featured Products</h2>
                        </div>
                        <div class="f_product_inner">
                            @foreach($featured_products as $featured_product)
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{$featured_product->file_1}}" alt="" width="100px">
                                </div>
                                <div class="media-body">
                                    <h4>{{$featured_product->name}}</h4>
                                    <h5>{{$featured_product->item_price}}ETB</h5>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="fillter_slider_inner">

                        <div class="fillter_slider owl-carousel">
                            @foreach($featured_products as $featured_product)
                            <div class="item shoes">
                                <div class="fillter_product_item bags">
                                    <div class="f_p_img">
                                        <img src="{{$featured_product->file_1}}" alt="">
                                        <h5 class="sale">Featured</h5>
                                    </div>
                                    <div class="f_p_text">
                                        <h5>{{$featured_product->name}}</h5>
                                        <h4>{{$featured_product->item_price}} ETB</h4>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Featured Product Area =================-->


@endsection