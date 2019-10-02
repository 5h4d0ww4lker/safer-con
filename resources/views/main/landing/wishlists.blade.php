@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')


<!--================Categories Banner Area =================-->
<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>Wishlists</h3>
            <ul>
                <li><a href="#">Home Page</a></li>
               
                <li class="current"><a href="#">Wishlist</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Categories Product Area =================-->
<section class="categories_product_main p_80">
    <div class="container">
        <div class="categories_main_inner">
            <div class="row row_disable">
                <div class="col-lg-9 float-md-right">
                    <div class="showing_fillter">
                        <div class="row m0">
                            <div class="first_fillter">
                            <?php
                                $current_page = $wishlists->currentPage();
                                $tot =  $wishlists->total();
                                if ($current_page == 1) {
                                    $from = 1;
                                    if (($current_page * 6) > $wishlists->total()) {
                                        $to = $tot;
                                    } else {
                                        $to = $current_page * 6;
                                    }
                                } else {
                                    $from = ($current_page * 6) - 5;
                                    if (($current_page * 6) > $wishlists->total()) {
                                        $to = $tot;
                                    } else {
                                        $to = $current_page * 6;
                                    }
                                }

                                ?>
                                <h4>Showing {{$from}} to {{$to}} of {{$wishlists->total()}} total</h4>
                            </div>
                                                  </div>
                    </div>
                    <div class="categories_product_area">
                        @if(Session::has('toasts'))
                        @foreach(Session::get('toasts') as $toast)
                        <div class="alert alert-{{ $toast['level'] }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {{ $toast['message'] }}
                        </div>
                        @endforeach
                        @endif
                        <div class="row">

                            @if($wishlists->count() < 1) <section class="emty_cart_area p_100" style="padding-left:40%">
                                <div class="container">
                                    <div class="emty_cart_inner">
                                        <i class="icon-heart icons"></i>
                                        <h3>Your Wishlist is Empty</h3>

                                    </div>
                                </div>
</section>
@endif
@foreach($wishlists as $wishlist)
<?php
$item = \App\Models\Item::find($wishlist->item_id);
?>
<div class="col-lg-4 col-sm-6">
    <div class="l_product_item">
        <div class="l_p_img">
            <img src="{{$item->file_1}}" alt="">
            <h5 class="new">New</h5>
        </div>
        <div class="l_p_text">
            <ul>
                <li class="p_icon"><a href="{{ url('/product_details/'.$item->id) }}"><i class="icon_piechart" style="color:#d91522;"></i></a></li>
                <li>
                    <form class="login_form row" action="{{ route('add_to_cart') }}" method="post">
                        {{ csrf_field() }}

                        <input class="form-control" type="hidden" placeholder="Email" name="item_id" value="{{$item->id}}">
                        <button class="add_cart_btn" type="submit">Add To Cart</button>
                    </form>
                </li>
                <li class="p_icon"><a href="{{ url('/remove_from_wishlist/'.$wishlist->id) }}"><i class="icon_trash" style="color:#d91522;"></i></a></li>


            </ul>
            <h4>{{$item->name}}</h4>
            <h5><del>{{$item->item_price + 15}}</del> {{$item->item_price}}ETB</h5>
        </div>
    </div>
</div>
@endforeach



</div>
<nav aria-label="Page navigation example" class="pagination_area">
                                    {{ $wishlists->links() }}
                                </nav>
</div>
</div>
<div class="col-lg-3 float-md-right">
    <div class="categories_sidebar">
        <aside class="l_widgest l_p_categories_widget">
            <div class="l_w_title">
                <h3>Categories</h3>
            </div>
            <ul class="navbar-nav">
                @foreach($categories as $category)
                <?php
                $sub_categories = \App\Models\SubCategory::where('category_id', $category->id)->get();

                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$category->name}}
                        <i class="icon_plus" aria-hidden="true"></i>
                        <i class="icon_minus-06" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($sub_categories as $sub_category)
                        <li class="nav-item"><a class="nav-link" href="{{ url('/byCategory/'.$sub_category->id) }}">{{$sub_category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>

                @endforeach



            </ul>
        </aside>



        <aside class="l_widgest l_feature_widget">
            <div class="l_w_title">
                <h3>Featured Products</h3>
            </div>
            @foreach($featured_products as $featured_product)
            <div class="media">
                <div class="d-flex">
                    <img src="{{$featured_product->file_1}}" alt="" width="100">
                </div>
                <div class="media-body">
                    <a href="{{ url('/product_details/'.$featured_product->id) }}">
                        <h4>{{$featured_product->name}}</h4>
                    </a>
                    <h5>{{$featured_product->item_price}}ETB</h5>
                </div>
            </div>
            @endforeach
        </aside>
    </div>
</div>
</div>
</div>
</div>
</section>
<!--================End Categories Product Area =================-->
@endsection