@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')


<!--================Categories Banner Area =================-->
<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>Products by Category</h3>
            <ul>
                <li><a href="#">Home Page</a></li>
                <li><a href="#">Shop</a></li>
                <li class="current"><a href="#">By Category</a></li>
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
                                $current_page = $items->currentPage();
                                $tot =  $items->total();
                                if ($current_page == 1) {
                                    $from = 1;
                                    if (($current_page * 6) > $items->total()) {
                                        $to = $tot;
                                    } else {
                                        $to = $current_page * 6;
                                    }
                                } else {
                                    $from = ($current_page * 6) - 5;
                                    if (($current_page * 6) > $items->total()) {
                                        $to = $tot;
                                    } else {
                                        $to = $current_page * 6;
                                    }
                                }

                                ?>
                                <h4>Showing {{$from}} to {{$to}} of {{$items->total()}} total</h4>
                            </div>
                            <div class="secand_fillter">
                                <h4>SORT BY :</h4>
                                <select class="selectpicker">
                                    <option>Default</option>
                                    <option>Name</option>
                                    <option>Date</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="categories_product_area">
                        <div class="row">

                            @foreach($items as $item)
                            <div class="col-lg-4 col-sm-6">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img src="/{{$item->file_1}}" alt="">
                                        <h5 class="new">New</h5>
                                    </div>
                                    <div class="l_p_text">
                                        <ul>
                                            <li class="p_icon"><a href="{{ url('/product_details/'.$item->id) }}"><i class="icon_piechart"></i></a></li>
                                            <li><a class="add_cart_btn" href="{{ url('/cart') }}">Add To Cart</a></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4>{{$item->name}}</h4>
                                        <h5><del>{{$item->item_price + 15}}</del> {{$item->item_price}}ETB</h5>
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


                        <aside class="l_widgest l_menufacture_widget">
                            <div class="l_w_title">
                                <h3>Manufacturer</h3>
                            </div>
                            <ul>
                                @foreach($brands as $brand)
                                <?php
                                $brand = \App\Models\Brand::find($brand->brand_id);
                                ?>
                                <li><a href="{{ url('/byBrand/'.$brand->id) }}">{{$brand->name}}</a></li>


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
                                    <img src="/{{$featured_product->file_1}}" alt="" width="100">
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