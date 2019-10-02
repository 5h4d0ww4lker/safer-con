@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')

<style>

#sel{
height: 50px;

border: 1px solid
#cccccc;

border-radius: 0px;

-webkit-box-shadow: none;

box-shadow: none;

outline: none;

padding: 0px 22px;

box-shadow: none;

line-height: 50px;display: block;

width: 100%;

padding: .375rem .75rem;

font-size: 1rem;

line-height: 1.5;

color:
#495057;

background-color:
#fff;

background-image: none;

background-clip: padding-box;

border: 1px solid #ced4da;

border-radius: .25rem;

transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}


</style>
<!--================Categories Banner Area =================-->
<section class="categories_banner_area">
    <div class="container">
        <div class="c_banner_inner">
            <h3>Search for Item</h3>
            <ul>
                <li><a href="#">Home Page</a></li>
                <li><a href="#">Shop</a></li>
                <li class="current"><a href="#">Search for Item</a></li>
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

                    <div class="categories_product_area">
                        <div class="row">
                            @if(Session::has('toasts'))
                            @foreach(Session::get('toasts') as $toast)
                            <div class="alert alert-{{ $toast['level'] }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {{ $toast['message'] }}
                            </div>
                            @endforeach
                            @endif

                            <!--================Track Area =================-->
                            <section class="track_area p_100" style="padding-left:27%; padding-top:0%;">
                                <div class="container">
                                    <div class="track_inner">
                                        <div class="track_title">
                                            <h2>Search for Item</h2>
                                        </div>
                                        <form class="track_form row" action="{{ route('search_result') }}" method="post">
                                        {{ csrf_field() }}
                                            <div class="col-lg-12 form-group">
                                                <select id="sel" name="category" required>
                                                <option>Select Category</option>
@foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label for="text">Item Name</label>
                                                <input class="form-control" type="text" name="name">
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <button type="submit" value="submit" class="btn subs_btn form-control">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                            <!--================End Track Area =================-->




                        </div>

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